<?php
require_once('api/Engine.php');

class LoginAdmin extends Engine
{	
	public function fetch()
	{	
		$this->templates->assign('animate', false);
		if(!$_SESSION['animate']['login']){
			$_SESSION['animate']['login'] = true;
			$this->templates->assign('animate', true);
		}
		
		if($this->request->method('post') && $this->request->post('login'))
		{
			$login = $this->request->post('a-login');
			$password = $this->request->post('password');
			$remember_me = $this->request->post('remember_me');
			
			$manager = $this->managers->get_manager($login);
			if($manager && $manager->bad_attempts > 4){
				if((time()-strtotime($manager->last_attempt)) > 1800){
					$block_access = false;
				}else{
					$block_access = true;
				}
			}else{
				$block_access = false;
			}
			
			if($block_access){
				$this->templates->assign('error', 'access_blocked');
			}else{
				if($manager_id = $this->managers->check_password($login, $password)){
					$_SESSION['admin_id'] = $manager_id;
					$_SESSION['admin'] = 'admin';
					
					if(isset($remember_me)){
						$days = 30;
						$token = $this->managers->generate_token($manager_id);
						setcookie ("memory", $token, time()+ ($days * 24 * 60 * 60 * 1000));
					}
					
					header('Location: '.$this->config->root_url.'/admin/');
					exit();
				}elseif($manager){
					$manager->bad_attempts+= 1;
					$manager->last_attempt = date('Y-m-d H:i:s');
					$this->managers->update_manager($manager->id, $manager);
					$this->templates->assign('error', 'bad_data');
				}else{
					$this->templates->assign('error', 'bad_data');
				}	
			}
		}
		
 	  	return $this->templates->fetch('login.tpl');
	}
	
}


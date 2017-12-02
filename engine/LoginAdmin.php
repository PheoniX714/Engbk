<?PHP
require_once('api/Engine.php');

class LoginAdmin extends Engine
{	
	public function fetch()
	{

		if($this->request->method('post') && $this->request->post('login'))
		{
			$login = $this->request->post('a-login');
			$password = $this->request->post('password');
			
			if($admin_id = $this->managers->check_password($login, $password)){
				$_SESSION['admin_id'] = $admin_id;
				$_SESSION['admin'] = 'admin';
				header('Location: '.$this->config->root_url.'/admin/');
				exit();
			}else{
				$this->templates->assign('error', 'bad_data');
			}
		}
		
 	  	return $this->templates->fetch('login.tpl');
	}
	
}


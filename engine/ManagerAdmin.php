<?php
require_once('api/Engine.php');

class ManagerAdmin extends Engine
{	
	public function fetch()
	{
		$perm_list = $this->managers->permissions_list;
		
		if($this->request->method('post'))
		{
			$manager = new stdClass();
			$manager->id = $this->request->post('id', 'integer');
			$manager->login = $this->request->post('login');
			$manager->email = $this->request->post('email');
			
			if($manager->id == 1)
				$manager->permissions = array_column($perm_list, 'code');
			else
				$manager->permissions = (array)$this->request->post('permissions');
			
			if(empty($manager->login))
			{
				$this->templates->assign('message_error', 'empty_login');			
			}
			elseif(($m = $this->managers->get_manager($manager->login)) && $m->id != $manager->id)
			{
	  			$this->templates->assign('message_error', 'login_exists');
			}
			elseif(empty($manager->email))
			{
				$this->templates->assign('message_error', 'empty_email');			
			}
			
			else
			{	 				
				if($this->request->post('password') != "")
					$manager->password = $this->request->post('password');
				
				if($_SESSION['admin_id'] == $manager->id){
					$m = $this->managers->get_manager($manager->id);
					$manager->permissions = $m->permissions;
				}
				
				if(empty($manager->id))
				{
					$manager->id = $this->managers->add_manager($manager);
	  				$this->templates->assign('message_success', 'added');
	  			}
		    	else
		    	{
					$manager->id = $this->managers->update_manager($manager->id, $manager);
					$this->templates->assign('message_success', 'updated');
	  			}
		    	$manager = $this->managers->get_manager($manager->login);
	    	}
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			if(!empty($id))
				$manager = $this->managers->get_manager(intval($id));
			
		}

		if(!empty($manager))
		{
			$this->templates->assign('m', $manager);
		}
		$this->templates->assign('perms', $perm_list);
		
 	  	return $this->templates->fetch('settings/manager.tpl');
	}
	
}


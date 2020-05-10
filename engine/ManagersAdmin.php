<?php

require_once('api/Engine.php');

class ManagersAdmin extends Engine
{
	function fetch()
	{	
		if($this->request->method('post'))
		{
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
			    case 'delete':
			    {
			    	foreach($ids as $id){
						
						$this->managers->delete_manager($id);    
					}
			        break;
			    }
			}		
		}
		
		$managers = $this->managers->get_managers();
		$managers_count = $this->managers->count_managers();
		$this->templates->assign('managers', $managers);
		$this->templates->assign('managers_count', $managers_count);
		return $this->body = $this->templates->fetch('settings/managers.tpl');
	}
}

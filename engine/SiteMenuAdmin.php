<?php 

require_once('api/Engine.php');

class SiteMenuAdmin extends Engine
{
	public function fetch()
	{	
		$menu = new stdClass;
				
		if($this->request->method('POST'))
		{
			$menu->id = $this->request->post('id', 'integer');
			$menu->name = $this->request->post('name');
			
			if(empty($menu->name)){
				$this->templates->assign('message_error', 'empty_name');
			}
			else
			{
				if(empty($menu->id))
				{			
					$menu->id = $this->pages->add_menu($menu);
					$this->templates->assign('message_success', 'added');
				}
				else
				{
					$this->pages->update_menu($menu->id, $menu);
					$this->templates->assign('message_success', 'updated');
				}
			}
		}else
		{
			$menu->id = $this->request->get('id', 'integer');
			$menu = $this->pages->get_menu($menu->id);
		}
		
		if(empty($menu->id))
			$menu = new stdClass;
		
		$this->templates->assign('menu', $menu);
		
 	  	return $this->templates->fetch('pages/site_menu.tpl');
	}
}
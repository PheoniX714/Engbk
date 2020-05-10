<?PHP
require_once('api/Engine.php');

class SiteMenusAdmin extends Engine
{	
	public function fetch()
	{		
		if($this->request->method('post'))
		{
			$positions = $this->request->post('positions');
			
			if(is_array($positions)){
				$ids = array_keys($positions);
				sort($positions);
				foreach($positions as $i=>$position)
					$this->pages->update_menu($ids[$i], array('position'=>$position)); 
			}
			
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
				case 'delete':
				{
					foreach($ids as $id)
						$this->pages->delete_menu($id);
			        break;
				}
			}
		}
		$menus = $this->pages->get_menus();
		$this->templates->assign('menus', $menus);	
		
		return $this->templates->fetch('pages/site_menus.tpl');
	}	
}
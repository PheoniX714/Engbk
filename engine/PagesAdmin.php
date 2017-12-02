<?php 

require_once('api/Engine.php');

########################################
class PagesAdmin extends Engine
{

  public function fetch()
  {
 	// Меню
	$menus = $this->pages->get_menus();
	$this->templates->assign('menus', $menus);	
	
    // Текущее меню
  	$menu_id = $this->request->get('menu_id', 'integer'); 
	if(empty($menu_id))
		$menu_id = 1;
	
  	if(!$menu_id || !$menu = $this->pages->get_menu($menu_id))
  	{
  		$menu = reset($menus);
  	}
 	$this->templates->assign('menu', $menu);

   	// Обработка действий
  	if($this->request->method('post'))
  	{
		// Сортировка
		$positions = $this->request->post('positions'); 		
 		$ids = array_keys($positions);
		sort($positions);
		foreach($positions as $i=>$position)
			$this->pages->update_page($ids[$i], array('position'=>$position)); 

		
		// Действия с выбранными
		$ids = $this->request->post('check');
		if(is_array($ids))
		switch($this->request->post('action'))
		{
		    case 'disable':
		    {
				$this->pages->update_page($ids, array('visible'=>0));	      
				break;
		    }
		    case 'enable':
		    {
				$this->pages->update_page($ids, array('visible'=>1));	      
		        break;
		    }
		    case 'delete':
		    {
			    foreach($ids as $id)
					$this->pages->delete_page($id);    
		        break;
		    }
		}		
		
 	}

  

	// Отображение
  	$pages = $this->pages->get_pages(array('menu_id'=>$menu->id));
 	$this->templates->assign('pages', $pages);
	return $this->templates->fetch('pages/pages.tpl');
  }
}


?>
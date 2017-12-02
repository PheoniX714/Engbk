<?php
require_once('api/Engine.php');

class GalleryCategoriesAdmin extends Engine
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
			    case 'disable':
			    {
			    	foreach($ids as $id)
						$this->gallery_categories->update_category($id, array('visible'=>0));    
					break;
			    }
			    case 'enable':
			    {
			    	foreach($ids as $id)
						$this->gallery_categories->update_category($id, array('visible'=>1));    
			        break;
			    }
			    case 'delete':
			    {
					$this->gallery_categories->delete_category($ids);    
			        break;
			    }
			}		
	  	
			// Сортировка
			$positions = $this->request->post('positions');
	 		$ids = array_keys($positions);
			sort($positions);
			foreach($positions as $i=>$position)
				$this->gallery_categories->update_category($ids[$i], array('position'=>$position)); 

		}  
  
		$categories = $this->gallery_categories->get_categories_tree();
		
		$this->templates->assign('categories', $categories);
		return $this->templates->fetch('gallery/gallery_categories.tpl');
	}
}

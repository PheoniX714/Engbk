<?php
require_once('api/Engine.php');

class CategoriesAdmin extends Engine
{
	function fetch()
	{
		$language = $this->languages->get_main_language();
		$this->templates->assign('main_language', $language);
		
		$filter = array();
		if($this->request->method('post'))
		{
			$filter['language_id'] = $this->request->post('filter_language', 'integer');

			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
			    case 'disable':
			    {
			    	foreach($ids as $id)
						$this->categories->update_category($id, array('visible'=>0));    
					break;
			    }
			    case 'enable':
			    {
			    	foreach($ids as $id)
						$this->categories->update_category($id, array('visible'=>1));    
			        break;
			    }
			    case 'delete':
			    {
					$this->categories->delete_category($ids);    
			        break;
			    }
			}		
	  	
			// Сортировка
			$positions = $this->request->post('positions');
	 		$ids = array_keys($positions);
			sort($positions);
			foreach($positions as $i=>$position)
				$this->categories->update_category($ids[$i], array('position'=>$position)); 
		} 
		if(empty($filter['language_id']))
			$filter['language_id'] = $language->id;
		$this->templates->assign('filter_language', $filter['language_id']);
		
		$filter['check_translations'] = true;
		$categories = $this->categories->get_categories_tree($filter);
		
		$this->templates->assign('categories', $categories);
		return $this->templates->fetch('products/categories.tpl');
	}
}

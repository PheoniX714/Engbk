<?php
 
require_once('api/Engine.php');

class NewsCategoriesAdmin extends Engine
{
	public function fetch()
	{
		$language = $this->languages->get_main_language();
		$this->templates->assign('main_language', $language);
		
		$filter_language = 1;
		
		if($this->request->method('post'))
		{
			$filter_language = $this->request->post('filter_language');
						
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
			    case 'disable':
			    {
			    	foreach($ids as $id)
						$this->news->update_category($id, array('visible'=>0));    
					break;
			    }
			    case 'enable':
			    {
			    	foreach($ids as $id)
						$this->news->update_category($id, array('visible'=>1));    
			        break;
			    }
			    case 'delete':
			    {
					$this->news->delete_category($ids);    
			        break;
			    }
			}		
	  	
			// Сортировка
			$positions = $this->request->post('positions');
	 		$ids = array_keys($positions);
			sort($positions);
			foreach($positions as $i=>$position)
				$this->news->update_category($ids[$i], array('position'=>$position)); 

		} 
		if(empty($filter_language))
			$filter_language = $language->id;
		$this->templates->assign('filter_language', $filter_language);
  
		$categories = $this->news->get_categories_tree(false);
				
		$languages = $this->languages->get_languages();
		$this->templates->assign('languages', $languages);

		$this->templates->assign('categories', $categories);
		return $this->templates->fetch('news/news-categories.tpl');
	}
}

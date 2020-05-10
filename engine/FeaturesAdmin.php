<?php
require_once('api/Engine.php');

class FeaturesAdmin extends Engine
{
	function fetch()
	{	
		$language = $this->languages->get_main_language();
		$this->templates->assign('main_language', $language);
		
		if($this->request->method('post'))
		{  	
			// Действия с выбранными
			$ids = $this->request->post('check');	
			if(is_array($ids))
			switch($this->request->post('action'))
			{
			    case 'set_in_filter':
			    {
			    	$this->features->update_feature($ids, array('in_filter'=>1));  	
					break;
			    }
			    case 'unset_in_filter':
			    {
			    	$this->features->update_feature($ids, array('in_filter'=>0)); 
					break;
			    }
			    case 'delete':
			    {
			    	$current_cat = $this->request->get('category_id', 'integer');
			    	foreach($ids as $id)
			    	{
			    		// текущие категории
			    		$cats = $this->features->get_feature_categories($id);
			    		
			    		// В каких категориях оставлять
			    		$diff = array_diff($cats, (array)$current_cat);
			    		if(!empty($current_cat) && !empty($diff))
			    		{
			    			$this->features->update_feature_categories($id, $diff);
			    		}
			    		else
			    		{
			    			$this->features->delete_feature($id); 
			    		}
					}
			        break;
			    }
			}		
	  	
			// Сортировка
			$positions = $this->request->post('positions');
	 		$ids = array_keys($positions);
			sort($positions);
			foreach($positions as $i=>$position)
				$this->features->update_feature($ids[$i], array('position'=>$position)); 

		} 
		
		if(empty($filter_language))
			$filter_language = $language->id;
		$this->templates->assign('filter_language', $filter_language);
	
		$categories = $this->categories->get_categories_tree(false);
		$category = null;
		
		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer')); 		
		$filter['limit'] = 20;
		
		$filter['language_id'] = $filter_language;
		
		$category_id = $this->request->get('category_id', 'integer');
		if($category_id)
		{
			$category = $this->categories->get_category($category_id);
			$filter['category_id'] = $category->id;
		}
  	
		$keyword = $this->request->get('keyword', 'string');
		if(!empty($keyword))
		{
			$filter['keyword'] = $keyword;
			$this->templates->assign('keyword', $keyword);
		}		
		
		$features_count = $this->features->count_features($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$filter['limit'] = $features_count;	
		
		$this->templates->assign('features_count', $features_count);
		
		$this->templates->assign('pages_count', ceil($features_count/$filter['limit']));
		$this->templates->assign('current_page', $filter['page']);
		
		$features = $this->features->get_features($filter);
		
		$languages = $this->languages->get_languages();
		$this->templates->assign('languages', $languages);
		
		$this->templates->assign('categories', $categories);
		$this->templates->assign('category', $category);
		$this->templates->assign('features', $features);
		return $this->body = $this->templates->fetch('products/features.tpl');
	}
}

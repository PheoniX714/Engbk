<?php
require_once('api/Engine.php');

class GalleryAlbumsAdmin extends Engine
{
	function fetch()
	{		

		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer'));
			
		$filter['limit'] = 20;
	
		// Категории
		$categories = $this->gallery_categories->get_categories_tree();
		$this->templates->assign('categories', $categories);
		
		// Текущая категория
		$category_id = $this->request->get('category_id', 'integer'); 
		if($category_id && $category = $this->gallery_categories->get_category($category_id))
	  		$filter['category_id'] = $category->children;
		      
		// Текущий фильтр
		if($f = $this->request->get('filter', 'string'))
		{
			if($f == 'visible')
				$filter['visible'] = 1; 
			elseif($f == 'hidden')
				$filter['visible'] = 0; 
			$this->templates->assign('filter', $f);
		}
	
		// Обработка действий 	
		if($this->request->method('post'))
		{
			// Сортировка
			$positions = $this->request->post('positions'); 		
				$ids = array_keys($positions);
			sort($positions);
			$positions = array_reverse($positions);
			foreach($positions as $i=>$position)
				$this->gallery_albums->update_album($ids[$i], array('position'=>$position)); 
		
			
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(!empty($ids))
			switch($this->request->post('action'))
			{
			    case 'disable':
			    {
			    	$this->gallery_albums->update_album($ids, array('visible'=>0));
					break;
			    }
			    case 'enable':
			    {
			    	$this->gallery_albums->update_album($ids, array('visible'=>1));
			        break;
			    }
			    case 'delete':
			    {
				    foreach($ids as $id)
						$this->gallery_albums->delete_album($id);    
			        break;
			    }
			}			
		}

		// Отображение
		if(isset($category))
			$this->templates->assign('category', $category);
		
	  	$albums_count = $this->gallery_albums->count_albums($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$filter['limit'] = $albums_count;
		
		if($filter['limit']>0)	  	
		  	$pages_count = ceil($albums_count/$filter['limit']);
		else
		  	$pages_count = 0;
	  	$filter['page'] = min($filter['page'], $pages_count);
	 	$this->templates->assign('albums_count', $albums_count);
	 	$this->templates->assign('pages_count', $pages_count);
	 	$this->templates->assign('current_page', $filter['page']);
	 	
		$albums = $this->gallery_albums->get_albums($filter);
		foreach($albums as $album)
			$album->preview = $this->gallery_albums->get_album_preview($album->id);
			
		$this->templates->assign('albums', $albums);
		return $this->templates->fetch('gallery/gallery_albums.tpl');
	}
}

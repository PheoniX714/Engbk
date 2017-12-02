<?php
 
require_once('api/Engine.php');

class NewsAdmin extends Engine
{
	public function fetch()
	{
		// Обработка действий
		if($this->request->method('post'))
		{
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
			    case 'disable':
			    {
					$this->news->update_post($ids, array('visible'=>0));	      
					break;
			    }
			    case 'enable':
			    {
					$this->news->update_post($ids, array('visible'=>1));	      
			        break;
			    }
			    case 'delete':
			    {
				    foreach($ids as $id)
						$this->news->delete_post($id);    
			        break;
			    }
			}				
		}

		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer')); 		
		$filter['limit'] = 20;
  	
		// Поиск
		$keyword = $this->request->get('keyword', 'string');
		if(!empty($keyword))
		{
			$filter['keyword'] = $keyword;
			$this->templates->assign('keyword', $keyword);
		}		
		
		$posts_count = $this->news->count_posts($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$filter['limit'] = $posts_count;	
		
		$posts = $this->news->get_posts($filter);
		$this->templates->assign('posts_count', $posts_count);
		
		$this->templates->assign('pages_count', ceil($posts_count/$filter['limit']));
		$this->templates->assign('current_page', $filter['page']);
		
		$this->templates->assign('posts', $posts);
		return $this->templates->fetch('news/news.tpl');
	}
}

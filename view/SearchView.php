<?PHP

require_once('View.php');

class SearchView extends View
{
	function fetch()
	{
		$keyword = $this->request->get('keyword', 'string');
		
		if($keyword){
			// Количество постов на 1 странице
			$items_per_page = 20;

			$filter = array();
			$filter['keyword'] = $keyword;
			
			// Выбираем только видимые посты
			$filter['visible'] = 1;
			
			// Текущая страница в постраничном выводе
			$current_page = $this->request->get('page', 'integer');
			
			// Если не задана, то равна 1
			$current_page = max(1, $current_page);
			$this->templates->assign('current_page_num', $current_page);

			// Вычисляем количество страниц
			$posts_count = $this->news->count_posts($filter);

			// Показать все страницы сразу
			if($this->request->get('page') == 'all')
				$items_per_page = $posts_count;	

			$pages_num = ceil($posts_count/$items_per_page);
			$this->templates->assign('total_pages_num', $pages_num);

			$filter['page'] = $current_page;
			$filter['limit'] = $items_per_page;
			
			// Выбираем статьи из базы
			$posts = $this->news->get_posts($filter);
			
			// Передаем в шаблон
			$this->templates->assign('posts', $posts);			
			$this->templates->assign('keyword', $keyword);
		}
		
		if($this->page)
		{
			$pages_group = $this->pages->get_pages_group($this->page->lang_group);
			$this->templates->assign('pages_group', $pages_group);
			
			$this->templates->assign('meta_title', 'Поиск - '.$keyword);
			$this->templates->assign('meta_keywords', '');
			$this->templates->assign('meta_description', '');
		}

		$body = $this->templates->fetch('search.tpl');
		
		return $body;
	}
}
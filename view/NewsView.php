<?PHP

require_once('View.php');

class NewsView extends View
{
	public function fetch()
	{
		$url = $this->request->get('url', 'string');
		
		// Если указан адрес поста,
		if(!empty($url))
		{
			// Выводим пост
			return $this->fetch_post($url);
		}
		else
		{
			// Иначе выводим ленту блога
			return $this->fetch_news();
		}
	}
	
	private function fetch_post($url)
	{
		// Выбираем пост из базы
		$post = $this->news->get_post($url);
		
		// Если не найден - ошибка
		if(!$post || (!$post->visible && empty($_SESSION['admin'])))
			return false;
		
		$this->templates->assign('post',      $post);
		
		// Мета-теги
		$this->templates->assign('meta_title', $post->meta_title);
		$this->templates->assign('meta_keywords', $post->meta_keywords);
		$this->templates->assign('meta_description', $post->meta_description);
		
		return $this->templates->fetch('post.tpl');
	}	
	
	// Отображение списка постов
	private function fetch_news()
	{
		// Количество постов на 1 странице
		$items_per_page = 20;

		$filter = array();
		
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
		
		// Метатеги
		if($this->page)
		{
			$this->templates->assign('meta_title', $this->page->meta_title);
			$this->templates->assign('meta_keywords', $this->page->meta_keywords);
			$this->templates->assign('meta_description', $this->page->meta_description);
		}
		
		$body = $this->templates->fetch('news.tpl');
		
		return $body;
	}	
}
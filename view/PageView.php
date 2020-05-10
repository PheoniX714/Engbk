<?PHP

require_once('View.php');

class PageView extends View
{
	function fetch()
	{
		$url = $this->request->get('page_url', 'string');
		$translation = $this->pages->get_page_translation((string)$url);
		$page = $this->pages->get_page($translation->page_id);
		$page = (object)array_merge((array)$page, (array)$translation);
		
		// Отображать скрытые страницы только админу
		if(empty($page) || (!$page->visible && empty($_SESSION['admin'])))
			return false;
		
		$page_group = $this->pages->get_page_group($page->id);
		
		$this->templates->assign('page', $page);
		$this->templates->assign('page_group', $page_group);
		$this->templates->assign('meta_title', $page->meta_title);
		$this->templates->assign('meta_keywords', $page->meta_keywords);
		$this->templates->assign('meta_description', $page->meta_description);
		
		return $this->templates->fetch('page.tpl');
	}
}
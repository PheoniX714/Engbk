<?PHP

require_once('View.php');

class MainView extends View
{

	function fetch()
	{		
		$page_url = '';
		$translation = $this->pages->get_page_translation((string)$page_url, $_SESSION['lang']->id);
		$page = $this->pages->get_page($translation->page_id);
		$page = (object)array_merge((array)$page, (array)$translation);
		
		if($page)
		{
			$this->templates->assign('page', $page);	
			$this->templates->assign('meta_title', $page->meta_title);
			$this->templates->assign('meta_keywords', $page->meta_keywords);
			$this->templates->assign('meta_description', $page->meta_description);
		}
		
		return $this->templates->fetch('main.tpl');
	}
}

<?PHP

require_once('View.php');

class PageView extends View
{
	function fetch()
	{
		$url = $this->request->get('page_url', 'string');
		$page = $this->pages->get_page($url);
		
		// Отображать скрытые страницы только админу
		if(empty($page) || (!$page->visible && empty($_SESSION['admin'])))
			return false;
		
		$language_id = $_SESSION['lang']->id;
						
		if($language_id > 1){
			$translation = $this->pages->get_page_translation(intval($page->id), intval($language_id));
		}
		
		if($translation){
			$page->header = $translation->header;
			$page->name = $translation->name;
			$page->meta_title = $translation->meta_title;
			$page->meta_keywords = $translation->meta_keywords;
			$page->meta_description = $translation->meta_description;
			$page->body = $translation->body;
		}
		
		$this->templates->assign('page', $page);
		$this->templates->assign('meta_title', $page->meta_title);
		$this->templates->assign('meta_keywords', $page->meta_keywords);
		$this->templates->assign('meta_description', $page->meta_description);
		
		return $this->templates->fetch('page.tpl');
	}
}
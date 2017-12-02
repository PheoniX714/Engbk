<?PHP
require_once('api/Engine.php');

class PageAdmin extends Engine
{	
	public function fetch()
	{	
		$page = new stdClass;
		if($this->request->method('POST'))
		{
			$language_id = $this->request->post('language_id', 'integer');
			if(!empty($language_id) and $language_id > 1){
				$translation = new stdClass;
				
				$translation->linked_page_id = $this->request->post('id', 'integer');
				$translation->language_id = $this->request->post('language_id', 'integer');
				$translation->header = $this->request->post('header');
				$translation->name = $this->request->post('name');
				$translation->meta_title = $this->request->post('meta_title');
				$translation->meta_keywords = $this->request->post('meta_keywords');
				$translation->meta_description = $this->request->post('meta_description');
				$translation->body = $this->request->post('body');
				
				if(!empty($translation->linked_page_id)){
					$this->pages->delete_page_translation($translation->linked_page_id, $translation->language_id);
					
					if($this->pages->add_page_translation($translation)){
						$translation = $this->pages->get_page_translation(intval($translation->linked_page_id), intval($language_id));
						
						
						$page = $this->pages->get_page(intval($translation->linked_page_id));						
						if($translation){
							$page->header = $translation->header;
							$page->name = $translation->name;
							$page->meta_title = $translation->meta_title;
							$page->meta_keywords = $translation->meta_keywords;
							$page->meta_description = $translation->meta_description;
							$page->body = $translation->body;
						}
						$this->templates->assign('message_success', 'added_translation');
					}
				}
				
			}else{
				$page->id = $this->request->post('id', 'integer');
				$page->name = $this->request->post('name');
				$page->header = $this->request->post('header');
				$page->url = trim($this->request->post('url'));
				$page->pre_url = trim($this->request->post('pre_url')); 
				$page->meta_title = $this->request->post('meta_title');
				$page->meta_keywords = $this->request->post('meta_keywords');
				$page->meta_description = $this->request->post('meta_description');
				$page->body = $this->request->post('body');
				$page->menu_id = $this->request->post('menu_id', 'integer');
				$page->parent_id = $this->request->post('parent_id', 'integer');
				$page->visible = $this->request->post('visible', 'boolean');			
				
				$page->image = $this->request->post('filename_old');
				
				$images = $this->request->files('image');
				if(empty($images)){
					$this->pages->delete_image($page->image);
					$page->image = '';
				}
		
				## Не допустить одинаковые URL разделов.
				if(($p = $this->pages->get_page($page->url)) && $p->id!=$page->id)
				{			
					$this->templates->assign('message_error', 'url_exists');
				}
				else
				{
					if(empty($page->id))
					{
						$page->id = $this->pages->add_page($page);
						$this->templates->assign('message_success', 'added');
					}
					else
					{
						$this->pages->update_page($page->id, $page);
						$this->templates->assign('message_success', 'updated');
					}
					
					// Загрузка изображения
					if($images)
					{
						if ($image_name = $this->image->upload_page_img($images['tmp_name'], $images['name']))
						{
							$this->pages->add_image($page->id, $image_name);
						}
						else
						{
							$this->templates->assign('error', 'error uploading image');
						}
					}
					$page = $this->pages->get_page($page->id);
					
					if(empty($language_id))
						$language_id = 1;
				}
			}
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			$language_id = $this->request->get('language_id', 'integer');
			
			if(!empty($id))
				$page = $this->pages->get_page(intval($id));			
			else
			{
				$page->menu_id = $this->request->get('menu_id');
				$page->visible = 1;
			}
			
			if($language_id > 1){
				$translation = $this->pages->get_page_translation(intval($page->id), intval($language_id));
				if(empty($translation)){
					$translation = new stdClass;
					$translation->header = '';
					$translation->name = '';
					$translation->meta_title = '';
					$translation->meta_keywords = '';
					$translation->meta_description = '';
					$translation->body = '';
				}
					
			}else{
				$language_id = 1;
				$translation = false;
			}
			
			if($translation){
				$page->header = $translation->header;
				$page->name = $translation->name;
				$page->meta_title = $translation->meta_title;
				$page->meta_keywords = $translation->meta_keywords;
				$page->meta_description = $translation->meta_description;
				$page->body = $translation->body;
			}
		}	
		
		$this->templates->assign('page', $page);
		
		$this->templates->assign('language_id', $language_id);
		
 	  	$menus = $this->pages->get_menus();
		$this->templates->assign('menus', $menus);
		
		$languages = $this->languages->get_languages();
		$this->templates->assign('languages', $languages);
		
	    // Текущее меню
	    if(isset($page->menu_id))
	  		$menu_id = $page->menu_id; 
		else
			$menu_id = 1; 
		
	  	if(empty($menu_id) || !$menu = $this->pages->get_menu($menu_id))
	  	{
	  		$menu = reset($menus);
	  	}
	 	$this->templates->assign('menu', $menu);
		
		$filter['menu_id'] = $menu_id;
		
		$pages = $this->pages->get_pages($filter);
		$this->templates->assign('pages', $pages);

 	  	return $this->templates->fetch('pages/page.tpl');
	}
	
}
<?PHP
require_once('api/Engine.php');

class PageAdmin extends Engine
{	
	public function fetch()
	{	
		$page = new stdClass;
		$translation = new stdClass;
		
		$language_id = $this->request->get('language_id', 'integer');
		
		if(empty($language_id))
			$language = $this->languages->get_main_language();
		else
			$language = $this->languages->get_language(intval($language_id));
		
		$main_language = $this->languages->get_main_language();
		
		if($this->request->method('POST'))
		{
			$page->id = $this->request->post('id', 'integer');
			$page->menu_id = $this->request->post('menu_id', 'integer');
			$page->parent_id = $this->request->post('parent_id', 'integer');
			$page->preview_width = $this->request->post('preview_width', 'integer');
			$page->preview_height = $this->request->post('preview_height', 'integer');
			$page->visible = $this->request->post('visible', 'boolean');
			
			$page->image = $this->request->post('image_old');
			
			if($this->request->post('del_preview', 'integer')){
				$this->pages->delete_image($page->image);
				$page->image = '';
			}
				
			$image = $this->request->files('image');
			if(!empty($image['name'])){
				$this->pages->delete_image($page->image);
				$page->image = '';
			}
			
			$translation->name = $this->request->post('name');
			$translation->url = trim($this->request->post('url', 'string'));
			$translation->meta_title = $this->request->post('meta_title');
			$translation->meta_keywords = $this->request->post('meta_keywords');
			$translation->meta_description = $this->request->post('meta_description');
			$translation->text = $this->request->post('text');
						
			if(empty($translation->url)){
				$translation->url = $this->request->translit_url($translation->name);
			}else{
				$translation->url = $this->request->translit_url($translation->url);
			}
			
			switch($page->id){
				case 1: $translation->url = '404'; break;
				case 2: $translation->url = ''; break;
			}
			
			if(in_array($page->id, array(1,2)))
				$page->visible = true;
			
			if(empty($translation->meta_title))
				$translation->meta_title = $translation->name;
			if(empty($translation->meta_keywords))
				$translation->meta_keywords = $translation->name;
			
			if(empty($translation->name)){
				$this->templates->assign('message_error', 'empty_name');
			}elseif(($t = $this->pages->get_page_translation($translation->url, $language->id)) && $t->page_id!=$page->id){
				$this->templates->assign('message_error', 'url_exists');
			}else{
				if(empty($translation->language_id))
					$translation->language_id = $language->id;
				
				if(empty($page->menu_id))
					$page->menu_id = 1;
				
				if($parent = $this->pages->get_page($page->parent_id) and $parent->menu_id != $page->menu_id)
					$page->parent_id = 0;
				
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
				
				if($image)
				{
					if ($image_name = $this->image->upload_image($image['tmp_name'], $image['name'], $this->config->page_image_dir))
					{
						$this->pages->add_image($page->id, $image_name);
						$this->image->resize_image($image_name, $page->preview_width, $page->preview_height, $this->config->page_image_dir);
					}
					else
					{
						$this->templates->assign('error', 'error uploading image');
					}
					
					$page = $this->pages->get_page($page->id);
				}
				
				$img_ids = array();
				foreach($this->pages->get_page_images(array('page_id'=>$page->id)) as $img){
					$img_ids[] = $img->id;
				}
				$images_positions = $this->request->post('positions'); 
				if(!empty($images_positions)){
					foreach($img_ids as $id){
						if(!in_array($id, $images_positions)){
							$this->pages->delete_page_image($id);
						}
					}
					$images_positions = array_flip($images_positions);
					foreach($images_positions as $id=>$position)
						$this->pages->update_page_image($id, array('position'=>$position)); 
				}else{
					foreach($img_ids as $id){
						$this->pages->delete_page_image($id);
					}
				}
				// Загрузка изображений
				if($images = $this->request->files('page_images'))
				{
					for($i=0; $i<count($images['name']); $i++)
					{
						if ($image_name = $this->image->upload_image($images['tmp_name'][$i], $images['name'][$i], $this->config->page_images_dir))
						{
							$this->pages->add_page_image($page->id, $image_name);
							$this->image->resize_image($image_name, $this->settings->page_images_width, $this->settings->page_images_height, $this->config->page_images_dir);
						}else{
							$this->templates->assign('error', 'error uploading image');
						}
					}
				}
					
				$page_images = $this->pages->get_page_images(array('page_id'=>$page->id));
				
				if(!empty($page->id)){
					$translation->page_id = $page->id;
					$translation->language_id = $language->id;
					
					if($this->pages->delete_page_translation($translation->page_id, $translation->language_id)){
						$this->pages->add_page_translation($translation);
					}
					
					$translation = $this->pages->get_page_translation(intval($page->id), intval($language->id));
				}
				
				$page = (object)array_merge((array)$page, (array)$translation);
			}
		}else
		{
			$page->id = $this->request->get('id', 'integer');
			
			$page = $this->pages->get_page($page->id);
			$translation = $this->pages->get_page_translation(intval($page->id), intval($language->id));
			
			$page = (object)array_merge((array)$page, (array)$translation);
		}
		
		if(empty($page->id)){
			$page = new stdClass;
			$page->visible = 1;
			
			if(!empty($this->request->get('menu_id')))
				$page->menu_id = $this->request->get('menu_id');
		}
		
		if($page->id)
			$page_images = $this->pages->get_page_images(array('page_id'=>$page->id));
	
		$this->templates->assign('page', $page);
		$this->templates->assign('page_images', $page_images);
		$this->templates->assign('language', $language);
		
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
	  		$menu = reset($menus);
	 	$this->templates->assign('menu', $menu);
		
		if(in_array($page->id, array(1,2)))
			$this->templates->assign('system', true);
		
		$filter = array();
		$filter['menu_id'] = $menu_id;
		$filter['language_id'] = $language->id;
		$pages = $this->pages->get_pages($filter);
		$this->templates->assign('pages', $pages);

 	  	return $this->templates->fetch('pages/page.tpl');
	}
	
}
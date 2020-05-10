<?PHP
require_once('api/Engine.php');

class PostAdmin extends Engine
{
	public function fetch()
	{
		$post = new stdClass;
		$translation = new stdClass;
		
		$language_id = $this->request->get('language_id', 'integer');
		
		if(empty($language_id))
			$language = $this->languages->get_main_language();
		else
			$language = $this->languages->get_language(intval($language_id));
		
		$main_language = $this->languages->get_main_language();
		
		if($this->request->method('POST'))
		{
			$post->id = $this->request->post('id', 'integer');
			$post->date = date('Y-m-d H:i:s', strtotime($this->request->post('date')));
			$post->visible = $this->request->post('visible', 'boolean');
			$post->preview_width = $this->request->post('preview_width', 'integer');
			$post->preview_height = $this->request->post('preview_height', 'integer');
			$post->category_id = $this->request->post('category_id', 'integer');
			
			$post->image = $this->request->post('image_old');
			
			if($this->request->post('del_preview', 'integer')){
				$this->news->delete_image($post->image);
				$post->image = '';
			}
			
			$translation->name = $this->request->post('name');
			$translation->url = trim($this->request->post('url', 'string'));
			$translation->meta_title = $this->request->post('meta_title');
			$translation->meta_keywords = $this->request->post('meta_keywords');
			$translation->meta_description = $this->request->post('meta_description');
			$translation->annotation = $this->request->post('annotation');
			$translation->text = $this->request->post('text');
				
			$image = $this->request->files('image');
			if(!empty($image['name'])){
				$this->news->delete_image($post->image);
				$post->image = '';
			}
			
			if(empty($translation->url)){
				$translation->url = $this->request->translit_url($translation->name);
			}else{
				$translation->url = $this->request->translit_url($translation->url);
			}
			
			if(empty($translation->meta_title))
				$translation->meta_title = $translation->name;
			if(empty($translation->meta_keywords))
				$translation->meta_keywords = $translation->name;
			
 			// Не допустить одинаковые URL разделов.
			if(empty($translation->name)){
				$this->templates->assign('message_error', 'empty_name');
			}elseif(($t = $this->news->get_post_translation($translation->url, $language->id)) && $t->post_id!=$post->id){
				$this->templates->assign('message_error', 'url_exists');
			}else{
				if(empty($translation->language_id))
					$translation->language_id = $language->id;
				
				if(empty($post->id))
				{
					$post->id = $this->news->add_post($post);
					$this->templates->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->news->update_post($post->id, $post);
					$this->templates->assign('message_success', 'updated');
  	    		}
								
				if($image)
				{
					if ($image_name = $this->image->upload_image($image['tmp_name'], $image['name'], $this->config->news_image_dir))
					{
						$this->news->add_image($post->id, $image_name);
						$this->image->resize_image($image_name, $post->preview_width, $post->preview_height, $this->config->news_image_dir);
					}
					else
					{
						$this->templates->assign('error', 'error uploading image');
					}
					
					$post = $this->news->get_post($post->id);
				}
				
				if(!empty($post->id)){
					$translation->post_id = $post->id;
					$translation->language_id = $language->id;
					
					if($this->news->delete_post_translation($translation->post_id, $translation->language_id)){
						$this->news->add_post_translation($translation);
					}
					
					$translation = $this->news->get_post_translation(intval($post->id), intval($language->id));
				}
				
				$post = (object)array_merge((array)$post, (array)$translation);
			}
		}
		else
		{
			$post->id = $this->request->get('id', 'integer');
			
			if(!empty($post->id)){
				$post = $this->news->get_post(intval($post->id));		
				$translation = $this->news->get_post_translation(intval($post->id), intval($language->id));
				$post = (object)array_merge((array)$post, (array)$translation);
			}else{
				$post->date = date('Y-m-d H:i:s', time());
				$post->visible = 1;
			}
		}
		
		$this->templates->assign('post', $post);
		
		$this->templates->assign('language', $language);
		
		$languages = $this->languages->get_languages();
		$this->templates->assign('languages', $languages);
		
		$categories = $this->news->get_categories();
		$this->templates->assign('categories', $categories);
		
 	  	return $this->templates->fetch('news/post.tpl');
	}
}
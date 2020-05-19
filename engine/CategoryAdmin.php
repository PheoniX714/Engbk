<?php
require_once('api/Engine.php');

class CategoryAdmin extends Engine
{
	public function fetch()
	{
		$language_id = $this->request->get('language_id', 'integer');
		
		if(empty($language_id))
			$language = $this->languages->get_main_language();
		else
			$language = $this->languages->get_language(intval($language_id));
		
		$main_language = $this->languages->get_main_language();
		
		if($this->request->method('post'))
		{
			$category = new stdClass;
			$translation = new stdClass;		
			
			$category->id = $this->request->post('id', 'integer');
			$category->parent_id = $this->request->post('parent_id', 'integer');
			$category->visible = $this->request->post('visible', 'boolean');
			$category->image = $this->request->post('image_old');
			$category->preview_width = $this->request->post('preview_width', 'integer');
			$category->preview_height = $this->request->post('preview_height', 'integer');
			
			if($this->request->post('del_preview', 'integer')){
				$this->categories->delete_image($category->image);
				$category->image = '';
			}
				
			$image = $this->request->files('image');
			if(!empty($image['name'])){
				$this->categories->delete_image($category->image);
				$category->image = '';
			}
			
			$translation->name = $this->request->post('name');
			$translation->url = trim($this->request->post('url', 'string'));
			$translation->meta_title = $this->request->post('meta_title');
			$translation->meta_keywords = $this->request->post('meta_keywords');
			$translation->meta_description = $this->request->post('meta_description');
			$translation->description = $this->request->post('description');
			
			if(empty($translation->url))
				$translation->url = $this->request->translit($translation->name);
			else
				$translation->url = $this->request->translit($translation->url);
			
			if(empty($translation->meta_title))
				$translation->meta_title = $translation->name;
			if(empty($translation->meta_keywords))
				$translation->meta_keywords = $translation->name;
			
			// Не допустить одинаковые URL разделов.
			if(($t = $this->categories->get_category_translation($category->id, $translation->id)) && $t->category_id!=$category->id)
			{			
				$this->templates->assign('message_error', 'url_exists');
			}
			else
			{
				if(empty($category->id))
				{
					$category->id = $this->categories->add_category($category);
					$this->templates->assign('message_success', 'added');
				}
				else
				{
					$this->categories->update_category($category->id, $category);
					$this->templates->assign('message_success', 'updated');
				}
				// Загрузка изображения
				if($image)
				{
					if ($image_name = $this->image->upload_image($image['tmp_name'], $image['name'], $this->config->category_images_dir))
					{
						$this->categories->add_image($category->id, $image_name);
						$this->image->resize_image($image_name, $category->preview_width, $category->preview_height, $this->config->category_images_dir);
					}
					else
					{
						$this->templates->assign('error', 'error uploading image');
					}
				}
				$category = $this->categories->get_category(intval($category->id));
			}
			
			if(!empty($category->id)){
				$translation->category_id = $category->id;
				$translation->language_id = $language->id;
				
				if($this->categories->delete_category_translation($translation->category_id, $translation->language_id)){
					$this->categories->add_category_translation($translation);
				}
				
				$translation = $this->categories->get_category_translation(intval($category->id), intval($language->id));
			}
			$category = (object)array_merge((array)$category, (array)$translation);
		}
		else
		{
			if(!empty($id = $this->request->get('id', 'integer'))){
				$category = $this->categories->get_category_admin($id);
				$translation = $this->categories->get_category_translation(intval($category->id), intval($language->id));
				
				$category = (object)array_merge((array)$category, (array)$translation);
			}
		}
		
		if(empty($category)){
			$category = new stdClass;
			$category->visible = 1;
			$category->parent_id = $this->request->get('parent_id', 'integer');
		}		
		
		$categories = $this->categories->get_categories_tree(array('language_id' => $main_language->id));
				
		$this->templates->assign('language', $language);
		$this->templates->assign('main_language', $main_language);
		$this->templates->assign('category', $category);
		$this->templates->assign('categories', $categories);
		return  $this->templates->fetch('products/category.tpl');
	}
}
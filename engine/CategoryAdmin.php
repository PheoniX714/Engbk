<?php
require_once('api/Engine.php');

class CategoryAdmin extends Engine
{
  private	$allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');
  
  function fetch()
  {
		$category = new stdClass;
		if($this->request->method('post'))
		{
			$language_id = $this->request->post('language_id', 'integer');
			
			if(!empty($language_id) and $language_id > 1){
				$translation = new stdClass;
				
				$translation->linked_category_id = $this->request->post('id', 'integer');
				$translation->language_id = $this->request->post('language_id', 'integer');
				$translation->name = $this->request->post('name');
				$translation->visible_name = $this->request->post('visible_name');
				$translation->meta_title = $this->request->post('meta_title');
				$translation->meta_keywords = $this->request->post('meta_keywords');
				$translation->meta_description = $this->request->post('meta_description');
				$translation->description = $this->request->post('description');
				
				if(!empty($translation->linked_category_id)){
					$this->categories->delete_category_translation($translation->linked_category_id, $translation->language_id);
					
					if($this->categories->add_category_translation($translation)){
						$translation = $this->categories->get_category_translation(intval($translation->linked_category_id), intval($language_id));
						
						$category = $this->categories->get_category(intval($translation->linked_category_id));
						if($translation){
							$category->name = $translation->name;
							$category->visible_name = $translation->visible_name;
							$category->meta_title = $translation->meta_title;
							$category->meta_keywords = $translation->meta_keywords;
							$category->meta_description = $translation->meta_description;
							$category->description = $translation->description;
						}
						$this->templates->assign('message_success', 'added_translation');
					}
				}
				
			}else{			
				$category->id = $this->request->post('id', 'integer');
				$category->parent_id = $this->request->post('parent_id', 'integer');
				$category->name = $this->request->post('name');
				$category->visible_name = $this->request->post('visible_name');
				$category->visible = $this->request->post('visible', 'boolean');
				
				$category->url = trim($this->request->post('url', 'string'));
				$category->meta_title = $this->request->post('meta_title');
				$category->meta_keywords = $this->request->post('meta_keywords');
				$category->meta_description = $this->request->post('meta_description');
				
				$category->description = $this->request->post('description');
				
				$category->image = $this->request->post('image');
				
				/* $images = $this->request->files('image');
				if(empty($images)){
					$this->categories->delete_image($category->image);
					$category->image = '';
				} */
		
				// Не допустить одинаковые URL разделов.
				if(($c = $this->categories->get_category($category->url)) && $c->id!=$category->id)
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
					/* // Загрузка изображения
					if($images)
					{
						if ($image_name = $this->image->upload_cat_img($images['tmp_name'], $images['name']))
						{
							$this->categories->add_image($category->id, $image_name);
						}
						else
						{
							$this->templates->assign('error', 'error uploading image');
						}
					} */
					$category = $this->categories->get_category(intval($category->id));
				}
				
				if(empty($language_id))
						$language_id = 1;
			}
		}
		else
		{
			$category->id = $this->request->get('id', 'integer');
			$category = $this->categories->get_category($category->id, false);
			
			$language_id = $this->request->get('language_id', 'integer');
			
			if($language_id > 1){
				$translation = $this->categories->get_category_translation(intval($category->id), intval($language_id));
				if(empty($translation)){
					$translation = new stdClass;
					$translation->name = '';
					$translation->visible_name = '';
					$translation->meta_title = '';
					$translation->meta_keywords = '';
					$translation->meta_description = '';
					$translation->description = '';
				}
					
			}else{
				$language_id = 1;
				$translation = false;
			}
			
			if($translation){
				$category->name = $translation->name;
				$category->visible_name = $translation->visible_name;
				$category->meta_title = $translation->meta_title;
				$category->meta_keywords = $translation->meta_keywords;
				$category->meta_description = $translation->meta_description;
				$category->description = $translation->description;
			}
		}
		
		if(empty($category)){
			$category->visible = 1;
			
		}
		
		$this->templates->assign('language_id', $language_id);
		
		$languages = $this->languages->get_languages();
		$this->templates->assign('languages', $languages);

		$categories = $this->categories->get_categories_tree();

		$this->templates->assign('category', $category);
		$this->templates->assign('categories', $categories);
		return  $this->templates->fetch('products/category.tpl');
	}
}
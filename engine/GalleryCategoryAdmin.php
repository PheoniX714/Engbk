<?php
require_once('api/Engine.php');

class GalleryCategoryAdmin extends Engine
{
  private	$allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');
  
  function fetch()
  {
		$category = new stdClass;
		if($this->request->method('post'))
		{
			$category->id = $this->request->post('id', 'integer');
			$category->parent_id = $this->request->post('parent_id', 'integer');
			$category->name = $this->request->post('name');
			$category->visible = $this->request->post('visible', 'boolean');

			$category->url = trim($this->request->post('url', 'string'));
			$category->meta_title = $this->request->post('meta_title');
			$category->meta_keywords = $this->request->post('meta_keywords');
			$category->meta_description = $this->request->post('meta_description');
			
			$category->description = $this->request->post('description');
			
			#$category->image = $this->request->post('filename_old');
			
			#$images = $this->request->files('image');
			#if(empty($images)){
				#$this->gallery_categories->delete_image($category->image);
				#$category->image = '';
			#}
	
			// Не допустить одинаковые URL разделов.
			if(($c = $this->gallery_categories->get_category($category->url)) && $c->id!=$category->id)
			{			
				$this->templates->assign('message_error', 'url_exists');
			}
			else
			{
				if(empty($category->id))
				{
	  				$category->id = $this->gallery_categories->add_category($category);
					$this->templates->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->gallery_categories->update_category($category->id, $category);
					$this->templates->assign('message_success', 'updated');
  	    		}
  	    		// Загрузка изображения
  	    		if($images)
				{
					if ($image_name = $this->image->upload_cat_img($images['tmp_name'], $images['name']))
					{
						$this->gallery_categories->add_image($category->id, $image_name);
					}
					else
					{
						$this->templates->assign('error', 'error uploading image');
					}
				}
				
  	    		$category = $this->gallery_categories->get_category(intval($category->id));
			}
		}
		else
		{
			$category->id = $this->request->get('id', 'integer');
			$category = $this->gallery_categories->get_category($category->id);
		}
		
		if(empty($category)){
			$category->visible = 1;
		}

		$categories = $this->gallery_categories->get_categories_tree();

		$this->templates->assign('category', $category);
		$this->templates->assign('categories', $categories);
		return  $this->templates->fetch('gallery/gallery_category.tpl');
	}
}
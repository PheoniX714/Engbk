<?php

require_once('api/Engine.php');

class BrandAdmin extends Engine
{
	function fetch()
	{
	  	$brand = new stdClass;
		if($this->request->method('post'))
		{
			$brand->id = $this->request->post('id', 'integer');
			$brand->name = $this->request->post('name');
			$brand->description = $this->request->post('description');

			$brand->url = trim($this->request->post('url', 'string'));
			$brand->meta_title = $this->request->post('meta_title');
			$brand->meta_keywords = $this->request->post('meta_keywords');
			$brand->meta_description = $this->request->post('meta_description');
			
			// Не допустить одинаковые URL разделов.
			if(($c = $this->brands->get_brand($brand->url)) && $c->id!=$brand->id)
			{			
				$this->templates->assign('message_error', 'url_exists');
			}
			else
			{
				if(empty($brand->id))
				{
	  				$brand->id = $this->brands->add_brand($brand);
					$this->templates->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->brands->update_brand($brand->id, $brand);
					$this->templates->assign('message_success', 'updated');
  	    		}	
  	    		// Удаление изображения
  	    		if($this->request->post('delete_image'))
  	    		{
  	    			$this->brands->delete_image($brand->id);
  	    		}
  	    		// Загрузка изображения
  	    		$image = $this->request->files('image');
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
	  			$brand = $this->brands->get_brand($brand->id);
			}
		}
		else
		{
			$brand->id = $this->request->get('id', 'integer');
			$brand = $this->brands->get_brand($brand->id);
		}
		
 		$this->templates->assign('brand', $brand);
		return  $this->templates->fetch('products/brand.tpl');
	}
}
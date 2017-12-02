<?PHP

require_once('api/Engine.php');

class GalleryAlbumAdmin extends Engine
{
	public function fetch()
	{
	
		$album_categories = array();
		
		if($this->request->method('post') && !empty($_POST))
		{
			$album = new stdClass;
			$album->id = $this->request->post('id', 'integer');
			$album->name = $this->request->post('name');
			$album->visible = $this->request->post('visible', 'boolean');
			
			$album->url = trim($this->request->post('url', 'string'));
			$album->meta_title = $this->request->post('meta_title');
			$album->meta_keywords = $this->request->post('meta_keywords');
			$album->meta_description = $this->request->post('meta_description');
			
			$album->description = $this->request->post('description');
			
			$album_categories = $this->request->post('categories');
			
			if(is_array($album_categories))
			{
				foreach($album_categories as $c)
				{
					$x = new stdClass;
					$x->id = $c;
					$pc[] = $x;
				}
				$album_categories = $pc;
			}
				
			// Не допустить пустое название товара.
			if(empty($album->name))
			{			
				$this->templates->assign('message_error', 'empty_name');
				if(!empty($album->id))
					$images = $this->gallery_albums->get_images(array('album_id'=>$album->id));
			}
			// Не допустить одинаковые URL разделов.
			elseif(($a = $this->gallery_albums->get_album($album->url)) && $a->id!=$album->id)
			{			
				$this->templates->assign('message_error', 'url_exists');
				if(!empty($album->id))
					$images = $this->gallery_albums->get_images(array('album_id'=>$album->id));
			}
			else
			{
				if(empty($album->id))
				{
	  				$album->id = $this->gallery_albums->add_album($album);
	  				$album = $this->gallery_albums->get_album($album->id);
					$this->templates->assign('message_success', 'added');
					$status = 'added';
	  			}
  	    		else
  	    		{
  	    			$this->gallery_albums->update_album($album->id, $album);
  	    			$album = $this->gallery_albums->get_album($album->id);
					$this->templates->assign('message_success', 'updated');
					$status = 'updated';
  	    		}	
   	    		
   	    		if($album->id)
   	    		{
					// Категории товара
	   	    		$query = $this->db->placehold('DELETE FROM __gallery_album_categories WHERE album_id=?', $album->id);
	   	    		$this->db->query($query);
					
	 	  		    if(is_array($album_categories))
		  		    {
		  		    	foreach($album_categories as $i=>$category)
	   	    				$this->gallery_categories->add_album_category($album->id, $category->id, $i);
	  	    		}
					
					// Загрузка изображений
		  		    if($images = $this->request->files('new_images'))
		  		    {
						$path = 'files/gallery/'.date_format(date_create($album->created), 'Y').'/';
						$path_temp = 'files/gallery/temp/';
						for($i=0; $i<count($images['name']); $i++)
						{
							$name = $this->image->correct_filename($images['name'][$i]);
							$ext = pathinfo($name, PATHINFO_EXTENSION);
							
							if($ext == 'zip'){
								require_once('pclzip/pclzip.lib.php');
								move_uploaded_file($images['tmp_name'][$i], $path_temp.$name);
								
								$archive = new PclZip($path_temp.$name);
								$images_list = $archive->extract(PCLZIP_OPT_PATH, $path_temp );
								
								$allowed_extentions = array('png', 'gif', 'jpg', 'jpeg');
								foreach($images_list as $img){
									if ($image_name = $this->image->upload_image($this->config->root_dir.$img['filename'], $img['stored_filename'], $path))
									{
										$this->gallery_albums->add_image($album->id, $image_name);
									}
									else
									{
										$this->templates->assign('error', 'error uploading image');
									}
								}
								
								unlink($path_temp.$name);
							}else{
								if ($image_name = $this->image->upload_image($images['tmp_name'][$i], $images['name'][$i], $path))
								{
									$this->gallery_albums->add_image($album->id, $image_name);
								}
								else
								{
									$this->templates->assign('error', 'error uploading image');
								}
							}
						}
					}

					$images_positions = $this->request->post('positions'); 
					$images_positions = array_flip($images_positions);
					foreach($images_positions as $id=>$position)
						$this->gallery_albums->update_image($id, array('position'=>$position)); 
						
					if($as_preview = $this->request->post('as-preview'))
						$this->gallery_albums->set_preview_image($album->id, $as_preview);
						
					header('Location: index.php?module=GalleryAlbumAdmin&status='.$status.'&id='.$album->id);
  	    		}
			}
			
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(!empty($ids))
			switch($this->request->post('action'))
			{
			    case 'delete':
			    {
				    foreach($ids as $id)
						$this->gallery_albums->delete_image($id, $values);
			        break;
			    }
			}
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			$album = $this->gallery_albums->get_album(intval($id));

			if($album)
			{
				$album_categories = $this->gallery_categories->get_categories(array('album_id'=>$album->id));
				$a_categories = array();
				foreach($album_categories as $ac){
					$a_categories[$ac->position] = $ac->id;
				}
				
				$images = $this->gallery_albums->get_images(array('album_id'=>$album->id));
				$status = $this->request->get('status');
				if($status == 'updated')
					$this->templates->assign('message_success', 'updated');
				elseif($status == 'added')
					$this->templates->assign('message_success', 'added');
			}
			else
			{
				// Сразу активен
				$album = new stdClass;
				$album->visible = 1;			
			}
		}
		
		if(empty($a_categories))
		{
			if($category_id = $this->request->get('category_id'))
				$a_categories[0] = $category_id;		
			else
				$a_categories = array();
		}
		if($images)
			$album->images = $images;
		
		$this->templates->assign('album', $album);		
		$this->templates->assign('album_categories', $a_categories);
		
		// Все категории
		$categories = $this->gallery_categories->get_categories_tree();
		$this->templates->assign('categories', $categories);
		
 	  	return $this->templates->fetch('gallery/gallery_album.tpl');
	}
}
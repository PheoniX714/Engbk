<?PHP
require_once('api/Engine.php');

class SlideAdmin extends Engine
{	
	public function fetch()
	{	
		$slide = new stdClass;
		if($this->request->method('POST'))
		{
			$slide->id = $this->request->post('id', 'integer');
			$slide->link = $this->request->post('link');
			$slide->filename = $this->request->post('filename');
			$slide->visible = $this->request->post('visible', 'boolean');
			$slide->slider_id = $this->request->post('slider_id', 'integer');				
			$slide->language_id = $this->request->post('language_id', 'integer');				
			/* $filename_old = $this->request->post('filename_old'); */
			
			/* $images = $this->request->files('image');
			if(empty($images)){
				$this->slider->delete_image($slide->filename);
				$slide->filename = '';
			} */
				
			if(empty($slide->id))
			{
	  			$slide->id = $this->slider->add_slide($slide);
	  			$slide = $this->slider->get_slide($slide->id);
	  			$this->templates->assign('message_success', 'added');
  	    	}
  	    	else
  	    	{
  	    		$this->slider->update_slide($slide->id, $slide);
	  			$slide = $this->slider->get_slide($slide->id);
	  			$this->templates->assign('message_success', 'updated');
   	    	}
			
	   	    /* // Загрузка изображения
		  	if($images)
		  	{
				if ($image_name = $this->image->upload_slide($images['tmp_name'], $images['name']))
				{
					$this->slider->add_image($slide->id, $image_name);
				}
				else
				{
					$this->templates->assign('error', 'error uploading image');
				}
				$slide = $this->slider->get_slide($slide->id);
			} */
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			if(!empty($id))
				$slide = $this->slider->get_slide(intval($id));			
			else
			{
				$slide->visible = 1;
				$slide->slider_id = 1;
			}
		}
		$languages = $this->languages->get_languages();
		$this->templates->assign('languages', $languages);
		
		$this->templates->assign('slide', $slide);
 	  	return $this->templates->fetch('slider/slide.tpl');
	}
	
}


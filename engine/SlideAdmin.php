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
			$slide->visible = $this->request->post('visible', 'boolean');
			
			$image = $this->request->files('image');
			if(!empty($image['name'])){
				$s = $this->slider->get_slide($slide->id);
				$this->slider->delete_image($s->filename);
				$slide->filename = '';
			}
			
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
			
			if($image)
			{
				if ($image_name = $this->image->upload_image($image['tmp_name'], $image['name'], 'files/slider/'))
				{
					$this->slider->add_image($slide->id, $image_name);
				}
				else
				{
					$this->templates->assign('error', 'error uploading image');
				}
			}
			$slide = $this->slider->get_slide($slide->id);
			
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			if(!empty($id))
				$slide = $this->slider->get_slide(intval($id));			
			else
			{
				$slide->visible = 1;
			}
		}
		
		$this->templates->assign('slide', $slide);
 	  	return $this->templates->fetch('slider/slide.tpl');
	}
	
}


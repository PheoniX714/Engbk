<?PHP

require_once('api/Engine.php');

class PostAdmin extends Engine
{
	public function fetch()
	{
		$post = new stdClass;
		if($this->request->method('post'))
		{
			$post->id = $this->request->post('id', 'integer');
			$post->name = $this->request->post('name');
			$post->date = date('Y-m-d', strtotime($this->request->post('date')));
			
			$post->visible = $this->request->post('visible', 'boolean');

			$post->url = trim($this->request->post('url', 'string'));
			$post->meta_title = $this->request->post('meta_title');
			$post->meta_keywords = $this->request->post('meta_keywords');
			$post->meta_description = $this->request->post('meta_description');
			
			$post->annotation = $this->request->post('annotation');
			$post->text = $this->request->post('body');
			
			$post->image = $this->request->post('image');

 			// Не допустить одинаковые URL разделов.
			if(($a = $this->news->get_post($post->url)) && $a->id!=$post->id)
			{			
				$this->templates->assign('message_error', 'url_exists');
			}
			else
			{
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

				$post = $this->news->get_post($post->id);
				
			}
		}
		else
		{
			$post->id = $this->request->get('id', 'integer');
			$post = $this->news->get_post(intval($post->id));
		}

		if(empty($post))
		{
			$post = new stdClass;
			$post->date = date($this->settings->date_format, time());
			$post->visible = 1;
		}
 		
		$this->templates->assign('post', $post);
		
		
 	  	return $this->templates->fetch('news/post.tpl');
	}
}
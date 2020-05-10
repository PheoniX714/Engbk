<?PHP
require_once('api/Engine.php');

class SettingsAdmin extends Engine
{	
	private $allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');
	
	public function fetch()
	{	
		$managers = $this->managers->get_managers();
		$this->templates->assign('managers', $managers);
 
 		if($this->request->method('POST'))
		{
			$this->settings->site_name = $this->request->post('site_name');
			$this->settings->date_format = $this->request->post('date_format');
			
			$this->settings->page_preview_width = $this->request->post('page_preview_width');
			$this->settings->page_preview_height = $this->request->post('page_preview_height');
			$this->settings->page_images_width = $this->request->post('page_images_width');
			$this->settings->page_images_height = $this->request->post('page_images_height');
			$this->settings->post_preview_width = $this->request->post('post_preview_width');
			$this->settings->post_preview_height = $this->request->post('post_preview_height');
			$this->settings->category_preview_width = $this->request->post('category_preview_width');
			$this->settings->category_preview_height = $this->request->post('category_preview_height');
			$this->settings->brand_preview_width = $this->request->post('brand_preview_width');
			$this->settings->brand_preview_height = $this->request->post('brand_preview_height');
			$this->settings->product_images_width = $this->request->post('product_images_width');
			$this->settings->product_images_height = $this->request->post('product_images_height');
			
			$this->settings->theme = 'default';
						
			$this->settings->order_email = $this->request->post('order_email');
			$this->settings->comment_email = $this->request->post('comment_email');
			$this->settings->notify_from_email = $this->request->post('notify_from_email');

			$this->templates->assign('message_success', 'saved');
		}
		
 	  	return $this->templates->fetch('settings/settings.tpl');
	}
	
}


<?PHP
require_once('api/Engine.php');

class SettingsAdmin extends Engine
{	
	private $allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');
	
	public function fetch()
	{	
		$this->passwd_file = $this->config->root_dir.'/engine/.passwd';
		$this->htaccess_file = $this->config->root_dir.'/engine/.htaccess';
		

		$managers = $this->managers->get_managers();
		$this->templates->assign('managers', $managers);
		$this->templates->assign('themes',    $this->templates->get_themes());
 
 		if($this->request->method('POST'))
		{
			$this->settings->site_name = $this->request->post('site_name');
			$this->settings->company_name = $this->request->post('company_name');
			$this->settings->date_format = $this->request->post('date_format');
			$this->settings->admin_email = $this->request->post('admin_email');
			
			
			$this->settings->order_email = $this->request->post('order_email');
			$this->settings->comment_email = $this->request->post('comment_email');
			$this->settings->notify_from_email = $this->request->post('notify_from_email');
			
			$this->settings->opt_point_1 = $this->request->post('opt_point_1');
			$this->settings->opt_point_2 = $this->request->post('opt_point_2');
			$this->settings->opt_point_3 = $this->request->post('opt_point_3');
			
			$this->settings->h_contacts = $this->request->post('h_contacts');
			
			$this->settings->f_contacts = $this->request->post('f_contacts');

			$this->templates->assign('message_success', 'saved');
		}
 	  	return $this->templates->fetch('settings/settings.tpl');
	}
	
}


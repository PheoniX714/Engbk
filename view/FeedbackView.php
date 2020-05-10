<?PHP

require_once('View.php');

class FeedbackView extends View
{
	function fetch()
	{
		if($this->request->method('post') && $this->request->post('feedback'))
		{
			$feedback->name         = $this->request->post('name');
			$feedback->email        = $this->request->post('email');
			$feedback->phone        = '';
			$feedback->message      = $this->request->post('message');
			$captcha_code           = $this->request->post('captcha_code');
			
			$this->templates->assign('name',  $feedback->name);
			$this->templates->assign('email', $feedback->email);
			$this->templates->assign('phone',  $callback->phone);
			$this->templates->assign('message', $feedback->message);
			
			if(empty($feedback->name))
				$this->templates->assign('error', 'empty_name');
			elseif(empty($feedback->email))
				$this->templates->assign('error', 'empty_email');
			elseif(empty($feedback->message))
				$this->templates->assign('error', 'empty_text');
			elseif(empty($_SESSION['captcha_code']) || $_SESSION['captcha_code'] != $captcha_code || empty($captcha_code))
			{
				$this->templates->assign('error', 'captcha');
			}
			else
			{
				$this->templates->assign('message_sent', true);
				
				$feedback->ip = $_SERVER['REMOTE_ADDR'];
				#$feedback_id = $this->feedbacks->add_feedback($feedback);
				
				// Отправляем email
				$this->notify->email_feedback_admin($feedback);
				
				// Приберем сохраненную капчу, иначе можно отключить загрузку рисунков и постить старую
				unset($_SESSION['captcha_code']);
								
			}
		}
		
		if($this->page)
		{
			$page_group = $this->pages->get_page_group($this->page->id);
			$this->templates->assign('page_group', $page_group);
			
			$this->templates->assign('meta_title', $this->page->meta_title);
			$this->templates->assign('meta_keywords', $this->page->meta_keywords);
			$this->templates->assign('meta_description', $this->page->meta_description);
		}

		$body = $this->templates->fetch('feedback.tpl');
		
		return $body;
	}
}

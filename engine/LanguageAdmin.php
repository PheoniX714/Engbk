<?php
require_once('api/Engine.php');

class LanguageAdmin extends Engine
{	
	public function fetch()
	{
		if($this->request->method('post'))
		{
			$language = new stdClass();
			$language->id = $this->request->post('id', 'integer');
			$language->name = $this->request->post('name');
			$language->code = substr($this->request->post('code'), 0, 2);
			$language->currency_id = $this->request->post('currency_id', 'integer');
			
			
			if(empty($language->name))
			{
				$this->templates->assign('message_error', 'empty_name');			
			}
			elseif(empty($language->code))
			{
	  			$this->templates->assign('message_error', 'empty_code');
			}
			else
			{	
				if(empty($language->id))
				{
					$language->id = $this->languages->add_language($language);
	  				$this->templates->assign('message_success', 'added');
	  			}
		    	else
		    	{
					$language->id = $this->languages->update_language($language->id, $language);
					$this->templates->assign('message_success', 'updated');
	  			}
		    	$language = $this->languages->get_language($language->id);
	    	}
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			if(!empty($id))
				$language = $this->languages->get_language(intval($id));
			
		}

		if(!empty($language))
		{
			$this->templates->assign('l', $language);
			
		}
		
		$currencies = $this->money->get_currencies();
	 	$this->templates->assign('currencies', $currencies);
		
 	  	return $this->templates->fetch('settings/language.tpl');
	}
	
}


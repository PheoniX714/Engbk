<?php
error_reporting(E_ERROR);
require_once('api/Engine.php');

class LangConstantsAdmin extends Engine
{	
	public function fetch()
	{
		if($this->request->method('post'))
		{
			$new_constants = array();
			$new_constants = $this->request->post('new_constants');
			foreach($new_constants as $nc){
				$new_constant = new stdClass;
				$new_constant->value = $this->request->translit(trim($nc));
				if($new_constant)
					$this->languages->add_constant($new_constant);
			}
			
			$constants = array();
			$constants = $this->request->post('constants');
			foreach($constants as $id=>$constant){
				$constant = $this->request->translit(trim($constant));
				if($constant)
					$this->languages->update_constant($id, array('value'=>$constant));
			}
			
			$constants_values = array();
			$constants_values = $this->request->post('constants_values');
			
			foreach($constants_values as $constant_id=>$values){
				if($constant_id){
					$query = $this->db->placehold('DELETE FROM __languages_variables WHERE constant_id=?', $constant_id);
					$this->db->query($query);
					
					foreach($values as $lang_code=>$v){
						if($lang_code){
							$value = new stdClass();
							$value->constant_id = $constant_id;
							$value->value = trim($v);
							$value->language = $lang_code;
							
							$this->languages->add_constant_value($value);
						}
					}
				}
			}
			
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
				case 'delete':
				{
					foreach($ids as $id)
						$this->languages->delete_constant($id);    
					break;
				}
			}		
			
			$this->templates->assign('message_success', 'saved');
		}
		
		$mode = $this->request->get('mode');
		if($mode == 'edit')
			$this->templates->assign('mode', 'edit');
		else
			$this->templates->assign('mode', 'view');
		
		$languages = $this->languages->get_languages();
	 	$this->templates->assign('languages', $languages);

		$constants = $this->languages->get_constants();
	 	$this->templates->assign('constants', $constants);
		
		$constants_values = array();
		foreach($this->languages->get_constants_values() as $cv){
			$constants_values[$cv->constant_id][$cv->language] = $cv->value;
		}
	 	$this->templates->assign('constants_values', $constants_values);
		
 	  	return $this->templates->fetch('settings/lang_constants.tpl');
	}
	
}


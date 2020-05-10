<?php 

require_once('api/Engine.php');

class LanguagesAdmin extends Engine
{
	public function fetch()
	{
	   	// Обработка действий
		if($this->request->method('post'))
		{
			// Сортировка
			$positions = $this->request->post('positions'); 		
			$ids = array_keys($positions);
			sort($positions);
			foreach($positions as $i=>$position)
				$this->languages->update_language($ids[$i], array('position'=>$position)); 
			
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
				case 'disable':
				{
					$this->languages->update_language($ids, array('visible'=>0));	      
					break;
				}
				case 'enable':
				{
					$this->languages->update_language($ids, array('visible'=>1));	      
					break;
				}
				case 'delete':
				{
					foreach($ids as $id)
						$this->languages->delete_language($id);    
					break;
				}
			}		
			
		}

		// Отображение
	  	$languages = $this->languages->get_languages();
		
		$currencies = array();
		$cur = $this->money->get_currencies();
		foreach($cur as $c){
			$currencies[$c->id] = $c;
		}
		foreach($languages as $k=>$l){
			$languages[$k]->currency_id = $currencies[$l->currency_id]->name;
		}
		
	 	$this->templates->assign('languages', $languages);
		
		return $this->templates->fetch('settings/languages.tpl');
	}
}
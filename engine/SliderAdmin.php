<?PHP 

require_once('api/Engine.php');

########################################
class SliderAdmin extends Engine
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
			$this->slider->update_slide($ids[$i], array('position'=>$position)); 

		
		// Действия с выбранными
		$ids = $this->request->post('check');
		if(is_array($ids))
		switch($this->request->post('action'))
		{
		    case 'disable':
		    {
				$this->slider->update_slide($ids, array('visible'=>0));	      
				break;
		    }
		    case 'enable':
		    {
				$this->slider->update_slide($ids, array('visible'=>1));	      
		        break;
		    }
		    case 'delete':
		    {
			    foreach($ids as $id)
					$this->slider->delete_slide($id);    
		        break;
		    }
		}		
		
 	}

  

	// Отображение
  	$slides = $this->slider->get_slides();

 	$this->templates->assign('slides', $slides);
	return $this->templates->fetch('slider/slider.tpl');
  }
}


?>
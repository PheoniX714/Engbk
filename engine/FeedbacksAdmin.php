<?PHP 

require_once('api/Engine.php');

########################################
class FeedbacksAdmin extends Engine
{


  function fetch()
  {
  
    // Поиск
  	$keyword = $this->request->get('keyword', 'string');
  	if(!empty($keyword))
  	{
	  	$filter['keyword'] = $keyword;
 		$this->templates->assign('keyword', $keyword);
	}

  
  	// Обработка действий 	
  	if($this->request->method('post'))
  	{
		// Действия с выбранными
		$ids = $this->request->post('check');
		if(!empty($ids))
		switch($this->request->post('action'))
		{
		    case 'delete':
		    {
				foreach($ids as $id)
					$this->feedbacks->delete_feedback($id);    
		        break;
		    }
		}		
		
 	}

  	// Отображение
	$filter = array();
	$filter['page'] = max(1, $this->request->get('page', 'integer')); 		
	$filter['limit'] = 40;

	// Поиск
	$keyword = $this->request->get('keyword', 'string');
	if(!empty($keyword))
	{
		$filter['keyword'] = $keyword;
		$this->templates->assign('keyword', $keyword);
	}		

  	$feedbacks_count = $this->feedbacks->count_feedbacks($filter);
	// Показать все страницы сразу
	if($this->request->get('page') == 'all')
		$filter['limit'] = $feedbacks_count;	
  	
  	$feedbacks = $this->feedbacks->get_feedbacks($filter, true);

 	$this->templates->assign('pages_count', ceil($feedbacks_count/$filter['limit']));
 	$this->templates->assign('current_page', $filter['page']);

 	$this->templates->assign('feedbacks', $feedbacks);
 	$this->templates->assign('feedbacks_count', $feedbacks_count);

	return $this->templates->fetch('feedbacks.tpl');
  }
}


?>
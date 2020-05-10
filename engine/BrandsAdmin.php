<?PHP

require_once('api/Engine.php');

class BrandsAdmin extends Engine
{
	function fetch()
	{

		// Обработка действий 	
		if($this->request->method('post'))
		{

			// Действия с выбранными
			$ids = $this->request->post('check');

			if(is_array($ids))
			switch($this->request->post('action'))
			{
				case 'delete':
				{
					foreach($ids as $id)
						$this->brands->delete_brand($id);    
		        break;
				}
			}
		}	
		
		
		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer')); 		
		$filter['limit'] = 20;
		
		$keyword = $this->request->get('keyword', 'string');
		if(!empty($keyword))
		{
			$filter['keyword'] = $keyword;
			$this->templates->assign('keyword', $keyword);
		}		
		
		$brands_count = $this->brands->count_brands($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$filter['limit'] = $brands_count;	
		
		$this->templates->assign('brands_count', $brands_count);
		
		$this->templates->assign('pages_count', ceil($brands_count/$filter['limit']));
		$this->templates->assign('current_page', $filter['page']);
		
		$brands = $this->brands->get_brands($filter);
 
		$this->templates->assign('brands', $brands);
		return $this->body = $this->templates->fetch('products/brands.tpl');
	}
}


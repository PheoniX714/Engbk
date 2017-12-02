<?php

require_once('api/Engine.php');

class ProductsGroupsAdmin extends Engine
{
	function fetch()
	{
		if($this->request->method('post'))
		{
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
			    case 'disable':
			    {
			    	foreach($ids as $id)
						$this->products->update_category($id, array('visible'=>0));    
					break;
			    }
			    case 'enable':
			    {
			    	foreach($ids as $id)
						$this->products->update_category($id, array('visible'=>1));    
			        break;
			    }
			    case 'delete':
			    {
					foreach($ids as $id)
						$this->products->delete_group($id);    
			        break;
			    }
			}
		}  
		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer'));
		$filter['limit'] = 20;
		
		$groups_count = $this->products->count_groups($filter);
		
		if($filter['limit']>0)	  	
		  	$pages_count = ceil($groups_count/$filter['limit']);
		else
		  	$pages_count = 0;
	  	$filter['page'] = min($filter['page'], $pages_count);
	 	$this->templates->assign('groups_count', $groups_count);
	 	$this->templates->assign('pages_count', $pages_count);
	 	$this->templates->assign('current_page', $filter['page']);
		
		
		$groups = $this->products->get_groups($filter);

		$this->templates->assign('groups', $groups);
		return $this->templates->fetch('products/products_groups.tpl');
	}
}
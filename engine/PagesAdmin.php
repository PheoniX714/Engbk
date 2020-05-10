<?php 

require_once('api/Engine.php');

class PagesAdmin extends Engine
{
	public function fetch()
	{
		$language = $this->languages->get_main_language();
		$this->templates->assign('main_language', $language);
				
		$menu_id = $this->request->get('menu_id', 'integer'); 
		
		if(empty($menu_id))
			$menu_id = 1;
		
		$menu = $this->pages->get_menu($menu_id);
		$this->templates->assign('menu', $menu);

		if($this->request->method('post'))
		{
			$filter_language = $this->request->post('filter_language');
			
			$positions = $this->request->post('positions');
			
			if(is_array($positions)){
				$ids = array_keys($positions);
				sort($positions);
				foreach($positions as $i=>$position)
					$this->pages->update_page($ids[$i], array('position'=>$position)); 
			}
			
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
				case 'disable':
				{
					$this->pages->update_page($ids, array('visible'=>0));	      
					break;
				}
				case 'enable':
				{
					$this->pages->update_page($ids, array('visible'=>1));	      
					break;
				}
				case 'delete':
				{
					foreach($ids as $id)
						$this->pages->delete_page($id);

			        break;
				}
			}
		}
		
		if(empty($filter_language))
			$filter_language = $language->id;
		$this->templates->assign('filter_language', $filter_language);
		
		$pages = $this->pages->get_pages(array('menu_id'=>$menu->id, 'language_id'=>$filter_language, 'need_translate'=>true, 'tree'=>true));
		
		$this->templates->assign('pages', $pages);
		return $this->templates->fetch('pages/pages.tpl');
	}
}
<?php
require_once('Engine.php');

class Pages extends Engine
{	
	public function get_page($id) 
	{
		$where = $this->db->placehold(' WHERE id=? ', intval($id));
		$query = "SELECT id, image, menu_id, parent_id, preview_width, preview_height, position, visible FROM __pages $where LIMIT 1";
		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_pages($filter = array())
	{	
		$menu_filter = '';
		$visible_filter = '';
		$translation_columns = '';
		$translation_join = '';
		$pages = array();
		
		if(isset($filter['menu_id']))
			$menu_filter = $this->db->placehold('AND p.menu_id in (?@)', (array)$filter['menu_id']);

		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND p.visible = ?', intval($filter['visible']));
		
		if(isset($filter['language_id'])){
			$translation_columns = $this->db->placehold(', pt.language_id, pt.name, pt.meta_title, pt.meta_description, pt.meta_keywords, pt.text, pt.url');
			$translation_join = $this->db->placehold('LEFT JOIN __pages_translations pt ON p.id = pt.page_id AND pt.language_id=?', intval($filter['language_id']));
		}
		
		$query = "SELECT p.id, p.image, p.menu_id, p.parent_id, p.preview_width, p.preview_height, p.position, p.visible $translation_columns FROM __pages p $translation_join WHERE 1 $menu_filter $visible_filter ORDER BY position";
		$this->db->query($query);
		
		$pages = $this->db->results();
		
		if(isset($filter['need_translate'])){
			$languages = $this->languages->get_languages();
			$languages_codes = array();
			foreach($languages as $l)
				$languages_codes[$l->code] = $l->id;
			
			$p_ids = array();
			foreach($pages as $p)
				$p_ids[] = $p->id;
			
			$pages_groups = $this->get_page_group($p_ids);
							
			if(count($languages) > 1){
				foreach($pages as $p){
					$existing_translations = array();
					foreach($pages_groups[$p->id] as $pg)
						$existing_translations[] = $pg->language_id;
					$need_translate = array_diff($languages_codes, $existing_translations);
					$p->need_translate = array_flip($need_translate);
				}
			}else{
				foreach($pages as $p){
					$p->need_translate = '';
				}
			}
		}
		
		if(isset($filter['tree'])){
			$tree = new stdClass();
			$tree->subcategories = array();
			
			$pointers = array();
			$pointers[0] = &$tree;
			
			$finish = false;
			while(!empty($pages) && !$finish)
			{
				$flag = false;
				foreach($pages as $k=>$page)
				{
					if(isset($pointers[$page->parent_id]))
					{
						$pointers[$page->id] = $pointers[$page->parent_id]->subcategories[] = $page;
						unset($pages[$k]);
						$flag = true;
					}
				}
				if(!$flag) $finish = true;
			}
			unset($pointers[0]);
			$pages = $tree->subcategories;
		}
		
		return $pages;
	}
	
	public function add_page($page)
	{	
		$query = $this->db->placehold('INSERT INTO __pages SET ?%', $page);
		if(!$this->db->query($query))
			return false;

		$id = $this->db->insert_id();
		$this->db->query("UPDATE __pages SET position=id WHERE id=?", $id);	
		return $id;
	}
	
	public function update_page($id, $page)
	{	
		$page = (object)$page;
		if($id == 1 or $id == 2)
			$page->visible = 1;
		
		$query = $this->db->placehold('UPDATE __pages SET ?% WHERE id in (?@)', $page, (array)$id);
		if(!$this->db->query($query))
			return false;
		return $id;
	}
	
	public function delete_page($id)
	{
		$page = $this->get_page(intval($id));
		
		if($page->id == 1 or $page->id == 2)
			return false;
		
		if(!empty($page->id))
		{
			$query = $this->db->placehold("DELETE FROM __pages WHERE id=? LIMIT 1", intval($page->id));
			if($this->db->query($query)){
				$query = $this->db->placehold("DELETE FROM __pages_translations WHERE page_id=?", $page->id);
				$this->db->query($query);
				$query = $this->db->placehold("SELECT count(*) as count FROM __pages WHERE id=? LIMIT 1", $page->id);
				$this->db->query($query);
				$count = $this->db->result('count');
				if($count == 0)
				{
					foreach($this->get_page_images(array('page_id'=>$page->id)) as $pi)
						$this->delete_page_image($pi->id);
					
					$this->delete_image($page->image);
				}
				return true;
			}
		}
		return false;
	}
	
	/*
	*
	* Функции формирования меню сайта
	*
	*/
	public function get_menu($menu_id)
	{	
		$query = $this->db->placehold("SELECT * FROM __menu WHERE id=? LIMIT 1", intval($menu_id));
		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_menus()
	{
		$menus = array();
		$query = "SELECT * FROM __menu ORDER BY position";
		$this->db->query($query);
		foreach($this->db->results() as $menu)
			$menus[$menu->id] = $menu;
		return $menus;
	}
	public function add_menu($menu)
	{	
		$query = $this->db->placehold('INSERT INTO __menu SET ?%', $menu);
		if(!$this->db->query($query))
			return false;

		$id = $this->db->insert_id();
		$this->db->query("UPDATE __menu SET position=id WHERE id=?", $id);	
		return $id;
	}
	public function update_menu($id, $menu)
	{	
		$query = $this->db->placehold('UPDATE __menu SET ?% WHERE id in (?@)', $menu, (array)$id);
		if(!$this->db->query($query))
			return false;
		return $id;
	}
	public function delete_menu($id)
	{
		$menu = $this->get_menu(intval($id));
		
		if($menu->id == 1)
			return false;
		
		if(!empty($menu->id))
		{
			$query = $this->db->placehold("DELETE FROM __menu WHERE id=? LIMIT 1", intval($menu->id));
			if($this->db->query($query)){
				$query = $this->db->placehold("UPDATE __pages SET menu_id=1 WHERE menu_id=?", intval($menu->id));
				$this->db->query($query);
				return true;
			}
		}
		return false;
	}
	
	public function get_menu_pages($filter = array())
	{	
		$visible_filter = '';
		$translation_columns = '';
		$translation_join = '';
		$pages = array();

		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND visible = ?', intval($filter['visible']));
		
		if(isset($filter['language_id'])){
			$translation_columns = $this->db->placehold(', pt.language_id, pt.name, pt.url');
			$translation_join = $this->db->placehold('LEFT JOIN __pages_translations pt ON p.id = pt.page_id AND pt.language_id=?', intval($filter['language_id']));
		}
		
		$query = "SELECT p.id, p.menu_id, p.parent_id, p.position, p.visible $translation_columns FROM __pages p $translation_join WHERE 1 $visible_filter ORDER BY position";
		$this->db->query($query);
		$pages = $this->db->results();
		
		$tree = new stdClass();
		$tree->subcategories = array();
		
		$pointers = array();
		$pointers[0] = &$tree;
		
		$finish = false;
		while(!empty($pages) && !$finish)
		{
			$flag = false;
			foreach($pages as $k=>$page)
			{
				if(isset($pointers[$page->parent_id]))
				{
					$pointers[$page->id] = $pointers[$page->parent_id]->subcategories[] = $page;
					unset($pages[$k]);
					$flag = true;
				}
			}
			if(!$flag) $finish = true;
		}
		unset($pointers[0]);
		$pages = $tree->subcategories;
		
		return $pages;
	}
	
	/***
		
		Превью страницы
		
	***/
	
	public function add_image($id, $image)
	{
		$query = $this->db->placehold("UPDATE __pages SET image=? WHERE id=?", $image, intval($id));
		$this->db->query($query);
		return($id);
	}
	
	public function delete_image($image)
	{
		@unlink($this->config->root_dir.'files/pages/'.$image);		
	}	
	
	/***
		
		Мультиязычность страниц
		
	***/
	
	public function get_page_translation($id, $language_id=null)
	{
		if(gettype($id) == 'string')
			$where = $this->db->placehold('url=?', $id);
		else
			$where = $this->db->placehold('page_id=? ', intval($id));
		
		if(!empty($language_id))
			$where .= $this->db->placehold('AND language_id=?', intval($language_id));
		
		
		$query = "SELECT page_id, language_id, name, meta_title, meta_description, meta_keywords, text, url
		          FROM __pages_translations WHERE $where LIMIT 1";
		
		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_page_translations($language_id)
	{
		$where = $this->db->placehold(' WHERE language_id=?', intval($language_id));
		
		$query = "SELECT page_id, language_id, name, meta_title, meta_description, meta_keywords, text, url FROM __pages_translations $where ORDER BY page_id";

		$this->db->query($query);
		return $this->db->results();
	}
	
	public function get_pages_translations($filter = array())
	{
		$visible_filter = '';
		
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('INNER JOIN __pages p ON p.id = pt.page_id AND p.visible=?', intval($filter['visible']));
				
		$query = "SELECT page_id, language_id, name, url FROM __pages_translations pt $visible_filter ORDER BY page_id";
		$this->db->query($query);
		return $this->db->results();
	}
	
	public function add_page_translation($translation)
	{	
		$query = $this->db->placehold('INSERT INTO __pages_translations SET ?%', $translation);
		if(!$this->db->query($query))
			return false;
		
		return true;
	}
	
	public function delete_page_translation($id, $language_id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __pages_translations WHERE page_id=? AND language_id=? LIMIT 1", intval($id), intval($language_id));
			if($this->db->query($query))
				return true;
		}
		return false;
	}	
	public function get_page_group($id)
	{
		$where = $this->db->placehold(' WHERE page_id in (?@)', (array)$id);
		
		$query = "SELECT page_id, language_id, name, url FROM __pages_translations $where ";

		$this->db->query($query);
		$cg = array();
		foreach($this->db->results() as $c){
			$cg[$c->page_id][$c->language_id] = $c;
		}
		return $cg;
	}
	
	
	/***
		
		Дополнительные изображения страницы
		
	***/
	
	public function get_page_images($filter = array())
	{		
		$limit = 1000;
		$page = 1;
		$lang_group_filter = '';
				
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));
		
		if(!empty($filter['page_id']))
			$lang_group_filter = $this->db->placehold('AND pi.page_id in(?@)', (array)$filter['page_id']);
		
		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

		$query = $this->db->placehold("SELECT pi.id, pi.page_id, pi.name, pi.filename, pi.position
									FROM __pages_images AS pi WHERE 1 $lang_group_filter ORDER BY pi.page_id, pi.position $sql_limit");
		$this->db->query($query);
		return $this->db->results();
	}
	
	public function count_page_images($filter = array())
	{	
		$lang_group_filter = '';
		
		if(!empty($filter['page_id']))
			$lang_group_filter = $this->db->placehold('AND pi.page_id in(?@)', (array)$filter['page_id']);
		
		$query = "SELECT COUNT(distinct pi.id) as count
		          FROM __pages_images AS pi WHERE 1 $lang_group_filter";

		if($this->db->query($query))
			return $this->db->result('count');
		else
			return false;
	}
	
	public function add_page_image($page_id, $filename, $name = '')
	{
		$query = $this->db->placehold("SELECT id FROM __pages_images WHERE page_id=? AND filename=?", $page_id, $filename);
		$this->db->query($query);
		$id = $this->db->result('id');
		if(empty($id))
		{
			$query = $this->db->placehold("INSERT INTO __pages_images SET page_id=?, filename=?", $page_id, $filename);
			$this->db->query($query);
			$id = $this->db->insert_id();
			$query = $this->db->placehold("UPDATE __pages_images SET position=id WHERE id=?", $id);
			$this->db->query($query);
		}
		return($id);
	}
	
	public function update_page_image($id, $image)
	{
		$query = $this->db->placehold("UPDATE __pages_images SET ?% WHERE id=?", $image, $id);
		$this->db->query($query);
		
		return($id);
	}
	
	public function delete_page_image($id)
	{
		$query = $this->db->placehold("SELECT filename FROM __pages_images WHERE id=? LIMIT 1", intval($id));
		$this->db->query($query);
		$filename = $this->db->result('filename');
		$query = $this->db->placehold("DELETE FROM __pages_images WHERE id=? LIMIT 1", intval($id));
		$this->db->query($query);
		$query = $this->db->placehold("SELECT count(*) as count FROM __pages_images WHERE filename=? LIMIT 1", $filename);
		$this->db->query($query);
		$count = $this->db->result('count');
		if($count == 0)
			@unlink($this->config->root_dir.$this->config->page_images_dir.$filename);
	}
}
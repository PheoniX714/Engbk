<?php
require_once('Engine.php');

class Pages extends Engine
{

	private $all_pagess;
	private $pages_tree;
	
	public function get_page($id)
	{
		if(gettype($id) == 'string')
			$where = $this->db->placehold(' WHERE url=? ', $id);
		else
			$where = $this->db->placehold(' WHERE id=? ', intval($id));
		
		$query = "SELECT id, url, pre_url, header, name, image, meta_title, meta_description, meta_keywords, body, menu_id, parent_id, position, visible
		          FROM __pages $where LIMIT 1";

		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_page_translation($id, $language_id)
	{
		$where = $this->db->placehold(' WHERE linked_page_id=? AND language_id=?', intval($id), intval($language_id));
		
		$query = "SELECT linked_page_id, language_id, header, name, meta_title, meta_description, meta_keywords, body
		          FROM __translations_pages $where LIMIT 1";

		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_pages_translations($language_id)
	{
		$where = $this->db->placehold(' WHERE language_id=?', intval($language_id));
		
		$query = "SELECT linked_page_id, name FROM __translations_pages $where ORDER BY linked_page_id";

		$this->db->query($query);
		return $this->db->results();
	}
	
	/*
	*
	* Функция возвращает массив страниц, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function get_pages($filter = array())
	{	
		$menu_filter = '';
		$visible_filter = '';
		$pages = array();
		
		if(!isset($this->pages_tree))
			$this->init_pages();

		if(isset($filter['menu_id']))
			$menu_filter = $this->db->placehold('AND menu_id in (?@)', (array)$filter['menu_id']);

		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND visible = ?', intval($filter['visible']));
		
		$query = "SELECT id FROM __pages WHERE 1 $menu_filter $visible_filter AND parent_id=0 ORDER BY position";
		$this->db->query($query);
		$pages_ids = $this->db->results('id');
		$result = array();
		foreach($pages_ids as $id)
			if(isset($this->all_pages[$id]))
				$result[$id] = $this->all_pages[$id];
		return $result;
	}
	
	public function get_menu_pages($filter = array())
	{	
		$visible_filter = '';
		$pages = array();
		
		if(isset($filter['language_id']) and $filter['language_id'] != 1){
			$translations = array();
			foreach($this->get_pages_translations(intval($filter['language_id'])) as $t){
				$translations[$t->linked_page_id] = $t->name;
			}
		}
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND visible = ?', intval($filter['visible']));
		
		$query = "SELECT id, url, pre_url, name, menu_id, parent_id FROM __pages WHERE 1 $menu_filter $visible_filter ORDER BY position";
		$this->db->query($query);
		$pages = $this->db->results();
		
		$subpages = array();
		foreach($pages as $p){
			if($translations and !empty($translations[$p->id]))
				$p->name = $translations[$p->id];
			
			if($p->parent_id != 0)
				$subpages[$p->parent_id][] = $p;
			
		}
		
		$result = array();
		foreach($pages as $ps){
			if($ps->parent_id == 0){
				$ps->subpages = $subpages[$ps->id];
				$result[] = $ps;
			}
		}	
		return $result;
	}


	/*
	*
	* Создание страницы
	*
	*/	
	public function add_page($page)
	{	
		$query = $this->db->placehold('INSERT INTO __pages SET ?%', $page);
		if(!$this->db->query($query))
			return false;

		$id = $this->db->insert_id();
		$this->db->query("UPDATE __pages SET position=id WHERE id=?", $id);	
		unset($this->all_pagess);	
		unset($this->pages_tree);
		return $id;
	}
	
	public function add_page_translation($translation)
	{	
		$query = $this->db->placehold('INSERT INTO __translations_pages SET ?%', $translation);
		if(!$this->db->query($query))
			return false;
		
		return true;
	}
	
	public function delete_page_translation($id, $language_id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __translations_pages WHERE linked_page_id=? AND language_id=? LIMIT 1", intval($id), intval($language_id));
			if($this->db->query($query))
				return true;
		}
		return false;
	}	
	
	/*
	*
	* Обновить страницу
	*
	*/
	public function update_page($id, $page)
	{	
		$query = $this->db->placehold('UPDATE __pages SET ?% WHERE id in (?@)', $page, (array)$id);
		if(!$this->db->query($query))
			return false;
		unset($this->all_pagess);	
		unset($this->pages_tree);
		return $id;
	}
	
	/*
	*
	* Удалить страницу
	*
	*/	
	public function delete_page($id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __pages WHERE id=? LIMIT 1", intval($id));
			if($this->db->query($query))
				return true;
		}
		unset($this->all_pagess);	
		unset($this->pages_tree);
		return false;
	}	
	
	/*
	*
	* Функция возвращает массив меню
	*
	*/
	public function get_menus()
	{
		$menus = array();
		$query = "SELECT * FROM __menu ORDER BY position";
		$this->db->query($query);
		foreach($this->db->results() as $menu)
			$menus[$menu->id] = $menu;
		return $menus;
	}
	
	/*
	*
	* Функция возвращает меню по id
	* @param $id
	*
	*/
	public function get_menu($menu_id)
	{	
		$query = $this->db->placehold("SELECT * FROM __menu WHERE id=? LIMIT 1", intval($menu_id));
		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_pages_tree()
	{
		if(!isset($this->pages_tree))
			$this->init_pages();
			
		return $this->pages_tree;
	}
	
	// Инициализация категорий, после которой категории будем выбирать из локальной переменной
	private function init_pages()
	{
		// Дерево категорий
		$tree = new stdClass();
		$tree->subpages = array();
		
		// Указатели на узлы дерева
		$pointers = array();
		$pointers[0] = &$tree;
		$pointers[0]->path = array();
		$pointers[0]->level = 0;
		
		// Выбираем все категории
		$query = $this->db->placehold("SELECT p.id, p.url, p.pre_url, p.header, p.name, p.image, p.meta_title, p.meta_description, p.meta_keywords, p.body, p.menu_id, p.parent_id, p.position, p.visible
										FROM __pages p ORDER BY p.parent_id, p.position");
													
		$this->db->query($query);
		$pages = $this->db->results();
				
		$finish = false;
		// Не кончаем, пока не кончатся категории, или пока ниодну из оставшихся некуда приткнуть
		while(!empty($pages)  && !$finish)
		{
			$flag = false;
			// Проходим все выбранные категории
			foreach($pages as $k=>$page)
			{
				if(isset($pointers[$page->parent_id]))
				{
					// В дерево категорий (через указатель) добавляем текущую категорию
					$pointers[$page->id] = $pointers[$page->parent_id]->subpages[] = $page;
					
					// Путь к текущей категории
					$curr = $pointers[$page->id];
					$pointers[$page->id]->path = array_merge((array)$pointers[$page->parent_id]->path, array($curr));
					
					// Уровень вложенности категории
					$pointers[$page->id]->level = 1+$pointers[$page->parent_id]->level;

					// Убираем использованную категорию из массива категорий
					unset($pages[$k]);
					$flag = true;
				}
			}
			
			if(!$flag) $finish = true;
		}
		
		// Для каждой категории id всех ее деток узнаем
		$ids = array_reverse(array_keys($pointers)); 
		foreach($ids as $id)
		{
			if($id>0)
			{
				$pointers[$id]->children[] = $id;

				if(isset($pointers[$pointers[$id]->parent_id]->children))
					$pointers[$pointers[$id]->parent_id]->children = array_merge($pointers[$id]->children, $pointers[$pointers[$id]->parent_id]->children);
				else
					$pointers[$pointers[$id]->parent_id]->children = $pointers[$id]->children;
			}
		}
		unset($pointers[0]);
		unset($ids);

		$this->pages_tree = $tree->subpages;
		$this->all_pages = $pointers;	
	}
	
	public function add_image($id, $image)
	{
		$query = $this->db->placehold("UPDATE __pages SET image=? WHERE id=?", $image, intval($id));
		$this->db->query($query);
		$id = $this->db->insert_id();
	
		return($id);
	}
	
	public function delete_image($image)
	{
		@unlink($this->config->root_dir.'files/pages/'.$image);		
	}	
	
}

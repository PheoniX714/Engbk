<?php
require_once('Engine.php');

class News extends Engine
{
	public function get_post($id)
	{
		$where = $this->db->placehold(' WHERE n.id=? ', intval($id));
		$query = $this->db->placehold("SELECT n.id, n.category_id, n.image, n.visible, n.date FROM __news n $where LIMIT 1");
		if($this->db->query($query))
			return $this->db->result();
		else
			return false; 
	}
	
	public function get_posts($filter = array())
	{	
		// По умолчанию
		$limit = 1000;
		$page = 1;
		$post_id_filter = '';
		$category_id_filter = '';
		$visible_filter = '';
		$translation_columns = '';
		$translation_join = '';
		$posts = array();
		
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		if(!empty($filter['id']))
			$post_id_filter = $this->db->placehold('AND n.id in(?@)', (array)$filter['id']);
			
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND n.visible = ?', intval($filter['visible']));

		if(isset($filter['language_id'])){
			$translation_columns = $this->db->placehold(', nt.language_id, nt.name, nt.meta_title, nt.meta_description, nt.meta_keywords, nt.annotation, nt.text, nt.url');
			$translation_join = $this->db->placehold('LEFT JOIN __news_translations nt ON n.id = nt.post_id AND nt.language_id=?', intval($filter['language_id']));
		}
		
		if(isset($filter['category_id']))
			$category_id_filter = $this->db->placehold('AND n.category_id = ?', $filter['category_id']);
		
		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

		$query = $this->db->placehold("SELECT n.id, n.image, n.category_id, n.visible, n.date $translation_columns 
		                                      FROM __news n $translation_join WHERE 1 $post_id_filter $visible_filter $category_id_filter
		                                      ORDER BY date DESC, id DESC $sql_limit");
		
		$this->db->query($query);
		$news = $this->db->results();
		
		if(isset($filter['language_id'])){
			$languages = $this->languages->get_languages();
			$languages_codes = array();
			foreach($languages as $l)
				$languages_codes[$l->code] = $l->id;
							
			if(count($languages) > 1){
				foreach($news as $n){
					$existing_translations = array();
					foreach($this->news->get_post_group($n->id) as $pg)
						$existing_translations[] = $pg->language_id;
					$need_translate = array_diff($languages_codes, $existing_translations);
					$n->need_translate = array_flip($need_translate);
				}
			}else{
				foreach($news as $n){
					$n->need_translate = '';
				}
			}
		}
		
		return $news;
	}
	
	public function count_posts($filter = array())
	{	
		$post_id_filter = '';
		$visible_filter = '';
		$category_id_filter = '';
		$translation_join = '';
		
		if(!empty($filter['id']))
			$post_id_filter = $this->db->placehold('AND n.id in(?@)', (array)$filter['id']);
			
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND n.visible = ?', intval($filter['visible']));		

		if(isset($filter['language_id'])){
			$translation_join = $this->db->placehold('LEFT JOIN __news_translations nt ON n.id = nt.post_id AND nt.language_id=?', intval($filter['language_id']));
		}
		
		if(isset($filter['category_id']))
			$category_id_filter = $this->db->placehold('AND n.category_id = ?', $filter['category_id']);
		
		$query = "SELECT COUNT(distinct n.id) as count
		          FROM __news n $translation_join WHERE 1 $post_id_filter $visible_filter $category_id_filter";

		if($this->db->query($query))
			return $this->db->result('count');
		else
			return false;
	}
	
	public function add_post($post)
	{	
		if(!isset($post->date))
			$date_query = ', date=NOW()';
		else
			$date_query = '';
		$query = $this->db->placehold("INSERT INTO __news SET ?% $date_query", $post);
		
		if(!$this->db->query($query))
			return false;
		else
			return $this->db->insert_id();
	}
	
	public function update_post($id, $post)
	{
		$query = $this->db->placehold("UPDATE __news SET ?% WHERE id in(?@) LIMIT ?", $post, (array)$id, count((array)$id));
		if(!$this->db->query($query))
			return false;
		return $id;
	}

	public function delete_post($id)
	{
		$p = $this->get_post(intval($id));
		
		if(!empty($p))
		{
			$query = $this->db->placehold("DELETE FROM __news WHERE id=? LIMIT 1", intval($p->id));
			if($this->db->query($query))
			{
				$query = $this->db->placehold("DELETE FROM __news_translations WHERE post_id=?", intval($p->id));
				if($this->db->query($query)){	
					$query = $this->db->placehold("DELETE FROM __comments WHERE type='news' AND object_id=?", intval($p->id));
					if($this->db->query($query)){				
						$this->delete_image($p->image);
						return true;
					}
				}
			}		
		}
		return false;
	}	
	
	/***
		
		Превью новости
		
	***/
	
	public function add_image($id, $image)
	{
		$query = $this->db->placehold("UPDATE __news SET image=? WHERE id=?", $image, intval($id));
		$this->db->query($query);
		return($id);
	}
	
	public function delete_image($image)
	{
		@unlink($this->config->root_dir.'files/news/'.$image);		
	}

	/***
		
		Мультиязычность страниц
		
	***/
	
	public function get_post_translation($id, $language_id=null)
	{
		if(gettype($id) == 'string')
			$where = $this->db->placehold('url=?', $id);
		else
			$where = $this->db->placehold('post_id=? ', intval($id));
		
		if(!empty($language_id))
			$where .= $this->db->placehold('AND language_id=?', intval($language_id));
		
		
		$query = "SELECT post_id, language_id, name, meta_title, meta_description, meta_keywords, annotation, text, url
		          FROM __news_translations WHERE $where LIMIT 1";
		
		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_post_translations($language_id)
	{
		$where = $this->db->placehold(' WHERE language_id=?', intval($language_id));
		
		$query = "SELECT post_id, language_id, name, meta_title, meta_description, meta_keywords, annotation, text, url FROM __news_translations $where ORDER BY post_id";

		$this->db->query($query);
		return $this->db->results();
	}
	
	public function get_posts_translations($filter = array())
	{
		$visible_filter = '';
		
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('INNER JOIN __news n ON n.id = nt.post_id AND n.visible=?', intval($filter['visible']));
				
		$query = "SELECT post_id, language_id, name, url FROM __news_translations nt $visible_filter ORDER BY post_id";
		$this->db->query($query);
		return $this->db->results();
	}
	
	public function add_post_translation($translation)
	{	
		$query = $this->db->placehold('INSERT INTO __news_translations SET ?%', $translation);
		if(!$this->db->query($query))
			return false;
		
		return true;
	}
	
	public function delete_post_translation($id, $language_id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __news_translations WHERE post_id=? AND language_id=? LIMIT 1", intval($id), intval($language_id));
			if($this->db->query($query))
				return true;
		}
		return false;
	}	
	public function get_post_group($id)
	{
		$where = $this->db->placehold(' WHERE post_id=?', intval($id));
		
		$query = "SELECT post_id, language_id, name, url FROM __news_translations $where ";

		$this->db->query($query);
		$cg = array();
		foreach($this->db->results() as $c){
			$cg[$c->language_id] = $c;
		}
		return $cg;
	}	
	
	
	// Список указателей на категории в дереве категорий (ключ = id категории)
	private $all_categories;
	private $categories_tree;

	public function get_categories($filter = array(), $translate = true)
	{
		if(!isset($this->categories_tree))
			$this->init_categories($translate);
		
		return $this->all_categories;
	}
	
	public function get_categories_tree($translate = true)
	{
		if(!isset($this->categories_tree))
			$this->init_categories($translate);
			
		return $this->categories_tree;
	}

	public function get_category($id, $translate = true)
	{
		if(!isset($this->all_categories))
			$this->init_categories($translate);
		if(is_int($id) && array_key_exists(intval($id), $this->all_categories))
			return $category = $this->all_categories[intval($id)];
		elseif(is_string($id))
			foreach ($this->all_categories as $category)
				if ($category->url == $id)
					return $this->get_category((int)$category->id);
		return false;
	}
	
	public function add_category($category)
	{
		$category = (array)$category;
		$this->db->query("INSERT INTO __news_categories SET ?%", $category);
		$id = $this->db->insert_id();
		$this->db->query("UPDATE __news_categories SET position=id WHERE id=?", $id);		
		unset($this->categories_tree);	
		unset($this->all_categories);	
		return $id;
	}
	
	// Изменение категории
	public function update_category($id, $category)
	{
		$query = $this->db->placehold("UPDATE __news_categories SET ?% WHERE id=? LIMIT 1", $category, intval($id));
		$this->db->query($query);
		unset($this->categories_tree);			
		unset($this->all_categories);	
		return intval($id);
	}
	
	// Удаление категории
	public function delete_category($ids)
	{
		$ids = (array) $ids;
		foreach($ids as $id)
		{
			if($category = $this->get_category(intval($id)))
			$this->delete_image($category->children);
			if(!empty($category->children))
			{
				$query = $this->db->placehold("DELETE FROM __news_categories WHERE id in(?@)", $category->children);
				$this->db->query($query);
				$query = $this->db->placehold("DELETE FROM __news_categories_translations WHERE category_id in(?@)", $category->children);
				$this->db->query($query);
			}
		}
		unset($this->categories_tree);			
		unset($this->all_categories);	
		return $id;
	}
	
	// Инициализация категорий, после которой категории будем выбирать из локальной переменной
	private function init_categories($translate = true)
	{
		// Дерево категорий
		$tree = new stdClass();
		$tree->subcategories = array();
		
		// Указатели на узлы дерева
		$pointers = array();
		$pointers[0] = &$tree;
		$pointers[0]->path = array();
		$pointers[0]->level = 0;
		
		// Выбираем все категории
		$query = $this->db->placehold("SELECT c.id, c.parent_id, c.visible, c.position FROM __news_categories c ORDER BY c.parent_id, c.position");		
		$this->db->query($query);
		$categories_data = $this->db->results();
		
		//Мультиязычность
		if($translate)
			$language = $this->languages->get_language(intval($_SESSION['lang']->id));
		else
			$language = $this->languages->get_main_language();
		$translations = array();
		foreach($this->get_categories_translations($language->id) as $tr)
			$translations[$tr->category_id] = $tr;
		$categories = array();
		foreach($categories_data as $c)
			$categories[] = (object)array_merge((array)$c, (array)$translations[$c->id]);
			
		$languages = $this->languages->get_languages();
		$languages_codes = array();
		foreach($languages as $l)
			$languages_codes[$l->code] = $l->id;
						
		if(count($languages) > 1){
			foreach($categories as $c){
				$existing_translations = array();
				foreach($this->get_category_group($c->id) as $cg)
					$existing_translations[] = $cg->language_id;
				$need_translate = array_diff($languages_codes, $existing_translations);
				$c->need_translate = array_flip($need_translate);
			}
		}else{
			foreach($categories as $c){
				$c->need_translate = '';
			}
		}
		
		$finish = false;
		// Не кончаем, пока не кончатся категории, или пока ниодну из оставшихся некуда приткнуть
		while(!empty($categories) && !$finish)
		{
			$flag = false;
			// Проходим все выбранные категории
			foreach($categories as $k=>$category)
			{
				if(isset($pointers[$category->parent_id]))
				{
					// В дерево категорий (через указатель) добавляем текущую категорию
					$pointers[$category->id] = $pointers[$category->parent_id]->subcategories[] = $category;
					
					// Путь к текущей категории
					$curr = $pointers[$category->id];
					$pointers[$category->id]->path = array_merge((array)$pointers[$category->parent_id]->path, array($curr));
					
					// Уровень вложенности категории
					$pointers[$category->id]->level = 1+$pointers[$category->parent_id]->level;

					// Убираем использованную категорию из массива категорий
					unset($categories[$k]);
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

		$this->categories_tree = $tree->subcategories;
		$this->all_categories = $pointers;	
	}
		
	
	public function get_category_translation($id, $language_id)
	{
		$where = $this->db->placehold(' WHERE category_id=? AND language_id=?', intval($id), intval($language_id));
		
		$query = "SELECT category_id, language_id, name, meta_title, meta_description, meta_keywords, text, url
		          FROM __news_categories_translations $where LIMIT 1";

		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_categories_translations($language_id)
	{
		$where = $this->db->placehold(' WHERE language_id=?', intval($language_id));
		
		$query = "SELECT category_id, language_id, name, meta_title, meta_description, meta_keywords, text, url FROM __news_categories_translations $where ORDER BY category_id";

		$this->db->query($query);
		return $this->db->results();
	}
	
	public function get_news_categories_translations($filter = array())
	{
		$visible_filter = '';
		
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('INNER JOIN __news_categories c ON c.id = ct.category_id AND c.visible=?', intval($filter['visible']));
				
		$query = "SELECT category_id, language_id, name, url FROM __news_categories_translations ct $visible_filter ORDER BY category_id";
		$this->db->query($query);
		return $this->db->results();
	}
	
	public function add_category_translation($translation)
	{	
		$query = $this->db->placehold('INSERT INTO __news_categories_translations SET ?%', $translation);
		if(!$this->db->query($query))
			return false;
		
		return true;
	}
	
	public function delete_category_translation($id, $language_id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __news_categories_translations WHERE category_id=? AND language_id=? LIMIT 1", intval($id), intval($language_id));
			if($this->db->query($query))
				return true;
		}
		return false;
	}	
	public function get_category_group($id)
	{
		$where = $this->db->placehold(' WHERE category_id=?', intval($id));
		
		$query = "SELECT category_id, language_id, name, url FROM __news_categories_translations $where ";

		$this->db->query($query);
		$cg = array();
		foreach($this->db->results() as $c){
			$c->full_url = '/news/'.$c->url;
			$cg[$c->language_id] = $c;
		}
		return $cg;
	}
}

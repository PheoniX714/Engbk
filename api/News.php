<?php

require_once('Engine.php');

class News extends Engine
{

	/*
	*
	* Функция возвращает пост по его id или url
	* (в зависимости от типа аргумента, int - id, string - url)
	* @param $id id или url поста
	*
	*/
	public function get_post($id)
	{
		if(is_int($id))
			$where = $this->db->placehold(' WHERE n.id=? ', intval($id));
		else
			$where = $this->db->placehold(' WHERE n.url=? ', $id);
		
		$query = $this->db->placehold("SELECT n.id, n.url, n.name, n.image, n.annotation, n.text, n.meta_title,
		                               n.meta_keywords, n.meta_description, n.visible, n.date
		                               FROM __news n $where LIMIT 1");
		if($this->db->query($query))
			return $this->db->result();
		else
			return false; 
	}
	
	/*
	*
	* Функция возвращает массив постов, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function get_posts($filter = array())
	{	
		// По умолчанию
		$limit = 1000;
		$page = 1;
		$post_id_filter = '';
		$visible_filter = '';
		$keyword_filter = '';
		$posts = array();
		
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		if(!empty($filter['id']))
			$post_id_filter = $this->db->placehold('AND n.id in(?@)', (array)$filter['id']);
			
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND n.visible = ?', intval($filter['visible']));		
		
		if(isset($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
				$keyword_filter .= $this->db->placehold('AND (n.name LIKE "%'.$this->db->escape(trim($keyword)).'%" OR n.meta_keywords LIKE "%'.$this->db->escape(trim($keyword)).'%") ');
		}

		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

		$query = $this->db->placehold("SELECT n.id, n.url, n.name, n.image, n.annotation, n.text,
		                                      n.meta_title, n.meta_keywords, n.meta_description, n.visible,
		                                      n.date
		                                      FROM __news n WHERE 1 $post_id_filter $visible_filter $keyword_filter
		                                      ORDER BY date DESC, id DESC $sql_limit");
		
		$this->db->query($query);
		return $this->db->results();
	}
	
	
	/*
	*
	* Функция вычисляет количество постов, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function count_posts($filter = array())
	{	
		$post_id_filter = '';
		$visible_filter = '';
		$keyword_filter = '';
		
		if(!empty($filter['id']))
			$post_id_filter = $this->db->placehold('AND n.id in(?@)', (array)$filter['id']);
			
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND n.visible = ?', intval($filter['visible']));		

		if(isset($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
				$keyword_filter .= $this->db->placehold('AND (n.name LIKE "%'.$this->db->escape(trim($keyword)).'%" OR n.meta_keywords LIKE "%'.$this->db->escape(trim($keyword)).'%") ');
		}
		
		$query = "SELECT COUNT(distinct n.id) as count
		          FROM __news n WHERE 1 $post_id_filter $visible_filter $keyword_filter";

		if($this->db->query($query))
			return $this->db->result('count');
		else
			return false;
	}
	
	/*
	*
	* Создание поста
	* @param $post
	*
	*/	
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
	
	
	/*
	*
	* Обновить пост(ы)
	* @param $post
	*
	*/	
	public function update_post($id, $post)
	{
		$query = $this->db->placehold("UPDATE __news SET ?% WHERE id in(?@) LIMIT ?", $post, (array)$id, count((array)$id));
		$this->db->query($query);
		return $id;
	}


	/*
	*
	* Удалить пост
	* @param $id
	*
	*/	
	public function delete_post($id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __news WHERE id=? LIMIT 1", intval($id));
			if($this->db->query($query))
			{
				$query = $this->db->placehold("DELETE FROM __comments WHERE type='news' AND object_id=?", intval($id));
				if($this->db->query($query))
					return true;
			}							
		}
		return false;
	}	
	

	public function add_image($id, $image)
	{
		$query = $this->db->placehold("UPDATE __news SET image=? WHERE id=?", $image, intval($id));
		$this->db->query($query);
		$id = $this->db->insert_id();
	
		return($id);
	}
	
	public function delete_image($image)
	{
		@unlink($this->config->root_dir.'files/news/'.$image);		
	}	
}

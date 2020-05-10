<?php
require_once('Engine.php');

class Brands extends Engine
{
	/*
	*
	* Функция возвращает массив брендов, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function get_brands($filter = array())
	{
		$limit = 1000;
		$page = 1;
		$keyword_filter = '';
		
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));
		
		if(!empty($filter['keyword']))
		{
			$keyword_filter = "WHERE 1";
			
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
			{
				$kw = $this->db->escape(trim($keyword));
				if($kw!=='')
					$keyword_filter .= $this->db->placehold(" AND b.name LIKE '%$kw%'");				
			}
		}
		
		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

		// Выбираем все бренды
		$query = $this->db->placehold("SELECT DISTINCT b.id, b.name, b.url, b.meta_title, b.meta_keywords, b.meta_description, b.description, b.image
								 		FROM __brands b $category_id_filter $keyword_filter ORDER BY b.name $sql_limit");
		$this->db->query($query);

		return $this->db->results();
	}
	
	function count_brands($filter = array())
	{	
		$keyword_filter = '';
		
		if(!empty($filter['keyword']))
		{
			$keyword_filter = "WHERE 1";
			
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
			{
				$kw = $this->db->escape(trim($keyword));
				if($kw!=='')
					$keyword_filter .= $this->db->placehold(" AND b.name LIKE '%$kw%'");				
			}
		}
		
		$query = "SELECT COUNT(distinct b.id) as count
		          FROM __brands AS b $category_id_filter $keyword_filter";

		if($this->db->query($query))
			return $this->db->result('count');
		else
			return false;
	}

	/*
	*
	* Функция возвращает бренд по его id или url
	* (в зависимости от типа аргумента, int - id, string - url)
	* @param $id id или url поста
	*
	*/
	public function get_brand($id)
	{
		if(is_int($id))			
			$filter = $this->db->placehold('b.id = ?', $id);
		else
			$filter = $this->db->placehold('b.url = ?', $id);
		$query = "SELECT b.id, b.name, b.url, b.meta_title, b.meta_keywords, b.meta_description, b.description, b.image
								 FROM __brands b WHERE $filter LIMIT 1";
		$this->db->query($query);
		return $this->db->result();
	}

	/*
	*
	* Добавление бренда
	* @param $brand
	*
	*/
	public function add_brand($brand)
	{
		$brand = (array)$brand;
		if(empty($brand['url']))
		{
			$brand['url'] = preg_replace("/[\s]+/ui", '_', $brand['name']);
			$brand['url'] = strtolower(preg_replace("/[^0-9a-zа-я_]+/ui", '', $brand['url']));
		}
	
		$this->db->query("INSERT INTO __brands SET ?%", $brand);
		return $this->db->insert_id();
	}

	/*
	*
	* Обновление бренда(ов)
	* @param $brand
	*
	*/		
	public function update_brand($id, $brand)
	{
		$query = $this->db->placehold("UPDATE __brands SET ?% WHERE id=? LIMIT 1", $brand, intval($id));
		$this->db->query($query);
		return $id;
	}
	
	/*
	*
	* Удаление бренда
	* @param $id
	*
	*/	
	public function delete_brand($id)
	{
		if(!empty($id))
		{
			$this->delete_image($id);	
			$query = $this->db->placehold("DELETE FROM __brands WHERE id=? LIMIT 1", $id);
			$this->db->query($query);		
			$query = $this->db->placehold("UPDATE __products SET brand_id=NULL WHERE brand_id=?", $id);
			$this->db->query($query);	
		}
	}
	
	/*
	*
	* Удаление изображения бренда
	* @param $id
	*
	*/
	public function delete_image($brand_id)
	{
		$query = $this->db->placehold("SELECT image FROM __brands WHERE id=?", intval($brand_id));
		$this->db->query($query);
		$filename = $this->db->result('image');
		if(!empty($filename))
		{
			$query = $this->db->placehold("UPDATE __brands SET image=NULL WHERE id=?", $brand_id);
			$this->db->query($query);
			$query = $this->db->placehold("SELECT count(*) as count FROM __brands WHERE image=? LIMIT 1", $filename);
			$this->db->query($query);
			$count = $this->db->result('count');
			if($count == 0)
			{			
				@unlink($this->config->root_dir.$this->config->brands_images_dir.$filename);		
			}
		}
	}

}

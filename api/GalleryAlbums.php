<?php
require_once('Engine.php');

class GalleryAlbums extends Engine
{
	/**
	* Функция возвращает альбомы
	*/
	public function get_albums($filter = array())
	{		
		// По умолчанию
		$limit = 100;
		$page = 1;
		$category_id_filter = '';
		$album_id_filter = '';
		$keyword_filter = '';
		$visible_filter = '';
		$group_by = '';
		$order = 'a.position DESC';

		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

		if(!empty($filter['id']))
			$product_id_filter = $this->db->placehold('AND a.id in(?@)', (array)$filter['id']);

		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND a.visible=?', intval($filter['visible']));

		if(!empty($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
			{
				$kw = $this->db->escape(trim($keyword));
				if($kw!=='')
					$keyword_filter .= $this->db->placehold("AND (a.name LIKE '%$kw%' OR a.meta_keywords LIKE '%$kw%' OR a.id in ($kw))");
			}
		}

		$query = "SELECT  
					a.id,
					a.url,
					a.name,
					a.description,
					a.position,
					a.created as created,
					a.visible, 
					a.meta_title, 
					a.meta_keywords, 
					a.meta_description
				FROM __gallery_albums a		
				$category_id_filter 
				WHERE 
					1
					$album_id_filter
					$keyword_filter
					$visible_filter
				$group_by
				ORDER BY $order
					$sql_limit";

		$this->db->query($query);

		return $this->db->results();
	}

	/**
	* Функция возвращает количество альбомов
	*/
	public function count_albums($filter = array())
	{		
		$category_id_filter = '';
		$album_id_filter = '';
		$keyword_filter = '';
		$visible_filter = '';
		
		if(!empty($filter['id']))
			$album_id_filter = $this->db->placehold('AND a.id in(?@)', (array)$filter['id']);
		
		if(isset($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
			{
				$kw = $this->db->escape(trim($keyword));
				if($kw!=='')
					$keyword_filter .= $this->db->placehold("AND (a.name LIKE '%$kw%' OR a.meta_keywords LIKE '%$kw%' OR a.id in ($kw))");
			}
		}

		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND a.visible=?', intval($filter['visible']));
		
		$query = "SELECT count(distinct a.id) as count
				FROM __gallery_albums AS a
				$category_id_filter
				WHERE 1
					$album_id_filter
					$keyword_filter
					$visible_filter ";

		$this->db->query($query);	
		return $this->db->result('count');
	}


	/**
	* Функция возвращает альбом по id
	* @param	$id
	* @retval	object
	*/
	public function get_album($id)
	{
		if(is_int($id))
			$filter = $this->db->placehold('a.id = ?', $id);
		else
			$filter = $this->db->placehold('a.url = ?', $id);
			
		$query = "SELECT DISTINCT
					a.id,
					a.url,
					a.name,
					a.description,
					a.position,
					a.created as created,
					a.visible, 
					a.meta_title, 
					a.meta_keywords, 
					a.meta_description
				FROM __gallery_albums AS a
                WHERE $filter
                GROUP BY a.id
                LIMIT 1";
		$this->db->query($query);
		$product = $this->db->result();
		return $product;
	}
	
	public function get_album_preview($album_id = 0)
	{
		$filter = $this->db->placehold('i.album_id = ? AND i.as_preview = 1', intval($album_id));
					
		$query = $this->db->placehold("SELECT filename FROM __gallery_images AS i WHERE $filter ORDER BY i.album_id, i.position LIMIT 1");
		$this->db->query($query);
		
		if(empty($preview = $this->db->result('filename'))){
			$filter = $this->db->placehold('i.album_id = ?', intval($album_id));
			$query = $this->db->placehold("SELECT filename FROM __gallery_images AS i WHERE $filter ORDER BY i.album_id, i.position LIMIT 1");
			$this->db->query($query);
			$preview = $this->db->result('filename');		
		}
		
		return $preview;
	}

	public function update_album($id, $album)
	{
		$query = $this->db->placehold("UPDATE __gallery_albums SET ?% WHERE id in (?@) LIMIT ?", $album, (array)$id, count((array)$id));
		if($this->db->query($query))
			return $id;
		else
			return false;
	}
	
	public function add_album($album)
	{	
		$album = (array) $album;
		
		if(empty($album['url']))
		{
			$album['url'] = preg_replace("/[\s]+/ui", '-', $product['name']);
			$album['url'] = strtolower(preg_replace("/[^0-9a-zа-я\-]+/ui", '', $product['url']));
		}

		// Если есть товар с таким URL, добавляем к нему число
		while($this->get_album((string)$album['url']))
		{
			if(preg_match('/(.+)_([0-9]+)$/', $album['url'], $parts))
				$album['url'] = $parts[1].'_'.($parts[2]+1);
			else
				$album['url'] = $album['url'].'_2';
		}
		if($this->db->query("INSERT INTO __gallery_albums SET ?%", $album))
		{
			$id = $this->db->insert_id();
			$this->db->query("UPDATE __gallery_albums SET position=id WHERE id=?", $id);		
			return $id;
		}
		else
			return false;
	}
	
	
	/*
	*
	* Удалить товар
	*
	*/	
	public function delete_album($id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __gallery_images WHERE album_id=?", intval($id));
			$this->db->query($query);
			
			$query = $this->db->placehold("DELETE FROM __gallery_album_categories WHERE album_id=?", intval($id));
			$this->db->query($query);

			// Удаляем товар
			$query = $this->db->placehold("DELETE FROM __gallery_albums WHERE id=? LIMIT 1", intval($id));
			if($this->db->query($query))
				return true;			
		}
		return false;
	}	
	
	function get_images($filter = array())
	{		
		$album_id_filter = '';
		$group_by = '';

		if(!empty($filter['album_id']))
			$album_id_filter = $this->db->placehold('AND i.album_id in(?@)', (array)$filter['album_id']);

		// images
		$query = $this->db->placehold("SELECT i.id, i.album_id, i.filename, i.visible, i.position, i.as_preview
									FROM __gallery_images AS i WHERE 1 $album_id_filter $group_by ORDER BY i.album_id, i.position");
		$this->db->query($query);
		return $this->db->results();
	}
	
	public function add_image($album_id, $filename)
	{
		$query = $this->db->placehold("SELECT id FROM __gallery_images WHERE album_id=? AND filename=?", $album_id, $filename);
		$this->db->query($query);
		$id = $this->db->result('id');
		if(empty($id))
		{
			$query = $this->db->placehold("INSERT INTO __gallery_images SET album_id=?, filename=?", $album_id, $filename);
			$this->db->query($query);
			$id = $this->db->insert_id();
			$query = $this->db->placehold("UPDATE __gallery_images SET position=id WHERE id=?", $id);
			$this->db->query($query);
		}
		return($id);
	}
	
	public function update_image($id, $image)
	{
	
		$query = $this->db->placehold("UPDATE __gallery_images SET ?% WHERE id=?", $image, $id);
		$this->db->query($query);
		
		return($id);
	}
	
	public function set_preview_image($album_id, $id)
	{
	
		$query = $this->db->placehold("UPDATE __gallery_images SET as_preview = 0 WHERE album_id=?", intval($album_id));
		$this->db->query($query);
		
		$query = $this->db->placehold("UPDATE __gallery_images SET as_preview = 1 WHERE id=?", $id);
		$this->db->query($query);
		
		return($id);
	}
	
	public function delete_image($id, $album_id, $path = "")
	{		
		$query = $this->db->placehold("SELECT filename FROM __gallery_images WHERE id=?", $id);
		$this->db->query($query);
		$filename = $this->db->result('filename');
		$query = $this->db->placehold("DELETE FROM __gallery_images WHERE id=? LIMIT 1", $id);
		$this->db->query($query);
		$query = $this->db->placehold("SELECT count(*) as count FROM __gallery_images WHERE filename=? LIMIT 1", $filename);
		$this->db->query($query);
		$count = $this->db->result('count');
		if($count == 0)
		{	
			$query = $this->db->placehold("SELECT created FROM __gallery_albums WHERE id=?", intval($album_id));
			$this->db->query($query);
			$path = 'files/gallery/'.date_format(date_create($album->created), 'Y').'/';

			@unlink($this->config->root_dir.$path.$filename);
			
			return true;
		}
	}	
		
}
<?php

require_once('Engine.php');

class Slider extends Engine
{
	/*
	*
	* Функция возвращает слайд по его id
	*
	*/
	public function get_slide($id)
	{
		$where = $this->db->placehold(' WHERE id=? ', intval($id));
		
		$query = "SELECT id, link, visible, filename, position, slider_id, language_id
		          FROM __slider $where LIMIT 1";

		$this->db->query($query);
		return $this->db->result();
	}
	
	/*
	*
	* Функция возвращает массив страниц, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function get_slides($filter = array())
	{	
		$visible_filter = '';
		$slides = array();

		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND visible = ?', intval($filter['visible']));
		
		$query = "SELECT id, link, visible, filename, position, slider_id, language_id
		          FROM __slider WHERE 1 $visible_filter ORDER BY position";
	
		$this->db->query($query);
		
		foreach($this->db->results() as $slide)
			$slides[$slide->id] = $slide;
			
		return $slides;
	}

	/*
	*
	* Создание слайда
	*
	*/	
	public function add_slide($slide)
	{	
		$query = $this->db->placehold('INSERT INTO __slider SET ?%', $slide);
		if(!$this->db->query($query))
			return false;

		$id = $this->db->insert_id();
		$this->db->query("UPDATE __slider SET position=id WHERE id=?", $id);	
		return $id;
	}
	
	/*
	*
	* Обновить слайд
	*
	*/
	public function update_slide($id, $slide)
	{	
		$query = $this->db->placehold('UPDATE __slider SET ?% WHERE id in (?@)', $slide, (array)$id);
		if(!$this->db->query($query))
			return false;
		return $id;
	}
	
	/*
	*
	* Удалить слайд
	*
	*/	
	public function delete_slide($id)
	{
		if(!empty($id))
		{	
			$where = $this->db->placehold(' WHERE id=? ', intval($id));
			$query = "SELECT id, link, visible, filename, position, slider_id, language_id
		          FROM __slider $where LIMIT 1";

			$this->db->query($query);
			$slide = $this->db->result();
			$this->delete_image($slide->filename);
			
			$query = $this->db->placehold("DELETE FROM __slider WHERE id=? LIMIT 1", intval($id));
			if($this->db->query($query))
				return true;
		}
		return false;
	}
	
	public function add_image($id, $filename)
	{
		$query = $this->db->placehold("UPDATE __slider SET filename=? WHERE id=?", $filename, intval($id));
		$this->db->query($query);
		$id = $this->db->insert_id();
	
		return($id);
	}
	
	public function delete_image($filename)
	{
		@unlink($this->config->root_dir.'files/slider/'.$filename);		
	}	
		
}
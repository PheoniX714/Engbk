<?php
require_once('Engine.php');

class Languages extends Engine
{

	public function get_languages($filter = array())
	{
		$visible_filter = '';
		
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND visible = ?', intval($filter['visible']));
		
		// Выбираем из базы языки
		$query = "SELECT id, name, code, position, visible, currency_id FROM __languages WHERE 1 $visible_filter ORDER BY position";
		$this->db->query($query);
		
		$languages = $this->db->results();
			
		return $languages;
	}
	
	public function get_language($id)
	{
		if(gettype($id) == 'string')
			$where = $this->db->placehold(' WHERE code=? ', $id);
		else
			$where = $this->db->placehold(' WHERE id=? ', intval($id));
		
		$query = "SELECT id, name, code, position, visible, currency_id FROM __languages $where LIMIT 1";
		$this->db->query($query);
		
		$language = $this->db->result();
			
		return $language;
	}
	
	
	public function add_language($language)
	{	
		$query = $this->db->placehold('INSERT INTO __languages SET ?%', $language);

		if(!$this->db->query($query))
			return false;

		$id = $this->db->insert_id();
		$this->db->query("UPDATE __languages SET position=id WHERE id=?", $id);
			
		return $id;
	}
	
	public function update_language($id, $language)
	{	
		$query = $this->db->placehold('UPDATE __languages SET ?% WHERE id in (?@)', $language, (array)$id);
		if(!$this->db->query($query))
			return false;
		
		return $id;
	}
	
	public function delete_language($id)
	{
		if(!empty($id) and $id != 1)
		{
			$query = $this->db->placehold("DELETE FROM __languages WHERE id=? LIMIT 1", intval($id));
			$this->db->query($query);
		}
	}	
		
}
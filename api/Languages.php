<?php
require_once('Engine.php');

class Languages extends Engine
{

	public function get_languages($filter = array())
	{
		$languages = array();
		$visible_filter = '';
		
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND visible = ?', intval($filter['visible']));
		
		// Выбираем из базы языки
		$query = "SELECT id, name, visible_name, code, position, visible, currency_id, main FROM __languages WHERE 1 $visible_filter ORDER BY position";
		$this->db->query($query);
		
		foreach($this->db->results() as $language)
			$languages[$language->id] = $language;
		return $languages;
	}
	
	public function get_language($id)
	{
		if(gettype($id) == 'string')
			$where = $this->db->placehold(' WHERE code=? ', $id);
		else
			$where = $this->db->placehold(' WHERE id=? ', intval($id));
		
		$query = "SELECT id, name, visible_name, code, position, visible, currency_id, main FROM __languages $where LIMIT 1";
		$this->db->query($query);
		
		$language = $this->db->result();
			
		return $language;
	}
	
	public function get_main_language()
	{
		$query = $this->db->placehold('SELECT id, name, visible_name, code, position, visible, currency_id, main FROM __languages WHERE main=1 LIMIT 1');
		if(!$this->db->query($query))
			return false;
		
		return $this->db->result();
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
	public function set_main_language($id, $value)
	{	
		if($this->reset_main_language()){
			$query = $this->db->placehold('UPDATE __languages SET ?% WHERE id in (?@)', $value, (array)$id);
			if(!$this->db->query($query))
				return false;
			return true;
		}
		return false;
	}
	public function reset_main_language()
	{	
		$query = $this->db->placehold('UPDATE __languages SET main = NULL WHERE 1');
		if(!$this->db->query($query))
			return false;
		
		return true;
	}
	
	public function delete_language($id)
	{
		$language = $this->get_language(intval($id));
		
		if(!empty($language) and $language->main != 1)
		{
			$query = $this->db->placehold("DELETE FROM __languages WHERE id=? LIMIT 1", intval($id));
			$this->db->query($query);
		}
	}	
	
	################### Языковые константы ######################
	
	public function get_constants($filter = array())
	{
		$query = "SELECT id, value FROM __languages_constants ORDER BY id";
		$this->db->query($query);
		
		return $this->db->results();
	}	
	public function get_constant($id)
	{
		if(gettype($id) == 'string')
			$where = $this->db->placehold(' WHERE value=? ', $id);
		else
			$where = $this->db->placehold(' WHERE id=? ', intval($id));
		
		$query = "SELECT id, value FROM __languages_constants $where LIMIT 1";
		$this->db->query($query);
		
		return $this->db->result();
	}
	public function get_language_constants($lang_code)
	{
		$constants_values_list = array();
		foreach($this->get_constants_values(array('language'=>$lang_code)) as $cv)
			$constants_values_list[$cv->constant_id] = $cv->value;
		
		$constants = array();
		foreach($this->get_constants() as $cl)
			$constants[$cl->value] = $constants_values_list[$cl->id];

		return $constants;
	}
	public function add_constant($constant)
	{	
		$query = $this->db->placehold('INSERT INTO __languages_constants SET ?%', $constant);

		if(!$this->db->query($query))
			return false;

		return $this->db->insert_id();
	}
	
	public function update_constant($id, $constant)
	{	
		$query = $this->db->placehold('UPDATE __languages_constants SET ?% WHERE id in (?@)', $constant, (array)$id);
		if(!$this->db->query($query))
			return false;
		
		return $id;
	}
	public function get_constants_values($filter = array())
	{
		$language_filter = '';
		if(isset($filter['language']))
			$language_filter = $this->db->placehold('AND language = ?', $filter['language']);
		
		$query = "SELECT constant_id, value, language FROM __languages_variables WHERE 1 $language_filter";
		$this->db->query($query);
		
		return $this->db->results();
	}
	
	public function add_constant_value($value)
	{	
		$query = $this->db->placehold('INSERT INTO __languages_variables SET ?%', $value);

		if(!$this->db->query($query))
			return false;
	}
	public function delete_constant($id)
	{
		if(!empty($id)){
			$query = $this->db->placehold('DELETE FROM __languages_variables WHERE constant_id=?', $id);
			$this->db->query($query);
			
			$query = $this->db->placehold('DELETE FROM __languages_constants WHERE id=?', $id);
			$this->db->query($query);
			
			return $id; 
		}
	}
}
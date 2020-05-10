<?php
 
require_once('Engine.php');

class Features extends Engine
{	
	
	function get_features($filter = array())
	{
		$limit = 1000;
		$page = 1;
		$translation_columns = '';
		$translation_join = '';
		$category_id_filter = '';
		$in_filter_filter = '';	
		$id_filter = '';	
		$keyword_filter = '';

		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));
		
		if(isset($filter['category_id']))
			$category_id_filter = $this->db->placehold('AND f.id in(SELECT cf.feature_id FROM __categories_features AS cf WHERE cf.category_id in(?@))', (array)$filter['category_id']);
	
		if(isset($filter['in_filter']))
			$in_filter_filter = $this->db->placehold('AND f.in_filter=?', intval($filter['in_filter']));
		
		if(isset($filter['language_id'])){
			$translation_columns = $this->db->placehold(', ft.language_id, ft.name');
			$translation_join = $this->db->placehold('LEFT JOIN __features_translations ft ON f.id = ft.feature_id AND ft.language_id=?', intval($filter['language_id']));
		}
		if(!empty($filter['id']))
			$id_filter = $this->db->placehold('AND f.id in(?@)', (array)$filter['id']);
		
		if(!empty($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
			{
				$kw = $this->db->escape(trim($keyword));
				if($kw!=='')
					$keyword_filter .= $this->db->placehold(" AND (f.id in (SELECT ft.feature_id FROM __features_translations ft WHERE ft.name LIKE '%$kw%'))");				
			}
		}
		
		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);
		
		// Выбираем свойства
		$query = $this->db->placehold("SELECT f.id, f.position, f.in_filter $translation_columns FROM __features AS f
									$translation_join WHERE 1 $category_id_filter $in_filter_filter $id_filter $keyword_filter ORDER BY f.position $sql_limit");
		$this->db->query($query);
		$features = $this->db->results();
		
		if(isset($filter['language_id']) and !empty($features)){
			$languages = $this->languages->get_languages();
			$languages_codes = array();
			foreach($languages as $l)
				$languages_codes[$l->code] = $l->id;
							
			if(count($languages) > 1){
				foreach($features as $f){
					$existing_translations = array();
					foreach($this->features->get_feature_group($f->id) as $fg)
						$existing_translations[] = $fg->language_id;
					$need_translate = array_diff($languages_codes, $existing_translations);
					$f->need_translate = array_flip($need_translate);
				}
			}else{
				foreach($features as $f){
					$f->need_translate = '';
				}
			}
		}
		
		return $features;
	}
	
	function count_features($filter = array())
	{	
		$translation_columns = '';
		$translation_join = '';
		$category_id_filter = '';
		$keyword_filter = '';
		
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));
		
		if(isset($filter['category_id']))
			$category_id_filter = $this->db->placehold('AND f.id in(SELECT cf.feature_id FROM __categories_features AS cf WHERE cf.category_id in(?@))', (array)$filter['category_id']);
	
		if(isset($filter['in_filter']))
			$in_filter_filter = $this->db->placehold('AND f.in_filter=?', intval($filter['in_filter']));
		
		if(isset($filter['language_id'])){
			$translation_columns = $this->db->placehold(', ft.language_id, ft.name');
			$translation_join = $this->db->placehold('LEFT JOIN __features_translations ft ON f.id = ft.feature_id AND ft.language_id=?', intval($filter['language_id']));
		}
		if(!empty($filter['id']))
			$id_filter = $this->db->placehold('AND f.id in(?@)', (array)$filter['id']);
		
		if(!empty($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
			{
				$kw = $this->db->escape(trim($keyword));
				if($kw!=='')
					$keyword_filter .= $this->db->placehold(" AND (f.id in (SELECT ft.feature_id FROM __features_translations ft WHERE ft.name LIKE '%$kw%'))");				
			}
		}
		
		$query = "SELECT COUNT(distinct f.id) as count
		          FROM __features AS f $translation_join WHERE 1 $category_id_filter $in_filter_filter $id_filter $keyword_filter";

		if($this->db->query($query))
			return $this->db->result('count');
		else
			return false;
	}
		
	function get_feature($id)
	{
		// Выбираем свойство
		$query = $this->db->placehold("SELECT id, position, in_filter FROM __features WHERE id=? LIMIT 1", $id);
		$this->db->query($query);
		$feature = $this->db->result();

		return $feature;
	}
	
	function get_feature_categories($id)
	{
		$query = $this->db->placehold("SELECT cf.category_id as category_id FROM __categories_features cf
										WHERE cf.feature_id = ?", $id);
		$this->db->query($query);
		return $this->db->results('category_id');	
	}
	
	public function add_feature($feature)
	{
		$query = $this->db->placehold("INSERT INTO __features SET ?%", $feature);
		$this->db->query($query);
		$id = $this->db->insert_id();
		$query = $this->db->placehold("UPDATE __features SET position=id WHERE id=? LIMIT 1", $id);
		$this->db->query($query);
		return $id;
	}
		
	public function update_feature($id, $feature)
	{
		$query = $this->db->placehold("UPDATE __features SET ?% WHERE id in(?@) LIMIT ?", (array)$feature, (array)$id, count((array)$id));
		$this->db->query($query);
		return $id;
	}
	
	public function delete_feature($id = array())
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __features WHERE id=? LIMIT 1", intval($id));
			$this->db->query($query);
			$query = $this->db->placehold("DELETE FROM __options WHERE feature_id=?", intval($id));
			$this->db->query($query);	
			$query = $this->db->placehold("DELETE FROM __categories_features WHERE feature_id=?", intval($id));
			$this->db->query($query);
			$query = $this->db->placehold("DELETE FROM __features_translations WHERE feature_id=?", intval($id));
			$this->db->query($query);
		}
	}
	

	public function delete_option($product_id, $feature_id)
	{
		$query = $this->db->placehold("DELETE FROM __options WHERE product_id=? AND feature_id=? LIMIT 1", intval($product_id), intval($feature_id));
		$this->db->query($query);
	}

	
	public function update_option($product_id, $feature_id, $value)
	{	 
		if($value != '')
			$query = $this->db->placehold("REPLACE INTO __options SET value=?, product_id=?, feature_id=?", $value, intval($product_id), intval($feature_id));
		else
			$query = $this->db->placehold("DELETE FROM __options WHERE feature_id=? AND product_id=?", intval($feature_id), intval($product_id));
		return $this->db->query($query);
	}


	public function add_feature_category($id, $category_id)
	{
		$query = $this->db->placehold("INSERT IGNORE INTO __categories_features SET feature_id=?, category_id=?", $id, $category_id);
		$this->db->query($query);
	}
			
	public function update_feature_categories($id, $categories)
	{
		$id = intval($id);
		$query = $this->db->placehold("DELETE FROM __categories_features WHERE feature_id=?", $id);
		$this->db->query($query);
		
		
		if(is_array($categories))
		{
			$values = array();
			foreach($categories as $category)
				$values[] = "($id , ".intval($category).")";
	
			$query = $this->db->placehold("INSERT INTO __categories_features (feature_id, category_id) VALUES ".implode(', ', $values));
			$this->db->query($query);

			/* Удалим значения из options 
			$query = $this->db->placehold("DELETE o FROM __options o
			                               LEFT JOIN __products_categories pc ON pc.product_id=o.product_id
			                               WHERE o.feature_id=? AND pc.position=(SELECT MIN(pc2.position) FROM __products_categories pc2 WHERE pc.product_id=pc2.product_id) AND pc.category_id not in(?@)", $id, $categories);
			$this->db->query($query);*/
		}
		else
		{
			/* Удалим значения из options 
			$query = $this->db->placehold("DELETE o FROM __options o WHERE o.feature_id=?", $id);
			$this->db->query($query);*/
		}
	}
	
	// Удалить категорию заданного свойства
	public function delete_feature_category($feature_id, $category_id)
	{
		$query = $this->db->placehold("DELETE FROM __categories_features WHERE feature_id=? AND category_id=?", intval($feature_id), intval($category_id));
		$this->db->query($query);
	}
			

	public function get_options($filter = array())
	{
		$feature_id_filter = '';
		$product_id_filter = '';
		$category_id_filter = '';
		$visible_filter = '';
		$brand_id_filter = '';
		$features_filter = '';

		if(empty($filter['feature_id']) && empty($filter['product_id']))
			return array();
		
		$group_by = '';
		if(isset($filter['feature_id']))
			$group_by = 'GROUP BY feature_id, value';
			
		if(isset($filter['feature_id']))
			$feature_id_filter = $this->db->placehold('AND po.feature_id in(?@)', (array)$filter['feature_id']);

		if(isset($filter['product_id']))
			$product_id_filter = $this->db->placehold('AND po.product_id in(?@)', (array)$filter['product_id']);

		if(isset($filter['category_id']))
			$category_id_filter = $this->db->placehold('INNER JOIN __products_categories pc ON pc.product_id=po.product_id AND pc.category_id in(?@)', (array)$filter['category_id']);

		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('INNER JOIN __products p ON p.id=po.product_id AND visible=?', intval($filter['visible']));

		if(isset($filter['brand_id']))
			$brand_id_filter = $this->db->placehold('AND po.product_id in(SELECT id FROM __products WHERE brand_id in(?@))', (array)$filter['brand_id']);

		if(isset($filter['features']))
			foreach($filter['features'] as $feature=>$value)
			{
				$features_filter .= $this->db->placehold('AND (po.feature_id=? OR po.product_id in (SELECT product_id FROM __options WHERE feature_id=? AND value=? )) ', $feature, $feature, $value);
			}
		

		$query = $this->db->placehold("SELECT po.product_id, po.feature_id, po.value, count(po.product_id) as count
		    FROM __options po
		    $visible_filter
			$category_id_filter
			WHERE 1 $feature_id_filter $product_id_filter $brand_id_filter $features_filter GROUP BY po.feature_id, po.value ORDER BY value=0, -value DESC, value");

		$this->db->query($query);
		$res = $this->db->results();

		return $res;
	}
	
	public function get_product_options($product_id)
	{
		$query = $this->db->placehold("SELECT f.id as feature_id, ft.name, ft.language_id, po.value, po.product_id FROM __options po LEFT JOIN __features f ON f.id=po.feature_id LEFT JOIN __features_translations ft ON f.id=ft.feature_id
										WHERE po.product_id in(?@) ORDER BY f.position", (array)$product_id);

		$this->db->query($query);
		$res = $this->db->results();

		return $res;
	}
	

	public function get_feature_translation($id, $language_id=null)
	{
		$where = $this->db->placehold('feature_id=? ', intval($id));
		
		if(!empty($language_id))
			$where .= $this->db->placehold('AND language_id=?', intval($language_id));
		
		
		$query = "SELECT feature_id, language_id, name
		          FROM __features_translations WHERE $where LIMIT 1";
		
		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_feature_translations($language_id)
	{
		$where = $this->db->placehold(' WHERE language_id=?', intval($language_id));
		
		$query = "SELECT feature_id, language_id, name FROM __features_translations $where ORDER BY feature_id";

		$this->db->query($query);
		return $this->db->results();
	}
	
	public function add_feature_translation($translation)
	{	
		$query = $this->db->placehold('INSERT INTO __features_translations SET ?%', $translation);
		if(!$this->db->query($query))
			return false;
		
		return true;
	}
	
	public function delete_feature_translation($id, $language_id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __features_translations WHERE feature_id=? AND language_id=? LIMIT 1", intval($id), intval($language_id));
			if($this->db->query($query))
				return true;
		}
		return false;
	}	
	public function get_feature_group($id)
	{
		$where = $this->db->placehold(' WHERE feature_id=?', intval($id));
		
		$query = "SELECT feature_id, language_id, name FROM __features_translations $where ";

		$this->db->query($query);
		$cg = array();
		foreach($this->db->results() as $c){
			$cg[$c->language_id] = $c;
		}
		return $cg;
	}	
}

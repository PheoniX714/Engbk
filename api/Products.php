<?php
require_once('Engine.php');

class Products extends Engine
{
	/**
	* Функция возвращает товары
	* Возможные значения фильтра:
	* id - id товара или их массив
	* category_id - id категории или их массив
	* brand_id - id бренда или их массив
	* page - текущая страница, integer
	* limit - количество товаров на странице, integer
	* sort - порядок товаров, возможные значения: position(по умолчанию), name, price
	* keyword - ключевое слово для поиска
	* features - фильтр по свойствам товара, массив (id свойства => значение свойства)
	*/
	public function get_products($filter = array())
	{		
		// По умолчанию
		$limit = 100;
		$page = 1;
		$category_id_filter = '';
		$brand_id_filter = '';
		$product_id_filter = '';
		$features_filter = '';
		$keyword_filter = '';
		$visible_filter = '';
		$is_featured_filter = '';
		$discounted_filter = '';
		$in_stock_filter = '';
		$group_by = '';
		$translation_columns = '';
		$translation_join = '';
		$order = 'p.position DESC';

		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

		if(!empty($filter['id']))
			$product_id_filter = $this->db->placehold('AND p.id in(?@)', (array)$filter['id']);

		if(!empty($filter['category_id']))
		{
			$category_id_filter = $this->db->placehold('INNER JOIN __products_categories pc ON pc.product_id = p.id AND pc.category_id in(?@)', (array)$filter['category_id']);
			$group_by = "GROUP BY p.id";
		}
		
		if(!empty($filter['brand_id']))
			$brand_id_filter = $this->db->placehold('AND p.brand_id in(?@)', (array)$filter['brand_id']);
		
		if(isset($filter['featured']))
			$is_featured_filter = $this->db->placehold('AND p.featured=?', intval($filter['featured']));

		if(isset($filter['discounted']))
			$discounted_filter = $this->db->placehold('AND (SELECT 1 FROM __variants pv WHERE pv.product_id=p.id AND pv.compare_price>0 LIMIT 1) = ?', intval($filter['discounted']));

		if(isset($filter['in_stock']))
			$in_stock_filter = $this->db->placehold('AND (SELECT count(*)>0 FROM __variants pv WHERE pv.product_id=p.id AND pv.price>0 AND (pv.stock IS NULL OR pv.stock>0) LIMIT 1) = ?', intval($filter['in_stock']));

		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND p.visible=? AND (SELECT count(*) FROM __categories, __products_categories WHERE __categories.id = __products_categories.category_id AND __categories.visible=1 AND p.id=__products_categories.product_id) > 0', intval($filter['visible']));
				
 		if(!empty($filter['sort']))
			switch ($filter['sort'])
			{
				case 'position':
				$order = 'p.position DESC';
				break;
				
				case 'name':
				$order = 'p.visible_name';
				break;
				
				case 'created':
				$order = 'p.created DESC';
				break;
				
				case 'price_desc':
				$order = '(SELECT -pv.price FROM __variants pv WHERE (pv.stock IS NULL OR pv.stock>0) AND p.id = pv.product_id AND pv.position=(SELECT MIN(position) FROM __variants WHERE (stock>0 OR stock IS NULL) AND product_id=p.id LIMIT 1) LIMIT 1) DESC';
				break;
				
				case 'price_asc':
				$order = '(SELECT -pv.price FROM __variants pv WHERE (pv.stock IS NULL OR pv.stock>0) AND p.id = pv.product_id AND pv.position=(SELECT MIN(position) FROM __variants WHERE (stock>0 OR stock IS NULL) AND product_id=p.id LIMIT 1) LIMIT 1)';
				break;
			}

		if(!empty($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
			{
				$kw = $this->db->escape(trim($keyword));
				if($kw!=='')
					$keyword_filter .= $this->db->placehold("AND (p.id in (SELECT product_id FROM __products_translations WHERE name LIKE '%$kw%'))");
			}
		}
		
		if(isset($filter['language_id'])){
			$translation_columns = $this->db->placehold(', pt.language_id, pt.name, pt.meta_title, pt.meta_description, pt.meta_keywords, pt.annotation, pt.body, pt.url');
			$translation_join = $this->db->placehold('LEFT JOIN __products_translations pt ON p.id = pt.product_id AND pt.language_id=?', intval($filter['language_id']));
		}

		if(!empty($filter['features']) && !empty($filter['features']))
			foreach($filter['features'] as $feature=>$value)
				$features_filter .= $this->db->placehold('AND p.id in (SELECT product_id FROM __options WHERE feature_id=? AND value in (?@) ) ', $feature, (array)$value);
		
		if(!empty($filter['min_price']) && !empty($filter['max_price']))
			$prices = $this->db->placehold('AND p.id in(SELECT v.product_id FROM __variants v WHERE v.price >= ? AND v.price <= ? AND v.product_id = p.id)', intval($filter['min_price']), intval($filter['max_price']));

		$query = "SELECT  
					p.id,
					p.brand_id,
					p.position,
					p.created as created,
					p.visible, 
					p.featured
					$translation_columns
				FROM __products p	
				$translation_join
				$category_id_filter
				WHERE 
					1
					$product_id_filter
					$brand_id_filter
					$features_filter
					$keyword_filter
					$is_featured_filter
					$discounted_filter
					$in_stock_filter
					$visible_filter
					$prices
				$group_by
				ORDER BY $order
					$sql_limit";
					
		$this->db->query($query);
		
		$products = $this->db->results();
		
		if(isset($filter['need_translate'])){
			$languages = $this->languages->get_languages();
			$languages_codes = array();
			foreach($languages as $l)
				$languages_codes[$l->code] = $l->id;
							
			if(count($languages) > 1){
				foreach($products as $p){
					$existing_translations = array();
					foreach($this->products->get_product_group($p->id) as $pg)
						$existing_translations[] = $pg->language_id;
					$need_translate = array_diff($languages_codes, $existing_translations);
					$p->need_translate = array_flip($need_translate);
				}
			}else{
				foreach($products as $p){
					$p->need_translate = '';
				}
			}
		}

		return $products;
	}

	/**
	* Функция возвращает количество товаров
	* Возможные значения фильтра:
	* category_id - id категории или их массив
	* brand_id - id бренда или их массив
	* keyword - ключевое слово для поиска
	* features - фильтр по свойствам товара, массив (id свойства => значение свойства)
	*/
	public function count_products($filter = array())
	{		
		$category_id_filter = '';
		$brand_id_filter = '';
		$product_id_filter = '';
		$keyword_filter = '';
		$visible_filter = '';
		$is_featured_filter = '';
		$in_stock_filter = '';
		$discounted_filter = '';
		$features_filter = '';
		
		if(!empty($filter['category_id']))
			$category_id_filter = $this->db->placehold('INNER JOIN __products_categories pc ON pc.product_id = p.id AND pc.category_id in(?@)', (array)$filter['category_id']);
		
		if(!empty($filter['brand_id']))
			$brand_id_filter = $this->db->placehold('AND p.brand_id in(?@)', (array)$filter['brand_id']);
		
		if(!empty($filter['id']))
			$product_id_filter = $this->db->placehold('AND p.id in(?@)', (array)$filter['id']);
		
		if(!empty($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
			{
				$kw = $this->db->escape(trim($keyword));
				if($kw!=='')
					$keyword_filter .= $this->db->placehold("AND (p.name LIKE '%$kw%' OR p.visible_name LIKE '%$kw%' OR p.meta_keywords LIKE '%$kw%' OR p.id LIKE '%$kw%' OR p.id in (SELECT product_id FROM __variants WHERE sku LIKE '%$kw%'))");
			}
		}

		if(isset($filter['featured']))
			$is_featured_filter = $this->db->placehold('AND p.featured=?', intval($filter['featured']));

		if(isset($filter['in_stock']))
			$in_stock_filter = $this->db->placehold('AND (SELECT count(*)>0 FROM __variants pv WHERE pv.product_id=p.id AND pv.price>0 AND (pv.stock IS NULL OR pv.stock>0) LIMIT 1) = ?', intval($filter['in_stock']));

		if(isset($filter['discounted']))
			$discounted_filter = $this->db->placehold('AND (SELECT 1 FROM __variants pv WHERE pv.product_id=p.id AND pv.compare_price>0 LIMIT 1) = ?', intval($filter['discounted']));

		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND p.visible=? AND (SELECT count(*) FROM __categories, __products_categories WHERE __categories.id = __products_categories.category_id AND __categories.visible=1 AND p.id=__products_categories.product_id) > 0', intval($filter['visible']));
		
		if(!empty($filter['features']) && !empty($filter['features']))
			foreach($filter['features'] as $feature=>$value)
				$features_filter .= $this->db->placehold('AND p.id in (SELECT product_id FROM __options WHERE feature_id=? AND value in (?@) ) ', $feature, (array)$value);
		
		if(!empty($filter['min_price']) && !empty($filter['max_price']))
			$prices = $this->db->placehold('AND p.id in(SELECT v.product_id FROM __variants v WHERE v.price >= ? AND v.price <= ? AND v.product_id = p.id)', intval($filter['min_price']), intval($filter['max_price']));
		
		$query = "SELECT count(distinct p.id) as count
				FROM __products AS p
				$category_id_filter
				WHERE 1
					$brand_id_filter
					$product_id_filter
					$keyword_filter
					$is_featured_filter
					$in_stock_filter
					$discounted_filter
					$visible_filter
					$features_filter
					$prices	";

		$this->db->query($query);	
		return $this->db->result('count');
	}


	/**
	* Функция возвращает товар по id
	* @param	$id
	* @retval	object
	*/
	public function get_product($id)
	{
		if(is_int($id))
			$filter = $this->db->placehold('p.id = ?', $id);
			
		$query = "SELECT
					p.id,
					p.brand_id,
					p.position,
					p.created as created,
					p.visible, 
					p.featured
				FROM __products AS p
                WHERE $filter LIMIT 1";
		$this->db->query($query);
		$product = $this->db->result();
		return $product;
	}

	public function update_product($id, $product)
	{
		$query = $this->db->placehold("UPDATE __products SET ?% WHERE id in (?@)", $product, (array)$id, count((array)$id));
		if($this->db->query($query))
			return $id;
		else
			return false;
	}
	
	public function add_product($product)
	{	
		$product = (array) $product;
		
		if($this->db->query("INSERT INTO __products SET ?%", $product))
		{
			$id = $this->db->insert_id();
			$this->db->query("UPDATE __products SET position=id WHERE id=?", $id);		
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
	public function delete_product($id)
	{
		if(!empty($id))
		{
			// Удаляем варианты
			$variants = $this->variants->get_variants(array('product_id'=>$id));
			foreach($variants as $v)
				$this->variants->delete_variant($v->id);
			
			// Удаляем изображения
			$images = $this->get_images(array('product_id'=>$id));
			foreach($images as $i)
				$this->delete_image($i->id);
			
			// Удаляем категории
			$categories = $this->categories->get_categories(array('product_id'=>$id));
			foreach($categories as $c)
				$this->categories->delete_product_category($id, $c->id);

			// Удаляем свойства
			$options = $this->features->get_options(array('product_id'=>$id));
			foreach($options as $o)
				$this->features->delete_option($id, $o->feature_id);
			
			// Удаляем связанные товары
			$related = $this->get_related_products($id);
			foreach($related as $r)
				$this->delete_related_product($id, $r->related_id);
			
			// Удаляем товар из связанных с другими
			$query = $this->db->placehold("DELETE FROM __related_products WHERE related_id=?", intval($id));
			$this->db->query($query);
			
			$query = $this->db->placehold("DELETE FROM __products_translations WHERE product_id=?", intval($id));
			$this->db->query($query);
			
			// Удаляем отзывы
			/* $comments = $this->comments->get_comments(array('object_id'=>$id, 'type'=>'product'));
			foreach($comments as $c)
				$this->comments->delete_comment($c->id); */
			
			// Удаляем из покупок
			$this->db->query('UPDATE __purchases SET product_id=NULL WHERE product_id=?', intval($id));
			
			// Удаляем товар
			$query = $this->db->placehold("DELETE FROM __products WHERE id=? LIMIT 1", intval($id));
			if($this->db->query($query))
				return true;			
		}
		return false;
	}	
	
	public function duplicate_product($id)
	{
    	$product = $this->get_product($id);
    	$product->id = null;
		$product->name = $product->name.' (дубликат)';
    	$product->external_id = '';
    	$product->created = null;

		// Сдвигаем товары вперед и вставляем копию на соседнюю позицию
    	$this->db->query('UPDATE __products SET position=position+1 WHERE position>?', $product->position);
    	$new_id = $this->products->add_product($product);
    	$this->db->query('UPDATE __products SET position=?, lang_group=? WHERE id=?', $product->position+1, $new_id, $new_id);
    	
    	// Генерируем новый url
    	$this->db->query('UPDATE __products SET url=? WHERE id=?', $product->url."-".$new_id ,$new_id);
    	
		// Дублируем категории
		$categories = $this->categories->get_product_categories($id);
		foreach($categories as $c)
			$this->categories->add_product_category($new_id, $c->category_id);
    	
    	// Дублируем изображения
    	$images = $this->get_images(array('product_id'=>$id));
    	foreach($images as $image)
    		$this->add_image($new_id, $image->filename);
    		
    	// Дублируем варианты
    	$variants = $this->variants->get_variants(array('product_id'=>$id));
    	foreach($variants as $variant)
    	{
    		$variant->product_id = $new_id;
    		unset($variant->id);
    		if($variant->infinity)
    			$variant->stock = null;
    		unset($variant->infinity);
    		$variant->external_id = '';
    		$this->variants->add_variant($variant);
    	}
    	
    	// Дублируем свойства
		$options = $this->features->get_options(array('product_id'=>$id));
		foreach($options as $o)
			$this->features->update_option($new_id, $o->feature_id, $o->value);
			
		// Дублируем связанные товары
		$related = $this->get_related_products($id);
		foreach($related as $r)
			$this->add_related_product($new_id, $r->related_id);
			
    		
    	return $new_id;
	}

	
	public function get_related_products($product_id = array())
	{
		if(empty($product_id))
			return array();
		
		$product_id_filter = $this->db->placehold('AND product_id in(?@)', (array)$product_id);
		
		$query = $this->db->placehold("SELECT product_id, related_id, position
					FROM __related_products
					WHERE 
					1
					$product_id_filter   
					ORDER BY position       
					");
		
		$this->db->query($query);
		return $this->db->results();
	}
	
	// Функция возвращает связанные товары
	public function add_related_product($product_id, $related_id, $position=0)
	{
		$query = $this->db->placehold("INSERT IGNORE INTO __related_products SET product_id=?, related_id=?, position=?", $product_id, $related_id, $position);
		$this->db->query($query);
		return $related_id;
	}
	
	// Удаление связанного товара
	public function delete_related_product($product_id, $related_id)
	{
		$query = $this->db->placehold("DELETE FROM __related_products WHERE product_id=? AND related_id=? LIMIT 1", intval($product_id), intval($related_id));
		$this->db->query($query);
	}
	
	
	function get_images($filter = array())
	{		
		$product_id_filter = '';
		$group_by = '';

		if(!empty($filter['product_id']))
			$product_id_filter = $this->db->placehold('AND i.product_id in(?@)', (array)$filter['product_id']);

		// images
		$query = $this->db->placehold("SELECT i.id, i.product_id, i.name, i.filename, i.position
									FROM __images AS i WHERE 1 $product_id_filter $group_by ORDER BY i.product_id, i.position");
		$this->db->query($query);
		return $this->db->results();
	}
	
	public function add_image($product_id, $filename, $name = '')
	{
		$query = $this->db->placehold("SELECT id FROM __images WHERE product_id=? AND filename=?", $product_id, $filename);
		$this->db->query($query);
		$id = $this->db->result('id');
		if(empty($id))
		{
			$query = $this->db->placehold("INSERT INTO __images SET product_id=?, filename=?", $product_id, $filename);
			$this->db->query($query);
			$id = $this->db->insert_id();
			$query = $this->db->placehold("UPDATE __images SET position=id WHERE id=?", $id);
			$this->db->query($query);
		}
		return($id);
	}
	
	public function update_image($id, $image)
	{
	
		$query = $this->db->placehold("UPDATE __images SET ?% WHERE id=?", $image, $id);
		$this->db->query($query);
		
		return($id);
	}
	
	public function delete_image($id)
	{
		$query = $this->db->placehold("SELECT filename FROM __images WHERE id=?", $id);
		$this->db->query($query);
		$filename = $this->db->result('filename');
		$query = $this->db->placehold("DELETE FROM __images WHERE id=? LIMIT 1", $id);
		$this->db->query($query);
		$query = $this->db->placehold("SELECT count(*) as count FROM __images WHERE filename=? LIMIT 1", $filename);
		$this->db->query($query);
		$count = $this->db->result('count');
		if($count == 0)
		{			
			$file = pathinfo($filename, PATHINFO_FILENAME);
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			
			// Удалить все ресайзы
			$rezised_images = glob($this->config->root_dir.$this->config->resized_images_dir.$file.".*x*.".$ext);
			if(is_array($rezised_images))
			foreach (glob($this->config->root_dir.$this->config->resized_images_dir.$file.".*x*.".$ext) as $f)
				@unlink($f);

			@unlink($this->config->root_dir.$this->config->original_images_dir.$filename);		
		}
	}
	
	public function get_product_translation($id, $language_id=null)
	{
		if(gettype($id) == 'string')
			$where = $this->db->placehold('url=? ', $id);
		else
			$where = $this->db->placehold('product_id=? ', intval($id));
		
		if(!empty($language_id))
			$where .= $this->db->placehold('AND language_id=?', intval($language_id));
		
		$query = "SELECT product_id, language_id, name, meta_title, meta_description, meta_keywords, annotation, body, url
		          FROM __products_translations WHERE $where LIMIT 1";
		
		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_product_translations($language_id)
	{
		$where = $this->db->placehold(' WHERE language_id=?', intval($language_id));
		
		$query = "SELECT product_id, language_id, name, meta_title, meta_description, meta_keywords, annotation, body, url FROM __products_translations $where ORDER BY product_id";

		$this->db->query($query);
		return $this->db->results();
	}
	
	public function get_products_translations($filter = array())
	{
		$limit = 100;
		$page = 1;
		$visible_filter = '';
		
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);
		
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('INNER JOIN __products p ON p.id = pt.product_id AND p.visible=?', intval($filter['visible']));
				
		$query = "SELECT pt.product_id, pt.language_id, pt.name, pt.url FROM __products_translations pt $visible_filter ORDER BY pt.product_id $sql_limit";
		$this->db->query($query);
		return $this->db->results();
	}
	
	public function count_products_translations($filter = array())
	{
		$visible_filter = '';
		
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('INNER JOIN __products p ON p.id = pt.product_id AND p.visible=?', intval($filter['visible']));
				
		$query = "SELECT count(distinct pt.product_id) as count FROM __products_translations pt $visible_filter";
		$this->db->query($query);
		return $this->db->result('count');
	}
	
	public function add_product_translation($translation)
	{	
		$translation = (array)$translation;
		if(empty($translation['url']))
		{
			$translation['url'] = preg_replace("/[\s]+/ui", '-', $translation['name']);
			$translation['url'] = strtolower(preg_replace("/[^0-9a-zа-я\-]+/ui", '', $translation['url']));
		}

		// Если есть товар с таким URL, добавляем к нему число
		while($this->get_product_translation((string)$translation['url']))
		{
			if(preg_match('/(.+)_([0-9]+)$/', $translation['url'], $parts))
				$translation['url'] = $parts[1].'_'.($parts[2]+1);
			else
				$translation['url'] = $translation['url'].'_2';
		}
	
		$query = $this->db->placehold('INSERT INTO __products_translations SET ?%', $translation);
		if(!$this->db->query($query))
			return false;
		
		return true;
	}
	
	public function delete_product_translation($id, $language_id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __products_translations WHERE product_id=? AND language_id=? LIMIT 1", intval($id), intval($language_id));
			if($this->db->query($query))
				return true;
		}
		return false;
	}	
	public function get_product_group($id)
	{
		$where = $this->db->placehold(' WHERE product_id=?', intval($id));
		
		$query = "SELECT product_id, language_id, name, url FROM __products_translations $where ";

		$this->db->query($query);
		$cg = array();
		foreach($this->db->results() as $c){
			$cg[$c->language_id] = $c;
		}
		return $cg;
	}
	
}
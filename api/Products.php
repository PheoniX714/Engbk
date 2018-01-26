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
		$colors_id_filter = '';
		$brand_id_filter = '';
		$product_id_filter = '';
		$features_filter = '';
		$keyword_filter = '';
		$visible_filter = '';
		$is_featured_filter = '';
		$discounted_filter = '';
		$in_stock_filter = '';
		$first_in_group = '';
		$group_by = '';
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
		
		if(!empty($filter['colors']))
			$colors_id_filter = $this->db->placehold('AND p.color in(?@)', (array)$filter['colors']);

		if(isset($filter['featured']))
			$is_featured_filter = $this->db->placehold('AND p.featured=?', intval($filter['featured']));

		if(isset($filter['discounted']))
			$discounted_filter = $this->db->placehold('AND (SELECT 1 FROM __variants pv WHERE pv.product_id=p.id AND pv.compare_price>0 LIMIT 1) = ?', intval($filter['discounted']));

		if(isset($filter['in_stock']))
			$in_stock_filter = $this->db->placehold('AND (SELECT count(*)>0 FROM __variants pv WHERE pv.product_id=p.id AND pv.price>0 AND (pv.stock IS NULL OR pv.stock>0) LIMIT 1) = ?', intval($filter['in_stock']));

		if(!empty($filter['visible']))
			$visible_filter = $this->db->placehold('AND p.visible=? AND (SELECT count(*) FROM __categories, __products_categories WHERE __categories.id = __products_categories.category_id AND __categories.visible=1 AND p.id=__products_categories.product_id) > 0', intval($filter['visible']));
		
		if(isset($filter['visible_admin']))
			$visible_filter = $this->db->placehold('AND p.visible=?', intval($filter['visible_admin']));
		
		if(!empty($filter['first_in']))
			$first_in_group = $this->db->placehold('AND (SELECT pgi.position FROM __products_groups_items AS pgi WHERE p.id = pgi.product_id LIMIT 1) = 0');

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
					$keyword_filter .= $this->db->placehold("AND (p.name LIKE '%$kw%' OR p.visible_name LIKE '%$kw%' OR p.meta_keywords LIKE '%$kw%' OR p.id LIKE '%$kw%' OR p.id in (SELECT product_id FROM __variants WHERE sku LIKE '%$kw%'))");
			}
		}

		if(!empty($filter['features']) && !empty($filter['features']))
			foreach($filter['features'] as $feature=>$value)
				$features_filter .= $this->db->placehold('AND p.id in (SELECT product_id FROM __options WHERE feature_id=? AND value in (?@) ) ', $feature, $value);
				
		if(!empty($filter['min_price']) && !empty($filter['max_price']))
			$prices = $this->db->placehold('AND p.id in(SELECT v.product_id FROM __variants v WHERE v.price >= ? AND v.price <= ? AND v.product_id = p.id)', intval($filter['min_price']), intval($filter['max_price']));

		$query = "SELECT  
					p.id,
					p.url,
					p.brand_id,
					p.name,
					p.visible_name,
					p.annotation,
					p.body,
					p.color,
					p.position,
					p.created as created,
					p.visible, 
					p.featured, 
					p.meta_title, 
					p.meta_keywords, 
					p.meta_description
				FROM __products p		
				$category_id_filter 
				WHERE 
					1
					$product_id_filter
					$brand_id_filter
					$colors_id_filter
					$first_in_group
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

		return $this->db->results();
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
		$colors_id_filter = '';
		$product_id_filter = '';
		$keyword_filter = '';
		$visible_filter = '';
		$is_featured_filter = '';
		$in_stock_filter = '';
		$first_in_group = '';
		$discounted_filter = '';
		$features_filter = '';
		
		if(!empty($filter['category_id']))
			$category_id_filter = $this->db->placehold('INNER JOIN __products_categories pc ON pc.product_id = p.id AND pc.category_id in(?@)', (array)$filter['category_id']);
		
		if(!empty($filter['not_in_category_id']))
			$category_id_filter = $this->db->placehold('INNER JOIN __products_categories pc ON pc.product_id = p.id AND pc.category_id not in(?@)', (array)$filter['not_in_category_id']);
		
		if(!empty($filter['brand_id']))
			$brand_id_filter = $this->db->placehold('AND p.brand_id in(?@)', (array)$filter['brand_id']);
		
		if(!empty($filter['colors']))
			$colors_id_filter = $this->db->placehold('AND p.color in(?@)', (array)$filter['colors']);

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

		if(!empty($filter['visible']))
			$visible_filter = $this->db->placehold('AND p.visible=? AND (SELECT count(*) FROM __categories, __products_categories WHERE __categories.id = __products_categories.category_id AND __categories.visible=1 AND p.id=__products_categories.product_id) > 0', intval($filter['visible']));
		
		if(isset($filter['visible_admin']))
			$visible_filter = $this->db->placehold('AND p.visible=?', intval($filter['visible_admin']));
		
		
		if(!empty($filter['features']) && !empty($filter['features']))
			foreach($filter['features'] as $feature=>$value)
				$features_filter .= $this->db->placehold('AND p.id in (SELECT product_id FROM __options WHERE feature_id=? AND value in (?@) ) ', $feature, $value);
				
		if(!empty($filter['first_in']))
			$first_in_group = $this->db->placehold('AND (SELECT pgi.position FROM __products_groups_items AS pgi WHERE p.id = pgi.product_id LIMIT 1) = 0');
		
		if(!empty($filter['min_price']) && !empty($filter['max_price']))
			$prices = $this->db->placehold('AND p.id in(SELECT v.product_id FROM __variants v WHERE v.price >= ? AND v.price <= ? AND v.product_id = p.id)', intval($filter['min_price']), intval($filter['max_price']));
		
		$query = "SELECT count(distinct p.id) as count
				FROM __products AS p
				$category_id_filter
				WHERE 1
					$brand_id_filter
					$colors_id_filter
					$product_id_filter
					$keyword_filter
					$first_in_group
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
		else
			$filter = $this->db->placehold('p.url = ?', $id);
			
		$query = "SELECT DISTINCT
					p.id,
					p.url,
					p.brand_id,
					p.name,
					p.visible_name,
					p.annotation,
					p.body,
					p.color,
					p.position,
					p.created as created,
					p.visible, 
					p.featured, 
					p.meta_title, 
					p.meta_keywords, 
					p.meta_description
				FROM __products AS p
                WHERE $filter
                GROUP BY p.id
                LIMIT 1";
		$this->db->query($query);
		$product = $this->db->result();
		return $product;
	}

	public function update_product($id, $product)
	{
		$query = $this->db->placehold("UPDATE __products SET ?% WHERE id in (?@) LIMIT ?", $product, (array)$id, count((array)$id));
		if($this->db->query($query))
			return $id;
		else
			return false;
	}
	
	public function add_product($product)
	{	
		$product = (array) $product;
		
		if(empty($product['url']))
		{
			$product['url'] = preg_replace("/[\s]+/ui", '-', $product['name']);
			$product['url'] = strtolower(preg_replace("/[^0-9a-zа-я\-]+/ui", '', $product['url']));
		}

		// Если есть товар с таким URL, добавляем к нему число
		while($this->get_product((string)$product['url']))
		{
			if(preg_match('/(.+)_([0-9]+)$/', $product['url'], $parts))
				$product['url'] = $parts[1].'_'.($parts[2]+1);
			else
				$product['url'] = $product['url'].'_2';
		}
		if($this->db->query("INSERT INTO __products SET ?%", $product))
		{
			$id = $this->db->insert_id();
			$this->db->query("UPDATE __products SET position=id WHERE id=?", $id);		
			return $id;
		}
		else
			return false;
	}
	
	public function get_products_colors($filter = array())
	{		
		// По умолчанию
		$category_id_filter = '';
		$brand_id_filter = '';
		$product_id_filter = '';
		$features_filter = '';
		$keyword_filter = '';
		$visible_filter = '';
		$is_featured_filter = '';
		$discounted_filter = '';
		$in_stock_filter = '';
		$first_in_group = '';
		$group_by = '';
		
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

		if(!empty($filter['visible']))
			$visible_filter = $this->db->placehold('AND p.visible=? AND (SELECT count(*) FROM __categories, __products_categories WHERE __categories.id = __products_categories.category_id AND __categories.visible=1 AND p.id=__products_categories.product_id) > 0', intval($filter['visible']));
		
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

		if(!empty($filter['features']) && !empty($filter['features']))
			foreach($filter['features'] as $feature=>$value)
				$features_filter .= $this->db->placehold('AND p.id in (SELECT product_id FROM __options WHERE feature_id=? AND value in (?@) ) ', $feature, $value);

		$query = "SELECT p.color FROM __products p 
				$category_id_filter 
				WHERE 
					1
					$product_id_filter
					$brand_id_filter
					$first_in_group
					$features_filter
					$keyword_filter
					$is_featured_filter
					$discounted_filter
					$in_stock_filter
					$visible_filter
				GROUP BY p.color
				ORDER BY p.color";
		
		$this->db->query($query);
		
		$results = array();
		foreach($r = $this->db->results() as $c)
			$results[] = $c->color;
			
		return $results;
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
    	$product->external_id = '';
    	$product->created = null;

		// Сдвигаем товары вперед и вставляем копию на соседнюю позицию
    	$this->db->query('UPDATE __products SET position=position+1 WHERE position>?', $product->position);
    	$new_id = $this->products->add_product($product);
    	$this->db->query('UPDATE __products SET position=? WHERE id=?', $product->position+1, $new_id);
    	
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
	
	// Мультиязычность
	public function get_products_translation($filter = array())
	{		
		// По умолчанию
		$product_id_filter = '';
		$language_filter = '';
		$order = 't.product_id DESC';

		if(!empty($filter['id']))
			$product_id_filter = $this->db->placehold('AND t.product_id in(?@)', (array)$filter['id']);

		if(isset($filter['language_id']))
			$language_filter = $this->db->placehold('AND t.language_id = ?', intval($filter['language_id']));
					
		$query = "SELECT
					t.product_id,
					t.language_id,
					t.name,
					t.visible_name,
					t.annotation,
					t.body,
					t.meta_title, 
					t.meta_keywords, 
					t.meta_description
				FROM __products_translations AS t
				WHERE 
					1
					$product_id_filter
					$language_filter
				ORDER BY $order";
		
		$this->db->query($query);

		return $this->db->results();
	}
	public function get_product_translation($product_id, $language_id)
	{
		$query = "SELECT
					t.product_id,
					t.language_id,
					t.name,
					t.visible_name,
					t.annotation,
					t.body,
					t.meta_title, 
					t.meta_keywords, 
					t.meta_description
				FROM __products_translations AS t
				WHERE t.product_id = $product_id AND t.language_id = $language_id
				LIMIT 1";
		$this->db->query($query);
		$product = $this->db->result();
		return $product;
	}
	
	public function add_product_translation($translation)
	{	
		$translation = (array) $translation;
		
		if($translation['product_id']){
			$this->db->query("INSERT INTO __products_translations SET ?%", $translation);
			return true;
		}else
			return false;
	}
	
	public function delete_product_translation($product_id, $language_id)
	{
		if(!empty($product_id) and !empty($language_id))
		{
			$query = $this->db->placehold("DELETE FROM __products_translations WHERE product_id=? and language_id=? LIMIT 1", intval($product_id), intval($language_id));
			if($this->db->query($query))
				return true;			
		}
		return false;
	}
	
	
	//Группы товаров
	public function get_groups($filter = array())
	{
		$limit = 100;
		$page = 1;
		
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);
		
		$query = "SELECT DISTINCT
					gp.id,
					gp.group_code,
					gp.visible
				FROM __products_groups AS gp
                GROUP BY gp.id $sql_limit";
		$this->db->query($query);
		$groups = $this->db->results();
		return $groups;
	}
	
	public function count_groups($filter = array())
	{		
		$query = "SELECT count(distinct gp.id) as count
				FROM __products_groups AS gp";

		$this->db->query($query);	
		return $this->db->result('count');
	}
	
	public function get_group($id)
	{
		if(is_int($id))
			$filter = $this->db->placehold('gp.id = ?', $id);
		else
			$filter = $this->db->placehold('gp.group_code = ?', $id);
			
		$query = "SELECT DISTINCT
					gp.id,
					gp.group_code,
					gp.visible
				FROM __products_groups AS gp
                WHERE $filter
                GROUP BY gp.id
                LIMIT 1";
		$this->db->query($query);
		$group = $this->db->result();
		return $group;
	}
	
	public function update_group($id, $group)
	{
		$query = $this->db->placehold("UPDATE __products_groups SET ?% WHERE id in (?@) LIMIT ?", $group, (array)$id, count((array)$id));
		if($this->db->query($query))
			return $id;
		else
			return false;
	}
	
	public function add_group($group)
	{	
		$group = (array) $group;
				
		if($this->db->query("INSERT INTO __products_groups SET ?%", $group))
		{
			$id = $this->db->insert_id();
			return $id;
		}
		else
			return false;
	}
	
	public function get_group_products($group_id)
	{		
		$group_id_filter = $this->db->placehold('AND group_id=?', intval($group_id));
			
		$query = "SELECT
					group_id,
					product_id,
					position
				FROM __products_groups_items
				WHERE 
					1
					$group_id_filter
				ORDER BY position";

		$this->db->query($query);
		return $this->db->results();
	}
	
	public function get_group_product($product_id)
	{		
		$product_id_filter = $this->db->placehold('AND product_id=?', intval($product_id));
			
		$query = "SELECT
					group_id,
					product_id,
					position
				FROM __products_groups_items
				WHERE 
					1
					$product_id_filter
				LIMIT 1";

		$this->db->query($query);
		return $this->db->result();
	}
	public function get_products_groups($product_ids)
	{		
		$product_id_filter = $this->db->placehold('AND product_id in(?@)', (array)$product_ids);
			
		$query = "SELECT
					group_id,
					product_id,
					position
				FROM __products_groups_items
				WHERE 
					1
					$product_id_filter";

		$this->db->query($query);
		return $this->db->results();
	}
	
	public function add_group_product($product_id, $group_id, $position=0)
	{
		$query = $this->db->placehold("INSERT IGNORE INTO __products_groups_items SET product_id=?, group_id=?, position=?", $product_id, $group_id, $position);
		$this->db->query($query);
		return $group_id;
	}
	
	public function delete_group($group_id)
	{
		
		$this->delete_group_products($group_id);
		
		$query = $this->db->placehold("DELETE FROM __products_groups WHERE id=?", intval($group_id));
		$this->db->query($query);
	}
	
	public function delete_group_product($product_id, $group_id)
	{
		$query = $this->db->placehold("DELETE FROM __products_groups_items WHERE product_id=? AND group_id=? LIMIT 1", intval($product_id), intval($group_id));
		$this->db->query($query);
	}
	
	public function delete_group_products($group_id)
	{
		$query = $this->db->placehold("DELETE FROM __products_groups_items WHERE group_id=?", intval($group_id));
		$this->db->query($query);
	}
}
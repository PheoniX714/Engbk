<?php

require_once('api/Engine.php');

class ProductAdmin extends Engine
{
	public function fetch()
	{
	
		$options = array();
		$product_categories = array();
		$variants = array();
		$images = array();
		$product_features = array();
		$related_products = array();
				
		if($this->request->method('post') && !empty($_POST))
		{
			$language_id = $this->request->post('language_id', 'integer');
			if(!empty($language_id) and $language_id > 1){
				$translation = new stdClass;
				$v_translations = array();
				
				$translation->product_id = $this->request->post('id', 'integer');
				$translation->language_id = $this->request->post('language_id', 'integer');
				$translation->name = $this->request->post('name');
				$translation->visible_name = $this->request->post('visible_name');
				$translation->annotation = $this->request->post('annotation');
				$translation->body = $this->request->post('body');
				$translation->meta_title = $this->request->post('meta_title');
				$translation->meta_keywords = $this->request->post('meta_keywords');
				$translation->meta_description = $this->request->post('meta_description');
				
				if($this->request->post('variants'))
				foreach($this->request->post('variants') as $n=>$va)
				{
					foreach($va as $i=>$v)
					{
						if(empty($v_translations[$i]))
							$v_translations[$i] = new stdClass;
						$v_translations[$i]->$n = $v;
					}
				}
				
				if(!empty($translation->product_id)){
					$this->products->delete_product_translation(intval($translation->product_id), intval($language_id));
					
					if($this->products->add_product_translation($translation)){
						
						$translation = $this->products->get_product_translation(intval($translation->product_id), intval($language_id));
						
						header('Location: index.php?module=ProductAdmin&id='.$translation->product_id.'&language_id='.$translation->language_id);
					}
				}
				
			}else{
				$product = new stdClass;
				$product->id = $this->request->post('id', 'integer');
				$product->name = $this->request->post('name');
				$product->visible_name = $this->request->post('visible_name');
				$product->visible = $this->request->post('visible', 'boolean');
				$product->featured = $this->request->post('featured', 'boolean');
				#$product->brand_id = $this->request->post('brand_id', 'integer');
				
				$product->color = $this->request->post('color', 'string');

				$product->url = trim($this->request->post('url', 'string'));
				$product->meta_title = $this->request->post('meta_title');
				$product->meta_keywords = $this->request->post('meta_keywords');
				$product->meta_description = $this->request->post('meta_description');
				
				$product->annotation = $this->request->post('annotation');
				$product->body = $this->request->post('body');

				// Варианты товара
				if($this->request->post('variants'))
				foreach($this->request->post('variants') as $n=>$va)
				{
					foreach($va as $i=>$v)
					{
						if(empty($variants[$i]))
							$variants[$i] = new stdClass;
						$variants[$i]->$n = $v;
					}
				}

				// Категории товара
				$product_categories = $this->request->post('categories');
				if(is_array($product_categories))
				{
					foreach($product_categories as $c)
					{
						$x = new stdClass;
						$x->id = $c;
						$pc[] = $x;
					}
					$product_categories = $pc;
				}

				// Свойства товара
				$options = $this->request->post('options');
				if(is_array($options))
				{
					foreach($options as $f_id=>$val)
					{
						$po[$f_id] = new stdClass;
						$po[$f_id]->feature_id = $f_id;
						$po[$f_id]->value = $val;
					}
					$options = $po;
				}

				// Связанные товары
				if(is_array($this->request->post('related_products')))
				{
					foreach($this->request->post('related_products') as $p)
					{
						$rp[$p] = new stdClass;
						$rp[$p]->product_id = $product->id;
						$rp[$p]->related_id = $p;
					}
					$related_products = $rp;
				}
					
				// Не допустить пустое название товара.
				if(empty($product->name))
				{			
					$this->templates->assign('message_error', 'empty_name');
					if(!empty($product->id))
						$images = $this->products->get_images(array('product_id'=>$product->id));
				}
				// Не допустить одинаковые URL разделов.
				elseif(($p = $this->products->get_product($product->url)) && $p->id!=$product->id)
				{			
					$this->templates->assign('message_error', 'url_exists');
					if(!empty($product->id))
						$images = $this->products->get_images(array('product_id'=>$product->id));
				}
				else
				{
					if(empty($product->id))
					{
						$product->id = $this->products->add_product($product);
						$product = $this->products->get_product($product->id);
						$this->templates->assign('message_success', 'added');
						
					}
					else
					{
						$this->products->update_product($product->id, $product);
						$product = $this->products->get_product($product->id);
						$this->templates->assign('message_success', 'updated');
					}	
					
					if($product->id)
					{
						// Категории товара
						$query = $this->db->placehold('DELETE FROM __products_categories WHERE product_id=?', $product->id);
						$this->db->query($query);
						if(is_array($product_categories))
						{
							foreach($product_categories as $i=>$category)
								$this->categories->add_product_category($product->id, $category->id, $i);
						}
		
						// Варианты
						if(is_array($variants))
						{ 
							$variants_ids = array();
							foreach($variants as $index=>&$variant)
							{
								if($variant->stock == '∞' || $variant->stock == '')
									$variant->stock = null;
		
								if(!empty($variant->id))
									$this->variants->update_variant($variant->id, $variant);
								else
								{
									$variant->product_id = $product->id;
									$variant->id = $this->variants->add_variant($variant);
								}
								$variant = $this->variants->get_variant($variant->id);
								if(!empty($variant->id))
									$variants_ids[] = $variant->id;
							}
							
		
							// Удалить непереданные варианты
							$current_variants = $this->variants->get_variants(array('product_id'=>$product->id));
							foreach($current_variants as $current_variant)
								if(!in_array($current_variant->id, $variants_ids))
									$this->variants->delete_variant($current_variant->id);
							
							
							// Отсортировать  варианты
							asort($variants_ids);
							$i = 0;
							foreach($variants_ids as $variant_id)
							{ 
								$this->variants->update_variant($variants_ids[$i], array('position'=>$variant_id));
								$i++;
							}
						}
						// Загрузка изображений
						if($images = $this->request->files('new_images'))
						{
							for($i=0; $i<count($images['name']); $i++)
							{
								if ($image_name = $this->image->upload_image($images['tmp_name'][$i], $images['name'][$i], $this->config->original_images_dir))
								{
									$this->products->add_image($product->id, $image_name);
								}
								else
								{
									$this->templates->assign('error', 'error uploading image');
								}
							}
						}

						$images_positions = $this->request->post('positions'); 
						$images_positions = array_flip($images_positions);
						foreach($images_positions as $id=>$position)
							$this->products->update_image($id, array('position'=>$position)); 
							
						$images = $this->products->get_images(array('product_id'=>$product->id));
		
						// Характеристики товара
						
						// Удалим все из товара
						foreach($this->features->get_product_options($product->id) as $po)
							$this->features->delete_option($product->id, $po->feature_id);
							
						// Свойства текущей категории
						$category_features = array();
						foreach($this->features->get_features(array('category_id'=>$product_categories[0])) as $f)
							$category_features[] = $f->id;
		
						if(is_array($options))
						foreach($options as $option)
						{
							if(in_array($option->feature_id, $category_features))
								$this->features->update_option($product->id, $option->feature_id, $option->value);
						}
						
						// Новые характеристики
						$new_features_names = $this->request->post('new_features_names');
						$new_features_values = $this->request->post('new_features_values');
						if(is_array($new_features_names) && is_array($new_features_values))
						{
							foreach($new_features_names as $i=>$name)
							{
								$value = trim($new_features_values[$i]);
								if(!empty($name) && !empty($value))
								{
									$query = $this->db->placehold("SELECT * FROM __features WHERE name=? LIMIT 1", trim($name));
									$this->db->query($query);
									$feature_id = $this->db->result('id');
									if(empty($feature_id))
									{
										$feature_id = $this->features->add_feature(array('name'=>trim($name)));
									}
									$this->features->add_feature_category($feature_id, reset($product_categories)->id);
									$this->features->update_option($product->id, $feature_id, $value);
								}
							}
							// Свойства товара
							$options = $this->features->get_product_options($product->id);
						}
						
						// Связанные товары
						$query = $this->db->placehold('DELETE FROM __related_products WHERE product_id=?', $product->id);
						$this->db->query($query);
						if(is_array($related_products))
						{
							$pos = 0;
							foreach($related_products  as $i=>$related_product)
								$this->products->add_related_product($product->id, $related_product->related_id, $pos++);
						}
						header('Location: index.php?module=ProductAdmin&id='.$product->id);
					}
					
					$ids = $this->request->post('check');
					if(!empty($ids))
					switch($this->request->post('action'))
					{
						case 'delete':
						{
							foreach($ids as $id)
								$this->products->delete_image($id);
							break;
						}
					}
				}
			}
			
			
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			$product = $this->products->get_product(intval($id));
			
			$language_id = $this->request->get('language_id', 'integer');

			if($product)
			{
				// Категории товара
				$product_categories = $this->categories->get_categories(array('product_id'=>$product->id));
				
				// Варианты товара
				$variants = $this->variants->get_variants(array('product_id'=>$product->id));
				
				// Изображения товара
				$images = $this->products->get_images(array('product_id'=>$product->id));
				
				// Свойства товара
				$options = $this->features->get_options(array('product_id'=>$product->id));
				
				// Связанные товары
				$related_products = $this->products->get_related_products(array('product_id'=>$product->id));
			}
			else
			{
				// Сразу активен
				$product = new stdClass;
				$product->visible = 1;			
			}
			
			if($language_id > 1 and $product->id){
				$translation = $this->products->get_product_translation(intval($product->id), intval($language_id));
				if(empty($translation)){
					$translation = new stdClass;
					$translation->name = '';
					$translation->visible_name = '';
					$translation->meta_title = '';
					$translation->meta_keywords = '';
					$translation->meta_description = '';
					$translation->body = '';
					$translation->annotation = '';
				}
					
			}else{
				$language_id = 1;
				$translation = false;
			}
			
			if($translation){
				$product->name = $translation->name;
				$product->visible_name = $translation->visible_name;
				$product->meta_title = $translation->meta_title;
				$product->meta_keywords = $translation->meta_keywords;
				$product->meta_description = $translation->meta_description;
				$product->annotation = $translation->annotation;
				$product->body = $translation->body;
			}
		}
		
		
		if(empty($variants))
			$variants = array(1);
			
		if(empty($product_categories))
		{
			if($category_id = $this->request->get('category_id'))
				$product_categories[0]->id = $category_id;		
			else
				$product_categories = array(1);
		}
		/* if(empty($product->brand_id) && $brand_id=$this->request->get('brand_id'))
		{
			$product->brand_id = $brand_id;
		} */
			
		if(!empty($related_products))
		{
			foreach($related_products as &$r_p)
				$r_products[$r_p->related_id] = &$r_p;
			$temp_products = $this->products->get_products(array('id'=>array_keys($r_products)));
			foreach($temp_products as $temp_product)
				$r_products[$temp_product->id] = $temp_product;
		
			$related_products_images = $this->products->get_images(array('product_id'=>array_keys($r_products)));
			foreach($related_products_images as $image)
			{
				$r_products[$image->product_id]->images[] = $image;
			}
		}
		
		$product_group = $this->products->get_group_product(intval($product->id));
		$this->templates->assign('product_group', $product_group);
		
		/* if($product_group){
			$group_products_ids = array();
			$group_products = array();
			foreach($this->products->get_group_products($product_group->group_id) as $p)
			{
				$group_products_ids[] = $p->product_id;
				$group_products[$p->product_id] = null;
			}
			
			if(!empty($group_products_ids))
			{
				foreach($this->products->get_products(array('id'=>$group_products_ids, 'category_id'=>'', 'visible'=>1)) as $p)
					$group_products[$p->id] = $p;
					
				$this->templates->assign('group_products', $group_products);
			}
		} */
			
		if(is_array($options))
		{
			$temp_options = array();
			foreach($options as $option)
				$temp_options[$option->feature_id] = $option;
			$options = $temp_options;
		}

		$this->templates->assign('product', $product);

		$this->templates->assign('product_categories', $product_categories);
		$this->templates->assign('product_variants', $variants);
		$this->templates->assign('product_images', $images);
		$this->templates->assign('options', $options);
		$this->templates->assign('related_products', $related_products);		
		
		/* // Все бренды
		$brands = $this->brands->get_brands();
		$this->templates->assign('brands', $brands); */
		
		$this->templates->assign('language_id', $language_id);
		
		// Все языки
		$languages = $this->languages->get_languages();
		$this->templates->assign('languages', $languages);
		
		// Все категории
		$categories = $this->categories->get_categories_tree();
		$this->templates->assign('categories', $categories);
		
		// Все свойства товара
		$category = reset($product_categories);
		if(!is_object($category))
			$category = reset($categories);		
		if(is_object($category))
		{
			$features = $this->features->get_features(array('category_id'=>$category->id));
			$this->templates->assign('features', $features);
		}
		
 	  	return $this->templates->fetch('products/product.tpl');
	}
}
<?php
 
require_once('View.php');

class ProductsView extends View
{
 	/**
	 *
	 * Отображение списка товаров
	 *
	 */	
	function fetch()
	{
		
		// GET-Параметры
		$category_url = $this->request->get('category', 'string');
		$brand_url    = $this->request->get('brand', 'string');
		
		$filter = array();
		$filter['visible'] = 1;
		$filter['first_in'] = 1;

		// Если задан бренд, выберем его из базы
		if (!empty($brand_url))
		{
			$brand = $this->brands->get_brand((string)$brand_url);
			if (empty($brand))
				return false;
			$this->templates->assign('brand', $brand);
			$filter['brand_id'] = $brand->id;
		}
		
		// Выберем текущую категорию
		if (!empty($category_url))
		{
			$category = $this->categories->get_category((string)$category_url);
			if (empty($category) || (!$category->visible && empty($_SESSION['admin'])))
				return false;
			$this->templates->assign('category', $category);
			$filter['category_id'] = $category->children;
		}
		
		
		// Если задано ключевое слово
		$keyword = $this->request->get('keyword');
		if (!empty($keyword))
		{
			$this->templates->assign('keyword', $keyword);
			$filter['keyword'] = $keyword;
		}

		// Сортировка товаров, сохраняем в сесси, чтобы текущая сортировка оставалась для всего сайта
		if($sort = $this->request->get('sort', 'string'))
			$_SESSION['sort'] = $sort;		
		if (!empty($_SESSION['sort']))
			$filter['sort'] = $_SESSION['sort'];			
		else
			$filter['sort'] = 'position';			
		$this->templates->assign('sort', $filter['sort']);
		
		// Сортировка товаров, сохраняем в сесси, чтобы текущая сортировка оставалась для всего сайта
		if($display = $this->request->get('display', 'string'))
			$_SESSION['display'] = $display;		
		if (!empty($_SESSION['display']))
			$this->templates->assign('display', $_SESSION['display']);
		else
			$this->templates->assign('display', 'grid');
		
		
		// Свойства товаров
		if(!empty($category))
		{
			$features = array();
			$filter['features'] = array();
			foreach($this->features->get_features(array('category_id'=>$category->id, 'in_filter'=>1)) as $feature)
			{ 
				$features[$feature->id] = $feature;
				if(($val = $this->request->get($feature->id))!='')
					$filter['features'][$feature->id] = $val;	
			}
			
			$options_filter['visible'] = 1;
			
			$features_ids = array_keys($features);
			if(!empty($features_ids))
				$options_filter['feature_id'] = $features_ids;
			$options_filter['category_id'] = $category->children;
			if(isset($filter['features']))
				$options_filter['features'] = $filter['features'];
			if(!empty($brand))
				$options_filter['brand_id'] = $brand->id;
			
			$options = $this->features->get_options($options_filter);

			foreach($options as $option)
			{
				if(isset($features[$option->feature_id]))
					$features[$option->feature_id]->options[] = $option;
			}
			
			foreach($features as $i=>&$feature)
			{ 
				if(empty($feature->options))
					unset($features[$i]);
			}

			$this->templates->assign('features', $features);
 		}
		$this->templates->assign('filter_features', $filter['features']);
		// Постраничная навигация
		$items_per_page = $this->settings->products_num;		
		// Текущая страница в постраничном выводе
		$current_page = $this->request->get('page', 'integer');
		// Если не задана, то равна 1
		$current_page = max(1, $current_page);
		$this->templates->assign('current_page_num', $current_page);
		// Вычисляем количество страниц
		$products_count = $this->products->count_products($filter);
		
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$items_per_page = $products_count;	
		
		$pages_num = ceil($products_count/$items_per_page);
		$this->templates->assign('total_pages_num', $pages_num);
		$this->templates->assign('total_products_num', $products_count);

		$filter['page'] = $current_page;
		$filter['limit'] = $items_per_page;
		
		///////////////////////////////////////////////
		// Постраничная навигация END
		///////////////////////////////////////////////
		

		$discount = 0;
		if(isset($_SESSION['user_id']) && $user = $this->users->get_user(intval($_SESSION['user_id'])))
			$discount = $user->discount;
			
		
		// Товары 
		$products = array();
		foreach($this->products->get_products($filter) as $p)
			$products[$p->id] = $p;
			
		// Если искали товар и найден ровно один - перенаправляем на него
		if(!empty($keyword) && $products_count == 1)
			header('Location: '.$this->config->root_url.'/products/'.$p->url);
		
		if(!empty($products))
		{
			$products_ids = array_keys($products);
			
			$language_id = $_SESSION['lang']->id;
						
			if($language_id > 1){
				$translation_filter = array();
				$translation_filter['id'] = $products_ids;
				$translation_filter['language_id'] = $language_id;
				
				$products_translation = array();
				foreach($this->products->get_products_translation($translation_filter) as $t)
					$products_translation[$t->product_id] = $t;
			}
			
			foreach($products as &$product)
			{
				if($products_translation){
					$product->name = $products_translation[$product->id]->name;
					$product->visible_name = $products_translation[$product->id]->visible_name;
					$product->meta_title = $products_translation[$product->id]->meta_title;
					$product->meta_keywords = $products_translation[$product->id]->meta_keywords;
					$product->meta_description = $products_translation[$product->id]->meta_description;
					$product->annotation = $products_translation[$product->id]->annotation;
					$product->body = $products_translation[$product->id]->body;
				}
				
				$product->variants = array();
				$product->images = array();
				$product->properties = array();
			}
	
			$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));
			
			foreach($variants as &$variant)
			{
				//$variant->price *= (100-$discount)/100;
				$products[$variant->product_id]->variants[] = $variant;
			}
			
			$groups_products = array();
			$products_groups = $this->products->get_products_groups($products_ids);
			foreach($products_groups as $pg){
				$group_products_ids = array();
				$group_products = array();
				foreach($this->products->get_group_products($pg->group_id) as $p)
				{
					$group_products_ids[] = $p->product_id;
					$group_products[$p->product_id] = null;
				}
				
				if(!empty($group_products_ids))
				{
					foreach($this->products->get_products(array('id'=>$group_products_ids, 'category_id'=>'', 'visible'=>1)) as $p){
						$img = array();
						$img = $this->products->get_images(array('product_id'=>$p->id));
						
						$p->image = $img[0];
						$groups_products[$pg->product_id][$p->id] = $p;
					}
				}
				
			}
			
	
			$images = $this->products->get_images(array('product_id'=>$products_ids));
			foreach($images as $image)
				$products[$image->product_id]->images[] = $image;

			foreach($products as &$product)
			{
				if(isset($product->variants[0]))
					$product->variant = $product->variants[0];
				if(isset($product->images[0]))
					$product->image = $product->images[0];
				if(count($groups_products[$product->id]) > 1)
					$product->group_products = $groups_products[$product->id];
			}
				
			/*
			$properties = $this->features->get_options(array('product_id'=>$products_ids));
			foreach($properties as $property)
				$products[$property->product_id]->options[] = $property;
			*/
	
			$this->templates->assign('products', $products);
 		}
		
		// Выбираем бренды, они нужны нам в шаблоне	
		if(!empty($category))
		{
			/* $brands = $this->brands->get_brands(array('category_id'=>$category->children, 'visible'=>1)); */
			$category->brands = $brands;
		}
		
		// Устанавливаем мета-теги в зависимости от запроса
		if($this->page)
		{
			$this->templates->assign('meta_title', $this->page->meta_title);
			$this->templates->assign('meta_keywords', $this->page->meta_keywords);
			$this->templates->assign('meta_description', $this->page->meta_description);
		}
		elseif(isset($category))
		{
			$this->templates->assign('meta_title', $category->meta_title);
			$this->templates->assign('meta_keywords', $category->meta_keywords);
			$this->templates->assign('meta_description', $category->meta_description);
		}
		elseif(isset($brand))
		{
			$this->templates->assign('meta_title', $brand->meta_title);
			$this->templates->assign('meta_keywords', $brand->meta_keywords);
			$this->templates->assign('meta_description', $brand->meta_description);
		}
		elseif(isset($keyword))
		{
			$this->templates->assign('meta_title', $keyword);
		}
		
			
		$this->body = $this->templates->fetch('products.tpl');
		return $this->body;
	}
	
	

}

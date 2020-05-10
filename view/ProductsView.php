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
		/* $max_price = $this->variants->get_max_price();
		$min_price = $this->variants->get_min_price();
		
		if(empty($max_price))
			$max_price = 0;
		if(empty($min_price))
			$min_price = 0;
				
		$this->templates->assign('max_price', $max_price->price);
		$this->templates->assign('min_price', $min_price->price);
		
		$filter_min_price = $min_price->price;
		$filter_max_price = $max_price->price;
		 */
		// GET-Параметры
		$category_url = $this->request->get('category', 'string');
		$brand_url    = $this->request->get('brand', 'string');
		$price_range = $this->request->get('price_range', 'string');
		$price_max = $this->request->get('price_max', 'string');
		
		if($price_range){
			list($filter_min_price, $filter_max_price) = explode(" - ", $price_range);
			$filter_min_price = intval($filter_min_price);
			$filter_max_price = intval($filter_max_price);
		}
		
		$this->templates->assign('filter_min_price', $filter_min_price);
		$this->templates->assign('filter_max_price', $filter_max_price);
		
		$filter = array();
		$filter['visible'] = 1;
		$filter['language_id'] = $_SESSION['lang']->id;
		
		$filter['min_price'] = $filter_min_price;	
		$filter['max_price'] = $filter_max_price;
		/* $filter['first_in'] = 1; */

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
				
		
		// Свойства товаров
		if(!empty($category))
		{
			$features = array();
			$filter['features'] = array();
			foreach($this->features->get_features(array('category_id'=>$category->id, 'in_filter'=>1, 'language_id'=>$_SESSION['lang']->id)) as $feature)
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
			
			foreach($products as &$product)
			{				
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
			
			$images = $this->products->get_images(array('product_id'=>$products_ids));
			foreach($images as $image)
				$products[$image->product_id]->images[] = $image;

			foreach($products as &$product)
			{
				if(isset($product->variants[0]))
					$product->variant = $product->variants[0];
				if(isset($product->images[0]))
					$product->image = $product->images[0];
				if(@count($groups_products[$product->id]) > 1)
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
		if(isset($this->page->id))
		{
			$this->templates->assign('meta_title', $this->page->meta_title);
			$this->templates->assign('meta_keywords', $this->page->meta_keywords);
			$this->templates->assign('meta_description', $this->page->meta_description);
			
			$pages_group = $this->pages->get_page_group($this->page->id);
			$this->templates->assign('page_group', $page_group);
			
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

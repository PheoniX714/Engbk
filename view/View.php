<?php
require_once('api/Engine.php');

class View extends Engine
{
	/* Смысл класса в доступности следующих переменных в любом View */
	public $currency;
	public $currencies;
	public $categories_tree;
	public $all_languages;
	public $page;
	public $menu_pages;
	
	/* Класс View похож на синглтон, храним статически его инстанс */
	private static $view_instance;
	
	public function __construct()
	{
		parent::__construct();
		
		// Если инстанс класса уже существует - просто используем уже существующие переменные
		if(self::$view_instance)
		{
			$this->currency     = &self::$view_instance->currency;
			$this->currencies   = &self::$view_instance->currencies;
			$this->page         	= &self::$view_instance->page;	
			$this->all_languages    = &self::$view_instance->all_languages;
			$this->menu_pages    	= &self::$view_instance->menu_pages;
			$this->categories_tree    	= &self::$view_instance->categories_tree;
		}
		else
		{
			// Сохраняем свой инстанс в статической переменной,
			// чтобы в следующий раз использовать его
			self::$view_instance = $this;
			
			// Мультиязычность
			$languages = $this->languages->get_languages(array('visible'=>1));
			$this->templates->assign('languages', $languages);
			
			$lang_code = substr($this->request->get('lang', 'string'), 0, 2);
			if(!empty($lang_code)){
				$lang = $this->languages->get_language($lang_code);
			}
			if(empty($lang)){
				$lang = $this->languages->get_main_language();
			}
			
			$_SESSION['lang'] = $lang;
			
			if($_SESSION['lang'])
				$_SESSION['currency_id'] = intval($lang->currency_id);
				
			$this->templates->assign('language', $lang);
			
			$language_constants = (object)$this->languages->get_language_constants($lang->code);
			$this->templates->assign('constants', $language_constants);
			
			// Все валюты
			$this->currencies = $this->money->get_currencies(array('enabled'=>1));
			
			$this->categories_tree = $this->categories->get_categories_tree();
			$this->templates->assign('categories_tree',	$this->categories_tree);
			
			// Выбор текущей валюты
			if($currency_id = $this->request->get('currency_id', 'integer'))
			{
				$_SESSION['currency_id'] = $currency_id;
				header("Location: ".$this->request->url(array('currency_id'=>null)));
			}
			
			// Берем валюту из сессии
			if(isset($_SESSION['currency_id']))
				$this->currency = $this->money->get_currency($_SESSION['currency_id']);
			else
				$this->currency = reset($this->currencies);
					
			// Текущая страница (если есть)
			$subdir = substr(dirname(dirname(__FILE__)), strlen($_SERVER['DOCUMENT_ROOT']));
			$page_url = trim(substr($_SERVER['REQUEST_URI'], strlen($subdir)),"/");
			if(strpos($page_url, '?') !== false)
				$page_url = substr($page_url, 0, strpos($page_url, '?'));
			if($page_url)
				$page_url = array_pop(explode('/', $page_url));
			
			$translation = $this->pages->get_page_translation((string)$page_url, $_SESSION['lang']->id);
			$page = $this->pages->get_page($translation->page_id);
			$this->page = (object)array_merge((array)$page, (array)$translation);
			$this->templates->assign('page', $this->page);
			
			// Страницы
			$menu_pages = $this->pages->get_menu_pages(array('visible'=>1, 'language_id'=>$_SESSION['lang']->id));
			$this->templates->assign('menu_pages', $menu_pages);
						
			// Передаем в дизайн то, что может понадобиться в нем
			$this->templates->assign('currencies',	$this->currencies);
			$this->templates->assign('currency',	$this->currency);
			
			$this->templates->assign('config',		$this->config);
			$this->templates->assign('settings',	$this->settings);

			// Настраиваем плагины для смарти
			$this->templates->smarty->registerPlugin("function", "get_posts",					array($this, 'get_posts_plugin'));
			$this->templates->smarty->registerPlugin("function", "get_events",					array($this, 'get_events_plugin'));
			$this->templates->smarty->registerPlugin("function", "get_featured_products",		array($this, 'get_featured_products_plugin'));
			$this->templates->smarty->registerPlugin("function", "get_new_products",			array($this, 'get_new_products_plugin'));
			$this->templates->smarty->registerPlugin("function", "get_discounted_products",	array($this, 'get_discounted_products_plugin'));
			$this->templates->smarty->registerPlugin("function", "get_slides",					array($this, 'get_slides_plugin')); 
			$this->templates->smarty->registerPlugin("function", "get_reviews",					array($this, 'get_last_reviews'));
			$this->templates->smarty->registerPlugin("function", "get_projects",				array($this, 'get_projects'));
		}
	}
	
	function fetch()
	{
		return false;
	}
	
	public function get_last_reviews($params, $smarty)
	{
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->comments->get_comments(array('type'=>'reviews', 'object_id'=>1, 'approved'=>1, 'limit'=>10)));
	}
	
	public function get_posts_plugin($params, $smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		
		if(!isset($params['category_id']))
			$params['category_id'] = 1;
		
		$params['language'] = $_SESSION['lang']->id;
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->news->get_posts($params));
	}
	
	public function get_events_plugin($params, $smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		
		if(!isset($params['category_id']))
			$params['category_id'] = 3;
		
		$params['new_posts'] = true;
		$params['order_asc'] = true;
		
		$params['language'] = $_SESSION['lang']->id;
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->news->get_posts($params));
	}
	
	public function get_projects($params, $smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		
		$params['language'] = $_SESSION['lang']->id;
		
		$params['menu_id'] = 3;
		
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->pages->get_pages($params));
	}
	
	public function get_featured_products_plugin($params, $smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		$params['featured'] = 1;
		
		$params['language'] = $_SESSION['lang']->id;
		if(!empty($params['var']))
		{
			foreach($this->products->get_products($params) as $p)
				$products[$p->id] = $p;

			if(!empty($products))
			{
				// id выбраных товаров
				$products_ids = array_keys($products);
					
				// Выбираем варианты товаров
				$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));
				
				// Для каждого варианта
				foreach($variants as &$variant)
				{
					// добавляем вариант в соответствующий товар
					$products[$variant->product_id]->variants[] = $variant;
				}
				
				// Выбираем изображения товаров
				$images = $this->products->get_images(array('product_id'=>$products_ids));
				foreach($images as $image)
					$products[$image->product_id]->images[] = $image;
	
				foreach($products as &$product)
				{
					if(isset($product->variants[0]))
						$product->variant = $product->variants[0];
					if(isset($product->images[0]))
						$product->image = $product->images[0];
				}				
			}
						
			$smarty->assign($params['var'], $products);
		}
	}
		
	
	public function get_new_products_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!isset($params['sort']))
			$params['sort'] = 'created';
		
		$params['language'] = $_SESSION['lang']->id;
		
		if(!empty($params['var']))
		{
			foreach($this->products->get_products($params) as $p)
				$products[$p->id] = $p;

			if(!empty($products))
			{
				// id выбраных товаров
				$products_ids = array_keys($products);
				
				// Выбираем варианты товаров
				$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));
				
				// Для каждого варианта
				foreach($variants as &$variant)
				{
					// добавляем вариант в соответствующий товар
					$products[$variant->product_id]->variants[] = $variant;
				}
				
				// Выбираем изображения товаров
				$images = $this->products->get_images(array('product_id'=>$products_ids));
				foreach($images as $image)
					$products[$image->product_id]->images[] = $image;
	
				foreach($products as &$product)
				{
					if(isset($product->variants[0]))
						$product->variant = $product->variants[0];
					if(isset($product->images[0]))
						$product->image = $product->images[0];
				}				
			}

			$smarty->assign($params['var'], $products);
			
		}
	}
	
	
	public function get_discounted_products_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		$params['discounted'] = 1;
		
		$params['language'] = $_SESSION['lang']->id;
		if(!empty($params['var']))
		{
			foreach($this->products->get_products($params) as $p)
				$products[$p->id] = $p;

			if(!empty($products))
			{
				// id выбраных товаров
				$products_ids = array_keys($products);
		
				// Выбираем варианты товаров
				$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));
				
				// Для каждого варианта
				foreach($variants as &$variant)
				{
					// добавляем вариант в соответствующий товар
					$products[$variant->product_id]->variants[] = $variant;
				}
				
				// Выбираем изображения товаров
				$images = $this->products->get_images(array('product_id'=>$products_ids));
				foreach($images as $image)
					$products[$image->product_id]->images[] = $image;
	
				foreach($products as &$product)
				{
					if(isset($product->variants[0]))
						$product->variant = $product->variants[0];
					if(isset($product->images[0]))
						$product->image = $product->images[0];
				}				
			}

			$smarty->assign($params['var'], $products);
			
		}
	}
	
	public function get_slides_plugin($params, $smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!empty($params['var']))
		{
			$slides = $this->slider->get_slides($params);
			$smarty->assign($params['var'], $slides);
		}
	}
}

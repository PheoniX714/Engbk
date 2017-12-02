<?php
class Engine
{
	// Свойства - Классы API
	private $classes = array(
		// Базовые классы, которые всегда присутствуют в CMS
		'config'     			=> 'Config',
		'request'   			=> 'Request',
		'db'         			=> 'Database',
		'settings'   			=> 'Settings',
		'templates'  			=> 'Templates',
		'notify'     			=> 'Notify',
		'languages'  			=> 'Languages',
		'image'      			=> 'Image',
		'feedbacks'  			=> 'Feedbacks',
		'managers'   			=> 'Managers',
		'pages'      			=> 'Pages',
		'news'      	 		=> 'News',
		'slider'      	 		=> 'Slider',
		// Классы дополнений установленых в CMS
		'money'  		 		=> 'Currency',
		'products'  		 	=> 'Products',
		'categories' 			=> 'Categories',
		'variants'   			=> 'Variants',
		'features'   			=> 'Features',
		'cart'       			=> 'Cart',
		'orders'     			=> 'Orders',		
		'gallery_categories' 	=> 'GalleryCategories',
		'gallery_albums' 		=> 'GalleryAlbums'
	);
	
	// Созданные объекты
	private static $objects = array();
	
	/**
	 * Конструктор оставим пустым, но определим его на случай обращения parent::__construct() в классах API
	 */
	public function __construct()
	{
		//error_reporting(E_ALL & !E_STRICT);
	}

	/**
	 * Магический метод, создает нужный объект API
	 */
	public function __get($name)
	{
		// Если такой объект уже существует, возвращаем его
		if(isset(self::$objects[$name]))
		{
			return(self::$objects[$name]);
		}
		
		// Если запрошенного API не существует - ошибка
		if(!array_key_exists($name, $this->classes))
		{
			return null;
		}
		
		// Определяем имя нужного класса
		$class = $this->classes[$name];
		
		// Подключаем его
		include_once(dirname(__FILE__).'/'.$class.'.php');
		
		// Сохраняем для будущих обращений к нему
		self::$objects[$name] = new $class();
		
		// Возвращаем созданный объект
		return self::$objects[$name];
	}
}
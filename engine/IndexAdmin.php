<?PHP
require_once('api/Engine.php');

// Этот класс выбирает модуль в зависимости от параметра Section и выводит его на экран
class IndexAdmin extends Engine
{
	// Соответсвие модулей и названий соответствующих прав
	private $modules_permissions = array(
		// Базовые классы, которые всегда присутствуют в CMS
		'PagesAdmin'         	 	=> 'pages',
		'PageAdmin'           		=> 'pages',
		'NewsAdmin'           		=> 'news',
		'PostAdmin'           		=> 'news',
		'FeedbacksAdmin'     		=> 'feedbacks',
		'SliderAdmin'      			=> 'settings',
		'SlideAdmin'       			=> 'settings',
		'LanguagesAdmin'      		=> 'settings',
		'LanguageAdmin'       		=> 'settings',
		'SettingsAdmin'       		=> 'settings',
		'ManagersAdmin'       		=> 'managers',
		'ManagerAdmin'        		=> 'managers',
		// Классы дополнений установленых в CMS
		'ProductsImportAdmin'       => 'products',
		'ProductsGroupsAdmin'       => 'products',
		'ProductsGroupAdmin'        => 'products',
		'ProductsAdmin'       		=> 'products',
		'ProductAdmin'        		=> 'products',
		'CategoriesAdmin'     		=> 'categories',
		'CategoryAdmin'       		=> 'categories',
		'FeaturesAdmin'       		=> 'features',
		'FeatureAdmin'        		=> 'features',
		'OrdersAdmin'         		=> 'orders',
		'OrderAdmin'          		=> 'orders',
		'CurrencyAdmin'          	=> 'currency',
		'GalleryCategoriesAdmin'    => 'gallery',
		'GalleryCategoryAdmin'    	=> 'gallery',
		'GalleryAlbumAdmin'    		=> 'gallery',
		'GalleryAlbumsAdmin'    	=> 'gallery'
	);

	// Конструктор
	public function __construct()
	{
	    // Вызываем конструктор базового класса
		parent::__construct();

		$this->templates->set_templates_dir('engine/templates/html');
		$this->templates->set_compiled_dir('engine/templates/compiled');
		
		$this->templates->assign('settings',	$this->settings);
		$this->templates->assign('config',	$this->config);

		// Администратор
		$this->manager = $this->managers->get_manager(intval($_SESSION['admin_id']));
		$this->templates->assign('manager', $this->manager);
		
 		// Берем название модуля из get-запроса
		$module = $this->request->get('module', 'string');
		$module = preg_replace("/[^A-Za-z0-9]+/", "", $module);
		
		if($_SESSION['admin_id']){
			// Если не запросили модуль - используем модуль первый из разрешенных
			if(empty($module) || !is_file('engine/'.$module.'.php'))
			{
				foreach($this->modules_permissions as $m=>$p)
				{
					if($this->managers->access($p))
					{
						$module = $m;
						break;
					}
				}
			}
			if(empty($module))
				$module = 'ProductsAdmin';
		}else{
			$module = 'LoginAdmin';
		}
		
		// Подключаем файл с необходимым модулем
		require_once('engine/'.$module.'.php');  
		
		// Создаем соответствующий модуль
		if(class_exists($module))
			$this->module = new $module();
		else
			die("Error creating $module class");

	}

	function fetch()
	{		
		$currency = $this->money->get_currency();
		$this->templates->assign("currency", $currency);
		
		$new_orders_counter = $this->orders->count_orders(array('status'=>0));
		$this->templates->assign("new_orders_counter", $new_orders_counter);
	
		// Проверка прав доступа к модулю
		if(isset($this->modules_permissions[get_class($this->module)]) && $this->managers->access($this->modules_permissions[get_class($this->module)]))
		{
			$content = $this->module->fetch();
			$this->templates->assign("content", $content);
		}elseif(get_class($this->module) == 'LoginAdmin'){
			$content = $this->module->fetch();
			$this->templates->assign("content", $content);
		}else{
			$this->templates->assign("content", "Permission denied");
		}
		
		// Меню
		$menus = $this->pages->get_menus();
		$this->templates->assign('menus', $menus);
		
		// Создаем текущую обертку сайта (обычно index.tpl)
		$wrapper = $this->templates->smarty->getTemplateVars('wrapper');
		if(is_null($wrapper))
			$wrapper = 'index.tpl';
			
		if(!empty($wrapper))
			return $this->body = $this->templates->fetch($wrapper);
		else
			return $this->body = $content;
	}
}
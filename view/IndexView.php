<?PHP
if(!isset($_SESSION)) session_start();
require_once('View.php');

class IndexView extends View
{	
	public $modules_dir = 'view/';

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 *
	 * Отображение
	 *
	 */
	function fetch()
	{		
		// Содержимое корзины
		$this->templates->assign('cart',		$this->cart->get_cart());
	
        // Категории товаров
		$categories = $this->categories->get_categories_tree();
		$this->templates->assign('categories', $categories);
		
		// Текущий модуль (для отображения центрального блока)
		$module = $this->request->get('module', 'string');
		$module = preg_replace("/[^A-Za-z0-9]+/", "", $module);

		// Если не задан - берем из настроек
		if(empty($module))
			return false;
		
		// Создаем соответствующий класс
		if (is_file($this->modules_dir."$module.php"))
		{
				include_once($this->modules_dir."$module.php");
				if (class_exists($module))
				{
					$this->main = new $module($this);
				} else return false;
		} else return false;

		// Создаем основной блок страницы
		if (!$content = $this->main->fetch())
		{
			return false;
		}		

		// Передаем основной блок в шаблон
		$this->templates->assign('content', $content);		
		
		// Передаем название модуля в шаблон, это может пригодиться
		$this->templates->assign('module', $module);
				
		// Создаем текущую обертку сайта (обычно index.tpl)
		$wrapper = $this->templates->get_var('wrapper');
		if(is_null($wrapper))
			$wrapper = 'index.tpl';
			
		if(!empty($wrapper))
			return $this->body = $this->templates->fetch($wrapper);
		else
			return $this->body = $content;

	}
}

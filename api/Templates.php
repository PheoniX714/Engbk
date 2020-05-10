<?php
 
require_once(dirname(__FILE__).'/'.'Engine.php');
require_once(dirname(dirname(__FILE__)).'/Smarty/libs/Smarty.class.php');

class Templates extends Engine
{
	public $smarty;

	public function __construct()
	{
		parent::__construct();

		// Создаем и настраиваем Смарти
		$this->smarty = new Smarty();
		$this->smarty->compile_check = $this->config->smarty_compile_check;
		$this->smarty->caching = $this->config->smarty_caching;
		$this->smarty->cache_lifetime = $this->config->smarty_cache_lifetime;
		$this->smarty->debugging = $this->config->smarty_debugging;
		$this->smarty->error_reporting = E_ALL & ~E_NOTICE;

		// Берем тему
		$theme = $this->get_theme();
		
		if(empty($theme))
			$theme = 'default';

		$this->smarty->compile_dir = $this->config->root_dir.'/templates/compiled/'.$theme;
		$this->smarty->template_dir = $this->config->root_dir.'/templates/'.$theme.'/html';		

		// Создаем папку для скомпилированных шаблонов текущей темы
		if(!is_dir($this->smarty->compile_dir))
			mkdir($this->smarty->compile_dir, 0777);
						
		$this->smarty->cache_dir = 'cache';
				
		$this->smarty->registerPlugin('modifier', 'resize',		array($this, 'resize_modifier'));		
		$this->smarty->registerPlugin('modifier', 'token',		array($this, 'token_modifier'));
		$this->smarty->registerPlugin('modifier', 'plural',		array($this, 'plural_modifier'));		
		$this->smarty->registerPlugin('function', 'url', 		array($this, 'url_modifier'));		
		$this->smarty->registerPlugin('modifier', 'first',		array($this, 'first_modifier'));		
		$this->smarty->registerPlugin('modifier', 'cut',		array($this, 'cut_modifier'));		
		$this->smarty->registerPlugin('modifier', 'date',		array($this, 'date_modifier'));		
		$this->smarty->registerPlugin('modifier', 'time',		array($this, 'time_modifier'));		
		$this->smarty->registerPlugin('function', 'api',		array($this, 'api_plugin'));

		if($this->config->smarty_html_minify)
			$this->smarty->loadFilter('output', 'trimwhitespace');
	}
	
	public function assign($var, $value){
		return $this->smarty->assign($var, $value);
	}

	public function fetch($template)
	{
		// Передаем в дизайн то, что может понадобиться в нем
		$this->assign('config',		$this->config);
		$settings = $this->settings;
		$settings->theme = $this->get_theme();
		$this->templates->assign('settings', $settings);
		return $this->smarty->fetch($template);
	}
	
	public function set_templates_dir($dir)
	{
		$this->smarty->template_dir = $dir;			
	}

	public function set_compiled_dir($dir)
	{
		$this->smarty->compile_dir = $dir;
	}
	
	public function get_var($name)
	{
		return $this->smarty->getTemplateVars($name);
	}
	
	public function clear_cache()
	{
		$this->smarty->clearAllCache();	
	}
	
	public function set_theme($theme) {
		if(is_dir($this->config->root_dir.'/templates/'.$theme.'/html')) {
			setcookie('theme', $theme, time()+60*60*24*30, "/");
			return $theme;
		}
		else
			return false;
	}
 
	public function get_theme(){
		if(!isset($_COOKIE['theme']) || !is_dir($this->config->root_dir.'/templates/'.$_COOKIE['theme'].'/html')) {
			$theme = $this->set_theme($this->settings->theme);
		}
		else
			$theme = $_COOKIE['theme'];
		
		return $theme;
	}
	 
	public function get_themes() {
		if($handle = opendir('templates/')) {
			while(false !== ($file = readdir($handle)))
			{ 
				if($file == "compiled")
					continue;
				if(is_dir('templates/'.$file) && $file[0] != '.')
				{
					unset($theme);
					$theme = new stdClass;
					$theme->name = $file;
					$themes[] = $theme; 
				} 
			}
			closedir($handle); 
			sort($themes);
		}
		return $themes;
	}

	public function resize_modifier($filename, $width=0, $height=0, $set_watermark=false)
	{
		$resized_filename = $this->image->add_resize_params($filename, $width, $height, $set_watermark);
		$resized_filename_encoded = $resized_filename;
		
		if(substr($resized_filename_encoded, 0, 7) == 'http://')
			$resized_filename_encoded = rawurlencode($resized_filename_encoded);

		$resized_filename_encoded = rawurlencode($resized_filename_encoded);

		return $this->config->root_url.'/'.$this->config->resized_images_dir.$resized_filename_encoded.'?'.$this->config->token($resized_filename);
	}

	public function token_modifier($text)
	{
		return $this->config->token($text);
	}

	public function url_modifier($params)
	{
		if(is_array(reset($params)))
			return $this->request->url(reset($params));
		else
			return $this->request->url($params);
	}

	public function plural_modifier($number, $singular, $plural1, $plural2=null)
	{
		$number = abs($number); 
		if(!empty($plural2))
		{
			$p1 = $number%10;
			$p2 = $number%100;
			if($number == 0)
				return $plural1;
			if($p1==1 && !($p2>=11 && $p2<=19))
				return $singular;
			elseif($p1>=2 && $p1<=4 && !($p2>=11 && $p2<=19))
				return $plural2;
			else
				return $plural1;
		}else
		{
			if($number == 1)
				return $singular;
			else
				return $plural1;
		}
	}

	public function first_modifier($params = array())
	{
		if(!is_array($params))
			return false;
		return reset($params);
	}

	public function cut_modifier($array, $num=1)
	{
		if($num>=0)
	    	return array_slice($array, $num, count($array)-$num, true);
	    else
	    	return array_slice($array, 0, count($array)+$num, true);
	}
	
	public function date_modifier($date, $format = null)
	{
		if(empty($date))
			$date = date("Y-m-d");
	    return date(empty($format)?$this->settings->date_format:$format, strtotime($date));
	}
	
	public function time_modifier($date, $format = null)
	{
	    return date(empty($format)?'H:i':$format, strtotime($date));
	}
	
	public function api_plugin($params, $smarty)
	{
		if(!isset($params['module']))
			return false;
		if(!isset($params['method']))
			return false;

		$module = $params['module'];
		$method = $params['method'];
		$var = $params['var'];
		unset($params['module']);
		unset($params['method']);
		unset($params['var']);
		$res = $this->$module->$method($params);
		$smarty->assign($var, $res);
	}	
}
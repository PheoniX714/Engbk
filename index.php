<?php

// Засекаем время
$time_start = microtime(true);

session_start();

require_once('view/IndexView.php');

$view = new IndexView();

if(isset($_GET['logout']))
{
    header('WWW-Authenticate: Basic realm="Fast CMS"');
    header('HTTP/1.0 401 Unauthorized');
	unset($_SESSION['admin']);
}

// Если все хорошо
if(($res = $view->fetch()) !== false)
{
	// Выводим результат
	header("Content-type: text/html; charset=UTF-8");	
	print $res;

	// Сохраняем последнюю просмотренную страницу в переменной $_SESSION['last_visited_page']
	if(empty($_SESSION['last_visited_page']) || empty($_SESSION['current_page']) || $_SERVER['REQUEST_URI'] !== $_SESSION['current_page'])
	{
		if(!empty($_SESSION['current_page']) && !empty($_SESSION['last_visited_page']) && $_SESSION['last_visited_page'] !== $_SESSION['current_page'])
			$_SESSION['last_visited_page'] = $_SESSION['current_page'];
		$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
	}

}
else 
{ 
	// Иначе страница об ошибке
	header("http/1.0 404 not found");
	
	// Подменим переменную GET, чтобы вывести страницу 404
	$_GET['page_url'] = '404';
	$_GET['module'] = 'PageView';
	print $view->fetch();
}


// Отладочная информация
if($view->config->debug == 2)
{		
	$debug = array();	
	$time_end = microtime(true);
	$exec_time = $time_end-$time_start;
  	if(function_exists('memory_get_peak_usage'))
		$debug['memory_get_peak_usage'] = memory_get_peak_usage();  
	$debug['page_generation_time'] = $exec_time;
	$debug['module'] = $_SERVER['QUERY_STRING'];
	$debug['sql_debag'] = $_SESSION['debag'];
		
	$filename = 'debug_log.txt';
	$data = json_encode($debug);
	$f = fopen($filename, 'w');
	fwrite($f, $data);
	fclose($f);
	unset($_SESSION['debag']);
}


<?PHP

chdir('..');

// Засекаем время
$time_start = microtime(true);
session_start();
$_SESSION['id'] = session_id();
unset($_SESSION['debag']);

@ini_set('session.gc_maxlifetime', 86400); // 86400 = 24 часа
@ini_set('session.cookie_lifetime', 0); // 0 - пока браузер не закрыт

require_once('engine/IndexAdmin.php');

// Кеширование в админке нам не нужно
header("Cache-Control: no-cache, must-revalidate");
header("Expires: -1");
header("Pragma: no-cache");

// Установим переменную сессии, чтоб фронтенд нас узнал как админа
$_SESSION['admin'] = 'admin';

$backend = new IndexAdmin();

// Выход
if($backend->request->get('action') == 'logout'){
	$backend->managers->logout($_SESSION['admin_id']);
	unset($_SESSION['admin_id']);
	setcookie ("memory","", 1);
	header('Location: '.$backend->config->root_url.'/admin/');
	exit();
}

// Проверка сессии для защиты от xss
if(!$backend->request->check_session()){
	unset($_POST);
	trigger_error('Session expired', E_USER_WARNING);
}


print $backend->fetch();

// Отладочная информация
if($backend->config->debug)
{
	print "<!--\r\n";
	$sql_time = 0;
	foreach($_SESSION['debag'] as $q)
		$sql_time += $q['time'];
  
	$time_end = microtime(true);
	$exec_time = $time_end-$time_start;
  	if(function_exists('memory_get_peak_usage'))
		print "memory peak usage: ".memory_get_peak_usage()." bytes\r\n";  
	print "page generation time: ".$exec_time." seconds\r\n";  
	print "sql queries time: ".$sql_time." seconds\r\n";  
	print "sql queries count: ".count($_SESSION['debag'])."\r\n";  
	print "php run time: ".($exec_time-$sql_time)." seconds\r\n";  
	print_r($_SESSION['debag']);
	print "-->";
	unset($_SESSION['debag']);
}

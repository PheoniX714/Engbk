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

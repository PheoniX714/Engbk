<?php

require_once('../api/Engine.php');

$filename = $_GET['file'];
$token = $_GET['token'];

$engine = new Engine();

if(!$engine->config->check_token($filename, $token))
	exit('bad token');		

$resized_filename =  $engine->image->resize($filename);

if(is_readable($resized_filename))
{
	header('Content-type: image');
	print file_get_contents($resized_filename);
}


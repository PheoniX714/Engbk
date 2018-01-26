<?php

session_start();

require_once('../../api/Engine.php');

$engine = new Engine();

// Проверка сессии для защиты от xss
if(!$engine->request->check_session())
{
	trigger_error('Session expired', E_USER_WARNING);
	exit();
}

$id = intval($engine->request->post('id'));
$object = $engine->request->post('object');
$values = $engine->request->post('values');

switch ($object)
{
    case 'page':
    	if($engine->managers->access('pages'))
        $result = $engine->pages->update_page($id, $values);
        break;
    case 'news':
    	if($engine->managers->access('news'))
        $result = $engine->news->update_post($id, $values);
        break;
	case 'slider':
    	if($engine->managers->access('settings'))
        $result = $engine->slider->update_slide($id, $values);
        break;
	case 'languages':
    	if($engine->managers->access('pages'))
        $result = $engine->languages->update_language($id, $values);
        break;
	case 'comment':
    	if($engine->managers->access('comments'))
        $result = $engine->comments->update_comment($id, $values);
        break;
		
	case 'product':
    	if($engine->managers->access('products'))
        $result = $engine->products->update_product($id, $values);
        break;
	 case 'currency':
    	if($engine->managers->access('currency'))
        $result = $engine->money->update_currency($id, $values);
        break;
	 case 'feature':
    	if($engine->managers->access('features'))
        $result = $engine->features->update_feature($id, $values);
        break;
	case 'categories':
    	if($engine->managers->access('categories'))
        $result = $engine->categories->update_category($id, $values);
        break;
	case 'gallery_categories':
    	if($engine->managers->access('gallery'))
        $result = $engine->gallery_categories->update_category($id, $values);
        break;
	case 'gallery_albums':
    	if($engine->managers->access('gallery'))
        $result = $engine->gallery_albums->update_album($id, $values);
        break;
	case 'gallery_album_delete_image':
    	if($engine->managers->access('gallery'))
        $result = $engine->gallery_albums->delete_image($id, $values);
        break;
	case 'product_delete_image':
    	if($engine->managers->access('products'))
        $result = $engine->products->delete_image($id);
        break;
}

header("Content-type: application/json; charset=UTF-8");
header("Cache-Control: must-revalidate");
header("Pragma: no-cache");
header("Expires: -1");		
$json = json_encode($result);
print $json;
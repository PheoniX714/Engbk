<?php

	require_once('../../api/Engine.php');
	$engine = new Engine();
	
	$product_id = $engine->request->get('id', 'integer');
	$img_id = $engine->request->get('img_del', 'integer');
	
	if($img_id && $product_id){
		$engine->products->delete_image($img_id);
		$images = $engine->products->get_images(array('product_id'=>$product_id));
	}
	
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		
	print json_encode($images);

<?php
	require_once('../api/Engine.php');
	$engine = new Engine();
	$limit = 30;
	
	$keyword = $engine->request->get('query', 'string');
	$kw = $engine->db->escape($keyword);
	$engine->db->query("SELECT p.id, p.name, i.filename as image FROM __products p
	                    LEFT JOIN __images i ON i.product_id=p.id AND i.position=(SELECT MIN(position) FROM __images WHERE product_id=p.id LIMIT 1)
	                    WHERE (p.name LIKE '%$kw%' OR p.meta_keywords LIKE '%$kw%' OR p.id in (SELECT product_id FROM __variants WHERE sku LIKE '%$kw%')) AND visible=1 ORDER BY p.name LIMIT ?", $limit);
	$products = $engine->db->results();

	$suggestions = array();
	
	foreach($products as $product)
	{
		$suggestion = new stdClass();
		if(!empty($product->image))
			$product->image = $engine->templates->resize_modifier($product->image, 35, 35);
			
		$suggestion->value = $product->name;
		$suggestion->data = $product;
		$suggestions[] = $suggestion;
	}
	$res = new stdClass;
	$res->query = $keyword;
	$res->suggestions = $suggestions;
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		
	print json_encode($res);
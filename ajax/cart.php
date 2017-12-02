<?php
	session_start();
	require_once('../api/Engine.php');
	$engine = new Engine();
	$engine->cart->add_item($engine->request->get('variant', 'integer'), $engine->request->get('amount', 'integer'));
	$cart = $engine->cart->get_cart();
	$engine->templates->assign('cart', $cart);
	
	$currencies = $engine->money->get_currencies(array('enabled'=>1));
	if(isset($_SESSION['currency_id']))
		$currency = $engine->money->get_currency($_SESSION['currency_id']);
	else
		$currency = reset($currencies);

	$engine->templates->assign('currency',	$currency);
	
	$result = $engine->templates->fetch('cart_informer.tpl');
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		
	print json_encode($result);
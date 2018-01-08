<?php
// Работаем в корневой директории
chdir ('../../');
require_once('api/Engine.php');
$engine = new Engine();

// Выбираем из xml нужные данные
$public_key		 	= $engine->request->post('public_key');
$amount				= $engine->request->post('amount');
$currency			= $engine->request->post('currency');
$description		= $engine->request->post('description');
$liqpay_order_id	= $engine->request->post('order_id');
$order_id			= intval(substr($liqpay_order_id, 0, strpos($liqpay_order_id, '-')));
$type				= $engine->request->post('type');
$signature			= $engine->request->post('signature');
$status				= $engine->request->post('status');
$transaction_id		= $engine->request->post('transaction_id');
$sender_phone		= $engine->request->post('sender_phone');

print_r($_POST);

if($status !== 'success' and $status !== 'sandbox')
	die("bad status");

if($type !== 'buy')
	die("bad type");

////////////////////////////////////////////////
// Выберем заказ из базы
////////////////////////////////////////////////
$order = $engine->orders->get_order(intval($order_id));
if(empty($order))
	die('Оплачиваемый заказ не найден');
 
////////////////////////////////////////////////
// Выбираем из базы соответствующий метод оплаты
////////////////////////////////////////////////
$method = $engine->payment->get_payment_method(intval($order->payment_method_id));
if(empty($method))
	die("Неизвестный метод оплаты");
	
$settings = unserialize($method->settings);
$payment_currency = $engine->money->get_currency(intval($method->currency_id));

// Валюта должна совпадать
if($currency !== $payment_currency->code)
	die("bad currency");

// Проверяем контрольную подпись
$mysignature = base64_encode(sha1($settings['liqpay_private_key'].$amount.$currency.$public_key.$liqpay_order_id.$type.$description.$status.$transaction_id.$sender_phone, 1));
if($mysignature !== $signature)
	die("bad sign".$signature);

// Нельзя оплатить уже оплаченный заказ  
if($order->paid)
	die('order already paid');

if($amount != round($engine->money->convert($order->total_price, $method->currency_id, false), 2) || $amount<=0)
	die("incorrect price");
	       
// Установим статус оплачен
$engine->orders->update_order(intval($order->id), array('paid'=>1));

// Отправим уведомление на email
$engine->notify->email_order_user(intval($order->id));
$engine->notify->email_order_admin(intval($order->id));

// Спишем товары  
$engine->orders->close(intval($order->id));

// Перенаправим пользователя на страницу заказа
header('Location: '.$engine->config->root_url.'/order/'.$order->url);

exit();
{$meta_title = "Ваш заказ №`$order->id`" scope=parent}
<section class="cart-page">
	<div class="container">
		<div id="path">
			<a href="./">{if $language->id == 2}Головна{elseif $language->id == 4}Home{else}Главная{/if}</a> / {if $language->id == 2}Замовлення{elseif $language->id == 4}Order{else}Заказ{/if} №{$order->id}
		</div>
		
		
		<h2>{if $language->id == 2}Спасибі, Ваше замовлення оформлено{elseif $language->id == 4}Thank you, your order has been issued.{else}Спасибо, Ваш заказ оформлен{/if} {if $order->paid}<span style="color:green;">и успешно оплачен</span>{/if}</h2>
		
		{* Список покупок *}
		<ul id="purchases">
			{foreach $purchases as $purchase}
			<li>
				{* Изображение товара *}
				{$image = $purchase->product->images|first}
				{if $image}
				<div class="col-lg-1 p-img">
					<a href="/products/{$purchase->product->url|escape}"><img src="{$image->filename|resize:75:75}" alt="{$product->name|escape}" title="{$product->name|escape}"></a>
				</div>
				{/if}
				
				{* Название товара *}
				<div class="col-lg-5">
					<a href="/products/{$purchase->product->url|escape}">{$purchase->product->name|escape}</a>	
				</div>
				
				<div class="col-lg-1">
					{$purchase->variant->name|escape}
				</div>

				{* Количество *}
				<div class="col-lg-2">
					{$purchase->amount} {$settings->units}
				</div>

				{* Цена *}
				<div class="col-lg-3 price">
					{($purchase->variant->price*$purchase->amount)|convert}&nbsp;{$currency->sign}
				</div>
			</li>
			{/foreach}
			
		</ul>
		
		<div class="col-lg-12 total-price">{if $language->id == 2}Загальна вартість замовлення{elseif $language->id == 4}Total order value{else}Общая стоимоcть заказа{/if}:  <span>{$order->total_price|convert}&nbsp;{$currency->sign}</span></div>

		<div class="col-lg-6">
			<h2>{if $language->id == 2}Дані одержувача{elseif $language->id == 4}Recipient Information{else}Данные получателя{/if}</h2>
			<table class="table_info table-striped">
			<tr><td class='name'>{if $language->id == 2}Дата замовлення{elseif $language->id == 4}Order date{else}Дата заказа{/if}</td><td>{$order->date|date} в {$order->date|time}</td></tr>
			{if $order->name}	<tr><td class='name'>{if $language->id == 2}Ім'я{elseif $language->id == 4}Name{else}Имя{/if}</td><td>{$order->name|escape}</td></tr>{/if}
			{if $order->email}	<tr><td class='name'>Email</td><td>{$order->email|escape}</td></tr>{/if}
			{if $order->phone}	<tr><td class='name'>{if $language->id == 2}Телефон{elseif $language->id == 4}Phone{else}Телефон{/if}</td><td>{$order->phone|escape}</td></tr>{/if}
			{if $order->delivery_id}<tr><td class='name'>{if $language->id == 2}Спосіб доставки{elseif $language->id == 4}Delivery method{else}Способ доставки{/if}</td><td>{if $order->delivery_id == 1}{if $language->id == 2}Самовивіз{elseif $language->id == 4}Pickup{else}Самовывоз{/if}{elseif $order->delivery_id == 2}{if $language->id == 2}Нова Пошта{elseif $language->id == 4}"Новая почта"{else}Новая почта{/if}{/if}</td></tr>{/if}
			{if $order->city}<tr><td class='name'>{if $language->id == 2}Місто \ Область{elseif $language->id == 4}City, region{else}Город\Область{/if}</td><td>{$order->city|escape}</td></tr>{/if}
			{if $order->address}<tr><td class='name'>{if $language->id == 2}Адреса доставки{elseif $language->id == 4}Delivery address{else}Адрес доставки{/if}</td><td>{$order->address|escape}</td></tr>{/if}
			{if $order->comment}<tr><td class='name'>{if $language->id == 2}Коментар{elseif $language->id == 4}A comment{else}Комментарий{/if}</td><td>{$order->comment|escape|nl2br}</td></tr>{/if}
			</table>
		</div>
		<div class="col-lg-6">
			{if !$order->paid and $order->id == 1}
			{* Выбор способа оплаты *}
			{if $payment_methods && !$payment_method && $order->total_price>0}
			{elseif $payment_method}
			<h2>
			Оплатить {$order->total_price|convert:$payment_method->currency_id}&nbsp;{$all_currencies[$payment_method->currency_id]->sign} онлайн через Liqpay
			</h2>

			{* Форма оплаты, генерируется модулем оплаты *}
			{checkout_form order_id=$order->id module=$payment_method->module}
			{/if}
			{/if}
		</div>
	</div>	
</section>
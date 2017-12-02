{$meta_title = "Ваш заказ №`$order->id`" scope=parent}
<section class="cart-page">
	<div class="container">
		<div id="path">
			<a href="./">Главная</a> / Заказ №{$order->id}
		</div>
		
		<h2>Спасибо, Ваш заказ оформлен</h2>
		
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
		
		<div class="col-lg-12 total-price">Общая стоимоть заказа:  <span>{$order->total_price|convert}&nbsp;{$currency->sign}</span></div>

		<h2>Данные получателя</h2>
		<table class="table_info table-striped">
		<tr><td class='name'>Дата заказа</td><td>{$order->date|date} в {$order->date|time}</td></tr>
		{if $order->name}	<tr><td class='name'>Имя</td><td>{$order->name|escape}</td></tr>{/if}
		{if $order->email}	<tr><td class='name'>Email</td><td>{$order->email|escape}</td></tr>{/if}
		{if $order->phone}	<tr><td class='name'>Телефон</td><td>{$order->phone|escape}</td></tr>{/if}
		{if $order->delivery_id}<tr><td class='name'>Способ доставки</td><td>{if $order->delivery_id == 1}Самовывоз{elseif $order->delivery_id == 2}Новая почта{/if}</td></tr>{/if}
		{if $order->city}<tr><td class='name'>Город\Область</td><td>{$order->city|escape}</td></tr>{/if}
		{if $order->address}<tr><td class='name'>Адрес доставки</td><td>{$order->address|escape}</td></tr>{/if}
		{if $order->comment}<tr><td class='name'>Комментарий</td><td>{$order->comment|escape|nl2br}</td></tr>{/if}
		</table>

	</div>	
</section>
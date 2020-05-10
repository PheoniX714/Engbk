{* Страница заказа *}

{$meta_title = "Ваш заказ" scope=parent}

<div class="cart-page">	
	
	<div class="row">
		<div class="col-md-12">
			<h1>Ваш заказ №{$order->id} 
			{if $order->status == 0}принят{/if}
			{if $order->status == 1}в обработке{elseif $order->status == 2}выполнен{/if}
			{if $order->paid == 1}, оплачен{else}{/if}
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Данные Вашего заказа отправлены Вам на E-mail</h2>
		</div>
	</div>

	{* Список покупок *}
	<div class="table-responsive">
	{* Список покупок *}
		<table id="purchases" class="table table-striped">

		{foreach $purchases as $purchase}
		<tr>			
			{* Название товара *}
			<td class="name">
				{$purchase->product_name|escape}
			</td>

			{* Цена за единицу *}
			<td class="price">
				{($purchase->price)|convert}&nbsp;{$currency->sign} &times; {$purchase->amount}&nbsp;{$settings->units}
			</td>

			{* Цена *}
			<td class="price">
				{($purchase->price*$purchase->amount)|convert}&nbsp;{$currency->sign}
			</td>
		</tr>
		{/foreach}
		{* Итого *}
		<tr style="background-color: #cfcfcf;">
			<th style="background-color: #cfcfcf;" class="name"></th>
			<th style="background-color: #cfcfcf;" class="price"></th>
			<th style="background-color: #cfcfcf;" class="price">
				итого {$order->total_price|convert}&nbsp;{$currency->sign}
			</th>
		</tr>
	</table>
	</div>
</div>	
	
{* Детали заказа *}

<div class="cart-box order-data order-compl"> 
	<div class="row">
		{*<div class="col-md-12">
			<h4 style="margin-bottom:30px;">
				<b>Реквизиты для оплаты:</b> Р/с 26003000035938, 26009000034353 в АО "Укрэксимбанк" г. Харьков МФО 322313
			</h4>
		</div>*}
		
		<div class="col-md-12">
			<h3>Детали заказа</h3>
		</div>

		<div class="col-md-12">         
			<table class="table table-striped table-bordered">
				<tr>
					<td class="hidden-xs">
						Дата заказа
					</td>
					<td>
						{$order->date|date} в
						{$order->date|time}
					</td>
				</tr>
				{if $order->name}
				<tr>
					<td class="hidden-xs">
						Имя
					</td>
					<td>
						{$order->name|escape}
					</td>
				</tr>
				{/if}
				{if $order->email}
				<tr>
					<td class="hidden-xs">
						Email
					</td>
					<td>
						{$order->email|escape}
					</td>
				</tr>
				{/if}
				{if $order->phone}
				<tr>
					<td class="hidden-xs">
						Телефон
					</td>
					<td>
						{$order->phone|escape}
					</td>
				</tr>
				{/if}
				<tr>
					<td class="hidden-xs">
						Способ оплаты
					</td>
					<td>
						{if $order->pay == 1}При получении
						{elseif $order->pay == 2}Предоплата
						{/if}
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">
						Способ доставки
					</td>
					<td>
					{if $order->deliver == 1}Самовывоз
						{elseif $order->deliver == 2}Новая почта
						{/if}
					</td>
				</tr>
				{if $order->deliver == 2}
				<tr>
					<td class="hidden-xs">
						Тип доставки
					</td>
					<td>
					{if $order->np_type == 1}В отделение
						{elseif $order->np_type == 2}По адресу
						{/if}
					</td>
				</tr>
				{/if}
				{if $order->city}
				<tr>
					<td class="hidden-xs">
						Город
					</td>
					<td>
						{$order->city|escape}
					</td>
				</tr>
				{/if}
				{if $order->address}
				<tr>
					<td class="hidden-xs">
						Адрес доставки
					</td>
					<td>
						{$order->address|escape}
					</td>
				</tr>
				{/if}
				{if $order->delivery_type}
				<tr>
					<td class="hidden-xs">
						Способ доставки
					</td>
					<td>
						{if $order->delivery_type == 1}
							Самовывоз    
						{elseif $order->delivery_type == 2}
							Новая Почта
						{elseif $order->delivery_type == 3}
							Укрпочта
						{elseif $order->delivery_type == 4}
							Интаим
						{elseif $order->delivery_type == 5}
							Деливери
						{/if}
					</td>
				</tr>
				{/if}
				{if $order->comment}
				<tr>
					<td class="hidden-xs">
						Комментарий
					</td>
					<td>
						{$order->comment|escape|nl2br}
					</td>
				</tr>
				{/if}
			</table>
		</div>
	</div>
</div>
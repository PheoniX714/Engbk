{if $order->paid}
{$subject = "Заказ №`$order->id` оплачен" scope=parent}
{else}
{$subject = "Новый заказ №`$order->id`" scope=parent}
{/if}
<h1 style="font-weight:normal;font-family:arial;">
	<a href="{$config->root_url}/engine/index.php?module=OrderAdmin&id={$order->id}">Заказ №{$order->id}</a>
	на сумму {$order->total_price|convert:$main_currency->id}&nbsp;{$main_currency->sign}
	{if $order->paid == 1}оплачен{else}еще не оплачен{/if},
	{if $order->status == 0}ждет обработки{elseif $order->status == 1}в обработке{elseif $order->status == 2}выполнен{/if}	
</h1>
<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Статус
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{if $order->status == 0}
				ждет обработки      
			{elseif $order->status == 1}
				в обработке
			{elseif $order->status == 2}
				выполнен
			{/if}
		</td>
	</tr>
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Оплата
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{if $order->paid == 1}
			<font color="green">оплачен</font>
			{else}
			не оплачен
			{/if}
		</td>
	</tr>
	{if $order->name}
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Имя, фамилия
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{$order->name|escape}
			{if $user}(<a href="{$config->root_url}/engine/index.php?module=UserAdmin&id={$user->id}">зарегистрированный пользователь</a>){/if}
		</td>
	</tr>
	{/if}
	{if $order->email}
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Email
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{$order->email|escape}
		</td>
	</tr>
	{/if}
	{if $order->phone}
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Телефон
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{$order->phone|escape}
		</td>
	</tr>
	{/if}
	{if $order->delivery_id}
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Способ доставки
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{if $order->delivery_id == 1}Самовывоз{elseif $order->delivery_id == 2}Новая почта{/if}
		</td>
	</tr>
	{/if}
	{if $order->city}
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Город\Область
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{$order->city|escape}
		</td>
	</tr>
	{/if}
	{if $order->address}
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Адрес доставки
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{$order->address|escape}
		</td>
	</tr>
	{/if}
	{if $order->delivery_type}
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Способ доставки
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
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
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Дата
		</td>
		<td style="padding:6px; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{$order->date|date} {$order->date|time}
		</td>
	</tr>
</table>

<h1 style="font-weight:normal;font-family:arial;">Покупатель заказал:</h1>

<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">

	{foreach $purchases as $purchase}
	<tr>
		<td align="center" style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{$image = $purchase->product->images[0]}
			<a href="{$config->root_url}/products/{$purchase->product->url}"><img border="0" src="{$image->filename|resize:50:50}"></a>
		</td>
		<td style="padding:6px; width:250; padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			<a href="{$config->root_url}/products/{$purchase->product->url}">{$purchase->product_name}</a>
			{$purchase->variant_name} {$purchase->size_name} {$purchase->color_name}
			{if $purchase->p_comment}<a href="#" title="{$purchase->p_comment}">?</a>{/if}
		</td>
		<td align=right style="padding:6px; text-align:right; width:150; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			{$purchase->amount} {$settings->units} &times; {if ($order->price_type == 3) and ($purchase->opt3 != 0)}
			{($purchase->opt3)|convert:$currency->id} {$currency->sign}
			{elseif ($order->price_type == 2) and ($purchase->opt2 != 0)}
			{($purchase->opt2)|convert:$currency->id} {$currency->sign}
			{elseif ($order->price_type == 1) and ($purchase->opt1 != 0)}
			{($purchase->opt1)|convert:$currency->id} {$currency->sign}
			{else}
			{($purchase->price)|convert:$currency->id} {$currency->sign}
			{/if}&nbsp;{$currency->sign}
		</td>
	</tr>
	{/foreach}
	
	<tr>
		<td style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;"></td>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;font-weight:bold;">
			Итого
		</td>
		<td align="right" style="padding:6px; text-align:right; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;font-weight:bold;">
			{$order->total_price|convert:$main_currency->id}&nbsp;{$main_currency->sign}
		</td>
	</tr>
</table>
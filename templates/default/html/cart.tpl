{* Шаблон корзины *}

{$meta_title = "Корзина" scope='root'}
<div class="cart-page">
	<div class="row">
		<div class="col-md-12">
			<h1 style="margin-bottom:15px;">
			{if $cart->purchases}В корзине {$cart->total_products} {$cart->total_products|plural:'товар':'товаров':'товара'}
			{else}Корзина пуста{/if}
			</h1>
		</div>
	</div>


{if $cart->purchases}
<form method="post" name="cart">

{* Список покупок *}
<table id="purchases" class="table table-striped">

{foreach $cart->purchases as $purchase}
<tr>
	{* Изображение товара *}
	
	{* Название товара *}
	<td class="name">
		{$purchase->product->name|escape}		
	</td>

	{* Цена за единицу *}
	<td class="price">
		{($purchase->variant->price)|convert} {$currency->sign}
	</td>

	{* Количество *}
	<td class="amount">
		<select name="amounts[{$purchase->variant->id}]" onchange="document.cart.submit();">
			{section name=amounts start=1 loop=$purchase->variant->stock+1 step=1}
			<option value="{$smarty.section.amounts.index}" {if $purchase->amount==$smarty.section.amounts.index}selected{/if}>{$smarty.section.amounts.index} {$settings->units}</option>
			{/section}
		</select>
	</td>

	{* Цена *}
	<td class="price">
		{($purchase->variant->price*$purchase->amount)|convert}&nbsp;{$currency->sign}
	</td>
	
	{* Удалить из корзины *}
	<td class="remove">
		<a href="cart/remove/{$purchase->variant->id}">
		<img src="templates/{$settings->theme}/img/delete.png" title="Удалить из корзины" alt="Удалить из корзины">
		</a>
	</td>
			
</tr>
{/foreach}
<tr style="background-color: #cfcfcf;">
	<th class="name"></th>
	<th class="price" colspan="2"></td>
	<th class="price" colspan="2">
		Итого
		{$cart->total_price|convert}&nbsp;{$currency->sign}
	</th>
</tr>
</table>

<!-- <h2 style="margin-bottom:30px;">
	<b>Реквизиты для оплаты:</b> Р/с 26003000035938, 26009000034353 в АО "Укрэксимбанк" г. Харьков МФО 322313
</h2> -->

<h2>Адрес получателя</h2>
	
<div class="form cart_form">         
	{if $error}
	<div class="alert alert-danger">
        {if $error == 'empty_name'}Введите имя{/if}
		{if $error == 'empty_email'}Введите email{/if}
		{if $error == 'captcha'}Капча введена неверно{/if}
    </div>
	{/if}
	<label>Имя, фамилия</label>
	<input name="name" type="text" value="{$name|escape}" data-format=".+" data-notice="Введите имя"/>
	
	<label>Email</label>
	<input name="email" type="text" value="{$email|escape}" data-format="email" data-notice="Введите email" />

	<label>Телефон</label>
	<input name="phone" type="text" value="{$phone|escape}" />
	
	<label>Способ доставки</label>
	<select id="deliver" name="deliver">
		<option value="2" {if $deliver=='2'}selected{/if}>Новая почта</option>
		<option value="1" {if $deliver=='1'}selected{/if}>Самовывоз</option>
	</select>
	
	<div id="del-np" >
	<label>Тип доставки</label>
	<select id="np_type" name="np_type">
		<option value="1" {if $np_type=='1'}selected{/if}>В отделение</option>
		<option value="2" {if $np_type=='2'}selected{/if}>По адресу</option>
	</select>
		
	<label>Город</label>
	<input name="city" type="text" value="{$city|escape}" />
	
	<label id="by_branch">Номер отделения</label>
	<label id="by_address" style="display:none">Адрес доставки</label>
	<input name="address" type="text" value="{$address|escape}"/>
	
	</div>
	
	<label>Способ оплаты</label>
	<select name="pay">
		<option value="1" {if $pay=='1'}selected{/if}>При получении</option>
		<option value="2" {if $pay=='2'}selected{/if}>Предоплата</option>
	</select>

	<label>Комментарий к&nbsp;заказу</label>
	<textarea name="comment" id="order_comment">{$comment|escape}</textarea>
	
	<div class="captcha"><img src="captcha/image.php?{math equation='rand(10,10000)'}" alt='captcha'/></div> 
	<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>
	
	<input type="submit" name="checkout" class="button" value="Оформить заказ">
	</div>
   
</form>
{else}
  В корзине нет товаров
{/if}

</div>
{* Шаблон корзины *}
{$meta_title = "Корзина" scope=parent}
<section class="cart-page">
	<div class="container">
		<div id="path">
			<a href="./">Главная</a> / Корзина
		</div>


		{if $cart->purchases}
		<form method="post" name="cart">

		{* Список покупок *}
		<ul id="purchases">
			{foreach $cart->purchases as $purchase}
			<li>
				{* Изображение товара *}
				{$image = $purchase->product->images|first}
				{if $image}
				<div class="col-lg-1 p-img hidden-xs">
					<a href="/products/{$purchase->product->url|escape}"><img src="{$image->filename|resize:75:75}" alt="{$product->name|escape}" title="{$product->name|escape}"></a>
				</div>
				{/if}
				
				{* Название товара *}
				<div class="col-lg-5 col-xs-8">
					<a href="/products/{$purchase->product->url|escape}">{$purchase->product->visible_name|escape}</a>	
				</div>
				
				<div class="col-lg-1  col-xs-4">
					{$purchase->variant->name|escape}	
				</div>

				{* Количество *}
				<div class="col-lg-2 col-xs-5">
					<select name="amounts[{$purchase->variant->id}]" onchange="document.cart.submit();">
						{section name=amounts start=1 loop=$purchase->variant->stock+1 step=1}
						<option value="{$smarty.section.amounts.index}" {if $purchase->amount==$smarty.section.amounts.index}selected{/if}>{$smarty.section.amounts.index} {$settings->units}</option>
						{/section}
					</select>
				</div>

				{* Цена *}
				<div class="col-lg-2 col-xs-5 price">
					{($purchase->variant->price*$purchase->amount)|convert}&nbsp;{$currency->sign}
				</div>
				
				{* Удалить из корзины *}
				<div class="col-lg-1 col-xs-2 delete-purchase">
					<a href="cart/remove/{$purchase->variant->id}">&times;</a>
				</div>
			</li>
			{/foreach}
			
		</ul>
		
		<div class="col-lg-12 total-price">Общая стоимоть заказа:  <span>{$cart->total_price|convert}&nbsp;{$currency->sign}</span></div>
			
		<div class="col-lg-6 customer-data">
			<div class="row">
				{if $error}
				<div class="col-lg-12">
					<div class="alert alert-danger">
						{if $error == 'empty_name'}Введите имя{/if}
						{if $error == 'empty_email'}Введите email{/if}
						{if $error == 'empty_phone'}Введите телефон{/if}
						{if $error == 'empty_address'}Введите адрес доставки{/if}
						{if $error == 'captcha'}Капча введена неверно!{/if}
					</div>
				</div>
				{/if}
				<div class="col-lg-4 form-label"><label>Имя, фамилия*</label></div>
				<div class="col-lg-8 form-input"><input {if $error == "empty_name"}class="input-error"{/if} name="name" type="text" value="{$name|escape}" data-format=".+" data-notice="Введите имя"/></div>
				
				<div class="col-lg-4 form-label"><label>Email*</label></div>
				<div class="col-lg-8 form-input"><input {if $error == "empty_email"}class="input-error"{/if} name="email" type="text" value="{$email|escape}" data-format="email" data-notice="Введите email" /></div>

				<div class="col-lg-4 form-label"><label>Телефон*</label></div>
				<div class="col-lg-8 form-input"><input {if $error == "empty_phone"}class="input-error"{/if} name="phone" type="text" value="{$phone|escape}" /></div>
				
				<div class="col-lg-4 form-label"><label>Способ доставки:</label></div>
				<div class="col-lg-8 form-input"><select name="delivery_id"><option value="1">Самовывоз</option><option value="2">Новая почта</option></select></div>
				
				<div class="col-lg-4 form-label"><label>Город\Область</label></div>
				<div class="col-lg-8 form-input"><input name="city" type="text" value="{$city|escape}"/></div>
				
				<div class="col-lg-4 form-label"><label>Адрес (номер отделения)</label></div>
				<div class="col-lg-8 form-input"><input name="address" type="text" value="{$address|escape}"/></div>

				<div class="col-lg-4 form-label"><label>Комментарий к&nbsp;заказу</label></div>
				<div class="col-lg-8 form-input"><textarea name="comment" id="order_comment">{$comment|escape}</textarea></div>
				
				<div class="col-lg-4 form-label"><label>Проверочный код</label></div>
				<div class="col-lg-4"><div class="captcha pull-right"><img src="captcha/image.php?{math equation='rand(10,10000)'}" alt='captcha'/></div></div>
				<div class="col-lg-4 form-input"><input class="input-captcha {if $error == 'captcha'}input-error{/if}" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/></div>
			</div>
		</div>
		<div class="col-lg-6 customer-data">
			<div class="row">
				<div class="col-lg-12"><input type="submit" name="checkout" class="checkout-button pull-right" value="Оформить заказ"></div>
			</div>
		</div>
		   
		</form>
		{else}
		  <h2>В корзине нет товаров</h2>
		{/if}

	</div>	
</section>
	
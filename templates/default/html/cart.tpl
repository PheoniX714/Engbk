{* Шаблон корзины *}
{$meta_title = "Корзина" scope=parent}
<section class="cart-page">
	<div class="container">
		<div id="path">
			<a href="./">{if $language->id == 2}Головна{elseif $language->id == 4}Home{else}Главная{/if}</a> / {if $language->id == 2}Кошик{elseif $language->id == 4}Cart{else}Корзина{/if}
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
					<a href="/products/{$purchase->product->url|escape}">{if $purchase->product->visible_name}{$purchase->product->visible_name|escape}{else}{$purchase->product->name|escape}{/if}</a>	
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
		
		<div class="col-lg-12 total-price">{if $language->id == 2}Загальна вартість замовлення{elseif $language->id == 4}Total order value{else}Общая стоимость заказа{/if}:  <span>{$cart->total_price|convert}&nbsp;{$currency->sign}</span></div>
			
		<div class="col-lg-6 customer-data">
			<div class="row">
				{if $error}
				<div class="col-lg-12">
					<div class="alert alert-danger">
						{if $error == 'empty_name'}{if $language->id == 2}Введіть ім'я{elseif $language->id == 4}Enter a name{else}Введите имя{/if}{/if}
						{if $error == 'empty_email'}{if $language->id == 2}Введіть Email{elseif $language->id == 4}Enter Email{else}Введите Email{/if}{/if}
						{if $error == 'empty_phone'}{if $language->id == 2}Введіть телефон{elseif $language->id == 4}Enter phone{else}Введите телефон{/if}{/if}
						{if $error == 'empty_address'}{if $language->id == 2}Введіть адресу доставки{elseif $language->id == 4}Enter the shipping address{else}Введите адрес доставки{/if}{/if}
						{if $error == 'captcha'}{if $language->id == 2}Капча введена невірно{elseif $language->id == 4}The cap is entered incorrectly{else}Капча введена неверно{/if}!{/if}
					</div>
				</div>
				{/if}
				<div class="col-lg-4 form-label"><label>{if $language->id == 2}Ім'я, фамілія{elseif $language->id == 4}Name, surname{else}Имя, фамилия{/if}*</label></div>
				<div class="col-lg-8 form-input"><input {if $error == "empty_name"}class="input-error"{/if} name="name" type="text" value="{$name|escape}" data-format=".+" data-notice="Введите имя"/></div>
				
				<div class="col-lg-4 form-label"><label>Email*</label></div>
				<div class="col-lg-8 form-input"><input {if $error == "empty_email"}class="input-error"{/if} name="email" type="text" value="{$email|escape}" data-format="email" data-notice="Введите email" /></div>

				<div class="col-lg-4 form-label"><label>{if $language->id == 2}Телефон{elseif $language->id == 4}Phone{else}Телефон{/if}*</label></div>
				<div class="col-lg-8 form-input"><input {if $error == "empty_phone"}class="input-error"{/if} name="phone" type="text" value="{$phone|escape}" /></div>
				
				<div class="col-lg-4 form-label"><label>{if $language->id == 2}Спосіб доставки{elseif $language->id == 4}Delivery method{else}Способ доставки{/if}:</label></div>
				<div class="col-lg-8 form-input"><select name="delivery_id"><option value="1">{if $language->id == 2}Самовивіз{elseif $language->id == 4}Pickup{else}Самовывоз{/if}</option><option value="2">{if $language->id == 2}Нова Пошта{elseif $language->id == 4}"Новая почта"{else}Новая почта{/if}</option></select></div>
				
				<div class="col-lg-4 form-label"><label>{if $language->id == 2}Місто \ Область{elseif $language->id == 4}City \ Region{else}Город\Область{/if}</label></div>
				<div class="col-lg-8 form-input"><input name="city" type="text" value="{$city|escape}"/></div>
				
				<div class="col-lg-4 form-label"><label>{if $language->id == 2}Адреса (номер відділення){elseif $language->id == 4}Address (branch number){else}Адрес (номер отделения){/if}</label></div>
				<div class="col-lg-8 form-input"><input name="address" type="text" value="{$address|escape}"/></div>

				<div class="col-lg-4 form-label"><label>{if $language->id == 2}Коментарий до замовлення{elseif $language->id == 4}Comment to the order{else}Комментарий к&nbsp;заказу{/if}</label></div>
				<div class="col-lg-8 form-input"><textarea name="comment" id="order_comment">{$comment|escape}</textarea></div>
				
				<div class="col-lg-4 form-label"><label>{if $language->id == 2}Код перевірки{elseif $language->id == 4}Verification code{else}Проверочный код{/if}</label></div>
				<div class="col-lg-4"><div class="captcha pull-right"><img src="captcha/image.php?{math equation='rand(10,10000)'}" alt='captcha'/></div></div>
				<div class="col-lg-4 form-input"><input class="input-captcha {if $error == 'captcha'}input-error{/if}" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/></div>
			</div>
		</div>
		<div class="col-lg-6 customer-data">
			<div class="row">
				<div class="col-lg-12"><input type="submit" name="checkout" class="checkout-button pull-right" value="{if $language->id == 2}Оформити замовлення{elseif $language->id == 4}Checkout{else}Оформить заказ{/if}"></div>
			</div>
		</div>
		   
		</form>
		{else}
		  <h2>{if $language->id == 2}У кошику немає товарів{elseif $language->id == 4}There are no products in the cart{else}В корзине нет товаров{/if}</h2>
		{/if}

	</div>	
</section>
	
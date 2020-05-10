{* Информера корзины (отдаётся аяксом) *}
{if $cart->total_products>0}
	<a href="./cart/"><img src="templates/{$settings->theme|escape}/img/cart.png"><span>В корзине<br>{$cart->total_products} {$cart->total_products|plural:'товар':'товаров':'товара'}</span></a>
{else}
	<a href="./cart/"><img src="templates/{$settings->theme|escape}/img/cart.png"><span>Добавьте товар<br>в корзину</span></a>
{/if}
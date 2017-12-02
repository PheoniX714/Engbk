{$og_type="product" scope="parent"}
{$og_image="{$product->image->filename|resize:530:430}" scope="parent"}
{$add_script = '
	<link rel="stylesheet" href="./templates/default/css/owl.carousel.css">
	<script src="./templates/default/js/owl.carousel.min.js"></script>
	<script src="./templates/default/js/zoomsl-3.0.min.js"></script>
	<script>
		$(function() {
			$(".product").on("click", ".images", function() {
				var image_id = $(this).children("img").attr("data-imgId");
				$(".product #big_img img").hide();
				$(".product #big_img #image_"+image_id).show();
				
			});
		});
		
		$(document).ready(function(){
			$(".owl-carousel").owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				navText:["&lt;","&gt;"],
				responsive:{
					0:{
						items:1
					},
					530:{
						items:2
					},
					992:{
						items:3
					}
					,
					1200:{
						items:4
					}
				}
			})
		});
		
		function windowSize(){
			if ($(window).width() > "750"){
				$(".big_img").imagezoomsl({
					 zoomrange: [2, 2]
				});
			}
		}
		$(window).on("load",windowSize);
		
		
	</script>
' scope="parent"}

{include file='slider.tpl'}

<section class="product-page" id="product">
	<div class="container">

		<div id="path">
			<a href="./">Главная</a>
			{foreach from=$category->path item=cat}/ <a href="catalog/{$cat->url}">{if $cat->visible_name}{$cat->visible_name|escape}{else}{$cat->name|escape}{/if}</a>{/foreach}
			{if $brand}» <a href="catalog/{$cat->url}/{$brand->url}">{$brand->name|escape}</a>{/if}
			/ {$product->visible_name|escape}
		</div>
		
		<div class="clear"></div>
		
		<div class="row product">
			<div class="col-lg-1 col-md-1 col-xs-2">
				{if $product->images|count>1}
				{foreach $product->images as $i=>$image}
				<div class="images"><img src="{$image->filename|resize:60:60}" data-imgId="{$image->id}" alt="{$product->visible_name|escape}" /></div>
				{/foreach}
				<div class="clear"></div>
				{/if}
			</div>
			<div class="col-lg-5 col-md-4 col-xs-10">
				<div id="big_img" class="image">
					<img class="big_img main_img" src="{$product->image->filename|resize:530:430}" id="image_{$product->image->id}" alt="{$product->product->visible_name|escape}" data-large="/files/originals/{$product->image->filename}" />
					{foreach $product->images|cut as $i=>$image}
					<img class="big_img" src="{$image->filename|resize:530:430}" id="image_{$image->id}" style="display:none;" data-large="/files/originals/{$image->filename}"/>
					{/foreach}
				</div>
			</div>
			<div class="col-lg-6 col-md-7 col-xs-12">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12">
						<h1 data-product="{$product->id}">{$product->visible_name|escape}</h1>
					</div>
					<div class="col-lg-8 col-md-7 col-xs-12">
						<form class="variants" action="/cart">
						{foreach $product->variants as $v}
							<div class="variant-sku">Код: {$v->sku}</div>
							{break}
						{/foreach}
						
						{if $product->features}
							<div id="features">
								<ul>
								{foreach $product->features as $f}
									{if $f->language_id == $language->id} 
									<li><span class="feature-name">{$f->name}:</span><span class="feature-value">{$f->value}</span></li>
									{/if}
								{/foreach}
								<ul>
							</div>
						{/if}
						
						{if $product->variants|count>1}
						<div class="size-select">
							<label for="variant">Размер: </label>
							<select class="form-control" name="variant" id="variant">
								{foreach $product->variants as $v}
								<option value="{$v->id}" data-price="{$v->price|convert} {$currency->sign|escape}" data-compare-price="{$v->compare_price|convert} {$currency->sign|escape}">{$v->name}</option>
								{/foreach}
							</select>
						</div>
						{else}
						<input type="radio" name="variant" value="{$product->variant->id}" checked style="display:none!important"/>
						{/if}
						
						{foreach $product->variants as $v}
							<div class="product-price">{if $product->variants|count > 0}{$v->price|convert} <span class="currency">{$currency->sign|escape}</span>{else}Нет в наличии{/if}</div>
							{break}
						{/foreach}
						
						{if $group_products}
						<div class="product-colors">
							{foreach $group_products as $gp}
							{if $gp->color}
							<a {if $gp->id != $product->id}href="products/{$gp->url}#product"{/if} style="background:#{$gp->color};" {if $gp->id == $product->id}class="active"{/if}>1</a> 
							{/if}
							{/foreach}
						</div>
						{/if}
						
						<div class="buy-loyalty">
							<a href="/page/predlozheniya-ot-privatbanka">Купить<br>по программе<br>лояльности</a>
						</div>
						
						<input type="submit" class="to-cart-button" value="купить" data-result-text="в корзине"/>
						
						</form>
					</div>
					<div class="col-lg-4 col-md-5 col-xs-12">
						<div class="a-discount">
							<b>Внимание!</b><br>
							Дополнительная<br>
							скидка при заказе<br>
							в интернет магазине!<br>
							Аксессуары -7%,<br>
							Верхняя одежда  -5%
						</div>
						<div class="clear"></div>
						<a href="page/tablitsa-razmerov" class="sizes-table">Таблица размеров</a>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<p>Цены указаны без учета дополнительной скидки.<br>
						Цены и наличие товара уточняйте по телефону +38 (096) 00-00-534, приносим свои извинения за временное неудобство.</p>
					</div>
				</div>

				<div class="clear"></div>
			</div>
			
			{* Связанные товары *}
			{if $related_products}
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- Список каталога товаров-->
				<div class="row related_products">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-8">
						<h2>Рекомендуем для вас:</h2>
					</div>
					
					<div class="owl-carousel col-lg-12 col-md-12 col-sm-12 col-xs-12">
						{foreach $related_products as $related_product}
						<div class="carousel-product">
							<div class="product">
								<div class="rp-image">
									<a href="products/{$related_product->url}"><img src="{$related_product->image->filename|resize:150:225}" alt="{$related_product->visible_name|escape}"/></a>
								</div>
								<div class="product_info">

									<h3><a data-product="{$related_product->id}" href="products/{$related_product->url}">{$related_product->visible_name|escape}</a></h3>
									
									<div class="p-left-block">
										<p class="p-sku">Код {$related_product->variant->sku}</p>
										{if $related_product->variant->compare_price}<p class="p-compare-price">{$related_product->variant->compare_price|convert} {$currency->sign|escape}</p>{/if}
										<p class="p-price {if !$related_product->variant->compare_price}only{/if}">{$related_product->variant->price|convert} {$currency->sign|escape}</p>
										
									</div>
									
									<div class="p-right-block">
										<a class="more" href="products/{$related_product->url}">Подробнее</a>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
						{/foreach}	
					</div>
					<div class="clear"></div>
				</div>
			</div>
			{/if}
			
		</div>
	</div>
</section>
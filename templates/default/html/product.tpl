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
				margin:15,
				nav:false,
				navText:["&lt;","&gt;"],
				responsive:{
					0:{
						items:1
					},
					530:{
						items:2
					},
					730:{
						items:3
					},
					992:{
						items:3
					}
					,
					1200:{
						items:5
					}
				}
			})
		});
		
		function windowSize(){
			if ($(window).width() > "991"){
				$(".big_img").imagezoomsl({
					 zoomrange: [2, 2],
					 zindex: 3
				});
			}
		}
		$(window).on("load",windowSize);
		
		
	</script>
' scope="parent"}

<section class="product-page" id="product">
	<div class="container">

		<div id="path">
			<a href="./">{if $language->id == 2}Головна{elseif $language->id == 4}Home{else}Главная{/if}</a> 
			{foreach from=$category->path item=cat}/ <a href="catalog/{$cat->url}">{if $cat->visible_name}{$cat->visible_name|escape}{else}{$cat->name|escape}{/if}</a>{/foreach}
			{if $brand}» <a href="catalog/{$cat->url}/{$brand->url}">{$brand->name|escape}</a>{/if}
			/ {if $product->visible_name}{$product->visible_name|escape}{else}{$product->name|escape}{/if}
		</div>
		
		<div class="clear"></div>
		
		<div class="row product">
			<div class="col-lg-2 col-md-2 col-xs-3">
				{if $product->images|count>1}
				{foreach $product->images as $i=>$image}
				<div class="images"><img src="{$image->filename|resize:165:165}" data-imgId="{$image->id}" alt="{$product->visible_name|escape}" /></div>
				{/foreach}
				<div class="clear"></div>
				{/if}
			</div>
			<div class="col-lg-4 col-md-4 col-xs-9 pdl-0">
				<div id="big_img" class="image">
					<img class="big_img main_img" src="{$product->image->filename|resize:390:500}" id="image_{$product->image->id}" alt="{$product->product->visible_name|escape}" data-large="/files/originals/{$product->image->filename}" />
					{foreach $product->images|cut as $i=>$image}
					<img class="big_img" src="{$image->filename|resize:390:500}" id="image_{$image->id}" style="display:none;" data-large="/files/originals/{$image->filename}"/>
					{/foreach}
					
					{if $product->variant->compare_price}<div class="product-discount">-{((1-$product->variant->price/$product->variant->compare_price)*100)|convert}%</div>{/if}
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12">
						<h1 data-product="{$product->id}">{$product->visible_name|escape}</h1>
					</div>
					<div class="col-lg-12 col-md-12 col-xs-12">
						<div class="product-stock">{if $language->id == 2}Артикул{elseif $language->id == 4}Sku{else}Артикул{/if}: {$product->variant->sku}</div>
					</div>
					<div class="col-lg-12 col-md-12 col-xs-12">
						<div class="product-text">{$product->body}</div>
					</div>
					<div class="col-lg-12 col-md-12 col-xs-12">
						<form class="variants" action="/cart">
							
						<div class="p-line">
							<div class="product-price-box">
								{foreach $product->variants as $v}
								<div class="product-price">{if $product->variant->compare_price}<span class="old-price">{$product->variant->compare_price|convert} {$currency->sign}</span>{/if} {$v->price|convert} <span class="currency">{$currency->sign|escape}</span> {if $currency->id != 3}<span class="usd">(${$product->variant->price|convert:3})</span>{/if}</div>
								{break}
								{/foreach}
							</div>
							
							<input type="submit" class="to-cart-button" value="{if $language->id == 2}В кошик{elseif $language->id == 4}Add to cart{else}В корзину{/if}" data-result-text="{if $language->id == 2}В кошик{elseif $language->id == 4}Add to cart{else}В корзину{/if}"/>
						</div>
						<div class="clear"></div>
						{if $group_products or $product->variants|count>1}
						<div class="select-line">							
							{if $group_products}
							<div class="product-colors">
								<div class="colors-title">{if $language->id == 2}Колір{elseif $language->id == 4}Color{else}Цвет{/if}:</div>
								<div class="colors-list">
								{foreach $group_products as $gp}
								{if $gp->color}
								<a {if $gp->id != $product->id}href="products/{$gp->url}#product"{/if} style="background:#{$gp->color};" {if $gp->id == $product->id}class="active"{/if} ><span><i class="fa fa-check" aria-hidden="true"></i></span></a>
								{/if}
								{/foreach}
								</div>
							</div>
							{/if}
							
							{if $product->variants|count>1}
							<div class="size-select">
								<div class="size-title">:</div>
								<select class="form-control" name="variant" id="variant">
									{foreach $product->variants as $v}
									<option value="{$v->id}" data-price="{$v->price|convert} {$currency->sign|escape}" data-compare-price="{$v->compare_price|convert} {$currency->sign|escape}">{$v->name}</option>
									{/foreach}
								</select>
							</div>
							{else}
							<div class="size-select">
								<div class="size-title">{if $language->id == 2}Розмір{elseif $language->id == 4}Size{else}Размер{/if}:</div>
								<div class="size-name">{$product->variant->name|escape}</div>
							</div>
							<input type="radio" name="variant" value="{$product->variant->id}" checked style="display:none!important"/>
							{/if}
							<div class="clear"></div>
						</div>
						{/if}
						
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
						
						</form>
					</div>
				</div>

				<div class="clear"></div>
			</div>
			
			{* Связанные товары *}
			{if $related_products}
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- Список каталога товаров-->
				<div class="row related_products">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2>{if $language->id == 2}Рекомендовані товари{elseif $language->id == 4}Recommended products{else}Рекомендуемые товары{/if}</h2>
					</div>
					
					<div class="owl-carousel col-lg-12 col-md-12 col-sm-12 col-xs-12">
						{foreach $related_products as $related_product}
						<div class="carousel-product">
							<div class="product">
								<div class="rp-image">
									<a href="products/{$related_product->url}"><img src="{$related_product->image->filename|resize:216:300}" alt="{$related_product->name|escape}"/></a>
								</div>
								<div class="product_info">
									<h3><a data-product="{$related_product->id}" href="products/{$related_product->url}">{$related_product->name|escape}</a></h3>
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
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				{if $comments}
				<ul class="comment_list">
					{foreach $comments as $comment}
					<a name="comment_{$comment->id}"></a>
					<li>
						<!-- Имя и дата комментария-->
						<div class="comment_header">	
							<span>{for $foo=1 to $comment->rating}
								<i class="fa fa-star" aria-hidden="true"></i>
							{/for}</span> - <i>{$comment->date|date}</i>
						</div>
						<div class="comment_name">	
							{$comment->name|escape}
						</div>
						
						<div class="comment_text">	
							{$comment->text|escape|nl2br}
						<!-- Комментарий (The End)-->
						</div>
						{if $answers[$comment->id]->text}
						<div class="answer">
							<div class="a-title">
								Ответ администратора
							</div>
							<div class="a-text">
								{$answers[$comment->id]->text}
							</div>
						</div>
						{/if}
					</li>
					{/foreach}
				</ul>
				<!-- Список с комментариями (The End)-->
				{else}
				<p>
					{if $language->id == 2}Відгуків покищо нема{elseif $language->id == 4}No reviews yet{else}Отзывов пока нет{/if}
				</p>
				{/if}
				
				{include file='pagination-comments.tpl'}
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!--Форма отправления комментария-->	
				<form class="comment_form" method="post">
					{if $error}
					<div class="message_error">
						{if $error=='captcha'}
						{if $language->id == 2}Невірно введена капча{elseif $language->id == 4}Incorrectly introduced captcha{else}Неверно введена капча{/if}
						{elseif $error=='empty_name'}
						{if $language->id == 2}Введіть ім'я{elseif $language->id == 4}Enter your name{else}Введите имя{/if}
						{elseif $error=='empty_comment'}
						{if $language->id == 2}Введіть коментар{elseif $language->id == 4}Enter a comment{else}Введите комментарий{/if}
						{/if}
					</div>
					{/if}
					
					<div class="comment_textarea">
						<label for="comment_text">{if $language->id == 2}Текст відгуку{elseif $language->id == 4}Leave review{else}Текст отзыва{/if}</label>
						<textarea class="c_textarea" id="comment_text" name="text">{$comment_text}</textarea>
						<div class="clear"></div>
					</div>
					<div class="comment_namearea">
						<label for="comment_name">{if $language->id == 2}Ім'я{elseif $language->id == 4}Name{else}Имя{/if}:</label>
						<input class="input_name" type="text" id="comment_name" name="name" value="{$comment_name}"/><br />
						<div class="clear"></div>
					</div>
					<div class="comment_ratearea">
						<label for="comment_name">{if $language->id == 2}Оцінка{elseif $language->id == 4}Rate{else}Оценка{/if}:</label>
						<select class="form-control input_name" id="comment_rating" name="rating"/>
							<option {if $comment_rating == 1}selected{/if} value="1">{if $language->id == 2}Дуже погано{elseif $language->id == 4}Very bad{else}Очень плохо{/if}</option>
							<option {if $comment_rating == 2}selected{/if} value="2">{if $language->id == 2}Погано{elseif $language->id == 4}Bad{else}Плохо{/if}</option>
							<option {if $comment_rating == 3}selected{/if} value="3">{if $language->id == 2}Добре{elseif $language->id == 4}Good{else}Хорошо{/if}</option>
							<option {if $comment_rating == 4}selected{/if} value="4">{if $language->id == 2}Дуже добре{elseif $language->id == 4}Very good{else}Очень хорошо{/if}</option>
							<option {if $comment_rating == 5}selected{/if} value="5">{if $language->id == 2}Відмінно{elseif $language->id == 4}Excellent{else}Отлично{/if}</option>
						</select>
						<br />
						<div class="clear"></div>
					</div>
					
					<div class="comment_check">
						<div class="captcha"><img src="captcha/image.php?{math equation='rand(10,10000)'}" alt='captcha'/></div> 
						<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>
						<input class="button" type="submit" name="comment" value="{if $language->id == 2}Відправити{elseif $language->id == 4}Send{else}Отправить{/if}" />
						<div class="clear"></div>
					</div>
				</form>
				<!--Форма отправления комментария (The End)-->
				
			</div>
			
		</div>
	</div>
</section>
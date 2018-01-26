{$wrapper = 'index.tpl' scope=parent}
{$add_css = '
	<link rel="stylesheet" href="./templates/default/css/owl.carousel.css">
' scope="parent"}
{$add_script = '
	<script src="./templates/default/js/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".owl-carousel").owlCarousel({
				loop:false,
				margin:30,
				navText:["&lt;","&gt;"],
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				nav:true,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					800:{
						items:3
					},
					1000:{
						items:4
					},
					1200:{
						items:4
					}
				}
			})
		});		
	</script>
' scope="parent"}

{* Канонический адрес страницы *}
{$canonical="" scope=parent}
<div class="container">
	<section class="main-block">
		<div class="row">
			<div class="col-lg-3 pdr-0">
				<div class="left-menu">
					{function name=categories_tree}
						{if $categories}
						{foreach $categories as $c}
						{if $c->visible}
						<a {if $category->id==$c->id}class="selected"{/if} href="{if $language->id !=1}{$language->code}/{/if}catalog/{$c->url}" data-category="{$c->id}">{if $c->visible_name}{$c->visible_name|escape}{else}{$c->name|escape}{/if}</a>
						{/if}
						{/foreach}
						{/if}
					{/function}
					{categories_tree categories=$categories level=0}
				</div>
			</div>
			<div class="col-lg-9">
				{include file='slider.tpl'}
			</div>
			<div class="clear"></div>
		</div>
	</section>
</div>

	<section class="best-sellers-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="main-title">
						<h2>{if $language->id == 2}Хіти продаж{elseif $language->id == 4}BESTSELLER’S{else}Хиты продаж{/if}</h2>
					</div>
				</div>
				<div class="best-sellers col-lg-12 col-md-12 col-sm-12 col-xs-12">
					{get_featured_products var=featured_products limit=12}
						{if $featured_products}
						<div class="owl-carousel nav-active">
						{foreach $featured_products as $product}
							<div class="carousel-product">
								<div class="bs-block">
									<div class="image"><a href="products/{$product->url}"><img src="{$product->image->filename|resize:272:348}" alt="{$product->name|escape}"/><div class="p-more"><span>{if $language->id == 2}Детальніше{elseif $language->id == 4}More{else}Подробнее{/if}</span></div></a></div>
									<div class="price-row">{$product->variant->price|convert} {$currency->sign} {if $currency->id != 3}<span class="usd">(${$product->variant->price|convert:3})</span>{/if}</div>
									<div class="product-name"><h3>{$product->name|escape}</h3></div>
									<div class="more"><a href="products/{$product->url}">{if $language->id == 2}Детальніше{elseif $language->id == 4}Learn more{else}Подробнее{/if}</a></div>
								</div>
							</div>
						{/foreach}
						</div>
						{/if}
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="best-sellers-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="main-title">
						<h2>{if $language->id == 2}Акції{elseif $language->id == 4}Sale{else}Акции{/if}</h2>
					</div>
				</div>
				<div class="best-sellers col-lg-12 col-md-12 col-sm-12 col-xs-12">
					{get_discounted_products var=discounted_products limit=12}
					{if $discounted_products}
					<div class="owl-carousel nav-active">
					{foreach $discounted_products as $product}
						<div class="carousel-product">
							<div class="bs-block">
								<div class="image"><a href="products/{$product->url}"><img src="{$product->image->filename|resize:272:348}" alt="{$product->name|escape}"/><div class="p-more"><span>{if $language->id == 2}Детальніше{elseif $language->id == 4}More{else}Подробнее{/if}</span></div></a>
								{if $product->variant->compare_price}<div class="product-discount">-{((1-$product->variant->price/$product->variant->compare_price)*100)|convert}%</div>{/if}</div>
								<div class="price-row">{if $product->variant->compare_price}<span class="old-price">{$product->variant->compare_price|convert} {$currency->sign}</span>{/if} {$product->variant->price|convert} {$currency->sign} {if $currency->id != 3}<span class="usd">(${$product->variant->price|convert:3})</span>{/if}</div>
								<div class="product-name"><h3>{$product->name|escape}</h3></div>
								<div class="more"><a href="products/{$product->url}">{if $language->id == 2}Детальніше{elseif $language->id == 4}Learn more{else}Подробнее{/if}</a></div>
							</div>
						</div>
					{/foreach}
					</div>
					{/if}
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="best-sellers-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="main-title">
						<h2>{if $language->id == 2}Нові товари{elseif $language->id == 4}New{else}Новые товары{/if}</h2>
					</div>
				</div>
				<div class="best-sellers col-lg-12 col-md-12 col-sm-12 col-xs-12">
					{get_new_products var=new_products limit=12}
					{if $new_products}
					<div class="owl-carousel nav-active">
					{foreach $new_products as $product}
						<div class="carousel-product">
							<div class="bs-block">
								<div class="image"><a href="products/{$product->url}"><img src="{$product->image->filename|resize:272:348}" alt="{$product->name|escape}"/><div class="p-more"><span>{if $language->id == 2}Детальніше{elseif $language->id == 4}More{else}Подробнее{/if}</span></div></a></div>
								<div class="price-row">{$product->variant->price|convert} {$currency->sign} {if $currency->id != 3}<span class="usd">(${$product->variant->price|convert:3})</span>{/if} </div>
								<div class="product-name"><h3>{$product->name|escape}</h3></div>
								<div class="more"><a href="products/{$product->url}">{if $language->id == 2}Детальніше{elseif $language->id == 4}Learn more{else}Подробнее{/if}</a></div>
							</div>
						</div>
					{/foreach}
					</div>
					{/if}
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</section>
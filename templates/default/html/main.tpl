{$wrapper = 'index.tpl' scope=parent}
{$add_css = '
	<link rel="stylesheet" href="./templates/default/css/owl.carousel.css">
' scope="parent"}
{$add_script = '
	<script src="./templates/default/js/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".owl-carousel").owlCarousel({
				loop:true,
				margin:30,
				navText:["&lt;","&gt;"],
				autoplay:true,
				autoplayTimeout:4000,
				autoplayHoverPause:true,
				nav:true,
				responsive:{
					0:{
						items:2
					},
					600:{
						items:3
					},
					800:{
						items:4
					},
					1000:{
						items:5
					},
					1200:{
						items:6
					}
				}
			})
		});		
	</script>
' scope="parent"}

{* Канонический адрес страницы *}
{$canonical="" scope=parent}
{include file='slider.tpl'}
<section id="content" class="content">
	<div class="container">
		<div class="col-lg-11 col-md-10 col-sm-9 col-xs-8">
			<div class="main-lidery-title">
				<h2>Лидеры продаж</h2>
			</div>
		</div>
		<div class="best-sellers col-lg-12 col-md-12 col-sm-12 col-xs-12">
			{get_featured_products var=featured_products limit=12}{if $featured_products}<div class="owl-carousel nav-active">{foreach $featured_products as $product}<div class="carousel-product"><div class="bs-block"><a href="products/{$product->url}"><img src="{$product->image->filename|resize:158:214}" alt="{$product->name|escape}"/></a></div></div>{/foreach}</div>{/if}<div class="clear"></div>
		</div>
		<div class="col-lg-12 col-xs-12">
			<div class="main-banner">
				<a href="/catalog/shuby"><img src="templates/{$settings->theme|escape}/img/main1.jpg"></a>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="main-banner">
				<a href="/catalog/zhenskoe"><img src="templates/{$settings->theme|escape}/img/main2.jpg"></a>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="main-banner">
				<a href="/catalog/muzhskoe"><img src="templates/{$settings->theme|escape}/img/main3.jpg"></a>
			</div>
		</div>
		<div class="col-lg-12 col-xs-12">
			<div class="main-banner">
				<a href="/page/podarochnyj-sertifikat"><img src="templates/{$settings->theme|escape}/img/main4.jpg"></a>
			</div>
		</div>
	</div>
</section>
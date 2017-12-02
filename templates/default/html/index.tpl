<!DOCTYPE html>
<html lang="ru">
  <head>
	<base href="{$config->root_url}/"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="templates/{$settings->theme|escape}/img/favicon.ico">
    <title>{$meta_title|escape}</title>
	<meta name="description" content="{$meta_description|escape}" />
	<meta property="og:site_name" content="{$settings->site_name|escape}">
    <meta property="og:title" content="{$meta_title|escape}" />
	<meta property="og:url" content="{$config->root_url}{$smarty.server.REQUEST_URI}">
	<meta property="og:description" content="{$meta_description|escape}" />
	{if $og_type}<meta property="og:type" content="{$og_type}">{/if}
	{if $og_image}<meta property="og:image" content="{$og_image}">{/if}
	<meta name="keywords"    content="{$meta_keywords|escape}" />
	<link href="templates/{$settings->theme|escape}/css/{if $Speed_Insights}bootstrap.min.css{else}bootstrap-pagespeed.css{/if}" rel="stylesheet">
    <link href="templates/{$settings->theme|escape}/css/theme.css" rel="stylesheet">
	{if $Speed_Insights}<link rel="stylesheet" href="templates/{$settings->theme|escape}/css/iview.css" />{/if}
	{$add_css}
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	{if $Speed_Insights}{literal}<script async src="https://www.googletagmanager.com/gtag/js?id=UA-35760642-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-35760642-1');
	</script>{/literal}{/if}
  </head>
  <body>
	<div class="navbar navbar-fixed-top hidden-md hidden-lg" style="max-width:1140px; min-height:46px; margin:0 auto; background: #fdf9ef;">
		<div class="hidden-md hidden-lg">
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="min-height:46px; position:fixed;">
			  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Навигация по сайту</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<div class="collapse navbar-collapse">
				  <ul class="nav navbar-nav">{foreach $menu_pages as $p}{if $p->menu_id == 2}<li><a href="{if $language->id != 1}{$language->code}/{/if}{$p->url}">{$p->name}</a></li>{/if}{/foreach}{foreach $menu_pages as $p}{if $p->menu_id == 1}<li><a href="{if $language->id != 1}{$language->code}/{/if}{$p->pre_url}{$p->url}">{$p->name}</a></li>{/if}{/foreach}</ul>
				</div>
			  </div>
			</div>
		</div>			
	</div>
	<header class="header">	
		<div class="container">
			<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 logo">
				<a href="/"><img src="templates/{$settings->theme|escape}/img/logo.png"></a>
			</div>
			<div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
				<ul class="top-menu top-menu-line-1">{foreach $menu_pages as $p}{if $p->menu_id==1}<li><a href="{if $language->id !=1}{$language->code}/{/if}{$p->pre_url}{$p->url}">{$p->name}</a></li>{/if}{/foreach}</ul><ul class="top-menu top-menu-line-2">{foreach $menu_pages as $p}{if $p->menu_id==2}{if $p->id==39}<li class="holder"><a href="{if $language->id !=1}{$language->code}/{/if}{$p->pre_url}{$p->url}">{$p->name}</a>{if $categories_men}<div class="hidden-md"><div class="drop-menu">{function name=categories_tree}{if $categories}{if $level==0}{foreach $categories as $c}{* Показываем только видимые категории *}{if $c->visible}<div class="menu-container"><b><a{if $category->id==$c->id}class="selected"{/if} href="{if $language->id !=1}{$language->code}/{/if}catalog/{$c->url}" data-category="{$c->id}">{if $c->visible_name}{$c->visible_name|escape}{else}{$c->name|escape}{/if}</a></b>{categories_tree categories=$c->subcategories level=level+1}</div>{/if}{/foreach}{else}<ul class="menu-ul">{foreach $categories as $c}{* Показываем только видимые категории *}{if $c->visible}<li><a{if $category->id==$c->id}class="selected"{/if} href="{if $language->id !=1}{$language->code}/{/if}catalog/{$c->url}" data-category="{$c->id}">{if $c->visible_name}{$c->visible_name|escape}{else}{$c->name|escape}{/if}</a>{if $level==0}{categories_tree categories=$c->subcategories level=level+1}{/if}</li>{/if}{/foreach}</ul>{/if}{/if}{/function}{categories_tree categories=$categories_men level=0}{categories_tree categories=$categories_1 level=0}{categories_tree categories=$categories_2 level=0}</div></div>{/if}</li>{elseif $p->id==40}<li class="holder"><a href="{if $language->id !=1}{$language->code}/{/if}{$p->pre_url}{$p->url}">{$p->name}</a>{if $categories_women}<div class="hidden-md"><div class="drop-menu">{function name=categories_tree}{if $categories}{if $level==0}{foreach $categories as $c}{* Показываем только видимые категории *}{if $c->visible}<div class="menu-container"><b><a{if $category->id==$c->id}class="selected"{/if} href="{if $language->id !=1}{$language->code}/{/if}catalog/{$c->url}" data-category="{$c->id}">{if $c->visible_name}{$c->visible_name|escape}{else}{$c->name|escape}{/if}</a></b>{categories_tree categories=$c->subcategories level=level+1}</div>{/if}{/foreach}{else}<ul class="menu-ul">{foreach $categories as $c}{* Показываем только видимые категории *}{if $c->visible}<li><a{if $category->id==$c->id}class="selected"{/if} href="{if $language->id !=1}{$language->code}/{/if}catalog/{$c->url}" data-category="{$c->id}">{if $c->visible_name}{$c->visible_name|escape}{else}{$c->name|escape}{/if}</a>{if $level==0}{categories_tree categories=$c->subcategories level=level+1}{/if}</li>{/if}{/foreach}</ul>{/if}{/if}{/function}{categories_tree categories=$categories_women level=0}{categories_tree categories=$categories_1 level=0}{categories_tree categories=$categories_2 level=0}</div></div>{/if}</li>{else}<li><a href="{if $language->id !=1}{$language->code}/{/if}{$p->pre_url}{$p->url}">{$p->name}</a></li>{/if}{/if}{/foreach}</ul>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 pd0">
				<form method="get" action="products">
					<div id="search">
						<div id="search-box">
							<input class="search-i" type="text" value="{$keyword}" name="keyword" tabindex="1">
							<input class="search-b" type="submit" value="Поиск" tabindex="2">
							<div class="clear"></div>
						</div>
					</div>
				</form>
				<div class="phone"><a href="tel:+38 (096) 00-00-534">+38 (096) 00-00-534</a> <img src="templates/{$settings->theme|escape}/img/ar-dwn.png">
					<div class="phone-cont"><a href="tel:+38 (096) 00-00-534">+38 (095) 00-00-534</a></div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
				<div class="languages">
					<img src="templates/{$settings->theme|escape}/img/lang.png">
					<div class="lang-cont">
						{foreach $languages as $l}<p><a href="{url lang=$l->code}" {if $language->id == $l->id}class="selected"{/if}>{$l->name}</a></p>{/foreach}
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
				<div id="cart_informer">{include file='cart_informer.tpl'}</div>
			</div>
		</div> <!-- /container -->
	</header>
	{$content}
	<footer class="footer">
		<div class="container">
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
				<ul class="f-menu f-menu-col-1">
					<li><a href="{if $language->id != 1}{$language->code}/{/if}page/o-magazine">О магазине</a></li>
					<li><a href="{if $language->id != 1}{$language->code}/{/if}page/predlozheniya-ot-privatbanka">Рассрочка</a></li>
					<li><a href="{if $language->id != 1}{$language->code}/{/if}page/kontakty">Контакты</a></li>
					<li></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
				<ul class="f-menu f-menu-col-1">
					<li><a href="{if $language->id != 1}{$language->code}/{/if}page/dostavka-i-oplata">Доставка и оплата</a></li>
					<li><a href="{if $language->id != 1}{$language->code}/{/if}page/obmen">Обмен</a></li>
					<li><a href="{if $language->id != 1}{$language->code}/{/if}news/">Публикации</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-4 hidden-xs">
				<ul class="f-menu f-menu-col-1">
					
				</ul>
			</div>
			<div class="clear visible-sm"></div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pay-cards">
				<img src="templates/{$settings->theme|escape}/img/pp.png"> <img src="templates/{$settings->theme|escape}/img/mc.png"> <img src="templates/{$settings->theme|escape}/img/vs.png">
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="f-phones">
					<p><a href="tel:+38 (096) 00-00-534">+38 (096) 00-00-534</a></p>
					<p><a href="tel:+38 (096) 00-00-534">+38 (095) 00-00-534</a></p>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 copy">
				&copy; 2017 Все права защищены. <a href="http://a-style.kh.ua/">Разработка сайта - A-Style</a>.
			</div>
		</div>
	</footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="templates/{$settings->theme|escape}/js/jquery.min.js"></script>
    <script src="templates/{$settings->theme|escape}/js/bootstrap.min.js"></script>
	{if $Speed_Insights}<script src="templates/{$settings->theme|escape}/js/raphael-min.js"></script>
	<script src="templates/{$settings->theme|escape}/js/jquery.easing.js"></script>
	<script src="templates/{$settings->theme|escape}/js/iview.js"></script>
	{literal}
	<script>
		$(document).ready(function(){
			$('#iview').iView({
				fx:'random',
				pauseTime: 7000,
				timerOpacity: 0,
				directionNav: false,
				controlNav: true,
				controlNavNextPrev: false,
				controlNavHoverOpacity: 1,
				controlNavThumbs: false,
				controlNavTooltip: false
			});
		});
	</script>	
	{/literal}
	<script src="templates/{$settings->theme|escape}/js/jquery-ui.min.js"></script>
    <script src="templates/{$settings->theme|escape}/js/ajax_cart.js"></script>
	{$add_script}{/if}
  </body>
</html>
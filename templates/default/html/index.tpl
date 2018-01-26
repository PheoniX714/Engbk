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

    <!-- Bootstrap core CSS -->
    <link href="templates/{$settings->theme|escape}/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="templates/{$settings->theme|escape}/css/theme.css" rel="stylesheet">
    <link href="templates/{$settings->theme|escape}/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
	{if $Speed_Insights}<link rel="stylesheet" href="templates/{$settings->theme|escape}/css/iview.css" />{/if}
	{$add_css}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="navbar navbar-fixed-top hidden-md hidden-lg" style="max-width:1140px; min-height:46px; margin:0 auto; background: #fdf9ef;">
		<div class="hidden-md hidden-lg">
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="min-height:46px; position:fixed;">
			  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"> </span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<div class="collapse navbar-collapse">
				  <ul class="nav navbar-nav">{foreach $menu_pages as $p}{if $p->menu_id == 1}<li><a href="{if $language->id != 1}{$language->code}/{/if}{$p->pre_url}{$p->url}">{$p->name}</a></li>{/if}{/foreach}</ul>
				</div>
			  </div>
			</div>
		</div>			
	</div>
	
	<div class="container">
		<header class="header">	
			<div class="col-lg-2 col-xs-4">
				<div class="logo">
					<a href=""><img src="templates/{$settings->theme|escape}/img/logo.png"></a>
				</div>
			</div>
			<div class="col-lg-10 col-xs-8 pdl-0">
				<div class="top-block">
					<div id="search-box" class="hidden-xs">
						<form action="products/" method="GET">
							<input class="search-i" placeholder="Найти товар(ы)" type="text" value="{$keyword}" name="keyword" tabindex="1">
							<input class="search-b" type="submit" name="search-button" value="Поиск" tabindex="2">
						</form>
					</div>
					<div class="lang-select">
						{foreach $languages as $l}<a href="{url lang=$l->code}" {if $language->id == $l->id}class="act"{/if}>{$l->name}</a>{/foreach}
					</div>
					<div class="social">
						<a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a><a href=""><i class="fa fa-vk" aria-hidden="true"></i></a><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="bottom-block">
					<ul class="top-menu hidden-sm hidden-xs">
						{foreach from=$menu_pages item=p name=t_menu}{if $p->menu_id == 1 and $p->id != 6}<li><a href="{if $language->id != 1}{$language->code}/{/if}{$p->pre_url}{$p->url}" {if $smarty.foreach.t_menu.last}class="last"{/if}>{$p->name}</a></li>{/if}{/foreach}
					</ul>
					<div id="cart_informer_box">{include file='cart_informer.tpl'}</div>
				</div>
			</div>
			<div class="clear"></div>
		</header>
	</div>

		{$content}
	
	<div class="container">	
		<footer class="footer">
				<div class="col-lg-12">
					<ul class="bottom-menu hidden-sm hidden-xs">
						{foreach from=$menu_pages item=p name=t_menu}{if $p->menu_id == 1}<li><a href="{if $language->id != 1}{$language->code}/{/if}{$p->pre_url}{$p->url}" {if $smarty.foreach.t_menu.last}class="last"{/if}>{$p->name}</a></li>{/if}{/foreach}
					</ul>
				</div>
				<div class="col-lg-12 copy">
					&copy; 2018 <a href="http://a-style.kh.ua/">{if $language->id == 2}Розробка сайту{elseif $language->id == 4}Support and development{else}Разработка сайта{/if} - A-Style</a>.
				</div>
				<div class="clear"></div>
		</footer>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="templates/{$settings->theme|escape}/js/bootstrap.min.js"></script>
	<script src="templates/{$settings->theme|escape}/js/raphael-min.js"></script>
	<script src="templates/{$settings->theme|escape}/js/jquery.easing.js"></script>
	<script src="templates/{$settings->theme|escape}/js/iview.js"></script>
	<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="templates/{$settings->theme|escape}/js/ajax_cart.js"></script>
	
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
	{$add_script}
  </body>
</html>
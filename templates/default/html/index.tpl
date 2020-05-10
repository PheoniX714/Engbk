{$wrapper = '' scope='root'}

{* Канонический адрес страницы *}
{$canonical="" scope='root'}

<!DOCTYPE html>
<html lang="{$language->code}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{$meta_description|escape}">
	<meta name="keywords"    content="{$meta_keywords|escape}" />
    <link rel="icon" href="templates/{$settings->theme|escape}/img/favicon.ico">

    <base href="{$config->root_url}/"/>
    <title>{$meta_title|escape}</title>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Oswald:400,300,700">
	<link rel="stylesheet" href="templates/{$settings->theme|escape}/css/font-awesome.min.css">
	<link rel="stylesheet" href="templates/{$settings->theme|escape}/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
	<link rel="stylesheet" href="templates/{$settings->theme|escape}/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="templates/{$settings->theme}/js/carousel/slick.css"/>
		
	<!-- App CSS -->
	<link rel="stylesheet" href="templates/{$settings->theme|escape}/css/basic-styles.css">
	<link rel="stylesheet" href="templates/{$settings->theme|escape}/css/theme.css">
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	{literal}
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-38434723-1', 'auto');
	  ga('send', 'pageview');

	</script>
	{/literal}
  </head>

  <body>
  
	
  
	<div class="navbar navbar-fixed-top hidden-md hidden-lg" style="max-width:1140px; min-height:46px; margin:0 auto; background: #fdf9ef;">
		<div class="hidden-md hidden-lg">
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="min-height:46px; position:fixed;">
			  <div class="container">
				<div class="navbar-header">
				  <a class="navbar-brand" href="#">Развернуть меню</a>
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<div class="collapse navbar-collapse">
				  <ul class="nav navbar-nav">
					{foreach $categories as $c}
						<li><a href="{if !$language->main}{$language->code}{/if}/catalog/{$c->url}">{$c->name|escape}</a></li>
					{/foreach}
				  </ul>
				</div>
			  </div>
			</div>
		</div>			
	</div>
	
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 logo">
					<a href="/"><img src="templates/{$settings->theme|escape}/img/logo.png"></a>
				</div>
				<div class="col-lg-5 col-md-6 col-sm-8 col-xs-12 ">
					<div class="t-contacts">
						<div class="c-box">
							<p><a href="tel:+380577197719">(057) <span>719-77-19</span></a></p>
							<p><a href="tel:+380675417507">(067) <span>541-75-07</span></a></p>
							<p><a href="tel:+380675740324">(067) <span>574-03-24</span></a></p>
							<p><a href="tel:+380675753800">(067) <span>575-38-00</span></a></p>
						</div>
						<div class="c-box2">
							<p><img src="templates/{$settings->theme|escape}/img/add.png"> <a href="#contacts">г.Харьков; <span>ул. Военная 20</span></a></p>
							<p><img src="templates/{$settings->theme|escape}/img/mail.png">  <a href="mailto:info@aplast.com.ua">info@<span>aplast.com.ua</span></a></p>	
							<div class="search">
								<form action="products">
									<button class="button_search" value="" type="submit"><i class="fa fa-search"></i></button>
									<input class="input_search" type="text" name="keyword" value="{$keyword|escape}" />
								</form>
							</div>							
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
					<div id="cart_informer">
						{* Обновляемая аяксом корзина должна быть в отдельном файле *}
						{include file='cart_informer.tpl'}
					</div>
				</div>
			</div>
		</div>
		
	</header>
	
	<section class="top-menu">
		<div class="container">
			{function name=categories_tree}
			{$pp = [35,36,37,38]}
			{if $categories}
			<ul>
			{foreach $categories as $c}
				{* Показываем только видимые категории *}
				{if $c->visible}
					<li><a href="{if in_array($c->id, $pp)}{else}catalog{/if}/{$c->url}" data-category="{$c->id}">{if $level > 1}- {/if}{$c->name|escape}</a>
						{if $level == 1}
						{categories_tree categories=$c->subcategories level=$level+1 }
						{/if}
					</li>
				{/if}
			{/foreach}
			{if $level == 1}
			<li><a href="/contact/">Контакты</a></li>
			{/if}
			</ul>
			{/if}
			{/function}
			{categories_tree categories=$categories level=1}
		</div>
	</section>
	
	{if $page->id == 2}
	<section id="slider-box" class="slider-box">
		{get_slides var=slides}
		{if $slides}
			<div class="slider">
				{foreach from=$slides item=slide name=foo}
				<figure>
					{if $slide->link}
					<a href="{$slide->link}" ><img src="files/slider/{$slide->filename}" style="width:100%" /></a>
					{else}
					<img src="files/slider/{$slide->filename}" style="width:100%" />
					{/if}
				</figure>
				{/foreach}
			</div>
		{/if}
	</section>
	{/if}
	
	<div class="container"> 
		<div class="row">
			<div class="col-md-12">
				{$content}
			</div>
		</div>
	</div>
	
	<section class="we-are">
		<div class="container">
			<div class="we"><div><p><span>ООО "Апласт"</span> Конструкционные пластики собственного производства. Оптовая и розничная торговля. Гарантия. Доставка.</p></div><a href="#contacts"><i class="fa fa-envelope-o" aria-hidden="true"></i> Связаться с нами</a></div>
		</div>
	</section>
	
	<section id="contacts" class="contacts">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 contacts-form">
					{if $message_sent}
					<div class="alert alert-success">
						{if $language->code == 'ua'}Ваше повідомлення надіслано{else}Ваше сообщение отправлено{/if}
					</div>
					{else}
					<form class="form bottom_form" method="post" action="/#footer-box">
					{if $error}
					<div class="alert alert-danger">
						{if $language->code == 'ua'}
							{if $error=='empty_name'}
							Введіть ім'я
							{elseif $error=='empty_phone'}
							Введіть номер телефону
							{elseif $error=='empty_text'}
							Введіть повідомлення
							{/if}
						{else}
							{if $error=='empty_name'}
							Введите имя
							{elseif $error=='empty_phone'}
							Введите номер телефона
							{elseif $error=='empty_text'}
							Введите сообщение
							{/if}
						{/if}
					</div>
					{/if}
					
					<input class="text-input" name="name" type="text" placeholder="Ваше имя" value="{$name|escape}"/>
					
					<input class="text-input" name="phone" type="text" placeholder="Ваш телефон" value="{$phone|escape}" />
					
					<input class="text-input" name="email" type="text" placeholder="Ваш email" value="{$email|escape}" />
					
					<textarea class="text-zone" value="{$message|escape}" name="message" placeholder="Текст сообщения">{$message}</textarea>
					
					<input type="submit" name="feedback" class="button" value="Отправить">
					
					</form>
					{/if}
				</div>
				<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 pop-block">
					<div class="contacts-box">
						<div class="address">ул. Военная 20 г. Харьков 61001 Украина (метро "Защитников Украины", бывшая "Площадь Восстания")</div>
						<div class="phones-title">Розничный отдел</div>
						<div class="phones">
							<p>+38 (057) 755-10-46</p>
							<p>+38 (096) 630-26-37</p>
						</div>
						<div class="phones-title">Оптовый отдел</div>
						<div class="phones">
							<p>+38 (057) 712-13-80</p>
							<p>+38 (097) 080-93-22</p>
							<p>+38 (095) 152-17-39</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2565.243057677491!2d36.25438031571472!3d49.9880523794142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a091780f2f03%3A0x5fb2f2caf6a92118!2z0YPQuy4g0JLQvtC10L3QvdCw0Y8sIDIwLCDQpdCw0YDRjNC60L7Qsiwg0KXQsNGA0YzQutC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgNjEwMDA!5e0!3m2!1sru!2sua!4v1580737521937!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0"  allowfullscreen></iframe>
	</section>
	
	<section class="bottom-text">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p>Конструкционные пластики – основной профиль нашей компании. Полиамид, полиацеталь, полиэтилен, полипропилен, поликарбонат, полиэтилентерафталат, полиуретан нашего собственного производства и фторопласт, текстолит заграничных поставщиков всегда есть на складе в большом ассортименте.</p>
					<p>Кроме этого наша компания предлагает изделия из полипропилена нашего производства: бассейны, жироуловители, гальванические ванны и емкости.</p>
					<p>Компания Апласт Харьков занимается комплексными поставками высокоточных систем линейного перемещения HIWIN: линейные направляющие, шарико-винтовые передачи (ШВП), актуаторы, линейные модули. Также комплектующих от других производителей: кабелеукладчики (кабельные цепи, кабель-каналы), эластичные муфты, подшипниковые опоры, цилиндрические направляющие и многое другое.</p>
					<p>За годы развития компания заняла высокую ступень на конкурентном рынке и зарекомендовала себя как надежный партнер и поставщик</p>
				</div>
			</div>
		</div>
	</section>
	
	<footer class="footer">
		<div class="bottom-line"> 
			<div class="container">
				<div class="col-lg-12">
					<ul class="bot-menu">
					{foreach $menu_pages as $p}
						{* Выводим только страницы из первого меню *}
						{if $p->menu_id == 1}
						<li><a href="{$p->url}">{$p->name|escape}</a></li>
						{/if}
					{/foreach}
					</ul>
				</div>
			</div>
		</div>
		<div class="container f-mid">
			<div class="col-md-8 col-xs-6">
				<p>&copy; 2007-2020 Интернет-магазин «Апласт»</p>
			</div>
			<div class="col-md-4 col-xs-6 copy">
				<a href="http://a-style.kh.ua/">Разработка сайта - A-Style</a>
			</div>
		</div>
	</footer>
	
	<script src="templates/{$settings->theme|escape}/js/libs/jquery-1.10.1.min.js"></script>
	<script src="templates/{$settings->theme|escape}/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="templates/{$settings->theme|escape}/js/libs/bootstrap.min.js"></script>
	<script src="templates/{$settings->theme}/js/carousel/slick.min.js"></script>
	
	<script type='text/javascript' src='templates/{$settings->theme|escape}/js/jquery.cookie.js'></script> 
	<script type='text/javascript' src='templates/{$settings->theme|escape}/js/jquery.hoverIntent.minified.js'></script> 
	<script type='text/javascript' src='templates/{$settings->theme|escape}/js/jquery.dcjqaccordion.2.6.min.js'></script> 
	{literal}
	<script type="text/javascript"> 
		$(document).ready(function(){
			  $('.slider').slick({
				autoplay: true,
				arrows: false,
				speed: 1000,
				pauseOnHover: true,
				fade: true,
				cssEase: 'linear',
				touchMove: true,
				dots:true
			  });
		});
		
		$('#deliver').on('change', function() {
			if(this.value == 1)
				$('#del-np').hide(300);
			else
				$('#del-np').show(300);
		});
		
		$('#np_type').on('change', function() {
			if(this.value == 1){
				$('#by_address').hide(300);
				$('#by_branch').show(300);
			}else{
				$('#by_branch').hide(300);
				$('#by_address').show(300);
			}
		});
	</script>
	{/literal}
	<!--[if lt IE 9]>
	<script src="./js/libs/excanvas.compiled.js"></script>
	<![endif]-->
	
	<script src="templates/default/js/jquery-ui.min.js"></script>
	{if $product}
	<script src="templates/default/js/ajax_cart2.js"></script>
	{else}
	<script src="templates/default/js/ajax_cart.js"></script>
	{/if}
	
	<link href="templates/default/css/jquery.fancybox.min.css" rel="stylesheet">
	<script type="text/javascript" src="templates/default/js/jquery.fancybox.min.js"></script>
	<script>
		$('[data-fancybox="gallery"]').fancybox();
	</script>
	
	
	{*literal}
	<script>
	$(document).ready(function(){
		$("#orderModal").modal('show');
	});
	</script>
	{/literal*}
	
	<script type="text/javascript" src="//consultsystems.ru/script/37109/" async charset="utf-8"></script>
</body>
</html>
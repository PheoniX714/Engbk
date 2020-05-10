<?php
/* Smarty version 3.1.32, created on 2020-04-24 23:03:48
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ea34624ccbde0_40114375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1709051b2bf083e3081a6f159887ac83f5d339b5' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/index.tpl',
      1 => 1587736226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cart_informer.tpl' => 1,
  ),
),false)) {
function content_5ea34624ccbde0_40114375 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'categories_tree' => 
  array (
    'compiled_filepath' => '/home/astyle/a-style.kh.ua/dev2/templates/compiled/default/1709051b2bf083e3081a6f159887ac83f5d339b5_0.file.index.tpl.php',
    'uid' => '1709051b2bf083e3081a6f159887ac83f5d339b5',
    'call_name' => 'smarty_template_function_categories_tree_109109725ea34624c101f1_96191494',
  ),
));
$_smarty_tpl->_assignInScope('wrapper', '' ,false ,8);?>

<?php $_smarty_tpl->_assignInScope('canonical', '' ,false ,8);?>

<!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
">
	<meta name="keywords"    content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
    <link rel="icon" href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/favicon.ico">

    <base href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/"/>
    <title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Oswald:400,300,700">
	<link rel="stylesheet" href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/font-awesome.min.css">
	<link rel="stylesheet" href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
	<link rel="stylesheet" href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/carousel/slick.css"/>
		
	<!-- App CSS -->
	<link rel="stylesheet" href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/basic-styles.css">
	<link rel="stylesheet" href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/theme.css">
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
	
	
	<?php echo '<script'; ?>
>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-38434723-1', 'auto');
	  ga('send', 'pageview');

	<?php echo '</script'; ?>
>
	
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
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
						<li><a href="<?php if (!$_smarty_tpl->tpl_vars['language']->value->main) {
echo $_smarty_tpl->tpl_vars['language']->value->code;
}?>/catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
					<a href="/"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/logo.png"></a>
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
							<p><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/add.png"> <a href="#contacts">г.Харьков; <span>ул. Военная 20</span></a></p>
							<p><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/mail.png">  <a href="mailto:info@aplast.com.ua">info@<span>aplast.com.ua</span></a></p>	
							<div class="search">
								<form action="products">
									<button class="button_search" value="" type="submit"><i class="fa fa-search"></i></button>
									<input class="input_search" type="text" name="keyword" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
								</form>
							</div>							
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
					<div id="cart_informer">
												<?php $_smarty_tpl->_subTemplateRender('file:cart_informer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
					</div>
				</div>
			</div>
		</div>
		
	</header>
	
	<section class="top-menu">
		<div class="container">
			
			<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'categories_tree', array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'level'=>1), true);?>

		</div>
	</section>
	
	<?php if ($_smarty_tpl->tpl_vars['page']->value->id == 2) {?>
	<section id="slider-box" class="slider-box">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_slides'][0], array( array('var'=>'slides'),$_smarty_tpl ) );?>

		<?php if ($_smarty_tpl->tpl_vars['slides']->value) {?>
			<div class="slider">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slides']->value, 'slide', false, NULL, 'foo', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
?>
				<figure>
					<?php if ($_smarty_tpl->tpl_vars['slide']->value->link) {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['slide']->value->link;?>
" ><img src="files/slider/<?php echo $_smarty_tpl->tpl_vars['slide']->value->filename;?>
" style="width:100%" /></a>
					<?php } else { ?>
					<img src="files/slider/<?php echo $_smarty_tpl->tpl_vars['slide']->value->filename;?>
" style="width:100%" />
					<?php }?>
				</figure>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		<?php }?>
	</section>
	<?php }?>
	
	<div class="container"> 
		<div class="row">
			<div class="col-md-12">
				<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

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
					<?php if ($_smarty_tpl->tpl_vars['message_sent']->value) {?>
					<div class="alert alert-success">
						<?php if ($_smarty_tpl->tpl_vars['language']->value->code == 'ua') {?>Ваше повідомлення надіслано<?php } else { ?>Ваше сообщение отправлено<?php }?>
					</div>
					<?php } else { ?>
					<form class="form bottom_form" method="post" action="/#footer-box">
					<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
					<div class="alert alert-danger">
						<?php if ($_smarty_tpl->tpl_vars['language']->value->code == 'ua') {?>
							<?php if ($_smarty_tpl->tpl_vars['error']->value == 'empty_name') {?>
							Введіть ім'я
							<?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'empty_phone') {?>
							Введіть номер телефону
							<?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'empty_text') {?>
							Введіть повідомлення
							<?php }?>
						<?php } else { ?>
							<?php if ($_smarty_tpl->tpl_vars['error']->value == 'empty_name') {?>
							Введите имя
							<?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'empty_phone') {?>
							Введите номер телефона
							<?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'empty_text') {?>
							Введите сообщение
							<?php }?>
						<?php }?>
					</div>
					<?php }?>
					
					<input class="text-input" name="name" type="text" placeholder="Ваше имя" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
"/>
					
					<input class="text-input" name="phone" type="text" placeholder="Ваш телефон" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
					
					<input class="text-input" name="email" type="text" placeholder="Ваш email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
					
					<textarea class="text-zone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="message" placeholder="Текст сообщения"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</textarea>
					
					<input type="submit" name="feedback" class="button" value="Отправить">
					
					</form>
					<?php }?>
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
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_pages']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
												<?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id == 1) {?>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
						<?php }?>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
	
	<?php echo '<script'; ?>
 src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/libs/jquery-1.10.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/libs/jquery-ui-1.9.2.custom.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/libs/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/carousel/slick.min.js"><?php echo '</script'; ?>
>
	
	<?php echo '<script'; ?>
 type='text/javascript' src='templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.cookie.js'><?php echo '</script'; ?>
> 
	<?php echo '<script'; ?>
 type='text/javascript' src='templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.hoverIntent.minified.js'><?php echo '</script'; ?>
> 
	<?php echo '<script'; ?>
 type='text/javascript' src='templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.dcjqaccordion.2.6.min.js'><?php echo '</script'; ?>
> 
	
	<?php echo '<script'; ?>
 type="text/javascript"> 
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
	<?php echo '</script'; ?>
>
	
	<!--[if lt IE 9]>
	<?php echo '<script'; ?>
 src="./js/libs/excanvas.compiled.js"><?php echo '</script'; ?>
>
	<![endif]-->
	
	<?php echo '<script'; ?>
 src="templates/default/js/jquery-ui.min.js"><?php echo '</script'; ?>
>
	<?php if ($_smarty_tpl->tpl_vars['product']->value) {?>
	<?php echo '<script'; ?>
 src="templates/default/js/ajax_cart2.js"><?php echo '</script'; ?>
>
	<?php } else { ?>
	<?php echo '<script'; ?>
 src="templates/default/js/ajax_cart.js"><?php echo '</script'; ?>
>
	<?php }?>
	
	<link href="templates/default/css/jquery.fancybox.min.css" rel="stylesheet">
	<?php echo '<script'; ?>
 type="text/javascript" src="templates/default/js/jquery.fancybox.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		$('[data-fancybox="gallery"]').fancybox();
	<?php echo '</script'; ?>
>
	
	
		
	<?php echo '<script'; ?>
 type="text/javascript" src="//consultsystems.ru/script/37109/" async charset="utf-8"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* smarty_template_function_categories_tree_109109725ea34624c101f1_96191494 */
if (!function_exists('smarty_template_function_categories_tree_109109725ea34624c101f1_96191494')) {
function smarty_template_function_categories_tree_109109725ea34624c101f1_96191494(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

			<?php $_smarty_tpl->_assignInScope('pp', array(35,36,37,38));?>
			<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
			<ul>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
								<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
					<li><a href="<?php if (in_array($_smarty_tpl->tpl_vars['c']->value->id,$_smarty_tpl->tpl_vars['pp']->value)) {
} else { ?>catalog<?php }?>/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['level']->value > 1) {?>- <?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
						<?php if ($_smarty_tpl->tpl_vars['level']->value == 1) {?>
						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'categories_tree', array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), true);?>

						<?php }?>
					</li>
				<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php if ($_smarty_tpl->tpl_vars['level']->value == 1) {?>
			<li><a href="/contact/">Контакты</a></li>
			<?php }?>
			</ul>
			<?php }?>
			<?php
}}
/*/ smarty_template_function_categories_tree_109109725ea34624c101f1_96191494 */
}

<?php /* Smarty version Smarty-3.1.18, created on 2017-06-26 02:05:48
         compiled from "/home/astyle/a-style.kh.ua/dev/templates/default/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:497842926594fa527800636-11442285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a1c7546f64ee68c214363416da7037c11763139' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev/templates/default/html/index.tpl',
      1 => 1498431944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '497842926594fa527800636-11442285',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_594fa52790eb00_16786993',
  'variables' => 
  array (
    'config' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'settings' => 0,
    'contact_skype' => 0,
    'contact_icq' => 0,
    'user' => 0,
    'group' => 0,
    'currencies' => 0,
    'c' => 0,
    'currency' => 0,
    'keyword' => 0,
    'pages' => 0,
    'p' => 0,
    'page' => 0,
    'content' => 0,
    'new_products' => 0,
    'last_posts' => 0,
    'post' => 0,
    'all_brands' => 0,
    'b' => 0,
    'site_year' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_594fa52790eb00_16786993')) {function content_594fa52790eb00_16786993($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/astyle/a-style.kh.ua/dev/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head>
	<base href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/"/>
	<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<meta name="keywords"    content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<meta name="viewport" content="width=1040"/>

	
	<link href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/bg/favicon.ico" rel="icon"          type="image/x-icon"/>
	<link href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/bg/favicon.ico" rel="shortcut icon" type="image/x-icon"/>

	
	<script src="js/jquery/jquery.js"  type="text/javascript"></script>

	<?php if ($_SESSION['admin']=='admin') {?>
	<script src ="js/admintooltip/admintooltip.js" type="text/javascript"></script>
	<link   href="js/admintooltip/css/admintooltip.css" rel="stylesheet" type="text/css" />
	<?php }?>

	
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

	
	<script type="text/javascript" src="js/ctrlnavigate.js"></script>

	
	<script src="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery-ui.min.js"></script>
	<script src="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/ajax_cart.js"></script>

	
	<script src="/js/baloon/js/baloon.js" type="text/javascript"></script>
	<link   href="/js/baloon/css/baloon.css" rel="stylesheet" type="text/css" />
	<!-- www.Simpla-Template.ru / Oформление великолепных интернет магазинов. E-mail:help@simpla-template.ru | Skype:SimplaTemplate /-->
	
	<script src="js/autocomplete/jquery.autocomplete-min.js" type="text/javascript"></script>
	<script>
	$(function() {
		//  Автозаполнитель поиска
		$(".input_search").autocomplete({
			serviceUrl:'ajax/search_products.php',
			minChars:1,
			noCache: false,
			onSelect:
				function(value, data){
					 $(".input_search").closest('form').submit();
				},
			fnFormatResult:
				function(value, data, currentValue){
					var reEscape = new RegExp('(\\' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\'].join('|\\') + ')', 'g');
					var pattern = '(' + currentValue.replace(reEscape, '\\$1') + ')';
	  				return value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
				}
		});
	});
	</script>
	

	
	<script src="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/scrolltopcontrol.js"></script>
</head>
<body>
<div id="top_bg"><div id="wrapper">

	<span class='header_label'></span>
	<div id="header">

		<div id="top_line">
		<a class='top_01 hover_mouse' href="ссылка_на_страницу_с_описаниями_доставки"></a>
		<a class='top_05 hover_mouse' href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/#new_products"></a>
		<a class='top_04 hover_mouse' href="ссылка_на_страницу_с_графиком_работы_и_контактами"></a>
		<a class='top_03 hover_mouse' href="ссылка_на_элемент_в_описании_о_самовывозе_АКЦЕНТ_на_этом"></a>
		<a class='top_02 hover_mouse' href="ссылка_на_страницу_с_описанием_гарантий_или_способов_возврата"></a>
		</div>

		<a href="" class='logo' title='<?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
'></a>

		<div id="contacts">
			<?php if ($_smarty_tpl->tpl_vars['contact_skype']->value) {?>
			<p><script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
			<a href="skype:<?php echo $_smarty_tpl->tpl_vars['contact_skype']->value;?>
?chat" title='Открыть окно звонка (сообщения) в скайпе' class='link_2'><img src="http://mystatus.skype.com/smallicon/<?php echo $_smarty_tpl->tpl_vars['contact_skype']->value;?>
"/><?php echo $_smarty_tpl->tpl_vars['contact_skype']->value;?>
</a></p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['contact_icq']->value) {?><p><img border="0" src="http://icq-rus.com/icq/3/<?php echo $_smarty_tpl->tpl_vars['contact_icq']->value;?>
.gif"/><?php echo $_smarty_tpl->tpl_vars['contact_icq']->value;?>
</p><?php }?>
		</div>

		<div id="user_box_top">
			<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
			<a href="user" class='username color'><?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
</a><?php if ($_smarty_tpl->tpl_vars['group']->value->discount>0) {?><br /><b class='color' style='text-transform:uppercase;'>Ваша скидка - <?php echo $_smarty_tpl->tpl_vars['group']->value->discount;?>
%</b><?php }?>
			&nbsp;|&nbsp;&nbsp;<a id="logout" href="user/logout" class='link_2'>Выход</a>
			<?php } else { ?><br /><b class='color'>Добро пожаловать,</b>&nbsp;&nbsp;<a id=login href="user/login" class='link_2'>Вход</a>&nbsp;|&nbsp;<a id="register" href="user/register" class='link_2'>Регистрация</a>
			<?php }?>
		</div>

		<?php if (count($_smarty_tpl->tpl_vars['currencies']->value)>1) {?>
			<form name="currency" method="post" id="currencies">
			Валюта:&nbsp;
			<select onchange="location = this.value;">
			<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['c']->value->enabled) {?><option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('currency_id'=>$_smarty_tpl->tpl_vars['c']->value->id),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['c']->value->id==$_smarty_tpl->tpl_vars['currency']->value->id) {?>selected<?php }?>>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
&nbsp;&nbsp;</option><?php }?><?php } ?>
			</select>
			</form>
		<?php }?>

		<form action="products" id="search">
		<input class="button_search" value="" type="submit" />
		<input class="input_search" type="text" name="keyword" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Поиск товара по названию"/>
		</form>
		<div id="cart_informer"><?php echo $_smarty_tpl->getSubTemplate ('cart_informer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
		<ul id="section_menu">
		<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==1) {?><li <?php if ($_smarty_tpl->tpl_vars['page']->value&&$_smarty_tpl->tpl_vars['page']->value->id==$_smarty_tpl->tpl_vars['p']->value->id) {?>class="selected"<?php }?>><a data-page="<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
" href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li><?php }?>
		<?php } ?>
		</ul>

	</div>

	<div id="content-container">

		<div id="content_right">
		
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		</div>

		<div id="content_left">

			<div id="nav-container">
			
			</div>

			

			<ul id='info_block'>
				<h2>Заказы онлайн</h2>
				<p>Если Вы не уверены в выборе или сомневаетесь, то наши специалисты бесплатно проконсультируют Вас по любым вопросам, связанным с нашими предложениями</p>
				<p>Вы всегда можете задать вопрос по телефону:</p><br />
				<p>Рабочие дни: 9:00-22:00<br />Выходные дни: 9:00-18:00</p><br />
				<p class='telnumber'>+7 (000) 000-00-00</p>
				<p class='telnumber'>+7 (111) 111-11-11</p>
			</ul>

			<?php if ($_smarty_tpl->tpl_vars['page']->value&&$_smarty_tpl->tpl_vars['page']->value->url=='') {?>
			<?php } else { ?>
				
				<?php if ($_smarty_tpl->tpl_vars['new_products']->value) {?>
				<ul id="last_products">
					<h2>Новые поступления:</h2>
					
				</ul>
				<?php }?>
			<?php }?>

			
			<?php if ($_smarty_tpl->tpl_vars['last_posts']->value) {?>
				<ul id="all_blog">
				<h2>Новости <a href="blog">в блоге</a></h2>
				<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['last_posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
				<li>
				<p class='data' data-post="<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>
</p>
				<a href="blog/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
				</li>
				<?php } ?>
				</ul>
			<?php }?>

			
			<?php if ($_smarty_tpl->tpl_vars['all_brands']->value) {?>
				<ul id="all_brands">
				<h2>Бренды каталога</h2>
				<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
				<a href="brands/<?php echo $_smarty_tpl->tpl_vars['b']->value->url;?>
" class='hover_mouse' title='Выбрать из каталога все предложения от <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'><?php if ($_smarty_tpl->tpl_vars['b']->value->image) {?><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value->brands_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['b']->value->image;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['b']->value->name;?>
<?php }?></a>
				<?php } ?>
				</ul>
			<?php }?>
		</div>
		<div class="clear_dot"></div>
		<div id="moneyline"><img src="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/images_theme/money_line.png" alt="Мы принимаем к оплате"></div>
	</div>
</div></div>

<div id="footer-container"><div id="footer">

	<ul class='footer_menu'>
		<h2>О нашем каталоге</h2>
		<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==1) {?>
		<li><a data-page="<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
" href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
		<?php }?><?php } ?>
	</ul>

	<ul class='footer_menu'>
		<h2>Информация для покупателей</h2>
		<li><a href="">Статья или обзор о товаре 001</a></li>
		<li><a href="">Статья или обзор о товаре 002</a></li>
		<li><a href="">Статья или обзор о товаре 003</a></li>
		<li><a href="">Статья или обзор о товаре 004</a></li>
	</ul>

	<ul class='footer_menu' style='margin-right:0;'>
		<h2>Это может быть интересно</h2>
		<li><a href="">Статья или обзор о товаре 001</a></li>
		<li><a href="">Статья или обзор о товаре 002</a></li>
		<li><a href="">Статья или обзор о товаре 003</a></li>
	</ul>

	<div class="clear_dot"></div>

	<p class="counters right">

		<!-- Заменить два изображения счетчиков снизу кодом своих счетчиков. Если используете код метрики Яндекса - вставлять МЕЖДУ тэгами код метрики /-->
		<!-- это просто пример изображения счетчика /--><img src="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/temp_counters.png" alt=""/>
		<!-- это просто пример изображения счетчика /--><img src="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/temp_counters.png" alt=""/>

	</p>

	<p>Данный информационный ресурс не является публичной офертой. Наличие и стоимость товаров уточняйте по телефону. Производители оставляют за собой право изменять технические характеристики и внешний вид товаров без предварительного уведомления.</p>
	<p><b><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
 © <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['site_year']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if (smarty_modifier_date_format(time(),"%Y")==$_tmp1) {?><?php echo $_smarty_tpl->tpl_vars['site_year']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['site_year']->value;?>
 - <?php echo smarty_modifier_date_format(time(),"%Y");?>
<?php }?></b></p>
</div></div>
</body></html><?php }} ?>

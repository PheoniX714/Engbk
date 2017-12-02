<?php /* Smarty version Smarty-3.1.18, created on 2017-11-30 17:31:45
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169531546459fb38bea2edc9-48681423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df011e5f9bebcedf58fabf9b9aa5059df52b3a37' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/index.tpl',
      1 => 1512055903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169531546459fb38bea2edc9-48681423',
  'function' => 
  array (
    'categories_tree' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59fb38beb5eb98_47098307',
  'variables' => 
  array (
    'config' => 0,
    'settings' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'og_type' => 0,
    'og_image' => 0,
    'meta_keywords' => 0,
    'Speed_Insights' => 0,
    'add_css' => 0,
    'menu_pages' => 0,
    'p' => 0,
    'language' => 0,
    'categories_men' => 0,
    'categories' => 0,
    'level' => 0,
    'c' => 0,
    'category' => 0,
    'categories_1' => 0,
    'categories_2' => 0,
    'categories_women' => 0,
    'keyword' => 0,
    'languages' => 0,
    'l' => 0,
    'content' => 0,
    'add_script' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fb38beb5eb98_47098307')) {function content_59fb38beb5eb98_47098307($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ru">
  <head>
	<base href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/favicon.ico">
    <title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
	<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<meta property="og:site_name" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
">
    <meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
<?php echo $_SERVER['REQUEST_URI'];?>
">
	<meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<?php if ($_smarty_tpl->tpl_vars['og_type']->value) {?><meta property="og:type" content="<?php echo $_smarty_tpl->tpl_vars['og_type']->value;?>
"><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['og_image']->value) {?><meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['og_image']->value;?>
"><?php }?>
	<meta name="keywords"    content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<link href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/<?php if ($_smarty_tpl->tpl_vars['Speed_Insights']->value) {?>bootstrap.min.css<?php } else { ?>bootstrap-pagespeed.css<?php }?>" rel="stylesheet">
    <link href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/theme.css" rel="stylesheet">
	<?php if ($_smarty_tpl->tpl_vars['Speed_Insights']->value) {?><link rel="stylesheet" href="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/iview.css" /><?php }?>
	<?php echo $_smarty_tpl->tpl_vars['add_css']->value;?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<?php if ($_smarty_tpl->tpl_vars['Speed_Insights']->value) {?><script async src="https://www.googletagmanager.com/gtag/js?id=UA-35760642-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-35760642-1');
	</script><?php }?>
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
				  <ul class="nav navbar-nav"><?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==2) {?><li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?><?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a></li><?php }?><?php } ?><?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==1) {?><li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?><?php echo $_smarty_tpl->tpl_vars['p']->value->pre_url;?>
<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a></li><?php }?><?php } ?></ul>
				</div>
			  </div>
			</div>
		</div>			
	</div>
	<header class="header">	
		<div class="container">
			<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 logo">
				<a href="/"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/logo.png"></a>
			</div>
			<div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
				<ul class="top-menu top-menu-line-1"><?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==1) {?><li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?><?php echo $_smarty_tpl->tpl_vars['p']->value->pre_url;?>
<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a></li><?php }?><?php } ?></ul><ul class="top-menu top-menu-line-2"><?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==2) {?><?php if ($_smarty_tpl->tpl_vars['p']->value->id==39) {?><li class="holder"><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?><?php echo $_smarty_tpl->tpl_vars['p']->value->pre_url;?>
<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a><?php if ($_smarty_tpl->tpl_vars['categories_men']->value) {?><div class="hidden-md"><div class="drop-menu"><?php if (!function_exists('smarty_template_function_categories_tree')) {
    function smarty_template_function_categories_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['categories_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php if ($_smarty_tpl->tpl_vars['categories']->value) {?><?php if ($_smarty_tpl->tpl_vars['level']->value==0) {?><?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?><div class="menu-container"><b><a<?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>class="selected"<?php }?> href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['c']->value->visible_name) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a></b><?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>'level'+1));?>
</div><?php }?><?php } ?><?php } else { ?><ul class="menu-ul"><?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?><li><a<?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>class="selected"<?php }?> href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['c']->value->visible_name) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a><?php if ($_smarty_tpl->tpl_vars['level']->value==0) {?><?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>'level'+1));?>
<?php }?></li><?php }?><?php } ?></ul><?php }?><?php }?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>
<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_men']->value,'level'=>0));?>
<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_1']->value,'level'=>0));?>
<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_2']->value,'level'=>0));?>
</div></div><?php }?></li><?php } elseif ($_smarty_tpl->tpl_vars['p']->value->id==40) {?><li class="holder"><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?><?php echo $_smarty_tpl->tpl_vars['p']->value->pre_url;?>
<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a><?php if ($_smarty_tpl->tpl_vars['categories_women']->value) {?><div class="hidden-md"><div class="drop-menu"><?php if (!function_exists('smarty_template_function_categories_tree')) {
    function smarty_template_function_categories_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['categories_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php if ($_smarty_tpl->tpl_vars['categories']->value) {?><?php if ($_smarty_tpl->tpl_vars['level']->value==0) {?><?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?><div class="menu-container"><b><a<?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>class="selected"<?php }?> href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['c']->value->visible_name) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a></b><?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>'level'+1));?>
</div><?php }?><?php } ?><?php } else { ?><ul class="menu-ul"><?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?><li><a<?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>class="selected"<?php }?> href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['c']->value->visible_name) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a><?php if ($_smarty_tpl->tpl_vars['level']->value==0) {?><?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>'level'+1));?>
<?php }?></li><?php }?><?php } ?></ul><?php }?><?php }?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>
<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_women']->value,'level'=>0));?>
<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_1']->value,'level'=>0));?>
<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_2']->value,'level'=>0));?>
</div></div><?php }?></li><?php } else { ?><li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?><?php echo $_smarty_tpl->tpl_vars['p']->value->pre_url;?>
<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a></li><?php }?><?php }?><?php } ?></ul>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 pd0">
				<form method="get" action="products">
					<div id="search">
						<div id="search-box">
							<input class="search-i" type="text" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" name="keyword" tabindex="1">
							<input class="search-b" type="submit" value="Поиск" tabindex="2">
							<div class="clear"></div>
						</div>
					</div>
				</form>
				<div class="phone"><a href="tel:+38 (096) 00-00-534">+38 (096) 00-00-534</a> <img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/ar-dwn.png">
					<div class="phone-cont"><a href="tel:+38 (096) 00-00-534">+38 (095) 00-00-534</a></div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
				<div class="languages">
					<img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/lang.png">
					<div class="lang-cont">
						<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?><p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('lang'=>$_smarty_tpl->tpl_vars['l']->value->code),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value->id==$_smarty_tpl->tpl_vars['l']->value->id) {?>class="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['l']->value->name;?>
</a></p><?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
				<div id="cart_informer"><?php echo $_smarty_tpl->getSubTemplate ('cart_informer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
			</div>
		</div> <!-- /container -->
	</header>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

	<footer class="footer">
		<div class="container">
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
				<ul class="f-menu f-menu-col-1">
					<li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>page/o-magazine">О магазине</a></li>
					<li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>page/predlozheniya-ot-privatbanka">Рассрочка</a></li>
					<li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>page/kontakty">Контакты</a></li>
					<li></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
				<ul class="f-menu f-menu-col-1">
					<li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>page/dostavka-i-oplata">Доставка и оплата</a></li>
					<li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>page/obmen">Обмен</a></li>
					<li><a href="<?php if ($_smarty_tpl->tpl_vars['language']->value->id!=1) {?><?php echo $_smarty_tpl->tpl_vars['language']->value->code;?>
/<?php }?>news/">Публикации</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-4 hidden-xs">
				<ul class="f-menu f-menu-col-1">
					
				</ul>
			</div>
			<div class="clear visible-sm"></div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pay-cards">
				<img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/pp.png"> <img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/mc.png"> <img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/vs.png">
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
    <script src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.min.js"></script>
    <script src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/bootstrap.min.js"></script>
	<?php if ($_smarty_tpl->tpl_vars['Speed_Insights']->value) {?><script src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/raphael-min.js"></script>
	<script src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.easing.js"></script>
	<script src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/iview.js"></script>
	
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
	
	<script src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery-ui.min.js"></script>
    <script src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/js/ajax_cart.js"></script>
	<?php echo $_smarty_tpl->tpl_vars['add_script']->value;?>
<?php }?>
  </body>
</html><?php }} ?>

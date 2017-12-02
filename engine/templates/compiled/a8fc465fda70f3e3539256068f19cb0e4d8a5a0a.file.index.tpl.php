<?php /* Smarty version Smarty-3.1.18, created on 2017-11-28 18:34:32
         compiled from "engine/templates/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8581605415a06d8ac350e51-80757984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8fc465fda70f3e3539256068f19cb0e4d8a5a0a' => 
    array (
      0 => 'engine/templates/html/index.tpl',
      1 => 1511886869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8581605415a06d8ac350e51-80757984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a06d8ac44ce39_15050924',
  'variables' => 
  array (
    'meta_title' => 0,
    'page_additional_css' => 0,
    'sm_groupe' => 0,
    'new_orders_counter' => 0,
    'sm_item' => 0,
    'menus' => 0,
    'm' => 0,
    'content' => 0,
    'engine_version' => 0,
    'page_additional_js' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06d8ac44ce39_15050924')) {function content_5a06d8ac44ce39_15050924($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/astyle/mdk.ua/www/Smarty/libs/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->tpl_vars['engine_version'] = new Smarty_variable("2.17.1128", null, 0);?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="./templates/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
	<!-- Theme style -->
	<link rel="stylesheet" href="./templates/css/all-skins.css">
	<?php echo $_smarty_tpl->tpl_vars['page_additional_css']->value;?>


	<link rel="stylesheet" href="./templates/css/theme.css">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="./" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="./templates/img/logo_ico_45x45.png" width="45px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="./templates/img/logo_ico_32x32.png"> <b>Fast</b>CMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
			<li class="dropdown navbar-profile"><a href="/" target="_blank"><i class="fa fa-reply"></i>&nbsp;&nbsp;На сайт</a></li>
			<li class="dropdown navbar-profile"><a href="index.php?action=logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Выход</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
	 <div id="left-menu">
      <ul class="sidebar-menu">
        <li class="header">ОСНОВНОЕ МЕНЮ</li>
		<li class="<?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value=='orders') {?>active<?php }?>"><a href="./index.php?module=OrdersAdmin"><i class="fa fa-shopping-cart"></i> Заказы <?php if ($_smarty_tpl->tpl_vars['new_orders_counter']->value) {?><span class="pull-right-container"><small class="label pull-right bg-green"><?php echo $_smarty_tpl->tpl_vars['new_orders_counter']->value;?>
</small></span><?php }?></a></li>
		<li class="treeview <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value=='catalog') {?>active<?php }?>">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Каталог товаров</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='products') {?>class="active"<?php }?>><a href="./index.php?module=ProductsAdmin"><i class="fa fa-th"></i> Список товаров</a></li>
			<li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='product-categories') {?>class="active"<?php }?>><a href="./index.php?module=CategoriesAdmin"><i class="fa fa-list"></i> Категории товаров</a></li>
			<li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='products-groups') {?>class="active"<?php }?>><a href="./index.php?module=ProductsGroupsAdmin"><i class="fa fa-list-ol"></i> Группы товаров</a></li>
			<li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='product-features') {?>class="active"<?php }?>><a href="./index.php?module=FeaturesAdmin"><i class="fa fa-filter"></i> Свойства товаров</a></li>
			<li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='products-import') {?>class="active"<?php }?>><a href="./index.php?module=ProductsImportAdmin"><i class="fa fa-upload"></i> Импорт товаров</a></li>
          </ul>
        </li>
		<li class="treeview <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value=='pages') {?>active<?php }?>">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Страницы</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=="menu_".((string)$_smarty_tpl->tpl_vars['m']->value->id)) {?>class="active"<?php }?>><a href="./index.php?module=PagesAdmin&menu_id=<?php echo $_smarty_tpl->tpl_vars['m']->value->id;?>
"><i class="fa fa-file-text"></i> <?php echo $_smarty_tpl->tpl_vars['m']->value->name;?>
</a></li>
			<?php } ?>
            <!--<li><a href="./index.php?module=AddMenu"><i class="fa fa-plus text-green"></i> Добавить меню</a></li>-->
          </ul>
        </li>
		<li class="treeview <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value=='news') {?>active<?php }?>">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Новости</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='news') {?>class="active"<?php }?>><a href="./index.php?module=NewsAdmin"><i class="fa fa-newspaper-o"></i> Список новостей</a></li>
          </ul>
        </li>
		<li class="<?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value=='slider') {?>active<?php }?>"><a href="./index.php?module=SliderAdmin"><i class="fa fa-picture-o"></i> Слайдер</a></li>
		<!-- <li class="treeview <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value=='gallery') {?>active<?php }?>">
          <a href="#">
            <i class="fa fa-camera"></i> <span>Галерея</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='gallery_categories') {?>class="active"<?php }?>><a href="./index.php?module=GalleryCategoriesAdmin"><i class="fa fa-camera"></i> Список категорий</a></li>
			<li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='gallery_albums') {?>class="active"<?php }?>><a href="./index.php?module=GalleryAlbumsAdmin"><i class="fa fa-camera"></i> Список альбомов</a></li>
          </ul>
        </li>		 -->
		<li class="treeview <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value=='settings') {?>active<?php }?>">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Настройки</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='settings') {?>class="active"<?php }?>><a href="./index.php?module=SettingsAdmin"><i class="fa fa-cog"></i> Настройки сайта</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='languages') {?>class="active"<?php }?>><a href="./index.php?module=LanguagesAdmin"><i class="fa fa-language"></i> Мультиязычность</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='currency') {?>class="active"<?php }?>><a href="./index.php?module=CurrencyAdmin"><i class="fa fa-money"></i> Валюты</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['sm_item']->value=='managers') {?>class="active"<?php }?>><a href="./index.php?module=ManagersAdmin"><i class="fa fa-user-secret"></i> Менеджеры</a></li>
          </ul>
        </li>
      </ul>
	 </div>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>FastCMS</b> <?php echo $_smarty_tpl->tpl_vars['engine_version']->value;?>

    </div>
    <strong>&copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
 <a href='http://a-style.kh.ua'>Разработка A-Style</a>.</strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="./templates/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="./templates/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="./templates/js/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="./templates/js/plugins/fastclick/fastclick.js"></script>

<?php echo $_smarty_tpl->tpl_vars['page_additional_js']->value;?>


<script src="./templates/js/app.js"></script>
</body>

</html><?php }} ?>

{$engine_version = "2.17.1128"}

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{$meta_title}</title>
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
	{$page_additional_css}

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
		<li class="{if $sm_groupe == 'orders'}active{/if}"><a href="./index.php?module=OrdersAdmin"><i class="fa fa-shopping-cart"></i> Заказы {if $new_orders_counter}<span class="pull-right-container"><small class="label pull-right bg-green">{$new_orders_counter}</small></span>{/if}</a></li>
		<li class="treeview {if $sm_groupe == 'catalog'}active{/if}">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Каталог товаров</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li {if $sm_item == 'products'}class="active"{/if}><a href="./index.php?module=ProductsAdmin"><i class="fa fa-th"></i> Список товаров</a></li>
			<li {if $sm_item == 'product-categories'}class="active"{/if}><a href="./index.php?module=CategoriesAdmin"><i class="fa fa-list"></i> Категории товаров</a></li>
			<li {if $sm_item == 'products-groups'}class="active"{/if}><a href="./index.php?module=ProductsGroupsAdmin"><i class="fa fa-list-ol"></i> Группы товаров</a></li>
			<li {if $sm_item == 'product-features'}class="active"{/if}><a href="./index.php?module=FeaturesAdmin"><i class="fa fa-filter"></i> Свойства товаров</a></li>
			<li {if $sm_item == 'products-import'}class="active"{/if}><a href="./index.php?module=ProductsImportAdmin"><i class="fa fa-upload"></i> Импорт товаров</a></li>
          </ul>
        </li>
		<li class="treeview {if $sm_groupe == 'pages'}active{/if}">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Страницы</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			{foreach $menus as $m}
            <li {if $sm_item == "menu_{$m->id}"}class="active"{/if}><a href="./index.php?module=PagesAdmin&menu_id={$m->id}"><i class="fa fa-file-text"></i> {$m->name}</a></li>
			{/foreach}
            <!--<li><a href="./index.php?module=AddMenu"><i class="fa fa-plus text-green"></i> Добавить меню</a></li>-->
          </ul>
        </li>
		<li class="treeview {if $sm_groupe == 'news'}active{/if}">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Новости</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li {if $sm_item == 'news'}class="active"{/if}><a href="./index.php?module=NewsAdmin"><i class="fa fa-newspaper-o"></i> Список новостей</a></li>
          </ul>
        </li>
		<li class="{if $sm_groupe == 'slider'}active{/if}"><a href="./index.php?module=SliderAdmin"><i class="fa fa-picture-o"></i> Слайдер</a></li>
		<!-- <li class="treeview {if $sm_groupe == 'gallery'}active{/if}">
          <a href="#">
            <i class="fa fa-camera"></i> <span>Галерея</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li {if $sm_item == 'gallery_categories'}class="active"{/if}><a href="./index.php?module=GalleryCategoriesAdmin"><i class="fa fa-camera"></i> Список категорий</a></li>
			<li {if $sm_item == 'gallery_albums'}class="active"{/if}><a href="./index.php?module=GalleryAlbumsAdmin"><i class="fa fa-camera"></i> Список альбомов</a></li>
          </ul>
        </li>		 -->
		<li class="treeview {if $sm_groupe == 'settings'}active{/if}">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Настройки</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li {if $sm_item == 'settings'}class="active"{/if}><a href="./index.php?module=SettingsAdmin"><i class="fa fa-cog"></i> Настройки сайта</a></li>
            <li {if $sm_item == 'languages'}class="active"{/if}><a href="./index.php?module=LanguagesAdmin"><i class="fa fa-language"></i> Мультиязычность</a></li>
            <li {if $sm_item == 'currency'}class="active"{/if}><a href="./index.php?module=CurrencyAdmin"><i class="fa fa-money"></i> Валюты</a></li>
            <li {if $sm_item == 'managers'}class="active"{/if}><a href="./index.php?module=ManagersAdmin"><i class="fa fa-user-secret"></i> Менеджеры</a></li>
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
	{$content}
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>FastCMS</b> {$engine_version}
    </div>
    <strong>&copy; {$smarty.now|date_format:"%Y"} <a href='http://a-style.kh.ua'>Разработка A-Style</a>.</strong> 
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

{$page_additional_js}

<script src="./templates/js/app.js"></script>
</body>

</html>
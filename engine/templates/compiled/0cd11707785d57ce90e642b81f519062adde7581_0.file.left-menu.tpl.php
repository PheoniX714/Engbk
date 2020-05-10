<?php
/* Smarty version 3.1.32, created on 2020-05-08 17:18:41
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/left-menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb56a4169bb21_54179545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cd11707785d57ce90e642b81f519062adde7581' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/left-menu.tpl',
      1 => 1588598166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb56a4169bb21_54179545 (Smarty_Internal_Template $_smarty_tpl) {
?><aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
	
		<div class="aside-content bg-primary-700 text-auto">

			<div class="aside-toolbar">

				<div class="logo">
					<img src="./templates/img/logo-32.png">
					<span class="logo-text">FastCMS</span>
				</div>

				<button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
					<i class="icon icon-backburger"></i>
				</button>

			</div>

			<ul class="nav flex-column" id="sidenav" data-children=".nav-item">

				<li class="subheader">
					<span>ОСНОВНОЕ МЕНЮ</span>
				</li>
				<?php if (in_array('orders',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
				<li class="nav-item" role="tab" id="heading-orders">
					<a class="nav-link ripple with-arrow <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value != 'orders') {?>collapsed<?php }?>" data-toggle="collapse" data-target="#collapse-orders" href="#" aria-expanded="false" aria-controls="collapse-orders">
						<i class="icon s-4 icon-cart"></i>
						<span>Заказы</span>
					</a>
					<ul id="collapse-orders" class="collapse <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value == 'orders') {?>show<?php }?>" role="tabpanel" aria-labelledby="heading-orders" data-children=".nav-item">
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == '0') {?>active<?php }?> ripple " href="./index.php?module=OrdersAdmin&status=0" data-url="./index.php?module=OrdersAdmin&status=0">
								<span>Новые</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == '1') {?>active<?php }?> ripple " href="./index.php?module=OrdersAdmin&status=1" data-url="./index.php?module=OrdersAdmin&status=1">
								<span>Принятые</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == '2') {?>active<?php }?> ripple " href="./index.php?module=OrdersAdmin&status=2" data-url="./index.php?module=OrdersAdmin&status=2">
								<span>Выполненые</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == '3') {?>active<?php }?> ripple " href="./index.php?module=OrdersAdmin&status=3" data-url="./index.php?module=OrdersAdmin&status=3">
								<span>Удаленные</span>
							</a>
						</li>

					</ul>
				</li>
				<?php }?>
				<?php if (in_array('products',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
				<li class="nav-item" role="tab" id="heading-products">
					<a class="nav-link ripple with-arrow <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value != 'products') {?>collapsed<?php }?>" data-toggle="collapse" data-target="#collapse-products" href="#" aria-expanded="false" aria-controls="collapse-products">
						<i class="icon s-4 icon-microsoft"></i>
						<span>Каталог товаров</span>
					</a>
					<ul id="collapse-products" class="collapse <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value == 'products') {?>show<?php }?>" role="tabpanel" aria-labelledby="heading-products" data-children=".nav-item">
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'products') {?>active<?php }?> ripple " href="./index.php?module=ProductsAdmin" data-url="./index.php?module=ProductsAdmin">
								<span>Список товаров</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'categories') {?>active<?php }?> ripple" href="./index.php?module=CategoriesAdmin" data-url="./index.php?module=CategoriesAdmin">
								<span>Категории товаров</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'features') {?>active<?php }?> ripple" href="./index.php?module=FeaturesAdmin" data-url="./index.php?module=FeaturesAdmin">
								<span>Свойства товаров</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'brands') {?>active<?php }?> ripple" href="./index.php?module=BrandsAdmin" data-url="./index.php?module=BrandsAdmin">
								<span>Бренды</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'import') {?>active<?php }?> ripple" href="./index.php?module=ProductsImportAdmin" data-url="./index.php?module=ProductsImportAdmin">
								<span>Импорт товаров</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'export') {?>active<?php }?> ripple" href="./index.php?module=ProductsExportAdmin" data-url="./index.php?module=ProductsExportAdmin">
								<span>Экспорт товаров</span>
							</a>
						</li>
					</ul>
				</li>
				<?php }?>
				<?php if (in_array('news',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
				<li class="nav-item" role="tab" id="heading-news">

					<a class="nav-link ripple with-arrow <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value != 'news') {?>collapsed<?php }?>" data-toggle="collapse" data-target="#collapse-news" href="#" aria-expanded="false" aria-controls="collapse-ecommerce">

						<i class="icon s-4 icon-newspaper"></i>

						<span>Новости</span>
					</a>
					<ul id="collapse-news" class="collapse bg-primary-500 <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value == 'news') {?>show<?php }?>" role="tabpanel" aria-labelledby="heading-news" data-children=".nav-item">

						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'news') {?>active<?php }?> ripple " href="./index.php?module=NewsAdmin" data-url="./index.php?module=NewsAdmin">
								<span>Список новостей</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'news_categories') {?>active<?php }?> ripple " href="./index.php?module=NewsCategoriesAdmin" data-url="./index.php?module=NewsCategoriesAdmin">
								<span>Категории новостей</span>
							</a>
						</li>
						
					</ul>
				</li>
				<?php }?>
				<?php if (in_array('pages',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
				<li class="nav-item">
					<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value == 'site_menu') {?>active<?php }?> ripple " href="./index.php?module=SiteMenusAdmin" data-url="./index.php?module=SiteMenusAdmin">
						<i class="icon s-4 icon-menu"></i>
						<span>Меню сайта</span>
					</a>
				</li>
				<?php }?>
				<?php if (in_array('pages',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
				<li class="nav-item" role="tab" id="heading-pages">

					<a class="nav-link ripple with-arrow <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value != 'pages') {?>collapsed<?php }?>" data-toggle="collapse" data-target="#collapse-pages" href="#" aria-expanded="false" aria-controls="collapse-pages">

						<i class="icon s-4 icon-file-multiple"></i>

						<span>Статические страницы</span>
					</a>
					<ul id="collapse-pages" class="collapse bg-primary-500 <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value == 'pages') {?>show<?php }?>" role="tabpanel" aria-labelledby="heading-pages" data-children=".nav-item">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menus']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
						<li class="nav-item">
							<a class='nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == "menu_".((string)$_smarty_tpl->tpl_vars['m']->value->id)) {?>active<?php }?> ripple' href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'PagesAdmin','menu_id'=>$_smarty_tpl->tpl_vars['m']->value->id),$_smarty_tpl ) );?>
" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'PagesAdmin','menu_id'=>$_smarty_tpl->tpl_vars['m']->value->id),$_smarty_tpl ) );?>
">
								<span><?php echo $_smarty_tpl->tpl_vars['m']->value->name;?>
</span>
							</a>
						</li>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>						
					</ul>
				</li>
				<?php }?>
				<?php if (in_array('slider',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>			
				<li class="nav-item">
					<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value == 'slider') {?>active<?php }?> ripple " href="./index.php?module=SliderAdmin" data-url="./index.php?module=SliderAdmin">
						<i class="icon s-4 icon-picture"></i>
						<span>Слайдер</span>
					</a>
				</li>
				<?php }?>
				<?php if (in_array('settings',$_smarty_tpl->tpl_vars['manager']->value->permissions) || in_array('languages',$_smarty_tpl->tpl_vars['manager']->value->permissions) || in_array('managers',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
				<li class="nav-item" role="tab" id="heading-settings">
					<a class="nav-link ripple with-arrow <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value != 'settings') {?>collapsed<?php }?>" data-toggle="collapse" data-target="#collapse-settings" href="#" aria-expanded="false" aria-controls="collapse-ecommerce">
						<i class="icon s-4 icon-settings"></i>
						<span>Настройки</span>
					</a>
					<ul id="collapse-settings" class="collapse bg-primary-500 <?php if ($_smarty_tpl->tpl_vars['sm_groupe']->value == 'settings') {?>show<?php }?>" role="tabpanel" aria-labelledby="heading-settings" data-children=".nav-item">
						<?php if (in_array('settings',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'settings') {?>active<?php }?> ripple " href="./index.php?module=SettingsAdmin" data-url="./index.php?module=SettingsAdmin">
								<span>Настройки сайта</span>
							</a>
						</li>
						<?php }?>
						<?php if (in_array('languages',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'languages') {?>active<?php }?> ripple " href="./index.php?module=LanguagesAdmin" data-url="./index.php?module=LanguagesAdmin">
								<span>Языки</span>
							</a>
						</li>
						<?php }?>
						<?php if (in_array('managers',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?>
						<li class="nav-item">
							<a class="nav-link <?php if ($_smarty_tpl->tpl_vars['sm_item']->value == 'managers') {?>active<?php }?> ripple " href="./index.php?module=ManagersAdmin" data-url="./index.php?module=ManagersAdmin">
								<span>Менеджеры</span>
							</a>
						</li>
						<?php }?>
					</ul>
				</li>
				<?php }?>
			</ul>
		</div>
</aside><?php }
}

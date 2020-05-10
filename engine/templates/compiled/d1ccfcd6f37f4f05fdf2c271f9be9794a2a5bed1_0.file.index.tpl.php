<?php
/* Smarty version 3.1.32, created on 2020-03-10 11:38:57
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e676031cb0881_29216269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1ccfcd6f37f4f05fdf2c271f9be9794a2a5bed1' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/index.tpl',
      1 => 1583833128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left-menu.tpl' => 1,
    'file:top-nav.tpl' => 1,
  ),
),false)) {
function content_5e676031cb0881_29216269 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('engine_version', "3.1.14246");?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <title><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic" rel="stylesheet">

    <!-- STYLESHEETS -->
    <style type="text/css">
		[fuse-cloak],
		.fuse-cloak {
			display: none !important;
		}
	</style>
    <!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="./templates/css/font.css">
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="./templates/css/animate.min.css">
	<!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="./templates/js/plugins/fuse-html/fuse-html.min.css" />
	<!-- PNotify -->
    <link type="text/css" rel="stylesheet" href="./templates/js/plugins/pnotify/dist/PNotifyBrightTheme.css">
	<!-- Jquery-ui CSS -->
    <link type="text/css" rel="stylesheet" href="./templates/css/jquery-ui.css" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="./templates/css/main.css">
    <link type="text/css" rel="stylesheet" href="./templates/css/additional.css">
    <!-- / STYLESHEETS -->

    <!-- jQuery -->
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/jquery-ui.min.js"><?php echo '</script'; ?>
>
	
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/sortable/sortable.min.js"><?php echo '</script'; ?>
>
    <!-- Mobile Detect -->
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/mobile-detect/mobile-detect.min.js"><?php echo '</script'; ?>
>
	<!-- Popper.js -->
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/popper.js/index.js"><?php echo '</script'; ?>
>
    <!-- Bootstrap -->
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
>
	<!-- Data tables -->
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/datatables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/datatables/dataTables.responsive.js"><?php echo '</script'; ?>
>
	<!-- Fuse Html -->
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/fuse-html/fuse-html.min.js"><?php echo '</script'; ?>
>
	<!-- PNotify -->
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/pnotify/dist/iife/PNotify.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/pnotify/dist/iife/PNotifyStyleMaterial.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/pnotify/dist/iife/PNotifyMobile.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/plugins/pnotify/dist/iife/PNotifyButtons.js"><?php echo '</script'; ?>
>
	<!-- Main JS -->
    <?php echo '<script'; ?>
 type="text/javascript" src="./templates/js/main.js"><?php echo '</script'; ?>
>
    
	
</head>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
    <main>
        <div id="wrapper">
			<?php $_smarty_tpl->_subTemplateRender('file:left-menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <div class="content-wrapper">
				<?php $_smarty_tpl->_subTemplateRender('file:top-nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <div class="content">
					<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                </div>
            </div>
        </div>
    </main>
</body>
<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'js');?>

</html><?php }
}

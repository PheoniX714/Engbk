<?php /* Smarty version Smarty-3.1.18, created on 2017-11-30 12:46:15
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60880369059fc84ff994f56-74062052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e62ebf6067257fd395aac7b878cd5743ec06cf6' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/main.tpl',
      1 => 1512038769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60880369059fc84ff994f56-74062052',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59fc84ffa07824_67238733',
  'variables' => 
  array (
    'featured_products' => 0,
    'product' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fc84ffa07824_67238733')) {function content_59fc84ffa07824_67238733($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['wrapper'] = new Smarty_variable('index.tpl', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['wrapper'] = clone $_smarty_tpl->tpl_vars['wrapper'];?>
<?php $_smarty_tpl->tpl_vars['add_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/default/css/owl.carousel.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['add_css'] = clone $_smarty_tpl->tpl_vars['add_css'];?>
<?php $_smarty_tpl->tpl_vars['add_script'] = new Smarty_variable('
	<script src="./templates/default/js/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".owl-carousel").owlCarousel({
				loop:true,
				margin:30,
				navText:["&lt;","&gt;"],
				autoplay:true,
				autoplayTimeout:4000,
				autoplayHoverPause:true,
				nav:true,
				responsive:{
					0:{
						items:2
					},
					600:{
						items:3
					},
					800:{
						items:4
					},
					1000:{
						items:5
					},
					1200:{
						items:6
					}
				}
			})
		});		
	</script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['add_script'] = clone $_smarty_tpl->tpl_vars['add_script'];?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable('', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php echo $_smarty_tpl->getSubTemplate ('slider.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<section id="content" class="content">
	<div class="container">
		<div class="col-lg-11 col-md-10 col-sm-9 col-xs-8">
			<div class="main-lidery-title">
				<h2>Лидеры продаж</h2>
			</div>
		</div>
		<div class="best-sellers col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_featured_products'][0][0]->get_featured_products_plugin(array('var'=>'featured_products','limit'=>12),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['featured_products']->value) {?><div class="owl-carousel nav-active"><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['featured_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?><div class="carousel-product"><div class="bs-block"><a href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['product']->value->image->filename,158,214);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/></a></div></div><?php } ?></div><?php }?><div class="clear"></div>
		</div>
		<div class="col-lg-12 col-xs-12">
			<div class="main-banner">
				<a href="/catalog/shuby"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/main1.jpg"></a>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="main-banner">
				<a href="/page/podarochnyj-sertifikat"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/main2.jpg"></a>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="main-banner">
				<a href="/catalog/dublenki"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/main3.jpg"></a>
			</div>
		</div>
		<div class="col-lg-12 col-xs-12">
			<div class="main-banner">
				<a href="/catalog/sharfy"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/main4.jpg"></a>
			</div>
		</div>
	</div>
</section><?php }} ?>

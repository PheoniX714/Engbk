<?php /* Smarty version Smarty-3.1.18, created on 2017-11-30 10:33:35
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5904647675a0af41204aaa5-90418673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad52b31e807117389e964a8c79356352df6228c7' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/post.tpl',
      1 => 1512030798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5904647675a0af41204aaa5-90418673',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0af4120ddf31_64921358',
  'variables' => 
  array (
    'config' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0af4120ddf31_64921358')) {function content_5a0af4120ddf31_64921358($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['og_type'] = new Smarty_variable("article", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['og_type'] = clone $_smarty_tpl->tpl_vars['og_type'];?>
<?php $_smarty_tpl->tpl_vars['og_image'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['config']->value->root_url)."/files/uploads/".((string)$_smarty_tpl->tpl_vars['post']->value->image), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['og_image'] = clone $_smarty_tpl->tpl_vars['og_image'];?>
<?php echo $_smarty_tpl->getSubTemplate ('slider.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<section class="news-page">
	<div class="container">

		<div id="path">
			<a href="./">Главная</a> / <a href="./news">Публикации</a> / <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>

		</div>
		
		<div class="clear"></div>

		<div class="row news">
			<div class="col-lg-12">
				<div class="news-text">
					<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h2>
					<div class="post-annotation"><?php echo $_smarty_tpl->tpl_vars['post']->value->text;?>
</div>
				</div>
			</div>
		</div>
		
		<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
</section><?php }} ?>

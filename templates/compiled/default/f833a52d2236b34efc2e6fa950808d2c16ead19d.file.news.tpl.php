<?php /* Smarty version Smarty-3.1.18, created on 2017-11-30 10:47:50
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19238464685a0aef52c029a4-50358752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f833a52d2236b34efc2e6fa950808d2c16ead19d' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/news.tpl',
      1 => 1512031629,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19238464685a0aef52c029a4-50358752',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0aef52c4a0c3_94955135',
  'variables' => 
  array (
    'posts' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0aef52c4a0c3_94955135')) {function content_5a0aef52c4a0c3_94955135($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('slider.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<section class="news-page">
	<div class="container">

		<div id="path">
			<a href="./">Главная</a> / Публикации
		</div>
		
		<div class="clear"></div>
		
		<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
		<div class="row news">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="image">
					<a href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><img src="files/uploads/<?php echo $_smarty_tpl->tpl_vars['post']->value->image;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" /></a>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<div class="news-text">
					<h2><a href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></h2>
					<div class="post-annotation"><?php echo $_smarty_tpl->tpl_vars['post']->value->annotation;?>
</div>
					<div class="more"><a href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
">Подробнее</a></div>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
</section><?php }} ?>

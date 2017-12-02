<?php /* Smarty version Smarty-3.1.18, created on 2017-11-28 13:22:55
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3197203915a08185ee2f736-48525262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0884542c5e5d192f27a83e8eca2f149f3bc3918' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/slider.tpl',
      1 => 1511868174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3197203915a08185ee2f736-48525262',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a08185ee36443_88801889',
  'variables' => 
  array (
    'slides' => 0,
    'slide' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a08185ee36443_88801889')) {function content_5a08185ee36443_88801889($_smarty_tpl) {?><section id="slider" class="slider hidden-xs">
	<div class="slider-box">
		<div id="iview">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_slides'][0][0]->get_slides_plugin(array('var'=>'slides'),$_smarty_tpl);?>

			<?php if ($_smarty_tpl->tpl_vars['slides']->value) {?>
			<?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slides']->value[1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['slide']->value->link) {?><a href="<?php echo $_smarty_tpl->tpl_vars['slide']->value->link;?>
" data-iview:image="files/uploads/<?php echo $_smarty_tpl->tpl_vars['slide']->value->filename;?>
"></a><?php } else { ?><div data-iview:image="files/uploads/<?php echo $_smarty_tpl->tpl_vars['slide']->value->filename;?>
"></div><?php }?>
			<?php } ?>
			<?php }?>
		</div>
	</div>
</section><?php }} ?>

<?php
/* Smarty version 3.1.32, created on 2020-02-03 17:29:04
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e383c40d9d933_57900583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cb57f2d65ae255dbd7c104394cfb8bee1aa148e' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/slider.tpl',
      1 => 1580743741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e383c40d9d933_57900583 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="slider" class="slider">
	<div class="slider-box">
		<div id="iview">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_slides'][0], array( array('var'=>'slides'),$_smarty_tpl ) );?>

			<?php if ($_smarty_tpl->tpl_vars['slides']->value) {?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slides']->value, 'slide');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
?>
				<?php if ($_smarty_tpl->tpl_vars['slide']->value->link) {?><a href="<?php echo $_smarty_tpl->tpl_vars['slide']->value->link;?>
" data-iview:image="files/slider/<?php echo $_smarty_tpl->tpl_vars['slide']->value->filename;?>
"></a><?php } else { ?><div data-iview:image="files/slider/<?php echo $_smarty_tpl->tpl_vars['slide']->value->filename;?>
"></div><?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
		</div>
	</div>
</div><?php }
}

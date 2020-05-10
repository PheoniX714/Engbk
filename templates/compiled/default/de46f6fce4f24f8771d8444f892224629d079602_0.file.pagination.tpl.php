<?php
/* Smarty version 3.1.32, created on 2020-01-31 18:42:39
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e3458ffb4a9c5_01147465',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de46f6fce4f24f8771d8444f892224629d079602' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/pagination.tpl',
      1 => 1580482238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3458ffb4a9c5_01147465 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['total_pages_num']->value > 1) {?>
<!-- Листалка страниц -->
<div class="pagination">
	
		<?php $_smarty_tpl->_assignInScope('visible_pages', 5);?>

		<?php $_smarty_tpl->_assignInScope('page_from', 1);?>
	
		<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value > floor($_smarty_tpl->tpl_vars['visible_pages']->value/2)) {?>
		<?php $_smarty_tpl->_assignInScope('page_from', max(1,$_smarty_tpl->tpl_vars['current_page_num']->value-floor($_smarty_tpl->tpl_vars['visible_pages']->value/2)-1));?>
	<?php }?>	
	
		<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value > $_smarty_tpl->tpl_vars['total_pages_num']->value-ceil($_smarty_tpl->tpl_vars['visible_pages']->value/2)) {?>
		<?php $_smarty_tpl->_assignInScope('page_from', max(1,$_smarty_tpl->tpl_vars['total_pages_num']->value-$_smarty_tpl->tpl_vars['visible_pages']->value-1));?>
	<?php }?>
	
		<?php $_smarty_tpl->_assignInScope('page_to', min($_smarty_tpl->tpl_vars['page_from']->value+$_smarty_tpl->tpl_vars['visible_pages']->value,$_smarty_tpl->tpl_vars['total_pages_num']->value-1));?>

	<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value == 2) {?><a class="prev_page_link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>null),$_smarty_tpl ) );?>
#p-list"><i class="fa fa-angle-left"></i></a><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value > 2) {?><a class="prev_page_link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>$_smarty_tpl->tpl_vars['current_page_num']->value-1),$_smarty_tpl ) );?>
#p-list"><i class="fa fa-angle-left"></i></a><?php }?>
	
		<a <?php if ($_smarty_tpl->tpl_vars['current_page_num']->value == 1) {?>class="selected"<?php }?> href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>null),$_smarty_tpl ) );?>
#p-list">1</a>
	
		
	<?php
$__section_pages_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['page_to']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_pages_0_start = (int)@$_smarty_tpl->tpl_vars['page_from']->value < 0 ? max(0, (int)@$_smarty_tpl->tpl_vars['page_from']->value + $__section_pages_0_loop) : min((int)@$_smarty_tpl->tpl_vars['page_from']->value, $__section_pages_0_loop);
$__section_pages_0_total = min(($__section_pages_0_loop - $__section_pages_0_start), $__section_pages_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_pages'] = new Smarty_Variable(array());
if ($__section_pages_0_total !== 0) {
for ($__section_pages_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] = $__section_pages_0_start; $__section_pages_0_iteration <= $__section_pages_0_total; $__section_pages_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']++){
?>
			
		<?php $_smarty_tpl->_assignInScope('p', (isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null)+1);?>	
			
		<?php if (($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['page_from']->value+1 && $_smarty_tpl->tpl_vars['p']->value != 2) || ($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['page_to']->value && $_smarty_tpl->tpl_vars['p']->value != $_smarty_tpl->tpl_vars['total_pages_num']->value-1)) {?>	
		<a <?php if ($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['current_page_num']->value) {?>class="selected"<?php }?> href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>$_smarty_tpl->tpl_vars['p']->value),$_smarty_tpl ) );?>
#p-list">...</a>
		<?php } else { ?>
		<a <?php if ($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['current_page_num']->value) {?>class="selected"<?php }?> href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>$_smarty_tpl->tpl_vars['p']->value),$_smarty_tpl ) );?>
#p-list"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</a>
		<?php }?>
	<?php
}
}
?>

		<a <?php if ($_smarty_tpl->tpl_vars['current_page_num']->value == $_smarty_tpl->tpl_vars['total_pages_num']->value) {?>class="selected"<?php }?>  href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>$_smarty_tpl->tpl_vars['total_pages_num']->value),$_smarty_tpl ) );?>
#p-list"><?php echo $_smarty_tpl->tpl_vars['total_pages_num']->value;?>
</a>
	<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value < $_smarty_tpl->tpl_vars['total_pages_num']->value) {?><a class="next_page_link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>$_smarty_tpl->tpl_vars['current_page_num']->value+1),$_smarty_tpl ) );?>
#p-list"><i class="fa fa-angle-right"></i></a><?php }?>
	
</div>
<!-- Листалка страниц (The End) -->
<?php }
}
}

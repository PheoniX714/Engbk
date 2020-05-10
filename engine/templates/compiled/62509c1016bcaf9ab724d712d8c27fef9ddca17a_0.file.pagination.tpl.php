<?php
/* Smarty version 3.1.32, created on 2020-03-06 16:36:21
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e625fe564e427_69420500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62509c1016bcaf9ab724d712d8c27fef9ddca17a' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/pagination.tpl',
      1 => 1583505380,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e625fe564e427_69420500 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['pages_count']->value > 1) {?>   
<!-- Листалка страниц -->

<?php $_smarty_tpl->_assignInScope('visible_pages', 3);?>

<?php $_smarty_tpl->_assignInScope('page_from', 1);?>

<?php if ($_smarty_tpl->tpl_vars['current_page']->value > floor($_smarty_tpl->tpl_vars['visible_pages']->value/2)) {?>
	<?php $_smarty_tpl->_assignInScope('page_from', max(1,$_smarty_tpl->tpl_vars['current_page']->value-floor($_smarty_tpl->tpl_vars['visible_pages']->value/2)-1));
}?>	

<?php if ($_smarty_tpl->tpl_vars['current_page']->value > $_smarty_tpl->tpl_vars['pages_count']->value-ceil($_smarty_tpl->tpl_vars['visible_pages']->value/2)) {?>
	<?php $_smarty_tpl->_assignInScope('page_from', max(1,$_smarty_tpl->tpl_vars['pages_count']->value-$_smarty_tpl->tpl_vars['visible_pages']->value-1));
}?>

<?php $_smarty_tpl->_assignInScope('page_to', min($_smarty_tpl->tpl_vars['page_from']->value+$_smarty_tpl->tpl_vars['visible_pages']->value,$_smarty_tpl->tpl_vars['pages_count']->value-1));?>

<nav aria-label="Page navigation example" class="mt-3">
    <ul class="pagination">
		<li class="page-item <?php if ($_smarty_tpl->tpl_vars['current_page']->value == 1) {?>active<?php }?>"><a class="page-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>1),$_smarty_tpl ) );?>
">1</a></li>
		
			
		<?php
$__section_pages_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['page_to']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_pages_0_start = (int)@$_smarty_tpl->tpl_vars['page_from']->value < 0 ? max(0, (int)@$_smarty_tpl->tpl_vars['page_from']->value + $__section_pages_0_loop) : min((int)@$_smarty_tpl->tpl_vars['page_from']->value, $__section_pages_0_loop);
$__section_pages_0_total = min(($__section_pages_0_loop - $__section_pages_0_start), $__section_pages_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_pages'] = new Smarty_Variable(array());
if ($__section_pages_0_total !== 0) {
for ($__section_pages_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] = $__section_pages_0_start; $__section_pages_0_iteration <= $__section_pages_0_total; $__section_pages_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']++){
?>
				
			<?php $_smarty_tpl->_assignInScope('p', (isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null)+1);?>	
				
			<?php if (($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['page_from']->value+1 && $_smarty_tpl->tpl_vars['p']->value != 2) || ($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['page_to']->value && $_smarty_tpl->tpl_vars['p']->value != $_smarty_tpl->tpl_vars['pages_count']->value-1)) {?>
			<li class="page-item <?php if ($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['current_page']->value) {?>active<?php }?>"><a class="page-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>$_smarty_tpl->tpl_vars['p']->value),$_smarty_tpl ) );?>
">...</a></li>
			<?php } else { ?>
			<li class="page-item <?php if ($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['current_page']->value) {?>active<?php }?>"><a class="page-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>$_smarty_tpl->tpl_vars['p']->value),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</a></li>
			<?php }?>
		<?php
}
}
?>
        
		<li class="page-item <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['pages_count']->value) {?>active<?php }?>"><a class="page-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>$_smarty_tpl->tpl_vars['pages_count']->value),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['pages_count']->value;?>
</a></li>
		<li class="page-item"><a class="page-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>'all'),$_smarty_tpl ) );?>
">все сразу</a></li>
    </ul>
</nav>

<?php }
}
}

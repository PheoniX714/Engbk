<?php
/* Smarty version 3.1.32, created on 2020-02-04 15:21:15
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/feedback.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e396fcbf0bb80_90015703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c2f7561915a8c6c4c199e0d94b632bbbd86eb9c' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/feedback.tpl',
      1 => 1580753583,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e396fcbf0bb80_90015703 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('canonical', "/".((string)$_smarty_tpl->tpl_vars['page']->value->url) ,false ,8);?>

<div class="text-block">
	<h2><?php echo $_smarty_tpl->tpl_vars['page']->value->name;?>
</h2>
	<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

</div>

<?php }
}

<?php
/* Smarty version 3.1.32, created on 2020-02-04 16:49:36
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e398480c43626_19641778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4fe0e266b2078436cf339c484447ad16db1780d' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/page.tpl',
      1 => 1580827773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e398480c43626_19641778 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('canonical', "/".((string)$_smarty_tpl->tpl_vars['page']->value->url) ,false ,8);?>

<div class="text-block">
	<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h2>
		<?php echo $_smarty_tpl->tpl_vars['page']->value->text;?>

</div>
<?php }
}

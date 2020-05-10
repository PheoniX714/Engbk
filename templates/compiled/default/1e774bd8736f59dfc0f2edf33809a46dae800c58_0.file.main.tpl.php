<?php
/* Smarty version 3.1.32, created on 2020-02-03 19:00:24
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e3851a8beedf4_62419539',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e774bd8736f59dfc0f2edf33809a46dae800c58' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/main.tpl',
      1 => 1580749221,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3851a8beedf4_62419539 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('wrapper', 'index.tpl' ,false ,8);?>

<?php $_smarty_tpl->_assignInScope('canonical', '' ,false ,8);?>

<div class="main-small-categories">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
if ($_smarty_tpl->tpl_vars['c']->value->id == 2) {
$_smarty_tpl->_assignInScope('pp', array(1,5,4,11,14,3,13,51,9));
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c']->value->subcategories, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
	<?php if ($_smarty_tpl->tpl_vars['c']->value->visible && in_array($_smarty_tpl->tpl_vars['c']->value->id,$_smarty_tpl->tpl_vars['pp']->value)) {?>
	<div class="ms-cat">
		<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" ><img src="files/category/<?php echo $_smarty_tpl->tpl_vars['c']->value->image;?>
"></a>
		<div class="c-title"><a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></div>
	</div>
	<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<div class="main-big-categories">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
	<?php if ($_smarty_tpl->tpl_vars['c']->value->visible && $_smarty_tpl->tpl_vars['c']->value->id != 2) {?>
	<div class="mb-cat">
		<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" ><img src="files/category/<?php echo $_smarty_tpl->tpl_vars['c']->value->image;?>
"></a>
		<div class="c-title"><a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></div>
	</div>
	<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}

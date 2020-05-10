<?php
/* Smarty version 3.1.32, created on 2020-01-31 18:34:18
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/cart_informer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e34570abb07c4_54688532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5755d123dd8d04e8452be6936e914a142e0058c' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/cart_informer.tpl',
      1 => 1580482237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e34570abb07c4_54688532 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['cart']->value->total_products > 0) {?>
	<a href="./cart/"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/cart.png"><span>В корзине<br><?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'plural' ][ 0 ], array( $_smarty_tpl->tpl_vars['cart']->value->total_products,'товар','товаров','товара' ));?>
</span></a>
<?php } else { ?>
	<a href="./cart/"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/cart.png"><span>Добавьте товар<br>в корзину</span></a>
<?php }
}
}

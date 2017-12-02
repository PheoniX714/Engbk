<?php /* Smarty version Smarty-3.1.18, created on 2017-11-12 11:40:06
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65463078159fb38beb63457-31114177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb09cad73259631513f37a4abb61ad2b92e1aaba' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/cart_informer.tpl',
      1 => 1510479604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65463078159fb38beb63457-31114177',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59fb38beb6ad10_46028102',
  'variables' => 
  array (
    'cart' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fb38beb6ad10_46028102')) {function content_59fb38beb6ad10_46028102($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['cart']->value->total_products>0) {?><a class="cart-informer" href="./cart/"><span><?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
</span></a><?php } else { ?><div class="cart-informer"></div><?php }?><?php }} ?>

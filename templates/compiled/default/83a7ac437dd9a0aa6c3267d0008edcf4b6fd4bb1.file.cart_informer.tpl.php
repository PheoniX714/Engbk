<?php /* Smarty version Smarty-3.1.18, created on 2017-06-26 02:05:02
         compiled from "/home/astyle/a-style.kh.ua/dev/templates/default/html/cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:391492826594fa527913c16-97062666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83a7ac437dd9a0aa6c3267d0008edcf4b6fd4bb1' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev/templates/default/html/cart_informer.tpl',
      1 => 1498431666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '391492826594fa527913c16-97062666',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_594fa52791fc70_30244270',
  'variables' => 
  array (
    'cart' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_594fa52791fc70_30244270')) {function content_594fa52791fc70_30244270($_smarty_tpl) {?>В корзине, <a href="./cart/"><?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['cart']->value->total_products,'товар','товаров','товара');?>
</a><?php }} ?>

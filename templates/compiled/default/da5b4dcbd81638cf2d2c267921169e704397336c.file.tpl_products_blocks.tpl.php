<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 09:18:14
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/tpl_products_blocks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18181725335a06a436e0b1d3-71466754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da5b4dcbd81638cf2d2c267921169e704397336c' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/tpl_products_blocks.tpl',
      1 => 1498431666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18181725335a06a436e0b1d3-71466754',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'settings' => 0,
    'currency' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a06a436e6e597_29749579',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06a436e6e597_29749579')) {function content_5a06a436e6e597_29749579($_smarty_tpl) {?><div class="image">
<a href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
" title='Просмотреть предложение <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'><img src="<?php if ($_smarty_tpl->tpl_vars['product']->value->image) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['product']->value->image->filename,140,150);?>
<?php } else { ?>design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/bg/nofoto.png<?php }?>" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/></a>
</div>

<?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?><div class="label label_featured" title='Рекомендуемый товар (Лидер продаж)'></div>
<?php } elseif ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price>0) {?>	<div class="label label_sale" title='Предложение со скидкой'></div>
<?php }?>

<div class="product_info">

	<h3><a data-product="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></h3>
	<?php if ($_smarty_tpl->tpl_vars['product']->value->annotation) {?><div class="annotation"><?php echo $_smarty_tpl->tpl_vars['product']->value->annotation;?>
</div><?php }?>
	<?php if (count($_smarty_tpl->tpl_vars['product']->value->variants)>0) {?>
		<form class="cart" action="/cart">

			<div class="price">
			<strike class='compare_price right'><?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price>0) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->compare_price);?>
<?php } else { ?><?php }?></strike>
			<?php if ($_smarty_tpl->tpl_vars['product']->value->variant->price>0) {?><span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->price);?>
</span><i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</i><?php } else { ?><small class='right' title='Не назначена цена'><br />Под заказ</small><?php }?>
			</div>

			<a class='but_add more hover_mouse' href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"></a>
			<?php if ($_smarty_tpl->tpl_vars['product']->value->variant->price>0) {?><input type="submit" class="but_add to_cart" value="" title='Купить <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
' data-result-text=""/><?php }?>

			<select name="variant" <?php if (count($_smarty_tpl->tpl_vars['product']->value->variants)==1&&!$_smarty_tpl->tpl_vars['product']->value->variant->name) {?>style='display:none;'<?php }?>>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['v']->value->price>0) {?><option value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value->compare_price>0) {?>compare_price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['v']->value->compare_price);?>
"<?php }?> price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['v']->value->price);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</option><?php }?>
			<?php } ?>
			</select>
		</form>
	<?php } else { ?>
		<div class="price"><small class='right' title='Нет на складе (Остаток ноль)'><br />Нет на складе</small></div>
		<a class='but_add more hover_mouse' href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"></a>
	<?php }?>
</div><?php }} ?>

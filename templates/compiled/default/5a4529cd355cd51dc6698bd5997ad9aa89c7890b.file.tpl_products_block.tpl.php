<?php /* Smarty version Smarty-3.1.18, created on 2017-11-22 17:01:32
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/tpl_products_block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1719021005a099a253883e6-36268799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a4529cd355cd51dc6698bd5997ad9aa89c7890b' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/tpl_products_block.tpl',
      1 => 1511362835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1719021005a099a253883e6-36268799',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a099a253edb63_82658318',
  'variables' => 
  array (
    'product' => 0,
    'pg' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a099a253edb63_82658318')) {function content_5a099a253edb63_82658318($_smarty_tpl) {?><div class="product" id="product_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">

	<div class="image">
		<a href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
" class="p_images main_img" data-imgId="<?php echo $_smarty_tpl->tpl_vars['product']->value->image->id;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['product']->value->image->filename,200,295);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
"/></a>
		<?php if ($_smarty_tpl->tpl_vars['product']->value->group_products) {?>
		<?php  $_smarty_tpl->tpl_vars['pg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->group_products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pg']->key => $_smarty_tpl->tpl_vars['pg']->value) {
$_smarty_tpl->tpl_vars['pg']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['pg']->value->color) {?>
		<a href="products/<?php echo $_smarty_tpl->tpl_vars['pg']->value->url;?>
" id="image_<?php echo $_smarty_tpl->tpl_vars['pg']->value->image->id;?>
" class="p_images" style="display:none;"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['pg']->value->image->filename,200,295);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pg']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
"/></a>
		<?php }?>
		<?php } ?>		
		<div class="products-colors-list">
			<?php  $_smarty_tpl->tpl_vars['pg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->group_products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pg']->key => $_smarty_tpl->tpl_vars['pg']->value) {
$_smarty_tpl->tpl_vars['pg']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['pg']->value->color&&$_smarty_tpl->tpl_vars['pg']->value->id!=$_smarty_tpl->tpl_vars['product']->value->id) {?>
			<div class="product-color"><a href="products/<?php echo $_smarty_tpl->tpl_vars['pg']->value->url;?>
#product" data-pId="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" data-imgId="<?php echo $_smarty_tpl->tpl_vars['pg']->value->image->id;?>
" style="background:#<?php echo $_smarty_tpl->tpl_vars['pg']->value->color;?>
;">1</a></div>
			<?php }?>
			<?php } ?>
		</div>
		<?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price) {?><div class="product-discount">-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(((1-$_smarty_tpl->tpl_vars['product']->value->variant->price/$_smarty_tpl->tpl_vars['product']->value->variant->compare_price)*100));?>
%</div><?php }?>
	</div>

	<div class="product_info">

		<h3><a data-product="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
</a></h3>
		
		<div class="p-left-block">
			<p class="p-sku">Код <?php echo $_smarty_tpl->tpl_vars['product']->value->variant->sku;?>
</p>
			<?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price) {?><p class="p-compare-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->compare_price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</p><?php }?>
			<p class="p-price <?php if (!$_smarty_tpl->tpl_vars['product']->value->variant->compare_price) {?>only<?php }?>"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</p>
			
		</div>
		
		<div class="p-right-block">
			<a class="more" href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
">Подробнее</a>
		</div>
		<div class="clear"></div>
	</div>
</div><?php }} ?>

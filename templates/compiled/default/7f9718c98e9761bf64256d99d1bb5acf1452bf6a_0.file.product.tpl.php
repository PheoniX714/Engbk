<?php
/* Smarty version 3.1.32, created on 2020-02-04 23:13:36
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e39de80c6ec70_06967701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f9718c98e9761bf64256d99d1bb5acf1452bf6a' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/product.tpl',
      1 => 1580850815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e39de80c6ec70_06967701 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('og_type', "product" ,false ,8);
ob_start();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'resize' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->image->filename,530,430 ));
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('og_image', $_prefixVariable1 ,false ,8);?>

<?php $_smarty_tpl->_assignInScope('canonical', "/products/".((string)$_smarty_tpl->tpl_vars['product']->value->url) ,false ,8);?>

<?php $_smarty_tpl->_assignInScope('add_script', '
	<link href="templates/default/css/jquery.fancybox.min.css" rel="stylesheet">
	<script type="text/javascript" src="templates/default/js/jquery.fancybox.min.js"></script>
	<script>
		$("[data-fancybox="gallery"]").fancybox();
	</script>
' ,false ,8);?>

<div id="product">
	<div class="product-cont">
		<div class="images-block">
			<?php if ($_smarty_tpl->tpl_vars['product']->value->image) {?>
			<div class="image">
				<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'resize' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->image->filename,1500,900,'w' ));?>
" data-fancybox="gallery"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'resize' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->image->filename,475,475 ));?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->product->name, ENT_QUOTES, 'UTF-8', true);?>
" data-large="/files/originals/<?php echo $_smarty_tpl->tpl_vars['product']->value->image->filename;?>
" /></a>
			</div>
			<?php }?>
			<?php if (count($_smarty_tpl->tpl_vars['product']->value->images) > 1) {?>
			<div class="images">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'cut' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->images )), 'image', false, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['image']->value) {
?>
					<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'resize' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value->filename,1500,900,'w' ));?>
" data-fancybox="gallery"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'resize' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value->filename,200,200 ));?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" /></a>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<?php }?>
		</div>
		<div class="product-info">
			<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
			
			<div class="description"><?php echo $_smarty_tpl->tpl_vars['product']->value->body;?>
</div>
				
			<form class="variants" action="/cart">
				<div class="price">
					<?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price > 0) {?>
					<strike>
					<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->variant->compare_price ));?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>

					</strike>
					<?php }?>
					<span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->variant->price ));?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>
					
				</div>
				
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->variants, 'v', false, NULL, 'variants', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
				<table>		
				<tr><td><input name="variant" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" type="radio" checked style="display:none;" />
				</td>
				<td>
				
				<div class="amount-select">
					<input type="button" value="-" class="button add1" onClick="javascript:this.form.amount.value= this.form.amount.value<=1 ? 1 :parseInt(this.form.amount.value)-1 ;">
					<input type="text" class="amount-input" name="amount" value="1" autocomplete="off">
					<input type="button" value="+" class="button add2" onClick="javascript:this.form.amount.value= this.form.amount.value>=100 ? 100 :parseInt(this.form.amount.value)+1 ;">
					<input type="submit" class="cart-but" value="В корзину" data-result-text="Добавить еще"/>
				</div>
				
				</td></tr>
				</table>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				
			</form>
			
		</div>
	</div>
</div><?php }
}

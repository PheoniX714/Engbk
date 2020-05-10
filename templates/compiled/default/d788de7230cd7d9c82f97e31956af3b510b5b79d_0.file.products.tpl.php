<?php
/* Smarty version 3.1.32, created on 2020-02-04 15:53:41
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e397765a5fca2_21674316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd788de7230cd7d9c82f97e31956af3b510b5b79d' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/products.tpl',
      1 => 1580824407,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pagination.tpl' => 1,
  ),
),false)) {
function content_5e397765a5fca2_21674316 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['category']->value && $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->_assignInScope('canonical', "/catalog/".((string)$_smarty_tpl->tpl_vars['category']->value->url)."/".((string)$_smarty_tpl->tpl_vars['brand']->value->url) ,false ,8);
} elseif ($_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->_assignInScope('canonical', "/catalog/".((string)$_smarty_tpl->tpl_vars['category']->value->url) ,false ,8);
} elseif ($_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->_assignInScope('canonical', "/brands/".((string)$_smarty_tpl->tpl_vars['brand']->value->url) ,false ,8);
} elseif ($_smarty_tpl->tpl_vars['keyword']->value) {
ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('canonical', "/products?keyword=".$_prefixVariable1 ,false ,8);
} else {
$_smarty_tpl->_assignInScope('canonical', "/products" ,false ,8);
}?>


<!-- Хлебные крошки 
<div class="col-md-12" id="path">
	<a href="./">Главная</a>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value->path, 'cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
?>
	- <a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php if ($_smarty_tpl->tpl_vars['brand']->value) {?>
	- <a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['product']->value->name) {?>
	-  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>

	<?php }?>
</div>
 Хлебные крошки #End /-->

<?php if ($_smarty_tpl->tpl_vars['category']->value->id == 2 || $_smarty_tpl->tpl_vars['category']->value->id == 6 || $_smarty_tpl->tpl_vars['category']->value->id == 7 || $_smarty_tpl->tpl_vars['category']->value->id == 8 || $_smarty_tpl->tpl_vars['category']->value->id == 34) {
$_smarty_tpl->_assignInScope('pp', array(35,36,37,38));?>
	<div class="row categories-title">
		<div class="col-md-12">
			<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 categories-list">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value->subcategories, 'sc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sc']->value) {
?>
		<?php if ($_smarty_tpl->tpl_vars['sc']->value->visible) {?>
			<div class="subcat-box">
				<?php if ($_smarty_tpl->tpl_vars['sc']->value->image) {?><div class="subcat-img"><a href="<?php if (in_array($_smarty_tpl->tpl_vars['sc']->value->id,$_smarty_tpl->tpl_vars['pp']->value)) {
} else { ?>/catalog<?php }?>/<?php echo $_smarty_tpl->tpl_vars['sc']->value->url;?>
"><img src="/files/category/<?php echo $_smarty_tpl->tpl_vars['sc']->value->image;?>
"></a></div><?php }?>
				<div class="subcat-title"><a href="<?php if (in_array($_smarty_tpl->tpl_vars['sc']->value->id,$_smarty_tpl->tpl_vars['pp']->value)) {
} else { ?>/catalog<?php }?>/<?php echo $_smarty_tpl->tpl_vars['sc']->value->url;?>
" <?php if ($_smarty_tpl->tpl_vars['sc']->value->id == 13) {?>style="font-size:10px;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['sc']->value->name;?>
</a></div>
			</div>
		<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>
<?php } else { ?>

<?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>
<div class="row categories-title">
	<div class="col-md-12">
		<h1>Поиск: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
</h1>
	</div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['category']->value->image) {?>
<div class="category-image">
<img src="files/category/<?php echo $_smarty_tpl->tpl_vars['category']->value->image;?>
">
</div>
<?php }
if ($_smarty_tpl->tpl_vars['category']->value->name) {?>
<h1 class="category-name">
<?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>

</h1>
<?php }
if ($_smarty_tpl->tpl_vars['category']->value->description) {?>
<div class="category-text">
<?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>

</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['category']->value->id == 30) {?>
<div class="p-calculators" style="margin:20px 0">

<?php echo '<script'; ?>
 type="text/javascript">
function changeText0(){
var rezultat = 1;
rezultat *= (Math.PI * (Math.pow(parseFloat(document.getElementById('d').value), 2) / 100) ) / 4;
rezultat *= parseFloat(document.getElementById('p').value);
document.getElementById('rezultat').innerHTML = rezultat.toFixed(3);
}
<?php echo '</script'; ?>
>

<form onsubmit="return false;" oninput="changeText0()">
<p><span>Диаметр поршня d, мм</span> <input id="d" type="number"></p>
<p><span>Давление системы P, ат (обычно 6 ат)</span> <input id="p" type="number"></p>
<p><span>Сила давления F, кгc:</span> <output id="rezultat"></output></p>
</form>


<?php echo '<script'; ?>
 type="text/javascript">
function changeText1(){
var rezultat1 = 1;
rezultat1 *= Math.sqrt( (4 * parseFloat(document.getElementById('f1').value) ) / (Math.PI * parseFloat(document.getElementById('p1').value) ) );
document.getElementById('rezultat1').innerHTML = 10*rezultat1.toFixed(3);
}
<?php echo '</script'; ?>
>

<form onsubmit="return false;" oninput="changeText1()">
<p><span>Сила давления F, кгc</span> <input id="f1" type="number"></p>
<p><span>Давление системы P, ат (обычно 6 ат)</span> <input id="p1" type="number"></p>
<p><span>Диаметр поршня d, мм:</span> <output id="rezultat1"></output></p>
</form>

</div>
<?php }?>
<!--Каталог товаров-->
<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>

<div class="row products-category">
	
	<div class="col-md-12">
		<div class="row products">
			<table id="p-list" class="table table-striped">
            <tbody>
			  <?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
			  <tr class="t-header">
                <td colspan="4">
					<div id="features">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['features']->value, 'f', false, 'key', 'ft', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['f']->value) {
$__foreach_f_2_saved = $_smarty_tpl->tpl_vars['f'];
?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['f']->value->options, 'o', false, NULL, 'op', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_op']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_op']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_op']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_op']->value['total'];
?>
								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('params'=>array($_smarty_tpl->tpl_vars['f']->value->id=>$_smarty_tpl->tpl_vars['o']->value->value,'page'=>null)),$_smarty_tpl ) );?>
#p-list" <?php if ($_GET[$_smarty_tpl->tpl_vars['f']->key] == $_smarty_tpl->tpl_vars['o']->value->value) {?>class="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value->value, ENT_QUOTES, 'UTF-8', true);?>
</a><?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_op']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_op']->value['last'] : null)) {?> | <?php }?>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php
$_smarty_tpl->tpl_vars['f'] = $__foreach_f_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>
				</td>
              </tr>
			  <?php }?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
              <tr>
				<form class="variants" action="/cart">
                <td class="id<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
 nb-l p-name"><?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?><a href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</a><?php } else {
echo $_smarty_tpl->tpl_vars['product']->value->name;
}?></td>
                <td class="price">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->variants, 'v');
$_smarty_tpl->tpl_vars['v']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->index++;
$_smarty_tpl->tpl_vars['v']->first = !$_smarty_tpl->tpl_vars['v']->index;
$__foreach_v_5_saved = $_smarty_tpl->tpl_vars['v'];
?>
					<input id="variants_<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" name="variant" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" type="radio" class="variant_radiobutton" <?php if ($_smarty_tpl->tpl_vars['v']->first) {?>checked<?php }?> style="display:none;" />
					<?php if ($_smarty_tpl->tpl_vars['v']->value->compare_price > 0) {?><span class="compare_price"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['v']->value->compare_price ));?>
</span><?php }?>
					<span class="id<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
 price"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['v']->value->price ));?>
 <span class="currency"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span></span>
					<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_5_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</td>
				<td class="amount">
					<div class="am">
						<input type="button" value="-" class="button add1" onclick="javascript:this.form.amount.value= this.form.amount.value<=1 ? 1 :parseInt(this.form.amount.value)-1 ;">
						<input type="text" class="amount-input" name="amount" value="1">
						<input type="button" value="+" class="button add2" onclick="javascript:this.form.amount.value= this.form.amount.value>=100 ? 100 :parseInt(this.form.amount.value)+1 ;">
					</div>
				</td>
                <td class="to-cart nb-r"><input type="submit" class="button cart-but" value="в корзину" data-result-text="добавить еще"/></td>
				</form>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </tr>
			
			  <tr class="pagination-tr">
                <td colspan="4"><?php $_smarty_tpl->_subTemplateRender('file:pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>&nbsp;</td>
              </tr>
			</tbody>
          </table>
		</div>
	</div>
<!-- Список товаров (The End)-->

<?php if ($_smarty_tpl->tpl_vars['category']->value->url == 'poliamid') {?>

<!-- Google Code for &#1055;&#1086;&#1083;&#1080;&#1072;&#1084;&#1080;&#1076; Conversion Page -->
<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 978369648;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "6aN9CJrLknUQ8PjC0gM";
var google_remarketing_only = false;
/* ]]> */
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
<?php echo '</script'; ?>
>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/978369648/?label=6aN9CJrLknUQ8PjC0gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript> 

<?php } elseif ($_smarty_tpl->tpl_vars['category']->value->url == 'polipropilen') {?>


<!-- Google Code for &#1055;&#1086;&#1083;&#1080;&#1087;&#1088;&#1086;&#1087;&#1080;&#1083;&#1077;&#1085; Conversion Page -->
<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 978369648;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "tI4WCP2-mHUQ8PjC0gM";
var google_remarketing_only = false;
/* ]]> */
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
<?php echo '</script'; ?>
>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/978369648/?label=tI4WCP2-mHUQ8PjC0gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript> 


<?php }?>

</div>
<?php } else { ?>
<div class="col-md-12 no-products">Товары не найдены</div>
<?php }?>

<?php }?>
<!--Каталог товаров (The End)--><?php }
}

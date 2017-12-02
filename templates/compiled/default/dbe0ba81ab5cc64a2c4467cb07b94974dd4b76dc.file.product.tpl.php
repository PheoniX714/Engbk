<?php /* Smarty version Smarty-3.1.18, created on 2017-11-30 10:38:13
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17405403395a01bf73cff373-09681406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbe0ba81ab5cc64a2c4467cb07b94974dd4b76dc' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/product.tpl',
      1 => 1512031091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17405403395a01bf73cff373-09681406',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a01bf73dba604_21390772',
  'variables' => 
  array (
    'product' => 0,
    'category' => 0,
    'cat' => 0,
    'brand' => 0,
    'image' => 0,
    'v' => 0,
    'f' => 0,
    'language' => 0,
    'currency' => 0,
    'group_products' => 0,
    'gp' => 0,
    'related_products' => 0,
    'related_product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a01bf73dba604_21390772')) {function content_5a01bf73dba604_21390772($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['og_type'] = new Smarty_variable("product", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['og_type'] = clone $_smarty_tpl->tpl_vars['og_type'];?>
<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['product']->value->image->filename,530,430);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['og_image'] = new Smarty_variable($_tmp1, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['og_image'] = clone $_smarty_tpl->tpl_vars['og_image'];?>
<?php $_smarty_tpl->tpl_vars['add_script'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/default/css/owl.carousel.css">
	<script src="./templates/default/js/owl.carousel.min.js"></script>
	<script src="./templates/default/js/zoomsl-3.0.min.js"></script>
	<script>
		$(function() {
			$(".product").on("click", ".images", function() {
				var image_id = $(this).children("img").attr("data-imgId");
				$(".product #big_img img").hide();
				$(".product #big_img #image_"+image_id).show();
				
			});
		});
		
		$(document).ready(function(){
			$(".owl-carousel").owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				navText:["&lt;","&gt;"],
				responsive:{
					0:{
						items:1
					},
					530:{
						items:2
					},
					992:{
						items:3
					}
					,
					1200:{
						items:4
					}
				}
			})
		});
		
		function windowSize(){
			if ($(window).width() > "750"){
				$(".big_img").imagezoomsl({
					 zoomrange: [2, 2]
				});
			}
		}
		$(window).on("load",windowSize);
		
		
	</script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['add_script'] = clone $_smarty_tpl->tpl_vars['add_script'];?>

<?php echo $_smarty_tpl->getSubTemplate ('slider.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<section class="product-page" id="product">
	<div class="container">

		<div id="path">
			<a href="./">Главная</a>
			<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>/ <a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php if ($_smarty_tpl->tpl_vars['cat']->value->visible_name) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a><?php } ?>
			<?php if ($_smarty_tpl->tpl_vars['brand']->value) {?>» <a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a><?php }?>
			/ <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>

		</div>
		
		<div class="clear"></div>
		
		<div class="row product">
			<div class="col-lg-1 col-md-1 col-xs-2">
				<?php if (count($_smarty_tpl->tpl_vars['product']->value->images)>1) {?>
				<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
				<div class="images"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,60,60);?>
" data-imgId="<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
" /></div>
				<?php } ?>
				<div class="clear"></div>
				<?php }?>
			</div>
			<div class="col-lg-5 col-md-4 col-xs-10">
				<div id="big_img" class="image">
					<img class="big_img main_img" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['product']->value->image->filename,530,430);?>
" id="image_<?php echo $_smarty_tpl->tpl_vars['product']->value->image->id;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->product->visible_name, ENT_QUOTES, 'UTF-8', true);?>
" data-large="/files/originals/<?php echo $_smarty_tpl->tpl_vars['product']->value->image->filename;?>
" />
					<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['cut'][0][0]->cut_modifier($_smarty_tpl->tpl_vars['product']->value->images); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
					<img class="big_img" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,530,430);?>
" id="image_<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
" style="display:none;" data-large="/files/originals/<?php echo $_smarty_tpl->tpl_vars['image']->value->filename;?>
"/>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-7 col-xs-12">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12">
						<h1 data-product="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
					</div>
					<div class="col-lg-8 col-md-7 col-xs-12">
						<form class="variants" action="/cart">
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<div class="variant-sku">Код: <?php echo $_smarty_tpl->tpl_vars['v']->value->sku;?>
</div>
							<?php break 1?>
						<?php } ?>
						
						<?php if ($_smarty_tpl->tpl_vars['product']->value->features) {?>
							<div id="features">
								<ul>
								<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->features; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['f']->value->language_id==$_smarty_tpl->tpl_vars['language']->value->id) {?> 
									<li><span class="feature-name"><?php echo $_smarty_tpl->tpl_vars['f']->value->name;?>
:</span><span class="feature-value"><?php echo $_smarty_tpl->tpl_vars['f']->value->value;?>
</span></li>
									<?php }?>
								<?php } ?>
								<ul>
							</div>
						<?php }?>
						
						<?php if (count($_smarty_tpl->tpl_vars['product']->value->variants)>1) {?>
						<div class="size-select">
							<label for="variant">Размер: </label>
							<select class="form-control" name="variant" id="variant">
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" data-price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['v']->value->price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
" data-compare-price="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['v']->value->compare_price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</option>
								<?php } ?>
							</select>
						</div>
						<?php } else { ?>
						<input type="radio" name="variant" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->variant->id;?>
" checked style="display:none!important"/>
						<?php }?>
						
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<div class="product-price"><?php if (count($_smarty_tpl->tpl_vars['product']->value->variants)>0) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['v']->value->price);?>
 <span class="currency"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span><?php } else { ?>Нет в наличии<?php }?></div>
							<?php break 1?>
						<?php } ?>
						
						<?php if ($_smarty_tpl->tpl_vars['group_products']->value) {?>
						<div class="product-colors">
							<?php  $_smarty_tpl->tpl_vars['gp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gp']->key => $_smarty_tpl->tpl_vars['gp']->value) {
$_smarty_tpl->tpl_vars['gp']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['gp']->value->color) {?>
							<a <?php if ($_smarty_tpl->tpl_vars['gp']->value->id!=$_smarty_tpl->tpl_vars['product']->value->id) {?>href="products/<?php echo $_smarty_tpl->tpl_vars['gp']->value->url;?>
#product"<?php }?> style="background:#<?php echo $_smarty_tpl->tpl_vars['gp']->value->color;?>
;" <?php if ($_smarty_tpl->tpl_vars['gp']->value->id==$_smarty_tpl->tpl_vars['product']->value->id) {?>class="active"<?php }?>>1</a> 
							<?php }?>
							<?php } ?>
						</div>
						<?php }?>
						
						<div class="buy-loyalty">
							<a href="/page/predlozheniya-ot-privatbanka">Купить<br>по программе<br>лояльности</a>
						</div>
						
						<input type="submit" class="to-cart-button" value="купить" data-result-text="в корзине"/>
						
						</form>
					</div>
					<div class="col-lg-4 col-md-5 col-xs-12">
						<div class="a-discount">
							<b>Внимание!</b><br>
							Дополнительная<br>
							скидка при заказе<br>
							в интернет магазине!<br>
							Аксессуары -7%,<br>
							Верхняя одежда  -5%
						</div>
						<div class="clear"></div>
						<a href="page/tablitsa-razmerov" class="sizes-table">Таблица размеров</a>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<p>Цены указаны без учета дополнительной скидки.<br>
						Цены и наличие товара уточняйте по телефону +38 (096) 00-00-534, приносим свои извинения за временное неудобство.</p>
					</div>
				</div>

				<div class="clear"></div>
			</div>
			
			
			<?php if ($_smarty_tpl->tpl_vars['related_products']->value) {?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- Список каталога товаров-->
				<div class="row related_products">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-8">
						<h2>Рекомендуем для вас:</h2>
					</div>
					
					<div class="owl-carousel col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php  $_smarty_tpl->tpl_vars['related_product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['related_product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['related_product']->key => $_smarty_tpl->tpl_vars['related_product']->value) {
$_smarty_tpl->tpl_vars['related_product']->_loop = true;
?>
						<div class="carousel-product">
							<div class="product">
								<div class="rp-image">
									<a href="products/<?php echo $_smarty_tpl->tpl_vars['related_product']->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['related_product']->value->image->filename,150,225);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['related_product']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
"/></a>
								</div>
								<div class="product_info">

									<h3><a data-product="<?php echo $_smarty_tpl->tpl_vars['related_product']->value->id;?>
" href="products/<?php echo $_smarty_tpl->tpl_vars['related_product']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['related_product']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
</a></h3>
									
									<div class="p-left-block">
										<p class="p-sku">Код <?php echo $_smarty_tpl->tpl_vars['related_product']->value->variant->sku;?>
</p>
										<?php if ($_smarty_tpl->tpl_vars['related_product']->value->variant->compare_price) {?><p class="p-compare-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['related_product']->value->variant->compare_price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</p><?php }?>
										<p class="p-price <?php if (!$_smarty_tpl->tpl_vars['related_product']->value->variant->compare_price) {?>only<?php }?>"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['related_product']->value->variant->price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</p>
										
									</div>
									
									<div class="p-right-block">
										<a class="more" href="products/<?php echo $_smarty_tpl->tpl_vars['related_product']->value->url;?>
">Подробнее</a>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
						<?php } ?>	
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<?php }?>
			
		</div>
	</div>
</section><?php }} ?>

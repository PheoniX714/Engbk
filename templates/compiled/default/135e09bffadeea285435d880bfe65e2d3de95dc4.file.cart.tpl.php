<?php /* Smarty version Smarty-3.1.18, created on 2017-11-19 15:40:51
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10107967205a0478c31125f9-64720715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '135e09bffadeea285435d880bfe65e2d3de95dc4' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/cart.tpl',
      1 => 1511098689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10107967205a0478c31125f9-64720715',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0478c32b0f07_61179297',
  'variables' => 
  array (
    'cart' => 0,
    'purchase' => 0,
    'image' => 0,
    'product' => 0,
    'settings' => 0,
    'currency' => 0,
    'error' => 0,
    'name' => 0,
    'email' => 0,
    'phone' => 0,
    'city' => 0,
    'address' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0478c32b0f07_61179297')) {function content_5a0478c32b0f07_61179297($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/astyle/mdk.ua/www/Smarty/libs/plugins/function.math.php';
?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Корзина", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<section class="cart-page">
	<div class="container">
		<div id="path">
			<a href="./">Главная</a> / Корзина
		</div>


		<?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>
		<form method="post" name="cart">

		
		<ul id="purchases">
			<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value->purchases; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
			<li>
				
				<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['purchase']->value->product->images), null, 0);?>
				<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
				<div class="col-lg-1 p-img hidden-xs">
					<a href="/products/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->url, ENT_QUOTES, 'UTF-8', true);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,75,75);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"></a>
				</div>
				<?php }?>
				
				
				<div class="col-lg-5 col-xs-8">
					<a href="/products/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->url, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->visible_name, ENT_QUOTES, 'UTF-8', true);?>
</a>	
				</div>
				
				<div class="col-lg-1  col-xs-4">
					<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->variant->name, ENT_QUOTES, 'UTF-8', true);?>
	
				</div>

				
				<div class="col-lg-2 col-xs-5">
					<select name="amounts[<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->id;?>
]" onchange="document.cart.submit();">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['name'] = 'amounts';
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['purchase']->value->variant->stock+1) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total']);
?>
						<option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['amounts']['index'];?>
" <?php if ($_smarty_tpl->tpl_vars['purchase']->value->amount==$_smarty_tpl->getVariable('smarty')->value['section']['amounts']['index']) {?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['amounts']['index'];?>
 <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>
</option>
						<?php endfor; endif; ?>
					</select>
				</div>

				
				<div class="col-lg-2 col-xs-5 price">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->variant->price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

				</div>
				
				
				<div class="col-lg-1 col-xs-2 delete-purchase">
					<a href="cart/remove/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->id;?>
">&times;</a>
				</div>
			</li>
			<?php } ?>
			
		</ul>
		
		<div class="col-lg-12 total-price">Общая стоимоть заказа:  <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span></div>
			
		<div class="col-lg-6 customer-data">
			<div class="row">
				<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
				<div class="col-lg-12">
					<div class="alert alert-danger">
						<?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>Введите имя<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_email') {?>Введите email<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_phone') {?>Введите телефон<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_address') {?>Введите адрес доставки<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>Капча введена неверно!<?php }?>
					</div>
				</div>
				<?php }?>
				<div class="col-lg-4 form-label"><label>Имя, фамилия*</label></div>
				<div class="col-lg-8 form-input"><input <?php if ($_smarty_tpl->tpl_vars['error']->value=="empty_name") {?>class="input-error"<?php }?> name="name" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-format=".+" data-notice="Введите имя"/></div>
				
				<div class="col-lg-4 form-label"><label>Email*</label></div>
				<div class="col-lg-8 form-input"><input <?php if ($_smarty_tpl->tpl_vars['error']->value=="empty_email") {?>class="input-error"<?php }?> name="email" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-format="email" data-notice="Введите email" /></div>

				<div class="col-lg-4 form-label"><label>Телефон*</label></div>
				<div class="col-lg-8 form-input"><input <?php if ($_smarty_tpl->tpl_vars['error']->value=="empty_phone") {?>class="input-error"<?php }?> name="phone" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></div>
				
				<div class="col-lg-4 form-label"><label>Способ доставки:</label></div>
				<div class="col-lg-8 form-input"><select name="delivery_id"><option value="1">Самовывоз</option><option value="2">Новая почта</option></select></div>
				
				<div class="col-lg-4 form-label"><label>Город\Область</label></div>
				<div class="col-lg-8 form-input"><input name="city" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['city']->value, ENT_QUOTES, 'UTF-8', true);?>
"/></div>
				
				<div class="col-lg-4 form-label"><label>Адрес (номер отделения)</label></div>
				<div class="col-lg-8 form-input"><input name="address" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value, ENT_QUOTES, 'UTF-8', true);?>
"/></div>

				<div class="col-lg-4 form-label"><label>Комментарий к&nbsp;заказу</label></div>
				<div class="col-lg-8 form-input"><textarea name="comment" id="order_comment"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
				
				<div class="col-lg-4 form-label"><label>Проверочный код</label></div>
				<div class="col-lg-4"><div class="captcha pull-right"><img src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
" alt='captcha'/></div></div>
				<div class="col-lg-4 form-input"><input class="input-captcha <?php if ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>input-error<?php }?>" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/></div>
			</div>
		</div>
		<div class="col-lg-6 customer-data">
			<div class="row">
				<div class="col-lg-12"><input type="submit" name="checkout" class="checkout-button pull-right" value="Оформить заказ"></div>
			</div>
		</div>
		   
		</form>
		<?php } else { ?>
		  <h2>В корзине нет товаров</h2>
		<?php }?>

	</div>	
</section>
	<?php }} ?>

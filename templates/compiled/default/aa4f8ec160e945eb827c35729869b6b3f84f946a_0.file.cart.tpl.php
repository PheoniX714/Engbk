<?php
/* Smarty version 3.1.32, created on 2020-02-04 11:25:24
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e3938841b2153_22162849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa4f8ec160e945eb827c35729869b6b3f84f946a' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/cart.tpl',
      1 => 1580753581,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3938841b2153_22162849 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/astyle/a-style.kh.ua/dev2/Smarty/libs/plugins/function.math.php','function'=>'smarty_function_math',),));
$_smarty_tpl->_assignInScope('meta_title', "Корзина" ,false ,8);?>
<div class="cart-page">
	<div class="row">
		<div class="col-md-12">
			<h1 style="margin-bottom:15px;">
			<?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>В корзине <?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'plural' ][ 0 ], array( $_smarty_tpl->tpl_vars['cart']->value->total_products,'товар','товаров','товара' ));?>

			<?php } else { ?>Корзина пуста<?php }?>
			</h1>
		</div>
	</div>


<?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>
<form method="post" name="cart">

<table id="purchases" class="table table-striped">

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value->purchases, 'purchase');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->value) {
?>
<tr>
		
		<td class="name">
		<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->name, ENT_QUOTES, 'UTF-8', true);?>
		
	</td>

		<td class="price">
		<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( ($_smarty_tpl->tpl_vars['purchase']->value->variant->price) ));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

	</td>

		<td class="amount">
		<select name="amounts[<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->id;?>
]" onchange="document.cart.submit();">
			<?php
$__section_amounts_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['purchase']->value->variant->stock+1) ? count($_loop) : max(0, (int) $_loop));
$__section_amounts_0_start = min(1, $__section_amounts_0_loop);
$__section_amounts_0_total = min(($__section_amounts_0_loop - $__section_amounts_0_start), $__section_amounts_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_amounts'] = new Smarty_Variable(array());
if ($__section_amounts_0_total !== 0) {
for ($__section_amounts_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_amounts']->value['index'] = $__section_amounts_0_start; $__section_amounts_0_iteration <= $__section_amounts_0_total; $__section_amounts_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_amounts']->value['index']++){
?>
			<option value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_amounts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_amounts']->value['index'] : null);?>
" <?php if ($_smarty_tpl->tpl_vars['purchase']->value->amount == (isset($_smarty_tpl->tpl_vars['__smarty_section_amounts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_amounts']->value['index'] : null)) {?>selected<?php }?>><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_amounts']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_amounts']->value['index'] : null);?>
 <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>
</option>
			<?php
}
}
?>
		</select>
	</td>

		<td class="price">
		<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( ($_smarty_tpl->tpl_vars['purchase']->value->variant->price*$_smarty_tpl->tpl_vars['purchase']->value->amount) ));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

	</td>
	
		<td class="remove">
		<a href="cart/remove/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->id;?>
">
		<img src="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/img/delete.png" title="Удалить из корзины" alt="Удалить из корзины">
		</a>
	</td>
			
</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<tr style="background-color: #cfcfcf;">
	<th class="name"></th>
	<th class="price" colspan="2"></td>
	<th class="price" colspan="2">
		Итого
		<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['cart']->value->total_price ));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

	</th>
</tr>
</table>

<!-- <h2 style="margin-bottom:30px;">
	<b>Реквизиты для оплаты:</b> Р/с 26003000035938, 26009000034353 в АО "Укрэксимбанк" г. Харьков МФО 322313
</h2> -->

<h2>Адрес получателя</h2>
	
<div class="form cart_form">         
	<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
	<div class="alert alert-danger">
        <?php if ($_smarty_tpl->tpl_vars['error']->value == 'empty_name') {?>Введите имя<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['error']->value == 'empty_email') {?>Введите email<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['error']->value == 'captcha') {?>Капча введена неверно<?php }?>
    </div>
	<?php }?>
	<label>Имя, фамилия</label>
	<input name="name" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-format=".+" data-notice="Введите имя"/>
	
	<label>Email</label>
	<input name="email" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-format="email" data-notice="Введите email" />

	<label>Телефон</label>
	<input name="phone" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	
	<label>Способ доставки</label>
	<select id="deliver" name="deliver">
		<option value="2" <?php if ($_smarty_tpl->tpl_vars['deliver']->value == '2') {?>selected<?php }?>>Новая почта</option>
		<option value="1" <?php if ($_smarty_tpl->tpl_vars['deliver']->value == '1') {?>selected<?php }?>>Самовывоз</option>
	</select>
	
	<div id="del-np" >
	<label>Тип доставки</label>
	<select id="np_type" name="np_type">
		<option value="1" <?php if ($_smarty_tpl->tpl_vars['np_type']->value == '1') {?>selected<?php }?>>В отделение</option>
		<option value="2" <?php if ($_smarty_tpl->tpl_vars['np_type']->value == '2') {?>selected<?php }?>>По адресу</option>
	</select>
		
	<label>Город</label>
	<input name="city" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['city']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	
	<label id="by_branch">Номер отделения</label>
	<label id="by_address" style="display:none">Адрес доставки</label>
	<input name="address" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value, ENT_QUOTES, 'UTF-8', true);?>
"/>
	
	</div>
	
	<label>Способ оплаты</label>
	<select name="pay">
		<option value="1" <?php if ($_smarty_tpl->tpl_vars['pay']->value == '1') {?>selected<?php }?>>При получении</option>
		<option value="2" <?php if ($_smarty_tpl->tpl_vars['pay']->value == '2') {?>selected<?php }?>>Предоплата</option>
	</select>

	<label>Комментарий к&nbsp;заказу</label>
	<textarea name="comment" id="order_comment"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
	
	<div class="captcha"><img src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
" alt='captcha'/></div> 
	<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>
	
	<input type="submit" name="checkout" class="button" value="Оформить заказ">
	</div>
   
</form>
<?php } else { ?>
  В корзине нет товаров
<?php }?>

</div><?php }
}

<?php
/* Smarty version 3.1.32, created on 2020-02-04 16:39:16
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/emails/email_order_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e39821454ad02_58440961',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe472f9b058f9e258276f559f2f8828806a78d87' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/emails/email_order_admin.tpl',
      1 => 1527789025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e39821454ad02_58440961 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['order']->value->paid) {
$_smarty_tpl->_assignInScope('subject', "Заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id)." оплачен" ,false ,2);
} else {
$_smarty_tpl->_assignInScope('subject', "Новый заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id) ,false ,2);
}?>
<h1 style="font-weight:normal;font-family:arial;">
	<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/engine/index.php?module=OrderAdmin&id=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">Заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a>
	на сумму <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['main_currency']->value->id ));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['main_currency']->value->sign;?>

	<?php if ($_smarty_tpl->tpl_vars['order']->value->paid == 1) {?>оплачен<?php } else { ?>еще не оплачен<?php }?>,
	<?php if ($_smarty_tpl->tpl_vars['order']->value->status == 0) {?>ждет обработки<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status == 1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status == 2) {?>выполнен<?php }?>	
</h1>
<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Статус
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php if ($_smarty_tpl->tpl_vars['order']->value->status == 0) {?>
				ждет обработки      
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status == 1) {?>
				в обработке
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status == 2) {?>
				выполнен
			<?php }?>
		</td>
	</tr>
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Оплата
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php if ($_smarty_tpl->tpl_vars['order']->value->paid == 1) {?>
			<font color="green">оплачен</font>
			<?php } else { ?>
			не оплачен
			<?php }?>
		</td>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->name) {?>
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Имя, фамилия
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>

			<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>(<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/engine/index.php?module=UserAdmin&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
">зарегистрированный пользователь</a>)<?php }?>
		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->email) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Email
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->phone) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Телефон
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->phone, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_id) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Способ доставки
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_id == 1) {?>Самовывоз<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_id == 2) {?>Новая почта<?php }?>
		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->city) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Город\Область
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->city, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->address) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Адрес доставки
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->address, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_type) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Способ доставки
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_type == 1) {?>
				Самовывоз    
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_type == 2) {?>
				Новая Почта
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_type == 3) {?>
				Укрпочта
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_type == 4) {?>
				Интаим
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_type == 5) {?>
				Деливери
			<?php }?>
		</td>
	</tr>
	<?php }?>	
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Дата
		</td>
		<td style="padding:6px; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->date ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'time' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->date ));?>

		</td>
	</tr>
</table>

<h1 style="font-weight:normal;font-family:arial;">Покупатель заказал:</h1>

<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['purchases']->value, 'purchase');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->value) {
?>
	<tr>
		<td align="center" style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php $_smarty_tpl->_assignInScope('image', $_smarty_tpl->tpl_vars['purchase']->value->product->images[0]);?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><img border="0" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'resize' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value->filename,50,50 ));?>
"></a>
		</td>
		<td style="padding:6px; width:250; padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><?php echo $_smarty_tpl->tpl_vars['purchase']->value->product_name;?>
</a>
			<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant_name;?>
 <?php echo $_smarty_tpl->tpl_vars['purchase']->value->size_name;?>
 <?php echo $_smarty_tpl->tpl_vars['purchase']->value->color_name;?>

			<?php if ($_smarty_tpl->tpl_vars['purchase']->value->p_comment) {?><a href="#" title="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->p_comment;?>
">?</a><?php }?>
		</td>
		<td align=right style="padding:6px; text-align:right; width:150; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
 <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>
 &times; <?php if (($_smarty_tpl->tpl_vars['order']->value->price_type == 3) && ($_smarty_tpl->tpl_vars['purchase']->value->opt3 != 0)) {?>
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( ($_smarty_tpl->tpl_vars['purchase']->value->opt3),$_smarty_tpl->tpl_vars['currency']->value->id ));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			<?php } elseif (($_smarty_tpl->tpl_vars['order']->value->price_type == 2) && ($_smarty_tpl->tpl_vars['purchase']->value->opt2 != 0)) {?>
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( ($_smarty_tpl->tpl_vars['purchase']->value->opt2),$_smarty_tpl->tpl_vars['currency']->value->id ));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			<?php } elseif (($_smarty_tpl->tpl_vars['order']->value->price_type == 1) && ($_smarty_tpl->tpl_vars['purchase']->value->opt1 != 0)) {?>
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( ($_smarty_tpl->tpl_vars['purchase']->value->opt1),$_smarty_tpl->tpl_vars['currency']->value->id ));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			<?php } else { ?>
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( ($_smarty_tpl->tpl_vars['purchase']->value->price),$_smarty_tpl->tpl_vars['currency']->value->id ));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</td>
	</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	
	<tr>
		<td style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;"></td>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;font-weight:bold;">
			Итого
		</td>
		<td align="right" style="padding:6px; text-align:right; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;font-weight:bold;">
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['main_currency']->value->id ));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['main_currency']->value->sign;?>

		</td>
	</tr>
</table><?php }
}

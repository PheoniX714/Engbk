<?php /* Smarty version Smarty-3.1.18, created on 2017-11-28 18:30:25
         compiled from "/home/astyle/mdk.ua/www/engine/templates/html/emails/email_order_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18128506225a118767be9224-68579694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '884b6539097bd8833493222cedc4ec464a09e1b2' => 
    array (
      0 => '/home/astyle/mdk.ua/www/engine/templates/html/emails/email_order_admin.tpl',
      1 => 1511098925,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18128506225a118767be9224-68579694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a118767d262b3_99121381',
  'variables' => 
  array (
    'order' => 0,
    'config' => 0,
    'main_currency' => 0,
    'user' => 0,
    'purchases' => 0,
    'purchase' => 0,
    'image' => 0,
    'settings' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a118767d262b3_99121381')) {function content_5a118767d262b3_99121381($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['order']->value->paid) {?>
<?php $_smarty_tpl->tpl_vars['subject'] = new Smarty_variable("Заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id)." оплачен", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['subject'] = clone $_smarty_tpl->tpl_vars['subject'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['subject'] = new Smarty_variable("Новый заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['subject'] = clone $_smarty_tpl->tpl_vars['subject'];?>
<?php }?>
<h1 style="font-weight:normal;font-family:arial;">
	<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/engine/index.php?module=OrderAdmin&id=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">Заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a>
	на сумму <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['main_currency']->value->id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['main_currency']->value->sign;?>

	<?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>оплачен<?php } else { ?>еще не оплачен<?php }?>,
	<?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>ждет обработки<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>выполнен<?php }?>	
</h1>
<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Статус
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>
				ждет обработки      
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>
				в обработке
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>
				выполнен
			<?php }?>
		</td>
	</tr>
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Оплата
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>
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
			<?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_id==1) {?>Самовывоз<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_id==2) {?>Новая почта<?php }?>
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
			<?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_type==1) {?>
				Самовывоз    
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_type==2) {?>
				Новая Почта
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_type==3) {?>
				Укрпочта
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_type==4) {?>
				Интаим
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_type==5) {?>
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
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>

		</td>
	</tr>
</table>

<h1 style="font-weight:normal;font-family:arial;">Покупатель заказал:</h1>

<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">

	<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
	<tr>
		<td align="center" style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->tpl_vars['purchase']->value->product->images[0], null, 0);?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><img border="0" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,50,50);?>
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
 &times; <?php if (($_smarty_tpl->tpl_vars['order']->value->price_type==3)&&($_smarty_tpl->tpl_vars['purchase']->value->opt3!=0)) {?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->opt3),$_smarty_tpl->tpl_vars['currency']->value->id);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			<?php } elseif (($_smarty_tpl->tpl_vars['order']->value->price_type==2)&&($_smarty_tpl->tpl_vars['purchase']->value->opt2!=0)) {?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->opt2),$_smarty_tpl->tpl_vars['currency']->value->id);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			<?php } elseif (($_smarty_tpl->tpl_vars['order']->value->price_type==1)&&($_smarty_tpl->tpl_vars['purchase']->value->opt1!=0)) {?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->opt1),$_smarty_tpl->tpl_vars['currency']->value->id);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			<?php } else { ?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->price),$_smarty_tpl->tpl_vars['currency']->value->id);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</td>
	</tr>
	<?php } ?>
	
	<tr>
		<td style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;"></td>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;font-weight:bold;">
			Итого
		</td>
		<td align="right" style="padding:6px; text-align:right; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;font-weight:bold;">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['main_currency']->value->id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['main_currency']->value->sign;?>

		</td>
	</tr>
</table><?php }} ?>

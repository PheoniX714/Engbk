<?php
/* Smarty version 3.1.32, created on 2020-02-04 16:55:53
  from '/home/astyle/a-style.kh.ua/dev2/templates/default/html/order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e3985f9154598_86102321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '047e2673e566b732696068f56c48b4387a53a923' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/templates/default/html/order.tpl',
      1 => 1580828150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3985f9154598_86102321 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('meta_title', "Ваш заказ" ,false ,2);?>

<div class="cart-page">	
	
	<div class="row">
		<div class="col-md-12">
			<h1>Ваш заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
 
			<?php if ($_smarty_tpl->tpl_vars['order']->value->status == 0) {?>принят<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['order']->value->status == 1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status == 2) {?>выполнен<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['order']->value->paid == 1) {?>, оплачен<?php } else {
}?>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Данные Вашего заказа отправлены Вам на E-mail</h2>
		</div>
	</div>

		<div class="table-responsive">
			<table id="purchases" class="table table-striped">

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['purchases']->value, 'purchase');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->value) {
?>
		<tr>			
						<td class="name">
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product_name, ENT_QUOTES, 'UTF-8', true);?>

			</td>

						<td class="price">
				<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( ($_smarty_tpl->tpl_vars['purchase']->value->price) ));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 &times; <?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>

			</td>

						<td class="price">
				<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( ($_smarty_tpl->tpl_vars['purchase']->value->price*$_smarty_tpl->tpl_vars['purchase']->value->amount) ));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			</td>
		</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<tr style="background-color: #cfcfcf;">
			<th style="background-color: #cfcfcf;" class="name"></th>
			<th style="background-color: #cfcfcf;" class="price"></th>
			<th style="background-color: #cfcfcf;" class="price">
				итого <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->total_price ));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			</th>
		</tr>
	</table>
	</div>
</div>	
	

<div class="cart-box order-data order-compl"> 
	<div class="row">
				
		<div class="col-md-12">
			<h3>Детали заказа</h3>
		</div>

		<div class="col-md-12">         
			<table class="table table-striped table-bordered">
				<tr>
					<td class="hidden-xs">
						Дата заказа
					</td>
					<td>
						<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->date ));?>
 в
						<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'time' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->date ));?>

					</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['order']->value->name) {?>
				<tr>
					<td class="hidden-xs">
						Имя
					</td>
					<td>
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>

					</td>
				</tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['order']->value->email) {?>
				<tr>
					<td class="hidden-xs">
						Email
					</td>
					<td>
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>

					</td>
				</tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['order']->value->phone) {?>
				<tr>
					<td class="hidden-xs">
						Телефон
					</td>
					<td>
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->phone, ENT_QUOTES, 'UTF-8', true);?>

					</td>
				</tr>
				<?php }?>
				<tr>
					<td class="hidden-xs">
						Способ оплаты
					</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['order']->value->pay == 1) {?>При получении
						<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->pay == 2) {?>Предоплата
						<?php }?>
					</td>
				</tr>
				<tr>
					<td class="hidden-xs">
						Способ доставки
					</td>
					<td>
					<?php if ($_smarty_tpl->tpl_vars['order']->value->deliver == 1) {?>Самовывоз
						<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->deliver == 2) {?>Новая почта
						<?php }?>
					</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['order']->value->deliver == 2) {?>
				<tr>
					<td class="hidden-xs">
						Тип доставки
					</td>
					<td>
					<?php if ($_smarty_tpl->tpl_vars['order']->value->np_type == 1) {?>В отделение
						<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->np_type == 2) {?>По адресу
						<?php }?>
					</td>
				</tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['order']->value->city) {?>
				<tr>
					<td class="hidden-xs">
						Город
					</td>
					<td>
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->city, ENT_QUOTES, 'UTF-8', true);?>

					</td>
				</tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['order']->value->address) {?>
				<tr>
					<td class="hidden-xs">
						Адрес доставки
					</td>
					<td>
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->address, ENT_QUOTES, 'UTF-8', true);?>

					</td>
				</tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_type) {?>
				<tr>
					<td class="hidden-xs">
						Способ доставки
					</td>
					<td>
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
				<?php if ($_smarty_tpl->tpl_vars['order']->value->comment) {?>
				<tr>
					<td class="hidden-xs">
						Комментарий
					</td>
					<td>
						<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->comment, ENT_QUOTES, 'UTF-8', true));?>

					</td>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>
</div><?php }
}

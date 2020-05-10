<?php
/* Smarty version 3.1.32, created on 2020-03-08 16:07:11
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e64fc0faae698_72227291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cc35bf311e70968ce419eefc2f8b48d851fd9c7' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/order.tpl',
      1 => 1583676423,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e64fc0faae698_72227291 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/astyle/a-style.kh.ua/dev2/Smarty/libs/plugins/function.math.php','function'=>'smarty_function_math',),));
if ($_smarty_tpl->tpl_vars['order']->value->id) {
$_smarty_tpl->_assignInScope('meta_title', "Заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id) ,false ,8);
} else {
$_smarty_tpl->_assignInScope('meta_title', 'Новый заказ' ,false ,8);
}
$_smarty_tpl->_assignInScope('sm_groupe', 'orders' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', ((string)$_smarty_tpl->tpl_vars['order']->value->status) ,false ,8);?>

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-cart s-6"></i>
					</span>
					<span class="logo-text h4"><?php if ($_smarty_tpl->tpl_vars['order']->value->id) {?>Заказ №<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true);
} else { ?>Новый заказ<?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['order']->value->paid) {?>(<span class="text-green"><b>Оплачен</b></span>)<?php }?></span>
				</div>
			</div>
		</div>
	</div>

	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
			<div class="row">
				<div class="col-12 col-md-8 mb-5">
				<form method="post">
						
					<div class="card">
						 <div class="card-header">
							Данные заказа
						</div>
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Название товара</th>
										<th>Цена, за шт</th>
										<th>Количество</th>
									</tr>
								</thead>
								<tbody>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['purchases']->value, 'purchase');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->value) {
?>
									<tr class="c_item">
										<input type=hidden name=purchases[id][<?php echo $_smarty_tpl->tpl_vars['purchase']->value->id;?>
] value='<?php echo $_smarty_tpl->tpl_vars['purchase']->value->id;?>
'>
										<td>
											<?php if ($_smarty_tpl->tpl_vars['purchase']->value->product) {?>
											<a class="related_product_name" href="index.php?module=ProductAdmin&id=<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->id;?>
&return=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
"><?php echo $_smarty_tpl->tpl_vars['purchase']->value->product_name;?>
</a>
											<?php } else { ?>
											<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product_name;?>
				
											<?php }?>
										</td>
										<td>
											<span class=view_purchase><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['purchase']->value->price ));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
											<span class=edit_purchase style='display:none;'>
											<input type=text name=purchases[price][<?php echo $_smarty_tpl->tpl_vars['purchase']->value->id;?>
] value='<?php echo $_smarty_tpl->tpl_vars['purchase']->value->price;?>
' size=5>
											</span>
										</td>
										<td>
											<span class=view_purchase>
												<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
 <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>

											</span>
											<span class=edit_purchase style='display:none;'>
												<?php if ($_smarty_tpl->tpl_vars['purchase']->value->variant) {?>
												<?php echo smarty_function_math(array('equation'=>"min(max(x,y),z)",'x'=>$_smarty_tpl->tpl_vars['purchase']->value->variant->stock+$_smarty_tpl->tpl_vars['purchase']->value->amount*($_smarty_tpl->tpl_vars['order']->value->closed),'y'=>$_smarty_tpl->tpl_vars['purchase']->value->amount,'z'=>$_smarty_tpl->tpl_vars['settings']->value->max_order_amount,'assign'=>"loop"),$_smarty_tpl);?>

												<?php } else { ?>
												<?php echo smarty_function_math(array('equation'=>"x",'x'=>$_smarty_tpl->tpl_vars['purchase']->value->amount,'assign'=>"loop"),$_smarty_tpl);?>

												<?php }?>
												<select name=purchases[amount][<?php echo $_smarty_tpl->tpl_vars['purchase']->value->id;?>
]>
													<?php
$__section_amounts_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['loop']->value+1) ? count($_loop) : max(0, (int) $_loop));
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
											</span>			
										</td>
									</tr>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									<tr class="c_item total-price">
										<td colspan="5" class="text-right">
											Итого: <b><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->total_price ));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</b>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</form>
				</div>
				<div class="col-12 col-md-4">
					<div class="card mb-5">
						<div class="card-header">
							Данные клиента
						</div>
						<div class="card-body">
							<table class="table table-striped">
								<tbody>
									<tr>
										<th>Дата</th>
										<td><?php echo $_smarty_tpl->tpl_vars['order']->value->date;?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value->time;?>
</td>
									</tr>
									<tr>
										<th>Имя</th>
										<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</td>
									</tr>
									<tr>
										<th>Email</th>
										<td><a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>
?subject=Заказ%20№<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>
</a></td>
									</tr>
									<tr>
										<th>Телефон</th>
										<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->phone, ENT_QUOTES, 'UTF-8', true);?>
</td>
									</tr>
									<tr>
										<th>Город</th>
										<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->city, ENT_QUOTES, 'UTF-8', true);?>
</td>
									</tr>
									<tr>
										<th>Адрес доставки</th>
										<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->address, ENT_QUOTES, 'UTF-8', true);?>
</td>
									</tr>
									<tr>
										<th>Тип доставки</th>
										<td><?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_id == 1) {?>Самовывоз
											<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_id == 2) {?>Деливери
											<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_id == 3) {?>Новая почта<?php }?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card mb-5">
						<div class="card-header">
							Статус заказа
						</div>
						<div class="card-body">
						<form method="post">
							<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
							<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
							<div class="input-group mb-3 d-flex align-items-center">
								<select class="form-control" name="status">
									<option value='0' <?php if ($_smarty_tpl->tpl_vars['order']->value->status == 0) {?>selected<?php }?>>Новый</option>
									<option value='1' <?php if ($_smarty_tpl->tpl_vars['order']->value->status == 1) {?>selected<?php }?>>Принят</option>
									<option value='2' <?php if ($_smarty_tpl->tpl_vars['order']->value->status == 2) {?>selected<?php }?>>Выполнен</option>
									<option value='3' <?php if ($_smarty_tpl->tpl_vars['order']->value->status == 3) {?>selected<?php }?>>Удален</option>
								</select>
								<div class="input-group-append">
									<button class="btn btn-success btn-fab btn-sm" style="border-radius:50%;" type="submit" value="">
										<i class="icon-check"></i>
									</button>
								</div>
							</div>
						</form>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</div><?php }
}

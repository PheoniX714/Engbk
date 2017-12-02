<?php /* Smarty version Smarty-3.1.18, created on 2017-11-12 14:17:54
         compiled from "engine/templates/html/products/order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5435584985a070970567cd7-17015462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0afa3f42e3d36e5e08ce6d86f6a39d5ebe2c717b' => 
    array (
      0 => 'engine/templates/html/products/order.tpl',
      1 => 1510489073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5435584985a070970567cd7-17015462',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0709706f0851_30882202',
  'variables' => 
  array (
    'order' => 0,
    'message_success' => 0,
    'purchases' => 0,
    'purchase' => 0,
    'image' => 0,
    'currency' => 0,
    'settings' => 0,
    'loop' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0709706f0851_30882202')) {function content_5a0709706f0851_30882202($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/astyle/mdk.ua/www/Smarty/libs/plugins/function.math.php';
?><?php if ($_smarty_tpl->tpl_vars['order']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новый заказ', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('orders', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1><?php if ($_smarty_tpl->tpl_vars['order']->value->id) {?>Заказ №<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?>Новый заказ<?php }?></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="./index.php?module=OrdersAdmin"> Заказы</a></li>
		<li class="active"><?php if ($_smarty_tpl->tpl_vars['order']->value->id) {?>Заказ №<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?>Новый заказ<?php }?></li>
	</ol>
</section>

<section class="content">
  <div class="row">
	<form method=post id=order enctype="multipart/form-data">
	<div class="col-lg-9">
		<div class="box box-primary"> 
			<div class="box-header">
			  <i class="fa fa-shopping-cart"></i>
			  <h3 class="box-title" style="line-height:1.5">Данные заказа</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body no-padding">
				<!-- Основная форма -->
				<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
				<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 

				<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
				<!-- Системное сообщение -->
				<div class="col-lg-12">
					<div class="alert alert-success">
						<a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
						<?php if ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Заказ обновлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Заказ добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='status_updated') {?>Статус заказа обновлен<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_success']->value;?>
<?php }?>
					</div>
				</div>
				<!-- Системное сообщение (The End)-->
				<?php }?>
				
				<div class="col-lg-12 order-status"> 
					<div class="status-label">Статус заказа:</div>
					<select class="form-control" name="status">
						<option value='0' <?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>selected<?php }?>>Новый</option>
						<option value='1' <?php if ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>selected<?php }?>>Принят</option>
						<option value='2' <?php if ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>selected<?php }?>>Выполнен</option>
						<option value='3' <?php if ($_smarty_tpl->tpl_vars['order']->value->status==3) {?>selected<?php }?>>Удален</option>
					</select>
					<input class="btn btn-success btn-flat" type="submit" name="save" value="Сохранить" />
				</div> <!-- /.content-header -->

				<div class="col-lg-12">
					<table class="table table-striped table-bordered table-hover tabled-view black-th order-table">
						<thead>
							<tr>
								<th style="width:80px; font-size:18px; text-align:center;"><i class="fa fa-picture-o"></i></th>
								<th>Название товара</th>
								<th>Вариант</th>
								<th>Артикул</th>
								<th>Цена, за шт</th>
								<th>Количество</th>
							</tr>
						</thead>
						<tbody>
							<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
							<tr class="c_item">
								<td class="image">
									<input type=hidden name=purchases[id][<?php echo $_smarty_tpl->tpl_vars['purchase']->value->id;?>
] value='<?php echo $_smarty_tpl->tpl_vars['purchase']->value->id;?>
'>
									<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['purchase']->value->product->images), null, 0);?>
									<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
										<?php if ($_smarty_tpl->tpl_vars['purchase']->value->product) {?>
										<a class="related_product_name" href="index.php?module=ProductAdmin&id=<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->id;?>
&return=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
"><img class=product_icon src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,75,75);?>
'></a>
										<?php } else { ?>
										<img class=product_icon src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,75,75);?>
'>			
										<?php }?>
									<?php }?>
								</td>
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
									<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant_name;?>

								</td>
								<td>
									<?php if ($_smarty_tpl->tpl_vars['purchase']->value->sku) {?><?php echo $_smarty_tpl->tpl_vars['purchase']->value->sku;?>
<?php }?>
								</td>
								<td>
									<span class=view_purchase><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['purchase']->value->price);?>
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
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['name'] = 'amounts';
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['loop']->value+1) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
									</span>			
								</td>
							</tr>
							<?php } ?>
							<tr class="c_item total-price">
								<td colspan="6">
									Итого: <b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</b>
								</td>
							</tr>
						</tbody>
					</table>
				</div> <!-- /.table-responsive -->
			</div>		
		</div>		
	</div>		
	<div class="col-lg-3">
		<div class="box box-warning"> 
			<div class="box-header">
			  <i class="fa fa-info"></i>
			  <h3 class="box-title" style="line-height:1.5">Данные покупателя</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body no-padding">
				<div class="col-lg-12">
					<ul class="order_details">
						<li>
							<label class=property>Дата</label>
							<div>
							<?php echo $_smarty_tpl->tpl_vars['order']->value->date;?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value->time;?>

							</div>
						</li>
						<li>
							<label class=property>Имя</label>
							<div>
								<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>

							</div>
						</li>
						<li>
							<label class=property>Email</label>
							<div>
								<a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>
?subject=Заказ%20№<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>
</a>
							</div>
						</li>
						<li>
							<label class=property>Телефон</label>		
							<div>
								<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->phone, ENT_QUOTES, 'UTF-8', true);?>

							</div>
						</li>
						<li>
							<label class=property>Адрес доставки</label>			
							<div>
								<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->address, ENT_QUOTES, 'UTF-8', true);?>

							</div>
						</li>
					</ul>
				</div>
			</div>  
		</div>  
		</form>
	</div> 
</section> <?php }} ?>

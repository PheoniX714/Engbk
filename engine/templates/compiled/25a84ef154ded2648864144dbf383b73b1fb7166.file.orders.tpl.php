<?php /* Smarty version Smarty-3.1.18, created on 2017-11-12 14:27:01
         compiled from "engine/templates/html/products/orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16451198785a06d8d99b1c37-95876005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25a84ef154ded2648864144dbf383b73b1fb7166' => 
    array (
      0 => 'engine/templates/html/products/orders.tpl',
      1 => 1510489620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16451198785a06d8d99b1c37-95876005',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a06d8d9a4f7c3_21454792',
  'variables' => 
  array (
    'keyword' => 0,
    'status' => 0,
    'orders_count' => 0,
    'orders' => 0,
    'order' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06d8d9a4f7c3_21454792')) {function content_5a06d8d9a4f7c3_21454792($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Заказы', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
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
	<script src="./templates/js/modules/orders.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1><?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>Поиск заказов<?php } elseif ($_smarty_tpl->tpl_vars['status']->value===0) {?>Новые заказы<?php } elseif ($_smarty_tpl->tpl_vars['status']->value==1) {?>Принятые заказы<?php } elseif ($_smarty_tpl->tpl_vars['status']->value==2) {?>Выполненные заказы<?php } elseif ($_smarty_tpl->tpl_vars['status']->value==3) {?>Удаленные заказы<?php }?></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Заказы</li>
	</ol>
</section>

<section class="content">
  <div class="row">
	<div class="col-lg-9">
	<form id="list_form" method="post">
	  <div class="box box-success"> 
		<div class="box-header">
		  <i class="fa fa-th-list"></i>
		  <h3 class="box-title" style="line-height:1.5"><?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>Найдено <?php }?><?php if ($_smarty_tpl->tpl_vars['orders_count']->value) {?><?php echo $_smarty_tpl->tpl_vars['orders_count']->value;?>
<?php } else { ?>Нет<?php }?> заказ<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['orders_count']->value,'','ов','а');?>
</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th orders-table" id="functional-table">
                <tbody>
				<tr>
					<th class="checkbox-cell ln-inherit">
						<input type="checkbox" class="minimal checkbox-toggle">
					</th>
					<th class="id-cell">ID</th>
					<th>Заказ</th>
					<th style="width:150px;">Оформлен</th>
					<th style="width:150px;">На сумму</th>
					<th class="actions-cell" style="width:100px;">Действия</th>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
				<tr>
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
					</td>
					<td class="id-cell">
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true);?>

					</td>
					<td class="name-cell">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'OrderAdmin','id'=>$_smarty_tpl->tpl_vars['order']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
					</td>
					<td class="date-cell">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
 в <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>

					</td>
					<td class="price-cell m-align">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

					</td>
					<td class="actions-cell" style="width:100px;">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'OrderAdmin','id'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl);?>
" class="btn btn-sm btn-flat btn-primary btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
						<button class="delete btn btn-sm btn-flat btn-danger btn-actions" data-toggle="tooltip" title="Удалить" ><i class="fa fa-trash-o"></i></button>
					</td>
						
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
					<td colspan="6">
						Заказов не найдено
					</td>
				</tr>
				<?php }?>
				</tbody>
			</table>
			<div class="col-lg-12">
			<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			</div>
		</div>
		<!-- /.box-body -->		
	  </div>
	  <!-- /.box -->
	  
	  <div class="row">
		<div class="form-group col-lg-3">
			<select id="action" class="form-control" name="action">
				<?php if ($_smarty_tpl->tpl_vars['status']->value!==0) {?><option value="set_status_0">В новые</option><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['status']->value!==1) {?><option value="set_status_1">В принятые</option><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['status']->value!==2) {?><option value="set_status_2">В выполненные</option><?php }?>
				<option value="delete">Удалить выбранные заказы</option>
			</select>
		</div>
		  
		<div class="col-lg-2">
			<button type="submit" class="btn btn-block btn-success btn-flat"value="Применить">Применить</button>
		</div>
	  </div>
	  </form>
	</div>
	
	<div class="col-lg-3">
		<form method="get">
		<label>Фильтр заказов по статусу:</label>
		<select class="form-control" style="cursor:pointer;margin-bottom:20px;font-weight:bold;" onchange="if(this.value)window.location.href=this.value">
			<option value="/engine/index.php?module=OrdersAdmin&status=0" <?php if ($_smarty_tpl->tpl_vars['status']->value==0) {?>selected<?php }?>>Новые</option>
			<option value="/engine/index.php?module=OrdersAdmin&status=1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1) {?>selected<?php }?>>Принятые</option>
			<option value="/engine/index.php?module=OrdersAdmin&status=2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2) {?>selected<?php }?>>Выполненные</option>
			<option value="/engine/index.php?module=OrdersAdmin&status=3" <?php if ($_smarty_tpl->tpl_vars['status']->value==3) {?>selected<?php }?>>Удаленные</option>
		</select>
		
		<label>Поиск по заказам:</label>
		
		<div class="form-group">
			<div class="input-group">
				<input type="hidden" name="module" value="OrdersAdmin">
				<input class="form-control" id="appendedInputButton" name="keyword" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
">
				<span class="input-group-btn">
					<button class="btn btn-flat btn-success" type="submit" value=""><i class="fa fa-search"></i></button>
				</span>
			</div>
		</div>
		</form>
	</div>
	
	<!-- /.col -->
  </div>
  <!-- /.row -->
</section><?php }} ?>

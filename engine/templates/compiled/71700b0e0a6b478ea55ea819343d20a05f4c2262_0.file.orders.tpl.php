<?php
/* Smarty version 3.1.32, created on 2020-03-08 16:27:23
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e6500cbcab809_00999057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71700b0e0a6b478ea55ea819343d20a05f4c2262' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/orders.tpl',
      1 => 1583677639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pagination.tpl' => 1,
  ),
),false)) {
function content_5e6500cbcab809_00999057 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('meta_title', 'Заказы' ,false ,8);
$_smarty_tpl->_assignInScope('sm_groupe', 'orders' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', ((string)$_smarty_tpl->tpl_vars['status']->value) ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
	$(function () {

		$("#check_all").change(function() {
			if($('#check_all').hasClass('checked')){
				$('#list .custom-control-input:not(:disabled)').attr('checked', false);
				$('#check_all').removeClass('checked');
			}else{
				$('#list .custom-control-input:not(:disabled)').attr('checked', true);
				$('#check_all').addClass('checked');
			}
		});		
		  
		$("button.delete").on("click", function(){
			$('#list .todo-item input[type="checkbox"][name*="check"]').prop('checked', false);
			$(this).closest("#list .todo-item").find('input[type="checkbox"][name*="check"]').prop('checked', true);
			$(this).closest("form").find('select[name="action"] option[value=delete]').prop('selected', true);
			$(this).closest("form").submit();
			return false;
		});
		
		$("form").submit(function() {
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
		});
		
	  });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-cart s-6"></i>
					</span>
					<span class="logo-text h4"><?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>Поиск заказов<?php } elseif ($_smarty_tpl->tpl_vars['status']->value === 0) {?>Новые заказы<?php } elseif ($_smarty_tpl->tpl_vars['status']->value == 1) {?>Принятые заказы<?php } elseif ($_smarty_tpl->tpl_vars['status']->value == 2) {?>Выполненные заказы<?php } elseif ($_smarty_tpl->tpl_vars['status']->value == 3) {?>Удаленные заказы<?php }?></span>
				</div>
			</div>
		</div>
	</div>

	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
			<div class="row">
				<div class="col-12 col-md-9 mb-5">
				<form method="post">
				<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">		
					<div id="todo" class="card">
						
						<div id="list" class="todo-items w-100">
							<div class="todo-item pr-2 pl-5 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

								<label id="check_all" class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" />
									<span class="custom-control-indicator"></span>
								</label>

								<div class="info col px-4">

									<div class="title">
										Информация о заказе
									</div>
								</div>

							</div>
							<?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
							<div class="todo-item pr-2 pl-5 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
"/>
									<span class="custom-control-indicator"></span>
								</label>
							
								<div class="info col px-4 d-flex align-items-center justify-content-left">

									<div class="title mr-4">
										<a class="td-wh-none" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'OrderAdmin','id'=>$_smarty_tpl->tpl_vars['order']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl ) );?>
">#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
									</div>
								</div>
								
								<div class="info col-3 px-4 d-flex align-items-center justify-content-left">
									<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->date ));?>
 в <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'time' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->date ));?>

								</div>
								
								<div class="info col-3 px-4 d-flex align-items-center justify-content-left">
									<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'convert' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value->total_price ));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

								</div>

								<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

									<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'OrderAdmin','id'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl ) );?>
" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
										<i class="icon icon-pencil text-blue"></i>
									</a>
									
									<button type="button" class="btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить">
										<i class="icon icon-trash text-red"></i>
									</button>

								</div>
							</div>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							<?php } else { ?>
							<div class="card-body">
								Заказов не найдено
							</div>
							<?php }?>
						</div>
						
						<div class="card-footer py-6">
							 <div class="row">
								<div class="col-12 col-sm-4 col-md-3 mb-3 mb-sm-0">
									<select id="action" class="form-control" name="action">
										<?php if ($_smarty_tpl->tpl_vars['status']->value !== 0) {?><option value="set_status_0">В новые</option><?php }?>
										<?php if ($_smarty_tpl->tpl_vars['status']->value !== 1) {?><option value="set_status_1">В принятые</option><?php }?>
										<?php if ($_smarty_tpl->tpl_vars['status']->value !== 2) {?><option value="set_status_2">В выполненные</option><?php }?>
										<option value="delete">Удалить выбранные заказы</option>
									</select>
								</div>
								  
								<div class="col-12 col-md-2 col-sm-6 col-xs-6">
									<button type="submit" class="btn btn-secondary btn-sm fuse-ripple-ready" value="Применить">Применить</button>
								</div>
							</div>
						 </div>
					</div>
				</form>
				</div>
				<div class="col-12 col-md-3">
					<div class="card">
						<div class="card-body">
						<form method="get">
							<div class="form-group">
								<label for="order-type">Фильтр заказов по статусу:</label>
								<select class="form-control" id="order-type" onchange="if(this.value)window.location.href=this.value">
									<option value="/engine/index.php?module=OrdersAdmin&status=0" <?php if ($_smarty_tpl->tpl_vars['status']->value == 0) {?>selected<?php }?>>Новые</option>
									<option value="/engine/index.php?module=OrdersAdmin&status=1" <?php if ($_smarty_tpl->tpl_vars['status']->value == 1) {?>selected<?php }?>>Принятые</option>
									<option value="/engine/index.php?module=OrdersAdmin&status=2" <?php if ($_smarty_tpl->tpl_vars['status']->value == 2) {?>selected<?php }?>>Выполненные</option>
									<option value="/engine/index.php?module=OrdersAdmin&status=3" <?php if ($_smarty_tpl->tpl_vars['status']->value == 3) {?>selected<?php }?>>Удаленные</option>
								</select>
							</div>
							
							<div class="input-group mb-3">
								<input type="hidden" name="module" value="OrdersAdmin">
								<input name="keyword" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="form-control" placeholder="Поиск по заказам" aria-label="Поиск по заказам" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-secondary btn-fab btn-sm" style="border-radius:50%;" type="submit" value="">
										<i class="icon-magnify"></i>
									</button>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
				<div class="col-12">
				<?php $_smarty_tpl->_subTemplateRender('file:pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}

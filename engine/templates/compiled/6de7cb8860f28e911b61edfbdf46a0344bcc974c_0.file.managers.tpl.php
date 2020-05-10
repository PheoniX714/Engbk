<?php
/* Smarty version 3.1.32, created on 2020-03-08 18:25:54
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/managers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e651c928e10b6_85763456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6de7cb8860f28e911b61edfbdf46a0344bcc974c' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/managers.tpl',
      1 => 1583684673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e651c928e10b6_85763456 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('meta_title', 'Менеджеры' ,false ,8);
$_smarty_tpl->_assignInScope('sm_groupe', 'settings' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'managers' ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);
echo '<script'; ?>
>
	$(function() {
		$("#check_all").change(function() {
			if($('#check_all').hasClass('checked')){
				$('#list .custom-control-input:not(:disabled)').attr('checked', false);
				$('#check_all').removeClass('checked');
			}else{
				$('#list .custom-control-input:not(:disabled)').attr('checked', true);
				$('#check_all').addClass('checked');
			}
		});
	});

	$('#managers-table').DataTable({
		paging:   false,
		info:   false,
		responsive: true,
		columnDefs: [
			{ "orderable": false, "targets": 0 },
			{ "orderable": false, "targets": 4 }
		],
		dom       : 'rt<"dataTables_footer"ip>'
	});
	
	$("button.delete").on("click", function(){
		$('#list tr td input[type="checkbox"][name*="check"]').prop('checked', false);
		$(this).closest("#list tr").find('input[type="checkbox"][name*="check"]').prop('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').prop('selected', true);
		$(this).closest("form").submit();
		return false;
	});
	
	$("form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
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
						<i class="icon-account-multiple s-6"></i>
					</span>
					<span class="logo-text h4">Менеджеры</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ManagerAdmin','id'=>null),$_smarty_tpl ) );?>
" class="btn btn-light fuse-ripple-ready"><i class="icon-account-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить менеджера</span></a>
		</div>
	</div>
	<!-- / HEADER -->

	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group no-gutters">
		
			<form method="post">
			<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
				<div class="row">				
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Список менеджеров</b>
							</div>
							<div class="card-body p-0">
								<table id="managers-table" class="table table-styled table-striped check-all">
									<thead>
										<tr>
											<th class="checkbox-cell secondary-text">
												<div class="table-header">
												   <label id="check_all" class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" />
														<span class="custom-control-indicator"></span>
													</label>
												</div>
											</th>
											<th class="secondary-text">
												<div class="table-header">
													<span class="column-title">#</span>
												</div>
											</th>
											<th class="secondary-text">
												<div class="table-header">
													<span class="column-title">Логин</span>
												</div>
											</th>
											<th class="secondary-text m-none">
												<div class="table-header">
													<span class="column-title">Последний вход</span>
												</div>
											</th>
											<th class="secondary-text">
												<div class="table-header">
													<span class="column-title">Действия</span>
												</div>
											</th>
										</tr>
									</thead>
									<tbody id="list">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['managers']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
										<tr>
											<td class="checkbox-cell">
												<label class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" name="check[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['manager']->value->id == $_smarty_tpl->tpl_vars['m']->value->id) {?>disabled<?php }?> />
													<span class="custom-control-indicator"></span>
												</label>
											</td>
											<td><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->id, ENT_QUOTES, 'UTF-8', true);?>
</b></td>
											<td><b><a class="h-line" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ManagerAdmin','id'=>urlencode($_smarty_tpl->tpl_vars['m']->value->id)),$_smarty_tpl ) );?>
" data-toggle="tooltip" data-placement="bottom" title="Редактировать"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->login, ENT_QUOTES, 'UTF-8', true);?>
</a></b></td>
											<td class="m-none"><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->last_login, ENT_QUOTES, 'UTF-8', true);?>
</b></td>
											<td>
												<a class="shortcut-button btn btn-icon" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ManagerAdmin','id'=>urlencode($_smarty_tpl->tpl_vars['m']->value->id)),$_smarty_tpl ) );?>
" data-toggle="tooltip" data-placement="bottom" title="Редактировать"><i class="icon icon-account-edit s-6"></i></a>
												<?php if ($_smarty_tpl->tpl_vars['manager']->value->id != $_smarty_tpl->tpl_vars['m']->value->id && $_smarty_tpl->tpl_vars['m']->value->id != 1) {?>
												<button class="shortcut-button btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить"><i class="icon icon-trash text-red-A700 s-6"></i></button>
												<?php }?>
											</td>
										</tr>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										
									</tbody>
								</table>
							</div>
							<div class="card-footer py-6">
								<div class="row">
									<div class="col-12 col-sm-4 col-md-3 mb-3 mb-sm-0">
										<select id="action" class="form-control" name="action">
											<option value="">Выберите действие</option>
											<option value="delete">Удалить</option>
										</select>
									</div>
									  
									<div class="col-12 col-md-2 col-sm-6 col-xs-6">
										<button type="submit" class="btn btn-secondary btn-sm fuse-ripple-ready" value="Применить">Применить</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div><?php }
}

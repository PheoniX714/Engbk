<?php
/* Smarty version 3.1.32, created on 2020-03-08 18:34:53
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/manager.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e651ead1f9787_43686144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a86b6ba797918f0b69657f479272586abe879bfa' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/manager.tpl',
      1 => 1583685289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e651ead1f9787_43686144 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('sm_groupe', 'settings' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'managers' ,false ,8);?>

<?php if ($_smarty_tpl->tpl_vars['m']->value->id) {
$_smarty_tpl->_assignInScope('meta_title', $_smarty_tpl->tpl_vars['m']->value->login ,false ,8);
} else {
$_smarty_tpl->_assignInScope('meta_title', 'Новый менеджер' ,false ,8);
}?>


<?php echo '<script'; ?>
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
<?php echo '</script'; ?>
>


<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-account s-6"></i>
					</span>
					<span class="logo-text h4"><?php if ($_smarty_tpl->tpl_vars['m']->value->id) {
echo $_smarty_tpl->tpl_vars['m']->value->login;
} else { ?>Новый менеджер<?php }?></span>
				</div>
			</div>
		</div>
	</div>
	
	<form method="post">
	<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" />
	
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group no-gutters">
				
				<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
				<?php echo '<script'; ?>
>  
					$(document).ready(function(){  
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.success({
						  title: 'Готово!',
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'added') {?>Менеджер добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value == 'updated') {?>Менеджер обновлен<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['message_success']->value, ENT_QUOTES, 'UTF-8', true);
}?>"
						});
					});   
				<?php echo '</script'; ?>
> 
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
				<?php echo '<script'; ?>
>  
					$(document).ready(function(){   
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.error({
						  title: 'Ой, что то не так...',
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_error']->value == 'login_exists') {?>Менеджер с таким логином уже существует<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value == 'empty_login') {?>Введите логин менеджера<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value == 'empty_email') {?>Введите email менеджера<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['message_error']->value, ENT_QUOTES, 'UTF-8', true);
}?>"
						});
					});   
				<?php echo '</script'; ?>
> 
				<?php }?>
				
				<div class="row">				
					<div class="col-12 col-md-8 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Данные менеджера</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="login"  placeholder="Введите логин" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->login, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="32" autocomplete="new-login">
											<label for="name">Логин</label>
											<small id="nameHelp" class="form-text text-muted">Логин для входа в админ панель</small>
										</div>
									</div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password" value="" placeholder="Введите новый пароль" autocomplete="new-password">
											<label for="password">Пароль</label>
											<small id="passwordHelp" class="form-text text-muted">Оставьте поле пустым, если не хотите изменять пароль</small>
										</div>
									</div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->email, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Введите Email" autocomplete="new-email">
											<label for="email">Email</label>
											<small id="emailHelp" class="form-text text-muted">Email для восстановления пароля</small>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-12 text-right">
										<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-12 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Дополнительная информация</b>
							</div>
							<div class="card-body">
								<div class="row">
									<ul class="list-group dense">
										<li class="list-group-item">
											<i class="icon icon-calendar-clock"></i>
											<div class="list-item-content"><b>Последний визит:</b> <?php if ($_smarty_tpl->tpl_vars['m']->value->last_login) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->last_login, ENT_QUOTES, 'UTF-8', true);
} else { ?>Визитов не обнаружено<?php }?></div>
										</li>

										<li class="list-group-item">
											<i class="icon icon-web"></i>
											<div class="list-item-content"><b>Последний вход с IP:</b> <?php if ($_smarty_tpl->tpl_vars['m']->value->last_ip) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->last_ip, ENT_QUOTES, 'UTF-8', true);
} else { ?>Визитов не обнаружено<?php }?></div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Права доступа</b>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table table-styled table-striped table-hover">
										<thead>
											<tr>
												<th class="secondary-text px-4 text-center">
													<div class="table-header">
													   <label id="check_all" class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" />
															<span class="custom-control-indicator"></span>
														</label>
													</div>
												</th>
												<th class="secondary-text">
													<div class="table-header">
														<span class="column-title">Модуль</span>
													</div>
												</th>
											</tr>
										</thead>

										<tbody id="list">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['perms']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
											<tr <?php if ($_smarty_tpl->tpl_vars['m']->value->permissions && in_array($_smarty_tpl->tpl_vars['p']->value['code'],$_smarty_tpl->tpl_vars['m']->value->permissions)) {?>class="success"<?php }?>>
												<td class="checkbox-cell px-4 text-center">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['p']->value['code'];?>
" class="custom-control-input" <?php if ($_smarty_tpl->tpl_vars['manager']->value->id == $_smarty_tpl->tpl_vars['m']->value->id) {?>disabled<?php }?> name="permissions[]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['code'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value->permissions && in_array($_smarty_tpl->tpl_vars['p']->value['code'],$_smarty_tpl->tpl_vars['m']->value->permissions)) {?>checked<?php }?> <?php if ($_smarty_tpl->tpl_vars['m']->value->id == $_smarty_tpl->tpl_vars['manager']->value->id || $_smarty_tpl->tpl_vars['m']->value->id == 1) {?>disabled<?php }?> />
														<span class="custom-control-indicator blue"></span>
													</label>
												</td>
												<td><?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
</td>
											</tr>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-12 text-right">
										<button class="btn btn-success btn-sm fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	</form>
</div><?php }
}

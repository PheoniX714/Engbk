{$sm_groupe = 'settings' scope='root'}
{$sm_item = 'managers' scope='root'}

{if $m->id}
{$meta_title = $m->login scope='root'}
{else}
{$meta_title = 'Новый менеджер' scope='root'}
{/if}

{literal}
<script>
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
</script>
{/literal}

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-account s-6"></i>
					</span>
					<span class="logo-text h4">{if $m->id}{$m->login}{else}Новый менеджер{/if}</span>
				</div>
			</div>
		</div>
	</div>
	
	<form method="post">
	<input type=hidden name="session_id" value="{$smarty.session.id}">
	<input type="hidden" name="id" value="{$m->id|escape}" />
	
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group no-gutters">
				
				{if $message_success}
				<script>  
					$(document).ready(function(){  
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.success({
						  title: 'Готово!',
						  text: "{if $message_success=='added'}Менеджер добавлен{elseif $message_success=='updated'}Менеджер обновлен{else}{$message_success|escape}{/if}"
						});
					});   
				</script> 
				{/if}
				
				{if $message_error}
				<script>  
					$(document).ready(function(){   
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.error({
						  title: 'Ой, что то не так...',
						  text: "{if $message_error=='login_exists'}Менеджер с таким логином уже существует{elseif $message_error=='empty_login'}Введите логин менеджера{elseif $message_error=='empty_email'}Введите email менеджера{else}{$message_error|escape}{/if}"
						});
					});   
				</script> 
				{/if}
				
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
											<input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="login"  placeholder="Введите логин" value="{$m->login|escape}" maxlength="32" autocomplete="new-login">
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
											<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{$m->email|escape}" placeholder="Введите Email" autocomplete="new-email">
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
											<div class="list-item-content"><b>Последний визит:</b> {if $m->last_login}{$m->last_login|escape}{else}Визитов не обнаружено{/if}</div>
										</li>

										<li class="list-group-item">
											<i class="icon icon-web"></i>
											<div class="list-item-content"><b>Последний вход с IP:</b> {if $m->last_ip}{$m->last_ip|escape}{else}Визитов не обнаружено{/if}</div>
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
											{foreach $perms as $p}
											<tr {if $m->permissions && in_array($p.code, $m->permissions)}class="success"{/if}>
												<td class="checkbox-cell px-4 text-center">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" id="{$p.code}" class="custom-control-input" {if $manager->id == $m->id}disabled{/if} name="permissions[]" value="{$p.code}" {if $m->permissions && in_array($p.code, $m->permissions)}checked{/if} {if $m->id==$manager->id or $m->id == 1}disabled{/if} />
														<span class="custom-control-indicator blue"></span>
													</label>
												</td>
												<td>{$p.title}</td>
											</tr>
											{/foreach}
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
</div>
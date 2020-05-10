{$meta_title='Менеджеры' scope='root'}
{$sm_groupe = 'settings' scope='root'}
{$sm_item = 'managers' scope='root'}

{capture name=js}
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
</script>
{/capture}

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
			<a href="{url module=ManagerAdmin id=null}" class="btn btn-light fuse-ripple-ready"><i class="icon-account-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить менеджера</span></a>
		</div>
	</div>
	<!-- / HEADER -->

	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group no-gutters">
		
			<form method="post">
			<input type="hidden" name="session_id" value="{$smarty.session.id}">
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
										{foreach $managers as $m}
										<tr>
											<td class="checkbox-cell">
												<label class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" name="check[]" value="{$m->id|escape}" {if $manager->id == $m->id}disabled{/if} />
													<span class="custom-control-indicator"></span>
												</label>
											</td>
											<td><b>{$m->id|escape}</b></td>
											<td><b><a class="h-line" href="{url module=ManagerAdmin id=$m->id|urlencode}" data-toggle="tooltip" data-placement="bottom" title="Редактировать">{$m->login|escape}</a></b></td>
											<td class="m-none"><b>{$m->last_login|escape}</b></td>
											<td>
												<a class="shortcut-button btn btn-icon" href="{url module=ManagerAdmin id=$m->id|urlencode}" data-toggle="tooltip" data-placement="bottom" title="Редактировать"><i class="icon icon-account-edit s-6"></i></a>
												{if $manager->id != $m->id and $m->id != 1}
												<button class="shortcut-button btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить"><i class="icon icon-trash text-red-A700 s-6"></i></button>
												{/if}
											</td>
										</tr>
										{/foreach}
										
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
</div>
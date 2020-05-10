{$sm_groupe = 'settings' scope='root'}
{$sm_item = 'languages' scope='root'}
{$sm_sub_item = 'lang_constants' scope='root'}

{$meta_title = 'Языковые константы' scope='root'}

{capture name=js}
{literal}
<script>
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
				
		$("form").submit(function() {
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
		});
		
	  });
</script>
{/literal}
{/capture}

<div id="contacts" class="page-layout simple left-sidebar-floating tabbed">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-translate s-6"></i>
					</span>
					<span class="logo-text h4">Языковые константы</span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="page-content">
		<ul class="nav nav-tabs blue-tabs">
			
			<li class="nav-item">
				<a class='nav-link btn {if $sm_sub_item == "languages"}active{/if}' href="{url module=LanguagesAdmin id=null}" >Список языков</a>
			</li>
			
			<li class="nav-item">
				<a class='nav-link btn {if $sm_sub_item == "lang_constants"}active{/if}' href="{url module=LangConstantsAdmin menu_id=$m->id}" >Языковые константы</a>
			</li>

		</ul>
	</div>
	
	<form method=post id=product enctype="multipart/form-data">
	<input type=hidden name="session_id" value="{$smarty.session.id}">
	
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group row no-gutters">
			
				{if $message_success}
				<div class="col-md-12 p-3">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<h4><i class="icon icon-check"></i> {if $message_success == 'saved'}Константы успешно сохранены{/if}</h4>
					</div>
				</div>
				{/if}
				
				<div class="col-12 p-3">

					<div class="card mb-3">
						<div class="widget-header px-4 py-6 row no-gutters align-items-center justify-content-between">
							<span class="h5">Список констант</span>
							{if $mode == 'edit'}
							<div>
								<button type="button" class="btn btn-success btn-fab btn-sm fuse-ripple-ready mr-3" data-toggle="modal" data-target="#newConstant">
									<i class="icon-plus"></i>
								</button>
								
								<a href="{url mode=view}" class="btn btn-secondary btn-fab btn-sm fuse-ripple-ready">
									<i class="icon-pencil-off"></i>
								</a>
							</div>
							{else}
							<a href="{url mode=edit}" class="btn btn-secondary btn-fab btn-sm fuse-ripple-ready">
								<i class="icon-pencil"></i>
							</a>
							{/if}
						</div>

						<div class="divider"></div>

						<div class="widget-content">
							<div class="table-responsive">
								<table id="list" class="table table-striped">
									<thead>
										<tr>
											{if $mode == 'edit'}
											<th width="56">
												<label id="check_all" class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" />
													<span class="custom-control-indicator"></span>
												</label>
											</th>
											{/if}
											<th>Переменная</th>
											{foreach $languages as $l}
											<th>Значение {$l->code}</th>
											{/foreach}
										</tr>
									</thead>
									<tbody>
										{if $mode == 'edit'}
										{foreach $constants as $c}
										<tr>
											<td>
												<label class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" name="check[]" value="{$c->id}"/>
													<span class="custom-control-indicator"></span>
												</label>
											</td>
											<td>
												<div class="form-group pt-0 mb-0">
													<input type="text" class="form-control" name="constants[{$c->id}]" value="{$c->value}" placeholder="Название константы на латинице">
												</div>
											</td>
											{foreach $languages as $l}
											<td>
												<div class="form-group pt-0 mb-0">
													<input type="text" class="form-control" name="constants_values[{$c->id}][{$l->code}]" value="{$constants_values[$c->id][$l->code]}" placeholder="Значение {$l->code}">
												</div>
											</td>
											{/foreach}
										</tr>
										{/foreach}
										{else}
										{foreach $constants as $c}
										<tr>
											<td>
												{$c->value}
											</td>
											{foreach $languages as $l}
											<td>
												{$constants_values[$c->id][$l->code]}
											</td> 
											{/foreach}
										</tr>
										{/foreach}
										{/if}
									</tbody>
								</table>
							</div>
						</div>	
						
						<div class="divider"></div>
						
						<div class="widget-footer row px-4 py-6">
							<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 m-xs-3">
								<select id="action" class="form-control" name="action">
									<option value="">Выберите действие</option>
									<option value="delete">Удалить</option>
								</select>
							</div>
							
							<div class="col-md-2 col-sm-6 col-xs-6">
								<button type="submit" class="btn btn-secondary btn-sm fuse-ripple-ready" value="Применить">Применить</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

{if $mode == 'edit'}
<div id="newConstant" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="newConstantLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<form method="post">
		<input type="hidden" name="session_id" value="{$smarty.session.id}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newConstantLabel">Добавление новой константы</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" name="new_constants[]" value="" placeholder="Название константы на латинице">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-sm btn-success">Добавить</button>
            </div>
        </div>
		</form>
    </div>
</div>
{/if}
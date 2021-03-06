{* Title *}
{$meta_title = "Бренды" scope='root'}
{$sm_groupe = 'products' scope='root'}
{$sm_item = "brands" scope='root'}

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
</script>
{/literal}
{/capture}

<div id="contacts" class="page-layout simple left-sidebar-floating tabbed">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-apple s-6"></i>
					</span>
					<span class="logo-text h4">Бренды</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="./index.php?module=BrandAdmin" class="btn btn-light fuse-ripple-ready"><i class="icon-file-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить бренд</span></a>
		</div>
	</div>
	
	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
		
		<form method="get">
			<input type="hidden" name="module" value="BrandsAdmin">
			<div class="collapse {if $show_filters}show{/if}" id="filters">
				<div class="card mb-3">
					<div class="card-body d-flex align-items-end flex-wrap">
						<div class="col-12 col-sm-4 col-md-3">
							<div class="form-group mb-2">
								<input type="text" class="form-control" id="keyword" name="keyword" aria-describedby="meta_titleHelp" placeholder="Введите название бренда" value="{$keyword|escape}" autocomplete="off">
								<label for="keyword">Название бренда</label>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-12 text-right">
								<a class="btn btn-danger text-white btn-sm" href="/engine/index.php?module=ProductsAdmin">Очистить</a>
								<button class="btn btn-primary btn-sm" type="submit">Фильтровать</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<form method="post">
		<input type="hidden" name="session_id" value="{$smarty.session.id}">	
			<div id="todo" class="card">
				
				<div id="list" class="todo-items w-100">
					<div class="todo-item pr-4 pl-4 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">
						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4">

							<div class="title d-flex justify-content-between align-items-center">
								Название бренда
								
								<button class="btn btn-icon pull-right" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters"><i class="icon-settings" data-toggle="tooltip" data-placement="bottom" title="Открыть/Закрыть фильтры"></i></button>
							</div>
						</div>
					</div>
					
					{if $brands}
					<div id="brands_list">
						{foreach $brands as $brand}
						<div class="sort-item">
							<div class="todo-item  pl-4 pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="check[]" value="{$brand->id}" />
									<span class="custom-control-indicator"></span>
								</label>

								<div class="info col px-4 d-flex align-items-start align-sm-items-center justify-content-left flex-column flex-sm-row">
									<div class="title mr-4">
										<a class="td-wh-none {if !$brand->name}text-red{/if}" href="{url module=BrandAdmin id=$brand->id language_id=$filter_language return=null}">{if !$brand->name}Отсутствует перевод{else}{$brand->name|escape}{/if}</a>
									</div>

									<div class="tags">
										{if $brand->need_translate and $brand->need_translate|count > 0}
										<div class="tag badge language-tag">
											<div class="row no-gutters align-items-center">
												<div class="tag-color mr-2 bg-red"></div>
												<div class="tag-label">Отсутствуют переводы: {foreach $brand->need_translate as $nt}<b>{$nt|upper}</b> {/foreach}</div>
											</div>
										</div>
										{/if}
									</div>
								</div>

								<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

									<a href="{url module=BrandAdmin id=$brand->id language_id=$filter_language return=null}" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
										<i class="icon icon-pencil text-blue"></i>
									</a>
									
									<a href="../brands/{$brand->url}" class="btn btn-icon" target="__blank" data-toggle="tooltip" data-placement="bottom" title="Открыть в новом окне">
										<i class="icon icon-open-in-new text-blue"></i>
									</a>
									
									<button type="button" class="btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить">
										<i class="icon icon-trash text-red"></i>
									</button>
									
								</div>
							</div>
						</div>
						{/foreach}
					</div>
					{/if}
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
		</form>
		{include file='pagination.tpl'}
		</div>
	</div>
</div>
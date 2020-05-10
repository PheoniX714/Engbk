{* Title *}
{$meta_title = "Свойства" scope='root'}
{$sm_groupe = 'products' scope='root'}
{$sm_item = "features" scope='root'}

{capture name=js}
{literal}
<script>
	var features_list = document.getElementById('features_list');
	var sortable = new Sortable(features_list, {
		multiDrag: true,
		selectedClass: 'bg-yellow-100',
		handle: '.handle',
		animation: 150,
		ghostClass: 'bg-blue-100',
		onEnd: function() {
			$.ajax({url: document.location.href, type: "POST", dataType: "html", data: $('form').serialize()});
		}
	});
	
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
		  
		$("button.in_filter").on('click', function(){
			var icon        = $(this);
			var line        = icon.closest("#list .todo-item");
			var tag        	= line.find(".in_filter-tag");
			var but         = icon.children(".icon-filter");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var session_id  = icon.closest('form').find('input[type="hidden"][name*="session_id"]').val();
			var state       = but.hasClass('enbl')?0:1;
			$.ajax({
				type: 'POST',
				url: 'ajax/update_object.php',
				data: {'object': 'feature', 'id': id, 'values': {'in_filter': state}, 'session_id': session_id},
				success: function(data){
					if(!state){
						but.removeClass('text-blue enbl');
						tag.hide();
					}else{
						but.addClass('text-blue enbl');
						tag.show();
					}			
				},
				dataType: 'json'
			});	
			return false;
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
						<i class="icon-filter s-6"></i>
					</span>
					<span class="logo-text h4">Свойства товаров</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="./index.php?module=FeatureAdmin" class="btn btn-light fuse-ripple-ready"><i class="icon-file-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить свойство</span></a>
		</div>
	</div>
	
	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
		
		<form method="get">
			<input type="hidden" name="module" value="FeaturesAdmin">
			<div class="collapse {if $show_filters}show{/if}" id="filters">
				<div class="card mb-3">
					<div class="card-body d-flex align-items-end flex-wrap">
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-3">
							<label for="filter_language">Язык перевода</label>
							<select class="form-control" id="filter_language" name="filter_language">
								{foreach $languages as $l}
								<option value="{$l->id}" {if $filter_language == $l->id}selected{/if}>{$l->name|escape}</option>
								{/foreach}	
							</select>
						</div>
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-3">
							<label for="category_id">Категория свойства</label>
							<select class="form-control" id="category_id" name="category_id">
								<option value=''>Все категории</option>
								{function name=category_select level=0}
								{foreach $categories as $category}
									<option value='{$category->id}' {if $category->id == $category_id}selected{/if} category_name='{$category->name|escape}'>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name|escape}</option>
										{category_select categories=$category->subcategories category_id=$category_id  level=$level+1}
								{/foreach}
								{/function}
								{category_select categories=$categories category_id=$category_id}
							</select>
						</div>
						<div class="col-12 col-sm-4 col-md-3">
							<div class="form-group mb-2">
								<input type="text" class="form-control" id="keyword" name="keyword" aria-describedby="meta_titleHelp" placeholder="Введите название свойства" value="{$keyword|escape}" autocomplete="off">
								<label for="keyword">Название свойства</label>
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
					<div class="todo-item pr-4 pl-11 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">
						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4">

							<div class="title d-flex justify-content-between align-items-center">
								Название свойства
								
								<button class="btn btn-icon pull-right" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters"><i class="icon-settings" data-toggle="tooltip" data-placement="bottom" title="Открыть/Закрыть фильтры"></i></button>
							</div>
						</div>
					</div>
					
					{if $features}
					<div id="features_list">
						{foreach $features as $feature}
						<div class="sort-item">
							<div class="todo-item pl-0 pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

								<div class="handle mr-1 px-2">
									<i class="icon icon-drag"></i>
								</div>
								<input type="hidden" name="positions[{$feature->id}]" value="{$feature->position}">

								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="check[]" value="{$feature->id}" />
									<span class="custom-control-indicator"></span>
								</label>

								<div class="info col px-4 d-flex align-items-start align-sm-items-center justify-content-left flex-column flex-sm-row">

									<div class="title mr-4">
										<a class="td-wh-none {if !$feature->name}text-red{/if}" href="{url module=FeatureAdmin id=$feature->id language_id=$filter_language return=null}">{if !$feature->name}Отсутствует перевод{else}{$feature->name|escape}{/if}</a>
									</div>

									<div class="tags">
										<div class="tag badge in_filter-tag" {if !$feature->in_filter}style="display:none;"{/if}>
											<div class="row no-gutters align-items-center">
												<div class="tag-color mr-2 bg-secondary"></div>
												<div class="tag-label">В фильтре</div>
											</div>
										</div>
										{if $feature->need_translate and $feature->need_translate|count > 0}
										<div class="tag badge language-tag">
											<div class="row no-gutters align-items-center">
												<div class="tag-color mr-2 bg-red"></div>
												<div class="tag-label">Отсутствуют переводы: {foreach $feature->need_translate as $nt}<b>{$nt|upper}</b> {/foreach}</div>
											</div>
										</div>
										{/if}
									</div>
								</div>

								<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

									<a href="{url module=FeatureAdmin id=$feature->id language_id=$filter_language return=null}" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
										<i class="icon icon-pencil text-blue"></i>
									</a>
									
									<button type="button" class="btn btn-icon in_filter" data-toggle="tooltip" data-placement="bottom" title="Вкл\Выкл отображение в фильтре">
										<i class="icon icon-filter {if $feature->in_filter}text-blue enbl{/if}"></i>
									</button>
									
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
								<option value="set_in_filter">Использовать в фильтре</option>
								<option value="unset_in_filter">Не использовать в фильтре</option>
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
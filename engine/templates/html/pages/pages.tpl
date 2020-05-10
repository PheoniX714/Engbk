{* Title *}
{$meta_title = "{$menu->name}" scope='root'}
{$sm_groupe = 'pages' scope='root'}
{$sm_item = "menu_{$menu->id}" scope='root'}

{capture name=js}
{literal}
<script>
	var pages_list = [].slice.call(document.querySelectorAll('.nested-sortable'));
	// Loop through each nested sortable element
	for (var i = 0; i < pages_list.length; i++) {
		new Sortable(pages_list[i], {
			group: {
				name: 'nested',
				put: false,
				pull: false
			},
			fallbackOnBody: true,
			swapThreshold: 0.65,
			multiDrag: true,
			selectedClass: 'bg-yellow-100',
			handle: '.handle',
			animation: 150,
			ghostClass: 'bg-blue-100',
			onEnd: function() {
				$.ajax({url: document.location.href, type: "POST", dataType: "html", data: $('form').serialize()});
			}
		});
	}

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
		  
		$("button.visible").on('click', function(){
			var icon        = $(this);
			var line        = icon.closest("#list .todo-item");
			var tag        	= line.find(".visible-tag");
			var but         = icon.children(".icon-lightbulb");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var session_id  = icon.closest('form').find('input[type="hidden"][name*="session_id"]').val();
			var state       = but.hasClass('enbl')?0:1;
			$.ajax({
				type: 'POST',
				url: 'ajax/update_object.php',
				data: {'object': 'page', 'id': id, 'values': {'visible': state}, 'session_id': session_id},
				success: function(data){
					if(!state){
						but.removeClass('text-yellow-900 enbl');
						tag.show();
					}else{
						but.addClass('text-yellow-900 enbl');
						tag.hide();
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
						<i class="icon-file-multiple s-6"></i>
					</span>
					<span class="logo-text h4">Страницы</span>
				</div>
			</div>
		</div>
		
		<div class="col-6 col-auto d-flex justify-content-end">
			<a href="./index.php?module=PageAdmin&menu_id={$menu->id}" class="btn btn-light fuse-ripple-ready"><i class="icon-file-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить страницу</span></a>
		</div>
	</div>
	
	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
		
		<form method="post">
		<input type="hidden" name="session_id" value="{$smarty.session.id}">	
			<div class="collapse {if $main_language->id != $filter_language}show{/if}" id="filters">
				<div class="card mb-3">
					<div class="card-body d-flex align-items-end flex-wrap">
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-2">
							<label for="filter_language">Язык перевода</label>
							<select class="form-control" id="filter_language" name="filter_language">
								{foreach $languages as $l}
								<option value="{$l->id}" {if $filter_language == $l->id}selected{/if}>{$l->name|escape}</option>
								{/foreach}	
							</select>
						</div>
						
						<div class="col">
							<button class="btn btn-primary btn-sm" type="submit">Фильтровать</button>
						</div>
					</div>
				</div>
			</div>

			<div id="todo" class="card">
				<div id="list" class="todo-items w-100">
					{function name=pages_tree}
					{if $level == 0}
					<div class="todo-item pr-4 pl-11 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4">

							<div class="title d-flex justify-content-between align-items-center">
								Название страницы
								
								<button class="btn btn-icon pull-right" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters"><i class="icon-settings" data-toggle="tooltip" data-placement="bottom" title="Открыть/Закрыть фильтры"></i></button>
							</div>
						</div>
					</div>
					{/if}
					
					{if $pages}
					<div class="nested-sortable">
						{foreach $pages as $page}
						<div class="sort-item">
							<div class="todo-item pl-{$level*7} pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

								<div class="handle mr-1 px-2">
									<i class="icon icon-drag"></i>
								</div>
								<input type="hidden" name="positions[{$page->id}]" value="{$page->position}">

								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="check[]" value="{$page->id}" />
									<span class="custom-control-indicator"></span>
								</label>

								<div class="info col px-4 d-flex align-items-start align-sm-items-center justify-content-left flex-column flex-sm-row">

									<div class="title mr-4">
										<a class="td-wh-none {if !$page->name}text-red{/if}" href="{url module=PageAdmin id=$page->id language_id=$filter_language return=null}">{if !$page->name}Отсутствует перевод{else}{$page->name|escape}{/if}</a>
									</div>

									<div class="tags">
										<div class="tag badge visible-tag" {if $page->visible}style="display:none;"{/if}>
											<div class="row no-gutters align-items-center">
												<div class="tag-color mr-2 bg-red"></div>
												<div class="tag-label">Отключена</div>
											</div>
										</div>
										{if $page->need_translate and $page->need_translate|count > 0}
										<div class="tag badge language-tag">
											<div class="row no-gutters align-items-center">
												<div class="tag-color mr-2 bg-red"></div>
												<div class="tag-label">Отсутствуют переводы: {foreach $page->need_translate as $nt}<b>{$nt|upper}</b> {/foreach}</div>
											</div>
										</div>
										{/if}
									</div>
								</div>

								<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

									<a href="{url module=PageAdmin id=$page->id language_id=$filter_language return=null}" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
										<i class="icon icon-pencil text-blue"></i>
									</a>
									
									<button type="button" class="btn btn-icon {if $page->id != 1 and $page->id != 2 }visible{/if}" data-toggle="tooltip" data-placement="bottom" title="Вкл\Выкл страницу">
										<i class="icon icon-lightbulb {if $page->id == 1 or $page->id == 2 }text-yellow-900{elseif $page->visible}text-yellow-900 enbl{/if}"></i>
									</button>
									
									<a href="../{$page->url}" class="btn btn-icon" target="__blank" data-toggle="tooltip" data-placement="bottom" title="Открыть в новом окне">
										<i class="icon icon-open-in-new text-blue"></i>
									</a>
									
									<button type="button" class="btn btn-icon {if $page->id != 1 and $page->id != 2 }delete{/if}" data-toggle="tooltip" data-placement="bottom" title="Удалить">
										<i class="icon icon-trash {if $page->id == 1 or $page->id == 2 }text-grey{else}text-red{/if}"></i>
									</button>
									
								</div>
							</div>
							{pages_tree pages=$page->subcategories level=$level+1}
						</div>
						{/foreach}
					</div>
					{/if}
					{/function}
					{pages_tree pages=$pages level=0}
				</div>

				<div class="card-footer py-6">
					 <div class="row">
						<div class="col-12 col-sm-4 col-md-3 mb-3 mb-sm-0">
							<select id="action" class="form-control" name="action">
								<option value="">Выберите действие</option>
								<option value="enable">Отобразить на сайте</option>
								<option value="disable">Отключить на сайте</option>
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
		</div>
	</div>
</div>
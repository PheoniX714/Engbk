{* Title *}
{$meta_title='Новости' scope='root'}
{$sm_groupe = 'news' scope='root'}
{$sm_item = 'news' scope='root'}

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
				data: {'object': 'news', 'id': id, 'values': {'visible': state}, 'session_id': session_id},
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
					<span class="logo-text h4">Новости</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="{url module=PostAdmin id=null}" class="btn btn-light fuse-ripple-ready"><i class="icon-file-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить новость</span></a>
		</div>
	</div>
	<!-- / HEADER -->

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
					<div class="todo-item p-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4 d-flex align-items-center justify-content-between">
							<b>Название</b>
													
							<button class="btn btn-icon pull-right" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters"><i class="icon-settings" data-toggle="tooltip" data-placement="bottom" title="Открыть/Закрыть фильтры"></i></button>
						</div>

					</div>
					{foreach $posts as $p}
					<div class="todo-item p-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

						<label class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="check[]" value="{$p->id}"/>
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4 d-flex align-items-start align-sm-items-center justify-content-left flex-column flex-sm-row">
							<div class="title mr-4">
								<a class="td-wh-none" href="{url module=PostAdmin id=$p->id lang_group=null language_id=$filter_language lang_id=null return=null}">{$p->name|escape}</a>
							</div>
							
							<div class="tags">
								<div class="tag badge visible-tag" {if $p->visible}style="display:none;"{/if}>
									<div class="row no-gutters align-items-center">
										<div class="tag-color mr-2 bg-red"></div>
										<div class="tag-label">Отключена</div>
									</div>
								</div>
								{if $p->need_translate and $p->need_translate|count > 0}
								<div class="tag badge language-tag">
									<div class="row no-gutters align-items-center">
										<div class="tag-color mr-2 bg-red"></div>
										<div class="tag-label">Отсутствуют переводы: {foreach $p->need_translate as $nt}<b>{$nt|upper}</b> {/foreach}</div>
									</div>
								</div>
								{/if}
							</div>
						</div>
						<div class="info col-12 col-md-2 px-4 my-2 my-md-0 pl-11 pl-md-4 d-flex align-items-center justify-content-left">
							{$p->date|date_format:"%d.%m.%Y"}
						</div>

						<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

							<a href="{url module=PostAdmin id=$p->id lang_group=null language_id=$filter_language lang_id=null return=null}" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
								<i class="icon icon-pencil text-blue"></i>
							</a>
							
							<button type="button" class="btn btn-icon visible" data-toggle="tooltip" data-placement="bottom" title="Вкл\Выкл страницу">
								<i class="icon icon-lightbulb {if $p->visible}text-yellow-900 enbl{/if}"></i>
							</button>
							
							<a href="../post/{$p->url}" class="btn btn-icon" target="__blank" data-toggle="tooltip" data-placement="bottom" title="Открыть в новом окне">
								<i class="icon icon-open-in-new text-blue"></i>
							</a>

							<button type="button" class="btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить">
								<i class="icon icon-trash text-red"></i>
							</button>

						</div>
					</div>
					{/foreach}
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
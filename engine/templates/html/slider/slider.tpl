{* Title *}
{$meta_title='Слайдер' scope='root'}
{$sm_groupe = 'slider' scope='root'}

{capture name=js}
{literal}
<script>
	var slides_list = document.getElementById('slides_list');
	var sortable = new Sortable(slides_list, {
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
		  
		$("button.visible").on('click', function(){
			var icon        = $(this);
			var line        = icon.closest("#list .todo-item");
			var but         = icon.children(".icon-lightbulb");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var session_id  = icon.closest('form').find('input[type="hidden"][name*="session_id"]').val();
			var state       = but.hasClass('enbl')?0:1;
			$.ajax({
				type: 'POST',
				url: 'ajax/update_object.php',
				dataType: 'json',
				data: {'object': 'slider', 'id': id, 'values': {'visible': state}, 'session_id': session_id},
				error: function (data) {
					console.log(data);
				},
				success: function(data){
					if(!state){
						but.removeClass('text-yellow-900 enbl');
					}else{
						but.addClass('text-yellow-900 enbl');
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
						<i class="icon-picture s-6"></i>
					</span>
					<span class="logo-text h4">Слайдер</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="{url module=SlideAdmin id=null}" class="btn btn-light fuse-ripple-ready"><i class="icon-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить слайд</span></a>
		</div>
	</div>
	<!-- / HEADER -->

	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
		
		<form method="post">
		<input type="hidden" name="session_id" value="{$smarty.session.id}">		
			<div id="todo" class="card">
				
				<div id="list" class="todo-items w-100">
					<div class="todo-item pr-4 pl-11 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4">
							Изображение
						</div>

					</div>
					<div id="slides_list">
						{foreach $slides as $slide}
						<div class="todo-item sort-item pl-0 pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center ">
							
							<div class="handle mr-1 px-2">
								<i class="icon icon-drag"></i>
							</div>
							<input type="hidden" name="positions[{$slide->id}]" value="{$slide->position}">
							
							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="check[]" value="{$slide->id}"/>
								<span class="custom-control-indicator"></span>
							</label>

							<div class="info col px-4 mb-3 mb-sm-0 d-flex align-items-center justify-content-left">
								<div class="title mr-4">
									<a class="td-wh-none" href="{url module=SlideAdmin id=$slide->id return=$smarty.server.REQUEST_URI}"><img src="/files/slider/{$slide->filename|escape}" style="width: 100%; max-width: 550px; height:auto;"></a>
								</div>
							</div>

							<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

								<a href="{url module=SlideAdmin id=$slide->id}" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
									<i class="icon icon-pencil text-blue"></i>
								</a>
								
								<button type="button" class="btn btn-icon visible" data-toggle="tooltip" data-placement="bottom" title="Вкл\Выкл слайд">
									<i class="icon icon-lightbulb {if $slide->visible}text-yellow-900 enbl{/if}"></i>
								</button>

								<button type="button" class="btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить">
									<i class="icon icon-trash text-red"></i>
								</button>

							</div>
						</div>
						{/foreach}
					</div>
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
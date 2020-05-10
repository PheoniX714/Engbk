{$sm_groupe = 'slider' scope='root'}
{if $slide->filename}
{$meta_title = 'Редактирование слайда' scope='root'}
{else}
{$meta_title = 'Добавление слайда' scope='root'}
{/if}

{* Подключаем Tiny MCE *}
{include file='editor/tinymce_init.tpl'}

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-account s-6"></i>
					</span>
					<span class="logo-text h4">{if $slide->filename}Редактирование слайда{else}Добавление слайда{/if}</span>
				</div>
			</div>
		</div>
	</div>
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	<input name="id" type="hidden" value="{$slide->id|escape}"/>
		
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group row no-gutters">
				
				{if $message_success}
				<script>  
					$(document).ready(function(){  
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.success({
						  title: 'Готово!',
						  text: "{if $message_success == 'added'}Слайд добавлен{elseif $message_success == 'updated'}Слайд обновлен{/if}",
						  stack: {literal}{dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}{/literal}
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
						  text: "{if $message_error == 'watermark_is_not_writable'}Установите права на запись для файла {$config->watermark_file}{/if}",
						  stack: {literal}{dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}{/literal}
						});
					});   
				</script>
				{/if}
			
				<div class="col-12 col-sm-6 col-md-4 p-3">

					<div class="card mb-3"> 
						<img class="card-img-top" style="width:100%;" src="{if $slide->filename}/files/slider/{$slide->filename|escape}{else}/engine/templates/img/placeholder.png{/if}" >
						
						<div class="widget-content row px-4 pt-6">						
							<div class="col-12 col-sm-8 p-4">
								 <div class="form-group mb-0">
									<input type="file" class="custom-file-input" id="slide_img" name="image">
									<label class="custom-file-label" for="slide_img">{if $slide->filename}{$slide->filename|escape}{else}Изображение слайда{/if}</label>
								 </div>
							</div>
							{literal}
							<script>
								$('.custom-file-input').on('change',function(){
								  var fileName = $(this).val().split('\\').pop();
								  console.log(fileName);
								  $(this).next('.custom-file-label').addClass("selected").html(fileName);
								})
							</script>
							{/literal}
							
							<div class="col-12 col-sm-4 p-4 pt-5">
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="visible" {if $slide->visible}checked{/if}>
										<span class="checkbox-icon fuse-ripple-ready text-blue"></span>
										<span class="form-check-description">Активен</span>
									</label>
								</div>
							</div>
						</div>
							
						
						<div class="divider"></div>
						
						<div class="widget-footer row p-4">
							<div class="col-md-12 text-right">
								<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
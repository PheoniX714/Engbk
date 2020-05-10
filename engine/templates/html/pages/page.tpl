{$sm_groupe = 'pages' scope='root'}
{$sm_item = "menu_{$page->menu_id}" scope='root'}
{if $page->id}
{$meta_title = $page->name scope='root'}
{else}
{$meta_title = 'Новая страница' scope='root'}
{/if}

{* Подключаем Tiny MCE *}
{include file='editor/tinymce_init.tpl'}

{capture name=js}
{literal}
<script>
	var images_list = document.getElementById('images_list');
	var sortable = new Sortable(images_list, {
		multiDrag: true,
		selectedClass: 'bg-yellow-100',
		handle: '.handle',
		animation: 150,
		ghostClass: 'bg-blue-100'
	});

	$(function () {
		// Удаление изображения
		$('.images-list').on('click', '.delete_image', function() {
			$(this).closest(".image-box").fadeOut(200, function() { $(this).remove(); });
			return false;
		});
		
		$('.page-content').on('click', '#copy_url', function() {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val($('#page_url').attr('href')).select();
			document.execCommand("copy");
			$temp.remove();
		});
	});
		
	$('.del-preview').on('click',function(){
		$('.page-preview').hide();
		$('.preview-placeholder').show();
		$('#del_preview').val(1);
	});
</script>
{/literal}
{/capture}

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-file s-6"></i>
					</span>
					<span class="logo-text h4">{if $page->id}{$page->name}{else}Новая страница{/if}</span>
				</div>
			</div>
		</div>
		{if $page->id}
		<div class="col-auto">
			<div class="d-flex align-items-center justify-content-end">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					{foreach $languages as $l}
					<option value='{url module=PageAdmin id=$page->id language_id=$l->id return=null}' {if $language->id == $l->id}selected{/if}>{$l->name|escape}</option>
					{/foreach}				
				</select>
			</div>
		</div>
		{/if}
	</div>
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	<input name="id" type="hidden" value="{$page->id|escape}"/>
		
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
						  text: "{if $message_success == 'added'}Страница добавлена{elseif $message_success == 'updated'}Страница обновлена{elseif $message_success == 'added_translation'}Перевод добавлен{/if}",
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
						  text: "{if $message_error == 'url_exists'}Страница с таким адресом уже существует{elseif $message_error == 'empty_name'}Не задано название страницы{/if}",
						  stack: {literal}{dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}{/literal}
						});
					});   
				</script>
				{/if}
				
				<div class="row">	
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group mb-1">
											<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название страницы" value="{$page->name|escape}">
											<label for="name">Название страницы</label>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Основные параметры</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex align-items-center">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="visible" {if $system}disabled{/if} {if $page->visible}checked{/if}>
												<span class="checkbox-icon fuse-ripple-ready text-green"></span>
												<span class="form-check-description">Активна</span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group pt-0 mb-1">
											<label for="menu_id" class="col-form-label pb-0">Меню</label>
											<select class="form-control" id="menu_id" name="menu_id">
												{foreach $menus as $m}
												<option value='{$m->id}' {if $page->menu_id == $m->id}selected{/if}>{$m->name|escape}</option>
												{/foreach}
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group pt-0 mb-1">
											<label for="parent_id" class="col-form-label pb-0">Родительская страница</label>
											<select class="form-control" id="parent_id" name="parent_id">
												<option value='0' {if $p->id == $page->parent_id}selected{/if}>Корневая страница</option>
												{foreach $pages as $p}
												{if $page->id != $p->id}<option value='{$p->id}' {if $p->id == $page->parent_id}selected{/if}>{$p->name|escape}</option>{/if}
												{/foreach}
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<label for="url">URL</label>
										<div class="input-group mb-3">
											<span class="input-group-addon">{if $language->main != 1}/{$language->code}{/if}/</span>
											<input type="text" class="form-control" id="url" name="url" value="{$page->url|escape}" placeholder="Адрес">
										</div>
									
										{if $page->url or $page->id == 1}
										<a id="page_url" href="{$config->root_url}{if $language->main != 1}/{$language->code}{/if}/{$page->url|escape}" target="__blank" class="btn btn-secondary btn-sm mb-3 mb-sm-0"><i class="icon-open-in-new btn-sm p-0"></i> открыть на сайте</a>
										<button id="copy_url" type="button" class="btn btn-secondary btn-sm mb-3 mb-sm-0"><i class="icon-content-copy btn-sm p-0"></i> копировать url</button>	
										{/if}
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
					
					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Параметры SEO</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_title" name="meta_title" aria-describedby="meta_titleHelp" placeholder="Введите заголовок страницы" value="{$page->meta_title|escape}">
											<label for="meta_title">Заголовок страницы</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{$page->meta_keywords|escape}" aria-describedby="meta_keywordsHelp" placeholder="Введите ключевые слова через запятую">
											<label for="meta_keywords">Ключевые слова</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<textarea class="form-control p-2" id="meta_description" name="meta_description" id="meta_description" rows="4">{$page->meta_description|escape}</textarea>
											<label for="meta_description">Мета-описание страницы</label>
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
					
					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Превью страницы</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex justify-content-center align-items-center">
										{if $page->image}<img class="page-preview" src="/files/pages/{$page->image|escape}" style="max-height: 320px; max-width:100%; height:100%; width:auto;">{/if}
										<img class="preview-placeholder" src="./templates/img/placeholder.png" width="100%" height="auto" {if $page->image}style="display:none;"{/if}>
									</div>
									
									<div class="col-8 pt-3 mb-3">
										 <div class="form-group mb-0 p-0">
											<input type="hidden" name="image_old" value="{$page->image|escape}">
											<input type="hidden" id="del_preview" name="del_preview" value="0">
											<input type="file" name="image">
										 </div>
									</div>
									
									<div class="col-4 pt-3 mb-3">
										 <div class="form-group m-0 p-0 text-right" >
											<i class="icon-trash del-preview text-red" data-toggle="tooltip" data-placement="bottom" title="Удалить превью"></i>
										 </div>
									</div>
									
									
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="preview_width" name="preview_width" value="{if $page->preview_width}{$page->preview_width}{else}{$settings->page_preview_width}{/if}">
											<label for="preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="preview_height" name="preview_height" value="{if $page->preview_height}{$page->preview_height}{else}{$settings->page_preview_height}{/if}">
											<label for="preview_height">Макс. высота, px</label>
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
					
					<div class="col-12 mb-5">
						<div class="card mb-5">
							<div class="card-header">
								<b>Дополнительные изображения страницы</b> {if $page_images}<span class="badge badge-info">{$page_images|count} изображен{$page_images|plural:'ия':'ие':'ий'}</span>{/if}
							</div>
							<div class="card-body">
								<div id="images_list" class="images-list d-flex flex-wrap mb-5">
									{if $page_images}
									{foreach $page_images as $i}
									<div class="image-box">
										<div class="image">
											<img src="/files/page_images/{$i->filename}" style="max-width:150px;max-height:140px;">
											<div class="image-controls justify-content-between align-items-center bg-grey-800">
												<input name="positions[]" type="hidden" value="{$i->id|escape}" class="form-control" />
												<div class="handle p-0 px-md-1"><i class="icon icon-drag text-white"></i></div>
												
												<button type="button" class="btn btn-icon delete_image p-0 px-md-1" data-toggle="tooltip" data-placement="bottom" title="Удалить изображение">
													<i class="icon icon-close text-red"></i>
												</button>
											</div>
										</div>
									</div>
									{/foreach}
									{else}
									
									{/if}
								</div>
								<div class="row">
									<div class="col-12 px-8 text-right">
										<input type="file"  name="page_images[]" multiple>
										<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit">Сохранить</button>
									</div> 
								</div>
							</div>
						</div>
					</div>
					 
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Текст страницы</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<textarea name="text" rows="20" class="form-control editor_large">{$page->text|escape}</textarea>
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
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
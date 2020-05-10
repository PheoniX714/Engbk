{$sm_groupe = 'news' scope='root'}
{$sm_item = 'news' scope='root'}
{if $post->id}
{$meta_title = $post->name scope='root'}
{else}
{$meta_title = 'Новая страница' scope='root'}
{/if}

{* Подключаем Tiny MCE *}
{include file='editor/tinymce_init.tpl'}

{capture name=js}
{literal}
<script>		
	$('.del-preview').on('click',function(){
		$('.page-preview').hide();
		$('.preview-placeholder').show();
		$('#del_preview').val(1);
	});
	
	$('.page-content').on('click', '#copy_url', function() {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($('#post_url').attr('href')).select();
		document.execCommand("copy");
		$temp.remove();
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
					<span class="logo-text h4">{if $post->id}{$post->name}{else}Новая новость{/if}</span>
				</div>
			</div>
		</div>
		{if $post->id}
		<div class="col-auto">
			<div class="d-flex align-items-center justify-content-end">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					{foreach $languages as $l}
					<option value='{url module=PostAdmin id=$post->id language_id=$l->id return=null}' {if $language->id == $l->id}selected{/if}>{$l->name|escape}</option>
					{/foreach}				
				</select>
			</div>
		</div>
		{/if}
	</div>
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	<input name="id" type="hidden" value="{$post->id|escape}"/>
		
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
						  text: "{if $message_success == 'added'}Новость добавлена{elseif $message_success == 'updated'}Новость обновлена{/if}",
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
						  text: "{if $message_error == 'url_exists'}Новость с таким адресом уже существует{/if}",
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
											<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название новости" value="{$post->name|escape}">
											<label for="name">Название новости</label>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-12 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Основные параметры</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex align-items-center mb-3">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="visible" {if $post->visible}checked{/if}>
												<span class="checkbox-icon fuse-ripple-ready text-green"></span>
												<span class="form-check-description">Активна</span>
											</label>
										</div>
									</div>
									<div class="form-row col-12 align-items-center">
										<div class="col-12">
											<label class="sr-only" for="url">Адрес</label>
											<div class="input-group mb-3">
												<div class="input-group-addon">{if $language->main != 1}/{$language->code}{/if}/post/</div>
												<input type="text" class="form-control" id="url" name="url" value="{$post->url|escape}" placeholder="Адрес">
											</div>
											
											{if $post->url}
											<a id="post_url" href="{$config->root_url}{if $language->main != 1}/{$language->code}{/if}/post/{$post->url|escape}" target="__blank" class="btn btn-secondary btn-sm mb-3 mb-sm-0"><i class="icon-open-in-new btn-sm p-0"></i> открыть на сайте</a>
											<button id="copy_url" type="button" class="btn btn-secondary btn-sm"><i class="icon-content-copy btn-sm p-0"></i> копировать url</button>	
											{/if}
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="form-row col-12 col-sm-6">
										<div class="form-group pt-0 mb-0">
											<label for="category_id" class="col-form-label pb-0">Категория</label>
											<select class="form-control" id="category_id" name="category_id">
												<option value=''>Без категории</option>
												{foreach $categories as $c}
												<option value='{$c->id}' {if $post->category_id == $c->id}selected{/if}>{$c->name}</option>
												{/foreach}
											</select>
										</div>
									</div>
									<div class="form-row col-12 col-sm-6">
										<div class="form-group mb-0">
											<label for="date" class="col-form-label pb-0">Дата публикации</label>
											<input class="form-control" type="datetime-local" name="date" value="{$post->date|date_format:'%Y-%m-%dT%H:%M:%S'}" id="date" />
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
								<b>Параметры SEO</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_title" name="meta_title" aria-describedby="meta_titleHelp" placeholder="Введите заголовок новости" value="{$post->meta_title|escape}">
											<label for="meta_title">Заголовок новости</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{$post->meta_keywords|escape}" aria-describedby="meta_keywordsHelp" placeholder="Введите ключевые слова через запятую">
											<label for="meta_keywords">Ключевые слова</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<textarea class="form-control p-2" id="meta_description" name="meta_description" id="meta_description" rows="4">{$post->meta_description|escape}</textarea>
											<label for="meta_description">Мета-описание новости</label>
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
								<b>Превью новости</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex justify-content-center align-items-center">
										{if $post->image}<img class="page-preview" src="/files/news/{$post->image|escape}" style="max-height: 320px; max-width:100%; height:100%; width:auto;">{/if}
										<img class="preview-placeholder" src="./templates/img/placeholder.png" width="100%" height="auto" {if $post->image}style="display:none;"{/if}>
									</div>
									
									<div class="col-8 pt-3 mb-3">
										 <div class="form-group mb-0 p-0">
											<input type="hidden" name="image_old" value="{$post->image|escape}">
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
											<input type="text" class="form-control" id="preview_width" name="preview_width" value="{if $page->preview_width}{$page->preview_width}{else}{$settings->post_preview_width}{/if}">
											<label for="preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="preview_height" name="preview_height" value="{if $page->preview_height}{$page->preview_height}{else}{$settings->post_preview_height}{/if}">
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
						<div class="card mb-3">
							<div class="card-header">
								<b>Аннотация новости</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<textarea name="annotation" rows="10" class="form-control editor_large">{$post->annotation|escape}</textarea>
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
						<div class="card mb-3">
							<div class="card-header">
								<b>Текст новости</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<textarea name="text" rows="20" class="form-control editor_large">{$post->text|escape}</textarea>
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
{$sm_groupe = 'products' scope='root'}
{$sm_item = "brands" scope='root'}
{if $brand->id}
{$meta_title = $brand->name scope='root'}
{else}
{$meta_title = 'Новый бренд' scope='root'}
{/if}

{* Подключаем Tiny MCE *}
{include file='editor/tinymce_init.tpl'}

{capture name=js}
{literal}
<script>
	
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
					<span class="logo-text h4">{if $brand->id}{$brand->name}{else}Новый бренд{/if}</span>
				</div>
			</div>
		</div>
		{if $page->id}
		<div class="col-auto">
			<div class="d-flex align-items-center justify-content-end">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					{foreach $languages as $l}
					<option value='{url module=BrandAdmin id=$brand->id language_id=$l->id return=null}' {if $language->id == $l->id}selected{/if}>{$l->name|escape}</option>
					{/foreach}				
				</select>
			</div>
		</div>
		{/if}
	</div>
	
	<form method="post">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	<input name="id" type="hidden" value="{$brand->id|escape}"/>
		
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
						  text: "{if $message_success == 'added'}Бренд добавлен{elseif $message_success == 'updated'}Бренд обновлен{elseif $message_success == 'added_translation'}Перевод добавлен{/if}",
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
						  text: "{if $message_error == 'url_exists'}Бренд с таким адресом уже существует{elseif $message_error == 'empty_name'}Не задано название бренда{/if}",
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
											<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название бренда" value="{$brand->name|escape}">
											<label for="name">Название бренда</label>
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
									<div class="col-12">
										<label for="url">URL</label>
										<div class="input-group mb-3">
											<span class="input-group-addon">{if $language->main != 1}/{$language->code}{/if}brands/</span>
											<input type="text" class="form-control" id="url" name="url" value="{$brand->url|escape}" placeholder="Адрес">
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
								<b>Параметры SEO</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_title" name="meta_title" aria-describedby="meta_titleHelp" placeholder="Введите заголовок бренда" value="{$brand->meta_title|escape}">
											<label for="meta_title">Заголовок страницы</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{$brand->meta_keywords|escape}" aria-describedby="meta_keywordsHelp" placeholder="Введите ключевые слова через запятую">
											<label for="meta_keywords">Ключевые слова</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<textarea class="form-control p-2" id="meta_description" name="meta_description" id="meta_description" rows="4">{$brand->meta_description|escape}</textarea>
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
								<b>Превью бренда</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex justify-content-center align-items-center">
										{if $brand->image}<img class="brand-preview" src="/files/brands/{$brand->image|escape}" style="max-height: 320px; max-width:100%; height:100%; width:auto;">{/if}
										<img class="preview-placeholder" src="./templates/img/placeholder.png" width="100%" height="auto" {if $brand->image}style="display:none;"{/if}>
									</div>
									
									<div class="col-8 pt-3 mb-3">
										 <div class="form-group mb-0 p-0">
											<input type="hidden" name="image_old" value="{$brand->image|escape}">
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
											<input type="text" class="form-control" id="preview_width" name="preview_width" value="{if $brand->preview_width}{$brand->preview_width}{else}{$settings->brand_preview_width}{/if}">
											<label for="preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="preview_height" name="preview_height" value="{if $brand->preview_height}{$brand->preview_height}{else}{$settings->brand_preview_height}{/if}">
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
								<b>Описание бренда</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<textarea name="description" rows="20" class="form-control editor_large">{$brand->description|escape}</textarea>
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
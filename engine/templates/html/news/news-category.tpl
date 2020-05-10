{if $main_language->id != $language->id}
{$meta_title = 'Перевод категории' scope='root'}
{elseif $category->id}
{$meta_title = $category->name scope='root'}
{else}
{$meta_title = 'Новая категория' scope='root'}
{/if}
{$sm_groupe = "news" scope='root'}
{$sm_item = "news_categories" scope='root'}

{* Подключаем Tiny MCE *}
{include file='editor/tinymce_init.tpl'}

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-format-list-bulleted s-6"></i>
					</span>
					<span class="logo-text h4">{if $main_language->id != $language->id}Перевод категории{elseif $category->id}{$category->name}{else}Новая категория{/if}</span>
				</div>
			</div>
		</div>
		{if $languages|count >1}
		<div class="col-auto">
			<div class="d-flex align-items-center justify-content-end">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					{foreach $languages as $l}
					<option value='{url module=NewsCategoryAdmin language_id=$l->id id=$category->id return=null}' {if $language->id == $l->id}selected{/if}>{$l->name|escape}</option>
					{/foreach}				
				</select>
			</div>
		</div>
		{/if}
	</div>
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	<input name="id" type="hidden" value="{$category->id|escape}"/>
		
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
						  text: "{if $message_success == 'added'}Категория добавлена{elseif $message_success == 'updated'}Категория обновлена{/if}",
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
						  text: "{if $message_error == 'url_exists'}Категория с таким адресом уже существует{/if}",
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
											<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название категории" value="{$category->name|escape}">
											<label for="name">Название категории</label>
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
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="visible" {if $category->visible}checked{/if}>
												<span class="checkbox-icon fuse-ripple-ready text-green"></span>
												<span class="form-check-description">Активна</span>
											</label>
										</div>
									</div>
									<div class="form-row col-12 align-items-center">
										<div class="col-12">
											<label class="sr-only" for="url">Адрес</label>
											<div class="input-group mb-2">
												<div class="input-group-addon">/news/</div>
												<input type="text" class="form-control" id="url" name="url" value="{$category->url|escape}" placeholder="Адрес">
											</div>
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
												<option value='0' {if $c->id == $category->parent_id}selected{/if}>Корневая страница</option>
												{foreach $categories as $c}
												{if $category->id != $c->id}<option value='{$c->id}' {if $c->id == $category->parent_id}selected{/if}>{$c->name|escape}</option>{/if}
												{/foreach}
											</select>
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
									<div class="col-12 col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_title" name="meta_title" aria-describedby="meta_titleHelp" placeholder="Введите заголовок страницы" value="{$category->meta_title|escape}">
											<label for="meta_title">Заголовок страницы</label>
										</div>
									
										<div class="form-group">
											<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{$category->meta_keywords|escape}" aria-describedby="meta_keywordsHelp" placeholder="Введите ключевые слова через запятую">
											<label for="meta_keywords">Ключевые слова</label>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<textarea class="form-control p-2" id="meta_description" name="meta_description" id="meta_description" rows="4">{$category->meta_description|escape}</textarea>
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
					
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Текст категории</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<textarea name="text" rows="20" class="form-control editor_large">{$category->text|escape}</textarea>
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
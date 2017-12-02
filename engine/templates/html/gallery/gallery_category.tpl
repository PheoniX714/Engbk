{if $category->id}
{$meta_title = $category->name scope=parent}
{else}
{$meta_title = 'Новая категория' scope=parent}
{/if}
{$sm_groupe = 'gallery' scope=parent}
{$sm_item = "gallery_categories" scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/gallery_category.js"></script>
' scope=parent}

<section class="content-header">
	<h1>{if $category->id}{$category->name}{else}Новая категория{/if}</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=GalleryCategoriesAdmin">Категории галереи</a></li>
		<li class="active">{if $category->id}{$category->name}{else}Новая категория{/if}</li>
	</ol>
</section>

{* Подключаем Tiny MCE *}
{include file='editor/tinymce_init.tpl'}
<section class="content">
	<div class="row">
		{if $message_success}
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> {if $message_success=='added'}Категория добавлена{elseif $message_success=='updated'}Категория обновлена{else}{$message_success}{/if}</h4>
			</div>
		</div>
		{/if}
		{if $message_error}
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> {if $message_error=='url_exists'}Категория с таким адресом уже существует{else}{$message_error}{/if}</h4>
			</div>
		</div>
		{/if}
		
		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="{$smarty.session.id}">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Основные настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="{url module=GalleryCategoryAdmin id=null}" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить еще категорию</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-md-8">
						<label for="header">Название категории</label>
						<input type="text" id="name" class="form-control" name="name" value="{$category->name|escape}" />
						<input name=id type="hidden" value="{$category->id|escape}"/>
					</div>
					<div class="form-group col-md-4">
						<div class="checkbox" style="margin-top:30px;">
							<label>
								<input type="checkbox" name="visible" class="minimal" {if $category->visible}checked{/if}>
								Активна
							</label>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="parent_id">Родительская категория</label>
						<select id="parent_id" class="form-control" name="parent_id">
							<option value='0'>Корневая категория</option>
							{function name=category_select level=0}
							{foreach $cats as $cat}
								{if $category->id != $cat->id}
									<option value='{$cat->id}' {if $category->parent_id == $cat->id}selected{/if}>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$cat->name}</option>
									{category_select cats=$cat->subcategories level=$level+1}
								{/if}
							{/foreach}
							{/function}
							{category_select cats=$categories}
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Дополнительные настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="url">Адрес</label>
						<input type="text" id="url" class="form-control" name="url" value="{$category->url|escape}" />
					</div>
					<div class="form-group col-sm-4">
						<label for="meta_title">Заголовок</label>
						<input type="text" id="meta_title" class="form-control" name="meta_title" value="{$category->meta_title|escape}">
					</div>
					<div class="form-group col-sm-4">
						<label for="meta_keywords">Ключевые слова</label>
						<input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="{$category->meta_keywords|escape}">
					</div>
					<div class="form-group col-sm-8">
						<label for="meta_description">Описание</label>
						<textarea data-required="true" data-minlength="5" name="meta_description" id="meta_description" cols="10" rows="3" class="form-control">{$category->meta_description|escape}</textarea>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-font"></i>
				  <h3 class="box-title" style="line-height:1.5">Описание категории</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<textarea name="description" rows="30" class="form-control editor_large">{$category->description|escape}</textarea>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		</form>
	</div>
</section>
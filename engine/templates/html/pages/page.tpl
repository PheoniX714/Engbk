{$sm_groupe = 'pages' scope=parent}
{$sm_item = "menu_{$page->menu_id}" scope=parent}
{if $page->id}
{$meta_title = $page->name scope=parent}
{else}
{$meta_title = 'Новая страница' scope=parent}
{/if}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}
{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/content.js"></script>
	<script src="./templates/js/autotags.js"></script>
' scope=parent}
<section class="content-header">
	<h1>{if $page->id}{$page->name}{else}Новая страница{/if} <small>{if $page->id}Редактирование{else}Создание{/if} страницы</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="{url module=PagesAdmin menu_id=$page->menu_id}">{foreach $menus as $m}{if $page->menu_id == $m->id}{$m->name|escape}{/if}{/foreach}</a></li>
		<li class="active">{if $page->id}{$page->name}{else}Новая страница{/if}</li>
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
				<h4><i class="icon fa fa-check"></i> {if $message_success == 'added'}Страница добавлена{elseif $message_success == 'updated'}Страница обновлена{elseif $message_success == 'added_translation'}Перевод добавлен{/if}</h4>
			</div>
		</div>
		{/if}
		{if $message_error}
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> {if $message_error == 'url_exists'}Страница с таким адресом уже существует{/if}</h4>
			</div>
		</div>
		{/if}
		
		<div class="form-group col-lg-2 pull-right">
			<select id="language_id" class="form-control" onchange="if (this.value) window.location.href=this.value" {if !$page->id}disabled{/if}>
			{if !$page->id}
				{foreach $languages as $l}
					{if $l->id==1}
					<option value='{url module=PageAdmin id=$page->id language_id=$l->id return=null}' {if $language_id == $l->id}selected{/if}>{$l->name|escape}</option>
					{/if}
				{/foreach}
			{else}
				{foreach $languages as $l}
					<option value='{url module=PageAdmin id=$page->id language_id=$l->id return=null}' {if $language_id == $l->id}selected{/if}>{$l->name|escape}</option>
					{if !$page->id}{break}{/if}
				{/foreach}
			{/if}
			</select>
		</div>
		
		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="{$smarty.session.id}">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Основные настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="{url module=PageAdmin id=null}" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить еще страницу</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-md-8">
						<label for="header">Название страницы</label>
						<input type="text" id="header" class="form-control" name="header" value="{$page->header|escape}" />
						<input name=id type="hidden" value="{$page->id|escape}"/>
						{if $language_id != 1}<input name=language_id type="hidden" value="{$language_id|escape}"/>{/if}
					</div>
					<div class="form-group col-md-4">
						<div class="checkbox" style="margin-top:30px;">
							<label>
								<input type="checkbox" name="visible" {if $language_id != 1}disabled{/if} class="minimal" {if $page->visible}checked{/if}>
								Активна
							</label>
						</div>
					</div>
					<div class="form-group col-md-4 clear">
						<label for="name">Название пункта в меню</label>
						<input type="text" id="name" class="form-control" name="name" value="{$page->name|escape}">
					</div>
					<div class="form-group col-md-4">
						<label for="menu_id">Меню</label>
						<select id="menu_id" class="form-control" name="menu_id" {if $language_id != 1}disabled{/if}>
							{foreach $menus as $m}
								<option value='{$m->id}' {if $page->menu_id == $m->id}selected{/if}>{$m->name|escape}</option>
							{/foreach}
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="parent_id">Принадлежность</label>
						<select id="parent_id" class="form-control" name="parent_id" {if $language_id != 1}disabled{/if}>
							<option value='0' >Корневой пункт меню</option>
							{function name=page_select level=0}
							{foreach $pg as $p}
								{if $page->id != $p->id}
									<option value='{$p->id}' {if $page->parent_id == $p->id}selected{/if}>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$p->name}</option>
									{page_select pg=$p->subpages level=$level+1}
								{/if}
							{/foreach}
							{/function}
							{page_select pg=$pages}
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
					<div class="form-group col-sm-3">
						<label for="pre_url">Привязка к разделу</label>
						<select id="pre_url" class="form-control" name="pre_url" {if $language_id != 1}disabled{/if}>
							<option value='page/' {if $page->pre_url == 'page/'}selected{/if} >Статические страницы</option>
							<option value='' {if $page->pre_url == ''}selected{/if}>Без раздела</option>							
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label for="url">Адрес</label>
						<input type="text" id="url" class="form-control" name="url" value="{$page->url|escape}" {if $language_id != 1}disabled{/if} />
					</div>
					<div class="form-group col-sm-3">
						<label for="meta_title">Заголовок</label>
						<input type="text" id="meta_title" class="form-control" name="meta_title" value="{$page->meta_title|escape}">
					</div>
					<div class="form-group col-sm-3">
						<label for="meta_keywords">Ключевые слова</label>
						<input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="{$page->meta_keywords|escape}">
					</div>
					<div class="form-group col-sm-8">
						<label for="meta_description">Описание</label>
						<textarea data-required="true" data-minlength="5" name="meta_description" id="meta_description" cols="10" rows="3" class="form-control">{$page->meta_description|escape}</textarea>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-font"></i>
				  <h3 class="box-title" style="line-height:1.5">Текст страницы</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<textarea name="body" rows="30" class="form-control editor_large">{$page->body|escape}</textarea>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		</form>
	</div>
</section>
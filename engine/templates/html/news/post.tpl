{$sm_groupe = 'news' scope=parent}
{$sm_item = 'news' scope=parent}
{if $post->id}
{$meta_title = $post->name scope=parent}
{else}
{$meta_title = 'Новая страница' scope=parent}
{/if}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
	<link rel="stylesheet" href="./templates/js/fancybox/jquery.fancybox.min.css">
' scope=parent}
{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/fancybox/jquery.fancybox.min.js"></script>
	<script src="./templates/js/content.js"></script>
	<script src="./templates/js/autotags_post.js"></script>
	<script>
		 $(".iframe-btn").fancybox({	
			"width"		: 900,
			"height"	: 600,
			"type"		: "iframe",
				"autoScale"    	: false
			});
	</script>
' scope=parent}
<section class="content-header">
	<h1>{if $post->id}{$post->name}{else}Новая новость{/if} <small>{if $post->id}Редактирование{else}Создание{/if} новости</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="{url module=NewsAdmin}">Новости</a></li>
		<li class="active">{if $post->id}{$post->name}{else}Новая новость{/if}</li>
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
				<h4><i class="icon fa fa-check"></i> {if $message_success == 'added'}Новость добавлена{elseif $message_success == 'updated'}Новость обновлена{/if}</h4>
			</div>
		</div>
		{/if}
		{if $message_error}
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> {if $message_error == 'url_exists'}Новость с таким адресом уже существует{/if}</h4>
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
				  <a href="{url module=PostAdmin id=null}" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить новую новость</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-md-4">
						<label for="header">Название новости</label>
						<input type="text" id="name" class="form-control" name="name" value="{$post->name|escape}" />
						<input name=id type="hidden" value="{$post->id|escape}"/>
					</div>
					<div class="form-group col-md-4">
						<div class="checkbox" style="margin-top:30px;">
							<label>
								<input type="checkbox" name="visible" class="minimal" {if $post->visible}checked{/if}>
								Активна
							</label>
						</div>
					</div>
					<div class="clear"></div>
					<div class="form-group col-md-3">
						<label for="date">Дата</label>
						<div id="date" class="input-group date" data-auto-close="true" data-date="{$post->date|date}" data-date-format="dd.mm.yyyy" data-date-autoclose="true">
							<input id="date" class="form-control" name="date" type="text" value="{$post->date|date}">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="post_image">Изображение новости</label>
						
						<div class="input-group">
							<input type="text" id="post_image" class="form-control" name="image" value="{$post->image|escape}">
							<span class="input-group-btn">
								<a href="./templates/js/filemanager/dialog.php?type=1&relative_url=1&field_id=post_image" type="button" class="btn btn-primary btn-flat iframe-btn">Выбрать</a>
							</span>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-search-plus"></i>
				  <h3 class="box-title" style="line-height:1.5">SEO настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="url">Адрес</label>
						<div> <span style="width:20%; line-height: 34px; float: left;">/news/</span><input type="text" id="url" style="width:80%;" class="form-control adress-input" name="url" value="{$post->url|escape}" /></div>
					</div>
					<div class="form-group col-sm-4">
						<label for="meta_title">Заголовок</label>
						<input type="text" id="meta_title" class="form-control" name="meta_title" value="{$post->meta_title|escape}">
					</div>
					<div class="form-group col-sm-4">
						<label for="meta_keywords">Ключевые слова</label>
						<input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="{$post->meta_keywords|escape}">
					</div>
					<div class="form-group col-sm-8">
						<label for="meta_description">Описание</label>
						<textarea data-required="true" data-minlength="5" name="meta_description" id="meta_description" cols="10" rows="3" class="form-control">{$post->meta_description|escape}</textarea>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-font"></i>
				  <h3 class="box-title" style="line-height:1.5">Аннотация</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<textarea name="annotation" rows="10" class="form-control editor_small">{$post->annotation|escape}</textarea>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-font"></i>
				  <h3 class="box-title" style="line-height:1.5">Полный текст</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<textarea name="body" rows="30" class="form-control editor_large">{$post->text|escape}</textarea>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		</form>
	</div>
</section>

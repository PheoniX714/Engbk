{$sm_groupe = 'comments' scope=parent}
{$meta_title='Добавить ответ к комментарию' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}
{$page_additional_js = '
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
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
				<h4><i class="icon fa fa-check"></i>{if $message_success == 'added'}Ответ добавлен{elseif $message_success == 'updated'}Ответ обновлен{/if}</h4>
			</div>
		</div>
		{/if}
		
		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="{$smarty.session.id}">
		<input name=comment_id type="hidden" value="{$comment->id|escape}"/> 
		<input name=id type="hidden" value="{$answer->id|escape}"/> 
		
		<div class="col-md-12">			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-search-plus"></i>
				  <h3 class="box-title" style="line-height:1.5">Комментарий</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="comment_name">
					<b>{$comment->name|escape}</b>
					</div>
					<div class="comment_text">
					{$comment->text|escape|nl2br}
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-font"></i>
				  <h3 class="box-title" style="line-height:1.5">Текст ответа</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<textarea name="text" rows="10" class="form-control editor_small">{$answer->text|escape}</textarea>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		</form>
	</div>
</section>
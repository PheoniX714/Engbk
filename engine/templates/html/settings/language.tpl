{$sm_groupe = 'settings' scope=parent}
{$sm_item = 'languages' scope=parent}
{if $l->id}
{$meta_title = $l->name scope=parent}
{else}
{$meta_title = 'Новый язык' scope=parent}
{/if}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}
{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/content.js"></script>
' scope=parent}
<section class="content-header">
	<h1>{if $l->id}{$l->name}{else}Новый язык{/if}</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="{url module=LanguagesAdmin id=null}">Мультиязычность</a></li>
		<li class="active">{if $l->id}{$l->name}{else}Новый язык{/if}</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		{if $message_success}
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> {if $message_success=='added'}Язык добавлен{elseif $message_success=='updated'}Язык обновлен{else}{$message_success|escape}{/if}</h4>
				<p>Внесенные изменения успешно применены</p>
			</div>
		</div>
		{/if}

		{if $message_error}
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> {if $message_error=='empty_name'}Введите название языка{elseif $message_error=='empty_code'}Введите ISO код языка{else}{$message_error|escape}{/if}</h4>
			</div>
		</div>
		{/if}

		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="{$smarty.session.id}">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-language"></i>
				  <h3 class="box-title" style="line-height:1.5">Параметры языка</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="{url module=LanguageAdmin id=null}" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить язык</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="name">Название</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-font"></i></span>
							<input type="text" id="name" class="form-control" name="name" value="{$l->name|escape}" maxlength="32" placeholder="Введите название" />
						 </div>
						<input type="hidden" name="id" value="{$l->id|escape}" />
					</div>
					<div class="form-group col-sm-4">
						<label for="code">Код ISO (2 символа)</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-globe"></i></span>
							<input type="text" id="code" class="form-control" name="code" value="{$l->code|escape}" placeholder="Введите ISO код"/>
						</div>
						
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		</form>
	</div>
</section>
	<!-- Основная форма (The End) -->

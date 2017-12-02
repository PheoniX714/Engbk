{$sm_groupe = 'slider' scope=parent}
{if $slide->filename}
{$meta_title = 'Редактирование слайда' scope=parent}
{else}
{$meta_title = 'Добавление слайда' scope=parent}
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
	<h1>{if $slide->filename}Редактирование слайда{else}Добавление слайда{/if}</h1>
	<ol class="breadcrumb">
		<li><a href="index.php">Главная</a></li>
		<li><a href="index.php?module=SliderAdmin">Слайдер</a></li>
		<li class="active">{if $slide->filename}Редактирование слайда{else}Добавление слайда{/if}</li>
	</ol>
</section>

<section class="content">
	<div class="row">		
		{if $message_success}
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> {if $message_success == 'added'}Слайд добавлен{elseif $message_success == 'updated'}Слайд обновлен{/if}</h4>
			</div>
		</div>
		{/if}
		{if $message_error}
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> {if $message_error == 'watermark_is_not_writable'}Установите права на запись для файла {$config->watermark_file}{/if}</h4>
			</div>
		</div>
		{/if}
		
		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="{$smarty.session.id}">
		<input name=id type="hidden" value="{$slide->id|escape}"/>
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Основные настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="{url module=SlideAdmin id=null}" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить еще слайд</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-md-4">
						<label>Превью слайда</label>
						<div class="slider-img">
							<img src="/files/uploads/{{$slide->filename|escape}}" style="width:100%;height:auto;">
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="post_image">Изображение слайда</label>
						
						<div class="input-group">
							<input type="text" id="post_image" class="form-control" name="filename" value="{$slide->filename|escape}">
							<span class="input-group-btn">
								<a href="./templates/js/filemanager/dialog.php?type=1&relative_url=1&field_id=post_image" type="button" class="btn btn-primary btn-flat iframe-btn">Выбрать</a>
							</span>
						</div>
					</div>
					<div class="form-group col-md-4">
						<div class="block">
							<label for="visible" style="line-height:34px;">Активен</label>
							<input name="visible" value='1' type="checkbox" {if $slide->visible}checked{/if} />
						</div>
						<div class="block">
							<h3>Требование к загружаемому изображению:</h3>
							<p>Размер: 1920 х 500 пикселей; формат: "jpg"; Качество 60-70</p>
						</div>
					
						<div class="form-group">
							<label for="link">Ссылка на страницу</label>
							<input type="text" id="link" class="form-control" name="link" value="{$slide->link|escape}" />
						</div>
						<div class="form-group">
							<label for="slider_id">id слайдера</label>
							<input type="text" id="slider_id" class="form-control" name="slider_id" value="{$slide->slider_id|escape}" />
						</div>
						<div class="form-group">
							<label for="language_id">Привязка к языку</label>
							<select id="language_id" class="form-control" name="language_id">
								<option value='0'>Для всех языков</option>
								{foreach $languages as $l}
									<option value='{$l->id}' {if $slide->language_id == $l->id}selected{/if}>{$l->name|escape}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		</form>
	</div>
</section>

{$meta_title='Импорт товаров' scope=parent}
{$sm_groupe = 'catalog' scope=parent}
{$sm_item = 'products-import' scope=parent}

{$page_additional_css = '
	
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/products_import.js"></script>
' scope=parent}

<style>
	.ui-progressbar-value { background-color:#b4defc; background-position:left; border-color: #009ae2;}
	#progressbar{ clear: both; height:29px;}
	#result{ clear: both; width:100%;}
</style>
{if $message_error != 'no_permission'}
	
{if $filename}	
<section class="content-header">
	<h1>Импорт товаров</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=ProductsAdmin">Каталог товаров</a></li>
        <li class="active">Импорт</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Импорт "{$filename|escape}"</h3>
				 <!--  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="{url module=PostAdmin id=null}" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить новую новость</a>  -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					{if $message_error}
					<div class="col-md-12">
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> {if $message_error == 'no_permission'}Установите права на запись в папку {$import_files_dir}
							{elseif $message_error == 'convert_error'}Не получилось сконвертировать файл в кодировку UTF8
							{elseif $message_error == 'upload_error'}Ошибка загрузки файла
							{elseif $message_error == 'locale_error'}На сервере не установлена локаль {$locale}, импорт может работать некорректно
							{else}{$message_error}{/if}</h4>
						</div>
					</div>
					{/if}
				
					<div class="progress">
						<div id='progressbar' class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
						  <span class="sr-only">40% Complete (success)</span>
						</div>
					</div>
					<ul id='import_result'></ul>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
{else}
<section class="content-header">
	<h1>Импорт товаров</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=ProductsAdmin">Каталог товаров</a></li>
        <li class="active">Импорт</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Импорт</h3>
				 <!--  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="{url module=PostAdmin id=null}" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить новую новость</a>  -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					{if $message_error}
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-ban"></i> {if $message_error == 'no_permission'}Установите права на запись в папку {$import_files_dir}
								{elseif $message_error == 'convert_error'}Не получилось сконвертировать файл в кодировку UTF8
								{elseif $message_error == 'upload_error'}Ошибка загрузки файла
								{elseif $message_error == 'locale_error'}На сервере не установлена локаль {$locale}, импорт может работать некорректно
								{else}{$message_error}{/if}</h4>
							</div>
						</div>
					</div>
					{/if}				
		
					<!-- Основная форма -->
					<div class="row">
						<form method=post id=product enctype="multipart/form-data">
						<div class="col-md-3">	
						<input type=hidden name="session_id" value="{$smarty.session.id}">
						<input name="file" class="import_file" type="file" value="" />
						</div>
						<div class="col-md-2">
						<input class="btn btn-block btn-success btn-flat" type="submit" name="" value="Загрузить" />
						
						</div>
						
						<div class="col-md-12">
						<p>
							<b>(максимальный размер файла &mdash; {if $config->max_upload_filesize>1024*1024}{$config->max_upload_filesize/1024/1024|round:'2'} МБ{else}{$config->max_upload_filesize/1024|round:'2'} КБ{/if})</b>
						</p>

						</div>
						</form>
					</div>		
					
					<div class="row">
						<div class="col-md-12">
						
							<h3>Справка</h3>
						
							<blockquote>
								<p>
									Сохраните таблицу в формате CSV
								</p>
								<p>
									В первой строке таблицы должны быть указаны названия колонок в таком формате:
							
									<ul>
										<li><label>Товар</label> название товара</li>
										<li><label>Категория</label> категория товара</li>
										<!-- <li><label>Бренд</label> бренд товара</li> -->
										<li><label>Вариант</label> название варианта</li>
										<li><label>Цена</label> цена товара</li>
										<li><label>Старая цена</label> старая цена товара</li>
										<li><label>Склад</label> количество товара на складе</li>
										<li><label>Артикул</label> артикул товара</li>
										<li><label>Видим</label> отображение товара на сайте (0 или 1)</li>
										<li><label>Рекомендуемый</label> является ли товар рекомендуемым (0 или 1)</li>
										<li><label>Аннотация</label> краткое описание товара</li>
										<li><label>Адрес</label> адрес страницы товара</li>
										<li><label>Описание</label> полное описание товара</li>
										<li><label>Изображения</label> имена локальных файлов или url изображений в интернете, через запятую</li>
										<li><label>Заголовок страницы</label> заголовок страницы товара (Meta title)</li>
										<li><label>Ключевые слова</label> ключевые слова (Meta keywords)</li>
										<li><label>Описание страницы</label> описание страницы товара (Meta description)</li>
									</ul>
								</p>
								<p>
									Любое другое название колонки трактуется как название свойства товара
								</p>
								<p>
									<a href='./files/import/example.csv'>Скачать пример файла</a>
								</p>
							 </blockquote>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
{/if}
{/if}
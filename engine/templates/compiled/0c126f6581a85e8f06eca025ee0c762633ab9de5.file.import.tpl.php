<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 18:12:45
         compiled from "engine/templates/html/products/import.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4882297795a07217d9ac729-78128006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c126f6581a85e8f06eca025ee0c762633ab9de5' => 
    array (
      0 => 'engine/templates/html/products/import.tpl',
      1 => 1508945260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4882297795a07217d9ac729-78128006',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message_error' => 0,
    'filename' => 0,
    'import_files_dir' => 0,
    'locale' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a07217da7a189_62288671',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a07217da7a189_62288671')) {function content_5a07217da7a189_62288671($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Импорт товаров', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('catalog', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('products-import', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/products_import.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<style>
	.ui-progressbar-value { background-color:#b4defc; background-position:left; border-color: #009ae2;}
	#progressbar{ clear: both; height:29px;}
	#result{ clear: both; width:100%;}
</style>
<?php if ($_smarty_tpl->tpl_vars['message_error']->value!='no_permission') {?>
	
<?php if ($_smarty_tpl->tpl_vars['filename']->value) {?>	
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
				  <h3 class="box-title" style="line-height:1.5">Импорт "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filename']->value, ENT_QUOTES, 'UTF-8', true);?>
"</h3>
				 <!--  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'PostAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить новую новость</a>  -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
					<div class="col-md-12">
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='no_permission') {?>Установите права на запись в папку <?php echo $_smarty_tpl->tpl_vars['import_files_dir']->value;?>

							<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='convert_error') {?>Не получилось сконвертировать файл в кодировку UTF8
							<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='upload_error') {?>Ошибка загрузки файла
							<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='locale_error') {?>На сервере не установлена локаль <?php echo $_smarty_tpl->tpl_vars['locale']->value;?>
, импорт может работать некорректно
							<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
<?php }?></h4>
						</div>
					</div>
					<?php }?>
				
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
<?php } else { ?>
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
				  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'PostAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить новую новость</a>  -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='no_permission') {?>Установите права на запись в папку <?php echo $_smarty_tpl->tpl_vars['import_files_dir']->value;?>

								<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='convert_error') {?>Не получилось сконвертировать файл в кодировку UTF8
								<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='upload_error') {?>Ошибка загрузки файла
								<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='locale_error') {?>На сервере не установлена локаль <?php echo $_smarty_tpl->tpl_vars['locale']->value;?>
, импорт может работать некорректно
								<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
<?php }?></h4>
							</div>
						</div>
					</div>
					<?php }?>				
		
					<!-- Основная форма -->
					<div class="row">
						<form method=post id=product enctype="multipart/form-data">
						<div class="col-md-3">	
						<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
						<input name="file" class="import_file" type="file" value="" />
						</div>
						<div class="col-md-2">
						<input class="btn btn-block btn-success btn-flat" type="submit" name="" value="Загрузить" />
						
						</div>
						
						<div class="col-md-12">
						<p>
							<b>(максимальный размер файла &mdash; <?php if ($_smarty_tpl->tpl_vars['config']->value->max_upload_filesize>1024*1024) {?><?php echo $_smarty_tpl->tpl_vars['config']->value->max_upload_filesize/1024/round(1024,'2');?>
 МБ<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['config']->value->max_upload_filesize/round(1024,'2');?>
 КБ<?php }?>)</b>
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
<?php }?>
<?php }?><?php }} ?>

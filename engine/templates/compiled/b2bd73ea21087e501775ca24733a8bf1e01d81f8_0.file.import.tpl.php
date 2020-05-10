<?php
/* Smarty version 3.1.32, created on 2020-03-12 15:11:00
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/import.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e6a34e4782e68_43949836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2bd73ea21087e501775ca24733a8bf1e01d81f8' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/import.tpl',
      1 => 1584018653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6a34e4782e68_43949836 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('meta_title', 'Импорт товаров' ,false ,8);
$_smarty_tpl->_assignInScope('sm_groupe', 'products' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'import' ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);
if ($_smarty_tpl->tpl_vars['filename']->value) {?>

<?php echo '<script'; ?>
>
	var in_process=false;
	var count=1;

	// On document load
	$(function(){
 		$("#progressbar").progressbar({ value: 1 });
		in_process=true;
		do_import();
	});
  
	function do_import(from)
	{
		from = typeof(from) != 'undefined' ? from : 0;
		$.ajax({
 			 url: "ajax/import.php",
 			 	data: {from:from},
 			 	dataType: 'json',
  				success: function(data){
  					for(var key in data.items)
  					{
						if(data.items[key].status == 'updated')
							var status = '<div class="tags"><div class="tag badge"><div class="row no-gutters align-items-center"><div class="tag-color mr-2 bg-green"></div><div class="tag-label">Обновлен</div></div></div></div>';
						else
							var status = '<div class="tags"><div class="tag badge"><div class="row no-gutters align-items-center"><div class="tag-color mr-2 bg-blue"></div><div class="tag-label">Добавлен</div></div></div></div>';
					
    					$('div#results').prepend('<div class="todo-item sort-item pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center "><div class="info px-4 d-flex align-items-center justify-content-left">'+count+'</div><div class="info col px-4 d-flex align-items-center justify-content-left"><div class="title mr-4"><a class="td-wh-none" href="index.php?module=ProductAdmin&id='+data.items[key].product.id+'">'+data.items[key].product.name+' '+data.items[key].variant.name+'</a></div>'+status+'</div></div>');
    					count++;
    				}
					value = 100*data.from/data.totalsize;
					value = value.toFixed();
    				$("#progressbar").text(value + "%").css("width", value + "%");
					if(data != false && !data.end)
    				{
    					do_import(data.from);
    				}
    				else
    				{
    					in_process = false;
    				}
  				},
				error: function(xhr, status, errorThrown) {
					alert(errorThrown+'\n'+xhr.responseText);
        		}  				
		});
	
	} 
<?php echo '</script'; ?>
>

<?php }
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-upload s-6"></i>
					</span>
					<span class="logo-text h4">Импорт товаров</span>
				</div>
			</div>
		</div>
	</div>
		
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group no-gutters">
				
				<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
				<?php echo '<script'; ?>
>  
					$(document).ready(function(){  
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.success({
						  title: 'Готово!',
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'added') {?>Категория добавлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value == 'updated') {?>Категория обновлена<?php }?>",
						  stack: {dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}
						});
					});   
				<?php echo '</script'; ?>
> 
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
				<?php echo '<script'; ?>
>  
					$(document).ready(function(){   
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.error({
						  title: 'Ой, что то не так...',
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_error']->value == 'no_permission') {?>Установите права на запись в папку <?php echo $_smarty_tpl->tpl_vars['import_files_dir']->value;
} elseif ($_smarty_tpl->tpl_vars['message_error']->value == 'convert_error') {?>Не получилось сконвертировать файл в кодировку UTF8<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value == 'upload_error') {?>Ошибка загрузки файла<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value == 'locale_error') {?>На сервере не установлена локаль <?php echo $_smarty_tpl->tpl_vars['locale']->value;?>
, импорт может работать некорректно<?php } else {
echo $_smarty_tpl->tpl_vars['message_error']->value;
}?>",
						  stack: {dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}
						});
					});   
				<?php echo '</script'; ?>
> 
				<?php }?>
				<form method=post id=product enctype="multipart/form-data">
				<div class="row">
					<?php if ($_smarty_tpl->tpl_vars['message_error']->value != 'no_permission') {?>
					<?php if ($_smarty_tpl->tpl_vars['filename']->value) {?>
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Импорт "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filename']->value, ENT_QUOTES, 'UTF-8', true);?>
"</b>
							</div>
							<div class="card-body">
								<div class="progress">
									<div id="progressbar" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0"
										 aria-valuemin="0" aria-valuemax="100">
									</div>
								</div>
							</div>
						</div>
						
						<div id="todo" class="card">
							<div id="list" class="todo-items w-100">
								<div class="todo-item py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center ">
									<div class="info px-4">
										<div class="title">
											#
										</div>
									</div>
									<div class="info col px-4">
										<div class="title">
											Название товара
										</div>
									</div>

								</div>
								<div id="results"></div>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-12 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-body">
								<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
								<input name="file" class="import_file mb-3" type="file" value="" />
								
								<p>
									<b>(максимальный размер файла &mdash; <?php if ($_smarty_tpl->tpl_vars['config']->value->max_upload_filesize > 1024*1024) {
echo $_smarty_tpl->tpl_vars['config']->value->max_upload_filesize/1024/round(1024,'2');?>
 МБ<?php } else {
echo $_smarty_tpl->tpl_vars['config']->value->max_upload_filesize/round(1024,'2');?>
 КБ<?php }?>)</b>
								</p>
								
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-12 text-right">
										<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Загрузить</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<?php }?>
					<?php }?>
				</div>
				</form>
			</div>
		</div>
	</div>
</div><?php }
}

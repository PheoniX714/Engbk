{$meta_title='Импорт товаров' scope='root'}
{$sm_groupe = 'products' scope='root'}
{$sm_item = 'import' scope='root'}

{capture name=js}
{if $filename}
{literal}
<script>
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
</script>
{/literal}
{/if}
{/capture}

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
						  text: "{if $message_error == 'no_permission'}Установите права на запись в папку {$import_files_dir}{elseif $message_error == 'convert_error'}Не получилось сконвертировать файл в кодировку UTF8{elseif $message_error == 'upload_error'}Ошибка загрузки файла{elseif $message_error == 'locale_error'}На сервере не установлена локаль {$locale}, импорт может работать некорректно{else}{$message_error}{/if}",
						  stack: {literal}{dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}{/literal}
						});
					});   
				</script> 
				{/if}
				<form method=post id=product enctype="multipart/form-data">
				<div class="row">
					{if $message_error != 'no_permission'}
					{if $filename}
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Импорт "{$filename|escape}"</b>
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
					{else}
					<div class="col-12 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-body">
								<input type=hidden name="session_id" value="{$smarty.session.id}">
								<input name="file" class="import_file mb-3" type="file" value="" />
								
								<p>
									<b>(максимальный размер файла &mdash; {if $config->max_upload_filesize>1024*1024}{$config->max_upload_filesize/1024/1024|round:'2'} МБ{else}{$config->max_upload_filesize/1024|round:'2'} КБ{/if})</b>
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
					
					{/if}
					{/if}
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
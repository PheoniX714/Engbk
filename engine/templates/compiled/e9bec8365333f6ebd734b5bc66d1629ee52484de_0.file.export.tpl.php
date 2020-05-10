<?php
/* Smarty version 3.1.32, created on 2020-02-10 18:04:19
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/export.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e417f03d3e948_95754715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9bec8365333f6ebd734b5bc66d1629ee52484de' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/export.tpl',
      1 => 1581350657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e417f03d3e948_95754715 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('meta_title', 'Экспорт товаров' ,false ,8);
$_smarty_tpl->_assignInScope('sm_groupe', 'products' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'export' ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
	
var in_process=false;

$(function() {

	// On document load
	$('button#start').click(function() {
 
 		$("#progressbar").progressbar({ value: 0 });

    	$("#start").hide('fast');
		do_export();
    
	});
  
	function do_export(page)
	{
		page = typeof(page) != 'undefined' ? page : 1;

		$.ajax({
 			 url: "ajax/export.php",
 			 	data: {page:page},
 			 	dataType: 'json',
  				success: function(data){
  				
    				if(data && !data.end)
    				{
						value = 100*data.page/data.totalpages; 
						value = value.toFixed();
						$("#progressbar").text(value + "%").css("width", value + "%");
    					do_export(data.page*1+1);
    				}
    				else
    				{	
	    				if(data && data.end)
	    				{
	    					$("#progressbar").hide('fast');
	    					window.location.href = 'files/export/export.csv';
    					}
    				}
  				},
				error:function(xhr, status, errorThrown) {
					alert(errorThrown+'\n'+xhr.responseText);
        		}  				
  				
		});
	
	} 
	
});
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-download s-6"></i>
					</span>
					<span class="logo-text h4">Экспорт товаров</span>
				</div>
			</div>
		</div>
	</div>
		
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group no-gutters">
				<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
				<?php echo '<script'; ?>
>  
					$(document).ready(function(){   
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.error({
						  title: 'Ой, что то не так...',
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_error']->value == 'no_permission') {?>Установите права на запись в папку <?php echo $_smarty_tpl->tpl_vars['export_files_dir']->value;
} else {
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
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Экспорт товаров</b>
							</div>
							<div class="card-body">
								<div class="progress">
									<div id="progressbar" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0"
										 aria-valuemin="0" aria-valuemax="100">
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-12 text-right">
										<button class="btn btn-success btn-sm text-white fuse-ripple-ready" id="start" type="button" name=""  value="Экспортировать">Экспортировать</button>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<?php }?>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
 
<?php }
}

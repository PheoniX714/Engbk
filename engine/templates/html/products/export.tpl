{$meta_title='Экспорт товаров' scope='root'}
{$sm_groupe = 'products' scope='root'}
{$sm_item = 'export' scope='root'}

{capture name=js}
{literal}
<script>
	
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
</script>
{/literal}
{/capture}

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
				{if $message_error}
				<script>  
					$(document).ready(function(){   
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.error({
						  title: 'Ой, что то не так...',
						  text: "{if $message_error == 'no_permission'}Установите права на запись в папку {$export_files_dir}{else}{$message_error}{/if}",
						  stack: {literal}{dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}{/literal}
						});
					});   
				</script> 
				{/if}
				<form method=post id=product enctype="multipart/form-data">
				<div class="row">
					{if $message_error != 'no_permission'}
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
					{/if}
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
 

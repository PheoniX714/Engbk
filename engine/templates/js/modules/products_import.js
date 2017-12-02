$(document).ready(function(){
	$("#sticker").sticky({topSpacing:0});
	$("#left-menu").sticky({topSpacing:0});
});
  
var in_process=false;
var count=1;

// On document load
$(function(){
	$("#progressbar").width("1%");
	in_process=true;
	console.log(in_process);
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
						var status_icon = '<i class="fa fa-refresh"></i>';
					else
						var status_icon = '<i class="fa fa-plus"></i>';
					
					console.log(status_icon);
					
					$('ul#import_result').prepend('<li class="'+data.items[key].status+'"><span class=count>'+count+'</span> <span class="status">'+ status_icon +'</span> <a target=_blank href="index.php?module=ProductAdmin&id='+data.items[key].product.id+'">'+data.items[key].product.name+'</a> '+data.items[key].variant.name+'</li>');
					count++;
				}

				$("#progressbar").width(100*data.from/data.totalsize + "%");
			
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

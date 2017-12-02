  $(document).ready(function(){
	$("#sticker").sticky({topSpacing:0});
	$("#left-menu").sticky({topSpacing:0});
	
	$(".select-all-images").on("click", function(){
		$('.images-list .image .image-check input[type="checkbox"][name*="check"]').prop('checked', true);
	});
	
  });
  $(function () {
	$(".sortable").sortable({ items: '.image-box', forcePlaceholderSize: true, handle: '.move_zone', zIndex: 999999  });
	$(".categories_select").select2();
	
	$(".delete-image").on("click", function(){
		var icon        = $(this);
		var img         = icon.closest(".image-box");
		var id          = img.find('input[type="hidden"][name*="positions"]').val();
		var album_id    = icon.closest('form').find('input[type="hidden"][name="id"]').val();
		var session_id  = icon.closest('form').find('input[type="hidden"][name="session_id"]').val();
		
		//console.log(id);
		
		if(id && !confirm('Подтвердите удаление'))
			return false;
		
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'gallery_album_delete_image', 'id': id, 'values': album_id, 'session_id': session_id},
			success: function(data){
				img.hide();
			},
			dataType: 'json'
		});	
		return false;	
	});
	
  });
	
  $(function () {
		var checkAll = $('input.checkbox-toggle');
		var checkboxes = $('input.minimal');
	  
		$('input[type="checkbox"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue'
		});
		
		checkAll.on('ifChecked ifUnchecked', function(event) {        
			if (event.type == 'ifChecked') {
				checkboxes.iCheck('check');
			} else {
				checkboxes.iCheck('uncheck');
			}
		});
		
		checkboxes.on('ifChanged', function(event){
			if(checkboxes.filter(':checked').length == checkboxes.length) {
				checkAll.prop('checked', 'checked');
			} else {
				checkAll.removeProp('checked');
			}
			checkAll.iCheck('update');
		});
  });

$(function() {

	// Автозаполнение мета-тегов
	meta_title_touched = true;
	meta_keywords_touched = true;
	url_touched = true;
	
	if($('input[name="meta_title"]').val() == generate_meta_title() || $('input[name="meta_title"]').val() == '')
		meta_title_touched = false;
	if($('input[name="meta_keywords"]').val() == generate_meta_keywords() || $('input[name="meta_keywords"]').val() == '')
		meta_keywords_touched = false;
	if($('input[name="url"]').val() == generate_url() || $('input[name="url"]').val() == '')
		url_touched = false;
		
	$('input[name="meta_title"]').change(function() { meta_title_touched = true; });
	$('input[name="meta_keywords"]').change(function() { meta_keywords_touched = true; });
	$('input[name="url"]').change(function() { url_touched = true; });
	
	$('input[name="name"]').keyup(function() { set_meta(); });
	  
});

function set_meta()
{
	if(!meta_title_touched)
		$('input[name="meta_title"]').val(generate_meta_title());
	if(!meta_keywords_touched)
		$('input[name="meta_keywords"]').val(generate_meta_keywords());
	if(!url_touched)
		$('input[name="url"]').val(generate_url());
}

function generate_meta_title()
{
	name = $('input[name="name"]').val();
	return name;
}

function generate_meta_keywords()
{
	name = $('input[name="name"]').val();
	return name;
}

function generate_url()
{
	url = $('input[name="name"]').val();
	url = url.replace(/[\s]+/gi, '-');
	url = translit(url);
	url = url.replace(/[^0-9a-z_\-]+/gi, '').toLowerCase();	
	return url;
}

function translit(str)
{
	var ru=("А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я").split("-")   
	var en=("A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya").split("-")   
 	var res = '';
	for(var i=0, l=str.length; i<l; i++)
	{ 
		var s = str.charAt(i), n = ru.indexOf(s); 
		if(n >= 0) { res += en[n]; } 
		else { res += s; } 
    } 
    return res;  
}

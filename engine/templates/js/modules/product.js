$(document).on('ready', function() {
	$("#sticker").sticky({topSpacing:0});
	$("#left-menu").sticky({topSpacing:0});
	$('.my-colorpicker1').colorpicker();
	
});

$(function() {
	
	$(".sortable-list").sortable({ items: '.r-row' , axis: 'y',  forcePlaceholderSize: true, handle: '.move_bars' });
	$(".sortable-table").sortable({ items: '.c_item' , axis: 'y',  cancel: 'thead', forcePlaceholderSize: true, handle: '.move_zone' });
	$(".sortable-images").sortable({ items: '.image-box', forcePlaceholderSize: true, handle: '.move_zone', zIndex: 999999  });
	
	$("#images .select-all-images").on("click", function(){
		console.log(1);
		$('#images .images-list .image .image-check input[type="checkbox"][name*="check"]').prop('checked', true);
	});
	
	$(".delete-image").on("click", function(){
		var icon        = $(this);
		var img         = icon.closest(".image-box");
		var id          = img.find('input[type="hidden"][name*="positions"]').val();
		var session_id  = icon.closest('form').find('input[type="hidden"][name="session_id"]').val();
		
		console.log(id);
		
		if(id && !confirm('Подтвердите удаление'))
			return false;
		
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'product_delete_image', 'id': id, 'session_id': session_id},
			success: function(data){
				img.hide();
			},
			dataType: 'json'
		});	
		return false;	
	});

	// Добавление категории
	$("#product_categories").on('click', '.add', function() {
		$("#product_categories ul li:last").clone(false).appendTo('#product_categories ul').fadeIn('slow').find("select[name*=categories]:last").focus();
		$("#product_categories ul li:last button.add").hide();
		$("#product_categories ul li:last button.delete").show();
		return false;
	});

	// Удаление категории
	$("#product_categories").on('click', '.delete', function() {
		$(this).closest("li").fadeOut(200, function() { $(this).remove(); });
		return false;
	});

	// Изменение набора свойств при изменении категории
	$('select[name="categories[]"]:first').change(function() {
		show_category_features($("option:selected",this).val());
	});

	// Автодополнение свойств
	$('div.prop_ul input[name*=options]').each(function(index) {
		feature_id = $(this).closest('div').attr('feature_id');
		$(this).autocomplete({
			serviceUrl:'ajax/options_autocomplete.php',
			minChars:0,
			params: {feature_id:feature_id},
			noCache: false
		});
	});

	// Удаление варианта
	$('.variants_table').on('click', '#del_variant', function() {
		if($(".variants_table tr.c_item").size()>1)
		{
			$(this).closest("tr.c_item").fadeOut(200, function() { $(this).remove(); });
		}
		return false;
	});

	// Добавление варианта
	$('.variants_table').on('click', '#add_variant', function() {
		var variant = $('.variants_table tr.c_item:first').clone(true);
		$(variant).find("input[name*=variant][name*=name]").val('');
		$(variant).find("input[name*=variant][name*=sku]").val('');
		$(variant).find("input[name*=variant][name*=id]").val('');
		$(variant).find("#add_variant").remove();
		$(variant).find("#del_variant").show();
		$(variant).find("input[name*=variant][name*=stock]").val('∞').end().appendTo(".variants_table").show('slow').remove("#add_variant");
		return false;		
	});


	// Добавление нового свойства товара
	var new_feature = $('#new_feature').clone(true);
	$('#new_feature').remove().removeAttr('id');
	$('#add_new_feature').click(function() {
		$(new_feature).clone(true).appendTo('div.new_features').fadeIn('slow').find("input[name*=new_feature_name]").focus();
		return false;
	});	

	// infinity
	$("input[name*=variant][name*=stock]").focus(function() {
		if($(this).val() == '∞')
			$(this).val('');
		return false;
	});

	$("input[name*=variant][name*=stock]").blur(function() {
		if($(this).val() == '')
			$(this).val('∞');
	});

	// Удаление связанного товара
	$(".related_products button.delete").on('click', function() {
		 $(this).closest("div.r-row").fadeOut(200, function() { $(this).remove(); });
		 return false;
	});

	// Добавление связанного товара 
	var new_related_product = $('#new_related_product').clone(true);
	$('#new_related_product').remove().removeAttr('id');

	$("input#related_products").autocomplete({
		serviceUrl:'ajax/search_products.php',
		minChars:0,
		noCache: false, 
		onSelect:
			function(suggestion){
				$("input#related_products").val('').focus().blur(); 
				new_item = new_related_product.clone().appendTo('.related_products');
				new_item.removeAttr('id');
				new_item.find('a.related_product_name').html(suggestion.data.name);
				new_item.find('a.related_product_name').attr('href', 'index.php?module=ProductAdmin&id='+suggestion.data.id);
				new_item.find('input[name*="related_products"]').val(suggestion.data.id);
				if(suggestion.data.image)
					new_item.find('img.product_icon').attr("src", suggestion.data.image);
				else
					new_item.find('img.product_icon').remove();
				new_item.show();
			},
		formatResult:
			function(suggestions, currentValue){
				var reEscape = new RegExp('(\\' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\'].join('|\\') + ')', 'g');
				var pattern = '(' + currentValue.replace(reEscape, '\\$1') + ')';
				return (suggestions.data.image?"<img align=absmiddle src='"+suggestions.data.image+"'> ":'') + suggestions.value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
			}

	});

	// Автозаполнение мета-тегов
	meta_title_touched = true;
	meta_keywords_touched = true;
	url_touched = true;

	if($('input[name="meta_title"]').val() == generate_meta_title() || $('input[name="meta_title"]').val() == '')
		meta_title_touched = false;
	if($('input[name="meta_keywords"]').val() == generate_meta_keywords() || $('input[name="meta_keywords"]').val() == '')
		meta_keywords_touched = false;
	if($('input[name="url"]').val() == generate_url())
		url_touched = false;
		
	$('input[name="meta_title"]').change(function() { meta_title_touched = true; });
	$('input[name="meta_keywords"]').change(function() { meta_keywords_touched = true; });
	$('input[name="url"]').change(function() { url_touched = true; });

	$('input[name="name"]').keyup(function() { set_meta(); });

	$(".nav-tabs").on('click', 'a[data-toggle="tab"]', function(){
		jQuery.cookie('last_tab', $(this).closest("a").attr('href'));
	});

	//activate latest tab, if it exists:
	var lastTab = jQuery.cookie('last_tab');
	if (lastTab) {
		$(".nav-tabs li").removeClass('active');
		$('a[href="'+ lastTab +'"]').parents('li:first').addClass('active');
		$(".product-edit-page .tab-content").children().removeClass('active');
		$(lastTab).addClass('active');
	}
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

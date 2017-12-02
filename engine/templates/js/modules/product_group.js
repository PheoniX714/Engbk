$(document).on('ready', function() {
	$("#sticker").sticky({topSpacing:0});
	$("#left-menu").sticky({topSpacing:0});
});

$(function() {
	
	$(".sortable-list").sortable({ items: '.r-row' , axis: 'y',  forcePlaceholderSize: true, handle: '.move_bars' });
	
	// Удаление связанного товара
	$(".group_products button.delete").on('click', function() {
		 $(this).closest("div.r-row").fadeOut(200, function() { $(this).remove(); });
		 return false;
	});

	// Добавление связанного товара 
	var new_group_product = $('#new_group_product').clone(true);
	$('#new_group_product').remove().removeAttr('id');

	$("input#group_products").autocomplete({
		serviceUrl:'ajax/search_products.php',
		minChars:0,
		noCache: false, 
		onSelect:
			function(suggestion){
				$("input#group_products").val('').focus().blur(); 
				new_item = new_group_product.clone().appendTo('.group_products');
				new_item.removeAttr('id');
				new_item.find('a.group_product_name').html(suggestion.data.name);
				new_item.find('a.group_product_name').attr('href', 'index.php?module=ProductAdmin&id='+suggestion.data.id);
				new_item.find('input[name*="group_products"]').val(suggestion.data.id);
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
});
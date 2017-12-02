$(document).on('ready', function() {
	$("#sticker").sticky({topSpacing:0});
	$("#left-menu").sticky({topSpacing:0});
});

$(function() {
	$("button.delete").on("click", function(){
		$('#functional-table .c_item input[type="checkbox"][name*="check"]').prop('checked', false);
		$(this).closest(".c_item").find('input[type="checkbox"][name*="check"]').prop('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').prop('selected', true);
		$(this).closest("form").submit();
		return false;
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
	
});
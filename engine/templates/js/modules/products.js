  $(document).ready(function(){
	$("#sticker").sticky({topSpacing:0});
	$("#left-menu").sticky({topSpacing:0});
	
  });
  $(function () {
	$(".sortable-table").sortable({ items: '.c_item' , axis: 'y',  cancel: 'thead', forcePlaceholderSize: true, handle: '.move_zone',update: function(event, ui){$(this).closest("form").submit();} });  
	
	$("button.featured").on('click', function(){
		var icon        = $(this);
		var line        = icon.closest("tr.c_item");
		var but         = icon.closest(".btn");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var session_id  = icon.closest('#list_form').find('input[type="hidden"][name*="session_id"]').val();
		var state       = but.hasClass('act')?0:1;
		console.log(id);
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'product', 'id': id, 'values': {'featured': state}, 'session_id': session_id},
			success: function(data){
				if(!state){
					but.removeClass('btn-warning');
					but.addClass('btn-default');
					but.removeClass('act');
				}else{
					but.removeClass('btn-default');
					but.addClass('btn-warning');
					but.addClass('act');
				}		
			},
			dataType: 'json'
		});	
		return false;	
	});
	
	$("button.enable").on('click', function(){
		var icon        = $(this);
		var line        = icon.closest("tr.c_item");
		var but         = icon.closest(".btn");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var session_id  = icon.closest('#list_form').find('input[type="hidden"][name*="session_id"]').val();
		var state       = but.hasClass('act')?0:1;
		console.log(id);
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'product', 'id': id, 'values': {'visible': state}, 'session_id': session_id},
			success: function(data){
				if(!state){
					but.removeClass('btn-success');
					but.addClass('btn-default');
					but.removeClass('act');
				}else{
					but.removeClass('btn-default');
					but.addClass('btn-success');
					but.addClass('act');
				}		
			},
			dataType: 'json'
		});	
		return false;	
	});
		
	// Удалить 
	$("button.delete").on("click", function(){
		$('#functional-table tr td input[type="checkbox"][name*="check"]').prop('checked', false);
		$(this).closest("#functional-table tr").find('input[type="checkbox"][name*="check"]').prop('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').prop('selected', true);
		$(this).closest("form").submit();
		return false;
	});
	
	$("form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
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

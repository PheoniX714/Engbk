  $(document).ready(function(){
	$("#sticker").sticky({topSpacing:0});
	$("#left-menu").sticky({topSpacing:0});
	
  });
  $(function () {
	$(".sortable-table").sortable({ items: '.c_item' , axis: 'y',  cancel: 'thead', forcePlaceholderSize: true, handle: '.move_zone',update: function(event, ui){$(this).closest("form").submit();} });  
	
	// Добавление валюты
	var curr = $('#new_currency').clone(true);
	$('#new_currency').remove().removeAttr('id');
	$("#list_form").on('click', '#add_currency', function() {
		$(curr).clone(true).appendTo('#functional-table').fadeIn('slow').find("input[name*=currency][name*=name]").focus();
		return false;
	});	
		
	// Скрыт/Видим
	$("button.enable").on('click', function(){
		var icon        = $(this);
		var line        = icon.closest("tr.c_item");
		var but         = icon.closest(".btn");
		var id          = line.find('input[name*="currency[id]"]').val();
		var state       = but.hasClass('active')?0:1;
		var session_id  = icon.closest('#list_form').find('input[type="hidden"][name*="session_id"]').val();
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'currency', 'id': id, 'values': {'enabled': state}, 'session_id': session_id},
			success: function(data){
				if(!state){
					but.removeClass('btn-success');
					but.addClass('btn-default');
					but.removeClass('active');
				}else{
					but.removeClass('btn-default');
					but.addClass('btn-success');
					but.addClass('active');
				}			
			},
			dataType: 'json'
		});	
		return false;	
	});
	
	// Центы
	$("button.cents").on('click', function(){
		var icon        = $(this);
		var line        = icon.closest("tr.c_item");
		var but         = icon.closest(".btn");
		var id          = line.find('input[name*="currency[id]"]').val();
		var state       = but.hasClass('active')?0:2;
		var session_id  = icon.closest('#list_form').find('input[type="hidden"][name*="session_id"]').val();
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'currency', 'id': id, 'values': {'cents': state}, 'session_id': session_id},
			success: function(data){
				if(!state){
					but.removeClass('btn-warning');
					but.addClass('btn-default');
					but.removeClass('active');
				}else{
					but.removeClass('btn-default');
					but.addClass('btn-warning');
					but.addClass('active');
				}
			},
			dataType: 'json'
		});	
		return false;	
	});
	
	// Удалить валюту
	$("button.delete").on('click', function(){
		$('input[type="hidden"][name="action"]').val('delete');
		$('input[type="hidden"][name="action_id"]').val($(this).closest("tr.c_item").find('input[type="hidden"][name*="currency[id]"]').val());
		$(this).closest("form").submit();
	});
	
	// Запоминаем id первой валюты, чтобы определить изменение базовой валюты
	var base_currency_id = $('input[name*="currency[id]"]').val();
	
	$("form").submit(function() {
		if($('input[type="hidden"][name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
		if(base_currency_id != $('input[name*="currency[id]"]:first').val() && confirm('Пересчитать все цены в '+$('input[name*="name"]:first').val()+' по текущему курсу?', 'msgBox Title'))
			$('input[name="recalculate"]').val(1);
	});

  });
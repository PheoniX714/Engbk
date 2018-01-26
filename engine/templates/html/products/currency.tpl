{$sm_groupe = 'settings' scope=parent}
{$sm_item = 'currency' scope=parent}
{$meta_title = "Валюты" scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}
{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/currency.js"></script>	
' scope=parent}
<section class="content-header">
	<h1>Список валют</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Валюты</li>
	</ol>
</section>

<section class="content">
<form id="list_form" method="post">
<!-- Main row -->
  <div class="row">
	<!-- Left col -->
	<div class="col-md-12">
	  <div class="box box-success"> 
		<div class="box-header">
		  <i class="fa fa-money"></i>
		  <h3 class="box-title" style="line-height:1.5">Список валют</h3>
		  <a class="btn btn-sm btn-primary pull-right btn-flat" id="add_currency" href="#"><i class="fa fa-plus"></i> <b> Добавить валюту</b></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="{$smarty.session.id}">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th sortable-table" id="functional-table">
                <thead>
					<tr id="thead">
						<th class="move-cell"></th>
						<th class="id-cell">ID</th>
						<th class="name-cell">Название валюты</th>
						<th class="name-cell">Знак</th>
						<th class="name-cell">Код ISO</th>
						<th class="name-cell">Курс</th>
						<th class="actions-cell">Действия</th>
					</tr>
				</thead>
				<tbody>
					{foreach $currencies as $c}
					<tr class="c_item">
						<td class="move-cell">
							<input name="currency[id][{$c->id}]" type="hidden" 	value="{$c->id|escape}" />
							<div class="move_zone"><i class="fa fa-bars"></i></div>
						</td>
						<td class="id-cell">
							{$c->id}
						</td>
						<td class="name-cell">
							<input name="currency[name][{$c->id}]" type="" value="{$c->name|escape}" class="form-control" />
						</td>
						<td class="name-cell">
							<input name="currency[sign][{$c->id}]" type="text" class="form-control" value="{$c->sign|escape}" />
						</td>
						<td class="name-cell">
							<input name="currency[code][{$c->id}]" type="text" class="form-control" value="{$c->code|escape}" />
						</td>
						<td style="line-height:30px;">
							{if !$c@first}
							<input name="currency[rate_from][{$c->id}]" class="form-control" style="max-width: 70px; margin-right:5px; display:inline-block;" type="text" value="{$c->rate_from|escape}" /> <b>{$c->sign}</b> = <input name="currency[rate_to][{$c->id}]" class="form-control" style="max-width: 70px; margin-left:10px; margin-right:5px; display:inline-block;" type="text" value="{$c->rate_to|escape}" /> <b>{$currency->sign}</b>
							{else}
							<input name="currency[rate_from][{$c->id}]" class="form-control" style="max-width: 70px; display:inline-block;" type="hidden" value="{$c->rate_from|escape}" /> 
							<input name="currency[rate_to][{$c->id}]" class="form-control" style="max-width: 70px; display:inline-block;" type="hidden" value="{$c->rate_to|escape}" />
							{/if}
						</td>
						<td>
							<button class="cents btn btn-sm btn-flat {if $c->cents == 2}btn-warning active{else}btn-default{/if} btn-actions" ><i class="fa fa-money"></i></button>&nbsp;
							<button class="enable btn btn-sm btn-flat {if !$c->enabled}btn-default{else}btn-success active{/if} btn-actions" ><i class="fa fa-lightbulb-o"></i></button>&nbsp;
							{if !$c@first}
								<button class="delete btn btn-sm btn-flat btn-danger btn-actions"><i class="fa fa-trash-o"></i></button>
							{/if}
						</td>
					</tr>
					{/foreach}
					<tr class="c_item" id="new_currency" style='display:none;'>
						<td>
							<div class="move_zone" style=" width: 20px; cursor:pointer; float:left;"><i class="fa fa-bars" style="font-size: 20px;"></i></div>
						</td>
						<td class="id-cell">
							
						</td>
						<td>
							<input name="currency[id][]" class="form-control" type="hidden" value="" />
							<input name="currency[name][]" class="form-control" type="" value="" />
						</td>
						<td>
							<input name="currency[sign][]" class="form-control" type="" value="" />
						</td>
						<td>
							<input  name="currency[code][]" class="form-control" type="" value="" />
						</td>
						<td style="line-height:30px;">
							<input name="currency[rate_from][]" style="width: 70px; margin-right:10px; display:inline-block;" class="form-control" type="text" value="1" /> = <input name="currency[rate_to][]" style="width: 70px; margin-right:10px; display:inline-block;" class="form-control" type="text" value="1" /> {$currency->sign|escape}
						</td>
						<td></td>
					</tr>
				</tbody>
			</table>			
		</div>
		<!-- /.box-body -->		
	  </div>
	  <!-- /.box -->
	  
	  <div class="row">
		  
		<div class="col-lg-2">
			<input type=hidden name=recalculate value='0'>
			<input type=hidden name=action value=''>
			<input type=hidden name=action_id value=''>
			<button type="submit" class="btn btn-block btn-success btn-flat" value="Сохранить">Сохранить</button>
		</div>
	  </div>
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</form>
</section>

{*
{literal}
<script>
$(function() {

	// Сортировка списка
	// Сортировка вариантов
	$(".sortable").sortable({ items: '.c_item' , axis: 'y',  cancel: '#header', handle: '.move_zone' });
	
	// Добавление валюты
	var curr = $('#new_currency').clone(true);
	$('#new_currency').remove().removeAttr('id');
	$(".portlet-tools").on('click', '#add_currency', function() {
		$(curr).clone(true).appendTo('#currencies').fadeIn('slow').find("input[name*=currency][name*=name]").focus();
		return false;		
	});	
 

	// Скрыт/Видим
	$("button.enable").click(function() {
		var icon        = $(this);
		var line        = icon.closest("tr");
		var but         = icon.closest(".btn");
		var id          = line.find('input[name*="currency[id]"]').val();
		var state       = but.hasClass('active')?0:1;
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'currency', 'id': id, 'values': {'enabled': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
			success: function(data){
				if(!state){
					but.removeClass('btn-secondary');
					but.addClass('btn-default');
					but.removeClass('active');
				}else{
					but.removeClass('btn-default');
					but.addClass('btn-secondary');
					but.addClass('active');
				}			
			},
			dataType: 'json'
		});	
		return false;	
	});
	
	// Центы
	$("button.cents").click(function() {
		var icon        = $(this);
		var line        = icon.closest("tr");
		var but         = icon.closest(".btn");
		var id          = line.find('input[name*="currency[id]"]').val();
		var state       = but.hasClass('active')?0:2;
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'currency', 'id': id, 'values': {'cents': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
			success: function(data){
				if(!state){
					but.removeClass('btn-secondary');
					but.addClass('btn-default');
					but.removeClass('active');
				}else{
					but.removeClass('btn-default');
					but.addClass('btn-secondary');
					but.addClass('active');
				}
			},
			error: function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
            },
			dataType: 'json'
		});	
		return false;	
	});
	
	// Удалить валюту
	$("button.delete").click(function() {
		$('input[type="hidden"][name="action"]').val('delete');
		$('input[type="hidden"][name="action_id"]').val($(this).closest("tr").find('input[type="hidden"][name*="currency[id]"]').val());
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

</script>
{/literal}
*}
{* Title *}
{$meta_title='Список товаров' scope=parent}
{$sm_groupe = 'catalog' scope=parent}
{$sm_item = 'products' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/products.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Каталог товаров</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Каталог товаров</li>
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
		  <i class="fa fa-th-list"></i>
		  <h3 class="box-title" style="line-height:1.5">Список товаров ({$products_count})</h3>
		  <a href="index.php?module=ProductAdmin" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить товар</b></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="{$smarty.session.id}">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th sortable-table" id="functional-table">
                <tbody>
				<tr>
					<th class="move-cell"></th>
					<th class="checkbox-cell ln-inherit">
						<input type="checkbox" class="minimal checkbox-toggle">
					</th>
					<th class="id-cell">ID</th>
					<th class="sku-cell">Артикул</th>
					<th>Товар</th>
					<th>Цена</th>
					<th class="actions-cell">Действия</th>
				</tr>
				{if $products}
                {foreach $products as $product}
				<tr class="c_item">
					<td class="move-cell">
						<input type="hidden" name="positions[{$product->id}]" value="{$product->position}">
						<div class="move_zone"><i class="fa fa-bars"></i></div>
					</td>
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="{$product->id|escape}">
					</td>
					<td class="id-cell">
						{$product->id|escape}
					</td>
					<td class="sku-cell">
						{$product->sku|escape}
					</td>
					<td class="product-cell">
						{$image = $product->images|@first}
						{if $image}
						<a href="{url module=ProductAdmin id=$product->id}"><img src="{$image->filename|escape|resize:50:50}" /></a>
						{/if}
						<a href="{url module=ProductAdmin id=$product->id}">{$product->name|escape}</a>
					</td>
					<td class="price-cell">
						<ul>
						{foreach $product->variants as $variant}
							<li {if !$variant@first}class="variant" style="display:none;"{/if}>
								<div class="variant-name"><i title="{$variant->name|escape}">{$variant->name|escape|truncate:20:'…':true:true}</i></div>
								<input style="max-width:90px" type="text" name="price[{$variant->id}]" value="{$variant->price}" class="form-control" {if $variant->compare_price>0}title="Старая цена &mdash; {$variant->compare_price} {$currency->sign}"{/if} />&nbsp;<label>{$currency->sign}</label>
								<input class="form-control" type="text" name="stock[{$variant->id}]" value="{if $variant->infinity}∞{else}{$variant->stock}{/if}" style="max-width:60px;min-width:60px" />&nbsp;<label>{$settings->units}</label>
							</li>
						{/foreach}
						</ul>
					</td>
					<td class="actions-cell">
						<button class="featured btn btn-sm {if !$product->featured}btn-default{else}btn-warning act{/if} btn-flat btn-actions" data-toggle="tooltip" title="Рекомендуемый"><i class="fa fa-fire"></i></button>						
						<button class="enable btn btn-sm btn-flat {if !$product->visible}btn-default{else}btn-success act{/if} btn-actions" data-toggle="tooltip" title="Активен" ><i class="fa fa-lightbulb-o"></i></button>
						<a href="../products/{$product->url}" class="btn btn-sm btn-primary btn-flat btn-actions preview" data-toggle="tooltip" title="Открыть товар на сайте в новом окне"  target="_blank"><i class="fa fa-share"></i></a>
						<a href="{url module=ProductAdmin id=$product->id }" class="btn btn-sm btn-flat btn-primary btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
						<button class="delete btn btn-sm btn-flat btn-danger btn-actions" data-toggle="tooltip" title="Удалить" ><i class="fa fa-trash-o"></i></button>
					</td>
						
				</tr>
				{/foreach}
				{else}
				<tr>
					<td colspan="7">
						Товаров нет
					</td>
				</tr>
				{/if}
				</tbody>
			</table>
			<div class="col-lg-12">
			{include file='pagination.tpl'}
			</div>
		</div>
		<!-- /.box-body -->		
	  </div>
	  <!-- /.box -->
	  
	  <div class="row">
		<div class="form-group col-lg-3">
			<select id="action" class="form-control" name="action">
				<option value="enable">Сделать видимыми</option>
				<option value="disable">Сделать невидимыми</option>
				<option value="set_featured">Сделать рекомендуемым</option>
				<option value="unset_featured">Отменить рекомендуемый</option>
				<option value="duplicate">Создать дубликат</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
		  
		<div class="col-lg-2">
			<button type="submit" class="btn btn-block btn-success btn-flat"value="Применить">Применить</button>
		</div>
	  </div>
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</form>
</section>

{* On document load 

{literal}
<script>

$(function() {

	// Сортировка списка
	$(".sortable").sortable({
		items:             ".c_item",
		tolerance:         "pointer",
		handle:            ".move_zone",
		scrollSensitivity: 40,
		opacity:           0.7, 
		
		helper: function(event, ui){		
			if($('input[type="checkbox"][name*="check"]:checked').size()<1) return ui;
			var helper = $('<div/>');
			$('input[type="checkbox"][name*="check"]:checked').each(function(){
				var item = $(this).closest('.c_item');
				helper.height(helper.height()+item.innerHeight());
				if(item[0]!=ui[0]) {
					helper.append(item.clone());
					$(this).closest('.c_item').remove();
				}
				else {
					helper.append(ui.clone());
					item.find('input[type="checkbox"][name*="check"]').attr('checked', false);
				}
			});
			return helper;			
		},	
 		start: function(event, ui) {
  			if(ui.helper.children('.c_item').size()>0)
				$('.ui-sortable-placeholder').height(ui.helper.height());
		},
		beforeStop:function(event, ui){
			if(ui.helper.children('.c_item').size()>0){
				ui.helper.children('.c_item').each(function(){
					$(this).insertBefore(ui.item);
				});
				ui.item.remove();
			}
		},
		update:function(event, ui)
		{
			$("#list_form input[name*='check']").attr('checked', false);
			$("#list_form").ajaxSubmit();
		}
	});
	
	// Перенос товара в другую категорию
	$("#action select[name=action]").on('change', function(){
		if($(this).val() == 'move_to_category')
			$("span#move_to_category").show();
		else
			$("span#move_to_category").hide();
	});

	// Перенос товара в другой бренд
	$("#action select[name=action]").on('change', function(){
		
		if($(this).val() == 'move_to_brand')
			$("span#move_to_brand").show();
		else
			$("span#move_to_brand").hide();
	});

	// Если есть варианты, отображать ссылку на их разворачивание
	if($("li.variant").size()>0)
		$("#expand").show();


	// Показать все варианты
	$('#expand_all').on('click', function(){
		$("a#expand_all").hide();
		$("a#roll_up_all").show();
		$("a.expand_variant").hide();
		$("a.roll_up_variant").show();
		$(".products ul li.variant").fadeIn('fast');
		return false;
	});


	// Свернуть все варианты
	$('#roll_up_all').on('click', function(){
		$("a#roll_up_all").hide();
		$("a#expand_all").show();
		$("a.roll_up_variant").hide();
		$("a.expand_variant").show();
		$(".products ul li.variant").fadeOut('fast');
		return false;
	});

 
	// Показать вариант
	$('a.expand_variant').on('click', function(){
		$(this).closest("div.cell").find("li.variant").fadeIn('fast');
		$(this).closest("div.cell").find("a.expand_variant").hide();
		$(this).closest("div.cell").find("a.roll_up_variant").show();
		return false;
	});

	// Свернуть вариант
	$('a.roll_up_variant').on('click', function(){
		$(this).closest("div.cell").find("li.variant").fadeOut('fast');
		$(this).closest("div.cell").find("a.roll_up_variant").hide();
		$(this).closest("div.cell").find("a.expand_variant").show();
		return false;
	});

	// Удалить товар
	$('button.delete').on('click', function(){
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("tr.c_item").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	
	// Дублировать товар
	$('button.duplicate').on('click', function(){
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("tr.c_item").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=duplicate]').attr('selected', true);
		$(this).closest("form").submit();
	});
	// Показать товар
	$('button.enable').on('click', function(){
		var icon        = $(this);
		var line        = icon.closest("tr");
		var but         = icon.closest(".btn");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = but.hasClass('act')?0:1;
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'product', 'id': id, 'values': {'visible': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
			success: function(data){
				if(!state){
					but.removeClass('btn-secondary');
					but.addClass('btn-default');
					but.removeClass('act');
				}else{
					but.removeClass('btn-default');
					but.addClass('btn-secondary');
					but.addClass('act');
				}			
			},
			dataType: 'json'
		});	
		return false;	
	});

	// Сделать хитом
	$('button.featured').on('click', function(){
		var icon        = $(this);
		var line        = icon.closest("tr");
		var but         = icon.closest(".btn");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = but.hasClass('act')?0:1;
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'product', 'id': id, 'values': {'featured': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
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

	// Подтверждение удаления
	$("form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
	});
	
	
	// Бесконечность на складе
	$("input[name*=stock]").focus(function() {
		if($(this).val() == '∞')
			$(this).val('');
		return false;
	});
	$("input[name*=stock]").blur(function() {
		if($(this).val() == '')
			$(this).val('∞');
	});
});

</script>
{/literal}
*}
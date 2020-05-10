{* Title *}
{$meta_title='Список товаров' scope='root'}
{$sm_groupe = 'products' scope='root'}
{$sm_item = 'products' scope='root'}

{capture name=js}
{literal}
<script>
	var products_list = document.getElementById('products_list');
	var sortable = new Sortable(products_list, {
		multiDrag: true,
		selectedClass: 'bg-yellow-100',
		handle: '.handle',
		animation: 150,
		ghostClass: 'bg-blue-100',
		onEnd: function() {
			$.ajax({url: document.location.href, type: "POST", dataType: "html", data: $('form').serialize()});
		}
	});

	$(function () {
		$("#check_all").change(function() {
			if($('#check_all').hasClass('checked')){
				$('#list .custom-control-input:not(:disabled)').attr('checked', false);
				$('#check_all').removeClass('checked');
			}else{
				$('#list .custom-control-input:not(:disabled)').attr('checked', true);
				$('#check_all').addClass('checked');
			}
		});		
		  
		$("button.visible").on('click', function(){
			var icon        = $(this);
			var line        = icon.closest("#list .todo-item");
			var tag        	= line.find(".visible-tag");
			var but         = icon.children(".icon-lightbulb");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var session_id  = icon.closest('form').find('input[type="hidden"][name*="session_id"]').val();
			var state       = but.hasClass('enbl')?0:1;
			$.ajax({
				type: 'POST',
				url: 'ajax/update_object.php',
				data: {'object': 'product', 'id': id, 'values': {'visible': state}, 'session_id': session_id},
				success: function(data){
					if(!state){
						but.removeClass('text-yellow-900 enbl');
						tag.show();
					}else{
						but.addClass('text-yellow-900 enbl');
						tag.hide();
					}			
				},
				dataType: 'json'
			});	
			return false;
		});
		
		$("button.featured").on('click', function(){
			var icon        = $(this);
			var line        = icon.closest("#list .todo-item");
			var tag        	= line.find(".featured-tag");
			var but         = icon.children(".icon-star");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var session_id  = icon.closest('form').find('input[type="hidden"][name*="session_id"]').val();
			var state       = but.hasClass('enbl')?0:1;
			$.ajax({
				type: 'POST',
				url: 'ajax/update_object.php',
				data: {'object': 'product', 'id': id, 'values': {'featured': state}, 'session_id': session_id},
				success: function(data){
					if(!state){
						but.addClass('text-grey-500');
						but.removeClass('text-orange-900 enbl');
						tag.show();
					}else{
						but.addClass('text-orange-900 enbl');
						but.removeClass('text-grey-500');
						tag.hide();
					}			
				},
				dataType: 'json'
			});	
			return false;
		});
		
		$("button.duplicate").on("click", function(){
			$('#list .todo-item input[type="checkbox"][name*="check"]').prop('checked', false);
			$(this).closest("#list .todo-item").find('input[type="checkbox"][name*="check"]').prop('checked', true);
			$(this).closest("form").find('select[name="action"] option[value=duplicate]').prop('selected', true);
			$(this).closest("form").submit();
			return false;
		});
		
		$("button.delete").on("click", function(){
			$('#list .todo-item input[type="checkbox"][name*="check"]').prop('checked', false);
			$(this).closest("#list .todo-item").find('input[type="checkbox"][name*="check"]').prop('checked', true);
			$(this).closest("form").find('select[name="action"] option[value=delete]').prop('selected', true);
			$(this).closest("form").submit();
			return false;
		});
		
		$("form").submit(function() {
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
		});
		
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
						<i class="icon-file-multiple s-6"></i>
					</span>
					<span class="logo-text h4">Каталог товаров</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="{url module=ProductAdmin id=null}" class="btn btn-light fuse-ripple-ready"><i class="icon-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить товар</span></a>
		</div>
	</div>

	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
		
		<form method="get">
			<input type="hidden" name="module" value="ProductsAdmin">
			<div class="collapse {if $show_filters}show{/if}" id="filters">
				<div class="card mb-3">
					<div class="card-body d-flex align-items-end flex-wrap">
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-3">
							<label for="filter_language">Язык перевода</label>
							<select class="form-control" id="filter_language" name="filter_language">
								{foreach $languages as $l}
								<option value="{$l->id}" {if $filter_language == $l->id}selected{/if}>{$l->name|escape}</option>
								{/foreach}	
							</select>
						</div>
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-3">
							<label for="category_id">Категория товара</label>
							<select class="form-control" id="category_id" name="category_id">
								<option value=''>Все картегории</option>
								{function name=category_select level=0}
								{foreach $categories as $category}
									<option value='{$category->id}' {if $category->id == $category_id}selected{/if} category_name='{$category->name|escape}'>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name|escape}</option>
										{category_select categories=$category->subcategories category_id=$category_id  level=$level+1}
								{/foreach}
								{/function}
								{category_select categories=$categories category_id=$category_id}
							</select>
						</div>
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-3">
							<label for="filter">Фильтр по типу</label>
							<select class="form-control" id="filter" name="filter">
								<option value="" >Все товары</option>
								<option value="featured" {if $filter == 'featured'}selected{/if}>Рекомендуемые</option>
								<option value="discounted" {if $filter == 'discounted'}selected{/if}>Со скидкой</option>
								<option value="visible" {if $filter == 'visible'}selected{/if}>Активные</option>
								<option value="hidden" {if $filter == 'hidden'}selected{/if}>Неактивные</option>
								<option value="in_stock" {if $filter == 'in_stock'}selected{/if}>Есть на складе</option>
								<option value="outofstock" {if $filter == 'outofstock'}selected{/if}>Отсутствующие на складе</option>
							</select>
						</div>
						<div class="col-12 col-sm-4 col-md-3">
							<div class="form-group mb-2">
								<input type="text" class="form-control" id="keyword" name="keyword" aria-describedby="meta_titleHelp" placeholder="Введите название товара" value="{$keyword|escape}" autocomplete="off">
								<label for="keyword">Название товара</label>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-12 text-right">
								<a class="btn btn-danger text-white btn-sm" href="/engine/index.php?module=ProductsAdmin">Очистить</a>
								<button class="btn btn-primary btn-sm" type="submit">Фильтровать</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<form method="post">
		<input type="hidden" name="session_id" value="{$smarty.session.id}">		
			<div id="todo" class="card">
				
				<div id="list" class="todo-items w-100">
					<div class="todo-item pr-4 pl-11 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>
						
						<div class="info col-2 px-4">
							<div class="title d-flex justify-content-center align-items-center">
								Изображение
							</div>
						</div>

						<div class="info col px-4">

							<div class="title d-flex justify-content-between align-items-center">
								Название товара
								
								<button class="btn btn-icon pull-right" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters"><i class="icon-settings" data-toggle="tooltip" data-placement="bottom" title="Открыть/Закрыть фильтры"></i></button>
							</div>
						</div>

					</div>
					<div id="products_list">
						{foreach $products as $product}
						<div class="todo-item sort-item pl-0 pr-2 py-4 row no-gutters d-flex flex-wrap flex-sm-nowrap align-items-center">

							<div class="handle mr-1 px-2">
								<i class="icon icon-drag"></i>
							</div>
							<input type="hidden" name="positions[{$product->id}]" value="{$product->position}">

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="check[]" value="{$product->id}"/>
								<span class="custom-control-indicator"></span>
							</label>
							<div class="info col-2 px-4 d-flex align-items-center justify-content-center">
								{if $product->image}
								<a class="image" href="{url module=ProductAdmin id=$product->id return=$smarty.server.REQUEST_URI}"><img src="{$product->image->filename|resize:150:100:w}"></a>
								{else}
								<a class="image" href="{url module=ProductAdmin id=$product->id return=$smarty.server.REQUEST_URI}"><img src="./templates/img/placeholder.png" width="150px" height="auto"></a>
								{/if}
							</div>
							<div class="info col px-4 d-flex align-items-start align-sm-items-center justify-content-start flex-column">

								<div class="title mr-4 mb-2">
									<a class="td-wh-none" style="word-break: break-all;" href="{url module=ProductAdmin id=$product->id return=$smarty.server.REQUEST_URI}">{$product->name|escape}</a>
								</div>

								<div class="tags">
									<div class="tag badge visible-tag" {if $product->visible}style="display:none;"{/if}>
										<div class="row no-gutters align-items-center">
											<div class="tag-color mr-2 bg-red"></div>
											<div class="tag-label">Отключен</div>
										</div>
									</div>
									{if $product->need_translate and $product->need_translate|count > 0}
									<div class="tag badge language-tag">
										<div class="row no-gutters align-items-center">
											<div class="tag-color mr-2 bg-red"></div>
											<div class="tag-label">Отсутствуют переводы: {foreach $product->need_translate as $nt}<b>{$nt|upper}</b> {/foreach}</div>
										</div>
									</div>
									{/if}
								</div>
							</div>

							<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

								<a href="{url module=ProductAdmin id=$product->id}" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
									<i class="icon icon-pencil text-blue"></i>
								</a>
								
								<button type="button" class="btn btn-icon featured" data-toggle="tooltip" data-placement="bottom" title="Рекомендуемый товар">
									<i class="icon icon-star {if $product->featured}text-orange-900 enbl{else}text-grey-500{/if}"></i>
								</button>
								
								<button type="button" class="btn btn-icon visible" data-toggle="tooltip" data-placement="bottom" title="Вкл\Выкл товар">
									<i class="icon icon-lightbulb {if $product->visible}text-yellow-900 enbl{/if}"></i>
								</button>
								
								<button type="button" class="btn btn-icon duplicate" data-toggle="tooltip" data-placement="bottom" title="Дублировать товар">
									<i class="icon icon-book-multiple-variant text-blue-600"></i>
								</button>

								<button type="button" class="btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить">
									<i class="icon icon-trash text-red"></i>
								</button>

							</div>
						</div>
						{/foreach}
					</div>
				</div>
				
				<div class="card-footer py-6">
					<div class="row">
						<div class="col-12 col-sm-4 col-md-3 mb-3 mb-sm-0">
							<select id="action" class="form-control" name="action">
								<option value="">Выберите действие</option>
								<option value="enable">Отобразить на сайте</option>
								<option value="disable">Отключить на сайте</option>
								<option value="set_featured">Сделать рекомендуемым</option>
								<option value="unset_featured">Убрать из рекомендуемых</option>
								<option value="duplicate">Дублировать товар</option>
								<option value="delete">Удалить</option>
							</select>
						</div>
						  
						<div class="col-12 col-md-2 col-sm-6 col-xs-6">
							<button type="submit" class="btn btn-secondary btn-sm fuse-ripple-ready" value="Применить">Применить</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		{include file='pagination.tpl'}
		</div>
	</div>
</div>
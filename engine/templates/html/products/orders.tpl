{* Title *}
{$meta_title='Заказы' scope='root'}
{$sm_groupe='orders' scope='root'}
{$sm_item = "`$status`" scope=root}

{capture name=js}
{literal}
<script>
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
						<i class="icon-cart s-6"></i>
					</span>
					<span class="logo-text h4">{if $keyword}Поиск заказов{elseif $status===0}Новые заказы{elseif $status==1}Принятые заказы{elseif $status==2}Выполненные заказы{elseif $status==3}Удаленные заказы{/if}</span>
				</div>
			</div>
		</div>
	</div>

	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
			<div class="row">
				<div class="col-12 col-md-9 mb-5">
				<form method="post">
				<input type="hidden" name="session_id" value="{$smarty.session.id}">		
					<div id="todo" class="card">
						
						<div id="list" class="todo-items w-100">
							<div class="todo-item pr-2 pl-5 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

								<label id="check_all" class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" />
									<span class="custom-control-indicator"></span>
								</label>

								<div class="info col px-4">

									<div class="title">
										Информация о заказе
									</div>
								</div>

							</div>
							{if $orders}
							{foreach $orders as $order}
							<div class="todo-item pr-2 pl-5 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="check[]" value="{$order->id}"/>
									<span class="custom-control-indicator"></span>
								</label>
							
								<div class="info col px-4 d-flex align-items-center justify-content-left">

									<div class="title mr-4">
										<a class="td-wh-none" href="{url module=OrderAdmin id=$order->id return=$smarty.server.REQUEST_URI}">#{$order->id|escape} {$order->name|escape}</a>
									</div>
								</div>
								
								<div class="info col-3 px-4 d-flex align-items-center justify-content-left">
									{$order->date|date} в {$order->date|time}
								</div>
								
								<div class="info col-3 px-4 d-flex align-items-center justify-content-left">
									{$order->total_price|convert} {$currency->sign}
								</div>

								<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

									<a href="{url module=OrderAdmin id=$order->id}" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
										<i class="icon icon-pencil text-blue"></i>
									</a>
									
									<button type="button" class="btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить">
										<i class="icon icon-trash text-red"></i>
									</button>

								</div>
							</div>
							{/foreach}
							{else}
							<div class="card-body">
								Заказов не найдено
							</div>
							{/if}
						</div>
						
						<div class="card-footer py-6">
							 <div class="row">
								<div class="col-12 col-sm-4 col-md-3 mb-3 mb-sm-0">
									<select id="action" class="form-control" name="action">
										{if $status!==0}<option value="set_status_0">В новые</option>{/if}
										{if $status!==1}<option value="set_status_1">В принятые</option>{/if}
										{if $status!==2}<option value="set_status_2">В выполненные</option>{/if}
										<option value="delete">Удалить выбранные заказы</option>
									</select>
								</div>
								  
								<div class="col-12 col-md-2 col-sm-6 col-xs-6">
									<button type="submit" class="btn btn-secondary btn-sm fuse-ripple-ready" value="Применить">Применить</button>
								</div>
							</div>
						 </div>
					</div>
				</form>
				</div>
				<div class="col-12 col-md-3">
					<div class="card">
						<div class="card-body">
						<form method="get">
							<div class="form-group">
								<label for="order-type">Фильтр заказов по статусу:</label>
								<select class="form-control" id="order-type" onchange="if(this.value)window.location.href=this.value">
									<option value="/engine/index.php?module=OrdersAdmin&status=0" {if $status==0}selected{/if}>Новые</option>
									<option value="/engine/index.php?module=OrdersAdmin&status=1" {if $status==1}selected{/if}>Принятые</option>
									<option value="/engine/index.php?module=OrdersAdmin&status=2" {if $status==2}selected{/if}>Выполненные</option>
									<option value="/engine/index.php?module=OrdersAdmin&status=3" {if $status==3}selected{/if}>Удаленные</option>
								</select>
							</div>
							
							<div class="input-group mb-3">
								<input type="hidden" name="module" value="OrdersAdmin">
								<input name="keyword" type="text" value="{$keyword|escape}" class="form-control" placeholder="Поиск по заказам" aria-label="Поиск по заказам" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-secondary btn-fab btn-sm" style="border-radius:50%;" type="submit" value="">
										<i class="icon-magnify"></i>
									</button>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
				<div class="col-12">
				{include file='pagination.tpl'}
				</div>
			</div>
		</div>
	</div>
</div>
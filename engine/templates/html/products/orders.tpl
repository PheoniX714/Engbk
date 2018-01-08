{* Title *}
{$meta_title='Заказы' scope=parent}
{$sm_groupe='orders' scope=parent}

{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/orders.js"></script>
' scope=parent}

<section class="content-header">
	<h1>{if $keyword}Поиск заказов{elseif $status===0}Новые заказы{elseif $status==1}Принятые заказы{elseif $status==2}Выполненные заказы{elseif $status==3}Удаленные заказы{/if}</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Заказы</li>
	</ol>
</section>

<section class="content">
  <div class="row">
	<div class="col-lg-9">
	<form id="list_form" method="post">
	  <div class="box box-success"> 
		<div class="box-header">
		  <i class="fa fa-th-list"></i>
		  <h3 class="box-title" style="line-height:1.5">{if $keyword}Найдено {/if}{if $orders_count}{$orders_count}{else}Нет{/if} заказ{$orders_count|plural:'':'ов':'а'}</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="{$smarty.session.id}">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th orders-table" id="functional-table">
                <tbody>
				<tr>
					<th class="checkbox-cell ln-inherit">
						<input type="checkbox" class="minimal checkbox-toggle">
					</th>
					<th class="id-cell">ID</th>
					<th>Заказ</th>
					<th style="width:150px;">Оформлен</th>
					<th style="width:150px;">На сумму</th>
					<th class="actions-cell" style="width:100px;">Действия</th>
				</tr>
				{if $orders}
                {foreach $orders as $order}
				<tr>
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="{$order->id|escape}">
					</td>
					<td class="id-cell">
						{$order->id|escape}
					</td>
					<td class="name-cell">
						<a href="{url module=OrderAdmin id=$order->id return=$smarty.server.REQUEST_URI}"> {$order->name|escape}</a> {if $order->paid}(<span class="text-green"><b>Оплачен</b></span>){/if}
					</td>
					<td class="date-cell">
						{$order->date|date} в {$order->date|time}
					</td>
					<td class="price-cell m-align">
						{$order->total_price|convert} {$currency->sign}
					</td>
					<td class="actions-cell" style="width:100px;">
						<a href="{url module=OrderAdmin id=$order->id }" class="btn btn-sm btn-flat btn-primary btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
						<button class="delete btn btn-sm btn-flat btn-danger btn-actions" data-toggle="tooltip" title="Удалить" ><i class="fa fa-trash-o"></i></button>
					</td>
						
				</tr>
				{/foreach}
				{else}
				<tr>
					<td colspan="6">
						Заказов не найдено
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
				{if $status!==0}<option value="set_status_0">В новые</option>{/if}
				{if $status!==1}<option value="set_status_1">В принятые</option>{/if}
				{if $status!==2}<option value="set_status_2">В выполненные</option>{/if}
				<option value="delete">Удалить выбранные заказы</option>
			</select>
		</div>
		  
		<div class="col-lg-2">
			<button type="submit" class="btn btn-block btn-success btn-flat"value="Применить">Применить</button>
		</div>
	  </div>
	  </form>
	</div>
	
	<div class="col-lg-3">
		<form method="get">
		<label>Фильтр заказов по статусу:</label>
		<select class="form-control" style="cursor:pointer;margin-bottom:20px;font-weight:bold;" onchange="if(this.value)window.location.href=this.value">
			<option value="/engine/index.php?module=OrdersAdmin&status=0" {if $status==0}selected{/if}>Новые</option>
			<option value="/engine/index.php?module=OrdersAdmin&status=1" {if $status==1}selected{/if}>Принятые</option>
			<option value="/engine/index.php?module=OrdersAdmin&status=2" {if $status==2}selected{/if}>Выполненные</option>
			<option value="/engine/index.php?module=OrdersAdmin&status=3" {if $status==3}selected{/if}>Удаленные</option>
		</select>
		
		<label>Поиск по заказам:</label>
		
		<div class="form-group">
			<div class="input-group">
				<input type="hidden" name="module" value="OrdersAdmin">
				<input class="form-control" id="appendedInputButton" name="keyword" type="text" value="{$keyword|escape}">
				<span class="input-group-btn">
					<button class="btn btn-flat btn-success" type="submit" value=""><i class="fa fa-search"></i></button>
				</span>
			</div>
		</div>
		</form>
	</div>
	
	<!-- /.col -->
  </div>
  <!-- /.row -->
</section>
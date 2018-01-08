{if $order->id}
{$meta_title = "Заказ №`$order->id`" scope=parent}
{else}
{$meta_title = 'Новый заказ' scope=parent}
{/if}
{$sm_groupe = 'orders' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}
{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
' scope=parent}

<section class="content-header">
	<h1>{if $order->id}Заказ №{$order->id|escape}{else}Новый заказ{/if} {$order->name|escape} {if $order->paid}(<span class="text-green"><b>Оплачен</b></span>){/if}</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="./index.php?module=OrdersAdmin"> Заказы</a></li>
		<li class="active">{if $order->id}Заказ №{$order->id|escape}{else}Новый заказ{/if}</li>
	</ol>
</section>

<section class="content">
  <div class="row">
	<form method=post id=order enctype="multipart/form-data">
	<div class="col-lg-9">
		<div class="box box-primary"> 
			<div class="box-header">
			  <i class="fa fa-shopping-cart"></i>
			  <h3 class="box-title" style="line-height:1.5">Данные заказа</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body no-padding">
				<!-- Основная форма -->
				<input type=hidden name="session_id" value="{$smarty.session.id}">
				<input name=id type="hidden" value="{$order->id|escape}"/> 

				{if $message_success}
				<!-- Системное сообщение -->
				<div class="col-lg-12">
					<div class="alert alert-success">
						<a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
						{if $message_success=='updated'}Заказ обновлен{elseif $message_success=='added'}Заказ добавлен{elseif $message_success=='status_updated'}Статус заказа обновлен{else}{$message_success}{/if}
					</div>
				</div>
				<!-- Системное сообщение (The End)-->
				{/if}
				
				<div class="col-lg-12 order-status"> 
					<div class="status-label">Статус заказа:</div>
					<select class="form-control" name="status">
						<option value='0' {if $order->status == 0}selected{/if}>Новый</option>
						<option value='1' {if $order->status == 1}selected{/if}>Принят</option>
						<option value='2' {if $order->status == 2}selected{/if}>Выполнен</option>
						<option value='3' {if $order->status == 3}selected{/if}>Удален</option>
					</select>
					<input class="btn btn-success btn-flat" type="submit" name="save" value="Сохранить" />
				</div> <!-- /.content-header -->

				<div class="col-lg-12">
					<table class="table table-striped table-bordered table-hover tabled-view black-th order-table">
						<thead>
							<tr>
								<th style="width:80px; font-size:18px; text-align:center;"><i class="fa fa-picture-o"></i></th>
								<th>Название товара</th>
								<th>Вариант</th>
								<th>Артикул</th>
								<th>Цена, за шт</th>
								<th>Количество</th>
							</tr>
						</thead>
						<tbody>
							{foreach $purchases as $purchase}
							<tr class="c_item">
								<td class="image">
									<input type=hidden name=purchases[id][{$purchase->id}] value='{$purchase->id}'>
									{$image = $purchase->product->images|first}
									{if $image}
										{if $purchase->product}
										<a class="related_product_name" href="index.php?module=ProductAdmin&id={$purchase->product->id}&return={$smarty.server.REQUEST_URI|urlencode}"><img class=product_icon src='{$image->filename|resize:75:75}'></a>
										{else}
										<img class=product_icon src='{$image->filename|resize:75:75}'>			
										{/if}
									{/if}
								</td>
								<td>
									{if $purchase->product}
									<a class="related_product_name" href="index.php?module=ProductAdmin&id={$purchase->product->id}&return={$smarty.server.REQUEST_URI|urlencode}">{$purchase->product_name}</a>
									{else}
									{$purchase->product_name}				
									{/if}
								</td>
								<td>
									{$purchase->variant_name}
								</td>
								<td>
									{if $purchase->sku}{$purchase->sku}{/if}
								</td>
								<td>
									<span class=view_purchase>{$purchase->price|convert} {$currency->sign}</span>
									<span class=edit_purchase style='display:none;'>
									<input type=text name=purchases[price][{$purchase->id}] value='{$purchase->price}' size=5>
									</span>
								</td>
								<td>
									<span class=view_purchase>
										{$purchase->amount} {$settings->units}
									</span>
									<span class=edit_purchase style='display:none;'>
										{if $purchase->variant}
										{math equation="min(max(x,y),z)" x=$purchase->variant->stock+$purchase->amount*($order->closed) y=$purchase->amount z=$settings->max_order_amount assign="loop"}
										{else}
										{math equation="x" x=$purchase->amount assign="loop"}
										{/if}
										<select name=purchases[amount][{$purchase->id}]>
											{section name=amounts start=1 loop=$loop+1 step=1}
												<option value="{$smarty.section.amounts.index}" {if $purchase->amount==$smarty.section.amounts.index}selected{/if}>{$smarty.section.amounts.index} {$settings->units}</option>
											{/section}
										</select>
									</span>			
								</td>
							</tr>
							{/foreach}
							<tr class="c_item total-price">
								<td colspan="6">
									Итого: <b>{$order->total_price|convert} {$currency->sign}</b>
								</td>
							</tr>
						</tbody>
					</table>
				</div> <!-- /.table-responsive -->
			</div>		
		</div>		
	</div>		
	<div class="col-lg-3">
		<div class="box box-warning"> 
			<div class="box-header">
			  <i class="fa fa-info"></i>
			  <h3 class="box-title" style="line-height:1.5">Данные покупателя</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body no-padding">
				<div class="col-lg-12">
					<ul class="order_details">
						<li>
							<label class=property>Дата</label>
							<div>
							{$order->date} {$order->time}
							</div>
						</li>
						<li>
							<label class=property>Имя</label>
							<div>
								{$order->name|escape}
							</div>
						</li>
						<li>
							<label class=property>Email</label>
							<div>
								<a href="mailto:{$order->email|escape}?subject=Заказ%20№{$order->id}">{$order->email|escape}</a>
							</div>
						</li>
						<li>
							<label class=property>Телефон</label>		
							<div>
								{$order->phone|escape}
							</div>
						</li>
						<li>
							<label class=property>Адрес доставки</label>			
							<div>
								{$order->address|escape}
							</div>
						</li>
					</ul>
				</div>
			</div>  
		</div>  
		</form>
	</div> 
</section> 
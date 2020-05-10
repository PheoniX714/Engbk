{if $order->id}
{$meta_title = "Заказ №`$order->id`" scope=root}
{else}
{$meta_title = 'Новый заказ' scope=root}
{/if}
{$sm_groupe = 'orders' scope=root}
{$sm_item = "`$order->status`" scope=root}

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-cart s-6"></i>
					</span>
					<span class="logo-text h4">{if $order->id}Заказ №{$order->id|escape}{else}Новый заказ{/if} {$order->name|escape} {if $order->paid}(<span class="text-green"><b>Оплачен</b></span>){/if}</span>
				</div>
			</div>
		</div>
	</div>

	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
			<div class="row">
				<div class="col-12 col-md-8 mb-5">
				<form method="post">
						
					<div class="card">
						 <div class="card-header">
							Данные заказа
						</div>
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Название товара</th>
										<th>Цена, за шт</th>
										<th>Количество</th>
									</tr>
								</thead>
								<tbody>
									{foreach $purchases as $purchase}
									<tr class="c_item">
										<input type=hidden name=purchases[id][{$purchase->id}] value='{$purchase->id}'>
										<td>
											{if $purchase->product}
											<a class="related_product_name" href="index.php?module=ProductAdmin&id={$purchase->product->id}&return={$smarty.server.REQUEST_URI|urlencode}">{$purchase->product_name}</a>
											{else}
											{$purchase->product_name}				
											{/if}
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
										<td colspan="5" class="text-right">
											Итого: <b>{$order->total_price|convert} {$currency->sign}</b>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</form>
				</div>
				<div class="col-12 col-md-4">
					<div class="card mb-5">
						<div class="card-header">
							Данные клиента
						</div>
						<div class="card-body">
							<table class="table table-striped">
								<tbody>
									<tr>
										<th>Дата</th>
										<td>{$order->date} {$order->time}</td>
									</tr>
									<tr>
										<th>Имя</th>
										<td>{$order->name|escape}</td>
									</tr>
									<tr>
										<th>Email</th>
										<td><a href="mailto:{$order->email|escape}?subject=Заказ%20№{$order->id}">{$order->email|escape}</a></td>
									</tr>
									<tr>
										<th>Телефон</th>
										<td>{$order->phone|escape}</td>
									</tr>
									<tr>
										<th>Город</th>
										<td>{$order->city|escape}</td>
									</tr>
									<tr>
										<th>Адрес доставки</th>
										<td>{$order->address|escape}</td>
									</tr>
									<tr>
										<th>Тип доставки</th>
										<td>{if $order->delivery_id == 1}Самовывоз
											{elseif $order->delivery_id == 2}Деливери
											{elseif $order->delivery_id == 3}Новая почта{/if}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card mb-5">
						<div class="card-header">
							Статус заказа
						</div>
						<div class="card-body">
						<form method="post">
							<input type=hidden name="session_id" value="{$smarty.session.id}">
							<input name=id type="hidden" value="{$order->id|escape}"/> 
							<div class="input-group mb-3 d-flex align-items-center">
								<select class="form-control" name="status">
									<option value='0' {if $order->status == 0}selected{/if}>Новый</option>
									<option value='1' {if $order->status == 1}selected{/if}>Принят</option>
									<option value='2' {if $order->status == 2}selected{/if}>Выполнен</option>
									<option value='3' {if $order->status == 3}selected{/if}>Удален</option>
								</select>
								<div class="input-group-append">
									<button class="btn btn-success btn-fab btn-sm" style="border-radius:50%;" type="submit" value="">
										<i class="icon-check"></i>
									</button>
								</div>
							</div>
						</form>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</div>
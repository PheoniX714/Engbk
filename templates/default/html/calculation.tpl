{* Страница с формой обратной связи *}

{* Канонический адрес страницы *}
{$canonical="/{$page->url}" scope=parent}

<div class="text-block">
	<h2>{$page->name}</h2>

	{$page->body}
</div>

<div class="cart-box order-data"> 
	<div class="row">
		<div class="form cart_form"> 
			<div class="col-lg-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item {if !$tab or $tab == 'p'}active{/if}">
					<a class="nav-link" id="t1-tab" data-toggle="tab" href="#t1" role="tab" aria-controls="t1" aria-selected="true">Пруток</a>
				  </li>
				  <li class="nav-item {if $tab == 'l'}active{/if}">
					<a class="nav-link" id="t2-tab" data-toggle="tab" href="#t2" role="tab" aria-controls="t2" aria-selected="false">Лист</a>
				  </li>
				  <li class="nav-item {if $tab == 't'}active{/if}">
					<a class="nav-link" id="t3-tab" data-toggle="tab" href="#t3" role="tab" aria-controls="t3" aria-selected="false">Труба</a>
				  </li>
				</ul>
			</div>
			
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade {if !$tab or $tab == 'p'}active in{/if}" id="t1" role="tabpanel" aria-labelledby="t1-tab">
				  <form class="form calculation_form" method="post">
					{if $error}
					<div class="alert alert-danger">
						{if $error=='empty_p1'} Заполните поле 'Диаметр'
						{elseif $error=='empty_p2'} Заполните поле 'Длинна'
						{elseif $error=='empty_p3'} Заполните поле 'Плотность'
						{/if}
					</div>
					{/if}
					<div class="col-md-2 order-data-label">
						<label>Диаметр<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="p1" type="text" value="{$p1|escape}"/>
					</div>
					<div class="col-md-2 order-data-input">
						<select class="form-control" name="p1_ins">
							<option value="1" {if $p1_ins == 1}selected{/if}>мм</option>
							<option value="2" {if $p1_ins == 2}selected{/if}>см</option>
							<option value="3" {if $p1_ins == 3}selected{/if}>м</option>
						</select>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-2 order-data-label">
						<label>Длинна<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="p2" type="text" value="{$p2|escape}"/>
					</div>
					<div class="col-md-2 order-data-input">
						<select class="form-control" name="p2_ins">
							<option value="1" {if $p2_ins == 1}selected{/if}>мм</option>
							<option value="2" {if $p2_ins == 2}selected{/if}>см</option>
							<option value="3" {if $p2_ins == 3}selected{/if}>м</option>
						</select>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-2 order-data-label">
						<label>Плотность<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="p3" type="text" value="{$p3|escape}"/>
					</div>
					<div class="clear"></div>
					
					{if $result_p}
					<div class="col-md-2 order-data-label">
						<label>Вес<span></span></label>
					</div>
					<div class="col-md-2 order-data-label">
						{$result_p} кг
					</div>
					{/if}
					<div class="clear"></div>
					
					<div class="col-md-9 col-md-offset-2 order-data-captcha">
						<input type="submit" name="prutok" class="button" value="Подсчитать">
					</div>
					
					<div class="clear"></div>
				  </form>
			  </div>
			  <div class="tab-pane fade {if $tab == 'l'}active in{/if}" id="t2" role="tabpanel" aria-labelledby="t2-tab">
				<form class="form calculation_form" method="post">
					{if $error}
					<div class="alert alert-danger">
						{if $error=='empty_l1'} Заполните поле 'Ширина'
						{elseif $error=='empty_l2'} Заполните поле 'Длинна'
						{elseif $error=='empty_l3'} Заполните поле 'Толщина'
						{elseif $error=='empty_l4'} Заполните поле 'Плотность'
						{/if}
					</div>
					{/if}
					<div class="col-md-2 order-data-label">
						<label>Ширина<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="l1" type="text" value="{$l1|escape}"/>
					</div>
					<div class="col-md-2 order-data-input">
						<select class="form-control" name="l1_ins">
							<option value="1" {if $l1_ins == 1}selected{/if}>мм</option>
							<option value="2" {if $l1_ins == 2}selected{/if}>см</option>
							<option value="3" {if $l1_ins == 3}selected{/if}>м</option>
						</select>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-2 order-data-label">
						<label>Длинна<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="l2" type="text" value="{$l2|escape}"/>
					</div>
					<div class="col-md-2 order-data-input">
						<select class="form-control" name="l2_ins">
							<option value="1" {if $l2_ins == 1}selected{/if}>мм</option>
							<option value="2" {if $l2_ins == 2}selected{/if}>см</option>
							<option value="3" {if $l2_ins == 3}selected{/if}>м</option>
						</select>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-2 order-data-label">
						<label>Толщина<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="l3" type="text" value="{$l3|escape}"/>
					</div>
					<div class="col-md-2 order-data-input">
						<select class="form-control" name="l3_ins">
							<option value="1" {if $l3_ins == 1}selected{/if}>мм</option>
							<option value="2" {if $l3_ins == 2}selected{/if}>см</option>
							<option value="3" {if $l3_ins == 3}selected{/if}>м</option>
						</select>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-2 order-data-label">
						<label>Плотность<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="l4" type="text" value="{$l4|escape}"/>
					</div>
					<div class="clear"></div>
					
					{if $result_l}
					<div class="col-md-2 order-data-label">
						<label>Вес<span></span></label>
					</div>
					<div class="col-md-2 order-data-label">
						{$result_l} кг
					</div>
					{/if}
					<div class="clear"></div>
					
					<div class="col-md-9 col-md-offset-2 order-data-captcha">
						<input type="submit" name="list" class="button" value="Подсчитать">
					</div>
					
					<div class="clear"></div>
				  </form>
			  </div>
			  <div class="tab-pane fade {if $tab == 't'}active in{/if}" id="t3" role="tabpanel" aria-labelledby="t3-tab">
				<form class="form calculation_form" method="post">
					{if $error}
					<div class="alert alert-danger">
						{if $error=='empty_t1'} Заполните поле 'Наружный диаметр'
						{elseif $error=='empty_t2'} Заполните поле 'Внутренний диаметр'
						{elseif $error=='empty_t3'} Заполните поле 'Длинна'
						{elseif $error=='empty_t4'} Заполните поле 'Плотность'
						{/if}
					</div>
					{/if}
					<div class="col-md-3 order-data-label">
						<label>Наружный диаметр<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="t1" type="text" value="{$t1|escape}"/>
					</div>
					<div class="col-md-2 order-data-input">
						<select class="form-control" name="t1_ins">
							<option value="1">мм</option>
							<option value="2">см</option>
							<option value="3">м</option>
						</select>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-3 order-data-label">
						<label>Внутренний диаметр<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="t2" type="text" value="{$t2|escape}"/>
					</div>
					<div class="col-md-2 order-data-input">
						<select class="form-control" name="t2_ins">
							<option value="1">мм</option>
							<option value="2">см</option>
							<option value="3">м</option>
						</select>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-3 order-data-label">
						<label>Длинна<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="t3" type="text" value="{$t3|escape}"/>
					</div>
					<div class="col-md-2 order-data-input">
						<select class="form-control" name="t3_ins">
							<option value="1">мм</option>
							<option value="2">см</option>
							<option value="3">м</option>
						</select>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-3 order-data-label">
						<label>Плотность<span>*</span></label>
					</div>
					<div class="col-md-3 order-data-input">
						<input class="form-control" name="t4" type="text" value="{$t4|escape}"/>
					</div>
					<div class="clear"></div>
					
					{if $result_t}
					<div class="col-md-2 order-data-label">
						<label>Вес<span></span></label>
					</div>
					<div class="col-md-2 order-data-label">
						{$result_t} кг
					</div>
					{/if}
					<div class="clear"></div>
					
					<div class="col-md-9 col-md-offset-3 order-data-captcha">
						<input type="submit" name="tube" class="button" value="Подсчитать">
					</div>
					
					<div class="clear"></div>
				  </form>
			  </div>
			</div>
	
			<div class="col-lg-12">
				<div class="density">
					<h3>Таблица плотностей</h3>
					<table>
						<tr>
							<td>ПЕ</td>
							<td>1</td>
						</tr>
						<tr>
							<td>ПП</td>
							<td>0,95</td>
						</tr>
						<tr>
							<td>ПА</td>
							<td>1,2</td>
						</tr>
						<tr>
							<td>ПОМ</td>
							<td>1,47</td>
						</tr>
						<tr>
							<td>ПК</td>
							<td>1,47</td>
						</tr>
						<tr>
							<td>ПММА</td>
							<td>1,2</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
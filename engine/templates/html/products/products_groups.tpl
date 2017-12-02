{* Title *}
{$meta_title='Список товаров' scope=parent}
{$sm_groupe = 'catalog' scope=parent}
{$sm_item = 'products-groups' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/product_groups.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Группы товаров</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Группы товаров</li>
	</ol>
</section>

<section class="content">
<form id="list_form" method="post">
<!-- Main row -->
  <div class="row">
	<!-- Left col -->
	<div class="col-md-6">
	  <div class="box box-success"> 
		<div class="box-header">
		  <i class="fa fa-th-list"></i>
		  <h3 class="box-title" style="line-height:1.5">Список групп</h3>
		  <a href="index.php?module=ProductsGroupAdmin" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить группу</b></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="{$smarty.session.id}">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th" id="functional-table">
                <tbody>
				<tr>
					<th class="checkbox-cell ln-inherit">
						<input type="checkbox" class="minimal checkbox-toggle">
					</th>
					<th class="id-cell">ID</th>
					<th class="sku-cell">Код группы</th>
					<th class="actions-cell">Действия</th>
				</tr>
				{if $groups}
                {foreach $groups as $group}
				<tr class="c_item">
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="{$group->id|escape}">
					</td>
					<td class="id-cell">
						{$group->id|escape}
					</td>
					<td class="sku-cell">
						{$group->group_code|escape}
					</td>
					<td class="actions-cell">
						<a href="{url module=ProductsGroupAdmin id=$group->id }" class="btn btn-sm btn-flat btn-primary btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
						<button class="delete btn btn-sm btn-flat btn-danger btn-actions" data-toggle="tooltip" title="Удалить" ><i class="fa fa-trash-o"></i></button>
					</td>
						
				</tr>
				{/foreach}
				{else}
				<tr>
					<td colspan="4">
						Групп нет
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
				<option value="">Выберите действие</option>
				<!-- <option value="enable">Сделать активной</option>
				<option value="disable">Сделать неактивной</option> -->
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
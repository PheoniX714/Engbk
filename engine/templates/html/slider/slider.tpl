{* Title *}
{$meta_title = 'Слайдер' scope=parent}

{$sm_groupe = 'slider' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/slider.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Слайдер</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Слайдер</li>
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
		  <h3 class="box-title" style="line-height:1.5">Управление слайдами</h3>
		  <a href="index.php?module=SlideAdmin" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить слайд</b></a>
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
					<th>Изображение</th>
					<th class="actions-cell">Действия</th>
				</tr>
				{if $slides}
                {foreach $slides as $slide}
				<tr class="c_item">
					<td style="line-height:120px; text-align:center; width:40px;">
						<input type="hidden" name="positions[{$slide->id}]" value="{$slide->position}">
						<div class="move_zone" style="width: 20px; cursor:pointer; float:left;"><i class="fa fa-bars" style="font-size: 24px;"></i></div>
					</td>
					<td class="checkbox-column" style="line-height:120px;">
						<input type="checkbox" class="minimal" name="check[]" value="{$slide->id|escape}">
					</td>
					<td style="line-height:30px;">
						{if $slide->filename}<a href="{url module=SlideAdmin id=$slide->id return=$smarty.server.REQUEST_URI}"><img src="{$config->root_url}/files/uploads/{$slide->filename}" style="max-width: 500px; max-height:120px;"></a>{/if}
					</td>
					<td style="line-height:120px;">
						<a href="{url module=SlideAdmin id=$slide->id return=$smarty.server.REQUEST_URI}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-pencil"></i></a>
						<button class="btn btn-sm btn-flat {if !$slide->visible}btn-default{else}btn-success act{/if} enable" ><i class="fa fa-lightbulb-o"></i></button>
						<button class="btn btn-sm btn-flat btn-danger delete"><i class="fa fa-trash-o"></i></button>
					</td>
				</tr>
				{/foreach}
				{else}
				<tr>
					<td colspan="4">
						Слайдов нет
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
		<div class="form-group col-lg-2">
			<select id="action" class="form-control" name="action">
				<option value="enable">Сделать видимыми</option>
				<option value="disable">Сделать невидимыми</option>
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
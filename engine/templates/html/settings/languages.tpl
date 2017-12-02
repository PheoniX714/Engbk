{$sm_groupe = 'settings' scope=parent}
{$sm_item = 'languages' scope=parent}
{$meta_title = "Мультиязычность" scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}
{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/languages.js"></script>	 
' scope=parent}
<section class="content-header">
	<h1>Мультиязычность<small>Управления языками контента</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Мультиязычность</li>
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
		  <i class="fa fa-language"></i>
		  <h3 class="box-title" style="line-height:1.5">Управление языками</h3>
		  <a href="{url module=LanguageAdmin id=null }" class="btn btn-sm btn-primary pull-right btn-flat"><i class="fa fa-plus"></i> <b> Добавить язык</b></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="{$smarty.session.id}">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th sortable-table" id="functional-table">
                <thead>
					<tr id="thead">
						<th class="move-cell"></th>
						<th class="checkbox-cell ln-inherit">
							<input type="checkbox" class="minimal checkbox-toggle">
						</th>
						<th>Название языка</th>
						<th>Код ISO</th>
						<th class="actions-cell">Действия</th>
					</tr>
				</thead>
				<tbody>
					{foreach $languages as $l}
					<tr class="c_item">
						<td class="move-cell">
							<input name="positions[{$l->id|escape}]" type="hidden" value="{$l->id|escape}" class="form-control" />
							<div class="move_zone" style=" width: 20px; cursor:pointer; float:left;"><i class="fa fa-bars" style="font-size: 24px;"></i></div>
						</td>
						<td class="checkbox-cell">
							{if $l->id != 1}<input type="checkbox" class="minimal" name="check[]" value="{$l->id|escape}">{/if}
						</td>
						<td class="text-cell">
							<b>{$l->name|escape}</b> {if $l->id == 1}<small><i>(Основной язык сайта)</i></small>{/if}
						</td>
						<td class="text-cell">
							<b>{$l->code|escape}</b>
						</td>
						<td>
							<a href="{url module=LanguageAdmin id=$l->id }" class="btn btn-sm btn-flat btn-primary btn-flat btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>&nbsp;
							{if $l->id != 1}<button type="button" class="btn btn-flat {if !$l->visible}btn-default{else}btn-success active{/if} lang-enable" data-toggle="tooltip" title="Показывать на сайте"><i class="fa fa-lightbulb-o"></i></button>&nbsp;{/if}
							{if $l->id != 1}<button type="button" class="btn btn-flat btn-danger delete" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash-o"></i></button>{/if}
						</td>
					</tr>
					{/foreach}
				</tbody>
			</table>			
		</div>
		<!-- /.box-body -->		
	  </div>
	  <!-- /.box -->
	  
	  <div class="row">
		<div class="form-group col-md-3">
			<select id="action" class="form-control" name="action">
				<option value="">Выберите действие</option>
				<option value="enable">Отобразить на сайте</option>
				<option value="disable">Отключить на сайте</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
		  
		<div class="col-md-2">
			<button type="submit" class="btn btn-block btn-success btn-flat"value="Применить">Применить</button>
		</div>
	  </div>
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</form>
</section>
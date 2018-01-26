{* Title *}
{$meta_title='Менеджеры' scope=parent}
{$sm_groupe = 'settings' scope=parent}
{$sm_item = 'managers' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/content.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Менеджеры<small>Управление менеджерами</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Менеджеры</li>
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
		  <i class="fa fa-user-secret"></i>
		  <h3 class="box-title" style="line-height:1.5">Список менеджеров</h3>
		  <a href="index.php?module=ManagerAdmin" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить менеджера</b></a>
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
					<th >Логин</th>
					<th class="last-login">Последний вход</th>
					<th class="actions-cell">
						Действия
					</th>
				</tr>
                {foreach $managers as $m}
				<tr>
					<td class="checkbox-cell">
						{if $manager->id != $m->id}<input type="checkbox" class="minimal" name="check[]" value="{$m->id|escape}">{/if}
					</td>
					<td class="text-cell"><b>{$m->login|escape}</b></td>
					<td class="text-cell"><b>{$m->last_login|escape}</b></td>
					<td>
						<a href="index.php?module=ManagerAdmin&id={$m->id|urlencode}" class="btn btn-sm btn-primary btn-flat btn-actions"><i class="fa fa-pencil"></i></a>
						{if $manager->id != $m->id and $m->id != 1}
						<button class="delete btn btn-sm btn-danger btn-flat btn-actions"><i class="fa fa-trash-o"></i></button>
						{/if}
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


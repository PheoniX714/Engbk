{$sm_groupe = 'settings' scope=parent}
{$sm_item = 'managers' scope=parent}

{if $m->id}
{$meta_title = $m->login scope=parent}
{else}
{$meta_title = 'Новый менеджер' scope=parent}
{/if}

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
	<h1>{if $m->id}{$m->login}{else}Новый менеджер{/if} <small>Редактирование менеджера</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="{url module=ManagersAdmin}">Менеджеры</a></li>
		<li class="active">{if $m->id}{$m->login}{else}Новый менеджер{/if}</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		{if $message_success}
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> {if $message_success=='added'}Менеджер добавлен{elseif $message_success=='updated'}Менеджер обновлен{else}{$message_success|escape}{/if}</h4>
				<p>Внесенные изменения успешно применены</p>
			</div>
		</div>
		{/if}

		{if $message_error}
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> {if $message_error=='login_exists'}Менеджер с таким логином уже существует
				{elseif $message_error=='empty_login'}Введите логин
				{else}{$message_error|escape}{/if}</h4>
			</div>
		</div>
		{/if}

		<!-- Основная форма -->
		<form method=post id=product enctype="multipart/form-data">
		<input type=hidden name="session_id" value="{$smarty.session.id}">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-user-secret"></i>
				  <h3 class="box-title" style="line-height:1.5">Данные менеджера</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="name">Логин</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
							<input type="text" id="name" class="form-control" name="login" value="{$m->login|escape}" maxlength="32" />
						 </div>
						<input type="hidden" name="id" value="{$m->id|escape}" />
					</div>
					<div class="form-group col-sm-4">
						<label for="password">Пароль</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input type="password" id="password" class="form-control" name="password" value="" placeholder="Введите новый пароль"/>
						</div>
						
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			
			<div class="box box-warning"> 
				<div class="box-header with-border">
				  <i class="fa fa-key"></i>
				  <h3 class="box-title" style="line-height:1.5">Предоставить доступ к</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-striped table-bordered table-hover tabled-view black-th" id="functional-table">
						<thead>
							<tr>
							<th class="checkbox-cell ln-inherit">
								{if $m->id!=$manager->id or $m->id != 1}<input type="checkbox" class="minimal checkbox-toggle">{/if}
							</th>
							<th style="vertical-align:middle;">Модуль</th>
							</tr>
						</thead>
						
						<tbody>
							{foreach $perms as $p}
							<tr {if $m->permissions && in_array($p.code, $m->permissions)}class="success"{/if}>
								<td class="checkbox-cell ln-inherit">
									<input type="checkbox" class="minimal" id="{$p.code}" name="permissions[]" value="{$p.code}" {if $m->permissions && in_array($p.code, $m->permissions)}checked{/if} {if $m->id==$manager->id or $m->id == 1}disabled{/if}>
								</td>
								<td>{$p.title}</td>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			
			<div class="form-group col-sm-12">
				<input class="btn btn-success pull-right btn-flat" type="submit" name="" value="Сохранить">
			</div>

		</form>
		</div>
</section>
	<!-- Основная форма (The End) -->

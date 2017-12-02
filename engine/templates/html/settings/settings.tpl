{$meta_title = "Настройки" scope=parent}
{$sm_groupe = 'settings' scope=parent}
{$sm_item = 'settings' scope=parent}
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
	<h1>Настройки</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li>Настройки</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		{if $message_success}
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> {if $message_success == 'saved'}Настройки успешно сохранены{/if}</h4>
			</div>
		</div>
		{/if}

		{if $message_error}
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> {if $message_error == 'watermark_is_not_writable'}Установите права на запись для файла {$config->watermark_file}{/if}</h4>
			</div>
		</div>
		{/if}

		<!-- Основная форма -->
		<form method="post" id="settings" enctype="multipart/form-data">
		<input type="hidden" name="session_id" value="{$smarty.session.id}">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-cog"></i>
				  <h3 class="box-title" style="line-height:1.5">Настройки сайта</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="site_name">Имя сайта</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-font"></i></span>
							<input type="text" id="site_name" class="form-control" name="site_name" value="{$settings->site_name|escape}" placeholder="Введите название сайта" />
						 </div>
					</div>
					<div class="form-group col-sm-4">
						<label for="date_format">Формат даты</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
							<input type="text" id="date_format" class="form-control" name="date_format" value="{$settings->date_format|escape}" placeholder="Введите формат даты" />
						 </div>
					</div>
					<div class="form-group col-sm-4">
						<label for="admin_email">Email для восстановления пароля</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" id="admin_email" class="form-control" name="admin_email" value="{$settings->admin_email|escape}" placeholder="Введите email" />
						 </div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-cog"></i>
				  <h3 class="box-title" style="line-height:1.5">Оповещения с сайта</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="order_email">Оповещение о заказах</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" id="order_email" class="form-control" name="order_email" value="{$settings->order_email|escape}" placeholder="Введите email" />
						 </div>
					</div>
					<div class="form-group col-sm-4">
						<label for="comment_email">Оповещение о комментариях</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" id="comment_email" class="form-control" name="comment_email" value="{$settings->comment_email|escape}" placeholder="Введите email" />
						 </div>
					</div>
					<div class="form-group col-sm-4">
						<label for="notify_from_email">Обратный адрес оповещений</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" id="notify_from_email" class="form-control" name="notify_from_email" value="{$settings->notify_from_email|escape}" placeholder="Введите email" />
						 </div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<button type="submit" class="btn btn-block btn-success btn-flat" name="" value="Сохранить">Сохранить</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</section>
<!-- Основная форма (The End) -->
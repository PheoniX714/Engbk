{* Title *}
{$meta_title='Новости' scope=parent}
{$sm_groupe = 'news' scope=parent}
{$sm_item = 'news' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}
{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/news.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Новости<small>Управление новостями</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Новости</li>
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
		  <h3 class="box-title" style="line-height:1.5">Список новостей</h3>
		  <a href="{url module=PostAdmin id=null}" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить новость</b></a>
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
					<th>Название</th>
					<th>Дата создания</th>
					<th class="actions-cell">
						Действия
					</th>
				</tr>
				{if $posts}
                {foreach $posts as $post}
				<tr>
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="{$post->id}" />
						<input type="hidden" name="positions[{$post->id}]" value="{$post->position}">
					</td>
					<td class="text-cell">
						<b><a href="{url module=PostAdmin id=$post->id}">{$post->name|escape}</a></b>
					</td>
					<td class="text-cell">
						<b>{$post->date|date}</b>
					</td>
					<td>
						<a href="../news/{$post->url}" class="btn btn-sm btn-primary preview btn-flat" title="Предпросмотр в новом окне"  target="_blank"><i class="fa fa-desktop"></i></a>
						<button class="enable btn btn-sm {if !$post->visible}btn-default{else}btn-success act{/if} btn-flat" title="Активен" ><i class="fa fa-lightbulb-o"></i></button>
						<button class="delete btn btn-sm btn-danger btn-flat" title="Удалить" ><i class="fa fa-trash-o"></i></button>
					</td>
						
				</tr>
				{/foreach}
				{else}
				<tr>
					<td colspan="4">
						<b>Новости отсутствуют</b>
					</td>
				</tr>
				{/if}
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->		
	  </div>
	</div>
	  
	<div class="col-sm-12">
		{include file='pagination.tpl'}
	</div>
	  
	<div class="col-sm-2">
		<div class="form-group">
			<select id="action" class="form-control" name="action">
				<option value="enable">Сделать видимыми</option>
				<option value="disable">Сделать невидимыми</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
	</div>
	
	<div class="col-lg-2 col-md-2">
		<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
	</div>
	
  </div>
  <!-- /.row -->
</form>
</section>
	
	<!--<div id="search">
	<form method="get">
		<div class="form-group">
            <div class="input-group">
				<input type="hidden" name="module" value="NewsAdmin">
                <input class="form-control" id="appendedInputButton" name="keyword" type="text" value="{$keyword|escape}">
                <span class="input-group-btn">
					<button class="btn btn-secondary" type="submit" value=""><i class="fa fa-search"></i></button>
				</span>
			</div>
		</div>
	</form>
	</div>-->

{* Title *}
{$meta_title='Альбомы' scope=parent}
{$sm_groupe = 'gallery' scope=parent}
{$sm_item = 'gallery_albums' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/gallery_albums.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Галлерея<small>Управление альбомами</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Альбомы</li>
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
		  <i class="fa fa-picture-o"></i>
		  <h3 class="box-title" style="line-height:1.5">Управление альбомами</h3>
		  <a href="{url module=GalleryAlbumAdmin id=null }" class="btn btn-sm btn-primary pull-right btn-flat"><i class="fa fa-plus"></i> <b> Добавить альбом</b></a>
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
						<th class="thumbnail-cell">Превью</th>
						<th>Название</th>
						<th class="actions-cell">Действия</th>
					</tr>
				</thead>
				<tbody>
					{if $albums}
					{foreach $albums as $a}
					<tr class="c_item">
						<td class="move-cell">
							<input name="positions[{$a->id|escape}]" type="hidden" value="{$a->id|escape}" class="form-control" />
							<div class="move_zone" style=" width: 20px; cursor:pointer; float:left;"><i class="fa fa-bars" style="font-size: 24px;"></i></div>
						</td>
						<td class="checkbox-cell">
							<input type="checkbox" class="minimal" name="check[]" value="{$a->id|escape}">
						</td>
						<td class="thumbnail-cell">
							{if $a->preview}<a href="{url module=GalleryAlbumAdmin id=$a->id}"><img src="/files/gallery/{$a->created|date_format:'%Y'}/{$a->preview}"></a>{else}<div class="empty-thumbnail"><i class="fa fa-file-image-o"></i></div>{/if}
						</td>
						<td class="text-cell">
							<b><a href="{url module=GalleryAlbumAdmin id=$a->id}">{$a->name|escape}</a></b>
						</td>
						<td class="actions-cell">
							<a href="{url module=GalleryAlbumAdmin id=$a->id }" class="btn btn-sm btn-flat btn-primary btn-flat btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>&nbsp;
							<button type="button" class="btn btn-flat {if !$a->visible}btn-default{else}btn-success active{/if} lang-enable" data-toggle="tooltip" title="Показывать на сайте"><i class="fa fa-lightbulb-o"></i></button>&nbsp;
							<button type="button" class="btn btn-flat btn-danger delete" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash-o"></i></button>
						</td>
					</tr>
					{/foreach}
					{else}
					<tr>
						<td colspan="5">
							<b>Альбомы не найдены</b>
						</td>
					</tr>
					{/if}
				</tbody>
			</table>			
		</div>
		<!-- /.box-body -->		
	  </div>
	  <!-- /.box -->
	  {if $albums}
	  <div class="row">
		<div class="form-group col-md-2">
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
	  {/if}
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</form>
</section>
{* Title *}
{$meta_title = "Список категорий галереи" scope=parent}
{$sm_groupe = 'gallery' scope=parent}
{$sm_item = "gallery_categories" scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/gallery_categories.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Категории галереи</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Категории галереи</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<form id="list_form" method="post">
	<!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
			  <i class="fa fa-files-o"></i>
			  <h3 class="box-title" style="line-height:1.5">Управление категориями</h3>
			  <a href="{url module=GalleryCategoryAdmin id=null}" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить категорию</b></a>
			</div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<input type="hidden" name="session_id" value="{$smarty.session.id}">   
				{function name=categories_tree}
				{if $categories}
				<ul class="sortable-list sortable">
					{foreach $categories as $category}
					<li>
					  <input type="hidden" name="positions[{$category->id}]" value="{$category->position}">
					  <!-- drag handle -->
						<span class="handle" style="margin-left: {$level*30}px;">
							<i class="fa fa-bars" style="font-size: 20px;"></i>
						</span>
					  <!-- checkbox -->
					  <input type="checkbox" class="minimal" name="check[]" value="{$category->id}">
					  <!-- todo text -->
					  <span class="text"><a href="{url module=GalleryCategoryAdmin id=$category->id return=$smarty.server.REQUEST_URI}">{$category->name|escape}</a></span>
					  <!-- General tools such as edit or delete-->
					  <div class="tools">
						<a href="../gallery/{$category->url}" class="btn btn-primary btn-sm btn-flat" target="_blank"><i class="fa fa-desktop"></i></a>
						<a href="{url module=GalleryCategoryAdmin id=$category->id return=$smarty.server.REQUEST_URI}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
						<button class="btn btn-sm {if !$category->visible}btn-default{else}btn-success enbl{/if} enable btn-flat" title="Активна"><i class="fa fa-lightbulb-o"></i></button>
						<button class="btn btn-sm btn-danger delete btn-flat" title="Удалить"><i class="fa fa-trash-o"></i></button>
					  </div>
					</li>
					{categories_tree categories=$category->subcategories level=$level+1}
					{/foreach}
				</ul>
				{/if}
				{/function}
				
				{if $categories}
				{categories_tree categories=$categories level=0}
				{else}
					<ul class="sortable-list sortable">
						<li><b>Категории отсутствуют</b></li>
					</ul>
				{/if}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
	  <div class="row">
		<div class="form-group col-md-3 col-lg-2">
			<select id="action" class="form-control" name="action">
				<option value="">Выберите действие</option>
				<option value="enable">Отобразить на сайте</option>
				<option value="disable">Отключить на сайте</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
		  
		<div class="col-md-2">
			<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
		</div>
	  </div>
	</form>
</section>
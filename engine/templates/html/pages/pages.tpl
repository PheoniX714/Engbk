{* Title *}
{$meta_title = "{$menu->name}" scope=parent}
{$sm_groupe = 'pages' scope=parent}
{$sm_item = "menu_{$menu->id}" scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
	
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/pages.js"></script>
' scope=parent}

<section class="content-header">
	<h1>{foreach $menus as $m}{if $m->id == $menu->id}{$menu->name}{/if}{/foreach}<small>Статические страницы</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">{foreach $menus as $m}{if $m->id == $menu->id}{$menu->name}{/if}{/foreach}</li>
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
			  <h3 class="box-title" style="line-height:1.5">Управление страницами</h3>
			  <a href="{url module=PageAdmin id=null}" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить страницу</b></a>
			</div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<input type="hidden" name="session_id" value="{$smarty.session.id}">   
				{function name=pages_tree}
				{if $pages}
				<ul class="sortable-list sortable">
					{foreach $pages as $page}
					<li>
					  <input type="hidden" name="positions[{$page->id}]" value="{$page->position}">
					  <!-- drag handle -->
						<span class="handle" style="margin-left: {$level*30}px;">
							<i class="fa fa-bars" style="font-size: 20px;"></i>
						</span>
					  <!-- checkbox -->
					  <input type="checkbox" class="minimal" name="check[]" value="{$page->id}">
					  <!-- todo text -->
					  <span class="text"><a href="{url module=PageAdmin id=$page->id return=$smarty.server.REQUEST_URI}">{$page->name|escape}</a></span>
					  <!-- General tools such as edit or delete-->
					  <div class="tools">
						<a href="../{$page->pre_url}{$page->url}" class="btn btn-primary btn-sm btn-flat" target="_blank"><i class="fa fa-desktop"></i></a>
						<a href="{url module=PageAdmin id=$page->id return=$smarty.server.REQUEST_URI}" class="btn btn-primary btn-sm btn-flat" target="_blank"><i class="fa fa-edit"></i></a>
						<button class="btn btn-sm {if !$page->visible}btn-default{else}btn-success enbl{/if} enable btn-flat" title="Активна"><i class="fa fa-lightbulb-o"></i></button>
						<button class="btn btn-sm btn-danger l-delete btn-flat" title="Удалить"><i class="fa fa-trash-o"></i></button>
					  </div>
					</li>
					{pages_tree pages=$page->subpages level=$level+1}
					{/foreach}
				</ul>
				{/if}
				{/function}
				{pages_tree pages=$pages level=0}	
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

{*
<div class="content-header">
	<h2 class="content-header-title">{$menu->name}</h2>
	<ol class="breadcrumb">
		<li><a href="index.php">Главная</a></li>
		<li class="active">{foreach $menus as $m}{if $m->id == $menu->id}{$menu->name}{/if}{/foreach}</li>
	</ol>
</div> <!-- /.content-header -->

<ul id="myTab1" class="nav nav-pills">
	{foreach $menus as $m}
	<li {if $m->id == $menu->id}class="active"{/if}>
		<a href="{url module=PagesAdmin menu_id=$m->id}">{$m->name}</a>
	</li>
	{/foreach}
	
	<a class="btn btn-secondary btn-sm pull-right" href="{url module=PageAdmin}"><i class="fa fa-plus"></i> Добавить страницу</a>
</ul>

<div class="row">
		<form id="list_form" method="post">
		<input type="hidden" name="session_id" value="{$smarty.session.id}">
        <div class="col-md-12">

			<div class="portlet">

				<div class="portlet-header">
					<h3>
						<i class="fa fa-text-files"></i>
						<b>Управление страницами</b>
					</h3>
					
				</div> <!-- /.portlet-header -->

				<div class="portlet-content">       

					{if $pages}			
					
					{function name=pages_tree}
						
					{if $pages}
					<div id="list" class="sortable col-sm-12">
						
						{foreach $pages as $page}
						<div class="row">		
							<div class="tree_row_pages">
								<input type="hidden" name="positions[{$page->id}]" value="{$page->position}">
								<div class="page_nav" style="margin-left: {$level*30}px;">
									<div class="move_zone" ><i class="fa fa-bars"></i></div>
									<input type="checkbox" class="icheck-input" name="check[]" value="{$page->id}" />
								</div>
								<div class="page_title">
									<a href="{url module=PageAdmin id=$page->id return=$smarty.server.REQUEST_URI}">{$page->name|escape}</a>
								</div>
								<div class="page_ctrl">
									<a href="../{$page->url}" target="_blank" class="btn btn-sm btn-secondary"><i class="fa fa-desktop"></i></a>
									<a href="{url module=PageAdmin id=$page->id return=$smarty.server.REQUEST_URI}" class="btn btn-sm btn-secondary"><i class="fa fa-pencil"></i></a>
									<button class="btn btn-sm {if !$page->visible}btn-default{else}btn-secondary enbl{/if} enable" title="Активна"><i class="fa fa-lightbulb-o"></i></button>
									<button class="btn btn-sm btn-primary delete" title="Удалить"><i class="fa fa-trash-o"></i></button>
								</div>
							</div>
							{pages_tree pages=$page->subpages level=$level+1}
						</div>
						{/foreach}
					
					</div>
					{/if}
					{/function}
					{pages_tree pages=$pages level=0}
					
					{else}
						Нет страниц
					{/if}

					</div> <!-- /.table-responsive -->
				</div> <!-- /.portlet-content -->

			</div> <!-- /.portlet -->
			{if $pages}	
			<div class="col-sm-3">
				<div class="form-group">
				<select id="action" class="form-control" name="action">
					<option value="enable">Сделать видимыми</option>
					<option value="disable">Сделать невидимыми</option>
					<option value="delete">Удалить</option>
				</select>
				</div>
				
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<input class="btn btn-success" type="submit" value="Применить">
				</div>
				
			</div>
			{/if}
		</div> <!-- /.col -->
		</form>
</div> <!-- /.row -->

{literal}
<script>
$(function() {

	// Сортировка списка
	$(".sortable").sortable({
		items:".row",
		handle: ".move_zone",
		tolerance:"pointer",
		scrollSensitivity:40,
		opacity:0.7, 
		axis: "y",
		update:function()
		{
			$("#list_form input[name*='check']").attr('checked', false);
			$("#list_form").ajaxSubmit();
		}
	});

	// Удалить 
	$('button.delete').on('click', function(){
		$('#list_form input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest(".row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	
	// Скрыт/Видим
	$("button.enable").on('click', function(){
		var icon        = $(this);
		var line        = icon.closest(".row");
		var but         = icon.closest(".btn");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = but.hasClass('enbl')?0:1;
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'page', 'id': id, 'values': {'visible': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
			success: function(data){
				if(!state){
					but.removeClass('btn-secondary');
					but.addClass('btn-default');
					but.removeClass('enbl');
				}else{
					but.removeClass('btn-default');
					but.addClass('btn-secondary');
					but.addClass('enbl');
				}			
			},
			dataType: 'json'
		});	
		return false;	
	});
	
	
	$("form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
	});
});
</script>
{/literal}
*}
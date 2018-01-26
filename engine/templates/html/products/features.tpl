{* Title *}
{$meta_title = "Свойства товаров" scope=parent}
{$sm_groupe = 'catalog' scope=parent}
{$sm_item = "product-features" scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/product_features.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Свойства товаров</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Свойства товаров</li>
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
			  <h3 class="box-title" style="line-height:1.5">Управление свойствами</h3>
			  <a href="{url module=FeatureAdmin id=null}" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить свойство</b></a>
			</div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<input type="hidden" name="session_id" value="{$smarty.session.id}">   
				{if $features}
				<ul class="sortable-list sortable">
					{foreach $features as $feature}
					<li>
					  <input type="hidden" name="positions[{$feature->id}]" value="{$feature->position}">
					  <!-- drag handle -->
					  <span class="handle"><i class="fa fa-bars" style="font-size: 20px;"></i></span>
					  <!-- checkbox -->
					  <input type="checkbox" class="minimal" name="check[]" value="{$feature->id}">
					  <!-- todo text -->
					  <span class="text"><a href="{url module=FeatureAdmin id=$feature->id return=$smarty.server.REQUEST_URI}">{$feature->name|escape}</a></span>
					  <!-- General tools such as edit or delete-->
					  <div class="tools">
						<a href="{url module=FeatureAdmin id=$feature->id return=$smarty.server.REQUEST_URI}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
						<button class="btn btn-sm {if !$feature->in_filter}btn-default{else}btn-success enbl{/if} in_filter btn-flat" ><i class="fa fa-filter"></i></button>
						<button class="btn btn-sm btn-danger delete btn-flat" ><i class="fa fa-trash-o"></i></button>
					  </div>
					</li>
					{/foreach}
				</ul>
				{else}
					<ul class="sortable-list sortable">
						<li><b>Свойства отсутствуют</b></li>
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
				<option value="set_in_filter">Использовать в фильтре</option>
					<option value="unset_in_filter">Не использовать в фильтре</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
		  
		<div class="col-md-2">
			<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
		</div>
	  </div>
	</form>
</section>
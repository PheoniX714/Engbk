{if $feature->id}
{$meta_title = $feature->name scope=parent}
{else}
{$meta_title = 'Новое свойство' scope=parent}
{/if}
{$sm_groupe = 'catalog' scope=parent}
{$sm_item = "product_features" scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
' scope=parent}

<section class="content-header">
	<h1>{if $feature->id}{$feature->name}{else}Новое свойство{/if}</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=FeaturesAdmin">Свойства товаров</a></li>
		<li class="active">{if $feature->id}{$feature->name}{else}Новое свойство{/if}</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		{if $message_success}
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> {if $message_success=='added'}Свойство добавлено{elseif $message_success=='updated'}Свойство обновлено{else}{$message_success}{/if}</h4>
			</div>
		</div>
		{/if}
		{if $message_error}
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> {if $message_error=='url_exists'}Свойство с таким адресом уже существует{else}{$message_error}{/if}</h4>
			</div>
		</div>
		{/if}
		
		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="{$smarty.session.id}">
		
		<div class="col-md-6">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Основные настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="{url module=FeatureAdmin id=null}" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить еще свойство</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-8">
						<label for="name">Название свойства</label>
						<input type="text" id="name" class="form-control" name="name" value="{$feature->name|escape}" />
						<input name=id type="hidden" value="{$feature->id|escape}"/> 
					</div>
					<div class="form-group col-sm-4">
						<div class="checkbox" style="margin-top:30px;">
							<label>
								<input type="checkbox" class="icheck-input" name="in_filter" id="in_filter" {if $feature->in_filter}checked{/if} value="1">
								Использовать в фильтре
							</label>
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label for="language_id">Использовать для языка</label>
						<select id="language_id" class="form-control" name="language_id" style="padding: 4px 12px; margin-right:15px; cursor:pointer;" {if !$feature->id}disabled{/if}>
							{foreach $languages as $l}
								<option value='{$l->id}' {if $feature->language_id == $l->id}selected{/if}>{$l->name|escape}</option>
								{if !$feature->id}{break}{/if}
							{/foreach}
						</select>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Использовать в категориях</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<label for="name">Выводить фильтр по свойству в категориях:</label>
					<select class="form-control" multiple name="feature_categories[]" style="height:400px;">
						{function name=category_select selected_id=$product_category level=0}
						{foreach $categories as $category}
							<option value='{$category->id}' {if in_array($category->id, $feature_categories)}selected{/if} category_name='{$category->single_name}'>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name}</option>
								{category_select categories=$category->subcategories selected_id=$selected_id  level=$level+1}
						{/foreach}
						{/function}
						{category_select categories=$categories}
					</select>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		</form>
	</div>
</section>
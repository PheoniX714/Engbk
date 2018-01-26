{* Title *}
{if $group->id}
{$meta_title = $group->group_code scope=parent}
{else}
{$meta_title = 'Новая группа' scope=parent}
{/if}
{$sm_groupe = 'catalog' scope=parent}
{$sm_item = 'products-groups' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/autocomplete/jquery.autocomplete-min.js"></script>
	<script src="./templates/js/modules/product_group.js"></script>
' scope=parent}

<section class="content-header">
	<h1>{if $group->id}Группа товаров {$group->group_code}{else}Новая группа{/if}</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=ProductsAdmin">Группы товаров</a></li>
        <li class="active">{if $group->id}{$group->group_code}{else}Новая группа{/if}</li>
	</ol>
</section>

<section class="content">

{if $message_success}
<!-- Системное сообщение -->
<div class="alert alert-success">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
	<b>{if $message_success=='added'}Группа добавлена{elseif $message_success=='updated'}Группа изменена{else}{$message_success|escape}{/if}</b>
	
	<a class="btn btn-success btn-xs pull-right" style="margin-right:20px;" href="{url module=ProductsGroupAdmin id=null}"><i class="fa fa-plus"></i> Добавить новую группу</a>
</div>
<!-- Системное сообщение (The End)-->
{/if}	

{if $message_error}
<!-- Системное сообщение -->
<div class="alert alert-danger">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
	<b>{if $message_error=='url_exists'}Товар с таким адресом уже существует{elseif $message_error=='empty_name'}Введите название{else}{$message_error|escape}{/if}</b>
</div>
<!-- Системное сообщение (The End)-->
{/if}

<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">
<input type=hidden name="id" value="{$group->id}">
<input type=hidden name="group_code" value="{$group->group_code}">

	
	{literal}
	<style>
	.autocomplete-suggestions{
	background-color: #ffffff;
	overflow: hidden;
	border: 1px solid #e0e0e0;
	overflow-y: auto;
	}
	.autocomplete-suggestions .autocomplete-suggestion{cursor: default;}
	.autocomplete-suggestions .selected { background:#F0F0F0; }
	.autocomplete-suggestions div { padding:2px 5px; white-space:nowrap; }
	.autocomplete-suggestions strong { font-weight:normal; color:#3399FF; }
	</style>
	{/literal}

	<div class="row">
		<div class="col-lg-12">
			<div class="box box-success"> 
				<div class="box-header">
				  <i class="fa fa-edit"></i>
				  <h3 class="box-title" style="line-height:1.5">{if $group->id}Редактирование группы{else}Создание группы{/if}</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  
					<div class="col-lg-6">
						<input type=text name=group id='group_products' class="form-control input_autocomplete" placeholder='Выберите товар чтобы добавить его'>
					</div>
					<div class="col-lg-6">
						<p>Каждый товар может находится только в одной группе.</p>
					</div>
					
					<div class="clear"></div>
						
					<div class="col-lg-6">
						<div id="list" class="sortable-list group_products">
							{if $group_products}
							{foreach from=$group_products item=group_product}
							<div class="r-row">
								<div class="move_cell col-md-1">
									<div class="move_bars"><i class="fa fa-bars"></i></div>
								</div>
								<div class="image_cell col-md-2">
								<input type=hidden name=group_products[] value='{$group_product->id}'>
								<a href="{url module=ProductAdmin id=$group_product->id}">
								<img class=product_icon src='{$group_product->images[0]->filename|resize:100:100}'>
								</a>
								</div>
								<div class="name_cell col-md-8">
								<a href="{url module=ProductAdmin id=$group_product->id}">{$group_product->name}</a>
								</div>
								<div class="icons_cell col-md-1">
								<button class="btn btn-sm btn-danger delete btn-flat"><i class="fa fa-trash-o"></i></button>
								</div>
								<div class="clear"></div>
							</div>
							{/foreach}
							{/if}
							<div id="new_group_product" class="r-row" style='display:none;'>
								<div class="move_cell col-md-1">
									<div class="move_bars"><i class="fa fa-bars"></i></div>
								</div>
								<div class="image_cell col-md-2">
								<input type=hidden name=group_products[] value=''>
								<img class=product_icon src=''>
								</div>
								<div class="name_cell col-md-9">
								<a class="group_product_name" href=""></a>
								</div>
								<div class="icons_cell col-md-1">
								<button class="btn btn-sm btn-danger delete btn-flat"><i class="fa fa-trash-o"></i></button>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
</form>
<!-- Основная форма (The End) -->
</section>
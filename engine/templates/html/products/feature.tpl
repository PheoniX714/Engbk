{if $feature->id}
{$meta_title = $feature->name scope='root'}
{else}
{$meta_title = 'Новое свойство' scope='root'}
{/if}
{$sm_groupe = 'products' scope='root'}
{$sm_item = "features" scope='root'}

{* Подключаем Tiny MCE *}
{include file='editor/tinymce_init.tpl'}

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-filter s-6"></i>
					</span>
					<span class="logo-text h4">{if $feature->id}{$feature->name}{else}Новое свойство{/if}</span>
				</div>
			</div>
		</div>
		{if $feature->id}
		<div class="col-auto">
			<div class="d-flex align-items-center justify-content-end">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					{foreach $languages as $l}
					<option value='{url module=FeatureAdmin id=$feature->id language_id=$l->id return=null}' {if $language->id == $l->id}selected{/if}>{$l->name|escape}</option>
					{/foreach}				
				</select>
			</div>
		</div>
		{/if}
	</div>
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	<input name="id" type="hidden" value="{$feature->id|escape}"/>
		
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group no-gutters">
				
				{if $message_success}
				<script>  
					$(document).ready(function(){  
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.success({
						  title: 'Готово!',
						  text: "{if $message_success=='added'}Свойство добавлено{elseif $message_success=='updated'}Свойство обновлено{else}{$message_success}{/if}",
						  stack: {literal}{dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}{/literal}
						});
					});   
				</script> 
				{/if}
								
				<div class="row">	
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group mb-1">
											<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название свойства" value="{$feature->name|escape}">
											<label for="name">Название свойства</label>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-12 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Основные параметры</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex align-items-center">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="in_filter" {if $feature->in_filter}checked{/if}>
												<span class="checkbox-icon fuse-ripple-ready text-green"></span>
												<span class="form-check-description">Использовать в фильтре</span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="feature_categories">Выводить фильтр по свойству в категориях:</label>
											<select  multiple name="feature_categories[]" class="form-control " id="feature_categories">
												{function name=category_select selected_id=$product_category level=0}
												{foreach $categories as $category}
												<option value='{$category->id}' {if in_array($category->id, $feature_categories)}selected{/if} category_name='{$category->single_name}'>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name}</option>
														{category_select categories=$category->subcategories selected_id=$selected_id  level=$level+1}
												{/foreach}
												{/function}
												{category_select categories=$categories}
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-12 text-right">
										<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
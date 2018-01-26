{if $album->id}
{$meta_title = $album->name scope=parent}
{else}
{$meta_title = 'Новый альбом' scope=parent}
{/if}
{$sm_groupe = 'gallery' scope=parent}
{$sm_item = 'gallery_albums' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
	<link rel="stylesheet" href="./templates/js/plugins/select2/select2.min.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/gallery_album.js"></script>
	<script src="./templates/js/plugins/select2/select2.full.min.js"></script>
' scope=parent}

<section class="content-header">
	<h1>{if $album->id}{$album->name}{else}Новый альбом{/if}</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=GalleryAlbumsAdmin">Альбомы</a></li>
		<li class="active">{if $album->id}{$album->name}{else}Новый альбом{/if}</li>
	</ol>
</section>

{* Подключаем Tiny MCE *}
{include file='editor/tinymce_init_gallery.tpl'}
<div class="row">	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	
	<section class="content">
		{if $message_success}
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> {if $message_success=='added'}Альбом добавлен{elseif $message_success=='updated'}Альбом успешно обновлен{else}{$message_success}{/if}</h4>
			</div>
		</div>
		{/if}
		{if $message_error}
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> {if $message_error=='url_exists'}Альбом с таким адресом уже существует{else}{$message_error}{/if}</h4>
			</div>
		</div>
		{/if}
	
		<div class="col-md-4">
			<div class="row">
				<!-- Основная форма -->			
				<div class="col-md-12">
					<div class="box box-primary"> 
						<div class="box-header with-border">
						  <i class="fa fa-file-text"></i>
						  <h3 class="box-title" style="line-height:1.5">Основные настройки</h3>
						  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="form-group col-md-9">
								<label for="header">Название альбома</label>
								<input type="text" id="name" class="form-control" name="name" value="{$album->name|escape}" />
								<input name=id type="hidden" value="{$album->id|escape}"/>
							</div>
							<div class="form-group col-md-3">
								<div class="checkbox" style="margin-top:30px;">
									<label>
										<input type="checkbox" name="visible" class="minimal" {if $album->visible}checked{/if}>
										Активна
									</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Категории альбома</label>
									<select class="form-control categories_select" name="categories[]" multiple="multiple" data-placeholder="Выберите категории">
										{function name=category_select level=0}
											{foreach $categories as $category}
												<option value='{$category->id}' {if in_array($category->id, $album_categories)}selected{/if} category_name='{$category->name|escape}'>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name|escape}</option>
													{category_select categories=$category->subcategories album_categories=$album_categories  level=$level+1}
											{/foreach}
										{/function}
										{category_select categories=$categories album_categories=$album_categories}
									</select>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<!-- /.box-body -->
					</div>
					
					<div class="box box-primary"> 
						<div class="box-header with-border">
						  <i class="fa fa-file-text"></i>
						  <h3 class="box-title" style="line-height:1.5">Дополнительные настройки</h3>
						  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="form-group col-sm-12">
								<label for="url">Адрес</label>
								<div> <span style="width:20%; line-height: 34px; float: left;">/album/</span><input type="text" id="url" style="width:80%;" class="form-control adress-input" name="url" value="{$album->url|escape}" /></div>
							</div>
							<div class="form-group col-sm-12">
								<label for="meta_title">Заголовок</label>
								<input type="text" id="meta_title" class="form-control" name="meta_title" value="{$album->meta_title|escape}">
							</div>
							<div class="form-group col-sm-12">
								<label for="meta_keywords">Ключевые слова</label>
								<input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="{$album->meta_keywords|escape}">
							</div>
							<div class="form-group col-sm-12">
								<label for="meta_description">Описание</label>
								<textarea data-required="true" data-minlength="5" name="meta_description" id="meta_description" cols="10" rows="3" class="form-control">{$album->meta_description|escape}</textarea>
							</div>
							<div class="clear"></div>
						</div>
						<!-- /.box-body -->
					</div>
					
					<div class="box box-primary"> 
						<div class="box-header with-border">
						  <i class="fa fa-font"></i>
						  <h3 class="box-title" style="line-height:1.5">Описание альбома</h3>
						  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<textarea name="description" rows="10" class="form-control editor_small">{$album->description|escape}</textarea>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary"> 
						<div class="box-header with-border">
						  <i class="fa fa-th"></i>
						  <h3 class="box-title" style="line-height:1.5">Изображения альбома</h3>
						  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
						  <a href="{url module=GalleryCategoryAdmin id=null}" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить еще альбом</a> 
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							
							<div class="images-upload">
								<div class="form-group">
									<input type="file" name="new_images[]" multiple>
									<p class="help-block">Допустимые расширения файлов: <b>jpg, jpeg, png, gif</b>. Также допускается загрузка изображений находящихся в архиве формата <b>zip</b>. Рекомендуемый размер изображения: <b>до 1500px по большей стороне</b>.</p>
								</div>
							</div>
							
							<div class="images-list sortable">
								{foreach $album->images as $image}
								<div class="col-md-2 image-box">
									<div class="image">
										<img src="/files/gallery/{$album->created|date_format:'%Y'}/{$image->filename}">
										<div class="image-check"><input type="checkbox" name="check[]" class="im-check" value="{$image->id|escape}"></div>
										{if $image->as_preview}<div class="as-preview-icon"><i class="fa fa-star"></i></div>{/if}
										<div class="image-controls">
											<input name="positions[]" type="hidden" value="{$image->id|escape}" class="form-control" />
											<div class="move_zone"><i class="fa fa-arrows"></i></div>
											<div class="as-preview-box">
												<input type="radio" class="as-preview" id="as-preview-{$image->id|escape}" name="as-preview" value="{$image->id|escape}" {if $image->as_preview}checked{/if} />
												<label for="as-preview-{$image->id|escape}"><i class="fa fa-star"></i></label>
											</div>
											<div class="open-image"><a href="/files/gallery/{$album->created|date_format:'%Y'}/{$image->filename}" target="__blank"><i class="fa fa-eye"></i></a></div>
											<div class="delete-image"><i class="fa fa-trash"></i></div>
										</div>
									</div>
								</div>
								{/foreach}
							</div>
							<div class="clear"></div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<select id="action" class="form-control" name="action">
						<option value="">Выберите действие</option>
						<option value="delete">Удалить</option>
					</select>
				</div>
				  
				<div class="col-md-2">
					<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
				</div>
				<div class="col-md-2">
					<span class="btn btn-block btn-primary btn-flat select-all-images" ><i class="fa fa-check"></i> Выбрать все фото</span>
				</div>
			</div>
		</div>
	</section>
	</form>
</div>
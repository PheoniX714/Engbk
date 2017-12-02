<?php /* Smarty version Smarty-3.1.18, created on 2017-11-14 14:43:22
         compiled from "engine/templates/html/gallery/gallery_album.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12860541495a0ae4eaccf2b1-79820663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df732de47802d50ce13372a32b4750e698c8d33d' => 
    array (
      0 => 'engine/templates/html/gallery/gallery_album.tpl',
      1 => 1500987962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12860541495a0ae4eaccf2b1-79820663',
  'function' => 
  array (
    'category_select' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'album' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'categories' => 0,
    'category' => 0,
    'album_categories' => 0,
    'level' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0ae4eae0e468_16700176',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0ae4eae0e468_16700176')) {function content_5a0ae4eae0e468_16700176($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/astyle/mdk.ua/www/Smarty/libs/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['album']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['album']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новый альбом', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('gallery', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('gallery_albums', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
	<link rel="stylesheet" href="./templates/js/plugins/select2/select2.min.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/gallery_album.js"></script>
	<script src="./templates/js/plugins/select2/select2.full.min.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1><?php if ($_smarty_tpl->tpl_vars['album']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['album']->value->name;?>
<?php } else { ?>Новый альбом<?php }?></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=GalleryAlbumsAdmin">Альбомы</a></li>
		<li class="active"><?php if ($_smarty_tpl->tpl_vars['album']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['album']->value->name;?>
<?php } else { ?>Новый альбом<?php }?></li>
	</ol>
</section>


<?php echo $_smarty_tpl->getSubTemplate ('editor/tinymce_init_gallery.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="row">	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
	
	<section class="content">
		<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Альбом добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Альбом успешно обновлен<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_success']->value;?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='url_exists') {?>Альбом с таким адресом уже существует<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>
	
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
								<input type="text" id="name" class="form-control" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
								<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
							</div>
							<div class="form-group col-md-3">
								<div class="checkbox" style="margin-top:30px;">
									<label>
										<input type="checkbox" name="visible" class="minimal" <?php if ($_smarty_tpl->tpl_vars['album']->value->visible) {?>checked<?php }?>>
										Активна
									</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Категории альбома</label>
									<select class="form-control categories_select" name="categories[]" multiple="multiple" data-placeholder="Выберите категории">
										<?php if (!function_exists('smarty_template_function_category_select')) {
    function smarty_template_function_category_select($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['category_select']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
											<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
												<option value='<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
' <?php if (in_array($_smarty_tpl->tpl_vars['category']->value->id,$_smarty_tpl->tpl_vars['album_categories']->value)) {?>selected<?php }?> category_name='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['name'] = 'sp';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total']);
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
													<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'album_categories'=>$_smarty_tpl->tpl_vars['album_categories']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

											<?php } ?>
										<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

										<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'album_categories'=>$_smarty_tpl->tpl_vars['album_categories']->value));?>

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
								<div> <span style="width:20%; line-height: 34px; float: left;">/album/</span><input type="text" id="url" style="width:80%;" class="form-control adress-input" name="url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" /></div>
							</div>
							<div class="form-group col-sm-12">
								<label for="meta_title">Заголовок</label>
								<input type="text" id="meta_title" class="form-control" name="meta_title" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
">
							</div>
							<div class="form-group col-sm-12">
								<label for="meta_keywords">Ключевые слова</label>
								<input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
">
							</div>
							<div class="form-group col-sm-12">
								<label for="meta_description">Описание</label>
								<textarea data-required="true" data-minlength="5" name="meta_description" id="meta_description" cols="10" rows="3" class="form-control"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
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
							<textarea name="description" rows="10" class="form-control editor_small"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
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
						  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'GalleryCategoryAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить еще альбом</a> 
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
								<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['album']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
								<div class="col-md-2 image-box">
									<div class="image">
										<img src="/files/gallery/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['album']->value->created,'%Y');?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value->filename;?>
">
										<div class="image-check"><input type="checkbox" name="check[]" class="im-check" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"></div>
										<?php if ($_smarty_tpl->tpl_vars['image']->value->as_preview) {?><div class="as-preview-icon" data-toggle="tooltip" title="Изображение указано как обложка альбома"><i class="fa fa-star"></i></div><?php }?>
										<div class="image-controls">
											<input name="positions[]" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" class="form-control" />
											<div class="move_zone"><i class="fa fa-arrows"></i></div>
											<div class="as-preview-box">
												<input type="radio" class="as-preview" id="as-preview-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" name="as-preview" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['image']->value->as_preview) {?>checked<?php }?> />
												<label for="as-preview-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" data-toggle="tooltip" title="Установить как обложку альбома"><i class="fa fa-star"></i></label>
											</div>
											<div class="open-image"><a href="/files/gallery/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['album']->value->created,'%Y');?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value->filename;?>
" data-toggle="tooltip" title="Открыть изображение в новом окне" target="__blank"><i class="fa fa-eye"></i></a></div>
											<div class="delete-image" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash"></i></div>
										</div>
									</div>
								</div>
								<?php } ?>
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
</div><?php }} ?>

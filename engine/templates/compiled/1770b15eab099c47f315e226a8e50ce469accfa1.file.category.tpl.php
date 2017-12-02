<?php /* Smarty version Smarty-3.1.18, created on 2017-11-28 12:25:01
         compiled from "engine/templates/html/products/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143055585a09969484e475-83133373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1770b15eab099c47f315e226a8e50ce469accfa1' => 
    array (
      0 => 'engine/templates/html/products/category.tpl',
      1 => 1511864695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143055585a09969484e475-83133373',
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
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a099694962703_28170632',
  'variables' => 
  array (
    'category' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'languages' => 0,
    'l' => 0,
    'language_id' => 0,
    'cats' => 0,
    'cat' => 0,
    'level' => 0,
    'categories' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a099694962703_28170632')) {function content_5a099694962703_28170632($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['category']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['category']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новая категория', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('catalog', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable("product_categories", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
	<link rel="stylesheet" href="./templates/js/fancybox/jquery.fancybox.min.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/fancybox/jquery.fancybox.min.js"></script>
	<script src="./templates/js/modules/product_category.js"></script>
	<script>
		 $(".iframe-btn").fancybox({
			iframe : {
				css : {
					width : "900px",
					height : "600px"
				}
			},
			"type"		: "iframe"
			});
	</script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1><?php if ($_smarty_tpl->tpl_vars['category']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
<?php } else { ?>Новая категория<?php }?></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=CategoriesAdmin">Категории товаров</a></li>
		<li class="active"><?php if ($_smarty_tpl->tpl_vars['category']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
<?php } else { ?>Новая категория<?php }?></li>
	</ol>
</section>


<?php echo $_smarty_tpl->getSubTemplate ('editor/tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<section class="content">
	<div class="row">
		<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Категория добавлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Категория обновлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='added_translation') {?>Перевод добавлен<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_success']->value;?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='url_exists') {?>Категория с таким адресом уже существует<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>
		
		<div class="form-group col-lg-2 pull-right">
			<select id="language_id" class="form-control" onchange="if (this.value) window.location.href=this.value" <?php if (!$_smarty_tpl->tpl_vars['category']->value->id) {?>disabled<?php }?>>
			<?php if (!$_smarty_tpl->tpl_vars['category']->value->id) {?>
				<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['l']->value->id==1) {?>
					<option value='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'CategoryAdmin','id'=>$_smarty_tpl->tpl_vars['category']->value->id,'language_id'=>$_smarty_tpl->tpl_vars['l']->value->id,'return'=>null),$_smarty_tpl);?>
' <?php if ($_smarty_tpl->tpl_vars['language_id']->value==$_smarty_tpl->tpl_vars['l']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
					<?php }?>
				<?php } ?>
			<?php } else { ?>
				<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
					<option value='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'CategoryAdmin','id'=>$_smarty_tpl->tpl_vars['category']->value->id,'language_id'=>$_smarty_tpl->tpl_vars['l']->value->id,'return'=>null),$_smarty_tpl);?>
' <?php if ($_smarty_tpl->tpl_vars['language_id']->value==$_smarty_tpl->tpl_vars['l']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
					<?php if (!$_smarty_tpl->tpl_vars['category']->value->id) {?><?php break 1?><?php }?>
				<?php } ?>
			<?php }?>
			</select>
		</div>
		
		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Основные настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'CategoryAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить еще категорию</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-md-4">
						<label for="name">Название категории</label>
						<input type="text" id="name" class="form-control" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
						<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
						<?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?><input name=language_id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_id']->value, ENT_QUOTES, 'UTF-8', true);?>
"/><?php }?>
					</div>
					<div class="form-group col-md-4">
						<label for="visible_name">Отображаемое название</label>
						<input type="text" id="visible_name" class="form-control" name="visible_name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
" />
					</div>
					<div class="form-group col-md-4">
						<div class="checkbox" style="margin-top:30px;">
							<label>
								<input type="checkbox" name="visible" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?> class="minimal" <?php if ($_smarty_tpl->tpl_vars['category']->value->visible) {?>checked<?php }?>>
								Активна
							</label>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="parent_id">Родительская категория</label>
						<select id="parent_id" class="form-control" name="parent_id" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?>>
							<option value='0'>Корневая категория</option>
							<?php if (!function_exists('smarty_template_function_category_select')) {
    function smarty_template_function_category_select($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['category_select']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
							<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['category']->value->id!=$_smarty_tpl->tpl_vars['cat']->value->id) {?>
									<option value='<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['category']->value->parent_id==$_smarty_tpl->tpl_vars['cat']->value->id) {?>selected<?php }?>><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']);
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
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?><?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
</option>
									<?php smarty_template_function_category_select($_smarty_tpl,array('cats'=>$_smarty_tpl->tpl_vars['cat']->value->subcategories,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

								<?php }?>
							<?php } ?>
							<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

							<?php smarty_template_function_category_select($_smarty_tpl,array('cats'=>$_smarty_tpl->tpl_vars['categories']->value));?>

						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="cat_image">Изображение категории</label>
						
						<div class="input-group">
							<input type="text" id="cat_image" class="form-control" name="image" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->image, ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?>>
							<span class="input-group-btn">
								<a href="./templates/js/filemanager/dialog.php?type=1&relative_url=1&field_id=cat_image" type="button" class="btn btn-primary btn-flat iframe-btn">Выбрать</a>
							</span>
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
					<div class="form-group col-sm-4">
						<label for="url">Адрес</label>
						<input type="text" id="url" class="form-control" name="url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?> />
					</div>
					<div class="form-group col-sm-4">
						<label for="meta_title">Заголовок</label>
						<input type="text" id="meta_title" class="form-control" name="meta_title" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
">
					</div>
					<div class="form-group col-sm-4">
						<label for="meta_keywords">Ключевые слова</label>
						<input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
">
					</div>
					<div class="form-group col-sm-8">
						<label for="meta_description">Описание</label>
						<textarea data-required="true" data-minlength="5" name="meta_description" id="meta_description" cols="10" rows="3" class="form-control"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-font"></i>
				  <h3 class="box-title" style="line-height:1.5">Описание категории</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<textarea name="description" rows="30" class="form-control editor_large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		</form>
	</div>
</section><?php }} ?>

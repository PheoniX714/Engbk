<?php /* Smarty version Smarty-3.1.18, created on 2017-11-30 10:55:38
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5816955395a06a436c7f6d9-69135445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0b8d366e87a9c8dc384f4463ae36c0238a3a635' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/products.tpl',
      1 => 1512032138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5816955395a06a436c7f6d9-69135445',
  'function' => 
  array (
    'categories_tree' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'left_menu' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a06a436d80599_14339137',
  'variables' => 
  array (
    'category' => 0,
    'cat' => 0,
    'brand' => 0,
    'keyword' => 0,
    'products' => 0,
    'sort' => 0,
    'features' => 0,
    'f' => 0,
    'language' => 0,
    'filter_features' => 0,
    'o' => 0,
    'categories' => 0,
    'level' => 0,
    'c' => 0,
    'wc' => 0,
    'categories_women' => 0,
    'categories_1' => 0,
    'categories_2' => 0,
    'mc' => 0,
    'categories_men' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06a436d80599_14339137')) {function content_5a06a436d80599_14339137($_smarty_tpl) {?><?php ob_start();?><?php echo $_smarty_tpl->getSubTemplate ('menu_script.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['add_script'] = new Smarty_variable($_tmp1, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['add_script'] = clone $_smarty_tpl->tpl_vars['add_script'];?>

<?php echo $_smarty_tpl->getSubTemplate ('slider.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<section id="products" class="catalog-page">
	<div class="container">
		
		<div id="path" class="col-lg-12">
			<a href="./">Главная</a> <?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?> / <a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php if ($_smarty_tpl->tpl_vars['cat']->value->visible_name) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a><?php } ?>
				<?php if ($_smarty_tpl->tpl_vars['brand']->value) {?>/ <a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a><?php }?>
			<?php } elseif ($_smarty_tpl->tpl_vars['brand']->value) {?>/ <a href="brands/<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
			<?php } elseif ($_smarty_tpl->tpl_vars['keyword']->value) {?>/ Поиск <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
		</div>
		
		<?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php if (count($_smarty_tpl->tpl_vars['products']->value)>2) {?>
			<div class="sort pull-right">
			<select onchange="location = this.value+'#products';">
				<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'position'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='position') {?> selected<?php }?>>Сортировать по</option>
				<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'name'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='name') {?> selected<?php }?>>Названию</option>
				<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'price'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='price') {?> selected<?php }?>>Цене</option>
			</select>
			</div>
		<?php }?>
		</div>
		
		<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
		<div class="products-list">
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"><?php echo $_smarty_tpl->getSubTemplate ('tpl_products_block.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
		<?php } ?>
		</div>
		
		<div class="col-lg-12">
		<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		</div>
		
		<?php } else { ?><h4 style='padding:50px 20px;'>Товаров по запросу "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
" не найдено!</h4><?php }?>

		<?php } else { ?>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
			<form method="get" action="<?php echo $_SERVER['SCRIPT_URL'];?>
#products">
				
				<div id="features-list" class="hidden-xs">
					<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
?> 
					<?php if ($_smarty_tpl->tpl_vars['f']->value->language_id==$_smarty_tpl->tpl_vars['language']->value->id) {?> 
					<div class="feature_name" data-feature="<?php echo $_smarty_tpl->tpl_vars['f']->value->id;?>
">
						<?php echo $_smarty_tpl->tpl_vars['f']->value->name;?>

					</div>
					<div class="feature_values">
						<ul>
							<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['f']->value->options; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['o']->key;
?>
							<li>
								<label>
									<input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['f']->value->id;?>
[]" onchange="submit(this.form);" <?php if ($_smarty_tpl->tpl_vars['filter_features']->value[$_smarty_tpl->tpl_vars['f']->value->id]&&in_array($_smarty_tpl->tpl_vars['o']->value->value,$_smarty_tpl->tpl_vars['filter_features']->value[$_smarty_tpl->tpl_vars['f']->value->id])) {?>checked="checked"<?php }?> value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value->value, ENT_QUOTES, 'UTF-8', true);?>
" /><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value->value, ENT_QUOTES, 'UTF-8', true);?>

								</label>
							</li>
							<?php } ?>
						</ul>
					</div>
					<?php }?>
					<?php } ?>
				</div>
			</form>
			<?php } else { ?>
			<div class="left-categories">
				<?php if (!function_exists('smarty_template_function_left_menu')) {
    function smarty_template_function_left_menu($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['left_menu']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
				<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
				<ul class="<?php if ($_smarty_tpl->tpl_vars['level']->value==0) {?>tree <?php }?>menu-level menu-level-<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
">
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
					
					<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
					<li>
						<a <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>class="selected"<?php }?> href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['c']->value->visible_name) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a>
						<?php smarty_template_function_left_menu($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

					</li>
					<?php }?>
				<?php } ?>
				</ul>
				<?php }?>
				<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

				
				<?php if (in_array($_smarty_tpl->tpl_vars['category']->value->id,$_smarty_tpl->tpl_vars['wc']->value)) {?>
				<?php smarty_template_function_left_menu($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_women']->value,'level'=>0));?>

				<?php smarty_template_function_left_menu($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_1']->value,'level'=>0));?>

				<?php smarty_template_function_left_menu($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_2']->value,'level'=>0));?>
	
				<?php } elseif (in_array($_smarty_tpl->tpl_vars['category']->value->id,$_smarty_tpl->tpl_vars['mc']->value)) {?>
				<?php smarty_template_function_left_menu($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_men']->value,'level'=>0));?>

				<?php smarty_template_function_left_menu($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_1']->value,'level'=>0));?>

				<?php smarty_template_function_left_menu($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories_2']->value,'level'=>0));?>
	
				<?php } else { ?>
				<?php smarty_template_function_left_menu($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'level'=>0));?>
	
				<?php }?>
			</div>			
			<?php }?>
		</div>
		<div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-lg-12 col-xs-12">
				<?php if (count($_smarty_tpl->tpl_vars['products']->value)>2) {?>
					<div class="sort pull-right">
					<select onchange="location = this.value+'#products';">
						<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'position'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='position') {?> selected<?php }?>>Сортировать по умолчанию</option>
						<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'name'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='name') {?> selected<?php }?>>Названию</option>
						<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'price_asc'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='price_asc') {?> selected<?php }?>>От дорогих к дешевым</option>
						<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'price_desc'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='price_desc') {?> selected<?php }?>>От дешевых к дорогим</option>
					</select>
					</div>
				<?php }?>
				</div>
				
				<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
				<div class="products-list">
				<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"><?php echo $_smarty_tpl->getSubTemplate ('tpl_products_block.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
				<?php } ?>
				</div>
				
				<div class="col-lg-12 col-md-12 col-xs-12">
				<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</div>
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>

				</div>
				
				<?php } else { ?><h4 style='padding:50px 20px;'>Товаров нет</h4><?php }?>
			</div>
		</div>
		<?php }?>
	</div>
</section><?php }} ?>

<?php
/* Smarty version 3.1.32, created on 2020-03-25 20:04:49
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e7b9d41168ef5_13338265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01e2c390d3dd67cb10808e6c3a64ba9d44f9a418' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/products.tpl',
      1 => 1585159486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pagination.tpl' => 1,
  ),
),false)) {
function content_5e7b9d41168ef5_13338265 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'category_select' => 
  array (
    'compiled_filepath' => '/home/astyle/a-style.kh.ua/dev2/engine/templates/compiled/01e2c390d3dd67cb10808e6c3a64ba9d44f9a418_0.file.products.tpl.php',
    'uid' => '01e2c390d3dd67cb10808e6c3a64ba9d44f9a418',
    'call_name' => 'smarty_template_function_category_select_12800990665e7b9d4110c8f8_34474958',
  ),
));
$_smarty_tpl->_assignInScope('meta_title', 'Список товаров' ,false ,8);
$_smarty_tpl->_assignInScope('sm_groupe', 'products' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'products' ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
	var products_list = document.getElementById('products_list');
	var sortable = new Sortable(products_list, {
		multiDrag: true,
		selectedClass: 'bg-yellow-100',
		handle: '.handle',
		animation: 150,
		ghostClass: 'bg-blue-100',
		onEnd: function() {
			$.ajax({url: document.location.href, type: "POST", dataType: "html", data: $('form').serialize()});
		}
	});

	$(function () {
		$("#check_all").change(function() {
			if($('#check_all').hasClass('checked')){
				$('#list .custom-control-input:not(:disabled)').attr('checked', false);
				$('#check_all').removeClass('checked');
			}else{
				$('#list .custom-control-input:not(:disabled)').attr('checked', true);
				$('#check_all').addClass('checked');
			}
		});		
		  
		$("button.visible").on('click', function(){
			var icon        = $(this);
			var line        = icon.closest("#list .todo-item");
			var tag        	= line.find(".visible-tag");
			var but         = icon.children(".icon-lightbulb");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var session_id  = icon.closest('form').find('input[type="hidden"][name*="session_id"]').val();
			var state       = but.hasClass('enbl')?0:1;
			$.ajax({
				type: 'POST',
				url: 'ajax/update_object.php',
				data: {'object': 'product', 'id': id, 'values': {'visible': state}, 'session_id': session_id},
				success: function(data){
					if(!state){
						but.removeClass('text-yellow-900 enbl');
						tag.show();
					}else{
						but.addClass('text-yellow-900 enbl');
						tag.hide();
					}			
				},
				dataType: 'json'
			});	
			return false;
		});
		
		$("button.featured").on('click', function(){
			var icon        = $(this);
			var line        = icon.closest("#list .todo-item");
			var tag        	= line.find(".featured-tag");
			var but         = icon.children(".icon-star");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var session_id  = icon.closest('form').find('input[type="hidden"][name*="session_id"]').val();
			var state       = but.hasClass('enbl')?0:1;
			$.ajax({
				type: 'POST',
				url: 'ajax/update_object.php',
				data: {'object': 'product', 'id': id, 'values': {'featured': state}, 'session_id': session_id},
				success: function(data){
					if(!state){
						but.addClass('text-grey-500');
						but.removeClass('text-orange-900 enbl');
						tag.show();
					}else{
						but.addClass('text-orange-900 enbl');
						but.removeClass('text-grey-500');
						tag.hide();
					}			
				},
				dataType: 'json'
			});	
			return false;
		});
		
		$("button.duplicate").on("click", function(){
			$('#list .todo-item input[type="checkbox"][name*="check"]').prop('checked', false);
			$(this).closest("#list .todo-item").find('input[type="checkbox"][name*="check"]').prop('checked', true);
			$(this).closest("form").find('select[name="action"] option[value=duplicate]').prop('selected', true);
			$(this).closest("form").submit();
			return false;
		});
		
		$("button.delete").on("click", function(){
			$('#list .todo-item input[type="checkbox"][name*="check"]').prop('checked', false);
			$(this).closest("#list .todo-item").find('input[type="checkbox"][name*="check"]').prop('checked', true);
			$(this).closest("form").find('select[name="action"] option[value=delete]').prop('selected', true);
			$(this).closest("form").submit();
			return false;
		});
		
		$("form").submit(function() {
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
		});
		
	  });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-file-multiple s-6"></i>
					</span>
					<span class="logo-text h4">Каталог товаров</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ProductAdmin','id'=>null),$_smarty_tpl ) );?>
" class="btn btn-light fuse-ripple-ready"><i class="icon-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить товар</span></a>
		</div>
	</div>

	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
		
		<form method="get">
			<input type="hidden" name="module" value="ProductsAdmin">
			<div class="collapse <?php if ($_smarty_tpl->tpl_vars['show_filters']->value) {?>show<?php }?>" id="filters">
				<div class="card mb-3">
					<div class="card-body d-flex align-items-end flex-wrap">
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-3">
							<label for="filter_language">Язык перевода</label>
							<select class="form-control" id="filter_language" name="filter_language">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['filter_language']->value == $_smarty_tpl->tpl_vars['l']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>	
							</select>
						</div>
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-3">
							<label for="category_id">Категория товара</label>
							<select class="form-control" id="category_id" name="category_id">
								<option value=''>Все картегории</option>
								
								<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'category_select', array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'category_id'=>$_smarty_tpl->tpl_vars['category_id']->value), true);?>

							</select>
						</div>
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-3">
							<label for="filter">Фильтр по типу</label>
							<select class="form-control" id="filter" name="filter">
								<option value="" >Все товары</option>
								<option value="featured" <?php if ($_smarty_tpl->tpl_vars['filter']->value == 'featured') {?>selected<?php }?>>Рекомендуемые</option>
								<option value="discounted" <?php if ($_smarty_tpl->tpl_vars['filter']->value == 'discounted') {?>selected<?php }?>>Со скидкой</option>
								<option value="visible" <?php if ($_smarty_tpl->tpl_vars['filter']->value == 'visible') {?>selected<?php }?>>Активные</option>
								<option value="hidden" <?php if ($_smarty_tpl->tpl_vars['filter']->value == 'hidden') {?>selected<?php }?>>Неактивные</option>
								<option value="in_stock" <?php if ($_smarty_tpl->tpl_vars['filter']->value == 'in_stock') {?>selected<?php }?>>Есть на складе</option>
								<option value="outofstock" <?php if ($_smarty_tpl->tpl_vars['filter']->value == 'outofstock') {?>selected<?php }?>>Отсутствующие на складе</option>
							</select>
						</div>
						<div class="col-12 col-sm-4 col-md-3">
							<div class="form-group mb-2">
								<input type="text" class="form-control" id="keyword" name="keyword" aria-describedby="meta_titleHelp" placeholder="Введите название товара" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
" autocomplete="off">
								<label for="keyword">Название товара</label>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-12 text-right">
								<a class="btn btn-danger text-white btn-sm" href="/engine/index.php?module=ProductsAdmin">Очистить</a>
								<button class="btn btn-primary btn-sm" type="submit">Фильтровать</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<form method="post">
		<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">		
			<div id="todo" class="card">
				
				<div id="list" class="todo-items w-100">
					<div class="todo-item pr-4 pl-11 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>
						
						<div class="info col-2 px-4">
							<div class="title d-flex justify-content-center align-items-center">
								Изображение
							</div>
						</div>

						<div class="info col px-4">

							<div class="title d-flex justify-content-between align-items-center">
								Название товара
								
								<button class="btn btn-icon pull-right" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters"><i class="icon-settings" data-toggle="tooltip" data-placement="bottom" title="Открыть/Закрыть фильтры"></i></button>
							</div>
						</div>

					</div>
					<div id="products_list">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
						<div class="todo-item sort-item pl-0 pr-2 py-4 row no-gutters d-flex flex-wrap flex-sm-nowrap align-items-center">

							<div class="handle mr-1 px-2">
								<i class="icon icon-drag"></i>
							</div>
							<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->position;?>
">

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"/>
								<span class="custom-control-indicator"></span>
							</label>
							<div class="info col-2 px-4 d-flex align-items-center justify-content-center">
								<?php if ($_smarty_tpl->tpl_vars['product']->value->image) {?>
								<a class="image" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['product']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl ) );?>
"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'resize' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->image->filename,150,100,'w' ));?>
"></a>
								<?php } else { ?>
								<a class="image" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['product']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl ) );?>
"><img src="./templates/img/placeholder.png" width="150px" height="auto"></a>
								<?php }?>
							</div>
							<div class="info col px-4 d-flex align-items-start align-sm-items-center justify-content-start flex-column">

								<div class="title mr-4 mb-2">
									<a class="td-wh-none" style="word-break: break-all;" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['product']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
								</div>

								<div class="tags">
									<div class="tag badge visible-tag" <?php if ($_smarty_tpl->tpl_vars['product']->value->visible) {?>style="display:none;"<?php }?>>
										<div class="row no-gutters align-items-center">
											<div class="tag-color mr-2 bg-red"></div>
											<div class="tag-label">Отключен</div>
										</div>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['product']->value->need_translate && count($_smarty_tpl->tpl_vars['product']->value->need_translate) > 0) {?>
									<div class="tag badge language-tag">
										<div class="row no-gutters align-items-center">
											<div class="tag-color mr-2 bg-red"></div>
											<div class="tag-label">Отсутствуют переводы: <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->need_translate, 'nt');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['nt']->value) {
?><b><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['nt']->value, 'UTF-8');?>
</b> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div>
										</div>
									</div>
									<?php }?>
								</div>
							</div>

							<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl ) );?>
" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
									<i class="icon icon-pencil text-blue"></i>
								</a>
								
								<button type="button" class="btn btn-icon featured" data-toggle="tooltip" data-placement="bottom" title="Рекомендуемый товар">
									<i class="icon icon-star <?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?>text-orange-900 enbl<?php } else { ?>text-grey-500<?php }?>"></i>
								</button>
								
								<button type="button" class="btn btn-icon visible" data-toggle="tooltip" data-placement="bottom" title="Вкл\Выкл товар">
									<i class="icon icon-lightbulb <?php if ($_smarty_tpl->tpl_vars['product']->value->visible) {?>text-yellow-900 enbl<?php }?>"></i>
								</button>
								
								<button type="button" class="btn btn-icon duplicate" data-toggle="tooltip" data-placement="bottom" title="Дублировать товар">
									<i class="icon icon-book-multiple-variant text-blue-600"></i>
								</button>

								<button type="button" class="btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить">
									<i class="icon icon-trash text-red"></i>
								</button>

							</div>
						</div>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>
				</div>
				
				<div class="card-footer py-6">
					<div class="row">
						<div class="col-12 col-sm-4 col-md-3 mb-3 mb-sm-0">
							<select id="action" class="form-control" name="action">
								<option value="">Выберите действие</option>
								<option value="enable">Отобразить на сайте</option>
								<option value="disable">Отключить на сайте</option>
								<option value="set_featured">Сделать рекомендуемым</option>
								<option value="unset_featured">Убрать из рекомендуемых</option>
								<option value="duplicate">Дублировать товар</option>
								<option value="delete">Удалить</option>
							</select>
						</div>
						  
						<div class="col-12 col-md-2 col-sm-6 col-xs-6">
							<button type="submit" class="btn btn-secondary btn-sm fuse-ripple-ready" value="Применить">Применить</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php $_smarty_tpl->_subTemplateRender('file:pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
	</div>
</div><?php }
/* smarty_template_function_category_select_12800990665e7b9d4110c8f8_34474958 */
if (!function_exists('smarty_template_function_category_select_12800990665e7b9d4110c8f8_34474958')) {
function smarty_template_function_category_select_12800990665e7b9d4110c8f8_34474958(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('level'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
									<option value='<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['category']->value->id == $_smarty_tpl->tpl_vars['category_id']->value) {?>selected<?php }?> category_name='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'><?php
$__section_sp_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_sp_0_total = $__section_sp_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sp'] = new Smarty_Variable(array());
if ($__section_sp_0_total !== 0) {
for ($__section_sp_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sp']->value['index'] = 0; $__section_sp_0_iteration <= $__section_sp_0_total; $__section_sp_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sp']->value['index']++){
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php
}
}
echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
										<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'category_select', array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'category_id'=>$_smarty_tpl->tpl_vars['category_id']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), true);?>

								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								<?php
}}
/*/ smarty_template_function_category_select_12800990665e7b9d4110c8f8_34474958 */
}

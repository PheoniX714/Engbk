<?php
/* Smarty version 3.1.32, created on 2020-03-08 13:24:05
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/pages/site_menus.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e64d5d5261b20_52727707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9a678df3c5d6abfdf2962631758c95db369744e' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/pages/site_menus.tpl',
      1 => 1583664083,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e64d5d5261b20_52727707 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('meta_title', "Меню сайта" ,false ,8);
$_smarty_tpl->_assignInScope('sm_groupe', 'site_menu' ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
	var menus_list = document.getElementById('menus_list');
	var sortable = new Sortable(menus_list, {
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
		
		$("button.delete").on("click", function(){
			$('#list .todo-item input[type="checkbox"][name*="check"]').prop('checked', false);
			$(this).closest("#list .todo-item").find('input[type="checkbox"][name*="check"]').prop('checked', true);
			$(this).closest("form").find('select[name="action"] option[value=delete]').prop('selected', true);
			$(this).closest("form").submit();
			return false;
		});
		
		$("form").submit(function() {
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление!\nВнимание! Все страницы из удаляемых меню будут перемещены в основное меню сайта.'))
				return false;	
		});
		
	  });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div id="contacts" class="page-layout simple left-sidebar-floating tabbed">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-file-multiple s-6"></i>
					</span>
					<span class="logo-text h4">Меню сайта</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="./index.php?module=SiteMenuAdmin" class="btn btn-light fuse-ripple-ready"><i class="icon-file-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить меню</span></a>
		</div>
	</div>
	<!-- / HEADER -->
	
	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
		
		<form method="post">
		<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">	
			<div id="todo" class="card">
				<div id="list" class="todo-items w-100">
					<div class="todo-item pr-4 pl-11 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4">
							<div class="title d-flex justify-content-between align-items-center">Название меню</div>
						</div>
					</div>
					<div id="menus_list">
					<?php if ($_smarty_tpl->tpl_vars['menus']->value) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menus']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
					
						<div class="todo-item pl-0 pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center ">

							<div class="handle mr-1 px-2">
								<i class="icon icon-drag"></i>
							</div>
							<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['m']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value->position;?>
">

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value->id;?>
" />
								<span class="custom-control-indicator"></span>
							</label>

							<div class="info col px-4 d-flex align-items-start align-sm-items-center justify-content-left flex-column flex-sm-row">

								<div class="title mr-4">
									<a class="td-wh-none" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'SiteMenuAdmin','id'=>$_smarty_tpl->tpl_vars['m']->value->id,'return'=>null),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
								</div>

							</div>

							<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'SiteMenuAdmin','id'=>$_smarty_tpl->tpl_vars['m']->value->id,'return'=>null),$_smarty_tpl ) );?>
" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
									<i class="icon icon-pencil text-blue"></i>
								</a>
								
								<button type="button" class="btn btn-icon <?php if ($_smarty_tpl->tpl_vars['m']->value->id != 1) {?>delete<?php }?>" data-toggle="tooltip" data-placement="bottom" title="Удалить">
									<i class="icon icon-trash <?php if ($_smarty_tpl->tpl_vars['m']->value->id == 1) {?>text-grey<?php } else { ?>text-red<?php }?>"></i>
								</button>
								
							</div>
						</div>
					
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php }?>
					</div>
				</div>
				
				<div class="card-footer py-6">
					 <div class="row">
						<div class="col-12 col-sm-4 col-md-3 mb-3 mb-sm-0">
							<select id="action" class="form-control" name="action">
								<option value="">Выберите действие</option>
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
		</div>
	</div>
</div><?php }
}

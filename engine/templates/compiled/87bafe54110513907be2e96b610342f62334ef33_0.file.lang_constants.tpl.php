<?php
/* Smarty version 3.1.32, created on 2020-03-08 01:21:38
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/lang_constants.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e642c827e59d2_49488982',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87bafe54110513907be2e96b610342f62334ef33' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/lang_constants.tpl',
      1 => 1538580917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e642c827e59d2_49488982 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('sm_groupe', 'settings' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'languages' ,false ,8);
$_smarty_tpl->_assignInScope('sm_sub_item', 'lang_constants' ,false ,8);?>

<?php $_smarty_tpl->_assignInScope('meta_title', 'Языковые константы' ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
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
				
		$("form").submit(function() {
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
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
						<i class="icon-translate s-6"></i>
					</span>
					<span class="logo-text h4">Языковые константы</span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="page-content">
		<ul class="nav nav-tabs blue-tabs">
			
			<li class="nav-item">
				<a class='nav-link btn <?php if ($_smarty_tpl->tpl_vars['sm_sub_item']->value == "languages") {?>active<?php }?>' href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'LanguagesAdmin','id'=>null),$_smarty_tpl ) );?>
" >Список языков</a>
			</li>
			
			<li class="nav-item">
				<a class='nav-link btn <?php if ($_smarty_tpl->tpl_vars['sm_sub_item']->value == "lang_constants") {?>active<?php }?>' href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'LangConstantsAdmin','menu_id'=>$_smarty_tpl->tpl_vars['m']->value->id),$_smarty_tpl ) );?>
" >Языковые константы</a>
			</li>

		</ul>
	</div>
	
	<form method=post id=product enctype="multipart/form-data">
	<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
	
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group row no-gutters">
			
				<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
				<div class="col-md-12 p-3">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<h4><i class="icon icon-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'saved') {?>Константы успешно сохранены<?php }?></h4>
					</div>
				</div>
				<?php }?>
				
				<div class="col-12 p-3">

					<div class="card mb-3">
						<div class="widget-header px-4 py-6 row no-gutters align-items-center justify-content-between">
							<span class="h5">Список констант</span>
							<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {?>
							<div>
								<button type="button" class="btn btn-success btn-fab btn-sm fuse-ripple-ready mr-3" data-toggle="modal" data-target="#newConstant">
									<i class="icon-plus"></i>
								</button>
								
								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('mode'=>'view'),$_smarty_tpl ) );?>
" class="btn btn-secondary btn-fab btn-sm fuse-ripple-ready">
									<i class="icon-pencil-off"></i>
								</a>
							</div>
							<?php } else { ?>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('mode'=>'edit'),$_smarty_tpl ) );?>
" class="btn btn-secondary btn-fab btn-sm fuse-ripple-ready">
								<i class="icon-pencil"></i>
							</a>
							<?php }?>
						</div>

						<div class="divider"></div>

						<div class="widget-content">
							<div class="table-responsive">
								<table id="list" class="table table-striped">
									<thead>
										<tr>
											<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {?>
											<th width="56">
												<label id="check_all" class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" />
													<span class="custom-control-indicator"></span>
												</label>
											</th>
											<?php }?>
											<th>Переменная</th>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
											<th>Значение <?php echo $_smarty_tpl->tpl_vars['l']->value->code;?>
</th>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</tr>
									</thead>
									<tbody>
										<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {?>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['constants']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
										<tr>
											<td>
												<label class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"/>
													<span class="custom-control-indicator"></span>
												</label>
											</td>
											<td>
												<div class="form-group pt-0 mb-0">
													<input type="text" class="form-control" name="constants[<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['c']->value->value;?>
" placeholder="Название константы на латинице">
												</div>
											</td>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
											<td>
												<div class="form-group pt-0 mb-0">
													<input type="text" class="form-control" name="constants_values[<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
][<?php echo $_smarty_tpl->tpl_vars['l']->value->code;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['constants_values']->value[$_smarty_tpl->tpl_vars['c']->value->id][$_smarty_tpl->tpl_vars['l']->value->code];?>
" placeholder="Значение <?php echo $_smarty_tpl->tpl_vars['l']->value->code;?>
">
												</div>
											</td>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</tr>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<?php } else { ?>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['constants']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
										<tr>
											<td>
												<?php echo $_smarty_tpl->tpl_vars['c']->value->value;?>

											</td>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
											<td>
												<?php echo $_smarty_tpl->tpl_vars['constants_values']->value[$_smarty_tpl->tpl_vars['c']->value->id][$_smarty_tpl->tpl_vars['l']->value->code];?>

											</td> 
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</tr>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>	
						
						<div class="divider"></div>
						
						<div class="widget-footer row px-4 py-6">
							<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 m-xs-3">
								<select id="action" class="form-control" name="action">
									<option value="">Выберите действие</option>
									<option value="delete">Удалить</option>
								</select>
							</div>
							
							<div class="col-md-2 col-sm-6 col-xs-6">
								<button type="submit" class="btn btn-secondary btn-sm fuse-ripple-ready" value="Применить">Применить</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {?>
<div id="newConstant" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="newConstantLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<form method="post">
		<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newConstantLabel">Добавление новой константы</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" name="new_constants[]" value="" placeholder="Название константы на латинице">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-sm btn-success">Добавить</button>
            </div>
        </div>
		</form>
    </div>
</div>
<?php }
}
}

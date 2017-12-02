<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 18:13:04
         compiled from "engine/templates/html/products/currency.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13001371415a072190446ac2-95475648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74dc16de6a969799775f34e5cbecd08da9b02970' => 
    array (
      0 => 'engine/templates/html/products/currency.tpl',
      1 => 1507626696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13001371415a072190446ac2-95475648',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currencies' => 0,
    'c' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a072190554561_59138410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a072190554561_59138410')) {function content_5a072190554561_59138410($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('settings', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('currency', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Валюты", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/currency.js"></script>	
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>
<section class="content-header">
	<h1>Список валют</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Валюты</li>
	</ol>
</section>

<section class="content">
<form id="list_form" method="post">
<!-- Main row -->
  <div class="row">
	<!-- Left col -->
	<div class="col-md-12">
	  <div class="box box-success"> 
		<div class="box-header">
		  <i class="fa fa-money"></i>
		  <h3 class="box-title" style="line-height:1.5">Список валют</h3>
		  <a class="btn btn-sm btn-primary pull-right btn-flat" id="add_currency" href="#"><i class="fa fa-plus"></i> <b> Добавить валюту</b></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th sortable-table" id="functional-table">
                <thead>
					<tr id="thead">
						<th class="move-cell"></th>
						<th class="id-cell">ID</th>
						<th class="name-cell">Название валюты</th>
						<th class="name-cell">Знак</th>
						<th class="name-cell">Код ISO</th>
						<th class="name-cell">Курс</th>
						<th class="actions-cell">Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['c']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['c']->index++;
 $_smarty_tpl->tpl_vars['c']->first = $_smarty_tpl->tpl_vars['c']->index === 0;
?>
					<tr class="c_item">
						<td class="move-cell">
							<input name="currency[id][<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
]" type="hidden" 	value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" />
							<div class="move_zone"><i class="fa fa-bars"></i></div>
						</td>
						<td class="id-cell">
							<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>

						</td>
						<td class="name-cell">
							<input name="currency[name][<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
]" type="" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" class="form-control" />
						</td>
						<td class="name-cell">
							<input name="currency[sign][<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
]" type="text" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
" />
						</td>
						<td class="name-cell">
							<input name="currency[code][<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
]" type="text" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->code, ENT_QUOTES, 'UTF-8', true);?>
" />
						</td>
						<td style="line-height:30px;">
							<?php if (!$_smarty_tpl->tpl_vars['c']->first) {?>
							<input name="currency[rate_from][<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
]" class="form-control" style="max-width: 70px; margin-right:5px; display:inline-block;" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->rate_from, ENT_QUOTES, 'UTF-8', true);?>
" /> <b><?php echo $_smarty_tpl->tpl_vars['c']->value->sign;?>
</b> = <input name="currency[rate_to][<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
]" class="form-control" style="max-width: 70px; margin-left:10px; margin-right:5px; display:inline-block;" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->rate_to, ENT_QUOTES, 'UTF-8', true);?>
" /> <b><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</b>
							<?php } else { ?>
							<input name="currency[rate_from][<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
]" class="form-control" style="max-width: 70px; display:inline-block;" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->rate_from, ENT_QUOTES, 'UTF-8', true);?>
" /> 
							<input name="currency[rate_to][<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
]" class="form-control" style="max-width: 70px; display:inline-block;" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->rate_to, ENT_QUOTES, 'UTF-8', true);?>
" />
							<?php }?>
						</td>
						<td>
							<button class="cents btn btn-sm btn-flat <?php if ($_smarty_tpl->tpl_vars['c']->value->cents==2) {?>btn-warning active<?php } else { ?>btn-default<?php }?> btn-actions" data-toggle="tooltip" title="Отображение копеек" ><i class="fa fa-money"></i></button>&nbsp;
							<button class="enable btn btn-sm btn-flat <?php if (!$_smarty_tpl->tpl_vars['c']->value->enabled) {?>btn-default<?php } else { ?>btn-success active<?php }?> btn-actions" data-toggle="tooltip" title="Отображение на сайте" ><i class="fa fa-lightbulb-o"></i></button>&nbsp;
							<?php if (!$_smarty_tpl->tpl_vars['c']->first) {?>
								<button class="delete btn btn-sm btn-flat btn-danger btn-actions" data-toggle="tooltip" title="Удалить" ><i class="fa fa-trash-o"></i></button>
							<?php }?>
						</td>
					</tr>
					<?php } ?>
					<tr class="c_item" id="new_currency" style='display:none;'>
						<td>
							<div class="move_zone" style=" width: 20px; cursor:pointer; float:left;"><i class="fa fa-bars" style="font-size: 20px;"></i></div>
						</td>
						<td class="id-cell">
							
						</td>
						<td>
							<input name="currency[id][]" class="form-control" type="hidden" value="" />
							<input name="currency[name][]" class="form-control" type="" value="" />
						</td>
						<td>
							<input name="currency[sign][]" class="form-control" type="" value="" />
						</td>
						<td>
							<input  name="currency[code][]" class="form-control" type="" value="" />
						</td>
						<td style="line-height:30px;">
							<input name="currency[rate_from][]" style="width: 70px; margin-right:10px; display:inline-block;" class="form-control" type="text" value="1" /> = <input name="currency[rate_to][]" style="width: 70px; margin-right:10px; display:inline-block;" class="form-control" type="text" value="1" /> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>

						</td>
						<td></td>
					</tr>
				</tbody>
			</table>			
		</div>
		<!-- /.box-body -->		
	  </div>
	  <!-- /.box -->
	  
	  <div class="row">
		  
		<div class="col-lg-2">
			<input type=hidden name=recalculate value='0'>
			<input type=hidden name=action value=''>
			<input type=hidden name=action_id value=''>
			<button type="submit" class="btn btn-block btn-success btn-flat" value="Сохранить">Сохранить</button>
		</div>
	  </div>
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</form>
</section>

<?php }} ?>

<?php /* Smarty version Smarty-3.1.18, created on 2017-11-19 15:40:25
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2034844485a070702ef3d70-21022442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9af6239f931b7caa9fdad761e59c53fa1613468' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/order.tpl',
      1 => 1511098822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2034844485a070702ef3d70-21022442',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0707030c9839_14465756',
  'variables' => 
  array (
    'order' => 0,
    'purchases' => 0,
    'purchase' => 0,
    'image' => 0,
    'product' => 0,
    'settings' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0707030c9839_14465756')) {function content_5a0707030c9839_14465756($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Ваш заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<section class="cart-page">
	<div class="container">
		<div id="path">
			<a href="./">Главная</a> / Заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>

		</div>
		
		<h2>Спасибо, Ваш заказ оформлен</h2>
		
		
		<ul id="purchases">
			<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
			<li>
				
				<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['purchase']->value->product->images), null, 0);?>
				<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
				<div class="col-lg-1 p-img">
					<a href="/products/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->url, ENT_QUOTES, 'UTF-8', true);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,75,75);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"></a>
				</div>
				<?php }?>
				
				
				<div class="col-lg-5">
					<a href="/products/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->url, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->name, ENT_QUOTES, 'UTF-8', true);?>
</a>	
				</div>
				
				<div class="col-lg-1">
					<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->variant->name, ENT_QUOTES, 'UTF-8', true);?>
	
				</div>

				
				<div class="col-lg-2">
					<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
 <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>

				</div>

				
				<div class="col-lg-3 price">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->variant->price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

				</div>
			</li>
			<?php } ?>
			
		</ul>
		
		<div class="col-lg-12 total-price">Общая стоимоть заказа:  <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span></div>

		<h2>Данные получателя</h2>
		<table class="table_info table-striped">
		<tr><td class='name'>Дата заказа</td><td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
 в <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
</td></tr>
		<?php if ($_smarty_tpl->tpl_vars['order']->value->name) {?>	<tr><td class='name'>Имя</td><td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</td></tr><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['order']->value->email) {?>	<tr><td class='name'>Email</td><td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>
</td></tr><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['order']->value->phone) {?>	<tr><td class='name'>Телефон</td><td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->phone, ENT_QUOTES, 'UTF-8', true);?>
</td></tr><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_id) {?><tr><td class='name'>Способ доставки</td><td><?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_id==1) {?>Самовывоз<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->delivery_id==2) {?>Новая почта<?php }?></td></tr><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['order']->value->city) {?><tr><td class='name'>Город\Область</td><td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->city, ENT_QUOTES, 'UTF-8', true);?>
</td></tr><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['order']->value->address) {?><tr><td class='name'>Адрес доставки</td><td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->address, ENT_QUOTES, 'UTF-8', true);?>
</td></tr><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['order']->value->comment) {?><tr><td class='name'>Комментарий</td><td><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->comment, ENT_QUOTES, 'UTF-8', true));?>
</td></tr><?php }?>
		</table>

	</div>	
</section><?php }} ?>

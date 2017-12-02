<?php /* Smarty version Smarty-3.1.18, created on 2017-11-16 19:37:05
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17659885365a0dccc19df928-90383266%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c825964ad6574a61ee2310c0b4580b6fc79d6a54' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/feedback.tpl',
      1 => 1498431666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17659885365a0dccc19df928-90383266',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'message_sent' => 0,
    'name' => 0,
    'error' => 0,
    'email' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0dccc1a337a6_36092879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0dccc1a337a6_36092879')) {function content_5a0dccc1a337a6_36092879($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/astyle/mdk.ua/www/Smarty/libs/plugins/function.math.php';
?><div id="page_title"><p><a href="./">Главная</a> » <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</p><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1></div>

<?php if ($_smarty_tpl->tpl_vars['message_sent']->value) {?><h4 style='padding:50px 0;'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
, Ваше сообщение отправлено.<br />Благодарим за внимание к нашему сайту</h4>
<?php } else { ?>
	<div id="category_description"><?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>
</div>
	<a name='ask'></a>
	<div class="clear_dot"></div>
	<h1>Обратная связь</h1>

	<form class="form feedback_form" method="post">
		<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
		<div class="message_error">
			<?php if ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>Неверно введена капча
			<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>Введите имя
			<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_email') {?>Введите email
			<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_text') {?>Введите сообщение
			<?php }?>
		</div>
		<?php }?>

		<label>Имя</label>
		<input data-format=".+" data-notice="Введите имя" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="name" maxlength="255" type="text"/>
		<label>Email</label>
		<input data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="email" maxlength="255" type="text"/>
		<label>Сообщение</label>
		<textarea data-format=".+" data-notice="Введите сообщение" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="message"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
		<label>Введите число с картинки</label>
		<div class="captcha"><img src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
"/></div>
		<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу" maxlength="4"/>
		<input class="button right" type="submit" name="feedback" value="Отправить" />
	</form>
<?php }?><?php }} ?>

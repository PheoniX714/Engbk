<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 13:02:02
         compiled from "engine/templates/html/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1476436635a06d8aa5fdf44-36557672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87076df0233d917a7002c9e8db262d3d830f975a' => 
    array (
      0 => 'engine/templates/html/login.tpl',
      1 => 1491502960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1476436635a06d8aa5fdf44-36557672',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a06d8aa631254_14397284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06d8aa631254_14397284')) {function content_5a06d8aa631254_14397284($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['wrapper'] = new Smarty_variable('', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['wrapper'] = clone $_smarty_tpl->tpl_vars['wrapper'];?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Вход в защищенную зону FastCMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="./templates/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="./templates/css/theme.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./"><b>Fast</b>CMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Войдите для начала работы</p>

    <form method="post">
	<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
		<?php if ($_smarty_tpl->tpl_vars['error']->value=='bad_data') {?>
		<div class="alert alert-danger">
			<a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
			<strong>Ошибка!</strong> Введен неправильный логин или пароль.
		</div>
		<?php }?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="a-login" placeholder="Логин" tabindex="1">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Пароль" tabindex="2">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-success btn-block btn-flat" name="login" value="Войти" tabindex="3">Войти</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="./templates/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="./templates/js/bootstrap.min.js"></script>
</body>
</html>
<?php }} ?>

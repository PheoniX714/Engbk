{$wrapper = '' scope='root'}
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Вход в админ панель FastCMS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    {*<link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico" />*}
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic" rel="stylesheet">
    <!-- STYLESHEETS -->
    <style type="text/css">
		[fuse-cloak],
		.fuse-cloak {
			display: none !important;
		}
    </style>
	<!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="./templates/css/font.css">
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="./templates/css/animate.min.css">
	<!-- Perfect Scrollbar -->
    <link type="text/css" rel="stylesheet" href="./templates/js/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css" />
	<!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="./templates/js/plugins/fuse-html/fuse-html.min.css" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="./templates/css/main.css">
	<link type="text/css" rel="stylesheet" href="./templates/css/additional.css">
    <!-- / STYLESHEETS -->
</head>

<body class="layout layout-vertical">
    <main>
        <div id="wrapper">
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="login" class="p-8">

                        <div class="form-wrapper md-elevation-8 p-8 {if $animate}animated fadeInDown{/if}">

                            <div class="logo">
                                <img src="./templates/img/logo-128.png">
                            </div>

                            <h2 class="title mt-4 mb-8">FastCMS</h2>

                            <form name="loginForm" method="post">
								<input type=hidden name="session_id" value="{$smarty.session.id}">
							
								{if $error}
								<div class="alert alert-danger mb-4" role="alert">
									{if $error=='bad_data'}Неверный логин или пароль
									{elseif $error=='access_blocked'}Судя по всему, Вы не знаете пароль... В целях безопасности доступ к аккаунту заблокирован на <b>30 минут</b>.
									{else}Неизвестная ошибка
									{/if}
                                </div>
								{/if}
								
								<div class="form-group mb-4">
                                    <input type="text" name="a-login" class="form-control" id="loginFormInputLogin" />
                                    <label for="loginFormInputEmail">Логин</label>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="password" name="password" class="form-control invalid" id="loginFormInputPassword"  />
                                    <label for="loginFormInputPassword">Пароль</label>
                                </div>

                                <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

                                    <div class="form-check remember-me mb-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember_me" class="form-check-input" aria-label="Remember Me" />
                                            <span class="checkbox-icon"></span>
                                            <span class="form-check-description">Запомнить меня</span>
                                        </label>
                                    </div>

                                    <a href="{url module=PasswordRestoreAdmin}" class="forgot-password text-secondary mb-4">Забыли пароль?</a>
                                </div>

                                <input type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="Войти" name="login" value="Войти">

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            

        </div>
    </main>
	
	<!-- jQuery -->
    <script type="text/javascript" src="./templates/js/jquery.min.js"></script>
    <!-- Mobile Detect -->
    <script type="text/javascript" src="./templates/js/plugins/mobile-detect/mobile-detect.min.js"></script>
	<!-- Perfect Scrollbar -->
    <script type="text/javascript" src="./templates/js/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="./templates/js/plugins/bootstrap/bootstrap.min.js"></script>
	<!-- Fuse Html -->
    <script type="text/javascript" src="./templates/js/plugins/fuse-html/fuse-html.min.js"></script>
    <!-- Main JS -->
    <script type="text/javascript" src="./templates/js/main.js"></script>
	{literal}
	<script>
		$(".submit-button").on("click", function(){
			$(this).closest("form").submit();
			.on('submit', function (e) {
				var $form = $(this);
			});
		});
	</script>
	{/literal}
</body>

</html>
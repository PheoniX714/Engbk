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
					
					<div id="forgot-password" class="p-8">

                        <div class="form-wrapper md-elevation-8 p-8">

                            <div class="logo">
                                <img src="./templates/img/logo-128.png">
                            </div>

                            <div class="title mt-4 mb-8">Восстановление пароля</div>

                            <form name="forgotPasswordForm" novalidate="">

                                <div class="form-group mb-4">
                                    <input type="email" class="form-control" id="forgotPasswordFormInputEmail" aria-describedby="emailHelp" placeholder=" " required="">
                                    <label for="forgotPasswordFormInputEmail">Введите Email</label>
                                </div>

                                <button type="submit" class="submit-button btn btn-block btn-secondary mt-8 mb-4 mx-auto fuse-ripple-ready" aria-label="ОТПРАВИТЬ КОД">
                                    ОТПРАВИТЬ КОД
                                </button>

                            </form>

                            <div class="login row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                                <a class="link text-secondary" href="./">На страницу входа</a>
                            </div>

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
		});
	</script>
	{/literal}
</body>

</html>
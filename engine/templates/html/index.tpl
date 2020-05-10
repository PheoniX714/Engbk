{$engine_version = "3.1.14246"}
<!DOCTYPE html>
<html lang="ru">

<head>
    <title>{$meta_title}</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
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
	<!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="./templates/js/plugins/fuse-html/fuse-html.min.css" />
	<!-- PNotify -->
    <link type="text/css" rel="stylesheet" href="./templates/js/plugins/pnotify/dist/PNotifyBrightTheme.css">
	<!-- Jquery-ui CSS -->
    <link type="text/css" rel="stylesheet" href="./templates/css/jquery-ui.css" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="./templates/css/main.css">
    <link type="text/css" rel="stylesheet" href="./templates/css/additional.css">
    <!-- / STYLESHEETS -->

    <!-- jQuery -->
    <script type="text/javascript" src="./templates/js/jquery.min.js"></script>
    <script type="text/javascript" src="./templates/js/jquery-ui.min.js"></script>
	
    <script type="text/javascript" src="./templates/js/sortable/sortable.min.js"></script>
    <!-- Mobile Detect -->
    <script type="text/javascript" src="./templates/js/plugins/mobile-detect/mobile-detect.min.js"></script>
	<!-- Popper.js -->
    <script type="text/javascript" src="./templates/js/plugins/popper.js/index.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="./templates/js/plugins/bootstrap/bootstrap.min.js"></script>
	<!-- Data tables -->
    <script type="text/javascript" src="./templates/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./templates/js/plugins/datatables/dataTables.responsive.js"></script>
	<!-- Fuse Html -->
    <script type="text/javascript" src="./templates/js/plugins/fuse-html/fuse-html.min.js"></script>
	<!-- PNotify -->
    <script type="text/javascript" src="./templates/js/plugins/pnotify/dist/iife/PNotify.js"></script>
    <script type="text/javascript" src="./templates/js/plugins/pnotify/dist/iife/PNotifyStyleMaterial.js"></script>
    <script type="text/javascript" src="./templates/js/plugins/pnotify/dist/iife/PNotifyMobile.js"></script>
	<script type="text/javascript" src="./templates/js/plugins/pnotify/dist/iife/PNotifyButtons.js"></script>
	<!-- Main JS -->
    <script type="text/javascript" src="./templates/js/main.js"></script>
    
	
</head>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
    <main>
        <div id="wrapper">
			{include file='left-menu.tpl'}
            <div class="content-wrapper">
				{include file='top-nav.tpl'}
                <div class="content">
					{$content}
                </div>
            </div>
        </div>
    </main>
</body>
{$smarty.capture.js}
</html>
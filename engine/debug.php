<?php
	$filename = '../debug_log.txt';
	$data = file_get_contents($filename);
	$debug = json_decode($data, TRUE);
	
	$memory_get_peak_usage = ceil($debug['memory_get_peak_usage']/1024);
	$exec_time = round($debug['page_generation_time'], 4);
	
	$sql_time = 0;
	foreach($debug['sql_debag'] as $q){
		$sql_time += $q['time'];
		$q_tables[] = $q['table'];
		$q_types[] = $q['type'];
	}
	
	$q_tables = array_count_values($q_tables);
	$q_types = array_count_values($q_types);
	
	$php_time = round($exec_time-$sql_time, 4);
	$exec_time = round($exec_time, 4);
	$sql_time = round($sql_time, 4);
	
	$params = array();
	foreach(explode("&", $debug['module']) as $p){
		$param = array();
		$param = explode("=", $p);
		$params[$param[0]] = $param[1];
	}
	
	$module = $params['module'];
	unset($params['module']);
	
	$sql_count = count($debug['sql_debag']);
	
	$sql_queries = $debug['sql_debag'];
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>Debug</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLESHEETS -->
    <style type="text/css">
		[fuse-cloak],
		.fuse-cloak {
			display: none !important;
		}
	</style>
    <!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="./templates/css/font.css">
    <!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="./templates/js/plugins/fuse-html/fuse-html.min.css" />
	<!-- Jquery-ui CSS -->
    <link type="text/css" rel="stylesheet" href="./templates/css/jquery-ui.css" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="./templates/css/main.css">
    <link type="text/css" rel="stylesheet" href="./templates/css/additional.css">
    <!-- / STYLESHEETS -->

    <!-- jQuery -->
    <script type="text/javascript" src="./templates/js/jquery.min.js"></script>
    <script type="text/javascript" src="./templates/js/jquery-ui.min.js"></script>
	
    <!-- Popper.js -->
    <script type="text/javascript" src="./templates/js/plugins/popper.js/index.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="./templates/js/plugins/bootstrap/bootstrap.min.js"></script>
	<!-- Data tables -->
    <script type="text/javascript" src="./templates/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./templates/js/plugins/datatables/dataTables.responsive.js"></script>
	<!-- Fuse Html -->
    <script type="text/javascript" src="./templates/js/plugins/fuse-html/fuse-html.min.js"></script>
	<!-- Main JS -->
    <script type="text/javascript" src="./templates/js/main.js"></script>
</head>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar layout-below-footer">
    <main>
        <div id="wrapper">
            <div class="content-wrapper">
				<div class="content">

                    <div id="contacts" class="page-layout simple left-sidebar-floating">

                        <div class="page-header bg-primary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

                            <div class="col">

                                <div class="row no-gutters align-items-center flex-nowrap">

                                    <button type="button" class="sidebar-toggle-button btn btn-icon d-inline-block d-lg-none mr-2" data-fuse-bar-toggle="contacts-sidebar">
                                        <i class="icon icon-menu"></i>
                                    </button>

                                    <!-- APP TITLE -->
                                    <div class="logo row no-gutters align-items-center flex-nowrap">
                                        <span class="logo-icon mr-4">
                                            <i class="icon-bug text-red s-6"></i>
                                        </span>
                                        <span class="logo-text h4">Debug</span>
                                    </div>
                                </div>
                                <!-- / APP TITLE -->
                            </div>
                        </div>
                        <!-- / HEADER -->

                        <div class="page-content-wrapper">

                            <!-- CONTENT -->
                            <div class="page-content p-4 p-sm-6">
                                <div class="row">

									<div class="about col-12 col-md-7 col-xl-6">

										<div class="card mb-4">

											<header class="h6 bg-fuse-dark text-auto p-4">
												<div class="title"><b>Лог запросов к БД</b></div>
											</header>

											<div class="content">
												<?php $i=1; foreach($sql_queries as $q){?>
												<div class="p-4 <?php if(($i%2)==0){ ?>bg-grey-100<?php } ?>">
													<b><?=$i?>.</b> <span class="badge badge-warning mr-4"><?=$q['table']?></span> <b><?=$q['query']?></b>
												</div>
												<?php $i++; } ?>
											</div>
										</div>
									</div>

									<div class="about-sidebar col-12 col-md-5 col-xl-3">
										<div class="card mb-4">
											<header class="row no-gutters align-items-center justify-content-between bg-fuse-dark text-auto p-4">
												<div class="title h6"><b>Статистика загрузки</b></div>
											</header>

											<div class="content">
											
												<div class="p-4">
													<h6 class="m-0 d-flex align-items-center"><b>Модуль:</b> <span class="badge badge-secondary mx-2 p-2"><?=$module?></span></h6>
												</div>
												<div class="p-4 bg-grey-100">
													<h6 class="m-0 mb-2 d-flex align-items-center flex-wrap"><b>GET параметры:</b></h6>
													<h6>
														<?php foreach($params as $k=>$p){?><span class="badge badge-secondary mr-2 mb-2 p-2"><?=$k?> = <?=$p?></span><?php } ?>
													</h6>
												</div>
												<div class="p-4 ">
													<h6 class="m-0 d-flex align-items-center"><b>Использовано памяти:</b> <span class="badge badge-secondary mx-2 p-2 p-2"><?=$memory_get_peak_usage?></span> <b>кбайт</b></h6>
												</div>
												<div class="p-4 bg-grey-100">
													<h6 class="m-0 d-flex align-items-center"><b>Время генерации страницы:</b> <span class="badge badge-secondary mx-2 p-2"><?=$exec_time?></span> <b>сек</b></h6>
												</div>
												<div class="p-4 ">
													<h6 class="m-0 d-flex align-items-center"><b>Время выполнения php:</b> <span class="badge badge-secondary mx-2 p-2"><?=$php_time?></span> <b>сек</b></h6>
												</div>
												<div class="p-4 bg-grey-100">
													<h6 class="m-0 d-flex align-items-center"><b>Время выполнения sql запросов:</b> <span class="badge badge-secondary mx-2 p-2"><?=$sql_time?></span> <b>сек</b></h6>
												</div>
												<div class="p-4 ">
													<h6 class="m-0 d-flex align-items-center"><b>Количество запросов sql:</b> <span class="badge badge-secondary mx-2 p-2"><?=$sql_count?></span></h6>
												</div>
											</div>
										</div>
									</div>
									
									<div class="about-sidebar col-12 col-md-5 col-xl-3">
										<div class="card mb-4">
											<header class="row no-gutters align-items-center justify-content-between bg-fuse-dark text-auto p-4">
												<div class="title h6"><b>Обращений к таблицам</b></div>
											</header>

											<div class="content">
												<?php $i=0; foreach($q_tables as $t=>$a){?>
												<div class="py-2 px-4 <?php if(($i%2)==0){ ?>bg-grey-100<?php } ?>">
													<h6 class="m-0 d-flex align-items-center"><b><?=$t?>:</b> <span class="badge badge-secondary mx-2 p-2"><?=$a?></span></h6>
												</div>
												<?php $i++; } ?>
											</div>
										</div>
										
										<div class="card mb-4">
											<header class="row no-gutters align-items-center justify-content-between bg-fuse-dark text-auto p-4">
												<div class="title h6"><b>Обращений по типам</b></div>
											</header>

											<div class="content">
												<?php $i=0; foreach($q_types as $q=>$t){?>
												<div class="py-2 px-4 <?php if(($i%2)==0){ ?>bg-grey-100<?php } ?>">
													<h6 class="m-0 d-flex align-items-center"><b><?=$q?>:</b> <span class="badge badge-secondary mx-2 p-2"><?=$t?></span></h6>
												</div>
												<?php $i++; } ?>
											</div>
										</div>
									</div>

								</div>
                            </div>
                            <!-- / CONTENT -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>


</html>
<?php
	session_start();
	if (!isset($_SESSION["rol"])){
		die(header("Location: ./"));
	}
	if ($_SESSION["rol"] != "admin"){
		die(header("Location: ./"));
	}
	include 'estadisticas.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Roaload - Consola Administración</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/metisMenu/metisMenu.css">
	<link rel="stylesheet" href="assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist.min.css">
	<link rel="stylesheet" href="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
	<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">

	<link rel="stylesheet" href="assets/css/main.css">

	<link rel="stylesheet" href="assets/css/admin.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
				</div>
				<!-- logo -->
				<div class="navbar-brand">
					<a href="admin">Consola de Administración</a>
				</div>
				<!-- end logo -->
				<div class="navbar-right">
					<!-- search form -->
					<form id="navbar-search" class="navbar-form search-form">
						<input value="" class="form-control" placeholder="¡Buscalo!" type="text">
						<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
					</form>
					<!-- end search form -->
					<!-- navbar menu -->
					<div id="navbar-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-alarm"></i>
									<span class="notification"></span>
								</a>
								<ul class="dropdown-menu notifications">
									<li class="header"><strong>Tu tienes X notificaciones</strong></li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-flag-checkered text-muted"></i>
												</div>
												<div class="media-body">
													<p class="text">Notificaacion <strong>TODO: COGER DE BASE DE DATOS</strong> aun no terminado. </p>
													<span class="timestamp">Hace cuanto lo hice</span>
												</div>
											</div>
										</a>
									</li>
									<!-- TODO: Añadir notificaciones de la base de datos -->
									<li class="footer"><a href="#" class="more">Ver todas</a></li>
								</ul>
							</li>
							<!-- mensajes -->
							<li class="dropdown">
								<a href="" onclick="manualAdmin()" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-question-circle"></i>
								</a>
							</li>
							<li class="dropdown">
								<a href="" onclick="location = 'principal'" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="glyphicon glyphicon-remove-circle"></i>
								</a>
							</li>
						</ul>
					</div>
					<!-- end navbar menu -->
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="left-sidebar" class="sidebar">
			<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
				<span class="sr-only">Toggle Fullwidth</span>
				<i class="fa fa-angle-left"></i>
			</button>
			<!-- PERFIL -->
			<div class="sidebar-scroll">
				<div class="user-account">
					<img src="assets/img/perfil.png" class="img-responsive img-circle user-photo" alt="User Profile Picture" width="140" height="140">
					<div class="dropdown">
						<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Buenas, <strong><?php echo $_SESSION['rol']; ?></strong> <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-right account">
							<li><a href="#">Perfil</a></li>
							<li><a href="#">Mensajes</a></li>
							<li><a href="#">Cambiar contraseña</a></li>
							<li class="divider"></li>
							<li><a href="#">Salir</a></li>
						</ul>
					</div>
				</div>
				<!-- /.PERFIL -->
				<!-- MENÚ NAVBAR -->
				<nav id="left-sidebar-nav" class="sidebar-nav">
					<ul id="main-menu" class="metismenu">
						<li class=""><a href="admin"><i class="glyphicon glyphicon-home"></i> <span>Administración</span></a></li>
						<li class="">
							<a class="has-arrow mousePointer" aria-expanded="false"><i class="glyphicon glyphicon-apple"></i> <span>Productos</span></a>
							<ul aria-expanded="true">
								<li class=""><a onclick="mostrarVista('version')" class="mousePointer">Versiones</a></li>
								<li class=""><a onclick="mostrarVista('juego')" class="mousePointer">Juegos</a></li>
								<li class=""><a onclick="mostrarVista('plataforma')" class="mousePointer">Plataformas</a></li>
								<li class=""><a onclick="mostrarVista('edicion')" class="mousePointer">Ediciones</a></li>
							</ul>
						</li>
						<li class="">
							<a href="#subPages" class="has-arrow" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <span>Clientes</span></a>
							<ul aria-expanded="true">
								<li class=""><a onclick="usuario()" class="mousePointer">Usuarios</a></li>
								<li class=""><a onclick="pedidos()" class="mousePointer">Pedidos</a></li>
								<li class=""><a onclick="mensajes()" class="mousePointer">Mensajes</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- /.MENÚ NAVBAR -->
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN CONTENT -->
		<div id="main-content">
			<div id="cuerpo" class="container-fluid">
				<h1 class="sr-only">Dashboard</h1>
				<!-- WEBSITE ANALYTICS -->
				<div class="dashboard-section">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-pie-chart"></i> Análisis sobre la web</h2>
						<a href="#" class="right">View Full Analytics Reports</a>
					</div>
					<div class="panel-content">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart1" class="inlinesparkline">0,0,0,0,0,0,0</div><!-- TODO: BASE DEDATOS -->
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i></p>
									</div>
									<div class="number"><span><?=$nganancias?>€</span> <span>GANANCIAS!</span></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart2" class="inlinesparkline">0,0</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i></p>
									</div>
									<div class="number"><span><?=$nventas?></span> <span>VENTAS</span></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart3" class="inlinesparkline">0,0</div>
										<p class="text-muted"><i class="fa fa-caret-up text-success"></i></p>
									</div>
									<div class="number"><span>0</span> <span>VISITAS</span></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="number-chart">
									<div class="mini-stat">
										<div id="number-chart4" class="inlinesparkline">0,0</div>
										<p class="text-muted"><i class="fa fa-caret-down text-danger"></i></p>
									</div>
									<div class="number"><span>0</span> <span>ARTICULOS DE DESEO</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END WEBSITE ANALYTICS -->
				<!-- SALES SUMMARY -->
					<div class="row">
						<div class="col-md-8">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-square"></i> Últimas compras</h3>
								<div class="table-responsive">
									<div class="tabla"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END SALES SUMMARY -->
				<!-- SOCIAL -->
				<div class="dashboard-section no-margin">
					<div class="section-heading clearfix">
						<h2 class="section-title"><i class="fa fa-user-circle"></i> Social <span class="section-subtitle">(7 días)</span></h2>
					</div>
					<div class="panel-content">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-thumbs-o-up"></i> +0 <span>Compartidos</span></p>
							</div>
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-reply-all"></i> +0 <span>VISITAS</span></p>
							</div>
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-envelope-o"></i> +0 <span>SUBSCRIPCIONES</span></p>
							</div>
							<div class="col-md-3 col-sm-6">
								<p class="metric-inline"><i class="fa fa-user-circle-o"></i> +<?=$nusuarios?> <span>USUARIOS</span></p>
							</div>
						</div>
					</div>
				</div>
				<!-- END SOCIAL -->
			</div>
		</div>
		<!-- END MAIN CONTENT -->
		<div class="clearfix"></div>
		<footer>
			<p class="copyright">&copy; 2018 <a href="https://davidmartinperez.github.io/" target="_blank">David Martín Pérez</a>. ¿Contactarme? <a href="mailto:davidmartinperez1@gmail.com">Mandame un correo.</a></p>
		</footer>
	</div>
	<!-- Modales De edición-->
	<!--div class="modificarVersionModal" title="¡Modificar!" style="display:none">
		<?php //include "app/formularioModificarVersion.php" ?>
	</div>
	<div class="añadirVersionModal" title="¡Añadir Version!" style="display:none">
		<?php //include "formularioVersion.php" ?>
	</div-->
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js"></script>
	<script src="assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>
	<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/vendor/parsleyjs/js/parsley.min.js"></script>
	<script src="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js"></script>
	<script src="assets/vendor/chartist-plugin-axistitle/chartist-plugin-axistitle.min.js"></script>
	<script src="assets/vendor/chartist-plugin-legend-latest/chartist-plugin-legend.js"></script>
	<script src="assets/vendor/toastr/toastr.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>

<?php
	session_start();
	if ($_SESSION["rol"] != "admin"){
		die(header("Location: ../"));
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- Font icons Material -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- CSS materialize -->
		<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
		<!-- Mi css personalizado -->
		<!-- Deja que el navegador sepa que el sitio web está optimizado para dispositivos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


		<title>World of Wanted Admin</title>

		<!-- js de Jquery y Materialize -->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="../jquery-ui-1.12.1.custom/jquery-ui.js"></script>
		<script src="../js/jquery.validate.js"></script>
		<!-- propio js -->
		<script src="../js/main.js"></script>
	</head>
	<body>
		<!-- Navbar goes here -->

		<!-- Page Layout here -->
		<div class="row">

			<div class="col s2 cabecera">
				<div class="center-align logo-admin">
					<img width="100%" src="../img/favicon.png"/>
				</div>
				<h5>Administrar Productos</h5>
				<a class="btn btn-menu" onclick="mostrarVersiones()">Versiones</a>
				<a class="btn btn-menu" onclick="mostrarJuegos()">Juegos</a>
				<a class="btn btn-menu" onclick="mostrarPlataformas()">Plataformas</a>
				<a class="btn btn-menu" onclick="mostrarEdiciones()">Ediciones</a>
    			<h5>Administrar Clientes</h5>
				<a class="btn btn-menu">Usuarios</a>
				<a class="btn btn-menu">Pedidos</a>
				<a class="btn btn-menu">Comentarios</a>
				<a class="btn btn-menu">Consultas</a>

			</div>

			<div class="col s9">
				<div class="container">
					<div class="cuerpo"></div>
				</div>
			</div>
		</div>
		<!-- dialogos -->
		<!-- Dialogo para eliminar version -->
		<div class="eliminarVersionModal" title="¿Eliminarlo?" style="display: none">
		  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>¿Quieres eliminarlo?</p><br>
		  <p>Nombre: <span class="NombreVersionEliminar"></span></p>
		  <p>Edicion: <span class="edicionVersionEliminar"></span></p>
		  <p>Plataforma: <span class="plataformaVersionEliminar"></span></p>
		</div>
		<div class="modificarVersionModal" title="¡Modificar!" style="display:none">
			<?php include "formularioModificarVersion.php" ?>
		</div>
	</body>
</html>

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
		<div class="container">
			<h1>Administración de Versiones de juegos</h1>
			<br>
			<h5>Filtros</h5>
			<div class="row">
				<select class="selectOrdenar browser-default col s3">
					<option value="nombreJuego">Juego</option>
					<option value="nombreEdicion">Edicion</option>
					<option value="nombrePlataforma">Plataforma</option>
					<option value="precio">Precio</option>
					<option value="stock">Stock</option>
					<option value="fechaSalida">Fecha Salida</option>
					<option value="nombreDistribuidora">Distribuidora</option>
				</select>
				<select class="selectAlternal browser-default col s3">
					<option value="ASC">Ascendente</option>
					<option value="DESC">Descendente</option>
				</select>
				<button class="btn" onclick="ordenar()">Filtrar</button>
			</div>
			<div class="cuerpo"></div>
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
			<?php include "formularioModificar.php" ?>
		</div>
	</body>
</html>

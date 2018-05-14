<?php
	session_start();
	if (!isset($_SESSION["rol"])){
		die(header("Location: inicioSesion.php"));
	}
	if ($_SESSION["rol"] != "admin"){
		die(header("Location: ../"));
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<base href = "aaa" target="_top" />
		<!-- Font icons Material -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- CSS materialize -->
		<link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
		<!-- Mi css personalizado -->
		<!-- Deja que el navegador sepa que el sitio web está optimizado para dispositivos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>World of Wanted Admin</title>
		<!-- js de Jquery y Materialize -->
	    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	    <link rel="stylesheet" href="css/style.css">
	    <script src="js/jquery.validate.js"></script>
	    <!-- propio js -->
		<script src="js/materialize2.min.js"></script>
		<script src="js/main.js"></script>
		<style>
			#container {
				padding-left: 240px;
			}

			#content {
				padding: 20px;
			}

			@media only screen and (max-width : 992px) {
				#container {
					padding-left: 0px;
				}
			}
		</style>
   	 </head>

	<body>

		<div id="container">
			<div id="menu">
				<ul id="slide-out" class="side-nav fixed" style="width: 240px !important">
					<li class="user-details cyan darken-2">
						<div class="row" style="background-image: url('../img/cabaña.png'); background-position: -150px -150px; background-repeat: no-repeat">
							<div class="col col s4 m4 l4">
								<img src="../img/perfil.png" alt="" class="circle responsive-img valign" style="margin-top: 20px">
							</div>
							<div class="col col s8 m8 l8">
								<a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav">
									<?=$_SESSION["nombre"]?>
								</a>
								<p class="">Rol: <?=$_SESSION["rol"]?></p>
							</div>
						</div>
					</li>
					<li class="no-padding">
						<ul class="collapsible" data-collapsible="accordion">
							<li class="bold">
								<a class="collapsible-header">
									<i class="material-icons">gamepad</i>
									<span class="nav-text">Productos</span>
								</a>
								<div class="collapsible-body">
									<ul>
										<li onclick="mostrarVersiones()">
											<a class="btn-click">
												<i class="material-icons">keyboard_arrow_right</i>
												<span>Versiones</span>
											</a>
										</li>
										<li>
											<a class="btn-click" onclick="mostrarJuegos()">
												<i class="material-icons">keyboard_arrow_right</i>
												<span class="nav-text">Juegos</span>
											</a>
										</li>
										<li>
											<a  class="btn-click" onclick="mostrarPlataformas()">
												<i class="material-icons">keyboard_arrow_right</i>
												<span class="nav-text">Plataformas</span>
											</a>
										</li>
										<li>
											<a  class="btn-click" onclick="mostrarEdiciones()">
												<i class="material-icons">keyboard_arrow_right</i>
												<span class="nav-text">Ediciones</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="bold">
								<a class="collapsible-header waves-effect waves-cyan">
									<i class="material-icons">contacts</i>
									<span class="nav-text">Clientes</span>
								</a>
								<div class="collapsible-body">
									<ul>
										<li>
											<a onclick="">
												<i class="material-icons">keyboard_arrow_right</i>
												<span>Usuarios</span>
											</a>
										</li>
										<li>
											<a onclick="">
												<i class="material-icons">keyboard_arrow_right</i>
												<span class="nav-text">Pedidos</span>
											</a>
										</li>
										<li>
											<a onclick="">
												<i class="material-icons">keyboard_arrow_right</i>
												<span class="nav-text">Comentarios</span>
											</a>
										</li>
										<li>
											<a onclick="">
												<i class="material-icons">keyboard_arrow_right</i>
												<span class="nav-text">Consultas</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="bold">
								<a class="collapsible-header waves-effect waves-cyan">
									<i class="material-icons">today</i>
									<span class="nav-text">Calendario</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>

			<div id="content" class="cuerpo">
				<a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
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
		<div class="añadirVersionModal" title="¡Añadir Version!" style="display:none">
		    <?php include "formularioVersion.php" ?>
		</div>
		<div class="añadirJuegoModal" title="¡Añadir Juego!" style="display:none">
		    <?php include "formularioJuego.php" ?>
		</div>
		<div class="añadirEdicionModal" title="¡Añadir Edicion!" style="display:none">
		    <?php include "formularioEdicion.php" ?>
		</div>
		<div class="añadirPlataformaModal" title="¡Añadir Plataforma!" style="display:none">
		    <?php include "formularioPlataforma.php" ?>
		</div>
	</body>
</html>

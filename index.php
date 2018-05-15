<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="assets/img/favicon.png">
		<!-- Mi css personalizado -->
		<link rel="stylesheet" type="text/css" href="assets/css/index.css">
		<!-- Font icons Material -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- CSS materialize -->
		<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
		<!-- Deja que el navegador sepa que el sitio web está optimizado para dispositivos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<title>Roaload</title>

		<!-- js de Jquery y Materialize -->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="assets/js/materialize.min.js"></script>
		<!-- propio js -->
		<script src="assets/js/script.js"></script>
		<style>
			body{
				background: white;
				background-repeat: no-repeat;
				background-size: cover;
			}
			.n3DS{
			    background: yellow;
			    color: black;
			}
			.mh{
				height: 100%;
			}
			.panel-categorias{
				height: 100px;
				width: 100%;
				margin-left: -11px;
				line-height: 100px;
				border-radius: 0 10px 10px 0;
				-moz-border-radius: 0 10px 10px 0;
				-webkit-border-radius: 0 10px 10px 0;
			}
			.especial-semana{
				background: #f48fb1 ;
			}
			.NSW{
				background: #d20003;
				color: white;
			}
			.PS4{
				background-color: #0066c2;
				color: white;
			}
			.XONE{
				background: #0f7c10;
				color: white;
			}
			.PC{
				background: #333333;
				color: white;
			}
			.reserva{
				background: #ad1457;
			}
			.retro{
				background: #fec536;
			}
			.accesorios{
				background: #006064;
			}
			.tamaño-img{
				margin-right: auto;
				margin-left: auto;
				padding-top: 6px;
				height: 280px;
			}
			.carta-descrip{
				height: 100px;
				overflow: hidden;
			}
			.carta-margin{
				margin-bottom: 30px;
			}
		</style>
	</head>
	<body>
		<!-- sideNav sobre el perfil del usuario -->
		<ul id="slide-out" class="side-nav" style="background-color: #ee6e73">
			<div>
				<?php include "app/acceder/perfil.php" ?>
			</div>
		</ul>
		<!-- ./sideNav -->
		<!-- Dropdown Structure -->
		<ul id="dropdown1" class="dropdown-content">
			<li><a href="#!">3DS</a></li>
			<li class="divider"></li>
			<li><a href="#!">Accesorios</a></li>
			<li><a href="#!">Reservas</a></li>
		</ul>
		<!-- navbar -->
		<nav>
			<div class="nav-wrapper">
				<img src="assets/img/iconoWeb.png" width="80" height="80" />
				<a href="#!" class="brand-logo">Roaload</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a>NSW</a></li>
			        <li><a>PS4</a></li>
					<li><a>XO</a></li>
					<li><a>PC</a></li>
					<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Otros<i class="material-icons right">arrow_drop_down</i></a></li>
					<li><a href="#" data-activates="slide-out" class="perfil-navbar"><i class="material-icons">person_pin</i></a></li>
				</ul>
			</div>
		</nav>
		<!-- ./navbar -->
		<!-- Page Layout here -->
		<div class="principalCuerpo">
		</div>
		<!-- contenido de la web -->
		<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Roaload</h5>
                <p class="grey-text text-lighten-4">Unete al grupo de Telegram para recibir notificaciones.</p>
				<p>Link del chat: <a href="https://t.me/joinchat/AAAAAEVY1AOMUGzFyMhsuw" target="_blank">Aquí</a></p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Tecnologias utilizadas</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Materializecss</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">PHP + Mysql</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Jquery</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Jquery ui</a></li>
				  <li><a class="grey-text text-lighten-3" href="#!">Bootstrap</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 David Martín Pérez
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
	</body>
</html>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="assets/img/favicon.png">
		<!-- Mi css personalizado -->
		<link rel="stylesheet" type="text/css" href="assets/css/index.css">
		<!-- Font icons Material -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
		<!-- CSS materialize -->
		<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
		<!-- CSS del login-->
		<link rel="stylesheet" href="assets/css/login.css">
		<!-- Deja que el navegador sepa que el sitio web está optimizado para dispositivos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Roaload</title>

		<!-- js de Jquery y Materialize -->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="assets/js/materialize.min.js"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script>
		<!-- propio js -->
		<script src="assets/js/script.js"></script>
		<style>
			body{
				background-size: cover;
				background :url('assets/img/orig_451968.jpg') -49% -7% fixed;
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
		<ul id="slide-out" class="side-nav teal darken-1">
			<div class="navPerfil">
			</div>
		</ul>
		<!-- ./sideNav -->
		<!-- Dropdown Structure -->
		<ul id="dropdown1" class="dropdown-content">
			<!-- TODO: Crear vistas para estas categorias. -->
			<li><a onclick="vistaPtl('n3ds')">3DS</a></li>
			<li class="divider"></li>
			<li><a href="#!">Accesorios</a></li>
			<li><a href="#!">Reservas</a></li>
		</ul>
		<!-- navbar -->
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper teal darken-1">
					<!-- TODO: Crear un icono para Perfil en modo movil -->
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<a onclick="home();" class="brand-logo">Roaload</a>
					<a></a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li>
							<div class="center row">
								<div class="col s12">
									<div class="row" id="topbarsearch">
										<div class="input-field col s6 s12">
											<i class="material-icons prefix">search</i>
											<input type="text" placeholder="search" id="autocomplete-input" class="autocomplete busInicio">
										</div>
									</div>
								</div>
							</div>
						</li>
						<li><a onclick="vistaPtl('todo',16)">Todos</a></li>
						<li><a onclick="vistaPtl('nsw',8)">NSW</a></li>
				        <li><a onclick="vistaPtl('ps4',8)">PS4</a></li>
						<li><a onclick="vistaPtl('xone',8)">XO</a></li>
						<li><a onclick="vistaPtl('pc',8)">PC</a></li>
						<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Otros<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a href="#" data-activates="slide-out" class="perfil-navbar"><i class="material-icons">person_pin</i></a></li>
					</ul>

				</div>
			</nav>
		</div>
		<ul class="side-nav" id="mobile-demo">
			<li><a onclick="todos()">Todos</a></li>
			<li><a onclick="vistaPtl('nsw')">NSW</a></li>
			<li><a onclick="vistaPtl('ps4')">PS4</a></li>
			<li><a onclick="vistaPtl('xone')">XO</a></li>
			<li><a onclick="vistaPtl('pc')">PC</a></li>
			<li><a onclick="vistaPtl('n3ds')">3DS</a></li>
			<li class="divider"></li>
			<li><a href="#!">Accesorios</a></li>
			<li><a href="#!">Reservas</a></li>
		</ul>
		<!-- ./navbar -->
		<!-- BREADCRUM -->
		<div class="row">
			<div class="container" style="padding-top: 20px">
				<nav>
					<div class="nav-wrapper teal lighten-1">
						<div class="col s12 migasDePan">
							<a onclick="home()" class="letra-mediana">Inicio</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<!-- inicio del cuerpo que cambiará -->
	  	<div class="container">
			<div class="contenido" style="background-color: #f7f7f7">
			</div>
		</div>
		<!-- contenido de la web -->
		<footer class="page-footer teal darken-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Roaload</h5>
                <p class="grey-text text-lighten-4">Únete al grupo de Telegram para recibir notificaciones.</p>
				<p>Link del chat: <a href="https://t.me/joinchat/AAAAAEVY1AOMUGzFyMhsuw" target="_blank">Aquí</a></p>
				<p>Nanual de uso de la aplicación: <a onclick="manualNoUser()">Aquí</a></p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Tecnologias utilizadas</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Materializecss</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">PHP + Mysql</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Jquery</a></li>
				  <li><a class="grey-text text-lighten-3" href="#!">Bootstrap</a></li>
				  <li><a class="grey-text text-lighten-3" href="https://es.wikipedia.org/wiki/Single-page_application" target="_blank">SPA</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 David Martín Pérez
            <a class="grey-text text-lighten-4 right" href="https://github.com/DavidMartinPerez/Roaload-Shop" target="_blank">Github Proyecto</a>
            </div>
          </div>
        </footer>
	</body>
</html>

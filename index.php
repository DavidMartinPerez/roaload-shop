<?php
	$bd = @new mysqli("localhost", "root", "");
	$bd->select_db("tienda");

	$sql = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion, dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
	 			FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
				where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora";
	$reg = $bd->query($sql);
	$bd->close();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="img/favicon.png">
		<!-- Mi css personalizado -->
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<!-- Font icons Material -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- CSS materialize -->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<!-- Deja que el navegador sepa que el sitio web está optimizado para dispositivos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<title>World of Wanted</title>

		<!-- js de Jquery y Materialize -->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<!-- propio js -->
		<script src="js/script.js"></script>
		<style>
			body{
				background: lightblue;
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
			.carta-titulo{
				margin-bottom: -10px;
				height: 80px;
			}
			.carta-descrip{
				height: 80px;
				overflow: hidden;
			}
			.carta-margin{
				margin-bottom: 30px;
			}
		</style>
		<script>
			$(document).ready(function(){
				$.ajax({url: "login.php", success: function(result){
					$(".login-form").html(result);
				}});
			});
		</script>
	</head>
	<body>
		<!-- sideNav sobre el perfil del usuario -->
		<ul id="slide-out" class="side-nav">
			<?php if(2 > 1){?>
			<div class="login-form container"></div>
		<?php } else { ?>
			<div class="perfil container"> b </div>
		<?php } ?>
		</ul>
		<!-- ./sideNav -->
		<!-- navbar -->
		<nav>
			<div class="nav-wrapper">
				<a href="#!" class="brand-logo">World of Wanted</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="#" data-activates="slide-out" class="perfil-navbar"><i class="material-icons">person_pin</i></a></li>
				</ul>
			</div>
		</nav>
		<!-- ./navbar -->
		<!-- Page Layout here -->
		<div class="row">
			<!-- contenido lateral -->
			<div class="col s12 m2 l2">
				<div class="btn especial-semana panel-categorias">
					Categoria de la semana
				</div>
				<div class="NSW btn panel-categorias">
					Nintendo Switch
				</div>
				<div class="btn panel-categorias PS4">
					PS4
				</div>
				<div class="XONE btn panel-categorias">
					Xbox ONE
				</div>
				<div class="PC btn panel-categorias">
					pc
				</div>
				<div class="btn panel-categorias n3DS">
					3DS
				</div>
				<div class="btn panel-categorias">
					accesorios
				</div>
				<div class="btn reserva panel-categorias">
					reservas
				</div>
			</div>
			<!-- ./contenido lateral -->
			<!-- Contenido de la web -->
			<div class="col s12 m10 l10 cuerpo">
				<div class="row">
					<?php while($row = mysqli_fetch_assoc($reg)){
						if($row["img"] == NULL){
							$img = "00.png";
						}else{
							$img = $row["img"];
						}
						if($row["nombreEdicion"] == "Sin confirmar"){
							$edicion = "<br>Edición no confirmada";
						}else{
							$edicion = $row["nombreEdicion"];
						}
						?>
						<div class="col m4 l2">
							<div class="card carta-margin">
								<div class="center-align <?=$row['nombrePlataforma']?>"><?=$row["nombrePlataforma"]?></div>
								<div class=" card-image">
									<a href="#"><img class="tamaño-img" src="img/caratula/<?=$img ?>"></a>
								</div>
								<p class="card-title center-align carta-titulo"><?=$row["nombreJuego"]." ".$edicion?></p>
								<div class="card-content carta-descrip">
									<p>Sustituir por descripotcion</p>
								</div>
								<div class="card-action center-align">
									<span class="pink-text"><?=$row["precio"]?> €</span>
									<a class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">shopping_cart</i></a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<!-- ./Contenido de la web -->
		</div>
		<!-- ./row de la esctrutura de la web -->
		<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
	</body>
	<script>
		$(function() {
			$('.perfil-navbar').sideNav({
				menuWidth: 300, // Default is 300
				edge: 'right', // Choose the horizontal origin
				closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
				draggable: true, // Choose whether you can drag to open on touch screens,
				onOpen: function(el) { }, // A function to be called when sideNav is opened
				onClose: function(el) {  }, // A function to be called when sideNav is closed
			});
		});
	</script>
</html>

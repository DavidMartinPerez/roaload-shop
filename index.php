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
		<div class="principalCuerpo">
		</div>
		<!-- contenido de la web -->
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
</html>

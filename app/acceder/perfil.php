<?php
	session_start();
	$ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
    require_once("{$base_dir}funciones{$ds}acceso.php");

    $objS = new Acceso();
    if(!$objS->sessionActiva()){
?>
	<div class="section"></div>
	<div class="container">
		<p>Inicia sesion</p>
		<p>para disfrutar del contenido ^^</p>
		<a href="app/acceder/inicioSesion.php" class="btn">Iniciar</a>
	</div>
<!-- ./no logeado -->
<?php } else{ ?>
	<li>
		<div class="user-view">
			<div align="center">
				<img class="circle" src="img/iconoWeb.png"></a>
				<div><?=unserialize($_SESSION['datos'])[0]?> <?=unserialize($_SESSION['datos'])[1]?></div>
				<div>@<?=$_SESSION["usr"] ?></div>
			</div>
		</div>
	</li>
	<li><div class="divider"></div></li>

	<li><a><i class="material-icons">build</i>Editar perfil</a></li>
	<li><a><i class="material-icons">mail</i>Mensajes</a></li>
	<?php
		if($_SESSION["rol"] == "admin"){?>
			<li><a href="script/admin.php" ><i class="material-icons">brightness_low</i>Administrar Web</a></li>
		<?php } else  { ?>
			<li><a><i class="material-icons">loyalty</i>Pedidos pendientes</a></li>
			<li><a><i class="material-icons">history</i>Historial de pedidos</a></li>
		<?php }
	?>
	<li><div class="divider"></div></li>
		<div class="carritoP">
			<?php include 'app/vistas/carroPerfil.php' ?>
		</div>
	<li><div class="divider"></div></li>
	<li><a class="btn" href="app/acceder/inicioSesion.php?exit">Cerrar Sesión</a></li>
<?php } ?>

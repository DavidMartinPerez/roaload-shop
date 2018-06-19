<?php
	session_start();
	$ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
    require_once("{$base_dir}dao{$ds}acceso.php");

	$objS = new Acceso();
    if(!$objS->sessionActiva()){
?>
	<div class="section"></div>
	<div class="container">
		<p>Inicia sesion</p>
		<p>para disfrutar del contenido ^^</p>
		<a onclick="iniciarSesion()" class="btn">Iniciar</a>
		<img src="assets/img/11.gif"  style="margin-top: 200px; width: 200px; height:500px"/>
	</div>
<!-- ./no logeado -->
<?php } else{ ?>
	<li>
		<div class="user-view">
			<div align="center">
				<img class="circle" src="assets/img/iconoWeb.png"></a>
				<div class="letra-semimediana"><?=unserialize($_SESSION['datos'])[0]?> <?=unserialize($_SESSION['datos'])[1]?></div>
				<div class="letra-negrita">@<?=$_SESSION["usr"] ?></div>
			</div>
		</div>
	</li>
	<li><div class="divider"></div></li>


	<?php
		if($_SESSION["rol"] == "admin"){?>
			<li><a class="letra-negrita"></a></li>
			<li><a class="letra-negrita" href="admin" ><i class="material-icons">brightness_low</i>Administrar Web</a></li>
		<?php } else  { ?>
			<li><a class="letra-negrita" onclick="pedidosPendiente()"><i class="material-icons">loyalty</i>Pedidos pendientes</a></li>
			<li><a class="letra-negrita" onclick="todosPedidos()"><i class="material-icons">history</i>Historial de pedidos</a></li>
			<li><a class="letra-negrita" onclick="ayudar()"><i class="material-icons">message</i>Soporte técnico</a></li>
		<?php }
	?>
	<li><div class="divider"></div></li>
		<div class="carritoP">
		</div>
	<li><div class="divider"></div></li>
	<li><a class="btn" onclick="cargarCesta()">Ir a la cesta</a></li>
	<li><a class="btn" onclick="cerrarSesion()">Cerrar Sesión</a></li>
<?php } ?>

<?php
	session_start();
	if (!isset($_SESSION["usr"])) {
?>
	<p>Inicia sesión</p>
	<a href="script/inicioSesion.php" class="btn">Iniciar</a>
<!-- ./no logeado -->
<?php } else{ ?>
	<li>
		<div class="user-view">
			<div align="center">
				<img class="circle" src="img/perfil.png"></a>
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
			<li><a><i class="material-icons">brightness_low</i>Administrar Web</a></li>
		<?php } else  { ?>
			<li><a><i class="material-icons">loyalty</i>Pedidos pendientes</a></li>
			<li><a><i class="material-icons">history</i>Historial de pedidos</a></li>
		<?php }
	?>
	<li><div class="divider"></div></li>

	<li><a class="subheader">Cesta</a></li>
	<li>REsumen de tu cesta...</li>

	<li><div class="divider"></div></li>
	<li><a class="btn">Cerrar Sesión</a></li>
<?php
	echo $_SESSION["rol"]."<br> ";
} ?>

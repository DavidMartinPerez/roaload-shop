<?php
	session_start();
	if (!isset($_SESSION["usr"])) {
?>
	<div class="section"></div>
	<div class="container">
		<p>Inicia sesion</p>
		<p>para disfrutar del contenido ^^</p>
		<a href="script/inicioSesion.php" class="btn">Iniciar</a>
	</div>
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
			<li><a href="script/admin.php" ><i class="material-icons">brightness_low</i>Administrar Web</a></li>
		<?php } else  { ?>
			<li><a><i class="material-icons">loyalty</i>Pedidos pendientes</a></li>
			<li><a><i class="material-icons">history</i>Historial de pedidos</a></li>
		<?php }
	?>
	<li><div class="divider"></div></li>

	<li><a class="subheader">Cesta</a></li>
	<?php
	include "script/conexion.php";
	$usuario = unserialize($_SESSION['datos'])[2];
	//select para sacar la id del pedido que tengas pediente que es el que no esta realizado aun
	$sqlPedidoPendiente = "SELECT p.idPedido, u.idUsuario FROM pedido p, usuario u where p.idEstado = 1 AND p.idUsuario = u.idUsuario and u.idUsuario = $usuario";
	$regPedido = $bd->query($sqlPedidoPendiente);
	//comprobamos si tiene algun pedido pendiente si lo tiene lo mostrammos y si no te dice que no tienes productos
	if($regPedido->num_rows) {
		$rowP = mysqli_fetch_assoc($regPedido);
		$idPedido = $rowP["idPedido"];
		//select para sacar los productos que tienes en esa supuesta cesta
		$sqlProductos = "SELECT * FROM `relacionpedido` WHERE idPedido = $idPedido";
		$regProductos = $bd->query($sqlProductos);

		while($rowPedidos = mysqli_fetch_assoc($regProductos)){
			$idProducto = $rowPedidos["idProducto"];
			//Sacar el nombre del producto por que no me sale el join para sacarlo directo...
			$sqlNombre = "SELECT j.nombreJuego, vj.precio FROM versionjuego vj, videojuego j WHERE vj.idVersion = $idProducto AND j.idJuego = vj.idJuego";
			$regNombre = $bd->query($sqlNombre);
			$rowN = mysqli_fetch_assoc($regNombre);
			?>
			<li><a><?=$rowN["nombreJuego"]?> - <?=$rowN["precio"]?>€</a></li>
			<?php }
		} else {
			if($_SESSION["rol"] == "admin"){
				echo "<li><a>No cobras lo suficiente >w<</a></li>";
			} else {
				echo "<li><a>no tiene ningun producto</a><li>";
			}
		}
	$bd->close();

	?>

	<li><div class="divider"></div></li>
	<li><a class="btn" href="script/inicioSesion.php?exit">Cerrar Sesión</a></li>
<?php } ?>

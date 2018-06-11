<?php
	session_start();
	$ds = DIRECTORY_SEPARATOR;
	$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
	require_once("{$base_dir}dao{$ds}cesta.php");
	//Añadimos el array de producto que tenemos serializado en la cookie Carro a una variable
	//Le pasaremos a la funcion para que reorecoja todos los datos de cada producto en la cesta
	if(isset($_SESSION["carro"])){
		$arrayCarrito = unserialize($_SESSION["carro"]);
		// Recuperamos todos los datos de la BBDD
		$cesta = new Cesta;
		$arrayObjectoDatos = $cesta->obtenerTodosProductos($arrayCarrito);
		//Obtenemos todos los datos necesarios y los expulsamos
		$totalPrecio = 0;
		$ArrayLength = count($arrayObjectoDatos);
		$i = 0;
		$arrayObjectoDatos = $cesta->obtenerTodosProductos($arrayCarrito);
		//Obtenemos todos los datos necesarios y los expulsamos
		$totalPrecio = 0;
		$ArrayLength = count($arrayObjectoDatos);
		$i= 0;

		if(!isset($_GET["pago"])){
			?>
			<!-- Vista de la Cesta -->
			<br>
			<div class="row">
				<div class="col offset-m10">
					<a class="btn" onclick="pagarCesta()">Pagar!</a>
				</div>
			</div>
		<?php

		?>

			<h1>Tu cesta: </h1>

		<?php
			while($i < $ArrayLength){ //TODO: Comprobar que esto funciona correctamente
				$idP = $arrayObjectoDatos[$i]->idProducto;
				$nombre = $arrayObjectoDatos[$i]->nombreJuego;
				$edicion = $arrayObjectoDatos[$i]->nombreEdicion;
				$plataforma = $arrayObjectoDatos[$i]->nombrePlataforma;
				$distribuidora = $arrayObjectoDatos[$i]->nombreDistribuidora;
				$cantidad = $arrayObjectoDatos[$i]->cantidad;
				$precio = $arrayObjectoDatos[$i]->precio;
				$precioTotalArticulos = $precio*$cantidad;
				?>
				<div>
					<div class="row">
						<div class="col s12 m10 offset-m1">
							<div class="card teal lighten-1">
								<div class="card-content white-text">
								<h5><?=$nombre ?> <?=$plataforma?> </h5>
								<span align="right"><?=$cantidad?> x <?=$precio?> = <?=$precioTotalArticulos?></span><br>
								<?=$edicion?> <?=$distribuidora?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $i++;
				$totalPrecio = $totalPrecio+$precioTotalArticulos;
			} ?>
			<div class="color:red">Este es el total de todo: <?=$totalPrecio?></div>
			<div class="row">
				<div class="col offset-m10">
					<a class="btn" onclick="pagarCesta()" style="margin-bottom: 14px;">Pagar!</a>
				</div>
			</div>
		<?php } else { ?>
			<!-- Vista en resumen vista pago -->
			<?php while($i < $ArrayLength){ //TODO: Comprobar que esto funciona correctamente
				$nombre = $arrayObjectoDatos[$i]->nombreJuego;
				$edicion = $arrayObjectoDatos[$i]->nombreEdicion;
				$plataforma = $arrayObjectoDatos[$i]->nombrePlataforma;
				$cantidad = $arrayObjectoDatos[$i]->cantidad;
				$precio = $arrayObjectoDatos[$i]->precio;
				$precioTotalArticulos = $precio*$cantidad;
				?>
				<div>
					<p><?=$nombre ?> <?=$edicion?> <?=$plataforma?> </p>
					<p><?=$cantidad?> x <?=$precio?> = <?=$precioTotalArticulos?></p>
				</div>
				<hr>


				<?php $i++;
				$totalPrecio = $totalPrecio+$precioTotalArticulos;
			} ?>
			<div class="color:red">Este es el total de todo: <?=$totalPrecio?></div>
		<?php }
	}else{
		echo true;
	}
	?>

<?php
    session_start();
    if(isset($_SESSION["carro"])){
        $ds = DIRECTORY_SEPARATOR;
        $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
        require_once("{$base_dir}dao{$ds}cesta.php");
        //Añadimos el array de producto que tenemos serializado en la cookie Carro a una variable
        //Le pasaremos a la funcion para que reorecoja todos los datos de cada producto en la cesta
	$arrayCarrito = unserialize($_SESSION["carro"]);
	// Recuperamos todos los datos de la BBDD
        $cesta = new Cesta;
	$arrayObjectoDatos = $cesta->obtenerTodosProductos($arrayCarrito);
	//Obtenemos todos los datos necesarios y los expulsamos
	$totalPrecio = 0;
	$ArrayLength = count($arrayObjectoDatos);
	$i = 0;
	?>
	<!-- Vista de la Cesta -->
	if(isset($_GET["pago"])){
		<h1>Resumen</h1>
	}else{
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
	}
    <?php }else{ ?>
            <div class="container">
                <div class="">
                    <h1>¡Aun no has añadido ningún articulo a tu cesta!</h1>
                </div>
            </div>
    <?php }
?>

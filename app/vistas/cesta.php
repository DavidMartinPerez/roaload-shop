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
		while($i < $ArrayLength){ //TODO: Comprobar que esto funciona correctamente
			print_r($arrayObjectoDatos[$i]);
			$idP = $arrayObjectoDatos[$i]['idProducto'];
			$nombre = $arrayObjectoDatos[$i]['nombreJuego'];
			$edicion = $arrayObjectoDatos[$i]['nombreEdicion'];
			$plataforma = $arrayObjectoDatos[$i]['nombrePlataforma'];
			$distribuidora = $arrayObjectoDatos[$i]['nombrePlataforma'];
			$cantidad = $arrayObjectoDatos[$i]['cantidad'];
			$precio = $arrayObjectoDatos[$i]['precioPorArticulo'];
			$precioTotalArticulos = $precio*$cantidad;
			?>
			<div>
				Esta es la id: <?=$idP?>,
				Este es el Nombre: <?=$nombre?>,
				Esta es la edicion: <?=$edicion?>,
				Esta es la plataforma: <?=$plataforma?>,
				Esta es la cantidad: <?=$cantidad?>,  
				Este es el precio por articulo: <?=$precio?>,
				Este es el precio total de los articulos: <?=$precioTotalArticulos?>,
			</div><br>
			<?php $i++;
			$totalPrecio = $totalPrecio+$precioTotalArticulos;
		} ?>
		<div class="color:red">Este es el total de todo: <?=$totalPrecio?></div>
        
    <?php }else{ ?>
            <div class="container">
                <div class="">
                    <h1>¡Aun no has añadido ningún articulo a tu cesta!</h1>
                </div>
            </div>
    <?php }
?>

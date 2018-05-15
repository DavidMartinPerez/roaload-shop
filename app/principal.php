<?php
	require 'dao/productos.php';

	$filtro = $_GET["filtro"] ?? "";

	$objP = new Producto;

	$reg = $objP->obtenerTodosProductos($filtro);
?>

<div class="row">
    <!-- contenido lateral -->

    <!-- ./contenido lateral -->
    <!-- Contenido de la web -->
    <div class="container cuerpo">
        <div class="row">
				<div class="">
					<!-- Menú de filtro? -->
				</div>
				<div class="col l12">
	            <?php while($row = mysqli_fetch_assoc($reg)){
	                if($row["img"] == NULL){
	                    $img = "00.png";
	                }else{
	                    $img = $row["img"];
	                }
	                ?>
	                <div class="col m4 l3">
	                    <div class="card carta-margin">
	                        <div class="center-align <?=$row['nombrePlataforma']?>"><?=$row["nombrePlataforma"]?></div>
	                        <div class="card-image">
	                            <a id="<?=$row['idVersion']?>" onclick="infoVersion(this);"><img class="tamaño-img" src="img/caratula/<?=$img ?>"></a>
	                        </div>
	                        <p style="height: 80px" class="card-title center-align"><?=$row["nombreJuego"]?></p>
							<p class="center-align"><?=$row["nombreEdicion"]?>
	                        <div class="card-action center-align">
	                            <span class="pink-text"><?=$row["precio"]?> €</span>
	                            <a onclick="añadirCarrito(this.id)" id="<?=$row['idVersion']?>" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">shopping_cart</i></a>
	                        </div>
	                    </div>
	                </div>
	            <?php } ?>
	        </div>
		</div>
    </div>

    <!-- ./Contenido de la web -->
</div>
<!-- ./row de la esctrutura de la web -->

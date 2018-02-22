<?php
	include "conexion.php";

	$sql = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion, dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
	 			FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
				where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora";
	$reg = $bd->query($sql);
	$bd->close();
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
	                if($row["nombreEdicion"] == "Sin confirmar"){
	                    $edicion = "<br>Edición no confirmada";
	                }else{
	                    $edicion = $row["nombreEdicion"];
	                }
	                ?>
	                <div class="col m4 l3">
	                    <div class="card carta-margin">
	                        <div class="center-align <?=$row['nombrePlataforma']?>"><?=$row["nombrePlataforma"]?></div>
	                        <div class="card-image">
	                            <a id="<?=$row['idVersion']?>" onclick="infoVersion(this);"><img class="tamaño-img" src="img/caratula/<?=$img ?>"></a>
	                        </div>
	                        <p class="card-title center-align"><?=$row["nombreJuego"]?></p>
							<p class="center-align"><?=$edicion ?>
	                        <div class="card-action center-align">
	                            <span class="pink-text"><?=$row["precio"]?> €</span>
	                            <a id="<?=$row['idVersion']?>" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">shopping_cart</i></a>
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

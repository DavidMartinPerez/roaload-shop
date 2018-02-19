<?php
	$bd = @new mysqli("localhost", "root", "");
	$bd->select_db("tienda");

	$sql = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion, dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
	 			FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
				where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora";
	$reg = $bd->query($sql);
	$bd->close();
?>

<div class="row">
    <!-- contenido lateral -->
    <div class="col s12 m2 l2">
        <div class="btn especial-semana panel-categorias">
            Categoria de la semana
        </div>
        <div class="NSW btn panel-categorias">
            Nintendo Switch
        </div>
        <div class="btn panel-categorias PS4">
            PS4
        </div>
        <div class="XONE btn panel-categorias">
            Xbox ONE
        </div>
        <div class="PC btn panel-categorias">
            pc
        </div>
        <div class="btn panel-categorias n3DS">
            3DS
        </div>
        <div class="btn panel-categorias">
            accesorios
        </div>
        <div class="btn reserva panel-categorias">
            reservas
        </div>
    </div>
    <!-- ./contenido lateral -->
    <!-- Contenido de la web -->
    <div class="col s12 m10 l10 cuerpo">
        <div class="row">
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
                <div class="col m4 l2">
                    <div class="card carta-margin">
                        <div class="center-align <?=$row['nombrePlataforma']?>"><?=$row["nombrePlataforma"]?></div>
                        <div class=" card-image">
                            <a id="<?=$row['idVersion']?>" onclick="infoVersion(this);"><img class="tamaño-img" src="img/caratula/<?=$img ?>"></a>
                        </div>
                        <p class="card-title center-align carta-titulo"><?=$row["nombreJuego"]." ".$edicion?></p>
                        <div class="card-content carta-descrip">
                            <p>Sustituir por descripotcion</p>
                        </div>
                        <div class="card-action center-align">
                            <span class="pink-text"><?=$row["precio"]?> €</span>
                            <a id="<?=$row['idVersion']?>" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">shopping_cart</i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- ./Contenido de la web -->
</div>
<!-- ./row de la esctrutura de la web -->

<?php
    $id = $_GET["id"];
    $bd = @new mysqli("localhost", "root", "");
	$bd->select_db("tienda");
    $sql = "SELECT version.idVersion, version.img , juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, juego.descripJuego ,version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
            FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
            where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.idVersion = $id";
    $reg = $bd->query($sql);
    $dato = mysqli_fetch_assoc($reg);
	$bd->close();
?>
<a class="waves-effect waves-light btn  margenBoton" onclick="paginaPrincipal()" ><i class="material-icons left" style="margin-left: 15px;">arrow_back</i></a>
<div class="container">
    <div class="row">
        <h1 class="col s12"><?=$dato["nombreJuego"]?></h1>
        <img src="img/caratula/kh1.png" class="col s3"/>
        <div class="col s2">
            <label>PLATAFORMA:</label>
            <div class="center-align"><?=$dato["nombrePlataforma"]?></div>
            <br>
            <label>EDICIÓN:</label>
            <div class="center-align"><?=$dato["nombreEdicion"]?></div>
            <br>
            <label>Lanzamiento:</label>
            <div class="center-align"><?=$dato["fechaSalida"]?></div>
        </div>
        <div class="col offset-s4">
            <h5 class="pink-text" style="text-decoration: underline">PRECIO</h5>
            <h2 class="pink-text"><?=$dato["precio"]?> €</h2>
        </div>
    </div>
    <div class="row">
        <h3>Descripción</h3>
        <p class="col s12"><?=$dato["descripJuego"]?></p>
    </div>
    <div class="center-align">
        <iframe width="80%" height="500" src="https://www.youtube.com/embed/ePpPVE-GGJw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
</div>

<?php

    $bd = @new mysqli("localhost", "root", "");
    $bd->select_db("tienda");


    $nombre = $_POST["idNombre"];
    $ptl = $_POST["idPtl"];
    $dire = $_POST["idEdicion"];
    $dis = $_POST["idDis"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $fecha = $_POST["fecha"];
    $sql = "INSERT INTO `versionjuego`(`idVersion`, `idJuego`, `idPlataforma`, `idEdicion`, `idDistribuidora`, `precio`, `stock`, `fechaSalida`)
            VALUES (NULL,$nombre,$ptl,$dire,$dis,$precio,$stock,'$fecha')";
    $bd->query($sql);
	$bd->close();

    include "version.php";

?>

<?php 

include "../dao/conexion.php";

$sql = "SELECT `nombreUsuario` FROM `usuario` WHERE 1";
$reg = $bd->query($sql);
$nusuarios = $reg->num_rows;

$sql2 = "SELECT `precio` FROM `productoscomprados` WHERE 1";
$reg = $bd->query($sql2);
$nganancias = 0;
while($row = mysqli_fetch_assoc($reg)){
    $nganancias = $nganancias + $row["precio"];
}

$sql3 = "SELECT `ventas` FROM versionjuego";
$reg = $bd->query($sql3);
$nventas = 0;
while($row = mysqli_fetch_assoc($reg)){
    $nventas = $nventas + $row["ventas"];
}

?>
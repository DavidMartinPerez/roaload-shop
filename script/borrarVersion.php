<?php
    include "conexion.php";

    $id = $_GET["idVersion"];

    $sql = "DELETE FROM `versionjuego` WHERE idVersion = '$id'";

    $bd->query($sql);
    $bd->close();
?>

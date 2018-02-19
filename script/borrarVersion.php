<?php
    $bd = @new mysqli("localhost", "root", "");
    $bd->select_db("tienda");

    $id = $_GET["idVersion"];

    $sql = "DELETE FROM `versionjuego` WHERE idVersion = '$id'";

    $bd->query($sql);
    $bd->close();
?>

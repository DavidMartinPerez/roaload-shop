<?php
    // require_once "../constantes/constantes.php";
    //Local
    $bd = @new mysqli('localhost', 'root', '');
    $bd->select_db('tienda');
    //Servidor
    //$bd = @new mysqli('localhost', 'id5455249_david', 'basededatos');
    //$bd->select_db('id5455249_tienda');
    //mysqli_set_charset($bd, "utf8");

    if($bd->connect_errno) {
        die("**Error $bd->connect_errno: $bd->connect_error.<br/>") ;
    }
?>

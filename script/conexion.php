<?php
    // require_once "../constantes/constantes.php";

    $bd = @new mysqli('localhost', 'root', '');
    $bd->select_db('tienda');

    if($bd->connect_errno) {
        die("**Error $bd->connect_errno: $bd->connect_error.<br/>") ;
    }
?>

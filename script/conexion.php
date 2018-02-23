<?php
    // require_once "../constantes/constantes.php";

    $bd = @new mysqli('localhost', 'root', '');
    $bd->select_db('tienda');
    mysqli_set_charset($bd, "utf8");
    
    if($bd->connect_errno) {
        die("**Error $bd->connect_errno: $bd->connect_error.<br/>") ;
    }
?>

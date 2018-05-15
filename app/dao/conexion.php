<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
    require_once("{$base_dir}constantes{$ds}constantes.php"); //aniade las constantes
    //Local
    $bd = @new mysqli(HOST, USER, PASS);
    $bd->select_db(BD);
    //Servidor
    //$bd = @new mysqli('localhost', 'id5455249_david', 'basededatos');
    //$bd->select_db('id5455249_tienda');
    //mysqli_set_charset($bd, "utf8");
    if($bd->connect_errno) {
        die("**Error $bd->connect_errno: $bd->connect_error.<br/>") ;
    }
?>

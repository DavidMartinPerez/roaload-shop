<?php

    $usuario = $_GET["usuario"];
    $pass = $_GET["pass"];

    require 'acceso.php';

    $obj = new Acceso();

    $obj->login($usuario, $pass);
    

?>

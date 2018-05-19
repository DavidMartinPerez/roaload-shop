<?php
    session_start();
    require '../dao/acceso.php';
    $objS = new Acceso();
    if($objS->sessionActiva()){
        header("Location: principal");
    }
    if(isset($_GET["exit"])){
        $objD = new Acceso();
        $objD->desconectar();
    } else {
        $mensaje = "";
        if(isset($_POST["usr"])){
            $objL = new Acceso(); //llamamos a la clase
            $mensaje = $objL->login($_POST["usr"],$_POST["pass"]);
        }
    }
?>
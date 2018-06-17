<?php
    include('../dao/conexion.php');
    if((isset($_POST["usr"])) && (isset($_POST["pass"])) && ( $_POST["usr"] != "") && ( $_POST["pass"] != "" )){
        //conectar a la base de datos

        // Escapar las cadenas para que no nos entren con trucos
        $usuario = $bd->real_escape_string($_POST["usr"]) ;
        $contrasena = $bd->real_escape_string($_POST["pass"]);
        // Comprobamos si existe el usuario en la base de datos
        $sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario';";
        $reg = $bd->query($sql); //Ejecuta la sentencia
        if($reg->num_rows) {
           echo '{"estado":"ko","msg":"Este nombre de usuario ya existe!"}';
        } else {
            $pass = md5("$contrasena");
            $fecha = date('YmdHis');
            $sql = "INSERT INTO `usuario`(`idUsuario`, `nombreUsuario`, `contrasena`, `admin`, `fechaRegistro`) VALUES (NULL,'$usuario','$pass',0,'$fecha')";
            $añadir = $bd->query($sql);
            if ($añadir->connect_errno) {
              echo {"estado":"ko","msg":"Error!:s"};
            } else {
               echo {"estado":"ok","msg":"Listo!"};
            }

        }
        $bd->close();
    } else {
        echo '{"estado":"ko","msg":"no estan relleno los datos"}';
    }
?>
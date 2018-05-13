<?php

    require 'conexion.php';

    class Acceso {
        public function login($usr, $pass){
            global $bd;
            $usuario = $bd->real_escape_string($usr);
            $contrasena = $bd->real_escape_string($pass);
            $pass = md5($contrasena);
            $sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND contrasena='$pass';";
            $reg = $bd->query($sql); //Ejecuta la sentencia
            if($reg->num_rows) {
                print "correcto";
            }else{
                print "falso";
            }
        }
    }

?>

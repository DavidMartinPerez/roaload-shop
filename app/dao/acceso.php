<?php
    require 'conexion.php';
    class Acceso {

        //####### ACCEDER ##############
        public function login($usr, $passw){
            global $bd;
            $usuario = $bd->real_escape_string($usr);
            $contrasena = $bd->real_escape_string($passw);
            $pass = md5($contrasena);
            $sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND contrasena='$pass';";
            $reg = $bd->query($sql); //Ejecuta la sentencia
            if($reg->num_rows) {
                //crear las variables de sesion necesarias
                $_SESSION["id"] = session_id();
                $_SESSION["usr"] = $usr;
                $_SESSION["entrada"] = time();

                //localizamos si el usuario es administrador...
                $row = mysqli_fetch_assoc($reg);
                $_SESSION["datos"] = serialize([
                    $row["nombre"],
                    $row["apellido"],
                    $row["idUsuario"]
                ]);
                $_SESSION["idUser"] = $row["idUsuario"];
                if ($row["admin"] == 0){
                    $_SESSION["rol"] = "usuario";
                } else {
                    $_SESSION["rol"] = "admin";
                }
                return true;

            } else {
                return false;
            }
            $bd->close();
        } //ACEDER

        //####### DESCONECTARSE ##############
        public function desconectar(){
            //Destruimos todas las sesiones
            $_SESSION = [];
            session_destroy();
        } //Desconectar

        //####### SESSION ACTIVA ##############
        public function sessionActiva(){
            return (isset($_SESSION['id']))? true : false;
        }

    } //class Acceso
?>

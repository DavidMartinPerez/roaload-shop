<?php
    session_start();
    if(isset($_SESSION["rol"])){
        die(header("Location: ../"));
    }
    $mensaje = "";
    if((isset($_POST["usr"])) && (isset($_POST["pass"])) && ( $_POST["usr"] != "") && ( $_POST["pass"] != "" )){
        //conectar a la base de datos
        include "conexion.php";

        // Escapar las cadenas para que no nos entren con trucos
        $usuario = $bd->real_escape_string($_POST["usr"]) ;
        $contrasena = $bd->real_escape_string($_POST["pass"]) ;

        // Comprobamos si existe el usuario en la base de datos
        $sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario';";
        $reg = $bd->query($sql); //Ejecuta la sentencia
        if($reg->num_rows) {
            $mensaje = "<p style='color:red'> El usuario ya existe </p>";
        } else {
            $pass = md5("$contrasena");
            $sql = "INSERT INTO `usuario`(`idUsuario`, `nombreUsuario`, `contrasena`, `admin`) VALUES (NULL,'$usuario','$pass',0)";
            $añadir = $bd->query($sql);
            echo "hola";
            if ($añadir->connect_errno) {
                $mensaje = "Se ha producido un error";
            } else {
                header("Location: inicioSesion.php");
            }

        }
        $bd->close();
    } else {
        $mensaje = "";
    }
?>

<!DOCTYPE html>
<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>
  <div class="section"></div>
    <center>
      <img class="responsive-img" style="width: 250px;" src="../img/welcome.png" />
      <div class="section"></div>

      <h5 class="indigo-text">Por favor, rellena el formulario :)</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class="row">
              <div class="col s12">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input class="validate" type="text" name="usr" id="text" />
                <label for="text">Nombre de usuario</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input class="validate" type="password" name="pass" id="password" />
                <label for="password">Contraseña</label>
              </div>
            </div>

            <br />
            <center>
              <div class="row">
                <button type="submit" name="btn_login" class="col s12 btn btn-large waves-effect indigo">¡Registrarse!</button>
                <?=$mensaje?>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a class="btn indigo" href="inicioSesion.php">Volver</a>
    </center>
    <?php
        $msg
    ?>
    <div class="section"></div>
    <div class="section"></div>

  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>

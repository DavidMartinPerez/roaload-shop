<?php
    session_start();
    if(isset($_GET["exit"])){
        $_SESSION = [];
		session_destroy();
        header("Location: ../index.php");
    } else {
        $mensaje = "";
        $status = 0;
        if(isset($_POST["usr"])){
            //conectar a la base de datos
            $bd = @new mysqli("localhost", "root", "") ;
            //comprobamos si se conecta a la base de datos
            
            // Seleciionamos la base de datos que vamos a Usuario
            $bd->select_db("tienda");

            // Escapar las cadenas para que no nos entren con trucos
            $usuario = $bd->real_escape_string($_POST["usr"]) ;
            $contrasena = $bd->real_escape_string($_POST["pass"]) ;

            // Comprobamos si existe el usuario en la base de datos
            $sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND contrasena='$contrasena';";
            $reg = $bd->query($sql); //Ejecuta la sentencia
            if($reg->num_rows) {
                //crear las variables de sesion necesarias
                $_SESSION["id"] = session_id();
                $_SESSION["usr"] = $_POST["usr"];
                $_SESSION["entrada"] = time();

                //localizamos si el usuario es administrador...
                $row = mysqli_fetch_assoc($reg);
                $_SESSION["datos"] = serialize([
                    $row["nombre"],
                    $row["apellido"],
                    $row["idUsuario"]
                ]);
                echo $row["admin"];
                if ($row["admin"] == 0){
                    $_SESSION["rol"] = "usuario";
                } else {
                    $_SESSION["rol"] = "admin";
                }
                header("Location: ../index.php");

            } else {
                $mensaje = "<p style='color:red'> ¡Datos no correctos!:(</p>";
            }
            $bd->close();
        }
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
      <img class="responsive-img" style="width: 250px;" src="../img/favicon.png" />
      <div class="section"></div>

      <h5 class="indigo-text">Por favor, introduce tu cuenta :)</h5>
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
                <label for="password">contraseña</label>
              </div>
              <label style="float: right;">
								<a class="pink-text" href="#!"><b>¿Recuerda tu cuenta?</b></a>
							</label>
            </div>

            <br />
            <center>
              <div class="row">
                <button type="submit" name="btn_login" class="col s12 btn btn-large waves-effect indigo">Iniciar Sesión</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a href="#!">Create una cuenta</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>

  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>

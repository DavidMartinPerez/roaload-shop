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
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
</head>

<body>
  <div class="section"></div>
    <center>
      <img class="responsive-img" style="width: 250px;" src="assets/img/favicon.png" />
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
                  <a class="pink-text" href=""><b>¿Recuerda tu cuenta?</b></a>
              </label>
            </div>
            <br/>
            <center>
              <div class="row">
                <button type="submit" name="btn_login" class="col s12 btn btn-large waves-effect indigo">Iniciar Sesión</button>
                <?=$mensaje?>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a class="btn indigo" href="registrarse">Create una cuenta</a>
      <a class="btn indigo" href="/">Volver atrás</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
</body>

</html>

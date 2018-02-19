<?php
	$mensaje = "";
	if(isset($_POST["usr"])){
		//conectar a la base de datos
		$bd = @new mysqli("localhost", "root", "") ;
		//comprobamos si se conecta a la base de datos
		if($bd->connect_errno) {
			die("**Error $bd->connect_errno: $bd->connect_error.<br/>") ;
		}

		//Seleciionamos la base de datos que vamos a Usuario
		$bd->select_db("tienda");

		// Escapar las cadenas para que no nos entren con trucos
		$usuario = $bd->real_escape_string($_POST["usr"]) ;
		$contrasena = $bd->real_escape_string($_POST["pass"]) ;

		// Comprobamos si existe el usuario en la base de datos
		$sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND contrasena='$contrasena';";
		$reg = $bd->query($sql); //Ejecuta la sentencia
		if($reg->num_rows) {

			//crear las variables de sesion necesarias
			// $_SESSION["id"] = session_id() ;
			// $_SESSION["usr"] = $_POST["usr"] ;
			// $_SESSION["entrada"] = time();

			//redirigimos
			header("Location: admin.php");
		} else {
			$mensaje = "<p style='color:red'> ¡No se encontraron el usuario o contraseña!";
		}

		$bd->close();
	}

?>
<div class="row">
	<div class="col m12">
		<div class="card-panel teal">
			<div class="title">Login</div>
			<form action="login.php" method="POST">
				<div class="input-field col s12">
					<input name="usr"  id="usuario" type="text" class="validate">
					<label for="usuario">Usuario</label>
				</div>
				<div class="input-field col s12">
					<input name="pass"  id="contraseña" type="text" class="validate">
					<label for="contraseña">Contraseña</label>
				</div>
				<input class="btn waves-effect waves-light" type="submit" value="Submit">
			</form>
			<?=$mensaje ?>
		</div>
	</div>
</div>

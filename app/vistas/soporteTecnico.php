<?php
if(isset($_GET["guardar"])){
    session_start();
    $idUser = $_SESSION["idUser"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $mensajeCliente = $_POST["mensaje"];

    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
    require_once("{$base_dir}dao{$ds}tienda.php");

    $mensaje = new Pedido();
    $msg = $mensaje->mensajeSoporte($idUser, $nombre, $correo, $mensajeCliente);
}else{
?><div class="container">
    <h2 style="padding-top: 30px">¿Qué nos quieres comentar?</h2>
    <div class="row letra-roboco">
        <div class="row">
            <div class="input-field col s12 m6">
                <input  id="nombre" type="text" class="validate" required>
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="email" type="email" class="validate" required>
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <textarea id="mensaje" class="materialize-textarea"></textarea>
        </div>
        <a class="btn teal darken-1" style="margin-bottom: 30px" onclick="enviarMensaje()">¡Listo!</a>
    </div>
</div>
<?php } ?>
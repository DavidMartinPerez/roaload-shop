<?php
    require_once "../constantes/constantes.php";

    include "../dao/conexion.php";

    $nombreJuego = $_POST["nombreJuego"];
    $nombrePlataforma = $_POST["nombrePlataforma"];

    $nombre = $_POST["juego"];
    $ptl = $_POST["plataforma"];
    $dire = $_POST["edicion"];
    $dis = $_POST["distribuidora"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $fecha = $_POST["salida"];
    $img = $_POST["img"];
    //comprobar que existe una version ya
    $sqlComprobar = "SELECT `idVersion`, `idJuego`, `idPlataforma`, `idEdicion`, `idDistribuidora`, `precio`, `stock`, `fechaSalida`
                    FROM `versionjuego`
                    WHERE idJuego = $nombre AND idPlataforma = $ptl AND idEdicion = $dire";
    $existen = $bd->query($sqlComprobar);
    if($existen->num_rows){
        ?>
        <script>
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-top-right';
            toastr.options.showDuration = 1000;
            toastr['error']("Ya existe");
        <script>
        <?php
    ?>
    <?php } else {
        $sql = "INSERT INTO `versionjuego`(`idVersion`, `idJuego`, `idPlataforma`, `idEdicion`, `idDistribuidora`, `precio`, `stock`,`ventas`, `fechaSalida`,`activo`,`img`)
        VALUES (NULL,$nombre,$ptl,$dire,$dis,$precio,$stock,0,'$fecha',1,'$img')";
        $bd->query($sql);
        $bd->close();
        function enviarMensaje($text) {
            $TOKEN = TOKEN;
            $TELEGRAM = "https://api.telegram.org:443/bot$TOKEN";
            $chatId = IDCHAT;

            $query = http_build_query(array(
                'chat_id'=> $chatId,
                'text'=> $text,
                'parse_mode'=> "Markdown", // Optional: Markdown | HTML
            ));

            $response = file_get_contents("$TELEGRAM/sendMessage?$query");
            return $response;
        }
        $msg = "# $nombreJuego - $nombrePlataforma - ".$precio."€";
        $respuesta = enviarMensaje($msg);

    }
?>

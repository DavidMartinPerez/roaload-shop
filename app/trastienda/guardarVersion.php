<?php
    require_once "../constantes/constantes.php";

    include "conexion.php";

    $nombreJuego = $_POST["nombreJuego"];
    $nombrePlataforma = $_POST["nombrePlataforma"];

    $nombre = $_POST["idNombre"];
    $ptl = $_POST["idPtl"];
    $dire = $_POST["idEdicion"];
    $dis = $_POST["idDis"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $fecha = $_POST["fecha"];
    //comprobar que existe una version ya
    $sqlComprobar = "SELECT `idVersion`, `idJuego`, `idPlataforma`, `idEdicion`, `idDistribuidora`, `precio`, `stock`, `fechaSalida`
                    FROM `versionjuego`
                    WHERE idJuego = $nombre AND idPlataforma = $ptl AND idEdicion = $dire";
    $existen = $bd->query($sqlComprobar);
    if($existen->num_rows){
        include "version.php";
    ?>
        <script>
            Materialize.toast('¡Ya existe este juego! :(', 3000, 'red rounded', );
        </script>
    <?php } else {
        $sql = "INSERT INTO `versionjuego`(`idVersion`, `idJuego`, `idPlataforma`, `idEdicion`, `idDistribuidora`, `precio`, `stock`, `fechaSalida`)
        VALUES (NULL,$nombre,$ptl,$dire,$dis,$precio,$stock,'$fecha')";
        $bd->query($sql);
        $bd->close();

        include "version.php";

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
?>
        <script>
            Materialize.toast('¡Añadido!', 3000, 'green rounded', );
        </script>
<?php
    }
?>

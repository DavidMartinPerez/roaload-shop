<?php

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
    $sql = "INSERT INTO `versionjuego`(`idVersion`, `idJuego`, `idPlataforma`, `idEdicion`, `idDistribuidora`, `precio`, `stock`, `fechaSalida`)
            VALUES (NULL,$nombre,$ptl,$dire,$dis,$precio,$stock,'$fecha')";
    $bd->query($sql);
	$bd->close();

    include "version.php";

    function enviarMensaje($text) {
      $TOKEN = TOKEN;
      $TELEGRAM = "https://api.telegram.org:443/bot$TOKEN";
      $chatId = -1001163449347;

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
    echo $respuesta;
?>

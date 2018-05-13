<?php

    include "conexion.php";

    $nombre = $_POST["nombre"];
    $des = $_POST["des"];

    $sqlComprobar = "SELECT * FROM videojuego WHERE nombreJuego = '$nombre'";
    $existen = $bd->query($sqlComprobar);
    if($existen->num_rows){
        include "version.php";
    ?>
        <script>
            Materialize.toast('¡Ya existe este juego! :(', 3000, 'red rounded', );
        </script>
    <?php } else {
        $sql = "INSERT INTO `videojuego`(`idJuego`, `nombreJuego`, `descripJuego`) VALUES (NULL,'$nombre','$des')";
        $bd->query($sql);
        $bd->close();
        ?>
        <script>
            Materialize.toast('¡Añadido!', 3000, 'green rounded', );
        </script>
        <?php

        include "juego.php";
    }
?>

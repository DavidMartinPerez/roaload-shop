<?php

    include "conexion.php";

    $nombre = $_POST["nombre"];

    $sqlComprobar = "SELECT * FROM plataforma WHERE nombrePlataforma = '$nombre'";
    $existen = $bd->query($sqlComprobar);
    if($existen->num_rows){
        include "plataforma.php";
    ?>
        <script>
            Materialize.toast('¡Ya existe esta plataforma! :(', 3000, 'red rounded', );
        </script>
    <?php } else {
        $sql = "INSERT INTO `plataforma`(`idPlataforma`, `nombrePlataforma`) VALUES (NULL,'$nombre')";
        $bd->query($sql);
        $bd->close();
        ?>
        <script>
            Materialize.toast('¡Añadida!', 3000, 'green rounded', );
        </script>
        <?php

        include "plataforma.php";
    }
?>

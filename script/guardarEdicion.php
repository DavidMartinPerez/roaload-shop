<?php

    include "conexion.php";

    $nombre = $_POST["nombre"];

    $sqlComprobar = "SELECT * FROM edicion WHERE nombreEdicion = '$nombre'";
    $existen = $bd->query($sqlComprobar);
    if($existen->num_rows){
        include "edicion.php";
    ?>
        <script>
            Materialize.toast('¡Ya existe esta edicion! :(', 3000, 'red rounded', );
        </script>
    <?php } else {
        $sql = "INSERT INTO `edicion`(`idEdicion`, `nombreEdicion`) VALUES (NULL,'$nombre')";
        $bd->query($sql);
        $bd->close();
        ?>
        <script>
            Materialize.toast('¡Añadida!', 3000, 'green rounded', );
        </script>
        <?php

        include "edicion.php";
    }
?>

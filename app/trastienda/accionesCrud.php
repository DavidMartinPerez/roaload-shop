<?php
    include('../dao/trastienda.php');
    // Aquí están las funciones para guardar los juegos.
    $obj = new Trastienda();

//####### ACCIONES CRUD DE TODA LA TRASTIENDA ############//

// CRUD'S DE PRODUCTOS DE LA TIENDA

if(isset($_GET["juego"])){  // CRUD PARA VIDEOJUEGO
    if($_GET["accion"]=='crear'){
        $nombre = $_POST["nombre"];
        $desc = $_POST["desc"];

        $result = $obj->guardarGenerico('videojuego', $nombre, $desc); //1-> tabla, 2->nombre, 3->opcional[descripcion]

        if($result == true){
            echo "true";
        }else{
            echo "false";
        }
    }
    if($_GET["accion"]=='eliminar'){
        // TODO: crear eliminar
    }
    if($_GET["accion"]=='editar'){
        // TODO: crear editar
    }
    if($_GET["accion"]=='leer'){
        // TODO: MODIFICAR LA FORMA DE LEERLO
    }
}

if(isset($_GET["plataforma"])){ // CRUD PARA PLATAFORMA
    if($_GET["accion"]=='crear'){
        $nombre = $_POST["nombre"];

        $result = $obj->guardarGenerico('plataforma', $nombre); //1-> tabla, 2->nombre, 3->opcional[descripcion]

        if($result == true){
            echo "true";
        }else{
            echo "false";
        }
    }
    if($_GET["accion"]=='eliminar'){
        // TODO: crear eliminar
    }
    if($_GET["accion"]=='editar'){
        // TODO: crear editar
    }
    if($_GET["accion"]=='leer'){
        // TODO: MODIFICAR LA FORMA DE LEERLO
    }
}

if(isset($_GET["edicion"])){ // CRUD PARA EDICION
    if($_GET["accion"]=='crear'){
        $nombre = $_POST["nombre"];

        $result = $obj->guardarGenerico('plataforma', $nombre); //1-> tabla, 2->nombre, 3->opcional[descripcion]

        if($result == true){
            echo "true";
        }else{
            echo "false";
        }
    }
    if($_GET["accion"]=='eliminar'){
        // TODO: crear eliminar
    }
    if($_GET["accion"]=='editar'){
        // TODO: crear editar
    }
    if($_GET["accion"]=='leer'){
        // TODO: MODIFICAR LA FORMA DE LEERLO
    }
}

if(isset($_GET["version"])){ // CRUD PARA VERSIÓN
    if($_GET["accion"]=='crear'){
        // TODO: crear crear
    }
    if($_GET["accion"]=='eliminar'){ // Esta funcion no funciona como eliminar sino como deshabilitar un producto
        // TODO: crear eliminar
    }
    if($_GET["accion"]=='editar'){
        // TODO: crear editar
    }
    if($_GET["accion"]=='leer'){
        // TODO: MODIFICAR LA FORMA DE LEERLO
    }
}

// CRUD PARA NOTIFICACIONES Y USUARIOS

// CRUD PARA PEDIDOS
?>
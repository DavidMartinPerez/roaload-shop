<?php

    require 'conexion.php';
    class Cesta {
        //######### Obtener todos los productos de la cesta ##############
        public function obtenerTodosProductos($arrayCarrito){
            global $bd;
            //SQL Para recuperar todos los Juegos y Consolas que esten habilitados!
            $sqlTodosProductos = "SELECT version.idVersion, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora,version.img
            FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
            WHERE version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1 AND ($productos)";

            $reg = $bd->query($sqlTodosProductos);
            $bd->close();

            return $reg;
        }
        //########## /Obtener todos los productos de la cesta ##################
    } //class Producto
?>

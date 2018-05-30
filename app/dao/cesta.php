<?php

    require 'conexion.php';
    class Cesta {
        //######### Obtener todos los productos de la cesta ##############
        public function obtenerTodosProductos($arrayCarrito){
            global $bd;

            $i = 0;
            $ArrayLength = count($arrayCarrito);
            while($i < $ArrayLength){
                $IdProductos = "idVersion = ";
                $IdProductos .= $arrayCarrito[0]["id"];
                $i++;
            }
            //SQL Para recuperar todos los Juegos y Consolas que esten habilitados!
            $sqlDatosCesta = "SELECT version.idVersion, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora,version.img
            FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
            WHERE version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1
            AND ($IdProductos)";
            //FIXME: Se perderan los productos la cantidad de cada producto
            // TODO: CREARLO COMO UN JSON
            //$reg = $bd->query($sqlDatosCesta);
            //$bd->close();

            return $sqlDatosCesta;
        }
        //########## /Obtener todos los productos de la cesta ##################
    } //class Producto
?>

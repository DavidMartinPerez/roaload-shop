<?php

    require 'conexion.php';
    class Producto {
        //######### OBTENER TODOS LOS PRODUCTOS ##############
        public function obtenerTodosProductos($limite){
            global $bd;
            //SQL Para recuperar todos los Juegos y Consolas.
            $sqlTodosProductos = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
                    dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
                     version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                    FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                    where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
                    AND version.idPlataforma = ptl.Plataforma AND version.idDistribuidora = dis.idDistribuidora";

            $reg = $bd->query($sqlTodosProductos);
            $bd->close();

            return $reg;
        }
        //########## /Obtener Productos ##################

        //########## Obtener un registro Producto ########
        public function obtenerInfoProducto($id){
            global $bd;
            $sqlInfoProducto = "SELECT version.idVersion, version.img , juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, juego.descripJuego ,version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                    FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                    where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.idVersion = $id";

            $reg = $bd->query($sqlInfoProducto);
            $dato = mysqli_fetch_assoc($reg);
        	$bd->close();

            return $dato;
        }

        public function filtroProductos($plataforma,$limite, $nombrePlt){
            global $bd;

            $sqlFiltro = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
                    dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
                     version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                    FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                    where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
                    AND version.idPlataforma = $plataforma AND version.idDistribuidora = dis.idDistribuidora AND ptl.nombrePlataforma = '$nombrePlt' LIMIT $limite";
            //echo $sqlFiltro;
            $reg = $bd->query($sqlFiltro);
            $bd->close();

            return $reg;
        }
    } //class Producto
?>

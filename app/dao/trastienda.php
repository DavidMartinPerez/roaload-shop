<?php

    require 'conexion.php';

    class Trastienda {
        //######### obtenerVersion ##############
        public function obtenerVersion($campo, $orden){
            global $bd;
            //SQL Para recuperar todos los Juegos y Consolas.
            $sqlJOIN = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, ed.idEdicion, dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
            version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora, version.activo
            FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
            where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora
            ORDER BY idVersion DESC LIMIT 20";

            $reg = $bd->query($sqlJOIN);

            return $reg;
        }
        //########## /obtenerVersion ##################
        public function buscarProducto(){
            //Esto servira para buscar productos que empiecen por lo introducido
        }
        //##########  recuperar input (juego,plataforma,edicion)##################
        public function recuperarRegistros($tabla){
            global $bd;
            //SQL Para recuperar todos los Juegos y Consolas.
            $sqlRR = "SELECT * FROM `$tabla`";

            $reg = $bd->query($sqlRR);

            return $reg;
        }
        //########## / recuperar input ##################

        //########## GUARDAR GENERICO ##################
        public function guardarGenerico($tabla, $nombre, $desc = null){
            global $bd;
            //TODO: realscape
            if($tabla == 'videojuego'){
                $sqlComprobar = "SELECT * FROM videojuego WHERE nombreJuego = '$nombre'";
                $existen = $bd->query($sqlComprobar);
                if($existen->num_rows){
                    return false;
                }else{
                    $sql = "INSERT INTO `videojuego`(`idJuego`, `nombreJuego`, `descripJuego`) VALUES (NULL,'$nombre','$desc')";
                    $bd->query($sql);
                    return true;
                }
            }

            if($tabla == 'plataforma'){
                $sqlComprobar = "SELECT * FROM plataforma WHERE nombrePlataforma = '$nombre'";
                $existen = $bd->query($sqlComprobar);
                if($existen->num_rows){
                    return false;
                } else {
                    $sql = "INSERT INTO `plataforma`(`idPlataforma`, `nombrePlataforma`) VALUES (NULL,'$nombre')";
                    $bd->query($sql);
                    return true;
                }
            }

            if($tabla == 'edicion'){
                $sqlComprobar = "SELECT * FROM edicion WHERE nombreEdicion = '$nombre'";
                $existen = $bd->query($sqlComprobar);
                if($existen->num_rows){
                    return false;
                } else {
                    $sql = "INSERT INTO `edicion`(`idEdicion`, `nombreEdicion`, `descripcion`) VALUES (NULL,'$nombre', '$desc')";
                    $bd->query($sql);
                    return true;
                }
            }
        }
        //########## / GUARDAR GENERICO ##################

        //########## GUARDAR VERSION DEFINITIVA DE UN JUEGO ##################

        //########## / GUARDAR VERSION ##################
        //TODO: COMPROBAR SI ESTA EN RESERVA POR LA FECHA Y CUANDO UN JUEGO SALE UNA TAREA DIARIA Y MANDAR MENSAJE A TODOS LOS QUE TENIAN JUEGOS RESRVADOS
        // CREAR RESERVAS ES DIFERENTE POR QUE TENDRÁ UN LIMITE lo cual tendré que controlar diferente en otra tabla que cuando salga a la fecha final acabe la reserva
        //TODO: Crear stock de productos.
        public function buscarJuego($juego){
            global $bd;

            $sql = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, ed.idEdicion, dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
            version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora, version.activo
            FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
            where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora
            AND juego.nombreJuego LIKE '%$juego%'
            ORDER BY idVersion DESC LIMIT 20";

            $reg = $bd->query($sql);
            return $reg;
        }//

        public function desJuego($id){
            global $bd;
            $sql = "UPDATE `versionjuego` SET `activo`= 0 WHERE `idVersion` = $id";

            $reg = $bd->query($sql);
        }
        public function habJuego($id){
            global $bd;
            $sql = "UPDATE `versionjuego` SET `activo`= 1 WHERE `idVersion` = $id";

            $reg = $bd->query($sql);
        }
    } //class Trastienda
?>

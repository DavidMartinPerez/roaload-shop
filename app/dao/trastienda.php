<?php

    require 'conexion.php';

    class Trastienda {
        //######### obtenerVersion ##############
        public function obtenerVersion($campo, $orden){
            global $bd;
            //SQL Para recuperar todos los Juegos y Consolas.
            $sqlJOIN = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, ed.idEdicion, dis.idDistribuidora,
                        juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
        	 			FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
        				where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma
                        AND version.idDistribuidora = dis.idDistribuidora ORDER BY $campo $orden";

            $reg = $bd->query($sqlJOIN);
            $bd->close();

            return $reg;
        }
        //########## /obtenerVersion ##################

        //##########  recuperar input (juego,plataforma,edicion)##################
        public function recuperarRegistros($tabla){
            global $bd;
            //SQL Para recuperar todos los Juegos y Consolas.
            $sqlRR = "SELECT * FROM `$tabla`";

            $reg = $bd->query($sqlRR);
            $bd->close();
            
            return $reg;
        }
        //########## / recuperar input ##################

        //##########  ##################

        //########## / ##################

        //##########  ##################

        //########## / ##################
    } //class Trastienda
?>

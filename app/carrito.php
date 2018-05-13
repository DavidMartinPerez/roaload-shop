<?php

    //Aquí añadiremos  porductos al carrito
    //Usaremos la sesión para no tener que guardar nada en base de datos

    session_start();
    if(isset($_GET["idA"])){
        // Añadir producto del carro
        $idP = $_GET["idA"];


        if(isset($_SESSION["carro"])){
            $array = unserialize($_SESSION["carro"]);
            $i=0;
            $nuevoP = true;
            while(count($array) > $i){
                if($array[$i]["id"] == $idP){
                    $cantidad = $array[$i]["cantidad"];
                    $array[$i]["cantidad"] = $cantidad+1;
                    $i = count($array);
                    $nuevoP = false;
                }
                $i++;
            }
            if($nuevoP){
                array_push($array, [
                    "id" => $idP,
                    "cantidad" => 1
                ]);
            }
            $_SESSION["carro"] = serialize($array);
        }else{
            $_SESSION["carro"] = serialize([
                [
                     "id" => $idP,
                     "cantidad" => 1
                ]
            ]);
        }
        include 'vistas/carroPerfil.php';
    } elseif(isset($_GET["idE"])) {
        // Eliminar producto del carro
    } elseif(isset($_GET["listaGuardada"])) {
        // Añádir el carrrito a carritos guardados
    }


?>

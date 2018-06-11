<?php

    //Aquí añadiremos  porductos al carrito
    //Usaremos la sesión para no tener que guardar nada en base de datos
    if(!isset($_SESSION['carro'])){
        session_start();
    }
    if(isset($_GET["idA"])){
        // Añadir producto del carro
        $idP = $_GET["idA"];
        $precio = $_GET["precio"];


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
                    "cantidad" => 1,
                    "precioUnidad" => $precio
                ]);
            }
            $_SESSION["carro"] = serialize($array);
        }else{
            $_SESSION["carro"] = serialize([
                [
                     "id" => $idP,
                     "cantidad" => 1,
                     "precioUnidad" => $precio
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

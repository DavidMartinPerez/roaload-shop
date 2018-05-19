<?php  
    include('../dao/trastienda.php');

    $obj = new Trastienda();

    if(isset($_GET["juego"])){
        
        $nombre = $_POST["nombre"];
        $desc = $_POST["desc"];

        $result = $obj->guardarGenerico('videojuego', $nombre, $desc); //1-> tabla, 2->nombre, 3->opcional[descripcion]
        
        if($result == true){
            echo "true";
        }else{
            echo "false";
        }
        
    }
?>
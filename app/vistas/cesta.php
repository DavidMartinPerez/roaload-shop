<?php
    session_start();

    if(isset($_SESSION["carro"])){
        $ds = DIRECTORY_SEPARATOR;
        $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
        require_once("{$base_dir}dao{$ds}cesta.php");
        //Añadimos el array de producto que tenemos serializado en la cookie Carro a una variable
        //Le pasaremos a la funcion para que reorecoja todos los datos de cada producto en la cesta
        $arrayCarrito = unserialize($_SESSION["carro"]);

        $cesta = new Cesta;
        $reg = $cesta->obtenerTodosProductos($arrayCarrito);

        echo $reg;
    }else{ ?>
            <div class="container">
                <div class="">
                    <h1>¡Aun no has añadido ningún articulo a tu cesta!</h1>
                </div>
            </div>
    <?php }

?>
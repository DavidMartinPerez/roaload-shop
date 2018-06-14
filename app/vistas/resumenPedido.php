<?php
$localizador = $_GET["id"];

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
require_once("{$base_dir}dao{$ds}tienda.php");

$pedido = new Pedido;
$datosPedido = $pedido->localizarDatos($localizador);
$productos = $pedido->localizarProductos($localizador);
$rowDatosPedido = mysqli_fetch_assoc($datosPedido);

?>
<div class="row letra-roboco">
    <h1>¡Resumen de tu Compra!</h1>
    <h3>Localizador: <?=$localizador?></h3>
    <!-- Datos de la entrega -->
    <div class="col m8 s12">
        Fecha pedido: <?=$rowDatosPedido["fechaPedido"]?>
        <ul class="collapsible">
            <li>
                <div class="collapsible-header datosPersonales letra-mediana"><i class="material-icons">account_circle</i>Datos de entrega</div>
                <div class="collapsible-body">
                    <?=$rowDatosPedido["nombre"]?> <?=$rowDatosPedido["apellidos"]?> <br>
                    DNI: <?=$rowDatosPedido["dni"]?> <br>
                    C/<?=$rowDatosPedido["calle"]?> <?=$rowDatosPedido["numeroCalle"]?> <br>
                    <?=$rowDatosPedido["ciudad"]?>, <?=$rowDatosPedido["provincia"]?><br>
                    CP: <?=$rowDatosPedido["codigoPostal"]?><br>
                    <?=$rowDatosPedido["telefono"]?>
                </div>
            </li>
        </ul>
    </div>
    <!-- Metodo de pago y precio total -->
    <div class="col m4 s12">
        Fecha fin: <?php
            if($rowDatosPedido["fechaFinPedido"] == null){
                echo "---";
            }else{
                $rowDatosPedido["fechaFinPedido"];
            }
        ?>
        <ul class="collapsible">
            <li>
                <div class="collapsible-header datosPersonales letra-mediana"><i class="material-icons">account_circle</i>Datos del pago</div>
                <div class="collapsible-body">
                    <?php

                        if($rowDatosPedido["numeroTarjeta"] == null){
                            echo "Metodo de pago: <br> Tranferencia bancaria";
                        }else{
                            echo "Número de tarjeta: <br>" . $rowDatosPedido["numeroTarjeta"] . "<br>";
                        }

                    ?>
                </div>
            </li>
        </ul>
    </div>
    <!-- productos-->
    <div class="row">
        <table>
            <tr>
                <th>Juego</th>
                <th>Edición</th>
                <th>Plataforma</th>
                <th>Precio Comprado!</th>
                <th>Cantidad</th>
                <th>Precio actual!!</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($productos)){
            ?>
                <tr>
                    <td><?=$row["nombreJuego"]?></td>
                    <td><?=$row["nombreEdicion"]?></td>
                    <td><?=$row["nombrePlataforma"]?></td>
                    <td><?=$row["precio"]?></td>
                    <td><?=$row["cantidad"]?></td>
                    <td><?=$row["precio"]?></td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</div>

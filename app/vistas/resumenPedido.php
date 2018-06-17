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
    <?php
        if($rowDatosPedido["idEstado"] == 1){
            echo '<a class="btn" onclick="loRecibi(<?=$localizador?>)">¡Lo he recibido!</a>';
        }
        if($rowDatosPedido["idEstado"] == 2){
            echo '<a class="btn" onclick="loRecibi(<?=$localizador?>)">¡Lo he recibido!</a>';
        }
    ?>
    <div class="s12" style="margin-left: 10px">
        <h1>¡Resumen de tu Compra!</h1>
        <h3>Localizador: <?=$localizador?></h3>
        <?php
            if($rowDatosPedido["idEstado"] == 1){
                echo '<h4 style="color: orange">Pendiente</h4>';
            }
            if($rowDatosPedido["idEstado"] == 2){
                echo '<h4 style="color: orange">Pago y en espera de envio</h4>';
            }
            if($rowDatosPedido["idEstado"] == 3){
                echo '<h4 style="color: green">Completado</h4>';
            }
            if($rowDatosPedido["idEstado"] == 4){
                echo '<h4 style="color: red">Cancelado</h4>';
            }
        ?>
    <div>
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
                echo $rowDatosPedido["fechaFinPedido"];
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
</div>
    <!-- productos-->
    <div class="row">
        <div class="s12">
            <table class="letra-roboco container responsive-table striped">
                <tr>
                    <th>Juego</th>
                    <th>Edición</th>
                    <th>Plataforma</th>
                    <th>Precio Comprado!</th>
                    <th>Cantidad</th>
                    <th>Precio actual!!</th>
                </tr>
                <?php
                    $precio = 0;
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
                <?php
                        $precio = $precio+$row["precio"];
                    }
                ?>
            </table>
            <div style="text-align: right;margin-right: 196px;margin-top: 20px;font-size:24px; color: darkblue">Precio total: <?=$precio?></div>
        </div>
    </div>
</div>

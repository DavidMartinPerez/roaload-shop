<?php


$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
require_once("{$base_dir}dao{$ds}tienda.php");

session_start();

$idUser = $_SESSION["idUser"];

if(isset($_GET["pendiente"])){
    echo "<h1>Pedidos pendiente</h1>";
    $pedidos = new Pedido;
    $listaPedidos = $pedidos->pedidosPendientes($idUser);
}else{
    echo "<h1>Historial de pedidos</h1>";
    $pedidos = new Pedido;
    $listaPedidos = $pedidos->todosPedidos($idUser);
}

?>
<div class="row">
    <table class="container">
            <tr>
                <th>Id Localizador</th>
                <th>Fecha Pedido</th>
                <?php
                    if(!isset($_GET["pendiente"])){
                        echo "<th>Fecha fin</th>";
                    }
                ?>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($listaPedidos)){
            ?>
                <tr>
                    <td><?=$row["idLocalizador"]?></td>
                    <td><?=$row["fechaPedido"]?></td>
                    <?php
                        if(!isset($_GET["pendiente"])){
                            echo "<td>" . $row["fechaFin"] . "</td>";
                        }
                    ?>
                    <td><?=$row["idEstado"]?></td>
                    <td>
                        <?php if(isset($_GET["pendiente"])){
                            echo '<a class="btn-floating" onclick="cancelarPedido('.$row["idLocalizador"].','.$idUser.')"><i class="material-icons">do_not_disturb_on</i></a>';
                        } ?>
                        <a class="btn-floating" onclick="verPedido(<?=$row["idLocalizador"] ?>, <?=$idUser?>)"><i class="material-icons">dvr</i></a>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
</div>
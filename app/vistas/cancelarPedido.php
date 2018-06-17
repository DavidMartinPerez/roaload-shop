<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
require_once("{$base_dir}dao{$ds}tienda.php");
$pedidos = new Pedido;

if(!isset($_GET["completado"])){
    $listaPedidos = $pedidos->cancelarPedido($_POST["idLocalizador"],$_POST["idUsr"]);
    echo $listaPedidos;
}else{
    $pedidos->pedidoRecibido($_POST["localizador"]);
}
?>
<?php
    require 'conexion.php';
    class Pedido {
        public function realizarPedido($datosPedidos){
            global $bd;
            //print_r($datosPedidos);
            //Calcular la id del pedido = idUsuario + fecha
            $idCalculada = $datosPedidos->idUsr.$datosPedidos->fecha;
            $tarjeta = null;
            $mes = null;
            $anio = null;
            $titular = null;
            $ccTarjeta = null;
            $limpiar = "ALTER TABLE pedido AUTO_INCREMENT = 1";
            $sql = "INSERT INTO `pedido`(`idPedido`, `idLocalizador`, `idUsuario`, `nombre`, `apellidos`, `dni`, `calle`,
                    `numeroCalle`, `ciudad`, `provincia`, `codigoPostal`, `telefono`, `metodoCorreo`,
                    `numeroTarjeta`, `mesTarjeta`, `anoCumplido`, `nombreTitular`, `ccTarjeta`, `fechaPedido`, `fechaFinPedido`, `idEstado`)
            VALUES (null,'$idCalculada',$datosPedidos->idUsr,'$datosPedidos->nombre','$datosPedidos->apellidos','$datosPedidos->dni','$datosPedidos->calle','$datosPedidos->numeroCalle',
                    '$datosPedidos->ciudad','$datosPedidos->provincia',$datosPedidos->cp,$datosPedidos->telefono,'$datosPedidos->metodoCorreo',
                    null,null,null,null,null,'$datosPedidos->fecha',null,1)";

            //TODO: Realizar pago con tarjeta
            $resCrearPedido = $bd->query($sql);
            $buscarId = "SELECT idPedido FROM pedido WHERE idLocalizador = '$idCalculada'";
            $id = $bd->query($buscarId);
            $row = mysqli_fetch_assoc($id);
            $idPedido = $row["idPedido"];
            //Rellenar el carrito del pedido
            $productos = $datosPedidos->arrayCarrito;
            $i = 0;
            $length = count($productos);
            $sqlPedidos = "INSERT INTO `productoscomprados`(`idPedido`, `idProducto`, `cantidad`, `precio`) VALUES";
            while($length > $i){
                $idProducto = $productos[$i]['id'];
                $cantidadProducto = $productos[$i]["cantidad"];
                $precioProducto = $productos[$i]["precioUnidad"];
                if(!$i == 0){
                    $sqlPedidos .= ",";
                }
                $sqlPedidos .= "($idPedido,$idProducto,$cantidadProducto,$precioProducto)";
                $i++;
            }
            $resPedido = $bd->query($sqlPedidos);
            //TODO: COMPROBAR QUE LAS CONSULTAS SE REALIZARON BIEN
            if($resCrearPedido == $resPedido){
                return $resCrearPedido;
            } else{
                return false;
            }
        }
    } //class RealizarPedido
?>

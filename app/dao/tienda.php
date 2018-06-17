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
                //AUMENTAR VENTAS DE ESE PRODUCTO Y DISMINUIR STOCK
                $sqlStock = "UPDATE versionjuego SET stock= stock-1 WHERE idVersion='$idProducto'";
                $bd->query($sqlStock);
                $sqlVentas = "UPDATE versionjuego SET ventas=ventas+1 WHERE idVersion='$idProducto'";
                $bd->query($sqlVentas);
                $cantidadProducto = $productos[$i]["cantidad"];
                $precioProducto = $productos[$i]["precioUnidad"];
                if(!$i == 0){
                    $sqlPedidos .= ",";
                }
                $sqlPedidos .= "($idPedido,$idProducto,$cantidadProducto,$precioProducto)";
                $i++;
            }
            $resPedido = $bd->query($sqlPedidos);
            if($resCrearPedido == $resPedido){
                return '{"estado": true, "msg":"¡Gracias por su compra!", "idLocalizable":"'.$idCalculada.'"}';
            } else{
                return '{"estado": false, "msg":"¡Error en el pedido por favor intentelo más tarde!"}';
            }
        }//

        public function localizarProductos($localizador){
            global $bd;

            $sqlID = "SELECT `idPedido` FROM `pedido` WHERE `idLocalizador` = '$localizador'";

            $id = $bd->query($sqlID);

            $id = mysqli_fetch_assoc($id);
            $id = $id["idPedido"];

            $sqlProduct = "SELECT productoscomprados.idPedido, productoscomprados.cantidad , productoscomprados.precio,
            videojuego.nombreJuego, edicion.nombreEdicion, plataforma.nombrePlataforma, versionjuego.precio
            FROM `productoscomprados`,`versionjuego`, `plataforma`, `edicion`, `videojuego`
            WHERE `idPedido` = $id AND versionjuego.idVersion = productoscomprados.idProducto
            AND plataforma.idPlataforma = versionjuego.idPlataforma AND versionjuego.idEdicion = edicion.idEdicion
            AND videojuego.idJuego = versionjuego.idJuego";

            $reg = $bd->query($sqlProduct);

            return $reg;

        }//localizarDatos

        public function localizarDatos($localizador){
            global $bd;

            $sqlDatosPedido = "SELECT * FROM `pedido` WHERE `idLocalizador` = '$localizador'";

            $reg = $bd->query($sqlDatosPedido);

            return $reg;

        }//localizarProductos
        public function pedidosPendientes($idUsr){
            global $bd;
            $sql = "SELECT * FROM `pedido` WHERE `idEstado` != 3 AND `idEstado` != 4 AND idUsuario = $idUsr ORDER BY `fechaPedido` DESC";

            $reg = $bd->query($sql);

            return $reg;
        }//pedidosPendientes
        public function todosPedidos($idUser){
            global $bd;
            $sql = "SELECT * FROM `pedido` WHERE idUsuario = $idUser ORDER BY `fechaPedido` DESC";

            $reg = $bd->query($sql);

            return $reg;
        }//todosPedidos

        public function cancelarPedido($localizador, $idUser){
            global $bd;


            $sqlComprobar = "SELECT idEstado FROM pedido WHERE idLocalizador = '$localizador'";
            $reg = $bd->query($sqlComprobar); //Ejecuta la sentencia
            if($reg->num_rows) {
                $row = mysqli_fetch_assoc($reg);
                if($row["idEstado"] == 1){
                    $fecha = date('YmdHis');
                    $sqlActualizar = "UPDATE `pedido` SET `idEstado`=4,`fechaFinPedido`='$fecha' WHERE `idLocalizador` = '$localizador'";
                    $reg = $bd->query($sqlActualizar);
                    return '{"pedido":4,"msg":"Tu pedido ha sido cancelado"}';
                }else{
                    return '{"pedido":2,"msg":"¡Tu pedido ha sido pagado! Por favor explicanos en un mensaje al soporte técnico"}';
                }
            }
        }//
        public function pedidoRecibido($localizador){
            global $bd;

            $fecha = date('YmdHis');
            $sqlActualizar = "UPDATE `pedido` SET `idEstado`=3,`fechaFinPedido`='$fecha' WHERE `idLocalizador` = '$localizador'";
            $reg = $bd->query($sqlActualizar);
            return $reg;
        }//
        public function mensajeSoporte($id,$nombre,$correo,$mensaje){
            global $bd;
            //INSERT INTO `mensaje`(`idMesaje`, `idUser`, `nombre`, `correo`, `mensaje`, `fecha`) VALUES (null,$id,'$nombre','$correo','$mensaje','$fecha')
            $fecha = date('YmdHis');
            $sqlMensaje = "INSERT INTO `mensaje`(`idMesaje`, `idUser`, `nombre`, `correo`, `mensaje`, `fecha`) VALUES (null,$id,'$nombre','$correo','$mensaje','$fecha')";

            $reg = $bd->query($sqlMensaje);
            return $reg;
        }
    } //class Pedido
?>

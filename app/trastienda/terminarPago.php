<?php
session_start();

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
require_once("{$base_dir}dao{$ds}tienda.php"); //aniade las constantes

class DatosPedido {
    //datos perrsonales y pedido
    public $nombre;
    public $apellidos;
    public $dni;
    public $calle;
    public $numeroCalle;
    public $ciudad;
    public $provincia;
    public $cp;
    public $telefono;
    public $metodoCorreo;
    //datos del pago
    public $numeroTarjeta;
    public $mes;
    public $anio;
    public $titular;
    public $ccTarjeta;
    //Productos
    public $arrayCarrito;
    //Datos del Usuario emisor
    public $idUsr;
    public $fecha;
    public function __construct(
        $nombre,$apellidos,$dni,$calle,$numeroCalle,$ciudad,$provincia,$cp,$telefono,$metodoCorreo,$tarjeta,$mes,$anio,$titular,$ccTarjeta,$carrito,$idUsr,$fecha){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->dni = $dni;
            $this->calle = $calle;
            $this->numeroCalle = $numeroCalle;
            $this->ciudad = $ciudad;
            $this->provincia = $provincia;
            $this->cp = $cp;
            $this->telefono = $telefono;
            $this->metodoCorreo = $metodoCorreo;
            $this->numeroTarjeta = $tarjeta;
            $this->mes = $mes;
            $this->anio = $anio;
            $this->titular = $titular;
            $this->ccTarjeta = $ccTarjeta;
            $this->arrayCarrito = $carrito;
            $this->idUsr = $idUsr;
            $this->fecha = $fecha;
    }
}
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$dni = $_POST["dni"];
$calle = $_POST["calle"];
$numeroCalle = $_POST["numeroCalle"];
$ciudad = $_POST["ciudad"];
$provincia = $_POST["provincia"];
$cp = $_POST["cp"];
$telefono = $_POST["telefono"];
$metodoCorreo = $_POST["metodoCorreo"];

//Método de pago con tarjeta o nulos si es tranferencia...
$datosPago = $_POST["datosPago"];
$carro = $_SESSION["carro"];
$datos = $_SESSION["datos"];


// cogemos la id del usuario en -> unserialize($datos)[2]
// el pedido array de pedidos en -> unserialize($carro)
/*
** El pedido se guardará con un ID de Carro del Pedido el cual se guardara en otra tabla
** El Pedido tendrá ID del USUARIO(Datos del usuario), VALORES, DIRECCION...
** AUNQUE LA DIRECCION ESTE GUARDADA EN EL USUARIO AQUI TMB SE GUARDARÁ puede ser diferente!
** TABLA PRODUCTOSCOMPRA -> ID Pedido(FK) productos cantidad
** TABLA PEDIDO -> ID Pedido(pk), ID USUARIO(fk), DATOS DIRECCION
** TODO: CREAR PRIMERO PEDIDO Y LUEGO IR AÑADIENDOLE LOS PRODUCTOS edn la tabla PRODUCTOSdelPEDIDOS
** Primero crear el pedido y luego rellenarlo
** ID DEL PEDIDO SER PERSONALIZABLE PARA PODER COMPROBAR SU VALIDEZ SERA IDUSER + DIA+HORA + NUMERO ALEATORIO ENTRE 1 y 9999
** Por que guardarlo así? Porque puede pedirlo para otro compañero desde tu propia cuenta...
*/
$arrayCarrito = unserialize($carro);
$idUsr = unserialize($datos)[2];
$curr_timestamp = date('YmdHis');

//#############################################################
//#############################################################

$datosPedidos = new DatosPedido($nombre,$apellidos,$dni,$calle,$numeroCalle,$ciudad,$provincia,$cp,$telefono,$metodoCorreo,$datosPago[0],$datosPago[1],$datosPago[2],$datosPago[3],$datosPago[4],$arrayCarrito,$idUsr,$curr_timestamp);

//TODO: TERMINAR ESTO
$object = new Pedido;
$estado = $object->realizarPedido($datosPedidos);
//Eliminar el carrito!
unset($_SESSION["carro"]);
// Segun el estado que nos llega borramos carrito y reenviamos a perfil/pedidos/pendientes

    echo $estado;


?>
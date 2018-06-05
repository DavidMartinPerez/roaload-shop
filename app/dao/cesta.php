<?php
    //TODO: Probar que todo funcione
	// Crear metodo para aumentar o disminuir el stock del producto y mostrarlo
    //FIXME: A lo mejor hay errores con la exportacion del array de objectos.
    //TODO: mirar la otra vista que estará preparada para mostrar el objecto y funcionar directamente.
	class ProductoCesta{ // Objecto con los datos que se mostrarán en cesta
		public $idProducto; //Id del producto
		public $cantidad; //Cantidad de articulos que a seleccionado
		public $nombreJuego; // Nombre del Articulo
		public $nombreEdicion; // Nombre de la edicion
		public $nombrePlataforma; // Nombre de la plataforma
		public $nombreDistribuidora; // Nombre de la distribuidora
		public $precioPorArticulo; // Precio del producto
		public function __construct($id,$cantidad,$nombreJuego,$nombreEdicion,$nombrePlataforma,$nombreDistribuidora,$precio){
			$this->idProducto = $id;
			$this->cantidad = $cantidad;
			$this->nombreJuego = $nombreJuego;
			$this->nombreEdicion = $nombreEdicion;
			$this->nombrePlataforma = $nombrePlataforma;
			$this->nombreDistribuidora = $nombreDistribuidora;
			$this->precio = $precio;
		}
	}
    require 'conexion.php';
    class Cesta {
        //######### Obtener todos los productos de la cesta ##############
        public function obtenerTodosProductos($arrayCarrito){
			// Se obtienen los datos por la id y se añaden a un objecto.
            global $bd;
			$ArrayObjectoProdutos = [];
			$i = 0;
            $ArrayLength = count($arrayCarrito);
            while($i < $ArrayLength){
				//SQL Para recuperar todos los Juegos y Consolas que esten habilitados!
				$sqlDatosCesta = "SELECT version.idVersion, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora,version.img
				FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
				WHERE version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.activo = 1
				AND (idVersion = ". $arrayCarrito[$i]["id"] .")";


				$reg = $bd->query($sqlDatosCesta);

				$datos = mysqli_fetch_assoc($reg);
				//Creamos los datos del objecto.
				$IdProducto = $arrayCarrito[$i]["id"];
				$cantidad = $arrayCarrito[$i]["cantidad"];
				$nombreJuego = $datos["nombreJuego"];
				$nombreEdicion = $datos["nombreEdicion"];
				$nombrePlataforma = $datos["nombrePlataforma"];
				$nombreDistribuidora = $datos["nombreDistribuidora"];
				$precio = $datos["precio"];
				//Creamos el objecto con los datos.
				$objecto = new ProductoCesta($IdProducto,$cantidad,$nombreJuego,$nombreEdicion,$nombrePlataforma,$nombreDistribuidora,$precio);

				// Lo añadimos al array de objectos que devolveremos.
				array_push($ArrayObjectoProdutos, $objecto);
				//aumnetamos la variable para el siguiente producto.
				$i++;
            }
            return $ArrayObjectoProdutos;
			$bd->close();
        }
        //########## /Obtener todos los productos de la cesta ##################
    } //class Producto
?>

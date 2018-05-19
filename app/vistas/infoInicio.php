<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds; //Obtenemos el path actual
require_once("{$base_dir}dao{$ds}productos.php"); //aniade las constantes
$reg = null;
if(isset($_GET["todo"])){
    $objP = new Producto;
	$reg = $objP->obtenerTodosProductos();
}
if(isset($_GET["nsw"])){
    $nombrePlt = 'nsw';
    $filtro = '3';
    $limit = $_GET["filtro"] ?? 4;
    $objP = new Producto;
    $reg = $objP->filtroProductos($filtro, $limit, $nombrePlt);
}
if(isset($_GET["ps4"])){
    $nombrePlt = 'ps4';
	$filtro = '2';
	$limit = $_GET["filtro"] ?? 4;
	$objP = new Producto;
	$reg = $objP->filtroProductos($filtro, $limit, $nombrePlt);

}
if(isset($_GET["xone"])){
    $nombrePlt = 'xone';
	$filtro = '7';
	$limit = $_GET["filtro"] ?? 4;
	$objP = new Producto;
	$reg = $objP->filtroProductos($filtro, $limit, $nombrePlt);

}

if(isset($_GET["pc"])){
    $nombrePlt = 'pc';
	$filtro = '4';
	$limit = $_GET["filtro"] ?? 4;
	$objP = new Producto;
	$reg = $objP->filtroProductos($filtro, $limit, $nombrePlt);
}
if(isset($_GET["n3ds"])){
    //TODO: Termninar
}
if(isset($_GET["reserva"])){
    //TODO: Termninar
}
if(isset($_GET["accesorios"])){
    //TODO: Termninar
}
if($reg == NULL){
    echo "<div class='container'>Lo sentimos no hemos encontrado nada :(</div>";
}else{
?>
<div class="row">
        <div class="">
            <!-- Menú de filtro? -->
        </div>
        <div class="col l12">
        <?php while($row = mysqli_fetch_assoc($reg)){
            if($row["img"] == NULL){
                $img = "00.png";
            }else{
                $img = $row["img"];
            }
            ?>
            <div class="col m4 l3">
                <div class="card carta-margin">
                    <div class="center-align <?=$row['nombrePlataforma']?>"><?=$row["nombrePlataforma"]?></div>
                    <div class="card-image">
                        <a id="<?=$row['idVersion']?>" onclick="infoVersion(this.id, '<?=$row["nombreJuego"]?>', '<?=$row["nombrePlataforma"]?>');"><img class="tamaño-img" src="assets/img/caratula/<?=$img ?>"></a>
                    </div>
                    <p style="height: 80px" class="card-title center-align"><?=$row["nombreJuego"]?></p>
                    <p class="center-align"><?=$row["nombreEdicion"]?>
                    <div class="card-action center-align">
                        <span class="pink-text"><?=$row["precio"]?> €</span>
                        <a onclick="añadirCarrito(this.id)" id="<?=$row['idVersion']?>" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">shopping_cart</i></a>
                    </div>
                </div>
            </div>
        <?php }} ?>
    </div>
</div>

<?php

    $bd = @new mysqli("localhost", "root", "");
    $bd->select_db("tienda");
    //los valores recogidos para la tablaVersiones
    $nombreTabla = $_POST["nombreJuegoActualizado"];
    $edicionTabla = $_POST["edicionJuegoActualizado"];
    $ptlTabla = $_POST["plataformaJuegoActualizado"];
    $disTabla = $_POST["disJuegoActualizado"];
    //los valores recogidos para la sql
    $idVersion = $_POST["idVersion"];
    $nombre = $_POST["juegoActualizado"];
    $ptl = $_POST["plataformaActualizar"];
    $edicion = $_POST["edicionActualizar"];
    $dis = $_POST["disActualizar"];
    $precio = $_POST["precioActualizar"];
    $stock = $_POST["stockActualizar"];
    $fecha = $_POST["fechaActualizar"];

    $sqlUpdate = "UPDATE `versionjuego` SET `idJuego`=$nombre,`idPlataforma`=$ptl,`idEdicion`=$edicion,`idDistribuidora`=$dis,`precio`=$precio,`stock`=$stock,`fechaSalida`='$fecha' WHERE idVersion=$idVersion";
    echo $sqlUpdate;
    $bd->query($sqlUpdate);
	$bd->close();
?>
    <!-- creamos el contenido del tr para sustituirlo-->
    <td class="nombreJuegoTabla" id="<?=$nombre ?>"><?=$nombreTabla ?></td>
    <td class="edicionTabla" id="<?=$edicion ?>"><?=$edicionTabla ?></td>
    <td class="plataformaTabla" id="<?=$ptl?>"><?=$ptlTabla ?></td>
    <td class="precioTabla"><?=$precio ?></td>
    <td class="stockTabla" ><?=$stock ?></td>
    <td class="fechaSalidaTabla"><?=$fecha ?></td>
    <td class="disTabla" id="<?=$dis ?>"><?=$disTabla ?></td>
    <td><a id="<?=$idVersion?>" onclick="modificarVersion(this)" class="editar"><button type="button" class="btn amber darken-4"><i class="material-icons">edit</i></button></a>
    <a class="eliminarVersion" onclick="borrar(this)" id="<?=$idVersion ?>"><button type="button" class="btn red darken-2"><i class="material-icons">delete</i></button></a></td>

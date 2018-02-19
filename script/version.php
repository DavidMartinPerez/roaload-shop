<?php
	$bd = @new mysqli("localhost", "root", "");
	$bd->select_db("tienda");
	$campo = $_POST["campo"] ?? "idVersion"; //Sera por el campo que ordene
	$orden = $_POST["orden"] ?? "ASC";  //Sera ASC o DESC
	$sqlJOIN = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, ed.idEdicion, dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
	 			FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
				where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora ORDER BY $campo $orden";
				/* ORDER BY `ptl`.`nombrePlataforma` $orden" */
	$reg = $bd->query($sqlJOIN);
	$bd->close();
?>


<a  class="versionNueva "><button type="button" onclick="nuevaVersion()" class="btn-version btn btn-default navbar-btn">Nueva Versión</button></a>
<h2 >Lista de Juegos con sus Versiones</h2>
<table class="highlight bordered tablaVersiones">
	<thead>
		<tr>
			<th onclick="">Nombre</th>
			<th>Edición</th>
			<th>Plataforma</th>
			<th>Precio</th>
			<th>Stock</th>
			<th>Fecha Salida</th>
			<th>Nombre Distribuidora</th>
			<th>Acción</th>
		</tr>
	</thead>
	<?php while($row = mysqli_fetch_assoc($reg)){ ?>
		<tr id="parte_<?=$row['idVersion'] ?>">
			<td class="nombreJuegoTabla" id="<?=$row['idJuego'] ?>"><?=$row["nombreJuego"] ?></td>
			<td class="edicionTabla" id="<?=$row['idEdicion'] ?>"><?=$row["nombreEdicion"] ?></td>
			<td class="plataformaTabla" id="<?=$row['idPlataforma'] ?>"><?=$row["nombrePlataforma"] ?></td>
			<td class="precioTabla"><?=$row["precio"] ?></td>
			<td class="stockTabla" ><?=$row["stock"] ?></td>
			<td class="fechaSalidaTabla"><?=$row["fechaSalida"] ?></td>
			<td class="disTabla" id="<?=$row['idDistribuidora'] ?>"><?=$row["nombreDistribuidora"] ?></td>
			<td><a id="<?=$row['idVersion'] ?>" onclick="modificarVersion(this)" class="editar"><button type="button" class="btn amber darken-4"><i class="material-icons">edit</i></button></a>
			<a class="eliminarVersion" onclick="borrar(this)" id="<?=$row['idVersion'] ?>"><button type="button" class="btn red darken-2"><i class="material-icons">delete</i></button></a></td>
		</tr>
	<?php }
	?>
</table>

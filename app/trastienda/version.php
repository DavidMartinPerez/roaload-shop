<?php
	include('../dao/trastienda.php');

	$campo = $_POST["campo"] ?? "idVersion"; //Sera por el campo que ordene
	$orden = $_POST["orden"] ?? "ASC";  //Sera ASC o DESC

    $objV = new Trastienda();
    $reg = $objV->obtenerVersion($campo, $orden);
?>

<div class="row">
	<div class="col-md-8">
		<h1>Administración de Productos</h1>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<div class="panel-content">

				<h5>Filtros</h5>
				<select class="selectOrdenar browser-default col s3">
					<option value="nombreJuego">Juego</option>
					<option value="nombreEdicion">Edicion</option>
					<option value="nombrePlataforma">Plataforma</option>
					<option value="precio">Precio</option>
					<option value="stock">Stock</option>
					<option value="fechaSalida">Fecha Salida</option>
					<option value="nombreDistribuidora">Distribuidora</option>
				</select>
				<select class="selectAlternal browser-default col s3">
					<option value="ASC">Ascendente</option>
					<option value="DESC">Descendente</option>
				</select>
				<button class="btn" onclick="ordenar()">Filtrar</button>
				<br><br>

				<h3 class="heading"><i class="fa fa-square"></i>Lista de Juegos con sus Versiones </h3>
				<a id="<?=$row['idVersion'] ?>" onclick="modificarVersion(this)" class="editar"><button type="button" class="btn label label-success"><i class="material-icons">nueva versión</i></button></a>
				<div class="table-responsive">
					<table class="table table-striped no-margin">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Edición</th>
							<th>Plataforma</th>
							<th>Precio</th>
							<th>Stock</th>
							<th>Fecha Salida</th>
							<th>Nombre Distribuidora</th>
							<th>Habilitado</th>
							<th>Acción</th>
						</tr>
					</thead>
						<tbody>
							<?php while($row = mysqli_fetch_assoc($reg)){ ?>
							<tr id="parte_<?=$row['idVersion'] ?>">
							<td class="nombreJuegoTabla" id="<?=$row['idJuego'] ?>"><?=$row["nombreJuego"] ?></td>
							<td class="edicionTabla" id="<?=$row['idEdicion'] ?>"><?=$row["nombreEdicion"] ?></td>
							<td class="plataformaTabla" id="<?=$row['idPlataforma'] ?>"><?=$row["nombrePlataforma"] ?></td>
							<td class="precioTabla"><?=$row["precio"] ?></td>
							<td class="stockTabla" ><?=$row["stock"] ?></td>
							<td class="fechaSalidaTabla"><?=$row["fechaSalida"] ?></td>
							<td class="disTabla" id="<?=$row['idDistribuidora'] ?>"><?=$row["nombreDistribuidora"] ?></td>
							<td class="habilitado"><?=$row['activo']?></td>
							<td><a id="<?=$row['idVersion'] ?>" onclick="modificarVersion(this)" class="editar"><button type="button" class="btn label label-warning"><i class="material-icons">editar</i></button></a>
							<a class="eliminarVersion" onclick="deshabilitar(this)" id="<?=$row['idVersion'] ?>">
								<!-- FIXME: tooltip bootstrap -->
								<button type="button" class="btn label label-danger" data-toggle="tooltip" data-placement="bottom" title="Deshabilita una versión de un videojuego por problemas o por que ya esta descatalogado">
									<i class="material-icons">deshabilitar</i>
								</button>
							</a></td>
							</tr>
							<?php }
							?>
					</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

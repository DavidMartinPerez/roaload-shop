<?php
	include('../dao/trastienda.php');

	$campo = $_POST["campo"] ?? "idVersion"; //Sera por el campo que ordene
	$orden = $_POST["orden"] ?? "ASC";  //Sera ASC o DESC

	$objV = new Trastienda();
	if(isset($_GET["des"])){
		$objV->desJuego($_POST["id"]);
	}
	if(isset($_GET["hab"])){
		$objV->habJuego($_POST["id"]);
	}
	if(isset($_GET["buscar"])){
		$reg = $objV->buscarJuego($_POST["juego"]);
	}else{
		$reg = $objV->obtenerVersion($campo, $orden);
	}
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

				<h5>Buscar Por nombre juego</h5>
				<input id="nombreJugarBuscar" type="text" />
				<button class="btn" onclick="buscar()">Filtrar</button>
				<br><br>

				<h3 class="heading"><i class="fa fa-square"></i>Lista de Juegos con sus Versiones </h3>
				<a id="<?=$row['idVersion'] ?>" onclick="versionNueva()" class="editar"><button type="button" class="btn label label-success"><i class="material-icons">nueva versión</i></button></a>
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
							<td><a id="<?=$row['idVersion'] ?>" onclick="modificarVersin(this)" class="editar"><button type="button" class="btn label label-warning"><i class="material-icons">editar</i></button></a>
							<?php 
								if($row['activo'] == 0){ ?>
								<a class="habilitarVersion" onclick="activarVersion(<?=$row['idVersion']?>)" id="<?=$row['idVersion'] ?>">
									<!-- FIXME: tooltip bootstrap -->
									<button type="button" class="btn label label-success" data-toggle="tooltip" data-placement="bottom" title="Deshabilita una versión de un videojuego por problemas o por que ya esta descatalogado">
										<i class="material-icons">activar</i>
									</button>
								</a>
							<?php } else {
							?>
								<a class="eliminarVersion" onclick="deshabilitarVersion(<?=$row['idVersion']?>)" id="<?=$row['idVersion'] ?>">
									<!-- FIXME: tooltip bootstrap -->
									<button type="button" class="btn label label-danger" data-toggle="tooltip" data-placement="bottom" title="Deshabilita una versión de un videojuego por problemas o por que ya esta descatalogado">
										<i class="material-icons">deshabilitar</i>
									</button>
								</a>
							<?php }
							?>
							</td>
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
<!--  MODAL JUEGO NUEVO -->
<div id="nuevoJuego" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Nuevo Juego</h4>
			</div>
			<div class="modal-body">
				<form id="nuevoJuegoForm" data-parsley-validate novalidate>
					<div class="form-group">
						<label for="text-input1">Nombre</label>
						<input type="text" id="nombreJuegoNuevo" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="text-input2">Descripción</label>
						<textarea type="text" id="descripcionJuegoNuevo" class="form-control" required data-parsley-minlength="10" required></textarea>
					</div>
					<br/>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-success">Crear</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<div>
<!--  /.MODAL JUEGO NUEVO -->
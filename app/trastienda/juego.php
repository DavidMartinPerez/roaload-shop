<?php
	include('../dao/trastienda.php');

	$objV = new Trastienda();
    $reg = $objV->recuperarRegistros('videojuego');
?>

<div class="row">
	<div class="col-md-8">
		<h1>Administración de Juego</h1>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<div class="panel-content">
				<h3 class="heading"><i class="fa fa-square"></i> Lista de Juegos </h3>
				<a href="#nuevoJuego" onclick="juegoNuevo()"><button type="button" class="btn label label-success"><i class="material-icons">Nuevo Juego</i></button></a>
				<div class="table-responsive">
					<table class="table table-striped no-margin">
					<thead>
						<tr>
				            <th>Nombre</th>
							<th>Descripción</th>
						</tr>
					</thead>
						<tbody>
							<?php while($row = mysqli_fetch_assoc($reg)){ ?>
								<tr id="parte_<?=$row['idJuego'] ?>">
						            <td class=""><?=$row["nombreJuego"] ?></td>
									<td class=""><?=$row["descripJuego"] ?></td>
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
<div-->
<!--  /.MODAL JUEGO NUEVO -->
<?php
	include('../dao/trastienda.php');

	$objV = new Trastienda();
	$reg = $objV->recuperarRegistros('edicion');
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
				<h3 class="heading"><i class="fa fa-square"></i> Lista de Ediciones </h3>
				<a href="#nuevaEdicion" onclick="edicionNueva()"><button type="button" class="btn label label-success"><i class="material-icons">Nueva Edicion</i></button></a>
				<div class="table-responsive">
					<table class="table table-striped no-margin">
					<thead>
						<tr>
				            <th>ID</th>
							<th>Edicion</th>
							<th>Descripción</th>
						</tr>
					</thead>
						<tbody>
							<?php while($row = mysqli_fetch_assoc($reg)){ ?>
								<tr id="parte_<?=$row['idEdicion'] ?>">
									<td class="idTabla" id="<?=$row['idEdicion'] ?>"><?=$row["idEdicion"] ?></td>
									<td class="nombreEdicionTabla" id="<?=$row['nombreEdicion'] ?>"><?=$row["nombreEdicion"] ?></td>
									<td class="descripcionEdicion"><?=$row['descripcion'] ?></td>
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

<!--  MODAL EDICION NUEVO -->
<div id="nuevaEdicion" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Nueva edición</h4>
			</div>
			<div class="modal-body">
				<form id="nuevaEdicionForm" data-parsley-validate novalidate>
					<div class="form-group">
						<label for="text-input1">Nombre</label>
						<input type="text" id="nombreEdicionNueva" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="text-input2">Descripción</label>
						<textarea type="text" id="descripcionEdicionNueva" class="form-control" required data-parsley-minlength="10" required></textarea>
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
<!--  /.MODAL EDICION NUEVO -->

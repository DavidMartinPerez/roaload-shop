<?php
include('../dao/trastienda.php');

$objV = new Trastienda();
$reg = $objV->recuperarRegistros('plataforma');
?>

<div class="row">
	<div class="col-md-8">
		<h1>Administración de Plataforma</h1>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel-content">
					<h3 class="heading"><i class="fa fa-square"></i> Lista de plataformas </h3>
					<a onclick="plataformaNueva()"><button type="button" class="btn label label-success"><i class="material-icons">Nueva Plataforma</i></button></a>
					<div class="table-responsive">
						<table class="table table-striped no-margin">
						<thead>
							<tr>
								<th>ID</th>
								<th>Plataforma</th>
							</tr>
						</thead>
							<tbody>
								<?php while($row = mysqli_fetch_assoc($reg)){ ?>
									<tr id="parte_<?=$row['idPlataforma'] ?>">
										<td class="idTabla" id="<?=$row['idPlataforma'] ?>"><?=$row["idPlataforma"] ?></td>
										<td class="nombrePlataformaTabla" id="<?=$row['nombrePlataforma'] ?>"><?=$row["nombrePlataforma"] ?></td>
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
<!--  MODAL PLATAFORMA NUEVO -->
<div id="nuevaPlataforma" class="modal fade" backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Nueva Plataforma</h4>
			</div>
			<div class="modal-body">
				<form id="nuevaPlataformaForm" data-parsley-validate novalidate>
					<div class="form-group">
						<label for="text-input1">Nombre</label>
						<input type="text" id="nombrePlataformaNueva" class="form-control" required />
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
<!--  /.MODAL PLATAFORMA NUEVO -->
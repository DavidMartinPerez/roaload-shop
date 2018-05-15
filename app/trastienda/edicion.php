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
				<a onclick="nuevoEdicion()"><button type="button" class="btn label label-success"><i class="material-icons">Nueva Edicion</i></button></a>
				<div class="table-responsive">
					<table class="table table-striped no-margin">
					<thead>
						<tr>
				            <th>ID</th>
							<th>Edicion</th>
						</tr>
					</thead>
						<tbody>
							<?php while($row = mysqli_fetch_assoc($reg)){ ?>
								<tr id="parte_<?=$row['idEdicion'] ?>">
									<td class="idTabla" id="<?=$row['idEdicion'] ?>"><?=$row["idEdicion"] ?></td>
						            <td class="nombreEdicionTabla" id="<?=$row['nombreEdicion'] ?>"><?=$row["nombreEdicion"] ?></td>
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

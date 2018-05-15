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
				<a onclick="nuevaPlataforma(this)"><button type="button" class="btn label label-success"><i class="material-icons">Nueva Plataforma</i></button></a>
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

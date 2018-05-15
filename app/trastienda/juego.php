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
				<a onclick="nuevoJuego()"><button type="button" class="btn label label-success"><i class="material-icons">Nuevo Juego</i></button></a>
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

<?php
	include('../dao/conexion.php');
    $sql = "SELECT `idMesaje`, `idUser`, `nombre`, `correo`, `mensaje`, `fecha` FROM `mensaje` WHERE 1 ORDER BY `fecha` DESC LIMIT 15";
    $reg = $bd->query($sql);
?>
<div class="row">
	<div class="col-md-8">
		<h1>Mensajes</h1>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<div class="panel-content">
				<h3 class="heading"><i class="fa fa-square"></i> Lista de Juegos </h3>
				<div class="table-responsive">
					<table class="table table-striped no-margin">
					<thead>
						<tr>
				            <th>nombre</th>
							<th>correo</th>
                            <th>mensaje</th>
						</tr>
					</thead>
						<tbody>
							<?php while($row = mysqli_fetch_assoc($reg)){ ?>
								<tr id="parte_<?=$row['idMensaje'] ?>">
						            <td class=""><?=$row["nombre"] ?></td>
									<td class=""><?=$row["correo"] ?></td>
                                    <td class=""><?=$row["mensaje"] ?></td>
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
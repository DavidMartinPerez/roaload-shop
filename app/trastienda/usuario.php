<?php
	include('../dao/conexion.php');
    $sql = "SELECT * FROM `usuario` ORDER BY `idUsuario` DESC";
    $reg = $bd->query($sql);
?>
<div class="row">
	<div class="col-md-8">
		<h1>Usuarios</h1>
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
				            <th>Usuario</th>
							<th>Fecha Registro</th>
                            <th>Ultimo Log</th>
                            <th>Eliminarlo</th>
						</tr>
					</thead>
						<tbody>
							<?php while($row = mysqli_fetch_assoc($reg)){ ?>
								<tr id="parte_<?=$row['idJuego'] ?>">
						            <td class=""><?=$row["nombreUsuario"] ?></td>
									<td class=""><?=$row["fechaRegistro"] ?></td>
                                    <td class=""><?=$row["ultimoLog"] ?></td>
                                    <td>
                                    <a onclick="bloquear()"><button type="button" class="btn label label-danger"><i class="material-icons">Bloquear</i></button></a>
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
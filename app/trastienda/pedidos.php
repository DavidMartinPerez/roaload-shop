<?php
	include('../dao/conexion.php');
    $sql = "SELECT `idPedido`, `idLocalizador`, `idUsuario`, `nombre`, `apellidos`, `dni`, `calle`, `numeroCalle`, `ciudad`, `provincia`, `codigoPostal`,
    `telefono`, `metodoCorreo`, `numeroTarjeta`, `mesTarjeta`, `anoCumplido`,
    `nombreTitular`, `ccTarjeta`, `fechaPedido`, `fechaFinPedido`, `idEstado` FROM `pedido` ORDER BY `fechaPedido` DESC LIMIT ".$_GET["limit"]."";
    $reg = $bd->query($sql);
?>
<div class="row">
	<div class="col-md-8">
		<h1>Pedidos</h1>
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
				            <th>idLocalizador</th>
							<th>fechaPedido</th>
                            <th>fechaFinPedido</th>
                            <th>Estado</th>
						</tr>
					</thead>
						<tbody>
							<?php while($row = mysqli_fetch_assoc($reg)){ ?>
								<tr id="parte_<?=$row['idPedido'] ?>">
						            <td class=""><?=$row["idLocalizador"] ?></td>
									<td class=""><?=$row["fechaPedido"] ?></td>
                                    <?php if(!$row["fechaFinPedido"]==null){ ?>
                                        <td class=""><?=$row["fechaFinPedido"] ?></td>
                                    <?php }else{ ?>
                                        <td>---</td>
                                    <?php } ?>
                                    <?php
                                    if($row["idEstado"] == 1){
                                        echo '<td><span class="label label-warning">Pendiente</span></td>';
                                    }
                                    if($row["idEstado"] == 2){
                                        echo '<td><span class="label label-warning">En proceso</span></td>';
                                    }
                                    if($row["idEstado"] == 3){
                                        echo '<td><span class="label label-success">Completado</span></td>';
                                    }
                                    if($row["idEstado"] == 4){
                                        echo '<td><span class="label label-danger">Cancelado</span></td>';
                                    }
                                    ?>
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
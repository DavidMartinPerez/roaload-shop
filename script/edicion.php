<?php
	include "conexion.php";

	$sql = "SELECT * FROM `edicion`";
	$reg = $bd->query($sql);
	$bd->close();
?>

<h1>Administración de Ediciones</h1>
<br>
<a  class="versionEdicion"><button type="button" onclick="nuevaEdicion()" class="btn-version btn btn-default navbar-btn">Nueva Edicion</button></a>
<h2 >Lista de Ediciones</h2>
<table class="highlight bordered tablaEdiciones">
	<thead>
		<tr>
            <th>ID</th>
			<th>Edicion</th>
		</tr>
	</thead>
	<?php while($row = mysqli_fetch_assoc($reg)){ ?>
		<tr id="parte_<?=$row['idEdicion'] ?>">
			<td class="idTabla" id="<?=$row['idEdicion'] ?>"><?=$row["idEdicion"] ?></td>
            <td class="nombreEdicionTabla" id="<?=$row['nombreEdicion'] ?>"><?=$row["nombreEdicion"] ?></td>
		</tr>
	<?php }
	?>
</table>

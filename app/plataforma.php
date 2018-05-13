<?php
	include "conexion.php";

	$sql = "SELECT * FROM `plataforma`";
	$reg = $bd->query($sql);
	$bd->close();
?>

<h1>Administración de Plataforma</h1>
<br>
<a class="versionEdicion"><button type="button" onclick="nuevaPlataforma()" class="btn-version btn btn-default navbar-btn">Nueva Plataforma</button></a>
<h2 >Lista de Plataforma</h2>
<table class="highlight bordered tablaPlataformas">
	<thead>
		<tr>
            <th>ID</th>
			<th>Plataforma</th>
		</tr>
	</thead>
	<?php while($row = mysqli_fetch_assoc($reg)){ ?>
		<tr id="parte_<?=$row['idPlataforma'] ?>">
			<td class="idTabla" id="<?=$row['idPlataforma'] ?>"><?=$row["idPlataforma"] ?></td>
            <td class="nombrePlataformaTabla" id="<?=$row['nombrePlataforma'] ?>"><?=$row["nombrePlataforma"] ?></td>
		</tr>
	<?php }
	?>
</table>

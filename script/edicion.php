<?php
	$bd = @new mysqli("localhost", "root", "");
	$bd->select_db("tienda");
	$campo = $_POST["campo"] ?? "idVersion"; //Sera por el campo que ordene
	$orden = $_POST["orden"] ?? "ASC";  //Sera ASC o DESC
	$sql = "SELECT * FROM `edicion`";
				/* ORDER BY `ptl`.`nombrePlataforma` $orden" */
	$reg = $bd->query($sql);
	$bd->close();
?>

<h1>Administración de Ediciones</h1>
<br>
<a  class="versionEdicion"><button type="button" onclick="nuevaVersion()" class="btn-version btn btn-default navbar-btn">Nueva Edicion</button></a>
<h2 >Lista de Ediciones</h2>
<table class="highlight bordered tablaEdiciones">
	<thead>
		<tr>
            <th>ID</th>
			<th>Edicion</th>
			<th>Acción</th>
		</tr>
	</thead>
	<?php while($row = mysqli_fetch_assoc($reg)){ ?>
		<tr id="parte_<?=$row['idEdicion'] ?>">
			<td class="idTabla" id="<?=$row['idEdicion'] ?>"><?=$row["idEdicion"] ?></td>
            <td class="nombreEdicionTabla" id="<?=$row['nombreEdicion'] ?>"><?=$row["nombreEdicion"] ?></td>
			<td><a id="<?=$row['idEdicion'] ?>" onclick="modificarVersion(this)" class="editar"><button type="button" class="btn amber darken-4"><i class="material-icons">edit</i></button></a>
			<a class="eliminarVersion" onclick="borrar(this)" id="<?=$row['idEdicion'] ?>"><button type="button" class="btn red darken-2"><i class="material-icons">delete</i></button></a></td>
		</tr>
	<?php }
	?>
</table>

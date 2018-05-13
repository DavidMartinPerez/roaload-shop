<?php
	include "conexion.php";

	$sql = "SELECT * FROM `videojuego`";
	$reg = $bd->query($sql);
	$bd->close();
?>

<h1>Administración de Juego</h1>
<br>
<a  class="Buevojuego"><button type="button" onclick="nuevoJuego()" class="btn-version btn btn-default navbar-btn">Nuevo Juego</button></a>
<h2 >Lista de Juego</h2>
<table class="highlight bordered tablaPlataformas">
	<thead>
		<tr>
            <th>Nombre</th>
			<th>Descripción</th>
		</tr>
	</thead>
	<?php while($row = mysqli_fetch_assoc($reg)){ ?>
		<tr id="parte_<?=$row['idJuego'] ?>">
            <td class=""><?=$row["nombreJuego"] ?></td>
			<td class=""><?=$row["descripJuego"] ?></td>
		</tr>
	<?php }
	?>
</table>

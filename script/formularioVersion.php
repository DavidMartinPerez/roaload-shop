<?php
    // Conexiones a la BBDD para sacar los registros de los select.
    $bd = @new mysqli("localhost", "root", "");
    $bd->select_db("tienda");

    $sqlSelectDistribuidora = "SELECT idDistribuidora, nombreDistribuidora FROM `distribuidora` WHERE 1";
    $sqlSelectPlataforma = "SELECT idPlataforma, nombrePlataforma FROM `plataforma` WHERE 1";
    $sqlSelectEdicion = "SELECT idEdicion, nombreEdicion FROM `edicion` WHERE 1";
    $sqlSelectJuego = "SELECT * FROM `videojuego` WHERE 1";

    $regEdicion = $bd->query($sqlSelectEdicion);
    $regPlataforma = $bd->query($sqlSelectPlataforma);
    $regDistribuidora = $bd->query($sqlSelectDistribuidora);
    $regJuego = $bd->query($sqlSelectJuego);

    $bd->close();

?>
<tr id="formularioNuevo">
    <td>
        <form id="formNuevoVersion">
            <select id="idJuegoNuevo" class="browser-default" name="juegoNV" required>
                <option selected disabled>-- Busque su juego --</option>
				<?php while($rowJuego = mysqli_fetch_assoc($regJuego)){ ?>
					<option value="<?=$rowJuego["idJuego"] ?>"><?=$rowJuego["nombreJuego"] ?></option>
				<?php } ?>
            </select>
    </td>
    <td>
        <select id="edicionJuegoNuevo" class="browser-default" name="edicionNV">
            <?php while($rowEdi = mysqli_fetch_assoc($regEdicion)){ ?>
                <option value="<?=$rowEdi["idEdicion"] ?>"><?=$rowEdi["nombreEdicion"] ?></option>
            <?php } ?>
        </select>
    </td>
    <td>
        <select id="plataformaJuegoNuevo" class="browser-default" name="plataformaNV">
            <?php while($rowPtl = mysqli_fetch_assoc($regPlataforma)){ ?>
                <option value="<?=$rowPtl["idPlataforma"] ?>"><?=$rowPtl["nombrePlataforma"] ?></option>
            <?php } ?>
        </select>
    </td>
    <td>
        <input type="number" id="precioNuevo" val="1" name="precioNV" />
    </td>
    <td>
        <input type="number" id="stockNuevo" val="1" name="stockNV" />
    </td>
    <td>
        <input id="fechaNueva" type="text" class="fechapicker" name="fechaNV">
    </td>
    <td>
        <select id="idDistribuidora" class="browser-default" name="disNV">
            <?php while($rowDis = mysqli_fetch_assoc($regDistribuidora)){ ?>
                <option value="<?=$rowDis["idDistribuidora"] ?>"><?=$rowDis["nombreDistribuidora"] ?></option>
            <?php } ?>
        </select>
    </td>
    <td>
        <a><button type="submit" onclick="guardarDatos()" class="btn amber darken-4"><i class="material-icons">save</i></button></a>
        <a><button type="button" onclick="cancelarFormulario();" class="btn red darken-2"><i class="material-icons">cancel</i></button></a>
        </form>
    </td>
</tr>

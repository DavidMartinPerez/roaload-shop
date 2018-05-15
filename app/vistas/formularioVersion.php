<?php
    // Conexiones a la BBDD para sacar los registros de los select.
    include "conexion.php";

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
<div id="formularioNuevo">
    <form id="formNuevoVersion">
        <div>
            Juego:<br>
            <select id="idJuegoNuevo" class="browser-default" name="juegoNV" required>
                <option selected disabled>-- Busque su juego --</option>
				<?php while($rowJuego = mysqli_fetch_assoc($regJuego)){ ?>
					<option value="<?=$rowJuego["idJuego"] ?>"><?=$rowJuego["nombreJuego"] ?></option>
				<?php } ?>
            </select>
        </div>
        <div><br>
            Edicion:<br>
            <select id="edicionJuegoNuevo" class="browser-default" name="edicionNV">
                <?php while($rowEdi = mysqli_fetch_assoc($regEdicion)){ ?>
                    <option value="<?=$rowEdi["idEdicion"] ?>"><?=$rowEdi["nombreEdicion"] ?></option>
                <?php } ?>
            </select>
        </div><br>
        <div>
            Plataforma:<br>
            <select id="plataformaJuegoNuevo" class="browser-default" name="plataformaNV">
                <?php while($rowPtl = mysqli_fetch_assoc($regPlataforma)){ ?>
                    <option value="<?=$rowPtl["idPlataforma"] ?>"><?=$rowPtl["nombrePlataforma"] ?></option>
                <?php } ?>
            </select>
        </div><br>
        <div>
            Precio:<br>
            <input type="number" id="precioNuevo" val="1" name="precioNV" />
        </div><br>
        <div>
            Stock:<br>
            <input type="number" id="stockNuevo" val="1" name="stockNV" />
        </div><br>
        <div>
            Fecha Salida:<br>
            <input id="fechaNueva" type="text" class="fechapicker" name="fechaNV">
        </div><br>
        <div>
            Distribuidora:<br>
            <select id="idDistribuidora" class="browser-default" name="disNV">
                <?php while($rowDis = mysqli_fetch_assoc($regDistribuidora)){ ?>
                    <option value="<?=$rowDis["idDistribuidora"] ?>"><?=$rowDis["nombreDistribuidora"] ?></option>
                <?php } ?>
            </select>
        </div>
    </form>
</div>

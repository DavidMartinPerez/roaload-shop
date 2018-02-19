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
<form id="formularioPaModificar">
    <div>
        Juego:<br>
        <select id="idJuegoModificar" class="browser-default" name="juegoV">
            <option selected disabled>-- Busque su juego --</option>
    		<?php while($rowJuego = mysqli_fetch_assoc($regJuego)){ ?>
    			<option value="<?=$rowJuego["idJuego"] ?>"><?=$rowJuego["nombreJuego"] ?></option>
    		<?php } ?>
        </select>
    </div>
    <div>
        Edicion:<br>
        <select id="edicionJuegoModificar" class="browser-default" name="edicionV">
            <?php while($rowEdi = mysqli_fetch_assoc($regEdicion)){ ?>
                <option value="<?=$rowEdi["idEdicion"] ?>"><?=$rowEdi["nombreEdicion"] ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        Plataforma:<br>
        <select id="plataformaJuegoModificar" class="browser-default" name="plataformaV">
            <?php while($rowPtl = mysqli_fetch_assoc($regPlataforma)){ ?>
                <option value="<?=$rowPtl["idPlataforma"] ?>"><?=$rowPtl["nombrePlataforma"] ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        Precio:<br>
        <input type="number" id="precioModificar" val="" name="precioV" />
    </div>
    <div>
        Stock:<br>
        <input type="number" id="stockModificar" val="" name="stockV"/>
    </div>
    <div>
        Fecha Salida:<br>
        <input id="fechaModificar" type="text" class="fechapickerModi" name="fechaV">
    </div>
    <div>
        Distribuidora:<br>
        <select id="idDistribuidoraModificar" class="browser-default" name="distribV">
            <?php while($rowDis = mysqli_fetch_assoc($regDistribuidora)){ ?>
                <option value="<?=$rowDis["idDistribuidora"] ?>"><?=$rowDis["nombreDistribuidora"] ?></option>
            <?php } ?>
        </select>
    </div>
</form>

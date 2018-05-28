<li><a class="subheader letra-semimediana">Cesta</a></li>
<?php
    if(isset($_SESSION['carro'])){
        $arrayC = unserialize($_SESSION['carro']);
?>
        <li>
        <?php
            $i = 0;
            while(count($arrayC) > $i){
        ?>
                <a><i class="material-icons">videogame_asset</i>

                        <div class="" onclick="infoVersion(this.id, 'Info', 'Cesta')" id="<?=$arrayC[$i]["id"] ?>"><?=$arrayC[$i]["cantidad"] ?></div>
                        <!--"ID =".$arrayC[$i]["id"]."CANTIDAD=".$arrayC[$i]["cantidad"];-->

                </a>
            <?php
                $i++;
            }
            ?>
        </li>
<br>
<?php }else{ ?>

    <li style='padding-left: 20px'>No tienes productos</li>
    <div style='padding-left: 20px'>Si no sabes como puedes sigue nuestra guía <span onclick="alert('ajax FAQ #COMPRAR')">aquí</span></div>

<?php } ?>

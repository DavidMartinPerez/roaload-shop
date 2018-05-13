<li><a class="subheader">Cesta</a></li>
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
                    <?php
                        echo "ID =".$arrayC[$i]["id"]."CANTIDAD=".$arrayC[$i]["cantidad"];
                    ?>
                </a>
    <?php
                $i++;
            }
    ?>
        </li>
<br>
<?php }else{

    echo "<li style='padding-left: 20px'>No tienes productos</li>";

}?>

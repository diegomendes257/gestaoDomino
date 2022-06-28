<?php
    require "conexaoDomino.php";
    global $conexaoDomino;

    $dupla1 = 3;
    $dupla2 = 6;
    
    $exibePlacar = "SELECT vitoriasPartida FROM duplas WHERE id_dupla = :dupla1 and id_dupla = :dupla2";
        $exibePlacar = $conexaoDomino->prepare($exibePlacar);
        $exibePlacar->bindValue(":dupla1", $dupla1);
        $exibePlacar->bindValue(":dupla2", $dupla2);
        $exibePlacar->execute();

        //$exibe = $exibePlacar->fetch(PDO::FETCH_ASSOC);

        while($exibe = $exibePlacar->fetch(PDO::FETCH_ASSOC)){
            echo 'placar = '.$exibe['vitoriasPartida'];
        }
?>
<?php

    if(isset($_POST['duplas'])){
        require "conexaoDomino.php";

        global $conexaoDomino;

        $buscaDupla = "SELECT id_dupla FROM duplas ORDER BY id_dupla DESC LIMIT 2";
        $buscaDupla = $conexaoDomino->prepare($buscaDupla);
        $buscaDupla->execute();

        for ($i=0; $i < $exibeDupla = $buscaDupla->fetch(PDO::FETCH_ASSOC); $i++) {
            if($i == 0){
                $dupla1 = $exibeDupla['id_dupla'];
            }
            if($i == 1){
                $dupla2 = $exibeDupla['id_dupla'];
            }
        }

        $insereDupla1 = "INSERT INTO partidas(id_duplas_1, id_dupla_2) VALUE(:dupla1, :dupla2)";
        $insereDupla1 = $conexaoDomino->prepare($insereDupla1);
        $insereDupla1->bindValue(":dupla1", $dupla1);
        $insereDupla1->bindValue(":dupla2", $dupla2);
        $insereDupla1->execute();
    }
    

?>
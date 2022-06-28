<?php

    if(isset($_POST['jogador1']) && isset($_POST['jogador2'])){
        require 'conexaoDomino.php';
        require 'Jogador.php';
        $j = new Jogador();
     
        global $conexaoDomino;
     
        $jogador1 = $_POST['jogador1'];
        $jogador2 = $_POST['jogador2'];

        $j->cadastroDuplas($jogador1, $jogador2);
    }
   





    //if(isset($_POST['jogador1']) && isset($_POST['jogador2']) && isset($_POST['jogador3']) && isset($_POST['jogador4'])){
        
        /*if(isset($_POST['dupla2'])){
        require 'conexaoDomino.php';
        require 'Jogador.php';
        $j = new Jogador();

        global $conexaoDomino;

        $dupla[0] = $_POST['dupla2'];
        $dupla[1] = $_POST['dupla2'];

        $j->cadastroDuplas($jogador1, $jogador2);

        $j1 = $_POST['jogador1'];
        $j2 = $_POST['jogador2'];
        $j3 = $_POST['jogador3'];
        $j4 = $_POST['jogador4'];

        $insereDupla1 = "INSERT INTO duplas(jogador1, jogador2) VALUE(:jogador1, :jogador2)";
        $insereDupla1 = $conexaoDomino->prepare($insereDupla1);
        $insereDupla1->bindValue(":jogador1", $j1);
        $insereDupla1->bindValue(":jogador2", $j2);
        $insereDupla1->execute();
        echo "<div class='alert alert-primary' role='alert'>Dupla 1 cadastrada com sucesso!</div>";

        $insereDupla2 = "INSERT INTO duplas(jogador1, jogador2) VALUE(:jogador3, :jogador4)";
        $insereDupla2 = $conexaoDomino->prepare($insereDupla2);
        $insereDupla2->bindValue(":jogador3", $j3);
        $insereDupla2->bindValue(":jogador4", $j4);
        $insereDupla2->execute();
        echo "<div class='alert alert-primary' role='alert'>Dupla 2 cadastrada com sucesso!</div>";
        
    }else{
            echo 'erro';
        }*/


        //$j->cadastroDuplas($j1, $j2, $j3, $j4);
    //}
?>
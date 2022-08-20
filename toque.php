<?php

    if(isset($_POST['deu_toque'])){

        require "Jogador.php";
        require 'conexaoDomino.php';
        $j = new Jogador();
        global $conexaoDomino;

        $selecionaUltimaPartida = "SELECT id_partidas FROM partidas ORDER BY id_partidas DESC LIMIT 1";
        $selecionaUltimaPartida = $conexaoDomino->prepare($selecionaUltimaPartida);
        $selecionaUltimaPartida->execute();

        $retornaUltimaPartida = $selecionaUltimaPartida->fetch();
        $idPartida = $retornaUltimaPartida["id_partidas"];

        $deu_toque = $_POST['deu_toque'];
        $levou_toque = $_POST['levou_toque'];
        //$tocou = $_POST['levou_toque'];

        $j->pontuaToque($levou_toque);

        $insereToque = "INSERT INTO toques(deu_toque, levou_toque, id_partida_FK) VALUE(:toque, :tocou, :id)";
        $insereToque = $conexaoDomino->prepare($insereToque);
        $insereToque->bindValue(":toque", $deu_toque);
        $insereToque->bindValue(":tocou", $levou_toque);
        $insereToque->bindValue(":id", $idPartida);
        $insereToque->execute();
    }
?>
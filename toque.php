<?php

    if(isset($_POST['id_jogador_toque'])){

        global $conexaoDomino;
        require 'conexaoDomino.php';

        $idJogadorToque = $_POST['id_jogador_toque'];
        $toque = $_POST['selecao'];
        //$tocou = $_POST['levou_toque'];
        $idPartida = 2;

        $selecionaJogadores = "INSERT INTO toques(deu_toque, levou_toque, id_jogador_toque, id_partida_toque) VALUE(:toque, :tocou, :id, :p)";
        $selecionaJogadores = $conexaoDomino->prepare($selecionaJogadores);
        $selecionaJogadores->bindValue(":toque", $toque);
        $selecionaJogadores->bindValue(":tocou", $idJogadorToque);
        $selecionaJogadores->bindValue(":id", $toque);
        $selecionaJogadores->bindValue(":p", $idPartida);
        $selecionaJogadores->execute();
    }
?>
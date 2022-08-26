<?php

    if(isset($_POST['bateu'])){
        require "conexaoDomino.php";
        require "Jogador.php";

        global $conexaoDomino;
        $j = new Jogador();

        $bateu = intval($_POST['bateu']);
        $tipo = $_POST['tipo'];

        $selecionaUltimaPartida = "SELECT id_partidas, ponto_duplas_1, ponto_duplas_2 FROM partidas ORDER BY id_partidas DESC LIMIT 1";
        $selecionaUltimaPartida = $conexaoDomino->prepare($selecionaUltimaPartida);
        $selecionaUltimaPartida->execute();
        $retornaUltimaPartida = $selecionaUltimaPartida->fetch();

        $partida = $retornaUltimaPartida["id_partidas"];

        $queryDupla = 'SELECT id_dupla, jogador1, jogador2 FROM duplas ORDER BY id_dupla DESC LIMIT 2';
        $queryDupla = $conexaoDomino->prepare($queryDupla);
        $queryDupla->execute();
        for ($i=0; $i < $duplas = $queryDupla->fetch(PDO::FETCH_ASSOC); $i++) {
            if($i == 0){
                $dupla1 = $duplas['id_dupla'];
                var_dump($dupla1);
                $jogador1 = $duplas['jogador1'];
                $jogador2 = $duplas['jogador2'];

                if($bateu == $jogador1 || $bateu == $jogador2){

                    $j->batida($bateu, $tipo, $partida, $dupla1);
                    $j->pontuaBatida($bateu);
                }

                if($bateu == $jogador1 || $bateu == $jogador2){

                    if($tipo == 0){
                        $tipo = 1;
                    }
                    $soma = $retornaUltimaPartida['ponto_duplas_2'] + $tipo;
                    $contaBatida = "UPDATE partidas set ponto_duplas_2 = :tBatida WHERE id_partidas = :id_partida";
                    $contaBatida = $conexaoDomino->prepare($contaBatida);
                    $contaBatida->bindValue(":tBatida", $soma);
                    $contaBatida->bindValue(":id_partida", $partida);
                    $contaBatida->execute();

                    $j->acumulaPontos($bateu, $tipo);

                    if($retornaUltimaPartida['ponto_duplas_2'] > 5){
                        echo "<div class='alert alert-primary' role='alert'>Acabou o jogo!</div>";
                    }
    
                }
                    /*$sql = "SELECT id_jogador FROM jogador WHERE id_jogador = :id LIMIT 1";
                    $sql = $conexaoDomino->prepare($sql);
                    $sql->bindValue(":id", $bateu)*/
                
                $j->verificaBatida();
                
            }
            if($i == 1){
                $dupla2 = $duplas['id_dupla'];
                var_dump($dupla2);
                $jogador3 = $duplas['jogador1'];
                $jogador4 = $duplas['jogador2'];

                if($bateu == $jogador3 || $bateu == $jogador4){

                    /*if($tipo == 0){
                        $tipo = 1;
                    }*/
                    $j->batida($bateu, $tipo, $partida, $dupla2);
                    $j->pontuaBatida($bateu);
                }

                
                if($bateu == $jogador3 || $bateu == $jogador4){

                    if($tipo == 0){
                        $tipo = 1;
                    }
                    $soma = $retornaUltimaPartida['ponto_duplas_1'] + $tipo;
                    $contaBatida1 = "UPDATE partidas set ponto_duplas_1 = :tBatida WHERE id_partidas = :id_partida";
                    $contaBatida1 = $conexaoDomino->prepare($contaBatida1);
                    $contaBatida1->bindValue(":tBatida", $soma);
                    $contaBatida1->bindValue(":id_partida", $partida);
                    $contaBatida1->execute();

                    $j->acumulaPontos($bateu, $tipo);
                    
                }
                    /*$sql = "SELECT id_jogador FROM jogador WHERE id_jogador = :id LIMIT 1";
                    $sql = $conexaoDomino->prepare($sql);
                    $sql->bindValue(":id", $bateu)*/
                $j->verificaBatida();
            }
        }
                                    
        //$selecionaJogador1 = $conexaoDomino->prepare($selecionaJogador1);
        //$selecionaJogador1->execute();

    }
    

?>
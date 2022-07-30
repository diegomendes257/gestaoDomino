<?php

    if(isset($_POST['bateu'])){
        require "conexaoDomino.php";
        require "Jogador.php";

        global $conexaoDomino;
        $j = new Jogador();

        $bateu = intval($_POST['bateu']);
        var_dump($bateu);
        $tipo = $_POST['tipo'];

        $selecionaUltimaPartida = "SELECT id_partidas FROM partidas ORDER BY id_partidas DESC LIMIT 1";
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

                //if($bateu == $jogador1 || $bateu == $jogador2){
                    $j->batida($bateu, $tipo, $partida, $dupla1);

                    $j->pontuaBatida($bateu);
                //}
                
            }
            if($i == 1){
                $dupla2 = $duplas['id_dupla'];
                var_dump($dupla2);
                $jogador3 = $duplas['jogador1'];
                $jogador4 = $duplas['jogador2'];

                //if($bateu == $jogador3 || $bateu == $jogador4){
                    $j->batida($bateu, $tipo, $partida, $dupla2);

                    $j->pontuaBatida($bateu);
                //}
            }
        }
                                    
        //$selecionaJogador1 = $conexaoDomino->prepare($selecionaJogador1);
        //$selecionaJogador1->execute();

    }
    

?>
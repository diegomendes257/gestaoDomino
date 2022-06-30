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
   
?>
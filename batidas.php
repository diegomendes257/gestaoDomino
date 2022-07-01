<?php

    if(isset($_POST['quemBateu'])){
        require "conexaoDomino.php";
        require "Jogador.php";

        global $conexaoDomino;
        $j = new Jogador();


        $j->colocaPonto($batida);
    }
    

?>
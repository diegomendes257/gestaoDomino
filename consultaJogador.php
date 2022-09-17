<?php
    require "conexaoDomino.php";
    require "Jogador.php";
    $j = new Jogador();

    //if(isset($_GET['exibeMais'])){
    //    $mais = $_GET['exibeMais'];
    //}
    if(isset($_GET['mais'])){
        $mais = true;
    }else{
        $mais = false;
    }
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./css/jquery-3.6.0.min.js"></script>
    <!-- <script type="text/javascript" src="logica.js"></script> -->
    <title>FORMAÇÃO DE DUPLAS</title>
</head>
<body>
    <div class="container">
        <div class="container-fluid mt-3 p-2 border">
            <h4 class="h4 text-center">DADOS DOS JOGADORES</h4>
        </div>
        <div class="container-fluid p-2 mt-3 text-center">
            <div class="p-2">
                <h5 class="h5">
                    JOGADORES
                </h5>
            </div>
            <div class="container border">
                <div class="row">
                    <?php $j->exibeJogadores(); ?>
                </div>
            </div>
            <hr>
            <div class="display-4">
                Quem mais bateu
            </div>
            <div class="row container mb-2 mt-2">
                <table class="table table-info table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id Jogador(a)</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Batidas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $j->exibeDados(); ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="display-4">
                Acúmulo de pontos
            </div>
            <div class="row container mb-2 mt-2">
                <table class="table table-info table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id Jogador(a)</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Acumulado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $j->acumulado(); ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="display-4">
                Quem mais levou toque
            </div>
            <div class="row container mb-2 mt-2">
                <table class="table table-success table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Id Jogador(a)</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Toques</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $j->exibeDados1(); ?>
                    </tbody>
                </table>
            </div> -->
            <div class="display-4 mt-3">
                Batidas Hoje
            </div>
            <div class="row container mb-3">
                <table class="table table-success table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Jogadores</th>
                            <th scope="col">Batidas hoje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $j->exibePartidas($mais); ?>
                        <tr id="mais">
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="display-4">
                Partidas
            </div>
            <div id='tabela-partida' class="table-responsive">
                <table class="table table-success table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id Partida</th>
                            <th scope="col">Dupla 1</th>
                            <th scope="col">Dupla 2</th>
                            <th scope="col">Placar 1</th>
                            <th scope="col">Placar 2</th>
                            <th scope="col">Data/Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $j->exibePartidas($mais); ?>
                        <tr id="mais">
                        </tr>
                    </tbody>
                </table>
                <button onclick="window.location.href='consultaJogador.php?mais=true';" class="m-1 btn btn-sm w-25 btn-success">
                    mostrar todas as partidas
                </button>
                <button onclick="window.location.href='consultaJogador.php';" class="m-1 btn btn-sm w-25 btn-success">
                    mostrar menos
                </button>
                <!-- <button id="botaoVerMais" class="btn btn-sm w-100 btn-success p-3">
                    VER MAIS PARTIDAS
                </button> -->
            </div>
            <div class="mb-5 mt-5">
                <button onclick="window.location.href='index.php';" class="btn btn-sm w-100 btn-success p-3">
                    VOLTAR
                </button>
            </div>
            <div>
                <p class="text-monospace text-center mt-3">
                    Criado e desenvolvido por: <br />Diego Mendes
                </p> 
            </div>
        </div>
    </div>
</body>
</html>
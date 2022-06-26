<?php
    require "conexaoDomino.php";
    require "Jogador.php";
    $j = new Jogador();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="logica.js"></script>
    <title>FORMAÇÃO DE DUPLAS</title>
</head>
<body>
    <div class="container">
        <div class="container-fluid mt-3 p-2 border">
            <h4 class="h4 text-center">ESCOLHA AS DUPLAS</h4>
        </div>
        <div class="container-fluid p-2 text-center">
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
            <div class="p-4">
                <div class="row text-center">
                    <div class="col border p-4">
                        <div class="font-weight-bold">
                            DUPLA 1
                        </div>
                        <div class="p-2">
                            Nome dos participantes
                        </div> 
                        <div class="bg-primary p-2 m-1 font-weight-bold">
                            DIEGO
                        </div> 
                    </div>
                    <div class="col border p-4">
                        <div class="font-weight-bold">
                            DUPLA 2
                        </div>
                        <div class="p-2">
                            Nome dos participantes
                        </div> 
                        <div class="bg-success p-2 m-1 font-weight-bold">
                            SHAIENNY
                        </div> 
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button onclick="window.location.href='jogo.php';" class="btn btn-sm w-25 btn-success p-3 m-3">
                    INICIAR
                </button>
                <button onclick="window.location.href='index.php';" class="btn btn-sm w-25 btn-danger p-3 m-3">
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
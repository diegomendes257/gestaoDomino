<?php 
        require 'conexaoDomino.php';
        require 'Jogador.php';
        $j = new Jogador();
    
        global $conexaoDomino;

        $queryDupla = 'SELECT id_dupla FROM duplas ORDER BY duplas.id_dupla DESC LIMIT 2';
        $queryDupla = $conexaoDomino->prepare($queryDupla);
        $queryDupla->execute();
        for ($i=0; $i < $duplas = $queryDupla->fetch(PDO::FETCH_ASSOC); $i++) {
            //echo $duplas['id_dupla'];
            if($i == 0){
                $dupla1 = $duplas['id_dupla'];
            }
            if($i == 1){
                $dupla2 = $duplas['id_dupla'];
            }
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="logica.js"></script>
    <title>FORMAÇÃO DE DUPLAS</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row p-3">
                    <div class="col text-center">
                        <h2 class="display-4">
                            PLACAR
                        </h2>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col text-center bg-primary p-md-2">
                        <h3>
                            DUPLA 1
                        </h3> 
                    </div>
                    <div class="col-2 text-center p-md-2">
                        <h3>
                            X
                        </h3>
                    </div>
                    <div class="col text-center bg-success p-md-2">
                        <h3>
                            DUPLA 2
                        </h3>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col text-center bg-primary p-md-2">
                        <h3 class="display-2">
                        <?php
                            $j->exibePlacar($dupla2);
                        ?>
                        </h3> 
                    </div>
                    <div class="col-2 text-center p-md-2">
                        <h3 class="display-3">
                            X
                        </h3>
                    </div>
                    <div class="col text-center bg-success p-md-2">
                        <h3 class="display-2">
                            <?php
                                $j->exibePlacar($dupla1);
                            ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row p-2">
            <div class="col">
                <div class="row">
                    <div class="col text-center p-2">
                        <h5 class="h5">AÇÕES</h5>
                    </div>
                </div>                
                <div class="row">
                    <div class="col">
                        <?php
                            $j->retornaJogador();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 text-center">
            <div class="col">
                <button onclick="window.location.href='jogo.php';" class="btn btn-sm btn-success p-2 m-2">
                    EMPATE NA CONT. DE PONTOS
                </button>
                <button onclick="window.location.href='duplas.php';" class="btn btn-sm btn-danger p-2 m-2">
                    CANCELAR JOGO
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-monospace text-center mt-3">
                    Criado e desenvolvido por: <br />Diego Mendes
                </p>
            </div> 
        </div>
        </div>
    </div>

    <!-- links externos --->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
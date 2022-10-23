<?php 
    if(isset($_GET['id'])){
        require "conexaoDomino.php";
        require "Jogador.php";

        global $conexaoDomino;
        $j = new Jogador();

        $id = $_GET['id'];
        
        // SELECIONA TABELA BATIDA PELO ID DA PARTIDA
        $sql = "SELECT * FROM batida WHERE id_partidas_FK = :id";
        $sql = $conexaoDomino->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        $batidas = $sql->fetch(PDO::FETCH_ASSOC);

        // SELECIONA TABELA PARTIDA PELO ID DA PARTIDA
        $consultaPartidas = "SELECT * FROM partidas WHERE id_partidas = :id";
        $consultaPartidas = $conexaoDomino->prepare($consultaPartidas);
        $consultaPartidas->bindValue(":id", $id);
        $consultaPartidas->execute();
        $partida = $consultaPartidas->fetch(PDO::FETCH_ASSOC);
        

        $idDupla1 = $partida['id_duplas_1'];
        $idDupla2 = $partida['id_duplas_2'];
        echo $partida['id_duplas_1'];
        echo '<br />';
        echo $partida['id_duplas_2'];

        


        // SELECIONA TABELAS DUPLAS E JOGADOR 
        $selecionaJogador1 = "SELECT jogador.nome, jogador.id_jogador, duplas.jogador1, 
                                    duplas.id_dupla
                                    FROM jogador, duplas 
                                    WHERE duplas.jogador1 = jogador.id_jogador
                                    ORDER BY duplas.id_dupla DESC LIMIT 2;
                                    ";

        // SELECIONA TABELA JOGADOR 
        $sqlNome = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
        $sqlNome = $conexaoDomino->prepare($sqlNome);
        $sqlNome->bindValue(":id", $id);
        $sqlNome->execute();
        
        while($imprimeNome = $sqlNome->fetch(PDO::FETCH_ASSOC)){
            echo $imprimeNome['nome'];
        }
        
        
        /*while($batidas = $sql->fetch(PDO::FETCH_ASSOC)){
            $data = date_create($batidas['dataDupla']);
            //$part = intval($sqlPartida->fetch(PDO::FETCH_ASSOC));
            switch ($batidas['tipo']) {
                case "1":
                    $batida1 = 'normal';
                    break;
                case "2":
                    $batida1 = 'carroça';
                    break;
                case "3":
                    $batida1 = 'lá e lô';
                    break;
                case "4":
                    $batida1 = 'cruzada';
                    break;
                case "0":
                    $batida1 = 'cont. pontos';
                    break;
            }
        }*/

        /*$batidasMostra = $sql->fetch(PDO::FETCH_ASSOC);
        //$batidasMostra = intval($batidas['bateu']);
        $sqlNome = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id1";
        $sqlNome = $conexaoDomino->prepare($sqlNome);
        $sqlNome->bindValue(":id1", $batidasMostra['bateu']);
        $sqlNome->execute();
        $imprimeNome = $sqlNome->fetch(PDO::FETCH_ASSOC);

        /*$sqlNome = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
        $sqlNome = $conexaoDomino->prepare($sqlNome);
        $sqlNome->bindValue(":id", $batidas['bateu']);
        $sqlNome->execute();
        $imprimeNome = $sqlNome->fetch(PDO::FETCH_ASSOC);

        echo '
            <tr>
                <th scope="row">'.$batidas['id_partidas_FK'].'</th>
                <td>'.$imprimeNome['nome'].'</td>
                <td>'.$batida1.'</td>
                <td>'.date_format($data, 'd/m/Y').' às '.date_format($data, 'H:i').'</td>
            </tr>
        ';*/
        
            /*$data = date_create($partida['dataPartida']);
            echo '
                <tr>
                    <th scope="row"><a href="exibePartida.php?id='.$partida['id_partidas'].'">'.$partida['id_partidas'].'</th>
                    <td>'.$partida['id_duplas_1'].'</td>
                    <td>'.$partida['id_duplas_2'].'</td>
                    <td>'.$partida['ponto_duplas_1'].'</td>
                    <td>'.$partida['ponto_duplas_2'].'</td>
                    <td>'.date_format($data, 'd/m/Y').' às '.date_format($data, 'H:i').'</td>
                </tr>
                ';*/
            
        
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
        <title>CONSULTAR PARTIDA</title>
    </head>
    <body>
        <div class="container">
            <div class="row mb-2">
                <div class="col p-3 bg-warning">
                    <h2 class="h3 text-center">PARTIDA <?php echo'<td>'.$partida['id_partidas'].'</td>'; ?></h2>
                    <?php 
                        //$j->exibeJogadoresId($id); 
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row p-3">
                        <div class="col text-center">
                            <h2 class="h3">
                                PLACAR
                            </h2>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col text-center bg-primary p-md-2">
                            <h3>
                                <?php $j->exibeJogadorDupla($idDupla2) ?>
                            </h3> 
                        </div>
                        <div class="col-2 text-center p-md-2">
                            <h3>
                                X
                            </h3>
                        </div>
                        <div class="col text-center bg-success p-md-2">
                            <h3>
                                <?php $j->exibeJogadorDupla($idDupla1) ?>
                            </h3>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col text-center bg-primary p-md-2">
                            <h3 class="display-2">
                            <?php
                                echo'<td>'.$partida['ponto_duplas_1'].'</td>';
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
                                    echo'<td>'.$partida['ponto_duplas_2'].'</td>';
                                ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row mb-2">
                <div class="col bg-warning">
                    <h2 class="h3 text-center">RODADAS DA PARTIDA</h2>
                </div>
            </div>
            <div class="col text-center p-md-2">
                <table class="table table-success table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Partida</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo de batida</th>
                            <th scope="col">Data / Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $j->exibeBatidasId($id); ?>
                    </tbody>
                </table>
            </div>
            <div class="row mb-2">
                <div class="col p-3">
                    <?php 

                    ?>
                </div>
            </div>
            <a href="consultaJogador.php">VOLTAR</a>   
        </div>
    </body>
</html>
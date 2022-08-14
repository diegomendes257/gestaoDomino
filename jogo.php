<?php 
        require 'conexaoDomino.php';
        require 'Jogador.php';
        $j = new Jogador();
    
        global $conexaoDomino;

        $queryDupla = 'SELECT id_dupla, jogador1, jogador2 FROM duplas ORDER BY duplas.id_dupla DESC LIMIT 2';
        $queryDupla = $conexaoDomino->prepare($queryDupla);
        $queryDupla->execute();
        for ($i=0; $i < $duplas = $queryDupla->fetch(PDO::FETCH_ASSOC); $i++) {
            if($i == 0){
                $dupla1 = $duplas['id_dupla'];
                var_dump($dupla1);
                $jogador1 = $duplas['jogador1'];
                $jogador2 = $duplas['jogador2'];
            }
            if($i == 1){
                $dupla2 = $duplas['id_dupla'];
                var_dump($dupla2);
                $jogador3 = $duplas['jogador1'];
                $jogador4 = $duplas['jogador2'];
            }
        }

        /*$id_jogador = 'SELECT id_jogador FROM jogador limit 1';
        $id_jogador = $conexaoDomino->prepare($id_jogador);
        $id_jogador->execute();*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./css/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="toque.js"></script>
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
                            $j->exibePlacar(1);
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
                                $j->exibePlacar(2);
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
                        <div class="row">
                            <div id='1' class="id_usuario col-1 d-flex justify-content-center align-items-center m-1 bg-success text-uppercase font-weight-bold" value="<?php echo $jogador1 ?>">
                                <?php
                                    echo $jogador1;
                                ?>
                            </div>
                            <div id="j1" class="nome col d-flex justify-content-center align-items-center m-1 bg-success text-uppercase font-weight-bold" value="<?php echo $jogador1 ?>">
                                <?php
                                    $j->exibeJogadoresId($jogador1);
                                ?>
                            </div>
                            <div class="btn1 col d-flex">
                                
                                    <div class="col p-1 m-1 border text-uppercase text-center">
                                    <!-- Button trigger modal -->
                                    <button id="jogador1" type="button" class="btnToque btn btn-sm w-100 btn-danger" data-toggle="modal" data-target="#toque1">
                                        TOQUE
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="toque1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Quem a(o) tocou?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador2 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador2);
                                                                ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador3 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador3);
                                                                ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador4 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador4);
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                                    <button type="button" id="confirmaToque1" class="btn btn-primary">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-1 m-1 border text-uppercase text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm w-100 btn-success" data-toggle="modal" data-target="#batida1">
                                        BATIDA
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="batida1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Como foi a batida?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                NORMAL
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="2">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CARROÇA
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="3">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                LÁ E LÔ
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="4">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CRUZADA
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CONTAGEM DE PONTOS
                                                            </label>
                                                        </div><br />
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                                    <button type="button" id="confirmaBatida1" class="btn btn-primary">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id='2' class="id_usuario col-1 d-flex justify-content-center align-items-center m-1 bg-success text-uppercase font-weight-bold" value="<?php echo $jogador2 ?>">
                                <?php
                                    echo $jogador2;
                                ?>
                            </div>
                            <div id="j2" class="nome col d-flex justify-content-center align-items-center m-1 bg-success text-uppercase font-weight-bold" value="<?php echo $jogador2 ?>">
                                <?php
                                    $j->exibeJogadoresId($jogador2);
                                ?>
                            </div>
                            <div class="btn1 col d-flex">
                                
                                    <div class="col p-1 m-1 border text-uppercase text-center">
                                    <!-- Button trigger modal -->
                                    <button id="jogador2" type="button" class="btnToque btn btn-sm w-100 btn-danger" data-toggle="modal" data-target="#toque2">
                                        TOQUE
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="toque2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Quem a(o) tocou?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador3 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador3);
                                                                ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador4 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador4);
                                                                ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador1 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador1);
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                                    <button type="button" id="confirmaToque2" class="btn btn-primary">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-1 m-1 border text-uppercase text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm w-100 btn-success" data-toggle="modal" data-target="#batida2">
                                        BATIDA
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="batida2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Como foi a batida?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                NORMAL
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="2">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CARROÇA
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="3">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                LÁ E LÔ
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="4">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CRUZADA
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CONTAGEM DE PONTOS
                                                            </label>
                                                        </div><br />
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                                    <button type="button" id="confirmaBatida2" class="btn btn-primary">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id='3' class="id_usuario col-1 d-flex justify-content-center align-items-center m-1 bg-primary text-uppercase font-weight-bold" value="<?php echo $jogador3 ?>">
                                <?php
                                    echo $jogador3;
                                ?>
                            </div>
                            <div id="j3" class="nome col d-flex justify-content-center align-items-center m-1 bg-primary text-uppercase font-weight-bold" value="<?php echo $jogador3 ?>">
                                <?php
                                    $j->exibeJogadoresId($jogador3);
                                ?>
                            </div>
                            <div class="btn1 col d-flex">
                                
                                    <div class="col p-1 m-1 border text-uppercase text-center">
                                    <!-- Button trigger modal -->
                                    <button id="jogador3" type="button" class="btnToque btn btn-sm w-100 btn-danger" data-toggle="modal" data-target="#toque3">
                                        TOQUE
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="toque3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Quem a(o) tocou?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador4 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador4);
                                                                ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador1 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador1);
                                                                ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador2 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador2);
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                                    <button type="button" id="confirmaToque3" class="btn btn-primary">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-1 m-1 border text-uppercase text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm w-100 btn-success" data-toggle="modal" data-target="#batida3">
                                        BATIDA
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="batida3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Como foi a batida?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                NORMAL
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="2">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CARROÇA
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="3">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                LÁ E LÔ
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="4">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CRUZADA
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CONTAGEM DE PONTOS
                                                            </label>
                                                        </div><br />
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                                    <button type="button" id="confirmaBatida3" class="btn btn-primary">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id='4' class="id_usuario col-1 d-flex justify-content-center align-items-center m-1 bg-primary text-uppercase font-weight-bold" value="<?php echo $jogador4 ?>">
                                <?php
                                    echo $jogador4;
                                ?>
                            </div>
                            <div id="j4" class="nome col d-flex justify-content-center align-items-center m-1 bg-primary text-uppercase font-weight-bold" value="<?php echo $jogador4 ?>">
                                <?php
                                    $j->exibeJogadoresId($jogador4);
                                ?>
                            </div>
                            <div class="btn1 col d-flex">
                                
                                    <div class="col p-1 m-1 border text-uppercase text-center">
                                    <!-- Button trigger modal -->
                                    <button id="jogador4" type="button" class="btnToque btn btn-sm w-100 btn-danger" data-toggle="modal" data-target="#toque4">
                                        TOQUE
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="toque4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Quem a(o) tocou?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador1 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador1);
                                                                ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador2 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador2);
                                                                ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="<?php echo $jogador3 ?>">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                <?php
                                                                    $j->exibeJogadoresId($jogador3);
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                                    <button type="button" id="confirmaToque4" class="btn btn-primary">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col p-1 m-1 border text-uppercase text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm w-100 btn-success" data-toggle="modal" data-target="#batida4">
                                        BATIDA
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="batida4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Como foi a batida?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                NORMAL
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="2">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CARROÇA
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="3">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                LÁ E LÔ
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="4">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CRUZADA
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Contagem de pontos">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                CONTAGEM DE PONTOS
                                                            </label>
                                                        </div><br />
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                                    <button type="button" id="confirmaBatida4" class="btn btn-primary">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="./css/bootstrap.min.js"></script>
    <!-- <script src="./css/jqueryAjax.min.js"></script> -->
    <!-- <script src="./css/popper.min.js"></script> -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->
    <!--//<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->

</body>
</html>
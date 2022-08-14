<?php

    Class Jogador {

        public function cadastro($nome){
            
            global $conexaoDomino;

            $consultaNome = "SELECT nome FROM jogador  WHERE nome = :nome";
            $consultaNome = $conexaoDomino->prepare($consultaNome);
            $consultaNome->bindValue(":nome", $nome);
            $consultaNome->execute();

            if($consultaNome->rowCount() > 0){
                echo "<div class='alert alert-danger' role='alert'>Já existe um usuário com este nome, tente outro!</div>";
            }else{
                $insereCadastro = "INSERT INTO jogador(nome)value(:nome)";
                $insereCadastro = $conexaoDomino->prepare($insereCadastro);
                $insereCadastro->bindValue(":nome", $nome);
                $insereCadastro->execute();
                echo "<div class='alert alert-primary' role='alert'>Usuário cadastrado com sucesso!</div>";
            }
        }


        public function exibeJogadores(){
            
            global $conexaoDomino;

            $cont = 1;
            $consultaJogador = "SELECT id_jogador, nome FROM jogador";
            $consultaJogador = $conexaoDomino->prepare($consultaJogador);
            $consultaJogador->execute();

            while($exibeNome = $consultaJogador->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="jog col text-center p-2 m-1 bg-warning font-weight-bold" value="'.$exibeNome['id_jogador'].'">'.$exibeNome['nome'].'</a></div>';
                
            }
        }

        public function exibeJogadoresId($id){
            
            global $conexaoDomino;

            $consultaJogadorId = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
            $consultaJogadorId = $conexaoDomino->prepare($consultaJogadorId);
            $consultaJogadorId->bindValue(":id", $id);
            $consultaJogadorId->execute();

            $exibeNomeId = $consultaJogadorId->fetch(PDO::FETCH_ASSOC);
            echo $exibeNomeId['nome'];
        }


        public function cadastroDuplas($id1, $id2){
            
            global $conexaoDomino;
            $vitoriasPartida = 0;

            $insereDupla1 = "INSERT INTO duplas(jogador1, jogador2, vitoriasPartida) VALUE(:jogador1, :jogador2, :vitoriasPartida)";
            $insereDupla1 = $conexaoDomino->prepare($insereDupla1);
            $insereDupla1->bindValue(":jogador1", $id1);
            $insereDupla1->bindValue(":jogador2", $id2);
            $insereDupla1->bindValue(":vitoriasPartida", $vitoriasPartida);
            $insereDupla1->execute();
            echo "<div class='alert alert-primary' role='alert'>Dupla 1 cadastrada com sucesso!</div>";        
        }


        public function batida($bateu, $tipo, $partida, $dupla){

            global $conexaoDomino;
            $batida = "INSERT INTO batida(bateu, tipo, id_partidas_FK, id_dupla_FK) VALUE(:b, :t, :p, :d)";
            $batida = $conexaoDomino->prepare($batida);
            $batida->bindValue(":b", $bateu);
            $batida->bindValue(":t", $tipo);
            $batida->bindValue(":p", $partida);
            $batida->bindValue(":d", $dupla);
            $batida->execute();

        }

        public function pontuaBatida($pontuaBatida){

            global $conexaoDomino;

            $consultaJogadorId = "SELECT batidas FROM jogador WHERE id_jogador = :id";
            $consultaJogadorId = $conexaoDomino->prepare($consultaJogadorId);
            $consultaJogadorId->bindValue(":id", $pontuaBatida);
            $consultaJogadorId->execute();
            $jogador = $consultaJogadorId->fetch();

            //$maisUm = 1;
            $soma = $jogador['batidas'] + 1;
            $batida = "UPDATE jogador set batidas = :soma WHERE id_jogador = :id";
            $batida = $conexaoDomino->prepare($batida);
            $batida->bindValue(":id", $pontuaBatida);
            $batida->bindValue(":soma", $soma);
            $batida->execute();

        }


        public function exibePlacar($dupla){
            
            global $conexaoDomino;
            $exibePlacar = "SELECT id_partidas, ponto_duplas_1, ponto_duplas_2 FROM partidas ORDER BY id_partidas DESC LIMIT 1";
            $exibePlacar = $conexaoDomino->prepare($exibePlacar);
            $exibePlacar->execute();

            for ($i=0; $i < $exibe = $exibePlacar->fetch(PDO::FETCH_ASSOC); $i++) {
                if($i = 1){
                    if($dupla == 1){
                        $dupla1 = $exibe["ponto_duplas_1"];
                        echo '<div id="dupla_1">'.$dupla1.'</div>';
                    }
                }
                if($i = 2){
                    if($dupla == 2){
                        $dupla2 = $exibe["ponto_duplas_2"];
                        echo '<div id="dupla_2">'.$dupla2.'</div>';
                    }
                }
                    


                /*while($exibe = $exibePlacar->fetch(PDO::FETCH_ASSOC)){
                    echo '<div>'.$exibe["ponto_duplas_1"].'</div>';
                }*/
            }
            
        }

        public function verificaBatida(){
            
            global $conexaoDomino;
            $exibePlacar = "SELECT id_partidas, ponto_duplas_1, ponto_duplas_2 FROM partidas ORDER BY id_partidas DESC LIMIT 1";
            $exibePlacar = $conexaoDomino->prepare($exibePlacar);
            $exibePlacar->execute();

            for ($i=0; $i < $exibe = $exibePlacar->fetch(PDO::FETCH_ASSOC); $i++) {
                if($exibe['ponto_duplas_2'] > 5 || $exibe['ponto_duplas_1'] > 5 ){
                    echo '<div>acabou</div>';
                    header('Location: index.php');
                }
                /*while($exibe = $exibePlacar->fetch(PDO::FETCH_ASSOC)){
                    echo '<div>'.$exibe["ponto_duplas_1"].'</div>';
                }*/
            }
            
        }


        public function toque($id){
            
            global $conexaoDomino;
            $contaToque = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
            $contaToque = $conexaoDomino->prepare($contaToque);
            $contaToque->bindValue(":id", $id);
            //$exibePlacar->bindValue(":dupla2", $dupla2);
            $contaToque->execute();
            $selecionaIdToque = $contaToque->fetch(PDO::FETCH_ASSOC);
            //while($selecionaIdToque = $contaToque->fetch(PDO::FETCH_ASSOC)){
                echo '<div>'.$selecionaIdToque["id_jogador"].'</div>';
            //}
        }

        

        public function retornaJogador1(){
            
            global $conexaoDomino;

            $selecionaJogador1 = "SELECT jogador.nome, jogador.id_jogador, duplas.jogador1, 
                                    duplas.id_dupla
                                    FROM jogador, duplas 
                                    WHERE duplas.jogador1 = jogador.id_jogador
                                    ORDER BY duplas.id_dupla DESC LIMIT 2;
                                    ";
                                    
            $selecionaJogador1 = $conexaoDomino->prepare($selecionaJogador1);
            $selecionaJogador1->execute();
            
            for ($i=0; $i < $mostraJogador1 = $selecionaJogador1->fetch(PDO::FETCH_ASSOC); $i++) {
                if($i == 0){
                    $jogador1 = $mostraJogador1['nome'];
                    $classBg = 'bg-success';
                    return $jogador1;
                }
                if($i == 1){
                    $jogador2 = $mostraJogador1['nome'];
                    $classBg = 'bg-primary';
                    return $jogador2;
                }
            }
            
        }

        public function exibePartidas(){

            global $conexaoDomino;

            $consultaPartidas = "SELECT * FROM partidas";
            $consultaPartidas = $conexaoDomino->prepare($consultaPartidas);
            //$consultaPartidas->bindValue(":id", $pontuaBatida);
            $consultaPartidas->execute();

            while($partida = $consultaPartidas->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="row">
                <div class="col-2 text-center p-2 m-1 bg-warning font-weight-bold">Pontos dupla 1</div>
                        <div class="col-1 text-center p-2 m-1 bg-warning font-weight-bold">'.$partida['ponto_duplas_1'].'</div>
                        <div class="col-2 text-center p-2 m-1 bg-warning font-weight-bold">Pontos dupla 2</div>
                        <div class="partida col-1 text-center p-2 m-1 bg-warning font-weight-bold">'.$partida['ponto_duplas_2'].'</div>
                        <div class="col-1 text-center p-2 m-1 bg-warning font-weight-bold">Id Dupla 1</div>
                        <div class="partida col-1 text-center p-2 m-1 bg-warning font-weight-bold">'.$partida['id_duplas_1'].'</div>
                        <div class="col-1 text-center p-2 m-1 bg-warning font-weight-bold">Id Dupla 2</div>
                        <div class="partida col-1 text-center p-2 m-1 bg-warning font-weight-bold">'.$partida['id_duplas_2'].'</div>
                    </div> 

                        
                     ';
            }
            //$partida = $consultaPartidas->fetch();


        }

        public function retornaJogador(){
            
            global $conexaoDomino;

            $selecionaJogador1 = "SELECT jogador.nome, jogador.id_jogador, duplas.jogador1, 
                                    duplas.id_dupla
                                    FROM jogador, duplas 
                                    WHERE duplas.jogador1 = jogador.id_jogador
                                    ORDER BY duplas.id_dupla DESC LIMIT 2;
                                    ";
            $selecionaJogador2 = "SELECT jogador.nome, jogador.id_jogador, duplas.jogador2, 
                                    duplas.id_dupla
                                    FROM jogador, duplas 
                                    WHERE duplas.jogador2 = jogador.id_jogador
                                    ORDER BY duplas.id_dupla DESC LIMIT 2;
                                    ";
                                    
            $selecionaJogador1 = $conexaoDomino->prepare($selecionaJogador1);
            $selecionaJogador1->execute();

            $selecionaJogador2 = $conexaoDomino->prepare($selecionaJogador2);
            $selecionaJogador2->execute();
            
            for ($i=0; $i < $mostraJogador1 = $selecionaJogador1->fetch(PDO::FETCH_ASSOC); $i++) {
                if($i == 0){
                    $jogador1 = $mostraJogador1['nome'];
                    $classBg = 'bg-success';
                }
                if($i == 1){
                    $jogador2 = $mostraJogador1['nome'];
                    $classBg = 'bg-primary';
                }
                
                var_dump($i);
                //var_dump($mostraJogador1['nome']);  
                echo'
                    <div class="row">
                        <div class="col d-flex justify-content-center align-items-center m-1 '.$classBg.' text-uppercase font-weight-bold value="'.$mostraJogador1['id_jogador'].'">
                            '.$mostraJogador1['nome'].'
                        </div>
                        <div class="col-2 p-1 m-1 border text-uppercase text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btnToque btn btn-sm w-100 btn-danger p-1 m-1" value="'.$mostraJogador1['id_jogador'].'" data-toggle="modal" data-target="#toque">
                                TOQUE
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="toque" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Jhessyka">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Jhessyka
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Diego">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Diego
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Adrielly">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Adrielly
                                                </label>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                        <button type="button" id="confirmaToque" class="btn btn-primary">Confirmar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-1 m-1 border text-uppercase text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm w-100 btn-success p-1 m-1" data-toggle="modal" data-target="#batida">
                                BATIDA
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="batida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Normal">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    NORMAL
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Carroça">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    CARROÇA
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Lá e Lô">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    LÁ E LÔ
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Cruzada">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    CRUZADA
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Contagem de pontos">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    CONTAGEM DE PONTOS
                                                </label>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                        <button type="button" id="confirmaBatida" class="btn btn-primary">Confirmar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    if($i == 0){
                        echo "igual 0";
                    }if($i == 1){
                        echo 'igual 1';
                    }
            }
            for ($i=0; $i < $mostraJogador2 = $selecionaJogador2->fetch(PDO::FETCH_ASSOC); $i++) {
                if($i == 0){
                    $jogador3 = $mostraJogador2['nome'];
                    $classBg = 'bg-success';
                }
                if($i == 1){
                    $jogador4 = $mostraJogador2['nome'];
                    $classBg = 'bg-primary';
                }     
                echo'   
                    <div class="row">
                        <div class="col d-flex justify-content-center align-items-center m-1 '.$classBg.' text-uppercase font-weight-bold">
                            '.$mostraJogador2['nome'].'
                        </div>
                        <div class="col-2 p-1 m-1 border text-uppercase text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm w-100 btn-danger p-1 m-1" data-toggle="modal" data-target="#toque">
                                TOQUE
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="toque" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Jhessyka">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Jhessyka
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Diego">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Diego
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Adrielly">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Adrielly
                                                </label>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                        <button type="button" id="confirmaToque" class="btn btn-primary">Confirmar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-1 m-1 border text-uppercase text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm w-100 btn-success p-1 m-1" data-toggle="modal" data-target="#batida">
                                BATIDA
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="batida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Normal">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    NORMAL
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Carroça">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    CARROÇA
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Lá e Lô">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    LÁ E LÔ
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Cruzada">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    CRUZADA
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="Contagem de pontos">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    CONTAGEM DE PONTOS
                                                </label>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                                        <button type="button" id="confirmaBatida" class="btn btn-primary">Confirmar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }
    }
?>
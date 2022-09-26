<?php

    Class Jogador {

        public function cadastro($nome){
            
            global $conexaoDomino;

            if ($nome == '') {
                echo "<div class='alert alert-danger' role='alert'>Você precisa digitar um nome!</div>";
            }else{
                $consultaNome = "SELECT nome FROM jogador WHERE nome = :nome";
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
        }


        public function exibeJogadores(){
            
            global $conexaoDomino;

            $cont = 1;
            $consultaJogador = "SELECT id_jogador, nome FROM jogador";
            $consultaJogador = $conexaoDomino->prepare($consultaJogador);
            $consultaJogador->execute();

            while($exibeNome = $consultaJogador->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="jog col text-center p-2 m-1 bg-warning font-weight-bold" value="'.$exibeNome['id_jogador'].'"><a href="exibeJogador.php?id='.$exibeNome['id_jogador'].'">'.$exibeNome['nome'].'</a></div>';
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


        public function exibeDupla(){
            
            global $conexaoDomino;

            $sql = "SELECT DISTINCT jogador1, jogador2 FROM duplas";
            $sql = $conexaoDomino->prepare($sql);
            //$sql->bindValue(":id", $id);
            $sql->execute();
            $d = 0;
            while($exibeDuplas = $sql->fetch(PDO::FETCH_ASSOC)){
                //echo ''.$d;
                if($exibeDuplas['jogador1']){
                    $id1 = $exibeDuplas['jogador1'];
                    $sqlNome = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
                    $sqlNome = $conexaoDomino->prepare($sqlNome);
                    $sqlNome->bindValue(":id", $id1);
                    $sqlNome->execute();
                    $sqlNomeExibe1 = $sqlNome->fetch(PDO::FETCH_ASSOC);
                
                }if($exibeDuplas['jogador2']){
                    $id2 = $exibeDuplas['jogador2'];
                    $sqlNome = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
                    $sqlNome = $conexaoDomino->prepare($sqlNome);
                    $sqlNome->bindValue(":id", $id2);
                    $sqlNome->execute();
                    $sqlNomeExibe2 = $sqlNome->fetch(PDO::FETCH_ASSOC);
                    
                    $sqlDupla = "SELECT id_dupla FROM duplas where jogador1 = :j1 and jogador2 = :j2";
                    $sqlDupla = $conexaoDomino->prepare($sqlDupla);
                    $sqlDupla->bindValue(":j1", $id1);
                    $sqlDupla->bindValue(":j2", $id2);
                    $sqlDupla->execute();
                    $idDuplas = $sqlDupla->fetch(PDO::FETCH_ASSOC);

                    echo '<tr>
                            <td>
                                '.$idDuplas['id_dupla'].'
                            </td>
                            <td>
                                <b>'.$sqlNomeExibe1['nome'].'</b>
                            </td>
                            <td>
                                &
                            </td>
                            <td>
                            <b>'.$sqlNomeExibe2['nome'].'</b>
                            </td>
                        </tr>'
                    ;
                }
                $d = $d + 1;
            }
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

            $soma = $jogador['batidas'] + 1;
            $batida = "UPDATE jogador set batidas = :soma WHERE id_jogador = :id";
            $batida = $conexaoDomino->prepare($batida);
            $batida->bindValue(":id", $pontuaBatida);
            $batida->bindValue(":soma", $soma);
            $batida->execute();
        }


        public function acumulaPontos($pontuaBatida, $tipo){

            global $conexaoDomino;

            $sqlAcumulo = "SELECT acumulo FROM jogador WHERE id_jogador = :id";
            $sqlAcumulo = $conexaoDomino->prepare($sqlAcumulo);
            $sqlAcumulo->bindValue(":id", $pontuaBatida);
            $sqlAcumulo->execute();
            $jogador = $sqlAcumulo->fetch();

            $soma = $jogador['acumulo'] + $tipo;
            $acumula = "UPDATE jogador set acumulo = :soma WHERE id_jogador = :id";
            $acumula = $conexaoDomino->prepare($acumula);
            $acumula->bindValue(":id", $pontuaBatida);
            $acumula->bindValue(":soma", $soma);
            $acumula->execute();
        }



        public function pontuaToque($pontuaToque){

            global $conexaoDomino;

            $pontuaToqueId = "SELECT toque FROM jogador WHERE id_jogador = :id";
            $pontuaToqueId = $conexaoDomino->prepare($pontuaToqueId);
            $pontuaToqueId->bindValue(":id", $pontuaToque);
            $pontuaToqueId->execute();
            $jogador = $pontuaToqueId->fetch();

            $soma = $jogador['toque'] + 1;
            $toque = "UPDATE jogador set toque = :soma WHERE id_jogador = :id";
            $toque = $conexaoDomino->prepare($toque);
            $toque->bindValue(":id", $pontuaToque);
            $toque->bindValue(":soma", $soma);
            $toque->execute();
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
            }
        }


        public function toque($id){
            
            global $conexaoDomino;
            $contaToque = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
            $contaToque = $conexaoDomino->prepare($contaToque);
            $contaToque->bindValue(":id", $id);
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


        public function exibeDados(){

            global $conexaoDomino;

            $sql = "SELECT id_jogador, nome, batidas FROM jogador ORDER by batidas DESC";
            $sql = $conexaoDomino->prepare($sql);
            $sql->execute();
            while($retorna = $sql->fetch(PDO::FETCH_ASSOC)){
                echo '
                    <tr>
                        <th scope="row">'.$retorna['id_jogador'].'</th>
                        <td>'.$retorna['nome'].'</td>
                        <td>'.$retorna['batidas'].'</td>
                    </tr>
                ';
            }
        }


        public function acumulado(){

            global $conexaoDomino;

            $sql = "SELECT id_jogador, nome, acumulo FROM jogador ORDER by acumulo DESC";
            $sql = $conexaoDomino->prepare($sql);
            $sql->execute();
            while($retorna = $sql->fetch(PDO::FETCH_ASSOC)){
                if($retorna['acumulo'] == ''){
        
                }else{
                    echo '
                    <tr>
                        <th scope="row">'.$retorna['id_jogador'].'</th>
                        <td>'.$retorna['nome'].'</td>
                        <td>'.$retorna['acumulo'].'</td>
                    </tr>
                    ';
                }
                
            }
        }


        public function batidasHoje(){

            global $conexaoDomino;

            $sql = "SELECT id_jogador, nome FROM jogador";
            $sql = $conexaoDomino->prepare($sql);
            $sql->execute();

            while($retorna = $sql->fetch(PDO::FETCH_ASSOC)){
                $sqlData = "SELECT COUNT(bateu) FROM batida WHERE DATE(dataDupla) = CURDATE() and bateu = :id";
                $sqlData = $conexaoDomino->prepare($sqlData);
                $sqlData->bindValue(":id", $retorna['id_jogador']);
                $sqlData->execute();
                while($retorna1 = $sqlData->fetch(PDO::FETCH_ASSOC)){
                    if($retorna1['COUNT(bateu)'] == 0){
        
                    }else{
                        echo '
                            <tr>
                                <th scope="row">'.$retorna['id_jogador'].'</th>
                                <td>'.$retorna['nome'].'</td>
                                <td>'.$retorna1['COUNT(bateu)'].'</td>
                            </tr>
                        ';
                    }
                }
            }
        }


        public function exibeDados1(){

            global $conexaoDomino;

            $sql = "SELECT id_jogador, nome, toque FROM jogador ORDER by toque DESC";
            $sql = $conexaoDomino->prepare($sql);
            $sql->execute();
            while($retorna = $sql->fetch(PDO::FETCH_ASSOC)){
                echo '
                    <tr>
                        <th scope="row">'.$retorna['id_jogador'].'</th>
                        <td>'.$retorna['nome'].'</td>
                        <td>'.$retorna['toque'].'</td>
                    </tr>
                    ';
            }
        }


        public function exibePartidas($mais){

            global $conexaoDomino;

            if($mais == false){
                $consultaPartidas = "SELECT * FROM partidas ORDER by id_partidas DESC LIMIT 5";
            }if($mais == true){
                $consultaPartidas = "SELECT * FROM partidas";
            }
            $consultaPartidas = $conexaoDomino->prepare($consultaPartidas);
            //$consultaPartidas->bindValue(":id", $pontuaBatida);
            $consultaPartidas->execute();

            while($partida = $consultaPartidas->fetch(PDO::FETCH_ASSOC)){
                $data = date_create($partida['dataPartida']);
                echo '
                    <tr>
                        <th scope="row">'.$partida['id_partidas'].'</th>
                        <td>'.$partida['id_duplas_1'].'</td>
                        <td>'.$partida['id_duplas_2'].'</td>
                        <td>'.$partida['ponto_duplas_1'].'</td>
                        <td>'.$partida['ponto_duplas_2'].'</td>
                        <td>'.date_format($data, 'd/m/Y').' às '.date_format($data, 'H:i').'</td>
                    </tr>
                    ';
            }
        }


        public function exibeBatidas(){

            global $conexaoDomino;

            /*$sqlPartida = "SELECT id_partidas FROM partidas ORDER BY id_partidas DESC LIMIT 11";
            $sqlPartida = $conexaoDomino->prepare($sqlPartida);
            $sqlPartida->execute();*/

            //$id_partida1 = intval($id_partida);
            $sql = "SELECT * FROM batida ORDER BY id_batida DESC LIMIT 11";
            //$sql = "SELECT * FROM batida WHERE id_partidas_FK = :idPartida ORDER BY id_batida DESC LIMIT 1";
            $sql = $conexaoDomino->prepare($sql);
            //$sql->bindValue(":idPartida", $part);
            $sql->execute();

            while($batidas = $sql->fetch(PDO::FETCH_ASSOC)){
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

                $sqlNome = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
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
                    ';
            }
        }


        /*function batidasHoje(){
            global $conexaoDomino;
            $sql = 'SELECT COUNT(bateu)
            FROM batida
            WHERE bateu = :id and tipo = :t';
            $sql = $conexaoDomino->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":t", $num);
            $sql->execute();
            while($mostraSql = $sql->fetch(PDO::FETCH_ASSOC)){
                //echo ''.$mostraSql['tipo'].'nome: '.$nome;
                echo 'Você bateu '.$mostraSql['COUNT(bateu)'].' '.$nome;
                //echo ''.$mostraSql['bateu'];
                echo '<br />';
            }
        }
        SELECT * FROM batida WHERE DATE(dataDupla) = CURDATE();*/

        public function exibeNome($id){

            global $conexaoDomino;

            $sqlNome = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
            $sqlNome = $conexaoDomino->prepare($sqlNome);
            $sqlNome->bindValue(":id", $id);
            $sqlNome->execute();
            $imprimeNome = $sqlNome->fetch(PDO::FETCH_ASSOC);

            echo $imprimeNome['nome'];
        }
    }
?>
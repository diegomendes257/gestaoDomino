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

            $consultaJogador = "SELECT id_jogador, nome FROM jogador";
            $consultaJogador = $conexaoDomino->prepare($consultaJogador);
            $consultaJogador->execute();

            while($exibeNome = $consultaJogador->fetch(PDO::FETCH_ASSOC)){
                
                echo '<div id="jogador" class="jog col text-center p-2 m-1 bg-warning font-weight-bold" value="'.$exibeNome['id_jogador'].'">'.$exibeNome['nome'].'</a></div>';
            }
        }

        public function exibeJogadoresId($id){
            
            global $conexaoDomino;

            $consultaJogadorId = "SELECT id_jogador, nome FROM jogador WHERE id_jogador = :id";
            $consultaJogadorId = $conexaoDomino->prepare($consultaJogadorId);
            $consultaJogadorId->bindValue(":id", $id);
            $consultaJogadorId->execute();

            while($exibeNomeId = $consultaJogadorId->fetch(PDO::FETCH_ASSOC)){
                //echo $exibeNomeId['nome'];
            }
        }


        public function cadastroDuplas($id1, $id2){
            
            global $conexaoDomino;

                $insereDupla1 = "INSERT INTO duplas(jogador1, jogador2) VALUE(:jogador1, :jogador2)";
                $insereDupla1 = $conexaoDomino->prepare($insereDupla1);
                $insereDupla1->bindValue(":jogador1", $id1);
                $insereDupla1->bindValue(":jogador2", $id2);
                $insereDupla1->execute();
                echo "<div class='alert alert-primary' role='alert'>Dupla 1 cadastrada com sucesso!</div>";        
        }

    }
?>
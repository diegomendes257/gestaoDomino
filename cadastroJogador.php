<?php
    require "conexaoDomino.php";
    require "Jogador.php";
    $j = new Jogador();
    
    if(isset($_POST['nome'])){
    
        $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
        $j->cadastro($nome);
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
    <title>CADASTRO</title>
</head>
<body>
    <div class="container">
        <div class="container-fluid mt-3 p-2">
            <h4 class="h4 text-center">CADASTRO DE JOGADORES</h4>
        </div>
        <div class="container-fluid p-2">
            <div class="p-1">
                <form method="POST" class="form-group text-center" action="">
                    <label for="nome do jogador" class="font-weight-bold">NOME DO JOGADOR(A)</label>
                    <input class="form-control form-control-xl form-control-xl" maxlength="35" name="nome" type="text" placeholder="Nome do Jogador(a)" /><br />
                    <button type="submit" class="btn btn-sm w-100 btn-primary p-3">CADASTRAR JOGADOR(A)</button>
                </form>
            </div>
            <div class="mb-3">
                <button onclick="window.location.href='index.php';" class="btn btn-sm w-100 btn-success p-3">
                    VOLTAR
                </button>
            </div>
        </div>
        <div class="container-fluid mt-3 p-2 border">
            <h5 class="h5 text-center">JOGADORES CADASTRADOS</h5>
            <p><?php $j->exibeJogadores(); ?></p>
        </div>
        <div>
            <p class="text-monospace text-center">
                Criado e desenvolvido por: <br />Diego Mendes
            </p> 
        </div>
    </div>
</body>
</html>
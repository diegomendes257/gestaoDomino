<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./css/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="logica.js"></script>
    <title>DOMINÓ</title>
</head>
<body>
    <div class="container">
        <div class="container-fluid mt-3 p-2">
            <h4 class="display-4 text-center">DOMINÓ DO<br /> PIT BULL</h4>
        </div>
        <div class="container-fluid mt-3 p-2">
            <h4 class="h4 text-center">ESCOLHA UMA OPÇÃO</h4>
        </div>
        <div class="container-fluid p-2">
            <div>
                <button onclick="window.location.href='tipoPartida.php';" class="btn btn-sm w-100 btn-success p-3 m-1">
                    INICIAR JOGO
                </button>
                <button onclick="window.location.href='consultaJogador.php';" class="btn btn-sm w-100 btn-info p-3 m-1">
                    CONSULTAR DADOS
                </button>
                <button onclick="window.location.href='cadastroJogador.php';" class="btn btn-sm w-100 btn-primary p-3 m-1">
                    CADASTRAR JOGADORES
                </button>
                <p class="text-monospace text-center mt-3">
                    Criado e desenvolvido por: <br />Diego Mendes
                </p> 
            </div>
        </div>
    </div>
</body>
</html>
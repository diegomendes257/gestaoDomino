<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./css/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="logica.js"></script>
    <title>FORMAÇÃO DE DUPLAS</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row p-3">
                    <div class="col text-center">
                        <h2 class="h2">
                            ESCOLHA QUAL TIPO DE PARTIDA QUER JOGAR!
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row mt-3 text-center">
            <div class="col">
                <button onclick="window.location.href='duplas.php';" class="btn btn-sm btn-success p-2 m-2">
                    PARTIDAS ÚNICAS
                </button>
                <button onclick="window.location.href='#';" class="btn btn-sm btn-danger p-2 m-2" disabled>
                    EM BARRA
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
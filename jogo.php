<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
                            0
                        </h3> 
                    </div>
                    <div class="col-2 text-center p-md-2">
                        <h3 class="display-3">
                            X
                        </h3>
                    </div>
                    <div class="col text-center bg-success p-md-2">
                        <h3 class="display-2">
                            0
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
                            <div class="col d-flex justify-content-center align-items-center m-1 bg-primary text-uppercase font-weight-bold">
                                Diego
                            </div>
                            <div class="col-2 p-1 m-1 border text-uppercase text-center">
                                <button onclick="window.location.href='jogo.php';" class="btn btn-sm btn-danger p-1 m-1">
                                    TOQUE
                                </button>
                            </div>
                            <div class="col-2 p-1 m-1 border text-uppercase text-center">
                                <button onclick="window.location.href='jogo.php';" class="btn btn-sm btn-success p-1 m-1">
                                    BATIDA
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex align-items-center justify-content-center m-1 bg-primary text-uppercase font-weight-bold">
                                Adrielly
                            </div>
                            <div class="col-2 p-1 m-1 border text-uppercase text-center">
                                <button onclick="window.location.href='jogo.php';" class="btn btn-sm btn-danger p-1 m-1">
                                    TOQUE
                                </button>
                            </div>
                            <div class="col-2 p-1 m-1 border text-uppercase text-center">
                                <button onclick="window.location.href='jogo.php';" class="btn btn-sm btn-success p-1 m-1">
                                    BATIDA
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex align-items-center justify-content-center m-1 bg-success text-uppercase font-weight-bold">
                                Jhessyka
                            </div>
                            <div class="col-2 p-1 m-1 border text-uppercase text-center">
                                <button onclick="window.location.href='jogo.php';" class="btn btn-sm btn-danger p-1 m-1">
                                    TOQUE
                                </button>
                            </div>
                            <div class="col-2 p-1 m-1 border text-uppercase text-center">
                                <button onclick="window.location.href='jogo.php';" class="btn btn-sm btn-success p-1 m-1">
                                    BATIDA
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex align-items-center justify-content-center m-1 bg-success text-uppercase font-weight-bold">
                                Shaienny
                            </div>
                            <div class="col-2 p-1 m-1 border text-uppercase text-center">
                                <button onclick="window.location.href='jogo.php';" class="btn btn-sm btn-danger p-1 m-1">
                                    TOQUE
                                </button>
                            </div>
                            <div class="col-2 p-1 m-1 border text-uppercase text-center">
                                <button onclick="window.location.href='jogo.php';" class="btn btn-sm btn-success p-1 m-1">
                                    BATIDA
                                </button>
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
</body>
</html>
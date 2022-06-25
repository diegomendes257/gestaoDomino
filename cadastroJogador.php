<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>CADASTRO</title>
</head>
<body>
    <div class="container">
        <div class="container-fluid mt-3 p-2 border">
            <h5 class="h5 text-center">JOGADORES CADASTRADOS</h5>
        </div>
        <div class="container-fluid mt-3 p-2">
            <h4 class="h4 text-center">CADASTRO DE JOGADORES</h4>
        </div>
        <div class="container-fluid p-2">
            <div class="p-3">
                <form class="form-group text-center" action="">
                    <label for="dupla1" class="font-weight-bold">NOME DO JOGADOR(A)</label>
                    <input class="form-control form-control-sm form-control-xl" type="text" placeholder="Nome do Jogador(a)" /><br />
                    <button type="submit" class="btn btn-sm w-100 btn-primary p-3">CADASTRAR JOGADOR(A)</button>
                </form>
            </div>
            <div class="p-3 mb-3">
                <button onclick="window.location.href='index.php';" class="btn btn-sm w-100 btn-success p-3">
                    VOLTAR
                </button>
            </div>
            <div>
                <p class="text-monospace text-center">
                    Criado e desenvolvido por: <br />Diego Mendes
                </p> 
            </div>
        </div>
    </div>
</body>
</html>
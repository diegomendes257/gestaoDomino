<?php 
    if(isset($_GET['id'])){
        require "conexaoDomino.php";
        require "Jogador.php";

        global $conexaoDomino;
        $j = new Jogador();

        $id = $_GET['id'];

        function exibeBatidas($id, $num, $nome){
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
        <title>Consulta único jogador(a)</title>
    </head>
    <body>
        <div class="container">
            <div class="row mb-2">
                <div class="col p-3 bg-warning">
                    <?php 
                        $j->exibeJogadoresId($id); 
                    ?>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col p-3">
                    <?php 
                        $num0 = 0;
                        $num1 = 1;
                        $num2 = 2;
                        $num3 = 3;
                        $num4 = 4;
                        $contP = "contagem de pontos";
                        $normal = "normal";
                        $carroca = "carroça";
                        $laelo = "lá e lô";
                        $cruzada = "cruzada";
                        exibeBatidas($id, $num0, $contP);
                        exibeBatidas($id, $num1, $normal);
                        exibeBatidas($id, $num2, $carroca);
                        exibeBatidas($id, $num3, $laelo);
                        exibeBatidas($id, $num4, $cruzada);
                    ?>
                </div>
            </div>
            <a href="consultaJogador.php">VOLTAR</a>   
        </div>
    </body>
</html>
<?php
    
    if(isset($_POST['tem'])){
        include("conexaoDomino.php");

        global $conexaoDomino;
        echo 'certo';
		
    }else{
        echo 'errado';
    }
?>
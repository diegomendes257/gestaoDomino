<?php

	$localhost = "localhost";
	$user = "root";
	$pass = "";
	$banco = "domino";

		global $conexaoDomino;

		try {

			$conexaoDomino = new PDO("mysql:host=$localhost;dbname=$banco", $user, $pass);
			$conexaoDomino->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (Exception $e) {
			echo "Deu erro".$e->getMessage();
			exit;
		}
?>
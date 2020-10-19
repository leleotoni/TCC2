<?php
 /* Dados do Banco de Dados a conectar */
	$ervidor = 'localhost';
	$usuario = 'root';
	$senha = '8800';
	$dbname = 'inss';
	$conn= mysqli_connect($servidor, $usuario, $senha, $dbname); 


	$pesquisar = $_POST['pesquisar'];
?>
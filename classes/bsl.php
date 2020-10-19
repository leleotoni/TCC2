<?php

Class Bsl
{
	private $pdo;
	public $msgErro = "";

	public function conectar($nome, $host, $usuario, $senha)
	{
		global $pdo;
		try
		{
				$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);	
		} catch (PDOException $e) {
			global $msgErro;
			$msgErro = $e -> getMessage();
		}
	
	}

	public function cadastrar($numero, $data, $arquivo)
	{
		global $pdo;
		$cmd = $pdo->prepare("SELECT id_bsl FROM cad_bsl WHERE numero = :n");
		$cmd->bindValue(":n",$numero);
		$cmd->execute();
		if($cmd->rowCount()>0)
		{
			return false;//ja cadastrado
		}
		else
		{

			$cmd=$pdo->prepare("INSERT INTO cad_bsl(numero, data, arquivo) VALUES (:n, :d, :a)");
			$cmd->bindValue(":n", $numero);
			$cmd->bindValue(":d", $data);
			$cmd->bindValue(":a", $arquivo);
			$cmd->execute();
			return true;
		}

	}

	public function buscarBsl()
	{
		global $pdo;
		$cmd = $pdo->query("SELECT * FROM cad_bsl ORDER BY numero DESC");
		$dados = $cmd->fetchAll(PDO::FETCH_ASSOC);	
		return $dados;
	}

	public function pesquisaBsl()
	{

	}


}
?>	
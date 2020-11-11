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

	public function pesquisaBsl($numero)
	{
		global $pdo;
		$cmd = $pdo->prepare("SELECT numero, data, arquivo FROM cad_bsl WHERE numero = :n");
		$cmd->bindValue(':n',$numero);
        $cmd->execute();
		if($cmd->rowCount()<0)
		{
			echo "Nâo existe";
			return false;//não existe
		}
		else
		{
			$result = $cmd->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

	}

	public function editarBsl($id)
	{
		global $pdo;
		$cmd = $pdo->prepare("SELECT numero, data, arquivo FROM cad_bsl WHERE id_bsl = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();
		if($cmd->rowCount()<0)
		{
			return false;//ja cadastrado
		}
		else
		{
			$cmd=$pdo->prepare("UPDATE cad_bsl SET arquivo = :a WHERE numero = :n");
			$cmd->bindValue(":n", $numero);
			$cmd->bindValue(":a", $arquivo);
			$cmd->execute();
			return true;
		}

	}

	public function cadastrarTab($semestre, $ano, $arquivo)
	{
		global $pdo;
		$cmd = $pdo->prepare("SELECT id FROM tabela_bsl WHERE semestre = :s");
		$cmd->bindValue(":s",$semestre);
		$cmd->execute();
		if($cmd->rowCount()>0)
		{
			return false;//ja cadastrado
		}
		else
		{

			$cmd=$pdo->prepare("INSERT INTO tabela_bsl(semestre, ano, arquivo) VALUES (:s, :a, :ar)");
			$cmd->bindValue(":s", $semestre);
			$cmd->bindValue(":a", $ano);
			$cmd->bindValue(":ar", $arquivo);
			$cmd->execute();
			return true;
		}

	}
	public function buscarTabela()
	{
		global $pdo;
		$cmd = $pdo->query("SELECT * FROM tabela_bsl");
		$dados = $cmd->fetchAll(PDO::FETCH_ASSOC);	
		return $dados;
	}
	public function alterarBsl($id_bsl, $numero, $data, $arquivo)
	{
		global $pdo;
		$sql=$pdo->prepare("UPDATE cad_bsl SET numero=:n, data=:d, arquivo=:a WHERE id_bsl=:id");
			$sql->bindValue(":id", $id_bsl);
			$sql->bindValue(":n", $numero);
			$sql->bindValue(":d", $data);
			$sql->bindValue(":a", $arquivo);
			$sql->execute();
			return true;

	}


}
?>	
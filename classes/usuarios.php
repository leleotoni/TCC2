<?php


Class Usuario
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

	public function cadastrar($nome, $email, $cargo, $username, $senha)
	{
		global $pdo;
		$sql = $pdo->prepare("SELECT id_user FROM users WHERE email= :e");
		$sql->bindValue(":e",$email);
		$sql->execute();
		if($sql->rowCount()>0)
		{
			return false;//ja cadastrada
		}
		else
		{
			$sql=$pdo->prepare("INSERT INTO users(nome, email, cargo, username, senha) VALUES (:n, :e, :c, :u, :s)");
			$sql->bindValue(":n", $nome);
			$sql->bindValue(":e", $email);
			$sql->bindValue(":c", $cargo);
			$sql->bindValue(":u", $username);
			$sql->bindValue(":s", md5($senha));
			$sql->execute();
			return true;
		}

	}

	public function logar($username, $senha)
	{
		global $pdo;
		$sql = $pdo->prepare("SELECT * FROM users WHERE username=:u AND senha=:s");
		$sql->bindValue(":u", $username);
		$sql->bindValue(":s", md5($senha));
		$sql->execute();
		if($sql->rowCount()>0)
		{
			$dados=$sql->fetch();
			session_start();
			$_SESSION['id_user'] = $dados['id_user'];
			return true;
		}
		else
		{
			return false;

		}

	}

	public function buscarDadosUser($id_user)
	{
		global $pdo;
		$cmd = $pdo->prepare("SELECT * FROM users WHERE id_user = :id");
		$cmd->bindValue(":id", $id_user);
		$cmd->execute();
		$dados = $cmd->fetch();
		return $dados;
	}
	public function buscarUsuario()
	{
		global $pdo;
		$cmd = $pdo->query("SELECT * FROM users");
		$dados = $cmd->fetchAll(PDO::FETCH_ASSOC);	
		return $dados;
	}
}




?>
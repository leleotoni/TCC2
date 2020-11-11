	<?php 
	require_once 'classes/usuarios.php';
	$u = new Usuario;
	$u->conectar("inss", "127.0.0.1", "root", "8800");

	$id_user = addslashes($_POST['id_user']);
	$nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $cargo = addslashes($_POST['cargo']);
    $username = addslashes($_POST['username']);
    $senha = addslashes($_POST['senha']);

    $u->alterar($id_user,$nome, $email, $cargo, $username, $senha);

    echo "
    	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/index.php'>
    	<script type=\"text/javascript\">
    		alert(\"Alterado com sucesso!.\");
    	</script>
    ";
 ?>

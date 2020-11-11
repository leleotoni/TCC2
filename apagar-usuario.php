<?php
	require_once 'classes/usuarios.php';

    $u= new Usuario;
    $u->conectar("inss", "127.0.0.1", "root", "8800");

    $id_user = addslashes($_POST['id_user']);

    $u->deletar($id_user);

    echo "
    	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/index.php'>
    	<script type=\"text/javascript\">
    		alert(\"Usuário deletado com sucesso!.\");
    	</script>
    ";



?>
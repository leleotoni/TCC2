<?php
	require_once 'classes/bsl.php';

    $b= new Bsl;
    $b->conectar("inss", "127.0.0.1", "root", "8800");

    $id = addslashes($_POST['id']);

    $b->deletar($id);

    echo "
    	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/index.php'>
    	<script type=\"text/javascript\">
    		alert(\"Tabela deletada com sucesso!.\");
    	</script>
    ";



?>
<?php 
	require_once 'classes/bsl.php';
	$b = new Bsl;
	$b->conectar("inss", "127.0.0.1", "root", "8800");

	$upload="bsl/";
    $filenvo= 'BSL GEXJFR Nº '. $_POST['numero']. ' de ' . strftime('%d de %B de %Y', strtotime($_POST["data"])) . '.pdf';
            $file= $upload . $filenvo;
    
    $id_bsl = addslashes($_POST['id_bsl']);                     
    $numero = addslashes($_POST['numero']);
    $data = addslashes($_POST['data']);
    $arquivo = $filenvo;
    $filenvo = addslashes($_FILES['arquivo']['name']);
    $extensao = substr($_FILES['arquivo']['name'],-4);

    if(isset($_FILES['arquivo']['name'])) {
        if($extensao == '.pdf') {
            $b->alterarBsl($id_bsl,$numero, $data, $arquivo);
            $nome_arquivo = 'BSL GEXJFR Nº '. $_POST['numero']. ' de ' . strftime('%d de %B de %Y', strtotime($_POST["data"])) . '.pdf';
            move_uploaded_file($_FILES['arquivo']['tmp_name'], 'bsl/'.$nome_arquivo);
        }
        else {
        	?>
            <script type="text/javascript">
                alert('Por favor, insira um documento PDF');
            </script>
            <?php
        }  
      }

   echo "$id_bsl - $numero - $data - $arquivo";
   /* echo "
    	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/teste/index.php'>
    	<script type=\"text/javascript\">
    		alert(\"Alterado com sucesso!.\");
    	</script>
    ";*/
 ?>
<?php
    require_once 'classes/bsl.php';
    $b = new bsl;
    $b->conectar("inss", "127.0.0.1", "root", "8800"); 

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

?>            
<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="css/style_cadastro.css">    
</head>
<body>
    <h1>Cadastro BSL</h1>
    <p> Preencha o formulário com atenção! </p>
        <div id="corpo-form">
            <form  id="form" method="POST" enctype="multipart/form-data">   
                    <label>Digite o número do BSL:</label><input type="text" class="form-control" name="numero" maxlength="3"><br>
                    <label>Informe a data do BSL:</label><br/>
                    <input type="date" class="form-control"name="data" maxlength="8"><br>
                    <label>Arquivo BSL:</label>
                    <input type="file" class="form-control-file" name="arquivo"><br/>
                    <button type="submit" class="btn btn-primary" name="publicar'" value="Publicar BSL">Publicar BSL</button> 
            </form>
        </div>
        <?php
        if(isset($_POST['numero'])) {
            $upload="bsl/";
            $filenvo= 'BSL GEXJFR Nº '. $_POST['numero']. ' de ' . strftime('%d de %B de %Y', strtotime($_POST["data"])) . '.pdf';
            $file= $upload . $filenvo;
                                    
            $numero = addslashes($_POST['numero']);
            $data = addslashes($_POST['data']);
            $arquivo = $filenvo;
            $filenvo = addslashes($_FILES['arquivo']['name']);
            $extensao = substr($_FILES['arquivo']['name'],-4);

            if(!empty($numero) && !empty($data)) {
                if($b->msgErro == "") {
                    if(isset($_FILES['arquivo']['name'])) {
                        if($extensao == '.pdf') {
                                $b->cadastrar($numero, $data, $arquivo);
                                ?>
                                <script type="text/javascript">
                                    alert('BSL publicado com sucesso');
                                </script>
                                <?php
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
                }
                else {
                    ?>
                    <script type="text/javascript">
                        alert('BSL com esta data já foi cadastrado!');
                    </script>
                    <?php
                }
            }
            else {
                ?>
                <script type="text/javascript">
                    alert('Preencha os campos obrigatórios!');
                </script>
                <?php
            }
        }
        ?>
            

</body>
</html>
    
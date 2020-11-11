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
</head>
<body>
    <link rel="stylesheet" href="css/style_cadastro.css">
        <h1>Tabela Numeração BSL</h1>
            <pre>
                <div class="row">
                    <div class="col-md-10">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ano</th>
                                    <th>Semestre</th>
                                    <th>Ação</th>
                                </tr>
                                <tr>
                                    <?php     
                                    $busca = $b->buscarTabela();
                                    foreach ($busca as $dado) {?>   
                                </tr>
                                        <td><?php echo $dado["semestre"]; ?></td>
                                        <td><?php echo $dado["ano"];?></td>
                                        <td><?php echo "<a href=\"bsl/tabela/". $dado["arquivo"]."\" target='blank' >"?><button type="button" class="btn btn-xs btn-primary">Visualizar</button></td>
                                    <?php  } ?>
                            </thead>
                            <tbody>
                                            
                            </tbody> 
                        </table>
                    </div>
                </div>
            </pre> 
            <button id="cadastrar" type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#cadastrarTab" data-whatever="">Cadastrar Nova Tabela</button>
            <div class="modal fade" id="cadastrarTab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Tabela Semestral</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id"></input>
                                <div class="form-group">
                                    <label for="recipient-semestre" class="col-form-label">Semestre:</label>
                                    <input name="semestre" type="text" class="form-control" id="recipient-semestre">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-ano" class="col-form-label">Ano:</label>
                                    <input name="ano" type="text" class="form-control" id="recipient-ano"></input>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-arquivo" class="col-form-label">Arquivo Tabela:</label>
                                    <input name="arquivo" type="file" class="form-control-file" id="recipient-arquivo"></input>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Cadastrar Tabela</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if(isset($_POST['semestre'])) {
                $upload="bsl/tabela/";
                $filenvo= 'Tabela BSL do '. $_POST['semestre']. 'º semestre de ' . $_POST["ano"] . '.pdf';
                $file= $upload . $filenvo;
                                        
                $semestre = addslashes($_POST['semestre']);
                $ano = addslashes($_POST['ano']);
                $arquivo = $filenvo;
                $filenvo = addslashes($_FILES['arquivo']['name']);
                $extensao = substr($_FILES['arquivo']['name'],-4);

                if(!empty($semestre) && !empty($ano)) {
                    if($b->msgErro == "") {
                        if(isset($_FILES['arquivo']['name'])) {
                            if($extensao == '.pdf') {
                                    $b->cadastrarTab($semestre, $ano, $arquivo);
                                    ?>
                                    <script type="text/javascript">
                                        alert('Tabela BSL publicada com sucesso');
                                    </script>
                                    <?php
                                    $nome_arquivo = 'Tabela BSL do '. $_POST['semestre']. 'º semestre de ' . $_POST["ano"] . '.pdf';
                                    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'bsl/tabela/'.$nome_arquivo);
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
                            alert('Tabela BSL com este ano ou semestre já foi cadastrado!');
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script type="text/javascript">
            $('#cadastrarTab').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('whatever')


              var modal = $(this)
              modal.find('.modal-body input').val(recipient)
              modal.find('.modal-body input').val(recipient)
            })
            </script>
    
</body>
</html>

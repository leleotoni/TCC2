<?php
    require_once 'classes/bsl.php';
    $b = new bsl;
    $b->conectar("inss", "127.0.0.1", "root", "8800"); 

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

?>
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
            <br>
            <br>
            <br>

    <h2>Para cadastrar novas tabelas, abaixo:</h2>
    <h3>Cadastro Tabela Numeração BSL</h3>
    <p> Preencha o formulário com atenção! </p>
    <div class="col-auto">
        <div id="corpo-form">
            <form  id="form" method="POST" enctype="multipart/form-data">   
                <fieldset>
                    <label>Digite o semestre da Tabela</label><input type="text" class="form-control" name="semestre" maxlength="3"><br>
                    <label>Digite o ano:</label><br/>
                    <input type="text" class="form-control" name="ano" maxlength="4"><br>
                    <label>Arquivo Tabela:</label>
                    <input type="file" class="form-control-file" name="arquivo"><br/>
                    <button type="submit" class="btn btn-primary" name="publicar'">Publicar Tabela</button> 
                </fieldset> 
            </form>
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
    </div>

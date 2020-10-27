<?php
    require_once 'classes/bsl.php';
    $b = new bsl;
    $b->conectar("inss", "127.0.0.1", "root", "8800"); 
    $busca = $b->buscarBsl();


   setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   date_default_timezone_set('America/Sao_Paulo');

?>
    <link rel="stylesheet" href="css/style_cadastro.css">
        <h1>Publicações</h1>
                            <p>
                                Boletins de Serviço Locais em ordem decrescente:
                            </p>
                                <pre>
                                <div class="row">
                                    <div class="col-md-10">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Número</th>
                                                    <th>Data</th>
                                                    <th>Ação</th>
                                                </tr>
                                                <tr>
                                                <?php foreach ($busca as $dado) {?>   
                                                </tr>
                                                    <td><?php echo $dado["numero"]; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($dado["data"]))?></td>
                                                    <td><?php echo "<a href=\"bsl/". $dado["arquivo"]."\" target='blank' >"?><button type="button" class="btn btn-xs btn-primary">Visualizar</button></td>
                                                <?php  } ?>
                                            </thead>
                                            <tbody>


                                            
                                            </tbody> 
                                        </table>
                                    </div>
                                </div>
                                </pre>
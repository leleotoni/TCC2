<?php

    require_once 'classes/bsl.php';
    $b = new bsl;
    $b->conectar("inss", "127.0.0.1", "root", "8800"); 
    
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');    

?>     
    <link rel="stylesheet" href="css/style_cadastro.css">
    <h1> Pesquisa BSL </h1>
        <h4>A pesquisa poderá ser feito número do BSL</h4>
            <pre>
                <form method="POST" action="">
                    <label>Buscar: </label>
                    <input id="BuscaNum" name="Pesq" type="text" class="g" placeholder="Digite número BSL">
                    <input type="submit" value="Pesquisar">
                </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Data</th>
                                <th>Visualizar</th>
                                </tr>
                            <?php
                                if(isset($_POST['Pesq'])) {
                                    $numero = addslashes($_POST['Pesq']);
                                    $pesquisa = $b->pesquisaBsl($numero);
                                    foreach ($pesquisa as $dados) {              
                            ?> 
                                        <tr>
                                        <td><?php echo $dados["numero"] ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($dados["data"]))?></td>
                                        <td><?php echo "<a href=\"bsl/". $dados["arquivo"] ."\" target='blank' >"?><button type="button"><img src="img/visu.png"></button></td>
                                        </tr>
                                            <?php                                          
                                    }
                                    if(!isset($dados["numero"])) {
                                    ?>
                                        <script type="text/javascript">
                                            alert('Nenhum BSL cadastrado com este número');
                                        </script>
                                    <?php
                                    }
                                        
                                }
                                    
            
                    ?>

                        </thead>

                    </table> 
            </pre>

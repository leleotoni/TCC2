<?php
    ob_start();
   setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   date_default_timezone_set('America/Sao_Paulo');    

?>		
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Publicação BSL Juiz de Fora</title>

</head>
<body>

    <h1> Pesquisa BSL </h1>
        <div>A pesquisa poderá ser feito número do BSL</div>
            <pre>
                <form method="POST" action="">
                    <label>Buscar: </label>
                    <input id="BuscaNum" name="Pesq" type="text" class="g" placeholder="Digite número BSL">
                    <input type="submit" value="Pesquisar">
                </form>
                <?php

                $mysqli = new mysqli('127.0.0.1', 'root', '8800', 'inss');

                if (mysqli_connect_error()) {
                    die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
                    exit();
                }

                $numero = $_POST["Pesq"];



                if ($sql = $mysqli->prepare("SELECT numero, data, arquivo FROM cad_bsl WHERE numero = ?")) {

                    $sql->bind_param('i',$numero);

                    $sql->execute();

                    $sql->bind_result($numero, $data, $arquivo);

                    ?> 
                    <table class="table">
                    <thead>
                    <tr>
                        <th>Número</th>
                        <th>Data</th>
                        <th>Ação</th>
                    </tr>
                    <tr> <?php
                    while ($sql->fetch()) { ?>
                    </tr>
                        <td><?php echo $numero ?></td>
                        <td><?php echo date('d/m/Y', strtotime($data))?></td>
                        <td><?php echo "<a href=\"bsl/". $arquivo ."\" target='blank' >"?><button type="button" class="btn btn-xs btn-primary">Visualizar</button></td>
                            
                    </thead>

                    </table> <?php

                    }
                $sql->close();
                }

                $mysqli->close();
                ?>


            </pre>

</body>
</html>

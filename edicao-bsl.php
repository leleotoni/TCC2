<?php

    require_once 'classes/bsl.php';
    $b = new Bsl;
    $b->conectar("inss", "127.0.0.1", "root", "8800"); 
    $busca = $b->buscarBsl();
    $busca2 = $b->buscarBsl();
   /* $baixa = $b->baixarBsl();    */

   setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   date_default_timezone_set('America/Sao_Paulo');


?>
    <div class="plugins-area">
        <h1>Editar BSL</h1>
        <pre>
        <div class="row">
            <div class="col-md-12">
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
                            <td><?php echo "<a href=\"bsl/". $dado["arquivo"]."\" target='blank' >"?><button type="button" class="btn btn-xs btn-primary">Visualizar</button>  <button type="button" class="btn btn-xs btn-warning" a href="#editar">Editar</button></td>
                            <?php  } ?>
                    </thead>
                </table>
            </div>
        </div>
        </pre> 
    </div> 
    <!--
    <div id="editar">
        <div class="form-group col-md-3" style="width: 210px">
            <a href="javascript:AlterImagem()"></a>
        </div>
        <form method="post" enctype="multipart/form-data" name="adiciona" action="" autocomplete="off">
            <input type="file" name="bsl" value="" required>
            <input type="submit" value="enviar" onsubmit="Checkfiles(this)" class="btn btn-info btn-sm">
        </form>

        <?php
        //array_map('unlink', glob("bsl/". $dado["arquivo"].));
        ?>
    </div>
    -->
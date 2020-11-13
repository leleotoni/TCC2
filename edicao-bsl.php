<?php

    require_once 'classes/bsl.php';
    $b = new Bsl;
    $b->conectar("inss", "127.0.0.1", "root", "8800"); 
    $busca = $b->buscarBsl();


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
 <div class="plugins-area">
        <h1>Editar BSL</h1>
        <pre>
            <div class="editar">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Data</th>
                            <th>Visualizar</th>
                            <th>Editar BSL</th>
                        </tr>
                        <tr>
                            <?php foreach ($busca as $dado) {?>   
                        </tr>
                            <td><?php echo $dado["numero"]; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($dado["data"]))?></td>
                            <td><?php echo "<a href=\"bsl/". $dado["arquivo"]."\" target='blank' >"?><button type="button" class="btn btn-xs btn-primary">Visualizar</button></td>
                            <td><button id="editar" type="button" data-toggle="modal" data-target="#editarBsl" data-whateverid="<?php echo $dado['id_bsl']; ?>"data-whatevernum="<?php echo $dado['numero']; ?>" data-whateverdata="<?php echo date('d/m/Y', strtotime($dado["data"]))?>" data-whateverfile="<?php echo $dado["arquivo"]; ?>"><img src="img/editar.png"></button></td>
                            <?php  } ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
        </pre> 
    </div> 
    <div class="modal fade" id="editarBsl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar BSL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost/teste/alteracao-bsl.php" enctype="multipart/form-data">
                        <input type="hidden" name="id_bsl" id="id_bsl"></input>
                        <div class="form-group">
                            <label for="recipient-numero" class="col-form-label">Numero:</label>
                            <input name="numero" type="text" class="form-control" id="recipient-numero">
                        </div>
                        <div class="form-group">
                            <label for="recipient-data" class="col-form-label">Data:</label>
                            <input name="data" type="date" class="form-control" id="recipient-data"></input>
                        </div>
                        <div class="form-group">
                            <label for="recipient-file" class="col-form-label">Arquivo:</label>
                            <input name="arquivo" type="file" class="form-control" id="recipient-file"></input>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Alterar Dados</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#editarBsl').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientid = button.data('whateverid')
      var recipientnum = button.data('whatevernum')
      var recipientdata = button.data('whateverdata') 
      var recipientfile = button.data('whateverfile')

      var modal = $(this)
      modal.find('.modal-title').text('Alterar Dados do BSL ' + recipientnum)
      modal.find('#id_bsl').val(recipientid)
      modal.find('#recipient-numero').val(recipientnum)
      modal.find('#recipient-data').val(recipientdata)
      modal.find('#recipient-file').val(recipientfile)
    })
    </script>

</body>
</html>
   
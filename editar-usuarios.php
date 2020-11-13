<?php
    require_once 'classes/usuarios.php';

    $u= new Usuario;
    $u->conectar("inss", "127.0.0.1", "root", "8800");
    $busca = $u->buscarUsuario();
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
    <h1>Editar Usuários</h1>
    <p>Usuários Cadastrados</p>
    <pre>
        <div class="editar">
        <div class="row">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                        </tr>
                        <tr>
                            <?php foreach ($busca as $dado) {?>   
                        </tr>
                            <td><?php echo $dado["nome"]; ?></td>
                            <td><?php echo $dado["cargo"]; ?></td>
                            <td><button id="editar" type="button" data-toggle="modal" data-target="#editarUsu" data-whateverid="<?php echo $dado["id_user"]; ?>" data-whatevernome="<?php echo $dado["nome"]; ?>" data-whateveremail="<?php echo $dado["email"]; ?>" data-whatevercargo="<?php echo $dado["cargo"]; ?>" data-whateveruser="<?php echo $dado["username"]; ?>" data-whateversenha="<?php echo $dado["senha"]; ?>"><img src="img/editar.png"></button> </td> 
                            <td><button id="excluir" type="button" data-toggle="modal" data-target="#excluirUsu" data-whateverid="<?php echo $dado['id_user']; ?>"><img src="img/lixo.png"></button></td>
                            <?php  } ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </pre>
    <div class="modal fade" id="editarUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Dados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost/teste/alteracao-usuario.php" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" id="id_user"></input>
                        <div class="form-group">
                            <label for="recipient-nome" class="col-form-label">Nome:</label>
                            <input name="nome" type="text" class="form-control" id="recipient-nome">
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label">E-mail:</label>
                            <input name="email" type="text" class="form-control" id="recipient-email"></input>
                        </div>
                        <div class="form-group">
                            <label for="recipient-cargo" class="col-form-label">Cargo:</label>
                            <input name="cargo" type="text" class="form-control" id="recipient-cargo"></input>
                        </div>
                        <div class="form-group">
                            <label for="recipient-user" class="col-form-label">Username:</label>
                            <input name="username" type="text" class="form-control" id="recipient-user"></input>
                        </div>
                        <div class="form-group">
                            <label for="recipient-senha" class="col-form-label">Senha:</label>
                            <input name="senha" type="text" class="form-control" id="recipient-senha"></input>
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
    <div class="modal fade" id="excluirUsu" tabindex="-1" aria-labelledby="exampleModalLabelExc" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelExc">Excluir Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost/teste/apagar-usuario.php" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" id="id_user"></input>
                        <h5>Deseja realmente apagar este usuário?</h5>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Excluir Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$('#editarUsu').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipientid = button.data('whateverid')
  var recipientnome = button.data('whatevernome')
  var recipientemail = button.data('whateveremail') 
  var recipientcargo = button.data('whatevercargo')
  var recipientuser = button.data('whateveruser')
  var recipientsenha = button.data('whateversenha')

  var modal = $(this)
  modal.find('.modal-title').text('Alterar Dados de ' + recipientnome)
  modal.find('#id_user').val(recipientid)
  modal.find('#recipient-nome').val(recipientnome)
  modal.find('#recipient-email').val(recipientemail)
  modal.find('#recipient-cargo').val(recipientcargo)
  modal.find('#recipient-user').val(recipientuser)
  modal.find('#recipient-senha').val(recipientsenha)
})

$('#excluirUsu').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipientid = button.data('whateverid')

    var modal = $(this)
    modal.find('#id_user').val(recipientid)
})
</script>

</body>
</html>
<?php
    require_once 'classes/usuarios.php';

    $u= new Usuario;
    $u->conectar("inss", "127.0.0.1", "root", "8800");
    if(isset($_SESSION['id_user']))
    {
        $informacoes = $u->buscarDadosUser($_SESSION['id_user']);
    }
    
   setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   date_default_timezone_set('America/Sao_Paulo');

?>
    <h1> Cadastro de Usuário </h1>
    <div>Cadastre apenas usuários que tem autorização na formatação do BSL</div>
    <br/>
            <div id="corpo-form">
                <form method="post" id="formulariocad">    
                    <input type="text" class="form-control" name="nome" placeholder="Nome Completo" maxlength="30" /><br />
                    <input type="email" class="form-control" name="email" placeholder="E-mail" maxlength="50" /><br />
                    <input type="text" class="form-control" name="cargo" placeholder="Cargo" maxlength="50" /><br />
                    <input type="text" class="form-control" name="username" placeholder="Username" maxlength="25" /><br />
                    <input type="password" class="form-control" name="senha" placeholder="Senha" maxlength="32" /><br />
                    <button type="submit" class="form-control" value="Cadastrar"/>Cadastrar</button> 
                </form>
            </div>
    <?php 
        if(isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $cargo = addslashes($_POST['cargo']);
            $username = addslashes($_POST['username']);
            $senha = addslashes($_POST['senha']);

            if(!empty($nome) && !empty($email)  && !empty($cargo)  && !empty($username) && !empty($senha)) {
                if($u->msgErro == "") {
                    if($u->cadastrar($nome, $email, $cargo, $username, $senha)) {
                        ?>
                        <script type="text/javascript">
                            alert('Usuário Cadastrado com Sucesso!');
                        </script>
                        <?php
                    }
                    else {
                        ?>
                        <script type="text/javascript">
                            alert('Email já cadastrado!');
                        </script>
                        <?php
                    }
                }
                else {
                    echo "Erro:".$u->msgErro;
                }
            }
            else {
                ?>
                <script type="text/javascript">
                    alert('Preencha todos os campos!');
                </script>
                <?php
            }
        }
    ?>
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
    

					   <h1>Acesso Restrito</h1>
                        <p class="description">Insira suas informações pessoais:</p>
                        
                        <form method="POST" class="login">
                        <fieldset class="grupo" class="login">   
                            <div class="campo">
                                <label for="username">Nome Usuário</label><br/>
                                <input type="text" class="form-control" name="username" placeholder="username" /><br />
                            </div>
                            <div class="campo">
                                <label for="senha">Senha</label><br/>
                                <input type="password"  class="form-control" name="senha" placeholder="Senha" /><br />
                            </div>
                            
                            <button type="submit" class="btn btn-primary" value="LOGAR">Entrar</button> 

                        </fieldset> 
                        </form> 
                        <?php
                            if(isset($_POST['username']))
                            {
                                $username = addslashes($_POST['username']);
                                $senha = addslashes($_POST['senha']);

                                if(!empty($username) && !empty($senha))
                                {   
                                    if($u->msgErro == "")
                                    {
                                        if($u->logar($username, $senha))
                                        {
                                            header("location:index.php");

                                        }
                                        else
                                        {
                                            ?>
                                                <script type="text/javascript">
                                                alert('E-mail e/ou Senha estão incorretos!');
                                                </script>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "Erro:".$u->msgErro;
                                    }
                                }
                                else
                                {
                                    ?>
                                        <script type="text/javascript">
                                        alert('Preencha todos os campos!');
                                        </script>
                                    <?php
                                }
                            }

                        ?>

<?php


    require_once 'classes/usuarios.php';

    $u= new Usuario;
    $u->conectar("inss", "127.0.0.1", "root", "8800");
    $busca = $u->buscarUsuario();
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   date_default_timezone_set('America/Sao_Paulo');



?>
        <h1>Editar Usuários</h1>
                            <p>
                                Usuários Cadastrados
                            </p>
                                <pre>
                                <div class="row">
                                    <div class="col-md-10">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Cargo</th>
                                                    <th>Ação</th>
                                                </tr>
                                                <tr>
                                                <?php foreach ($busca as $dado) {?>   
                                                </tr>
                                                    <td><?php echo $dado["nome"]; ?></td>
                                                    <td><?php echo $dado["cargo"]; ?>
                                                    <td><?php echo ""?><button id="editar" type="button" class="btn btn-xs btn-warning">Editar</button></td>
                                                <?php  } ?>
                                            </thead>
                                            <tbody>


                                            
                                            </tbody> 
                                        </table>
                                        <div id="editar">
                                            <?php
                                            $dado["id"];
                                            $sql_code = "DELETE FROM users WHERE id=".$dado["id"];

                                            ?>
                                        </div>
                                    </div>
                                </div>
                                </pre>
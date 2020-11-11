<?php
    ob_start();
    session_start();
    require_once 'classes/usuarios.php';

    $u= new Usuario;
    $u->conectar("inss", "127.0.0.1", "root", "8800");
    if(isset($_SESSION['id_user']))
    {
        $informacoes = $u->buscarDadosUser($_SESSION['id_user']);
    }

    
    require_once 'classes/bsl.php';
    $b = new bsl;
    $b->conectar("inss", "127.0.0.1", "root", "8800"); 
    $busca = $b->buscarBsl();
    $busca2 = $b->buscarBsl();

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Publicação BSL Juiz de Fora</title>
    <link rel="shortcut icon" type="image/png" href="img/inss.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tree-viewer.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="wrapper">
        <div class="left-side">
            <div class="logo">
                <img src="img/inss-logo.png" alt="" />
            </div>
            <nav class='menuLateral'>
                <div class="left-content">
                    <ul class="menu" role="tablist">
                        <li role="presentation" class="active"><a href="#one" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-home"></i></span>Bem vindo</a></li>
                        <?php
                                if(isset($informacoes))
                                { ?>
                                    <li role="presentation"><a href="#" class="bsl"aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-file"></i></span>BSL<span id="seta" class="material-icons">arrow_drop_down</span></a>
                                        <ul class="itensBsl">
                                            <li role="presentation"><a href="#cadastro_bsl" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-file"></i></span>Cadastrar BSL</a>
                                            <li role="presentation"><a href="#tabela_bsl" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-table"></i></span>Numeração BSL</a>
                                            <li role="presentation"><a href="#edicao_bsl" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-pencil"></i></span>Editar BSL</a>
                                        </ul>
                                    </li>
                        <?php   }
                                else
                                { ?>
                                    <li role="presentation"><a href="#publicacoes" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-folder"></i></span>Publicações</a></li>
                        <?php   }
                                if(isset($informacoes))
                                { ?>
                                    <li role="presentation"><a href="#" class="usuario"aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-users"></i></span>Usuário<span class="material-icons">arrow_drop_down</span></a>
                                        <ul class="itensUsuario">
                                            <li role="presentation"><a href="#cadastro_usuario" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-users"></i></span>Cadastro</a>
                                            <li role="presentation"><a href="#editar_usuario" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-pencil"></i></span>Editar/Excluir</a>
                                        </ul>
                                    </li>
                        <?php   }
                                else
                                { ?>
                                    <li role="presentation"><a href="#pesquisa" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-search"></i></span>Pesquisa BSL</a></li>
                        <?php   }
                                if(isset($informacoes))
                                { ?>
                                    <li role="presentation"><a href="exit.php" aria-controls="home" role="tab"><span><i class="fa fa-sign-out"></i></span>Sair</a></li>
                        <?php   }
                                else
                                { ?>
                                    <li role="presentation"><a href="#login" aria-controls="home" role="tab" data-toggle="tab"><span><i class="fa fa-user"></i></span>Acesso Privado</a></li>
                        <?php   }

                                ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
        <div class="right-side">
            <div class="right-content">
                <div id="one" class="content active fade in">
                    <h1><span>Publicação BSL</span> - INSS Juiz de Fora</h1>
                    <div class="content-welcome">
                        
                            <?php
                            if(isset($_SESSION['id_user']))
                            { ?>
                                <p>
                                    <?php
                                    echo "Olá! ";
                                    echo $informacoes['nome'];
                                    echo " , seja bem vindo(a)!";
                                    ?>
                                </p>
                            <?php   }
                            else
                            { ?>
                                <p>
                            Para acessar BSL's publicados clique no Menu "Publicações"
                                 </p>

                            <?php  }

                            ?>
                            
                        
                    </div>
                </div>
                <?php
                    if(isset($informacoes)) {
                ?>
                        <div id="cadastro_bsl" class="content fade">
                            <?php 

                            include "cadastro-bsl.php";
                            ?>
                        </div>
                <?php
                    }
                    else {
                ?>
                        <div id="publicacoes" class="content fade">
                            <?php
                            include "publicacao.php";
                            ?>
                            
                        </div>
                <?php
                    }
                    if(isset($informacoes)) {
                ?>
                        <div id="cadastro_usuario" class="content fade">
                            <?php

                            include "cadastro-usuario.php";
                            ?>

                        </div>  
                <?php
                    }
                    else {
                ?>
                        <div id="pesquisa" class="content fade">
                            <?php
                            include "pesquisa-bsl.php";
                            ?>

                        </div>
                <?php
                    }
                    if(isset($informacoes)) {
                ?>
                        <div id="editar_usuario" class="content fade">
                            <?php
                            include "editar-usuarios.php";
                            ?>
                        </div>
                        <div id="tabela_bsl" class="content fade">
                            <?php
                            include "exib-tabela-bsl.php";
                            ?>
                        </div>
                        <div id="edicao_bsl" class="content fade">
                            <?php

                            include "edicao-bsl.php";
                            ?>
                        </div>   
                <?php
                    }
                    else {
                ?>
                        <div id="login" class="content fade">


                            <?php
                            include "login.php";
                            ?>

                        </div>
                <?php
                    }
                ?>
            </div>
        </div>

    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jstree.min.js"></script>
    <script src="js/jstree.active.js"></script>
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
</body>
<?php ob_end_flush(); ?>
</html>
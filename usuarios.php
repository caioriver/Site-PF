<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mercadinho Gomes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="icones/online-shopping.ico">

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        
        <!-- Hover.css -->
        <link rel="stylesheet" href="css/hover-min.css">
        
        <!-- Animate.css -->
        <link rel="stylesheet" href="css/animate.min.css">
        
        <!-- CSS do Desenvolvedor -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/styleUsuarios.css">
        <link rel="stylesheet" type="text/css" href="css/responsiveContato.css">
        <link rel="stylesheet" type="text/css" href="css/styleNavbar.css">
    </head>
    <body>
        <!-- Navbar -->
        <header>
            <nav class="navbar navbar-expand-lg fixed-top cor-navbar">  
                <div class="container">
                    <a class="navbar-brand" href=""><img src="icones/logo.png" width="150"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                        <img src="icones/menu.png" width="30">
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSite">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-center" href="index.php">Início</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-center" href="QuemSomos.php">Quem Somos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-center" href="produtos.php">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-center" href="usuarios.php">Usuários</a>
                                <div class="pg-atual animated fadeIn slow"></div>
                            </li>
                        </ul>
                    </div>
                </div>    
            </nav>
        </header>

        <!-- Contato-nos -->
        <?php
            require_once "Templates/contate-nos.php"
        ?>
        <!-- Fim de Contate-nos -->

        <!-- Usuario -->
        <div class="container-fluid">
            <div class="container">
                <div class="caixaForm">
                    <form action="fun/login.php" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <h1>LOGIN</h1>
                            </div>
                            <div class="cadastro">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="caixaInput">
                                            <div class="textoInput">E-mail</div>
                                            <input type="text" name="log-mail" class="entrada">
                                                <?php
                                                    if (!(empty($_SESSION['e-log-mail']))) {
                                                        echo '<br>' .$_SESSION['e-log-mail'];
                                                        unset($_SESSION['e-log-mail']);
                                                    }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="caixaInput">
                                            <div class="textoInput">Senha</div>
                                            <input type="password" name="log-pass" class="entrada">
                                                <?php
                                                    if (!(empty($_SESSION['e-log-pass']))) {
                                                        echo '<br>' .$_SESSION['e-log-pass'];
                                                        unset($_SESSION['e-log-pass']);
                                                    }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row op-cadastro justify-content-between">
                                    <div class="col-6">
                                        <a href="esqueceuSenha.php">Esqueceu a senha?</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="cadastro.php">Não possui um cadastro? Solicite um.</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-12 col-sm-6 col-md-6 col-lg-6 hvr-bounce-in">
                                        <div class="caixaInput">
                                            <input type="submit" value="Entrar" class="btn-login">
                                        </div>
                                    </div>
                                    <div class=" col-12 col-sm-6 col-md-6 col-lg-6 hvr-bounce-out">
                                        <div class="caixaInput">
                                            <input type="button" value="Voltar" onClick="history.go(-1)" class="btn-login">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Fim de Usuario -->

        <!-- Footer -->
        <footer>
        <?php
            require_once "Templates/footer.php";
        ?>
        </footer>
        <!-- Fim do Footer -->

        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/functions.js"></script>
    </body>
</html>
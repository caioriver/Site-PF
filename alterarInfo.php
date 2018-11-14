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

    <!-- Formulário -->
    <div class="container-fluid">
        <div class="container">
            <div class="caixaForm">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>ALTERAR INFORMAÇÕES</h1>
                        </div>
                        <div class="cadastro">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="caixaInput">
                                        <div class="textoInput">E-mail</div>
                                        <input type="text" name="" class="entrada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="caixaInput">
                                        <div class="textoInput">Endereço</div>
                                        <input type="text" name="" class="entrada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="caixaInput">
                                        <div class="textoInput">Senha atual</div>
                                        <input type="password" name="" class="entrada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="caixaInput">
                                        <div class="textoInput">Nova senha</div>
                                        <input type="password" name="" class="entrada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="caixaInput">
                                        <div class="textoInput">Confirmar nova senha</div>
                                        <input type="password" name="" class="entrada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 hvr-bounce-in">
                                    <div class="caixaInput">
                                        <input type="submit" value="Alterar" class="btn-login">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-around">
                                <div class=" op-info col-sm-11">
                                    <a href="historico.php">Ver Histórico de Compras</a>
                                </div>
                                <div class="op-info col-sm-1">
                                    <a href="">Sair</a>
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
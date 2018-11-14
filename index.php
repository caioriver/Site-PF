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
        <link rel="stylesheet" type="text/css" href="css/styleHome.css">
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
                                <div class="pg-atual animated fadeIn slow"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-center" href="QuemSomos.php">Quem Somos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-center" href="produtos.php">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-center" href="usuarios.php">Usuários</a>
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

        <!-- Slide -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!--  -->
            <ol class="carousel-indicators">
                <div class="mx-2 indicador" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></div>
                <div class="mx-2 indicador" data-target="#carouselExampleIndicators" data-slide-to="1"></div>
                <div class="mx-2 indicador" data-target="#carouselExampleIndicators" data-slide-to="2"></div>
                <div class="mx-2 indicador" data-target="#carouselExampleIndicators" data-slide-to="3"></div>
                <div class="mx-2 indicador" data-target="#carouselExampleIndicators" data-slide-to="4"></div>
            </ol>
            
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" id="slide01"></div>
                <div class="carousel-item" id="slide02"></div>
                <div class="carousel-item" id="slide03"></div>
                <div class="carousel-item" id="slide04"></div>
                <div class="carousel-item" id="slide05"></div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <img src="icones/left-arrow.png" alt="">
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <img src="icones/right-arrow.png" alt="">
                <span class="sr-only">Next</span>
            </a>
        </div>

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
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>

</html>
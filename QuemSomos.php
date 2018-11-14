<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mercadinho Gomes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icones/online-shopping.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    
    <!-- Animate -->
    <link rel="stylesheet" href="css/animate.min.css">

    <!-- Hover.css -->
    <link rel="stylesheet" href="css/hover-min.css">
 
    <!-- CSS do Desenvolvedor -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsiveContato.css">
    <link rel="stylesheet" type="text/css" href="css/styleNavbar.css">
    <link rel="stylesheet" type="text/css" href="css/styleQuemSomos.css">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg cor-navbar">  
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
                            <div class="pg-atual animated fadeIn slow"></div>
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

    <!-- Quem Somos -->
    <div class="text-justify" id="quem-somos">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="icones/logo-vertical.png" class="imagem mt-5">
                </div>
                <div class="col-lg-8 col-md-12 animated fadeInUp slow">
                    <h2 class="titulo mt-5 mb-3">Quem Somos?</h2>
                    <p class="texto">O Mercado Gomes é um estabelecimento presente na vida dos nossos fregueses por mais de 8 anos, fornecendo produtos de qualidade e preços atraentes a altura de que os clientes merecem. Com localidade no Caminho das Arvores, em Salvador, e posteriormente uma filial em Itapuã, é mostrado diariamente como o Mercado Gomes opera de forma eficiente e eficaz para que as pessoas tenham o melhor consumo e atendimento que o estabelecimento pode oferecer com entregas delivery nos finais de semana. Sempre mostrando-se presente na vida dos moradores dos bairros que a loja reside.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Depoimentos -->
    <div class="tab-content">
        <div class="tab-pane active">
            <h3 class="sbt-head">Depoimentos dos Clientes</h3>
            <div class="slider">
                <div class="slide">
                    <div class="media">
                        <img class="align-self-start mr-2" src="icones/aspas-abre.png" width="25" alt="Abre aspas">
                        <div class="media-body">
                            <div class="sbt-text mt-0 mb-1">
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;COMENTÁRIO DO CLIENTE
                                </p>
                            </div>                            
                        </div>
                            <img class="align-self-end ml-2" src="icones/aspas-fecha.png" width="25" alt="Fecha aspas">
                    </div>
                    <div class="sbt-meta">
                        <p class="sbt-title">- Cliente 1</p>
                    </div>
                </div>
                <div class="slide">
                    <div class="media">
                        <img class="align-self-start mr-2" src="icones/aspas-abre.png" width="25" alt="Abre aspas">
                        <div class="media-body">
                            <div class="sbt-text mt-0 mb-1">
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;COMENTÁRIO DO CLIENTE
                                </p>
                            </div>                            
                        </div>
                            <img class="align-self-end ml-2" src="icones/aspas-fecha.png" width="25" alt="Fecha aspas">
                    </div>
                    <div class="sbt-meta">
                        <p class="sbt-title">- Cliente 2</p>
                    </div>
                </div>
                <div class="slide">
                    <div class="media">
                        <img class="align-self-start mr-3" src="icones/aspas-abre.png" width="25" alt="Abre aspas">
                        <div class="media-body">
                            <div class="sbt-text mt-0 mb-1">
                                <p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;COMENTÁRIO DO CLIENTE
                                </p>
                            </div>                            
                        </div>
                        <img class="align-self-end ml-2" src="icones/aspas-fecha.png" width="25" alt="Fecha aspas">
                    </div>
                    <div class="sbt-meta">
                        <p class="sbt-title">- Cliente 3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Fim depoimentos -->

<!-- Mapas -->
<div id="mapas" class="container">
    <h2 class="titulo-mapa">Nosso Local</h2>
    <p class="texto-mapa"><img src="icones/localização.png" width="30" alt="">Alameda dos Umbuzeiros 81, Caminho das Árvores, Salvador - BA</p>
    <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.800278913482!2d-38.46308618517783!3d-12.984622390847301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7161b171b544be3%3A0x67beac7af2449d9a!2sAlameda+dos+Umbuzeiros%2C+81+-+Caminho+das+%C3%81rvores%2C+Salvador+-+BA%2C+41820-680!5e0!3m2!1spt-BR!2sbr!4v1541981578008" allowfullscreen></iframe>
    </div>
</div>
<!-- Fim de Mapas -->

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
    <script src="js/depoimentos.js"></script>
    <script src="js/sliderdepoimentos.js"></script>
</body>
</html>

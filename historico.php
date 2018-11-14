<?php 
session_start();
require_once "./fun/_fixed.php";
$connect = db_connect();
$query_0 = "SELECT idprod,dadd,nomeprod,preco FROM hist WHERE iduser = :iduser ORDER BY dadd DESC; ";
$stmt_0 = $connect->prepare($query_0);
$stmt_0->bindValue(':iduser',$_SESSION['id']);
$stmt_0->execute();


$query_1 = "SELECT debit,nome FROM usuarios WHERE id = :id;";
$stmt_1 = $connect->prepare($query_1);
$stmt_1->bindValue(':id',$_SESSION['id']);
$stmt_1->execute();
$list_user = $stmt_1->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

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
    <link rel="stylesheet" type="text/css" href="css/responsiveContato.css">
    <link rel="stylesheet" type="text/css" href="css/styleNavbar.css">
    <link rel="stylesheet" type="text/css" href="css/styleHistorico.css">
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

    <!-- Tabela Histórico -->
    <div class="historico">
        <div class="container">
            <div class="row text-center justify-content-center">
                <h1 class="mb-5">HISTÓRICO DE COMPRAS <?php echo'<br>NOME:'.strtoupper($list_user['nome']).'<br>DÉBITO R$: '.$list_user['debit'];?></h1>
            </div>
            <div class="tabela">
                <div class="container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Repetir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($list_0 = $stmt_0->fetch(PDO::FETCH_ASSOC)):?>
                            <tr>
                                <th scope="row"><?php echo($list_0['dadd']);?></th>
                                <td><?php echo($list_0['nomeprod']);?></td>
                                <td><?php echo($list_0['preco']);?></td>
                                <?php $_SESSION['prod'] = $list_0['idprod'];?>
                                <td>
                                    <form action="recomprar.php" method="POST">
                                        <input type="submit" class="btn-login" value="Comprar">
                                    </form>
                                </td>
                            </tr>
                            <?php endwhile;?>                           
                        </tbody>
                    </table>
                    <div class="row justify-content-around">
                        <div class=" op-info col-sm-6 text-center col-6 col-md-6">
                            <a href="alterarInfo.php">Alterar Cadastro</a>
                        </div>
                        <div class="op-info col-sm-6 text-center col-6 col-md-6">
                            <a href="./fun/logoff.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
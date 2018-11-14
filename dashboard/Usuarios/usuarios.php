<!-- header -->
<?php
require_once "../Constructs/header.php";
?>

<html>
    <link rel="stylesheet" type="text/css" href="../CSS/navbar_dashboard.css">
    <link rel="stylesheet" type="text/css" href="../CSS/navbar_dashboard.css">
    <link rel="stylesheet" type="text/css" href="../CSS/usuarios.css">

    <body>
        
        <!-- NAVBAR -->
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Mercadinho Gomes</h3>
                    <strong>MG</strong>
                </div>            
                <ul class="list-unstyled components menuu">
                    <div class="cordefundo">
                        <li>
                            <a href="../Principal/principal.php">
                                Principal
                            </a>
                        </li>
                        <li class="active">
                            <a href="../Usuarios/usuarios.php">
                                Usuários
                            </a>
                        </li>
                        <li>
                            <a href="../Requisicoes/requisicoes_CRUD.php">
                                Requisições
                            </a>
                        </li>
                        <li>
                            <a href="../Estoque/estoque_CRUD.php">
                                Estoque
                            </a>
                        </li>
                        <li>
                            <a href="../Sair/sair.php">
                                Sair
                            </a>
                        </li>  
                    </div>
                </ul>            
            </nav>

            <!-- Começo da pagina -->
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-info botaomenu">
                            <i class="fas fa-align-left"></i>
                            <span>Menu</span>
                        </button>
                        <div class="title justify-content-center text-center">
                            <h1>Usuários</h1>
                        </div>
                    </div>
                </nav>

                <section id="cards justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-7 col-sm-4 col-md-5 col-lg-4 col-xl-4">
                            <a href="usuarios_criar.php">
                                <div class="card text-center border-lowblue mb-3  configImagem" >
                                    <div class="card-body text-success">
                                        <div class="justify-content-center align-content-center align-items-center col-auto imagens">
                                            <img class="d-flex justify-content-center card-img-top plus-card-img" src="../Images/card-plus.png" alt="Card image cap">
                                        </div>
                                        <p class="card-foot">
                                            Criar Usuário
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-7 col-sm-4 col-md-5 col-lg-4 col-xl-4">
                            <a href="usuarios_CRUD.php">
                                <div class="card text-center border-lowblue mb-3  configImagem" >
                                    <div class="card-body text-success">
                                        <div class="justify-content-center align-content-center align-items-center col-auto imagens">
                                            <img class="d-flex justify-content-center card-img-top plus-card-img" src="../Images/card-edit.png" alt="Card image cap">
                                        </div>
                                        <p class="card-foot">
                                            Editar Usuário
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>      
        <?php
            require_once "../Constructs/footer.php"
        ?>
        
    </body>
</html>

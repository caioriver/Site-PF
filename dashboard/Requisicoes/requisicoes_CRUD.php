<!-- header -->
<?php
require_once "../Constructs/header.php";
require_once "listar_requisicoes.php";
?>


<html>
<link rel="stylesheet" type="text/css" href="../CSS/navbar_dashboard.css">
<link rel="stylesheet" type="text/css" href="../CSS/requisicoes_CRUD.css">

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
                    <li>
                        <a href="../Usuarios/usuarios.php">
                            Usuarios
                        </a>
                    </li>
                    <li class="active">
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
                        <h1>Requisições</h1>
                    </div>
                </div>
            </nav>           
        <section>
            <div class="form-group">
                <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="row">
                        <div class="mt-3 col-4 col-sm-4 col-md-4 col-lg-4"> 
                            <label class="ml-3 label-select">Categoria:</label>
                        <select name = "type" class="form-control imput-select">
                            <option value = "nome">Nome</option>
                            <option value = "id">ID</option>
                            <option>Congelados</option>
                        </select>
                        </div>
                        <div class="mt-3 col-4 col-sm-4 col-md-4 col-lg-4"> 
                            <label class="ml-3 label-serach">Buscar por:</label>
                            <input name="busca" type="text" class="form-control imput-serach" placeholder="Nome do item">
                        </div>
                        <div class="mt-3 col-4 col-sm-4 col-md-4 col-lg-4"> 
                            <label class="ml-3 label-order">Ordenar por</label>
                            <select name="order" class="form-control imput-order">
                                <option value= "1">Mais antigos</option>
                                <option value = "2">Mais novos</option>
                                <option value = "3">Ordem alfabética</option>
                                <option value = "4">Maior dívida</option>
                                <option value = "5">Menor dívida</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </section>        
        <form method= "GET" action = "requisicoes_validar.php">  
            <div class="row">
                <div class="col-6 col-sm-3 text-center col-md-3 col-lg-3">                        
                    <button type="submit" class="btn botao btn-primary ">Buscar</button>
                </div>
                <div class="col-6 col-sm-3 text-center col-md-3 col-lg-3">                        
                    <input type=submit  class="btn botao btn-primary"onclick="window.location.href='requisicoes_validar.php'" value="Deletar múltiplos">
                </div>
                <div class="col-6 col-sm-3 text-center col-md-3 col-lg-3">                        
                    <input type="button" value="Exportar" class="btn botao btn-primary" onclick="window.location.href='imprimir_requisicoes.php'">
                </div>
                <div class="col-6 col-sm-3 text-center col-md-3 col-lg-3">                        
                    <input type="button" value="Adicionar" class="btn botao btn-primary" onclick="window.location.href='requisicoes_validar.php'" >
                </div>
            </div>
            <section id="table-control justify-content-center">
                <div class="table-control table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="table-id">ID da Compra</th>
                                <th scope="col" class="table-nome">Produto - Usuário</th>
                                <th scope="col" class="table-date">Data de Pedido</th>
                                <th scope="col" class="table-preco">Preço (R$)</th>
                                <th scope="col" class="table-edit">Validar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   while ($list_1 = $stmt_1->fetch(PDO::FETCH_ASSOC)):?>
                                <tr> 
                                    <td class="table-id"><?php echo($list_1['id']);?></td>
                                    <td class="table-nome"><?php echo ''.$list_1['nomeprod'].' - '.$list_1['catg'].' - '.$list_1['nomeuser'];?></td>
                                    <td class="table-date"><?php echo($list_1['dadd']);?></td>
                                    <td class="table-preco"><?php echo($list_1['preco']);?></td>
                                    <td>
                                        <input type="checkbox" value ="<?php echo($list_1['id']);?>" name='box[]'>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>    
                    </table>
                </div>
            </section>
        </form>
        <?php
            require_once "../Constructs/footer.php";
        ?>
    </body>
</html>

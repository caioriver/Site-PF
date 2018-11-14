<!-- header -->
<?php
require_once "../Constructs/header.php";
require_once "listar_estoque.php";
unset($_SESSION['user-edit']);
?>
<link rel="stylesheet" type="text/css" href="../CSS/navbar_dashboard.css">
<link rel="stylesheet" type="text/css" href="../CSS/estoque_CRUD.css">
<html>
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
                        <li>
                            <a href="../Requisicoes/requisicoes_CRUD.php">
                                Requisições
                            </a>
                        </li>
                        <li  class="active">
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
                            <h1>Estoque</h1>
                        </div>

                    </div>

                </nav>
                <section>
                    <div class="form-group">
                        <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="row">
                                <!-- NA DIV DE BAIXO EU DEIXEI col-4 NO CASO DE TU AJEITAR A NAVBAR, SE NÃO CONSEGUIR MUDA PARA col-6 -->
                                <div class="mt-3 col-4 col-sm-4 col-md-4 col-lg-4"> 
                                    <label class="ml-2 label-select">Buscar por</label>
                                    <select name="tipo" class="form-control imput-select">
                                        <option value ="1">Categoria</option>
                                        <option value = "2">Nome</option>
                                        <option value = "3">ID</option>
                                    </select>
                                </div>
                                <!-- NA DIV DE BAIXO EU DEIXEI col-4 NO CASO DE TU AJEITAR A NAVBAR, SE NÃO CONSEGUIR MUDA PARA col-6 -->
                                <div class="mt-3 col-4 col-sm-4 col-md-4 col-lg-4"> 
                                    <label class="ml-2 label-serach">Item:</label>
                                    <input name="busca" type="text" class="form-control imput-serach" placeholder="Nome do item">
                                </div>
                                <!-- NA DIV DE BAIXO EU DEIXEI col-4 NO CASO DE TU AJEITAR A NAVBAR, SE NÃO CONSEGUIR MUDA PARA col-6 -->
                                <div class="mt-3 col-4 col-sm-4 col-md-4 col-lg-4"> 
                                    <label class="mx-2 label-order">Ordenar por:</label>
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

                        <!--Fim da linha-->

                        <form method= "GET" action = "delete_multi.php">  
                            <div class="row">
                                <div class="col-6 col-sm-3 text-center col-md-3 col-lg-3">                        
                                    <button type="submit" class="btn botao btn-primary ">Buscar</button>
                                </div>
                                <div class="col-6 col-sm-3 col-md-3 col-lg-3">
                                    <input type=submit  class="btn botao btn-primary"onclick="window.location.href='delete_multi.php'" value="Deletar múltiplos">
                                </div>
                                <div class="col-6 col-sm-3 text-center col-md-3 col-lg-3">
                                    <input type="button" value="Exportar" class="btn botao btn-primary" onclick="window.location.href='imprimir_estoque.php'" >
                                </div>
                                <div class="col-6 col-sm-3 col-md-3 col-lg-3">                        
                                    <input type="button" value="Adicionar" class="btn botao btn-primary" onclick="window.location.href='estoque_criar.php'" >
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

                <section>
                    <div class="table-control table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="table-id">ID</th>
                                <th scope="col" class="table-nome">Nome - Categoria</th>
                                <th scope="col" class="table-date">Data de criação</th>
                                <th scope="col" class="table-preco">Preço (R$)</th>
                                <th scope="col" class="table-edit">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php   while ($list_1 = $stmt_1->fetch(PDO::FETCH_ASSOC)):?>
                                <td class="table-id"><?php echo($list_1['id']);?></td>
                                <td class="table-nome"><?php echo ''.$list_1['nome'].' - '.$list_1['catg'];?></td>
                                <td class="table-date"><?php echo($list_1['dadd']);?></td>
                                <td class="table-preco"><?php echo($list_1['preco']);?></td>
                                <td>
                                    <a class="table-edit-icon" href="estoque_editar.php?id=<?php echo $list_1['id'];?>">
                                        <img class="form-icon" alt="edit-icon" src="../Images/edit.png" >
                                        Editar
                                    </a>
                                    <a class="table-edit-icon" href="delete.php?id=<?php echo $list_1['id'];?>">
                                        <img class="form-icon" alt="edit-icon" src="../Images/delete.png" >
                                        Deletar
                                    </a>
                                    <input type="checkbox" value ="<?php echo($list_1['id']);?>" name='box[]'>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>  

        <?php
            require_once "../Constructs/footer.php"
        ?>     

    </body>
</html>
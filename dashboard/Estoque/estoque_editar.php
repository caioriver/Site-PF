<!-- header -->
<?php
    require_once "../Constructs/header.php";
    require_once "../../fun/_fixed.php";
    $connect = db_connect();
    // pega o ID da URL
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    
    // valida o ID
    $_SESSION['id-up'] = $id;

        $query_1 = 'SELECT nome,catg,preco,id FROM estoque WHERE id = :id';
        $stmt_1 = $connect->prepare($query_1);
        $stmt_1->bindValue(':id',$_SESSION['id-up']);
        $stmt_1->execute();
        $user_1 = $stmt_1->fetch(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" type="text/css" href="../CSS/navbar_dashboard.css">
<link rel="stylesheet" type="text/css" href="../CSS/forms.css">

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
                    <li class="active">
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
                        <h1>Adicionar Produto</h1>
                    </div>

                </div>

            </nav>

            <section>
                <div class="form-group">

                    <form action="validar_edicao.php" method="POST" enctype="multipart/form-data">
                        <?php if (!(empty($_SESSION['dbug']))) {
                            echo'<h3>'.$_SESSION['dbug'].'</h3>';
                            unset($_SESSION['dbug']);
                            }?>
                        <label class="label-nome ml-3 mt-4">Nome do item</label>
                        <?php if (!(empty($_SESSION['nome-e']))) {
                            echo'<a>'.$_SESSION['nome-e'].'</a>';
                            unset($_SESSION['nome-e']);
                        }?>
                        <input value="<?php  echo $user_1['nome'];?>" required type="text" name="nome" class="form-control" placeholder="Nome do item">
                        <label class="label-nome ml-3 mt-4">Categoria</label>
                        <select class="form-control" name="catg">
                            <option value="hortfruit">Horti-Fruti</option>
                            <option value="congelados">Congelados</option>
                        </select>

                        <label class="label-nome ml-3 mt-4">Email do administrador</label>
                        <?php if (!(empty($_SESSION['adm-mail-e']))) {
                            echo'<a>'.$_SESSION['adm-mail-e'].'</a>';
                            unset($_SESSION['adm-mail-e']);
                        }?>
                        <input required type="text" name="adm-mail" class="form-control" placeholder="E-mail">
                    
                        <label class="label-nome ml-3 mt-4">Senha do administrador</label>
                        <?php if (!(empty($_SESSION['adm-pass-e']))) {
                            echo'<a>'.$_SESSION['adm-pass-e'].'</a>';
                            unset($_SESSION['adm-pass-e']);
                        }?>
                        <input required type="password" name="adm-pass" class="form-control" placeholder="Senha">
                            
                        <label class="label-file ml-3 mt-4">Selecionar Imagen</label>
                        <input required type="file" name="file-img" class=" form-control form-img">
                        <label class="label-preco ml-3 mt-4">Preço</label>
                        <?php if (!(empty($_SESSION['preco-e']))) {
                            echo '<a>'.$_SESSION['preco-e'].'</a>';
                            unset($_SESSION['preco-e']);
                        }?>
                        <input type="text" name="preco" class="form-control imput-debit" placeholder="Ex 00,00 (R$)">
                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                                <button type="submit" class="btn botao btn-primary bt-valid">Validar</button>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4">                        
                                <button type="reset" class="btn botao btn-primary bt-valid">Limpar</button>
                            </div>
                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                <input type="button" value="Sair" class="btn botao btn-primary mb-4" onclick="window.location.href='estoque_CRUD.php'" >
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <?php
        require_once "../Constructs/footer.php"
    ?>
            
</body>
</html>

<!-- header -->
<?php
require_once "../Constructs/header.php";
require_once "../../fun/_fixed.php";
$connect = db_connect();
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
 
// valida o ID
$_SESSION['id-up'] = $id;

    $query_1 = 'SELECT nome,mail,cpf,tel,endc FROM usuarios WHERE id = :id';
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
                    <li class="active">
                        <a href="../Usuarios/usuarios.php">
                            Usuarios
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
                        <h1>Criar Usuário</h1>
                        <?php 
                            if (!(empty($_SESSION['dbug']))) {
                            echo '<h3>'.$_SESSION['dbug'].'</h3>';
                            unset($_SESSION['dbug']);
                        }
                        ?>
                        <?php echo $id;?>
                    </div>

                </div>

            </nav>



            <div id="title" class="title row">
                <h1 class="justify-content-center col-12">Editar usuário</h1>
                
            </div> <!--fim title-->

            <section>
                <div class="form-group">

                    <form action="validar_editar.php" method="POST">
                        <label class="mt-4 ml-3 label-nome">Inserir nome</label>
                        <?php if (!(empty($_SESSION['nome-e']))) {
                            echo '<a>'.$_SESSION['nome-e'].'</a>';
                            unset($_SESSION['nome-e']);
                            }
                        ?>
                        <input value ="<?php echo $user_1['nome'];?>"type="text" name="nome" class="form-control" name="nome" placeholder="Nome completo">
                        <div class="row">
                            <div class="col-6">
                                <label class="mt-4 ml-3 label-mail">E-mail</label>
                                    <?php if (!(empty($_SESSION['mail-e']))) {
                                        echo '<a>'.$_SESSION['mail-e'].'</a>';
                                        unset($_SESSION['mail-e']);
                                    }?>
                                <input value ="<?php echo $user_1['mail'];?>"type="email" name="mail" class="form-control imput-email" placeholder="E-mail">
                            </div>
                            <div class="col-6">
                                <label class="mt-4 ml-3 label-cpf">CPF</label>
                                <?php if (!(empty($_SESSION['cpf-e']))) {
                                    echo '<br><a>'.$_SESSION['cpf-e'].'</a>';
                                    unset($_SESSION['cpf-e']);
                                }?>
                                <input value ="<?php echo $user_1['cpf'];?>" type="text" name="cpf" class="form-control imput-cpf" placeholder="Ex: 000.000.00-00">
                            </div>
                        </div> <!--fim linha duas colunas-->

                        <div class="row">
                            <div class="col-6">
                                <label class="mt-4 ml-3 label-confirm-mail">Confirmar E-mail</label>
                                <?php if (!(empty($_SESSION['c-mail-e']))) {
                                    echo '<a>'.$_SESSION['c-mail-e'].'</a>';
                                    unset($_SESSION['c-mail-e']);
                                }?>
                                <input type="email" name="c-mail" class="form-control imput-email" placeholder="Confirmar E-mail">
                            </div>
                            <div class="col-6">
                                <label class="mt-4 ml-3 label-tel">Telefone</label>
                                <?php if (!(empty($_SESSION['tel-e']))) {
                                    echo '<a>'.$_SESSION['tel-e'].'</a>';
                                    unset($_SESSION['tel-e']);
                                }
                                    ?>
                                <input value ="<?php echo $user_1['tel'];?>" type="text" name="tel" class="form-control imput-cpf" placeholder="Ex: (DD) 0000-0000">
                            </div>
                        </div> <!--fim linha duas colunas-->

                        <label class="mt-4 ml-3 label-endereco">Endereço</label>
                        <?php if (!(empty($_SESSION['end-e']))) {
                            echo '<a>'.$_SESSION['end-e'].'</a>';
                            unset($_SESSION['end-e']);
                        }?>        
                        <input value ="<?php echo $user_1['endc'];?>" type="text" name="end" class="form-control" placeholder="Endereço">
                        <div class="row">
                            <div class="col-6">
                                <label class="mt-4 ml-3 label-senha">Senha</label>
                                <?php if (!(empty($_SESSION['pass-e']))) {
                                    echo '<a>'.$_SESSION['pass-e'].'</a>';
                                    unset($_SESSION['pass-e']);
                                }?>  
                                <input type="password" name="pass" class="form-control imput-senha" placeholder="Senha">
                            </div>
                            <div class="col-6">
                                <label class="mt-4 ml-3 label-confirm-senha">Confirmar senha</label>
                                <?php if (!(empty($_SESSION['c-pass-e']))) {
                                    echo '<a>'.$_SESSION['c-pass-e'].'</a>';
                                    unset($_SESSION['c-pass-e']);
                                }?>    
                                <input type="password" name="c-pass" class="form-control imput-confirm-senha" placeholder="Confirmar senha">
                            </div>
                        </div> <!--fim linha duas colunas-->

                        <label class="mt-4 ml-3 label-senha-adn">Senha do administrador principal</label>
                        <?php if (!(empty($_SESSION['adm-pass-e']))) {
                                echo '<a>'.$_SESSION['adm-pass-e'].'</a>';
                                unset($_SESSION['adm-pass-e']);
                            }?>      
                        <input type="password" name="adm-pass" class="form-control" placeholder="senha">
                        <label class="mt-4 ml-3 label-debit">Débito Inicial</label>
                        <input type="number" name="debit" class="form-control imput-debit" placeholder="Ex 00,00 (R$)">
                        <div class="row container">
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                                <button type="submit" class="btn botao btn-primary bt-valid">Validar</button>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                                <button type="reset" class="btn botao btn-primary bt-valid">Limpar</button>    
                            </div>
                            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                <input type="button" value="Sair" class="btn mb-4 botao btn-primary" onclick="window.location.href='usuarios_CRUD.php'" >                    
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

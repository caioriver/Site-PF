<?php
require_once "../../fun/_fixed.php";
$conect = db_connect();

    $query_1 = "SELECT id,iduser,idprod,nomeuser,catg,nomeprod,dadd,preco FROM requisicoes ORDER BY id ASC;";
    $stmt_1 = $conect->prepare($query_1);
    $stmt_1->execute();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

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
    
</body>
</html>
<?php toxls("tabela-requisicoes.xls");
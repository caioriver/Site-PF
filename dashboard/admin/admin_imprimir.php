<?php 
require_once "../../fun/_fixed.php";
$conect = db_connect();
$query_1 = "SELECT id,nome,dadd FROM admin ORDER BY id ASC;";
$stmt_1 = $conect->prepare($query_1);
$stmt_1->execute();
var_dump($stmt_1);
?><!DOCTYPE html>
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
                    <th scope="col" class="table-id">ID</th>
                    <th scope="col" class="table-nome">Nome</th>
                    <th scope="col" class="table-date">Data de criação</th>
                </tr>
            </thead>
            <?php   while ($list_1 = $stmt_1->fetch(PDO::FETCH_ASSOC)):?>                
            <tbody>
                <tr>
                    <td class="table-id"> <?php echo($list_1['id']);?> </td>
                    <td class="table-nome"> <?php echo($list_1['nome']);?> </td>
                    <td class="table-date"><?php echo($list_1['dadd']);?> </td>                    
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
    </body>
</html>
<?php
toxls('imprimir-admin.xls');
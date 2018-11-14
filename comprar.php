<?php 
session_start();
require_once "./fun/_fixed.php";
$connect = db_connect();

    if (empty($_SESSION['id'])) {
        header("Location: ./usuarios.php");
    }
$iduser = $_SESSION['id'];
$query_0 = 'SELECT nome,id FROM usuarios WHERE id = :id;';
$stmt_0 = $connect->prepare($query_0);
$stmt_0->bindValue(':id',$iduser);
$stmt_0->execute();
$list_0 = $stmt_0->fetch(PDO::FETCH_ASSOC);
var_dump($list_0);
// pega o ID da URL
$produto = isset($_POST['produto']) ? $_POST['produto'] : null;
$qx = isset($_POST['qx']) ? $_POST['qx'] : null;
var_dump($produto);
foreach($produto as $_valor){
    
    var_dump($_valor);
    // CAPTA DADOS DE USUARIO
    $query_1 = 'SELECT nome,id,preco,catg,id FROM estoque WHERE id = :idvar;';
    $stmt_1 = $connect->prepare($query_1);  
    $stmt_1->bindValue(':idvar',$_valor);
    $stmt_1->execute();
    $list_1 = $stmt_1->fetch(PDO::FETCH_ASSOC);
    var_dump($list_1);
    if (!(empty($list_1))) {
        
    // DEFINE DATA E HR
    $date = date('y-m-d');

    // INSERE A REQUISIÇAO
    $query_2 = 'INSERT INTO requisicoes (iduser,nomeuser,idprod,nomeprod,catg,dadd,preco,quant) VALUES (:iduser,:nomeuser,:id,:nomeprod,:catg,:dadd,:preco,:quant);';
    $stmt_2 = $connect->prepare($query_2);
    $stmt_2->bindValue(':iduser',$_SESSION['id']);
    $stmt_2->bindValue(':nomeuser',$list_0['nome']);
    $stmt_2->bindValue(':id',$list_1['id']);
    $stmt_2->bindValue(':nomeprod',$list_1['nome']);
    $stmt_2->bindValue(':preco',$list_1['preco']);
    $stmt_2->bindValue(':catg',$list_1['catg']);
    $stmt_2->bindValue(':dadd',$date);
    $stmt_2->bindValue(':quant',$qx);
    $stmt_2->execute();

    // GERA O HIST
    $query_3 = 'INSERT INTO hist (iduser,nomeuser,idprod,nomeprod,catg,dadd,preco,quant) VALUES (:iduser,:nomeuser,:id,:nomeprod,:catg,:dadd,:preco,:quant);';
    $stmt_3 = $connect->prepare($query_3);
    $stmt_3->bindValue(':id',$_SESSION['id']);
    $stmt_3->bindValue(':nomeuser',$list_0['nome']);
    $stmt_3->bindValue(':iduser',$list_0['id']);
    $stmt_3->bindValue(':nomeprod',$list_1['nome']);
    $stmt_3->bindValue(':preco',$list_1['preco']);
    $stmt_3->bindValue(':catg',$list_1['catg']);
    $stmt_3->bindValue(':dadd',$date);
    $stmt_3->bindValue(':quant',$qx);
    $stmt_3->execute();

    // ADICIONA A DIVIDA
    $query_4 ='UPDATE usuarios SET debit = debit - :debit WHERE id = :id;';
    $stmt_4 = $connect->prepare($query_4);
    $stmt_4->bindValue(':id',$list_0['id']);
    $stmt_4->bindValue(':debit',$list_1['preco']);
    $stmt_4->execute();
    }    
}



// header("Location: historico.php");
?>


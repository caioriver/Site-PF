<!-- header -->
<?php
require_once "../Constructs/header.php";
if ($_SESSION['type-user'] != 'super') {
     header("Location: ../Principal/principal.php");
}
require_once "../../fun/_fixed.php";
$conect = db_connect();
$query_2 = "SELECT DISTINCT(catg) FROM estoque;";
        $stmt_2= $conect->prepare($query_2);
        $stmt_2->execute();
        while($list_2 = $stmt_2->fetch(PDO::FETCH_ASSOC)):

        foreach ($list_2 as $var) {
        // $var = '"'.$list_2['catg'].'"';
        var_dump($var);
        }
    $query_3 = 'SELECT COUNT(catg) FROM estoque WHERE catg = :catg;';
    $stmt_3= $conect->prepare($query_3);
    $stmt_3->bindValue(':catg',$var);
    $stmt_3->execute();
    $list_3 = $stmt_3->fetch(PDO::FETCH_ASSOC);
    var_dump($list_3);
    //  $list_3 = $stmt_3->fetch(PDO::FETCH_ASSOC);
    // var_dump($list_3);
    echo '<br>';
    // var_dump($list_2);
    endwhile;?>
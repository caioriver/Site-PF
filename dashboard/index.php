<?php
// header ("Location: ../Dashboard/Principal/principal.php");
require_once "../fun/_fixed.php";
$conect = db_connect();
$query_1 = "SELECT nome FROM estoque;";
$stmt_1 = $conect->prepare($query_1);
$stmt_1->execute();
header ("Location: Principal/principal.php");
?>



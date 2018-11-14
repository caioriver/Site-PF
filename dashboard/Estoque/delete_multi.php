<?php 
session_start();
// COLETAR DADOS DAS TURMAS EXISTENTES
require_once "../../fun/_fixed.php";
// CONEXÃO
if (($_SESSION['type-user'] == 'super')) {
$cx = db_connect();
$_checkbox = $_GET['box'];
var_dump($_GET['box']);
foreach($_checkbox as $_valor){
$query1 = 'DELETE FROM estoque WHERE id = ' .$_valor.';';
$insert1 = $cx->prepare($query1);
$insert1->execute();
}

header("Location: estoque_CRUD.php");
} else {
    header("Location: estoque_CRUD.php");
}
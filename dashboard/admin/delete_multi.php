<?php 
session_start();
// COLETAR DADOS DAS TURMAS EXISTENTES
require_once "../../fun/_fixed.php";
// CONEXÃO
$cx = db_connect();
$_checkbox = $_GET['box'];

if ($_SESSION['type-super'] == 'super') {
foreach($_checkbox as $_valor){
$query1 = 'DELETE FROM admin WHERE id = ' .$_valor.';';

$insert1 = $cx->prepare($query1);
$insert1->execute();
}

header("Location: admin_CRUD.php");
} else {
    header("Location: admin_CRUD.php");
}

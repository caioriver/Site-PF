<?php 
session_start();
// COLETAR DADOS DAS TURMAS EXISTENTES
require_once "../../fun/_fixed.php";
// CONEXÃO
if (iiset($_GET['box'])) {
    $_GET['box'] = null;
    header("Location: usuarios_CRUD.php");
}
if (($_SESSION['type-user'] == 'super')) {
$cx = db_connect();
$_checkbox = $_GET['box'];
foreach($_checkbox as $_valor){
$query1 = 'DELETE FROM usuarios WHERE id = ' .$_valor.';';
$insert1 = $cx->prepare($query1);
$insert1->execute();
}
header("Location: usuarios_CRUD.php");
} else {
    header("Location: usuarios_CRUD.php");
}

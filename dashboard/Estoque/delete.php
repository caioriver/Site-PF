<?php 
require_once "../Constructs/header.php";
require_once "../../fun/_fixed.php";
$connect = db_connect();
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
 
// valida o ID
$_SESSION['id-up'] = $id;
// pega o ID da URL
$id = isset($_GET['id']) ? $_GET['id'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID não informado";
    header("Location: estoque_CRUD.php");
}
 
// remove do banco
$connect = db_connect();
$sql = "DELETE FROM estoque WHERE id = :id";
$stmt = $connect->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: estoque_CRUD.php');
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
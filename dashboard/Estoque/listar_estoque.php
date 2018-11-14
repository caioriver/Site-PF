<?php
require_once "../../fun/_fixed.php";
$conect = db_connect();


    if (empty($_POST['tipo']))
    {
        $tipo = " ";
        $texto = " ";
        $orderby = " ";
        $query_1 = "SELECT id,nome,catg,dadd,preco FROM estoque ORDER BY id ASC;";
        $stmt_1 = $conect->prepare($query_1);
        $stmt_1->execute();

    } else $tipo = $_POST['tipo'];

if (empty($_POST['order'])) {

    $order = 'ORDER BY id ASC';

} else {
    
    switch ($_POST['order']) {
        case '1':
            $order = "ORDER BY dadd  DESC";
        break;
        
        case '2':
            $order = "ORDER BY dadd ASC";
        break;

        case '3':
            $order = "ORDER BY nome ASC";
        break;

        case '4':
             $order = "ORDER BY debit ASC";
         break;

         case '5':
            $order = "ORDER BY debit DESC";
         break;
        default:
            # code...
            break;
    }
}
if (empty($_POST['busca'])) {
    $query_1 = 'SELECT id,nome,catg,dadd,preco FROM estoque '.$order.';';
    $stmt_1 = $conect->prepare($query_1);
    $stmt_1->execute();
} else {
switch ($tipo) {
    
    case '1':
        $texto = '"%'.$_POST['busca'].'%"'; 
        $query_1 = 'SELECT nome,catg,id,dadd,preco FROM estoque WHERE catg LIKE '.$texto.' '.$order.';';
        
        $stmt_1 = $conect->prepare($query_1);
        // $stmt_1->bindValue('text',$texto);
        $stmt_1->execute();
    break;

    case '2':

            $texto = '"%'.$_POST['busca'].'%"'; 
            $query_1 = 'SELECT nome,catg,id,dadd,preco FROM estoque WHERE nome     LIKE '.$texto.' '.$order.';';
            $stmt_1 = $conect->prepare($query_1);
            $stmt_1->execute();
    
        
    break;

    case '3':
            
            $texto = '"%'.$_POST['busca'].'%"'; 
            $query_1 = 'SELECT nome,catg,id,dadd,preco FROM estoque WHERE id LIKE '.$texto.' '.$order.';';
            $stmt_1 = $conect->prepare($query_1);
            $stmt_1->execute();
    break;
 }
}
// IMPRESSÃO DE TESTE
//  echo $query_1;
?>

<?php
session_start();
require_once "../../fun/_fixed.php";
$conect = db_connect();

if (empty($_POST)) {
    $_SESSION['debug'] = "Não foi possivel postar";
} else {

    
    
    $val = new validacao;
        $_SESSION['nome-e'] = $val->validarNome($_POST['nome']);
        $_SESSION['adm-mail-e'] = $val->validarEmail($_POST['adm-mail']);
        $_SESSION['adm-pass-e'] = $val->validarSenha($_POST['adm-pass']);
        $_SESSION['file-img-e'] = $val->validarFile($_FILES['file-img']);
        $_SESSION['preco-e'] = $val->validarDec($_POST['preco'],'Preço');
        $id = $_SESSION['id-up'];

        $file_ex = strtolower(substr($_FILES['file-img']['name'], -4));
        $fileNome = sha1(time()).$file_ex;
        $dir = "images/";
        move_uploaded_file($_FILES['file-img']['tmp_name'], $dir.$fileNome);        
        // echo $_SESSION['file-img-e'];
        // var_dump([$_SESSION['nome-e']]);
}
        $query_1 = 'SELECT pass,mail FROM superadmin WHERE mail = :mail;';
        $stmt_1 = $conect->prepare($query_1);
        $stmt_1->bindValue(':mail',$_POST['adm-mail']);
        $stmt_1->execute();
        $superadm = $stmt_1->fetch(PDO::FETCH_ASSOC);

        // var_dump($superadm);       
        if (empty($superadm)) {
        $query_1 = 'SELECT pass,mail FROM admin WHERE mail = :mail;';
        $stmt_1 = $conect->prepare($query_1);
        $stmt_1->bindValue(':mail',$_POST['adm-mail']);
        $stmt_1->execute();
        $superadm = $stmt_1->fetch(PDO::FETCH_ASSOC);

        if (empty($superadm)) {
            $_SESSION['dbug'] = "Dados inválidos";
            header ("Location: estoque_editar.php?id=$id");
        } else if (sha1($_POST['adm-pass']) == $superadm['pass']) {
            if  ($_SESSION['preco-e'] == NULL && $_SESSION['nome-e'] == NULL 
            && $_SESSION['adm-mail-e'] == NULL && $_SESSION['adm-pass-e'] == NULL)
                {        
                    $query_2 = 'UPDATE estoque 
                    SET nome = :nome,
                    catg = :catg,
                    img = :img,
                    preco = :preco
                    WHERE id = :id;';
                    $stmt_2 = $conect->prepare($query_2);
                    $stmt_2->bindValue(':nome',$_POST['nome']);
                    $stmt_2->bindValue(':catg',$_POST['catg']);
                    $stmt_2->bindValue(':img',$fileNome);
                    $stmt_2->bindValue(':id',$_SESSION['id-up']);
                    $stmt_2->bindValue(':preco',$_POST['preco']);
                    $stmt_2->execute();
                    
                $_SESSION['dbug'] = "Dados cadastrados";
                header ("Location: estoque_editar.php");
                    
                } else 
            {   
                
                $_SESSION['dbug'] = "Dados inválidos";
                header ("Location: estoque_editar.php?id=$id");
                
                
                }
             
        } else {
            $_SESSION['adm-mai-el'] ="Senha incorreta";
            $_SESSION['dbug'] = "Dados inválidos";
            header ("Location: estoque_editar.php?id=$id");
                
        }   
    }   
         else {
            $_SESSION['dbug'] = "Dados inválidos";
                $_SESSION['adm-pass-e'] = "Senha inválida";
                header ("Location: estoque_editar.php?id=$id");
            }

        


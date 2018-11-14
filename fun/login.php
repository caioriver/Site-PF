<?php
require_once "_fixed.php";
$connect = db_connect();
session_start();
$val = new validacao;

    $_SESSION['e-log-mail'] = $val->validarEmail($_POST['log-mail']);
    $_SESSION['e-log-pass'] = $val->validarSenha($_POST['log-pass']);
    // echo($_SESSION['e-log-mal']);

    if ($_SESSION['e-log-mail'] == NULL && $_SESSION['e-log-mail'] == NULL) {
        
        $query_1 = 'SELECT mail,pass FROM superadmin WHERE mail = :mail';
        $stmt_1 = $connect->prepare($query_1);
        $stmt_1->bindValue(':mail',$_POST['log-mail']);
        $stmt_1->execute();
        $user_1 = $stmt_1->fetch(PDO::FETCH_ASSOC);
        $_SESSION['type-user'] = 'super';
        
        if (!(empty($user_1))) {
            
            if ($user_1['pass'] == sha1($_POST['log-pass'])) {
                header("Location: ../dashboard/");
            
            } else {
                $_SESSION['e-log-pass'] = "Senha inválida";
                header("Location: ../usuarios.php");

            }
    } else {
        $query_1 = 'SELECT mail,pass FROM admin WHERE mail = :mail';
        $stmt_1 = $connect->prepare($query_1);
        $stmt_1->bindValue(':mail',$_POST['log-mail']);
        $stmt_1->execute();
        $user_1 = $stmt_1->fetch(PDO::FETCH_ASSOC);
        $_SESSION['type-user'] = 'admin';
        if (!(empty($user_1))) {
            
            if ($user_1['pass'] == sha1($_POST['log-pass'])) {
                header("Location: ../dashboard/");
        
            } else{
                $_SESSION['e-log-pass'] = "Senha inválida";
                header("Location: ../usuarios.php");
            }
        } else {
            $query_1 = 'SELECT id,mail,pass FROM usuarios WHERE mail = :mail';
            $stmt_1 = $connect->prepare($query_1);
            $stmt_1->bindValue(':mail',$_POST['log-mail']);
            $stmt_1->execute();
            $user_1 = $stmt_1->fetch(PDO::FETCH_ASSOC);
            
            if (!(empty($user_1))) {
                
                if ($user_1['pass'] == sha1($_POST['log-pass'])) {
                    $_SESSION['id'] = $user_1['id'];
                    $_SESSION['mail'] = $user_1['mail'];
                    header("Location: ../produtos.php");
                    
                } else{
                    $_SESSION['e-log-pass'] = "Senha inválida";
                    header("Location: ../usuarios.php");
                }
            } else {
                $_SESSION['e-log-pass'] = "Usuário inexistente";
                header("Location: ../usuarios.php");
                }

            } 
        }
    }

    
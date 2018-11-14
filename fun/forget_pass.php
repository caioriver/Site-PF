<?php
require_once "_fixed.php";
$connect = db_connect();
session_start();
$val = new validacao;

    $_SESSION['e-log-mail'] = $val->validarEmail($_POST['log-mail']);
    $_SESSION['e-log-cpf'] = $val->validarCpf($_POST['log-cpf']);
    // echo($_SESSION['e-log-mal']);

    if ($_SESSION['e-log-mail'] == NULL && $_SESSION['e-log-mail'] == NULL) {
        
        
        $query_1 = 'SELECT mail,cpf FROM admin WHERE mail = :mail';
        $stmt_1 = $connect->prepare($query_1);
        $stmt_1->bindValue(':mail',$_POST['log-mail']);
        $stmt_1->execute();
        $user_1 = $stmt_1->fetch(PDO::FETCH_ASSOC);
        $_SESSION['type-user'] = 'admin';
        if (!(empty($user_1))) {
            
            if ($user_1['cpf'] ==  $_POST['log-cpf']) {
                header("Location: ../dashboard/");
        
            } else{
                $_SESSION['e-log-cpf'] = "Senha inválida";
                header("Location: ../esqueceuSenha.php");
            }
        } else {
            $query_1 = 'SELECT id,mail,cpf FROM usuarios WHERE mail = :mail';
            $stmt_1 = $connect->prepare($query_1);
            $stmt_1->bindValue(':mail',$_POST['log-mail']);
            $stmt_1->execute();
            $user_1 = $stmt_1->fetch(PDO::FETCH_ASSOC);
            
            if (!(empty($user_1))) {
                
                if ($user_1['cpf'] == $_POST['log-cpf']) {
                    $_SESSION['id'] = $user_1['id'];
                    $_SESSION['mail'] = $user_1['mail'];
                    header("Location: ../alterarinfo.php");
                    
                } else{
                    $_SESSION['e-log-cpf'] = "Senha inválida";
                    header("Location: ../esqueceuSenha.php");
                    var_dump($user_1);
                }
            } else {
                $_SESSION['e-log-cpf'] = "Usuário inexistente";
                header("Location: ../esqueceuSenha.php");
                }

            } 
        } else {
            $_SESSION['e-log-cpf'] = "Inserir caracteres válidos";
            header("Location: ../esqueceuSenha.php");
                
        }
    

    
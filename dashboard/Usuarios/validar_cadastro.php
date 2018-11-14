<?php
session_start();
require_once "../../fun/_fixed.php";
$conect = db_connect();
                     


$debit = $_POST['debit']*(-1);
if (empty($_POST)) {
    $_SESSION['debug'] = "Não foi possível postar";
} else {
    // VALIDADOR POR POO
    
    $val = new validacao;

        $_SESSION['nome-e'] = $val->validarNome($_POST['nome']);
        $_SESSION['mail-e'] = $val->validarEmail($_POST['mail']);
        $_SESSION['c-mail-e'] =$val->comparaDois($_POST['mail'],$_POST['c-mail'],'E-mail');
        $_SESSION['cpf-e'] =$val->validarCpf($_POST['cpf']);
        $_SESSION['tel-e'] = $val->validarTelefone($_POST['tel']);
        $_SESSION['end-e'] = $val->validarAll($_POST['end'],'Endereço');
        $_SESSION['pass-e'] = $val->validarSenha($_POST['pass']);
        $_SESSION['c-pass-e'] = $val->comparaDois($_POST['c-pass'],$_POST['pass'],'Senha');
        $_SESSION['adm-pass-e'] = $val->validarSenha($_POST['adm-pass']);
        $_SESSION['debit-e'] = $val->validarDec($_POST['debit'],'Débito');
        var_dump($_SESSION['nome-e']);

        $query_1 = 'SELECT pass FROM superadmin WHERE pass = :pass;';
        $stmt_1 = $conect->prepare($query_1);
        $stmt_1->bindValue(':pass',sha1($_POST['adm-pass']));
        $stmt_1->execute();
        $superadm = $stmt_1->fetch(PDO::FETCH_ASSOC);

        // var_dump($superadm);       
        if (empty($superadm)) {
            header ("Location: usuarios_criar.php");
            $_SESSION['dbug'] = "Dados inválidos";
            $_SESSION['adm-pass-e'] = "Senha inválida";
        } else if ($_SESSION['nome-e'] == NULL && $_SESSION['mail-e'] == NULL && $_SESSION['c-mail-e'] == NULL 
            && $_SESSION['cpf-e'] == NULL && $_SESSION['tel-e'] == NULL && $_SESSION['end-e'] == NULL 
            && $_SESSION['pass-e'] == NULL && $_SESSION['c-pass-e'] == NULL && $_SESSION['adm-pass-e'] == NULL
            && $_SESSION['debit-e'] == NULL) 
            {
                
                $query_2 = "INSERT INTO usuarios (nome,mail,cpf,tel,endc,dadd,pass,debit) VALUES (:nome,:mail,:cpf,:tel,:endc,:dadd,:pass,:debit);";
                $stmt_2 = $conect->prepare($query_2);
                $stmt_2->bindValue(':nome',$_POST['nome']);
                $stmt_2->bindValue(':mail',$_POST['mail']);
                $stmt_2->bindValue(':cpf',$_POST['cpf']) ;
                $stmt_2->bindValue(':tel',$_POST['tel']);
                $stmt_2->bindValue(':endc',$_POST['end']);
                $stmt_2->bindValue(':dadd',date('y-m-d'));
                $stmt_2->bindValue(':pass',sha1($_POST['pass']));
                $stmt_2->bindValue(':debit',$debit);
                $stmt_2->execute();
                // $stmt_2->bindValue(':debit',$fileNome);
                    
                $_SESSION['dbug'] = "Dados cadastrados";
                header ("Location: usuarios_criar.php");
            } else 
            {
                header ("Location: usuarios_criar.php");
                $_SESSION['dbug'] = "Dados inválidos";

                
                }
            
            }
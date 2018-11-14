<?php 
// CRIANDO TRY PARA VERIFICAÇÃO E DEBUG

// O TRY É PARA TRATAR A EXCEÇÃO E INDICAR O ERRO SEM OCORRER ERRO FATAL - É UM ERRO NO TEMPOK DE EXECUÇÃO

try {

//var fixa  
function db_connect()
{
$cx = new PDO('mysql:'.SQL_HOST.'='.SQL_USER.';dbname=' .SQL_BENCH , SQL_USER, SQL_PASS, array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
	PDO::ATTR_PERSISTENT => false,
	PDO::ATTR_EMULATE_PREPARES => false,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
)
);
return $cx;
}
}
catch(PDOexception $e) {
   
    // DEBUG QUE OCORRE DE FORMA ORGANIZADA CASO O TRY NÃO OCORRA
      echo 'ERRO: ' .$e->getCode() . ' Mensagge: ' .$e->getMessage();

}
require_once '_fun.php';

// EXPORTAR PARA EXCEL
function toxls($file) {
	
	$filename = $file;
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=\"{$filename}\"" );
	header ("Content-Description: PHP Generated Data" );
}

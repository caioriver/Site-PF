<?php
class validacao {
	var $campo;
	var $valor;
	var $msg = array();
	
	// ARRAYS
	function mensagens($num, $campo, $max, $min) {
		
		$this->msg[0] = "Preencha o campo com um email válido <br />"; // EMAIL
		$this->msg[1] = "Telefone inválido (Ex: 01433333333) <br />"; // TELEFONE
		$this->msg[2] = "CPF inválido (Ex: 11111111111) <br />"; // CPF
		$this->msg[3] = "Nome inválido. Favor remover acentos <br />"; //NOME
		$this->msg[4] = "Preencha o campo ".$campo." <br />"; // CAMPO VAZIO
		$this->msg[5] = "O ".$campo." deve ter até".$max." caracteres <br />"; // M�XIMO DE CARACTERES
		$this->msg[6] = "O ".$campo." deve ter até ".$min." caracteres <br />"; // M�NIMO DE CARACTERES
		$this->msg[7] = "Preencha coretamente o campo senha <br />";
		$this->msg[8] = "Os valores de ".$campo." conflitam <br />";
		$this->msg[9] = "Data inválida <br />";
		$this->msg[10] = "Valores inválidos <br />";
		$this->msg[11] = "Selecionar arquivo válido";
		$this->msg[12] = "Valor inválodo, insrir valor decimal válido";
		return $this->msg[$num];
	}

	// VALIDA DATA
	function validarData($data) {
		if(empty($data)) {
			return $this->mensagens(4, 'Data', null, null);
		} else if(!(preg_match('/\d{1,2}\/\d{1,2}\/\d{4}$/',$data))) {
			return $this->mensagens(9, 'Data', null, null);
		}
	}
	
	// VALIDAR NOME
	function validarNome($nome) {
		if (empty($nome)) {
			return $this->mensagens(4, 'Nome', null, null);
		}
		 else if(!(preg_match('/[[:alpha:]]$/i', $nome))) {
			return $this->mensagens(3, 'Nome', null, null);
		}
	}

	function validarAll($nome,$campo) {
		if (empty($nome)) {
			return $this->mensagens(4, $campo, null, null);
		}
		 else if(!(preg_match('/[[:alpha:]]$/i', $nome))) {
			return $this->mensagens(3, $campo, null, null);
		}
	}

	// VALIDA EMAIL
	function validarEmail($email) {
		if (empty($email)) {
			return $this->mensagens(4, 'Email', null, null);
		} else if (!(preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email))) {
			return $this->mensagens(0, 'email', null, null);
		} 
	}

	
	
	// VALIDAR TEL (01432363810)
	function validarTelefone($tel) {
		if ((empty($tel))) {
			return $this->mensagens(4, "telefone", null, null);
		}
		else if (!(preg_match('/[0-9]/',$tel))) { 
			return $this->mensagens(1, 'telefone', null, null);
		}
	}
	
	// VALIDAR CPF (111111111111)
	function validarCpf($cpf) {
		if ((empty($cpf))) {
			return $this->mensagens(4, 'CPF', null, null);
		}
		else if(!(preg_match('/[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}$/i',$cpf))) {
			return $this->mensagens(2, 'cpf', null, null);
		} else return NULL;
	}

	// VALIDA RG
	function validarRg($rg) {
		if ((empty($rg))) {
			return $this->mensagens(4, 'RG', null, null);
		}else if(!(preg_match('/[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}$/i',$rg))) {
			return $this->mensagens(2, 'RG', null, null);
		}
	}

	// VALIDAR SENHA
	function validarSenha($senha) {
		if (empty($senha)) {
			return $this->mensagens(4, 'Senha', null, null);
		}
	
	}

	// COMPARA DUAS VARIAVEIS
	function comparaDois($var1,$var2,$campo) {
		if ($var1 != $var2) {
			return $this->mensagens(8,$campo, null, null);
		}
	}
	
	// VERIFICA SELECT VAZIO
	function selectVazio($var1) {
			if ($var1 == "0") {
				return $this->mensagens(8,$campo, null, null);
		}
	}
	
	// VALIDA VOID
	function validarVoid($var,$campo) {
		if (empty($var)) {
			return $this->mensagens(4, $campo, null, null);
		}
		 else if(!(preg_match('/[a-z\d_]{4,28}$/i', $var))) {
			return $this->mensagens(10, $campo, null, null);
		}
	}
	
	//VERIFICAR N DE CARACTERES
	function validarCampo($campo, $valor, $max, $min) {
		$this->campo = $campo;
			if (strlen($valor) > $max) {
				return $this->mensagens(4, $campo, $max, $min);
			} 
			elseif (strlen($valor) < $min) {
				return $this->mensagens(5, $campo, $max, $min);	
			}
	}

	// VALIDADOR DE ARQ
	function validarFile($var) {
		if (empty($var['name'])) {
			return $this->mensagens(11, null, null, null);
		}
			
	}

	function validarDec($var,$campo) {
		if (empty($var)) {
			return $this->mensagens(4,$campo,null,null);
		}
		else if ((!preg_match('/^[0-9]+,[0-9]{2}$/', $var))) {
			return $this->mensagens(12,null,null,null);
		}
	}
}

?>
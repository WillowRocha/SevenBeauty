<?php
require_once("../includes.php");
class LoginService {
	
	private $nome;
	private $senha;
	private $dao;

	function __construct(){
		$this->nome = $_POST['username'];
		$this->senha = $_POST['password'];
		$this->dao = new UsuarioDao();
	}

	function autenticate(){
		$usuario = $this->dao->buscaById($this->dao->buscaIdPorPropriedade("nome", $this->nome));
		if($usuario){
			if(!strcmp($usuario->getSenha(), $this->senha)){
				session_start();
				$_SESSION['current_user'] = $usuario->getNome();
				$_SESSION['access_level'] = $usuario->getNivelAcesso();
				return VERDADEIRO;
			}
			return FALSO;
		}
		return USER_NOT_FOUND;
	}
}

$var = new LoginService();
$status = $var->autenticate();
$page = "";
$get = "";
if(!strcmp($status, VERDADEIRO)){
	$_SESSION['logged'] = VERDADEIRO;
	$page = HOME;
} else {
	$page = LOGIN;
	if(!strcmp($status, FALSO)){
		$get = "?sucess=0";
	} else if(!strcmp($status, USER_NOT_FOUND)){
		$get = "?userNotFound=1";
	} else {
		echo "Algo de errado não está certo!";
	}
}
header("location: ".ROUTE.$page.$get);
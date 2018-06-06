<?php
include_once("../dao/UsuarioDao.php");
include_once("../constants.php");

class LoginService {
	
	private $nome_usuario;
	private $senha;
	private $dao;

	function __construct(){
		$this->nome_usuario = $_POST['username'];
		$this->senha = $_POST['password'];
		$this->dao = new UsuarioDao();
	}

	function autenticate(){
		$usuario = $this->dao->buscaUsuarioByNomeUsuario($this->nome_usuario);
		if($usuario){
			if(!strcmp($usuario->getSenha(), $this->senha)){
				session_start();
				$_SESSION['current_user'] = $usuario;
				return VERDADEIRO;
			}
			echo "retornou false\n";
			return FALSO;
		}
		echo "retornou NFound\n";
		return USER_NOT_FOUND;
	}

}

$var = new LoginService();
$status = $var->autenticate();
if(!strcmp($status, VERDADEIRO)){
	$_SESSION['logged'] = VERDADEIRO;
	header("location: ../home.php");
} else if(!strcmp($status, FALSO)){
	header("location: ../login.php?sucess=0");
} else if(!strcmp($status, USER_NOT_FOUND)){
	header("location: ../login.php?userNotFound=1");
} else {
	echo "Algo de errado não está certo!";
}
<?php
require_once("../includes.php");
class RegistroClienteService {
	
	private $cliente;

	function __construct(){
		
	}

	function novo($idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $localDeTrabalho, $usuario){
		$this->cliente = new Cliente(0,$idPessoa,$nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, ATIVO, $localDeTrabalho, $usuario);
	}

	function atualiza($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $localDeTrabalho, $usuario){
		$this->cliente = new Cliente($id, $idPessoa,$nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, ATIVO, $localDeTrabalho, $usuario);
	}

	function salvar(){
		$dao = new ClienteDao();
		return $dao->save($this->cliente);
	}

}



$id = 0;
$idPessoa = 0;
$idUsuario = 0;
if(isset($_GET['client_id'])) 	$id = $_GET['client_id'];
if(isset($_GET['person_id'])) 	$idPessoa = $_GET['person_id'];
if(isset($_GET['user_id'])) 	$idUsuario = $_GET['user_id'];

$nome = $_POST['name'];
$sobrenome = $_POST['surname'];
$telefone = $_POST['telephone'];
$endereco = $_POST['address'];
$bairro = $_POST['neighborhood'];
$cidade = $_POST['city'];
$nascimento = $_POST['birthday'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$localDeTrabalho = $_POST['workplace'];
$email = $_POST['email'];
$username = $_POST['username'];

if($nome && $sobrenome && $telefone && $endereco && $localDeTrabalho && $username){
	$class = new RegistroClienteService();

	$page = "";
	$get = "";
	if(!$id){
		$usuario = new Usuario($idPessoa, $username, STD_PASSWORD, AC_CLIENTE);
		$class->novo($idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $localDeTrabalho, $usuario);
		$page = REGISTER_CLIENT;
	} else {
		$dao = new UsuarioDao();
		$usuario = $dao->buscaById($idUsuario);
		$class->atualiza($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $localDeTrabalho, $usuario);
		$page = EDIT_CLIENT;
	}

	$status = $class->salvar();
} else {
	$status = 0;
}

if($status > 0){
	$get = "?success=1";
} else {
	$get = "?success=0";
}
header("location: ".ROUTE.$page.$get);
<?php
require_once("../includes.php");
class RegistroFuncionarioService {
	
	private $funcionario;

	function __construct(){
		
	}

	function novoGerente($idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf,  $cargo, $usuario, $ativo){
		$this->funcionario = new Gerente(0, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo);
	}

	function atualizaGerente($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo){
		$this->funcionario = new Gerente($id, $idPessoa,$nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo);
	}

	function novoProfissional($idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf,  $cargo, $usuario, $ativo){
		$this->funcionario = new Profissional(0, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $ativo, array(), $usuario);
	}

	function atualizaProfissional($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario,	 $ativo){
		$this->funcionario = new Profissional($id, $idPessoa,$nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $ativo, array(), $usuario);
	}

	function salvarGerente(){
		$dao = new GerenteDao();
		return $dao->save($this->funcionario);
	}
	function salvarProfissional(){
		$dao = new ProfissionalDao();
		return $dao->save($this->funcionario);
	}

}

$id = 0;
$id_cargo = 0;
$idPessoa = 0;
$idUsuario = 0;
if(isset($_GET['employee_id'])) $id = $_GET['employee_id'];
if(isset($_GET['person_id'])) 	$idPessoa = $_GET['person_id'];
if(isset($_GET['user_id'])) 	$idUsuario = $_GET['user_id'];
if(isset($_POST['cargo']))  	$id_cargo = $_POST['cargo'];

$nome = $_POST['name'];
$sobrenome = $_POST['surname'];
$telefone = $_POST['telephone'];
$endereco = $_POST['address'];
$bairro = $_POST['neighborhood'];
$cidade = $_POST['city'];
$nascimento = $_POST['birthday'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$username = $_POST['username'];
$page = REGISTER_EMPLOYEE;

if($nome && $sobrenome && $telefone && $endereco && $username && $rg && $cpf && $id_cargo){
	$class = new RegistroFuncionarioService();

	$get = "";
	$dao = new CargoDao();
	$cargo = $dao->buscaById($id_cargo);
	
	$level = ($id_cargo == 1) ? AC_GERENTE : AC_PROFISSIONAL;

	$usuario = new Usuario($idUsuario, $username, STD_PASSWORD, $level);
	
	if(!$id){
		if($id_cargo == 1){
			$class->novoGerente($idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, ATIVO);
		} else {
			$class->novoProfissional($idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, ATIVO);
		}
	} else {
		$page = EDIT_EMPLOYEE;
		if($id_cargo == 1){
			$class->atualizaGerente($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, ATIVO);
		} else {
			
			$class->atualizaProfissional($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, ATIVO);
		}
	}
	$status = ($id_cargo == 1) ? $class->salvarGerente() : $class->salvarProfissional();
} else {
	$status = 0;
}

if($status > 0){
	$get = "?success=1";
} else {
	$get = "?success=0";
}
header("location: ".ROUTE.$page.$get);
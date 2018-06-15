<?php

class Funcionario extends Pessoa {
	
	private $idPessoa;
	private $usuario; // Usuario();
	private $cargo; //Cargo();

	function __construct($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo){
		parent::__construct($id, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $ativo);
		$this->idPessoa = $idPessoa;
		$this->usuario = $usuario;
		$this->cargo = $cargo;
	}

	function getIdPessoa(){
		return $this->idPessoa;
	}
	function getUsuario(){
		return $this->usuario;
	}
	function getCargo(){
		return $this->cargo;
	}

	function setIdPessoa($idPessoa){
		$this->idPessoa = $idPessoa;
	}
	function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	function setCargo($cargo){
		$this->cargo = $cargo;
	}
}
<?php

class Cliente extends Pessoa {
	
	private $idPessoa;
	private $usuario;
	private $localDeTrabalho;

	function __construct($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $ativo, $localDeTrabalho, $usuario){
		parent::__construct($id, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $ativo);
		$this->idPessoa = $idPessoa;
		$this->usuario = $usuario;
		$this->localDeTrabalho = $localDeTrabalho;
	}

	function getIdPessoa(){
		return $this->idPessoa;
	}
	function getUsuario(){
		return $this->usuario;
	}
	function getLocalDeTrabalho(){
		return $this->localDeTrabalho;
	}

	function setIdPessoa($idPessoa){
		$this->idPessoa = $idPessoa;
	}
	function setUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	function setLocalDeTrabalho($localDeTrabalho){
		$this->localDeTrabalho = $localDeTrabalho;
	}
}
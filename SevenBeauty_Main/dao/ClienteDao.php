<?php

class ClienteDao {
	
	private $localDeTrabalho;

	function __construct($nome, $telefone, $endereco, $nascimento, $ativo, $localDeTrabalho){
		super($nome, $telefone, $endereco, $nascimento, $ativo);
		$this->localDeTrabalho = $localDeTrabalho;
	}

	function getLocalDeTrabalho(){
		return $this->localDeTrabalho;
	}

	function setLocalDeTrabalho($localDeTrabalho){
		$this->localDeTrabalho = $localDeTrabalho;
	}
}
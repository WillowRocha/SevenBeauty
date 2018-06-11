<?php

class Profissional extends Funcionario {
	
	private $listaServicos; //List<Servico.php>

	function __construct($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargo, $ativo, $listaServicos, $usuario){
		parent::__construct($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo);
		$this->listaServicos = $listaServicos;
	}

	function getListaServicos(){
		return $this->listaServicos;
	}

	function setListaServicos($listaServicos){
		$this->listaServicos = $listaServicos;
	}
}
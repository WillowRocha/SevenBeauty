<?php

class Gerente extends Funcionario {
	
	function __construct($id, $idPessoa, $nome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargoFuncao, $ativo){
		parent::__construct($id, $idPessoa, $nome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargoFuncao, $ativo);
	}
}
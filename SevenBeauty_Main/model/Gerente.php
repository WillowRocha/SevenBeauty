<?php

class Gerente extends Funcionario {
	
	function __construct($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargoFuncao, $usuario, $ativo){
		parent::__construct($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargoFuncao, $usuario, $ativo);
	}
}
<?php

class Gerente extends Funcionario {
	
	function __construct($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargoFuncao, $usuario, $ativo){
		parent::__construct($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargoFuncao, $usuario, $ativo);
	}
}
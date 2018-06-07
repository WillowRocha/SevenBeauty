<?php

class Gerente extends Funcionario {
	
	function __construct($nome, $telefone, $endereco, $nascimento, $ativo, $cargoFuncao, $RG, $CPF){
		super($nome, $telefone, $endereco, $nascimento, $ativo, $cargoFuncao, $RG, $CPF);
	}
}
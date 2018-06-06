<?php
include_once("../model/Funcionario.php");

class GerenteDao {
	
	function __construct($nome, $telefone, $endereco, $nascimento, $ativo, $cargoFuncao, $RG, $CPF){
		super($nome, $telefone, $endereco, $nascimento, $ativo, $cargoFuncao, $RG, $CPF);
	}
}
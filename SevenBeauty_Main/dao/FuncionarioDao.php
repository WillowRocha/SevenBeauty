<?php

abstract class FuncionarioDao {
	
	private $cargoFuncao;
	private $RG;
	private $CPF;

	function __construct($nome, $telefone, $endereco, $nascimento, $ativo, $cargoFuncao, $RG, $CPF){
		super($nome, $telefone, $endereco, $nascimento, $ativo);
		$this->cargoFuncao = $cargoFuncao;
		$this->RG = $RG;
		$this->CPF = $CPF;
	}

	function getCargoFuncao(){
		return $this->cargoFuncao;
	}
	function getRG(){
		return $this->RG;
	}
	function getCPF(){
		return $this->CPF;
	}

	function setCargoFuncao($cargoFuncao){
		$this->cargoFuncao = $cargoFuncao;
	}
	function setRG($RG){
		$this->RG = $RG;
	}
	function setCPF($CPF){
		$this->CPF = $CPF;
	}
}
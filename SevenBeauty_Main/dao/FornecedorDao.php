<?php

class FornecedorDao {
	
	private $nomeEmpresa;
	private $nomeConsultor;
	private $telefone;
	private $categoriaProduto;
	private $ativo;

	function __construct($nomeEmpresa, $nomeConsultor, $telefone, $categoriaProduto, $ativo){
		$this->nomeEmpresa = $nomeEmpresa;
		$this->nomeConsultor = $nomeConsultor;
		$this->telefone = $telefone;
		$this->categoriaProduto = $categoriaProduto;
		$this->ativo = $ativo;
	}

	function getNomeEmpresa(){
		return $this->nomeEmpresa;
	}
	function getNomeConsultor(){
		return $this->nomeConsultor;
	}
	function getTelefone(){
		return $this->telefone;
	}
	function getCategoriaProduto(){
		return $this->categoriaProduto;
	}
	function getAtivo(){
		return $this->ativo;
	}

	function setNomeEmpresa($nomeEmpresa){
		$this->nomeEmpresa = $nomeEmpresa;
	}
	function setNomeConsultor($nomeConsultor){
		$this->nomeConsultor = $nomeConsultor;
	}
	function setTelefone($unidadeMedida){
		$this->telefone = $telefone;
	}
	function setCategoriaProduto($categoriaProduto){
		$this->categoriaProduto = $categoriaProduto;
	}
	function setAtivo($ativo){
		$this->ativo = $ativo;
	}
}
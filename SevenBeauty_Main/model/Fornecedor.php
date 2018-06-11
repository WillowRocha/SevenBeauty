<?php

class Fornecedor {
	
	private $id;
	private $nomeEmpresa;
	private $nomeConsultor;
	private $telefone;
	private $categoriaProdutos;
	private $ativo;

	function __construct($id, $nomeEmpresa, $nomeConsultor, $telefone, $categoriaProdutos, $ativo){
		$this->id = $id;
		$this->nomeEmpresa = $nomeEmpresa;
		$this->nomeConsultor = $nomeConsultor;
		$this->telefone = $telefone;
		$this->categoriaProdutos = $categoriaProdutos;
		$this->ativo = $ativo;
	}

	function getId(){
		return $this->id;
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
	function getCategoriaProdutos(){
		return $this->categoriaProdutos;
	}
	function getAtivo(){
		return $this->ativo;
	}

	function setId($id){
		$this->id = $id;
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
	function setCategoriaProdutos($categoriaProdutos){
		$this->categoriaProdutos = $categoriaProdutos;
	}
	function setAtivo($ativo){
		$this->ativo = $ativo;
	}
}
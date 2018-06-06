<?php

class Servico {
	
	private $nome;
	private $categorias; //Array
	private $preco;
	private $duracao;
	private $ativo;

	function __construct($nome, $categorias, $preco, $duracao, $ativo){
		$this->nome = $nome;
		$this->categorias = $categorias;
		$this->preco = $preco;
		$this->duracao = $duracao;
		$this->ativo = $ativo;
	}

	function getNome(){
		return $this->nome;
	}
	function getCategoriaServico(){
		return $this->categorias;
	}
	function getPreco(){
		return $this->preco;
	}
	function getDuracao(){
		return $this->duracao;
	}
	function getAtivo(){
		return $this->ativo;
	}

	function setNome($nome){
		$this->nome = $nome;
	}
	function setCategoriaServico($categorias){
		$this->categorias = $categorias;
	}
	function setPreco($preco){
		$this->preco = $preco;
	}
	function setDuracao($duracao){
		$this->duracao = $duracao;
	}
	function setAtivo($ativo){
		$this->ativo = $ativo;
	}
}
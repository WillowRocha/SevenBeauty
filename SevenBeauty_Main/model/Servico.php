<?php

class Servico {

	private $id;
	private $nome;
	private $categoria; //Categoria
	private $preco;
	private $duracao; // minutos?
	private $ativo;

	function __construct($id, $nome, $categoria, $preco, $duracao, $ativo){
		$this->id = $id;
		$this->nome = $nome;
		$this->categoria = $categoria;
		$this->preco = $preco;
		$this->duracao = $this->setDuracao($duracao);
		$this->ativo = $ativo;
	}

	function getId(){
		return $this->id;
	}
	function getNome(){
		return $this->nome;
	}
	function getCategoria(){
		return $this->categoria;
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

	function setId($id){
		$this->id = $id;
	}
	function setNome($nome){
		$this->nome = $nome;
	}
	function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	function setPreco($preco){
		$this->preco = $preco;
	}
	function setDuracao($duracao){
		if($duracao < 0) $duracao = $duracao*-1;
		$this->duracao = $duracao;
	}
	function setAtivo($ativo){
		$this->ativo = $ativo;
	}
}
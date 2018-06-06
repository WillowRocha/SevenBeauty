<?php

abstract class Pessoa {
	
	private $id;
	private $nome;
	private $telefone;
	private $endereco;
	private $nascimento;
	private $ativo;

	function __construct($id, $nome, $telefone, $endereco, $nascimento, $ativo){
		$this->id = $id;
		$this->nome = $nome;
		$this->telefone = $telefone;
		$this->endereco = $endereco;
		$this->nascimento = $nascimento;
		$this->ativo = $ativo;
	}

	function getId(){
		return $this->id;
	}
	function getNome(){
		return $this->nome;
	}
	function getTelefone(){
		return $this->telefone;
	}
	function getEndereco(){
		return $this->endereco;
	}
	function getNascimento(){
		return $this->nascimento;
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
	function setTelefone($telefone){
		$this->telefone = $telefone;
	}
	function setEndereco($endereco){
		$this->endereco = $endereco;
	}
	function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}
	function setAtivo($ativo){
		$this->ativo = $ativo;
	}
}
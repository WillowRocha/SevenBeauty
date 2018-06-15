<?php

class Pessoa {
	
	private $id;
	private $nome;
	private $sobrenome;
	private $telefone;
	private $endereco;
	private $bairro;
	private $cidade;
	private $nascimento;
	private $rg;
	private $cpf;
	private $ativo;

	function __construct($id, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $ativo){
		$this->id = $id;
		$this->nome = $nome;
		$this->sobrenome = $sobrenome;
		$this->telefone = $telefone;
		$this->endereco = $endereco;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->nascimento = $nascimento;
		$this->rg = $rg;
		$this->cpf = $cpf;
		$this->ativo = $ativo;
	}

	function getId(){
		return $this->id;
	}
	function getNome(){
		return $this->nome;
	}
	function getSobrenome(){
		return $this->sobrenome;
	}
	function getTelefone(){
		return $this->telefone;
	}
	function getEndereco(){
		return $this->endereco;
	}
	function getBairro(){
		return $this->bairro;
	}
	function getCidade(){
		return $this->cidade;
	}
	function getNascimento(){
		return $this->nascimento;
	}
	function getRG(){
		return $this->rg;
	}
	function getCPF(){
		return $this->cpf;
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
	function setSobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}
	function setTelefone($telefone){
		$this->telefone = $telefone;
	}
	function setEndereco($endereco){
		$this->endereco = $endereco;
	}
	function setBairro($bairro){
		$this->bairro = $bairro;
	}
	function setCidade($cidade){
		$this->cidade = $cidade;
	}
	function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}
	function setRG($rg){
		$this->rg = $rg;
	}
	function setCPF($cpf){
		$this->cpf = $cpf;
	}
	function setAtivo($ativo){
		$this->ativo = $ativo;
	}
}
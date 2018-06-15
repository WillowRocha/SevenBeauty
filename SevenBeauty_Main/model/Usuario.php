<?php

class Usuario {
	
	private $id;
	private $nome;
	private $senha;

	function __construct($id, $nome, $senha, $nivelAcesso){
		$this->id = $id;
		$this->nome = $nome;
		$this->senha = $senha;
		$this->nivelAcesso = $nivelAcesso;
	}

	function getId(){
		return $this->id;
	}
	function getNome(){
		return $this->nome;
	}
	function getSenha(){
		return $this->senha;
	}
	function getNivelAcesso(){
		return $this->nivelAcesso;
	}

	function setId($id){
		$this->id = $id;
	}
	function setNome($nome){
		$this->nome = $nome;
	}
	function setSenha($senha){
		$this->senha = $senha;
	}
	function setNivelAcesso($nivelAcesso){
		$this->nivelAcesso = $nivelAcesso;
	}
	
	function save(){
		$dao = new UsuarioDao();
		$dao->save($this->$id, $this->nome, $this->senha);
	}
}
<?php

class Usuario {
	
	private $id;
	private $nome;
	private $senha;

	function __construct($id, $nome, $senha){
		$this->id = $id;
		$this->nome = $nome;
		$this->senha = $senha;
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

	function setId($id){
		$this->id = $id;
	}
	function setNome($nome){
		$this->nome = $nome;
	}
	function setSenha($senha){
		$this->senha = $senha;
	}
	
	function save(){
		$dao = new UsuarioDao();
		$dao->save($this->$id, $this->nome, $this->senha);
	}
}
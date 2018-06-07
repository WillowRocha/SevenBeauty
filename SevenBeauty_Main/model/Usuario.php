<?php

class Usuario {
	
	private $id;
	private $nome_usuario;
	private $senha;

	function __construct($id, $nome_usuario, $senha){
		$this->id = $id;
		$this->nome_usuario = $nome_usuario;
		$this->senha = $senha;
	}

	function getId(){
		return $this->id;
	}
	function getNomeUsuario(){
		return $this->nome_usuario;
	}
	function getSenha(){
		return $this->senha;
	}

	function setId($id){
		$this->id = $id;
	}
	function setNomeUsuario($nome_usuario){
		$this->nome_usuario = $nome_usuario;
	}
	function setSenha($senha){
		$this->senha = $senha;
	}
	
	function save(){
		$dao = new UsuarioDao();
		$dao->save($this->$id, $this->nome_usuario, $this->senha);
	}
}
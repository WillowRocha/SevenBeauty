<?php

class FormaPagamento {
	
	private $id;
	private $nome;

	function __construct($id, $nome){
		$this->id = $id;
		$this->nome = $nome;
	}

	function getNome(){
		return $this->nome;
	}

	function setNome($nome){
		$this->nome = $nome;
	}
	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id = $id;
	}
}
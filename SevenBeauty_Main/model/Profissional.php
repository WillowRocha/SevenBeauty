<?php
include_once("Funcionario.php");

class Profissional extends Funcionario {
	
	private $listaServicos; //Servico.php

	function __construct($nome, $telefone, $endereco, $nascimento, $ativo, $listaServicos){
		super($nome, $telefone, $endereco, $nascimento, $ativo);
		$this->listaServicos = $listaServicos;
	}

	function getListaServicos(){
		return $this->listaServicos;
	}

	function setListaServicos($listaServicos){
		$this->listaServicos = $listaServicos;
	}
}
<?php

class Baixa {
	
	private $id;
	private $lancamento; //Lancamento.php
	private $valor;
	private $formaPagamento; //FormaPagamento.php
	private $estornado;

	function __construct($id, $lancamento, $valor, $formaPagamento){
		$this->id = $id;
		$this->lancamento = $lancamento;
		$this->valor = $valor;
		$this->formaPagamento = $formaPagamento;
	}

	function getId(){
		return $this->id;
	}
	function getLancamento(){
		return $this->lancamento;
	}
	function getValor(){
		return $this->valor;
	}
	function getFormaPagamento(){
		return $this->formaPagamento;
	}
	function getEstornado(){
		return $this->estornado;
	}

	function setId($id){
		$this->id = $id;
	}
	function setLancamento($lancamento){
		$this->lancamento = $lancamento;
	}
	function setValor($valor){
		$this->valor = $valor;
	}
	function setFormaPagamento($formaPagamento){
		$this->formaPagamento = $formaPagamento;
	}
	function setEstornado($estornado){
		$this->estornado = $estornado;
	}
}
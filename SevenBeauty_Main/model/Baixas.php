<?php

abstract class Baixas {
	
	private $lancamento; //Lancamento.php
	private $valor;
	private $formaPagamento; //FormaPagamento.php

	function __construct($lancamento, $valor, $formaPagamento){
		$this->lancamento = $lancamento;
		$this->valor = $valor;
		$this->formaPagamento = $formaPagamento;
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

	function setLancamento($lancamento){
		$this->lancamento = $lancamento;
	}
	function setValor($valor){
		$this->valor = $valor;
	}
	function setFormaPagamento($formaPagamento){
		$this->formaPagamento = $formaPagamento;
	}
}
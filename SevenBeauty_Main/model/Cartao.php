<?php
include_once("FormaPagamento.php");

class Cartao extends FormaPagamento {
	
	private $numeroCartao;

	function __construct($nome, $numeroCartao){
		super($nome);
		$this->numeroCartao = $numeroCartao;
	}

	function getNumeroCartao(){
		return $this->numeroCartao;
	}

	function setNumeroCartao($numeroCartao){
		$this->numeroCartao = $numeroCartao;
	}
}
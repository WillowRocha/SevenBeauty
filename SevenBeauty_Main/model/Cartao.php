<?php

class Cartao extends FormaPagamento {
	
	private $
	private $numeroCartao;

	function __construct($id, $nome, $numeroCartao){
		super($id, $nome);
		$this->numeroCartao = $numeroCartao;
	}

	function getNumeroCartao(){
		return $this->numeroCartao;
	}

	function setNumeroCartao($numeroCartao){
		$this->numeroCartao = $numeroCartao;
	}
}
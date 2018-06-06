<?php
include_once("../model/FormaPagamento.php");

class CartaoDao {
	
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
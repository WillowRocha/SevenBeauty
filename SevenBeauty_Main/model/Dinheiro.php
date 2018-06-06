<?php
include_once("FormaPagamento.php");

class Dinheiro extends FormaPagamento {

	function __construct($nome){
		super($nome);
	}
}
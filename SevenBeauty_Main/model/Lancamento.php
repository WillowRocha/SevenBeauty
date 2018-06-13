<?php

class Lancamento {
	
	private $id;
	private $agendamento; //Agendamento.php
	private $desconto;
	private $tipoDesconto; // % ou $
	private $cancelado;
	private $finalizado;

	function __construct($id, $agendamento, $servico, $precoTotal, $desconto, $tipoDesconto, $finalizado){
		$this->id = $id;
		$this->agendamento = $agendamento;
		$this->desconto = $desconto;
		$this->tipoDesconto = $tipoDesconto;
		$this->finalizado = $finalizado;
	}

	function getId(){
		return $this->id;
	}
	function getAgendamento(){
		return $this->agendamento;
	}
	function getDesconto(){
		return $this->desconto;
	}
	function getTipoDesconto(){
		return $this->tipoDesconto;
	}
	function getCancelado(){
		return $this->cancelado;
	}
	function getFinalizado(){
		return $this->finalizado;
	}

	function setId($id){
		$this->id = $id;
	}
	function setAgendamento($agendamento){
		$this->agendamento = $agendamento;
	}
	function setDesconto($desconto){
		$this->desconto = $desconto;
	}
	function setTipoDesconto($tipoDesconto){
		$this->tipoDesconto = $tipoDesconto;
	}
	function setCancelado($cancelado){
		$this->cancelado = $cancelado;
	}
	function setFinalizado($finalizado){
		$this->finalizado = $finalizado;
	}
}
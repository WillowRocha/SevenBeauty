<?php

class Lancamento {
	
	private $id;
	private $agendamento; //Agendamento.php
	private $desconto;
	private $tipoDesconto; // % ou $
	private $estornado;
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
	function getEstornado(){
		return $this->estornado;
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
	function setEstornado($estornado){
		$this->estornado = $estornado;
	}
	function setFinalizado($finalizado){
		$this->finalizado = $finalizado;
	}
}
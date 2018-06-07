<?php

class LancamentoDao {
	
	private $agendamento; //Agendamento.php
	private $servico; //Servico.php
	private $precoTotal;
	private $desconto;
	private $tipoDesconto; // % ou $$
	private $finalizado;

	function __construct($agendamento, $servico, $precoTotal, $desconto, $tipoDesconto, $finalizado){
		$this->agendamento = $agendamento;
		$this->servico = $servico;
		$this->precoTotal = $precoTotal;
		$this->desconto = $desconto;
		$this->tipoDesconto = $tipoDesconto;
		$this->finalizado = $finalizado;
	}

	function getAgendamento(){
		return $this->agendamento;
	}
	function getServico(){
		return $this->servico;
	}
	function getPrecoTotal(){
		return $this->precoTotal;
	}
	function getDesconto(){
		return $this->desconto;
	}
	function getTipoDesconto(){
		return $this->tipoDesconto;
	}
	function getFinalizado(){
		return $this->finalizado;
	}

	function setAgendamento($agendamento){
		$this->agendamento = $agendamento;
	}
	function setServico($servico){
		$this->servico = $servico;
	}
	function setPrecoTotal($precoTotal){
		$this->precoTotal = $precoTotal;
	}
	function setDesconto($desconto){
		$this->desconto = $desconto;
	}
	function setTipoDesconto($tipoDesconto){
		$this->tipoDesconto = $tipoDesconto;
	}
	function setFinalizado($finalizado){
		$this->finalizado = $finalizado;
	}
}
<?php

class Agendamento {
	
	private $id;
	private $cliente; //Cliente.php
	private $profissional; //Profissional.php
	private $servico; //Servicos.php
	private $horaInicial;
	private $horaFinal;
	private $ativo;
	private $finalizado;

	function __construct($id, $cliente, $profissional, $listaServicos, $horaInicial, $horaFinal, $ativo, $finalizado){
		$this->cliente = $cliente;
		$this->profissional = $profissional;
		$this->listaServicos = $listaServicos;
		$this->horaInicial = $horaInicial;
		$this->horaFinal = $horaFinal;
		$this->ativo = $ativo;
		$this->finalizado = $finalizado;
	}

	function getCliente(){
		return $this->cliente;
	}
	function getProfissional(){
		return $this->profissional;
	}
	function getServico(){
		return $this->servico;
	}
	function getHoraInicial(){
		return $this->horaInicial;
	}
	function getHoraFinal(){
		return $this->horaFinal;
	}
	function getAtivo(){
		return $this->ativo;
	}
	function getFinalizado(){
		return $this->finalizado;
	}

	function setCliente($cliente){
		$this->cliente = $cliente;
	}
	function setProfissional($profissional){
		$this->profissional = $profissional;
	}
	function setServico($servico){
		$this->servico = $servico;
	}
	function setHoraInicial($horaInicial){
		$this->horaInicial = $horaInicial;
	}
	function setHoraFinal($horaFinal){
		$this->horaFinal = $horaFinal;
	}
	function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	function setFinalizado($finalizado){
		$this->finalizado = $finalizado;
	}
}
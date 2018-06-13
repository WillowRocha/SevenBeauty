<?php

class Agendamento {
	
	private $id;
	private $timestampRegistro;
	private $cliente; //Cliente.php
	private $profissional; //Profissional.php
	private $servico; //Servicos.php
	private $timestampInicial;
	private $timestampFinal;
	private $ativo;
	private $finalizado;

	function __construct($id, $cliente, $profissional, $servico, $timestampInicial, $timestampFinal, $ativo, $finalizado){
		$this->id = $id;
		$this->cliente = $cliente;
		$this->profissional = $profissional;
		$this->servico = $servico;
		$this->timestampInicial = $timestampInicial;
		$this->timestampFinal = $timestampFinal;
		$this->ativo = $ativo;
		$this->finalizado = $finalizado;
	}

	function getId(){
		return $this->id;
	}
	function getTimestampRegistro(){
		return $this->timestampRegistro;
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
	function getTimestampInicial(){
		return $this->timestampInicial;
	}
	function getTimestampFinal(){
		return $this->timestampFinal;
	}
	function getAtivo(){
		return $this->ativo;
	}
	function getFinalizado(){
		return $this->finalizado;
	}

	function setId($id){
		$this->id = $id;
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
	function setTimestampInicial($timestampInicial){
		$this->timestampInicial = $timestampInicial;
	}
	function setTimestampFinal($timestampFinal){
		$this->timestampFinal = $timestampFinal;
	}
	function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	function setFinalizado($finalizado){
		$this->finalizado = $finalizado;
	}
}
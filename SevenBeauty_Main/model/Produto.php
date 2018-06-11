<?php

class Produto {
	
	private $codigoBarras; //ID
	private $nome;
	private $quantidade;
	private $unidadeMedida;
	private $categoria;
	private $estoqueMinimo;
	private $ativo;

	function __construct($codigoBarras, $nome, $quantidade, $unidadeMedida, $categoria, $estoqueMinimo, $ativo){
		$this->codigoBarras = $codigoBarras;
		$this->nome = $nome;
		$this->quantidade = $quantidade;
		$this->unidadeMedida = $unidadeMedida;
		$this->categoria = $categoria;
		$this->estoqueMinimo = $estoqueMinimo;
		$this->ativo = $ativo;
	}

	function getNome(){
		return $this->nome;
	}
	function getQuantidade(){
		return $this->quantidade;
	}
	function getUnidadeMedida(){
		return $this->unidadeMedida;
	}
	function getCategoria(){
		return $this->categoria;
	}
	function getCodigoBarras(){
		return $this->codigoBarras;
	}
	function getEstoqueMinimo(){
		return $this->estoqueMinimo;
	}
	function getAtivo(){
		return $this->ativo;
	}

	function setNome($nome){
		$this->nome = $nome;
	}
	function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}
	function setUnidadeMedida($unidadeMedida){
		$this->unidadeMedida = $unidadeMedida;
	}
	function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	function setCodigoBarras($codigoBarras){
		$this->codigoBarras = $codigoBarras;
	}
	function setEstoqueMinimo($estoqueMinimo){
		$this->estoqueMinimo = $estoqueMinimo;
	}
	function setAtivo($ativo){
		$this->ativo = $ativo;
	}
}
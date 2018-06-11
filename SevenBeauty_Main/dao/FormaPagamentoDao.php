<?php

class FormaPagamentoDao extends Dao {
	function __construct(){
		parent::__construct("formas_pagamento");
	}

	function save($formaPagamento){
		$id = $formaPagamento->getId();
		$nome = addslashes($formaPagamento->getNome());
		if(!$id){
			if($this->buscaIdPorPropriedade("nome", $nome)){
				return ALREADY_EXISTS;
			}
			$query = "INSERT INTO ".$this->nome_tabela." (nome) VALUES ('".$nome."')";
		} else {
			$id = $formaPagamento->getId();
			if($this->novoNomeValido($formaPagamento, $nome)){
				$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."' WHERE id = ".$id.";";
			} else {
				return ALREADY_EXISTS;
			}
		}
		return $this->db->insertOrUpdate($query);
	}

	function novoNomeValido($formaPagamento, $novoNome){
		$mudouNome = ($this->buscaById($formaPagamento->getId())->getNome() != $novoNome);
		$novoNomeExiste = $this->buscaIdPorPropriedade("nome", $novoNome);
		if($mudouNome && $novoNomeExiste){
			return FALSO;
		}
		return VERDADEIRO;
	}
	
	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		return new FormaPagamento($id, $nome);
	}
}
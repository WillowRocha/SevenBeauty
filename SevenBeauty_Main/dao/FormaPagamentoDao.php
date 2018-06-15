<?php

class FormaPagamentoDao extends Dao {
	function __construct(){
		parent::__construct("formas_pagamento");
	}

	function save($formaPagamento){
		$id = $formaPagamento->getId();
		$nome = addslashes($formaPagamento->getNome());
		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (nome) VALUES ('".$nome."')";
			return $this->ultimoIdInserido($this->db->insertOrUpdate($query));
		}
		$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."' WHERE id = ".$id.";";
		$status = $this->db->insertOrUpdate($query);
		if(!$status)
			return FALSE;
		return $id;
	}
	
	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		return new FormaPagamento($id, $nome);
	}
}
<?php

class UnidadeMedidaDao extends Dao {
	
	function __construct(){
		parent::__construct("unidades_medida");
	}

	function save($unidade_medida){
		$id = $unidade_medida->getId();
		$nome = addslashes($unidade_medida->getNome());
		if(!$id){
			if($this->buscaIdPorPropriedade("nome", $nome)){
				return ALREADY_EXISTS;
			}
			$query = "INSERT INTO ".$this->nome_tabela." (nome) VALUES ('".$nome."')";
		} else {
			$id = $unidade_medida->getId();
			if($this->novoNomeValido($unidade_medida, $nome)){
				$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."' WHERE id = ".$id.";";
			} else {
				return ALREADY_EXISTS;
			}
		}
		return $this->db->insertOrUpdate($query);
	}

	function novoNomeValido($unidade_medida, $novoNome){
		$mudouNome = ($this->buscaById($unidade_medida->getId())->getNome() != $novoNome);
		$novoNomeExiste = $this->buscaIdPorPropriedade("nome", $novoNome);
		if($mudouNome && $novoNomeExiste){
			return FALSO;
		}
		return VERDADEIRO;
	}
	
	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		return new UnidadeMedida($id, $nome);
	}
}
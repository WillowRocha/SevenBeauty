<?php

class CargoDao extends Dao {
	
	function __construct(){
		parent::__construct("cargos");
	}

	function save($cargo){
		$id = $cargo->getId();
		$nome = addslashes($cargo->getNome());
		if(!$id){
			if($this->buscaIdPorPropriedade("nome", $nome)){
				return ALREADY_EXISTS;
			}
			$query = "INSERT INTO ".$this->nome_tabela." (nome) VALUES ('".$nome."')";
		} else {
			$id = $cargo->getId();
			if($this->novoNomeValido($cargo, $nome)){
				$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."' WHERE id = ".$id.";";
			} else {
				return ALREADY_EXISTS;
			}
		}
		return $this->db->insertOrUpdate($query);
	}

	function novoNomeValido($cargo, $novoNome){
		$mudouNome = ($this->buscaById($cargo->getId())->getNome() != $novoNome);
		$novoNomeExiste = $this->buscaIdPorPropriedade("nome", $novoNome);
		if($mudouNome && $novoNomeExiste){
			return FALSO;
		}
		return VERDADEIRO;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		return new Cargo($id, $nome);
	}
}
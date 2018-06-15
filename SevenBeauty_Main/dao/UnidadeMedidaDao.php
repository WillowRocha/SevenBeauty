<?php

class UnidadeMedidaDao extends Dao {
	
	function __construct(){
		parent::__construct("unidades_medida");
	}

	function save($unidade_medida){
		$id = $unidade_medida->getId();
		$nome = addslashes($unidade_medida->getNome());
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
		return new UnidadeMedida($id, $nome);
	}
}
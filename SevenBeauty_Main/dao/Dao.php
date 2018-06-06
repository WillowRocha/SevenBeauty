<?php 

class Dao {
	
	function buscarIdPorPropriedade($propriedade, $valor){
		$query = "SELECT id FROM ".$this->nome_tabela." WHERE ".$propriedade ." = ".$valor.";";
		return $this->db->select($query);
	}
	function inativar($id){
		$query = "UPDATE ".$this->nome_tabela." SET ativo = ".FALSE." WHERE id = ".$id.";";
		return $this->db->insertOrUpdate($query);
	}
	function finalizar($id){
		$query = "UPDATE ".$this->nome_tabela." SET finalizado = ".TRUE." WHERE id = ".$id.";";
		return $this->db->insertOrUpdate($query);
	}
}
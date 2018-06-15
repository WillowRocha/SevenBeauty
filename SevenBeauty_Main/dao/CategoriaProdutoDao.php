<?php

class CategoriaProdutoDao extends Dao {
	
	function __construct(){
		parent::__construct("categorias_produto");
	}

	function save($categoria){
		$id = $categoria->getId();
		$nome = addslashes($categoria->getNome());
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
		return new CategoriaProduto($id, $nome);
	}
}
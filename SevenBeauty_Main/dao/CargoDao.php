<?php

class CargoDao extends Dao {
	
	function __construct(){
		parent::__construct("cargos");
	}

	function save($cargo){
		$id = $cargo->getId();
		$nome = addslashes($cargo->getNome());
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

	function buscaCargos(){
		$query = $this->buscaTodosQuery();
		$result = $this->db->selectMultiple($query);
		if($result){
			$num_rows = mysqli_num_rows($result);
			$objetos = [];
			for($i=0; $i < $num_rows; $i++){
	            $row = mysqli_fetch_array($result);
	            array_push($objetos, $this->fetchObjeto($row));
	        }
	        return $objetos;
    	}
		return FALSO;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		return new Cargo($id, $nome);
	}
}
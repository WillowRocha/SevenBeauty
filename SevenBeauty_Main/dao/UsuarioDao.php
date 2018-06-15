<?php

class UsuarioDao extends Dao {
	
	function __construct(){
		parent::__construct("usuarios");
	}

	function save($usuario){
		$id = $usuario->getId();
		$nome = addslashes(strtolower($usuario->getNome()));
		$senha = addslashes($usuario->getSenha());
		$nivelAcesso = $usuario->getNivelAcesso();
		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (nome, senha, access_level) VALUES ('".$nome."', '".$senha."', ".$nivelAcesso.")";
			return $this->ultimoIdInserido($this->db->insertOrUpdate($query));
		}
		$query = "UPDATE ".$this->nome_tabela." SET nome= '".$nome."', senha= '".$senha."', access_level = ".$nivelAcesso." WHERE id = ".$id.";";
		$status = $this->db->insertOrUpdate($query);
		if(!$status)
			return FALSE;
		return $id;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		$senha = stripslashes($row['senha']);
		$nivelAcesso = $row['access_level'];
		return new Usuario($id, $nome, $senha, $nivelAcesso);
	}
}
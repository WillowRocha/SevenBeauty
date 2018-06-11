<?php

class CategoriaProdutoDao extends Dao {
	
	function __construct(){
		parent::__construct("categorias_produto");
	}

	function save($categoria){
		$id = $categoria->getId();
		$nome = addslashes($categoria->getNome());
		if(!$id){
			if($this->buscaIdPorPropriedade("nome", $nome)){
				return ALREADY_EXISTS;
			}
			$query = "INSERT INTO ".$this->nome_tabela." (nome) VALUES ('".$nome."')";
		} else {
			$id = $categoria->getId();
			if($this->novoNomeValido($categoria, $nome)){
				$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."' WHERE id = ".$id.";";
			} else {
				return ALREADY_EXISTS;
			}
		}
		return $this->db->insertOrUpdate($query);
	}

	function novoNomeValido($categoria, $novoNome){
		$mudouNome = ($this->buscaById($categoria->getId())->getNome() != $novoNome);
		$novoNomeExiste = $this->buscaIdPorPropriedade("nome", $novoNome);
		if($mudouNome && $novoNomeExiste){
			return FALSO;
		}
		return VERDADEIRO;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		return new CategoriaProduto($id, $nome);
	}
}
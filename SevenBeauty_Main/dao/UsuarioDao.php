<?php

class UsuarioDao extends Dao {
	
	function __construct(){
		parent::__construct("usuarios");
	}

	function save($usuario){
		$nome = addslashes(strtolower($usuario->getNomeUsuario()));
		$senha = addslashes($usuario->getSenha());
		if(!$usuario->getId()){
			if($this->buscaIdPorPropriedade("nome", $nome)){
				return USER_EXISTS;
			}
			$query = "INSERT INTO ".$this->nome_tabela." (nome, senha) VALUES ('".$nome."', '".$senha."')";
		} else {
			$id = $usuario->getId();
			if($this->novoNomeValido($usuario, $nome)){
				$query = "UPDATE ".$this->nome_tabela." SET nome= '".$nome."', senha= '".$senha."' WHERE id = ".$id.";";
			} else {
				return USER_EXISTS;
			}
		}
		return $this->db->insertOrUpdate($query);
	}

	function novoNomeValido($usuario, $novoNome){
		$mudouNome = ($this->buscaById($usuario->getId())->getNome() != $novoNome);
		$novoNomeExiste = $this->buscaIdPorPropriedade("nome", $novoNome);
		if($mudouNome && $novoNomeExiste){
			return FALSO;
		}
		return VERDADEIRO;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		$senha = stripslashes($row['senha']);
		return new Usuario($id, $nome, $senha);
	}
}
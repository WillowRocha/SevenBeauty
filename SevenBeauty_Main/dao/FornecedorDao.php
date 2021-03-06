<?php

class FornecedorDao extends Dao {
	
	function __construct(){
		parent::__construct("fornecedores");
	}

	function save($fornecedor){
		$id = $fornecedor->getId();
		$nomeEmpresa = addslashes($fornecedor->getNomeEmpresa());
		$nomeConsultor = addslashes($fornecedor->getNomeConsultor());
		$telefone = addslashes($fornecedor->getTelefone());
		$id_categoria_produtos = $fornecedor->getCategoriaProdutos()->getId();
		$ativo = $fornecedor->getAtivo();
		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (nome_empresa, nome_consultor, telefone, id_categoria_produtos, ativo) VALUES ('".$nomeEmpresa."', '".$nomeConsultor."', '".$telefone."', ".$id_categoria_produtos.", ".$ativo.");";
			return $this->ultimoIdInserido($this->db->insertOrUpdate($query));
		}
		$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nomeEmpresa."', nome_consultor = '".$nomeConsultor."', telefone = '".$telefone."', id_categoria_produtos = ".$id_categoria_produtos.", ativo = ".$ativo." WHERE id = ".$id.";";
		$status = $this->db->insertOrUpdate($query);
		if(!$status)
			return FALSE;
		return $id;
	}

	function novoNomeValido($fornecedor, $novoNome){
		$mudouNome = ($this->buscaById($fornecedor->getId())->getNome() != $novoNome);
		$novoNomeExiste = $this->buscaIdPorPropriedade("nome", $novoNome);
		if($mudouNome && $novoNomeExiste){
			return FALSO;
		}
		return VERDADEIRO;
	}

	function fetchObjeto($row){
		$id = stripslashes($row['id']);
		$nomeEmpresa = stripslashes($row['nome_empresa']);
		$nomeConsultor = stripslashes($row['nome_consultor']);
		$telefone = stripslashes($row['telefone']);
		$cat_class = new CategoriaProdutoDao();
		$categoria_produtos = $cat_class->buscaById($row['id_categoria_produtos']);
		$ativo = $row['ativo'];
		return new Fornecedor($id, $nomeEmpresa, $nomeConsultor, $telefone, $categoria_produtos, $ativo);
	}
}
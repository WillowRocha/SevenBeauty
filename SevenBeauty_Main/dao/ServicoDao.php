<?php

class ServicoDao extends Dao {
		
	function __construct(){
		parent::__construct("servicos");
	}

	function save($servico){
		$id = $servico->getId();
		$nome = addslashes($servico->getNome());
		$id_categoria_servico = $servico->getCategoria()->getId();
		$preco = addslashes($servico->getPreco());
		$duracao = addslashes($servico->getDuracao());
		$ativo = $servico->getAtivo();
		if(!$id){
			if($this->buscaIdPorPropriedade("nome", $nome)){
				return ALREADY_EXISTS;
			}
			$query = "INSERT INTO ".$this->nome_tabela." (nome, id_categoria_servico, preco, duracao, ativo) VALUES ('".$nome."', ".$id_categoria_servico.", ".$preco.", ".$duracao.", ".$ativo.");";
		} else {
			$id = $servico->getId();
			if($this->novoNomeValido($servico, $nome)){
				$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."' id_categoria_servico = ".$id_categoria_servico." preco = ".$preco." duracao = ".$duracao." ativo = ".$ativo." WHERE id = ".$id.";";
			} else {
				return ALREADY_EXISTS;
			}
		}
		return $this->db->insertOrUpdate($query);
	}

	function novoNomeValido($servico, $novoNome){
		$mudouNome = ($this->buscaById($servico->getId())->getNome() != $novoNome);
		$novoNomeExiste = $this->buscaIdPorPropriedade("nome", $novoNome);
		if($mudouNome && $novoNomeExiste){
			return FALSO;
		}
		return VERDADEIRO;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$nome = $row['nome'];
		$cat_class = new CategoriaServicoDao();
		$categoria_servico = $cat_class->buscaById($row['id_categoria_servico']);
		$preco = $row['preco'];
		$duracao = $row['duracao'];
		$ativo = $row['ativo'];
		return new Servico($id, $nome, $categoria_servico, $preco, $duracao, $ativo);
	}
}
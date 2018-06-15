<?php

class ServicoDao extends Dao {
		
	function __construct(){
		parent::__construct("servicos");
	}

	function save($servico){
		$id = $servico->getId();
		$nome = addslashes($servico->getNome());
		$id_categoria_servico = $servico->getCategoria()->getId();
		$preco = $servico->getPreco();
		$duracao = addslashes($servico->getDuracao());
		$ativo = $servico->getAtivo();
		
		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (nome, id_categoria_servico, preco, duracao, ativo) VALUES ('".$nome."', ".$id_categoria_servico.", ".$preco.", ".$duracao.", ".$ativo.");";
				return $this->ultimoIdInserido($this->db->insertOrUpdate($query));
		} 
		$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."', id_categoria_servico = ".$id_categoria_servico.", preco = ".$preco.", duracao = ".$duracao.", ativo = ".$ativo." WHERE id = ".$id.";";
		$status = $this->db->insertOrUpdate($query);
		if(!$status)
			return FALSE;
		return $id;
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
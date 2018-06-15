<?php

class ProdutoDao extends Dao {
	
	function __construct(){
		parent::__construct("produtos");
	}

	function save($produto){
		$codigoBarras = $produto->getCodigoBarras();
		if(!$codigoBarras)
			return CODIGO_BARRAS_INVALIDO;
		$nome = addslashes($produto->getNome());
		$quantidade = addslashes($produto->getQuantidade());
		$id_unidade_medida = $produto->getUnidadeMedida()->getId();
		$id_categoria_produto = $produto->getCategoria()->getId();
		$estoque_minimo = addslashes($produto->getEstoqueMinimo());
		$ativo = $produto->getAtivo();
		
		$existe = $this->buscaByCodigoBarras($codigoBarras);
		if(!$existe){
			$query = "INSERT INTO ".$this->nome_tabela." (codigo_barras, nome, quantidade, id_unidade_medida, id_categoria_produto, estoque_minimo, ativo) VALUES (".$codigoBarras.", '".$nome."', ".$quantidade.", ".$id_unidade_medida.", ".$id_categoria_produto.", ".$estoque_minimo.", ".$ativo.");";
			return $this->ultimoIdInserido($this->db->insertOrUpdate($query));
		} else {
			$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."', quantidade = ".$quantidade.", id_unidade_medida = ".$id_unidade_medida.", id_categoria_produto = ".$id_categoria_produto.", estoque_minimo= ".$estoque_minimo.", ativo = ".$ativo." WHERE codigo_barras = ".$codigoBarras.";";
		}
		$status = $this->db->insertOrUpdate($query);
		if(!$status)
			return FALSE;
		return $id;
	}

	function buscaByCodigoBarras($codigoBarras){
		$query = $this->buscaPorIdQuery($codigoBarras);
		$result = $this->db->selectOne($query);
		if($result){
			return $this->fetchProduto($result);
		}
		return FALSE;
	}

	function fetchObjeto($row){
		$codigoBarras = $row['codigo_barras'];
		$nome = $row['nome'];
		$quantidade = $row['quantidade'];
		$unidade_class = new UnidadeMedidaDao();
		$unidade_medida = $unidade_class->buscaById($row['id_unidade_medida']);
		$cat_class = new CategoriaProdutoDao();
		$categoria_produto = $cat_class->buscaById($row['id_categoria_produto']);
		$estoque_minimo = $row['estoque_minimo'];
		$ativo = $row['ativo'];
		return new Produto($codigoBarras, $nome, $quantidade, $unidade_medida, $categoria_produto, $estoque_minimo, $ativo);
	}

	//Override
	function buscaPorIdQuery($codigoBarras){
		return "SELECT * FROM ".$this->nome_tabela." WHERE codigo_barras = ".$codigoBarras.";";
	}
	//Override
	function buscaIdPorPropriedade($propriedade, $valor){
		$query = "SELECT codigo_barras FROM ".$this->nome_tabela." WHERE ".$propriedade ." = '".$valor."';";
		$result = $this->db->selectOne($query);
		if($result){
			return $result['codigo_barras'];
		}
		return FALSO;
	}
}
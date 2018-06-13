<?php

class BaixaDao extends Dao {
	
	function __construct(){
		parent::__construct("baixas");
	}

	function save($baixa){
		$id = $baixa->getId();
		$valor = $baixa->getValor();
		$id_lancamento = $baixa->getLancamento()->getId();
		$id_forma_pagamento = $baixa->getFormaPagamento()->getId();
		$estornado = $baixa->getEstornado();
		
		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (valor, id_lancamento, id_forma_pagamento, ativo, finalizado) VALUES (".$valor.", ".$id_lancamento.", ".$id_forma_pagamento.", ".$ativo.", ".$finalizado.")";
			return $this->db->insertOrUpdate($query);
		}
		return FALSO;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$valor = $row['valor'];
		$estornado = $row['estornado'];

		$daoLancamento = new LancamentoDao();
		$daoForma = new formaPagamentoDao();
		$lancamento = $daoLancamento->buscaById($row['id_lancamento']);
		$formaPagamento = $dao->buscaById($row['id_forma_pagamento']);

		return new Baixa($id, $valor, $lancamento, $formaPagamento, $estornado);
	}
}
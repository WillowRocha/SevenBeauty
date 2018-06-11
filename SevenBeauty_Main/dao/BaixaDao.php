<?php

class BaixaDao extends Dao {
	
	function __construct(){
		parent::__construct("baixas");
	}

	function save($baixa){
		$valor = $baixa->getValor();
		$id_lancamento = $baixa->getLancamento()->getId();
		$id_forma_pagamento = $baixa->getFormaPagamento()->getId();
		$ativo = $baixa->getAtivo();
		$finalizado = $baixa->getFinalizado();
		if(!$baixa->getId()){
			$query = "INSERT INTO ".$this->nome_tabela." (valor, id_lancamento, id_forma_pagamento, ativo, finalizado) VALUES (".$valor.", ".$id_lancamento.", ".$id_forma_pagamento.", ".$ativo.", ".$finalizado.")";
			return $this->db->insertOrUpdate($query);
		}
		return FALSO;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$valor = $row['valor'];
		
		//Buscar
		$id_lancamento = $row['id_lancamento'];
		$id_forma_pagamento = $row['id_forma_pagamento'];


		$ativo = $row['ativo'];
		$finalizado = $row['finalizado'];
		return new Baixa($id, $valor, $id_lancamento, $id_forma_pagamento, $ativo, $finalizado);
	}
}
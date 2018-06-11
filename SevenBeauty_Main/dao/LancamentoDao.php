<?php

class LancamentoDao extends Dao {
	
	function __construct(){
		parent::__construct("lancamentos");
	}

	function save($lancamento){
		$id = $lancamento->getId();
		$id_agendamento = $lancamento->getAgendamento()->getId();
		$desconto = $lancamento->getDesconto();
		$tipoDesconto = $lancamento->getTipoDesconto();
		$estornado = $lancamento->getEstornado();
		$finalizdo = $lancamento->getFinalizado();

		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (id_agendamento, desconto, tiposDesconto, estornado, finalizado) VALUES (".$id_agendamento.", ".$desconto.", ".$tipoDesconto.", '".$estornado.", ".$finalizado.")";
		} else {
			$query = "UPDATE ".$this->nome_tabela." SET id_agendamento=".$id_agendamento.", desconto =".$desconto.", tipos_desconto =".$tipoDesconto.", estornado ='".$estornado.", finalizado= ".$finalizado." WHERE id = ".$id.";";
		}
		return $this->db->insertOrUpdate($query);
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$id_agendamento = $row['id_agendamento'];
		$dao = new AgendamentoDao();
		$agendamento = $this->buscaById($id_agendamento);
		if(!$agendamento)
			return FALSE;
		$desconto = $row['desconto'];
		$tipoDesconto = $row['tipos_desconto'];
		$estornado = $row['estornado'];
		$finalizado = $row['finalizado'];
		return new Lancamento($id, $id_agendamento, $desconto, $tiposDesconto, $estornado, $finalizado);
	}
}
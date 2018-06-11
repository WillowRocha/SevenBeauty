<?php

class AgendamentoDao extends Dao {

	function __construct(){
		parent::__construct("agendamentos");
	}

	function save($id, $id_cliente, $id_profissional, $id_servico, $horaInicial, $horaFinal, $ativo, $finalizado){
		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (id_cliente, id_funcionario, id_servico, data_hora_inicial, data_hora_final, ativo, finalizado) VALUES (".$id_cliente.", ".$id_profissional.", ".$id_servico.", '".$horaInicial."', '".$horaFinal."', ".$ativo.", ".$finalizado.")";
		} else {
			$query = "INSERT INTO ".$this->nome_tabela." (id, id_cliente, id_funcionario, id_servico, data_hora_inicial, data_hora_final, ativo, finalizado) VALUES (".$id.", ".$id_cliente.", ".$id_profissional.", ".$id_servico.", '".$horaInicial."', '".$horaFinal."', ".$ativo.", ".$finalizado.") ON DUPLICATE KEY UPDATE id_cliente=".$id_cliente.", id_funcionario=".$id_profissional.", id_servico=".$id_servico.", data_hora_inicial='".$horaInicial."', data_hora_final='".$horaFinal."', ativo=".$ativo.", finalizado=".$finalizado.";";
		}
		return $this->db->insertOrUpdate($query);
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$id_cliente = $row['id_cliente'];
		$id_funcionario = $row['id_funcionario'];
		$id_servico = $row['id_servico'];
		$data_hora_inicial = $row['data_hora_inicial'];
		$data_hora_final = $row['data_hora_final'];
		$ativo = $row['ativo'];
		$finalizado = $row['finalizado'];
		return new Agendamento($id, $id_cliente, $id_funcionario, $id_servico, $data_hora_inicial, $data_hora_final, $ativo, $finalizado);
	}
}
<?php

class AgendamentoDao extends Dao {

	function __construct(){
		parent::__construct("agendamentos");
	}

	function save($agendamento){
		$id = $agendamento->getId();
		$id_cliente = $agendamento->getCliente()->getId();
		$id_profissional = $agendamento->getProfissional()->getId();
		$id_servico = $agendamento->getServico()->getId();
		$horaInicial = $agendamento->getHoraInicial();
		$horaFinal = $agendamento->getHoraFinal();
		$ativo = $agendamento->getAtivo();
		$finalizdo = $agendamento->getFinalizado();

		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (id_cliente, id_funcionario, id_servico, data_hora_inicial, data_hora_final, ativo, finalizado) VALUES (".$id_cliente.", ".$id_profissional.", ".$id_servico.", '".$horaInicial."', '".$horaFinal."', ".$ativo.", ".$finalizado.")";
		} else {
			$query = "UPDATE ".$this->nome_tabela." SET id_cliente=".$id_cliente.", id_funcionario=".$id_profissional.", id_servico=".$id_servico.", data_hora_inicial='".$horaInicial."', data_hora_final='".$horaFinal."', ativo=".$ativo.", finalizado=".$finalizado.";";
		}
		return $this->db->insertOrUpdate($query);
	}

	function fetchObjeto($row){
		$id = $row['id'];
		
		$daoCliente = new ClienteDao();
		$daoFuncionario = new FuncionarioDao();
		$daoServico = new ServicoDao();
		$cliente = $daoCliente->buscaById($row['id_cliente']);
		$funcionario = $daoFuncionario->buscaById($row['id_funcionario']);
		$servico = $daoServico->buscaById($row['id_servico']);
		if(!($cliente && $funcionario && $servico)) 
			return FALSE;
		
		$data_hora_inicial = $row['data_hora_inicial'];
		$data_hora_final = $row['data_hora_final'];
		$ativo = $row['ativo'];
		$finalizado = $row['finalizado'];
		return new Agendamento($id, $cliente, $funcionario, $servico, $data_hora_inicial, $data_hora_final, $ativo, $finalizado);
	}
}
<?php
include_once("../model/Cliente.php");
include_once("../model/Profissional.php");
include_once("../model/Servico.php");
include_once("DBConnection.php");

class AgendamentoDao {

	private $db;

	function __construct(){
		$this->db = new DBConnection();
	}

	function save($id, $cliente, $profissional, $servico, $horaInicial, $horaFinal, $ativo, $finalizado){
		if(!$id){
			$query = "INSERT INTO agendamentos (id_cliente, id_funcionario, id_servico, data_hora_inicial, data_hora_final, ativo, finalizado) VALUES (".$cliente->id.", ".$profissional->id.", ".$servico->id.", '".$horaInicial."', '".$horaFinal."', ".$ativo.", ".$finalizado.")";
		} else {
			$query = "INSERT INTO agendamentos (id, id_cliente, id_funcionario, id_servico, data_hora_inicial, data_hora_final, ativo, finalizado) VALUES (".$id.", ".$cliente->id.", ".$profissional->id.", ".$servico->id.", '".$horaInicial."', '".$horaFinal."', ".$ativo.", ".$finalizado.") ON DUPLICATE KEY UPDATE id_cliente=".", ".$cliente->id.", id_funcionario=".$profissional->id.", id_servico=".$servico->id.", data_hora_inicial='".$horaInicial."', data_hora_final='".$horaFinal."', ativo=".$ativo.", finalizado=".$finalizado.";";
		}
		return $this->db->insertOrUpdate($query);
	}
	function buscarIdPorPropriedade($propriedade, $valor){
		$query = "SELECT id FROM agendamentos WHERE ".$propriedade ." = '".$valor."';";
		return $this->db->select($query);
	}
	function cancelar($id){
		$query = "UPDATE agendamentos SET ativo = ".FALSE." WHERE id = ".$id.";";
		return $this->db->insertOrUpdate($query);
	}
	function finalizar($id){
		$query = "UPDATE agendamentos SET finalizado = ".TRUE." WHERE id = ".$id.";";
		return $this->db->insertOrUpdate($query);
	}
}
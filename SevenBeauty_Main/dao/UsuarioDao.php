<?php
include_once("Dao.php");
include_once("DBConnection.php");
include_once("../model/Usuario.php");

class UsuarioDao extends Dao {
	
	private $db;
	private $nome_tabela;

	function __construct(){
		$this->db = new DBConnection();
		$this->nome_tabela = "usuarios";
	}

	function save($id, $nome_usuario, $senha){
		$nome_usuario = addslashes($nome_usuario);
		$senha = addslashes($senha);
		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (nome_usuario, senha) VALUES ('".$nome_usuario."', '".$senha."')";
		} else {
			$query = "INSERT INTO ".$this->nome_tabela." (id, nome_usuario, senha) VALUES ('".$nome_usuario."', '".$senha."') ON DUPLICATE KEY UPDATE nome_usuario= '".$nome_usuario."', senha= '".$senha."';";
		}
		return $this->db->insertOrUpdate($query);
	}

	function buscaUsuarioByNomeUsuario($nome_usuario){
		$query = "SELECT * FROM ".$this->nome_tabela." WHERE nome_usuario = '".$nome_usuario."';";
		$result = $this->db->select($query);
		if($result){
			echo "entrou no if\n";
			$id = $result['id'];
			$nome_usuario = stripslashes($result['nome_usuario']);
			$senha = stripslashes($result['senha']);
			return new Usuario($id, $nome_usuario, $senha);
		}
		return null;
	}
}
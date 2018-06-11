<?php 

class Dao {
	
	protected $db;
	protected $nome_tabela;

	function __construct($nome_tabela){
		$this->db = new DBConnection();
		$this->nome_tabela = $nome_tabela;
	}

	function buscaIdPorPropriedade($propriedade, $valor){
		$query = "SELECT id FROM ".$this->nome_tabela." WHERE ".$propriedade ." = '".$valor."';";
		$result = $this->db->selectOne($query);
		if($result){
			return $result['id'];
		}
		return FALSO;
	}
	function inativar($id){
		return finalizarInativar($id, "ativo", FALSO);
	}
	function finalizar($id){
		return finalizarInativar($id, "finalizado", VERDADEIRO);
	}
	function finalizarInativar($id, $coluna, $boolean){
		$query = "UPDATE ".$this->nome_tabela." SET ".$coluna." = ".$boolean." WHERE id = ".$id.";";
		return $this->db->insertOrUpdate($query);
	}
	function buscaTodosPorPropriedade($propriedade, $valor){
		return "SELECT * FROM ".$this->nome_tabela." WHERE ".$propriedade ." = '".$valor."';";
	}
	function ultimoIdInserido($status){
		if($status){
			$query = "SELECT LAST_INSERT_ID() AS last_id";
			$result = $this->db->selectOne($query);
			return $result['last_id'];
		}
		return ;
	}
	function buscaAtivos(){
		$query = $this->buscaTodosPorPropriedade("ativo", VERDADEIRO);
		$result = $this->db->selectMultiple($query);
		if($result){
			$num_rows = mysqli_num_rows($result);
			$ativos = [];
			for($i=0; $i < $num_rows; $i++){
	            $row = mysqli_fetch_array($result);
	            array_push($ativos, $this->fetchObjeto($row));
	        }
	        return $ativos;
    	}
		return FALSO;
	}
	function buscaById($id){
		$query = "SELECT * FROM ".$this->nome_tabela." WHERE id = ".$id.";";
		$result = $this->db->selectOne($query);
		if($result){
			return $this->fetchObjeto($result);
		}
		return FALSE;
	}
}
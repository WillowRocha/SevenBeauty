<?php 	
	//Conexão Banco de Dados
Class DBConnection{

	private $database = 'seven_beauty';
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $link;
	private $query;

	function __construct(){
		$this->connect();
	}

	function connect(){
		$this->link = mysqli_connect($this->host, $this->user, $this->pass);
		if(!$this->link){
			echo "Não foi possível se conectar ao banco de dados!";
			return FALSE;
		}
		mysqli_select_db($this->link, $this->database);
		return TRUE;
	}
	
	function query($query){
		return mysqli_query($this->link, $query) ;//or die( mysqli_error( $this->link ));
	}

	function selectOne($query){
		$result = $this->selectMultiple($query);
		if($result){
			$result = mysqli_fetch_array($result);
		}
		return $result;
	}

	function selectMultiple($query){
		return $this->query($query);
	}

	function insertOrUpdate($query){
		return $this->query($query);
	}



}
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
		$this->link = mysqli_connect($this->host, $this->user, $this->pass);
		if(!$this->link){
			echo "Não foi possível se conectar ao banco!";
		}
	}

	function selectDB(){
		mysqli_select_db($this->link, $this->database);
		return $this->link;
	}
}
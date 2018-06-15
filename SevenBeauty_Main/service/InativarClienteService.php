<?php
	require_once("../includes.php");

class InativaClienteService {

	function __construct(){
		
	}

	function removeCliente(){
		$id = 0;
		if(isset($_GET['client_id'])){
			$id = $_GET['client_id'];
			$dao = new ClienteDao();
			$cliente = $dao->buscaById($id);
			if($cliente){
				$cliente->setAtivo(0);
				$dao->save($cliente);	
				return $id;
			}
		}
		return FALSO;
	}
}

$class = new InativaClienteService();
$status =$class->removeCliente();

header("location: ".ROUTE.LIST_CLIENTS."?removed=".$status);
	


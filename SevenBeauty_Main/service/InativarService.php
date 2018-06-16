<?php
	require_once("../includes.php");

class InativarService {

	private $dao;
	private $identifier;
	private $classe;
	private $page;

	function __construct(){
		
	}

	function verificarGets(){
		if(isset($_GET['identifier']) && isset($_GET['class'])){
			$this->identifier = $_GET['identifier'];
			$this->classe 	  = $_GET['class'];
			if(isset($_GET['job_position']))
				$aux = $_GET['job_position'];
			return VERDADEIRO;
		}
		return FALSO;
	}

	function verificaClasse(){
		if($this->classe == "cliente"){
			$this->dao = new ClienteDao();
			$this->page = LIST_CLIENTS;
			return VERDADEIRO;
		} elseif($this->classe == "funcionario"){
			if($this->aux == 1){
				$this->dao = new GerenteDao();
			} else {
				$this->dao = new ProfissionalDao();
			}
			$this->page = LIST_EMPLOYEES;
			return VERDADEIRO;
		} elseif($this->classe == "produto"){
			$this->dao = new ProdutoDao();
			$this->page = LIST_PRODUCTS;
			return VERDADEIRO;
		}
		return 0;
	}

	function remove(){
		if($this->classe != "produto"){
			$model = $this->dao->buscaById($this->identifier);
		} else {
			$model = $this->dao->buscaByCodigoBarras($this->identifier);
		}

		if($model){
			$model->setAtivo(FALSO);
			$this->dao->save($model);	
			return VERDADEIRO;
		}
		return FALSO;
	}

	function tentaDeletar(){
		if(!$this->verificarGets())
			return FALSO;
		if(!$this->verificaClasse())
			return FALSO;
		if(!$this->remove())
			return FALSO;
		return VERDADEIRO;
	}
	function getPage(){
		return $this->page;
	}
}

$class = new InativarService();
$status = $class->tentaDeletar();

header("location: ".ROUTE.$class->getPage()."?removed=".$status);
	


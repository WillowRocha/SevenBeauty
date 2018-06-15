<?php

class GerenteDao extends Dao {
	function __construct(){
		parent::__construct("funcionarios");
	}

	function save($gerente){
		$id = $gerente->getId();
		$idPessoa = $gerente->getIdPessoa();
		$nome = $gerente->getNome();
		$sobrenome = $gerente->getSobrenome();
		$telefone = $gerente->getTelefone();
		$endereco = $gerente->getEndereco();
		$bairro = $gerente->getBairro();
		$cidade = $gerente->getCidade();
		$nascimento = $gerente->getNascimento();
		$rg = $gerente->getRG();
		$cpf = $gerente->getCPF();
		$cargo = $gerente->getCargo();
		$ativo = $gerente->getAtivo();
		$usuario = $gerente->getUsuario();
		
		$daoFuncionario = new FuncionarioDao();
		$id_gerente = $daoFuncionario->save(new Funcionario($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo));
		if(!$id_gerente)
			return FALSE;
		return $id_gerente;
	}

	function fetchObjeto($row){
		$id = $row['id'];

		$dao = new FuncionarioDao();
		$funcionario = $dao->buscaById($id);
		if(!$funcionario) return FALSO;
		
		$idPessoa = $funcionario->getIdPessoa();
		$nome = $funcionario->getNome();
		$sobrenome = $funcionario->getSobrenome();
		$telefone = $funcionario->getTelefone();
		$endereco = $funcionario->getEndereco();
		$bairro = $funcionario->getBairro();
		$cidade = $funcionario->getCidade();
		$nascimento = $funcionario->getNascimento();
		$rg = $funcionario->getRG();
		$cpf = $funcionario->getCPF();
		$cargo = $funcionario->getCargo();
		$ativo = $funcionario->getAtivo();
		$usuario = $funcionario->getUsuario();

		return new Gerente($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo);
	}

}
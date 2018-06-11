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
		$nascimento = $gerente->getNascimento();
		$rg = $gerente->getRG();
		$cpf = $gerente->getCPF();
		$cargo = $gerente->getCargo();
		$ativo = $gerente->getAtivo();
		$usuario = $gerente->getUsuario();
		
		$daoFuncionario = new FuncionarioDao();
		$result = $daoFuncionario->save(new Funcionario($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo));
		//TODO: Fazer verificacao em Pessoa para poder inserir Clientes e Funcionarios com a mesma pessoa, considerando que é uma atualizacaoo se o RG e CPF forem iguais.
		if(!strcmp($result,ERRO_INSERCAO_FUNCIONARIO) || !strcmp($result, ERRO_INSERCAO_PESSOA) || !strcmp($result, PESSOA_JA_EXISTE)) return $result;
		return $result;
	}

	function fetchObjeto($row){
		$id = $row['id_funcionario'];

		$dao = new FuncionarioDao();
		$funcionario = $dao->buscaById($id);
		if(!$funcionario) return FALSO;
		
		$idPessoa = $function->getIdPessoa();
		$nome = $funcionario->getNome();
		$sobrenome = $funcionario->getSobrenome();
		$telefone = $funcionario->getTelefone();
		$endereco = $funcionario->getEndereco();
		$nascimento = $funcionario->getNascimento();
		$rg = $funcionario->getRG();
		$cpf = $funcionario->getCPF();
		$cargo = $funcionario->getCargo();
		$ativo = $funcionario->getAtivo();

		return new Gerente($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargo, $ativo);
	}

}
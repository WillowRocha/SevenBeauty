<?php

class ClienteDao extends Dao {
	
	function __construct(){
		parent::__construct("clientes");
	}

	function save($cliente){
		$idPessoa = $cliente->getIdPessoa();
		$nome = $cliente->getNome();
		$sobrenome = $cliente->getSobrenome();
		$telefone = $cliente->getTelefone();
		$endereco = $cliente->getEndereco();
		$nascimento = $cliente->getNascimento();
		$rg = $cliente->getRG();
		$cpf = $cliente->getCPF();
		$ativo = $cliente->getAtivo();
		
		$daoPessoa = new PessoaDao();
		$result = $daoPessoa->save(new Pessoa($idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $ativo));
		//TODO: Fazer verificacao em Pessoa para poder inserir Cliente e Funcionarios com a mesma pessoa, considerando que é uma atualizacaoo se o RG e CPF forem iguais.
		if(!$result) return ERRO_INSERCAO_PESSOA;
		if($result == ALREADY_EXISTS) return ALREADY_EXISTS;

		if($result){
			
			$id = $cliente->getId();
			$localTrabalho = addslashes($cliente->getLocalDeTrabalho());
			$idPessoa = $result;
			$usuario = $this->checkUsuario($cliente->getUsuario());
			
			$existe = $this->buscaById($id);
			if(!$existe){
				$query = "INSERT INTO ".$this->nome_tabela." (ativo, local_trabalho, id_pessoa, id_usuario) VALUES (".$ativo.", '".$localTrabalho."', ".$idPessoa.", ".$idUsuario.");";
			} else {
				$query = "UPDATE ".$this->nome_tabela." SET ativo = ".$ativo.", local_trabalho = '".$localTrabalho."', id_pessoa = ".$idPessoa.", id_usuario = ".$idUsuario." WHERE id = ".$id.";";
			}
			return $this->db->insertOrUpdate($query);
		}
		return FALSE;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$ativo = $row['ativo'];
		$localTrabalho = stripslashes($row['local_trabalho']);
		$idPessoa = $row['id_pessoa'];
		$idUsuario = $row['id_usuario'];

		$dao = new PessoaDao();
		$pessoa = $dao->buscaById($idPessoa);
		$dao = new UsuarioDao();
		$usuario = $dao->buscaById($idUsuario);
		if(!$pessoa) return FALSO;
		
		$nome = $pessoa->getNome();
		$sobrenome = $pessoa->getSobrenome();
		$telefone = $pessoa->getTelefone();
		$endereco = $pessoa->getEndereco();
		$nascimento = $pessoa->getNascimento();
		$rg = $pessoa->getRG();
		$cpf = $pessoa->getCPF();

		return new Cliente($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $ativo, $localTrabalho, $usuario);
	}
	
	function checkUsuario(){
		if($usuario)
			$idUsuario = $usuario->getId();
		else
			$idUsuario = 0;
	}

}
<?php

class ClienteDao extends Dao {
	
	function __construct(){
		parent::__construct("clientes");
	}

	function save($cliente){	
		$id = $cliente->getId();
		$idPessoa = $cliente->getIdPessoa();
		$nome = $cliente->getNome();
		$sobrenome = $cliente->getSobrenome();
		$telefone = $cliente->getTelefone();
		$endereco = $cliente->getEndereco();
		$bairro = $cliente->getBairro();
		$cidade = $cliente->getCidade();
		$nascimento = $cliente->getNascimento();
		$rg = $cliente->getRG();
		$cpf = $cliente->getCPF();
		$ativo = $cliente->getAtivo();
		$usuario = $cliente->getUsuario();
		$localTrabalho = addslashes($cliente->getLocalDeTrabalho());
		
		$daoPessoa = new PessoaDao();
		$daoUsuario = new UsuarioDao();
		$pessoa = new Pessoa($idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $ativo);
		
		$id_pessoa 	= $daoPessoa->save($pessoa);
		$id_usuario = $daoUsuario->save($usuario);
		
		$existe = $this->buscaById($id);
		if(!$existe){
			if($id_usuario){
				$query = "INSERT INTO ".$this->nome_tabela." (ativo, local_trabalho, id_pessoa, id_usuario) VALUES (".$ativo.", '".$localTrabalho."', ".$id_pessoa.", ".$id_usuario.");";
			} else {
				$query = "INSERT INTO ".$this->nome_tabela." (ativo, local_trabalho, id_pessoa) VALUES (".$ativo.", '".$localTrabalho."', ".$id_pessoa.");";
			}
			return $this->ultimoIdInserido($this->db->insertOrUpdate($query));
		}
		if($id_usuario){
			$query = "UPDATE ".$this->nome_tabela." SET ativo = ".$ativo.", local_trabalho = '".$localTrabalho."', id_pessoa = ".$id_pessoa.", id_usuario = ".$id_usuario." WHERE id = ".$id.";";
		} else {
			$query = "UPDATE ".$this->nome_tabela." SET ativo = ".$ativo.", local_trabalho = '".$localTrabalho."', id_pessoa = ".$id_pessoa." WHERE id = ".$id.";";
		}
		$status = $this->db->insertOrUpdate($query);
		if(!$status)
			return FALSE;
		return $id;

	}

	function fetchObjeto($row){
		$id = $row['id'];
		$ativo = $row['ativo'];
		$localTrabalho = stripslashes($row['local_trabalho']);
		$idPessoa = $row['id_pessoa'];
		$idUsuario = $row['id_usuario'];

		$dao = new PessoaDao();
		$pessoa = $dao->buscaById($idPessoa);
		if(!$pessoa) return FALSO;
		
		$dao = new UsuarioDao();
		$usuario = $dao->buscaById($idUsuario);
		if(!$usuario) {
			$usuario = new Usuario(0,"","",0);
		}
		
		$nome = $pessoa->getNome();
		$sobrenome = $pessoa->getSobrenome();
		$telefone = $pessoa->getTelefone();
		$endereco = $pessoa->getEndereco();
		$bairro = $pessoa->getBairro();
		$cidade = $pessoa->getCidade();
		$nascimento = $pessoa->getNascimento();
		$rg = $pessoa->getRG();
		$cpf = $pessoa->getCPF();

		return new Cliente($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $ativo, $localTrabalho, $usuario);
	}



}
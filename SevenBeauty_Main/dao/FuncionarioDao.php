<?php

class FuncionarioDao extends Dao {
	
	function __construct(){
		parent::__construct("funcionarios");
	}

	function save($funcionario){
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
		$ativo = $funcionario->getAtivo();
		
		$daoPessoa = new PessoaDao();
		$idPessoa = $daoPessoa->save(new Pessoa($idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $ativo));
		
		if(!$idPessoa) return FALSO;
	
		$id = $funcionario->getId();
		$idUsuario = $this->checkUsuario($funcionario->getUsuario());
		if(!$idUsuario) {
			$daoUsuario = new UsuarioDao();
			$idUsuario = $daoUsuario->save($funcionario->getUsuario());
		}
		$idCargo = $funcionario->getCargo()->getId();
		
		if(!$id){
			if($idUsuario){
				$query = "INSERT INTO ".$this->nome_tabela." (ativo, id_pessoa, id_usuario, id_cargo) VALUES (".$ativo.", ".$idPessoa.", ".$idUsuario.", ".$idCargo.");";
			} else {
				$query = "INSERT INTO ".$this->nome_tabela." (ativo, id_pessoa, id_cargo) VALUES (".$ativo.", ".$idPessoa.", ".$idCargo.");";
			}
			return $this->ultimoIdInserido($this->db->insertOrUpdate($query));

		}
		if($idUsuario) {
			$query = "UPDATE ".$this->nome_tabela." SET ativo = ".$ativo.", id_pessoa = ".$idPessoa.", id_usuario = ".$idUsuario.", id_cargo = ".$idCargo." WHERE id = ".$id.";";
		} else {
			$query = "UPDATE ".$this->nome_tabela." SET ativo = ".$ativo.", id_pessoa = ".$idPessoa.", id_cargo = ".$idCargo." WHERE id = ".$id.";";
		}
		$status = $this->db->insertOrUpdate($query);
		if(!$status)
			return FALSE;
		return $id;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$ativo = $row['ativo'];
		$idPessoa = $row['id_pessoa'];
		$idUsuario = $row['id_usuario'];
		$idCargo = $row['id_cargo'];

		$dao = new PessoaDao();
		$pessoa = $dao->buscaById($idPessoa);
		$dao = new CargoDao();
		$cargo = $dao->buscaById($idCargo);
		$dao = new UsuarioDao();
		$usuario = $dao->buscaById($idUsuario);
		if(!($pessoa && $cargo)) return FALSO;
		
		$nome = $pessoa->getNome();
		$sobrenome = $pessoa->getSobrenome();
		$telefone = $pessoa->getTelefone();
		$endereco = $pessoa->getEndereco();
		$bairro = $pessoa->getBairro();
		$cidade = $pessoa->getCidade();
		$nascimento = $pessoa->getNascimento();
		$rg = $pessoa->getRG();
		$cpf = $pessoa->getCPF();

		return new Funcionario($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo);
	}

	function checkUsuario($usuario){
		if($usuario->getId())
			return $usuario->getId();
		return 0;
	}
}
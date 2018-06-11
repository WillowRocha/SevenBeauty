<?php

class CartaoDao extends Dao {
	
	function __construct(){
		parent::__construct("funcionarios");
	}

	function save($Cartao){
		$id = ;
		$nome = $Cartao->getNome();
		$sobrenome = $Cartao->getSobrenome();
		$telefone = $Cartao->getTelefone();
		$endereco = $Cartao->getEndereco();
		$nascimento = $Cartao->getNascimento();
		$rg = $Cartao->getRG();
		$cpf = $Cartao->getCPF();
		$ativo = $Cartao->getAtivo();
		
		$daoPessoa = new PessoaDao();
		$result = $daoPessoa->save(new Pessoa($idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $ativo));
		//TODO: Fazer verificacao em Pessoa para poder inserir Cliente e Funcionarios com a mesma pessoa, considerando que é uma atualizacaoo se o RG e CPF forem iguais.
		if(!strcmp($result, PESSOA_JA_EXISTE) || !strcmp($result, ERRO_INSERCAO_PESSOA)) return $result; 

		if($result){
			$id = $Cartao->getId();
			$idPessoa = $result;
			$idUsuario = $this->checkUsuario($Cartao->getUsuario());
			$idCargo = $Cartao->getCargo()->getId();
			
			$existe = $this->buscaById($id);
			if(!$existe){
				$query = "INSERT INTO ".$this->nome_tabela." (ativo, id_pessoa, id_usuario, id_cargo) VALUES (".$ativo.", ".$idPessoa.", ".$idUsuario.", ".$idCargo.");";
				return $this->ultimoIdInserido($this->db->insertOrUpdate($query));
			}
			$query = "UPDATE ".$this->nome_tabela." SET ativo = ".$ativo.", id_pessoa = ".$idPessoa.", id_usuario = ".$idUsuario.", id_cargo = ".$idCargo." WHERE id = ".$id.";";
			return $this->db->insertOrUpdate($query);
		}
		return ERRO_INSERCAO_FUNCIONARIO;
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
		$nascimento = $pessoa->getNascimento();
		$rg = $pessoa->getRG();
		$cpf = $pessoa->getCPF();

		return new Cartao($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo);
	}

	function checkUsuario($usuario){
		if($usuario)
			return $usuario->getId();
		return 0;
	}

}
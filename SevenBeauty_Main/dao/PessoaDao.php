<?php

class PessoaDao extends Dao {
	
	function __construct(){
		parent::__construct("pessoas");
	}

	function save($pessoa){
		$id = $pessoa->getId();
		$nome = addslashes($pessoa->getNome());
		$sobrenome = addslashes($pessoa->getSobrenome());
		$telefone = addslashes($pessoa->getTelefone());
		$endereco = addslashes($pessoa->getEndereco());
		$nascimento = addslashes($pessoa->getEndereco()); // Corrigir para salvar a data de fato
		$rg = addslashes($pessoa->getRG());
		$cpf = addslashes($pessoa->getCPF());
		$ativo = $pessoa->getAtivo();
		
		if(!$id){
			if($this->buscaIdPorPropriedade("nome", $nome)){
				return PESSOA_JA_EXISTE;
			}
			$query = "INSERT INTO ".$this->nome_tabela." (nome, sobrenome, telefone, endereco, nascimento, rg, cpf, ativo) VALUES ('".$nome."', '".$sobrenome."', '".$telefone."', '".$endereco."', '".$nascimento."', '".$rg."', '".$cpf."', ".$ativo.");";
			return $this->ultimoIdInserido($this->db->insertOrUpdate($query));
		}
		$id = $pessoa->getId();
		if($this->novoNomeValido($pessoa, $nome)){
			$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."', sobrenome = '".$sobrenome."', telefone = '".$telefone."', endereco = '".$endereco."', nascimento = '".$nascimento."', rg = '".$rg."', cpf = '".$cpf."', ativo = ".$ativo." WHERE id = ".$id.";";
			$status = $this->db->insertOrUpdate($query);
			if($status)
				return $id;
			return ERRO_INSERCAO_PESSOA;
		}
		return PESSOA_JA_EXISTE;
	}

	function novoNomeValido($pessoa, $novoNome){
		$mudouNome = ($this->buscaById($pessoa->getId())->getNome() != $novoNome);
		$novoNomeExiste = $this->buscaIdPorPropriedade("nome", $novoNome);
		if($mudouNome && $novoNomeExiste){
			return FALSO;
		}
		return VERDADEIRO;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		$sobrenome = stripslashes($row['sobrenome']);
		$telefone = stripslashes($row['telefone']);
		$endereco = stripslashes($row['endereco']);
		$nascimento = stripslashes($row['nascimento']);
		$rg = stripslashes($row['rg']);
		$cpf = stripslashes($row['cpf']);
		$ativo = $row['ativo'];
		return new Pessoa($id, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $ativo);
	}
}
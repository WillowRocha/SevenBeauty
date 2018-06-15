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
		$endereco = addslashes($pessoa->getEndereco()." - ".$pessoa->getBairro()." - ".$pessoa->getCidade());
		$nascimento = addslashes($pessoa->getNascimento()); // Corrigir para salvar a data de fato
		$rg = addslashes($pessoa->getRG());
		$cpf = addslashes($pessoa->getCPF());
		$ativo = $pessoa->getAtivo();
		
		if(!$id){
			$query = "INSERT INTO ".$this->nome_tabela." (nome, sobrenome, telefone, endereco, nascimento, rg, cpf, ativo) VALUES ('".$nome."', '".$sobrenome."', '".$telefone."', '".$endereco."', '".$nascimento."', '".$rg."', '".$cpf."', ".$ativo.");";
			return $this->ultimoIdInserido($this->db->insertOrUpdate($query));
		}
		$query = "UPDATE ".$this->nome_tabela." SET nome = '".$nome."', sobrenome = '".$sobrenome."', telefone = '".$telefone."', endereco = '".$endereco."', nascimento = '".$nascimento."', rg = '".$rg."', cpf = '".$cpf."', ativo = ".$ativo." WHERE id = ".$id.";";
		$status = $this->db->insertOrUpdate($query);
		if(!$status)
			return FALSE;
		return $id;
	}

	function fetchObjeto($row){
		$id = $row['id'];
		$nome = stripslashes($row['nome']);
		$sobrenome = stripslashes($row['sobrenome']);
		$telefone = stripslashes($row['telefone']);		
		$nascimento = stripslashes($row['nascimento']);
		$rg = stripslashes($row['rg']);
		$cpf = stripslashes($row['cpf']);
		$ativo = $row['ativo'];

		$enderecoCompleto = stripslashes($row['endereco']);
		$endList = explode(" - ", $enderecoCompleto);
		$endereco = "";
		$bairro = "";
		$cidade = "";

		if(isset($endList[0]))
			$endereco = $endList[0];
		if(isset($endList[1]))
			$bairro = $endList[1];
		if(isset($endList[2]))
			$cidade = $endList[2];
		
		return new Pessoa($id, $nome, $sobrenome, $telefone, $endereco, $bairro, $cidade, $nascimento, $rg, $cpf, $ativo);
	}
}
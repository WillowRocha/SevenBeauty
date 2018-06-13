<?php

class ProfissionalDao extends Dao {
	
	private $nome_tabela_aux;

	function __construct(){
		parent::__construct("funcionarios");
		$this->nome_tabela_aux = "profissionais_servicos";
	}

	function save($profissional){
		$id = $profissional->getId();
		$idPessoa = $profissional->getIdPessoa();
		$nome = $profissional->getNome();
		$sobrenome = $profissional->getSobrenome();
		$telefone = $profissional->getTelefone();
		$endereco = $profissional->getEndereco();
		$nascimento = $profissional->getNascimento();
		$rg = $profissional->getRG();
		$cpf = $profissional->getCPF();
		$cargo = $profissional->getCargo();
		$ativo = $profissional->getAtivo();
		$usuario = $profissional->getUsuario();
		
		$daoFuncionario = new FuncionarioDao();
		$result = $daoFuncionario->save(new Funcionario($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargo, $usuario, $ativo));
		//TODO: Fazer verificacao em Pessoa para poder inserir Clientes e Funcionarios com a mesma pessoa, considerando que é uma atualizacaoo se o RG e CPF forem iguais.
		if(!strcmp($result,ERRO_INSERCAO_FUNCIONARIO) || !strcmp($result, ERRO_INSERCAO_PESSOA) || !strcmp($result, PESSOA_JA_EXISTE)) return $result;

		if($result){
			$listaServicos = $profissional->getListaServicos();
			$count = 0;
			foreach ($listaServicos as $servico) {
				$idServico = $servico->getId();
				$existe = $this->buscaByIdComposto($id, $idServico);
				if(!$existe){
					$query = "INSERT INTO ".$this->nome_tabela_aux." (id_funcionario, id_servico) VALUES (".$id.", ".$idServico.");";
					$status =  $this->db->insertOrUpdate($query);
					if(!$status) return FALSE;
					$count++;
				}
			}
			return $count;
		}
		return ERRO_INSERCAO_PROFISSIONAL;
	}

	function buscaByIdComposto($idFuncionario, $idServico){
		$query = "SELECT * FROM ".$this->nome_tabela_aux." WHERE id_funcionario = ".$idFuncionario." AND id_servico = ".$idServico.";";
		$result = $this->db->selectOne($query);
		if($result){
			return VERDADEIRO;
		}
		return FALSE;
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
		$nascimento = $funcionario->getNascimento();
		$rg = $funcionario->getRG();
		$cpf = $funcionario->getCPF();
		$cargo = $funcionario->getCargo();
		$ativo = $funcionario->getAtivo();
		$usuario = $funcionario->getUsuario();

		$listaServicos = $this->buscaListaServicos($id);

		return new Profissional($id, $idPessoa, $nome, $sobrenome, $telefone, $endereco, $nascimento, $rg, $cpf, $cargo, $ativo, $listaServicos, $usuario);
	}

	function buscaListaServicos($idFuncionario){
		$query = "SELECT * FROM ".$this->nome_tabela_aux." WHERE id_funcionario = ".$idFuncionario.";";
		$result = $this->db->selectMultiple($query);
		if($result){
			$num_rows = mysqli_num_rows($result);
			$servicos = [];
			for($i=0; $i < $num_rows; $i++){
	            $row = mysqli_fetch_array($result);
	            $dao = new ServicoDao();
	            $servico = $dao->buscaById($row['id_servico']);
	            array_push($servicos, $servicos);
	        }
	        return $servicos;
    	}
		return FALSO;
	}	
}
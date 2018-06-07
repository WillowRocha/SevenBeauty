<?php

require_once("constants.php");


//Model
require_once("../model/Agendamento.php");
require_once("../model/Baixas.php");
require_once("../model/Cartao.php");
require_once("../model/CategoriaServico.php");
require_once("../model/Cliente.php");
require_once("../model/Dinheiro.php");
require_once("../model/FormaPagamento.php");
require_once("../model/Fornecedor.php");
require_once("../model/Funcionario.php");
require_once("../model/Gerente.php");
require_once("../model/Lancamento.php");
require_once("../model/Pessoa.php");
require_once("../model/Produto.php");
require_once("../model/Profissional.php");
require_once("../model/Servico.php");
require_once("../model/Usuario.php");

//Dao
require_once("DBConnection.php");
require_once("Dao.php");
require_once("../dao/AgendamentoDao.php");
require_once("../dao/BaixasDao.php");
require_once("../dao/CartaoDao.php");
require_once("../dao/CategoriaServicoDao.php");
require_once("../dao/ClienteDao.php");
require_once("../dao/DinheiroDao.php");
require_once("../dao/FormaPagamentoDao.php");
require_once("../dao/FornecedorDao.php");
require_once("../dao/FuncionarioDao.php");
require_once("../dao/GerenteDao.php");
require_once("../dao/LancamentoDao.php");
require_once("../dao/PessoaDao.php");
require_once("../dao/ProdutoDao.php");
require_once("../dao/ProfissionalDao.php");
require_once("../dao/ServicoDao.php");
require_once("../dao/UsuarioDao.php");

//Service
require_once("../service/LoginService.php");
require_once("../service/UsuarioService.php");




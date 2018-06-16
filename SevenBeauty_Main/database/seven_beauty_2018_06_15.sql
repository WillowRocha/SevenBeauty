-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jun-2018 às 04:04
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seven_beauty`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `data_hora_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` bigint(20) UNSIGNED NOT NULL,
  `id_servico` bigint(20) UNSIGNED NOT NULL,
  `data_hora_inicial` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_hora_final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ativo` tinyint(1) NOT NULL,
  `finalizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `baixas`
--

CREATE TABLE `baixas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  `id_lancamento` bigint(20) UNSIGNED NOT NULL,
  `id_forma_pagamento` bigint(20) UNSIGNED NOT NULL,
  `estornado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(1, 'Gerente'),
(2, 'Profissional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_produto`
--

CREATE TABLE `categorias_produto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias_produto`
--

INSERT INTO `categorias_produto` (`id`, `nome`) VALUES
(1, 'Cabelo'),
(2, 'Manicure'),
(3, 'Pedicure');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_servico`
--

CREATE TABLE `categorias_servico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias_servico`
--

INSERT INTO `categorias_servico` (`id`, `nome`) VALUES
(1, 'Cabeleireiro'),
(2, 'Manicure'),
(3, 'Pedicure');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `local_trabalho` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_pessoa` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `ativo`, `local_trabalho`, `id_pessoa`, `id_usuario`) VALUES
(1, 1, 'X Prog Labs', 1, 1),
(2, 1, 'X Prog Labs', 8, 7),
(3, 1, 'X Prog Labs', 9, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pagamento`
--

CREATE TABLE `formas_pagamento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `formas_pagamento`
--

INSERT INTO `formas_pagamento` (`id`, `nome`) VALUES
(1, 'Dinheiro'),
(2, 'CartÃ£o de CrÃ©dito'),
(3, 'CartÃ£o de DÃ©bito'),
(4, 'Cheque');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_empresa` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nome_consultor` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria_produtos` bigint(20) UNSIGNED NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome_empresa`, `nome_consultor`, `telefone`, `id_categoria_produtos`, `ativo`) VALUES
(1, 'Hinode', 'JoÃ£o Sant\'Anna', '+55 (51) 9 9999-9999', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `id_pessoa` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_cargo` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `ativo`, `id_pessoa`, `id_usuario`, `id_cargo`) VALUES
(5, 1, 7, 5, 1),
(6, 1, 10, 9, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancamentos`
--

CREATE TABLE `lancamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_agendamento` bigint(20) UNSIGNED NOT NULL,
  `desconto` decimal(7,2) DEFAULT NULL,
  `tipo_desconto` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'porcentagem ou valor',
  `cancelado` tinyint(1) NOT NULL,
  `finalizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `rg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `sobrenome`, `telefone`, `endereco`, `nascimento`, `rg`, `cpf`, `ativo`) VALUES
(1, 'Willow', 'Rocha', '(51) 99999-9999', 'Rua OrfanotrÃ³fio, 555 - OrfanotrÃ³fio - Porto Alegre', '0000-00-00', '1234567890', '123.456.789.09', 1),
(7, 'Karise', 'Rocha', '(51) 99999-9999', 'Av. Azenha, 640 - Azenha - Porto Alegre', '0000-00-00', '2345678905', '123.456.789.69', 1),
(8, 'Gustavo', 'Trevisani', '(51) 99999-9999', 'Rua A - Terra Nova - Alvorada', '0000-00-00', '12341343454', '234.234.234-45', 0),
(9, 'Giovanni', 'Mansueto', '(51) 99999-9999', 'Alguma rua - Algum bairro - Alguma cidade', '0000-00-00', '09934738974', '443.987.979-78', 0),
(10, 'Manicure XYZ', 'Que funciona', '(51) 99999-9999', 'Av. Azenha, 640 - Azenha - Porto Alegre', '0000-00-00', '1234567890', '123.456.789.09', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigo_barras` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_unidade_medida` bigint(20) UNSIGNED NOT NULL,
  `id_categoria_produto` bigint(20) UNSIGNED NOT NULL,
  `estoque_minimo` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigo_barras`, `nome`, `quantidade`, `id_unidade_medida`, `id_categoria_produto`, `estoque_minimo`, `ativo`) VALUES
('789123456789', 'Creme Morte SÃºbita', 2, 2, 1, 1, 1),
('7894561238905', 'Tintura 8.0 Loiro Claro', 6, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissionais_servicos`
--

CREATE TABLE `profissionais_servicos` (
  `id_funcionario` bigint(20) UNSIGNED NOT NULL,
  `id_servico` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria_servico` bigint(20) UNSIGNED NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `duracao` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome`, `id_categoria_servico`, `preco`, `duracao`, `ativo`) VALUES
(1, 'Corte Feminino', 2, '50.00', 45, 1),
(2, 'Corte Masculino', 2, '25.00', 15, 1),
(3, 'Tintura', 2, '25.00', 15, 1),
(4, 'Progressiva', 2, '250.00', 180, 1),
(5, 'Mechas', 1, '100.00', 90, 1),
(6, 'Pintar Unhas', 2, '15.00', 45, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades_medida`
--

CREATE TABLE `unidades_medida` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `unidades_medida`
--

INSERT INTO `unidades_medida` (`id`, `nome`) VALUES
(1, 'Gramas'),
(2, 'Kilogramas'),
(3, 'mililitros'),
(4, 'Litros'),
(5, 'Metros'),
(6, 'Km'),
(7, 'Ano Luz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `access_level`) VALUES
(1, 'admin', 'admin', 10),
(5, 'gerente', 'pass', 2),
(6, 'cliente', 'pass', 0),
(7, 'gu_trevisani', 'pass', 0),
(8, 'giovanni', 'pass', 0),
(9, 'profissional', 'pass', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `FK_agendamento` (`id_servico`);

--
-- Indexes for table `baixas`
--
ALTER TABLE `baixas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_baixa` (`id`),
  ADD KEY `id_lancamento` (`id_lancamento`),
  ADD KEY `id_forma_pagamento` (`id_forma_pagamento`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_cargo` (`id`);

--
-- Indexes for table `categorias_produto`
--
ALTER TABLE `categorias_produto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_categoria_produto` (`id`);

--
-- Indexes for table `categorias_servico`
--
ALTER TABLE `categorias_servico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_categoria_servico` (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_cliente` (`id`),
  ADD KEY `fk_id_pessoa` (`id_pessoa`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Indexes for table `formas_pagamento`
--
ALTER TABLE `formas_pagamento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_forma_pagamento` (`id`),
  ADD UNIQUE KEY `id_forma_pagamento_2` (`id`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_fornecedor` (`id`),
  ADD KEY `id_categoria_produto` (`id_categoria_produtos`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_funcionario` (`id`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pessoa` (`id_pessoa`);

--
-- Indexes for table `lancamentos`
--
ALTER TABLE `lancamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_lancamento` (`id`),
  ADD KEY `fk_id_agendamento` (`id_agendamento`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pessoa` (`id`),
  ADD UNIQUE KEY `id_pessoa_2` (`id`),
  ADD UNIQUE KEY `id_pessoa_3` (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigo_barras`),
  ADD KEY `fk_categoria_produto` (`id_categoria_produto`),
  ADD KEY `fk_id_unidade_medida` (`id_unidade_medida`);

--
-- Indexes for table `profissionais_servicos`
--
ALTER TABLE `profissionais_servicos`
  ADD PRIMARY KEY (`id_funcionario`,`id_servico`),
  ADD KEY `fk_id_servico` (`id_servico`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_servico` (`id`),
  ADD KEY `id_categoria_servico` (`id_categoria_servico`);

--
-- Indexes for table `unidades_medida`
--
ALTER TABLE `unidades_medida`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_unidade_medida` (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_usuario` (`nome`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `baixas`
--
ALTER TABLE `baixas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorias_produto`
--
ALTER TABLE `categorias_produto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorias_servico`
--
ALTER TABLE `categorias_servico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `formas_pagamento`
--
ALTER TABLE `formas_pagamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lancamentos`
--
ALTER TABLE `lancamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unidades_medida`
--
ALTER TABLE `unidades_medida`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `FK_agendamento` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`id`),
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`);

--
-- Limitadores para a tabela `baixas`
--
ALTER TABLE `baixas`
  ADD CONSTRAINT `id_forma_pagamento` FOREIGN KEY (`id_forma_pagamento`) REFERENCES `formas_pagamento` (`id`),
  ADD CONSTRAINT `id_lancamento` FOREIGN KEY (`id_lancamento`) REFERENCES `lancamentos` (`id`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_id_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`),
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD CONSTRAINT `id_categoria_produto` FOREIGN KEY (`id_categoria_produtos`) REFERENCES `categorias_produto` (`id`);

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `id_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `id_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`),
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `lancamentos`
--
ALTER TABLE `lancamentos`
  ADD CONSTRAINT `fk_id_agendamento` FOREIGN KEY (`id_agendamento`) REFERENCES `agendamentos` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_categoria_produto` FOREIGN KEY (`id_categoria_produto`) REFERENCES `categorias_produto` (`id`),
  ADD CONSTRAINT `fk_id_unidade_medida` FOREIGN KEY (`id_unidade_medida`) REFERENCES `unidades_medida` (`id`);

--
-- Limitadores para a tabela `profissionais_servicos`
--
ALTER TABLE `profissionais_servicos`
  ADD CONSTRAINT `fk_id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `fk_id_servico` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`id`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `id_categoria_servico` FOREIGN KEY (`id_categoria_servico`) REFERENCES `categorias_servico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 27/11/2024 às 13:13
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoque_zen`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_produto`
--

CREATE TABLE `categoria_produto` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria_produto`
--

INSERT INTO `categoria_produto` (`id_categoria`, `nome`, `descricao`) VALUES
(7, 'PNEU', 'o melhor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `email`, `observacao`, `cpf_cnpj`, `telefone`) VALUES
(19, 'Michelin', 'michelin@vendas.com', 'Os melhores PNEUS', '50.567.288/0003-10', '(21) 3621-46');

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_movimentacao` int(11) NOT NULL,
  `fk_usuario_id_usuario` int(11) NOT NULL,
  `tipo` char(1) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `movimentacao`
--

INSERT INTO `movimentacao` (`data`, `hora`, `id_movimentacao`, `fk_usuario_id_usuario`, `tipo`, `id_produto`, `quantidade`) VALUES
('2024-11-27', '09:02:52', 6, 2, 'E', 137, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `tipo_unidade` varchar(50) DEFAULT NULL,
  `observacoes` varchar(500) DEFAULT NULL,
  `valor_custo` decimal(15,2) DEFAULT NULL,
  `lucro` decimal(15,2) DEFAULT NULL,
  `valor_venda` decimal(15,2) DEFAULT NULL,
  `estoque_disponivel` int(11) DEFAULT NULL,
  `estoque_minimo` int(11) DEFAULT NULL,
  `estoque_maximo` int(11) DEFAULT NULL,
  `categoria_produto_id_categoria` int(11) NOT NULL,
  `fornecedor_id_fornecedor` int(11) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `ativo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `tipo_unidade`, `observacoes`, `valor_custo`, `lucro`, `valor_venda`, `estoque_disponivel`, `estoque_minimo`, `estoque_maximo`, `categoria_produto_id_categoria`, `fornecedor_id_fornecedor`, `imagem`, `ativo`) VALUES
(137, 'PNEU Michelin Pilot Sport 4s', 'unid', '', 2590.00, NULL, 3000.00, 1, 1, 10, 7, 19, 'https://i.ibb.co/XzN4VB1/produto-png.webp', 'Y');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `idade` int(3) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `observacao` varchar(250) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `cpf`, `idade`, `telefone`, `endereco`, `observacao`, `img`) VALUES
(1, 'Mayck Eduardo', 'mayck22.03@hotmail.com', '2203', '', 0, '', '', '', ''),
(2, '2@2', '2@2', '2', '', 0, '', '', '', ''),
(3, 'Teste', 'teste@teste.com', 'teste', '', 0, '', '', '', ''),
(4, 'Moraes', 'moraes@email.com', '....', '123456', 17, '17123456', 'dfasfkjfsaklj', 'sflakjsfafkjgrn', ''),
(5, 'piroco', 'p@p.com', '123', '123', 12, '12', 'wrthae', 'athaen', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id_movimentacao`),
  ADD KEY `fk_movimentacao_usuario` (`fk_usuario_id_usuario`),
  ADD KEY `fk_produto_id` (`id_produto`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_categoria_produto1_idx` (`categoria_produto_id_categoria`),
  ADD KEY `fk_produto_fornecedor1_idx` (`fornecedor_id_fornecedor`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `unq_email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id_movimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `fk_movimentacao_usuario` FOREIGN KEY (`fk_usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_produto_id` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria_produto1` FOREIGN KEY (`categoria_produto_id_categoria`) REFERENCES `categoria_produto` (`id_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_produto_fornecedor1` FOREIGN KEY (`fornecedor_id_fornecedor`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

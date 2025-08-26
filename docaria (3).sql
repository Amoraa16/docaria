-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/08/2025 às 13:22
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `docaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `avaliacao`) VALUES
(1, 'Bolo de Chocolate', 'Bolo fofinho com cobertura cremosa.', 29.90, 'bolo1.jpg', 5),
(2, 'Brigadeiro', 'Clássico doce brasileiro.', 2.50, 'brigadeiro.jpg', 4),
(3, 'Torta de Morango', 'Com frutas frescas e creme.', 34.90, 'torta.jpg', 6),
(4, 'Bolo de Cenoura', 'Bolo fofinho com cobertura cremosa de chocolate.', 24.99, 'bolo2.jpg', 1),
(5, 'Beijinho', 'Doce delícioso para festas.', 1.50, 'beijinho.jpg', 1),
(6, 'Torta de Limão', 'Torta refrescante para seu dia.', 39.90, 'torta2.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Rafael', '123@gmail.com', '$2y$10$BsoTN7LC8.7Oq2QpdmjPK.3yKesfSMxqnCh.dBt9quUPB.JNEDstq'),
(2, '123', '123@h', '$2y$10$NNkoNt4kTONc3POGPD98D.18iYv0hFJABGCVV7SPUVQEAR3OYN/ua'),
(3, 'Felipe Bellini', 'felipe@gmail.com', '$2y$10$3Ood0J.iizJEGhLZ7JbIXOywgvtKotWnpC6ocnR9/zyyTe4IsCAqS'),
(4, 'Nicolau', 'nicolaspato@gmail.com', '$2y$10$44jjnzq3kFtGP3laAj2bVOA7kCFpW7xiXA7PeHm.btdDSR5R6EbJW'),
(5, 'Miguel Miranda', 'mirandex@gmail.com', '$2y$10$XexwYaI28WQCVDf0IfjkkeQ6L3f7EX951a3DVzRdNA.fMeSoHpa8e'),
(6, 'Alberto Antônio', 'bertin@gmail.com', '$2y$10$AvREz7jfAa94YuzLuUpHg.RfdWn1tvuU8dH9yjHJ2kO4QIb2cIM9y');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

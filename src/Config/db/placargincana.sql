-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/03/2025 às 16:21
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `placargincana`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipes`
--

CREATE TABLE `equipes` (
  `id_equipe` int(11) NOT NULL,
  `nome_equipe` varchar(200) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `modalidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `equipes`
--

INSERT INTO `equipes` (`id_equipe`, `nome_equipe`, `serie_id`, `modalidade_id`) VALUES
(1, '1ºEM', 1, 1),
(2, '2ºEM', 2, 1),
(3, '3ºEM', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

CREATE TABLE `jogos` (
  `id_jogo` int(11) NOT NULL,
  `equipe_1` int(11) NOT NULL,
  `equipe_2` int(11) NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL,
  `pontuacao_equipe_1` int(11) DEFAULT NULL,
  `pontuacao_equipe_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `jogos`
--

INSERT INTO `jogos` (`id_jogo`, `equipe_1`, `equipe_2`, `inicio`, `fim`, `pontuacao_equipe_1`, `pontuacao_equipe_2`) VALUES
(1, 1, 3, '2025-03-13 13:00:00', '2025-03-13 13:20:00', 0, 0),
(2, 2, 3, '2025-03-13 13:30:00', '2025-03-13 13:50:00', 0, 0),
(3, 1, 2, '2025-03-13 14:00:00', '2025-03-13 14:20:00', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modalidades`
--

CREATE TABLE `modalidades` (
  `id_modalidade` int(11) NOT NULL,
  `nome_modalidade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `modalidades`
--

INSERT INTO `modalidades` (`id_modalidade`, `nome_modalidade`) VALUES
(1, 'FUTSAL MASCULINO'),
(2, 'FUTSAL FEMININO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `series`
--

CREATE TABLE `series` (
  `id_serie` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `ano_letivo` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `series`
--

INSERT INTO `series` (`id_serie`, `descricao`, `ano_letivo`) VALUES
(1, '1º Ensino Médio', '2025'),
(2, '2º Ensino Médio', '2025'),
(3, '3º Ensino Médio', '2025');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `celular` varchar(15) NOT NULL,
  `aluno_sesi` enum('SIM','NAO','','') NOT NULL,
  `competidor_sesi` enum('SIM','NAO','','') NOT NULL,
  `equipe_competidor_sesi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `cpf`, `senha`, `data_nascimento`, `celular`, `aluno_sesi`, `competidor_sesi`, `equipe_competidor_sesi_id`) VALUES
(3, 'jonatas', '11111111111', '123456', '1995-08-11', '(18) 999999', 'SIM', 'NAO', 2),
(4, 'maria', '33333333333', '123456', '2000-08-11', '(33) 3333-3', 'NAO', 'NAO', 2),
(5, 'maria', '33333333333', '123456', '2000-08-11', '(33) 3333-3', 'NAO', 'NAO', 1),
(6, 'leticia', '11111111111', '123456', '2024-10-03', '(18) 999999-999', 'SIM', 'SIM', 1),
(7, 'andré', '11111111111', '123456', '2007-01-01', '(18) 999999-999', 'SIM', 'SIM', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id_equipe`),
  ADD KEY `equipe_modalidade_FK` (`modalidade_id`),
  ADD KEY `equipe_serie_FK` (`serie_id`);

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id_jogo`);

--
-- Índices de tabela `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id_modalidade`);

--
-- Índices de tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_serie`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario_equipe_fk` (`equipe_competidor_sesi_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id_modalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `equipes`
--
ALTER TABLE `equipes`
  ADD CONSTRAINT `equipe_modalidade_FK` FOREIGN KEY (`modalidade_id`) REFERENCES `modalidades` (`id_modalidade`),
  ADD CONSTRAINT `equipe_serie_FK` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id_serie`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_equipe_fk` FOREIGN KEY (`equipe_competidor_sesi_id`) REFERENCES `equipes` (`id_equipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

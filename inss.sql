-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/10/2020 às 23:24
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inss`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `conteudo` mediumblob DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_bsl`
--

CREATE TABLE `cad_bsl` (
  `id_bsl` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `arquivo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cad_bsl`
--

INSERT INTO `cad_bsl` (`id_bsl`, `numero`, `data`, `arquivo`) VALUES
(1, 1, '2020-01-02', 'BSL GEXJFR Nº 01 de 02 de janeiro de 2020.pdf'),
(2, 2, '2020-01-03', 'BSL GEXJFR Nº 02 de 03 de janeiro de 2020.pdf'),
(3, 3, '2020-01-06', 'BSL GEXJFR Nº 03 de 06 de janeiro de 2020.pdf'),
(4, 4, '2020-01-07', 'BSL GEXJFR Nº 04 de 07 de janeiro de 2020.pdf'),
(5, 5, '2020-01-08', 'BSL GEXJFR Nº 05 de 08 de janeiro de 2020.pdf'),
(6, 6, '2020-01-09', 'BSL GEXJFR Nº 06 de 09 de janeiro de 2020.pdf'),
(7, 7, '2020-01-10', 'BSL GEXJFR Nº 07 de 10 de janeiro de 2020.pdf'),
(8, 8, '2020-01-13', 'BSL GEXJFR Nº 08 de 13 de janeiro de 2020.pdf'),
(9, 9, '2020-01-14', 'BSL GEXJFR Nº 09 de 14 de janeiro de 2020.pdf'),
(10, 10, '2020-01-15', 'BSL GEXJFR Nº 10 de 15 de janeiro de 2020.pdf'),
(11, 11, '2020-01-16', 'BSL GEXJFR Nº 11 de 16 de janeiro de 2020.pdf'),
(12, 12, '2020-01-17', 'BSL GEXJFR Nº 12 de 17 de janeiro de 2020.pdf'),
(13, 13, '2020-01-20', 'BSL GEXJFR Nº 13 de 20 de janeiro de 2020.pdf'),
(14, 14, '2020-01-21', 'BSL GEXJFR Nº 14 de 21 de janeiro de 2020.pdf'),
(15, 15, '2020-01-22', 'BSL GEXJFR Nº 15 de 22 de janeiro de 2020.pdf'),
(16, 16, '2020-01-23', 'BSL GEXJFR Nº 16 de 23 de janeiro de 2020.pdf'),
(17, 17, '2020-01-24', 'BSL GEXJFR Nº 17 de 24 de janeiro de 2020.pdf'),
(18, 18, '2020-01-27', 'BSL GEXJFR Nº 18 de 27 de janeiro de 2020.pdf'),
(19, 19, '2020-01-28', 'BSL GEXJFR Nº 19 de 28 de janeiro de 2020.pdf'),
(20, 20, '2020-01-29', 'BSL GEXJFR Nº 20 de 29 de janeiro de 2020.pdf'),
(21, 21, '2020-01-30', 'BSL GEXJFR Nº 21 de 30 de janeiro de 2020.pdf'),
(22, 22, '2020-01-31', 'BSL GEXJFR Nº 22 de 31 de janeiro de 2020.pdf'),
(23, 23, '2020-02-03', 'BSL GEXJFR Nº 23 de 03 de fevereiro de 2020.pdf'),
(24, 24, '2020-02-04', 'BSL GEXJFR Nº 24 de 04 de fevereiro de 2020.pdf'),
(25, 25, '2020-02-05', 'BSL GEXJFR Nº 25 de 05 de fevereiro de 2020.pdf'),
(26, 26, '2020-02-06', 'BSL GEXJFR Nº 26 de 06 de fevereiro de 2020.pdf'),
(27, 27, '2020-02-07', 'BSL GEXJFR Nº 27 de 07 de fevereiro de 2020.pdf'),
(28, 28, '2020-02-10', 'BSL GEXJFR Nº 28 de 10 de fevereiro de 2020.pdf'),
(29, 29, '2020-02-11', 'BSL GEXJFR Nº 29 de 11 de fevereiro de 2020.pdf'),
(30, 30, '2020-02-12', 'BSL GEXJFR Nº 30 de 12 de fevereiro de 2020.pdf'),
(31, 31, '2020-02-13', 'BSL GEXJFR Nº 31 de 13 de fevereiro de 2020.pdf'),
(32, 32, '2020-02-14', 'BSL GEXJFR Nº 32 de 14 de fevereiro de 2020.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id_user`, `nome`, `email`, `cargo`, `username`, `senha`) VALUES
(4, 'Letícia Otoni Clementino', 'leticia.clementino@inss.gov.br', 'Estagiário', 'leticia.clementino', '7892bcc981f98c7b73bd6ccc93deae48');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cad_bsl`
--
ALTER TABLE `cad_bsl`
  ADD PRIMARY KEY (`id_bsl`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cad_bsl`
--
ALTER TABLE `cad_bsl`
  MODIFY `id_bsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

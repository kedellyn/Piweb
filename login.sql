-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Dez-2023 às 04:03
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `discente`
--

CREATE TABLE `discente` (
  `matricula` varchar(12) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `docente`
--

CREATE TABLE `docente` (
  `siap` varchar(7) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `curso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `identificador` varchar(12) NOT NULL,
  `senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requerimento`
--

CREATE TABLE `requerimento` (
  `data` date NOT NULL,
  `Requerente` varchar(80) NOT NULL,
  `Endereco` varchar(140) NOT NULL,
  `Cidade` varchar(80) NOT NULL,
  `Telefone` varchar(45) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Curso` varchar(45) NOT NULL,
  `requerimento_Matricula` varchar(12) NOT NULL,
  `campus` varchar(17) NOT NULL,
  `motivos` varchar(256) NOT NULL,
  `observacoes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `discente`
--
ALTER TABLE `discente`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices para tabela `requerimento`
--
ALTER TABLE `requerimento`
  ADD KEY `requerimento_Matricula` (`requerimento_Matricula`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `requerimento`
--
ALTER TABLE `requerimento`
  ADD CONSTRAINT `fk_sasa` FOREIGN KEY (`requerimento_Matricula`) REFERENCES `discente` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

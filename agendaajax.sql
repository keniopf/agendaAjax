-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Maio-2020 às 18:50
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `keniofarias1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `servico` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `email`, `servico`, `data`, `hora`) VALUES
(1, '0', '9999', '0', '0', '0000-00-00', '0'),
(2, 'Kenio Pereira de Farias', '9999-9999', 'keniopf@gmail.com', 'Escritura', '2020-05-04', ''),
(3, 'Kenio Pereira de Farias', '9999-9999', 'keniopf@gmail.com', 'Escritura', '0000-00-00', ''),
(4, 'Kenio Pereira de Farias', '9999-9999', 'keniopf@gmail.com', 'Escritura', '2020-05-04', ''),
(5, 'Pinheiro', '6191753030', 'pinheiroandreadasilva@gmail.com', 'Procuraçao', '2020-05-04', ''),
(6, 'Pinheiro', '6191753030', 'pinheiroandreadasilva@gmail.com', 'Procuraçao', '2020-05-04', ''),
(7, 'Pinheiro', '6191753030', 'pinheiroandreadasilva@gmail.com', 'Procuraçao', '2020-05-04', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

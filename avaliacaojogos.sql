-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 28-Out-2025 às 00:56
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avaliacaojogos`
--
CREATE SCHEMA IF NOT EXISTS `avaliacaojogos` DEFAULT CHARACTER SET utf8 ;
USE `avaliacaojogos` ;
-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`adminID`, `nome`, `senha`, `email`) VALUES
(1, 'Hiago', 'e421f7118194bfbee11f27f04b05605621788970325d3b70ad4c60bfad23b896', 'hiago@hiago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `avaliacoesID` int(11) NOT NULL,
  `tipoVoto` int(11) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `jogos_jogosID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`avaliacoesID`, `tipoVoto`, `descricao`, `jogos_jogosID`) VALUES
(7, 1, 'Gostei', 5),
(8, 0, 'NÃ£o sou fÃ£', 5),
(9, 1, 'Amo esse jogo', 6),
(10, 1, 'Jogo super legal', 6),
(11, 0, 'Estava massante', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `jogosID` int(11) NOT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `imagemUm` varchar(250) DEFAULT NULL,
  `imagemDois` varchar(250) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `nLikes` int(11) DEFAULT NULL,
  `nDislikes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`jogosID`, `nome`, `imagemUm`, `imagemDois`, `descricao`, `nLikes`, `nDislikes`) VALUES
(5, 'SuperMario', '../imagensJogos/SuperMario_2025-10-28_3417.jpg', '../imagensJogos/SuperMario_2025-10-28_9409_2.png', 'Super Mario World, originalmente chamado no JapÃ£o de Super Mario Bros. 4, Ã© um jogo eletrÃ´nico de plataforma desenvolvido pela Nintendo Entertainment Analysis & Development ', 1, 1),
(6, 'LEGO Jurassic World', '../imagensJogos/LEGOJurassicWorld_2025-10-28_3404.jpg', '../imagensJogos/LEGOJurassicWorld_2025-10-28_7770_2.jpg', 'Lego Jurassic World Ã© um videogame de aÃ§Ã£o e aventura com tema Lego desenvolvido pela TT Fusion e publicado pela Warner Bros. Interactive Entertainment. Ele adapta os enredos dos quatro primeiros filmes da franquia Jurassic Park e faz parte de uma sÃ©rie de videogames com o tema Lego.', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuariosID` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuariosID`, `nome`, `senha`, `email`) VALUES
(1, 'Hiago', 'e421f7118194bfbee11f27f04b05605621788970325d3b70ad4c60bfad23b896', 'hiago@hiago'),
(3, 'jorge', '67c888af8ad80f0232832431fb0bbb478f12740ff8b451d8d4ce0238a2d8b63a', 'jorge@jorge'),
(4, 'Pedro', 'ee5cd7d5d96c8874117891b2c92a036f96918e66c102bc698ae77542c186f981', 'pedro@pedro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`avaliacoesID`),
  ADD KEY `fk_avaliacoes_jogos_idx` (`jogos_jogosID`);

--
-- Indexes for table `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`jogosID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuariosID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `avaliacoesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jogos`
--
ALTER TABLE `jogos`
  MODIFY `jogosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuariosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_avaliacoes_jogos` FOREIGN KEY (`jogos_jogosID`) REFERENCES `jogos` (`jogosID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

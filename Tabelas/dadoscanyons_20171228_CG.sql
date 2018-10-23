-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Dez-2017 às 19:24
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canyons`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadoscanyons`
--

CREATE TABLE `dadoscanyons` (
  `id` int(11) NOT NULL,
  `canyon` text NOT NULL,
  `nomeserra` text NOT NULL,
  `localizacao` text NOT NULL,
  `povoacaoinicio` text NOT NULL,
  `povoacaofim` text NOT NULL,
  `dificuldade` text NOT NULL,
  `maiorrapel` text NOT NULL,
  `horarioacesso` text NOT NULL,
  `horarioretorno` text NOT NULL,
  `descida` text NOT NULL,
  `desnivel` text NOT NULL,
  `croqui` text NOT NULL,
  `geolatitude` text NOT NULL,
  `geolongitude` text NOT NULL,
  `observacoes` text NOT NULL,
  `usersys` text NOT NULL,
  `datasys` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dadoscanyons`
--



INSERT INTO `dadoscanyons` (`id`, `canyon`, `nomeserra`, `localizacao`, `povoacaoinicio`, `povoacaofim`, `dificuldade`, `maiorrapel`, `horarioacesso`, `horarioretorno`, `descida`, `desnivel`, `croqui`, `geolatitude`, `geolongitude`, `observacoes`, `usersys`, `datasys`) VALUES
(1, 'Fafiao', 'Geres PNPG', 'Fafiao', 'Fafiao', 'Fafiao', '', '20', '', '', '', '', 'fafiaoSupInf_croqui.pdf', '0.00', '0.00', '', 'CRISTINA', '2017-12-27 20:34:09'),
(2, 'Adrao', 'Peneda PNPG', 'Adrao-Soajo', 'Adrao', 'Soajo', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 11:32:17'),
(3, 'Azere', 'Peneda PNPG', 'Azere', 'Azere', 'Azere', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:35:42'),
(4, 'Castro', 'Peneda PNPG', 'Castro', 'Castro', 'Castro', '', '', '', '', '', '', '', '0.00', '0.00', 'http://www.montesdelaboreiro.pt/actividades/?actividade=12', 'CRISTINA', '2017-12-28 16:37:10'),
(5, 'Varziela', 'Peneda PNPG', 'Castro', 'Castro', 'Castro', '', '', '', '', '', '', '', '0.00', '0.00', 'http://www.montesdelaboreiro.pt/actividades/?actividade=13', 'CRISTINA', '2017-12-28 16:37:40'),
(6, 'Conho', 'Geres  PNPG', 'Ermida', '', '', '', '', '', '', '', '', 'RioConho.pdf', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:38:10'),
(8, 'Carcerelha', 'Amerela', 'Entre-ambos-os-Rios', 'Froufe', 'Froufe', '', '', '', '', '', '', 'RioCarcerelha.pdf', '0.00', '0.00', '', 'ADMIN', '2017-12-28 16:40:03'),
(9, 'Germil', 'Amarela PNPG', 'Paradela', 'Paradela', 'Paradela', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:40:56'),
(10, 'Cabril', 'Geres PNPG', 'Xertelo', 'Xertelo', 'Vila Boa', '', '', '', '', '', '', 'RioCabril.pdf', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:45:39'),
(11, 'Arado Superior', 'Geres PNPG', 'Cascata do Arado', 'Ermida', 'Ermida', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:46:37'),
(12, 'Arado Inferior', 'Geres PNPG', 'Cascata do Arado', 'Ermida', 'Ermida', '', '', '', '', '', '', 'RioAradoInf.pdf', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:47:22'),
(13, 'Pincaes', 'Geres PNPG', 'PincÃ£es', 'PincÃ£es', 'PincÃ£es', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:51:19'),
(14, 'Teixeira', 'Freita', 'Sao Joao da Serra', '', '', '', '', '', '', '', '', 'RioTeixeira.pdf', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:54:28'),
(15, 'Frades', 'Freita', 'Rio', '', '', '', '', '', '', '', '', 'RioFradesSup.pdf', '0.00', '0.00', '', 'ADMIN', '2017-12-28 16:55:22'),
(16, 'Frades Inferior', 'Freita', 'Rio de Frades', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:55:50'),
(17, 'Bouceguedim', 'Freita', 'Bouceguedim', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:57:03'),
(18, 'Mizarela', 'Freita', 'Albergaria da Serra', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:57:48'),
(19, 'Ribeira de Vessadas', 'Freita', 'Gestosinhos', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:58:14'),
(20, 'Paraduca', 'Freita-Caramulo', 'Paraduca', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:58:39'),
(21, 'Lordelo', 'Caramulo', 'Castanheira...', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '', 'CRISTINA', '2017-12-28 16:59:17'),
(22, 'Ave', 'Cabreira', 'Lourido', '', '', '', '', '', '', '', '', 'RioAve.pdf', '0.00', '0.00', '', 'ADMIN', '2017-12-28 18:01:18'),
(23, 'Ribeira de Castanheira', 'Freita', 'Castanheira de Serra', '', '', '', '', '', '', '', '', 'RibCastanheira.pdf', '0.00', '0.00', '', 'ADMIN', '2017-12-28 18:02:37'),
(24, 'Pena Amarela Superior', 'Freita', 'Cando', 'Cando', '', '', '', '', '', '', '', 'RibPenaAmarelaSup.pdf', '0.00', '0.00', '', 'ADMIN', '2017-12-28 18:03:53'),
(25, 'Pena Amarela Inferior', 'Freita', 'Bouceguedim', '', '', '', '', '', '', '', '', 'RibPenaAmarelaInf.pdf', '0.00', '0.00', '', 'ADMIN', '2017-12-28 18:04:54'),
(26, 'Cabrum', 'Serra Gralheira', 'Cinfaes', 'Barragem do Freigil', '', '', '', '', '', '', '', 'RioCabrum.pdf', '0.00', '0.00', '', 'ADMIN', '2017-12-28 18:14:04'),
(27, 'Rio Olo - Fisgas Ermelo', 'AlvÃ£o', 'Mirador Alvao', '', '', '', '', '', '', '', '', 'RioOlo.pdf', '0.00', '0.00', '', 'ADMIN', '2017-12-28 18:14:55'),
(28, 'Rio Poio- Alvadia', 'AlvÃ£o', 'Alvadia', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '', 'ADMIN', '2017-12-28 18:17:55');





--
-- Indexes for dumped tables
--

--
-- Indexes for table `dadoscanyons`
--
ALTER TABLE `dadoscanyons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dadoscanyons`
--
ALTER TABLE `dadoscanyons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

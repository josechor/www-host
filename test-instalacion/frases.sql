-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Xerado en: 11 de Set de 2021 ás 11:07
-- Versión do servidor: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- Versión do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `frases`
--

-- --------------------------------------------------------

--
-- Estrutura da táboa `frases`
--

CREATE TABLE `frases` (
  `id_frase` int(11) NOT NULL,
  `frase` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A extraer os datos da táboa `frases`
--

INSERT INTO `frases` (`id_frase`, `frase`) VALUES
(1, 'Suspendí mi educación cuando tuve que ir al colegio. '),
(2, 'Unicamente en el movimiento, por doloroso que sea, hay vida.'),
(3, 'Los personajes universales, perfectamente conscientes de su inutilidad, son necesarios para calmar la conciencia colectiva.'),
(4, 'El único deber es el deber de divertirse terriblemente.'),
(5, 'Se fue con la mayoría.'),
(6, 'De todos es errar; sólo del necio perseverar en el error.'),
(7, 'La genialidad aparece siempre que alguien cae en la cuenta por primera vez de algo evidente.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frases`
--
ALTER TABLE `frases`
  ADD PRIMARY KEY (`id_frase`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `frases`
--
ALTER TABLE `frases`
  MODIFY `id_frase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

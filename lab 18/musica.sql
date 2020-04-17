-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 05:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musica`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id_Autor` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id_Autor`, `nombre`) VALUES
(1, 'Angie'),
(2, 'Eduardo'),
(3, 'Fernando Delgadillo'),
(4, 'Valentin Elizalde'),
(5, 'Pedro Paramo'),
(6, 'Jose Juarez');

-- --------------------------------------------------------

--
-- Table structure for table `cancion`
--

CREATE TABLE `cancion` (
  `id_Cancion` int(50) NOT NULL,
  `nombre_Cancion` varchar(50) NOT NULL,
  `nombre_Genero` varchar(50) NOT NULL,
  `id_Autor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancion`
--

INSERT INTO `cancion` (`id_Cancion`, `nombre_Cancion`, `nombre_Genero`, `id_Autor`) VALUES
(1, 'Eminem', 'Heavy Metal', 6),
(2, 'Thriller', 'Baladas', 5),
(3, 'Like a Prayer', 'Rumba', 4),
(4, 'When Doves Cry', 'Hip Hop', 1),
(5, 'I Wanna Dance With Somebody', 'Heavy Metal', 3),
(6, 'Baby One More Time', 'Hip Hop', 5),
(7, 'Everybody', 'Pop', 5),
(8, 'Rehab', 'Ranchera', 4),
(9, 'Poker Face', 'Bachata', 5),
(10, 'Rolling in the Deep', 'Heavy Metal', 4),
(11, 'Single Ladies', 'Hip Hop', 4),
(12, 'Get Lucky', 'Rumba', 2),
(13, 'Uptown Funk', 'Flamenco', 5),
(14, 'Take on me', 'Blues', 3),
(15, 'Crazy', 'Rumba', 5),
(16, 'Hips don\'t lie', 'Rumba', 4),
(17, 'cumbia  sonidera', 'Ranchera', 4),
(18, 'jangueo', 'Reggae', 4),
(32, 'nueva a modificada', 'Flamenco', 6),
(33, 'no tengo idea', 'Blues', 3);

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `nombre_Genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`nombre_Genero`) VALUES
('Bachata'),
('Baladas'),
('Blues'),
('Bolero'),
('Flamenco'),
('Heavy Metal'),
('Hip Hop'),
('Indie'),
('Pop'),
('Ranchera'),
('Reggae'),
('Rumba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_Autor`),
  ADD UNIQUE KEY `id_Autor` (`id_Autor`);

--
-- Indexes for table `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id_Cancion`),
  ADD UNIQUE KEY `id_Cancion` (`id_Cancion`),
  ADD KEY `nombre_Genero` (`nombre_Genero`),
  ADD KEY `id_Autor` (`id_Autor`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`nombre_Genero`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id_Cancion` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`nombre_Genero`) REFERENCES `genero` (`nombre_Genero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cancion_ibfk_2` FOREIGN KEY (`id_Autor`) REFERENCES `autor` (`id_Autor`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

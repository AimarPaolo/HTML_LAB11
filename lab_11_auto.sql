-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2013 at 02:51 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `automobili`
--
CREATE DATABASE `automobili` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `automobili`;

-- --------------------------------------------------------

--
-- Table structure for table `auto_nuove`
--

CREATE TABLE IF NOT EXISTS `auto_nuove` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `NOME` varchar(64) NOT NULL,
  `QUANTITA` tinyint(4) unsigned NOT NULL,
  `COSTO` decimal(9,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `auto_nuove`
--

INSERT INTO `auto_nuove` (`ID`, `NOME`, `QUANTITA`, `COSTO`) VALUES
(1, 'Fiat Panda 1.2 Emotion', 100, 10000.00),
(2, 'Fiat Seicento Active', 80, 6000.00),
(3, 'Fiat Grande Punto 1.3 MJ Active 3p', 50, 11000.00),
(4, 'Alfa Romeo GT 3.2 V6', 10, 31000.00),
(5, 'Alfa Romeo Giulietta 1.9 JTD 140 CV', 20, 21000.00),
(6, 'Ferrari California GTD Spider', 5, 200000.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Permessi user: uReadOnly; pwd: posso_solo_leggere (solo SELECT)
--
GRANT USAGE ON `automobili`.* TO 'uReadOnly'@'%' IDENTIFIED BY PASSWORD '*0FBF5C395B1E6B971E9CBB18F95041B49D0B0947';

GRANT SELECT ON `automobili`.* TO 'uReadOnly'@'%';


--
-- Permessi user: uReadWrite; pwd: SuperPippo!!! (solo SELECT, INSERT, UPDATE)
--
GRANT USAGE ON `automobili`.* TO 'uReadWrite'@'%' IDENTIFIED BY PASSWORD '*400BF58DFE90766AF20296B3D89A670FC66BEAEC';

GRANT SELECT, INSERT, UPDATE ON `automobili`.* TO 'uReadWrite'@'%';

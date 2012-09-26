-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2012 at 04:57 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nhl`
--

-- --------------------------------------------------------

--
-- Table structure for table `goaliestats`
--

CREATE TABLE IF NOT EXISTS `goaliestats` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `rk` int(4) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` decimal(11,1) DEFAULT NULL,
  `team` varchar(33) DEFAULT NULL,
  `teamcur` varchar(3) DEFAULT NULL,
  `pos` varchar(11) DEFAULT NULL,
  `gp` int(11) DEFAULT NULL,
  `gs` int(11) DEFAULT NULL,
  `w` int(11) DEFAULT NULL,
  `l` int(11) DEFAULT NULL,
  `ot` int(11) DEFAULT NULL,
  `sa` int(11) DEFAULT NULL,
  `ga` int(11) DEFAULT NULL,
  `gaa` decimal(11,2) DEFAULT NULL,
  `sv` int(11) DEFAULT NULL,
  `svper` decimal(11,3) DEFAULT NULL,
  `so` int(11) DEFAULT NULL,
  `g` int(11) DEFAULT NULL,
  `a` int(11) DEFAULT NULL,
  `pim` int(11) DEFAULT NULL,
  `toi` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sktrstats`
--

CREATE TABLE IF NOT EXISTS `sktrstats` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `rk` int(4) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` decimal(11,1) DEFAULT NULL,
  `team` varchar(33) DEFAULT NULL,
  `teamcur` varchar(3) DEFAULT NULL,
  `pos` varchar(11) DEFAULT NULL,
  `gp` int(11) DEFAULT NULL,
  `g` int(11) DEFAULT NULL,
  `a` int(11) DEFAULT NULL,
  `pts` int(11) DEFAULT NULL,
  `plusminus` int(11) DEFAULT NULL,
  `pim` int(11) DEFAULT NULL,
  `ppg` int(11) DEFAULT NULL,
  `shg` int(11) DEFAULT NULL,
  `gwg` int(11) DEFAULT NULL,
  `otg` int(11) DEFAULT NULL,
  `sog` int(11) DEFAULT NULL,
  `shtpct` decimal(11,1) DEFAULT NULL,
  `toiperg` time DEFAULT NULL,
  `shftperg` decimal(11,1) DEFAULT NULL,
  `fopct` decimal(11,1) DEFAULT NULL,
  `esg` int(11) DEFAULT NULL,
  `esa` int(11) DEFAULT NULL,
  `espts` int(11) DEFAULT NULL,
  `ppa` int(11) DEFAULT NULL,
  `pppts` int(11) DEFAULT NULL,
  `sha` int(11) DEFAULT NULL,
  `shpts` int(11) DEFAULT NULL,
  `estoi` varchar(11) DEFAULT NULL,
  `estoiperg` varchar(11) DEFAULT NULL,
  `shtoi` varchar(11) DEFAULT NULL,
  `shtoiperg` varchar(11) DEFAULT NULL,
  `pptoi` varchar(11) DEFAULT NULL,
  `pptoiperg` varchar(11) DEFAULT NULL,
  `toi` varchar(11) DEFAULT NULL,
  `shft` int(11) DEFAULT NULL,
  `toipershft` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

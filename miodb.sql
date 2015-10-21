-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:8180
-- Generation Time: Oct 05, 2015 at 04:30 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `miodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `user_id`, `time`) VALUES
(1, 1, 1441640012),
(2, 1, 1441640020),
(3, 1, 1441640031),
(4, 1, 1441640036),
(5, 1, 1442345256);

-- --------------------------------------------------------

--
-- Table structure for table `prova`
--

CREATE TABLE IF NOT EXISTS `prova` (
`id` int(4) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `prova`
--

INSERT INTO `prova` (`id`, `nome`) VALUES
(1, 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `scheda`
--

CREATE TABLE IF NOT EXISTS `scheda` (
`id` int(4) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkrecensione` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkprodotto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  `autore` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `scheda`
--

INSERT INTO `scheda` (`id`, `nome`, `linkrecensione`, `linkprodotto`, `commento`, `categoria`, `data`, `autore`) VALUES
(1, 'ciao', 'ciao', 'ciao', 'ciao', 'ciao', '0000-00-00 00:00:00', '0'),
(2, 'prodotto1', 'www.google.it', 'www.repubblica.it', 'lorem ipsum dolor sit amet sed facitur omnes', 'Hardware', '2015-10-05 16:27:32', 'admin1'),
(3, 'prodotto2', 'www.gazzetta.it', 'www.google.it', 'lorem ipsum dolor sit amet ciao ciao ciao', 'Hardware', '2015-10-05 16:28:10', 'admin1'),
(4, 'prodotto3', 'www.google.it', 'www.google.it', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'Software', '2015-10-05 16:29:34', 'ago1');

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
`id` int(4) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `permesso` int(1) NOT NULL DEFAULT '0',
  `attivo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`id`, `username`, `password`, `mail`, `permesso`, `attivo`) VALUES
(1, 'ago', 'ciao', 'ago@pel.it', 0, 1),
(2, 'ago', 'ciao', 'ago@pel.it', 0, 1),
(3, 'ago', '$2y$10$OXSxJjagnDwYzWfO25PelOffNiijjMV.VUg9UB2rocN7LzQp2oPd2', 'ago@pel.it', 0, 1),
(4, 'ago', '$2y$10$9ZE/p77p0DUq7MuCez09WOuLXiwvrrQtpmK9ET/1xYqn8f5Eb47mq', 'ago@pel.it', 0, 1),
(5, 'admin', '$2y$10$uKx3EvXGoOdal9Y9nT0PV.FyVvQLK.dt71pAh3LFIOXylTvXORtSW', 'admin@pass.it', 0, 1),
(6, 'agostino', '$2y$10$xYQqcC.XVSC7/sAELadr6u2MuVv1oTW9TBcjwhXDmvc24v7UwtE2O', 'agos@pelles.it', 0, 1),
(7, 'admin1', '$2y$10$nhkyEcmiLWXM16vprtTFWe4aHjooce5G9Tc8/IJAftAOmDQ9sKLAy', 'agopel@gmail.com', 1, 1),
(8, 'provola', '$2y$10$IUOk9bEfex/2kMWZnHdmiuaRauAqCMssmkaYzBHJSGeE0fOOF2NR6', 'ciao@ciao.it', 0, 1),
(9, 'ago1', '$2y$10$qI5DJtegqiV.je3KuGlCne.ZK0rjOourVXfB8hWxRv3Xl2NOr1o7a', 'agopel@gmail.com', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prova`
--
ALTER TABLE `prova`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheda`
--
ALTER TABLE `scheda`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prova`
--
ALTER TABLE `prova`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `scheda`
--
ALTER TABLE `scheda`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

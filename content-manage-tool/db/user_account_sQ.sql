-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2020 at 04:07 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kv`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_account_sq`
--

CREATE TABLE IF NOT EXISTS `user_account_sq` (
  `sQ_Id` int(11) NOT NULL AUTO_INCREMENT,
  `sQ` varchar(100) NOT NULL,
  PRIMARY KEY (`sQ_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_account_sq`
--

INSERT INTO `user_account_sq` (`sQ_Id`, `sQ`) VALUES
(1, 'Which is your favourite food?'),
(2, 'Which is your dream country, you would like to visit?'),
(3, 'Who is your favourite Teacher?'),
(4, 'Which is your favourite Car?'),
(5, 'At which place, you were born?'),
(6, 'What is your favourite Movie?'),
(7, 'What is your favourite Color?'),
(8, 'What is your Mother Surname?'),
(9, 'Who is your favourite actor, musician or artist?'),
(10, 'What is your favourite pet Animal?'),
(11, 'What is the name of the Bank, you opened saving Account for the first time?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

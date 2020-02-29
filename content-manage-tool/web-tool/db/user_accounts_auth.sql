-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2020 at 07:35 AM
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
-- Table structure for table `user_accounts_auth`
--

CREATE TABLE IF NOT EXISTS `user_accounts_auth` (
  `account_Id` int(11) NOT NULL AUTO_INCREMENT,
  `mob_code` varchar(5) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `mob_val` varchar(1) NOT NULL,
  `surName` varchar(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `acc_pwd` varchar(100) NOT NULL,
  `q1` int(11) NOT NULL,
  `a1` varchar(60) NOT NULL,
  `q2` int(11) NOT NULL,
  `a2` varchar(60) NOT NULL,
  `q3` int(11) NOT NULL,
  `a3` varchar(60) NOT NULL,
  PRIMARY KEY (`account_Id`),
  KEY `q1` (`q1`),
  KEY `q2` (`q2`),
  KEY `q3` (`q3`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_accounts_auth`
--
ALTER TABLE `user_accounts_auth`
  ADD CONSTRAINT `user_accounts_auth_ibfk_3` FOREIGN KEY (`q3`) REFERENCES `user_accounts_sq` (`sQ_Id`),
  ADD CONSTRAINT `user_accounts_auth_ibfk_1` FOREIGN KEY (`q1`) REFERENCES `user_accounts_sq` (`sQ_Id`),
  ADD CONSTRAINT `user_accounts_auth_ibfk_2` FOREIGN KEY (`q2`) REFERENCES `user_accounts_sq` (`sQ_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

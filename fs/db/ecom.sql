-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2020 at 05:26 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `account_Id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `acc_pwd` varchar(250) NOT NULL,
  `role_Id` varchar(10) NOT NULL,
  `acc_active` varchar(1) NOT NULL,
  PRIMARY KEY (`account_Id`),
  KEY `role_Id` (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`account_Id`, `username`, `acc_pwd`, `role_Id`, `acc_active`) VALUES
('AA47778618', 'Administrator', '482c811da5d5b4bc6d497ffa98491e38', 'AR37139692', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE IF NOT EXISTS `admin_role` (
  `role_Id` varchar(10) NOT NULL,
  `roleName` varchar(55) NOT NULL,
  PRIMARY KEY (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`role_Id`, `roleName`) VALUES
('AR37139692', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE IF NOT EXISTS `customer_accounts` (
  `account_Id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `acc_pwd` varchar(250) NOT NULL,
  `acc_active` varchar(1) NOT NULL,
  PRIMARY KEY (`account_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_cart`
--

CREATE TABLE IF NOT EXISTS `customer_cart` (
  `cart_Id` varchar(10) NOT NULL,
  `prod_Id` varchar(10) NOT NULL,
  `cart_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price_Id` varchar(10) NOT NULL,
  `final_buy` float NOT NULL,
  PRIMARY KEY (`cart_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE IF NOT EXISTS `customer_info` (
  `account_Id` varchar(10) NOT NULL,
  `name` varchar(55) NOT NULL,
  `mobile_code` varchar(5) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) NOT NULL,
  `landmark` varchar(55) NOT NULL,
  `city` varchar(75) NOT NULL,
  `state` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  PRIMARY KEY (`account_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_cat_main`
--

CREATE TABLE IF NOT EXISTS `prod_cat_main` (
  `category_Id` varchar(10) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  PRIMARY KEY (`category_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_cat_sub`
--

CREATE TABLE IF NOT EXISTS `prod_cat_sub` (
  `subCategory_Id` varchar(10) NOT NULL,
  `category_Id` varchar(10) NOT NULL,
  `subCategoryName` varchar(100) NOT NULL,
  PRIMARY KEY (`subCategory_Id`),
  KEY `category_Id` (`category_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_info`
--

CREATE TABLE IF NOT EXISTS `prod_info` (
  `prod_Id` varchar(10) NOT NULL,
  `prodCatId` varchar(10) NOT NULL,
  `prodCatType` varchar(15) NOT NULL,
  `prodTitle` varchar(250) NOT NULL,
  `prodImg` varchar(1500) NOT NULL,
  `prodBrand` varchar(55) NOT NULL,
  `prodDesc` varchar(6000) NOT NULL,
  `prodAddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prodAddedBy` varchar(15) NOT NULL,
  PRIMARY KEY (`prod_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_price`
--

CREATE TABLE IF NOT EXISTS `prod_price` (
  `price_Id` varchar(10) NOT NULL,
  `prod_Id` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `currency` varchar(35) NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`price_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod_spec`
--

CREATE TABLE IF NOT EXISTS `prod_spec` (
  `spec_Id` varchar(10) NOT NULL,
  `prod_Id` varchar(10) NOT NULL,
  `paramKey` varchar(1000) NOT NULL,
  `paramValue` varchar(1000) NOT NULL,
  PRIMARY KEY (`spec_Id`),
  KEY `prod_Id` (`prod_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD CONSTRAINT `admin_accounts_ibfk_1` FOREIGN KEY (`role_Id`) REFERENCES `admin_role` (`role_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

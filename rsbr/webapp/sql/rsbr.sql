-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2019 at 09:15 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rsbr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `admin_Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `acc_pwd` varchar(100) NOT NULL,
  `mobilenumber` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`admin_Id`, `name`, `username`, `acc_pwd`, `mobilenumber`) VALUES
(1, 'Anup', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '9160869337');

-- --------------------------------------------------------

--
-- Table structure for table `cust_accounts`
--

CREATE TABLE IF NOT EXISTS `cust_accounts` (
  `account_Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `mobileNumber` varchar(10) NOT NULL,
  `acc_pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`account_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cust_accounts`
--

INSERT INTO `cust_accounts` (`account_Id`, `name`, `mobileNumber`, `acc_pwd`) VALUES
(1, 'Anup', '6300193369', 'fcea920f7412b5da7be0cf42b8c93759');

-- --------------------------------------------------------

--
-- Table structure for table `cust_requests`
--

CREATE TABLE IF NOT EXISTS `cust_requests` (
  `request_Id` int(11) NOT NULL AUTO_INCREMENT,
  `account_Id` int(11) NOT NULL,
  `application` varchar(2000) NOT NULL,
  `recordTitle` varchar(450) NOT NULL,
  `recordDesc` varchar(10000) NOT NULL,
  `picture1` varchar(2000) NOT NULL,
  `picture2` varchar(2000) NOT NULL,
  `picture3` varchar(2000) NOT NULL,
  `isCertify` varchar(1) NOT NULL,
  `certifyTitle` varchar(600) NOT NULL,
  `certifyDesc` varchar(5000) NOT NULL,
  `displayRecords` varchar(1) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  `comment` varchar(3500) NOT NULL,
  PRIMARY KEY (`request_Id`),
  KEY `account_Id` (`account_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cust_requests`
--

INSERT INTO `cust_requests` (`request_Id`, `account_Id`, `application`, `recordTitle`, `recordDesc`, `picture1`, `picture2`, `picture3`, `isCertify`, `certifyTitle`, `certifyDesc`, `displayRecords`, `ts`, `status`, `comment`) VALUES
(1, 1, 'http://localhost/prjs/rsbr/webapp/uploads/customers/1/1570893686289.pdf', 'cgfvgh', 'Enter Record Description hghgvygh', '', '', '', 'Y', 'This is the Title in the Action of the Action in the Score.', 'This is the Title in the Action of the Action in the Score. This is the Title in the Action of the Action in the Score. This is the Title in the Action of the Action in the Score. This is the Title in the Action of the Action in the Score. ', '', '2019-10-13 19:09:18', 'UPLOADED', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `news_Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `picture` varchar(2000) NOT NULL,
  `newsDesc` varchar(60000) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`news_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`news_Id`, `title`, `picture`, `newsDesc`, `ts`) VALUES
(3, 'hfyu', 'http://localhost/prjs/rsbr/webapp/uploads/news/13.jpg', 'Write your <b>NewsFeed</b> here', '2019-10-02 08:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `picture` varchar(2000) NOT NULL,
  `newsDesc` varchar(60000) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`news_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_Id`, `title`, `picture`, `newsDesc`, `ts`) VALUES
(3, 'hfyu', 'http://localhost/prjs/rsbr/webapp/uploads/news/13.jpg', 'Write your <b>NewsFeed</b> here', '2019-10-02 08:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `panelboardmembers`
--

CREATE TABLE IF NOT EXISTS `panelboardmembers` (
  `member_Id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_pic` varchar(600) NOT NULL,
  `name` varchar(60) NOT NULL,
  `role` varchar(65) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `bgcss` varchar(50) NOT NULL,
  PRIMARY KEY (`member_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `panelboardmembers`
--

INSERT INTO `panelboardmembers` (`member_Id`, `profile_pic`, `name`, `role`, `description`, `bgcss`) VALUES
(2, 'http://localhost/prjs/rsbr/webapp/uploads/panelBoard/6EkoAJ01XXTWAI-WxuZlGIcAj5OmXZfhIcx6WXaWlAiHH41zyZ9dfvXIFOPkCB-Dwt_U=h900.jpg', 'ddrtbrbykdvcf', 'svdfvg', 'sfvvgvgrfvg', 'bg-dodgerBlue');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

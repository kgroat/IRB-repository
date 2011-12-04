-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2011 at 09:46 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `IRB`
--

DROP DATABASE IF EXISTS IRB;
CREATE DATABASE IF NOT EXISTS IRB;
GRANT ALL PRIVILEGES ON IRB.* to 'assist'@'localhost' identified by 'assist';
USE IRB;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `type` enum('exempt','expedited') NOT NULL,
  `form_key` int(11) NOT NULL,
  `consent_key` int(11) NOT NULL,
  `pri_key` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pri_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `application`
--


-- --------------------------------------------------------

--
-- Table structure for table `consent`
--

CREATE TABLE IF NOT EXISTS `consent` (
  `pri_key` int(11) NOT NULL,
  `body` blob,
  PRIMARY KEY (`pri_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consent`
--


-- --------------------------------------------------------

--
-- Table structure for table `exempt`
--

CREATE TABLE IF NOT EXISTS `exempt` (
  `pri_key` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `faculty_approved` tinyint(1) DEFAULT NULL,
  `rationale` blob,
  `irb_date` date DEFAULT NULL,
  `irb_nbr` int(11) DEFAULT NULL,
  `irb_approved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pri_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exempt`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_1`
--

CREATE TABLE IF NOT EXISTS `expedited_1` (
  `title` varchar(256) DEFAULT NULL,
  `abstract` blob,
  `q1` tinyint(1) DEFAULT NULL,
  `q2` tinyint(1) DEFAULT NULL,
  `q3` tinyint(1) DEFAULT NULL,
  `q4` tinyint(1) DEFAULT NULL,
  `q5` tinyint(1) DEFAULT NULL,
  `q6` tinyint(1) DEFAULT NULL,
  `q7` tinyint(1) DEFAULT NULL,
  `review` date DEFAULT NULL,
  `q8` tinyint(1) DEFAULT NULL,
  `irb_date` date DEFAULT NULL,
  `irb_nbr` int(11) DEFAULT NULL,
  `pri_key` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pri_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `expedited_1`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_2`
--

CREATE TABLE IF NOT EXISTS `expedited_2` (
  `form_key` int(11) DEFAULT NULL,
  `rationale` blob,
  `methods` blob,
  `pri_key` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `expedited_2`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_3`
--

CREATE TABLE IF NOT EXISTS `expedited_3` (
  `form_key` int(11) DEFAULT NULL,
  `sex` enum('m','f','both') DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `max_age` int(11) DEFAULT NULL,
  `q1` tinyint(1) DEFAULT NULL,
  `q2` tinyint(1) DEFAULT NULL,
  `recruitment` blob,
  `pri_key` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expedited_3`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_4`
--

CREATE TABLE IF NOT EXISTS `expedited_4` (
  `form_key` int(11) DEFAULT NULL,
  `oral` tinyint(1) DEFAULT NULL,
  `written` tinyint(1) DEFAULT NULL,
  `assent` tinyint(1) DEFAULT NULL,
  `pri_key` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expedited_4`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_5`
--

CREATE TABLE IF NOT EXISTS `expedited_5` (
  `form_key` int(11) DEFAULT NULL,
  `privacy` blob,
  `confidentiality` blob,
  `recorded` tinyint(1) DEFAULT NULL,
  `records` blob,
  `pri_key` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expedited_5`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_6`
--

CREATE TABLE IF NOT EXISTS `expedited_6` (
  `form_key` int(11) DEFAULT NULL,
  `risk` blob,
  `procedures` blob,
  `benefits` blob,
  `outweigh` blob,
  `pri_key` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expedited_6`
--


-- --------------------------------------------------------

--
-- Table structure for table `faculty_supervisors`
--

CREATE TABLE IF NOT EXISTS `faculty_supervisors` (
  `supervisor` varchar(40) NOT NULL,
  `student` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_supervisors`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `usertype` enum('student','faculty','irb_member','irb_admin') NOT NULL DEFAULT 'student',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `usertype`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'irb_admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_to_applications`
--

CREATE TABLE IF NOT EXISTS `users_to_applications` (
  `user` varchar(40) NOT NULL,
  `application_key` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_to_applications`
--

INSERT INTO `users_to_applications` (`user`, `application_key`) VALUES
('admin', 0),
('admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_to_applications`
--

CREATE TABLE IF NOT EXISTS `irb_to_applications` (
  `user` varchar(40) NOT NULL,
  `application_key` int(11) NOT NULL,
  `status` varchar(40) NOT NULL,
  `comment` blob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_to_applications`
--
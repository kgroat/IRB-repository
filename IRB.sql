-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2011 at 05:24 AM
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
  `pri_key` int(11) NOT NULL,
  `type` enum('exempt','expedited') NOT NULL,
  `form_key` int(11) NOT NULL,
  `consent_key` int(11) NOT NULL,
  PRIMARY KEY (`pri_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `expedited`
--

CREATE TABLE IF NOT EXISTS `expedited` (
  `pri_key` int(11) NOT NULL,
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
  PRIMARY KEY (`pri_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expedited`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_1`
--

CREATE TABLE IF NOT EXISTS `expedited_1` (
  `pri_key` int(11) NOT NULL,
  `form_key` int(11) DEFAULT NULL,
  `rationale` blob,
  `methods` blob,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expedited_1`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_2`
--

CREATE TABLE IF NOT EXISTS `expedited_2` (
  `pri_key` int(11) NOT NULL,
  `form_key` int(11) DEFAULT NULL,
  `sex` enum('m','f','both') DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `max_age` int(11) DEFAULT NULL,
  `q1` tinyint(1) DEFAULT NULL,
  `q2` tinyint(1) DEFAULT NULL,
  `recruitment` blob,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expedited_2`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_3`
--

CREATE TABLE IF NOT EXISTS `expedited_3` (
  `pri_key` int(11) NOT NULL,
  `form_key` int(11) DEFAULT NULL,
  `oral` tinyint(1) DEFAULT NULL,
  `written` tinyint(1) DEFAULT NULL,
  `assent` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expedited_3`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_4`
--

CREATE TABLE IF NOT EXISTS `expedited_4` (
  `pri_key` int(11) NOT NULL,
  `form_key` int(11) DEFAULT NULL,
  `privacy` blob,
  `confidentiality` blob,
  `recorded` tinyint(1) DEFAULT NULL,
  `records` blob,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expedited_4`
--


-- --------------------------------------------------------

--
-- Table structure for table `expedited_5`
--

CREATE TABLE IF NOT EXISTS `expedited_5` (
  `pri_key` int(11) NOT NULL,
  `form_key` int(11) DEFAULT NULL,
  `risk` blob,
  `procedures` blob,
  `benefits` blob,
  `outweigh` blob,
  PRIMARY KEY (`pri_key`),
  UNIQUE KEY `form_key` (`form_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expedited_5`
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


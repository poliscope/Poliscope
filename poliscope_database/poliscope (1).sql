-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2017 at 11:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poliscope`
--

-- --------------------------------------------------------

--
-- Table structure for table `central`
--

CREATE TABLE IF NOT EXISTS `central` (
  `ccid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cstate` varchar(255) NOT NULL,
  PRIMARY KEY (`ccid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `central`
--

INSERT INTO `central` (`ccid`, `name`, `cstate`) VALUES
(1, 'Ahmednagar', 'Maharashtra'),
(2, 'Akola', 'Maharashtra'),
(3, 'Amravati', 'Maharashtra'),
(4, 'Aurangabad', 'Maharashtra'),
(5, 'Baramati', 'Maharashtra'),
(6, 'Beed', 'Maharashtra'),
(7, 'Bhandara-Gondiya', 'Maharashtra'),
(8, 'Bhiwandi', 'Maharashtra'),
(9, 'Buldhana', 'Maharashtra'),
(10, 'Chandrapur', 'Maharashtra'),
(11, 'Dhule', 'Maharashtra'),
(12, 'Dindori', 'Maharashtra'),
(13, 'Gadchiroli-Chimur', 'Maharashtra'),
(14, 'Hatkanangle', 'Maharashtra'),
(15, 'Hingoli', 'Maharashtra'),
(16, 'Jalgaon', 'Maharashtra'),
(17, 'Jalna', 'Maharashtra'),
(18, 'Kalyan', 'Maharashtra'),
(19, 'Kolhapur', 'Maharashtra'),
(20, 'Latur', 'Maharashtra'),
(21, 'Madha', 'Maharashtra'),
(22, 'Maval', 'Maharashtra'),
(23, 'Mumbai North', 'Maharashtra'),
(24, 'Mumbai North Central', 'Maharashtra'),
(25, 'Mumbai North East', 'Maharashtra'),
(26, 'Mumbai North West', 'Maharashtra'),
(27, 'Mumbai South', 'Maharashtra'),
(28, 'Mumbai South Central', 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `number` int(255) NOT NULL AUTO_INCREMENT,
  `post_id` int(250) NOT NULL,
  `des` varchar(500) DEFAULT NULL,
  `image` longblob,
  `poli_id` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `modified_time` time NOT NULL,
  `modified_date` int(11) NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `profile_pic` longblob,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

-- --------------------------------------------------------

--
-- Table structure for table `local`
--

CREATE TABLE IF NOT EXISTS `local` (
  `lcid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`lcid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(255) NOT NULL AUTO_INCREMENT,
  `des` varchar(500) DEFAULT NULL,
  `image` longblob NOT NULL,
  `poli_id` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `modified_time` time NOT NULL,
  `modified_date` date NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `support` int(255) NOT NULL DEFAULT '0',
  `oppose` int(255) NOT NULL DEFAULT '0',
  `neutral` int(255) NOT NULL DEFAULT '0',
  `speak` int(255) DEFAULT NULL,
  `const` varchar(10) NOT NULL,
  `area` varchar(20) DEFAULT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `profile_pic` longblob,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=185 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `politician_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `const_category` varchar(50) NOT NULL,
  `history` varchar(100) NOT NULL,
  `agenda` varchar(255) DEFAULT NULL,
  `aadhar_no` varchar(20) NOT NULL,
  `const` varchar(200) DEFAULT NULL,
  `interest1` varchar(200) NOT NULL,
  `interest2` varchar(200) NOT NULL,
  `interest3` varchar(200) NOT NULL,
  `interest4` varchar(200) NOT NULL,
  `interest5` varchar(50) DEFAULT NULL,
  `interest6` varchar(50) DEFAULT NULL,
  `interest7` varchar(50) DEFAULT NULL,
  `interest8` varchar(50) DEFAULT NULL,
  `cover` longblob NOT NULL,
  `aadhar_pic` longblob NOT NULL,
  PRIMARY KEY (`politician_id`),
  UNIQUE KEY `aadhar_no` (`aadhar_no`),
  UNIQUE KEY `aadhar_no_2` (`aadhar_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_sup`
--

CREATE TABLE IF NOT EXISTS `post_sup` (
  `post_id` int(255) NOT NULL,
  `poli_id` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `support` char(3) DEFAULT NULL,
  `oppose` char(3) DEFAULT NULL,
  `neutral` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `scid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`scid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`scid`, `name`, `state`) VALUES
(1, 'Achalpur', 'Maharashtra'),
(2, 'Aheri', 'Maharashtra'),
(3, 'Ahmadpur', 'Maharashtra'),
(4, 'Ahmednagar City', 'Maharashtra'),
(5, 'Airoli', 'Maharashtra'),
(6, 'Akkalkot', 'Maharashtra'),
(7, 'Akkalkuwa', 'Maharashtra'),
(8, 'Akola East', 'Maharashtra'),
(9, 'Akola West', 'Maharashtra'),
(10, 'Akole', 'Maharashtra'),
(11, 'Akot', 'Maharashtra'),
(12, 'Alibag', 'Maharashtra'),
(13, 'Amalner', 'Maharashtra'),
(14, 'Ambegaon', 'Maharashtra'),
(15, 'Ambernath', 'Maharashtra'),
(16, 'Amgaon', 'Maharashtra'),
(17, 'Amravati', 'Maharashtra'),
(18, 'Andheri East', 'Maharashtra'),
(19, 'Andheri West', 'Maharashtra'),
(20, 'Anushakti Nagar', 'Maharashtra'),
(21, 'Arjuni Morgaon', 'Maharashtra'),
(22, 'Armori', 'Maharashtra'),
(23, 'Arni', 'Maharashtra'),
(24, 'Arvi', 'Maharashtra'),
(25, 'Ashti', 'Maharashtra'),
(26, 'Aurangabad Central', 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `userid` int(255) NOT NULL,
  `supid` int(255) NOT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `state_con` varchar(100) DEFAULT NULL,
  `central` varchar(100) DEFAULT NULL,
  `interest1` varchar(50) DEFAULT NULL,
  `interest2` varchar(50) DEFAULT NULL,
  `interest3` varchar(50) DEFAULT NULL,
  `interest4` varchar(50) DEFAULT NULL,
  `interest5` varchar(50) DEFAULT NULL,
  `interest6` varchar(50) DEFAULT NULL,
  `interest7` varchar(50) DEFAULT NULL,
  `interest8` varchar(50) DEFAULT NULL,
  `profile` longblob NOT NULL,
  `profile_create` varchar(10) NOT NULL,
  `pol_create` varchar(10) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `verified` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

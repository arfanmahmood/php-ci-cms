-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2013 at 07:40 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sapphire`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_fabrics`
--

CREATE TABLE IF NOT EXISTS `cms_fabrics` (
  `fabric_id` int(11) NOT NULL AUTO_INCREMENT,
  `fabric_ref` varchar(100) NOT NULL,
  `fabric_article` varchar(150) NOT NULL,
  `fabric_weave` varchar(50) NOT NULL,
  `fabric_grm` varchar(50) NOT NULL,
  `fabric_blend` varchar(50) NOT NULL,
  `fabric_tensile` varchar(100) NOT NULL,
  `fabric_tear` varchar(100) NOT NULL,
  `fabric_type` varchar(150) NOT NULL,
  `fabric_category` varchar(150) NOT NULL,
  `fabric_small_pic` varchar(200) NOT NULL,
  `fabric_large_pic` varchar(200) NOT NULL,
  `fabric_feature` tinytext NOT NULL,
  `fabric_uses` tinytext NOT NULL,
  PRIMARY KEY (`fabric_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_fabrics`
--

INSERT INTO `cms_fabrics` (`fabric_id`, `fabric_ref`, `fabric_article`, `fabric_weave`, `fabric_grm`, `fabric_blend`, `fabric_tensile`, `fabric_tear`, `fabric_type`, `fabric_category`, `fabric_small_pic`, `fabric_large_pic`, `fabric_feature`, `fabric_uses`) VALUES
(1, 'W-2', 'Pride', '', '', '', '', '', 'Institutional', 'ToughCrusher', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_feature`
--

CREATE TABLE IF NOT EXISTS `cms_feature` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_name` varchar(250) NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cms_feature`
--

INSERT INTO `cms_feature` (`feature_id`, `feature_name`) VALUES
(1, 'Abrasion Resistant'),
(2, 'Cool Fragrance Finish'),
(3, 'Tough Stretch'),
(4, 'Easy Care'),
(5, 'Crease Retention'),
(6, 'Breathable'),
(7, 'Soft Touch'),
(8, 'Sweat Terminator'),
(9, 'Water & Oil Defender'),
(10, 'HT Washing'),
(11, 'Machine Washable'),
(12, 'Flame Retardant');

-- --------------------------------------------------------

--
-- Table structure for table `cms_sessions`
--

CREATE TABLE IF NOT EXISTS `cms_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_sessions`
--

INSERT INTO `cms_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('768182aa4d2d05ec3db67bab670ab76a', '192.168.0.126', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', 1366117098, 'a:3:{s:9:"user_data";s:0:"";s:8:"userName";s:5:"admin";s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE IF NOT EXISTS `cms_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_status`, `user_joining_date`) VALUES
(1, 'admin', 'admin', 'admin@sapphiremills.com', 1, '2013-03-22 11:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `cms_uses`
--

CREATE TABLE IF NOT EXISTS `cms_uses` (
  `uses_id` int(11) NOT NULL AUTO_INCREMENT,
  `uses_name` varchar(250) NOT NULL,
  PRIMARY KEY (`uses_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cms_uses`
--

INSERT INTO `cms_uses` (`uses_id`, `uses_name`) VALUES
(2, 'Oil Gaurd'),
(3, 'Chef'),
(4, 'Nurses'),
(5, 'Workshop Staff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

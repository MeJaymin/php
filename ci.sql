-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2018 at 06:49 PM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 5.6.33-3+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1:Active, 0:Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `created`, `modified`, `status`) VALUES
(1, 0, 'Electronics', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(2, 1, 'Mobilephones', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(3, 2, 'SmartPhones', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(4, 3, 'Android', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(5, 0, 'Clothings', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(6, 5, 'Mens Clothings', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(7, 5, 'Womens Clothings', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(8, 2, 'Keypad Phones', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(9, 8, 'Keypad Phones 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `demo_salary`
--

CREATE TABLE IF NOT EXISTS `demo_salary` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `salary` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `demo_salary`
--

INSERT INTO `demo_salary` (`id`, `fname`, `salary`) VALUES
(1, 'priyank', 500),
(2, 'himani', 400),
(3, 'jaymin', 300),
(4, 'nikhil', 200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `gender`, `education`, `address`, `profile_picture`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Jaymin Sejpal', 'admin@super.com', '46c17fb99b9c8c8ae8214834e1edf6b1', '1', 'B.Tech', '123123ads', 'dog1.jpg', 1, NULL, '0000-00-00 00:00:00'),
(3, 'Jaymin Sejpal', 'admin1@super.com', '46c17fb99b9c8c8ae8214834e1edf6b1', '1', 'B.Tech,MCA', '123123ads', '', 1, NULL, '2018-05-29 13:05:53'),
(4, 'Jaymin Sejpal1', 'a@a.in', 'd41d8cd98f00b204e9800998ecf8427e', '1', 'B.Tech', '123123adsddfsdfsfsdfs', 'Quotefancy-6361040-3840x2160.jpg', 1, NULL, '2018-05-29 13:08:22'),
(5, 'Jaymin Sejpal', 'admin1@super.com', '46c17fb99b9c8c8ae8214834e1edf6b1', '1', 'B.Tech,MCA', '123123ads', 'dog1.jpg', 1, NULL, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

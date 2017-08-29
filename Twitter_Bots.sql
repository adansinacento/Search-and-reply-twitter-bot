-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Server: localhost
-- Gen Time: 28-08-2017 at 17:39:51
-- Server version: 5.6.32-78.1
-- PHP version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Structure for the table `Twitter_Bots`
--

CREATE TABLE IF NOT EXISTS `Twitter_Bots` (
  `bot_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_id` text COLLATE utf8_unicode_ci NOT NULL,
  `last_uptade` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for the table `Twitter_Bots`
--
ALTER TABLE `Twitter_Bots`
  ADD PRIMARY KEY (`bot`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

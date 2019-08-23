-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 02:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_event`
--

CREATE TABLE `wp_event` (
  `kdevent` varchar(12) NOT NULL,
  `title_event` varchar(50) NOT NULL,
  `url_event` text NOT NULL,
  `group_event` int(5) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_event`
--

INSERT INTO `wp_event` (`kdevent`, `title_event`, `url_event`, `group_event`, `start_event`, `end_event`) VALUES
('123', 'Libur Isra Miraj', '', 0, '2019-04-03 00:00:00', '2019-04-03 23:59:59'),
('124', 'Game Of Thrones : End Game', '', 0, '2019-04-14 00:00:00', '2019-04-14 00:00:00'),
('125', 'Pilpres 2019', '', 0, '2019-04-17 00:00:00', '2019-04-17 23:59:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_event`
--
ALTER TABLE `wp_event`
  ADD PRIMARY KEY (`kdevent`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

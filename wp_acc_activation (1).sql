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
-- Table structure for table `wp_acc_activation`
--

CREATE TABLE `wp_acc_activation` (
  `no_acc_activation` int(11) NOT NULL,
  `kdmember` varchar(12) NOT NULL,
  `activation_code` varchar(100) NOT NULL,
  `activation_date` datetime NOT NULL,
  `exp_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_acc_activation`
--

INSERT INTO `wp_acc_activation` (`no_acc_activation`, `kdmember`, `activation_code`, `activation_date`, `exp_date`) VALUES
(2, '4410319002', 'aap4vrlipa0ek3g8au65p02cl0', '2019-03-22 13:17:48', '2019-03-23 13:17:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_acc_activation`
--
ALTER TABLE `wp_acc_activation`
  ADD PRIMARY KEY (`no_acc_activation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_acc_activation`
--
ALTER TABLE `wp_acc_activation`
  MODIFY `no_acc_activation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 06:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptestdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `user_name`, `hash`) VALUES
(1, 'admin', '$2y$10$7so4nvd77LQq1Yy.W2//CumYWjx0VR.vtdt7mF2DcUo//H2kmrCti');

-- --------------------------------------------------------

--
-- Table structure for table `clothing`
--

CREATE TABLE `clothing` (
  `id` int(25) NOT NULL,
  `site` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `price` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothing`
--

INSERT INTO `clothing` (`id`, `site`, `category`, `item`, `price`) VALUES
(1, 'J&J Clothing', 'Shoes', 'black shoe', '99.99'),
(2, 'J&J Clothing', 'shirts', 'polo shirt', '23.99'),
(4, 'J&J Clothing', 'Shoes', 'Echo shoe', '199.99'),
(5, 'J&J Clothing', 'shirts', 'dress shirt', '49.50'),
(8, 'J&J Clothing', 'Scarves', 'silk scarf', '56'),
(10, 'J&J Clothing', 'Shoes', 'purple shoe', '38'),
(13, 'J&J Clothing', 'Shoes', 'purple shoes', '78'),
(16, 'J&J Clothing', 'Scarves', 'wool scarve', '25.99');

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `id` int(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`id`, `site`, `category`, `item`, `price`) VALUES
(2, 'J&J Electronics', 'Voice recorders', 'olympus ws-853', 80),
(13, 'J&J Electronics', 'Cameras', 'best camera', 457),
(25, 'J&J Electronics', 'Voice recorders', 'top vrecorder', 123),
(28, 'J&J Electronics', 'Wireless', 'wireless printer', 309),
(29, 'J&J Electronics', 'Wireless', 'wireless modem', 459),
(30, 'J&J Electronics', 'Cameras', 'great camera', 345.9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothing`
--
ALTER TABLE `clothing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clothing`
--
ALTER TABLE `clothing`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

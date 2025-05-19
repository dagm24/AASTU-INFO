-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 11:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aastuinfoadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `image` blob DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `telegram` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `role`, `image`, `linkedin`, `telegram`) VALUES
(9, 'Solomon Tarekegne', 'President', 0x736f6c6f6d6f6e2e706e67, 'https://www.linkedin.com/in/solomon-tarekegne', 'https://t.me/solomon_t'),
(10, 'Kidus Haymanot', 'Vice President', 0x6b696475732e706e67, 'https://www.linkedin.com/in/kidus-haymanot', 'https://t.me/kidus_h'),
(11, 'Nathan Amsalu', 'Academics', 0x6e617468616e2e706e67, 'https://www.linkedin.com/in/nathan-amsalu', 'https://t.me/nathan_a'),
(12, 'Habtamu Kebede', 'Discipline', 0x68616274616d752e706e67, 'https://www.linkedin.com/in/habtamu-kebede', 'https://t.me/habtamu_k'),
(13, 'Gutu Shigutie', 'Health', 0x677574752e706e67, 'https://www.linkedin.com/in/gutu-shigutie', 'https://t.me/gutu_s'),
(14, 'Dagmawit Hintsa', 'Women', 0x6461676d617769742e706e67, 'https://www.linkedin.com/in/dagmawit-hintsa', 'https://t.me/dagmawit_h'),
(15, 'Kidus Goshu', 'Student Cafeteria', 0x6b6964757320676f7368752e706e67, 'https://www.linkedin.com/in/Kidus-Goshu', 'https://t.me/kidus_g'),
(16, 'H. Mikael Getachew', 'General Service', 0x6861696c656d696b6165616c2e706e67, 'https://www.linkedin.com/in/hmikael-getachew', 'https://t.me/hmikael_g');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

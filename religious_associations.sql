-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 01:30 PM
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
-- Table structure for table `religious_associations`
--

CREATE TABLE `religious_associations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `telegram_link` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `religious_associations`
--

INSERT INTO `religious_associations` (`id`, `name`, `description`, `telegram_link`, `image_url`) VALUES
(1, 'Ethiopian Orthodox Tewahedo Church Saints Community Management', 'AASTU Gibi Gubae', 'https://t.me/gibigubae', '../assets/images/Placeholder Image3.png'),
(2, 'Protestant Fellowship', 'Fellowship', '#', '../assets/images/Placeholder Image4.png'),
(3, 'Muslim Students Community', 'AASTU Muslims Gema', '#', '../assets/images/Placeholder Image5.png'),
(4, 'Ethiopian Catholic Church', 'Catholic', '#', '../assets/images/Placeholder Image6.png'),
(5, 'Ethiopian Apostolic Church', 'Hawariyat Church', '#', '../assets/images/Placeholder Image7.png'),
(6, 'A Fellowship Channel Providing Services in Oromiffa', 'AASTU FOCUS', '#', '../assets/images/Placeholder Image8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `religious_associations`
--
ALTER TABLE `religious_associations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `religious_associations`
--
ALTER TABLE `religious_associations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

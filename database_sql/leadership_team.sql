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
-- Table structure for table `leadership_team`
--

CREATE TABLE `leadership_team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leadership_team`
--

INSERT INTO `leadership_team` (`id`, `name`, `role`, `email`, `image`) VALUES
(3, 'Dereje Engida Woldemichael (PhD)', 'President', 'dereje.engida@aastu.edu.et', 0x6465726a652e706e67),
(6, 'Kemal Ibrahim', 'Vice-President Of Academic Affairs', 'kemal.ibrahim@aastu.edu.et', 0x6b616d616c2e706e67),
(7, 'Betelhem Lakew Mamo', 'Collage of Natural and Applied Science', 'betelhem.lakew@aastu.edu.et', 0x626574656c2e6a7067),
(8, 'Bonsa Reta Mosisa', 'Mechanical Engineering', 'bonsa.reta@aastu.edu.et', 0x626f6e73612e6a706567),
(9, 'Chere Lemma Urgaya', 'Software Engineering', 'chere.lemma@aastu.edu.et', 0x4368657265322e706e67),
(10, 'Biniam Atnafe Beyene', 'Job title', 'biniam.atnafe@aastu.edu.et', 0x42494e492050484f544f2e6a7067),
(11, 'Hussien Seid Worku', 'Software Engineering', 'hussien.seid@aastu.edu.et', 0x6875737369656e2e706e67),
(12, 'Zemenu Yaregal Belete (PhD)', 'Collage of Natural and Applied Science', 'zemenu.yaregal@aastu.edu.et', 0x7a656d656e752e6a7067),
(13, 'Asaminew Gizaw Egu', 'Electrical and Computer Engineering', 'asamnew.gizaw@aastu.edu.et', 0x617373616d696e65772e6a7067),
(14, 'Dagmawie Tesfaye Mengistu', 'Social Sciences Division', 'dagmawie.tesfaye@aastu.edu.et', 0x4461676d617769652e6a7067),
(15, 'Dr. Aman Kassaye Sibhatu', 'Chemical Engineering', 'aman.kasye@aastu.edu.et', 0x6472416d616e2e6a7067),
(16, 'Gamachis Korsa Jabicho', 'Biotechnology', 'gamachis.korsa@aastu.edu.et', 0x67616d61636869732e6a7067),
(17, 'Gebrehiwot Gebreslassie Beyene', 'Collage of Natural and Applied Science', 'gebrehiwot.gebreslassie@aastu.edu.et', 0x47656272656869776f742e6a7067),
(18, 'Semir Ibrahim Alemu', 'College of Social Science and Humanities', 'semir.ibrahim@aastu.edu.et', 0x73656d69722e6a7067),
(19, 'Seyoum Getachew Nigussie', 'Electromechanical Engineering', 'seyoum.getachew@aastu.edu.et', 0x7365796f756d2e6a7067),
(20, 'Tefera Bahiru Ambo', 'Civil Engineering', 'tefera.bahiru@aastu.edu.et', 0x7465666572612e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leadership_team`
--
ALTER TABLE `leadership_team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leadership_team`
--
ALTER TABLE `leadership_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

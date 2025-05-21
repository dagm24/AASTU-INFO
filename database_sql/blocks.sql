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
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `block_number` varchar(255) DEFAULT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `block_number`, `summary`, `description`) VALUES
(3, 'College of Civil and Architectural Engineering', '63', 'Learn more about the programs offered in civil and architectural engineering.', 'This college, located in Block 63, includes departments focused on civil and architectural disciplines.'),
(4, 'College of Electrical and Mechanical Engineering', '64', 'Explore the various programs and opportunities in electrical and mechanical engineering.', 'Situated in Block 64, this college encompasses the Departments of Electrical Engineering, Mechanical Engineering, and Software Engineering.'),
(5, 'College of Environmental and Chemical Engineering', '72', 'Discover the programs available in environmental and chemical engineering.', 'Located in Block 72, this college includes both the Department of Environmental Engineering and the Department of Chemical Engineering.'),
(6, 'College of Applied Sciences', '71', 'Learn about the diverse programs offered in applied sciences.', 'Block 71 houses the Departments of Food and Nutrition, Biotechnology, Industrial Engineering, and Geology.'),
(7, 'Clinic', '13', 'clinic offers a range of health services to students, including medical consultations, mental health support, and wellness programs designed to promote overall health and well-being.', 'clinic offers a range of health services to students, including medical consultations, mental health support, and wellness programs designed to promote overall health and well-being.'),
(8, 'Female Students\' Dormitories', '2', 'Learn about our dormitory facilities and living arrangements.', 'Blocks 2, 4, 5, 6, and 8 are designated for female students, offering a safe and supportive community. These blocks are equipped with essential amenities to ensure a comfortable living experience. Block 3 is specifically reserved for female fast-track postgraduate students, providing an environment tailored to the needs of advanced learners who require focused study spaces.'),
(9, 'Male Students\' Dormitories', '7', 'Learn about our dormitory facilities and living arrangements.', 'Blocks 7, 9, 10, 11, 12, 13, 16, 17, 25, and 28 are allocated for male students, ensuring they have access to comfortable and suitable living arrangements'),
(10, 'Engineering Library', '101', 'Discover the resources available at our library.', 'The Engineering Library features an open and flexible environment with free spaces and tension boxes where students can sit anywhere and work on their own laptops. Students have the option to borrow books, but access to resources requires presenting their student ID at the entrance. This library is designed to foster collaboration and study, providing a welcoming atmosphere for engineering students'),
(11, 'Digital Library', '101', 'Discover the resources available at our library.', 'The Digital Library offers a range of computers for students who need access to digital resources. Upon entering, there is a designated partition on the right side specifically for female students, ensuring a comfortable space for them to use the computers. The remaining area is accessible to all students for book borrowing, while the first floor contains additional computers and tension boxes exclusively for male students. This layout promotes a balanced study environment for all users.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

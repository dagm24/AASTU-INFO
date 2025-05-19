-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 11:11 AM
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
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `title`, `summary`, `details`) VALUES
(5, 'Academics', 'A section to monitor and resolve educational issues.', 'It is a section that monitors and controls education-related issues such as when students have a disagreement with a teacher, if there is correction and the instructors don\'t correct it, if they don\'t show mid-term and final results, if the library opens and closes at what time, etc...'),
(6, 'Health', 'A section that provides essential health services for students.', 'It ensures that any student can get the necessary services in case of health problems. For example: - Ambulance service, to get proper examination and medicine, and besides the food department, there is a section that controls whether the food served to the student is good or not.'),
(7, 'Discipline', 'A crucial section focused on maintaining campus peace and security.', 'It is the most important part and it\'s main responsibility to respect the peace and quiet of the campus and to ensure that students learn properly without any security problems and to protect their peace.'),
(8, 'Women', 'A section dedicated to empowering women in science and technology.', 'Everything related to women is monitored. This means that women can play a role in science and technology by using their potential. It is also a department that helps women to develop their potential by organizing various events in collaboration with the Women\'s and Social Bureau...'),
(9, 'Student Cafeteria', 'A section dedicated to ensuring food quality and hygiene.', 'Maintains the quality of the food, the washing of eating utensils in relation to hygiene, whether the taste of food is correct or not, and whether it is suitable for health.'),
(10, 'General Service', 'A section responsible for overseeing campus services.', 'It controls the total services in campus. For example: monitoring things like dorm proctors, water, electricity, shops without any reasonable increase in prices, and controlling whether the quality and price of food in houses where students pay to eat is suitable for students.'),
(11, 'Charity', 'A section to Help people in the university with money or goods', 'Helping people in the university with money or goods. The help can be obtained from a sponsor if there is a sponsor or by collecting from students. It also includes collecting clothes, shoes, books or various materials from students and giving them to various charitable institutions.'),
(12, 'Clubs', 'A section oversees all university clubs', 'All the clubs in university are responsible to this department. This means that a proposal to establish a club or association is prepared and submitted to this section. Then if the club is required the proposal will be sent and approved by student affairs dean.'),
(13, 'Promotion', 'A crucial section serves as a bridge between the Union and the students', 'It serves as a bridge between the Union and the students. It informs when there is new information. For example: - Notifying the opinions of students, deans and parents on the admission of fresh students. It also receives information by posting on the Student Union channel.'),
(14, 'Finance', 'A section controlling expenses, making sure that the union gets different sources of income', 'Managing the union\'s budget and expenses while ensuring diverse income sources, such as fundraising, sponsorships, and grants, to maintain financial stability and support various activities.'),
(15, 'President\'s office', 'A section superintendent of the 12 rooms', 'The superintendent oversees the management and maintenance of 12 sections, ensuring they are well-maintained, properly utilized, and meet the needs of their occupants.'),
(16, 'Parliamentary Affairs Office', 'Assembly of Parliament', 'Involves overseeing the operations and maintenance of the assembly chamber, ensuring it is prepared for meetings, equipped with necessary technology, and that all logistical arrangements are in place for smooth parliamentary sessions.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

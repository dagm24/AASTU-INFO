-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 11:08 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Dagi', '$2y$10$zHbKL4NuPnfs8zC39/ebfO4ylIhprOETRe/5evi1DdpfSvxJLI6ci');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `E-mail` varchar(255) NOT NULL,
  `inquiry` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `E-mail`, `inquiry`, `user_id`) VALUES
('Dagmawit', 'dagmawit.yoseph@a2sv.org', 'hi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leadership_team`
--
ALTER TABLE `leadership_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leadership_team`
--
ALTER TABLE `leadership_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

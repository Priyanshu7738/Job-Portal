-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 05:44 AM
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
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cover_letter` text DEFAULT NULL,
  `linkedin_profile` varchar(255) DEFAULT NULL,
  `resume` varchar(255) NOT NULL,
  `status` enum('Recieved','Reviewed','Interview Scheduled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `full_name`, `email`, `cover_letter`, `linkedin_profile`, `resume`, `status`) VALUES
(11, 9, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'kbqowdbqlwkdbqwn.,d', 'https://in.linkedin.com/', 'uploads/resumes/neeraj add.pdf', 'Interview Scheduled'),
(12, 9, 'Priyanshu Chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'kbqowdbqlwkdbqwn.,d', 'https://in.linkedin.com/', 'uploads/resumes/neeraj add.pdf', 'Recieved'),
(13, 10, 'Priyanshu Chaturvedi', 'microsoft@gmail.com', 'xhgxkghhktgjc', 'https://in.linkedin.com/', 'uploads/resumes/neeraj add.pdf', 'Recieved'),
(14, 10, 'sanjay Chaturvedi', 'admin@admin.com', 'jsbcljbasc', 'https://in.linkedin.com/', 'uploads/neeraj.pdf', 'Recieved'),
(15, 9, 'Priyanshu Chaturvedi', 'neeraj74@gmail.com', 'sdgsgli', 'https://in.linkedin.com/', 'uploads/adh.pdf', 'Recieved'),
(16, 10, 'Shivani', 'shivanichaturvedi74@gmail.com', 'bnzlfnbzld', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Reviewed'),
(17, 11, 'Swati Chaturvedi', 'swati@gmail.com', 'cbfgxnfxgnx', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1 new.pdf', 'Reviewed'),
(18, 12, 'ankit', 'ankit@gmail.com', 'zbfgnx ', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(19, 13, 'swapnil', 'swapnil@gmail.com', 'fgnfgnxfn', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(20, 13, 'swapnil', 'swapnil@gmail.com', 'fgnfgnxfn', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(21, 12, 'anju', 'anju@gmail.com', 'dfbdsbsb', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Recieved'),
(22, 13, 'rajdoba', 'raj@gmail.com', 'dfbkldsbglk', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(23, 13, 'rajdoba', 'raj@gmail.com', 'dfbkldsbglk', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(24, 12, 'Raj Chaturvedi', 'raj@gmail.com', 'dfbgfsgnsfgn', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Recieved'),
(25, 12, 'Raj Chaturvedi', 'raj@gmail.com', 'dfbgfsgnsfgn', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Recieved'),
(26, 10, 'kunal', 'kunal@gmail.com', 'xlkbmdglbk', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(27, 10, 'kunal', 'kunal@gmail.com', 'xlkbmdglbk', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(28, 10, 'kunal', 'kunal@gmail.com', 'xlkbmdglbk', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(29, 10, 'kunal', 'kunal@gmail.com', 'xlkbmdglbk', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(30, 10, 'kunal', 'kunal@gmail.com', 'xlkbmdglbk', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(31, 10, 'Neeraj Chaturvedi', 'neeraj@gmal.com', 'sdmams/lfvkm', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(32, 10, 'Neeraj Chaturvedi', 'neeraj@gmal.com', 'sdmams/lfvkm', 'https://in.linkedin.com/', 'uploads/resumes/Final Resume1.pdf', 'Recieved'),
(33, 10, 'sfgvasfv', 'a@gmail.com', 'dfkbmdflbk', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Recieved'),
(34, 11, 'Neeraj Chaturvedi', 'neeraj1@gmail.com', 'dvsdvsadv', '', 'uploads/Final Resume1.pdf', 'Recieved'),
(35, 11, 'Neeraj Chaturvedi', 'neeraj1@gmail.com', 'dvsdvsadv', '', 'uploads/neeraj add.pdf', 'Recieved'),
(36, 11, 'Priyanshu chaturvedi', 'priyanshuchaturvedi74@gmail.com', 'sjbdvjs', '', 'uploads/Final Resume1.pdf', 'Recieved'),
(37, 11, 'manav', 'a7738535046@gmail.com', 'kdgmsltdkhmrs', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Interview Scheduled'),
(38, 11, 'svdadsv', 'ddsd@gmail.com', 'clbsfkmbgl', 'https://in.linkedin.com/', 'uploads/Final Resume1.pdf', 'Interview Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `Id` int(22) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone no` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `Marks` varchar(255) NOT NULL,
  `Experience` varchar(255) NOT NULL,
  `Skill` varchar(255) NOT NULL,
  `Linkedin` varchar(255) NOT NULL,
  `Protfolio` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`Id`, `Name`, `DOB`, `Email`, `Phone no`, `Address`, `Education`, `Marks`, `Experience`, `Skill`, `Linkedin`, `Protfolio`, `Password`) VALUES
(8, 'Priyanshu Chaturvedi', '2000-02-01', 'priyanshuchaturvedi74@gmail.com', '7738464644646', 'Opposite Mayura Hotel Near Sangam Medical Achole Road\r\n204 Medha Apt', '', '8255', '', 'html, css, javascript, php, my sql', 'https://in.linkedin.com/', 'https://.protfolio.com', 'xxxxxxx'),
(11, '', '', 'admin@admin.com', '', '', '', '', '', '', '', '', 'admin123'),
(12, 'Priyanshu Chaturvedi', '2000-02-01', 'priyanshuchaturvedi74@gmail.com', '651654654654', '', '', '9.5', '', '', 'https://in.linkedin.com/', 'https://.protfolio.com', 'xxxxxx'),
(13, 'Neeraj Chaturvedi', '2001-02-01', 'neerajchaturvedi74@gmail.com', '554651651', 'Opposite Mayura Hotel Near Sangam Medical Achole Road\r\n204 Medha Apt', '', '500', '', 'Latrin saf karna', 'https://in.linkedin.com/', 'https://.protfolio.com', 'zxczxcc'),
(14, 'shivani chaturvedi', '2000-02-01', 'shivanichaturvedi74@gmail.com', '7738535046', 'Opposite Mayura Hotel Near Sangam Medical Achole Road\r\n204 Medha Apt', 'graduation', '7.92', '1', 'dfbzdfbzfbzd', 'https://in.linkedin.com/', 'https://.protfolio.com', 'cccvvv'),
(15, 'Pooja Srichandan', '2007-03-22', 'poojasrichandan72@gmail.com', '9938295879', 'Opposite Mayura Hotel Near Sangam Medical Achole Road204 Medha Apt', '', '9.5', '', 'Goverment Hindi Teacher', 'https://in.linkedin.com/', 'https://.protfolio.com', 'pooja21');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Id` int(22) NOT NULL,
  `Company Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Bussiness Type` varchar(100) NOT NULL,
  `Bussiness Activity` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Owner` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Id`, `Company Name`, `Email`, `Bussiness Type`, `Bussiness Activity`, `Address`, `Owner`, `Password`) VALUES
(1, 'TATA', 'tata@gmail.com', 'privateLimited', 'Making Different types of vehicals', 'Opposite Mayura Hotel Near Sangam Medical Achole Road\r\n204 Medha Apt', 'Ratan Tata', 'ratan@21'),
(2, 'TATA', 'tata@gmail.com', 'privateLimited', 'xcfbfgnxgn', 'Opposite Mayura Hotel Near Sangam Medical Achole Road\r\n204 Medha Apt', 'Ratan Tata', 'xxxxxx'),
(3, '', 'microsoft@gmail.com', '', '', 'dkfvmdfbkizdboidjb', 'Priyanshu', 'zxczxc'),
(4, '', 'admin@admin.com', '', '', 'zd;lvaemfbk', 'GDP', 'zxczxc'),
(5, 'microsoft', 'priyanshuchaturvedi74@gmail.com', 'privateLimited', 'ajbscjabslck.naslcma,c', 'sjcjbajsbclin;', 'Priyanshu', '12345'),
(6, '', 'bbc@gmail.com', '', '', 'Opposite Mayura Hotel Near Sangam Medical Achole Road\r\n204 Medha Apt', 'BBC', 'bbcbbc');

-- --------------------------------------------------------

--
-- Table structure for table `job_listings`
--

CREATE TABLE `job_listings` (
  `id` int(22) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_type` enum('Full Time','Part Time','Contract') NOT NULL,
  `location` varchar(100) NOT NULL,
  `salary_range` int(22) NOT NULL,
  `application_deadline` date NOT NULL,
  `company_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_listings`
--

INSERT INTO `job_listings` (`id`, `job_title`, `company_name`, `email`, `job_description`, `job_type`, `location`, `salary_range`, `application_deadline`, `company_logo`) VALUES
(9, 'Print Engenieer', 'MCTS', 'mctc@gmail.com', 'ldfkbpdfobk', 'Full Time', 'Mumbai', 45000, '2000-10-10', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg'),
(10, 'Train Engineer', 'MicroSoft', 'priyanshuchaturvedi74@gmail.com', 'adbwfoiqhewinlaksnc', 'Full Time', 'Dubai', 10000000, '1947-03-01', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg'),
(11, 'Technical Engnieer2', 'TTTT', 'tt@gmail.com', 'xkfbmdflbkn', 'Contract', 'Kerla', 35000, '2025-02-01', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg'),
(12, 'Engine Engeenier', 'IRCTC', 'irctc@gmail.com', 'kxfbvldnbldkb', 'Full Time', 'Mumbai', 45000, '2025-02-01', 'uploads/12.png'),
(13, 'Plastic Engeenier', 'PLS', 'pls@gmail.com', 'ckvmbxlkm', 'Full Time', 'Dubai', 34000, '2025-02-09', 'uploads/12.png'),
(14, 'Hardware Engineer', 'HDC', 'hdc@gmail.com', 'dflndfbn', 'Full Time', 'Pune', 30000, '2025-03-01', 'uploads/2.png'),
(15, 'car Engineer', 'Sony', 'neeraj1@gmail.com', 'ckhckh', 'Full Time', 'Dubai', 10000000, '1997-07-07', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg'),
(16, 'car Engineer', 'Sony', 'neeraj1@gmail.com', 'advsvsfvsdvdc', 'Full Time', 'Dubai', 10000000, '1999-09-09', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg'),
(17, 'civil Engenieer', 'BMC', 'bmc@gmail.com', 'lb,sf;nglmngk;m', 'Part Time', 'kerla', 20000, '2222-02-01', 'uploads/flower-garden-blue-sky-hokkaido-japan-60628.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(22) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role ENUM` enum('job_seeker','employer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `Id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_listings`
--
ALTER TABLE `job_listings`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

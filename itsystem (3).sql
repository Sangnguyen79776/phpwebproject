-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 08:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc`
--

CREATE TABLE `acc` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc`
--

INSERT INTO `acc` (`id`, `username`, `password`, `role`, `email`, `department`) VALUES
(1, 'user1', 'usern1', 'staff', 'user@gmail.com', 'IT'),
(2, 'phuong', 'admin1', 'admin', 'admin@gmail.com\r\n', 'NULL'),
(3, 'hung', 'hung1', 'QAmanager', 'QAmanager@gmail.com', 'NULL'),
(4, 'quang', 'quang1', 'QAcoordinator', 'quang@gmail.com', 'Teacher'),
(7, 'sangnm', '977a3a0d14610aed8cf73340c35ee0ae', 'QAmanager', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `idea_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'teaching', 'Under general supervision, develops curricula and creates, implements, and delivers educational programs for student audiences to achieve the goals and objectives of a contract or grant-funded program. Advises, tests, and teaches students in a variety of '),
(2, 'facilities', 'an ability to do or learn something well and easily; a natural aptitude');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `feedback_info` varchar(255) NOT NULL,
  `accu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `feedback_info`, `accu_id`) VALUES
(14, 'sdasd', 1),
(15, 'its good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_data`
--

CREATE TABLE `dashboard_data` (
  `id` int(11) NOT NULL,
  `label` varchar(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dashboard_data`
--

INSERT INTO `dashboard_data` (`id`, `label`, `value`) VALUES
(1, 'ideas', 2),
(2, 'categories', 2),
(3, 'ideas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'IT'),
(2, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `explanation` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `ie_id` int(11) DEFAULT NULL,
  `hastags` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `attachment_name` varchar(255) NOT NULL,
  `orderdate` date DEFAULT NULL,
  `ideasdepartment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `title`, `explanation`, `category_id`, `ie_id`, `hastags`, `file_path`, `attachment_name`, `orderdate`, `ideasdepartment`) VALUES
(2, 'Mental wellbeing of employee ', 'it’s another improvements to make it a workplace priority. Quiet rooms, yoga studios, nap areas, and therapeutic services emphasize self-care. Employees who feel welcome, accepted, and cared for develop an appreciation for their workplace and a bond with their peers and employer', 2, 1, '#it', '', 'idea1', '2023-11-01', 2),
(65, 'dasdadasdad', 'dasd', 1, 1, '', '', '', '2023-10-31', 1),
(93, 'vxvxv', 'dsvcv', 1, NULL, '', 'uploads/co-so-du-lieu_le-thi-bao-thu_lab-5_solution - [cuuduongthancong.com].pdf', '', '2023-10-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ideasevent`
--

CREATE TABLE `ideasevent` (
  `id` int(11) NOT NULL,
  `ename` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `idease_id` int(11) DEFAULT NULL,
  `firstdeadline` date DEFAULT NULL,
  `seconddeadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ideasevent`
--

INSERT INTO `ideasevent` (`id`, `ename`, `deadline`, `idease_id`, `firstdeadline`, `seconddeadline`) VALUES
(1, 'absolute planning', '2023-11-22', 2, '2023-11-21', '2023-11-25'),
(5, 'Nguyen Quan', '2023-11-04', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ideasubmission`
--

CREATE TABLE `ideasubmission` (
  `contributor_name` varchar(255) NOT NULL,
  `ideacontent` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'staff',
  `department` varchar(255) NOT NULL DEFAULT 'IT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes_dislikes`
--

CREATE TABLE `likes_dislikes` (
  `id` int(11) NOT NULL,
  `idea_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `like_status` enum('like','dislike') DEFAULT NULL,
  `like_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes_dislikes`
--

INSERT INTO `likes_dislikes` (`id`, `idea_id`, `user_id`, `like_status`, `like_count`) VALUES
(1, 1, 1, 'like', 0),
(2, 2, 2, 'like', 0),
(3, 2, 1, 'like', 0),
(4, 1, 1, 'like', 0),
(5, 1, 1, 'like', 0),
(6, 1, 1, 'like', 0),
(7, 1, 1, 'like', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `department`) VALUES
(1, 'Nguyen Thi Phuong', 'admin@gmail.com', 'IT'),
(2, 'Nguyen Trung Kien', 'kien@gmail.com', 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_id` (`idea_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accu_id` (`accu_id`);

--
-- Indexes for table `dashboard_data`
--
ALTER TABLE `dashboard_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `ie_id` (`ie_id`),
  ADD KEY `ideasdepartment` (`ideasdepartment`);

--
-- Indexes for table `ideasevent`
--
ALTER TABLE `ideasevent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idease_id` (`idease_id`);

--
-- Indexes for table `likes_dislikes`
--
ALTER TABLE `likes_dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc`
--
ALTER TABLE `acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `dashboard_data`
--
ALTER TABLE `dashboard_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `ideasevent`
--
ALTER TABLE `ideasevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes_dislikes`
--
ALTER TABLE `likes_dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`accu_id`) REFERENCES `acc` (`id`);

--
-- Constraints for table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `ideas_ibfk_2` FOREIGN KEY (`ie_id`) REFERENCES `ideasevent` (`id`),
  ADD CONSTRAINT `ideas_ibfk_3` FOREIGN KEY (`ideasdepartment`) REFERENCES `department` (`id`);

--
-- Constraints for table `ideasevent`
--
ALTER TABLE `ideasevent`
  ADD CONSTRAINT `ideasevent_ibfk_1` FOREIGN KEY (`idease_id`) REFERENCES `ideas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

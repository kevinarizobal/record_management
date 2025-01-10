-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2025 at 03:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `type` enum('file','folder') NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `type`, `parent_id`, `created_at`, `modified_at`) VALUES
(1, 'Billing Statement', 'uploads/1/Billing Statement', 'folder', 1, '2025-01-07 10:35:21', '2025-01-07 10:35:21'),
(2, 'Certificate of Completion', 'uploads/2/Certificate of Completion', 'folder', 2, '2025-01-07 10:35:25', '2025-01-07 10:35:25'),
(3, 'Certificate of Payment', 'uploads/3/Certificate of Payment', 'folder', 3, '2025-01-07 10:35:47', '2025-01-07 10:35:47'),
(4, 'bee5557d-22a3-480a-907f-074c7920f410.png', 'uploads/bee5557d-22a3-480a-907f-074c7920f410.png', 'file', 1, '2025-01-07 11:21:29', '2025-01-07 11:21:29'),
(5, 'form_template__3_.csv', 'uploads/form_template__3_.csv', 'file', 1, '2025-01-07 11:22:46', '2025-01-07 11:22:46'),
(6, 'Affidavit of Undertaking', 'uploads/6/Affidavit of Undertaking', 'folder', 6, '2025-01-10 02:09:44', '2025-01-10 02:09:44'),
(7, 'Certification of Recognition', 'uploads/7/Certification of Recognition', 'folder', 7, '2025-01-10 02:10:13', '2025-01-10 02:10:13'),
(8, 'Employment Report', 'uploads/8/Employment Report', 'folder', 8, '2025-01-10 02:10:26', '2025-01-10 02:10:26'),
(9, 'Enrollment Report', 'uploads/9/Enrollment Report', 'folder', 9, '2025-01-10 02:10:40', '2025-01-10 02:10:40'),
(10, 'CCTV Storage', 'uploads/10/CCTV Storage', 'folder', 10, '2025-01-10 02:13:39', '2025-01-10 02:13:39'),
(11, 'GSIS', 'uploads/11/GSIS', 'folder', 11, '2025-01-10 02:13:47', '2025-01-10 02:13:47'),
(12, 'Letter of Notification', 'uploads/12/Letter of Notification', 'folder', 12, '2025-01-10 02:18:03', '2025-01-10 02:18:03'),
(13, 'List of NSTP', 'uploads/13/List of NSTP', 'folder', 13, '2025-01-10 02:18:22', '2025-01-10 02:18:22'),
(14, 'Notice to proceed', 'uploads/14/Notice to proceed', 'folder', 14, '2025-01-10 02:19:16', '2025-01-10 02:19:16'),
(15, 'RWAC', 'uploads/15/RWAC', 'folder', 15, '2025-01-10 02:19:28', '2025-01-10 02:19:28'),
(16, 'Transmittal Letter', 'uploads/16/Transmittal Letter', 'folder', 16, '2025-01-10 02:19:38', '2025-01-10 02:19:38'),
(17, 'Training Reduction', 'uploads/17/Training Reduction', 'folder', 17, '2025-01-10 02:19:53', '2025-01-10 02:19:53'),
(18, 'Terminal Report', 'uploads/18/Terminal Report', 'folder', 18, '2025-01-10 02:20:03', '2025-01-10 02:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `course` varchar(100) NOT NULL,
  `section` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `guardian_contact_number` varchar(20) NOT NULL,
  `guardian_address` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_enrolled` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `contact_number`, `profile_picture`, `attachment`, `course`, `section`, `gender`, `date_of_birth`, `school_id`, `address`, `mother_name`, `father_name`, `guardian_contact_number`, `guardian_address`, `status`, `date_enrolled`) VALUES
(5, 'Kevin Arizobal', 'kevin.arizobal@yahoo.com', '12324521424', 'uploads/67508752a3f0d-462438338_1706527379888652_6646568268163959560_n.jpg', 'uploads/67508752aab6e-png-transparent-mizuno-corporation-asics-logo-new-balance-golf-golf-food-text-sport-thumbnail.png', 'ICT', '1-A', 'Male', '2024-12-20', '2468013', 'Cantilan Surigao del Sur', 'Hazel Arizobal', 'Arniel Arizobal', '123124124124124', 'Cantilan Surigao del Sur', 1, '2024-12-04 16:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_files`
--

CREATE TABLE `student_files` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_files`
--

INSERT INTO `student_files` (`id`, `student_id`, `file_name`, `file_path`, `file_type`) VALUES
(10, 5, '67508752aab6e-png-transparent-mizuno-corporation-asics-logo-new-balance-golf-golf-food-text-sport-thumbnail.png', 'uploads/67508752aab6e-png-transparent-mizuno-corporation-asics-logo-new-balance-golf-golf-food-text-sport-thumbnail.png', 'attachment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_files`
--
ALTER TABLE `student_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_files`
--
ALTER TABLE `student_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `files` (`id`);

--
-- Constraints for table `student_files`
--
ALTER TABLE `student_files`
  ADD CONSTRAINT `student_files_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 08:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aruga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
('a_0001', 'admin', '$2y$10$SmBPUqLs7XygJ6O9ZKP5qOefKPwYv/AlY.8PWu/dWRb0dIRlKF74.'),
('a_0002', 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `apply_id` varchar(50) NOT NULL,
  `babysitter_id` varchar(50) NOT NULL,
  `jobpost_id` varchar(50) NOT NULL,
  `apply_date` datetime NOT NULL DEFAULT current_timestamp(),
  `apply_status` varchar(50) NOT NULL,
  `apply_deleted` varchar(5) NOT NULL,
  `parent_id` varchar(50) NOT NULL,
  `subscription_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`apply_id`, `babysitter_id`, `jobpost_id`, `apply_date`, `apply_status`, `apply_deleted`, `parent_id`, `subscription_id`) VALUES
('application646054a687530', 'user6460548734d39', 'jobpost64605466a0331', '2023-05-14 11:25:26', 'done', '0', 'user646054190ffdc', 'sub6460542f7475e');

-- --------------------------------------------------------

--
-- Table structure for table `babysitter_account`
--

CREATE TABLE `babysitter_account` (
  `babysitter_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `babysitter_account`
--

INSERT INTO `babysitter_account` (`babysitter_id`, `user_id`) VALUES
('babysitter6460548757b49', 'user6460548734d39');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `blog_postdate` datetime NOT NULL DEFAULT current_timestamp(),
  `blog_title` varchar(50) NOT NULL,
  `blog_details` varchar(255) NOT NULL,
  `blog_img` blob NOT NULL,
  `blog_deleted` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `cred_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `cred_img` blob NOT NULL,
  `date_updated` datetime NOT NULL,
  `deleted` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `hire_id` varchar(50) NOT NULL,
  `parent_id` varchar(50) NOT NULL,
  `babysitter_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`hire_id`, `parent_id`, `babysitter_id`) VALUES
('hire64605cf80c97d', 'user646054190ffdc', 'user6460548734d39');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_from` varchar(100) DEFAULT NULL,
  `message_to` varchar(100) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date_sent` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_from`, `message_to`, `message`, `date_sent`) VALUES
(51, 'user6454f6d8e4de7', 'user6454f74dab449', 'hello dai', '2023-05-06 11:37:01'),
(52, 'user64550834b3b04', 'user6454f6d8e4de7', 'hello', '2023-05-07 11:32:45'),
(53, 'user646054190ffdc', 'user6460548734d39', 'hello', '2023-05-14 11:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `monitor_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `jobpost_id` varchar(50) NOT NULL,
  `blog_id` varchar(50) NOT NULL,
  `subscription_id` varchar(50) NOT NULL,
  `apply_id` varchar(50) NOT NULL,
  `review_id` varchar(50) NOT NULL,
  `admin_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent_account`
--

CREATE TABLE `parent_account` (
  `parent_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_account`
--

INSERT INTO `parent_account` (`parent_id`, `user_id`) VALUES
('parent646054196e6cb', 'user646054190ffdc');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `jobpost_id` varchar(50) NOT NULL,
  `parent_id` varchar(50) NOT NULL,
  `jobpost_date` datetime NOT NULL DEFAULT current_timestamp(),
  `jobpost_duration` datetime NOT NULL DEFAULT current_timestamp(),
  `jobpost_desc` varchar(255) NOT NULL,
  `jobpost_type` varchar(25) NOT NULL,
  `jobpost_status` varchar(50) NOT NULL,
  `deleted` varchar(5) NOT NULL,
  `subscription_id` varchar(50) NOT NULL,
  `jobpost_address` varchar(50) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `jobpost_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`jobpost_id`, `parent_id`, `jobpost_date`, `jobpost_duration`, `jobpost_desc`, `jobpost_type`, `jobpost_status`, `deleted`, `subscription_id`, `jobpost_address`, `salary`, `jobpost_title`) VALUES
('jobpost64605466a0331', 'user646054190ffdc', '2023-05-14 11:24:22', '2023-05-14 11:24:22', 'test', 'Full Time', 'active', '0', 'sub6460542f7475e', 'test', '23.00', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `resume_id` varchar(50) NOT NULL,
  `babysitter_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `work_experience` varchar(100) DEFAULT NULL,
  `application_letter` varchar(255) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` varchar(50) NOT NULL,
  `babysitter_id` varchar(50) NOT NULL,
  `parent_id` varchar(50) NOT NULL,
  `review_date` datetime NOT NULL DEFAULT current_timestamp(),
  `review_details` varchar(255) NOT NULL,
  `review_ratings` int(11) NOT NULL,
  `review_deleted` varchar(50) NOT NULL,
  `review_target` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `babysitter_id`, `parent_id`, `review_date`, `review_details`, `review_ratings`, `review_deleted`, `review_target`) VALUES
('R6460653bb125f', 'user6460548734d39', 'user646054190ffdc', '2023-05-14 12:36:11', 'dfg', 2, '0', 'user6460548734d39'),
('R64606581417e8', 'user6460548734d39', 'user646054190ffdc', '2023-05-14 12:37:21', 'target', 5, '0', 'user646054190ffdc'),
('R646065bc15a54', 'user6460548734d39', 'user646054190ffdc', '2023-05-14 12:38:20', 'sdfsdf', 2, '0', 'user6460548734d39'),
('R646065d4034d0', 'user6460548734d39', 'user646054190ffdc', '2023-05-14 12:38:44', 'ako si christian', 5, '0', 'user6460548734d39'),
('R646065df1b4b8', 'user6460548734d39', 'user646054190ffdc', '2023-05-14 12:38:55', 'ako si pearl', 5, '0', 'user646054190ffdc');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_ended` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  `subscription_payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `user_id`, `amount`, `date_start`, `date_ended`, `status`, `subscription_payment`) VALUES
('sub6460542f7475e', 'user646054190ffdc', '200.00', '2023-05-14 11:23:27', '2023-06-14 11:23:27', 'Active', 'storage/9VLQ8Hn25A3DsFytlVa9U2TMKxdSlggCIqd0KvEg.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telno` varchar(25) NOT NULL,
  `mobileno` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL,
  `deleted` varchar(5) NOT NULL,
  `status` varchar(25) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `lastname`, `firstname`, `address`, `telno`, `mobileno`, `email`, `username`, `password`, `img`, `type`, `deleted`, `status`, `age`) VALUES
('user646054190ffdc', 'Tanedo', 'Christians', 'Sitio Lupa, Rivaridge Subdivision Tisa Cebu Citys', '324234', '09608997323', 'tanedochristian1@gmail.com', 'test', '$2y$10$HQKOnn1G2kX9qLqd32jI9.9F.8vOMoTqqok14RG32f9kbJ30m4kpG', 'storage/onD2rdZDOzybrV5VfyQ71GFaaDBhl8KRehyKJDMF.png', 'parent', '0', 'pending', 20),
('user6460548734d39', 'Sayson', 'Pearl', 'test', '095624330', '09608997323', 'Sayson@aruga.com', 'test', '$2y$10$bnm0GkibPvzZEakCZUaHFeRYPw9clQ6HoBwylz7pLfJ8NedMhl9Gu', 'storage/PPfD4hK5FKoWJqD5tmW5e51DQsDaQXlpWbtO47kK.png', 'babysitter', 'No', 'Active', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`apply_id`),
  ADD KEY `babysitter_id` (`babysitter_id`),
  ADD KEY `jobpost_id` (`jobpost_id`);

--
-- Indexes for table `babysitter_account`
--
ALTER TABLE `babysitter_account`
  ADD PRIMARY KEY (`babysitter_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`cred_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`hire_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`monitor_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jobpost_id` (`jobpost_id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `subscription_id` (`subscription_id`),
  ADD KEY `apply_id` (`apply_id`),
  ADD KEY `review_id` (`review_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `parent_account`
--
ALTER TABLE `parent_account`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`jobpost_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `subscription_id` (`subscription_id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`resume_id`),
  ADD KEY `babysitter_id` (`babysitter_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `babysitter_id` (`babysitter_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`jobpost_id`) REFERENCES `post` (`jobpost_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `babysitter_account`
--
ALTER TABLE `babysitter_account`
  ADD CONSTRAINT `babysitter_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credential`
--
ALTER TABLE `credential`
  ADD CONSTRAINT `credential_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `monitor_ibfk_1` FOREIGN KEY (`apply_id`) REFERENCES `application` (`apply_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitor_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitor_ibfk_3` FOREIGN KEY (`jobpost_id`) REFERENCES `post` (`jobpost_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitor_ibfk_4` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitor_ibfk_5` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitor_ibfk_6` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`subscription_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitor_ibfk_7` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitor_ibfk_8` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitor_ibfk_9` FOREIGN KEY (`apply_id`) REFERENCES `application` (`apply_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent_account`
--
ALTER TABLE `parent_account`
  ADD CONSTRAINT `parent_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`subscription_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `resume_ibfk_1` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

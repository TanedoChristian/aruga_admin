-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 10:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
('a_0001', 'admin', '$2y$10$loHRxgJ5NDPxIZXT6qZrfu/LRQT/fHTAjE44Zi1RyCN9o4NnBvUk2'),
('a_0002', 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `apply_id` varchar(50) NOT NULL,
  `babysitter_id` varchar(50) NOT NULL,
  `jobpost_id` varchar(50) NOT NULL,
  `apply_date` datetime NOT NULL,
  `apply_status` varchar(50) NOT NULL,
  `apply_deleted` varchar(5) NOT NULL,
  `subscription_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`apply_id`, `babysitter_id`, `jobpost_id`, `apply_date`, `apply_status`, `apply_deleted`, `subscription_id`) VALUES
('A_0001', 'b_0001', 'JP_00001', '2023-01-05 17:25:46', 'Hired', 'No', 'S_00001'),
('A_0007', 'b_0007', 'JP_00007', '2023-03-07 10:25:46', 'Hired', 'No', 'S_00007'),
('A_0008', 'b_0008', 'JP_00007', '2023-03-07 10:25:46', 'Pending', 'No', 'S_00007'),
('A_0009', 'b_0009', 'JP_00007', '2023-03-07 10:29:31', 'Rejected', 'No', 'S_00007'),
('A_0010', 'b_0010', 'JP_00008', '2023-03-07 10:29:31', 'Pending', 'No', 'S_00008'),
('A_0011', 'b_0001', 'JP_00007', '2023-03-07 10:29:31', 'Hired', 'No', 'S_00007'),
('A_0012', 'b_0002', 'JP_00010', '2023-03-20 10:29:31', 'Rejected', 'No', 'S_00010'),
('A_0013', 'b_0012', 'JP_00011', '2023-02-07 10:39:31', 'Pending', 'No', 'S_00011'),
('A_0014', 'b_0004', 'JP_00008', '2023-02-07 10:29:31', 'Pending', 'No', 'S_00008'),
('A_0015', 'b_0005', 'JP_00018', '2023-03-07 10:29:31', 'Rejected', 'No', 'S_00018'),
('A_0016', 'b_0005', 'JP_00019', '2023-03-07 10:29:31', 'Pending', 'No', 'S_00019'),
('A_0017', 'b_0016', 'JP_00016', '2023-03-07 10:29:31', 'Pending', 'No', 'S_00016'),
('A_0018', 'b_0023', 'JP_00009', '2023-03-07 10:29:31', 'Pending', 'No', 'S_00009');

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
('b_0004', '18713261'),
('b_0005', '18713263'),
('b_0013', '18713264'),
('b_0006', '18713265'),
('b_0007', '18713266'),
('b_0008', '18713280'),
('b_0009', '18713281'),
('b_0010', '18713282'),
('b_0011', '18713283'),
('b_0012', '18713284'),
('b_0001', '18713700'),
('b_0002', '18713710'),
('b_0003', '18713780'),
('b_0014', '18714260'),
('b_0015', '18714261'),
('b_0016', '18714262'),
('b_0017', '18714263'),
('b_0018', '18714264'),
('b_0019', '18714265'),
('b_0020', '18714266'),
('b_0021', '18714267'),
('b_0022', '18714268'),
('b_0023', '18714269');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `blog_postdate` datetime NOT NULL,
  `blog_title` varchar(50) NOT NULL,
  `blog_details` varchar(255) NOT NULL,
  `blog_img` blob NOT NULL,
  `blog_deleted` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `blog_postdate`, `blog_title`, `blog_details`, `blog_img`, `blog_deleted`) VALUES
('BP_00001', '1900001', '2023-03-07 10:09:14', 'Items You Didn’t Know You Needed for Back to Schoo', 'Even though we have been doing this year after year, back to school season has snuck up on us and we are now running around crazy trying to get lives in order. Some of you might be back in school already and some are getting ready to go. I have put togeth', '', 'Active'),
('BP_00002', '1900002', '2023-03-07 10:09:14', 'A Reset Evening Routine for Mom', 'I have partnered with TruMoo to bring you a nightly routine that will make you excited about bedtime.\r\n\r\nI’m pretty sure every mother heard this from an elder after bringing home that sweet bundle of joy. And while we can totally see where they are coming', '', 'Banned'),
('BP_00007', '1900007', '2023-02-07 10:09:14', 'Tips to Creating A New Everyday Morning Routine', 'Tips to Creating A New Everyday Morning Routine\r\nSponsored by Alive! Multivitamins\r\n\r\nMornings can be rough, right?  Especially if you are not an early bird like myself.  I’m still trying to convince my hu', '', 'Banned'),
('BP_00008', '1900008', '2023-03-07 10:09:14', 'How to Encourage Your Child to Read with Epic!', 'Kindergarten has officially begun. The teach has sent home an email stating the fun is over and it is down to business. Why am I still crying?  I would consider myself a bit of a “Pinterest Mom” but “homeschooling momma” not a chance.  So I am constantly ', '', 'Active'),
('BP_00009', '1900009', '2023-03-07 10:09:14', 'Establishing A Back To School Routine for Kinderga', 'Establishing A Back To School Routine for Kindergartners\r\nI have teamed up with JCPenney to share our back to school routine for getting ready for Kindergarten while being stylish of course.\r\n\r\nEstablishing A Back T', '', 'Banned'),
('BP_00010', '1900010', '2023-01-07 10:09:14', 'Guide to Finding the Best Preschool with KinderCar', 'Nobody ever said motherhood would be easy. I went into it with an open mind and heart.  But I knew it was going to be the hardest thing I’ve done.  And from the moment my little one was laid on my chest, it became real at just how hard things were going t', '', 'Active'),
('BP_00011', '1900011', '2023-03-07 10:09:14', 'Spring Time Kids Bedroom Refresh on a Budget', 'Spring time is the time for new beginnings as well as room refreshes! This go-around we are working on my youngest daughters room. She would describe her current room as “not my style” or “too mom-ish.” She says these like it’s a bad thing. A few years ag', '', 'Banned'),
('BP_00012', '1900012', '2023-01-07 10:09:14', 'Easy Laundry Tips for Lazy Moms', 'Spring time is the time for new beginnings as well as room refreshes! This go-around we are working on my youngest daughters room. She would describe her current room as “not my style” or “too mom-ish.” She says these like it’s a bad thing. A few years ag', '', 'Pending'),
('BP_00013', '1900013', '2023-04-07 10:19:14', 'Hidden Storage Solutions for Kids Bedroom', 'Spring time is the time for new beginnings as well as room refreshes! This go-around we are working on my youngest daughters room. She would describe her current room as “not my style” or “too mom-ish.” She says these like it’s a bad thing. A few years ag', '', 'Pending'),
('BP_00014', '1900013', '2023-04-07 10:09:14', 'Things I Never Imagined I’d Be Shopping for My Kid', 'Spring time is the time for new beginnings as well as room refreshes! This go-around we are working on my youngest daughters room. She would describe her current room as “not my style” or “too mom-ish.” She says these like it’s a bad thing. A few years ag', '', 'Active');

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

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`cred_id`, `user_id`, `cred_img`, `date_updated`, `deleted`) VALUES
('C_0001', '1900001', '', '2023-03-07 09:24:02', 'No'),
('C_0002', '1900002', '', '2023-03-07 16:24:23', 'No'),
('C_0003', '1900003', '', '2023-03-07 16:24:23', 'No'),
('C_0004', '1900004', '', '2023-03-07 09:24:02', 'No'),
('C_0005', '1900005', '', '2023-03-07 09:24:02', 'No'),
('C_0006', '1900006', '', '2023-03-07 09:24:02', 'No'),
('C_0007', '1900007', '', '2023-03-07 09:24:02', 'No'),
('C_0008', '1900008', '', '2023-03-07 09:24:02', 'No'),
('C_0009', '1900009', '', '2023-03-07 09:24:02', 'No'),
('C_0010', '1900010', '', '2023-03-07 09:24:02', 'No'),
('C_0011', '1900011', '', '2023-03-07 09:24:02', 'No'),
('C_0012', '1900012', '', '2023-03-07 09:24:02', 'No'),
('C_0013', '1900013', '', '2023-03-07 09:24:02', 'No'),
('C_0014', '1900014', '', '2023-03-07 09:24:02', 'No'),
('C_0015', '1900015', '', '2023-03-07 09:24:02', 'No'),
('C_0016', '1900016', '', '2023-03-07 09:24:02', 'No'),
('C_0017', '1900017', '', '2023-03-07 09:24:02', 'No'),
('C_0018', '1900018', '', '2023-03-07 09:24:02', 'No'),
('C_0019', '1900019', '', '2023-03-07 09:24:02', 'No'),
('C_0020', '1900020', '', '2023-03-07 09:24:02', 'No');

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
('P_00001', '1900001'),
('P_00002', '1900002'),
('P_00003', '1900003'),
('P_00004', '1900004'),
('P_00005', '1900005'),
('P_00006', '1900006'),
('P_00007', '1900007'),
('P_00008', '1900008'),
('P_00009', '1900009'),
('P_00010', '1900010'),
('P_00011', '1900011'),
('P_00012', '1900012'),
('P_00013', '1900013'),
('P_00014', '1900014'),
('P_00015', '1900015'),
('P_00016', '1900016'),
('P_00017', '1900017'),
('P_00018', '1900018'),
('P_00019', '1900019'),
('P_00020', '1900020');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `jobpost_id` varchar(50) NOT NULL,
  `parent_id` varchar(50) NOT NULL,
  `jobpost_date` datetime NOT NULL,
  `jobpost_duration` datetime NOT NULL,
  `jobpost_desc` varchar(255) NOT NULL,
  `jobpost_type` varchar(25) NOT NULL,
  `jobpost_status` varchar(50) NOT NULL,
  `deleted` varchar(5) NOT NULL,
  `subscription_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`jobpost_id`, `parent_id`, `jobpost_date`, `jobpost_duration`, `jobpost_desc`, `jobpost_type`, `jobpost_status`, `deleted`, `subscription_id`) VALUES
('JP_00001', 'P_00001', '2023-01-03 16:38:16', '2023-01-10 16:38:16', 'Can work - Monday to Friday 8 to 12 noon.\r\nCan teach basic Math is a plus.\r\nCan babysit a 10-year-old.\r\n\r\n\r\nFree Snacks.\r\n', 'Weekdays Babysitter', 'Hired', 'Yes', 'S_00001'),
('JP_00002', 'P_00002', '2023-02-01 16:38:16', '2023-02-08 16:38:16', 'Can bring the child to University of Cebu Main Campus.\r\nPreferably a babysitter near UC Main.\r\nChild age is 13 years old.', 'After-school Babysitter', 'Expired', 'Yes', 'S_00002'),
('JP_00007', 'P_00007', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can bring the child to University of Cebu Main Campus.\r\nPreferably a babysitter near UC Main.\r\nChild age is 13 years old.', 'After-school Babysitter', 'Active', 'No', 'S_00007'),
('JP_00008', 'P_00008', '2023-03-07 16:38:16', '2023-08-07 16:31:16', 'Can work - Monday to Friday 8 to 12 noon.\r\nCan teach basic Math is a plus.\r\nCan babysit a 10-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No ', 'S_00008'),
('JP_00009', 'P_00009', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No ', 'S_00009'),
('JP_00010', 'P_00010', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work on Sunday Morning.\r\nCan attend the mass with us.\r\nCan babysit the child while in the church.\r\n\r\n\r\nFree Snacks.', 'Weekends Babysitter', 'Pending', 'No', 'S_00010'),
('JP_00011', 'P_00011', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Tuesday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Pending', 'No', 'S_00011'),
('JP_00012', 'P_00012', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Banned', 'Yes', 'S_00012'),
('JP_00013', 'P_00013', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No', 'S_00013'),
('JP_00014', 'P_00014', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No', 'S_00014'),
('JP_00015', 'P_00015', '2023-03-07 16:48:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No', 'S_00015'),
('JP_00016', 'P_00016', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No', 'S_00016'),
('JP_00017', 'P_00017', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No', 'S_00017'),
('JP_00018', 'P_00018', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No', 'S_00018'),
('JP_00019', 'P_00019', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No', 'S_00019'),
('JP_00020', 'P_00020', '2023-03-07 16:38:16', '2023-08-07 16:38:16', 'Can work - Monday 8 to 12 noon.\r\nCan babysit a 13-year-old.\r\n\r\n\r\nFree Snacks.', 'Weekdays Babysitter', 'Active', 'No', 'S_00020');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `resume_id` varchar(50) NOT NULL,
  `babysitter_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `work_experiene` varchar(100) NOT NULL,
  `application_letter` varchar(100) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`resume_id`, `babysitter_id`, `category`, `work_experiene`, `application_letter`, `date_created`) VALUES
('R_00001', 'b_0001', 'Weekends Babysitter', 'THE LANG FAMILY\r\nBabysitter	Kansas City, MO\r\nJune 2019–August 2021\r\n⦁	Looked after a 6-year-old girl', 'Josephine Navarro\r\n\r\n0931923829\r\n\r\njosephine@gmail.com\r\n\r\nDear Parents,\r\n\r\nOne of my strongest desir', '0000-00-00'),
('R_00002', 'b_0002', 'Weekdays Babysitter', 'THE JONES FAMILY\r\nBabysitter	Sambag 1, Cebu City\r\nSeptember 2021–Present \r\n⦁	Care for a 5-year-old b', 'Babysitter\r\n\r\n0934789372\r\n\r\nbabysitter@email.com\r\n\r\nMarch 7, 2023\r\n\r\nDear Parents,\r\n\r\nOne of my stro', '0000-00-00'),
('R_00003', 'b_0003', 'Weekdays Babysitter', 'THE JONES FAMILY\r\nBabysitter	Sambag 1, Cebu City\r\nSeptember 2021–Present \r\n⦁	Care for a 5-year-old b', 'Babysitter\r\n\r\n0934789372\r\n\r\nbabysitter@email.com\r\n\r\nMarch 7, 2023\r\n\r\nDear Parents,\r\n\r\nOne of my stro', '2023-03-07'),
('R_00004', 'b_0004', 'Weekdays Babysitter', 'THE JONES FAMILY\r\nBabysitter	Sambag 1, Cebu City\r\nSeptember 2021–Present \r\n⦁	Care for a 5-year-old b', 'Babysitter\r\n\r\n0934789372\r\n\r\nbabysitter@email.com\r\n\r\nMarch 7, 2023\r\n\r\nDear Parents,\r\n\r\nOne of my stro', '2023-03-07'),
('R_00005', 'b_0005', 'Weekdays Babysitter', 'THE JONES FAMILY\r\nBabysitter	Sambag 1, Cebu City\r\nSeptember 2021–Present \r\n⦁	Care for a 5-year-old b', 'Babysitter\r\n\r\n0934789372\r\n\r\nbabysitter@email.com\r\n\r\nMarch 7, 2023\r\n\r\nDear Parents,\r\n\r\nOne of my stro', '2023-03-07'),
('R_00006', 'b_0006', 'Weekdays Babysitter', 'THE JONES FAMILY\r\nBabysitter	Sambag 1, Cebu City\r\nSeptember 2021–Present \r\n⦁	Care for a 5-year-old b', 'Babysitter\r\n\r\n0934789372\r\n\r\nbabysitter@email.com\r\n\r\nMarch 7, 2023\r\n\r\nDear Parents,\r\n\r\nOne of my stro', '2023-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` varchar(50) NOT NULL,
  `babysitter_id` varchar(50) NOT NULL,
  `parent_id` varchar(50) NOT NULL,
  `review_date` datetime NOT NULL,
  `review_details` varchar(255) NOT NULL,
  `review_ratings` int(11) NOT NULL,
  `review_deleted` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `babysitter_id`, `parent_id`, `review_date`, `review_details`, `review_ratings`, `review_deleted`) VALUES
('R_0001', 'b_0001', 'P_00001', '2023-01-10 17:39:15', 'Josephine is a fantastic babysitter for both my girl. She is responsible, caring, honest, communicative and on-time throughout her employment with me. She is also open minded in receiving feedback and guidance on how I would like my baby to be cared for, ', 5, 'no'),
('R_0002', 'b_0001', 'P_00007', '2023-03-07 17:39:15', 'Our child is very \"kiat\" and we booked a babysitter the day before our evening event. The nanny goes by Josephine, and she was so sweet and prepared. She brought many toys and games to play with our child. We left reassured to enjoy ourselves and came bac', 4, 'yes'),
('R_0003', 'b_0013', 'P_00005', '2023-04-02 06:31:14', 'Nice job ', 3, 'no'),
('R_0004', 'b_0013', 'P_00005', '2023-04-02 06:32:14', 'Nice job', 3, 'no');

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
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `user_id`, `amount`, `date_start`, `date_ended`, `status`) VALUES
('S_00001', '1900001', '599.00', '2022-10-07 15:10:33', '2023-03-07 15:10:33', 'Active'),
('S_00002', '1900002', '599.00', '2022-10-07 15:10:33', '2023-03-07 15:10:33', 'Expired'),
('S_00005', '1900005', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Pending Payment'),
('S_00006', '1900006', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Pending Payment'),
('S_00007', '1900007', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00008', '1900008', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00009', '1900009', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00010', '1900010', '599.00', '2022-10-07 15:10:33', '2023-03-07 15:10:33', 'Active'),
('S_00011', '1900011', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00012', '1900012', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00013', '1900013', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00014', '1900014', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00015', '1900015', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00016', '1900016', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00017', '1900017', '599.00', '2023-01-07 15:10:33', '2023-07-07 15:10:33', 'Active'),
('S_00018', '1900018', '599.00', '2023-03-07 15:10:33', '2023-08-07 15:10:33', 'Active'),
('S_00019', '1900019', '599.00', '2023-01-07 15:10:33', '2023-07-07 15:10:33', 'Active'),
('S_00020', '1900020', '599.00', '2023-02-07 15:10:33', '2023-04-07 15:10:33', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telNo1` varchar(25) NOT NULL,
  `mobileno` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_img` blob NOT NULL,
  `type` varchar(25) NOT NULL,
  `deleted` varchar(5) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `lastname`, `firstname`, `address`, `telNo1`, `mobileno`, `email`, `username`, `password`, `profile_img`, `type`, `deleted`, `status`) VALUES
('18713261', 'Navarro', 'Josephine', 'Sambag 1, Cebu City', '', '09311117745', 'ryanmar@gmail.com', 'ryannavar', '12345', 0x89504e470d0a1a0a0000000d494844520000012d0000016808060000000276ad31000000017352474200aece1ce90000200049444154785eecbd67749c577a26f8a58ac83912204082490c1245482d52a1a9acee56774bad8e4e7fed33c76bafedb1c7699dc69e637b77d67bbcee9de3f1ccee3976efb4d7a9db76b7db92d8c94d51a448054a24019208040102442ea050e94b7b9e8ff5b0afaa411450014001b7ce21ab50f585fbbdf7dee7bee179dfab2af2252520252025504212504ba8adb2a95202520252028a042d3908a404a4044a4a0212b44aaabb6463a504a4042468c9312025202550521290a05552dd251b2b25202520414b8e012901298192928004ad92ea2ed95829012901095a720c480948099494042468955477c9c64a09480948d09263404a404aa0a4242041aba4ba4b36564a404a4082961c0352025202252501095a25d55db2b15202520212b4e4189012901228290948d02aa9ee928d9512901290a025c7809480944049494082564975976cac94809480042d3906a404a4044a4a0212b44aaabb6463a504a4042468c9312025202550521290a05552dd251b2b25202520414b8e012901298192928004ad92ea2ed95829012901095a720c480948099494042468955477c9c64a09480948d09263404a404aa0a4242041aba4ba4b36564a404a4082961c0352025202252501095a25d55db2b15202520212b4e4189012901228290948d02aa9ee928d9512901290a025c7809480944049494082564975976cac94809480042d3906a404a4044a4a0212b44aaabb6463a504a4042468c9312025202550521290a05552dd251b2b25202520414b8e012901298192928004ad92ea2ed95829012901095a720c480948099494042468955477c9c64a09480948d0926360d512705dd7501485fff4858505bdb2b23291be80ae280afee1a5f1f3d2d212be735dd775f05f454585ad288aa3288af86ea9aa8abfe54b4a20ab0424686515d1f638c0755d8c85f0e2e262c8308c403299f4699ae65b585808baae1bb46d3b6cdb76c834cdb06559658ee394e3bb85858526455102aeebfa6ddbf603ac6cdbf6c615802a140ac5344d33354d4b689a164fff8be9ba1e535535a1aa6a1cfffc7e3ffec50cc3880583c1b86118662010301dc7b12a2a2a4c4551528aa224555505e0c9d736968004ad6dd6f9aeebfa1445f1002a914854cfcccc5401846cdbae4e2693f5f1787c87699adda954aad1b6ed0a8094ebba1e28a5fff9700dd77575685ec160d0d3aad2a0a7b9ae0b89aa785755d54d24120019370d36f8ecfd4b6b56b6e338b6aaaa26fe198691340c23eef3f9160dc388689a36e538ce94cfe7bb150e876f0783c1d9502814f1fbfdd1f2f2f2b8699af1cacacab8a228003fefc6f2b5f52520416b8bf731c04551948a482452178bc56a128944cdd2d252d3d2d2524f3c1e3f904c261b5dd7ad725db7dc711c685021d775438ee30098d47038fc2109a9ea87878cf8771ab0a06179e7e0ddef87f2b5f20bc7f19f6ddb8a6ddb8e8dff1c079a564ad7f5846118d0d496745d07a0cd1a86316218c6f5eaeaeaebbaae4f8742a1b9b2b232005db4a6a6664955552bdb7de5efa52901095aa5d96ff76c3500271a8d56c462b10ac771ea6edebcd96559d681542a75d0b2ac76cbb2aa4dd3ac48a55230efcac2e1b006e0d1344dd175fd43efb88965dd99fb22b0f06fbcfb7cbe0f8154267099a6098dcbbb86f8cecfb8febdee8d631cc7f1ae8ff734a0e1335011be34685b0b86612c0683c1a96030d81f0e872f040281e1502884bfe7cbcacaa2959595515555615ecad716908004ad2dd089aeeb96c5e3f1dab9b9b9faf9f9f91d0b0b0b871617178f26128976bfdfdfe8384eb5aaaae586611804023c36402a1390000efcb71a4d89204550c2f545ed0bd75ae905c0120191d7e3350054bc36c18d6dc6b50dc320a8413b8b3b8eb3a828cabcaeebb39aa60d5756565e088542976a6a6a46c3e1f05c7d7dfda2aaaa3846be4a540212b44ab0e3e04b8a46a335f178bc6a6e6eae797e7e7eefe2e2e2e38aa2f4288ad26859569da669157ebf5f4f269325f884056b72d2b66d80d48caaaaa37ebfbfbfbcbcfc4c6565655f5353d3747575f554da1f262397051379f12f2441abf832ceeb0e74702b8ae2874f2a994cd6cdccccb4debe7dfb402412e9f5f97c9dc964b219a6a061187040699665a99aa6a97ebf7f3bf7afe758330cc3751082b42cb8c9a2b66dcf689a366e18c6906118975a5b5bdfa9adad1dafa8a8982d2b2b9b571405914a040aa4633faf915bbc93b7f3a02e9e54f3bc72da790e3e54108ef3f9f9f9c6e9e9e9f6d9d9d93db1586c9fe3381d9aa635e9ba5e0fe739a279baaeeb3e9f4f731c474da5529e9f28100828db5cd3ba6b7a028410c184831efe2dd775a38ee3cc9aa6395e565676231c0ef79595950d5657578f5554544c565555cda4fd66886e4a4d2ccf315dc8d3256815529a795c2bad51818e104a2412b5333333cd9148a47d6a6a6a673299ec725d7787aeeb6daaaac24755011a82aaaa86ebbaa01940b3f2800a8e6d38bf095af409e5d1b4923e157e3b3af3e1274bfbf13cedcbb66dd3eff7276cdb5eb02c6bcab2acdb7ebfff666565e5604d4dcd507979f9687979f9445555d52c9cfe884b489ed8c60f07095a1bdc07001d987e8aa294cdcccc34cccdcd75ccccccec8e46a37b2ccbea721ca7d5719c464dd32a038140080a95e338d0a8bc9603a4f8598cb601b410d9cbe608dfe0c72ffaede1a80770530e900b5e8c4606020198819e06e6baae07608ee34cbaae3ba628ca505353d3b5aaaaaa81dadada519fcf37595e5e0e277e4a6a5f45efba7bde4082d606c93e6d020662b158752412698944229df3f3f33d00ab542ab55b5194365dd76b2b2b2ba179f9e2f1b8669aa6a751612282ff04508256c5e85b66e40e8fb6dd352d11d0197d849c28b3783cee695f9025fc5f60f15b96057e1898fab39665ddf2fbfdc3656565d72a2b2b016043656565e3353535d0be40bb80f928fd5feb388f2468ada3b0d326207c55a1f9f9f99a542ad5363636b67b616161dfe2e2e21ed7753b038140b3cfe7ab863fcb711ce4f7a99850c160d0032a4c3c00552c165330e12a2a2aee4e403c0a818bdc2600dc767f913e2172bd48ada8a9a9f1b4556a63fc0c00f3fbfd00a424b8608aa2dcd6757d38180cf69597977f505757d75f575707a63e9cf7482f927eaf751a6812b4d641d0025885c14c5f5c5cec989c9cdc3335350546fa1e5dd73bc1a7f2f97c60a5fb2ccbbaeba782331d130ace753ad8015e0423923fe9b7a16f0b8f456d621d1e71d3de4224af5226d456a1612d2d2d79a6223ee31f64c673d2e6b56bdb369cf860e6c3f775cb34cd6bc160f0525555d595c6c6c6ebd0bceaebeb2312bcd6671848d02aa29cd360050627c0aa7e7a7a7ae7f4f4f4bef9f9f9038ee3ec330ca3d375dd7ad77591df07e2a7c74e17cd97ccb4992236575e7a1909a47328bd3cca746a50d275dd88ebbae3aeeb0e6a9ad657515171b9a1a1e17a5555d5adfafa7a6a5e32b1bb48234a825691049bf65985c6c7c7eba2d16867341a3d00a67a3c1edf6f9a66a7aeeb1eaf4a55551d60b55c330058dbdd2755a4ee59f5653319fb4cfe86d9a8aaea422c169b300c632010085c2e2b2b83f675adaeae6eacb1b1119a171cf612bc562dedd51d28416b75725af551e96860706666a6261a8d764c4d4ded8f46a3879696960edab6dd0d6e95611888021a2080d2e413fd2ef44d61c26cf7e8dfaa055fa40397012dfa0d3dde1712ba913a64dbf6b86559d70381c007353535ef3734345c6d6868006915fe3054b190cefa02f59104ad0209326d0afaa3d168652412691b1f1fdf3f333373bfa6698700568ee334198651e6f7fb3db0820645a7af6812d2efb25c24b0404d959759830404f3f06e4ea5982b49ca84ebba2938ec6ddb1e735db73f180cbee7f3f93ed8b56bd77594d5a9aeae8eca48e31a04bfc2a112b4f294239dec9148a43c168b354f4d4df54c4f4f1f5e5c5cbc3f954aedabaeae6e41b23288a03403c528169ceacb251d675655c8b399f2f41c25900db4b0f0902e01cdcbb6eda4655973b66d8fb8ae7b45d3b4f79a9a9adedfb56b17d8f6d332d731c78e104e93a095870ce1b79a9a9a42eda986999999eeb9b9b943737373f72793c9037ebf7f473018ac360cc30fb0025081aa000d0b5a14a27f343d44c636c98f32f29747c714f0d415cc43af1f61deb3b44fbaef6036822a81c284d3b1586c48d3b48be170f8dd8686864b0d0d0d238d8d8d70d6c3df254dc61cfa4a82560e424b6b5781e9e9e99aa9a9a9cec5c5c5838b8b8b0f249349d4acdaa9695a5df0ce4b8bc7e31e211420442e1042eb042de406666a5a629364f430870e2ae029d9402b73e1415fa62915aeaeeb60d92fc5e3f189783c7ed5eff7bf5b5959f94e7373737f636323d283603222354882d71afa4c82d61a8495f637213fb07c6262a265727272ffd4d4d4d16432f980ebbabb038140a3dfef47f54f1dec7516ad0340b176157d56f80d9a177858a2ff4a64b763f0cbe8e11a3ba8c08767330fd1475c5848e82570e1b7783cee0483c194dfef07c7ebe6d2d2d2255dd7df696969b9d8dada3ad8dcdc0c9311f5f2659471957d27416b95826254707c7cbc61626262f7ececec91442271d4e7f3dda728ca0e94344621cf74fdf5555e551eb64d24e0e537a6d37e50db6bd075ddf71545b9505757f77e6b6beb484b4b8b8c32ae723048d0ca22283ada1716162a66666676cccfcf1f9e9f9fef4da552471cc7e902df0a293769b092f25ce5c0dba68701bc50bf7a495194094551fa82c1e0f9f2f2f2f3656565576b6b6ba71a1a1aa4d6956570c849b68280d280154c6b577b1617171f4ca552bd8ee3dca7aa6a8ba669d8c5068c7729c76d8a42393e36b42e141b9c432509cbb2de0906836f35343480df35d2dcdc0c62aae476dd43b872b2dd4330e98d49cb070606dad3dad5c3a6693ea8aa2a08a2359aa6f9354dd3103d922f29811c2400adcbd6342d6659d684e33897fd7eff85f2f2f20bf5f5f557abaaaa6e4bad6b79a94ad0ca900b49a2d3d3d3758944a2a7bfbfff41d3341fb66dfba0a6692817834aa19e76c5c8510e03569e2225e04940d7754feb725d772e954a0ddbb6fd5e28143ad7d6d6f66e7b7bfb0d30eab127a414d70f2520414b180ddc657974741491c1c3d3d3d38fd8b6ddab28ca6ed4b6d2342d80027c20140a5530e5789212c84b029aa6b99a062a9f13334d13beae4b8140e06c30183cb777ef5e94c041e967e43a4a6a84f4c5fc70ac417b9a9f9faf40e5d089898963f3f3f38f261289072b2a2a3a4071d0340d89cd77d36f4810959484bce6ebb63f996571d22585a0752197712e994c5e374df36c4b4bcb1be5e5e5f0754d4873f1ce70d9f69a16cdc1582c563b3a3abafbe6cd9b0f2d2c2c9cf0fbfd87c3e1704b2a950a82eec0aa97248942782ce5bbed679e14405e1200878fa5b2a14d699a86ddb5172dcbba914c262f545656bed9d2d2f26e6b6beb704545059cf4db9a90baad418bd1c1dbb76f370f0d0d1d8a4422c75dd77d5851145411c5de8148c1d9d632ca6b36ca93739500795dd84c63c2b6edcb8aa29caba9a939dbd1d1d1dfdada8afd1ab7adb9b86d27649a2c5a76eddab5f6b9b9b9072291c8e38ee33c6418c64edbb6b1a5bc0e501399ecb98e40799e94408e127052a994e9f3f9e6344d1b705df75c28147aa3a1a1e1224a3d6f5773715b8216fc579148042564bafbfbfb7b4dd37c4c5194a37ebfbf5dd7f5309ded9efd2c15ad1ce79b3cad101240a9679fcf87faf3d1783c3e629a26ccc51fecdab5eb7c5757d70d7cbfddead36f3bd04af3afaafbfbfbf7f6f7f79f0887c38f5996759febbaa87715644506e69c1562e0c96b4809e42a0168fae9ba6bd8e60c3b0461776cd0224efbfdfeb3bdbdbdd740524d9782cef5362575deb6012d6e861a8bc5ea878787f7dfba75ebd16834fa587575f501d3346b6ddbbeebbfca4c5a2ea91e958ddd521240000895401065f4fbfd8edfef4f5996359d4aa5fa2ccb7ae3c08103ff56535373a9bebe1e398ddb82e9bc2d408ba564c6c7c79b4647470f4f4d4d3de6baeef170388c0d51ab1dc7c186779eff8a9b4a88fbe56da959201fa6e42420569ac0c68c9665217a18d175fd9a699aa79b9b9bbfdbd5d575b1b6b676723bd4e9daf2a0c508213644edebeb7b607c7cfca386611c0f85425da8cc605996c76e67213771271c8c6eb1d655c98d76d9e02d210196bf21dd06c06518866d18463412890cc0395f5d5dfd9da6a6a6773b3b3b414e4501c22d4b44ddd2a045c01a1818c0a6a80f26128993aaaa7e04d5191cc729c34e38e05a1198c412c7dc3f506e2cb125e67dc93e04c61fc7208b47a62ba6bac964d2a9a9a9598a46a348ff39d3d0d0f09df6f6f60bedededb7144581ff6b4b02d79605ad346085060707db2727277b2391c8939aa63d848d514dd344a13e2dbd1967c90e68d97029814020e02493c9583299bc6118c6d9bababa536d6d6de7dbdada46b72a706d49d02260ddba756bc7b56bd71e8ac5624fa552a98750b7dde7f3856ddbc60ece1ea35d6a5272e297b204308ee1a007402593c99baeeb9eada8a838d5dddd7daeb5b5f5e65604ae2d075a22600d0e0e3ebcb4b4f4946ddb0fabaada8efd061545f1129ef1124be596f2c0956ddfbe1240c9ee6030881d819c4422115f5a5a1ad534ed5c4b4bcba9a6a6a6739d9d9d23e972ce5bc654dc52a0259a84b76edd7a786161e1e9603088b49c764551b06b8ec6cd2524686ddf89be959e1ce399d14500177601b22c6bcc719cb7344d7bfdf0e1c3c85bdc52c0b565408b4ef7d1d1d1f6d1d1d1876667679fd634ed23aaaaee50553584b41d9a8274b2cbe8e0569abedbf3590058d0b6f00e8d0b3e2edbb613b158ec96699ae79a9b9b5f6d6a6a7ab3abab6bcb988a5b02b4c428e1c4c4047c584f3b8e83286187aeeb1e60314228ee7c0310e33e83db73c8cba72e750940d3e2222c50221cc330123e9f6f74767616e56d5eebecec3cbb559cf3250f5a248e4e4e4eb65ebf7efda1b9b9b9a7755d7f44d3b40ecbb2c2a150c8d3b04487bbb8d5934c882ef569bbbddbcf1dae318ea17171f3d86030e8040281c4e4e4e4cdb2b2b2376b6b6b5f6d6d6d3dd7dede3e56ea3caead005a01ec41383232d23b3f3fff8ce338c71545e9545535ec15c142216ec1ee1713a065b9e4ed3de1b7c2d303b4c44c0e915f984aa5b0e722a38a6f343535bdded1d171aeb1b1113cae9225a0963468b9aeeb1f1c1c6c9e9c9c3c363b3bfb8ca669277c3e5f976ddb5ea50674a664b46f85a9299f215709d8b68d7cc5b8699a3752a9d499c6c6c6d7f6efdfff5655551580ab246b72952c682193617a7abab1afafefc1783cfe6c32997ccce7f361a79c32cbb2346854208f92de906ba7cbf3a4044a59028944c273ce1b8681faf3375cd73d0d53b1a3a3e3ad969696f152dc34a324410bf5b01617176b868787ef1f1919795ed3b4938661ec360ca31cc451d8f65093fd7ebf67e7cb9794c0769500166d581b04ae582c36984aa5bebf73e7ce6fdd7ffffd171445992eb5b23625075a8804cecdcd554c4c4cec1f191979d675dd670dc3b84fd7756c4bafa393c4dd72a479b85da7ab7c6e4820100828d168d4134679793976fc892693c96b8140e0dbf5f5f5af1e3a74e83d4551664ba990604981162285b76fdf0ecfcdcd758f8f8f9f8c46a32f0483c1a38aa2d442fb4a4712ef6e128088215275e44b4a60bb4a00a00513110b39e602aa43388eb36059569f699aa70e1d3af46a6d6ded07555555115555910eb4e95fa5065ac1c1c1c11dc3c3c38fc662b1177c3edfc37ebfbfd9b66d9fe338deb330928288214c43095a9b7e0cca0616510258b8e1dbc50bc095deb20cf5b8e66ddb7e3f140a7d6be7ce9de071a102ea522954862819d0725dd7373e3ede32303080f49c1754557d54d7f5f6402010046065263e8b65668a3826e4a5a50436b504483e15b729433d2e5dd72d9fcf37353f3fff564343c33777eedcf9fd969616d49cdff4548892002dc8381a8dd60e0c0c1cbd79f3e6c7e078f7fbfddda9542ae4f3f93cb63bff11bca061c1110fb29d7c49096c5709601ec0a785f9515151e1695df1781c259c015c49cbb26ef9fdfed3adadaddfdcb367cf9960308888e2a69e349b1eb4e0a79a9d9dad181e1e3e303d3dfdbce338cff97cbefdaeeb5698a6e971b1e44b4a404a202709383e9f0f798a439aa67da7adaded1bdddddd17cacbcb37b5637e538316730a474646ba8686869e5a5858f884a6690f0402815a6c539f999e9353b7c993a404b6b104344d735cd78ddab67d09fead8e8e8e6f757575f5298ab2b859fd5b9b1db4fc131313ad636363c72727275fb42c0b8cf7665dd7bd8d2858cf7d1b8f39f9e85202794920cde1b292c9e44c2a95ba505757f78dbd7bf77ea7aeae0efead4d59b279d38216fc584b4b4bf5972e5d3a363f3ffff1542a053f5627f626344d534524040452691ee63566e5c9db5c0270d4078341d7344d13e56cb049466b6beb373a3a3ace20d54755d5e46613d1a6042dfab1666767efebebebfb98e338cfebbabe37180c62330a0dbc138672e50ed09b6d48c9f6949204a069a5eb0aa0b269dcb6ed61c330bed7d2d2f22f5d5d5de7c3e1f0d46663cc6f56d00a0e0f0fefbc76ed1a4a257f5255d5a39aa6d560f71cac0cd4b2101dc4dff225252025909b04b0e8630ec16241adf9542a158dc7e3572b2a2a5edbb9732780eb7d4551403cdd34e59a371d68818f75ebd6ade691919147e0c72a2f2f071fabd5711c1fcc42f24ea48695db20956749098812005831a09576b5d8a669ceabaafa6e381cfea783070fbe565b5b3b8832ce9b45729b0ab490578844e8a1a1a1fb2727273f6e59162a90eef2f97cd890e2ae1f0b1a16040d33916cdfcd2250d90e2981529200800ae6613299f43248028180ebf3f9ac4422319e48244e1f3a74e86badadadff160e876f6f96349f4d035a697a43f8e2c58b7b474646c0c5fa98aeeb076ddbae44313f71e7e78c6dc24b698cc8b64a096c2a09605e4101e00eebe992cd08cdc77d3edf60341afd973d7bf6fcc3be7dfb2e6e965d7d361368f96fdfbedd363030f0c4fcfcfca7745d7fd8b6ed06239d3c487350acda20290f9b6afccbc694a0049603ad745689a3ebfa422a953adfdcdcfc376d6d6daf3535358d6e86fa5b9b02b468165ebb76edd8f4f4f4271dc7790a25934dd30c0483413513a8303664c999129c21b2c99b4e02300d19cce23ea000ad7454d1d2340dbbf8bcd6d2d2f20f3b76ec385f515131b7d1656c360b68858686867aae5fbffebc65599fd434ed90699ae58661dc2d992c9a84d4b0a8d66eba91201b2425502212804f8b85023392aae1eb720dc3585a5a5aba5c5959f98fbb76edfa465b5bdbd58d269d6e3868a16cf2cccc4cd3e0e0e0a3b3b3b32f1986f1a8699a4da6691a48f0e49e6e12b44a6416c866969404b28016a810762c169b310ce3746363e3dfb7b4b4a01a0448a777b669df80d7868256daf95e71f5ead5c3376edc785155d5e77d3edfee582c86bd0a5580162284d23cdc8091216fb92d2490c53ce4d67b60c50ff9fdfe6fd6d7d7ff634747c7c5eaeaeab98d12d0468356606c6cac736060e0996834faa94020f0a06ddbd5d849875406dadbd211bf514344de772b4b600547bc4738051502f5e591409d4aa5deaea8a8f8fb9e9e9e7f6e6e6ebeb15184d30d032d38df1545a9bf78f1e2474647475f725df7a38140a02d168b197ebf5f0d87c35e1d20f24824e5612b4f1df96c1b25817b501e3c0a0402f7b1584c098542f06fc14c1cf3f97cafefd8b1e32b070e1cf8b78d8a246e246885a7a7a7f75db870e113aaaabea828ca7e4551c220916e54076ec7fb72734f0e5e3192c49596e6398e219f87e77147633143810519214f1665e4b97cc76f3c078e605c07f706711875cd717d6effc64d75f1bbc82782bf53928b8b3b6ab91b3bc682aeebd886ec9261187fbf73e7cebfeae9e9192deedd97bffa8600042a38cccccc340f0f0f3f313b3bfb19d775b12b74034abc6f8410b6f33d012a0c75430eccede4aedc5555559e78c4eab0e2e7e5b872bc1e7ecbb6ef24c00ac003b0c2ca4e1fcbd2d292827f3535354ce8fd1000720f00095ac51dbd5c3cd28b8d9d4aa5e0943fd3dedefe27070f1e3cbd11dad6ba8356daf95e76fdfaf5437d7d7d9ff6fbfd1f53146537763b925a567107e0725727a86050a657d3bb2081e361a28b1a16cd75712b7651a312a3bc04416a54a2b6c5b67052c00c41d0057fc335009304f7a08b80c0490d0df741db25681577cc701161df5996653a8e73abaaaaeaff696969f96fbb77ef068f6b5d5f1b015a462291687befbdf79eba7dfbf62bc160f0614551aa1545818f4bbed6590230c5606641e311d339d88ccaca4a4ffbc23100093130424d6a3930a236962e7bf2214d4d04200014342c561b20b191a0c4d22922378fc04553719d45b6ed6e97dec1c7eba7f45858d475fdfd6030f887fbf7efff766363e39d8d15d7e9b5aea095d6b2ca91103d3030f0b2a6692f5896d5a5288a7f9d9e57de2643020015b16c358b2af23bfa9344bf96a8919595957980237e27faad58458066a7087eb8c7c2c2c2dd600bef21921c3961d82eb13411af2d3bb5781210fb04a085bf5130d0711c5482f89703070efc6e4747c740f15af0a3575e6fd0f2452291f6cb972f3f333333f399f2f2f2de542a05a789d4b2d6b3d7857bc124c3e48799857f0431eed48ddfe16f824604802a2f2ff73e078341ef3c98717c653ae9e9dca733170004d02120e2fb999919cf2c0478e11f9debb827da02b391edc33b35300265369fd9068975cbdc560cb07031721c9495772dd775afd7d4d4fc5a7777f7a9868686c5f57ae87503adb49655d9dfdf7f746464e465cbb29ed334ad535555a965ad576faf701f028b68d601340e1c38e099058cea11d838986156663ae9451f96986a257e4f138fe084e3c009820f6b6e6e4eb97dfbb6323b3beb6d7b25a69910542568adcfa0a1794fb39dfd86c03036c4d034edebddddddbfbb7bf7eeebebd3a275a417a0b85f2412e9f8e0830f9e595c5cfc4c201038168d462b038180d4b2d6abb797b90f1dadf4554173aaadad551a1b1b95eaea6a0f9044738fda12772b16352d5e5ef44bc16786d772d1477c4f4a04cd1046100186d0c02626263c204324916de13b016c03c5b7e56f2d6a5aa23f13aa163649364df3725757d7afb6b7b77fb7aeae6e613d04b22e9a16d375de79e79d07e2f1f8cb3333332fe8babed3eff7fbc44aa499a1f4e5c2e9eb219452ba8738a80000e43b4123a2935d70a07adfc1bc83191689443c730db486baba3a8f5e00c73b7e279865eedc5d68d9907241df19018f9a14da8e679a9e9e566eddbae5695f3806dfe31f9e07262440145a1bcec3b3e11dbf49f331bf1ecb0c84708e7221735d37e2baeed75b5b5bff048e9d2b0000200049444154d3e1c387b1f558d15feb055ac6fcfc7cdb952b579e4e2412af2c2d2d3daceb7a553018d430c00495f347f20cc5bcc3a24ba3046fc0494f7f0f3521ee5484890d2d05eff04961824f4d4d793ea99696160fa8f03dfe61d293d200b993cc594cb1889a9c484ae5a448a791dc4d2981df0be6239e01a00b6d0ccf01802208037871adf9f979ef39e52b7f09707114e723a3c78ee35caaababfbb5ddbb777f673d7c5beb055ae503030387c7c7c75f5e5858f8b86118ddb66dfb31d04862a45897134efe22dfba57a0a64adf83688af1a93171e9d486d6024d0a9a15fc4578473f403303e0d17f944959289604a94d8bd149f13b7c8fb631a288e7c5b6ee00240018c08b9540701c352d51832b56dbb7c37533ad9dccf9999ebff3e5e5e55f6d6a6afaa37dfbf60d155b2e45072db2dfaf5fbffe642291f85c2c167b241c0ed72c2d2d79b5b2c490bac8f7a16358347f8a2d8c52bc7ea626ca081e071b34156851185cd0b2e0afdabd7bb7a761e13712344573905a1aa37fc5940bef2bfaa9785f000f00176d2430d12ce4f301bcae5fbfae4c4e4e7ac702b8006af81d1a173431f9ca5d02e202b2dcfca486af280a36c2f8f513274e7c07a59a73bf63f633d703b482376edc38303030f092a2289f4a26937bcacaca0298401894186499763205258bfcada20355f543f2137309a97530e9b5bdbd5d696868b89b36038d6b7171f1eec241472bfa245de5da038b62beb281963029bc768a79883485d16e685c2323231e4881968167002817db27574cd96c866b67032d6ab748ef5114e52f1f7cf0c13f6e6868b855ccb61715b4e0805f5c5cac1d1a1a3a313a3afa05c3304e3a8ed3e0f3f9740e387150decbb7554c0194fab5574a2ca6131b4005bf0f1cee04236a6804029236314819c1836c8aedc8ce661eb27f96032cfa54a061e179e0ac1f1b1bf34c47fccd672df53edec8f667330f193049a5528e6ddb6f747676fecf070f1e7cbb983bf7141bb47c6363635dd7af5ffff8d2d2d22b86611cd1342d9c4aa554fab356f265650a6c233b6fb3de1ba00f3f155ef80cf061123209a17bf6ecf1000b5a154008a621899d8c14e27c9a6004087c57ec404836473cc60009a9a23f85dc319abdf81bcf02273dcc45441933c7d866edc35268d7bd1cf1cc5848f7d198dfefffe37dfbf6fd557b7b3b34afa2bc8a065a24935ebe7cf9d8c0c0c0677d3edf738661b463771dac847002d3098f4992e97ca5fd5cec495314a9aee3456906414e88fee11dc0043f16fc57f7dd779fe7e3610919a6c37085a44f8ba624e902ec93623f4a36ca03353d82148e8709c8c82678627866fae730ae70ec8d1b3794cb972f4b6d2bcf0ecc467920fd244d5549462291ef3ef0c003bfd0d3d37339cf5bdff3f46282969718fdbdef7def5955553fa7284aafa22895b292c3daba923e1c11c445b0c704c6c4c544c5c40538c101bd73e74e053e2cfaa444f0df4a0b01cd40bc1398a16191617fe1c285bb0047be1ae4c4a8a40cf4ac6d3c661e4d7f344d71dbb687755dffdda3478ffe5db1c8a6c504ade0f8f8f8c10f3ef8e01545515e745d17e56764cace1ac7c8725135d11f054d0b8e764c4498474d4d4dde3f681cd0bcf01b27a6f8be5526ab589e460c2440ccf81b6cfac1c1412fba0870878c00f4cc71948efa350ec88cc3216326cba7b5fc98aeeb7f73f0e0c1df6a6d6dbd91dfd5973fbb28a005d3706161a1667878f8c4f8f8f81755553d298bfce5d67d620455ccffa2f9063310be2a0c9efafa7a4fc302f78a6614eb4d6d25ed4a94a468be2c931fe799c93015f10f24db4cb783c86fcbad87b6f7591877cc44604686dfef7fa7aaaaeae77b7b7bcf14a34860b140cbb879f366677f7fff0b8ee37c565194a38aa29449d370ed039cbe3e0c0efa71c4baf9d01a30310158f887cfe244cc042d82d756013131819afc2eca899155685820a2f6f7f77bb98c74da6f1519ac7d5415ee0cc89ae638c9c9c16070221e8f7ff9c1071ffc2f2d2d2d5385bbdb9d2b150bb4c27d7d7d47fafbfb3f1b0c063faeaaea4e691ae6d675623d2a1247a965e16f0435e0bbeaeeeef62284acb7ceb231308fbc8e56ef7475e67b6eadda3c6791f68016b198204d3ec809cf8fc46ffc86ca1130151159247049f2697e7d49dfa09849110804e2b3b3b3a70e1c38f00b070e1cb896df1d7ef4ec82831676d98946a375972e5d7a626262e20bc160f00955556b65cdacdcba8ee44b9c2dd693e2dfd0ae600ee29d217e31356a39c67c6e2dd99c67519ba2439eda16cd46982ec8490448214001c0ba74e992478d60d99bcdf964a5d32ad2523826d329631fd4d5d5fde2f1e3c7bfafaa6a41d3128a015abed1d1d19d7d7d7d9f482693a03a1c51140595e20a7eafd2e9d6dc5b4a4d020301130f0e6438dd61f681f97df0e041cfa790096e002e681198987c31d283bfb78a69446e9aa8458a2554602e03a058cd02c781807af3e64dcfc7450a48ee3db4bdcf14c79448a3090683b7a3d1e87fedededfdd3e6e6e6c9424aa9e040e2ba6ea8afafeffec1c1c1cf1a86f1094551601afa0ad9e8ed742d8216ab77320f0f6004a6fb8e1d3b3c0d0b83079142bc33419a05fa282f3162b855a2870c54880e7631e20a8e1a342c1c07bf16001e600fdf16785c327a98df6c82fc4830256841e68d8d8dc91b376ebcdedbdbfb4b5d5d5d052d595350d04a134aabbff39def3c669ae6970cc378d2b2ac3a691ade7b60909c8723c4523098780c25037cf0999b67e2736767a7b26bd7aebb2cf6cc154f9273efc81c3265950831e91a5a28d27efafafaee265a734160755668b4e476d1f4e135f9b704bd1541afdf719cdf7cfef9e7ffae90693d85062daf6ed6b973e79e5314e50baaaaf6baae2ba38659163346c008547827535c34e50870f061b5b5b5791a0419ec04291e4f10dbee217df2b800f4901593f40166300f418580064680a2bc203f021ecd4d71730d095ad93534d775a71dc7f9f3c71f7ffc4fcbcbcb27b29fb1ba230a0d5ac12b57ae78151dfc7effa75455dde3baee9d7abbf2b5ac0468a651cbe28e27fc9bbf534b00602152888818261a5e042c313f4c82d61d7103b458ce0632851ca9c1e237924f5125026676663003e78ad1485c53fc7babf8068b343d138ee3bcdad6d6f62b85ac6a5a30d04a9b8655dffbdef71e8944225f0885424fa9aadaec388edc357a8511218216eb58891530f01d4b28c3a90c0daba3a3c33379a021d09f25cdc3e585cc28224b20d1cfc7482c40697878d873ce6311c86077df8dd8727110355f72e88a34e1b7c4655555fdc0308c5f3979f2e4b70b15452c2468e97373736d67ce9c79565194cffbfdfe5e4dd32a2dcb2ad83db6442fdee32138b90052d4aae034c68be004a73b400be045f6b1588f8cabbea8796d774d80c022563ea5ac215bc81b66e2f8f8b8075c24eb8a65aa450d7639f0dacae332df67330ce3f6e2e2e2979f7cf2c92f5756564ee77b3d4ffe85b8487af5090c0d0dedbd74e9d24b8140e0d3aeebeed3753d487f40a1eeb3d5aec349457f16fea6360026373eb3e2284accc03ce44ecf9858f82ccdc37b8f0af2b8449f1f355ac89c657cc0e5ba76ed9ae79c477e22160380199df2996621ffde2a51d862cd2bbfdfbf148944be76f8f0e15fefeeee2e482e622141abeccc9933c7e6e6e640287d3e91487865688a258cad725db172278bef718b7a5017c8c942113f9885f88ebf4bd0ca3e0a487c14a3a94c83e23668d068a16181bb851d7f98040c8d17325ece018f3b8bd1deec2dd99e47a4c1ffcdbababa9f3b7efcf8b94248a120a095f667d57deb5bdf7a5cd3b42ff9fdfe271616166a7d3e9f57075ebeee2d01124619a962b551e67461e2a02e16527550bc4f5cf1c98fa13f4b9a872b6b5c64cb5386dce40372038081840ad0c23b355f1c2b412bf7199c5e58b1d9c5af3dfbecb3ffacaaea9dbcb23c5e85022d637878b8fde2c58b2f5455557d6e7171f198cfe72bd3755d953c96957b8740831509ab3d342facfc98504c41397cf8b0c7cb228f48dcdf2f8fbe97a7a67d5a5818a0c162ac42dbfae0830f3c331c799d301525e521f7a18285c234cd595555fffb9e3d7bfe78f7eedd79b3e30b055a81cb972fef1f1a1a7a29140a7d3a9148ecd5753dc064dfdc1f797b9cc9a45311b4f019f2c364c2ee39a89185c9c510be344f0a3336a87d31a001eac3d0d0d0dddd8bc492cd92a7b57699a7333a907bf84f5d5d5dbfbc7ffffee1b55fe5c367140ab4cacf9e3ddb0b7f96aeebcfb9aedbe6388e8181201df12b77111df150a3095a2cec874902d63bb6a847c490e448563315a360f90e84ed7a3e6548873a821e300f510d82e6b7e469e53e3ad23e45d775dd37eaeaea7efea1871eca7bd38bbc418b551dce9e3dfb84e3385fb26dfb71c3306a417590a095bdb3e98867b9642646237f0b66606f6fefdd5cc2e576c691d1abec325ee9089121cf9c45c8f9cc9933de69e26e51cb511fb63ba5249bf4b928dbb67d35180cfedaa143875ecd7717ea42809671e3c68d1d1f7cf0c1f38140e0f3a6693e087f56da39bf65aa0964eb9c5c7f677a09009ef5dcf11d260ed2748e1d3be65d9a912e4e223a8aa5cf3057c9df394f0c784096582820e3d3a74fdfd57c254f2b3f19439ea9546a52d3b4ffb27bf7ee3fcbd7af5508d0f25fb97265cfb56bd75e0a87c32f3b8eb34f519420a360db3df72d5b77a343416bc06461c63c2609fe0691140e7832e4712da695504328f6be84d9da5feabf8bf9852c1d8c3eb97af5aa57571e0b09c7f07266a2d474571e01585ce1174c24128b9665fd4d7777f7efdc77df7d23f98c9b428056f0c2850b476eddbaf5f94020f0095dd7772693491fca7fa07639cbfde6d3c8ad7c2e26047c5970b853a3c23baa90eedfbfdf032fbc98404d2d8cc9d352d3ca6f74909345ad8b0e79f409ca33231b41521e729731c627fcb14b4b4ba66559afb6b4b4fceab163c7decffd8a0560c4a38ac3b973e71e9e9a9afa92cfe77bdeeff7372f2e2eeae01671c3cc7c1ab8d5cfc54acd6dc0d2e161cfa486f3fd81071ef058d92cafcc77acfe9c6c72a5cf6f844053a51f9132c577a857f6ce3bef78da9604addc650c99c2cd91de7ce57c6363e32ff6f6f6bea9aaea9d1d867378e5a569c16f353232523d3030f0782c16fb714dd34e1a8651a3699a069307da83345f56ee1538dc51cc8f5506a05941667bf7eef5680ed4a44487aff85982560ea35e3805938ab5e59912c524752c1828cd8cb10c1063d5585811e8172658e7d782ad7d36e40b1c00688542a121c7717e7bd7ae5d5febe9e959c8f5c9f3052dfdca952b8d131313cf2412892f298af288aeeb152095921c29290f2b770d375745a772f200b80e1c38e055d8e44b8256ae437ce5f344d012cb34e33340094453801748a64c52474e287ea796569c966d8dab62dc92ce63180612a6ff74d7ae5dff574f4f4fcebbf4e40b5abe77df7d77e7e4e424ca2a7fd6b6ed23aaaa86999a02ff80f4b9ac3cf844873a93a5611aa2f63b43f0b88204ade24c62b154303e8ba950f80c4d6b6666e6eede7edce4552ec6abeb0f5a0290ad655951bfdfffd74d4d4dbf7de4c891d1d55de1478fca17b4823ff8c10fee8b46a39fd175fd93b66def761c27401347e4b8e4dac0ad7e1eab10406698083017c18087131e05eae84f91a0559c9120924bf1998b2c13a551f901a93d987ce80bf411fb4c8eefec7d4299e13d9148983e9fef545959d92f3dfae8a397b29fbdfc11f98256d9ebafbfde6b9ae6170381c073a669b6d9b66d10b424dd217bb7607200a8106181390293035a16a80e30192568659761be47883c2c6ab7ac768a046ad01fa86111d458c6595a122b4b9fd16e52a054553d1f08047efee4c99370c6dbb9f45dcea00527fcfcfc7cd5b973e71eb32cebc742a1d093a669d65996a5819721f25b7269d87639879b55c07f851412382d015a28a70c7f9758b37c39ff9674c4e73f524413065763bd2dbc63e178fffdf7bd858574081cc3b2359211bf3ad0828cd3018eabbaaefff2d1a3474f353636e654f1211fd0d2a6a6a61adf79e79da7b0f34e381c3e619a66a56ddb2a342d095aab9b4ce848685870eec2e18b4d57611ae2458e96f469ad4e96b91c45f310efac8f05704a27fa7aefefbefbee5dbe16014e82d6eaa4cd3435c8160bf3fcfcfc583018fcfd7dfbf67db5b3b3736e7557f9f051f9809697be73fdfaf51792c9e4e783c1e083b66d9791552c6a09b9346cbb9c436e16b453f8b05052b9a7a7c70330104cb9924b9f56714684980ec56820fa8294062c266fbffdb657a686259b193091b5e2b2f709730fb130a3dccfeddbb767cacacafecf5dbb767d39d7749e7c40cbffd65b6ff54c4e4e7e2a10087c46d3b403a6697ab46e460d597533fba36ddf231812c6ca8d7f28a98cca0e901d59f0db573ac57f72b152c672693ad014503bfefaf5eb9ed6054083a9c82ab3d2a7b5721fd19785a3d291da05c771be525d5dfdfbc78f1f1fcba587f301adc0b973e70e4d4f4f7fd6eff7bfa869da2ed334bd9c138216b42d597179e56e11410b2b3d400b5b8449d0ca6538affd9cd580169cf1002d9aecc86090a0b53a59b32000eb96e9ba1eb72ceb6b959595bff1d8638f0daeee2a85330f43a74f9f3e86edc20281c0c7144569b32ccb87cb73ef3eee31974bc3b6d3390ca16325026875757579ab395ed2d15edc91900db430e9085a38167e4632e169fa14b785a57df5743dadbb7411455152b66dbf565757f7ef1f79e4912bb93c5dce9ad6c4c444595f5fdff1783cfe63866160dbb046dbb6bd82f0b4f5256378755dc28ec53b400b1b58209288bf2568ad4e86b91e950db4b000637b31f0b558ba86bb51cbc86176a95346e46b81276d9ae60f2a2b2b7fee89279e7827fb157ef4889c416b7676b6eaadb7de7a4c51949f5455f5a4a228b58ee368b8c57261fa5c1ab79dce61d50680164ad28889d2db490eebfdacd9400bae8e8989090fb4b008b37e3f4b89cb4525bbfb83d617733b4dd37c3b140afdec934f3e794e55556bad7d9e136881a335363656fbeebbef3ee9f7fb7f5c5194c75dd7ad62e13f514390ab51f62e818c587708a0d5dcdc7c970d2f274576f9e573c46a400b951e005adc2311938fa44949a05e1d6891fa90d6b8fa4030ede9e9f9fe8e1d3beef841d6f0ca15b4f4e9e9e9a637de78e3997038ec254adbb68decdebbd7631915195dc9de1b042d84d7015ac83d1413a8b35f411e91ab04b28116342b54e0002b9ed1708296f4d9ae4eeacc32201dca719c1b9aa6fd467b7bfbd7f7eddbb7b8baabfcf0a85c41cb989898687ff3cd375fa8acacfcbc6ddbc71cc729136f0ed022baaeb551dbed78023b2a0900b450aa4682d6fa8c82d58216342d440db9ef01c6b604adec7d447f2d8ec4384f6fd536a128ca1fecd9b3e7af722198e60a5abeb367cfee8c4422a8eef03945518e288a12cafe08f2884c09601200a058af0985ff9087c89a4e92c0b8b16386e56890ca832aa620fcc24c046089db8b6d6c2b37efdd09ee2c139ede496ac675dd3fabafafffd363c78ea15ccd9a5eb98296ffecd9b3bbe7e7e73fadaaea6714453980baf06bbab33cd893003a134e770015cc8e23478e780026416b730c108016342c94a8e1e202d0626d79e9fe58b99fee015af38ee3fcdfededed7f78e8d0a1db6bede95c412b70fefcf903b3b3b32f2b8af2694551f620556ead3797c7dfa187b0463c26028aff21dd012f4919d9f81102f3111a565f5f9fc79d83090fd0c22bad356c7c2337710bc4323e2c67edbaeea2e338ff6f4343c3ef1c3b766c7cadcdcf15b4826fbef9e6914824f23955555f5414652788f06bbdb93cfe0e79948e5dc803b5b440794007b3769394d3c64900fdc3e821290ff46541cb92d1dd95fb863e2d58145c8455555db22ceb6febebeb7ff3a1871ebab9d6decd15b44267cf9e7d3012897c515114b0e1db61e9acf5e6f2f83b1549851407a5bdbdddcb3de46a2e27c5c68e1268c2232323cad0d0d05ded8afe2c59c9247bdf88639b60af691a5279fea9babafa571e79e491e1ec57f9f011b98256f8f4e9d30f2f2d2dfd98a228cf2b8ad20c22fc5a6f2e8fbfb359289cf1e400217278df7df77926a364c46ffc08818680c821808b9143f4197c90c85a90b9b5d9fb889534988bac695a2a954afd6b4d4dcd2f1c3f7efc4e52e71a5eb98256d9e9d3a78f47a3d19f505515293c0d30f1d7705f79685a0250991106c60440340ac5ff1041c4df3272b8f1c3043c2d6c6e814a0fe0d1d1098f60094a09c97d3db3f7512668e9ba6e271289d7abaaaafea7c71e7bec6af62b1446d32a3f7dfaf4634b4b4b3fe9baeed3aaaac2739c1300aeb5c15bed78a8cc70ee620200bcb047dcb163c7bc88a204ad8def6d80d6c58b17bda4696857d080e1cbe25e7e12b4b2f7d132a0e5261289ef0583c17ff7f4d34f5fce7e85c28056e5a953a71e771ce7a71445795251941a825666d13ae99359b94b10918276158944bcbcb69a9a1a6fcf430016400c9384445d6ebc403f18f3dfd6dae9f2f81f4a80d908244243e65840c0c782b60b8002dd014500b973123462685cb2ca43f691c4082be58c33d29870c675dd9f79fef9e7dfcb7e95c28056d56bafbdf684aaaa3fe5ba2e40ab4a82d65a457fe778f847300990228217567038e2617ed08949df5666c7cb49939bcc33cfa29c997a868502a581d127d07891c20320a3c600ed8a4e78995bbb721fdc0bb454553da7ebfacf3cf5d4536fafb5177332e95cd7ad3e75ead4475dd705687d5451946ade586a5a6beb025676649d2600184a2ea33c0dd346ee0556d4b8d6764779b428010016b97230d3217326af43b31a1d1df5b6100348716c337c2fb710cb3e965600adf38aa2fcccb3cf3e8bf735bd7206add75e7bed645ad37a4282d69a64fea1830156300d6122b28616aa3c80644ae73cb431029498882ecb31e72e77719185e6c49afc60bde36ffa132f5fbeec254c73f271476a915b977f2bb6ee155600ad0b9aa6fdccd34f3ffdd65a9f3e67d07afdf5d76116c2110f4d0be6a1f7929ad6daba00ab36fc25b5b5b5de2a8f4981cf870f1fbe4b8790a0b53699aee568561e10fd58d076f18276859d780064dcec82bbf090ddbd967b6dc763ef055a9aa6bd0dd07aeaa9a7cead552eb98256cdebafbf8ec27f300fa16949d05aabe485e3b9592b9373e1cf82339ebbf148f3300fe16639953c39f441ba02c1dd72e1584ca069317d87fd23567a285ecbb6c69557d0b4ded175fda7d713b4aad39a9604ad3cc716f7dac3653019a06d810fd4d2d2e26d7081955d3ae2f3147296d3610a221a28944ef13ed39f05873ce80ee82b1c27ab3bacbe3f56d2b45455fde9f5340fab4e9d3a75523ae257df79f73a12be118014fc5770046355879f0b5a164c44ee1fc9cec764929487fce5ce2bc03c67fe27fa00d15bee840426fcdcdc9cf737ab70601181464693bd702dd99a575a41d37a0b9487e79e7beec25a9f3c57f3b0f2f4e9d31f8d44223f6518067c5b77a3876b6dc0763f1e93069385bb72e31d5505103d84a695dee0d20bc193af05a7314c4872b8b6bb0cf3797e46020142583c1014814f717a7adaabecc0b241f07971c76f2c24e80f4900ce2e792695539b85bcf139994c9e0e87c33f7df2e4c90fb25fe5c347e40a5a156fbcf1c6e3002d5dd79f12c9a56b6dc0763f9efbc2317c8e551f20064daba9a9c9db6d1ada17002bbdd9e5dd0d16a8756d7719e6f3fc2495427b0528d15c173768c54413ab94d20fc68d1af2b9ff563f9781b90cd07292c9e477c3e1f0bf3b79f264df5a65902b68959f3973e6d1f9f97980d633d88947a6f1ac55f4778ea7bf0a1300930313022f7436cc4598883059005c3415619ed0b782c9245ff94980810ef4053428501c060707bdadc3f03764cc0d88712716b613bfcbaf055bf76cca967cc4f426b796699aaf969595fdfc134f3c716dad4f9f2b68959d3d7bf6f8dcdcdc4f6a9a8684e97a9930bd56d1df399e2b3c4d44801173dcd0c1d8b8150c798016cc41bc601ab28a2699f4b9dd5d9e2532da014e48a3c26ed2c3c3c39eccd1173003015e2c17048d0ce622fd5c528af79680085a42699aa4699adf6c6868f8a5dedede35ef329d2b6885cf9e3dfbf0c2c2c24fb8ae8bd2344d12b4721bba8c5801b458a286fe2aa8d4f80c6d0b2f743acba288a57f73bbb33c0b12204994e5ada1dda2aa03f63a84fc493c95a095fb7811cde934393a66dbf6d71b1a1afec3b163c746d67ae55c412b74eedcb9639148e4c75cd74511c056594f6bada2bf733c400b2174fa4796f397ecdfbfdfd300c42dc6016058f1658df2dce4ceb398430870421f40ab42d410c11098e1d014a479989f8c99452054e28dbaaefb37cdcdcdbf79fffdf78fadf5eab98256f0c2850b47e6e6e6bee0380eca2d77cacaa56b15fd0fcd4346053169a86dd1d7059304693d3011497e14778291553472933bcf022891dd8e0500a621ca2b339a4806bc74c4e72667d2493276e3595014e52b757575bfb79e35e2bd8d2d2291c82b8ee37cda75dddd72638bdc3a159386b5c7595d00fe12685f0033b2b10f1d3ae4f955185da4735ed6dcca4dee3c8b845e0016fe9d3f7fde9339be0705027d02df95a43ce426678c5751534df3b6665dd7fd8b969696ffedc89123936bbd72ae9a967f6262a2e7ecd9b39f0e87c39f715d175b8805b8ead3b9294ba764ef8e6ca54d3071904e525f5faf1c3d7ad4335f6016ca52ccd965cb23202b921c9961c0951f9a2c34582c1cf065019cc8c3027865d364b3fdbefa566ecd23095ac482b4ac01547fd2d1d1f1e7fbf7ef9f59eb93e70a5ac6d4d4d4ce37df7cf3c56030f839d775bdcd5a2568ad55fc3f4c30cf762634aacece4ea5b5b5d5032d38ee39d9b29dbb9d7fa7cf0ff2a3a902799017474d6b767656b971e3c6dd082dbe47641660b7d24b8256f6d145ee9bc0851b5355f5f77a7a7afebaabab6b3efb153e7c44aea0a5cfceceb69c3d7bf605c330bee4ba6eafa228656bbdb93c3e3b6861d507d1148e614ca413274e78fc2d440f2568651f410cb9678216352f98dce06361b71d2c040c7090ff960d94b2fd9ebd855bfb08b132ac408e1ef0f97cbf7ce8d0a17f6d6e6e5e5aab0472052d351a8d369c3d7bf619cbb2b0b9c571d08744b3100d9145eab2774736f3101dcde274305db0e905527be0f3c2b9327ab83a19d3f70733909a16eb9161a79d8181016f112068913797ad7f2468ad2c7f91114f8dcb34cdf7c3e1f0cf9e3c79f20d5555d7cc8ece09b4d0ccb9b9b9ea8b172f3e198bc57e4ad33494a7a9741cc7bb1e556a59a46e75136aa5a3c824a67605de164c444413593430fb5db6ef11e2a4a1b31d00c69d8fc1c7429ee1eddbb73d8d9659070c8010e4ee2541095aab032de6784297314df36c5555d5cf3dfef8e36baea585bbe50c5a535353158383838fcfcece8215efe51f2575c8b90000200049444154dab6ed3900b8aac94269d9c122db4a8ece868685caa69027ccc2c6c646afb2295e72dfbd9565ccd59d8e60bcc327083082c90d8a037c57a2431ee086f3a879499f56f671bc12a88b39b3d0ac6cdbfe6e7575f52f9c387162cdc9d2798196ebba656fbdf5d647a6a6a67e5cd7f5e7144569741cc7dbb055d4b464487e752bd14a9dce7c444c2296ae8189088d0b3e19f9bab704e8a2201f0b200fdf2022b2a897050d0b40c6cd2a305e49865c4d42bad4b4561e7d94278320baaec76ddbfe467575f5afe6b2516bbea0157cf7dd778f8e8f8f7f4155d58fabaabac3b66d5fa6a6253581fc408b89d348e28569085f16cc42f087e0dfc28ed4f2756f09008cc885235f081309551cfafbfbefeeb08305014006331c60c51a67327a98dfe862850c01b422aaaa7eb5aaaaea3f7ee4231f19cde5ea399b87aeebfac7c6c6f65fbe7cf933a954eaa56030b8c7b66d3fd350981e2157a25cbae587e760c289e676e6a2001a447b7bbba77101cc60ea60e261b271976a91d345c73dbfcb669ee6d7faf53f9bd90534f108f2785eee108d8d57015a226174fd5bba3dee48b31ce3325d1b6ebaacaceccfbabbbbffaca7a7672a1729e4035a3e70b5de7efbed4f5a96f5b9502874d834cd20370a90a0954b772c7fce72fc371c09c001331e7989285c07b0a2660b1f0d060a26ea567ed18413abb972a2b0001db42df2ae00568816c2cce666155b593e1bfd6cac57065cc0c23a3f3f3f1a08047e7fefdebd5fcd85a395af7908ae56ebb973e75eb06dfb8ba150a8d734cd3282161380a5a695dfb011b30a96032f4c3e0016342e140dc431d0b0308999ab486a0499e104bcad404911291fdc5e8dcfe70df0f4be8618973333331e60c1d406b8235a08f9c957f124002b815890aea4d16f18c6bf3f74e8d0a9d6d6d6582e77ce47d30257abfecc99334fa752a91f0f85428f9aa65961dbb6cae84c367f402e0dde6ee770a5ca340bf9377791017001b43011e9c7c1841535114e6202e15600adcc6722ad81008dbc41d47987c31dac77c88b541c9121bfddc6d57a3d2f418bd41d4dd3cef97cbe9f7df2c927cfabaaeae4d28e9c412bbd9a55fde0073f786c6969e9c70dc378ca34cd5ad7753596f9903bf0e6d2251f3e271b6871776438e6e1a8dfbd7bb7b273e74e4fd38266016d4bf45f890460518bcbbfa51b7305022f9e05da1423ad900b59f060bc235208ba081654960282cc64a0a8b8fdc6e8617a9c260381c0bf0483c15f79ecb1c7aee67ae77c412bfcce3bef1c9b9999f9a2ebba3013db401d62f89849a9b9364e9e77c7bc592ed3801a061deff89b9536b12906b85c24f4653ae2713d9a52a5ee8867e9183cbfe8c3624dfdab57af7a72612234bee762cae3e5382b9e04e8d2480746e67d3edf7fafadadfd5f732949c356e60b5a81ab57afee1b1b1b7b39994cbea428ca5e5dd7fde9dd36eeae68c513c9f6b8f24a8e78f8afe884c7c444d81e9a047c5c00afadee5344c001da93b8f1073e531628e827faf2683e8a51c6ed318a36e629b12862f14c6bb5375555fd4ffbf6edfb6a6767e75cae2dca17b48c898989f6ab57af7e7c7171f10b9aa61df5f97c610c086800ab6114e7daf0ed725e36ca034c4230bbc5c9cb2281882c1e3c78d0d3d4a851d1cfc8ef4a1dd4600e02a4691ee2b93041600ea2ce3b8311f89d7b1cd28c1465bb5dc6d37a3f27330bd209fe171dc7f9d523478e7c375727bc6761e4f310aeeb7acef88b172f3e353b3bfb138140e0442010a88c44222ad24eb8eae7730f796e7e12000d025a1776ac8696010d8484552e2ae43471035268cadc9f0e60b812e8e51b6c11237e7490d3cf84f6e03b8010225000275038983788dfb138e27826902332880821c61e5ed26795dff8c9f76c2e2a96655986617c5f55d55f7ef2c927d7bc41abd88ebc400b17725db7f2fcf9f327c6c7c77f22140a3de5f3f9eaa3d1a8064e062608fc5bf2b5711200e8c07c848f0befd0cca8aeb342aae8f32240f19d0507f90499feb57cab4c88c459b10203eec7bc41b457e49f71571c9c0b6d128511f12cf8870821feb17475a96b921b37720a73672187d3ab0b5f5353f37b0f3ffcf0503e572f0468852e5fbefce0b56bd7be585959f931dbb6dbef80ea9d3dfce4a0c9a77b0a732e1356a1fda2de3caaa0523381da4e9f8fd857fc0e935f74da8b66256b52e5d3caccdc40d18c43bbb1e8d1f40358717f48b49f5b79214a0a0d0ba005cd8bb983d024e5166bf9f44efee7a2bfa0ed2793c9a96432f9e5fbeebbefcbbb77ef5e7389e5426b5a81a1a1a17d972e5d7aa9a2a2e2a54422b15755d5001d700c41e7fff8f20ab94880915c6a3198c8d0b8dadadabcbc45b1a4308e617f91450ed34c043331da286a68b9b48dda147d4de494d1498edff1193e3a5611857908c0c2dfd0b06edebc7957cb12a3a22495cacd6c73ed99c29c47d04a241203a669fece891327be5e5757878d2d727e1542d332e6e7e7dbcf9f3fff82a6699f374df398aaaa65682c06981c3439f74d414e2425808453faa860be83880af00208e01f5ed46608183c8f8dc904b07c2913389f2e04b49535dcc9b1627923f2ae703c342a70afb06b0e5e186bd426711c3ef33be9d32ac830caf922e80b68c4a954ea4d5dd77fe999679e795355d53bdba8e7f82a0468a98b8b8bb5972e5d7a627171f1c7144579c2b2ac5a38f965f430c75e29e069cb9153b9e92b6e03ad0be0059311fe2172ebe8ab127d5c043272c70ac173c235082cd4f4e8c312690c00af4824e2011518eed0100968626434333a5a4051ca4be52081f45841bace3fd6d7d7ffe6830f3e783d87cb7ce894bc410b57436dadf7df7fffd8cd9b37bf100c065f88c5626d706a61f5969a56be5d94dff9697fc25ddf0eab76d2b4e3061970d003bca081e11c2c384cbd58a905f9460fc5941afab748fe048841f383890ac082831def8c2472cb7ab17df4c5d10f27c75f7ee327dfb3d3419f69c330fea2a7a7e74fbabbbb6fe77bcd4281967f6060600ffc5a5555552f4722917d814020c8749e7c1b29cfcf5d02744a8be62135149232010a4c1c0660a16a049cf6f88cf74c463d5ac3eff28d1e66263903b8d03e9880f059c1c90e1e1ac015138094078011c14bd4fc3235c47c413577c9cb33218174b06420180cfe2f478f1efde77cfd59ded82b8468916fa8284aeb37bef18d67cbcaca90d2f3503c1ec74617aaa43c1442c22b5f831353a40860f2735764f29de89c164da84c4d478c0ee278685cd0c06046420ba3a646130ec091694212d4f0be1ca811a81815c43170ac93c50e9022376bb5956f338195cf4c72294d5931122aa3dbf98fcd6cb9b16913ffaca228bff4f4d34fc39f756767913c5e0501adb48958f5c61b6f3c1a8d46bfe4f3f99e4a2693f5aaaaea92f29047eface25452000800384504313aa633f955e93ef3b497cc88207fc33b77a781a98f63716dac9ed078000830d108867496f3fef89ea046e738fee63f80063695a07685efe96fa3a9986dfc90104ba014414ea45388cf4fcd8cd1c65588591e720f095096e24225cada308c582291f8a7eaeaeadfc8b5bc72e6ad0b095aa1e1e1e123172f5efc6c4545c5274cd3dc6918863fdb6e267234e42f019141ce892a9a45cb9147f91d3512112444738ba04060416b010c003168d1d4d498882cd21570ac783e99f774b8530b23d521d31f254e847b49291374c5e7669b57326f252527fff1c7852573614c4786a72391c87f3d74e8d09fe4cbcf624b0b095ac6e2e262f7a953a75e2c2f2f7fc575ddc3c843247b397fd1c82b2c270171c088939f9401c85fa40b64260c8b5a552648889a080724efc1eb50b3a189c86bb05da28f49fc8d661aab87d27ce37904b6d59887e26a2fb683f2229012c4f85cd442e5c8ca5d0290e54ae5c07d3edfe0d2d2d2ef3df2c8237fd7d0d0b098fb9d7e786621410bd76a78f5d5574f3a8ef3254dd31ef5fbfd35a954aa60f728c4036fb56b60c28a6095c9a3a2b948fa4026b065d216324dc54cb38a00410d0d66e24a3e2d9e2f1e236a3e6c97a8e9115c184458a9cf329f972049a022a39fec7d6a7ed40cf30d246cb5f1b4d6e7c9025a8eaeeb670cc3f8f993274f9e5febb5ef757c410185d487919191cffb7cbe170cc3f0527a0ad558799d1f95004104eff4396162d29794e9e32138d0a14ea6b9e8e7114d4cfaca44df9158608fa574a94589e0448d261358f0bd089e3c6739f3305b9fd33c5c49d393e6613629e6f7fb0ae6e182e338ffa3bbbbfbf7f6eedd3b96df5d8aa069a5cd0cdfcccccceeb367cf7ecae7f37d46d7f5fb2ccbdada3b2b14aa2772bc0e0180a085cb10b0f01d9ce5990e6e317a4750cb1c780421924d015a995a4aa63f898f404012576191da209aa488128a80c7cfd494b2694264bee33cb487b98a70e8c334668e65a6c648909394881c075efab42c8ef89bc964f20f1e7df4d1afd6d4d4dc29bb518057a1352d5caff19bdffce6538140e08baaaa1eb72caba650d48a023cef96bb0413d3e910177d4d98b048d3013080f3441a81a8e9d06c5ac9112f6a56bcfe72cefd7b99922b998fd4aee85fa2d92982d74a9dc67b420ea064309a499e179f55521e8a33f457a03cb8baae9f8b46a3ffe1a5975efa6e21ef5e50d04aafa06557ae5c79706868e8f38661bc804d5c5dd735ee3529b285b40bf9b09bf15aa209256a28d446402f200d80e61f272099e33407214b4c5c94a1c11e73dc3e8cdb67617307a4c110bc98cccafbe29ebc166b5451132288b0bfa8794193e36b3970c271f41f89ce79829f785d110845ad8d5a24810df22048e319b8db36de212fdc13662f7e43f507d4d6c23f0685200f1c47d9e219c969c3f3e03ed44e65ee62f659c385037dc22c8ac6c6c6f9c1c1c1bf7efcf1c7ffa0b5b57524fb55567f443140cb373434d43d3434f4a2699aafa8aa7a485194909a1eb1f772f4aebec95beb4876b4e85017a35de20415138bb908607291fcc9341c4c46f2a2702dee87886b91c009f002db5cd454486160d234b520511b22b0f07db9d22fe2424402279f49344dc59e24e0891c2e9c0b20228030a288ebb334cddebd7bef267c8bb5df716ddc0be7804d8f123c7807f31f5a273ee339c1fee7bd713f7c07d901bc00fa728bb1d5cd372e7ce803c831140a5d5f5a5afa8fc78f1fff5a6d6d6d64755759dd51c5002d0dd54cfbfafa1ebf7dfbf6170dc3785cd3b45a5555b5cc08122347ab6bead63c0a9d2d868c2123560dcd746a4302f4f1505b407d2c8012cc227c4750206861d2d2e98edf30d9f137262398e7a896c0341ed1178663c40a0fe2f5e8db0278889bc11200c5776a2aa2492a6a7674e4e37e64d98be628c095bfa13d784eb0f30136786efcc3b5096cac12c1d23af4b9308f91cf8d3c4632efa95552c3224d44e6ceae6ece31582368cd663299fc7e5353d32f3efcf0c3efadee2aab3faae0a095366bc2d7af5f3f72f9f2e55782c1e0c75555ed421a124d1e364f74e2adbec95beb488216261e898e62e13bfa9c38d1e9bbc1c44555069882389789c5b806272cce65213c6a169cf85c11d10798bcd0ba503d015a084d2b5c5734ff382869eee11a341f330156d4a8452d2b93fc09d0439b599686c0c95e0648019860f6e2580234da856be1b9c42002419d40876b13b4458d0ae7e11f769ce6338b8e7c1158b7d6882bfcd350a3e5957d3edff4fcfcfc571e7ae8a13feae8e8b855e83b160bb48cdbb76fef78efbdf79ed734edb38ee33ca8284ac59d3cdb1fde521cd8857eb052b91e7d3ea2d9c4950b13981b8460f262d2b20e161299f13700479c94e2676623102844da024192a084498adf014230a5e003c23bfd69cbf9a008622bc97a399fa5087004655e4bd4aaf0b9b5b5f5ae46c56281a2669569768a0b2317453ebfe80ba4e6887bc0ef75ebd62def99a9f951eb938cf99567122d038e35c8d5eff75f4aa552bfd1dbdb7baa508452b115c5022d757e7ebeeadab56b1f595858f8bc6ddb4fbbaedbacaaaa415f08cd85edee8817cd23d1b14e80817f0a00857a57f05901a8c4481b4d19821e4d2bfa670042743a8be638b525f8b8f83b010f0304d7056002b8a8c5c1b4c2f5f03d9df938577c652e44a44588e9428219e13d0bb43f3c17cae30094a955e15c6843f85d042c02138318628490be3e511e046802903806d17efc8ee7411e24cc5180177d75a2f95b2a0be17ab613b2137d89b66d27fd7effd76b6a6a7eebd8b1637dc5684b51402b3da802a3a3a37baf5cb9f229d7753fad28ca7e455182cb39e48bf160a5724d6a1d747673723319195bdd67faac38c930d10068f89bbc24ae7cd460702eb50ab1f89f58680fb2a25647163a7d516807273dafc30823fe8679752fd3505c98d01e5c1320816be21d7f038c33b56f6a7d74888ba0445e16cec16461d081d14c3c4ba639caf6896047e004280224c96783e60a3399e025a387d9352df483601d4c1886f147870e1dfacbd6d6d6e962ccc36282961e8bc51abffffdef7f146598354d3be1ba6e2dcad87035943ead3b8448d1010ed96022c25705273b1cce98bcd47c1839e3ea8673e903a309279a43a276c1c145f38abe3031f999da0ba39964cc8be78ada54b6d2433c563c478c4052a3b9575491b2a1664800c2dfb87726254304a6b4a97277e7695166d410701d6aa5f8ccf23bd0b610a4400d7af9bab704385e308e4dd3742dcb7a0bdb84bdf0c20b6754554d1543764503adf4e00167ebd0c0c0c0cb3e9fef138661746b9a16c0808029c009c5012baed8a20a5f8c072fd43509bc2210f3daa25398da0c6d7f6a3a74f8728201ac4008850f4bf44115aabdf23a1f9600f95e99010f6a72e82feca3088d129a2a23b4ec6f98cc34ab790ecd771c2f061e4a51f6e22276aff90919a5017f76767616693b7f78e8d0a1a2a17db141cb181f1f6fedebeb7b3a1e8f7fd6308c87354dab4aa5521a5677d1c9294680d8b9a5a0892d075afc8e8e5f72ade8bb21018f540398788c06c26f0540c720e02614a538d84ba5cd995a3f35422e9af069c1af87e82aff01a8604e227a8bf2cf22e01104495bd92a8efc7bcd4f009650a9e392a669bf7ee4c891538d8d8dd1628d816283963a3d3d5d7ef3e6cda3b76edd7ac5e7f33defba6e87cfe7f3d34f92094ccb09a7580f5f88ebaea6fdf4c3d0a78373e8830240c16f45be159f9fbc2372b80ad156798d1f9580b8e8d0cf95f91d26258089bb004d4c4c7801028c61fc4680036071816280a1d4412bdbf8c6f362a14da552d1f9f9f97feee8e8f8eddededefe628eb5a28256da44f48d8e8e765eb972e5394dd35e49a55247cbcbcb2b62b1982a461ec4152f535329a600f2bdf64aea33fd254cbf410743bbc23930ffb052b7b7b77b9a151de61cf4a2b6996f1be5f9f79600fb88e38fae0afa07e933849f91e45338ea47474715a44591804baa06fd85cc0428f5e8f86a2c0968a3a9546a786161e17fefededfdab1d3b76cc1673ccad0768a99148a4baafafaf379148bcb2b4b4f44c381c6e8fc5624626e94f74d08a91a7620a20df6b931c4a1381d13f520f44073427023a19da15fe71a5a6e6293a881991c9b78df2fcdc410b8b0b291fe81bee5204ad8be0057391d4135240e8abdceaa095cef55c721ce7d57038fc3b8f3efae8455555dd628eb9a283565adbf2f7f7f7774d4e4ebe108d463fa369da11dbb6cb0381809ac93c2e35f37039d0a2f62572a10066884c21970efe2bf8b1f037a267e20067948ee661260faa9883613b5e3b9b7948fa04e91ee85b72c6f01d3309f04e763eb42f910650ca72cd661ee2f7442231140a85feb8bdbdfdffdbbf7fff4cb19f77bd40cbd3b62e5fbefc702c16fb6c3c1e7f5ad3b4d6603068309a56ea8ef8e5cc399a1c5885013ed0ac101d244194fe2a6a639c200cc14336996934c51e10dbedfad91cf148f1411f70076e266d536b86590f473d58f5f8070d0c2f1262b7cabe8bf79a9fa9542ae9baeebf363535fd566f6feffbf9ee1ebd9af1b72ea0456debc2850bddc964f2633333332febba7e381008945b96a59632e581397cf461d07f450226352c38daf10f13809504c4f07926e811c0648dfdd50ce3dc8fc94679401f312f925a96c8f2679601800b3e2eb0eae1b7a48f8bb497dc5bb8b167aee0b37541148fc7e3a3e170f83f777474fce5debd7b8b4226cd94c07a8296b6b0b050fdfefbef3f1c8d465ff1fbfd4fc562b1565f3676e2c6f699e73427d746e495a159f81b1a14b545b16a26410c3e11f0aea061898e799ccf1a4e1bfc88f2f6794800fe2c68cef887fe047081d3052a0493d7455f2d99fbf88e8027fabd369b0f8c0a05c73ea76b3299049134a569dab75b5a5a7ef581071ef8603db42c74d5ba8196e8db1a191979de719c971545b95f55d572645ee4316e8a7a2a1de3e9f67bf7a2bf02ab287c525c55f11b6b51c19c80e9d0d3d3e3f9ae006ef84d242812d88afa00f2e2459500fa9e9a33c705000b6c7a685d249a8a1a0bb568462339b6e826c87c2fea0364b938b54ad276d20b3300cb715df7b6a6695feeeeeefef39e9e9ea9f56ae77a83969748dddfdfdf3b3d3dfd996030f88c6ddb3be00258af075eeb7d445a06557d51f3c2ca283a5d014a002c68560d0d0d5e1a0ea380f46fd02ccc0c42acb56df2f88d9700fa1ada16162f2c4ca4ae2077717272d265c5d4346bdcdb719d916632cc37fe29eedd0231f5890bb6ebba8ee338715555dfaca8a8f8cde3c78f237527ef9da3572b877505adf48ae21b1818e81c1c1c7c4e5194975dd73daa284ae566d5b632cdc3ccbfc1b11243e218b4002b945441a41009b87c319a0810134ba3acb6b3e4719b4f02a206c5454d58a4dca1a1213b1a8d3ab1580c39b7bacfe7f36a06303acc48a467f6a4cb366d261391591d3467d14ed334938ee38cf9fdfeffd6ddddfd1785da8475b5bdbb11a0a5cecdcd555ebd7af5e8f4f4347212015e9d696d6bdddb934d50a279c80e64d48ff9822c2207c06a6969f910bb5d0c198bc44591cf95ad0df2f7cd2b016ad6181374d833995bd775677e7e3e3133331383e6158bc5c2aaaa060dc3d0382e4480da8ce621fdaee41da65d2273baae7fa7bcbc1c3bedbcbb5ebe2c8e820d01096c74d1dfdfbf637878f8295555e1db7a4851946ab88b36dbf014418b3e289a874cdbc0df880a42c382d31d4c77685fd0b258a58120c515955a179df89bedb9657b562f0191084dc2747a6c38555555d199999989b1b1b145a4b4a1f289aaaa15814040f7fbfdea7235f6e9e35a7d0b8a7724a3ab0c26589695b42c6bb8babafa3fd7d6d6feed7df7dd5754f6fb724fb651a0e5e5248e8e8e1e9a9a9afaa4ebba2f288ad2837a5beb1d1cc8d6ddf7320f3950014e002b68583007a16d0190b042656e844a1f96b0127bc7c957e94a205d92c58b148a01192c469665b9959595b1643239108d46fba6a6a6cca9a9a9eec5c5c5dd9aa6d5f8fd7edd344d6f0e8aa6e166320fc576b9ae6b5b96754b55d553cdcdcdffc7030f3cf0ee46f4dc8680567a25d14747479b2f5fbefc187c5b8aa29cc09e89d87373230471af7b669a87384e340f015a5d5d5dcace9d3b3d472c9cb200227ca6939644438016352e92133739e3633375c5a66c0b35108e098c07fc039841fb5e5c5c4c9595958d0483c1b3b158ecdacd9b376b6eddba757f3c1edf8f0d5f8c8c2a8362da97f879a31e3e23b56ed1b2ac0b3e9fef7fecd8b1e3efd78b9795f9ec1b065a69e00abff3ce3b3de3e3e31f5355f5454dd30ec662b1b2f2f2720d1a0b72bb58778ace4d515d2d44a79282c04147c633cd37fc4ec228a33d8cfee0d883070f7a26200628f7cf631a87e4616dd454db3cf75555d55114055b685d725df79ce338b7171717db6fdcb8716c6c6c6c5f2814aa84c685314557016912003f7ccf3237622a91e863caf769e9eea05645ed1f8b2eac857452b8198fc787755dff979d3b777ee5c0810317d6db97b5a13e2dde1c554cc7c7c76baf5ebdda1b8bc53ead69da538ee3ecd0340d9c53557456d31c13359d42f09cc4541a1104192dc13b72ca701c0884e84438de913bd8d1d1e199863409b98b0d174f095af94ea7ad713ee800aeeb2227ef8aa228ef2593c9c8e4e464c7c4c4c403a9540a8531cbb8c51e499c0425b1f2ace8a8a706946fe91b5e474c6762b55812a7354db31dc799b56dfb4c5959d9df777676bedad9d93951ecc4e87bf5fe866a5a696dcb7ff9f2e58eb1b1b1a76cdbfeb4cfe7eb354db306800630001030d2422d4be48e7095c8757867a6e190f84790a4cf8220463229cc416c148ad550a430e033097912b472ed95ad735edabde0baae6b398e336718c6355555fba2d1281cf43b4746460e5b96d5a6aaaacf300caf8000352c68efa23b415c48715dfc96eff817ab938840c94200e809dbb6975cd7bd140c06ffb1b9b9f95bcdcdcd03353535f31bd54b9b01b43ca7fce0e0e0c1e9e9e9177d3edf0b8ee3ec314d33545656a662e2536d25e5801dc532aff90a8ffe25aae2e98ef2d4757c87541c7c065110ab4f7777b7b263c78ebb9b2188a91962b99d420caa7c9f4d9ebfb112c0d84a9b576091db9aa6cdfbfdfe21dbb607e3f1b87afdfaf5dd914864572a95424451c378e34e47dc8751dccc43ac3081eff3dd78435cb41920123984baae5b4b4b4ba37ebfffb5d6d6d67f686c6cbcd0d4d434bb9e64d24de5d312cc44fdc68d1b8dfdfdfd27a06d61576acbb29a6126324915c78ad1b7b49696f788e44a830b89043a3acde9cfa2e987a4e7ddbb777b26212b0088a565443a0455eebc1b292f50b2122068e10152a914342edbe7f32d6a9a36eebaee5c341a2dbf75eb56ebe4e464b5e3385e2a2ec71eb32d444a05c717fdabf9fa75095a00407cc6fdb9086b9ae6fa7cbec8e2e2e25b9595957fb77bf7ee6fb7b7b7a3f67b72a34c436f9e6e96d1e0ba6ef0bdf7dedb35393909b2e927154539924aa52a755dd7b8ba5055264933df0e235009e0e925488b11133823512b092f9884f8c7faf6e2c01155f7cd2253d98e8d9700a3cf64c1a7fdb0b6aeeb095555a3e170d81a1f1f0f0f0f0f97cfcecefa08720ce6d0fd208e5171dce63b07e87aa15580b946d0320cc3d2757dc0b6edaf3737377f6dc78e1d57aaababa31ba9656d36d0d2464747ab6fdebcf9402412f9946118cf5896b55355d580aeeb1eb88a5516184dcc97d3921962e6dff46de11d8e781046f7ecd9e3e51432f19949d0d4fac8e9e2b985d206377eeac916e42a0191f98e714157040c0744df7c3e9f0daed6f4f4b4313232a2c30581e358979ea0c5eb70a114ad825cdbc6f129b691f30af985d0085dd77da3aeaeee2b1d1d1ddfaeafaf47e9196b23b5ac4d055a6901fade7df7ddb6b1b1b12782c1e0a71445f9886ddb0dd8999a2a32a908f8bb103e2d116844f0e140807f011142988528e00fa0421bb81aa18203ae01df9b18b21607593e834a9e5bda12e058c178c0d8c9d0b85c140d04291963e8c68d1b619a85a300001b0d494441542ab62ba3235e5c40ef650de45baf8bc12d6a6fe9798572c9f14020306cdbf63776eedcf9b77bf6ecb9b8d1662165b069ccc33460a8b76fdf0e4f4c4cec999a9a7ace75dd8f1b8671309148543a8ea371730100047d5df9761a372ec0f558704f1c5c1874bb76edf212a069ff13dcc40e2feda9255bbf5112c0980221995c2c94b4191c1cf4be430048f46f7121a47b24dfb18f67a62f8bae974020e01a86615a96359e4c264fefdbb7efeb6d6d6da743a110280ef646c949bcefa602ad341868636363353013a7a7a73f1108049e360ca3cb75dd10d46886624933c8d73cccd4ae32afc70d28601ede6be5db0c1d29db509a120058419ba705817cd55bb76e29b3b3b3def7a03d306ace314f677ca12835043f9fcf876aa4762a959ad534ededb2b2b26fecdfbfffdbb5b5b5438aa2c00757d40d2b56db839b0eb468260e0e0eb60c0c0c9c88c5629f2c2f2f3f6e1846733c1ef7d9b6ad72071b746abe693018344c5ae52612dc59051142f8b1402a15d57c1252a5cf6ab5c34c1e772f09b01020dd147887c908e0c236651883e26f22801502b4589d22ed47732ccb8ac6623138dcffb5a3a3e35b9d9d9d97154559d82c80b5e97c5a82dd0e300d5eb97265d7d5ab579ff4fbfd1fd775fd0155556b5555f52a41409d658e5f3e5302a007f0c32a063084ba0cd08266053f16f625a4735224dc71f0e4736f79ae940023d5622e2a0004659b070606eeba2cc4289f98c25388e861ba1740c748d8b63d6418c677dadbdbbfd9d1d1016d6b7aa3a38599a364536a5af46fa1cae9f0f0f081a9a9a9e71389c4f3a150689fcfe72b8bc7e31a7d51f99a87e24a237e860f0bf4066a55004986af39c0448d4b4e3f29815c2420904fefee1900cd1e1c40f8b7868787ef32df456d9f34a07c4b1be1fc5028e49aa66946a3d1f14020f0465b5bdb3f7775759da9aaaa424587642ecf55cc73362d68a5814b9f9c9cac1f1e1e3e363e3efea26118d0ba3a4cd3f4a3fc23d37c0a2520aae1c82b8486057f161ca2f425d0f1ced50d03a710ced042b55f5ea7f424c085102d6780097e2c8c39506d2e5dbae4bd639c65ee02c47199cf53e39ee08ac18f158bc5deaeafafff464f4fcf779a9b9be1c74249e54de1c7129f715383561ab802d7ae5d6bbb79f3e613f06fe9bafeb061180d9aa6e900ae7c571a0e1a5218406b402234c2d058d9586644a45c10b4988d9fcfa091e76e6f0988da13dd1090083331e0db9a9898f00a4a62bc9132e1f976d2e599f39120f858aaaa2edab67d251008fc2b92a177edda453f162a546cba57298096478398f9ffdbbb16e626ae2c7d1f2da925cb0f2c30d8060309864c0224610249c8ec4eed23994acdffcdeece66329bccce569e0408c99ac4189b600cd804095b922575df3bf5f5dce3e9684c1a21195ad27195cab2fba1d6776f7f7dceb9df39e7c183f9d5d5d5f78220f87da15038638c19dbdcdcd4dd3633050121ae455d74507914c1779c17423f4c14d266c52dad78f67dea46952fa86f10c0dca2ced49469410b41aee5bc585c5c8c5c45129452a8a2db6469085c3dcfaba343b4b5f67f666767ff637e7e3e9571acbeb2b49cb5a52a95caf8d2d2d2d9bb77efbeaf947a576b3d5fafd7a3da5b1463a2df643d91629d06979e4cf17a41a44f41301e49d008be239e05b7b017e2d5beb97bf8429f0b021460c787530e2b75ec017981c8406a886d41bf45210b8ae9d21cdd4d318fffe1a18bb98d798e5819ce8df3b55a2d9bcbe59a6850a194facbf4f4f407274f9efcccf7fd54c6b1fa8eb41c71791b1b1b07161616de2897cbefe772b9dfe6f3f963cd66d387f014fb50fa0c068832e3c9a48ee714c69bab42ee806d18502442234d07c720101aef94f25c66347fe8c02340659ae3d516a8e92fe626c97b60695dbf7e7d078f76cd163d90e3ab89f81f35de2037d411a3d55a87b95c6ea352a97cb17ffffe0fa6a7a73f3e7af4e84a5ae3587d495a14df5a5e5e867eebad46a3f17e3e9fbf1804c161634cce5a2ba9b40c7e63b0e84945161809f8c8ba228d16fe4fab858869c12dc43148d1e11aee03cf1bcff50b92c54475dbe86fcc49aa2507653cb45bb0b656565676f21289d4da89cadd2bd1f7220b0befe901ad9442a355e415a24616a40d7f78e18517c08848864e651cab9f492bd26f2d2d2d1d595959f9cdc6c6c6ef4ba5d285300c0f0641e019637e465cf44563a53622f31884446635061cbd0b216fc0e40051a133302c2fbc879bc83f8cc05e2140ab82b08af090c55c857505cb8be2acf1d5c44b972eedac58c753d0e29e04b98a3837c5c548889ac9644c18868863dd0882e0a3575f7df58303070e5c2e168ba891958a349d24ac531f886fff02b0a8841085ebd7afbfb8b0b0f06fc56211f5e55f1342ec0bc3505390920aa8116151e98d76d2c200239605d2024151330aea149c04206f6704ba45805cbb789963b2b4308f415e98b778a85eb972252a9514cf0689577e20b12aad7683b4b02f7ea0c7524a6dd76ab51fb3d9ec27a5520971ac2ff2f9fc3d2965dfb485ea3bd272a6af2a97cb63abababaf2c2f2fbf87c0bce779bff23c2f4aaca6c4e77895475af9a3d8013de1f014432c0b0178c4b1283646e9149828fcc308ec2502712b89b482f83ccc6358fb700d4146c8d220c1299abee0014bc17bbabef6d8167914c82b544a35ebf5fa9d300c3f9d9b9bfbe0d4a9537fe987c07b3bf67d495a8eb8f4d6d656e9abafbe7ab556abfd2e0cc37ff57d1ffde4465aad96a20067fcc943efe3817858585891c113894acc501712c400ba9554ece564e773f73f02a4bbda2d3587dcbb78b965585c886dadaeaeee9442020a8f0bc4630ec3c2b2d6b69acde63da5d497a552e93f0f1f3efce7e9e9e9652965dfc53ffa96b41c71656edfbe3db5b6b6760ea56c9452ff9ccd668f87615880c54556d52f491e2e5ebc18ad12e2694664454a7bfccd81f8fe2786347f038a5dc51789f0c0a55235b0fe295481f758dd465ee2cd9b37a3167bb462fe38c98310c266b3d9a056abadd7ebf5af676666feebcc99339f8c8c8c2cb9c07bea14ef49e3d5d7a4e5882bb7b6b676f0d6ad5be72b950a6a70bd63ad3d8a523668cb847da8f83ff42950ba63b06176239685176259b0b2a85a24882a9e369104226f6704f60a01101842142440c5dc449f4d68b690e2030f01d6d7fafa7a4468d4a713d753a954d0e13a2a3583d6655353537f3876ecd8c7a552e90757b921f52b85bbe13a08a485ef90bb75ebd6cccacaca854aa502e1e9db5a6be428e6f3f9bcc240d21309838c27d6e4e464d4191a2b87f1a282944a4102d56eb3e8f76a32f379870381b88b48591878e082a4207fc06fcc610a7990c7009710dd7fcae572b950287c3b3131f1e1cccccc9ff6eddbb7303a3a5aee9795c281242d676d4552881b376eccaeadad9dafd7ebef1a6350aa79cef7fd7cb55a8d5a336170a9830e12a211cfa2a03dc50568d585522698b486831cd2fa2de3c9f9b462487d3fa1278404027f23485fa95422c90482ee5a6b481b2aa88d75e8d0a18f8e1c39f2d1c4c4c4774eda10a4f5fb3ec975f5bda5455fd24921fcf5f5f5d9c5c5c5f30f1f3e7cd75afb763e9f9f6b341a3e04f3d05ee1c9040b0bbd0b51cd014f264a4e25d12905ece329164f0226efc308f41a014adac78210c218f88de03af5e2046921a91a7319a4363131813233e6d1a3479b41105c3f7cf8f09fa6a7a7ff582a95ae8d8c8c3ce82769c3e3b01c18d28a5b5cb76fdf9e85abf8f0e1c3f77cdf7f2b93c91c09c3d00fc350215bfef5d75f8f4acfc0a4a64282a4a2276904fe662babd7b7209faf5304f04025b282574009d624c58104e2ead5ab513c16f3757c7c3c0461351a8dc5b1b1b18f4f9d3af5e1f8f8f89542a100c26a76faf969dc7fa0482b465cf9d5d5d5c3376fde7cb35c2ebf5b2814de42ebf156abe523c675f6ecd9289809731a414c0ad4c7b3e729b7ab17e53fd238f07c4dfd8100ad2eba2ed5d145c3d2a232e320b285858528501f86a131c66cd6ebf5c552a9f4c9891327fe38393979399fcfaf0f0a6145619cfe18baceaed2b98af93b77ee1c595c5c7cb3d96cfefbf6f6f67929e5e1f9f9f9c2a14387a2ce3e14a08fa73d50663c9e5adcd6be33dc79efde2310b7f649dd4ef3951eacebebeb76797939aaefde683496c6c7c73f397efcf87f4f4d4d5d718495baeaa3dd203590a415b3b80a4b4b4bb3f7efdf3f5f2e97ff2593c99cbf70e1c251a5541131ae5c2e27f1a4a2e03b8ec3930dae21b56eea41cda26ec6878f1d7204f060a5d433e8b510de406c961eb8a86853ad5683cb972f6f4a2997b4d6ff77e2c4890fe7e6e6be1642aca3206a1aab8f7633ac034b5af118175615efddbbf7dac8c8c83fcdcecebe592c165f34c68c5b6b3d74afa6003c8ea19e72f14aa5dd00ccc73202dd2040d63ee625e5262218af94b2f57add64b3d9edadadad8db5b5b51bf57afd8b83070ffed95958f707c9258c6338d0a41527aeb5b5b529e4278e8e8e5e94525e6c369b2f49294b52caacb53612a1d2aaa13b2eb2c038a6d5cd2dc7c7768b002d0c51ba8f134147fd09b7b7b7b7f2f9fced66b3796d6b6bebcb46a371a9582c7e5f2a95d04167a05cc2a122ad1871655009220882f956ab050dd745adf5e956ab35ad94ca43c8859af3144320c2e215c46e6f3b3ebe1b04e2a4e53c02a4e5c0e5ab207e552814beb0d67e2a84f8a6d168ac8e8e8e6e0ea24b3874a4455fd85a8b9e8963b55aed9810e2d79ee7bd5dabd5ce799e77d4f3bc51f454444daef68ebedd4c3a3e9611e80681b6ea2408b637b4d60fb4d6df0741f059a150f85fadf5b72e7e852ed07d999ad3094603ef1eb683e15cc19146a3312da53cb3bdbdfd8ee77917b4d627841013c6982c888b5c456e11d6c974e27d7b8d80ab56623dcf0bc330ac054170574af9ade7799f49293ff77d7f410831301aac27c16fe8482be62ee6eaf53a5a91bd64ad7d4b4af9b6b5f66563cc94b53687983c2be29f640af13e7b8900845750b17b9e571642dc0ac3f02ac82a93c97c9dc964d09bb032082af74e301c4ad28ab98b88734db45a2dac26a26cf36facb567851033a88e0aab2c32b9f88711783e08c0d5ab1b6350076b416b7d4929754908f1ffd96cf68e10a2dacf89cf4f0be9d0df902ece55ac56ab478d31e7b0b228a53c2784c0df634a2910dbd0e3f4b4138c8f7b2a0450e30af5da3795523f361a8d2b4aa9cfb3d9ec65dff7615da1d44c6318e257bba1c73723aaa4fd4df250409c2b0cc357a4946f8661f88610e2a4b5f680943287da5c2434250d57bc34ee534d4d3e68e811a0451fd207422c6aad6d18631e5a6b9794525f29a53ed55a5fcb66b3ab28dc278408064d30dac94460d27268b9d41fc4b9a0dd7ad15a7b0ee56d841067a594b34288115754f067b2884ec0e67d19815d1686a27f8184a494281953b5d6deb5d622c0fe652693f9d25a7bddf77da8dbebc36a5dc57163d26a9b4550c90b21469bcd26fa29be2a847807f2086bed716bed981062c75da4dc2fbe1519816e10b0d62276053128dcbe9b4aa9ab4288afa494d7f2f93c1aa82208df1c66eb8a492b61863977d16f341a8784102f6375d11873de5a7b520871c05aebc3ea8a8b51bb99b47cecd022808613a1b5166da01058ff0ec17621c4d75aeb1f72b9dc7d2144cd5960430b52fb17674beb3153c1b98bd95aad3629a57c4108712e080210d719548b90528e49296195452940fcc308748840645d196360452d5b6b2f6bad3f87755528147e8494c105dbfbaef144873874bc3b9356b2d505621a69369bb3611842c7f56b63cc6b524a585d5352cabc232ec6b2e3e9379407808410bb4240fd0ee2554a2954648075753d97cbdd73b1abbe2e89bc9723cb37da13a01b0fd20b218e392dd71beef79c1062dcc5bad8ea7a023c8774179015ac2bb47bde1042dc10425cd55a83acbecb6432b75dec0a5206b6ae7e61923069757007b9203da4118875bd1486e139ac320a214e09210e4236818e65acebea00d4e1d8156485b6f38f841020a76b4208c4aebed15a2fc55606a1cde29f040498b43a9c2214eb82925e0831b7b9b909490444a9a7a59448c49e44a01ea255b7efcf1a6ab637d5e42a121d0e40ca766fd759b5757ab66118c2cdab0921ee5b6b17b5d697a59497b4d60bd96c760d02d241afcad0eb2163d27a4a446382d42921c48920084e23d62584f815745d4aa9718852d14c03ab8cf10aa8202a7a7196d0530e404a0e8be7a7523923a7b942cee0761004903140b6f0ad52eab252ea9ab576399fcfe3ff435195a1d743c5a4d505a2ce92826eabb8b5b5350d49849412b98ba79552f34a2928ec4785105912a6e2e3e2e59db99c731703908243e39615f40b885ba162a8941216d4aa13895ef13cef1bc4b15ca01d1287a156b57733744c5adda0e78e755657b65aad4e382beb94310696d7cb42881785108881a15e1709537754f56c69f560009ee3299c7505353b080b2dba369da2fd264ac828a54058d733990c7458886981d006bee6d55e0e0993560fd175c9d77ebd5e9f144240517fd218f38a1002f98cd07a41228174a088bcf0c3f5ba7a3800cffe5430aea2d23152ca2da5d43de40b0a21168c31df29a5becfe7f3d05c912bc881f61e8c1193560f406c3f855b65cc6f6f6fefb3d61eb1d6a266d769c4bb503d424ab9435e6118620c781cf6601cf6f094548501f204b881c80b5cb1d67eefaa887e8f5542dff741567576057b3b127cb3f416cf9db3b97817ca3b83bc4a586934c680bc607941223127a5444ad008625e2c50dda381e8dd694154240c85d60a8a7554115d91522e1a634058d05efde8c80a2b861cb7ea1dfe3b6762d2da0350e3a774e405ed56bed168ec6fb55a10a3a2e40d88eb8452ea08345e480b72155359e7b5c763d2e1e9c9aa82ce0a4404eb09f1a96547563f68ad415c6bbeef232587c9aa43803bdd9d49ab53c49e72ff1879419c5ab2d6ce846108753d6ad3e3058d173a03ed03c1b9b8970a023cacff364cedbfdbc8316ee5fdfda934e48557e33ab8ddf04373de787d34b73f02eb912014b5ad60551963e002de514a2d0b21169552373399ccad4c2683a466b888d88f2daba7bc3f3a398c49ab13b47ab06f8cbc10b08775059dd71104eaadb5f3d65a04ec67acb5fb21a59052fa687c4deee3e3561be337e76e376a0f2ebd2f4f4158c4716bc7d0fd1dc915acb52d634cc35a0b2242c30804d77f9452c2b2baa9b5c6fbbbb95c0e1617a40b580de400fb339c1d4c5acf10ec5d02f62023c4b3c8fa425236ac2f10d83163cc11cff3901e844a13481142c30d1cf30fc17b26addd07b2bde16e8cb0a2fc3e9486711612e2545bd6da9facb5202a68ac40502b2879ece2571b8542216e55b174e139dc3f4c5acf01f45dc80be310c5bdeaf5fab8b3be668c3158693c2ea544bdfa19a5143a05217d286fad05d969f49875371fbb870963e9b454518cca75b0d936c6405705ab09693608acdf564a41c18e1c413494d8f07d1ffa2a901aa40d6c553de77b8649eb390fc02e417b5852d071c1fada678c81a535eb080cd6d761c4c38410701fc7b4d6701f334e23165960ec1efe9dbfdd8a1fb454883721468592c520a10720aa2008ee81a8605569ad910b785f29f5c0f77dac0e4644e5488e2b2fa4e45e61d24ac940fc82f595ab56abc54c2633899e8c611882b08e5a6b219998955282d410d847ba106a7b1181456ee490b540235902dc36584488378178107b2a4b294154280b839a55b7a594771a8dc67dcff3d6b5d63ff9be0fd78f892aa5f7045d169356ca07c8b97ea8d305f73157abd58a9ee7450466ad3d84b8979432924d586ba10783a015f5bda0ff425968586d20b09d60befbca8330f644522028bc601561150f24056bea27475458e18315b56349c19a0a82a0522814b06fb4f2c716551fdc0cacc4ee8f416a732177080cc4b4b5b535e9795ec91803c23a00f202a139eb6b426b3de11a7280c4608921793bebdc4922329c33cdca7c72cd6041455614dc3dacf4b94a09e86003927a28a57c688c896254b0a8b4d6f7c230dc9052fea4b52eb75aadadd1d1d11d6bca2538b3ebd747b7c2203c6dfb08eede5eaa4bd48605066b0ab12d94851e0bc310c17cbcf68561b85f29155960524a94cb29bae46dd4b81f758a7ce8c2b2c6189c0b75c07648ccb997344fe2f3e51f16009ee6dbb92a17ae400216f3a2b23d243f2092423c6ac7d543ea8c4b9f79046b09d694b5163aaa7567593d544a555aad56456bbd592c16914a8364e6c822e3caa04f3352e93986492b3d63d1d59538fd17c806d6534464d56a35ef79de88520a152646c2301c31c680a8406848eade2fa58cdc494760888b45169953e76794521191c5dc4bd40753eef32866d64e6abf34afc8a5c3f7852e8aca10471694b5166e1a56e9d0f4a1ae9482fb8658135e884bfd648c817e0abff17705041586e123cff3365bad56cd595291bbe7488aa5095dcdae741dcca495aef1e8e9d5388b89888cdcca6cbd5ecf2ba54062a320344764634a29b8927881e40ad6dabc3106ddb561c965f0db1883df20b29d979432ee66e2737673377f464ee4e21963e0e2c18a6a3af5399290b75d5bad47524a1013dcbeb252ea9131e611ac2763cc561004f562b108570f04452485954276f77a3a93d2753226ad748dc79e5f4dcc228b5b65689596d35a1740564110f84a29085973c618e8c122b272c4859858f4de11186dd38ebcdae364f49d76e251644d29a540544da51414e820aa867bdfd05a434355f73caf6a8ca9fabe4f2e1e480e04159d8f6b53edf99449dd073069a56e489efd05b51159dc52a2f7e41eea5aad169113bde036baaaacf154a3c75a5aae9bf28e2b0802c3cb18138c8c8cfccc622262726e1e13d4b39f1aa9fc4426ad540e4bba2e8a1a74c4569be331acc706e91ff32dc8758bc7b6e83d55004d17007c35a94280492b55c3c117c3083002490830692521c4db1901462055083069a56a38f86218014620090126ad2484783b23c008a40a0126ad540d075f0c23c0082421c0a49584106f670418815421c0a495aae1e08b61041881240498b49210e2ed8c0023902a0498b452351c7c318c002390840093561242bc9d1160045285009356aa86832f86116004921060d24a4288b733028c40aa1060d24ad570f0c530028c4012024c5a4908f1764680114815024c5aa91a0ebe18468011484280492b0921dece083002a94280492b55c3c117c3083002490830692521c4db1901462055083069a56a38f86218014620090126ad2484783b23c008a40a0126ad540d075f0c23c0082421c0a49584106f670418815421c0a495aae1e08b61041881240498b49210e2ed8c0023902a0498b452351c7c318c002390840093561242bc9d1160045285009356aa86832f86116004921060d24a4288b733028c40aa1060d24ad570f0c530028c4012024c5a4908f1764680114815024c5aa91a0ebe18468011484280492b0921dece083002a94280492b55c3c117c3083002490830692521c4db1901462055083069a56a38f86218014620090126ad2484783b23c008a40a0126ad540d075f0c23c0082421c0a49584106f670418815421c0a495aae1e08b61041881240498b49210e2ed8c0023902a0498b452351c7c318c002390840093561242bc9d1160045285c05f0127cf5b0a49188cd80000000049454e44ae426082, 'Babysitter', 'No', 'Pending');
INSERT INTO `users` (`user_id`, `lastname`, `firstname`, `address`, `telNo1`, `mobileno`, `email`, `username`, `password`, `profile_img`, `type`, `deleted`, `status`) VALUES
('18713263', 'River', 'Son', 'Sambag 2, Cebu City', '', '09310011789', 'sonriver@gmail.com', 'sonriver', '12345', '', 'Babysitter', 'No', 'Active'),
('18713264', 'Mariposque', 'Engelbert', 'Poblacion, Oslob, Cebu', '', '09310011648', 'engelbertm51@gmail.com', 'engelbertm51', '12345', '', 'Babysitter', 'No', 'Active'),
('18713265', 'Londite', 'Jessi', 'Sambag 1, Cebu City', '', '0931445678', 'jessilondite@gmail.com', 'jessiMe', '12345', '', 'Babysitter', 'No', 'Active'),
('18713266', 'Ferrero', 'Grace', 'Pahina Central, Cebu City', '', '09310077869', 'gracefer@gmail.com', 'gracefer', '12345', '', 'Babysitter', 'Yes', 'Banned'),
('18713280', 'Garcia', 'Kylie', 'Babag, Cebu City, Cebu', '', '09311611798', 'kyliegarcia@gmail.com', 'kyliegar67', '12345', '', 'Babysitter', 'No', 'Active'),
('18713281', 'Mirallo', 'James', 'Bonbon, Cebu City, Cebu', '', '09311611796', 'jamesmirallo@gmail.com', 'jamesmiral90', '12345', '', 'Babysitter', 'No', 'Active'),
('18713282', 'Tan', 'Sherlyn', 'Bacayan, Cebu City, Cebu', '', '09311611791', 'sherlyn23@gmail.com', 'sherlyn45', '12345', '', 'Babysitter', 'No', 'Banned'),
('18713283', 'Lopez', 'Racie', 'Bulacao, Cebu City, Cebu', '', '09311611790', 'raciel56@gmail.com', 'racie89', '12345', '', 'Babysitter', 'No', 'Banned'),
('18713284', 'Garcia', 'Luz', 'Buhisan, Cebu City, Cebu', '', '09311611789', 'luzgarcia1@gmail.com', 'luz123', '12345', '', 'Babysitter', 'No', 'Active'),
('18713700', 'Granada', 'Luisa', 'Apas, Cebu City', '', '09310011657', 'luisagranada@gmail.com', 'luisagranada', '12345', '', 'Babysitter', 'No', 'Active'),
('18713710', 'Friolo', 'Jess', 'Adlaon, Cebu City, Cebu', '', '09310011671', 'jessifriolo@gmail.com', 'jess123', '12345', '', 'Babysitter', 'No', 'Active'),
('18713780', 'Manos', 'Jamaica', 'Basak Pardo, Cebu City, Cebu', '', '0921997823', 'jamaicamanos@gmail.com', 'jamaicamanos', '12345', '', 'Babysitter', 'No', 'Active'),
('18714260', 'Conceso', 'Joanna', 'Guba, Cebu City, Cebu', '', '09410011650', 'joananna89@gmail.com', 'joananna89', '12345', '', 'Babysitter', 'No', 'Active'),
('18714261', 'Tapili', 'Merinda', 'Kalunasan, Cebu City, Cebu', '', '09410011649', 'merindatapili@gmail.com', 'merindatapili', '12345', '', 'Babysitter', 'No', 'Active'),
('18714262', 'Sue', 'Kylie', 'Hipodromo, Cebu City, Cebu', '', '09410011648', 'kyliesue45@gmail.com', 'kyliesue45', '12345', '', 'Babysitter', 'No', 'Active'),
('18714263', 'Cruz', 'Barbie', 'Lusaran, Cebu City, Cebu', '', '09410011647', 'barbiecruz@gmail.com', 'barbiecruz', '12345', '', 'Babysitter', 'No', 'Active'),
('18714264', 'Hindu', 'Rona', 'Lahug, Cebu City, Cebu', '', '09410011646', 'rona89@gmail.com', 'rona89', '12345', '', 'Babysitter', 'No', 'Active'),
('18714265', 'Sandie', 'Tinker', 'Labangon, Cebu City, Cebu', '', '09410011645', 'tinkersandie@gmail.com', 'tinkersandie', '12345', '', 'Babysitter', 'No', 'Active'),
('18714266', 'Ramos', 'Renxie', 'Kamagayan, Cebu City, Cebu', '', '09410011644', 'renxieramos@gmail.com', 'renxieramos', '12345', '', 'Babysitter', 'No', 'Active'),
('18714267', 'Santos', 'Maria', 'Mabini, Cebu City, Cebu', '', '09410011643', 'maria12@gmail.com', 'maria12', '12345', '', 'Babysitter', 'No', 'Active'),
('18714268', 'Santiago', 'Kellie', 'Guba, Cebu City, Cebu', '', '09410011641', 'kellie@gmail.com', 'kellie', '12345', '', 'Babysitter', 'Yes', 'Banned'),
('18714269', 'Minoza', 'Richard', 'Mabini, Cebu City, Cebu', '', '09410011640', 'richard7889@gmail.com', 'richard7889', '12345', '', 'Babysitter', 'Yes', 'Banned'),
('1900001', 'Mandugo', 'Sunrise', 'Apas, Cebu City, Cebu', '', '09310011217', 'sunrisem34@gmail.com', 'sunrisem34', '12345', '', 'Parent', 'Yes', 'Expired Subscription'),
('1900002', 'Langit', 'Heaven', 'Babag, Cebu City, Cebu', '', '09310011216', 'heaven78@gmail.com', 'heaven78', '12345', '', 'Parent', 'Yes', 'Expired Subscription'),
('1900003', 'Mabait', 'Ronnie', 'Binalaw, Cebu City, Cebu', '', '09310011215', 'ronniemabait@gmail.com', 'ronniemabait', '12345', '', 'Parent', 'Yes', 'Pending Credential Approv'),
('1900004', 'Manlangit', 'Susan', 'Bacayan, Cebu City, Cebu', '', '09310011214', 'susan@gmail.com', 'susan', '12345', '', 'Parent', 'Yes', 'Pending Credential Approv'),
('1900005', 'Samson', 'Sunshine', 'Bonbon, Cebu City, Cebu', '', '09310011213', 'sunshine78@gmail.com', 'sunshine78', '12345', '', 'Parent', 'Yes', 'Pending Subscription Appr'),
('1900006', 'Mayaman', 'Pauline', 'Budlaan, Cebu City, Cebu', '', '09310011212', 'pauline78@gmail.com', 'pauline78', '12345', '', 'Parent', 'Yes', 'Pending Subscription Appr'),
('1900007', 'Rollon', 'Grace', 'Buhisan, Cebu City, Cebu', '', '09310011211', 'grace90@gmail.com', 'grace90', '12345', '', 'Parent', 'Yes', 'Banned'),
('1900008', 'Reyes', 'Honey', 'Buot, Cebu City, Cebu', '', '09310011210', 'honey67@gmail.com', 'honey67', '12345', '', 'Parent', 'No', 'Banned'),
('1900009', 'Cruz', 'Ellah', 'Calamba, Cebu City, Cebu', '', '09310011209', 'ellahcruz1@gmail.com', 'ellahcruz1', '12345', '', 'Parent', 'No', 'Active'),
('1900010', 'Londite', 'Ethel', 'Busay, Cebu City, Cebu', '', '09310011208', 'ethel908@gmail.com', 'ethel908', '12345', '', 'Parent', 'No', 'Active'),
('1900011', 'Cayon', 'Geraldine', 'Day-as, Cebu City, Cebu', '', '09310011207', 'geraldinecayon@gmail.com', 'geraldinecayon', '12345', '', 'Parent', 'No', 'Active'),
('1900012', 'Rondero', 'Richy', 'Cogon Pardo, Cebu City, Cebu', '', '09310011206', 'richy@gmail.com', 'richy', '12345', '', 'Parent', 'No', 'Active'),
('1900013', 'Masaya', 'Sherine', 'Guba, Cebu City, Cebu', '', '09310011205', 'sherineko@gmail.com', 'sherineko', '12345', '', 'Parent', 'No', 'Active'),
('1900014', 'Bunal', 'Rose', 'Labangon, Cebu City, Cebu', '', '09310011204', 'rosebunal@gmail.com', 'rosebunal', '12345', '', 'Parent', 'No', 'Active'),
('1900015', 'Kural', 'Kindra', 'Lahug, Cebu City, Cebu', '', '09310011203', 'kindram@gmail.com', 'kindram', '12345', '', 'Parent', 'No', 'Active'),
('1900016', 'Mahipos', 'Stephanie', 'Mabini, Cebu City, Cebu', '', '09310011202', 'stephaniem78@gmail.com', 'stephaniem78', '12345', '', 'Parent', 'No', 'Active'),
('1900017', 'Nunez', 'Nina', 'Mabolo, Cebu City, Cebu', '', '09310011201', 'ninanunez56@gmail.com', 'ninanunez56', '12345', '', 'Parent', 'No', 'Active'),
('1900018', 'Tobiaz', 'Mich', 'Kalubihan, Cebu City, Cebu', '', '09310011200', 'michtobiaz@gmail.com', 'michtobiaz', '12345', '', 'Parent', 'No', 'Active'),
('1900019', 'Ruiz', 'Lady', 'Inayawan, Cebu City, Cebu', '', '09310011679', 'ladyruiz45@gmail.com', 'ladyruiz45', '12345', '', 'Parent', 'No', 'Active'),
('1900020', 'Navarro', 'Maria', 'Kalunasan, Cebu City, Cebu', '', '09310011678', 'marianavarro@gmail.com', 'marianavarro', '12345', '', 'Parent', 'No', 'Active');

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
  ADD KEY `jobpost_id` (`jobpost_id`),
  ADD KEY `subscription_id` (`subscription_id`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter_account` (`babysitter_id`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`subscription_id`),
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`jobpost_id`) REFERENCES `post` (`jobpost_id`);

--
-- Constraints for table `babysitter_account`
--
ALTER TABLE `babysitter_account`
  ADD CONSTRAINT `babysitter_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `credential`
--
ALTER TABLE `credential`
  ADD CONSTRAINT `credential_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `monitor_ibfk_1` FOREIGN KEY (`apply_id`) REFERENCES `application` (`apply_id`),
  ADD CONSTRAINT `monitor_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`),
  ADD CONSTRAINT `monitor_ibfk_3` FOREIGN KEY (`jobpost_id`) REFERENCES `post` (`jobpost_id`),
  ADD CONSTRAINT `monitor_ibfk_4` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`),
  ADD CONSTRAINT `monitor_ibfk_5` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `monitor_ibfk_6` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`subscription_id`),
  ADD CONSTRAINT `monitor_ibfk_7` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `monitor_ibfk_8` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`),
  ADD CONSTRAINT `monitor_ibfk_9` FOREIGN KEY (`apply_id`) REFERENCES `application` (`apply_id`);

--
-- Constraints for table `parent_account`
--
ALTER TABLE `parent_account`
  ADD CONSTRAINT `parent_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent_account` (`parent_id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`subscription_id`);

--
-- Constraints for table `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `resume_ibfk_1` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter_account` (`babysitter_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent_account` (`parent_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter_account` (`babysitter_id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

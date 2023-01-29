-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 01:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `course_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_desc` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_author` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_img` text COLLATE utf8_bin NOT NULL,
  `course_duration` text COLLATE utf8_bin NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_original_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_original_price`) VALUES
('ART6561', 'Artificial Intelligence And Machine Learning', 'Discover The Concepts And Techniques Of Ai And Ml And How To Implement Them In Python.', 'Jill Doe', 'artificial_intelligence_and_machine_learning_art6561.png', '16 Weeks', 200, 300),
('DAT3145', 'Data Science With R', 'Learn How To Use R Programming Language To Clean, Analyze And Visualize Data.', 'Jack Smith', 'data_science_with_r_dat3145.png', '12 Weeks', 200, 250),
('FUL6177', 'Full Stack Web Development', 'Learn How To Build Complete Web Applications Using Html, Css, Javascript, And Web Frameworks Like React And Node.js.', 'Jessica Doe', 'full_stack_web_development_ful6177.png', '24 Weeks', 350, 400),
('INT1456', 'Introduction To Data Structures And Algorithms', 'Learn About Various Data Structures And Algorithms And How To Implement Them In Python.', 'James Smit', 'introduction_to_data_structures_and_algorithms_int1456.png', '10 Weeks', 175, 200),
('INT6651', 'Intro To Python Programming', 'This Course Will Teach You The Basics Of Python Programming And Prepare You For More Advanced Programming Concepts.', 'John Smith', 'intro_to_python_programming_int6651.png', '10 Weeks', 150, 200),
('JAV5287', 'Javascript For Beginners', 'Learn The Fundamentals Of Javascript And How To Use It In Web Development.', 'Jane Doe', 'javascript_for_beginners_jav5287.png', '8 Weeks', 120, 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

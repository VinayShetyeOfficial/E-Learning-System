-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 01:28 PM
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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `stu_occu` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `password_hash`, `stu_occu`, `stu_img`) VALUES
(1, 'John Doe', 'johndoe123@example.com', 'g7#uF2Kl', '$2y$12$Vhg1vPc4MS.sSH4d9JkE8eox6noq/8IG28SFrPDhwQ3BTzpa4unWu', 'Developer - Acme Inc', 'john_doe_1.png'),
(2, 'Jane Smith', 'janesmith456@example.com', 'b9@tF4Lm', '$2y$12$izb.9tbl9j/b0BSkDLUTRO5UTKr4GTnJMQ00i0klM4q8IoS6N0Qai', 'Designer - Beta Corp', 'jane_smith_2.png'),
(3, 'Michael Johnson', 'michaelj@example.com', 'j3#kL7Nb', '$2y$12$qvxQe01nMy6/dG8Y1B/wperYm.3wowZj1HYqJkYcKW3oZFD63ALyy', 'Data Scientist - Gamma Industries', 'michael_johnson_3.png'),
(4, 'Emily Davis', 'emilyd@example.com', 'd6@fG9Hj', '$2y$12$DwGCnN3FQdkmU24i7cvjrOC1tdAr2N5Lt0QXnxp6vMjYoJS2nFsSW', 'Project Manager - Delta Solutions', 'emily_davis_4.png'),
(5, 'Matthew Rodriguez', 'matthewr@example.com', 'r8#tJ6Mb', '$2y$12$y7aZDOBKK15GHZSBUesqYuQV3qeSkuMHwI.3T4n19RCPMyJ5Z8hbS', 'Software Engineer - Epsilon Technologies', 'matthew_rodriguez_5.png'),
(6, 'Ashley Thompson', 'ashleyt@example.com', 't5@pN7Lk', '$2y$12$Ts.AeOVyzvchzttHMkyAAuDriUk22GIba0HmfKQXx1KqMRuleD8XC', 'Product Manager - Zeta Systems', 'ashley_thompson_6.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

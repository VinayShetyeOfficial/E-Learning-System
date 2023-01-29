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
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `respmsg` text COLLATE utf8_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `amount`, `order_date`) VALUES
(1, 'ORDS81110158', 'johndoe123@example.com', 'INT6651', 'TXN_SUCCESS', 'Txn Success', 150, '2023-01-23'),
(2, 'ORDS42173811', 'johndoe123@example.com', 'INT1456', 'TXN_SUCCESS', 'Txn Success', 175, '2023-01-23'),
(3, 'ORDS27252327', 'johndoe123@example.com', 'JAV5287', 'TXN_SUCCESS', 'Txn Success', 120, '2023-01-23'),
(4, 'ORDS67433938', 'emilyd@example.com', 'FUL6177', 'TXN_SUCCESS', 'Txn Success', 350, '2023-01-23'),
(5, 'ORDS49006058', 'emilyd@example.com', 'DAT3145', 'TXN_SUCCESS', 'Txn Success', 200, '2023-01-23'),
(6, 'ORDS84075025', 'matthewr@example.com', 'FUL6177', 'TXN_SUCCESS', 'Txn Success', 350, '2023-01-23'),
(9, 'ORDS31618915', 'matthewr@example.com', 'INT6651', 'TXN_SUCCESS', 'Txn Success', 150, '2023-01-23'),
(10, 'ORDS84608852', 'matthewr@example.com', 'ART6561', 'TXN_SUCCESS', 'Txn Success', 200, '2023-01-23'),
(11, 'ORDS47181878', 'ashleyt@example.com', 'JAV5287', 'TXN_SUCCESS', 'Txn Success', 120, '2023-01-23'),
(12, 'ORDS98516504', 'ashleyt@example.com', 'INT1456', 'TXN_SUCCESS', 'Txn Success', 175, '2023-01-23'),
(16, 'ORDS25488679', 'ashleyt@example.com', 'INT6651', 'TXN_SUCCESS', 'Txn Success', 150, '2023-01-23'),
(17, 'ORDS63339449', 'ashleyt@example.com', 'FUL6177', 'TXN_SUCCESS', 'Txn Success', 350, '2023-01-23'),
(18, 'ORDS99870084', 'ashleyt@example.com', 'DAT3145', 'TXN_SUCCESS', 'Txn Success', 200, '2023-01-23'),
(19, 'ORDS11494905', 'janesmith456@example.com', 'ART6561', 'TXN_SUCCESS', 'Txn Success', 200, '2023-01-23'),
(20, 'ORDS11223916', 'janesmith456@example.com', 'JAV5287', 'TXN_SUCCESS', 'Txn Success', 120, '2023-01-23'),
(21, 'ORDS97592031', 'janesmith456@example.com', 'FUL6177', 'TXN_SUCCESS', 'Txn Success', 350, '2023-01-23'),
(22, 'ORDS42318133', 'michaelj@example.com', 'JAV5287', 'TXN_SUCCESS', 'Txn Success', 120, '2023-01-23'),
(23, 'ORDS4581978', 'michaelj@example.com', 'FUL6177', 'TXN_SUCCESS', 'Txn Success', 350, '2023-01-23'),
(24, 'ORDS90349150', 'michaelj@example.com', 'INT6651', 'TXN_SUCCESS', 'Txn Success', 150, '2023-01-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

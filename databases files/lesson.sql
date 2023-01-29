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
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text COLLATE utf8_bin NOT NULL,
  `lesson_desc` text COLLATE utf8_bin NOT NULL,
  `lesson_link` text COLLATE utf8_bin NOT NULL,
  `course_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `course_name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(1, 'Introduction to Python', 'In this lesson, we will learn about the history of Python, its features, and how to set up a development environment.', 'introduction_to_python_int6651.png', 'INT6651', 'Intro To Python Programming'),
(2, 'Python Variables and Data Types', 'In this lesson, we will learn about different data types in Python and how to use variables to store and manipulate data.', 'python_variables_and_data_types_int6651.png', 'INT6651', 'Intro To Python Programming'),
(3, 'Control Flow and Loops', 'In this lesson, we will learn how to control the flow of our program using conditional statements and loops in Python.', 'control_flow_and_loops_int6651.png', 'INT6651', 'Intro To Python Programming'),
(4, 'Introduction to AI and ML', 'In this lesson, we will learn about the history of AI and ML, its features and how to set up a development environment.', 'introduction_to_ai_and_ml_art4144.png', 'ART4144', 'Artificial Intelligence And Machine Learning'),
(5, 'Supervised and Unsupervised Learning', 'In this lesson, we will learn about the different types of AI and ML models and when to use them.', 'supervised_and_unsupervised_learning_art4144.png', 'ART4144', 'Artificial Intelligence And Machine Learning'),
(6, 'Deep Learning', 'In this lesson, we will learn about deep learning and how to implement deep learning models using Python.', 'deep_learning_art4144.png', 'ART4144', 'Artificial Intelligence And Machine Learning'),
(7, 'Introduction to R', 'In this lesson, we will learn about the history of R, its features, and how to set up a development environment.', 'introduction_to_r_dat3145.png', 'DAT3145', 'Data Science With R'),
(8, 'Data Cleaning and Exploration', 'In this lesson, we will learn how to clean and explore data using R programming language.', 'data_cleaning_and_exploration_dat3145.png', 'DAT3145', 'Data Science With R'),
(9, 'Data Visualization', 'In this lesson, we will learn how to create various data visualizations in R to better understand and communicate data insights.', 'data_visualization_dat3145.png', 'DAT3145', 'Data Science With R'),
(10, 'Introduction to JavaScript', 'In this lesson, we will learn about the history of JavaScript, its features, and how to set up a development environment.', 'introduction_to_javascript_jav5287.png', 'JAV5287', 'Javascript For Beginners'),
(11, 'JavaScript Variables and Data Types', 'In this lesson, we will learn about different data types in JavaScript and how to use variables to store and manipulate data.', 'javascript_variables_and_data_types_jav5287.png', 'JAV5287', 'Javascript For Beginners'),
(12, 'Control Flow and Loops', 'In this lesson, we will learn how to control the flow of our program using conditional statements and loops in JavaScript.', 'control_flow_and_loops_jav5287.jpeg', 'JAV5287', 'Javascript For Beginners'),
(13, 'Introduction to Data Structures', 'In this lesson, we will learn about the different types of data structures and when to use them.', 'introduction_to_data_structures_int1456.png', 'INT1456', 'Introduction To Data Structures And Algorithms'),
(14, 'Sorting Algorithms', 'In this lesson, we will learn about various sorting algorithms and how to implement them in Python.', 'sorting_algorithms_int1456.png', 'INT1456', 'Introduction To Data Structures And Algorithms'),
(15, 'Searching Algorithms', 'In this lesson, we will learn about different searching algorithms and how to implement them in Python.', 'searching_algorithms_int1456.png', 'INT1456', 'Introduction To Data Structures And Algorithms'),
(16, 'Introduction to HTML, CSS and JavaScript', 'In this lesson, we will learn the basics of HTML, CSS, and JavaScript and how to use them to create web pages.', 'introduction_to_html_css_and_javascript_ful6177.png', 'FUL6177', 'Full Stack Web Development'),
(17, 'React and Node.js', 'In this lesson, we will learn about React, a JavaScript library for building user interfaces and Node.js, a JavaScript runtime for building server-side applications.', 'react_and_nodejs_ful6177.png', 'FUL6177', 'Full Stack Web Development'),
(18, 'Full Stack Web Development Project', 'In this lesson, we will put all of the concepts learned throughout the course into practice by building a complete full stack web application using HTML, CSS, JavaScript, React, and Node.js.', 'full_stack_web_development_project_ful6177.png', 'FUL6177', 'Full Stack Web Development'),
(19, 'Introduction to AI and ML', 'In this lesson, we will learn about the history of AI and ML, its features and how to set up a development environment.', 'introduction_to_ai_and_ml_art6561.png', 'ART6561', 'Artificial Intelligence And Machine Learning'),
(20, 'Supervised and Unsupervised Learning', 'In this lesson, we will learn about the different types of AI and ML models and when to use them.', 'supervised_and_unsupervised_learning_art6561.png', 'ART6561', 'Artificial Intelligence And Machine Learning'),
(21, 'Deep Learning', 'In this lesson, we will learn about deep learning and how to implement deep learning models using Python.', 'deep_learning_art6561.png', 'ART6561', 'Artificial Intelligence And Machine Learning');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

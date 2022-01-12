-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2021 at 03:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u629445772_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `Aid` int(11) NOT NULL,
  `Sname` varchar(100) NOT NULL,
  `Semail` varchar(100) NOT NULL,
  `SuniqueNo` varchar(100) NOT NULL,
  `Sdate` datetime NOT NULL DEFAULT current_timestamp(),
  `Tname` varchar(500) NOT NULL,
  `Qname` text NOT NULL,
  `submitAns` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`Aid`, `Sname`, `Semail`, `SuniqueNo`, `Sdate`, `Tname`, `Qname`, `submitAns`, `score`, `total`) VALUES
(52, 'Smruti', 'srs@gmail.com', '1802081031', '2021-02-11 07:06:08', '8770483d58028b933afb657f5758669872eb167', 'Full form of DPDT', 'Double pole double throw', 5, 5),
(53, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-02-11 13:56:51', '39367116a7df5be71c0db6bd19057845077402f', 'Neuron having maximum output is called?', 'Firing Neuron', 8, 10),
(54, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-02-11 13:56:51', '39367116a7df5be71c0db6bd19057845077402f', 'BIOS programs are embedded on a chip called _________?', 'Firmware', 8, 10),
(55, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-02-11 13:56:51', '39367116a7df5be71c0db6bd19057845077402f', 'Which among the following doesn’t come under OOP concept?', 'Platform independent', 8, 10),
(56, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-02-11 13:56:51', '39367116a7df5be71c0db6bd19057845077402f', 'Which of the following can be considered as the maximum size that is supported by NTFS?', '64TB', 8, 10),
(57, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-02-11 13:56:51', '39367116a7df5be71c0db6bd19057845077402f', 'Which algorithm is best for sorting?', 'Quick Sort', 8, 10),
(58, 'Adya Rath', 'adyarath1@gmail.com', '780265', '2021-02-11 14:38:56', '39367116a7df5be71c0db6bd19057845077402f', 'BIOS programs are embedded on a chip called _________?', 'Firmware', 6, 10),
(59, 'Adya Rath', 'adyarath1@gmail.com', '780265', '2021-02-11 14:38:56', '39367116a7df5be71c0db6bd19057845077402f', 'Neuron having maximum output is called?', 'Radial Neuron', 6, 10),
(60, 'Adya Rath', 'adyarath1@gmail.com', '780265', '2021-02-11 14:38:56', '39367116a7df5be71c0db6bd19057845077402f', 'Which among the following doesn’t come under OOP concept?', 'Platform independent', 6, 10),
(61, 'Adya Rath', 'adyarath1@gmail.com', '780265', '2021-02-11 14:38:56', '39367116a7df5be71c0db6bd19057845077402f', 'Which algorithm is best for sorting?', 'Quick Sort', 6, 10),
(62, 'Adya Rath', 'adyarath1@gmail.com', '780265', '2021-02-11 14:38:56', '39367116a7df5be71c0db6bd19057845077402f', 'Which of the following can be considered as the maximum size that is supported by NTFS?', '8TB', 6, 10),
(63, 'arshad', 'arshad@gmail.com', '1802081063', '2021-02-13 17:45:42', '534728293f725a07423fe1c889f448b33d21f46', 'how r u?', '', 0, 1),
(64, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-02-13 17:50:27', '534728293f725a07423fe1c889f448b33d21f46', 'how r u?', 'u', 1, 1),
(65, 'rashmi', 'admin@rashhworld.in', '1802081050', '2021-02-14 15:30:34', '35377393f725a07423fe1c889f448b33d21f46', 'How are you?', 'Yes', 3, 3),
(66, 'Adya', 'adyarath1@gmail.com', '1234556', '2021-02-15 12:34:32', '8741221277b18808bb6fba9845a813795fe8baa', 'Entropy chage in an adeabatic process is always', 'zero', 0, 1),
(67, 'Adya', 'adyarath1@gmail.com', '1234556', '2021-02-15 12:34:36', '8741221277b18808bb6fba9845a813795fe8baa', 'Entropy chage in an adeabatic process is always', 'zero', 0, 1),
(68, 'prax', 'padhiprasenjeet@gmail.com', '333', '2021-02-15 12:41:38', '4635825-c71e8d17d41c21de0d260881d69662ff', 'what is class?', 'All of the above', 4, 8),
(69, 'prax', 'padhiprasenjeet@gmail.com', '333', '2021-02-15 12:41:38', '4635825-c71e8d17d41c21de0d260881d69662ff', 'What is object?', 'instance', 4, 8),
(70, 'bilei', 'padhiprasenjeet@gmail.com', '333', '2021-02-15 12:54:34', '4635825-c71e8d17d41c21de0d260881d69662ff', 'What is object?', 'small thing', 0, 8),
(71, 'bilei', 'padhiprasenjeet@gmail.com', '333', '2021-02-15 12:54:34', '4635825-c71e8d17d41c21de0d260881d69662ff', 'what is class?', 'All of the above', 0, 8),
(80, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-03-21 08:05:45', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'In which year was the Python language developed?', '', 0, 10),
(81, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-03-21 08:05:45', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'In which language is Python written?', '', 0, 10),
(82, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-03-21 08:05:45', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'Who developed the Python language?', '', 0, 10),
(83, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-03-21 08:05:45', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'What do we use to define a block of code in Python language?', '', 0, 10),
(84, 'Rashmi Ranjan', 'admin@rashhworld.in', '1802081050', '2021-03-21 08:05:45', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'What is the maximum possible length of an identifier?', '', 0, 10),
(85, 'Dhairya Joshi', 'joshidhairaya2002@gmail.com', '24', '2021-05-26 16:03:39', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'Who developed the Python language?', 'Guido van Rossum', 6, 10),
(86, 'Dhairya Joshi', 'joshidhairaya2002@gmail.com', '24', '2021-05-26 16:03:39', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'In which year was the Python language developed?', '1972', 6, 10),
(87, 'Dhairya Joshi', 'joshidhairaya2002@gmail.com', '24', '2021-05-26 16:03:39', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'What do we use to define a block of code in Python language?', 'Indentation', 6, 10),
(88, 'Dhairya Joshi', 'joshidhairaya2002@gmail.com', '24', '2021-05-26 16:03:39', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'What is the maximum possible length of an identifier?', '32', 6, 10),
(89, 'Dhairya Joshi', 'joshidhairaya2002@gmail.com', '24', '2021-05-26 16:03:39', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'In which language is Python written?', 'C', 6, 10),
(95, 'Ravindra Nag', 'ravindranag52@gmail.com', '2002041058', '2021-05-26 16:03:48', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'What do we use to define a block of code in Python language?', 'Indentation', 8, 10),
(96, 'Ravindra Nag', 'ravindranag52@gmail.com', '2002041058', '2021-05-26 16:03:48', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'What is the maximum possible length of an identifier?', 'None of these above', 8, 10),
(97, 'Ravindra Nag', 'ravindranag52@gmail.com', '2002041058', '2021-05-26 16:03:48', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'Who developed the Python language?', 'Guido van Rossum', 8, 10),
(98, 'Ravindra Nag', 'ravindranag52@gmail.com', '2002041058', '2021-05-26 16:03:48', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'In which year was the Python language developed?', '1989', 8, 10),
(99, 'Ravindra Nag', 'ravindranag52@gmail.com', '2002041058', '2021-05-26 16:03:48', '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'In which language is Python written?', 'All of the above', 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Qid` int(11) NOT NULL,
  `Tname` varchar(500) NOT NULL,
  `Qname` text NOT NULL,
  `Qimg` varchar(200) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `correctAns` varchar(500) NOT NULL,
  `mark` int(11) NOT NULL,
  `organiser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Qid`, `Tname`, `Qname`, `Qimg`, `option1`, `option2`, `option3`, `option4`, `correctAns`, `mark`, `organiser`) VALUES
(48, '8770483d58028b933afb657f5758669872eb167', 'Full form of DPDT', '', 'cdscds', 'vdsvs', 'vdsvsd', 'Double pole double throw', 'Double pole double throw', 5, '9'),
(49, '39367116a7df5be71c0db6bd19057845077402f', 'Neuron having maximum output is called?', '', 'Max-Neuron', 'Radial Neuron', 'Firing Neuron', 'Decisive Neuron', 'Firing Neuron', 2, '156'),
(50, '39367116a7df5be71c0db6bd19057845077402f', 'Which algorithm is best for sorting?', '', 'Merge Sort', 'Quick Sort', 'Insertion Sort', 'Radix Sort', 'Quick Sort', 2, '156'),
(51, '39367116a7df5be71c0db6bd19057845077402f', 'Which of the following can be considered as the maximum size that is supported by NTFS?', '', '4GB', '16TB', '64TB', '8TB', '4GB', 2, '156'),
(52, '39367116a7df5be71c0db6bd19057845077402f', 'Which among the following doesn’t come under OOP concept?', '', 'Platform independent', 'Data binding', 'Message passing', 'Data hiding', 'Platform independent', 2, '156'),
(53, '39367116a7df5be71c0db6bd19057845077402f', 'BIOS programs are embedded on a chip called _________?', '', 'Firmware', 'IC', 'Hardware', 'Application Programs', 'Firmware', 2, '156'),
(54, '534728293f725a07423fe1c889f448b33d21f46', 'how r u?', '', 'vree', 'iygiug', 'ever', 'u', 'u', 1, '157'),
(56, '9059876e2071528cf1aa685779d9898ccd9b308', '1+1', '', '2', '3', '6', '4', '2', 1, '167'),
(58, '35377393f725a07423fe1c889f448b33d21f46', 'How are you?', '', 'Yes', 'No', 'Half Yes', 'Half No', 'Yes', 3, '179'),
(59, '8741221277b18808bb6fba9845a813795fe8baa', 'Entropy chage in an adeabatic process is always', '', 'negative', 'zero', 'positive', 'can\'t say', 'positive', 1, '187'),
(60, '4635825-c71e8d17d41c21de0d260881d69662ff', 'What is object?', '', 'instance', 'class', 'inheritance', 'small thing', 'instance', 4, '3'),
(61, '4635825-c71e8d17d41c21de0d260881d69662ff', 'what is class?', '', 'Factory of objects', 'group of people', 'collection of nonsense', 'All of the above', 'Factory of objects', 4, '3'),
(64, '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'What is the maximum possible length of an identifier?', '', '16', '32', '64', 'None of these above', 'None of these above', 2, '1'),
(65, '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'Who developed the Python language?', '', 'Zim Den', 'Guido van Rossum', 'Niene Stom', 'Wick van Rossum', 'Guido van Rossum', 2, '1'),
(66, '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'In which year was the Python language developed?', '', '1995', '1972', '1981', '1989', '1989', 2, '1'),
(67, '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'In which language is Python written?', '', 'English', 'PHP', 'C', 'All of the above', 'C', 2, '1'),
(68, '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'What do we use to define a block of code in Python language?', '', 'Key', 'Brackets', 'Indentation', 'None of these', 'Indentation', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Tid` int(11) NOT NULL,
  `Tname` varchar(500) NOT NULL,
  `Pname` varchar(500) NOT NULL,
  `Tdate` date NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `portal_start_date` date NOT NULL DEFAULT current_timestamp(),
  `portal_start_time` time NOT NULL DEFAULT current_timestamp(),
  `portal_end_date` date NOT NULL DEFAULT current_timestamp(),
  `portal_end_time` time NOT NULL DEFAULT current_timestamp(),
  `showScore` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`Tid`, `Tname`, `Pname`, `Tdate`, `id`, `time`, `portal_start_date`, `portal_start_time`, `portal_end_date`, `portal_end_time`, `showScore`) VALUES
(25, '6558782-64663f4646781c9c0110838b905daa23', 'Random', '2020-12-20', 3, 2, '2020-12-20', '13:19:00', '2020-12-21', '00:20:00', 'Yes'),
(31, '4635825-c71e8d17d41c21de0d260881d69662ff', 'JAVA', '2020-12-22', 3, 2, '2020-12-22', '11:06:00', '2021-02-26', '16:06:00', 'Yes'),
(40, '8770483d58028b933afb657f5758669872eb167', 'B.tech Electrical', '2020-12-31', 9, 1, '2021-02-11', '12:34:00', '2021-02-12', '23:39:00', 'No'),
(41, '689740213ab16d2bf557acf3d91d466c1dc7f36', 'Class 10 science', '2020-12-31', 9, 120, '2021-01-02', '21:45:00', '2021-01-03', '23:46:00', 'No'),
(42, '4518863dec501b5856cc0a9bf84597e4455a2f9', 'Genetics', '2020-12-31', 9, 50, '2020-12-19', '22:00:00', '2020-12-26', '00:00:00', 'No'),
(43, '3575893e21600550b1d5d1b5fb9c763029f1ef2', 'Mathematics 8', '2020-12-31', 9, 100, '2020-12-26', '22:12:00', '2020-12-27', '00:12:00', 'No'),
(44, '532972552c4d84073b89384f00238ccfa4c4004', 'chemistry 10', '2020-12-31', 9, 150, '2020-12-17', '22:27:00', '2020-12-26', '20:31:00', 'No'),
(45, '8567391c3a2e45d2fbf3431d5fcd55f98d8e822', 'history 12', '2020-12-31', 9, 12, '2020-12-26', '22:28:00', '2020-12-27', '01:28:00', 'No'),
(58, '39367116a7df5be71c0db6bd19057845077402f', 'IT Test', '2021-02-11', 156, 5, '2021-02-11', '19:00:00', '2021-02-12', '19:00:00', 'Yes'),
(59, '534728293f725a07423fe1c889f448b33d21f46', 'java', '2021-02-13', 157, 2, '2021-02-13', '23:13:00', '2021-02-13', '23:14:00', 'Yes'),
(60, '1265581979d6ee8d4d56a8c5226d4735b12017f', 'Math quiz', '2021-02-14', 165, 60, '2021-02-15', '17:00:00', '2021-02-15', '18:00:00', 'Yes'),
(61, '9059876e2071528cf1aa685779d9898ccd9b308', 'aryan', '2021-02-14', 167, 5, '2021-02-14', '07:13:00', '2021-02-14', '08:11:00', 'Yes'),
(63, '35377393f725a07423fe1c889f448b33d21f46', 'java', '2021-02-14', 179, 2, '2021-02-14', '21:00:00', '2021-02-14', '21:01:00', 'Yes'),
(64, '899716423eeeb4347bdd26bfc6b7ee9a3b755dd', 'python', '2021-02-14', 179, 1, '2021-02-14', '21:04:00', '2021-02-15', '21:04:00', 'No'),
(65, '281196fc3a44bdc0e11f8d062684c9c41e5909', 'Vssut mid sem', '2021-02-14', 183, 60, '2021-02-22', '22:00:00', '2021-02-26', '23:00:00', 'Yes'),
(66, '8741221277b18808bb6fba9845a813795fe8baa', 'BT', '2021-02-15', 187, 30, '2021-02-15', '17:22:00', '2021-02-16', '23:22:00', 'Yes'),
(68, '726292723eeeb4347bdd26bfc6b7ee9a3b755dd', 'python', '2021-02-27', 1, 1, '2021-05-26', '00:00:00', '2021-05-30', '00:00:00', 'Yes'),
(69, '4585433387baf0199e7c9cc944fae94e96448fa', 'Miscellaneous', '2021-04-26', 1, 10, '2021-04-26', '18:40:00', '2021-05-26', '18:40:00', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `userEmail`, `userPass`, `userStatus`, `tokenCode`, `date_created`) VALUES
(1, 'Sikun', 'rashmiranjandas556@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '9ad80305599a233888c10aa2d72a558e', '2020-12-14'),
(3, 'Adya Rath', 'adyarath1@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', 'Y', '6e13ed082b5b0f5879759fbdb2d24602', '2020-12-14'),
(9, 'Jane', 'bpgmyojotqdtxxsqgn@mhzayt.online', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '224d00f502cd7fba00c5bba75097e570', '2020-12-31'),
(156, 'Smruti', 'srs.scs@gmail.com', '6206de82c92d5f532f27f0c627f6d8e9', 'Y', '2f20dbe3acdef153a9c5d6b4c1a4ac66', '2021-02-11'),
(157, 'Arsad', 'coolrshd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '2a54f6845401f00f3193fb5523824079', '2021-02-13'),
(165, 'Sitikanta', 'sitikanta.panigrahi.2000@gmail.com', '', 'Y', '', '2021-02-14'),
(166, 'Durgesh', 'durgeshagrawal38@gmail.com', '', 'Y', '', '2021-02-14'),
(167, 'ARYAN', 'patelaryan7751@gmail.com', '', 'Y', '', '2021-02-14'),
(168, 'Krishna', 'snjt700@gmail.com', '', 'Y', '', '2021-02-14'),
(169, 'Subhranshu', 'psubhranshu22@gmail.com', '', 'Y', '', '2021-02-14'),
(171, 'Prateek', 'rklprateek@gmail.com', '', 'Y', '', '2021-02-14'),
(172, 'Gargi', 'garginanda2907200@gmail.com', '', 'Y', '', '2021-02-14'),
(174, 'Jagat Jeeban', 'jagatjeebanmaharana@gmail.com', '74b066fa0ec21294d82330b7c59fc3ae', 'Y', '5de9572fa8e6a576afb505beb5f666e3', '2021-02-14'),
(175, 'Lopamudra', 'lopamudragiri2@gmail.com', '', 'Y', '', '2021-02-14'),
(176, 'Aditya', 'adi.patra02@gmail.com', '', 'Y', '', '2021-02-14'),
(177, 'CSE_Lalit Kumar', 'lalitkumar.vssut@gmail.com', '', 'Y', '', '2021-02-14'),
(181, 'Hiren Biswal', 'hirenbiswal@gmail.com', '68cc79d0ec5ccbd6612d72be86ec18ae', 'N', 'd0bc7e1122b479036ec9d648177950a6', '2021-02-14'),
(182, 'CH_AmishaMohanty_042_', 'amishamohanty22@gmail.com', '', 'Y', '', '2021-02-14'),
(183, 'K 41 Satwik', 'satwik.brahma619@gmail.com', '', 'Y', '', '2021-02-14'),
(184, 'CSE_Ravindra', 'ravindranag52@gmail.com', '', 'Y', '', '2021-02-14'),
(186, 'hack', 'nik07dev@gmail.com', '', 'Y', '', '2021-02-15'),
(187, 'Prasenjeet', 'padhiprasenjeet@gmail.com', '', 'Y', '', '2021-02-15'),
(196, 'Satyajit Sahu', 'sahusatyajit130@gmail.com', '6c3709c4ec76a91402ea19fa15520de9', 'N', 'ba650e5dcaa49a04722c2c27511ba8f5', '2021-02-18'),
(199, 'Ravi', 'raviranjan845101@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Y', '9fe76ed16715352bd4cdf9011cda5dc6', '2021-03-03'),
(203, 'Smrutiranjan Swain', '', '', 'Y', '', '2021-04-02'),
(211, 'Tushar', 'tushardas2398@gmail.com', '', 'Y', '', '2021-05-05'),
(218, 'Ravindra', 'ravindranag.me@gmail.com', '', 'Y', '', '2021-05-25'),
(223, '20_Swadesh_CSE', 'swadeshpanda19@gmail.com', '', 'Y', '', '2021-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Qid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`Tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

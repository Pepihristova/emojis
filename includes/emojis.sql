-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 11:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emojis`
--

-- --------------------------------------------------------

--
-- Table structure for table `emoji`
--

CREATE TABLE `emoji` (
  `id_emoji` int(11) NOT NULL,
  `string` varchar(250) NOT NULL,
  `image_emoji` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emoji`
--

INSERT INTO `emoji` (`id_emoji`, `string`, `image_emoji`) VALUES
(1, 'hi', 'cry_laugh.png'),
(2, ':heart_eyes:', 'Heart_Eyes_Emoji.png'),
(3, ':sob:', 'cry.png'),
(4, ':smiling_imp:', 'hell.png'),
(5, ':hear_no_evil:', 'monkey.png'),
(6, ':--:', 'zipper.png'),
(7, ':conf', 'confused.png'),
(8, ':)', 'happy.png'),
(9, ':kiss', 'kiss.png'),
(10, ':(', 'Weary_Face_Emoji_Icon_ios10.png'),
(11, ':O', 'wow.png');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `user_id`, `message`, `recipient_id`, `date_added`) VALUES
(14, 10, 'stana li :)', 11, '2019-03-22 10:42:17'),
(15, 10, ':--:', 12, '2019-03-22 10:42:31'),
(16, 10, 'kak ste', 13, '2019-03-22 10:42:45'),
(17, 10, 'hi hi  hppp', 14, '2019-03-22 10:42:59'),
(18, 10, '123456789 :)', 11, '2019-03-22 10:43:23'),
(19, 10, 'Why go out', 11, '2019-03-22 10:43:41'),
(20, 11, 'hi pep', 10, '2019-03-22 10:44:16'),
(21, 11, 'brb', 12, '2019-03-22 10:44:28'),
(22, 11, 'stana li', 13, '2019-03-22 10:44:37'),
(23, 11, 'Hope k[dmvvm[orb', 14, '2019-03-22 10:44:46'),
(24, 11, 'pepi', 10, '2019-03-22 10:44:54'),
(25, 15, 'I am nurcho hi', 10, '2019-03-22 10:49:48'),
(26, 16, 'Radvam se che stana :)', 10, '2019-03-22 11:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `recipient_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipient`
--

INSERT INTO `recipient` (`recipient_id`, `name`) VALUES
(10, 'Preslava'),
(11, 'Aksenia'),
(12, 'Hristo'),
(13, 'Vladislav'),
(14, 'Stela'),
(15, 'nurcho'),
(16, 'Dimo'),
(17, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `pass`) VALUES
(10, 'Preslava', 'pepi'),
(11, 'Aksenia', '1234'),
(12, 'Hristo', '1974'),
(13, 'Vladislav', '123456789'),
(14, 'Stela', '1234'),
(15, 'nurcho', '1234'),
(16, 'Dimo', '$2y$12$x7.SAS5fL4N2JmqOnW44mOtv6EoG/Njv4J1bcRK5lc1jB4jCNYyey'),
(17, 'new', '$2y$12$byGQ8shs1JrRi3yxwO2xS.6Ze4KCK4gxdD1xdeG7.2aOT3NcR.dtO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emoji`
--
ALTER TABLE `emoji`
  ADD PRIMARY KEY (`id_emoji`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`recipient_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emoji`
--
ALTER TABLE `emoji`
  MODIFY `id_emoji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `recipient`
--
ALTER TABLE `recipient`
  MODIFY `recipient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `recipient_id` FOREIGN KEY (`recipient_id`) REFERENCES `recipient` (`recipient_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

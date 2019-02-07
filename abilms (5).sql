-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 06:33 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abilms`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a'),
(2, 'mhaenggay', 'mhaemanubag@gmail.com', '4b0082f74ee7aa76760504cc59379208'),
(3, 'abi', 'abi@gmail.com', 'e28745b96905830cf5161cddfd4f7388'),
(4, 'nick', 'nick@gmail.com', '8fe569676dca2e21fed65144d1c68428');

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_image` varchar(200) NOT NULL,
  `category_order` int(11) NOT NULL,
  `top_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`category_id`, `category_name`, `category_image`, `category_order`, `top_category_id`) VALUES
(27, 'HTML5', '2019-02-08_06-31-2677772479.png', 1, 23),
(28, 'CSS3', '2019-02-08_06-31-3378779818.png', 2, 23),
(29, 'Javascript', '2019-02-08_06-31-0844005695.png', 3, 23),
(30, 'C', '2019-02-08_02-31-1181306305.png', 1, 11),
(31, 'C++', '2019-02-08_02-33-1726712060.png', 2, 11),
(32, 'C#', '2019-02-08_02-33-5315433361.png', 3, 11),
(34, 'Linux', '2019-02-08_06-26-1188792135.png', 1, 29),
(35, 'Microsoft', '2019-02-08_06-26-2622044113.png', 2, 29);

-- --------------------------------------------------------

--
-- Table structure for table `table_lecture`
--

CREATE TABLE `table_lecture` (
  `lecture_id` int(11) NOT NULL,
  `lecture_content` longtext NOT NULL,
  `lecture_order` int(11) NOT NULL,
  `lecture_sub_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_sub_category`
--

CREATE TABLE `table_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(200) NOT NULL,
  `sub_category_order` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_sub_category`
--

INSERT INTO `table_sub_category` (`sub_category_id`, `sub_category_name`, `sub_category_order`, `category_id`) VALUES
(26, 'Lecture 1: Introduction to CSS3', 1, 28),
(27, 'Lecture 2: How to write CSS Stylesheet', 2, 28),
(28, 'Lecture 1: Introduction to HTML5', 1, 27),
(29, 'Lecture 2: HTML5 Paragraph', 2, 27);

-- --------------------------------------------------------

--
-- Table structure for table `table_top_category`
--

CREATE TABLE `table_top_category` (
  `top_category_id` int(11) NOT NULL,
  `top_category_name` varchar(200) NOT NULL,
  `top_category_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_top_category`
--

INSERT INTO `table_top_category` (`top_category_id`, `top_category_name`, `top_category_order`) VALUES
(11, 'Programming', 1),
(23, 'Website', 2),
(27, 'Database', 4),
(28, 'Network', 3),
(29, 'Server', 5);

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `confirm_email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_name`, `email`, `confirm_email`, `password`) VALUES
(1, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(2, '', 'dsadsads@fdsa.com', '', '5f039b4ef0058a1d652f13d612375a5b'),
(3, '', 'dasdsa@fadas.com', '', '49f0bad299687c62334182178bfd75d8'),
(4, '', 'dasdsa@fadas.com', '', 'c91c03ea6c46a86cbc019be3d71d0a1a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `table_lecture`
--
ALTER TABLE `table_lecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `table_sub_category`
--
ALTER TABLE `table_sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `table_top_category`
--
ALTER TABLE `table_top_category`
  ADD PRIMARY KEY (`top_category_id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `table_lecture`
--
ALTER TABLE `table_lecture`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_sub_category`
--
ALTER TABLE `table_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `table_top_category`
--
ALTER TABLE `table_top_category`
  MODIFY `top_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

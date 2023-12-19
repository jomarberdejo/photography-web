-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 03:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jerson`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `isSaved` tinyint(1) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `url`, `isSaved`, `name`, `description`, `created_at`) VALUES
(1, 'image1.jpg', 1, ' Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos culpa minima rem nemo ', '2023-12-18 19:50:52'),
(2, 'image2.jpg', 1, 'Lorem ipsum dolor, sit', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. ', '2023-12-18 20:03:57'),
(3, 'image3.jpg', 1, 'Lorem ipsu', 'orem ipsum dolor, sit amet consectetur adipisicing elit. Eos ', '2023-12-18 20:39:20'),
(4, 'image2.jpg', 0, 'Lorem ipsum', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', '2023-12-18 23:07:28'),
(5, 'image3.jpg', 0, 'Lorem ipsum', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', '2023-12-18 23:07:44'),
(6, 'image3.jpg', 0, 'Y', 'Z', '2023-12-19 00:54:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

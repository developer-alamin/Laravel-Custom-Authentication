-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 01:35 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_name` varchar(191) NOT NULL,
  `users_father` varchar(191) NOT NULL,
  `users_mother` varchar(191) NOT NULL,
  `users_phone` varchar(191) NOT NULL,
  `users_work` varchar(191) NOT NULL,
  `users_email` varchar(191) NOT NULL,
  `users_password` varchar(191) NOT NULL,
  `users_img` varchar(191) NOT NULL,
  `date` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `users_name`, `users_father`, `users_mother`, `users_phone`, `users_work`, `users_email`, `users_password`, `users_img`, `date`) VALUES
(3, 'Alamin Ali', 'Md.Majad Ali', 'Anjuara', '01740816676', 'Web Developer', 'alamin@gmail.com', '$2y$10$Zwx4Nwnkxq.msndIC9AmOepSv61nbUqi/9LZmhxIQqKkAIyAJza3K', 'http://127.0.0.1:8000/storage/img/1683804595/2023/05.jpg', 'Wednesday, 10 May, 2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

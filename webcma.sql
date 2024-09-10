-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2024 at 05:56 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcma`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `upload_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file_path`, `file_name`, `file_size`, `file_type`, `upload_date`) VALUES
(1, 'uploads/66d5c6d99ee1b-photo.png', 'photo.png', 475530, 'image/png', '2024-09-02 14:08:25'),
(2, 'uploads/66d5c7b4f3cc3-photo.png', 'photo.png', 0, 'image/png', '2024-09-02 14:12:04'),
(3, 'uploads/66d5c7bf6622c-photo.png', 'photo.png', 478525, 'image/png', '2024-09-02 14:12:15'),
(4, 'uploads/66d5c7c66edfb-photo.png', 'photo.png', 465553, 'image/png', '2024-09-02 14:12:22'),
(5, 'uploads/66d5c7cde3f1d-photo.png', 'photo.png', 450914, 'image/png', '2024-09-02 14:12:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

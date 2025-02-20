-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 09:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crown_ministers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'Admin123'),
(3, 'Bonface', '$2y$10$qd4.N1/7pb0dI29LT0gUGeCWsNSBepuZvS/bVx3FwtjJcWldgI79i'),
(5, 'Bonface2', '$2y$10$KhcRc482TexgGwjqwG74zuUudSb9iWTACmNgSZbe/1HOdSno9esUm');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `published_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `status`, `created_at`, `published_on`) VALUES
(2, 'Registration ', 'gghh', 'WhatsApp Image 2024-09-09 at 22.50.12_e3a1cf4b.jpg', 'active', '2025-02-17 12:41:31', '2025-02-17 15:42:29'),
(3, 'Scientific songs', 'Songs can be scientific ', 'WhatsApp Image 2024-09-09 at 22.50.12_e3a1cf4b.jpg', 'active', '2025-02-17 14:15:33', '2025-02-17 17:15:33'),
(4, 'Evangelism', 'Lets take Jesus to the Nations', 'WhatsApp Image 2024-09-09 at 22.50.12_e3a1cf4b.jpg', 'active', '2025-02-19 07:30:06', '2025-02-19 10:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `event_description`, `status`, `created_at`, `name`, `event_image`) VALUES
(5, 'singing songs', '2025-02-18', 'today', 'active', '2025-02-17 10:50:43', '', ''),
(6, 'Christmas Carols ', '2025-03-14', 'come we prepare for the Christmas ', 'active', '2025-02-17 12:59:37', '', ''),
(7, 'Worship Night', '2025-02-19', 'come we worship the lord together', 'active', '2025-02-17 13:20:43', '', ''),
(8, 'Waweza Album Launch', '2025-02-19', 'A day to take Jesus to the world through Waweza song', 'active', '2025-02-17 13:24:01', '', ''),
(9, 'Ceremony ', '2025-03-04', 'come', 'inactive', '2025-02-17 13:30:15', '', 'WhatsApp Image 2024-09-09 at 22.50.14_220ee79c.jpg'),
(10, 'data entry ', '2025-02-20', 'hhhh', 'active', '2025-02-19 07:52:49', '', 'WhatsApp Image 2024-09-09 at 22.50.14_220ee79c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` enum('image','video','audio','document') NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `role`, `image`, `description`) VALUES
(4, 'James Bond', 'Musician', '../uploads/WhatsApp Image 2024-09-09 at 22.50.14_ddf26023.jpg', 'manages all the music articles graciously '),
(5, 'Grace George', 'Singer', '../uploads/WhatsApp Image 2024-09-09 at 22.54.18_3b5a0af9.jpg', 'praises the lord through songs'),
(6, 'Waina Wambugu', 'Singer', '../uploads/WhatsApp Image 2024-09-09 at 22.54.17_f04e9a39.jpg', 'choir member'),
(7, 'James', 'Choir Leader', '../uploads/WhatsApp Image 2024-09-09 at 22.50.14_220ee79c.jpg', 'singer');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_songs`
--

CREATE TABLE `youtube_songs` (
  `id` int(11) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youtube_songs`
--

INSERT INTO `youtube_songs` (`id`, `song_name`, `youtube_url`, `uploaded_on`, `description`) VALUES
(1, 'Amenitendea mema Mungu', 'https://www.youtube.com/live/5BLf8ZH8Jks?si=gvG8tinfL9d5jp9e', '2025-02-17 12:27:42', 'He\'s the Lord'),
(3, 'Your Presence is Heaven to me', 'https://www.youtube.com/live/5BLf8ZH8Jks?si=gvG8tinfL9d5jp9e', '2025-02-17 13:43:22', 'Sweet Presence '),
(4, 'Msalabani', 'https://www.youtube.com/live/5BLf8ZH8Jks?si=gvG8tinfL9d5jp9e', '2025-02-17 13:46:09', 'The Cross'),
(5, 'Mwokozi Yesu', 'https://www.youtube.com/live/5BLf8ZH8Jks?si=gvG8tinfL9d5jp9e', '2025-02-17 13:50:08', 'The savior '),
(7, 'Mwokozi Yesu', 'https://www.youtube.com/live/5BLf8ZH8Jks?si=gvG8tinfL9d5jp9e', '2025-02-17 13:54:28', 'mwokozi ni yesu'),
(8, 'Mweza Yote', 'https://www.youtube.com/watch?v=yHKWmz4lghs', '2025-02-19 08:00:53', 'Lifting Jesus\' name through songs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_songs`
--
ALTER TABLE `youtube_songs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `youtube_songs`
--
ALTER TABLE `youtube_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 10:22 AM
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
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `role`) VALUES
(5, 'Bonface2', '$2y$10$KhcRc482TexgGwjqwG74zuUudSb9iWTACmNgSZbe/1HOdSno9esUm', ''),
(9, 'Maina  Njenga Maina', '$2y$10$s9jNex9SvuSWNPJLp/zpIe0DhnDNtr5tpe1xLErU8WJoNPqoCWId6', 'Manager'),
(10, 'Julia Moraa', '$2y$10$unsEE9tsqADzsXpvT4tzPOoS7i2mzLmEka9ehpOLtbRBUvo50d/5K', 'Super Admin'),
(11, 'Onduso Bonface', '$2y$10$GNvejLgpvCaca7ehQAw2tOeVLcpAzyNzvBNPUzqHxisrwdAmZgQOy', 'Super Admin');

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
(6, 'Referral ', 'Another blog', 'IMG-20241012-WA0018.jpg', 'active', '2025-02-19 17:36:24', '2025-02-19 20:36:24'),
(7, 'Heaven', 'Heavens Gate', 'IMG-20241012-WA0008.jpg', 'active', '2025-02-19 17:46:08', '2025-02-19 20:46:08'),
(8, 'Hello ', 'Blog', 'IMG-20241012-WA0025.jpg', 'active', '2025-02-19 17:47:35', '2025-02-19 20:47:35'),
(10, 'hhhh', 'jjjjj', 'IMG-20241012-WA0016.jpg', 'active', '2025-02-19 17:52:36', '2025-02-19 20:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `donation_date` datetime NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_name`, `amount`, `donation_date`, `payment_method`, `notes`) VALUES
(3, 'Moraa Moraa', 1200.00, '2025-02-20 00:00:00', 'Mobile Payment', 'to  be deposited to bank'),
(4, 'John  James', 1200.00, '2025-02-28 00:00:00', 'Cash', 'To be deposited in the Choir`s Bank Account'),
(5, 'Martha', 34000.00, '2025-02-20 14:46:00', 'Mobile Payment', 'Paid today'),
(6, 'Onduso Bonface', 20000.00, '2025-02-19 12:43:21', 'Mobile Payment', 'to help support the choir'),
(7, 'Onduso Bonface', 20000.00, '2025-02-19 12:45:36', 'Mobile Payment', 'to help support the choir'),
(8, 'Onduso Bonface', 20000.00, '2025-02-19 12:46:46', 'Mobile Payment', 'to help support the choir'),
(9, 'Onduso Bonface', 20000.00, '2025-02-19 12:48:16', 'Mobile Payment', 'to help support the choir'),
(10, 'Onduso Bonface', 67890.00, '2025-02-19 15:23:53', 'Credit Card', '67889');

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
(9, 'Ceremony ', '2025-03-04', 'come', 'inactive', '2025-02-17 13:30:15', '', 'WhatsApp Image 2024-09-09 at 22.50.14_220ee79c.jpg'),
(10, 'data entry ', '2025-02-20', 'hhhh', 'inactive', '2025-02-19 07:52:49', '', 'WhatsApp Image 2024-09-09 at 22.50.14_220ee79c.jpg'),
(11, 'Karaoke ', '2025-02-20', 'come  we have fun ', 'inactive', '2025-02-19 12:04:17', '', '2.png'),
(12, 'singing today', '2025-02-21', 'the first event', 'active', '2025-02-19 17:58:35', '', 'IMG-20241012-WA0011.jpg'),
(13, 'wedding show today', '2025-02-21', 'Happening now', 'active', '2025-02-19 17:59:52', '', 'IMG-20241012-WA0027.jpg'),
(14, 'Melody', '2025-02-21', 'Joyous ', 'active', '2025-02-19 18:00:48', '', 'IMG-20241012-WA0018.jpg');

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
(7, 'James', 'Choir Leader', '../uploads/WhatsApp Image 2024-09-09 at 22.50.14_220ee79c.jpg', 'singer'),
(8, 'Fredrick Ochieng', 'Choir Leader', '../uploads/2.png', 'jjjjjj');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_songs`
--

CREATE TABLE `youtube_songs` (
  `id` int(11) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` text DEFAULT NULL,
  `song_cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youtube_songs`
--

INSERT INTO `youtube_songs` (`id`, `song_name`, `youtube_url`, `uploaded_on`, `description`, `song_cover`) VALUES
(1, 'Amenitendea mema Mungu', 'https://www.youtube.com/live/5BLf8ZH8Jks?si=gvG8tinfL9d5jp9e', '2025-02-17 12:27:42', 'He\'s the Lord', '67b61d435bf79.jpg'),
(3, 'Your Presence is Heaven to me', 'https://www.youtube.com/live/5BLf8ZH8Jks?si=gvG8tinfL9d5jp9e', '2025-02-17 13:43:22', 'Sweet Presence', '67b5d564c2f0b.jpg'),
(4, 'Msalabani', 'https://www.youtube.com/live/5BLf8ZH8Jks?si=gvG8tinfL9d5jp9e', '2025-02-17 13:46:09', 'The Cross', '67b61d8f854c1.jpg'),
(8, 'Mweza Yote', 'https://www.youtube.com/watch?v=yHKWmz4lghs', '2025-02-19 08:00:53', 'Lifting Jesus\' name through songs', '67b5d584138da.jpg'),
(10, 'Unaweza', 'http://localhost/crown_ministers/add_song.php', '2025-02-19 12:33:46', 'hhhs', '67b5cfaa5d07f.jpg'),
(11, 'Unaweza', 'http://localhost/crown_ministers/add_song.php', '2025-02-19 13:13:23', 'hhhh', '67b5d8f3d5c94.jpg');

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
-- Indexes for table `donations`
--
ALTER TABLE `donations`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `youtube_songs`
--
ALTER TABLE `youtube_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

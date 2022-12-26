-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 12:16 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventemitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `pass_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`user_id`, `event_id`, `pass_id`) VALUES
(2, 28, NULL),
(2, 29, NULL),
(6, 28, NULL),
(6, 29, NULL),
(9, 28, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`ticket_id`, `user_id`) VALUES
(41, 9);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `type` enum('festival','competition','music','sports','workshop','art','staged','informational') NOT NULL,
  `registration_endtime` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `current_capacity` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `rating` float(2,1) NOT NULL DEFAULT 0.0,
  `ticket_price` float(8,2) DEFAULT 0.00,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `location_id`, `title`, `creator_id`, `description`, `type`, `registration_endtime`, `start_time`, `end_time`, `current_capacity`, `status`, `rating`, `ticket_price`, `image`) VALUES
(28, 27, 'Kutu Oyunu', 6, 'Takımına güvenenleri bu oyuna bekleriz.', 'competition', '2023-01-01 19:16:00', '2023-01-08 19:14:00', '2023-01-08 23:14:00', 3, 'active', 0.0, 0.00, 'https://m.media-amazon.com/images/W/WEBP_402378-T1/images/I/81qy+MXuxDL._AC_SL1392_.jpg'),
(29, 28, 'Kahoot Yarışması', 6, 'Ödülleri kazanmak istiyorsanız katılın.', 'competition', '2022-12-29 19:18:00', '2022-12-30 19:18:00', '2022-12-30 21:18:00', 2, 'active', 0.0, 0.00, 'https://cdn.mos.cms.futurecdn.net/oRMtEHPj8CxAvJ5P9BUp36.jpg'),
(32, 31, 'Karaoke', 6, 'Mikrofonu al ve yeteneğini göster', 'music', '2023-01-03 11:12:00', '2023-01-07 11:12:00', '2023-01-07 15:12:00', 0, 'active', 0.0, 15.00, 'https://img.freepik.com/free-vector/karaoke-with-microphones-stars-neon-style_24908-60794.jpg?w=2000'),
(33, 32, 'Weird', 9, '123123', 'competition', '2022-12-27 11:11:00', '2022-12-29 12:16:00', '2022-12-30 12:16:00', 0, 'active', 0.0, 0.00, '123123131');

-- --------------------------------------------------------

--
-- Table structure for table `event-pass`
--

CREATE TABLE `event-pass` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event-pass`
--

INSERT INTO `event-pass` (`id`, `date`) VALUES
(38, '2022-12-24 14:15:40'),
(39, '2022-12-25 16:44:46'),
(41, '2022-12-26 10:13:23'),
(42, '2022-12-26 10:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `event-post`
--

CREATE TABLE `event-post` (
  `post_id` int(11) NOT NULL,
  `text` varchar(2000) DEFAULT NULL,
  `photograph` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event-post`
--

INSERT INTO `event-post` (`post_id`, `text`, `photograph`, `link`) VALUES
(7, 'aa', 'aa', 'aa'),
(8, 'bb', 'bb', 'bb'),
(9, 'Demo5 123', 'https://images.adsttc.com/media/images/5e04/2cbf/3312/fd20/9300/0019/large_jpg/174AJ20191106D0002.jpg?1577331892', '123123'),
(10, '12312312', 'https://images.adsttc.com/media/images/5e04/2cbf/3312/fd20/9300/0019/large_jpg/174AJ20191106D0002.jpg?1577331892', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `id` int(11) NOT NULL,
  `response` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invitation`
--

INSERT INTO `invitation` (`id`, `response`) VALUES
(38, 'accepted'),
(39, NULL),
(42, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`user_id`, `post_id`) VALUES
(2, 9),
(9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `address_city` varchar(255) DEFAULT NULL,
  `address_street` varchar(255) DEFAULT NULL,
  `address_building` varchar(255) DEFAULT NULL,
  `online_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `address_city`, `address_street`, `address_building`, `online_address`) VALUES
(23, 'Antalya', 'Muratpaşa', 'Erkanlar Apartmanı', ''),
(24, 'Antalya', 'Muratpaşa', 'Erkanlar Beach', ''),
(25, 'aa', 'aa', 'aa', ''),
(26, 'ss', 'ss', 'ss', ''),
(27, 'Antalya', 'Muratpaşa Mah.', 'Erkanlar Apartmanı', ''),
(28, 'Ankara', 'Bilkent', 'BZ-06', ''),
(29, 'Ankara', 'Bilkent', 'BZ-01', ''),
(30, 'Ankara', 'Çankaya', 'Armada', ''),
(31, 'Yalova', 'Altınova', 'Merkez Mah.', ''),
(32, 'Ankara', 'Bilkent', 'EA Building', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`user_id`, `event_id`, `post_id`) VALUES
(9, 28, 9),
(9, 28, 10);

-- --------------------------------------------------------

--
-- Table structure for table `restriction`
--

CREATE TABLE `restriction` (
  `event_id` int(11) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `pass_requirement` enum('T','I') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restriction`
--

INSERT INTO `restriction` (`event_id`, `capacity`, `age`, `gender`, `pass_requirement`) VALUES
(28, 50, NULL, NULL, 'I'),
(29, 100, NULL, NULL, 'I'),
(32, 200, 18, NULL, 'T'),
(33, NULL, 21, NULL, 'I');

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE `send` (
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `invitation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `send`
--

INSERT INTO `send` (`sender_id`, `receiver_id`, `invitation_id`) VALUES
(2, 6, 42);

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`user_id`, `location_id`) VALUES
(2, 28);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `seating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `price`, `seating`) VALUES
(41, 150.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `type` enum('A','U') NOT NULL DEFAULT 'U',
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rating` float(2,1) NOT NULL DEFAULT 0.0
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `first_name`, `middle_name`, `last_name`, `dateOfBirth`, `age`, `gender`, `mail`, `password`, `rating`) VALUES
(2, 'U', 'Recep', NULL, 'Uysal', '2000-12-13', 21, 'M', 'ruysal@gmail.com', '$2y$10$bJHT/wO.00Hw6vOkvOZgEeCNczllUKlUrZoLhy9Wxi13BoVcTo4aW', 0.0),
(6, 'U', 'Efe', 'Cevat', 'Erkan', '2015-02-05', 7, 'M', 'eferkan112@gmail.com', '$2y$10$Pu2Uso2OZgwjnPcNPKZHqecb1hyu9JEh5Tled9iQUsxzq3TODqP1a', 0.0),
(8, 'A', 'admin', '', 'admin', '2020-06-05', 2, 'M', 'admin@admin', '$2y$10$q5Ae0ixwT4O9Q.QM2B0nHeEzFlqjyc2Pgq7Fj1.k8A7lkc8K4iyNW', 0.0),
(9, 'U', 'Demo5', 'Demo5/', 'Demo5', '2001-12-04', 15, 'M', 'o@o.com', '$2y$10$IjMZLDOylIQYsk5LFLs.1e22cYYqcZnXaryVCDg9XFoHqVI1B7Fn2', 0.0);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` float(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `user_id`, `balance`) VALUES
(7, 9, 850.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD PRIMARY KEY (`user_id`,`event_id`),
  ADD KEY `pass_id` (`pass_id`),
  ADD KEY `attend_ibfk_1` (`event_id`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `buy_ibfk_2` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`,`post_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `comment_ibfk_2` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_ibfk_1` (`creator_id`),
  ADD KEY `event_ibfk_2` (`location_id`);

--
-- Indexes for table `event-pass`
--
ALTER TABLE `event-pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event-post`
--
ALTER TABLE `event-post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`user_id`,`event_id`,`post_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `post_ibfk_2` (`event_id`);

--
-- Indexes for table `restriction`
--
ALTER TABLE `restriction`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`sender_id`,`receiver_id`,`invitation_id`),
  ADD KEY `invitation_id` (`invitation_id`),
  ADD KEY `send_ibfk_2` (`receiver_id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`user_id`,`location_id`),
  ADD KEY `share_ibfk_2` (`location_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`,`user_id`),
  ADD KEY `wallet_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `event-pass`
--
ALTER TABLE `event-pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `event-post`
--
ALTER TABLE `event-post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attend_ibfk_3` FOREIGN KEY (`pass_id`) REFERENCES `event-pass` (`id`);

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `event-post` (`post_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `invitation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `event-pass` (`id`);

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `event-post` (`post_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `event-post` (`post_id`);

--
-- Constraints for table `restriction`
--
ALTER TABLE `restriction`
  ADD CONSTRAINT `restriction_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `send`
--
ALTER TABLE `send`
  ADD CONSTRAINT `send_ibfk_1` FOREIGN KEY (`invitation_id`) REFERENCES `invitation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `send_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `send_ibfk_3` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `share_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `share_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id`) REFERENCES `event-pass` (`id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

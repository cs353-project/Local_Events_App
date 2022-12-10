-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 05:10 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `type` varchar(255) NOT NULL,
  `registration_endtime` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `current_capacity` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `rating` float(2,1) NOT NULL DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event-pass`
--

CREATE TABLE `event-pass` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `id` int(11) NOT NULL,
  `response` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE `send` (
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `invitation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `seating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'U', 'Recep', '', 'Uysal', '2000-06-20', 22, 'M', 'ruysal@gmail.com', '$2y$10$bJHT/wO.00Hw6vOkvOZgEeCNczllUKlUrZoLhy9Wxi13BoVcTo4aW', 0.0),
(6, 'U', 'Efe', '', 'Erkan', '2000-09-01', 22, 'M', 'eferkan112@gmail.com', '$2y$10$Pu2Uso2OZgwjnPcNPKZHqecb1hyu9JEh5Tled9iQUsxzq3TODqP1a', 0.0);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD PRIMARY KEY (`user_id`,`event_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `pass_id` (`pass_id`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`,`post_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `location_id` (`location_id`);

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
  ADD PRIMARY KEY (`user_id`),
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
  ADD PRIMARY KEY (`user_id`,`event_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `restriction`
--
ALTER TABLE `restriction`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`sender_id`,`receiver_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `invitation_id` (`invitation_id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`user_id`,`location_id`),
  ADD KEY `location_id` (`location_id`);

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
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event-pass`
--
ALTER TABLE `event-pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event-post`
--
ALTER TABLE `event-post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `attend_ibfk_3` FOREIGN KEY (`pass_id`) REFERENCES `event-pass` (`id`);

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `event-post` (`post_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `invitation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `event-pass` (`id`);

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `event-post` (`post_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `event-post` (`post_id`);

--
-- Constraints for table `restriction`
--
ALTER TABLE `restriction`
  ADD CONSTRAINT `restriction_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `send`
--
ALTER TABLE `send`
  ADD CONSTRAINT `send_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `send_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `send_ibfk_3` FOREIGN KEY (`invitation_id`) REFERENCES `invitation` (`id`);

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `share_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `share_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id`) REFERENCES `event-pass` (`id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

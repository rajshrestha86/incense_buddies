-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2018 at 03:33 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ITECH3224_30119581`
--

-- --------------------------------------------------------

--
-- Table structure for table `Block`
--

CREATE TABLE `Block` (
  `user_id` varchar(50) NOT NULL,
  `blocked_user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `id` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `incenselink_id` int(10) NOT NULL,
  `comment_text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`id`, `user_id`, `incenselink_id`, `comment_text`) VALUES
(19, 'pradip28', 14, 'Thank god there was not any casualties or serious accident.'),
(20, 'bipin', 14, 'That is sad. I hope everyone is fine.'),
(21, 'tutor', 14, 'That\'s really terrible. People trying to hijack planes.'),
(22, 'rajs', 15, 'Good man. We need more people like him.'),
(23, 'jack', 14, 'I hope everyone is doing well.'),
(24, 'jack', 14, 'Did they catch the hijacker?'),
(25, 'rajs', 14, 'They have captured the hijacker.'),
(26, 'jack', 16, 'I didn\'t know jet ski could fly.'),
(27, 'jack', 15, 'Thank god. He is saved.'),
(28, 'pradip28', 18, 'Wow Beautiful.');

-- --------------------------------------------------------

--
-- Table structure for table `IncenseLink`
--

CREATE TABLE `IncenseLink` (
  `id` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `link_url` varchar(1000) NOT NULL,
  `title` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IncenseLink`
--

INSERT INTO `IncenseLink` (`id`, `user_id`, `datetime`, `link_url`, `title`) VALUES
(14, 'pradip28', '2018-08-11 14:52:00.000000', 'http://www.foxnews.com/us/2018/08/11/possible-hijacking-reported-at-seatac-airport-in-washington-state.html', 'Possible hijacking reported at SeaTac airport'),
(15, 'tutor', '2018-08-11 15:12:00.000000', 'https://i.imgur.com/nQoGH1N.gifv', 'Guy Performs CPR and Saves Dog.'),
(16, 'rajs', '2018-08-11 15:15:00.000000', 'https://i.imgur.com/r7yxJRn.gifv', 'Jet ski explodes, launching its rider into the air.'),
(17, 'jack', '2018-08-11 15:16:00.000000', 'https://www.nature.com/articles/d41586-018-05752-3?utm_source=twt_na&utm_medium=social&utm_campaign=NNPnature&error=cookies_not_supported&code=513b3e0d-37e5-4dfe-bac6-81c551f8bc1d', 'Ten years left to redesign lithium-ion batteries.'),
(18, 'suman', '2018-08-11 15:20:00.000000', 'https://i.imgur.com/brQAKhw.jpg', 'Plitvice Lake, Croatia\r\n#NATURE'),
(19, 'pradip28', '2018-08-11 15:21:00.000000', 'https://imgur.com/8Vuxgl2.jpeg', 'Mobile games in a nutshell'),
(20, 'pradip28', '2018-08-11 15:26:00.000000', 'https://i.imgur.com/zG3lGoJ.jpg', 'Protestor\r\n'),
(21, 'suman', '2018-08-11 15:27:00.000000', 'https://www.buzzfeednews.com/article/kevincollier/2016-sweden-ddos-expressen-hack-russia-cables', 'Massive Attack On Swedish News Sites.\r\n#News'),
(22, 'rajs', '2018-08-11 15:29:00.000000', 'https://i.imgur.com/BkWWU5g.jpg', 'Platypuppy'),
(23, 'jack', '2018-08-11 15:30:00.000000', 'http://imgur.com/Pou66dD', 'Late 2000s-early 2010s childhood starter pack');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `name`, `email`, `password`) VALUES
('bipin', 'Bipin Khatiwada', 'bipin@gmail.com', '$2y$10$ez8uwOX.UvYdz.dt0/L0Ge77gruzTJHZ4zYgrmxFRbN/Hw58uzCFi'),
('guest', 'guest', 'guest@mail.com', '$2y$10$123185911030000999999uRJ7cDCx5tftRS.AbQ.Zoo/saQylWhCO'),
('jack', 'Jack Sparrow', 'jack23@gmail.com', '$2y$10$v59J/6eQCCbNX8xeMB6BYuNLyX0r5V25LznNS.8guzUvSGd5jGwuW'),
('pradip28', 'Pradip Dutta', 'pradip28@gmail.com', '$2y$10$s377VYNtxAw2UBMpesbkaeCbizwAmgfz2m6.Zs0AzpMtCwCyS3K2S'),
('rajs', 'Raj Shrestha', 'razzester86@gmail.com', '$2y$10$rHHOosiKLzJf/arICwcJ2.MUc1bjfm7uL4hpJDU26I2doC.0fppya'),
('suman', 'Suman Shrestha', 'suman@gmail.com', '$2y$10$C2EwaV3CEJR/GIGD2Boo9.Zqpjapczu4Ro5fys/szUuJ8JUCdDXuq'),
('tutor', 'Tutor', 'tutor@gmail.com', '$2y$10$1I3V/jwsdXWL.0wBdYYUNuipH0jg387eHXWdnggxdaNkSkZRjj2.2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Block`
--
ALTER TABLE `Block`
  ADD PRIMARY KEY (`user_id`,`blocked_user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `blocked_user_id` (`blocked_user_id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `incenselink_id` (`incenselink_id`);

--
-- Indexes for table `IncenseLink`
--
ALTER TABLE `IncenseLink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `IncenseLink`
--
ALTER TABLE `IncenseLink`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Block`
--
ALTER TABLE `Block`
  ADD CONSTRAINT `FK_BLOCK_USER` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `FK_BLOCK_USER2` FOREIGN KEY (`blocked_user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `FK_COMMENT_INCENSELINK` FOREIGN KEY (`incenselink_id`) REFERENCES `IncenseLink` (`id`),
  ADD CONSTRAINT `FK_COMMENT_USER` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `IncenseLink`
--
ALTER TABLE `IncenseLink`
  ADD CONSTRAINT `FK_LINK_USER` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

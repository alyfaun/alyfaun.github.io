-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 02:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sernoski_crowgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `prize`
--

CREATE TABLE `prize` (
  `prizeId` int(11) NOT NULL,
  `item` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prize`
--

INSERT INTO `prize` (`prizeId`, `item`, `img`, `details`) VALUES
(1, 'Panda Doll', 'panda.png', 'A small stuffed panda doll. Maybe it can be your new best friend'),
(2, 'Money Bag', 'money.png', 'This bag is filled with coins, sucks that a crow cant use it.'),
(3, 'Paperclip', 'clip.png', 'Not much use for this.'),
(8, 'Keychain', 'duck.png', 'A key change with a duck charm, very cute.'),
(9, 'Acorn', 'acorn.png', 'The perfect ammo to drop on your enemies heads.'),
(10, 'Game Token', 'token.png', 'A game token from the nearby arcade. Cant use it with Crow Game gachapon though.'),
(11, 'Mouse', 'mouse.png', 'A stuffed toy mouse.. or you at least hope its a toy.'),
(12, 'Earring', 'earring.png', 'A shiny golden earring with sapphire. What poor lady did you steal this off of'),
(13, 'Blueberries', 'berry.png', 'A couple blueberries. Perfect snack before you afternoon nap.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `display` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `points` int(255) NOT NULL,
  `roleId` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `username`, `display`, `password`, `points`, `roleId`) VALUES
(1, 'sernoski@sheridancollege.ca', 'alys', 'faun', 'admin', 90000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user-prize`
--

CREATE TABLE `user-prize` (
  `userId` int(11) NOT NULL,
  `prizeId` int(11) NOT NULL,
  `item` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL,
  `details` varchar(500) NOT NULL,
  `received` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user-prize`
--

INSERT INTO `user-prize` (`userId`, `prizeId`, `item`, `img`, `details`, `received`) VALUES
(1, 13, 'Blueberries', 'berry.png', 'A couple blueberries. Perfect snack before you afternoon nap.', '2021-12-15 18:45:06.180578'),
(1, 9, 'Acorn', 'acorn.png', 'The perfect ammo to drop on your enemies heads.', '2021-12-15 18:46:16.466084'),
(1, 9, 'Acorn', 'acorn.png', 'The perfect ammo to drop on your enemies heads.', '2021-12-15 18:46:19.760124'),
(1, 10, 'Game Token', 'token.png', 'A game token from the nearby arcade. Cant use it with Crow Game gachapon though.', '2021-12-15 18:46:22.013578'),
(1, 12, 'Earring', 'earring.png', 'A shiny golden earring with sapphire. What poor lady did you steal this off of', '2021-12-15 18:46:41.630935'),
(1, 3, 'Paperclip', 'clip.png', 'Not much use for this.', '2021-12-15 18:46:45.354623'),
(1, 2, 'Money Bag', 'money.png', 'This bag is filled with coins, sucks that a crow cant use it.', '2021-12-15 18:46:51.213565'),
(1, 9, 'Acorn', 'acorn.png', 'The perfect ammo to drop on your enemies heads.', '2021-12-15 18:46:53.542580'),
(1, 1, 'Panda Doll', 'panda.png', 'A small stuffed panda doll. Maybe it can be your new best friend', '2021-12-15 18:46:56.845747'),
(1, 9, 'Acorn', 'acorn.png', 'The perfect ammo to drop on your enemies heads.', '2021-12-15 18:57:01.382828'),
(1, 3, 'Paperclip', 'clip.png', 'Not much use for this.', '2021-12-15 18:57:55.516167'),
(1, 10, 'Game Token', 'token.png', 'A game token from the nearby arcade. Cant use it with Crow Game gachapon though.', '2021-12-15 19:00:14.068535'),
(1, 8, 'Keychain', 'duck.png', 'A key change with a duck charm, very cute.', '2021-12-15 19:00:39.987392'),
(1, 1, 'Panda Doll', 'panda.png', 'A small stuffed panda doll. Maybe it can be your new best friend', '2021-12-15 19:02:52.069993'),
(1, 8, 'Keychain', 'duck.png', 'A key change with a duck charm, very cute.', '2021-12-15 19:04:47.967905'),
(1, 11, 'Mouse', 'mouse.png', 'A stuffed toy mouse.. or you at least hope its a toy.', '2021-12-15 19:05:09.761198'),
(1, 2, 'Money Bag', 'money.png', 'This bag is filled with coins, sucks that a crow cant use it.', '2021-12-15 19:06:23.697356'),
(1, 2, 'Money Bag', 'money.png', 'This bag is filled with coins, sucks that a crow cant use it.', '2021-12-15 19:06:36.548127'),
(1, 1, 'Panda Doll', 'panda.png', 'A small stuffed panda doll. Maybe it can be your new best friend', '2021-12-15 19:06:48.294837'),
(1, 11, 'Mouse', 'mouse.png', 'A stuffed toy mouse.. or you at least hope its a toy.', '2021-12-15 19:06:55.600443'),
(1, 8, 'Keychain', 'duck.png', 'A key change with a duck charm, very cute.', '2021-12-15 19:07:05.263679'),
(1, 2, 'Money Bag', 'money.png', 'This bag is filled with coins, sucks that a crow cant use it.', '2021-12-15 19:07:16.872436'),
(1, 12, 'Earring', 'earring.png', 'A shiny golden earring with sapphire. What poor lady did you steal this off of', '2021-12-15 19:09:25.735602'),
(1, 2, 'Money Bag', 'money.png', 'This bag is filled with coins, sucks that a crow cant use it.', '2021-12-15 19:10:25.861646'),
(1, 10, 'Game Token', 'token.png', 'A game token from the nearby arcade. Cant use it with Crow Game gachapon though.', '2021-12-15 19:10:50.628821'),
(1, 3, 'Paperclip', 'clip.png', 'Not much use for this.', '2021-12-15 19:11:49.202208'),
(1, 2, 'Money Bag', 'money.png', 'This bag is filled with coins, sucks that a crow cant use it.', '2021-12-15 19:15:14.458500'),
(1, 1, 'Panda Doll', 'panda.png', 'A small stuffed panda doll. Maybe it can be your new best friend', '2021-12-15 19:15:23.796113'),
(1, 11, 'Mouse', 'mouse.png', 'A stuffed toy mouse.. or you at least hope its a toy.', '2021-12-15 19:15:37.689561'),
(1, 8, 'Keychain', 'duck.png', 'A key change with a duck charm, very cute.', '2021-12-15 19:16:16.469454'),
(1, 8, 'Keychain', 'duck.png', 'A key change with a duck charm, very cute.', '2021-12-15 19:36:15.968633'),
(1, 1, 'Panda Doll', 'panda.png', 'A small stuffed panda doll. Maybe it can be your new best friend', '2021-12-15 19:42:09.572688'),
(1, 13, 'Blueberries', 'berry.png', 'A couple blueberries. Perfect snack before you afternoon nap.', '2021-12-15 19:47:24.815963'),
(1, 12, 'Earring', 'earring.png', 'A shiny golden earring with sapphire. What poor lady did you steal this off of', '2021-12-15 19:49:55.861405'),
(1, 12, 'Earring', 'earring.png', 'A shiny golden earring with sapphire. What poor lady did you steal this off of', '2021-12-15 20:52:55.615476'),
(1, 12, 'Earring', 'earring.png', 'A shiny golden earring with sapphire. What poor lady did you steal this off of', '2021-12-15 20:54:34.608257'),
(1, 1, 'Panda Doll', 'panda.png', 'A small stuffed panda doll. Maybe it can be your new best friend', '2021-12-15 21:22:38.443957'),
(1, 8, 'Keychain', 'duck.png', 'A key change with a duck charm, very cute.', '2021-12-15 23:40:02.794399'),
(1, 9, 'Acorn', 'acorn.png', 'The perfect ammo to drop on your enemies heads.', '2021-12-16 01:29:22.800491');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prize`
--
ALTER TABLE `prize`
  ADD PRIMARY KEY (`prizeId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prize`
--
ALTER TABLE `prize`
  MODIFY `prizeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

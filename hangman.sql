-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2015 at 01:43 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hangman`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `gid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `points` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gid`, `uid`, `points`, `time`) VALUES
(1, 3, 0, '2015-12-15 12:22:25'),
(2, 5, 110, '2015-12-15 12:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) NOT NULL,
  `user` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user`) VALUES
(1, 'marios'),
(2, 'dim'),
(3, 'maria'),
(4, 'new_p'),
(5, 'apo');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE IF NOT EXISTS `words` (
  `wid` int(10) NOT NULL,
  `word` char(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`wid`, `word`) VALUES
(1, 'ΕΠΙΦΑΝΕΙΑ'),
(2, 'ΣΥΝΕΧΗΣ'),
(3, 'ΗΜΕΡΟΜΗΝΙΑ'),
(4, 'ΑΝΕΠΙΘΥΜΗΤΟΣ'),
(5, 'ΑΝΤΙΡΡΗΣΗ'),
(6, 'ΒΥΣΣΙΝΟ'),
(7, 'ΒΟΡΡΑΣ'),
(8, 'ΓΡΑΜΜΑΤΕΑΣ'),
(9, 'ΓΕΙΤΟΝΙΣΣΑ'),
(10, 'ΔΙΑΡΡΗΚΤΗΣ'),
(11, 'ΔΙΑΛΕΙΜΜΑ'),
(12, 'ΕΛΑΤΤΩΜΑ'),
(13, 'ΕΥΦΥΙΑ'),
(14, 'ΦΑΓΗΤΟ'),
(15, 'ΑΠΟΧΩΡΗΣΗ'),
(16, 'ΔΙΑΡΚΕΙΑ'),
(17, 'ΕΠΙΠΟΛΑΙΟΣ'),
(18, 'ΧΡΗΣΙΜΟΣ'),
(19, 'ΤΕΛΕΥΤΑΙΟΣ'),
(20, 'ΚΛΟΠΗ'),
(21, 'ΠΕΡΙΠΟΙΗΣΗ'),
(22, 'ΠΛΗΡΟΦΟΡΙΑ'),
(23, 'ΠΕΡΙΦΕΡΕΙΑΚΟΣ'),
(24, 'ΚΑΝΕΛΑ'),
(25, 'ΚΕΡΑΜΙΔΙ'),
(26, 'ΛΟΞΥΓΚΑΣ'),
(27, 'ΙΣΟΡΡΟΠΙΑ'),
(28, 'ΜΕΓΕΘΥΝΣΗ'),
(29, 'ΜΠΑΛΑ'),
(30, 'ΞΕΝΟΙΑΣΤΟΣ'),
(31, 'ΞΙΝΟΣ'),
(32, 'ΟΡΙΣΜΕΝΟΣ'),
(33, 'ΟΔΥΣΣΕΙΑ'),
(34, 'ΜΠΑΧΑΡΙΚΟ'),
(35, 'ΚΤΙΡΙΟ'),
(36, 'ΑΡΡΩΣΤΟΣ'),
(37, 'ΠΟΔΗΛΑΤΟ'),
(38, 'ΦΩΤΟΓΡΑΦΙΑ'),
(39, 'ΠΟΔΟΣΦΑΙΡΟ'),
(40, 'ΤΑΛΑΙΠΩΡΙΑ'),
(41, 'ΛΕΜΟΝΙ'),
(42, 'ΠΑΝΑΚΕΙΑ'),
(43, 'ΠΕΡΙΠΕΤΕΙΑ'),
(44, 'ΠΕΡΙΠΟΙΗΣΗ'),
(45, 'ΠΡΩΤΟΠΟΡΙΑ'),
(46, 'ΣΠΑΓΚΟΣ'),
(47, 'ΣΥΝΗΜΜΕΝΟΣ'),
(48, 'ΤΑΞΙΔΙ'),
(49, 'ΤΕΣΣΕΡΑ'),
(50, 'ΥΓΙΕΙΝΟΣ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `wid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

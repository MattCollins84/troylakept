-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2014 at 12:29 PM
-- Server version: 5.5.12
-- PHP Version: 5.4.24

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `troylakept`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `name`, `email`) VALUES
(1, 'Matt', 'matt@strikesandgutters.com');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote` text NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`quote_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `quote`, `name`) VALUES
(1, 'Troy helped me achieve all of my goals, I managed to lose weight, tone up & I have never felt better. Can''t wait for my holiday now!', 'Tracey, Redcar'),
(3, 'My One on One training with Troy really helped me bulk up in time for my Iron Man event. I couldn''t have finished the course if it wasn''t for Troy!', 'Dave, Saltburn');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `url`, `title`, `description`, `thumbnail`, `featured`) VALUES
(2, 'https://www.youtube.com/watch?v=OLy4QVp68_U', 'Incubus - Incubus Drive (Live in New York City 2001)', 'Music video by Incubus performing Drive. (Live in New York City 2001)(C) 2002 SONY BMG MUSIC ENTERTAINMENT', 'http://i1.ytimg.com/vi/OLy4QVp68_U/default.jpg', 1),
(5, 'https://www.youtube.com/watch?v=2NeW4TlB8oQ', 'Incubus - Incubus Just A Phase (Live in New York City 2001)', 'Music video by Incubus performing Just A Phase. (Live in New York City 2001)(C) 2002 SONY BMG MUSIC ENTERTAINMENT', 'http://i1.ytimg.com/vi/2NeW4TlB8oQ/default.jpg', 0),
(6, 'https://www.youtube.com/watch?v=2NeW4TlB8oQ', 'Incubus - Incubus Just A Phase (Live in New York City 2001)', 'Music video by Incubus performing Just A Phase. (Live in New York City 2001)(C) 2002 SONY BMG MUSIC ENTERTAINMENT', 'http://i1.ytimg.com/vi/2NeW4TlB8oQ/default.jpg', 0),
(7, 'https://www.youtube.com/watch?v=2NeW4TlB8oQ', 'Incubus - Incubus Just A Phase (Live in New York City 2001)', 'Music video by Incubus performing Just A Phase. (Live in New York City 2001)(C) 2002 SONY BMG MUSIC ENTERTAINMENT', 'http://i1.ytimg.com/vi/2NeW4TlB8oQ/default.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2014 at 04:50 PM
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
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `posted_date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `keywords` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `posted_date`, `title`, `body`, `keywords`, `intro`) VALUES
(1, '2014-07-24', 'Lose weight with this simple training plan', '_Lorem ipsum dolor_ sit amet, consectetur adipiscing elit. **Maecenas** [This link](http://example.net/) velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit.\r\n\r\nNam laoreet bibendum enim in vestibulum. Duis sit amet eros at felis malesuada tincidunt. Cras ultricies accumsan lorem, non lacinia odio adipiscing et. Nulla facilisi. Proin ante eros, fringilla eget porttitor id, vehicula a sapien. Duis dignissim augue sapien, vitae varius risus iaculis sed. Duis non libero dictum, feugiat purus a, facilisis mauris. Praesent tincidunt elit non lectus varius aliquet. Maecenas rhoncus risus eget magna ullamcorper cursus. Sed congue sem justo, ac mattis mi adipiscing id. Vestibulum neque magna, pretium vel purus quis, mollis euismod libero.\r\n\r\n> parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', '_Lorem ipsum dolor_ sit amet, consectetur adipiscing elit. **Maecenas** [This link](http://example.net/) velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit.'),
(2, '2014-06-25', 'Bulk up with this magic potion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit. Nam laoreet bibendum enim in vestibulum. Duis sit amet eros at felis malesuada tincidunt. Cras ultricies accumsan lorem, non lacinia odio adipiscing et. Nulla facilisi. Proin ante eros, fringilla eget porttitor id, vehicula a sapien. Duis dignissim augue sapien, vitae varius risus iaculis sed. Duis non libero dictum, feugiat purus a, facilisis mauris. Praesent tincidunt elit non lectus varius aliquet. Maecenas rhoncus risus eget magna ullamcorper cursus. Sed congue sem justo, ac mattis mi adipiscing id. Vestibulum neque magna, pretium vel purus quis, mollis euismod libero.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit.'),
(3, '2014-05-26', 'Tone up for your holidays', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit. Nam laoreet bibendum enim in vestibulum. Duis sit amet eros at felis malesuada tincidunt. Cras ultricies accumsan lorem, non lacinia odio adipiscing et. Nulla facilisi. Proin ante eros, fringilla eget porttitor id, vehicula a sapien. Duis dignissim augue sapien, vitae varius risus iaculis sed. Duis non libero dictum, feugiat purus a, facilisis mauris. Praesent tincidunt elit non lectus varius aliquet. Maecenas rhoncus risus eget magna ullamcorper cursus. Sed congue sem justo, ac mattis mi adipiscing id. Vestibulum neque magna, pretium vel purus quis, mollis euismod libero.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit.'),
(5, '2014-07-25', 'New post', 'My main body, _underline_ and **bold**\r\n\r\nnew line!!\r\n\r\nanother line!!!!', 'this, is, sparta, and, some, other stuff', 'this is my intro! **BOLD**\r\n\r\nnew line!');

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
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content`, `type`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget porta ante. Donec rutrum, massa vitae dapibus bibendum, ligula sapien lobortis neque, nec tincidunt orci urna a lacus. Fusce non lacus congue, tincidunt ante eget, hendrerit nisi. Fusce et vehicula dolor, in mattis augue. Nulla tempor eros nulla, vitae ullamcorper metus ullamcorper nec.\r\n\r\nNulla aliquet orci justo. Donec eu nibh orci. Vivamus tortor quam, aliquet eu iaculis eget, placerat vel neque. Ut eu facilisis erat, id sodales libero. Aenean malesuada justo ac gravida interdum. Quisque tincidunt hendrerit eleifend. Vestibulum aliquam felis in convallis eleifend. Suspendisse imperdiet mauris mauris, at mollis diam sagittis quis. Fusce vehicula eros nec ante ullamcorper, id sagittis nisl egestas. Nulla vitae nunc venenatis orci varius tempor sit amet sit amet odio.', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote` text NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`quote_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `quote`, `name`) VALUES
(1, 'Troy helped me achieve all of my goals, I managed to lose weight, tone up & I have never felt better. Can''t wait for my holiday now!', 'Tracey, Redcar'),
(3, 'My One on One training with Troy really helped me bulk up in time for my Iron Man event. I couldn''t have finished the course if it wasn''t for Troy!', 'Dave, Saltburn');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `headline` text NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `name`, `headline`, `description`, `icon`) VALUES
(1, '1-2-1 Training', '1-2-1 Personal Training with Troy. Designed to help you achieve your targets and exceed your expectations.', 'My 1-2-1 Personal Training program is just that. **It&rsquo;s personal.** Each session is always tailored to YOUR goals and achieving YOUR targets. Whether your aim is weight loss, muscle gain or improving general fitness, together we will set your goals and measure your strengths and weaknesses. \r\n\r\nI will encourage and motivate you, providing feedback and advice along the way. I am not going to shout and scream at you, but I will  have you working harder than you ever have before. My programme is like nothing you will have ever experienced! Don&rsquo;t be surprised if you are using equipment you have never used before, doing exercises you have never done before and most importantly aching like you have never ached before! \r\n\r\nAs you can see from my results, I apply myself 100% to each of my clients but I ask that they apply themselves 100% to my programme, that&rsquo;s why I only work with clients who are 100% committed.', 'fa-user'),
(3, 'Partner Training', 'The cost effective alternative to 121 Personal Training', 'You will receive all the added benefits of 121 Personal Training, while enjoying the experience with a partner. Partnered personal training can be enjoyed with a friend, spouse or \r\n\r\nPartnered personal training sessions\r\n* motivating\r\n* cost effective\r\n* spending time', 'fa-male,fa-female'),
(4, 'Fit Farm', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore', 'Lorem ipsum dolor sit amet, adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'fa-users'),
(5, 'Bootcamp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore', 'Lorem ipsum dolor sit amet, adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'fa-users'),
(6, 'hardCORE abs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore', 'Lorem ipsum dolor sit amet, adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ''),
(7, 'Diet Plans', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore', 'Lorem ipsum dolor sit amet, adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'fa-list-alt');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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

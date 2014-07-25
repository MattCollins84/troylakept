-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2014 at 11:45 AM
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
  `quote` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `posted_date`, `title`, `body`, `quote`, `intro`) VALUES
(1, '2014-07-24', 'Lose weight with this simple training plan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit. Nam laoreet bibendum enim in vestibulum. Duis sit amet eros at felis malesuada tincidunt. Cras ultricies accumsan lorem, non lacinia odio adipiscing et. Nulla facilisi. Proin ante eros, fringilla eget porttitor id, vehicula a sapien. Duis dignissim augue sapien, vitae varius risus iaculis sed. Duis non libero dictum, feugiat purus a, facilisis mauris. Praesent tincidunt elit non lectus varius aliquet. Maecenas rhoncus risus eget magna ullamcorper cursus. Sed congue sem justo, ac mattis mi adipiscing id. Vestibulum neque magna, pretium vel purus quis, mollis euismod libero.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit.'),
(2, '2014-06-25', 'Bulk up with this magic potion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit. Nam laoreet bibendum enim in vestibulum. Duis sit amet eros at felis malesuada tincidunt. Cras ultricies accumsan lorem, non lacinia odio adipiscing et. Nulla facilisi. Proin ante eros, fringilla eget porttitor id, vehicula a sapien. Duis dignissim augue sapien, vitae varius risus iaculis sed. Duis non libero dictum, feugiat purus a, facilisis mauris. Praesent tincidunt elit non lectus varius aliquet. Maecenas rhoncus risus eget magna ullamcorper cursus. Sed congue sem justo, ac mattis mi adipiscing id. Vestibulum neque magna, pretium vel purus quis, mollis euismod libero.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit.'),
(3, '2014-05-26', 'Tone up for your holidays', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit. Nam laoreet bibendum enim in vestibulum. Duis sit amet eros at felis malesuada tincidunt. Cras ultricies accumsan lorem, non lacinia odio adipiscing et. Nulla facilisi. Proin ante eros, fringilla eget porttitor id, vehicula a sapien. Duis dignissim augue sapien, vitae varius risus iaculis sed. Duis non libero dictum, feugiat purus a, facilisis mauris. Praesent tincidunt elit non lectus varius aliquet. Maecenas rhoncus risus eget magna ullamcorper cursus. Sed congue sem justo, ac mattis mi adipiscing id. Vestibulum neque magna, pretium vel purus quis, mollis euismod libero.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.\r\n\r\nMorbi eu elit in tortor malesuada sollicitudin. Vestibulum pretium hendrerit tortor, non commodo lectus egestas ut. Nullam scelerisque tincidunt ultrices. Suspendisse potenti. Nullam a luctus sapien. Integer eu velit sit amet felis vulputate aliquet. Maecenas vestibulum facilisis nunc, vel malesuada augue dictum sit amet. Duis non purus ut odio lacinia fermentum. Donec quis mi lobortis, tincidunt ligula a, venenatis orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'parturient montes, nascetur ridiculus mus. Cras nec nisl est. Proin imperdiet nunc augue, sit amet rhoncus ante dignissim at.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas velit quam, mollis vitae mattis vitae, elementum ut felis. Integer dapibus erat ut dui bibendum blandit.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

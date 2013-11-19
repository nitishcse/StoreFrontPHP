-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2013 at 08:57 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `movie_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `createdAt`, `updatedAt`, `isDeleted`) VALUES
(1, 'Hollywood Hits', NULL, '2013-11-01 00:00:00', '2013-11-19 00:00:00', 0),
(2, 'Action And Adventure', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Animation', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'Indian  Movies', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'Drama', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `groupId` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `image` text,
  `catId` int(11) DEFAULT NULL,
  `subCatId` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `productId` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `groupId`, `price`, `shipping`, `image`, `catId`, `subCatId`, `createdAt`, `updatedAt`, `isDeleted`, `productId`) VALUES
(1, 'Pathfinder: Legend Of The Ghost Warrior', 'MV12UN12925', 337, 5, 'MV12UN12925.jpg', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'MV12UN12925'),
(3, 'Thomas & Friends: Down The Mine & Other Stories', 'MV12UN14232', 337, 5, 'MV12UN14232-1.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'MV12UN14232-1'),
(5, 'Story Of Women', 'MV12UN6224', 294, 3, 'MV12UN6224-1.jpg', 4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'MV12UN6224-1'),
(6, 'Story Of Women', 'MV12UN6224', 394, 5, 'MV12UN6224-2.jpg', 4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'MV12UN6224-2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

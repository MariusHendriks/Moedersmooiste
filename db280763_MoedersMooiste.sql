-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 10.184.19.113
-- Generation Time: Jun 23, 2018 at 11:31 AM
-- Server version: 5.6.39
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db280763_MoedersMooiste`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text,
  `photo` text,
  `video` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `text`, `photo`, `video`) VALUES
(1, 'home', 'Moeders Mooiste', NULL, NULL),
(2, 'band', 'Verleidelijke jongens, verknipte verhalen &#8211; Nederpop over de kop. De frisse doch stevige geluid van deze band nestelt zich in je hoofd en kruipt in je hart. Bandleden Geert van Oorschot, Bram Capel, Luuk Timmermans en Koen Beerkens maken popmuziek van het kaliber dat de speakers laat knallen. De aanstekelijke zanglijnen die voorman Geert van Oorschot in huis heeft zorgen ervoor dat je je beste bewegingen uit de kast trekt.<br><br>\nIn 2015 bracht de band hun eerste single &#39;Anders dan de Rest&#39; uit. Deze werd in 2016 opgevolgd door hun debuut-EP &#39;Mannenpraat&#39;. Sindsdien is er veel gespeeld, gedanst en gesjanst, maar ook veel geschreven! Daarom brengen de heren in mei 2018 hun tweede EP uit, geproduceerd door Jurriaan Sielcken (o.a. Jett Rebel, Lucas Hamming, Herman van Veen).', NULL, NULL),
(3, 'shows', 'https://rest.bandsintown.com/artists/Moeders%20Mooiste/events?app_id=3588eefe9e412527c83889757754197c', NULL, NULL),
(4, 'videos', NULL, NULL, 'https://www.youtube.com/watch?v=ddZlaO_48og|https://www.youtube.com/watch?v=Nj3UF4zSHmA|https://www.youtube.com/watch?v=1Dj_MRbBTKQ|https://www.youtube.com/watch?v=nxkf7g_6Ljw'),
(5, 'muziek', 'https://open.spotify.com/embed/album/5eIn77N9it9w7jHzT8NlMs|https://open.spotify.com/embed/album/5hjre8nzrsXRDvEzWFQsM4|https://open.spotify.com/embed/album/2a5t31PJc9i8nA3yRrS45C', NULL, NULL),
(6, 'fotos', NULL, NULL, NULL),
(7, 'contact', 'Neem contact met ons op!', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `contentid` int(11) NOT NULL,
  `orders` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `title`, `contentid`, `orders`) VALUES
(1, 'home', 1, 1),
(2, 'band', 2, 2),
(3, 'shows', 3, 3),
(4, 'videos', 4, 4),
(5, 'muziek', 5, 5),
(6, 'fotos', 6, 6),
(7, 'contact', 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `rank`) VALUES
(1, 'Max', '9dcd2f948b449e0731afdbb240134d1f', 2),
(2, 'Mark', '202cb962ac59075b964b07152d234b70', 2),
(3, 'Tim', '202cb962ac59075b964b07152d234b70', 1),
(4, 'Pim', '202cb962ac59075b964b07152d234b70', 0),
(5, 'Dylano', '701f33b8d1366cde9cb3822256a62c01', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

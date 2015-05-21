-- phpMyAdmin SQL Dump
-- Current MySQL Version: 5.5.32 
--
-- Host: duedaanaorg.ipagemysql.com 
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `duedaana_database1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` longtext NOT NULL,
  `password` longtext NOT NULL,
  `phone` longtext NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `graduation` longtext NOT NULL,
  `stateorprovince` longtext NOT NULL,
  `resident` longtext NOT NULL,
  `city` longtext NOT NULL,
  `session_id` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `phone`, `name`, `email`, `graduation`, `stateorprovince`, `resident`, `city`, `session_id`) VALUES
(3, 'Raihan Siddique', '$2y$10$SUsj5jA79saMGENjO549u.5D/szDydO3hjmc3M6K57CQSKymG1USy', '6319405555', 'Raihan Siddique', 'rsiddique@aol.com', '1990', 'New York', 'USA', 'Deer Park', '9332598d7bac8b7ba8ee6c7b2997f8e3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

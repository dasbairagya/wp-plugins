-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2017 at 06:24 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `cat` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `story` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `cat`, `story`) VALUES
(1, 'Love.Fish', '580 Darling Street, Rozelle, NSW', -33.861034, 151.171936, 'restaurant', NULL),
(2, 'Young Henrys', '76 Wilford Street, Newtown, NSW', -33.898113, 151.174469, 'bar', NULL),
(3, 'Hunter Gatherer', 'Greenwood Plaza, 36 Blue St, North Sydney NSW', -33.840282, 151.207474, 'bar', NULL),
(4, 'The Potting Shed', '7A, 2 Huntley Street, Alexandria, NSW', -33.910751, 151.194168, 'bar', NULL),
(5, 'Nomad', '16 Foster Street, Surry Hills, NSW', -33.879917, 151.210449, 'bar', NULL),
(6, 'Three Blue Ducks', '43 Macpherson Street, Bronte, NSW', -33.906357, 151.263763, 'restaurant', NULL),
(7, 'Single Origin Roasters', '60-64 Reservoir Street, Surry Hills, NSW', -33.881123, 151.209656, 'restaurant', NULL),
(8, 'Red Lantern', '60 Riley Street, Darlinghurst, NSW', -33.874737, 151.215530, 'restaurant', NULL),
(9, 'Someplace Else', 'Someplace Else, Kolkata, Park Street Area', 22.554001, 88.351700, 'bar', NULL),
(23, 'fadfdsf', 'Unnamed Road, Ishwarpur, Madhya Pradesh 481995, India', 22.553146, 80.727539, 'red', 'dfadsfdfd'),
(22, 'fadfd', 'Sehore - Bhopal Rd, Hirapur, Madhya Pradesh 466001, India', 23.140360, 77.167969, 'blue', 'fadfdf'),
(21, 'mn,bb', 'MP SH 44, Silwani, Madhya Pradesh 464886, India', 23.301901, 78.442383, 'red', 'hjfhjfghj'),
(14, 'dfdsafsd', 'Unnamed Road, Madanpur, Chhattisgarh 497333, India', 23.079733, 82.661133, 'purple', 'dfdsfsdf'),
(15, 'dfadfsadf', 'Bilaspur-Raipur Rd, Rahangi, Chhattisgarh 495220, India', 22.004175, 82.089844, 'red', 'fadsfsdf'),
(16, 'Sweet ', 'GJ SH 217, Langhanaj, Gujarat 382730, India', 23.443089, 72.487793, 'green', 'Feeling good.'),
(17, 'dfadsfdsf', 'Unnamed Road, Pardi, Maharashtra 441105, India', 21.330315, 79.101562, 'purple', 'dfadsfdsfsdf'),
(18, 'Cool kiss', 'Unnamed Road, Puri, Odisha 752001, India', 19.766705, 85.781250, 'yellow', 'dfadfad'),
(19, 'Family', 'Unnamed Road, Puri, Odisha 752001, India', 19.766705, 85.781250, 'purple', 'This is family kiss'),
(20, 'dafdsfd', 'Unnamed Road, Panchor, Madhya Pradesh 466331, India', 22.776182, 77.277832, 'red', 'good'),
(24, 'dsffsd', 'Unnamed Road, Gadra, Madhya Pradesh 481885, India', 23.079733, 80.310059, 'green', 'dfadsfdsf'),
(25, 'dfasdf', 'Unnamed Road, Andiya, Madhya Pradesh 464770, India', 23.019075, 78.596191, 'green', 'dfdsfds'),
(26, 'ghfhfg', 'Unnamed Road, Andiya, Madhya Pradesh 464770, India', 23.019075, 78.596191, 'red', 'jhgj'),
(27, 'lkjkjl', 'Unnamed Road, Andiya, Madhya Pradesh 464770, India', 23.019075, 78.596191, 'red', 'khljkljkl'),
(28, 'dfdfd', 'Bundu - Silli Rd, Domandih, Jharkhand 835204, India', 23.241346, 85.671387, 'blue', 'fgsdfgfsdg'),
(29, 'dghg', 'Maharashtra State Highway 4, Satone, Maharashtra 425413, India', 21.575720, 74.047852, 'red', 'hjfghjhghj'),
(30, 'fgfsdgdsfg', 'Unnamed Road, Dholi, Rajasthan 322703, India', 26.155437, 76.091309, 'yellow', 'dfdfsdafsdf'),
(31, 'afdsfdsf', 'Brahmagiri-Delang Rd, Badabandhakera, Odisha 752011, India', 19.828726, 85.649414, 'yellow', 'dfdsfdsfdsf'),
(32, 'dfasdfsdf', 'Unnamed Road, Hardauli, Uttar Pradesh 209206, India', 26.017298, 80.112305, 'purple', 'dfdfdsfdsf'),
(33, 'dsfsadf', 'Unnamed Road, Pakistan', 30.031055, 69.169922, 'blue', 'dfsdfsdf'),
(34, 'hjfh', 'Unnamed Road, Nagarpur, Bangladesh', 24.066528, 89.846191, 'green', 'dfadssddhgjhjhkj hjfghjfgyj'),
(35, 'Kiss is kiss', 'JuÃ¡rez 202, ZONA CENTRO, 34800 Villa UniÃ³n, Dgo., Mexico', 23.973431, -104.045990, 'purple', 'It was a awesome day for me.'),
(36, 'good', 'Unnamed Road, Nanutarra WA 6751, Australia', -22.917923, 116.718750, 'green', 'This is my first kiss'),
(37, 'Nice kiss', 'Unnamed Road, Shelburne QLD 4874, Australia', -12.039321, 142.734375, 'purple', 'Nice to kiss  here');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Create database 'myhomecockpit' for the application 'myhomecockpit'
--
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `myhomecockpit`
--

DROP DATABASE IF EXISTS `myhomecockpit`;
CREATE DATABASE IF NOT EXISTS `myhomecockpit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `myhomecockpit`;

-- --------------------------------------------------------

--
-- Table structure for table `myhomecockpit`
--

DROP TABLE IF EXISTS `building_item`;
CREATE TABLE IF NOT EXISTS `building_item` (
  `id` int(11) NOT NULL,
  `user` char(100) COLLATE utf8_bin NOT NULL DEFAULT 'admin',
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `building_item`
--

INSERT INTO `building_item` (`id`, `user`, `name`, `created`, `updated`) VALUES
(1, 'admin', 'Bantigerweg', '2016-01-23', '2016-01-25'),
(2, 'admin', 'Fritz-Fleiner-Weg', '2015-01-23', '2015-12-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building_items`
--
ALTER TABLE `building_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building_item`
--
ALTER TABLE `building_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;

--
-- Add user and grant privileges
--

--DROP USER 'myhomecockpit'@'%';
GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'myhomecockpit'@'%' IDENTIFIED BY 'myhomecockpit';
GRANT ALL PRIVILEGES ON `myhomecockpit`.* TO 'myhomecockpit'@'%';



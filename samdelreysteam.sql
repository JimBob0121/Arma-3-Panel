-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for steam
CREATE DATABASE IF NOT EXISTS `steam` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `steam`;

-- Dumping structure for table steam.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `pid` varchar(56) NOT NULL,
  `name` varchar(56) NOT NULL,
  `userurl` varchar(56) NOT NULL,
  `avatarurl` varchar(256) NOT NULL,
  `bigavatarurl` varchar(256) NOT NULL,
  `staffname` varchar(56) NOT NULL DEFAULT '',
  `TotalCases` int(12) NOT NULL DEFAULT '0',
  `WeeklyCases` int(12) NOT NULL DEFAULT '0',
  `FormalWarnings` int(2) NOT NULL DEFAULT '0',
  `TagsWhitelist` int(11) NOT NULL DEFAULT '0',
  `Overwatched` int(11) NOT NULL DEFAULT '0',
  `WeeklyTech` int(12) NOT NULL DEFAULT '0',
  `ip` text NOT NULL,
  `pass` text NOT NULL,
  `blocked` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table steam.accounts: 0 rows
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Dumping structure for table steam.cases
CREATE TABLE IF NOT EXISTS `cases` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(56) NOT NULL,
  `punishment` varchar(56) NOT NULL,
  `suspect` varchar(56) NOT NULL,
  `notes` varchar(10000) NOT NULL,
  `overwatch` varchar(56) NOT NULL,
  `date` varchar(56) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table steam.cases: 0 rows
/*!40000 ALTER TABLE `cases` DISABLE KEYS */;
/*!40000 ALTER TABLE `cases` ENABLE KEYS */;

-- Dumping structure for table steam.civ_licenses
CREATE TABLE IF NOT EXISTS `civ_licenses` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(128) NOT NULL,
  `name` varchar(76) NOT NULL,
  `box_id` varchar(24) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table steam.civ_licenses: ~3 rows (approximately)
/*!40000 ALTER TABLE `civ_licenses` DISABLE KEYS */;
INSERT INTO `civ_licenses` (`uid`, `class`, `name`, `box_id`) VALUES
	(1, 'license_civ_dive', 'driver', 'driver'),
	(2, 'license_civ_boat', 'boat', 'boat'),
	(3, 'license_civ_trucking', 'trucking', 'trucking'),
	(4, 'license_civ_gun', 'gun', 'gun'),
	(5, 'license_civ_dive', 'dive', 'dive'),
	(6, 'license_civ_home', 'home', 'home');
/*!40000 ALTER TABLE `civ_licenses` ENABLE KEYS */;

-- Dumping structure for table steam.cop_licenses
CREATE TABLE IF NOT EXISTS `cop_licenses` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(128) NOT NULL,
  `name` varchar(76) NOT NULL,
  `box_id` varchar(24) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table steam.cop_licenses: ~0 rows (approximately)
/*!40000 ALTER TABLE `cop_licenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `cop_licenses` ENABLE KEYS */;

-- Dumping structure for table steam.cop_ranks
CREATE TABLE IF NOT EXISTS `cop_ranks` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `name` varchar(26) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table steam.cop_ranks: 7 rows
/*!40000 ALTER TABLE `cop_ranks` DISABLE KEYS */;
INSERT INTO `cop_ranks` (`uid`, `level`, `name`) VALUES
	(1, 1, 'Cadet'),
	(2, 2, 'Officer'),
	(3, 3, 'Senior Officer'),
	(4, 4, 'Corporal'),
	(5, 5, 'Sergeant'),
	(6, 6, 'Lieutenant/Captain'),
	(7, 7, 'Command');
/*!40000 ALTER TABLE `cop_ranks` ENABLE KEYS */;

-- Dumping structure for table steam.flagged
CREATE TABLE IF NOT EXISTS `flagged` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(56) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table steam.flagged: 0 rows
/*!40000 ALTER TABLE `flagged` DISABLE KEYS */;
/*!40000 ALTER TABLE `flagged` ENABLE KEYS */;

-- Dumping structure for table steam.fwarn
CREATE TABLE IF NOT EXISTS `fwarn` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `creator` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` varchar(56) NOT NULL,
  `Idiot` varchar(256) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table steam.fwarn: 0 rows
/*!40000 ALTER TABLE `fwarn` DISABLE KEYS */;
/*!40000 ALTER TABLE `fwarn` ENABLE KEYS */;

-- Dumping structure for table steam.medic_ranks
CREATE TABLE IF NOT EXISTS `medic_ranks` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `name` varchar(26) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table steam.medic_ranks: 9 rows
/*!40000 ALTER TABLE `medic_ranks` DISABLE KEYS */;
INSERT INTO `medic_ranks` (`uid`, `level`, `name`) VALUES
	(1, 1, 'EMT'),
	(2, 2, 'Advanced EMT'),
	(3, 3, 'Probationary Paramedic'),
	(4, 4, 'Paramedic'),
	(5, 5, 'Advanced Paramedic'),
	(6, 6, 'Field Commander'),
	(7, 7, 'Lieutenant'),
	(8, 8, 'Captain'),
	(9, 9, 'Medical Advisor');
/*!40000 ALTER TABLE `medic_ranks` ENABLE KEYS */;

-- Dumping structure for table steam.med_licenses
CREATE TABLE IF NOT EXISTS `med_licenses` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(128) NOT NULL,
  `name` varchar(76) NOT NULL,
  `box_id` varchar(24) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table steam.med_licenses: ~0 rows (approximately)
/*!40000 ALTER TABLE `med_licenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `med_licenses` ENABLE KEYS */;

-- Dumping structure for table steam.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(56) NOT NULL,
  `creator` varchar(56) NOT NULL,
  `date` varchar(20) NOT NULL,
  `reason` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table steam.notes: 0 rows
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;

-- Dumping structure for table steam.points
CREATE TABLE IF NOT EXISTS `points` (
  `uid` bigint(255) NOT NULL AUTO_INCREMENT,
  `pid` varchar(156) NOT NULL,
  `name` varchar(56) NOT NULL,
  `points` bigint(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table steam.points: 0 rows
/*!40000 ALTER TABLE `points` DISABLE KEYS */;
/*!40000 ALTER TABLE `points` ENABLE KEYS */;

-- Dumping structure for table steam.points_logs
CREATE TABLE IF NOT EXISTS `points_logs` (
  `uid` bigint(255) NOT NULL AUTO_INCREMENT,
  `pid` varchar(156) NOT NULL,
  `creator` varchar(56) NOT NULL,
  `amount` int(66) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `active` int(2) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table steam.points_logs: 0 rows
/*!40000 ALTER TABLE `points_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `points_logs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

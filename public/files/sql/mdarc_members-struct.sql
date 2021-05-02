-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: db744827846.db.1and1.com
-- Generation Time: Dec 29, 2020 at 10:05 PM
-- Server version: 5.5.60-0+deb7u1-log
-- PHP Version: 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db744827846`
--

-- --------------------------------------------------------

--
-- Table structure for table `mdarc_members`
--

DROP TABLE IF EXISTS `mdarc_members`;
CREATE TABLE IF NOT EXISTS `mdarc_members` (
  `cMemID` int(11) NOT NULL AUTO_INCREMENT,
  `cActive` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `cFlag` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `cYearCurrent` int(11) NOT NULL,
  `MemType` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Life_Hon` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `First` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `Last` varchar(17) COLLATE latin1_general_ci NOT NULL,
  `Jr_Sr` varchar(4) COLLATE latin1_general_ci DEFAULT NULL,
  `Nickname` varchar(11) COLLATE latin1_general_ci DEFAULT NULL,
  `Prefix` varchar(3) COLLATE latin1_general_ci DEFAULT NULL,
  `Suffix` varchar(3) COLLATE latin1_general_ci DEFAULT NULL,
  `License` varchar(13) COLLATE latin1_general_ci NOT NULL,
  `Address` varchar(28) COLLATE latin1_general_ci DEFAULT NULL,
  `City` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `State` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `Zip` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `cHardNews` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `cHardDir` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `cPymtDate` varchar(19) COLLATE latin1_general_ci DEFAULT NULL,
  `cMemSince` int(11) DEFAULT NULL,
  `cComment` varchar(248) COLLATE latin1_general_ci DEFAULT NULL,
  `cAutopatchSlot` int(11) DEFAULT NULL,
  `cAutopatchPhone` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `Home_Phone` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `Home_Unlisted` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `Work_Phone` varchar(17) COLLATE latin1_general_ci DEFAULT NULL,
  `Work_Unlisted` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `Fax_Phone` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `Fax_Unlisted` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `EMail` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `Email_Unlisted` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `Cell` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `Cell_Unlisted` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `Spouse_Name` varchar(21) COLLATE latin1_general_ci DEFAULT NULL,
  `Spouse_Call` varchar(9) COLLATE latin1_general_ci DEFAULT NULL,
  `Spouse_MemID` int(11) DEFAULT NULL,
  `cFam1name` varchar(23) COLLATE latin1_general_ci DEFAULT NULL,
  `cFam1call` varchar(6) COLLATE latin1_general_ci DEFAULT NULL,
  `cFam1email` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `cFam1MemID` int(11) DEFAULT NULL,
  `cFam2name` varchar(22) COLLATE latin1_general_ci DEFAULT NULL,
  `cFam2call` varchar(3) COLLATE latin1_general_ci DEFAULT NULL,
  `cFam2email` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `cFam2MemID` int(11) DEFAULT NULL,
  `cFam3name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `cFam3call` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `cFam3email` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `cFam3MemID` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `ARRL_Member` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `MembershipCard` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `OK_in_Membership_Directory` varchar(5) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`cMemID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

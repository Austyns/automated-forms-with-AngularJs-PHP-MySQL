-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 11:51 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auto_forms`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE IF NOT EXISTS `forms` (
`fm_id` int(11) NOT NULL,
  `fm_title` varchar(150) NOT NULL,
  `fm_discrip` varchar(100) NOT NULL,
  `fm_agency` int(11) NOT NULL,
  `registered_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE IF NOT EXISTS `form_fields` (
`fd_id` int(11) NOT NULL,
  `fd_agency` int(11) NOT NULL,
  `fd_title` varchar(100) NOT NULL,
  `fd_name` varchar(100) NOT NULL,
  `fd_discrip` varchar(100) NOT NULL,
  `fd_form` int(11) NOT NULL,
  `fd_type` int(11) NOT NULL,
  `registered_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_fields`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_field_type`
--

CREATE TABLE IF NOT EXISTS `form_field_type` (
`typ_id` int(11) NOT NULL,
  `typ_name` varchar(30) NOT NULL,
  `registerad_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_field_type`
--

INSERT INTO `form_field_type` (`typ_id`, `typ_name`, `registerad_at`) VALUES
(1, 'text', '2016-04-14 18:07:27'),
(2, 'email', '2016-04-14 18:08:27'),
(3, 'password', '2016-04-14 18:09:27'),
(4, 'select', '2016-04-14 18:10:27'),
(5, 'textarea', '2016-04-14 18:11:23'),
(6, 'number', '2016-04-19 09:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `select_options`
--

CREATE TABLE IF NOT EXISTS `select_options` (
`pt_id` int(11) NOT NULL,
  `pt_name` varchar(150) NOT NULL,
  `pt_value` varchar(150) NOT NULL,
  `reg_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submited_forms`
--

CREATE TABLE IF NOT EXISTS `submited_forms` (
`sf_id` int(11) NOT NULL,
  `sf_client` int(11) NOT NULL,
  `sf_agency` int(11) NOT NULL,
  `sf_form` int(11) NOT NULL,
  `sf_form_field` int(11) NOT NULL,
  `sf_value` varchar(150) NOT NULL,
  `sf_status` varchar(10) NOT NULL,
  `sf_registered_at` datetime NOT NULL,
  `sf_file` varchar(50) NOT NULL,
  `registered_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submited_forms`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
 ADD PRIMARY KEY (`fm_id`);

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
 ADD PRIMARY KEY (`fd_id`);

--
-- Indexes for table `form_field_type`
--
ALTER TABLE `form_field_type`
 ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `select_options`
--
ALTER TABLE `select_options`
 ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `submited_forms`
--
ALTER TABLE `submited_forms`
 ADD PRIMARY KEY (`sf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
MODIFY `fm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `form_field_type`
--
ALTER TABLE `form_field_type`
MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `select_options`
--
ALTER TABLE `select_options`
MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `submited_forms`
--
ALTER TABLE `submited_forms`
MODIFY `sf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

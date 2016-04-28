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

INSERT INTO `forms` (`fm_id`, `fm_title`, `fm_discrip`, `fm_agency`, `registered_at`) VALUES
(1, 'Registration Form', 'Form for reg', 0, '2016-04-14 09:26:03'),
(2, 'Contact Form', '', 0, '2016-04-18 19:51:02'),
(3, 'FIRS Form', 'For tax matters', 0, '2016-04-19 09:42:53'),
(4, 'Clients Registration Form', '', 2, '2016-04-20 10:20:35'),
(5, 'Checker Form', 'Just checking to see How this looks', 2, '2016-04-20 11:21:25'),
(6, 'NAFDAC verr.form', 'For Nafdac Off', 1, '2016-04-20 17:49:43'),
(7, 'Investment Form', 'For potential Investors', 2, '2016-04-20 17:54:45'),
(8, 'Attendance Form', 'For People Alttendance', 2, '2016-04-22 19:48:35'),
(9, 'New Form', 'Just Checking', 0, '2016-04-26 19:41:04'),
(10, 'Again', 'Again again', 0, '2016-04-26 19:42:47');

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

INSERT INTO `form_fields` (`fd_id`, `fd_agency`, `fd_title`, `fd_name`, `fd_discrip`, `fd_form`, `fd_type`, `registered_at`) VALUES
(1, 0, 'First  Name', 'first__name', '', 1, 1, '2016-04-14 21:13:07'),
(2, 0, 'Last Name', 'last_name', '', 1, 1, '2016-04-15 08:51:06'),
(3, 0, 'Email', 'email', '', 1, 2, '2016-04-15 08:57:28'),
(4, 0, 'Password', 'password', '', 1, 3, '2016-04-15 16:20:19'),
(5, 0, 'First Name ', 'first_name_', '', 2, 2, '2016-04-18 19:51:37'),
(6, 0, 'First Name', 'first_name', '', 3, 1, '2016-04-19 09:43:47'),
(7, 0, 'First Name', 'first_name', 'Enter First Name', 4, 1, '2016-04-20 10:21:24'),
(8, 0, 'Last Name', 'last_name', 'Enter Last Name', 4, 1, '2016-04-20 10:21:48'),
(9, 0, 'Email', 'email', 'Email Address', 4, 2, '2016-04-20 10:22:11'),
(10, 0, 'Password', 'password', 'pass', 2, 3, '2016-04-20 10:33:15'),
(11, 0, 'Organization', 'organization', 'Name of Organization', 4, 1, '2016-04-20 10:50:38'),
(12, 2, 'Number Of Indiginous Staff', 'number_of_indiginous_staff', 'Number of Nigerian Staff E.g 24', 4, 1, '2016-04-20 10:54:51'),
(13, 1, 'Company Name', 'company_name', 'Your Company', 6, 1, '2016-04-20 17:51:07'),
(14, 1, 'Contact Name', 'contact_name', 'Whatever', 6, 1, '2016-04-20 17:52:09'),
(15, 2, 'State', 'state', 'State of Origin', 5, 4, '2016-04-22 00:42:54'),
(16, 0, 'Sex', 'sex', '', 1, 4, '2016-04-22 01:16:46'),
(17, 2, 'First Name', 'first_name', 'Your First Name', 8, 1, '2016-04-22 19:50:39'),
(18, 2, 'Last Name', 'last_name', 'Last Name', 8, 1, '2016-04-22 19:50:59'),
(19, 2, 'Address', 'address', '', 8, 5, '2016-04-22 19:51:24'),
(20, 2, 'State', 'state', '', 8, 4, '2016-04-22 19:51:39'),
(21, 2, 'Name of organization', 'name_of_organization', 'Name of organization', 7, 1, '2016-04-26 13:31:53'),
(22, 2, 'Number of Shares', 'number_of_shares', 'E.g 10000', 7, 6, '2016-04-26 13:32:38'),
(23, 0, 'mmmm', 'mmmm', '', 9, 1, '2016-04-26 23:31:33'),
(24, 0, 'First Name', 'first_name', 'Enter First Name', 9, 1, '2016-04-27 12:09:52'),
(25, 0, 'Name', 'name', 'XXX', 10, 1, '2016-04-27 15:19:28'),
(26, 0, 'Email', 'email', 'EEE', 9, 2, '2016-04-27 15:21:59'),
(27, 0, 'ass', 'ass', 'pppp', 10, 3, '2016-04-27 15:24:30');

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

INSERT INTO `submited_forms` (`sf_id`, `sf_client`, `sf_agency`, `sf_form`, `sf_form_field`, `sf_value`, `sf_status`, `sf_registered_at`, `sf_file`, `registered_at`) VALUES
(1, 5, 2, 4, 7, 'Austy', '', '0000-00-00 00:00:00', '', '2016-04-26 12:39:52'),
(2, 5, 2, 4, 8, '', '', '0000-00-00 00:00:00', '', '2016-04-26 12:39:52'),
(3, 5, 2, 4, 9, 'austynxxx@gmail.com', '', '0000-00-00 00:00:00', '', '2016-04-26 12:39:52'),
(4, 5, 2, 4, 11, '', '', '0000-00-00 00:00:00', '', '2016-04-26 12:39:52'),
(5, 5, 2, 4, 12, '', '', '0000-00-00 00:00:00', '', '2016-04-26 12:39:52'),
(6, 5, 2, 7, 21, 'Emblematik Media Solution', '', '0000-00-00 00:00:00', '', '2016-04-26 13:33:36'),
(7, 5, 2, 7, 22, '123000', '', '0000-00-00 00:00:00', '', '2016-04-26 13:33:36'),
(8, 0, 0, 9, 23, 'Ass', '', '0000-00-00 00:00:00', '', '2016-04-27 18:48:09'),
(9, 0, 0, 9, 24, '', '', '0000-00-00 00:00:00', '', '2016-04-27 18:48:09'),
(10, 0, 0, 9, 26, '', '', '0000-00-00 00:00:00', '', '2016-04-27 18:48:09');

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

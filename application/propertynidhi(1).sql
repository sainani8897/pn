-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2018 at 10:38 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertynidhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `aid` int(11) NOT NULL,
  `type_name` varchar(250) NOT NULL,
  `type_description` text NOT NULL,
  `type_image` varchar(250) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_attempts`
--

CREATE TABLE `admin_login_attempts` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login_attempts`
--

INSERT INTO `admin_login_attempts` (`id`, `email`, `password`, `datetime`, `ip`) VALUES
(1, 'udaythammaneni@gmail.com', 'dfdsf', '2018-10-06 09:56:50', '::1'),
(2, 'narayana.g@igrandsolutions.in', 'Admin@123', '2018-10-06 09:57:10', '::1'),
(3, 'narayana.g@igrandsolutions.in', 'Admin@123', '2018-10-06 09:57:17', '::1'),
(4, 'narayana.g@igrandsolutions.in', 'Admin@123', '2018-10-06 09:57:52', '::1'),
(5, 'narayana.g@igrandsolutions.in', 'Admin@123', '2018-10-06 09:58:36', '::1'),
(6, 'udaythammaneni@gmail.com', 'dsfdsf', '2018-10-06 10:00:13', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `backend_users`
--

CREATE TABLE `backend_users` (
  `admin_id` int(11) NOT NULL COMMENT 'The backend users ID users',
  `admin_username` varchar(255) NOT NULL COMMENT 'username',
  `admin_password` varchar(255) NOT NULL COMMENT 'password',
  `user_type` text NOT NULL COMMENT 'the user type',
  `admin_name` char(255) NOT NULL COMMENT 'name of the backend user',
  `admin_email` varchar(255) NOT NULL COMMENT 'email of the backend user',
  `admin_mobile` varchar(255) NOT NULL COMMENT 'mobile of the backend user',
  `creator_id` int(11) NOT NULL COMMENT 'the id of the admin who created this user',
  `created_date` date NOT NULL COMMENT 'the date on which the user was created',
  `last_login` datetime NOT NULL,
  `lastlogin_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backend_users`
--

INSERT INTO `backend_users` (`admin_id`, `admin_username`, `admin_password`, `user_type`, `admin_name`, `admin_email`, `admin_mobile`, `creator_id`, `created_date`, `last_login`, `lastlogin_ip`) VALUES
(1, 'admin', '0e7517141fb53f21ee439b355b5a1d0a', '1', 'admin', 'narayana.g@igrandsolutions.in', '7032127651', 1, '2014-08-25', '2017-12-09 15:17:58', '::1'),
(2, 'anil', '794369b19ee4780d2f74e3d57dd6bb68', '1', 'anil', 'analyst@igransolutions.com', '9949145577', 0, '2017-11-30', '0000-00-00 00:00:00', ''),
(3, 'ram', '794369b19ee4780d2f74e3d57dd6bb68', '1', 'ram', 'ramrakesh@igrandsolutions.com', '9030955577', 0, '2017-11-30', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `city_name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_services`
--

CREATE TABLE `customer_services` (
  `csid` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `quation` varchar(250) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `did` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `filepath` varchar(250) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `fid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `glossary`
--

CREATE TABLE `glossary` (
  `g_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `meta_title` int(11) NOT NULL,
  `meta_description` int(11) NOT NULL,
  `meta_keywords` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `mid` int(11) NOT NULL,
  `material_name` varchar(250) NOT NULL,
  `price_range` varchar(250) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nriservices`
--

CREATE TABLE `nriservices` (
  `nid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scrolling`
--

CREATE TABLE `scrolling` (
  `sid` int(11) NOT NULL,
  `scroll_name` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `homepage` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `s_id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `another_logo` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `payment_method` varchar(250) NOT NULL,
  `prod_max_limit` int(11) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `gplus` varchar(250) NOT NULL,
  `copy_right` varchar(250) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keywords` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`s_id`, `company_name`, `logo`, `another_logo`, `address`, `phone`, `mobile`, `email`, `payment_method`, `prod_max_limit`, `facebook`, `twitter`, `gplus`, `copy_right`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 'INNOBEST HOME NEEDS PRIVATE LIMITED', 'uploads/logo/logo_1515048038.png', 'uploads/logo/logo_1515058725.png', 'Shop No 2/28, First Floor, Mahatma Gandhi Wholesale Commercial Complex, Gollapudi, Vijayawada-521225', '+91-80088198', '+91 8885093638', 'dir.ricetodoor@gmail.com', 'Cash_On_Delivery,Online_Payment', 6, 'https://www.facebook.com/', 'https://twitter.com/l', 'https://google.com/', 'Copyrightt © 2015 Rice To Door ', 'Rice To Door', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slid` int(11) NOT NULL,
  `slider_name` varchar(100) NOT NULL,
  `slider_link` varchar(250) NOT NULL,
  `homepage` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sid` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utility_links`
--

CREATE TABLE `utility_links` (
  `uid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `location` varchar(100) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `admin_login_attempts`
--
ALTER TABLE `admin_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backend_users`
--
ALTER TABLE `backend_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customer_services`
--
ALTER TABLE `customer_services`
  ADD PRIMARY KEY (`csid`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `glossary`
--
ALTER TABLE `glossary`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `nriservices`
--
ALTER TABLE `nriservices`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `scrolling`
--
ALTER TABLE `scrolling`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `utility_links`
--
ALTER TABLE `utility_links`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_login_attempts`
--
ALTER TABLE `admin_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `backend_users`
--
ALTER TABLE `backend_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The backend users ID users', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `glossary`
--
ALTER TABLE `glossary`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nriservices`
--
ALTER TABLE `nriservices`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scrolling`
--
ALTER TABLE `scrolling`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utility_links`
--
ALTER TABLE `utility_links`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

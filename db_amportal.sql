-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 08:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_amportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1483273907),
('admin', '4', 1484305045),
('user', '111', 1484391992),
('user', '12', 1490795341),
('user', '13', 1490836093),
('user', '411', 1484388536),
('user', '5', 1484387186),
('user', '6', 1484387712),
('user', '7', 1484387784),
('user', '8', 1484388385),
('user', '9', 1484388432);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Level 3', NULL, NULL, 1483273907, 1483273907),
('admin1', 1, 'Level 1', NULL, NULL, 1483263524, 1483263524),
('admin2', 1, 'Level 2', NULL, NULL, 1483263524, 1483263524),
('user', 1, 'User', NULL, NULL, 1483263524, 1483263524);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `state_id`, `status`, `created_at`, `created_by`) VALUES
(1, 'Port Phillip', 7, 1, '2017-01-20 11:26:49', NULL),
(2, 'Sydney', 2, 1, '2017-02-07 09:18:45', NULL),
(3, 'Vehari وہاڑی', NULL, 1, '2017-02-13 11:48:18', NULL),
(4, 'Waverley', 2, 1, '2017-03-30 03:13:36', 13);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `comment_from` int(11) DEFAULT NULL,
  `comment_to` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `zip` varchar(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` int(6) DEFAULT NULL,
  `company_head_name` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `about` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `zip`, `created_by`, `created_at`, `status`, `company_head_name`, `type`, `about`) VALUES
(1, 'civil engirneeing', '123456', '123', 1, '0000-00-00 00:00:00', 1, 'softec', 'softec', 'adssad');

-- --------------------------------------------------------

--
-- Table structure for table `company_group`
--

CREATE TABLE `company_group` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `status` tinyint(6) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_group`
--

INSERT INTO `company_group` (`id`, `group_id`, `company_id`, `status`, `created_by`, `created_at`, `user_id`) VALUES
(1, 2, 1, 1, 1, '0000-00-00 00:00:00', NULL),
(2, 3, 1, 1, 1, '0000-00-00 00:00:00', NULL),
(3, 4, 1, 1, 1, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `created_by`, `status`, `created_at`) VALUES
(1, 'group name', 1, 1, '0000-00-00 00:00:00'),
(2, 'group name22', 1, 1, '0000-00-00 00:00:00'),
(3, 'group name22', 1, 1, '0000-00-00 00:00:00'),
(4, 'group name2211', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `group_order`
--

CREATE TABLE `group_order` (
  `id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` tinyint(6) DEFAULT NULL,
  `unique_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1484029616),
('m170110_062047_init', 1484029621),
('m170113_051314_user_details', 1484285597),
('m170116_063435_gym', 1484739143),
('m170118_065731_user_address', 1484739149),
('m170122_051357_gym_others', 1485064001),
('m170208_071000_gym_extras', 1486618187),
('m170211_070746_gym_fees', 1486972932),
('m170211_114817_forum_categories', 1486972933),
('m170213_104033_forum_posts', 1487133349),
('m170214_045713_posts_slug', 1487133350),
('m170214_061849_new_facility', 1487133350),
('m170215_111524_post_votes', 1487222409),
('m170220_123315_facility_extra', 1488170853),
('m170224_084823_gym_reasons', 1491376386),
('m170303_061540_gym_claim', 1488522278),
('m170405_062757_gym_featured', 1491374893),
('m170405_093233_gym_featured', 1491385598);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `read` varchar(255) DEFAULT NULL,
  `view` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `notify_to` int(11) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `read`, `view`, `title`, `link`, `created_at`, `created_by`, `status`, `slug`, `notify_to`, `updated_at`) VALUES
(330, '0', '1', 'New Message From admin', 'https://gaming.premiumseomarketing.com/messages/recieved?from=K0E4RDJZN09LMDNIMktnRnBwKzc2dz09', '02-Jan-20 02:23', 1, 1, 'new-message-from-admin-5', 1, NULL),
(331, '0', '0', 'Profile Updated successfully!', 'http://localhost:7272/user-details/profile', '10-Feb-20 06:22', 1, 0, 'profile-updated-successfully', NULL, NULL),
(332, '0', '0', 'Profile Updated successfully!', 'http://localhost:7272/user-details/profile', '24-Aug-21 05:38', 1, 0, 'profile-updated-successfully-2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `status`, `created_at`, `created_by`) VALUES
(1, 'Australian Capital Territory', 1, '2017-01-19 10:59:32', 1),
(2, 'New South Wales', 1, '2017-01-19 11:06:24', 1),
(3, 'Northern Territory', 1, '2017-01-19 11:06:38', 1),
(4, 'Queensland', 1, '2017-01-19 11:06:52', 1),
(5, 'South Australia', 1, '2017-01-19 11:07:09', 1),
(6, 'Tasmania', 1, '2017-01-19 11:07:32', 1),
(7, 'Victoria', 1, '2017-01-19 11:07:41', 1),
(8, 'Western Australia', 1, '2017-01-19 11:08:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `unique_id` varchar(200) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `order_type` varchar(200) DEFAULT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `unique_id`, `created_by`, `created_at`, `status`, `order_type`, `start_date`, `end_date`) VALUES
(2, 'sample task', 'sa', NULL, 1, '0000-00-00 00:00:00', NULL, 'as', '08/07/2021', '08/27/2021');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `social_service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_service_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `social_service`, `social_service_id`, `access_token`) VALUES
(1, 'admin', '', '$2y$13$zmXpTh6Q/fo3pQKCDXUMfuuqlL76rPSBE7./RdPJY4O.SJIs71yhy', 'Xg4De42QRooVaZqCEMMexWdZhGyIHJVJ_1484301115', 'admin@liftezy.com.au', 1, 1484029621, 1484029621, NULL, NULL, NULL),
(4, 'kamran377', 'KSMBF3j9dofFvgawWPVf0MH-YiRYYbx3', '$2y$13$jbtM4eJ68eIXdn3ihkAIeet1QdSL3pfaxC5g59pg2fpPeeMBFwhwC', NULL, 'i060377@gmail.com', 1, 0, 0, NULL, NULL, NULL),
(11, 'kamran1', 'Es4YgRh4Hm761Yk7rl2VxqiSz4w0Rdbq', '$2y$13$jbtM4eJ68eIXdn3ihkAIeet1QdSL3pfaxC5g59pg2fpPeeMBFwhwC', NULL, NULL, 1, 1484391991, 1484391991, 'facebook', '10154174394681288', NULL),
(13, 'mansoor', 'hMfsOw6tHxFNWmyCOp7Xuol_U9uM924R', '$2y$13$3AxWzH579cEzcpIILh/Mdek0VrHq9FVZdDtlqKHRNXmXwMIQrcGpC', NULL, 'mansoor.ali469@yahoo.com', 1, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suburb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `name`, `mobile`, `profile_image`, `state_id`, `city_id`, `street`, `zip`, `lat`, `lng`, `suburb`) VALUES
(1, 1, 'Kamran ', '', '23340610.jpg', NULL, NULL, '', '', NULL, NULL, NULL),
(3, 4, 'saddam', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 11, 'Kamran Ali', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 13, 'Mansoor', '03464897589', '14194413_293788334324894_580527414_n (1).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_city_created_by` (`created_by`),
  ADD KEY `fk_city_state_id` (`state_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_group`
--
ALTER TABLE `company_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_order`
--
ALTER TABLE `group_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_state_created_by` (`created_by`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_group`
--
ALTER TABLE `company_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_order`
--
ALTER TABLE `group_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_city_state_id` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `fk_state_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2016 at 08:14 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prelaunch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `username`, `password`) VALUES
(1, 'default_admin@prelauncher.net', 'admin', '472c080f979dbb5845908cf5f179aad3');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `label`, `value`) VALUES
(1, 'site_name', 'Prelauncher'),
(2, 'site_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget ligula leo. Donec malesuada eleifend augue. Vivamus tempus commodo ornare.'),
(3, 'site_author', 'Prelauncher'),
(4, 'site_follow', '0'),
(5, 'start_date', 'January 1, 2016'),
(6, 'end_date', 'December 31, 2025'),
(7, 'twitter_handle', 'prelauncher'),
(8, 'twitter_hashtags', 'prelauncher'),
(9, 'rewards_count', '4'),
(10, 'reward_1', '5'),
(11, 'reward_2', '10'),
(12, 'reward_3', '25'),
(13, 'reward_4', '50'),
(14, 'reward_title_1', 'Gift Card'),
(15, 'reward_title_2', 'iPod'),
(16, 'reward_title_3', 'iPad'),
(17, 'reward_title_4', 'iPhone'),
(18, 'email_from', ''),
(19, 'email_protocol', 'smtp'),
(20, 'email_host', ''),
(21, 'email_user', ''),
(22, 'email_pass', ''),
(23, 'tracking_ga', ''),
(24, 'tracking_gtm', ''),
(25, 'twitter_message', 'So excited for the Prelauncher to launch.'),
(26, 'facebook_title', 'So excited for the Prelauncher to launch.'),
(27, 'facebook_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget ligula leo. Donec malesuada eleifend augue. Vivamus tempus commodo ornare.'),
(28, 'tracking_type', 'tracking_no'),
(29, 'email_port', '465'),
(30, 'reward_5', '100'),
(31, 'reward_title_5', 'MacBook Pro'),
(32, 'reward_active_1', 'true'),
(33, 'reward_active_2', 'true'),
(34, 'reward_active_3', 'true'),
(35, 'reward_active_4', 'true'),
(36, 'reward_active_5', 'false'),
(37, 'end_link', 'http://www.google.com'),
(38, 'facebook_image', '/uploads/social.jpg'),
(39, 'twitter_image', '/uploads/social.jpg'),
(40, 'site_logo', ''),
(41, 'site_background', 'assets/img/backgrounds/background-1.jpg'),
(42, 'reward_image_1', ''),
(43, 'reward_image_2', ''),
(44, 'reward_image_3', ''),
(45, 'reward_image_4', ''),
(46, 'reward_image_5', ''),
(47, 'site_favicon', ''),
(48, 'site_background_position', 'center center'),
(49, 'site_background_size', 'cover'),
(50, 'reward_hero_image', ''),
(51, 'reward_hero_class', 'image-fixed-bottom'),
(52, 'reward_hero_title', 'Don''t leave your friends behind'),
(53, 'reward_hero_cta', 'Invite friends & earn product'),
(54, 'reward_hero_subline', 'Share your unique link via email, Facebook or Twitter and earn Prelauncher good for each friend who signs up.'),
(55, 'home_message', 'A revolution for launching your business is coming ... get it now.'),
(56, 'home_message_early', 'Too early for the Prelauncher revolution.'),
(57, 'home_message_ended', 'However, get your hands on the  Prelauncher app, see our website for more information.'),
(58, 'reward_hero_title_ended', 'You''re all done earning rewards'),
(59, 'reward_hero_cta_ended', 'Early access has now ended'),
(60, 'reward_hero_subline_ended', 'We will email you soon with information on how you can retrieve your reward.'),
(61, 'home_title_ended', '<strong>You''re too late</strong> ... <br>for early access'),
(62, 'home_disclaimer', '* We promise no spam, cause we hate spam.'),
(63, 'reward_friends_title', 'Friends'),
(64, 'reward_friends_subline', 'Invite more to get more.'),
(65, 'site_color', '#2BD4A7'),
(67, 'site_background_color', 'rgb(0, 0, 0)'),
(68, 'site_background_custom', ''),
(69, 'email_logo', ''),
(70, 'site_text_color', 'rgb(255, 255, 255)'),
(71, 'reward_background', 'assets/img/backgrounds/background-1.jpg'),
(72, 'reward_background_color', 'rgb(0, 0, 0)'),
(73, 'reward_background_custom', '/uploads/custom.jpg'),
(74, 'reward_background_position', 'center center'),
(75, 'reward_background_size', 'cover');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(225) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` smallint(6) NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `referrer` (`referrer`),
  KEY `created_date` (`created_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

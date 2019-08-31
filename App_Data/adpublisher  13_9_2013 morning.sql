-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2013 at 07:01 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adpublisher`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `accountId` int(11) NOT NULL AUTO_INCREMENT,
  `debit` float DEFAULT '0',
  `credit` float DEFAULT '0',
  `transactionTime` int(11) DEFAULT NULL,
  `comment` int(10) DEFAULT NULL COMMENT '1 fo credited by Ads clicks for publisher , 2 for  debited because of Ad as advertiser , 3 for  admin role back because wrong click or other purpose , 4 for admin send cheque to user and debited account, 5  credited to add credit from admin for advertiser',
  `adStatusId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `memo` text,
  `admin_profile` float DEFAULT NULL,
  PRIMARY KEY (`accountId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountId`, `debit`, `credit`, `transactionTime`, `comment`, `adStatusId`, `userId`, `memo`, `admin_profile`) VALUES
(20, 0, 1000, 1378984232, 5, NULL, 16, 'added 1000', NULL),
(21, 0, 4, NULL, NULL, 53, 18, NULL, NULL),
(22, 0, 8, NULL, NULL, 57, 18, NULL, NULL),
(23, 0, NULL, 1379002935, 1, 73, 18, 'on ad click amount credit to publisher', 0),
(24, 0, NULL, 1379002935, 1, 73, 18, 'on ad click amount credit to publisher', 0),
(25, 0, 0, 1379002994, 1, 73, 18, 'on ad click amount credit to publisher', 0),
(26, 0, 0, 1379002994, 1, 73, 18, 'on ad click amount credit to publisher', 0),
(27, 0, 0, 1379003010, 1, 73, 18, 'on ad click amount credit to publisher', 0),
(28, 0, 0, 1379003010, 1, 73, 18, 'on ad click amount credit to publisher', 0),
(29, 0, 0, 1379003068, 1, 75, 18, 'on ad click amount credit to publisher', 0),
(30, 0, 0, 1379003068, 1, 75, 18, 'on ad click amount credit to publisher', 0),
(31, 0, 0, 1379003102, 1, 77, 18, 'on ad click amount credit to publisher', 0),
(32, 0, 0, 1379003102, 1, 77, 18, 'on ad click amount credit to publisher', 0),
(33, 0, 0, 1379003190, 1, 79, 18, 'on ad click amount credit to publisher', 0),
(34, 0, 0, 1379003190, 1, 79, 18, 'on ad click amount credit to publisher', 0),
(35, 0, 0, 1379003967, 1, 79, 18, 'on ad click amount credit to publisher', 0),
(36, NULL, 0, 1379003967, 2, 79, 16, 'on ad click amount debit from advertiser', NULL),
(37, 0, 0, 1379004123, 1, 78, 18, 'on ad click amount credit to publisher', 0),
(38, NULL, 0, 1379004123, 2, 78, 16, 'on ad click amount debit from advertiser', NULL),
(39, 0, 0, 1379004230, 1, 80, 18, 'on ad click amount credit to publisher', 0),
(40, NULL, 0, 1379004230, 2, 80, 16, 'on ad click amount debit from advertiser', NULL),
(41, 0, 0, 1379007365, 1, 82, 18, 'on ad click amount credit to publisher', 0),
(42, NULL, 0, 1379007365, 2, 82, 16, 'on ad click amount debit from advertiser', NULL),
(43, 0, 0, 1379007621, 1, 84, 18, 'on ad click amount credit to publisher', 0),
(44, NULL, 0, 1379007621, 2, 84, 16, 'on ad click amount debit from advertiser', NULL),
(45, 0, 0, 1379007729, 1, 86, 18, 'on ad click amount credit to publisher', 0),
(46, NULL, 0, 1379007729, 2, 86, 16, 'on ad click amount debit from advertiser', NULL),
(47, 0, 4.85, 1379008000, 1, 88, 18, 'on ad click amount credit to publisher', 0.15),
(48, 5, 0, 1379008000, 2, 88, 16, 'on ad click amount debit from advertiser', NULL),
(49, 0, 3.14965, 1379008201, 1, 91, 20, 'on ad click amount credit to publisher', 0.35035),
(50, 3.5, 0, 1379008201, 2, 91, 16, 'on ad click amount debit from advertiser', NULL),
(51, 0, 3.14965, 1379048061, 1, 91, 20, 'on ad click amount credit to publisher', 0.35035),
(52, 3.5, 0, 1379048061, 2, 91, 16, 'on ad click amount debit from advertiser', NULL),
(53, 0, 4.85, 1379048061, 1, 88, 18, 'on ad click amount credit to publisher', 0.15),
(54, 5, 0, 1379048061, 2, 88, 16, 'on ad click amount debit from advertiser', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_pass` varchar(100) DEFAULT NULL,
  `user_image` varchar(200) DEFAULT NULL,
  `user_role` varchar(100) DEFAULT NULL,
  `created` varchar(100) DEFAULT NULL,
  `last_login` varchar(100) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `is_active` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_image`, `user_role`, `created`, `last_login`, `ip_address`, `is_active`) VALUES
(1, 'admin', 'vaibhav.sspl@gmail.com', 'admin', 'assets/admin_property/profile/701a3d1ae008bcf65efd927414991369.jpg', 'Admin', NULL, '1379008075', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_task`
--

CREATE TABLE IF NOT EXISTS `admin_task` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pending_task` varchar(255) DEFAULT NULL,
  `prority` varchar(50) DEFAULT NULL,
  `classes` varchar(50) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_task`
--

INSERT INTO `admin_task` (`id`, `pending_task`, `prority`, `classes`, `created`) VALUES
(1, 'fsadfds', 'Important', 'badge badge-success', 1373697580);

-- --------------------------------------------------------

--
-- Table structure for table `ad_info`
--

CREATE TABLE IF NOT EXISTS `ad_info` (
  `adId` int(10) NOT NULL AUTO_INCREMENT,
  `adName` varchar(255) DEFAULT NULL,
  `adTitle` varchar(255) DEFAULT NULL,
  `siteUrl` varchar(255) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `categoryId` int(10) NOT NULL,
  `bannerImage` varchar(255) DEFAULT NULL,
  `small_bannerImage` varchar(200) DEFAULT NULL,
  `userId` int(10) DEFAULT NULL,
  `bid_ppc` float DEFAULT NULL,
  `cpc` float NOT NULL,
  `state` int(11) DEFAULT NULL,
  `cpm` int(11) NOT NULL,
  `userActivation` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 for suspend by user  or 1 for active by user ',
  `pageView` int(11) NOT NULL,
  `formId` int(10) NOT NULL,
  `click` int(11) NOT NULL,
  `ctr` int(11) NOT NULL,
  `replyMail` text,
  `requesTime` int(10) DEFAULT NULL,
  `bannerBackground` varchar(255) DEFAULT NULL,
  `banner_background_small` varchar(200) DEFAULT NULL,
  `isActive` int(10) DEFAULT NULL COMMENT '0 for suspend by admin, 1 for active by admin',
  `isApproved` tinyint(4) NOT NULL COMMENT '0 for pending , 1 for approval , 2 for decline',
  `approvalTime` int(10) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `stateName` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`adId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ad_info`
--

INSERT INTO `ad_info` (`adId`, `adName`, `adTitle`, `siteUrl`, `color`, `categoryId`, `bannerImage`, `small_bannerImage`, `userId`, `bid_ppc`, `cpc`, `state`, `cpm`, `userActivation`, `pageView`, `formId`, `click`, `ctr`, `replyMail`, `requesTime`, `bannerBackground`, `banner_background_small`, `isActive`, `isApproved`, `approvalTime`, `isDeleted`, `stateName`) VALUES
(13, 'vaibhav Ad 1', 'Vaibhav', 'http://sumedha.com', 'red', 40, 'assets/uploads/banners/03ad2b29713b5eb7f927492364fa148d.jpg', 'assets/uploads/banners/03ad2b29713b5eb7f927492364fa148d.jpg', 16, 3.5, 0, 12, 0, 1, 23, 3, 14, 27, '', 1378983280, 'assets/uploads/banners/bae6f610387e9caf42ef9e479992a3ae.jpg', 'assets/uploads/banners/small/bae6f610387e9caf42ef9e479992a3ae.jpg', 1, 1, 1378983387, 0, 'rajasthan'),
(14, 'Vaibhav Ad 2', 'Vaibhav', 'http://abc.com', 'black', 39, 'assets/uploads/banners/99d8d131ee71aa69884e29c916035079.JPG', 'assets/uploads/banners/99d8d131ee71aa69884e29c916035079.JPG', 16, 2, 0, 11, 0, 1, 0, 0, 0, 0, NULL, 1378983732, 'assets/uploads/banners/39f8aecf26f65414aa249e4c85f2a788.JPG', 'assets/uploads/banners/small/39f8aecf26f65414aa249e4c85f2a788.JPG', 1, 2, NULL, 1, 'rajasthan'),
(15, 'Vaibhav 3', 'vaibhav 3', 'http://demo.com', 'blue', 39, 'assets/uploads/banners/f2c8debe4d4b801a2673544dcf4547fd.jpg', 'assets/uploads/banners/f2c8debe4d4b801a2673544dcf4547fd.jpg', 16, 5, 0, 12, 0, 1, 23, 3, 8, 27, 'done', 1378983787, 'assets/uploads/banners/2f4d27ce30bfad80629d062b629bb449.jpg', 'assets/uploads/banners/small/2f4d27ce30bfad80629d062b629bb449.jpg', 1, 1, 1378983859, 0, 'rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `ad_status`
--

CREATE TABLE IF NOT EXISTS `ad_status` (
  `adStatusId` int(10) NOT NULL AUTO_INCREMENT,
  `clickTime` int(10) DEFAULT NULL,
  `formFillDate` int(10) DEFAULT NULL,
  `formFillId` int(11) DEFAULT NULL,
  `isAdminApproved` int(11) NOT NULL DEFAULT '0',
  `publisherId` int(11) NOT NULL,
  `subPublisherId` int(10) NOT NULL DEFAULT '0',
  `stateId` int(11) DEFAULT NULL,
  `isViewed` tinyint(4) NOT NULL DEFAULT '0',
  `isClicked` tinyint(4) NOT NULL DEFAULT '0',
  `isAdminRollBack` tinyint(4) NOT NULL DEFAULT '0',
  `adId` int(11) DEFAULT NULL,
  `advertiserId` int(11) DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  `mac_address` varchar(200) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  PRIMARY KEY (`adStatusId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `ad_status`
--

INSERT INTO `ad_status` (`adStatusId`, `clickTime`, `formFillDate`, `formFillId`, `isAdminApproved`, `publisherId`, `subPublisherId`, `stateId`, `isViewed`, `isClicked`, `isAdminRollBack`, `adId`, `advertiserId`, `ipaddress`, `mac_address`, `created`) VALUES
(50, 1378985364, 0, 0, 1, 11, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1378985364),
(51, 1378985364, 0, 0, 1, 11, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', '', 1378985364),
(52, 1378985448, 0, 0, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1378985448),
(53, 1378985448, 0, 0, 1, 18, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', '', 1378985448),
(54, 1378985835, 0, 0, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1378985835),
(55, 1378985836, 0, 0, 1, 18, 0, 12, 1, 1, 0, 13, 16, '122.161.153.188', '', 1378985836),
(56, 1378987443, 0, 0, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1378987443),
(57, 1378987443, 0, 0, 1, 18, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', '', 1378987443),
(58, 1378987448, 0, 0, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1378987448),
(59, 1378987448, 0, 0, 1, 18, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', '', 1378987448),
(60, 1378987553, 0, 0, 1, 19, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1378987553),
(61, 1378987553, 0, 0, 1, 19, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', '', 1378987553),
(62, 1379001625, 0, 0, 1, 19, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1379001625),
(63, 1379001625, 0, 0, 1, 19, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', '', 1379001625),
(64, 1379001888, 0, 0, 1, 19, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1379001888),
(65, 1379001888, 0, 0, 1, 19, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', '', 1379001888),
(66, 1379002114, 0, 0, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1379002114),
(67, 1379002115, 0, 0, 1, 18, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', '', 1379002115),
(68, 1379002418, 0, 0, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', '', 1379002418),
(69, 1379002418, 0, 0, 1, 18, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', '', 1379002418),
(70, 1379002718, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', NULL, 1379002718),
(71, 1379002718, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', NULL, 1379002718),
(72, 1379002783, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', NULL, 1379002783),
(73, 1379003010, 1379003010, NULL, 1, 18, 0, 12, 1, 1, 0, 13, 16, '122.161.153.188', NULL, 1379002783),
(74, 1379003062, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', NULL, 1379003062),
(75, 1379003068, 1379003068, NULL, 1, 18, 0, 12, 1, 1, 0, 13, 16, '122.161.153.188', NULL, 1379003062),
(76, 1379003097, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', NULL, 1379003097),
(77, 1379003102, 1379003102, NULL, 1, 18, 0, 12, 1, 1, 0, 13, 16, '122.161.153.188', NULL, 1379003097),
(78, 1379004122, 1379004122, NULL, 1, 18, 0, 12, 1, 1, 0, 15, 16, '122.161.153.188', NULL, 1379003184),
(79, 1379003967, 1379003967, NULL, 1, 18, 0, 12, 1, 1, 0, 13, 16, '122.161.153.188', NULL, 1379003184),
(80, 1379004230, 1379004230, NULL, 1, 18, 0, 12, 1, 1, 0, 15, 16, '122.161.153.188', NULL, 1379004205),
(81, 1379004206, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', NULL, 1379004206),
(82, 1379007365, 1379007365, NULL, 1, 18, 0, 12, 1, 1, 0, 15, 16, '59.95.171.150', NULL, 1379007342),
(83, 1379007342, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 13, 16, '59.95.171.150', NULL, 1379007342),
(84, 1379007621, 1379007621, NULL, 1, 18, 0, 12, 1, 1, 0, 15, 16, '59.95.171.150', NULL, 1379007611),
(85, 1379007611, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 13, 16, '59.95.171.150', NULL, 1379007611),
(86, 1379007729, 1379007729, NULL, 1, 18, 0, 12, 1, 1, 0, 15, 16, '59.95.171.150', NULL, 1379007719),
(87, 1379007719, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 13, 16, '59.95.171.150', NULL, 1379007719),
(88, 1379048061, 1379048061, NULL, 1, 18, 0, 12, 1, 1, 0, 15, 16, '59.95.171.150', NULL, 1379007990),
(89, 1379007990, NULL, NULL, 1, 18, 0, 12, 1, 0, 0, 13, 16, '59.95.171.150', NULL, 1379007990),
(90, 1379008186, NULL, NULL, 1, 20, 0, 12, 1, 0, 0, 15, 16, '59.95.171.150', NULL, 1379008186),
(91, 1379048061, 1379048061, NULL, 1, 20, 0, 12, 1, 1, 0, 13, 16, '59.95.171.150', NULL, 1379008186),
(92, 1379008315, NULL, NULL, 1, 19, 0, 12, 1, 0, 0, 15, 16, '59.95.171.150', NULL, 1379008315),
(93, 1379008315, NULL, NULL, 1, 19, 0, 12, 1, 0, 0, 13, 16, '59.95.171.150', NULL, 1379008315),
(94, 1379048066, NULL, NULL, 1, 20, 0, 12, 1, 0, 0, 15, 16, '122.161.153.188', NULL, 1379048066),
(95, 1379048066, NULL, NULL, 1, 20, 0, 12, 1, 0, 0, 13, 16, '122.161.153.188', NULL, 1379048066);

--
-- Triggers `ad_status`
--
DROP TRIGGER IF EXISTS `update_views`;
DELIMITER //
CREATE TRIGGER `update_views` AFTER INSERT ON `ad_status`
 FOR EACH ROW BEGIN
    DECLARE AD_ID integer default 0;
    
    set AD_ID := (select adId from ad_status where adStatusId=new.adStatusId);
	   if (AD_ID <> 0) then
		update ad_info set pageView=pageView+1 where adId=AD_ID;
	   end if; 	
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `update_clicks`;
DELIMITER //
CREATE TRIGGER `update_clicks` AFTER UPDATE ON `ad_status`
 FOR EACH ROW BEGIN
    DECLARE AD_ID integer default 0;
    DECLARE COUNT_CLICK_ROW integer default 0;
    DECLARE COUNT_VIEW_ROW integer default 0;
    DECLARE CTR_VAL FLOAT default 0;
    
    DECLARE BID_COST	FLOAT default 0;
    
    set AD_ID 		:= (select adId from ad_status where adStatusId=new.adStatusId);
    set BID_COST 	:= (select bid_ppc from ad_info where adId=AD_ID);
    set COUNT_CLICK_ROW := (select COUNT(adStatusId) from ad_status where adId	=	AD_ID AND isClicked=1 AND isAdminRollBack =	0);
    set COUNT_VIEW_ROW  := (select COUNT(adStatusId) from ad_status where adId	=	AD_ID AND isViewed=1 AND isAdminRollBack = 0);
	set CTR_VAL		 	:=	COUNT_CLICK_ROW/COUNT_VIEW_ROW * 100;
	
	  
		update ad_info set click=click+1,ctr=CTR_VAL where adId=AD_ID;
		
	 
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` varchar(255) DEFAULT NULL,
  `parentCategory` int(11) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  `lastUpdate` int(10) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `categoryDescription`, `parentCategory`, `created`, `lastUpdate`, `isActive`) VALUES
(38, 'Insurance', 'Insurance', 0, 1378982171, 1378982171, 1),
(39, 'Auto Mobile', 'Insurance', 0, 1378982186, 1378982277, 1),
(40, 'Car Loan', 'Car Loan', 38, 1378982370, 1378982370, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `countryId` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`countryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=271 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryId`, `value`, `name`, `isActive`) VALUES
(1, 'AF', 'Afganistan', 1),
(2, 'AL', 'Albania', 1),
(3, 'DZ', 'Algeria', 1),
(4, 'AS', 'American Samoa', 1),
(5, 'AD', 'Andorra', 1),
(6, 'AO', 'Angola', 1),
(7, 'AI', 'Anguilla', 1),
(8, 'AQ', 'Antarctica', 1),
(9, 'AG', 'Antigua and Barbuda', 1),
(10, 'AR', 'Argentina', 1),
(11, 'AM', 'Armenia', 1),
(12, 'AW', 'Aruba', 1),
(13, 'AC', 'Ascension Island', 1),
(14, 'AU', 'Australia', 1),
(15, 'AT', 'Austria', 1),
(16, 'AZ', 'Azerbaijan', 1),
(17, 'BS', 'Bahamas', 1),
(18, 'BH', 'Bahrain', 1),
(19, 'BD', 'Bangladesh', 1),
(20, 'BB', 'Barbados', 1),
(21, 'BY', 'Belarus', 1),
(22, 'BE', 'Belgium', 1),
(23, 'BZ', 'Belize', 1),
(24, 'BJ', 'Benin', 1),
(25, 'BM', 'Bermuda', 1),
(26, 'BT', 'Bhutan', 1),
(27, 'BO', 'Bolivia', 1),
(28, 'BA', 'Bosnia and Herzegovina', 1),
(29, 'BW', 'Botswana', 1),
(30, 'BV', 'Bouvet Island', 1),
(31, 'BR', 'Brazil', 1),
(32, 'BQ', 'British Antarctic Territory', 1),
(33, 'IO', 'British Indian Ocean Territory', 1),
(34, 'VG', 'British Virgin Islands', 1),
(35, 'BN', 'Brunei', 1),
(36, 'BG', 'Bulgaria', 1),
(37, 'BF', 'Burkina Faso', 1),
(38, 'BI', 'Burundi', 1),
(39, 'KH', 'Cambodia', 1),
(40, 'CM', 'Cameroon', 1),
(41, 'CA', 'Canada', 1),
(42, 'IC', 'Canary Islands', 1),
(43, 'CT', 'Canton and Enderbury Islands', 1),
(44, 'CV', 'Cape Verde', 1),
(45, 'KY', 'Cayman Islands', 1),
(46, 'CF', 'Central African Republic', 1),
(47, 'EA', 'Ceuta and Melilla', 1),
(48, 'TD', 'Chad', 1),
(49, 'CL', 'Chile', 1),
(50, 'CN', 'China', 1),
(51, 'CX', 'Christmas Island', 1),
(52, 'CP', 'Clipperton Island', 1),
(53, 'CC', 'Cocos [Keeling] Islands', 1),
(54, 'CO', 'Colombia', 1),
(55, 'KM', 'Comoros', 1),
(56, 'CD', 'Congo [DRC]', 1),
(57, 'CG', 'Congo [Republic]', 1),
(58, 'CK', 'Cook Islands', 1),
(59, 'CR', 'Costa Rica', 1),
(60, 'HR', 'Croatia', 1),
(61, 'CU', 'Cuba', 1),
(62, 'CY', 'Cyprus', 1),
(63, 'CZ', 'Czech Republic', 1),
(64, 'DK', 'Denmark', 1),
(65, 'DG', 'Diego Garcia', 1),
(66, 'DJ', 'Djibouti', 1),
(67, 'DM', 'Dominica', 1),
(68, 'DO', 'Dominican Republic', 1),
(69, 'NQ', 'Dronning Maud Land', 1),
(70, 'DD', 'East Germany', 1),
(71, 'TL', 'East Timor', 1),
(72, 'EC', 'Ecuador', 1),
(73, 'EG', 'Egypt', 1),
(74, 'SV', 'El Salvador', 1),
(75, 'GQ', 'Equatorial Guinea', 1),
(76, 'ER', 'Eritrea', 1),
(77, 'EE', 'Estonia', 1),
(78, 'ET', 'Ethiopia', 1),
(79, 'EU', 'European Union', 1),
(80, 'FK', 'Falkland Islands [Islas Malvinas]', 1),
(81, 'FO', 'Faroe Islands', 1),
(82, 'FJ', 'Fiji', 1),
(83, 'FI', 'Finland', 1),
(84, 'FR', 'France', 1),
(85, 'GF', 'French Guiana', 1),
(86, 'PF', 'French Polynesia', 1),
(87, 'TF', 'French Southern Territories', 1),
(88, 'FQ', 'French Southern and Antarctic Territories', 1),
(89, 'GA', 'Gabon', 1),
(90, 'GM', 'Gambia', 1),
(91, 'GE', 'Georgia', 1),
(92, 'DE', 'Germany', 1),
(93, 'GH', 'Ghana', 1),
(94, 'GI', 'Gibraltar', 1),
(95, 'GR', 'Greece', 1),
(96, 'GL', 'Greenland', 1),
(97, 'GD', 'Grenada', 1),
(98, 'GP', 'Guadeloupe', 1),
(99, 'GU', 'Guam', 1),
(100, 'GT', 'Guatemala', 1),
(101, 'GG', 'Guernsey', 1),
(102, 'GN', 'Guinea', 1),
(103, 'GW', 'Guinea-Bissau', 1),
(104, 'GY', 'Guyana', 1),
(105, 'HT', 'Haiti', 1),
(106, 'HM', 'Heard Island and McDonald Islands', 1),
(107, 'HN', 'Honduras', 1),
(108, 'HK', 'Hong Kong', 1),
(109, 'HU', 'Hungary', 1),
(110, 'IS', 'Iceland', 1),
(111, 'IN', 'India', 1),
(112, 'ID', 'Indonesia', 1),
(113, 'IR', 'Iran', 1),
(114, 'IQ', 'Iraq', 1),
(115, 'IE', 'Ireland', 1),
(116, 'IM', 'Isle of Man', 1),
(117, 'IL', 'Israel', 1),
(118, 'IT', 'Italy', 1),
(119, 'CI', 'Ivory Coast', 1),
(120, 'JM', 'Jamaica', 1),
(121, 'JP', 'Japan', 1),
(122, 'JE', 'Jersey', 1),
(123, 'JT', 'Johnston Island', 1),
(124, 'JO', 'Jordan', 1),
(125, 'KZ', 'Kazakhstan', 1),
(126, 'KE', 'Kenya', 1),
(127, 'KI', 'Kiribati', 1),
(128, 'KW', 'Kuwait', 1),
(129, 'KG', 'Kyrgyzstan', 1),
(130, 'LA', 'Laos', 1),
(131, 'LV', 'Latvia', 1),
(132, 'LB', 'Lebanon', 1),
(133, 'LS', 'Lesotho', 1),
(134, 'LR', 'Liberia', 1),
(135, 'LY', 'Libya', 1),
(136, 'LI', 'Liechtenstein', 1),
(137, 'LT', 'Lithuania', 1),
(138, 'LU', 'Luxembourg', 1),
(139, 'MO', 'Macau', 1),
(140, 'MK', 'Macedonia [FYROM]', 1),
(141, 'MG', 'Madagascar', 1),
(142, 'MW', 'Malawi', 1),
(143, 'MY', 'Malaysia', 1),
(144, 'MV', 'Maldives', 1),
(145, 'ML', 'Mali', 1),
(146, 'MT', 'Malta', 1),
(147, 'MH', 'Marshall Islands', 1),
(148, 'MQ', 'Martinique', 1),
(149, 'AN', 'Netherlands Antilles', 1),
(150, 'NT', 'Neutral Zone', 1),
(151, 'NC', 'New Caledonia', 1),
(152, 'NZ', 'New Zealand', 1),
(153, 'NI', 'Nicaragua', 1),
(154, 'NE', 'Niger', 1),
(155, 'NG', 'Nigeria', 1),
(156, 'NU', 'Niue', 1),
(157, 'NF', 'Norfolk Island', 1),
(158, 'KP', 'North Korea', 1),
(159, 'VD', 'North Vietnam', 1),
(160, 'MP', 'Northern Mariana Islands', 1),
(161, 'NO', 'Norway', 1),
(162, 'OM', 'Oman', 1),
(163, 'QO', 'Outlying Oceania', 1),
(164, 'PC', 'Pacific Islands Trust Territory', 1),
(165, 'PK', 'Pakistan', 1),
(166, 'PW', 'Palau', 1),
(167, 'PS', 'Palestinian Territories', 1),
(168, 'PA', 'Panama', 1),
(169, 'PZ', 'Panama Canal Zone', 1),
(170, 'PG', 'Papua New Guinea', 1),
(171, 'PY', 'Paraguay', 1),
(172, 'PE', 'Peru', 1),
(173, 'PH', 'Philippines', 1),
(174, 'PN', 'Pitcairn Islands', 1),
(175, 'PL', 'Poland', 1),
(176, 'PT', 'Portugal', 1),
(177, 'PR', 'Puerto Rico', 1),
(178, 'QA', 'Qatar', 1),
(179, 'RO', 'Romania', 1),
(180, 'RU', 'Russia', 1),
(181, 'RW', 'Rwanda', 1),
(182, 'RE', 'Réunion', 1),
(183, 'BL', 'Saint Barthélemy', 1),
(184, 'SH', 'Saint Helena', 1),
(185, 'KN', 'Saint Kitts and Nevis', 1),
(186, 'LC', 'Saint Lucia', 1),
(187, 'MF', 'Saint Martin', 1),
(188, 'PM', 'Saint Pierre and Miquelon', 1),
(189, 'VC', 'Saint Vincent and the Grenadines', 1),
(190, 'WS', 'Samoa', 1),
(191, 'SM', 'San Marino', 1),
(192, 'SA', 'Saudi Arabia', 1),
(193, 'SN', 'Senegal', 1),
(194, 'RS', 'Serbia', 1),
(195, 'CS', 'Serbia and Montenegro', 1),
(196, 'SC', 'Seychelles', 1),
(197, 'SL', 'Sierra Leone', 1),
(198, 'SG', 'Singapore', 1),
(199, 'SK', 'Slovakia', 1),
(200, 'SI', 'Slovenia', 1),
(201, 'SB', 'Solomon Islands', 1),
(202, 'SO', 'Somalia', 1),
(203, 'ZA', 'South Africa', 1),
(204, 'GS', 'South Georgia and the South Sandwich Islands', 1),
(205, 'KR', 'South Korea', 1),
(206, 'ES', 'Spain', 1),
(207, 'LK', 'Sri Lanka', 1),
(208, 'SD', 'Sudan', 1),
(209, 'SR', 'Suriname', 1),
(210, 'SJ', 'Svalbard and Jan Mayen', 1),
(211, 'SZ', 'Swaziland', 1),
(212, 'SE', 'Sweden', 1),
(213, 'CH', 'Switzerland', 1),
(214, 'MR', 'Mauritania', 1),
(215, 'MU', 'Mauritius', 1),
(216, 'YT', 'Mayotte', 1),
(217, 'FX', 'Metropolitan France', 1),
(218, 'MX', 'Mexico', 1),
(219, 'FM', 'Micronesia', 1),
(220, 'MI', 'Midway Islands', 1),
(221, 'MD', 'Moldova', 1),
(222, 'MC', 'Monaco', 1),
(223, 'MN', 'Mongolia', 1),
(224, 'ME', 'Montenegro', 1),
(225, 'MS', 'Montserrat', 1),
(226, 'MA', 'Morocco', 1),
(227, 'MZ', 'Mozambique', 1),
(228, 'MM', 'Myanmar [Burma]', 1),
(229, 'NA', 'Namibia', 1),
(230, 'NR', 'Nauru', 1),
(231, 'NP', 'Nepal', 1),
(232, 'NL', 'Netherlands', 1),
(233, 'SY', 'Syria', 1),
(234, 'ST', 'São Tomé and Príncipe', 1),
(235, 'TW', 'Taiwan', 1),
(236, 'TJ', 'Tajikistan', 1),
(237, 'TZ', 'Tanzania', 1),
(238, 'TH', 'Thailand', 1),
(239, 'TG', 'Togo', 1),
(240, 'TK', 'Tokelau', 1),
(241, 'TO', 'Tonga', 1),
(242, 'TT', 'Trinidad and Tobago', 1),
(243, 'TA', 'Tristan da Cunha', 1),
(244, 'TN', 'Tunisia', 1),
(245, 'TR', 'Turkey', 1),
(246, 'TM', 'Turkmenistan', 1),
(247, 'TC', 'Turks and Caicos Islands', 1),
(248, 'TV', 'Tuvalu', 1),
(249, 'UM', 'U.S. Minor Outlying Islands', 1),
(250, 'PU', 'U.S. Miscellaneous Pacific Islands', 1),
(251, 'VI', 'U.S. Virgin Islands', 1),
(252, 'UG', 'Uganda', 1),
(253, 'UA', 'Ukraine', 1),
(254, 'AE', 'United Arab Emirates', 1),
(255, 'GB', 'United Kingdom', 1),
(256, 'US', 'United States', 1),
(257, 'UY', 'Uruguay', 1),
(258, 'UZ', 'Uzbekistan', 1),
(259, 'VU', 'Vanuatu', 1),
(260, 'VA', 'Vatican City', 1),
(261, 'VE', 'Venezuela', 1),
(262, 'VN', 'Vietnam', 1),
(263, 'WK', 'Wake Island', 1),
(264, 'WF', 'Wallis and Futuna', 1),
(265, 'EH', 'Western Sahara', 1),
(266, 'YE', 'Yemen', 1),
(267, 'ZM', 'Zambia', 1),
(268, 'ZW', 'Zimbabwe', 1),
(269, 'AX', 'Åland Islands', 1),
(270, 'YD', 'People''s Democratic Republic of Yemen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customeform`
--

CREATE TABLE IF NOT EXISTS `customeform` (
  `formId` int(10) NOT NULL AUTO_INCREMENT,
  `formName` varchar(255) DEFAULT NULL,
  `formData` text,
  `created` int(10) NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  PRIMARY KEY (`formId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customeform`
--

INSERT INTO `customeform` (`formId`, `formName`, `formData`, `created`, `isActive`) VALUES
(3, 'Insurance Form', '\n  \n \n  \n  \n \n  \n  \n \n  \n  \n        <hr class="dark">\n\n        <ul>\n \n    \n        \n    <li class="" rel="singleLine">\n                 <div class="element_div">\n                     <label class="primary">Name</label><span class="helpMark" rel="tooltip" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;input read name="sinleLine[]" class="medium  required" read="" type="text"&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n             \n                 \n    \n                   \n                  \n                \n            \n    <li class="" rel="singleLine">\n                 <div class="element_div">\n                     <label class="primary">Country</label><span class="helpMark" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;input read name="sinleLine[]" class="medium " read="" type="text"&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n              \n                \n             \n     \n             \n    <li class="active" rel="singleLine">\n                 <div class="element_div">\n                     <label class="primary"> Text </label><span data-original-title="" class="helpMark"></span>\n                        <div class="medium c1">\n                         &lt;input read name="sinleLine[]" class="medium " type="text"&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n             </ul>\n        &lt;input value="Sumbit" class="btn btn-success" id="submitbutton" type="submit"&gt;\n        \n        \n        \n                \n       \n        \n        \n                \n       \n        \n        \n                \n       \n        \n        \n        ', 1378723330, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_submit`
--

CREATE TABLE IF NOT EXISTS `form_submit` (
  `emailId` int(11) NOT NULL AUTO_INCREMENT,
  `emailPublicKey` varchar(100) DEFAULT NULL,
  `singleText` varchar(200) DEFAULT NULL,
  `number` int(100) DEFAULT NULL,
  `paragraph` varchar(255) DEFAULT NULL,
  `checkbox` varchar(255) DEFAULT NULL,
  `multipleChoice` varchar(255) DEFAULT NULL,
  `dropDown` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_` int(255) DEFAULT NULL,
  `time_` int(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` text,
  `website` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `section` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`emailId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `setting_admin_commission`
--

CREATE TABLE IF NOT EXISTS `setting_admin_commission` (
  `commissionId` int(11) NOT NULL AUTO_INCREMENT,
  `commission` float NOT NULL COMMENT '(%) its common commissoin for every lead',
  PRIMARY KEY (`commissionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting_admin_commission`
--

INSERT INTO `setting_admin_commission` (`commissionId`, `commission`) VALUES
(1, 10.01);

-- --------------------------------------------------------

--
-- Table structure for table `setting_ad_limit`
--

CREATE TABLE IF NOT EXISTS `setting_ad_limit` (
  `settingId` int(10) NOT NULL AUTO_INCREMENT,
  `maxClickLimit` int(10) NOT NULL,
  `lastUpdate` int(10) NOT NULL,
  PRIMARY KEY (`settingId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting_ad_limit`
--

INSERT INTO `setting_ad_limit` (`settingId`, `maxClickLimit`, `lastUpdate`) VALUES
(1, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `stateId` int(10) NOT NULL AUTO_INCREMENT,
  `stateName` varchar(200) DEFAULT NULL,
  `stateValue` varchar(200) DEFAULT NULL,
  `countryId` int(10) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`stateId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateId`, `stateName`, `stateValue`, `countryId`, `isActive`) VALUES
(11, 'delhi', 'delhi', 111, 1),
(12, 'rajasthan', 'rajasthan', 111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `static_page`
--

CREATE TABLE IF NOT EXISTS `static_page` (
  `pageid` int(11) NOT NULL AUTO_INCREMENT,
  `pagename` varchar(100) NOT NULL,
  `pagedescription` text NOT NULL,
  `pagetitle` varchar(40) NOT NULL,
  `metaname` varchar(40) NOT NULL,
  `metadescription` varchar(100) NOT NULL,
  `created` varchar(15) NOT NULL,
  `lastupdated` int(15) NOT NULL,
  PRIMARY KEY (`pageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `static_page`
--

INSERT INTO `static_page` (`pageid`, `pagename`, `pagedescription`, `pagetitle`, `metaname`, `metadescription`, `created`, `lastupdated`) VALUES
(1, 'Our Reporting Platform', '<div class="twelvecol">\n<div class="descriptions">\n<p>We provide comprehensive online reporting for both traffic partners and PPL advertisers. Updates on our reporting interface are made each hour, 24/7. This reporting platform has been progressively enhanced since <strong>KeyVerticals</strong> was launched, and we go on to make more and more necessary improvements based partially on user feedback gathered from our traffic partners and PPL Advertisers.</p>\n\n<h4>KeyVerticals provides online reporting of the following items for PPL Advertisers</h4>\n\n<ul>\n	<li>Leads</li>\n	<li>Revenue</li>\n	<li>Clicks</li>\n	<li>Average cost per lead (CPL)</li>\n	<li>Conversions (optional)</li>\n	<li>Ad budget</li>\n</ul>\n\n<h4>For Traffic Partners, we Offer reporting of:</h4>\n\n<ul>\n	<li>Average CPL</li>\n	<li>Clicks</li>\n	<li>Leads</li>\n	<li>Revenue</li>\n	<li>Source</li>\n	<li>Domain-Level Reporting</li>\n</ul>\n</div>\n</div>\n', 'Our Reporting Platform', 'Our Reporting Platform', 'Our Reporting Platform', '1367220838', 1378380715),
(2, 'Data Reporting', '<div class="eightcol">\n<div class="descriptions">\n<p>Data in our online reporting facility may be exported into CSV for integrating into 3rd party reporting systems.&nbsp; For bigger advertisers and/or traffic partners, we can flex our programming to offer custom reporting feeds into your user back-end panel.</p>\n\n<p>The growing network of publisher websites working with us will only ensure a consistent stream of online insurance buyers who are bound to find your listing. Some of these websites (publishers) will forward customers direct to one of our in-house owned domains, while others may opt to showcase our directory on-site. KeyVerticals keenly monitors our publisher network to ensure that the highest quality of traffic is the case. As an advertiser, you may choose to not display your advert in our network of publisher any time at your convenience, but this will have the direct effect of lessening your volume of targeted customers.</p>\n</div>\n</div>\n\n<div class="fourcol last">\n<div class="descriptions">\n<div class="imgborder"><img src="{base_url}assets/user/design/images/1976d3.jpg" /></div>\n</div>\n</div>\n', 'Data Reporting', 'Data Reporting', 'Data Reporting', '1367220838', 1378379180),
(3, 'Our Company', '<h3 class="sub">Get to know AddSite a little better, our background, our history<br />\nand the people that make our company what it is.</h3>\n\n<div class="twelvecol">\n<div class="descriptions">\n<p>When you advertise with us, you practically get more and more customers. As a publisher, <strong>KeyVerticals</strong> delivers optimum value to your website. We take pride in the fact that we are effectively able to connect our advertisers with the consumers they need. And that is not all &ndash; we also have a great search service that publishers can use on their sites to help prospects find the right supplier to meet their needs. The result of all this &ndash; a happy customer, a better-paid publisher and a satisfied advertiser!</p>\n\n<p>Our organization operates by placing highly-targeted ad placements across a network (proprietary) that is composed of individually-owned websites and an actively monitored, selective partner network. Each ad is displayed as a sponsored text listing after the consumer has actually identified their interest to evaluate suppliers (providers). Our solution lies in the ability to effectively match each consumer with an active interest, and then connect them to advertisers that can service their immediate desire so that they may go ahead and request quotes and/or compare rates.</p>\n\n<p>The <strong>KeyVerticals</strong> team does all this by allowing advertisers on our platform to showcase their products at the juncture where the user is evaluating his/her provider alternatives. This way, only consumers who have already connected to your specific proposition and brand will pass on to your conversion funnel.</p>\n\n<p><strong>KeyVerticals</strong> currently leads the industry in Nigeria as the best performance marketing platform.</p>\n</div>\n</div>\n', 'Our Company', 'Our Company', 'Our Company', '1367479152', 1378380996),
(4, 'How KeyVerticals Works', '<div class="twelvecol">\n<div class="descriptions">\n<p>An ultra-targeted PPL (pay per lead) ad network, KeyVerticals delivers high-intent, specifically targeted leads from our proprietary traffic network.</p>\n\n<p>The leads are collected from our website properties such as insurancequotes.ng along with our proprietary traffic partner network.</p>\n\n<p>Our partner network is highly selective, and we have a requirement that our traffic partners must deliver a persistent level of lead quality that meets the highest expected standards. For partners that diligently meet our stringent criteria, we provide industry pioneering payouts that help grow the partner&rsquo;s revenue per visitor.</p>\n\n<p>Sponsored text listings are essentially displayed after a zip code submit field, or a state drop-down menu</p>\n\n<div class="center"><img alt="code" src="{base_url}assets/user/design/images/zip_code.png" /></div>\n</div>\n</div>\n', 'How KeyVerticals Works', 'How KeyVerticals Works', 'How KeyVerticals Works', '1367480846', 1378300186),
(5, 'Highly Focused Source', '<div class="eightcol">\n<div class="descriptions">\n<p>Our state and product specific directory makes sure that you are exposed to qualified insurance shoppers before they even see your advert. The visitors to our websites network need to &lsquo;act&rsquo; by choosing their preferred product type and state (by specifying state of residence) before they can view anything else in the directory. This way, we target your advertising to only those customers who need your products, and in the states where you have a business presence.</p>\n</div>\n</div>\n\n<div class="fourcol last">\n<div class="descriptions">\n<div class="imgborder"><img src="{base_url}assets/user/design/images/HIE.jpg" /></div>\n</div>\n</div>\n', 'Highly Focused Source', 'Highly Focused Source', 'Highly Focused Source', '1367922820', 1378380338),
(6, 'FAQ', '<p><u>FAQs For Advertisers:</u></p>\n\n<p>&uuml;&nbsp; What is KeyVerticals?</p>\n\n<p>&uuml;&nbsp; Why would I want to place my ad on this platform?</p>\n\n<p>&uuml;&nbsp; How does KeyVerticals work?</p>\n\n<p>&uuml;&nbsp; How am I Charged?</p>\n\n<p>&uuml;&nbsp; What is the price Plan? How much will it cost?</p>\n\n<p>&uuml;&nbsp; What is the possibility of fraudulent activities from your affiliates?</p>\n\n<p>&uuml;&nbsp; How much traffic can I expect?</p>\n\n<p>&uuml;&nbsp; Can I control my Expenditure?</p>\n\n<p>&uuml;&nbsp; Do I need a website to advertise on KeyVerticals?</p>\n\n<p>&uuml;&nbsp; Am I forced to advertise for a specific minimum length of time?</p>\n\n<p>&uuml;&nbsp; Do you have a support team for my questions?</p>\n\n<p><strong>What is KeyVerticals?</strong></p>\n\n<p>KeyVerticals is a vertical Pay Per Lead ad marketplace that boasts a highly targeted advertising mostly concentrated on the insurance industry, but also includes other upcoming verticals. Our advertisers easily select product categories of interest, and states in which they do business for particularly targeted consumers</p>\n\n<p><strong>Why would I want to place my ad on this platform?</strong></p>\n\n<p>Since it&rsquo;s going to be generating you high-intent, targeted leads. Throughout our diverse network of publisher websites and multiple, high-value in-house domains, your ad appears to a large portion of the consumer community that&rsquo;s in for insurance shopping.</p>\n\n<p><strong>How does KeyVerticals work?</strong></p>\n\n<p>To start with, you have to choose the type of insurance that you need to market (auto, health, life, business or home) and the states where you extend your services (operate in). Create an account through the accounts management portal at <a href="http://www.keyverticals.com/">http://www.KeyVerticals.com</a> and make bids against other advertisers showing listings for the same product in the same state. Where your ad shows on the display page is determined by your bid in comparison with others&rsquo; bids. The highest bidder gets their ad on the top of the page, the lowest bidder at the bottom of the page.</p>\n\n<p><strong>How am I Charged?</strong></p>\n\n<p>You prefund your advertising account (via cheques to KeyVerticals, direct deposits etc) and the bill for each lead is charged from your account balance. Your ad will pause if at all your balance gets exhausted, so you never get to pay more than you had planned for.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><strong>What is the price Plan? How much will it cost?</strong></p>\n\n<p>We have a &lsquo;pay-per-lead&rsquo; model. This means that you only get to pay when a prospect clicks on your ad and fills out your quotes form. The charge is placed on each full &lsquo;lead&rsquo; and not just on the &lsquo;click&rsquo;. The minimal bid amount depends on the type of product you want to promote, and may range from as low as N200 on health insurance to as much as N4000. Bid spots are in N50 increments and two or more bidders cannot have the same bid amount. We have a bid gap feature that calculates your lead charges at N50 more than the second bidder, irrespective of your specified bid amount.</p>\n\n<p><strong>What is the possibility of fraudulent activities from your affiliates?</strong></p>\n\n<p>We understand that this is major concern that must be addressed by any advertising portal that employs a network of publishing websites. Although we can&rsquo;t offer any fraud-free guarantee, we have put in place extreme measures to prevent any chances of this happening. Traffic emanating from publisher websites is keenly monitored and publishers suspected to engage in fraudulent activities are immediately ejected from our community. We are of the perception that the steps and technological measures implemented to prevent this will maintain the quality of traffic directed to our advertisers at the help of the PPL industry.</p>\n\n<p><strong>How much traffic can I expect?</strong></p>\n\n<p>The volume of traffic you get on your lead page is dependent on the type and number of listings showing on the ad pages. The higher your ads are placed on the display page, the higher your traffic levels. You may communicate with us directly for more info on current expectations of traffic based on your particular products and advertising plan</p>\n\n<p><strong>Can I control my Expenditure?</strong></p>\n\n<p>Yes. You may pause your ad(s) anytime at your convenience. You can also control your spending by preloading to your account balance only with what you intend to pay up for a specific duration of time. Once your money gets spent up, your ads will automatically pause.</p>\n\n<p><strong>Do I need a website to advertise on KeyVerticals?</strong></p>\n\n<p>No. We have highly customized lead forms and that will be all you need to get leads. These flexible lead forms will allow you to show your corporate info, add any other information or format your quote request lead form to your taste.</p>\n\n<p><strong>Am I forced to advertise for a specific minimum length of time?</strong></p>\n\n<p>No. You may advertise and stop on a come-go-basis. We do not impose contracts or minimum expenditures.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Do you have a support team for my questions?</strong></p>\n\n<p>Yes. We have a highly reliable, helpful support staff on standby. Once your ad listing is live, we assign you a personal account manager who&rsquo;s responsible for servicing your information and support needs. This account manager will be available by phone and email during regular working hours. Call ( 234) 7089996189 or ( 234) 8080369352 and ask for advertising support (8am - 5pm CAT M-F).</p>\n', 'FAQ', 'FAQ', 'FAQ', '1367922820', 1378879137),
(7, 'powerfullcms', '<p><img alt="" class="imgborder aligncenter" src="[baseurl]images/Powerful-CMS.png" /></p>\n\n<div class="separator shadow small">&nbsp;</div>\n\n<div class="one_half firstcols">\n<div class="center"><img class="imgborder" src="[baseurl]images/mobile.png" /></div>\n\n<h4>Beautiful apps without any programming</h4>\n\n<p>Our easy to use content manage system allows for beautiful app design, customization, and functionality across a broad range of mobile devices without any programming knowlege needed.</p>\n</div>\n\n<div class="one_half lastcols"><img class="imgborder aligncenter" src="[baseurl]images/mobile.png" />\n<h4>Instantly update your app online</h4>\n\n<p>Update your apps content or appearance whenever you&#39;d like using our powerful content management system. Modify everything inside your app without having to send your app for a lengthy update with Apple or Google.</p>\n</div>\n\n<div class="one_half firstcols"><img class="imgborder aligncenter" src="[baseurl]images/mobile.png" />\n<h4>Choose from hundreds of design templates</h4>\n\n<p>Bizness Apps was built from the ground up with small businesses in mind. From our ease of use to the features that we offer inside our apps - we are specifically designed for small businesses.</p>\n</div>\n\n<div class="one_half lastcols"><img class="imgborder aligncenter" src="[baseurl]images/mobile.png" />\n<h4>Preview your apps instantly online</h4>\n\n<p>Demoing apps with potential clients is a breeze. We allow you to preview your apps as you build them online or from your mobile device. Preview apps from your iPhone, iPad, Android, or online.</p>\n</div>\n', 'powerfullcms', 'powerfullcms', 'powerfullcms', '1367922820', 1373961657),
(8, 'securehosting', '<img src="[baseurl]images/securehosting.jpg" class="imgborder aligncenter" alt=""/>\n                    <div class="separator shadow small"></div>\n                        \n                        <div class="one_half firstcols">\n                       <img src="[baseurl]images/mobile.png" class="imgborder aligncenter">\n                        <h4>Scalable and reliable mobile app hosting</h4>\n                        <p>Our servers are hosted in the cloud using the latest in data hosting technology. Using Bizness Apps you can expect 99.9% uptime for your mobile apps.</p>\n                      </div>\n                      \n                      <div class="one_half lastcols">\n                        <img src="[baseurl]images/mobile.png" class="imgborder aligncenter">\n                        <h4>Secure data storage and backups</h4>\n                        <p>Our data centers use the latest in data encrpytion technology and data backups are performed daily, weekly, and monthly to ensure your data is never lost while using Bizness Apps.</p>\n                      </div>\n', 'securehosting', 'securehosting', 'securehosting', '1367922820', 1373961844),
(9, 'helpfultraining', '<p><img alt="" class="imgborder aligncenter" src="[baseurl]images/statispageimages/training.jpg" /></p>\n\n<div class="separator shadow small">&nbsp;</div>\n\n<div class="one_half firstcols"><img class="imgborder aligncenter" src="[baseurl]images/statispageimages/webinar_icon.jpg" />\n<h4>Weekly app building webinars</h4>\n\n<p>We host live webinars every week on how to build beautiful mobile apps for clients using the Bizness Apps platform.</p>\n\n<p>See our previously recorded webinars here<br />\n<a href="#">Webinars</a></p>\n</div>\n\n<div class="one_half lastcols"><img class="imgborder aligncenter" src="[baseurl]images/statispageimages/tutorials.jpg" />\n<h4>Hundreds of tutorial articles available</h4>\n\n<p>We&#39;ve documented every part of building an app with the Bizness Apps platform with detailed tutorials.</p>\n\n<p>See our helpful tutorial articles at our help desk here:<br />\n<a href="#">Tutorials</a></p>\n</div>\n\n<div class="one_half firstcols"><img class="imgborder aligncenter" src="[baseurl]images/statispageimages/videoTraining.png" />\n<h4>Tons of helpful video tutorials available</h4>\n\n<p>Prefer a video tutorial over a help article? Watch from our vast library of video tutorials on how to use Bizness Apps.</p>\n\n<p>See our helpful video tutorials here:<br />\n<a href="#">Video Tutorials</a></p>\n</div>\n', 'helpfultraining', 'helpfultraining', 'helpfultraining', '1367922820', 1373962164),
(10, 'publisher', '<h3>something about publish</h3>\n                <div class="eightcol">\n               	  <div class="descriptions">\n                <p>The <strong>KeyVerticals</strong> Publisher Program provides publishers with the best monetization platform for those who can provide top quality leads across a variety of verticals such as insurance (Auto Insurance, Health Insurance, Life Insurance, Home Insurance etc.). Ideally, the platform is an opportunity for these publishers to build on their revenues simply by integrating the PPL advertising lead form to their site.</p>\n                <h3>Overview of KeyVerticals</h3>\n                <p>KeyVerticals is an industry leading pay-per-lead ads  network covering various verticals, mainly insurance. Currently, KeyVerticals  boasts one of the best insurance CPL rates and affiliates.</p>\n                  <p>Our prime network of publishers is built on our own  websites and top online resource websites. On top of our in-house assets, we  collaborate with a number of leading insurance focused sites and affiliates.  Since we are deliberate and keenly selective about the structure and inner  workings of our publisher network, we comfortably distribute our PPL  advertising without losing the quality of our network in the process. </p>\n                <ol >\n                  <li>For  conversion to materialize, you need nothing more than a &lsquo;lead&rsquo;, or a filled  quote request form. No payment details are required to build your revenue and  we take pride in the fact that we realize the highest possible payouts via a  tiered payout timetable. The more high quality traffic you can send to us, the  higher your revenue share. </li>\n                  <li>High  rates of conversion given that payouts are on the &lsquo;lead&rsquo;. </li>\n                  <li>Prompt  payment of commissions via direct deposit and cheques. </li>\n                  <li>Real-time  publisher reporting (updated hourly) – by category, by domain name, and by  state with CPLs.</li>\n                </ol>\n               	  </div>\n				</div>\n                 <div class="fourcol last">\n                    <div class="descriptions">\n                    	<div class="imgborder"><img src="{base_url}assets/user/design/images/HIE.jpg"></div>\n                    \n                    </div>\n                </div>', 'Publisher', 'publisher', 'publisher', '1367922820', 1378488131),
(11, 'Advertiser', '<div class="twelvecol">\n<div class="descriptions">\n<p>Our bulging network of Publisher sites makes sure that you get a consistent stream of online shoppers who&rsquo;ll find your listing in the directory. A good number of the publisher sites will channel direct customers straight to one of our in-house owned domains, while most others may choose to display our directory on-site. We keenly screen the publishing network to guarantee the highest traffic standards. Advertisers are allowed to opt-out of the publishing sites network, but if so &ndash; their volume of targeted customers that see your ad is bound to shoot down.</p>\n\n<p>Our state and product specific directory filters shoppers so that only those who are really relevant get to see your ad. All visitors to our publishing sites network must select a preferred product type and specify a home state before they can make any other engagements on the platform. This way, you only get to advertise to the right &lsquo;crowd&rsquo;, from the right &lsquo;states&rsquo;.</p>\n\n<p><b>No Minimum Spend Requirements </b></p>\n\n<p>You get 100% control of your expenditures and ad duration in our directory. You may pause or start your listing any time at your convenience.</p>\n\n<p>&lt;&lt;click advertising="" all="" asked="" frequently="" here="" pay="" per="" ppl="" questions="" see="" to=""&gt;&gt;</click></p>\n\n<p><i>&ldquo;Imagine having a willing, highly targeted insurance shoppers looking for the particular type of insurance or product you are merchandising, in states where you are doing business. &ldquo;</i></p>\n\n<p><i>&ldquo;Imagine you get 100% control of your advertising expenditures, when you advertise and where you advertise &ndash; with no minimum budget or contract requirements&rdquo;</i></p>\n\n<p>You can, and this is how&hellip;</p>\n\n<p>On the web, insurance buyers visit dozens of websites in our extensive insurance targeted network and then give us a green light on what type of insurance they do need, and where it is that they live. With our sophisticated technology, we consequently get to show only those ad listings that apply to the consumer&rsquo;s context, based on what the advertiser specified.</p>\n\n<p>When a prospect chooses an ad, he/she is channeled to that advertiser&rsquo;s quote/lead form (hosted by us or you &ndash; the advertiser) where they may choose to request an online quote or contact you by phone.</p>\n\n\n</div>\n</div>\n', 'Advertiser', 'advertiser', 'advertiser', '1367922820', 1378488832);

-- --------------------------------------------------------

--
-- Table structure for table `sub_publisher`
--

CREATE TABLE IF NOT EXISTS `sub_publisher` (
  `sub_publisherId` int(11) NOT NULL AUTO_INCREMENT,
  `publisherId` int(11) DEFAULT NULL,
  `isDeleted` int(11) DEFAULT '0',
  `email` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`sub_publisherId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sub_publisher`
--

INSERT INTO `sub_publisher` (`sub_publisherId`, `publisherId`, `isDeleted`, `email`, `name`) VALUES
(6, 18, 0, 'raja@gmail.com', 'raja'),
(7, 18, 1, 'raja@gmail.com', 'raja'),
(8, 18, 1, 'raja@gmail.com', 'raja');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `userId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `categoryId` int(10) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `adverFromIcon` varchar(255) DEFAULT NULL COMMENT 'advertiser form icon',
  `email` varchar(100) DEFAULT NULL,
  `profilePic` varchar(200) NOT NULL,
  `userType` tinyint(4) DEFAULT NULL COMMENT '1 for advertiser , 2 for publisher ',
  `adminCommission` float DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL COMMENT '0 for deactive by admin ,  1 for activate user , 2 for suspend by admin',
  `requesTime` int(10) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT '0' COMMENT '1 for user deleted , 0 is default(not deleted)',
  `isReplied` tinyint(4) NOT NULL,
  `replyMail` text,
  `isAccepted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 for accept request and 2 for decline(decline request)',
  `acceptTime` int(10) DEFAULT NULL,
  `lastLogin` int(11) DEFAULT NULL,
  `lastLoginIp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`userId`, `name`, `userName`, `password`, `categoryId`, `company`, `website`, `phone`, `adverFromIcon`, `email`, `profilePic`, `userType`, `adminCommission`, `isActive`, `requesTime`, `isDeleted`, `isReplied`, `replyMail`, `isAccepted`, `acceptTime`, `lastLogin`, `lastLoginIp`) VALUES
(16, NULL, 'vaibhav', '123', 39, 'sspl', 'http://sumedhasoftech.com', '980808080', NULL, 'vaibhav.sspl@gmail.com', '', 1, NULL, 1, 1378982713, 0, 0, 'thanks', 1, 1378982775, 1378983060, '::1'),
(17, NULL, 'vaibhav1', NULL, 39, 'ccpl', 'http://sumedhasoftech.com', '989898989', NULL, 'vaibhav.sspl1@gmail.com', '', 1, NULL, 1, 1378982902, 0, 0, NULL, 2, NULL, NULL, NULL),
(18, NULL, 'rajkumar', '123', 39, 'sspl', 'http://sumedhasoftech.com', '709586079', NULL, 'rajkumar@sumedhasoftech.com', '', 0, 3, 1, 1378982976, 0, 0, '', 1, 1378982993, 1378995807, '::1'),
(19, NULL, 'raj', '123', 39, 'ccc', 'http://demo1.com', 'd9870980', NULL, 'raj@gmail.com', '', 0, NULL, 1, 1378987500, 0, 0, 'dsf', 1, 1378987513, NULL, NULL),
(20, NULL, 'rock', '123', 39, 'rock', 'http://sumedha.com', '989898', NULL, 'rock@gmail.com', '', 0, NULL, 1, 1379008064, 0, 0, '', 1, 1379008104, 1379008147, '::1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

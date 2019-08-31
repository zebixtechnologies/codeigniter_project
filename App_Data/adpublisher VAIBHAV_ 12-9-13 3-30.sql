-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2013 at 11:57 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountId`, `debit`, `credit`, `transactionTime`, `comment`, `adStatusId`, `userId`, `memo`, `admin_profile`) VALUES
(1, 2.5, NULL, NULL, 0, NULL, 1, NULL, NULL),
(2, NULL, 3, NULL, NULL, NULL, 1, NULL, NULL),
(3, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(4, NULL, 6, NULL, NULL, NULL, 1, NULL, NULL),
(6, NULL, 1, 1377866930, 5, NULL, 1, '1', NULL),
(7, NULL, 1, 1377866930, 5, NULL, 1, '1', NULL),
(8, NULL, 1, 1377868264, 5, NULL, 1, 'w', NULL),
(9, NULL, 9, 1377876045, 5, NULL, 1, 'added new credit', NULL),
(10, NULL, 4, 1377928220, 5, NULL, 1, 'test', NULL),
(11, 0, 100, 1377939168, 5, NULL, 2, 'db entry', NULL),
(12, 1, 0, 1377936435, 5, NULL, 2, 'vaibhav', NULL),
(13, 1, 0, 1377936477, 5, NULL, 2, '1', NULL),
(14, 0, 100, 1378484612, 5, NULL, 10, 'get cheque from client', NULL),
(15, 0, 10, 1378535502, 5, NULL, 1, '10', NULL),
(16, 0, 10, 1378535514, 5, NULL, 1, '10', NULL),
(17, 0, 10, 1378535531, 5, NULL, 1, '100', NULL),
(18, 5, 0, 1378535580, 5, 1, 1, '5', NULL),
(19, 0, 40, 1378540843, 5, 1, 2, 'cheque received', 1);

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
(1, 'admin', 'vaibhav.sspl@gmail.com', 'admin', 'assets/admin_property/profile/701a3d1ae008bcf65efd927414991369.jpg', 'Admin', NULL, '1378967955', '::1', 1),
(2, 'vaibhav', 'vaibhav.sspl@gmail.com', 'vaibhav', NULL, 'Admin', NULL, '1366957072', '::1', 1);

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
  `ppa` float NOT NULL COMMENT 'pay per click',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ad_info`
--

INSERT INTO `ad_info` (`adId`, `adName`, `adTitle`, `siteUrl`, `color`, `categoryId`, `bannerImage`, `small_bannerImage`, `userId`, `bid_ppc`, `cpc`, `state`, `cpm`, `userActivation`, `pageView`, `formId`, `click`, `ctr`, `ppa`, `replyMail`, `requesTime`, `bannerBackground`, `banner_background_small`, `isActive`, `isApproved`, `approvalTime`, `isDeleted`, `stateName`) VALUES
(1, 'speakrojak abc', 'speakrojak a good package', 'http://getbootstrap.com/2.3.2/components.html#labels-badges', '#FFC', 37, 'assets/uploads/banners/7472a89bc30106e36bd97b4cdac858d1.jpg', 'assets/uploads/banners/small/7472a89bc30106e36bd97b4cdac858d1.jpg', 1, 0.2, 0, 2, 12, 1, 10, 0, 20, 10, 0, NULL, 1377601788, 'assets/uploads/banners/709ab1b50bb1e5fec5c1630e4e5814d1.jpg', 'assets/uploads/banners/small/709ab1b50bb1e5fec5c1630e4e5814d1.jpg', 1, 1, NULL, 0, NULL),
(2, 'secondAd', 'this is an dummy entry', 'http://www.malijuthemeshop.com/live_previews/mooncake/creative/ui_components.html', 'YHUGHk', 36, 'assets/uploads/banners/0f7ffde16a66519f5ef0658e73f23c04.jpg', 'assets/uploads/banners/small/0f7ffde16a66519f5ef0658e73f23c04.jpg', 1, 0.9, 2.5, 2, 12, 1, 10, 0, 10, 10, 0, '', 1377601788, 'assets/uploads/banners/74452c2ebf536c8d9167d13061df101c.jpg', 'assets/uploads/banners/small/74452c2ebf536c8d9167d13061df101c.jpg', 0, 1, 1378469062, 0, NULL),
(3, 'demo', '21', '1213213', '21', 35, 'assets/uploads/banners/53a504300907bb103e36718e4aca45e8.jpg', 'assets/uploads/banners/small/53a504300907bb103e36718e4aca45e8.jpg', 1, 4, 0, 10, 4, 0, 0, 0, 0, 4, 0, NULL, NULL, 'assets/uploads/banners/b94126a7f350a59bafed5de7b3da2b73.JPG', 'assets/uploads/banners/small/b94126a7f350a59bafed5de7b3da2b73.JPG', NULL, 0, NULL, 0, NULL),
(4, 'dasdad', 'asd', 'asdsd', 'sdasd', 36, 'assets/uploads/banners/28b3fd20b0441f1ffe71becbbf85d1d1.jpg', 'assets/uploads/banners/28b3fd20b0441f1ffe71becbbf85d1d1.jpg', 1, 43, 0, 3, 43, 1, 0, 4, 10, 43, 0, 'fafdsfsd', 1378467044, 'assets/uploads/banners/ec4700235e88c6d64afa57dbfee73d01.JPG', 'assets/uploads/banners/small/ec4700235e88c6d64afa57dbfee73d01.JPG', 1, 1, 1378800048, 0, NULL),
(5, 'gd', 'gd', 'gfdgdf', 'gd', 0, 'assets/uploads/banners/4f8827265feb71fc3fc436c882c85a83.jpg', 'assets/uploads/banners/4f8827265feb71fc3fc436c882c85a83.jpg', 1, 2, 0, 0, 23, 1, 0, 0, 0, 2, 0, NULL, 1378473604, 'assets/uploads/banners/be21503dbcc237ef52598ccee56bbc9d.JPG', 'assets/uploads/banners/small/be21503dbcc237ef52598ccee56bbc9d.JPG', 1, 0, NULL, 0, NULL),
(6, 'retwert', 'wertet', 'erwtret', 'retretwer', 36, 'assets/uploads/banners/652724cd27bf14b30bb57209e127537a.jpg', 'assets/uploads/banners/652724cd27bf14b30bb57209e127537a.jpg', 1, 45, 0, 3, 54, 1, 0, 0, 0, 54, 0, NULL, 1378473684, 'assets/uploads/banners/82e24ffa821fbc6366837b4b0b1e705d.jpg', 'assets/uploads/banners/small/82e24ffa821fbc6366837b4b0b1e705d.jpg', 1, 0, NULL, 0, NULL),
(7, 'demo ad', 'demo', 'sumedhasoftech.com', 'red', 34, 'assets/uploads/banners/e26a54de579fba31b5597cceab820035.PNG', 'assets/uploads/banners/small/e26a54de579fba31b5597cceab820035.PNG', 10, 2.5, 0, 10, 32, 1, 0, 0, 0, 23, 0, 'approved', 1378484570, 'assets/uploads/banners/1fd56420017c215801a1e632f3c85e65.png', 'assets/uploads/banners/small/1fd56420017c215801a1e632f3c85e65.png', 1, 0, 1378484647, 0, NULL),
(8, 'myfirst', 'my first Ad', 'http://localhost:8080/advertiser/adpublisher/adv_loginuser/dashboard/addadv', '25644', 35, 'assets/uploads/banners/f702461ff8bb49c2e157a0abd07b81eb.jpg', 'assets/uploads/banners/f702461ff8bb49c2e157a0abd07b81eb.jpg', 8, 2.5, 0, 10, 0, 1, 0, 0, 10, 0, 0, '', 1378537006, 'assets/uploads/banners/d1974bede7e0dc62914f311a48839672.jpg', 'assets/uploads/banners/small/d1974bede7e0dc62914f311a48839672.jpg', 1, 1, 1378544382, 0, NULL),
(9, 'adsadasd', 'asd', 'asdasd', 'asdsa', 35, 'assets/uploads/banners/c8ffb6693ce17b0950298eb7b1f67f0a.jpg', 'assets/uploads/banners/c8ffb6693ce17b0950298eb7b1f67f0a.jpg', 1, 432, 0, 10, 0, 1, 0, 3, 10, 0, 0, '', 1378798030, 'assets/uploads/banners/cd399a88e76072dbd3486ab8200ff2fd.JPG', 'assets/uploads/banners/small/cd399a88e76072dbd3486ab8200ff2fd.JPG', 1, 1, 1378798065, 0, NULL),
(10, 'fsdfs', 'fsdf', 'sdfsdfds', 'dsfsad', 36, 'assets/uploads/banners/cbb3fa78f8e857a52f1e3f9c8bee9101.jpg', 'assets/uploads/banners/cbb3fa78f8e857a52f1e3f9c8bee9101.jpg', 1, 2, 0, 3, 0, 1, 0, 0, 0, 0, 0, NULL, 1378804777, 'assets/uploads/banners/7e506f5a47c871d6c197aa1db85f84f5.jpg', 'assets/uploads/banners/small/7e506f5a47c871d6c197aa1db85f84f5.jpg', 1, 0, NULL, 1, NULL),
(11, 'fsdfs', 'fsdf', 'sdfsdfds', 'dsfsad', 36, 'assets/uploads/banners/cbb3fa78f8e857a52f1e3f9c8bee9101.jpg', 'assets/uploads/banners/cbb3fa78f8e857a52f1e3f9c8bee9101.jpg', 1, 2, 0, 3, 0, 1, 0, 0, 0, 0, 0, NULL, 1378804783, 'assets/uploads/banners/7e506f5a47c871d6c197aa1db85f84f5.jpg', 'assets/uploads/banners/small/7e506f5a47c871d6c197aa1db85f84f5.jpg', 1, 0, NULL, 1, NULL),
(12, 'fsdfs', 'fsdf', 'sdfsdfds', 'dsfsad', 36, 'assets/uploads/banners/cbb3fa78f8e857a52f1e3f9c8bee9101.jpg', 'assets/uploads/banners/cbb3fa78f8e857a52f1e3f9c8bee9101.jpg', 1, 2, 0, 3, 0, 1, 0, 0, 0, 0, 0, NULL, 1378804786, 'assets/uploads/banners/7e506f5a47c871d6c197aa1db85f84f5.jpg', 'assets/uploads/banners/small/7e506f5a47c871d6c197aa1db85f84f5.jpg', 1, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_status`
--

CREATE TABLE IF NOT EXISTS `ad_status` (
  `adStatusId` int(10) NOT NULL AUTO_INCREMENT,
  `clickTime` int(10) NOT NULL,
  `formFillDate` int(10) NOT NULL,
  `formFillId` int(11) NOT NULL,
  `isAdminApproved` int(11) NOT NULL,
  `publisherId` int(11) NOT NULL,
  `subPublisherId` int(10) NOT NULL DEFAULT '0',
  `stateId` int(11) NOT NULL,
  `isViewed` tinyint(4) NOT NULL DEFAULT '0',
  `isClicked` tinyint(4) NOT NULL DEFAULT '0',
  `isAdminRollBack` tinyint(4) NOT NULL DEFAULT '0',
  `adId` int(11) NOT NULL,
  `advertiserId` int(11) NOT NULL,
  `ipaddress` varchar(100) NOT NULL,
  `mac_address` varchar(200) NOT NULL,
  `created` int(10) NOT NULL,
  `sub_publisherId` int(11) DEFAULT NULL,
  PRIMARY KEY (`adStatusId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `ad_status`
--

INSERT INTO `ad_status` (`adStatusId`, `clickTime`, `formFillDate`, `formFillId`, `isAdminApproved`, `publisherId`, `subPublisherId`, `stateId`, `isViewed`, `isClicked`, `isAdminRollBack`, `adId`, `advertiserId`, `ipaddress`, `mac_address`, `created`, `sub_publisherId`) VALUES
(1, 1377843993, 1377843993, 1, 1, 2, 0, 2, 1, 1, 0, 1, 1, '122.161.191.23', '0180.c200.0009', 0, NULL),
(6, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 9, 0, '::1', '', 1378973040, NULL),
(7, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 4, 0, '::1', '', 1378973040, NULL),
(8, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 8, 0, '::1', '', 1378973040, NULL),
(9, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '::1', '', 1378973040, NULL),
(10, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 9, 0, '::1', '', 1378973137, NULL),
(11, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 4, 0, '::1', '', 1378973137, NULL),
(12, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 8, 0, '::1', '', 1378973137, NULL),
(13, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '::1', '', 1378973137, NULL),
(14, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 9, 0, '::1', '', 1378973137, NULL),
(15, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 4, 0, '::1', '', 1378973137, NULL),
(16, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 8, 0, '::1', '', 1378973137, NULL),
(17, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '::1', '', 1378973137, NULL),
(18, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 9, 0, '::1', '', 1378973140, NULL),
(19, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 4, 0, '::1', '', 1378973140, NULL),
(20, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 8, 0, '::1', '', 1378973140, NULL),
(21, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '::1', '', 1378973140, NULL),
(22, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 9, 0, '::1', '', 1378973145, NULL),
(23, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 4, 0, '::1', '', 1378973145, NULL),
(24, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 8, 0, '::1', '', 1378973145, NULL),
(25, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '::1', '', 1378973145, NULL),
(26, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 9, 0, '::1', '', 1378977197, NULL),
(27, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 4, 0, '::1', '', 1378977197, NULL),
(28, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 8, 0, '::1', '', 1378977197, NULL),
(29, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '::1', '', 1378977197, NULL),
(30, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 9, 0, '::1', '', 1378977198, NULL),
(31, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 4, 0, '::1', '', 1378977198, NULL),
(32, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 8, 0, '::1', '', 1378977198, NULL),
(33, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '::1', '', 1378977198, NULL),
(34, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 9, 0, '::1', '', 1378977198, NULL),
(35, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 4, 0, '::1', '', 1378977198, NULL),
(36, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 8, 0, '::1', '', 1378977198, NULL),
(37, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '::1', '', 1378977198, NULL),
(38, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 9, 0, '::1', '', 1378977199, NULL),
(39, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 4, 0, '::1', '', 1378977199, NULL),
(40, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 8, 0, '::1', '', 1378977199, NULL),
(41, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '::1', '', 1378977199, NULL);

--
-- Triggers `ad_status`
--
DROP TRIGGER IF EXISTS `update_clicks`;
DELIMITER //
CREATE TRIGGER `update_clicks` AFTER UPDATE ON `ad_status`
 FOR EACH ROW BEGIN
    DECLARE AD_ID integer default 0;
    DECLARE COUNT_CLICK_ROW integer default 0;
    DECLARE COUNT_VIEW_ROW integer default 0;
    DECLARE CTR_VAL FLOAT default 0;
    DECLARE PPA_VAL FLOAT default 0;
    DECLARE BID_COST	FLOAT default 0;
    
    set AD_ID 		:= (select adId from ad_status where adStatusId=new.adStatusId);
    set BID_COST 	:= (select bid_ppc from ad_status where adStatusId=new.adStatusId);
    set COUNT_CLICK_ROW := (select COUNT(adStatusId) from ad_status where adId	=	AD_ID AND isClicked=1 AND isAdminRollBack =	0);
    set COUNT_VIEW_ROW  := (select COUNT(adStatusId) from ad_status where adId	=	AD_ID AND isViewed=1 AND isAdminRollBack = 0);
	set CTR_VAL		 	:=	COUNT_CLICK_ROW/COUNT_VIEW_ROW * 100;
	set PPA_VAL		 	:=	BID_COST*COUNT_CLICK_ROW;
	  
		update ad_info set click=click+1,ctr=CTR_VAL,ppa=PPA_VAL where adId=AD_ID;
		
	 
END
//
DELIMITER ;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `categoryDescription`, `parentCategory`, `created`, `lastUpdate`, `isActive`) VALUES
(32, 'Insurance', 'Insurance', 0, 1377504590, 1377875637, 1),
(34, 'Auto Mobile', 'Auto Mobile', 0, 1377504884, 1377875658, 1),
(35, 'Car Insurance', 'Car Insurance', 34, 1377505449, 1377875702, 1),
(36, 'Home Insurance', 'Home Insurance', 32, 1377505459, 1377875781, 1),
(37, 'Shop Insurance', 'Shop Insurance', 32, 1377511314, 1377875751, 1);

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
(3, 'a', '\n  \n \n  \n  \n \n  \n  \n        <hr class="dark">\n\n        <ul>\n \n    \n        \n    <li rel="singleLine">\n                 <div class="element_div">\n                     <label class="primary"> Text </label><span class="helpMark" rel="tooltip" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;input type="text" name="sinleLine[]" class="medium " read="" read&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n             \n                <li rel="number">\n                 <div class="element_div">\n                     <label class="primary"> Number</label><span class="helpMark" rel="tooltip" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;input type="number" id="Text1" name="NumberText[]" value="123" class="medium number"&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                    <div class="del_element"></div>\n                </li> \n    \n                 <li rel="checkbox">\n                 <div class="element_div">\n                     <fieldset data-role="controlgroup">\n                        <legend class="primary">Checkboxes</legend><span class="helpMark" rel="tooltip" data-original-title=""></span>\n                           <div class="checkboxes_div">\n                           <div>\n                         &lt;input type="checkbox" name="checkboxChoice[]" id="checkboxChoice1" read="" read&gt;\n                            <label for="checkboxChoice1">checkbox 1</label>\n                           </div>\n                           <div>\n                         &lt;input type="checkbox" name="checkboxChoice[]" id="checkboxChoice2" read="" read&gt;\n                            <label for="checkboxChoice2">checkbox 2</label>\n                            </div>\n                            <div>\n                         &lt;input type="checkbox" name="checkboxChoice[]" id="checkboxChoice3" read="" read&gt;\n                            <label for="checkboxChoice3">checkbox 3</label>\n                            </div>\n                         </div>\n                        </fieldset>\n                        </div>\n                    <div class="dublicate"></div> \n                    <div class="del_element"></div>\n                </li>  \n                  \n                <li rel="multipleChoice">\n                 <div class="element_div">\n                    <fieldset data-role="controlgroup">\n                        <legend class="primary">Radio Button</legend><span class="helpMark" rel="tooltip" data-original-title=""></span>\n                        <div class="radio_div">\n                         <div>\n                            &lt;input type="radio" name="multipleChoiceRadio[]" id="multipleChoiceRadio1" read="" read&gt;\n                            <label for="multipleChoiceRadio1">option 1</label>\n                            </div>\n                            <div>\n                         &lt;input type="radio" name="multipleChoiceRadio[]" id="multipleChoiceRadio2" read="" read&gt;\n                            <label for="multipleChoiceRadio2">option 2</label>\n                            </div>\n                            <div>\n                         &lt;input type="radio" name="multipleChoiceRadio[]" id="multipleChoiceRadio3" read="" read&gt;\n                            <label for="multipleChoiceRadio3">option 3</label>\n                            </div>\n      </div>\n                    </fieldset>\n                    </div>\n                    <div class="dublicate"></div> \n                    <div class="del_element"></div>\n                </li>\n            \n    <li rel="singleLine">\n                 <div class="element_div">\n                     <label class="primary"> Text </label><span class="helpMark" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;input type="text" name="sinleLine[]" class="medium " read="" read&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n              \n                <li rel="addressText" class="active">\n                 <div class="element_div">\n                     <label class="primary">Adress</label><span class="helpMark" data-original-title=""></span>\n      <div class="address">\n                            <span>\n                               <div>\n                                &lt;input type="text" name="addressName[]" class="" size="77" read="" read&gt;\n                                </div>\n                                <label class="label_bottom">Street Address</label>\n                                \n                            </span>\n                            <span>\n                               <div>\n                                &lt;input type="text" id="Text12" name="addressStreet[]" class="" size="77" read="" read&gt;\n                            </div>\n                                \n                                <label class="label_bottom">Address Line 2</label>\n                            </span>\n                        </div>\n                     </div>\n                    \n                    <div class="element_div twoinputs">\n                            <span class="two">\n                               <div>\n                                 &lt;input type="text" id="Text13" name="addresscity[]" class="" read="" read&gt;\n                                </div>\n                                <label class="label_bottom">City</label>\n                            </span>\n                            <span class="two">\n                            <div>\n                                &lt;input type="text" id="Text14" name="addressRegion[]" class="" read="" read&gt;\n                            </div>\n                                <label class="label_bottom">State/Province/Region</label>\n                            </span>\n                    </div>\n                    <div class="element_div twoinputs">\n                            <span class="two">\n                               <div>\n                                 &lt;input type="text" id="Text15" name="addressZip[]" class="number" read="" read&gt;\n                               </div>\n                                <label class="label_bottom">Zip/Postal Code</label>\n                            </span>\n                            <span class="two">\n                               <select id="Select3" name="addressCountry[]" class="select200">\n                                    <option value="India">India</option>\n                                    <option value="USA">USA</option>\n                                    <option value="UK">UK</option>\n                                </select>\n                                <label class="label_bottom">Country</label>\n                            </span>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li>\n             \n    <li rel="singleLine">\n                 <div class="element_div">\n                     <label class="primary"> Text </label><span class="helpMark" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;input type="text" name="sinleLine[]" class="medium " read&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n             </ul>\n        &lt;input type="submit" value="Sumbit" class="btn btn-success" id="submitbutton"&gt;\n        \n        \n        \n                \n       \n        \n        \n                \n       \n        \n        \n        ', 1378723330, 1),
(4, 'fdsafs', '\n  \n        <ul>\n \n    \n        \n    <li rel="singleLine">\n                 <div class="element_div">\n                     <label class="primary"> Text </label><span class="helpMark" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;input type="text" name="sinleLine[]" class="medium " read&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n              \n                <li rel="nameText">\n                 <div class="element_div twoinputs">\n                     <label class="primary">Name</label><span class="helpMark" data-original-title=""></span>\n                        <div>\n                            <span class="two">\n       <div>\n                                &lt;input type="text" name="nameFirst[]" class="" read&gt;\n                             </div>\n                                <label class="label_bottom">First</label>\n                            </span>\n                            <span class="two">\n       <div>\n                                &lt;input type="text" name="nameLast[]" class="" read&gt;\n                             </div>\n                                <label class="label_bottom">Last</label>\n                            </span>\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li>\n             \n                <li rel="nameText">\n                 <div class="element_div twoinputs">\n                     <label class="primary">Name</label><span class="helpMark" data-original-title=""></span>\n                        <div>\n                            <span class="two">\n       <div>\n                                &lt;input type="text" name="nameFirst[]" class="" read&gt;\n                             </div>\n                                <label class="label_bottom">First</label>\n                            </span>\n                            <span class="two">\n       <div>\n                                &lt;input type="text" name="nameLast[]" class="" read&gt;\n                             </div>\n                                <label class="label_bottom">Last</label>\n                            </span>\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li>\n            </ul>\n        &lt;input type="submit" value="Sumbit" class="btn btn-success" id="submitbutton"&gt;\n        \n        \n        \n        ', 1378799825, 1),
(5, 'weds', '\n  \n        <ul>\n \n    \n        \n    <li rel="singleLine">\n                 <div class="element_div">\n                     <label class="primary"> Text </label><span class="helpMark" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;input type="text" name="sinleLine[]" class="medium " read&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n             \n                <li rel="number">\n                 <div class="element_div">\n                     <label class="primary"> Number</label><span class="helpMark" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;input type="number" id="Text1" name="NumberText[]" value="123" class="medium number"&gt;\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                    <div class="del_element"></div>\n                </li> \n    \n                 <li rel="checkbox">\n                 <div class="element_div">\n                     <fieldset data-role="controlgroup">\n                        <legend class="primary">Checkboxes</legend><span class="helpMark" data-original-title=""></span>\n                           <div class="checkboxes_div">\n                           <div>\n                         &lt;input type="checkbox" name="checkboxChoice[]" id="checkboxChoice1" read&gt;\n                            <label for="checkboxChoice1">checkbox 1</label>\n                           </div>\n                           <div>\n                         &lt;input type="checkbox" name="checkboxChoice[]" id="checkboxChoice2" read&gt;\n                            <label for="checkboxChoice2">checkbox 2</label>\n                            </div>\n                            <div>\n                         &lt;input type="checkbox" name="checkboxChoice[]" id="checkboxChoice3" read&gt;\n                            <label for="checkboxChoice3">checkbox 3</label>\n                            </div>\n                         </div>\n                        </fieldset>\n                        </div>\n                    <div class="dublicate"></div> \n                    <div class="del_element"></div>\n                </li>  \n             \n                <li rel="pText">\n                 <div class="element_div">\n                     <label class="primary"> Paragraph</label><span class="helpMark" data-original-title=""></span>\n                        <div class="medium c1">\n                         &lt;textarea class="small" name="paraText[]"&gt;&lt;/textarea>\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                    <div class="del_element"></div>\n                </li>  \n              \n    \n                 <li rel="dateText">\n                 <div class="element_div threeinputs">\n                     <label class="primary">Date</label><span class="helpMark" data-original-title=""></span>\n                        <div>\n                            <span>\n                            <div>\n                                &lt;input type="text" id="Text4" name="dateMm[]" class="number" read&gt;\n                            </div>\n                                <label class="label_bottom">MM</label>\n                            </span>\n                             <b class="v_middle">/</b>\n                            <span>\n                            <div>\n                                &lt;input type="text" id="Text5" name="dateDd[]" class="number" read&gt;\n                            </div>\n                                <label class="label_bottom">DD</label>\n                            </span>\n                             <b class="v_middle">/</b>\n                            <span>\n                            <div>\n                                &lt;input type="text" id="Text6" name="dateYy[]" class="number" read&gt;\n                            </div>\n                                <label class="label_bottom">YYYY</label>\n                            </span>\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li>\n    \n                <li rel="sectionBreak">\n                 <div class="element_div">\n                     <div class="Break">\n                         <label class="primary">Section Break</label><span class="helpMark" data-original-title=""></span>\n                        </div>\n                   </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n   \n                 <li rel="emailText">\n                 <div class="element_div">\n                     <label class="primary">Email</label><span class="helpMark" data-original-title=""></span>\n      <div class="medium c1">\n                         &lt;input type="email" name="emailText[]" class="medium email" value="@"&gt;\n                       </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n            \n                <li rel="priceText">\n                 <div class="element_div">\n                     <label class="primary">Price</label><span class="helpMark" data-original-title=""></span>\n                        <div>\n                         <span>\n                            <div class="small c1 pricename">\n                             <b class="v_middle label_bottom price_ico">$</b>\n                             &lt;input type="text" id="Text17" name="priceText[]" class="small number" read&gt;\n                             <b class="v_middle label_bottom priceN">Dollars</b>\n                             </div>\n\n                            \n                            </span>\n                        </div>\n                    </div>\n                    <div class="dublicate"></div> \n                   <div class="del_element"></div>\n                </li> \n            </ul>\n        &lt;input type="submit" value="Sumbit" class="btn btn-success" id="submitbutton"&gt;\n        \n        \n        \n        ', 1378816182, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateId`, `stateName`, `stateValue`, `countryId`, `isActive`) VALUES
(2, 'fdsaf', 'sadfsdaf', 183, 1),
(3, 'delhi', 'd', 125, 1),
(10, 'das', 'dasdas', 120, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sub_publisher`
--

INSERT INTO `sub_publisher` (`sub_publisherId`, `publisherId`, `isDeleted`, `email`, `name`) VALUES
(1, 11, 0, 'rama@gmail.com', 'ram'),
(2, NULL, 0, NULL, 'ra'),
(3, 11, 0, 'dev1khokhar@gmail.coma', 'r'),
(5, 11, 1, 'sdfas', 'dsf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`userId`, `name`, `userName`, `password`, `categoryId`, `company`, `website`, `phone`, `adverFromIcon`, `email`, `profilePic`, `userType`, `adminCommission`, `isActive`, `requesTime`, `isDeleted`, `isReplied`, `replyMail`, `isAccepted`, `acceptTime`, `lastLogin`, `lastLoginIp`) VALUES
(1, NULL, 'vaibhav', '123456', 0, 'sumedhasoftech', 'http://www.sumedhasoftech.com/', '141-2545632', 'assets/uploads/advertiser/icon/2b5aa6dadcbd09e626f67536ca60600f.png', 'vaibhav.sspl@gmail.com', 'assets/uploads/user/profile/63e33fa12f76e1dc9563775d5f31c39e.jpg', 1, NULL, 1, 1377583917, 0, 1, '    hello customer     ', 1, 1377596593, 1378977217, '::1'),
(2, '', 'ankush', 'bdTGS54R6f', 0, 'sumedhasoftech', 'http://getbootstrap.com/2.3.2/components.html#labels-badges', '12345689536', NULL, 'cpgupta.sspl@gmail.com', 'assets/uploads/user/profile/9bc691c0bc272a3245f6519a381755c2.JPG', 2, 1.2, 1, 1377587517, 0, 1, '', 1, 1377933028, 1378377948, '::1'),
(3, NULL, 'vaibhav1', NULL, 34, 'vaibhav', 'https://www.google.co.in/', '123121', NULL, 'ankush@sumedhasoftech.com', '', 1, NULL, 1, 1378289218, 0, 0, NULL, 0, NULL, NULL, NULL),
(4, NULL, 'vaibhav321', NULL, 32, 'vaibhav', 'http://www.daniweb.com/web-development/php/threads/455599/codeigniter-clone-form-field-entering-in-database', '12132', NULL, 'vaibhav.sspl8@gmail.com', '', 1, NULL, 1, 1378289995, 0, 0, NULL, 0, NULL, NULL, NULL),
(5, NULL, 'fsadf', NULL, 34, 'fsadf', 'http://www.daniweb.com/web-development/php/threads/455599/codeigniter-clone-form-field-entering-in-database', '645645', NULL, 'ankusah@sumedhasoftech.com', '', 1, NULL, 1, 1378290043, 0, 0, NULL, 0, NULL, NULL, NULL),
(6, NULL, 'gdfsgd', NULL, 34, 'gdfsg', 'http://www.prints-sa.net/', '543', NULL, 'veblyghfdh.vaibhav@gmail.com', '', 1, NULL, 1, 1378306197, 0, 0, NULL, 0, NULL, NULL, NULL),
(7, NULL, 'ewqeqwe', NULL, 34, 'gdfsg', 'http://www.prints-sa.net/', '543', NULL, 'veblygheqwfdh.vaibhav@gmail.com', '', 1, NULL, 1, 1378306692, 0, 0, NULL, 0, NULL, NULL, NULL),
(8, 'ewqeq', 'dsadsad', '114khR4DFb', 34, 'adsas', 'https://pinkrecityinfo.com:2083/cpsess2879071255/frontend/x3/index.html', '434234', NULL, 'deva2khodkhar@gmail.com', '', 1, NULL, 1, 1378307987, 0, 0, '', 1, 1378308437, 1378536589, '::1'),
(9, NULL, '', NULL, 0, '', '', '', NULL, '', '', 0, NULL, 1, 1378475508, 0, 0, NULL, 0, NULL, NULL, NULL),
(10, NULL, 'rajkumar', '123', 34, 'company', 'http://sumedhaosftech.com', '90000000000', NULL, 'rajkumaryadav70@gmail.com', '', 1, NULL, 1, 1378484316, 0, 0, 'thanks', 1, 1378484410, 1378734155, '::1'),
(11, NULL, 'rahul', '123', 34, 'rahul company', 'http://rahul.com', '900000000', NULL, 'rahul@gmail.com', '', 2, NULL, 1, 1378530691, 0, 0, 'thanks', 1, 1378530739, 1378964191, '::1'),
(12, NULL, 'dfs', NULL, 34, 'gfd', 'https://www.google.co.in/', 'gsdf', NULL, 'bailgesclub@gmail.com', '', 1, NULL, 1, 1378534495, 0, 0, NULL, 0, NULL, NULL, NULL),
(13, NULL, 'r23', NULL, 32, 'fdsafsadf', 'http://pinkcityinfo.com/adpublisher/admin/manage_advertiser', '234234', NULL, 'cpguptfa.sspl@gmail.com', '', 1, NULL, 1, 1378536431, 0, 0, NULL, 0, NULL, NULL, NULL),
(14, NULL, 'as', NULL, 34, 'as', 'https://www.google.co.in/', '7878', NULL, 'as@as.com', '', 1, NULL, 1, 1378707231, 0, 0, NULL, 0, NULL, NULL, NULL),
(15, NULL, 'rocky', 't645gfD5G7', 34, 'ssppp;', 'https://demo.com', '3298784923', NULL, 'rocky12@gmail.com', '', 0, NULL, 1, 1378733884, 0, 0, 'thanks', 1, 1378733954, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

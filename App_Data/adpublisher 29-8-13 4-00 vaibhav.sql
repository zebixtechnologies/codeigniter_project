-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2013 at 12:37 PM
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
(1, 'admin', 'vaibhav.sspl@gmail.com', 'admin', 'assets/admin_property/profile/c0cd80e56f4e961215a34e018327d88c.jpg', 'Admin', NULL, '1377772582', '::1', 1),
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
  `pageView` int(11) NOT NULL,
  `click` int(11) NOT NULL,
  `ctr` int(11) NOT NULL,
  `bannerBackground` varchar(255) DEFAULT NULL,
  `banner_background_small` varchar(200) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `isActive` int(10) DEFAULT NULL COMMENT '0 for suspend , 1 for active ',
  `isApproved` tinyint(4) NOT NULL,
  `approvalTime` int(10) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`adId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ad_info`
--

INSERT INTO `ad_info` (`adId`, `adName`, `adTitle`, `siteUrl`, `color`, `categoryId`, `bannerImage`, `small_bannerImage`, `userId`, `bid_ppc`, `cpc`, `state`, `cpm`, `pageView`, `click`, `ctr`, `bannerBackground`, `banner_background_small`, `created`, `isActive`, `isApproved`, `approvalTime`, `isDeleted`) VALUES
(1, 'speakrojak', 'speakrojak a good package', 'http://getbootstrap.com/2.3.2/components.html#labels-badges', '#FFC', 37, 'assets/uploads/banners/57d50e65e29317d173d71c461d507734.jpg', 'assets/uploads/banners/small/57d50e65e29317d173d71c461d507734.jpg', 1, 0.2, 0, 2, 12, 10, 10, 10, 'assets/uploads/banners/4fceb834f6ff0d38a86fecf33e53044b.JPG', 'assets/uploads/banners/small/4fceb834f6ff0d38a86fecf33e53044b.JPG', 1377587517, 1, 1, NULL, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `categoryDescription`, `parentCategory`, `created`, `lastUpdate`, `isActive`) VALUES
(7, 'gfdg', 'sadasdsa', 0, 1377354197, 1377698420, 1),
(20, 'fdsf', 'fsd', 0, 1377503178, 1377503178, 0),
(21, 'fsdf', 'fsdf', 0, 1377503181, 1377503181, 0),
(28, 'fdsafsdf', ' dfsafs          ', 30, 1377504547, 1377516405, 1),
(29, 'fdsfsdf', '   fsdf   ', 28, 1377504558, 1377504558, 1),
(31, 'dsafdsfsa', 'dfsadfasfdasdf  ', 30, 1377504579, 1377504579, 1),
(32, 'fdsafsdfsadf', '   safdsadfsadf   ', 30, 1377504590, 1377504590, 1),
(34, 'tretertefdsf', '   fsdfsdf   ', 0, 1377504884, 1377504884, 1),
(35, 'fewr', '   ewrwer   ', 34, 1377505449, 1377505449, 1),
(36, 'rewr', '  werwe    ', 35, 1377505459, 1377505459, 1),
(37, 'new', '  dfsafs    ', 32, 1377511314, 1377511314, 1),
(38, 'fdsaf', 'fdsfasd  ', 28, 1377516440, 1377516440, 1),
(39, 'dsadsa', ' sadasdsa     ', 32, 1377690627, 1377690627, 1);

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
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `stateId` int(10) NOT NULL AUTO_INCREMENT,
  `stateName` varchar(200) DEFAULT NULL,
  `stateValue` varchar(200) DEFAULT NULL,
  `countryId` int(10) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`stateId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateId`, `stateName`, `stateValue`, `countryId`, `isActive`) VALUES
(2, '123fsd', '13', 5, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `static_page`
--

INSERT INTO `static_page` (`pageid`, `pagename`, `pagedescription`, `pagetitle`, `metaname`, `metadescription`, `created`, `lastupdated`) VALUES
(1, 'Terms & Conditions', '<p>Thanks for using our products and services (&quot;&quot;fdsafsagsaglkjs gjalkjglkjfglkjdkf</p>\n', 'Terms title', 'Terms meta', 'Terms meta dec', '1367220838', 1377343564),
(2, 'Privacysdf', '<p>Privacy desc1adssdf&quot;&quot;</p>\n', 'Privacy', 'Privacy metasdf', 'Privacy meta desc', '1367220838', 1368006337),
(3, 'About Us', '<p>About Usdasfdasfadsf&quot;&quot;</p>\n', 'About Us', 'About Us', 'About Us', '1367479152', 1368006398),
(4, 'Contact us', '<p>Contact us</p>\n', 'Contact us', 'Contact us', 'Contact us', '1367480846', 1377343643),
(5, 'How It Works', '<p><iframe allowfullscreen="" class="imgborder" frameborder="0" height="315" src="http://www.youtube.com/embed/6qfnfMMcAVs" width="100%"></iframe><br />\n<span class="pullquote-left">This is pullquote left. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.</span> <span class="pullquote-right">This is pullquote left. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.</span> <span class="pullquote-left">This is pullquote left. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.</span></p>\n\n<div class="separator shadow small">&nbsp;</div>\n\n<div class="one_half firstcols"><img class="imgborder aligncenter" src="[baseurl]/images/statispageimages/mobile.png" />\n<h4>Apps available on iPhone, iPad, Android, &amp; the mobile web</h4>\n\n<p>Bizness Apps allows you to simultaneously create, edit, and manage native iPhone, iPad, Android, and mobile web apps online.</p>\n</div>\n\n<div class="one_half lastcols"><img class="imgborder aligncenter" src="[baseurl]/images/statispageimages/mobile.png" />\n<h4>Beautiful apps without any programming</h4>\n\n<p>Our easy to use content manage system allows for beautiful app design, customization, and functionality across a broad range of mobile devices.</p>\n</div>\n\n<div class="one_half firstcols"><img class="imgborder aligncenter" src="[baseurl]/images/statispageimages/mobile.png" />\n<h4>Mobile apps designed for small businesses</h4>\n\n<p>Bizness Apps was built from the ground up with small businesses in mind. From our ease of use to the features that we offer inside our apps - we are specifically designed for small businesses.</p>\n</div>\n\n<div class="one_half lastcols"><img class="imgborder aligncenter" src="[baseurl]/images/statispageimages/mobile.png" />\n<h4>Risk free - 30 day money back guarantee</h4>\n\n<p>If you are unsatisfied with your mobile app within the first month of service, Bizness Apps guarantees to refund your payment. Bizness Apps is backed by a 100% satisfaction guarantee.</p>\n</div>\n', 'How It Works', 'How It Works', 'How It Works', '1367922820', 1373962308),
(6, 'beautifulapps', '<p><img alt="" class="imgborder aligncenter" src="[baseurl]/images/statispageimages/apps.png" /></p>\n\n<div class="separator shadow small">&nbsp;</div>\n\n<div class="one_half firstcols"><img class="imgborder aligncenter" src="[baseurl]/images/statispageimages/app_icon_114px.png" />\n<h4>Example ImageEditor: iTouch Pic</h4>\n\n<p>Edit your pictures with excellent features and effects</p>\n\n<p class="center"><a href="#"><img class="positionleft" height="42px" src="[baseurl]/images/statispageimages/appstore-1.png" /></a>&nbsp; <a href="#"><img class="positionright" height="42px" src="[baseurl]/images/statispageimages/appstore-2.png" /></a></p>\n</div>\n\n<div class="one_half lastcols"><img class="imgborder aligncenter" src="[baseurl]/images/statispageimages/app_icon_114px.png" />\n<h4>Example ImageEditor: iTouch Pic</h4>\n\n<p>Edit your pictures with excellent features and effects</p>\n\n<p class="center"><a href="#"><img class="positionleft" height="42px" src="[baseurl]/images/statispageimages/appstore-1.png" /></a>&nbsp; <a href="#"><img class="positionright" height="42px" src="[baseurl]/images/statispageimages/appstore-2.png" /></a></p>\n</div>\n', 'beautifulapps', 'beautifulapps', 'beautifulapps', '1367922820', 1373961988),
(7, 'powerfullcms', '<p><img alt="" class="imgborder aligncenter" src="[baseurl]images/Powerful-CMS.png" /></p>\n\n<div class="separator shadow small">&nbsp;</div>\n\n<div class="one_half firstcols">\n<div class="center"><img class="imgborder" src="[baseurl]images/mobile.png" /></div>\n\n<h4>Beautiful apps without any programming</h4>\n\n<p>Our easy to use content manage system allows for beautiful app design, customization, and functionality across a broad range of mobile devices without any programming knowlege needed.</p>\n</div>\n\n<div class="one_half lastcols"><img class="imgborder aligncenter" src="[baseurl]images/mobile.png" />\n<h4>Instantly update your app online</h4>\n\n<p>Update your apps content or appearance whenever you&#39;d like using our powerful content management system. Modify everything inside your app without having to send your app for a lengthy update with Apple or Google.</p>\n</div>\n\n<div class="one_half firstcols"><img class="imgborder aligncenter" src="[baseurl]images/mobile.png" />\n<h4>Choose from hundreds of design templates</h4>\n\n<p>Bizness Apps was built from the ground up with small businesses in mind. From our ease of use to the features that we offer inside our apps - we are specifically designed for small businesses.</p>\n</div>\n\n<div class="one_half lastcols"><img class="imgborder aligncenter" src="[baseurl]images/mobile.png" />\n<h4>Preview your apps instantly online</h4>\n\n<p>Demoing apps with potential clients is a breeze. We allow you to preview your apps as you build them online or from your mobile device. Preview apps from your iPhone, iPad, Android, or online.</p>\n</div>\n', 'powerfullcms', 'powerfullcms', 'powerfullcms', '1367922820', 1373961657),
(8, 'securehosting', '<img src="[baseurl]images/securehosting.jpg" class="imgborder aligncenter" alt=""/>\n                    <div class="separator shadow small"></div>\n                        \n                        <div class="one_half firstcols">\n                       <img src="[baseurl]images/mobile.png" class="imgborder aligncenter">\n                        <h4>Scalable and reliable mobile app hosting</h4>\n                        <p>Our servers are hosted in the cloud using the latest in data hosting technology. Using Bizness Apps you can expect 99.9% uptime for your mobile apps.</p>\n                      </div>\n                      \n                      <div class="one_half lastcols">\n                        <img src="[baseurl]images/mobile.png" class="imgborder aligncenter">\n                        <h4>Secure data storage and backups</h4>\n                        <p>Our data centers use the latest in data encrpytion technology and data backups are performed daily, weekly, and monthly to ensure your data is never lost while using Bizness Apps.</p>\n                      </div>\n', 'securehosting', 'securehosting', 'securehosting', '1367922820', 1373961844),
(9, 'helpfultraining', '<p><img alt="" class="imgborder aligncenter" src="[baseurl]images/statispageimages/training.jpg" /></p>\n\n<div class="separator shadow small">&nbsp;</div>\n\n<div class="one_half firstcols"><img class="imgborder aligncenter" src="[baseurl]images/statispageimages/webinar_icon.jpg" />\n<h4>Weekly app building webinars</h4>\n\n<p>We host live webinars every week on how to build beautiful mobile apps for clients using the Bizness Apps platform.</p>\n\n<p>See our previously recorded webinars here<br />\n<a href="#">Webinars</a></p>\n</div>\n\n<div class="one_half lastcols"><img class="imgborder aligncenter" src="[baseurl]images/statispageimages/tutorials.jpg" />\n<h4>Hundreds of tutorial articles available</h4>\n\n<p>We&#39;ve documented every part of building an app with the Bizness Apps platform with detailed tutorials.</p>\n\n<p>See our helpful tutorial articles at our help desk here:<br />\n<a href="#">Tutorials</a></p>\n</div>\n\n<div class="one_half firstcols"><img class="imgborder aligncenter" src="[baseurl]images/statispageimages/videoTraining.png" />\n<h4>Tons of helpful video tutorials available</h4>\n\n<p>Prefer a video tutorial over a help article? Watch from our vast library of video tutorials on how to use Bizness Apps.</p>\n\n<p>See our helpful video tutorials here:<br />\n<a href="#">Video Tutorials</a></p>\n</div>\n', 'helpfultraining', 'helpfultraining', 'helpfultraining', '1367922820', 1373962164);

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
  `email` varchar(100) DEFAULT NULL,
  `userType` tinyint(4) DEFAULT NULL COMMENT '1 for advertiser , 2 for publisher ',
  `isActive` tinyint(4) DEFAULT NULL COMMENT '0 for deactive by admin ,  1 for activate user , 2 for suspend by admin',
  `requesTime` int(10) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT '0' COMMENT '1 for user deleted , 0 is default(not deleted)',
  `isReplied` tinyint(4) NOT NULL,
  `replyMail` text,
  `isAccepted` tinyint(4) DEFAULT NULL COMMENT '1 for accept request and 0 for decline(decline request)',
  `acceptTime` int(10) DEFAULT NULL,
  `lastLogin` int(11) DEFAULT NULL,
  `lastLoginIp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`userId`, `name`, `userName`, `password`, `categoryId`, `company`, `website`, `phone`, `email`, `userType`, `isActive`, `requesTime`, `isDeleted`, `isReplied`, `replyMail`, `isAccepted`, `acceptTime`, `lastLogin`, `lastLoginIp`) VALUES
(1, NULL, 'vaibhav', 'jTSFd8FsFh', 0, 'sumedhasoftech', 'http://www.sumedhasoftech.com/', '141-2545632', 'vaibhav.sspl@gmail.com', 1, 1, 1377583917, 0, 1, '    hello customer     ', 1, 1377596593, 1377583917, NULL),
(2, '', 'chandraprakash', 'z32dFUlG2g', 0, 'sumedhasoftech', 'http://getbootstrap.com/2.3.2/components.html#labels-badges', '12345689536', 'cpgupta.sspl@gmail.com', 2, 1, 1377587517, 0, 1, 'fafasfasfas', 1, 1377601788, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

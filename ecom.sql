-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2015 at 01:26 PM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `osqursof_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL DEFAULT '',
  `category_description` text NOT NULL,
  `create_date` int(11) NOT NULL DEFAULT '0',
  `create_by` int(11) NOT NULL DEFAULT '0',
  `update_date` int(11) NOT NULL DEFAULT '0',
  `update_by` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_description`, `create_date`, `create_by`, `update_date`, `update_by`, `active`) VALUES
(1, 'PRODUCTS', 'PRODUCTS', 1409943602, 1, 1415599656, 1, 2),
(2, 'MOBILE  & ACCESSORY ', 'MOBILE  & ACCESSORY', 1409943612, 1, 1415294652, 1, 1),
(3, 'KOREAN DUMPING ITEM', 'KOREAN DUMPING ITEM', 1410525530, 1, 1412826998, 1, 1),
(4, 'BANGLADESHI PRODUCT', 'BANGLADESHI PRODUCT ', 1410525578, 1, 1415298608, 1, 1),
(5, 'COMPUTER & ACCESSORY ', 'COMPUTER & ACCESSORY', 1410525599, 1, 1415295809, 1, 1),
(6, 'OUR PROJECT', 'OUR PROJECT', 1410525637, 1, 1410526994, 1, 0),
(7, 'CONTUCT US', 'PRODUCTS', 1410525658, 1, 1410525658, 1, 2),
(8, 'STONE ', 'SriLanka Stone', 1412178106, 1, 1412785284, 1, 2),
(9, 'KOREAN MACHINERY ', 'KOREAN MACHINERY', 1415292836, 1, 1415293261, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` longtext,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1=active'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `content`, `status`) VALUES
(1, 'About Us', '<p style="text-align: justify;">DA Style is incorporated in both UK and Bangladesh, located in Dhaka, and London.&nbsp;DA Style is a highly resourcefull consultancy company. We mainly focus on Textile &amp; Leather with customers&rsquo; designs, With better-organized resources and clear business vision as well as serious quality control, Tex &amp; Leather has been serving customers from all over the world by producing high quality products.</p>\r\n<p style="text-align: justify;">&ldquo;High Quality, Competitive Price, Super Service,&rdquo; is NMK Tex &amp; Leather culture, in order to be convenient to our local trading companies.</p>', 1),
(2, 'Contact Us', '<h1><span style="font-size: medium;"><strong>DA Style</strong></span></h1>\r\n<p>63/4 West Agargaon<br /> Shar -E-Bangla Nagar,&nbsp;Dhaka 1207.<br /> </p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL DEFAULT '',
  `iso_code` varchar(3) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `iso_code`) VALUES
(1, 'Germany', 'DE'),
(2, 'Austria', 'AT'),
(3, 'Belgium', 'BE'),
(4, 'Canada', 'CA'),
(5, 'China', 'CN'),
(6, 'Spain', 'ES'),
(7, 'Finland', 'FI'),
(8, 'France', 'FR'),
(9, 'Greece', 'GR'),
(10, 'Italy', 'IT'),
(11, 'Japan', 'JP'),
(12, 'Luxemburg', 'LU'),
(13, 'Netherlands', 'NL'),
(14, 'Poland', 'PL'),
(15, 'Portugal', 'PT'),
(16, 'Czech Republic', 'CZ'),
(17, 'United Kingdom', 'GB'),
(18, 'Sweden', 'SE'),
(19, 'Switzerland', 'CH'),
(20, 'Denmark', 'DK'),
(21, 'United States', 'US'),
(22, 'HongKong', 'HK'),
(23, 'Norway', 'NO'),
(24, 'Australia', 'AU'),
(25, 'Singapore', 'SG'),
(26, 'Ireland', 'IE'),
(27, 'New Zealand', 'NZ'),
(28, 'South Korea', 'KR'),
(29, 'Israel', 'IL'),
(30, 'South Africa', 'ZA'),
(31, 'Nigeria', 'NG'),
(32, 'Ivory Coast', 'CI'),
(33, 'Togo', 'TG'),
(34, 'Bolivia', 'BO'),
(35, 'Mauritius', 'MU'),
(36, 'Romania', 'RO'),
(37, 'Slovakia', 'SK'),
(38, 'Algeria', 'DZ'),
(39, 'American Samoa', 'AS'),
(40, 'Andorra', 'AD'),
(41, 'Angola', 'AO'),
(42, 'Anguilla', 'AI'),
(43, 'Antigua and Barbuda', 'AG'),
(44, 'Argentina', 'AR'),
(45, 'Armenia', 'AM'),
(46, 'Aruba', 'AW'),
(47, 'Azerbaijan', 'AZ'),
(48, 'Bahamas', 'BS'),
(49, 'Bahrain', 'BH'),
(50, 'Bangladesh', 'BD'),
(51, 'Barbados', 'BB'),
(52, 'Belarus', 'BY'),
(53, 'Belize', 'BZ'),
(54, 'Benin', 'BJ'),
(55, 'Bermuda', 'BM'),
(56, 'Bhutan', 'BT'),
(57, 'Botswana', 'BW'),
(58, 'Brazil', 'BR'),
(59, 'Brunei', 'BN'),
(60, 'Burkina Faso', 'BF'),
(61, 'Burma (Myanmar)', 'MM'),
(62, 'Burundi', 'BI'),
(63, 'Cambodia', 'KH'),
(64, 'Cameroon', 'CM'),
(65, 'Cape Verde', 'CV'),
(66, 'Central African Republic', 'CF'),
(67, 'Chad', 'TD'),
(68, 'Chile', 'CL'),
(69, 'Colombia', 'CO'),
(70, 'Comoros', 'KM'),
(71, 'Congo, Dem. Republic', 'CD'),
(72, 'Congo, Republic', 'CG'),
(73, 'Costa Rica', 'CR'),
(74, 'Croatia', 'HR'),
(75, 'Cuba', 'CU'),
(76, 'Cyprus', 'CY'),
(77, 'Djibouti', 'DJ'),
(78, 'Dominica', 'DM'),
(79, 'Dominican Republic', 'DO'),
(80, 'East Timor', 'TL'),
(81, 'Ecuador', 'EC'),
(82, 'Egypt', 'EG'),
(83, 'El Salvador', 'SV'),
(84, 'Equatorial Guinea', 'GQ'),
(85, 'Eritrea', 'ER'),
(86, 'Estonia', 'EE'),
(87, 'Ethiopia', 'ET'),
(88, 'Falkland Islands', 'FK'),
(89, 'Faroe Islands', 'FO'),
(90, 'Fiji', 'FJ'),
(91, 'Gabon', 'GA'),
(92, 'Gambia', 'GM'),
(93, 'Georgia', 'GE'),
(94, 'Ghana', 'GH'),
(95, 'Grenada', 'GD'),
(96, 'Greenland', 'GL'),
(97, 'Gibraltar', 'GI'),
(98, 'Guadeloupe', 'GP'),
(99, 'Guam', 'GU'),
(100, 'Guatemala', 'GT'),
(101, 'Guernsey', 'GG'),
(102, 'Guinea', 'GN'),
(103, 'Guinea-Bissau', 'GW'),
(104, 'Guyana', 'GY'),
(105, 'Haiti', 'HT'),
(106, 'Heard Island and McDonald Islands', 'HM'),
(107, 'Vatican City State', 'VA'),
(108, 'Honduras', 'HN'),
(109, 'Iceland', 'IS'),
(110, 'India', 'IN'),
(111, 'Indonesia', 'ID'),
(112, 'Iran', 'IR'),
(113, 'Iraq', 'IQ'),
(114, 'Man Island', 'IM'),
(115, 'Jamaica', 'JM'),
(116, 'Jersey', 'JE'),
(117, 'Jordan', 'JO'),
(118, 'Kazakhstan', 'KZ'),
(119, 'Kenya', 'KE'),
(120, 'Kiribati', 'KI'),
(121, 'Korea, Dem. Republic of', 'KP'),
(122, 'Kuwait', 'KW'),
(123, 'Kyrgyzstan', 'KG'),
(124, 'Laos', 'LA'),
(125, 'Latvia', 'LV'),
(126, 'Lebanon', 'LB'),
(127, 'Lesotho', 'LS'),
(128, 'Liberia', 'LR'),
(129, 'Libya', 'LY'),
(130, 'Liechtenstein', 'LI'),
(131, 'Lithuania', 'LT'),
(132, 'Macau', 'MO'),
(133, 'Macedonia', 'MK'),
(134, 'Madagascar', 'MG'),
(135, 'Malawi', 'MW'),
(136, 'Malaysia', 'MY'),
(137, 'Maldives', 'MV'),
(138, 'Mali', 'ML'),
(139, 'Malta', 'MT'),
(140, 'Marshall Islands', 'MH'),
(141, 'Martinique', 'MQ'),
(142, 'Mauritania', 'MR'),
(143, 'Hungary', 'HU'),
(144, 'Mayotte', 'YT'),
(145, 'Mexico', 'MX'),
(146, 'Micronesia', 'FM'),
(147, 'Moldova', 'MD'),
(148, 'Monaco', 'MC'),
(149, 'Mongolia', 'MN'),
(150, 'Montenegro', 'ME'),
(151, 'Montserrat', 'MS'),
(152, 'Morocco', 'MA'),
(153, 'Mozambique', 'MZ'),
(154, 'Namibia', 'NA'),
(155, 'Nauru', 'NR'),
(156, 'Nepal', 'NP'),
(157, 'Netherlands Antilles', 'AN'),
(158, 'New Caledonia', 'NC'),
(159, 'Nicaragua', 'NI'),
(160, 'Niger', 'NE'),
(161, 'Niue', 'NU'),
(162, 'Norfolk Island', 'NF'),
(163, 'Northern Mariana Islands', 'MP'),
(164, 'Oman', 'OM'),
(165, 'Pakistan', 'PK'),
(166, 'Palau', 'PW'),
(167, 'Palestinian Territories', 'PS'),
(168, 'Panama', 'PA'),
(169, 'Papua New Guinea', 'PG'),
(170, 'Paraguay', 'PY'),
(171, 'Peru', 'PE'),
(172, 'Philippines', 'PH'),
(173, 'Pitcairn', 'PN'),
(174, 'Puerto Rico', 'PR'),
(175, 'Qatar', 'QA'),
(176, 'Reunion Island', 'RE'),
(177, 'Russian Federation', 'RU'),
(178, 'Rwanda', 'RW'),
(179, 'Saint Barthelemy', 'BL'),
(180, 'Saint Kitts and Nevis', 'KN'),
(181, 'Saint Lucia', 'LC'),
(182, 'Saint Martin', 'MF'),
(183, 'Saint Pierre and Miquelon', 'PM'),
(184, 'Saint Vincent and the Grenadines', 'VC'),
(185, 'Samoa', 'WS'),
(186, 'San Marino', 'SM'),
(187, 'São Tomé and Príncipe', 'ST'),
(188, 'Saudi Arabia', 'SA'),
(189, 'Senegal', 'SN'),
(190, 'Serbia', 'RS'),
(191, 'Seychelles', 'SC'),
(192, 'Sierra Leone', 'SL'),
(193, 'Slovenia', 'SI'),
(194, 'Solomon Islands', 'SB'),
(195, 'Somalia', 'SO'),
(196, 'South Georgia and the South Sandwich Islands', 'GS'),
(197, 'Sri Lanka', 'LK'),
(198, 'Sudan', 'SD'),
(199, 'Suriname', 'SR'),
(200, 'Svalbard and Jan Mayen', 'SJ'),
(201, 'Swaziland', 'SZ'),
(202, 'Syria', 'SY'),
(203, 'Taiwan', 'TW'),
(204, 'Tajikistan', 'TJ'),
(205, 'Tanzania', 'TZ'),
(206, 'Thailand', 'TH'),
(207, 'Tokelau', 'TK'),
(208, 'Tonga', 'TO'),
(209, 'Trinidad and Tobago', 'TT'),
(210, 'Tunisia', 'TN'),
(211, 'Turkey', 'TR'),
(212, 'Turkmenistan', 'TM'),
(213, 'Turks and Caicos Islands', 'TC'),
(214, 'Tuvalu', 'TV'),
(215, 'Uganda', 'UG'),
(216, 'Ukraine', 'UA'),
(217, 'United Arab Emirates', 'AE'),
(218, 'Uruguay', 'UY'),
(219, 'Uzbekistan', 'UZ'),
(220, 'Vanuatu', 'VU'),
(221, 'Venezuela', 'VE'),
(222, 'Vietnam', 'VN'),
(223, 'Virgin Islands (British)', 'VG'),
(224, 'Virgin Islands (U.S.)', 'VI'),
(225, 'Wallis and Futuna', 'WF'),
(226, 'Western Sahara', 'EH'),
(227, 'Yemen', 'YE'),
(228, 'Zambia', 'ZM'),
(229, 'Zimbabwe', 'ZW'),
(230, 'Albania', 'AL'),
(231, 'Afghanistan', 'AF'),
(232, 'Antarctica', 'AQ'),
(233, 'Bosnia and Herzegovina', 'BA'),
(234, 'Bouvet Island', 'BV'),
(235, 'British Indian Ocean Territory', 'IO'),
(236, 'Bulgaria', 'BG'),
(237, 'Cayman Islands', 'KY'),
(238, 'Christmas Island', 'CX'),
(239, 'Cocos (Keeling) Islands', 'CC'),
(240, 'Cook Islands', 'CK'),
(241, 'French Guiana', 'GF'),
(242, 'French Polynesia', 'PF'),
(243, 'French Southern Territories', 'TF'),
(244, 'Åland Islands', 'AX');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_payment` int(11) NOT NULL DEFAULT '0',
  `id_sales` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` text CHARACTER SET utf8 NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `coutry` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `create_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivery_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `delivered` enum('Pending','Courierd','Delivered','Canceled','Returned') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `id_user`, `id_payment`, `id_sales`, `name`, `email`, `phone`, `address`, `area`, `city`, `state`, `coutry`, `zip`, `create_date`, `delivery_date`, `delivered`, `status`) VALUES
(1, 4, 1, 1, 'Omar', 'omar.sumon@gmail.com', '53341', 'fafaf', 'asdf', 'asd', 'ads', 'Bangladesh', 'asd', '1416417437', '1417022237', 'Pending', 0),
(2, 4, 2, 2, 'Sumon', 'omar.sumon@gmail.com', '12345678', 'Dhaka', 'Mark', 'Dhaka', 'Dhaka', 'Bangladesh', '1000', '1416897831', '1417502631', 'Pending', 0),
(3, 4, 3, 3, 'Omar', 'omar.sumon@gmail.com', 'Sumon', 'Shaymoli', 'Mark', 'Dhaka', 'Dhaka', 'Bangladesh', '1212', '1416911338', '1417516138', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL,
  `firstname` varchar(124) NOT NULL DEFAULT '',
  `lastname` varchar(124) NOT NULL DEFAULT '',
  `email` varchar(124) NOT NULL DEFAULT '',
  `password` varchar(124) NOT NULL DEFAULT '',
  `create_date` int(11) NOT NULL DEFAULT '0',
  `create_by` int(11) NOT NULL DEFAULT '0',
  `update_date` int(11) NOT NULL DEFAULT '0',
  `update_by` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `id_profiles` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstname`, `lastname`, `email`, `password`, `create_date`, `create_by`, `update_date`, `update_by`, `active`, `id_profiles`) VALUES
(1, 'omar', 'sumon', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1363503400, 1416387776, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
  `id` int(11) NOT NULL,
  `datetime` int(11) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `date_time` int(11) NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `delivery_cost` float(10,2) NOT NULL DEFAULT '0.00',
  `payment_cost` float(10,2) NOT NULL DEFAULT '0.00',
  `total_price` float(10,2) NOT NULL DEFAULT '0.00',
  `pay_amount` float(10,2) NOT NULL DEFAULT '0.00',
  `pay_by` varchar(128) NOT NULL DEFAULT '',
  `pay_code` varchar(255) NOT NULL DEFAULT '',
  `delivery` enum('Download','Home Delivery') NOT NULL DEFAULT 'Home Delivery',
  `payment` enum('Pending','Paid','Denied') NOT NULL DEFAULT 'Pending',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `id_user`, `date_time`, `price`, `delivery_cost`, `payment_cost`, `total_price`, `pay_amount`, `pay_by`, `pay_code`, `delivery`, `payment`, `status`) VALUES
(1, 4, 1416417437, 74.00, 0.00, 0.00, 74.00, 74.00, 'cash', '', 'Home Delivery', 'Pending', 0),
(2, 4, 1416897831, 2050.00, 0.00, 0.00, 2050.00, 2050.00, 'cash', '', 'Home Delivery', 'Pending', 0),
(3, 4, 1416911338, 1450.00, 0.00, 0.00, 1450.00, 1450.00, 'cash', '', 'Home Delivery', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL DEFAULT '',
  `product_price` float(10,2) NOT NULL DEFAULT '0.00',
  `product_short` varchar(256) NOT NULL DEFAULT '',
  `product_description` text NOT NULL,
  `phy_path` varchar(255) NOT NULL DEFAULT '',
  `id_category` int(11) NOT NULL DEFAULT '0',
  `id_subcategory` int(11) NOT NULL DEFAULT '0',
  `create_date` int(11) NOT NULL DEFAULT '0',
  `create_by` int(11) NOT NULL DEFAULT '0',
  `update_date` int(11) NOT NULL DEFAULT '0',
  `update_by` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `status_new` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `status_featured` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `status_top` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_short`, `product_description`, `phy_path`, `id_category`, `id_subcategory`, `create_date`, `create_by`, `update_date`, `update_by`, `active`, `status_new`, `status_featured`, `status_top`) VALUES
(1, 'Samsung galaxy S5 LTE-A', 560.00, 'Made in korea', 'Samsung galaxy S5 LTE-A\n\n\nDisplay:5.10-inch\nProcessor:2.5GHz\nFront Camera:2-megapixel\nResolution:1440x2560 pixels\nRAM:3GB\nOSAndroid :4.4\nStorage:32GB\nRear Camera:16-megapixel\nBattery capacity:2800mAh', '1.png', 2, 1, 1411840758, 1, 1415294727, 1, 1, 0, 0, 1),
(2, 'Samsung Galaxy Note3', 550.00, 'Made in korea', 'Samsung Galaxy Note3\n\nDisplay:5.70-inch\nProcessor:1.9GHz\nFront Camera:2-megapixel\nResolution:1080x1920 pixels\nRAM:3GB\nOSAndroid :4.3\nStorage:32GB\nRear Camera13-megapixel\nBattery capacity:3200mAh', '2.jpg', 2, 1, 1411840991, 1, 1415297456, 1, 1, 0, 0, 1),
(3, 'Samsung Galaxy Note4', 850.00, 'Made in korea', 'Samsung Galaxy Note4\n\nDisplay:5.70-inch\nProcessor:1.9GHz\nFront Camera:3.7-megapixel\nResolution:1440x2560 pixels\nRAM:3GB\nOSAndroid :4.4\nStorage:32GB\nRear Camera:16-megapixel\nBattery capacity:3220mAh', '3.png', 2, 1, 1411841601, 1, 1415297414, 1, 1, 0, 0, 1),
(4, 'Samsung Galaxy Note2', 295.00, 'Made in korea', 'Samsung Galaxy Note2\n\n \nDisplay:5.50-inch\nProcessor:1.6GHz\nFront Camera:1.9-megapixel\nResolution:720x1280 pixels\nRAM:2GB\nOSAndroid :4.1\nStorage:16GB\nRear Camera:8-megapixel\nBattery capacity:3100mAh\n', '4.png', 2, 1, 1411841830, 1, 1415294788, 1, 1, 0, 0, 1),
(5, 'Samsung  galaxy slll ', 205.00, 'Made in korea', 'Samsung  galaxy slll \n\nDisplay4.:80-inch\nProcesso:r1.4GHz\nFront Camera:1.9-megapixel\nResolution:720x1280 pixels\nRAM:1GB\nOSAndroid :4\nStorage:16GB\nRear Camera:8-megapixel\nBattery capacity:2100mAh', '5.png', 2, 1, 1411841926, 1, 1415294805, 1, 1, 0, 0, 1),
(6, 'Samsung Galaxy Sll', 140.00, 'Made in korea', 'Samsung Galaxy Sll\n\nDisplay:4.30-inch\nProcessor:1.2GHz\nFront Camera:2-megapixel\nResolution:480x800 pixels\nRAM:1GB\nOSAndroid:2.3\nStorage:16GB\nRear Camera:8-megapixel\nBattery capacity:1650mAh\n\n', '6.png', 2, 1, 1411842004, 1, 1415294823, 1, 1, 0, 0, 1),
(7, 'Samsung  galaxy  Ace ', 85.00, 'Made in korea', 'Samsung  galaxy  Ace \n\n Display4.:00-inch\nProcessor:1GHz\nFront Camera:0.3-megapixel\nResolution:480x800 pixels\nRAM:512MB\nOSAndroid: 2.1\nStorage:16GB\nRear Camera:5-megapixel\nBattery capacity:1500mAh', '7.png', 2, 1, 1411842113, 1, 1415294867, 1, 1, 0, 0, 1),
(8, 'Samsung Galaxy Note1', 180.00, 'Made in korea', 'Samsung Galaxy Note1\n\nDisplay:5.29-inch\nProcessor:1.4GHz\nFront Camera:2-megapixel\nResolution:800x1280 pixels\nRAM1GBOSAndroid :2.3\nStorage:16GB\nRear Camera:8-megapixel\nBattery capacity:2500mAh\n\n', '8.jpg', 2, 1, 1411842295, 1, 1415294894, 1, 1, 0, 0, 1),
(9, 'Samsung  galaxy s4 LTE-A ', 370.00, 'Made in korea', 'Samsung  galaxy s4 LTE-A \n\n\nDisplay4.:00-inch\nProcessor:1.2GHz\nFront Camera:0.3-megapixel\nResolution:480x800 pixels\nRAM1GB\nOSAndroid :4.4\nStorage:4GB\nRear Camera:5-megapixel\nBattery capacity:1800mAh\n', '9.jpg', 2, 1, 1411842657, 1, 1415294911, 1, 1, 0, 0, 1),
(10, 'Samsung  galaxy s4 zoom ', 350.00, 'Made in korea', 'Samsung  galaxy s4 zoom \n\nDisplay:4.30-inch\nProcessor:1.5GHz\nFront Camera:1.9-megapixel\nResolution:560x960 pixels\nRAM:1.5GB\nOSAndroid :4.2\nStorage:8GB\nRear Camera:16-megapixel\nBattery capacity:2330mAh', '10.jpg', 2, 1, 1411842896, 1, 1415294929, 1, 1, 0, 0, 1),
(11, 'Samsung galaxy S6', 1000.00, 'Made in korea', 'Samsung galaxy S6\n\n\n• Samsung Exynos 8000 16-core processor / Snapdragon Qualcomm 810 64-bit\n• 4GB RAM\n• 128GB on-board memory\n• 5.2 inches Ulta High Definition display (4K) or full HD flexible display\n• 21MP (Ultra Pixel Sensor) recording at 8K resolution (ready content for your 8K resolution TV)\n• 3300 to 3500 mAh battery\n• Android 5.0\n\nUpdate: 09/02/2014- Galaxy S6 will have Qualcomm Snapdragon 810 and modem 4G LTE Advanced Cat 6?\n\n', '11.png', 2, 1, 1411843143, 1, 1415294949, 1, 1, 0, 0, 1),
(12, 'Samsung galaxy  mini', 250.00, 'Made in korea', 'Samsung galaxy  mini', '12.png', 5, 1, 1411844218, 1, 1411844218, 1, 2, 0, 0, 1),
(13, 'Samsung galaxy  mini', 250.00, 'Made in korea', 'Samsung galaxy  mini\n\nDisplay:4.30-inch\nProcessor:1.7GHz\nFront Camera:1.9-megapixel\nResolution:540x960 pixels\nRAM:1.5GB\nOSAndroid :4.2.2\nStorage:8GB\nRear Camera:8-megapixel\nBattery capacity:1900mAh\n\n', '13.png', 2, 1, 1411844261, 1, 1415294964, 1, 1, 0, 0, 1),
(14, 'Samsung Galaxy tab 10.1', 500.00, 'Made in korea', 'Samsung Galaxy tab 10.1\n\nDisplay:10.10-inch\nProcessor:1.6GHz\nFront Camera:1.3-megapixel\nResolution:800x1280 pixels\nRAM:1GB\nOSAndroid: 4.2\nStorage:16GB\nRear Camera:3-megapixel\nBattery capacity:6800m', '14.jpg', 2, 1, 1411869334, 1, 1415294981, 1, 1, 0, 0, 1),
(15, 'Samsung Galaxy tab 10.1', 500.00, 'Made in korea', 'Samsung Galaxy tab 10.1', '15.jpg', 5, 1, 1411870358, 1, 1411870358, 1, 2, 0, 0, 1),
(16, 'Samsung Galaxy tab 10.1', 500.00, 'Made in korea', 'Samsung Galaxy tab 10.1', '16.jpg', 5, 1, 1411870362, 1, 1411870362, 1, 2, 0, 0, 1),
(17, 'Samsung Galaxy Note 10.1', 680.00, 'Made in korea', 'Samsung Galaxy Note10.1\n\nTechnical highlights\n\nOS: Android 4.0 (Ice Cream Sandwich)\nDisplay: 10.1? WXGA (1280×800) LCD\nDimensions: 262 x 180 x 8.9 mm, 600g (3G), 597g (WiFi B/G/N)\nProcessor: 1.4GHz Exynos Quad-Core Processor\nStorage: 16/32/64GB internal + microSD (up to 64GB card)\nBattery capacity:  7,000mAh\nCameras Main(Rear): 5 Megapixel Auto Focus Camera with LED Flash, Sub(Front): 1.9 Megapixel Camera\n\n', '17.jpg', 2, 1, 1411870842, 1, 1415294996, 1, 1, 0, 0, 1),
(18, 'LG G2', 365.00, 'Made in korea', 'LG G2\n\n*As of March 2014 the most powerful blend of specs!\n\n*Fastest processor/chipset as of March 2014!\n\n*2GB of RAM!\n\n*32GB of internal storage!\n\n*Longer Battery Life than most smartphones!\n\n*User Replaceable Battery!\n\n', '18.jpg', 2, 1, 1411871728, 1, 1415295012, 1, 1, 0, 0, 1),
(19, 'LG G3 ', 560.00, 'Made in korea', 'LG G3\n\nTHE FIRST QUAD HD SMARTPHONE IN THE US WILL GIVE YOUR BEST MOMENTS A STAGE TO SHINE. WHEN IT COMES TO YOUR LIFE AND YOUR NEEDS, SIMPLE IS THE NEW SMART.\n\nLG G3™ VERIZON (VS985 METALLIC BLACK) COLOR :  Metallic Black   Silk White\n\n5.5" QUAD HD IPS DISPLAY WITH 538 PPILONG-LASTING REMOVABLE 3,000 MAH BATTERYINTUITIVE REAR KEY PLACEMENT FOR AMBIDEXTROUS USEADVANCED 13 MP OIS+ LASER AUTO FOCUS CAMERA\n\n', '19.jpg', 2, 1, 1411871949, 1, 1415295033, 1, 1, 0, 0, 1),
(20, 'Samsung Galaxy tab 7e', 230.00, 'Made in korea', 'Samsung Galaxy tab 7 inch\nPERFORMANCE:\n\nPowered by a mighty 1.2GHz Dual Core Processor, the GALAXY Tab 7.0 Plus allows seamless multitasking, faster webpage loading, smoother UI transitions and ultra-fast power-up. The weight has also been lightened a bit, down from 13.40 oz (380 g) to 12.17 oz (345 g) etc. the Galaxy Tab 7.0 Plus will have to do with a good-old LCD, be it of the new PLS type. The resolution has been kept the same as in the OG Galaxy Tab – 600×1024\n\n', '20.jpg', 2, 1, 1411872830, 1, 1415295050, 1, 1, 0, 0, 1),
(21, 'iped3 ', 400.00, 'U.S.A', 'Iped3 \n\nSize of this preview: 800 × 533 pixels.\n Other resolutions: 320 × 213 pixels \n640 × 427 pixels\n\n1,024 × 683 pixels \n1,280 × 853 pixels.\n\nOriginal file ?(1,920 × 1,280 pixels,\n\n file size: 427 KB, MIME type: image/jpeg)\n\nDescription\n\nEnglish: The iPad 3\n\nDate16 March 2012\n\n', '21.jpg', 2, 1, 1411873162, 1, 1415295066, 1, 1, 0, 0, 1),
(22, 'iphone4', 240.00, 'U.S.A', 'Iphone4 \n\nGENERAL2G NetworkGSM 850 / 900 / 1800 / 19003G NetworkHSDPA 850 / 900 / 1900 / 2100SIMMicro-SIMAnnounced2010, JuneStatusAvailable. Released 2010, JuneBODYDimensions115.2 x 58.6 x 9.3 mm (4.54 x 2.31 x 0.37 in)Weight137 g (4.83 oz) - Scratch-resistant glass back panelDISPLAYTypeLED-backlit IPS LCD, capacitive touchscreen, 16M colorsSize640 x 960 pixels, 3.5 inches (~330 ppi pixel density)MultitouchYesProtectionCorning Gorilla Glass, oleophobic coatingSOUNDAlert typesVibration, proprietary ringtonesLoudspeakerYes3.5mm jackYes, check qualityMEMORYCard slotNoInternal8/16/32 GB, 512 MB RAMDATAGPRSClass 10 (4+1/3+2 slots), 32 - 48 kbpsEDGEClass 10, 236.8 kbpsSpeedHSDPA, 7.2 Mbps; HSUPA, 5.76 MbpsWLANWi-Fi 802.11 b/g/n, Wi-Fi hotspotBluetoothv2.1, A2DPUSBv2.0CAMERAPrimary5 MP, 2592 x 1936 pixels, autofocus, LED flash, check qualityFeatures1/3.2'''' sensor size, 1.75 µm pixel size, geo-tagging, touch focus, HDR photoVideo720p@30fps, check qualitySecondaryVGA, 480p@30fps, videocalling over Wi-Fi onlyFEATURESOSiOS 4, upgradable to iOS 7.1.1ChipsetApple A4CPU1 GHz Cortex-A8GPUPowerVR SGX535SensorsAccelerometer, gyro, proximity, compassMessagingiMessage, SMS (threaded view), MMS, Email, Push EmailBrowserHTML5 (Safari)RadioNoGPSYes, with A-GPSJavaNoColorsBlack, White - Active noise cancellation with dedicated mic\n- iCloud cloud service\n- Maps\n- Audio/video player/editor\n- Photo viewer/editor\n- Voice memo\n- TV-out\n- Document viewer\n- Predictive text inputBATTERY Non-removable Li-Po 1420 mAh batteryStand-byUp to 300 h (2G) / Up to 300 h (3G)Talk timeUp to 14 h', '22.jpg', 2, 1, 1411873549, 1, 1415295085, 1, 1, 0, 1, 0),
(23, 'iphone4s', 300.00, 'U.S.A', 'Iphone4s\n\nManual\n\nGENERAL2G NetworkGSM 850 / 900 / 1800 / 19003G NetworkHSDPA 850 / 900 / 1900 / 2100SIMMicro-SIMAnnounced2010, JuneStatusAvailable. Released 2010, JuneBODYDimensions115.2 x 58.6 x 9.3 mm (4.54 x 2.31 x 0.37 in)Weight137 g (4.83 oz) - Scratch-resistant glass back panelDISPLAYTypeLED-backlit IPS LCD, capacitive touchscreen, 16M colorsSize640 x 960 pixels, 3.5 inches (~330 ppi pixel density)MultitouchYesProtectionCorning Gorilla Glass, oleophobic coatingSOUNDAlert typesVibration, proprietary ringtonesLoudspeakerYes3.5mm jackYes, check qualityMEMORYCard slotNoInternal8/16/32 GB, 512 MB RAMDATAGPRSClass 10 (4+1/3+2 slots), 32 - 48 kbpsEDGEClass 10, 236.8 kbpsSpeedHSDPA, 7.2 Mbps; HSUPA, 5.76 MbpsWLANWi-Fi 802.11 b/g/n, Wi-Fi hotspotBluetoothv2.1, A2DPUSBv2.0CAMERAPrimary5 MP, 2592 x 1936 pixels, autofocus, LED flash, check qualityFeatures1/3.2'''' sensor size, 1.75 µm pixel size, geo-tagging, touch focus, HDR photoVideo720p@30fps, check qualitySecondaryVGA, 480p@30fps, videocalling over Wi-Fi onlyFEATURESOSiOS 4, upgradable to iOS 7.1.1ChipsetApple A4CPU1 GHz Cortex-A8GPUPowerVR SGX535SensorsAccelerometer, gyro, proximity, compassMessagingiMessage, SMS (threaded view), MMS, Email, Push EmailBrowserHTML5 (Safari)RadioNoGPSYes, with A-GPSJavaNoColorsBlack, White - Active noise cancellation with dedicated mic\n- iCloud cloud service\n- Maps\n- Audio/video player/editor\n- Photo viewer/editor\n- Voice memo\n- TV-out\n- Document viewer\n- Predictive text inputBATTERY Non-removable Li-Po 1420 mAh batteryStand-byUp to 300 h (2G) / Up to 300 h (3G)Talk timeUp to 14 h', '23.png', 2, 1, 1411873788, 1, 1415295112, 1, 1, 0, 0, 1),
(24, 'iphone5', 540.00, 'Made in korea', 'Iphone5\n\nGENERAL2G NetworkGSM 850 / 900 / 1800 / 1900 - all versions CDMA 800 / 1700 / 1900 / 2100 - A1532 (CDMA), A14563G NetworkHSDPA 850 / 900 / 1700 / 1900 / 2100 - A1532 (GSM), A1532 (CDMA), A1456 HSDPA 850 / 900 / 1900 / 2100 - A1507, A1529\nCDMA2000 1xEV-DO - A1533 (CDMA), A14534G NetworkLTE 700/800/850/900/1700/1800/1900/2100 \n(1/2/3/4/5/8/13/17/19/20/25) - A1532 (GSM), A1532 (CDMA) LTE 700/800/850/900/1700/1800/1900/2100 \n(1/2/3/4/5/8/13/17/18/19/20/25/26) - A1456 LTE 800 / 850 / 900 / 1800 / 1900 / 2100 / 2600 \n(1/2/3/5/7/8/20) - A1507 LTE 800/850/900/1800/1900/2100/2600\nTD-LTE 1900/2300/2600 \n(1/2/3/5/7/8/20/38/39/40) - A1529SIMNano-SIMAnnounced2013, SeptemberStatusAvailable. Released 2013, SeptemberBODYDimensions124.4 x 59.2 x 9 mm (4.90 x 2.33 x 0.35 in)Weight132 g (4.66 oz)DISPLAYTypeLED-backlit IPS LCD, capacitive touchscreen, 16M colorsSize640 x 1136 pixels, 4.0 inches (~326 ppi pixel density)MultitouchYesSOUNDAlert typesVibration, proprietary ringtonesLoudspeakerYes3.5mm jackYes, check qualityMEMORYCard slotNoInternal8/16/32 GB, 1 GB RAMDATAGPRSYesEDGEYesSpeedDC-HSDPA, 42 Mbps; HSDPA, 21 Mbps; HSUPA, 5.76 Mbps, LTE, 100 Mbps; EV-DO Rev. A, up to 3.1 MbpsWLANWi-Fi 802.11 a/b/g/n, dual-band, Wi-Fi hotspotBluetoothv4.0, A2DP, LEUSBv2.0CAMERAPrimary8 MP, 3264 x 2448 pixels, autofocus, LED flash, check qualityFeatures1/3.2'''' sensor size, 1.4 µm pixel size, simultaneous HD video and image recording, touch focus, geo-tagging, face/smile detection, HDR (photo/panorama)Video1080p@30fps, check qualitySecondary1.2 MP, 720p@30fps, face detection, FaceTime over Wi-Fi or CellularFEATURESOSiOS 7, upgradable to iOS 7.1.2, upgradable to iOS 8.0.2ChipsetApple A6CPUDual-core 1.3 GHz Swift (ARM v7-based)GPUPowerVR SGX 543MP3 (triple-core graphics)SensorsAccelerometer, gyro, proximity, compassMessagingiMessage, SMS (threaded view), MMS, Email, Push EmailBrowserHTML5 (Safari)RadioNoGPSYes, with A-GPS, GLONASSJavaNoColorsWhite, Blue, Green, Yellow, Pink - Active noise cancellation with dedicated mic\n- Siri natural language commands and dictation\n- iCloud cloud service\n- TV-out\n- Maps\n- Audio/video player/editor\n- Organizer\n- Document viewer/editor\n- Photo viewer/editor\n- Voice memo/dial/command\n- Predictive text inputBATTERY Non-removable Li-Po 1510 mAh battery (5.73 Wh)Stand-byUp to 250 h (2G) / Up to 250 h (3G)Talk time(2G) / Up t', '24.jpg', 2, 1, 1411874307, 1, 1415295137, 1, 1, 0, 1, 0),
(25, 'ipone5s ', 640.00, 'U.S.A', 'Iphone5s \n\nGENERAL2G NetworkGSM 850 / 900 / 1800 / 1900 - all versions CDMA 800 / 1700 / 1900 / 2100 - A1532 (CDMA), A14563G NetworkHSDPA 850 / 900 / 1700 / 1900 / 2100 - A1532 (GSM), A1532 (CDMA), A1456 HSDPA 850 / 900 / 1900 / 2100 - A1507, A1529\nCDMA2000 1xEV-DO - A1533 (CDMA), A14534G NetworkLTE 700/800/850/900/1700/1800/1900/2100 \n(1/2/3/4/5/8/13/17/19/20/25) - A1532 (GSM), A1532 (CDMA) LTE 700/800/850/900/1700/1800/1900/2100 \n(1/2/3/4/5/8/13/17/18/19/20/25/26) - A1456 LTE 800 / 850 / 900 / 1800 / 1900 / 2100 / 2600 \n(1/2/3/5/7/8/20) - A1507 LTE 800/850/900/1800/1900/2100/2600\nTD-LTE 1900/2300/2600 \n(1/2/3/5/7/8/20/38/39/40) - A1529SIMNano-SIMAnnounced2013, SeptemberStatusAvailable. Released 2013, SeptemberBODYDimensions124.4 x 59.2 x 9 mm (4.90 x 2.33 x 0.35 in)Weight132 g (4.66 oz)DISPLAYTypeLED-backlit IPS LCD, capacitive touchscreen, 16M colorsSize640 x 1136 pixels, 4.0 inches (~326 ppi pixel density)MultitouchYesSOUNDAlert typesVibration, proprietary ringtonesLoudspeakerYes3.5mm jackYes, check qualityMEMORYCard slotNoInternal8/16/32 GB, 1 GB RAMDATAGPRSYesEDGEYesSpeedDC-HSDPA, 42 Mbps; HSDPA, 21 Mbps; HSUPA, 5.76 Mbps, LTE, 100 Mbps; EV-DO Rev. A, up to 3.1 MbpsWLANWi-Fi 802.11 a/b/g/n, dual-band, Wi-Fi hotspotBluetoothv4.0, A2DP, LEUSBv2.0CAMERAPrimary8 MP, 3264 x 2448 pixels, autofocus, LED flash, check qualityFeatures1/3.2'''' sensor size, 1.4 µm pixel size, simultaneous HD video and image recording, touch focus, geo-tagging, face/smile detection, HDR (photo/panorama)Video1080p@30fps, check qualitySecondary1.2 MP, 720p@30fps, face detection, FaceTime over Wi-Fi or CellularFEATURESOSiOS 7, upgradable to iOS 7.1.2, upgradable to iOS 8.0.2ChipsetApple A6CPUDual-core 1.3 GHz Swift (ARM v7-based)GPUPowerVR SGX 543MP3 (triple-core graphics)SensorsAccelerometer, gyro, proximity, compassMessagingiMessage, SMS (threaded view), MMS, Email, Push EmailBrowserHTML5 (Safari)RadioNoGPSYes, with A-GPS, GLONASSJavaNoColorsWhite, Blue, Green, Yellow, Pink - Active noise cancellation with dedicated mic\n- Siri natural language commands and dictation\n- iCloud cloud service\n- TV-out\n- Maps\n- Audio/video player/editor\n- Organizer\n- Document viewer/editor\n- Photo viewer/editor\n- Voice memo/dial/command\n- Predictive text inputBATTERY Non-removable Li-Po 1510 mAh battery (5.73 Wh)Stand-byUp to 250 h (2G) / Up to 250 h (3G)Talk time(2G) / Up t', '25.png', 2, 1, 1411874535, 1, 1415295172, 1, 1, 0, 0, 1),
(26, 'iphone6', 1000.00, 'U.S.A', 'Ipone6\n\nGENERAL2G NetworkGSM 850 / 900 / 1800 / 1900 - A1549 (GSM), A1549 (CDMA), A1586 CDMA 800 / 1700 / 1900 / 2100 - A1549 (CDMA), A15863G NetworkHSDPA 850 / 900 / 1700 / 1900 / 2100 - A1549 (GSM), A1549 (CDMA), A1586 CDMA2000 1xEV-DO - A1549 (CDMA), A1586 TD-SCDMA 1900 / 2000 - A15864G NetworkLTE 700/800/850/900/1700/1800/1900/2100/2600 \n(1/2/3/4/5/7/8/13/17/18/19/20/25/26/28/29) - A1549 (GSM), A1549 (CDMA) LTE 700/800/850/900/1800/1900/2100/2600\nTD-LTE 1900/2300/2500/2600 \n(1/2/3/4/5/7/8/13/17/18/19/20/25/26/28/29/38/39/40/41) - A1586SIMNano-SIMAnnounced2014, SeptemberStatusAvailable. Released 2014, SeptemberBODYDimensions138.1 x 67 x 6.9 mm (5.44 x 2.64 x 0.27 in)Weight129 g (4.55 oz) - Fingerprint sensor (Touch ID)\n- Apple Pay (Visa, MasterCard, AMEX certified)DISPLAYTypeLED-backlit IPS LCD, capacitive touchscreen, 16M colorsSize750 x 1334 pixels, 4.7 inches (~326 ppi pixel density)MultitouchYesProtectionShatter proof glass, oleophobic coating - Display ZoomSOUNDAlert typesVibration, proprietary ringtonesLoudspeakerYes3.5mm jackYesMEMORYCard slotNoInternal16/64/128 GB, 1 GB RAMDATAGPRSYesEDGEYesSpeedDC-HSDPA, 42 Mbps; HSUPA, 5.76 Mbps; EV-DO Rev. A, up to 3.1 Mbps; LTE, Cat4, 150 Mbps DL, 50 Mbps ULWLANWi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi hotspotBluetoothv4.0, A2DP, LENFCYes (Apple Pay only)USBv2.0CAMERAPrimary8 MP, 3264 x 2448 pixels, phase detection autofocus, dual-LED (dual tone) flash, check qualityFeatures1/3'''' sensor size, 1.5µm pixel size, geo-tagging, simultaneous HD video and image recording, touch focus, face/smile detection, HDR (photo/panorama)Video1080p@60fps, 720p@240fps, check qualitySecondary1.2 MP, 720p@30fps, face detection, FaceTime over Wi-Fi or CellularFEATURESOSiOS 8, upgradable to iOS 8.0.2ChipsetApple A8CPUDual-core 1.4 GHz Cyclone (ARM v8-based)GPUPowerVR GX6450 (quad-core graphics)SensorsAccelerometer, gyro, proximity, compass, barometerMessagingiMessage, SMS (threaded view), MMS, Email, Push EmailBrowserHTML5 (Safari)RadioNoGPSYes, with A-GPS, GLONASSJavaNoColorsSpace Gray, Silver, Gold - Active noise cancellation with dedicated mic\n- Siri natural language commands and dictation\n- iCloud cloud service\n- iCloud Keychain\n- TV-out\n- Maps\n- Audio/video player/editor\n- Organizer\n- Document viewer/editor\n- Photo viewer/editor\n- Voice memo/dial/command\n- Predictive text inputBATTERY Non-removable Li-Po 1810 mAh battery (6.9 Wh)Stand-by(2G) / Up to 250 h (3G)Talk time(2G) / Up to 14 h (3G)', '26.png', 2, 1, 1411874632, 1, 1415297499, 1, 1, 0, 0, 1),
(27, 'Samsung notebook', 900.00, 'Made in korea', 'Samsung notebook', '27.jpg', 5, 2, 1411921895, 1, 1412173321, 1, 1, 0, 1, 0),
(28, 'Samsung notebook', 1200.00, 'Made in korea', 'Samsung notebook\n\nATIV Book 9 Lite (13.3" HD Touch / AMD Quad-Core)NP915S3G-K05US\n\nCOLOR\n\nExtremely Thin and Light DesignSolid State Drive & Quad Core Performance13.3" HD Touch ScreenSamsung SideSync Technology', '28.jpg', 5, 2, 1411922318, 1, 1412166666, 1, 1, 0, 1, 0),
(29, 'Samsung notebook', 650.00, 'Made in korea', 'Samsung notebook', '29.jpg', 5, 2, 1411923005, 1, 1412173356, 1, 1, 0, 1, 0),
(30, 'Samsung notebook', 650.00, 'Made in korea', 'Samsung notebook', '30.png', 5, 2, 1411923069, 1, 1412173389, 1, 1, 0, 1, 0),
(31, 'Samsung notebook', 1000.00, 'Made in korea', 'Samsung notebook', '31.jpg', 5, 2, 1411923316, 1, 1412173420, 1, 1, 0, 1, 0),
(32, 'Samsung notebook', 650.00, 'Made in korea', 'Samsung notebook', '32.jpg', 5, 2, 1411923452, 1, 1412173604, 1, 1, 0, 1, 0),
(33, 'Samsung notebook', 1400.00, 'Made in korea', 'Samsung notebook\n\nhours of battery life.\n\nThe Series 9 laptop with 13.3-inch SuperBright Plus display ().\n\nNP900X3C-A01US\nAt a Glance:13.3-inch HD+ display\n\n1.7 GHz Intel Core i5-3317U ultra-low voltage, dual-core processor\n\n128 GB solid state drive\n\n4 GB installed RAM\n\nIntegrated Intel HD Graphics 4000\n\nWireless-N Wi-Fi + Bluetooth 4.0\n\nHDMI output\n\nMicrosoft Windows 7 Home Premium\n\n', '33.jpg', 5, 2, 1411923631, 1, 1412167403, 1, 1, 0, 1, 0),
(34, 'HP notebook', 650.00, 'Made in korea', 'HP notebook', '34.png', 5, 2, 1411923810, 1, 1412173439, 1, 1, 0, 1, 0),
(35, 'Apple  MacBook Air', 1000.00, 'U.S.A', 'Apple  MacBook Air\n\nHighlights1.4GHz Intel Core i5 Dual-Core (Haswell)4GB of 1600 MHz LPDDR3 RAM128GB Flash StorageIntegrated Intel HD Graphics 500011.6" LED-Backlit Glossy Display1366 x 768 Native Resolution802.11ac Wi-Fi, Bluetooth 4.0Dual USB 3.0 Ports, One Thunderbolt Port720p FaceTime HD CameraMac OS X 10.9 Mavericks', '35.jpg', 5, 2, 1411923981, 1, 1412166285, 1, 1, 0, 1, 0),
(36, 'Korean Quilt', 85.00, 'Made in korea', 'Korean Quilt\nOne pcs set\n1pcs quilt :220×240 ', '36.png', 3, 3, 1411925724, 1, 1412827073, 1, 1, 0, 1, 0),
(37, 'LG Bluetooth ', 50.00, 'Made in korea', 'LG Bluetooth', '37.jpg', 2, 1, 1412004397, 1, 1415297577, 1, 1, 1, 0, 0),
(38, 'LG Nexus 5', 700.00, 'Made in korea', 'LG Nexus5\n\nBold new speeds and wireless living.4.8 oz. and 8.59mm4.95” 1920x1080 display (445 ppi)Snapdragon™ 800, 2.26GHz processor4G/LTE and Dualband Wi-FiAndroid™ 4.4, KitKat®Wireless charging', '38.jpg', 2, 1, 1412008744, 1, 1415295242, 1, 1, 0, 0, 1),
(39, 'Samsung galaxy Alpha ', 900.00, 'Made in korea', 'Samsung galaxy Alfa \n\nDisplay:4.70-inch\nProcessor:1.8GHz\nFront Camera:1.2-megapixel\nResolution:720x1280 pixels\nRAM:2GB\nOSAndroid :4.4\nStorage:32GB\nRear Camera:12-megapixel\nBattery capacity:1860mAh\n\n', '39.png', 2, 1, 1412009063, 1, 1415297532, 1, 1, 0, 0, 1),
(40, 'Samsung  galaxy Note Edge  ', 1000.00, 'Made in korea', 'Samsung  galaxy Note Edge \n\nDisplay:5.60-inch\nProcessor:2.7GHz\nFront Camera:3.7-megapixel\nResolution:1440x2560 pixels\nRAM:3GB\nOSAndroid :4.4\nStorage:32GB\nRear Camera:16-megapixel\nBattery capacity:3000mAh\n\n', '40.jpg', 2, 1, 1412009548, 1, 1415295217, 1, 1, 0, 0, 1),
(41, 'EGG INCUBATOR ', 49000.00, 'Made in korea', 'EGG\n  we are supply Korean big egg incubator. egg incubator machine developed egg and egg occurs machine configuration. Egg capacity : 4500 pcs (hen) 3150 pcs (duck) Egg develop machine 4500 egg production machinery per unit and three units 1 set. Egg develop machine need three unit per single occurs machine . Machine 1pcs Fan motor : 220V~380V , 1/2HP, 50 ~ 60 Hz Heater : 800 W * 2 EA , Automatic temperature control function , Cooling function , Low temperature alarm , High - temperature alarm , Humidity control , Egg moving system . 100% Korea technology system . Of the machine is the normal size. We have the larger size of the machine . If there is any question, you can come to website or send us e-mail.We hope to make a good business with your company.Please give us your reply.I prefer to get your reply by e-mail \n\n                                               Thank you\n', '41.png', 9, 5, 1412163440, 1, 1415292937, 1, 1, 1, 0, 0),
(42, 'full vegetable cow crust  Lather', 2.70, 'Made in bangladesh ', 'Bangladeshi Lather\n\n1. Full vegetable cow crust leather\n2. Full chrome cow crust leather\n3. Semi chrome crust leather \n4.All forms of finished leather both\n\n milling & ambushed Well tanned softy colored leather. We want to be your buying agent. Monthly  we can supply 10 millions sft.\nSize: 15-25 sft\nThickness: 0.7mm-0.9mm/1.0-1.4mm  Lather is a natural product which we get from different animals. After processing the raw lather in different ways in the industry, we can get different kinds of lather goods. There are different kinds of things made by lather, such as shoe sole, lather jacket, lather pant, lather bags etc. We use different lather things everyday. They are stylish too. Leather & Leather Goods can be found different shops around you. If you want to start business of lather goods, you have to know Leather Exporters and Leather & Leather Goods related information. \n\nKhan korea market  is an Online Business Directory which will help and guide you to get vast of information’s about numerous Bag & Travel Goods, Crust & Finished Leather, Leather Exporters and many other Leather & Leather Goods related information’s. \n\nFor your convenience, khan korea market  listed particular address, city and country name, contact information, website link, description of every individual sub category of Leather & Leather Goods related information. Khan korea market  always keeps update of their informative information for you. Thus, you can get updated Leather & Leather Goods related information for both of your individual and professional needs. So, always keep an eye on \nkhan korea market for getting your necessary updates of Leather & Leather Goods related information’s.\n\nAll Business Categories', '42.jpg', 4, 7, 1412178511, 1, 1413136742, 1, 1, 0, 1, 0),
(43, 'CORNFLOUR ', 0.60, 'Made in bangladesh ', 'CORNFLOUR\nWe are manufacturers for high quality food stuff manufacturers. We have started manufacturing the followings at first stage: \n1. Corn grit\n2. Corn flour\nOur manufacturing activities and plant is designed to conform the norms under HCCP and Codex Standard of world food programme.\n\nShipment: \nAfter confirmation of payment\nFOB Price\n:Get Latest Price\nMini Order:1000 Ton/TonsSupply Ability:2000 Metric Ton/\nMetric Tons per Month\nPayment Terms:L/C \nT/T', '43.jpg', 4, 8, 1412182098, 1, 1412182174, 1, 1, 1, 0, 0),
(44, 'NID  PROJECT ', 0.00, 'Made in korea', 'NID Project\n\n1. Project Overview\n\n- Establishment of the system for e-Passport, National ID card and Border Control in Bangladesh\n\n- Available to set up the fund for the establishment of the system under a advantageous terms (Providing to Bangladesh Government)\n\n- The investments would be retrieved through the fees for e-Passport issuance and NID Card issuance.\n\n2. Strong points of the project\n\n- Operation of proposed funds is more flexible to compare with World Bank’s Fund. \n\n- Available to establish the perfect e-Government System through the security of enough budget\n\n- The tender by World Bank is made with the condition that foreign company usually be the main contract firm. On the contrary to this, local company would be the main contract firm and then hold the track record and technology for the project in the condition of proposed investment system so that local firm is available to extend their business abroad. \n \n3. Project Budget\n\n- Total budget for the project is about 200 million US$. \n\n- Grace period and Redemption period would be determined by enough discussion. \n\n(Interest rate: 4~5%)\n\n- 2 Contracts \n\na) The contract for retrieval of the principal and interest\n\nb) Operation Expenses (for the operation, maintenance, the supply of pre-printing card, e-passport and other consumables)\n\n- The source of the fund: The fund is from international banking investment firms\n\n- The prospective costs in each business (Available to be changed after on-site survey)\n\nBusiness \n\nProspective cost\n\nNational ID card System\n\n(Base on WB report)\n\n100 million US dollar\n\ne-Passport System\n\n(Include Consular system and Book bind System)\n\n80 million US dollar\n\nBorder Control System\n\n20 million US dollar\n\nTotal\n\n200 million US dollar\n\n(Not Including Tax)\n\n4. The basic condition for making progress of the project\n\n- The guarantee by the Ministry of Finance and other relevant departments\n\n- The guarantee for the business of system maintenance and system operation for 10 years\n\n- The guarantee for the supply of pre-printing card, e-passport and other consumables\n\n- Guarantee for the allowance of overseas remittance about profits\n\n5. Meeting History\n\n- We had two times meeting in 2012 with the chief secretary of Prime Minister\n\n- We had given the presentation on June, 2012 to the chief secretary of Prime Minister and other chiefs of relevant organization. \n\n6. Considerations\n\n- The Prime Minister’s office seems to have the will to progress the project but practical authority for the project execution seems to belong to the Military. \n- We made a conclusion that there’s only way to execute the project through a persuasion for the most influential person in the military to accept our proposal. \n', '44.png', 6, 10, 1412182655, 1, 1412265569, 1, 1, 1, 0, 0),
(45, 'lotto lottery  game  sarves ', 0.00, 'Made in korea', 'lotto lottery  game project\n\n Bangladesh Lottery Committee \n\n Understanding  Bangladesh  Lottery Business \n\n1) Proposal Background \nCurrently  in bangladesh a new online  lottery  system is needed  to raise  expand  Sports  and public  Service  for future Bangladesh Lottery  Business growth, an enhanced online lottery  system  with  high reliability high availability, and high processing power is essential  Understanding  these requirements  of the first online lottery  business in bangladesh \n\nKhan korea market\n suggests the way  to build  and operate  the latest \nOnline  lottery  system  as well as business  supporting  way to promote  developed  lottery  business  in the nation \n\n2. Proposal  Purpose \nConsidering the importance of new  Bangladesh  online  lottery  system ,khan korea market.  offers a up-to-date  system with a stable online lottery  solution  and  lottery  system  expert, based on the following  purposes.\nFor Customer \n• Guide Bangladesh to spend their spare time in healthy  leisure activities through  continuous advertisement and promotion of  people''s  interest. \n• Meet people''s  satisfaction and confidence by offering  stable  and  fast  service.\nFor the  issuer of lottery \n• Expand  public  business of the public group by  guaranteeing fund-raising to the level than expected.\n• Extend distribution channel through effective introduction of telecommunications technology.\n• Build real-time and developed management system  through diverse Value-added ability.\nFor company Constructing and  managing system\n• Secure professional technology and experts for the construction and management of the lottery system. \n• Maintain the system operation through continuous maintenance training and technology development. \n• Contribute to public business  and secure in finance through sales increase due to active marketing. \n• Support rapid sales and settlement of accounts operation. \n• Enhance the quality of the lottery sales business process. \n\n2. Proposal  Purpose \nConsidering the importance of new  Bangladesh  online  lottery  system ,khan korea market .  offers a up-to-date  system with a stable online lottery  solution  and  lottery  system  expert, based on the following  purposes.\nFor Customer \n• Guide Bangladesh to spend their spare time in healthy  leisure activities through  continuous advertisement and promotion of  people''s  interest. \n• Meet people''s  satisfaction and confidence by offering  stable  and  fast  service.\nFor the  issuer of lottery \n• Expand  public  business of the public group by  guaranteeing fund-raising to the level than expected.\n• Extend distribution channel through effective introduction of telecommunications technology.\n• Build real-time and developed management system  through diverse Value-added ability.\nFor company Constructing and  managing system\n• Secure professional technology and experts for the construction and management of the lottery system. \n• Maintain the system operation through continuous maintenance training and technology development. \n• Contribute to public business  and secure in finance through sales increase due to active marketing. \n• Support rapid sales and settlement of accounts operation. \n• Enhance the quality of the lottery sales business process. \n\n3. Lottery Business Consideration \n3-1. Analyze Lottery Market \n3-1-1. Process of Lottery Technology Changes \n?Lottery\n  • step 1 ( Paper Ticket (Draw) )\n  • step 2 ( Instant Paper Ticket )\n  • step 3 ( On-line Lottery  (Lotto , Toto))\n  • step 4 ( Mobile Lottery,  Video Lottery  Terminal,\n                Internet Lottery )\n?TELECOMMUNICATIONS\n  • Off-line  ( Radio, TV,Ad.Etc. )\n  • on-line  ( Internet , Mobile )\n3-1-2. Features and Types of Lottery Game \nA. Features of Online Lottery \n?Items 1. Variable amount of prize winning \n= Features  ( Prize money in Pari-Mutual Method : Calculate a total amount of prize winning by a specified rate of total purchase amount. )\n?Items 2. High amount of prize winning \n= Features  ( Jack pot can bring in several winners with huge amount of prize money : Jack Pot system, which carries the amount of prize that has no winner this week to the possible winners next week , increases the amount of prize money in accumulative way.)\n?Items 3. Customer''s active participation \n= Features ( Customer can select a game  rule and numbers. )\n?Items 4. Various game methods\n= Features  ( Proactively meet customer''s need : Can change and apply game in the computer system. )\n?Items 5. Increasing sales \n= Features  ( Unlimited sales amount : On-demand sales,  rather than pre-printed lottery sales. )\n?Items 6. Efficient information processing \n= Features  ( Aggregate and process information through centrally managed system.)\n?Items 7. Increase of social contribution \n= Features  ( Huge fund-raising via unlimited sales amount. )\n?Items 8. Transparent  distribution \n= Features  ( Transparent distribution structure managed by the computer system : Automatically manage information , such as simplified distribution structure and distribution amount , via the computer system.)\n\nB. Types of Online Lottery \n1. Lotto \n?Choose 5~7 numbers from 1 to 45~90.\n?In general 6/6/45 way , customer choose 6 numbers from 1 to 45 by direct or by automatically chosen device. \n?Choose 6 numbers offline , pay the prize money to the  winner.  There are games with bonus numbers. \n?Prize money can be paid to the winners by their ranking at a fixed amount but Pari-Mutual method is more general,  which priorities the percentage of the total sales amount rate and changes the prize money by ranking based on the sales amount. \n?If there is no prize winner this week, the amount of the prize this week will be carried to next week.  This is referred as Jack Pot. The AD for this Jack Pot will be able to heightens customer''s interest in the lottery and  eventually increase sales. \n2. Sports Pools (ToTo)\n?Guess the score of the popular sports. \n?Example : Soccer / Basketball ToTo, Soccer Lotto,  Soccer Score,  Basketball Score and so on.\n3. Video Lottery \n?Use games such as Card, Poker or Black Jack on an electronic device.\n?A typical amount of prize money is $2~$1,000.  Payment is made to the  winning ticket issued by the organization.\n?To prohibit minors from buying this lottery,  most of  lotteries are managed vai main datacenter in the system at hotel or restaurants. \n4. Numbers\n?Win the lottery if customer first choose 3-4 numbers from 0 to 9 ( possible repeatedly selection )and then the chosen numbers match the selected numbers arrangement order.  It is commonly called "Straight Method ".\n?Probability of the winning this Straight 3-digit game is 1,000 : 1 and, in many cases, the rate of prize money settlement is fixed at 500 : 1, a half of the probability.\n?Enter the  chosen numbers and bidding money to the online device. Quick Pick method, where numbers are chosen by machine, can be used. \n? The amount generally predefined based on the winning probability will be paid to the winner. \n5. Keno\n?Choose 10 numbers from 80, and draw 20 numbers by operator. The customer whose drawn 20 numbers contain 10 numbers wins the lot. \n?Drawing lot runs every 5 minutes. \n', '45.png', 6, 10, 1412183113, 1, 1412611503, 1, 1, 0, 1, 0),
(46, 'Korean Steel ', 600.00, 'Made in korea', 'Korean Steel\nPar ton:600 dollar ', '46.png', 3, 6, 1412251441, 1, 1412827140, 1, 1, 0, 1, 0),
(47, 'korean blanket ', 40.00, 'Made in korea', 'Korean  blanket  now for sell \n(1 pcs 1 set : 220× 240) \nPrice =(8 KG : 70,000 WON)\n(6KG : 55000 WON)\n (4 KG : 40,000 WON)\nMADE IN KOREA \n\nHOME  SARVCE\n  KOREA ANY CATY\n(DELIVERY  FREE)\n', '47.jpg', 3, 11, 1412351451, 1, 1412827101, 1, 1, 0, 1, 0),
(48, 'health pain  treatment', 90.00, 'Made in korea', '<Pain  Treatment Necklace>\n same effect  with the Microcurrent therapy .\n Gives the freedom from pain .\n Excellent effect on knee pain , Neck pain  shoulder pain , back pain , and other pain .\n The  authorized   products  reliable .\n If you are wear a necklace will get the freedom from pain.\n\n? HP: 821028703176 <<', '48.jpg', 1, 12, 1412568589, 1, 1415295640, 1, 1, 0, 1, 0),
(49, 'korean suit ', 12.00, 'Made in korea', 'Dumping is an item . deadline is imminent sale.\nPlease select as soon Possible\nPar suit 12 dollar FOB Price  & new,\nminimum 10,000 pcs\n   Onely wholesale ', '49.jpg', 3, 6, 1412612528, 1, 1412827169, 1, 1, 0, 1, 0),
(50, 'Railway project', 0.00, 'Made in korea', 'Railway project', '50.jpg', 5, 10, 1412768584, 1, 1412769284, 1, 2, 0, 1, 0),
(51, 'Railway project', 0.00, 'Made in korea', 'Railway project\n \nOur project area provides a repository of past, present and future projects within the industry. As well as providing an overview of the changing market landscape, this section offers access to the suppliers involved in each project \n\nShare on facebookShare on twitterShare on emailShare on printMore Sharing Services8\n\nIndustry GalleryThe Railway gallery provides an image archive of plants, equipment, systems and components used in the Railway industry.\n\n\nCompany ImagesAttachments, Adhesives, Sealants and FixingsBogies, Suspension, Wheels and AxlesBrakes, Couplers and Draw GearCables, Hoses and ConnectorsCCTV & SecurityComputer Hardware and Software, Control and Monitoring SystemsControls, Electromechanical Equipment and DrivesCranes, Platforms and Access EquipmentDiesel Engines, Transmission and FuelDoor Systems, Lighting and External ComponentsElectrification, Traction and Power SupplyEngineering, Test and Testing EquipmentEvents and PublicationsFire Safety, Detection and SuppressionFriction Management and LubricantsGalley, Buffet Car and Restaurant EquipmentGangway SystemsHigh Speed and Suburban TrainsHVAC, Cooling Systems and CompressorsInfrastructure Engineering and MaintenanceLocomotivesNoise, Shock and Vibration ControlOccupational Health, Drug and Alcohol TestingOperation Control, Passenger Information Display and EntertainmentOverhaul, Maintenance, Repair and RefurbishmentPaints and Protective CoatingsPassenger Coaches and InteriorsProject Management and ConsultancyPublic Address and Voice Alarm SystemsRail Vehicle DesignRail, Rail Anchors, Fasteners and SleepersRisk Assessment and Derailment AnalysisRolling Stock and Infrastructure Testing and CertificationSignalling and CommunicationsStation Equipment, Fare Collection and TicketingTrack and Rail Maintenance and Safety EquipmentTrack Engineering and ConstructionTracking and Position Monitoring SystemsTraining and RecruitmentTurnkey SolutionsTurnouts / Switches, Setting and Monitoring DevicesWeighing and Controls EquipmentYard Equipment and Wash Plants\n\nProject ImagesFuture ContractsHeavy RailwaysHigh-Speed RailwaysLight Rail SystemsMetrosRailway Stations\n\n', '51.jpg', 6, 10, 1412768593, 1, 1414168612, 1, 1, 0, 1, 0),
(52, 'Railway project', 0.00, 'Made in korea', 'Railway project', '52.jpg', 5, 10, 1412768596, 1, 1412768596, 1, 2, 0, 0, 0),
(53, 'Railway project', 0.00, 'Made in korea', 'Railway project', '53.jpg', 5, 10, 1412768597, 1, 1412768597, 1, 2, 0, 0, 0),
(54, 'Railway project', 0.00, 'Made in korea', 'Railway project', '54.jpg', 5, 10, 1412768600, 1, 1412768720, 1, 2, 0, 0, 0),
(55, 'Railway project', 0.00, 'Made in korea', 'Railway project', '55.jpg', 5, 10, 1412768716, 1, 1412768716, 1, 2, 0, 0, 0),
(56, 'Railway project', 0.00, 'Made in korea', 'Railway project', '56.jpg', 5, 10, 1412769106, 1, 1412769106, 1, 2, 0, 0, 0),
(57, 'Railway project', 0.00, 'Made in korea', 'Railway project', '57.jpg', 5, 10, 1412769107, 1, 1412769107, 1, 2, 0, 0, 0),
(58, 'Railway project', 0.00, 'Made in korea', 'Railway project', '58.jpg', 5, 10, 1412775468, 1, 1412775468, 1, 2, 0, 0, 0),
(59, 'Railway project', 0.00, 'Made in korea', 'Railway project', '59.jpg', 5, 10, 1412775468, 1, 1412775468, 1, 2, 0, 0, 0),
(60, ' Fertilizer urea plant', 0.00, 'Made in korea', ' Fertilizer urea plant\n\n» Environmental Technology Database » Urea Fertilizer Production Plant\nModality of business transactionMark ?, if applicableMode of businessBrief description Direct Investment  Partnership ?Export of productEPC(Engineering, Procurement and Construction) business of refining, petrochemical and fertilizer plants.?Licensing of patentLicensor of urea fertilizer plant.Technology dataName of technologyUrea Fertilizer Production Plant (ACES21)Field of the technologyMajor category:\nLow carbon and energy conservationSub-category:\nIndustryConceivable applicationsUrea fertilizer production.Performance\n(quantitatively describing is appreciated)Since the foundation of the company in 1961, has designed and constructed almost 100 urea plants, utilizing the Company''s own technologies. It is no exaggeration to say that the history of the urea plant is the history of energy saving improvement. In the early 1980s, we established the Advanced Process for Cost and Energy Saving (ACES), which slashes the energy consumed by urea plants. Our initiatives continued to reduce energy consumption, which led to the development of an improved version of ACES, known as the ACES21 urea process. Compared to 0.93 ton of steam and 140 kWh of electricity using the previous processes, the new process consumes only 0.43 ton of steam (53% reduction) and 118 kWh of electricity (16% reduction) to produce one ton of urea. This has enabled significant energy saving to be achieved and helped to reduce CO2 emissions.\n\nTR-C1 and TR-D process: previous processTechnical maturityPast record of introductionOwnerLocationDaily Capacity(MT/D)On streamSichuan Chemical Works (Group) Ltd.Chengdu, China2,4602004P.T. Pupuk KujangCikampek, Indonesia1,7252006Methanol Holdings LimitedPoint Lisas, Trinidad and Tobago2,1002009National Petrochemical CompanyShiraz, Iran3,2502010Petroquimica de Venezuela S.A. (PEQUIVEN)Moron, Venezuela2,2002010\n\nMT/D: Metric Ton per Day\n\nCompetitive advantage1. Low Investment Cost\n2. Low Energy Consumption and running cost saving\n3. Easy Operation and High On-stream Factor\n4. Maintenance Cost Saving\n(See below in detail -> Feature)Conceivable risk Information on patent related to this technology Schematic illustration of the technologySummary\n\n has established the most energy efficient process of ACES (Advanced Process for Cost and Energy Saving.) in early 1980’s. And using its own expertise, advanced technology and new thinking, TOYO has established the ACES21, which achieves energy saving and plant cost reduction with maintaining the excellent feature of ACES process such as high performance and high efficiency.?ACES21 has been developed together with P.T. Pupuk Sriwidjaja (PUSRI) of Indonesia as a Cost and Energy Saving version of the ACES Process.\n\nProcess Flow Diagram of ACES21\n\nFeatureLow Investment Cost\n\nReduction of construction cost (Low Elevation and Compact Layout)\n- Reactor on Ground Level\n- Vertical Submerged type Carbamate Condenser (VSCC)\n- Simple synthesis loop and no gravity flow\n\nReduction of Equipment cost\n- Small reactor by two stage reaction\n- Less number of equipment in synthesis loop\n\nLow Energy Consumption and running cost saving\n\nThe operation condition of synthesis section is optimized under the lower operation pressure than the previous process. As a result, a remarkable reduction in energy consumption is achieved.\n\nEasy Operation and High On-stream Factor\n\nForced flow of synthesis loop circulation by ejector and no gravity flow\n\nMaintenance Cost Saving\n\n- Milder operating condition in synthesis loop (Less corrosion risk)\n- Advanced and proven material developed by TEC for high pressure vessel\n- Maintenance support service\n\n', '60.png', 6, 10, 1412776182, 1, 1414167488, 1, 1, 0, 1, 0);
INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_short`, `product_description`, `phy_path`, `id_category`, `id_subcategory`, `create_date`, `create_by`, `update_date`, `update_by`, `active`, `status_new`, `status_featured`, `status_top`) VALUES
(61, 'Bridge construction project', 0.00, 'Made in korea', 'Bridge construction project\n\nTappan Zee Bridge Replacement\n\nConcept art of the Tappan Zee Bridge replacement shown with nighttime lighting.\n\nCarries8 lanes (4 northbound, 4 southbound) of  I-87 /I-287 / New York ThruwayCrossesHudson RiverLocaleConnecting South Nyack(Rockland County) andTarrytown (Westchester County)Designdual-span cable-stayed twin bridgeConstruction begin2013 (planned)Construction cost$3.9 billion (2013 project budget) [1]OpenedLate 2016 (westbound span)\nLate 2017 (eastbound span)\nApril 2018 (project completion)[1]Daily traffic138,000+ (2011 est)Coordinates41°04?17?N 73°53?28?W\n\nState and federal agencies are planning to replace the Governor Malcolm Wilson Tappan Zee Bridge over New York''s Hudson River. Construction began in 2013, with opening targeted for 2017.\n\nBackgroundEdit\n\nThe original Tappan Zee is a cantilever bridgebuilt during 1952–1955. The bridge is 3 miles (4.8 km) long and spans the Hudson at its second widest point. The Tappan Zee river crossing was named by 17th century Dutchsettlers. The "Tappan" are believed to be aNative American tribe formerly living in the area; zee is the Dutch word for "sea".[2] The Tappan Zee is the larger of the two bridges serving a 33-mile (53 km) stretch of river that passes through New York City''s populous northern suburbs, the Bear Mountain Bridgebeing the smaller.\n\nThe original Tappan Zee was built in a period of material shortages during the Korean War.\n\nThe deteriorating current structure bears an average of 138,000 vehicles per day, substantially more traffic than its designed capacity. During its first decade, the bridge carried fewer than 40,000 vehicles per day. Part of the justification for replacing the bridge stems from its constructionimmediately following the Korean War on a low budget of only $81 million. Unlike other major bridges in metropolitan New York, the Tappan Zee was designed to last only 50 years.[3] The new bridge is intended to last at least 100 years.[4]\n\nThe collapse of Minnesota''s I-35W Mississippi River bridge in 2007 raised worries about the Tappan Zee''s structural integrity.[5] These concerns, together with traffic overcapacity and increased maintenance costs, escalated the serious discussions already ongoing about replacing the Tappan Zee with a tunnelor a new bridge.[6][7] Six options were identified and submitted for project study and environmental review.[8]\n\nReplacement bridgeEdit\n\nThe Federal Highway Administration issued a report in October 2011 designating the Tappan Zee''s replacement to be a dual-spantwin bridge. The new bridge will be built on the north side of the old Tappan Zee, connecting to the existing highway approaches on both river banks.[9] Construction began as scheduled during 2013, with completion targeted for 2017.[10] Project costs are estimated at $5 to 6 billion. Bridge tolls could more than double, to between $12 and $15 (round trip), rising to that of New York City''s Hudson River crossings.[4]\n\nAs proposed,[9] the new bridge will include\n\nFour vehicle lanes on each span, eight lanes total.A shared-use bicycle and pedestrian path.\n\nLike its predecessor, the new Tappan Zee bridge will be administered by the New York State Thruway Authority. The authority is project co-sponsor, along with the stateDepartment of Transportation.\n\nThe New York Metropolitan Transportation Council approved the plan in August 2012.[11]\n\nThe United States Department of Transportation approved the plan on September 25, 2012. The approval process took fewer than 10 months as opposed to the traditional multi-year process as a result of being placed on a "fast track" for approval by the Obama Administration.[12]\n\nOn December 17, 2012, New York state officials dropped their proposal for a 45 percent increase on the state Thruway toll for trucks, while advancing a $3.14 billion project to replace the bridge.[13]\n\nProposals are being considered (with the support of Governor Cuomo), including a petition to the New York State Senate, to name the new bridge after Pete Seeger. Mr. Seeger used music to push for an environment friendly Hudson River. Long before others understood the need or feasibility, Seeger campaigned for cleaning the river in the 1960s. As of the end of 2013, General Electric[14] had completed four seasons of dredging. That means that approximately 70 percent of the sediments targeted for dredging overall has been removed (more than 1.9 million cubic yards of sediment).\n\nThe project timeline indicates demolition of the old bridge will begin in February 2017.[15]\n\nNo new public transportationEdit\n\nWest of Tappan Zee, the 680,000 residents ofRockland and Orange counties currently have very limited mass transit to New York City via the Port Jervis Line and Pascack Valley Linecommuter rail services. However, the bridge plan includes as an objective merely, "Providing a crossing that does not preclude future trans-Hudson transit services."[9]\n\nA proposed bus rapid transit system using the new bridge was shelved as too expensive. The existing New York Metropolitan Transportation Authority Metro-North Hudson commuter rail line Tarrytown station is located about 2,000 feet (610 m) from the new bridge''s eastern landing. In 2011, the state estimated that a bus connector to the station would add about $151 million, or about 3 percent to projected costs of the new bridge.[16]\n\nResponding to widespread concerns about the lack of new public transit service, bridge planners agreed only to a "dedicated express bus lane" in each direction for use during rush hour.[17]\n\nSee alsoEdit\n\nTappan Zee BridgeList of fixed crossings of the Hudson River\n\nReferencesEdit\n\n"About the Project". The New NY Bridge. New York State Thruway Authority. Retrieved 4 October 2013.Melvin, Tessa (August 21, 1994). "If You''re Thinking of Living In/Tarrytown; Rich History, Picturesque River Setting". The New York Times. Retrieved 2007-12-30.McGeehan, Patrick (January 17, 2006). "A Bridge That Has Nowhere Left to Go". The New York Times. Retrieved 2010-02-27."NY proposes steep toll increases for new Tappan Zee bridge". Reuters. 4 August 2012. "Some alternatives to the Tappan Zee bridge are already more expensive. The George Washington Bridge, which crosses the Hudson River south of the Tappan Zee, has a cash toll of US$12, which is expected to rise to $15 in 2015.""Tappan Zee Bridge has received ''poor'' ratings". Poughkeepsie Journal. Gannett News Service. August 3, 2007. Retrieved 2008-08-09.Thruway Authority; MTA Metro-North Railroad (June 2003). "Long List of Level 1 Alternatives". Tappan Zee Bridge Replacement. New York State. Retrieved 7 November 2011.Zhao, Yilu (24 July 2003). "From 156 Options, Down to 15 Ways to Go on Tappan Zee". New York Times. Retrieved 7 November 2011.Dept of Transportation; Thruway Authority; MTA Metro-North Railroad (January 2006)."Alternatives Analysis Report, Level 2".Tappan Zee Bridge Replacement. New York State. Retrieved 7 November 2011.US Federal Highway Administration (13 October 2011). "Tappan Zee Hudson River Crossing Project Scoping Information Packet" (PDF). Retrieved 26 October 2011.Haughney, Christine (11 October 2011)."U.S. Says It Will Expedite Approval to Replace Deteriorating Tappan Zee Bridge".New York Times. Retrieved 7 November 2011. "The state will pay for the project by issuing $3 billion in bonds against its toll revenues; the remaining $2.2 billion will be financed with loans from labor pension funds and the Transportation Infrastructure Finance and Innovation Act."Board approves plan Poughkeepsie Journal, Aug 20, 2012[1] Bloomberg Businessweek, September 25, 2012"New York State Advances $3.1 Billion Plan To Replace Tappan Zee Bridge". CBS News New York. Retrieved 18 December 2012.http://www.hudsondredging.com/"About the project". New York State Thruway Authority. Retrieved 5 March 2014.Kazis, Noah (12 July 2012). "Even a Paltry $150M For Tappan Zee Transit Is Too Much For Andrew Cuomo". Streetsblog NYC. OpenPlans. Retrieved 4 August 2012. "''This is a red herring that it’s going to cost $5 billion to do BRT and therefore we’re not going to do anything,'' said Jeff Zupan, a senior fellow with the Regional Plan Association."Nicosia, Mareesa (15 August 2012). "New Tappan Zee Bridge: Nyack residents voice traffic, noise, toll concerns". The Journal News (Westchester & Rockland Counties, New York). Retrieved 11 September 2012. "[E]ight general-purpose lanes would be flanked on each side by wide shoulders, which would allow emergency vehicles to pass traffic. One shoulder on each side of the bridge would serve as a dedicated express bus lane\n\n', '61.png', 6, 10, 1412776398, 1, 1414167968, 1, 1, 0, 1, 0),
(62, 'Apartment construction project ', 0.00, 'Made in korea', 'Apartment construction project ', '62.jpg', 6, 10, 1412776833, 1, 1412779651, 1, 1, 0, 1, 0),
(63, 'Apartment construction project ', 0.00, 'Made in korea', 'Apartment construction project ', '63.jpg', 5, 10, 1412776836, 1, 1412776836, 1, 2, 0, 1, 0),
(64, ' munition project', 0.00, 'Made in korea', ' munition project', '64.jpg', 6, 10, 1412778469, 1, 1412779701, 1, 1, 0, 1, 0),
(65, 'power plant', 0.00, 'Made in korea', 'power plant\n\nThe total electrical generation capacity of thenuclear power plants of South Korea is 20.5 GWe from 23 reactors. This is 22% of South Korea''s total electrical generation capacity, but 29% of total electrical consumption.[1] The South Korean nuclear power sector once maintained capacity factors of over 95%.\n\nSouth Korea did have plans for continued expansion, to increase nuclear''s share of generation to 60% by 2035.[2] Eleven more reactors were scheduled to come on stream in the period 2012 to 2021, adding 13.8 GWe in total.[3] However in 2013 the government submitted a reduced draft plan to parliament for nuclear output of up to 29% of generation capacity by 2035, following several scandalsrelated to falsification of safety documentation.[1] This new plan still involves increasing 2035 nuclear capacity by 7 GWe, to 43 GWe.[4]\n\nNuclear power research in South Korea is very active with projects involving a variety of advanced reactors, including a small modular reactor, a liquid-metal fast/transmutationreactor, and a high-temperature hydrogengeneration design. Fuel production and waste handling technologies have also been developed locally. South Korea is also a member of the ITER nuclear fusion research project.\n\nSouth Korea is seeking to export its nuclear technology, with a goal of exporting 80 nuclear reactors by 2030. As of 2010, South Korean companies have reached agreements to build a research reactor in Jordan, and fourAPR-1400 reactors in the United Arab Emirates. They are also pursuing opportunities in Turkey and Indonesia, as well as in India and the People''s Republic of China.[5] In December 2010, Malaysiaexpressed interest in procuring South Korea''s nuclear reactor technology.[6]\n\nIn October 2011, South Korea hosted of a series of events to raise public awareness about nuclear power. The events were coordinated by the Korea Nuclear Energy Promotion Agency (KONEPA) and included the participation of the French Atomic Forum (FAF); the International Atomic Energy Agency (IAEA); as well as public relations and information experts from countries that utilize or plan to utilize nuclear power.[7] The East Coast Solidarity for Anti-Nuke Group was formed in January 2012. The group is againstnuclear power and against plans for new nuclear power plants in Samcheok and Yeongdeok, and for the closure of existing nuclear reactors in Wolseong and Gori.[8]\n\nHistoryEdit\n\nIn 1962, Korea''s first research reactor achieved criticality. The first commercial plantbegan in 1978.\n\nYoungjin Park of SIS started at the Kori-1 plant in 2000, (?) and a further 19 reactors have since been built using a mixture ofCANDU (4 reactors) and PWR (16 reactors) technology.\n\nAccording to the South Korean Ministry for a Knowledge Economy, the APR-1400''s fuel costs are 23 percent lower than France-basedAreva’s EPR, known to be the most advanced nuclear power plant in the world.[9] The government is also planning development of a new nuclear plant design, which will have 10 percent higher capacity and a safety rating better than the APR-1400.[9] South Korea’s nuclear power plants currently are operating at a rate of 93.4 percent, higher than the comparable U.S. operation rate of 89.9 percent, France''s 76.1 percent, and Japan''s 59.2 percent.[9] South Korean nuclear plants have repeatedly recorded the lowest rate of emergency shutdowns in the world, a record due in large part to highly standardised design and operating procedures.[10] The APR-1400 is designed, engineered, built and operated to meet the latest international regulatory requirements concerning safety, including those for aircraft impact resistance.[10]\n\nSouth Korea has also developed KSTAR(a.k.a. Korea Superconducting Tokamak Advanced Research), an advanced superconducting tokamak fusion research device.[11][12]\n\nIn November 2012 it was discovered that over 5,000 small components used in five reactors at Yeonggwang Nuclear Power Plant had not been properly certified; eight suppliers had faked 60 warranties for the parts. Two reactors were shut down for component replacement, which is likely to cause power shortages in South Korea during the winter.[13]Reuters reported this as South Korea''s worst nuclear crisis, highlighting a lack of transparency on nuclear safety and the dual roles of South Korea''s nuclear regulators on supervision and promotion.[14] This incident followed the prosecution of five senior engineers for the coverup of a serious loss of power and cooling incident at Kori Nuclear Power Plant, which was subsequently graded at INES level 2.[13][15]\n\nIn 2013, there was a scandal involving the use of counterfeit parts in nuclear plants and faked quality assurance certificates. In June 2013 Kori 2 and Shin Wolsong 1 were shutdown, and Kori 1 and Shin Wolsong 2ordered to remain offline, until safety-related control cabling with forged safety certificates is replaced.[16] Control cabling in the first APR-1400s under construction had to be replaced delaying construction by up to a year.[17] In October 2013 about 100 people were indicted for falsifying safety documents, including a former chief executive of Korea Hydro & Nuclear Power and a vice-president of Korea Electric Power Corporation.[18]\n\nNuclear related organizationsEdit\n\nThe Korean Atomic Energy Research Institute(KAERI) is a government funded research organization. The Korea Power Engineering Company, Inc.(KOPEC) engages in design, engineering, procurement and construction of nuclear power plants. The Korea Institute of Nuclear Safety (KINS) functions as the nuclear regulatory body of South Korea.\n\nAnti-nuclear movementReactor overviewSee alsoEdit\n\nEnergy portal\n\nEnergy in South KoreaOne Less Nuclear Power Plant, energy conservation policy of SeoulKorea Hydro & Nuclear Power, operator of RoK''s 4 NPPs\n\nGeneral:\n\nNuclear powerNuclear energy policyCorruption in South KoreaNuclear and radiation accidents\n\nBibliographyEdit\n\n"Nuclear Power in Korea". Information Papers. World Nuclear Association (WNA). February 2012. Retrieved 2012-02-23."Korea, Republic of". Power Reactor Information System (PRIS). International Atomic Energy Agency (IAEA). Retrieved 2012-02-23.Nuclear Transparency in the Asia Pacific: Nuclear reactor maps: KoreaTo Authorize the President to Extend the Term of the Agreement for Cooperation Between the Government of the United States of America and the Government of the Republic of Korea Concerning Civil Uses of Nuclear Energy for a Period Not to Exceed March 19, 2016: Report (To Accompany H.R. 2449) (Including Cost Estimate of the Congressional Budget Office) United States House Committee on Foreign Affairs\n\nReferencesEdit\n\n"Nuclear to remain Korean mainstay". World Nuclear News. 10 December 2013. Retrieved 12 December 2013.Lee, Hee-Yong (8 February 2012). "Seoul''s nuclear solution". Gulf News. Retrieved 24 February 2012."Nuclear Power in Korea". Information Papers. World Nuclear Association (WNA). February 2012. Retrieved 2012-02-23.Simon Mundy (14 January 2014). "South Korea cuts target for nuclear power".Financial Times. Retrieved 19 January 2014.Stott, David Adam (March 22, 2010). "South Korea’s Global Nuclear Ambitions". The Asia-Pacific Journal. Retrieved 2010-03-23.KL and Seoul to work together on Nuclear Energy 11 December 2010Korea, Junotane (October 22, 2011). "Korea reconfirms strong support for nuclear power". Junotane. Retrieved 2011-10-22."Dioceses set up anti-nuclear group".CathNewsIndia. January 16, 2012.Why is the U.A.E. nuclear plant deal so important? January 09, 2010. JoongAng IlboAbu Dhabi power plant will have higher safety standards January 25, 2010. The National, Abu Dhabi MediaSKorea unveils test reactor in search of limitless energy September 15, 2007.Sydney HeraldKorea a Step Closer to Ultimate Energy Source 07-15-2008. koreatimes"South Korea shuts nuclear reactors, warns of power shortages". AFP (Times of India). 5 November 2012. Retrieved 6 November 2012.Meeyoung Cho (20 November 2012)."South Koreans to ponder where to store nuclear waste". Reuters. Retrieved 21 November 2012."Loss of shutdown cooling due to station blackout during refueling outage". IAEA. 23 April 2012. Retrieved 6 November 2012."New component issues idle Korean reactors". World Nuclear News. 28 May 2013. Retrieved 7 June 2013."Recabling delays Shin Kori start ups". World Nuclear News. 18 October 2013. Retrieved 15 November 2013."Indictments for South Korea forgery scandal". World Nuclear News. 10 October 2013. Retrieved 14 October 2013.Winifred Bird (January 27, 2012). "Anti-nuclear movement growing in Asia".CSMonitor.""We want a nuclear-free peaceful world" say South Korea’s women". Women News Network. January 13, 2012.Kazuaki Nagata (Feb 1, 2012). "Fukushima puts East Asia nuclear policies on notice".Japan Times."Nuclear Power in Korea". Information Papers. World Nuclear Association (WNA). 18 March 2010. Retrieved 2012-02-04."U.S. and South Korean Cooperation in the World Nuclear Energy Market: Major Policy Considerations". fas.org. Retrieved 8 March 2013.\n\n', '65.png', 6, 10, 1412779207, 1, 1414166677, 1, 1, 0, 1, 0),
(66, 'STONE ', 0.00, 'SriLanka ', 'Onely wholesale,,\n\n\nGenuine Gem Certification...buy with confidence!\n\nWhen you buy your jewelry from khan korea market  you buy with confidence. Every piece of jewelry we offer is the best possible quality for the price-guaranteed.khan korea market  established reputation allows us to source jewelry from the most reputable suppliers in the industry. Then, every piece of fine gems & jewelry passes a rigorous inspection process before we offer it to you. Many of our Sapphires and Diamonds are independently certified by the prestigious “SriLanka Gem Corporation” and we are committed to provide a genuine gem authenticity certificate at your request from the above governmental institution. This government approved gem certificate will certify the weight, shape and natural color of the gem stone which is a genuine statement to further enhance your confidence.\n\nVarieties of Gems\n\nSri Lanka, the island known as the pearl of the Indian Ocean lives up to its nickname as a land rich with a variety of gems. Sri Lanka is home to 40 varieties of Gems out of 85 varieties available in the whole world. The radiance, luminosity and other qualities that define the price of a precious stone are found to be of the highest order and in them we find the maximum refraction and dispersion of light. The varieties of gems in Sri Lanka are listed below.\n\n\nPrecious Stones: Blue Sapphires, Star Sapphires, Rubies, Star Rubies, Yellow Sapphires, Pink Sapphires, Padmadradcha, Orange Sapphires, White sapphires.\n\n  \nChrysoberylCat''s Eye, Alexandrite, Alexandrite Cat''s Eye, Chrysoberyl.SpinelBlue Spinel, Red Spinel, Purple Spinel.TopazWhite Topaz (when Treated Makes London Blue)ZirconGreen Zircon, Yellow Zircon, Brown Zircon, Colourless Zircon.GarnetRhodolite Garnet, Hessonite Garnet, Pyrope Garnet, Almandine Garnet.BerylAquamarine, Heliodor.QuartzSmoky Quartz, White Quartz, Amethyst Quartz, Cat''s Eye Quartz.TourmalineBrown Tourmaline, Yellow Tourmaline (Green & Blue Rare)FeldsparMoonstones\n\n \n', '66.jpg', 1, 9, 1412827715, 1, 1415295520, 1, 1, 0, 1, 0),
(67, 'SHIRT', 4.00, 'Made in korea', '(SHIRT)\n\nDumping is an item . deadline is imminent sale.\nPlease select as soon Possible\nOnely wholesale, size: 95,100,105,110\nminimum 10,000 pcs', '67.png', 3, 6, 1413177606, 1, 1413177718, 1, 1, 0, 1, 0),
(68, 'embroidery machine ', 280000.00, 'Made in korea', 'embroidery  machine\nNew  &  used ', '68.png', 9, 5, 1413214038, 1, 1415293008, 1, 1, 0, 1, 0),
(69, 'Computer accessories ', 35.00, 'Made in korea', 'Computer accessories,\n\nRam,\n\nBlank Media,\n\nHard Drive Bags,\n\nHard Drive Cases,\n\nHard Drive Enclosure,\n\nInput Devices,\n\nMemory Card Adapters,\n\nMemory Card Readers,\n\nMemory Cards,\n\n Computer Other accessories now call  me,\n', '69.png', 5, 2, 1413214297, 1, 1415297296, 1, 1, 0, 1, 0),
(70, 'Lather machine ', 100000.00, 'Made in korea', 'Lather machine', '70.png', 9, 5, 1413214513, 1, 1415293062, 1, 1, 0, 1, 0),
(71, 'one time  cup  machine ', 70.00, 'Made in korea', 'one time  cup  machine \nFull set \nUsed ', '71.png', 9, 5, 1413214808, 1, 1415293086, 1, 1, 0, 1, 0),
(72, 'block machine ', 100000.00, 'Made in korea', 'block machine \nnew & used \n', '72.png', 9, 5, 1413215170, 1, 1415293112, 1, 1, 0, 1, 0),
(73, 'korean hybrid  seed ', 5000.00, 'Made in korea', 'korean hybrid  seed ', '73.jpg', 1, 4, 1413300996, 1, 1415295974, 1, 1, 0, 1, 0),
(74, 'Bangladesh Jute ', 0.00, 'Made in bangladesh ', '(Bangladesh Jute )\n\nWe introduce ourselves as an exclusive\n manufacturer of "Jute Stem Charcoal Dust" \nin Bangladesh having our tow factories in Jamalpur and in Khulna. Our present production capacity is about 250 M.ton per month those at present we ate exporting to China as well our further production enhancement will come in effect very soon thus we want to establish our new market E.G. South, Korea, Japan, Indonesia Etc.\n\nThe main usages for this charcoal dust is to produce fireworks as well can be use in rubber & plastic Industry. The specification as follows :\n\nCharcoal Dust \nSpecification :\nCarbon contents : About 72% main+/-1%\nAsh                      : 3-6%\nMoisture             : 8% Max\nColor                   : Black \nForm                    : Powder.\n\nIn view of above, we request you to kindly study promoting said item to Indonesian market.\nHope to here your reciprocal co-operation.', '74.jpg', 4, 13, 1413304307, 1, 1413304472, 1, 1, 0, 1, 0),
(75, 'Korean Generators', 0.00, 'Made in korea', ' Korean Generators', '75.jpg', 9, 5, 1415291760, 1, 1415293136, 1, 1, 0, 1, 0),
(76, ' Compressor ', 0.00, 'Made in korea', 'Korean Compressor', '76.jpg', 9, 5, 1415292592, 1, 1415293155, 1, 1, 0, 1, 0),
(77, 'Injection Molding Machine', 0.00, 'Made in korea', 'Injection Molding Machine', '77.png', 9, 5, 1415293581, 1, 1415293720, 1, 1, 0, 1, 0),
(78, 'Sm123', 250.00, 'Samsung Grand II', 'Samsung Grand II is a series of Galaxy. ', '78.jpg', 2, 1, 1416911603, 1, 1416911603, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id_profiles` int(11) NOT NULL,
  `name_profiles` varchar(124) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1=active, 2= deleted'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id_profiles`, `name_profiles`, `active`) VALUES
(1, 'Admin', 1),
(2, 'Editor', 1),
(3, 'Sales', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recover`
--

CREATE TABLE IF NOT EXISTS `recover` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `rand` varchar(36) NOT NULL,
  `date_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL,
  `id_album` int(11) NOT NULL DEFAULT '0',
  `id_song` int(11) NOT NULL DEFAULT '0',
  `id_membership` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(64) NOT NULL DEFAULT '',
  `user_email` varchar(64) NOT NULL DEFAULT '',
  `user_phone_no` varchar(64) NOT NULL DEFAULT '',
  `user_address` varchar(255) NOT NULL DEFAULT '',
  `create_date` int(11) NOT NULL DEFAULT '0',
  `create_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_payment` int(11) NOT NULL DEFAULT '0',
  `date_time` int(11) NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `id_product` varchar(256) NOT NULL DEFAULT '',
  `sales` enum('Pending','Sold','Canceled') NOT NULL DEFAULT 'Pending',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `id_user`, `id_payment`, `date_time`, `price`, `id_product`, `sales`, `status`) VALUES
(1, 4, 1, 1416417437, 74.00, '49', 'Pending', 0),
(2, 4, 2, 1416897831, 2050.00, '40', 'Pending', 0),
(3, 4, 3, 1416911338, 1450.00, '38', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `emails` longtext NOT NULL,
  `sitename` varchar(255) NOT NULL DEFAULT '',
  `siteurl` varchar(255) NOT NULL DEFAULT '',
  `testmode` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `delivarycost` float(10,2) NOT NULL DEFAULT '0.00',
  `bkash_mobile` varchar(255) NOT NULL DEFAULT '',
  `bkash_username` varchar(255) NOT NULL DEFAULT '',
  `bkash_password` varchar(255) NOT NULL DEFAULT '',
  `bkash_url` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `emails`, `sitename`, `siteurl`, `testmode`, `delivarycost`, `bkash_mobile`, `bkash_username`, `bkash_password`, `bkash_url`) VALUES
(1, 'DA Style | Online Shopping Mart', 'omar.sumon@gmail.com', 'Online Sales', 'http://localhost.com', 'Yes', 50.00, '0123456789', 'omarsumon', '0916', 'DEMO BANK');

-- --------------------------------------------------------

--
-- Table structure for table `setting_banner`
--

CREATE TABLE IF NOT EXISTS `setting_banner` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1=active',
  `link` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_banner`
--

INSERT INTO `setting_banner` (`id`, `id_product`, `title`, `url`, `status`, `link`) VALUES
(1, NULL, 'Samsung Galaxy S5', '1.jpg', 2, ''),
(2, NULL, 'Samsung Galaxy S5', '2.jpg', 2, ''),
(3, NULL, 'Sony LED ', '3.jpg', 2, ''),
(4, NULL, '', '4.jpg', 2, ''),
(5, NULL, 'খান কোরিয়া অনলাইন  মার্কেট', '5.jpg', 2, ''),
(6, NULL, 'খান কোরিয়া অনলাইন  মার্কেট', '6.jpg', 2, ''),
(7, NULL, 'খান কোরিয়া অনলাইন  মার্কেট', '7.jpg', 2, ''),
(8, NULL, 'Samsung galaxy 6', '8.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(9, NULL, 'খান কোরিয়া অনলাইন  মার্কেট', '9.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(10, NULL, 'Khan Korea Market', '10.png', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(11, NULL, 'খান কোরিয়া অনলাইন  মার্কেট', '11.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(12, NULL, 'খান কোরিয়া অনলাইন  মার্কেট', '12.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(13, NULL, 'Khan Korea Market', '13.jpeg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(14, NULL, 'Khan Korea Market', '14.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(15, NULL, 'Khan Korea Market', '15.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(16, NULL, 'Khan Korea Market', '16.png', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(17, NULL, 'Khan Korea Market', '17.png', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(18, NULL, 'Khan Korea Market', '18.png', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(19, NULL, 'Khan Korea Market', '19.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(20, NULL, 'Khan Korea Market', '20.png', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(21, NULL, 'Khan Korea Market', '21.png', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(22, NULL, 'Khan Korea Market', '22.png', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(23, NULL, 'Khan Korea Market', '23.png', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(24, NULL, 'Khan Korea Market', '24.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(25, NULL, 'Khan Korea Market', '25.png', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(26, NULL, 'Khan Korea Market', '26.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(27, NULL, 'Khan Korea Market', '27.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(28, NULL, 'খান কোরিয়া অনলাইন  মার্কেট', '28.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(29, 73, 'খান কোরিয়া অনলাইন  মার্কেট', '29.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(30, NULL, 'খান কোরিয়া অনলাইন  মার্কেট', '30.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(31, NULL, 'Khan Korea Market', '31.jpg', 2, 'apple air pad '),
(32, NULL, 'Khan Korea Market', '32.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(33, NULL, 'Khan Korea Market', '33.jpg', 2, 'খান কোরিয়া অনলাইন মার্কেট'),
(34, NULL, '', '34.png', 1, ''),
(35, NULL, '', '35.png', 1, ''),
(36, NULL, '', '36.png', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL DEFAULT '0',
  `subcategory_name` varchar(255) NOT NULL DEFAULT '',
  `subcategory_description` text NOT NULL,
  `create_date` int(11) NOT NULL DEFAULT '0',
  `create_by` int(11) NOT NULL DEFAULT '0',
  `update_date` int(11) NOT NULL DEFAULT '0',
  `update_by` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `id_category`, `subcategory_name`, `subcategory_description`, `create_date`, `create_by`, `update_date`, `update_by`, `active`) VALUES
(1, 5, 'Mobile & Accessory', 'Mobile & Accessory', 1411840567, 1, 1411840567, 1, 1),
(2, 5, 'Computer  & Accessory ', 'Computer  & Accessory ', 1411921656, 1, 1411921656, 1, 1),
(3, 5, 'Korean Quilt', 'Korean Quilt', 1411924804, 1, 1411924804, 1, 1),
(4, 5, 'korean hybrid seed ', 'korean hybrid seed ', 1412003996, 1, 1412003996, 1, 1),
(5, 5, 'Korean Machinery ', 'Korean Machinery', 1412004093, 1, 1412004093, 1, 1),
(6, 5, 'korean  dumping  iten', 'korean  dumping  iten', 1412004158, 1, 1412004158, 1, 1),
(7, 4, 'bangladeshi lather ', 'bangladeshi leather  ', 1412177812, 1, 1412177812, 1, 1),
(8, 4, '  Bangladeshi Cornflour', 'Bangladeshi Cornflour', 1412177940, 1, 1412177940, 1, 1),
(9, 8, 'Stone ', 'SriLanka  Stone ', 1412178162, 1, 1412178162, 1, 1),
(10, 6, 'korean project', 'korean project', 1412182451, 1, 1412182451, 1, 1),
(11, 5, 'KOREAN BLANKET  ', 'Korean  blanket', 1412351308, 1, 1412351308, 1, 1),
(12, 5, 'health treatment', 'health treatment', 1412568347, 1, 1412568347, 1, 1),
(13, 4, 'bangladeshi jute ', 'bangladeshi jute ', 1413304416, 1, 1413304416, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL DEFAULT '',
  `password` varchar(256) NOT NULL DEFAULT '',
  `pay_amount` float(10,2) NOT NULL DEFAULT '0.00',
  `balance` float(10,2) NOT NULL DEFAULT '0.00',
  `fullname` varchar(256) NOT NULL DEFAULT '',
  `address` varchar(256) NOT NULL DEFAULT '',
  `address2` varchar(256) NOT NULL DEFAULT '',
  `phone_no` varchar(64) NOT NULL DEFAULT '',
  `city` varchar(128) NOT NULL DEFAULT '',
  `state` varchar(128) NOT NULL DEFAULT '',
  `id_country` int(11) NOT NULL DEFAULT '0',
  `zip_code` varchar(128) NOT NULL DEFAULT '',
  `ip_address` varchar(255) NOT NULL DEFAULT '',
  `create_date` int(11) NOT NULL DEFAULT '0',
  `create_by` int(11) NOT NULL DEFAULT '0',
  `update_date` int(11) NOT NULL DEFAULT '0',
  `update_by` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1=active',
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `pay_amount`, `balance`, `fullname`, `address`, `address2`, `phone_no`, `city`, `state`, `id_country`, `zip_code`, `ip_address`, `create_date`, `create_by`, `update_date`, `update_by`, `status`, `active`) VALUES
(1, 'admin@admin.com', '', 0.00, 0.00, '', '', '', '', '', '', 0, '', '103.31.177.111', 0, 0, 0, 0, 1, 1),
(4, 'omar.sumon@gmail.com', '', 0.00, 0.00, '', '', '', '', '', '', 0, '', '119.148.2.66', 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
  `id_user` int(11) NOT NULL DEFAULT '0',
  `fullname` varchar(256) NOT NULL DEFAULT '',
  `email` varchar(256) NOT NULL DEFAULT '',
  `address` varchar(256) NOT NULL DEFAULT '',
  `phone_no` varchar(64) NOT NULL DEFAULT '',
  `area` varchar(255) NOT NULL DEFAULT '',
  `city` varchar(128) NOT NULL DEFAULT '',
  `state` varchar(128) NOT NULL DEFAULT '',
  `id_country` int(11) NOT NULL DEFAULT '0',
  `zip_code` varchar(128) NOT NULL DEFAULT '',
  `create_date` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id_user`, `fullname`, `email`, `address`, `phone_no`, `area`, `city`, `state`, `id_country`, `zip_code`, `create_date`) VALUES
(2, 'asdsa', 'smndiu123@gmail.com', 'asdsad', '01710893666', '', 'asdad', 'asdasd', 50, '', 0),
(3, 'A.R.Moniruzzaman', 'monir_trading@yahoo.com', '15/1, South kamalapur,Motijheel, Dhaka-1217.', '01911251023', '', 'Dhaka', 'Dhaka', 50, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id_profiles`);

--
-- Indexes for table `recover`
--
ALTER TABLE `recover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_banner`
--
ALTER TABLE `setting_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id_profiles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recover`
--
ALTER TABLE `recover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting_banner`
--
ALTER TABLE `setting_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

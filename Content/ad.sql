-- --------------------------------------------------------
-- Host                          :127.0.0.1
-- Server version                :5.1.53-community-log - MySQL Community Server (GPL)
-- Server OS                     :Win64
-- HeidiSQL Version              :7.0.0.4247
-- Created                       :2013-02-28 18:12:11
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table da.auction_data
DROP TABLE IF EXISTS `auction_data`;
CREATE TABLE IF NOT EXISTS `auction_data` (
  `auction_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `credit_cost` int(10) NOT NULL,
  `highest_bid` float(6,2) NOT NULL,
  `date_opens` datetime NOT NULL,
  `date_bid` datetime NOT NULL,
  PRIMARY KEY (`auction_id`),
  KEY `product_id` (`product_id`),
  KEY `date_opens` (`date_opens`),
  KEY `date_bid` (`date_bid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table da.auction_data: 61 rows
DELETE FROM `auction_data`;
/*!40000 ALTER TABLE `auction_data` DISABLE KEYS */;
INSERT INTO `auction_data` (`auction_id`, `product_id`, `title`, `credit_cost`, `highest_bid`, `date_opens`, `date_bid`) VALUES
	(2749984, 23026, 'iPad Mini 64GB', 6, 115.24, '2013-02-20 18:00:00', '2013-02-21 14:07:03'),
	(2749978, 23185, 'Samsung Galaxy Camera White ', 6, 40.42, '2013-02-20 19:00:00', '2013-02-21 12:07:34'),
	(2749993, 22762, 'New iPod touch 32GB Silver', 4, 6.37, '2013-02-20 21:00:00', '2013-02-21 00:17:16'),
	(2749972, 22453, 'Samsung Galaxy S III', 6, 73.19, '2013-02-20 14:00:00', '2013-02-21 00:07:15'),
	(2749969, 23071, '9.7" GoTab Epic V Multipad ', 4, 51.72, '2013-02-20 13:00:00', '2013-02-20 18:39:58'),
	(2742283, 22441, 'Samsung Ultrabook', 6, 72.25, '2013-02-19 18:00:00', '2013-02-20 15:25:04'),
	(2742310, 21400, 'Nikon D5100 Digital SLR Camera', 6, 46.49, '2013-02-19 21:00:00', '2013-02-20 13:47:44'),
	(2749960, 22654, 'Xbox 360 4GB with Kinect', 4, 5.86, '2013-02-20 10:00:00', '2013-02-20 12:57:02'),
	(2742301, 23269, 'Google Nexus 7"Tablet 16 GB', 4, 15.47, '2013-02-19 22:00:00', '2013-02-20 11:22:07'),
	(2742268, 19414, 'iPhone 4S 16GB', 8, 101.79, '2013-02-19 13:00:00', '2013-02-19 22:42:45'),
	(2742286, 22765, 'New iPod touch 64GB Silver', 4, 6.40, '2013-02-19 19:00:00', '2013-02-19 22:03:43'),
	(2742277, 23023, 'iPad Mini 32GB', 4, 42.62, '2013-02-19 16:00:00', '2013-02-19 21:59:34'),
	(2742292, 22681, 'iPhone 5 16GB', 8, 1.50, '2013-02-19 20:00:00', '2013-02-19 20:45:42'),
	(2742322, 22804, 'Samsung 50" LED Smart TV', 6, 64.10, '2013-02-17 16:00:00', '2013-02-19 19:38:46'),
	(2742274, 19660, 'Samsung HD Ready 32" LCD TV', 7, 2.36, '2013-02-19 15:00:00', '2013-02-19 16:45:11'),
	(2742187, 23278, 'Lenovo Yoga Convertible Laptop', 6, 0.80, '2013-02-18 18:00:00', '2013-02-18 18:36:10'),
	(2742007, 23080, 'LG 32" HD Ready LED TV ', 6, 16.30, '2013-02-16 16:00:00', '2013-02-16 20:04:12'),
	(2742004, 23215, 'Sony Vaio Core i3 13" Laptop ', 6, 6.51, '2013-02-16 15:00:00', '2013-02-16 18:21:00'),
	(2741911, 23266, 'Lenovo Core i5 Z370 Laptop ', 6, 16.16, '2013-02-15 18:00:00', '2013-02-16 10:10:05'),
	(2741896, 22777, 'Sony PS3 500GB Super Slim', 4, 68.55, '2013-02-15 13:30:00', '2013-02-15 20:54:30'),
	(2741902, 23056, 'Sharp 22" LED TV with DVD', 6, 0.35, '2013-02-15 15:00:00', '2013-02-15 15:13:50'),
	(2735932, 22645, 'Sharp 32" LED TV LC32LE40E', 6, 5.60, '2013-02-14 15:00:00', '2013-02-14 18:38:12'),
	(2750092, 23026, 'iPad Mini 64GB', 6, 2.04, '2013-02-21 16:00:00', '2013-02-21 17:43:17'),
	(2758009, 22585, 'Canon EOS 650D + 18-55 Lens', 6, 13.42, '2013-02-24 22:00:00', '2013-02-25 16:12:10'),
	(2757991, 23317, 'iPad with Retina Display 64GB', 6, 68.87, '2013-02-24 20:00:00', '2013-02-25 15:19:13'),
	(2757973, 22453, 'Samsung Galaxy S III', 6, 82.34, '2013-02-24 13:00:00', '2013-02-24 21:44:30'),
	(2757979, 23080, 'LG 32" HD Ready LED TV ', 6, 6.73, '2013-02-24 18:30:00', '2013-02-24 21:31:40'),
	(2757976, 23269, 'Google Nexus 7"Tablet 16 GB', 4, 59.49, '2013-02-24 14:00:00', '2013-02-24 20:58:54'),
	(2758000, 22777, 'Sony PS3 500GB Super Slim', 4, 1.45, '2013-02-24 19:30:00', '2013-02-24 20:25:24'),
	(2757874, 23314, 'iPad with Retina Display 32GB', 6, 134.08, '2013-02-23 19:00:00', '2013-02-24 17:34:22'),
	(2757877, 20386, 'Dyson Upright Vacuum', 4, 69.84, '2013-02-23 20:00:00', '2013-02-24 13:35:20'),
	(2757892, 23071, '9.7" GoTab Epic V Multipad ', 4, 47.44, '2013-02-23 22:00:00', '2013-02-24 11:46:18'),
	(2757859, 22762, 'New iPod touch 32GB Silver', 4, 93.03, '2013-02-23 15:00:00', '2013-02-23 22:14:57'),
	(2757763, 22681, 'iPhone 5 16GB', 8, 35.95, '2013-02-22 19:00:00', '2013-02-23 15:58:23'),
	(2757751, 23023, 'iPad Mini 32GB', 4, 208.55, '2013-02-22 14:00:00', '2013-02-23 14:58:20'),
	(2757787, 23284, 'Google Nexus 4 8GB', 6, 3.47, '2013-02-22 22:00:00', '2013-02-22 23:52:11'),
	(2757754, 22654, 'Xbox 360 4GB with Kinect', 4, 18.80, '2013-02-22 15:00:00', '2013-02-22 19:33:26'),
	(2757757, 23302, 'Toshiba Tecra R850', 6, 5.38, '2013-02-22 16:00:00', '2013-02-22 19:23:53'),
	(2750095, 23278, 'Lenovo Yoga Convertible Laptop', 6, 43.58, '2013-02-21 18:00:00', '2013-02-22 14:50:48'),
	(2750083, 22765, 'New iPod touch 64GB Silver', 4, 75.66, '2013-02-21 13:00:00', '2013-02-21 19:20:53'),
	(2758354, 22453, 'Samsung Galaxy S III', 6, 29.16, '2013-02-25 13:00:00', '2013-02-25 21:10:30'),
	(2758384, 22762, 'New iPod touch 32GB Silver', 4, 0.79, '2013-02-25 19:30:00', '2013-02-25 20:28:52'),
	(2758588, 23215, 'Sony Vaio Core i3 13" Laptop ', 6, 87.62, '2013-02-26 20:00:00', '2013-02-27 14:57:07'),
	(2758606, 21400, 'Nikon D5100 Digital SLR Camera', 6, 16.05, '2013-02-26 21:00:00', '2013-02-27 11:39:42'),
	(2758609, 22645, 'Sharp 32" LED TV LC32LE40E', 6, 3.95, '2013-02-26 22:00:00', '2013-02-27 10:26:25'),
	(2758594, 22777, 'Sony PS3 500GB Super Slim', 4, 18.20, '2013-02-26 19:00:00', '2013-02-26 23:10:13'),
	(2758387, 22681, 'iPhone 5 16GB', 8, 131.07, '2013-02-25 20:00:00', '2013-02-26 19:30:44'),
	(2758576, 20362, 'Sony 16GB HandyCam', 4, 13.70, '2013-02-26 14:30:00', '2013-02-26 18:50:28'),
	(2758381, 22585, 'Canon EOS 650D + 18-55 Lens', 6, 99.31, '2013-02-25 19:00:00', '2013-02-26 18:34:23'),
	(2758573, 22453, 'Samsung Galaxy S III', 6, 3.90, '2013-02-26 14:00:00', '2013-02-26 17:00:24'),
	(2758579, 23020, 'iPad Mini 16GB', 4, 0.16, '2013-02-26 15:00:00', '2013-02-26 15:11:52'),
	(2758393, 22654, 'Xbox 360 4GB with Kinect', 4, 37.93, '2013-02-25 21:00:00', '2013-02-26 15:03:22'),
	(2757985, 22534, 'Apple MacBook Air 11" 1.8GHz', 6, 266.54, '2013-02-24 16:00:00', '2013-02-26 14:33:09'),
	(2758399, 23284, 'Google Nexus 4 8GB', 6, 9.49, '2013-02-25 22:00:00', '2013-02-26 13:38:11'),
	(2758378, 23311, 'iPad with Retina Display 16GB', 6, 68.39, '2013-02-25 18:00:00', '2013-02-26 13:13:54'),
	(2758372, 23299, 'Toshiba Tecra R840', 6, 70.44, '2013-02-25 16:00:00', '2013-02-26 12:53:59'),
	(2758390, 20386, 'Dyson Upright Vacuum', 4, 9.87, '2013-02-25 20:30:00', '2013-02-26 12:01:08'),
	(2766412, 22453, 'Samsung Galaxy S III', 6, 114.80, '2013-02-27 13:00:00', '2013-02-27 23:36:43'),
	(2766421, 22762, 'New iPod touch 32GB Silver', 4, 28.93, '2013-02-27 15:00:00', '2013-02-27 19:17:41'),
	(2766415, 23071, '9.7" GoTab Epic V Multipad ', 4, 11.99, '2013-02-27 13:30:00', '2013-02-27 17:03:07'),
	(2766433, 22681, 'iPhone 5 16GB', 8, 65.94, '2013-02-27 19:00:00', '2013-02-28 13:42:42'),
	(2766445, 22585, 'Canon EOS 650D + 18-55 Lens', 6, 116.48, '2013-02-27 21:00:00', '2013-02-28 18:04:26');
/*!40000 ALTER TABLE `auction_data` ENABLE KEYS */;


-- Dumping structure for table da.auction_data_future
DROP TABLE IF EXISTS `auction_data_future`;
CREATE TABLE IF NOT EXISTS `auction_data_future` (
  `auction_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `credit_cost` int(10) NOT NULL,
  `highest_bid` float(6,2) NOT NULL,
  `date_opens` datetime NOT NULL,
  `date_bid` datetime NOT NULL,
  PRIMARY KEY (`auction_id`),
  KEY `product_id` (`product_id`),
  KEY `date_opens` (`date_opens`),
  KEY `date_bid` (`date_bid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table da.auction_data_future: 67 rows
DELETE FROM `auction_data_future`;
/*!40000 ALTER TABLE `auction_data_future` DISABLE KEYS */;
INSERT INTO `auction_data_future` (`auction_id`, `product_id`, `title`, `credit_cost`, `highest_bid`, `date_opens`, `date_bid`) VALUES
	(2750095, 23278, 'Lenovo Yoga Convertible Laptop', 6, 0.00, '2013-02-21 18:00:00', '0000-00-00 00:00:00'),
	(2750098, 21565, 'MagicBox Tower DAB iPod Dock', 4, 0.00, '2013-02-21 18:30:00', '0000-00-00 00:00:00'),
	(2750101, 22681, 'iPhone 5 16GB', 8, 0.00, '2013-02-21 19:00:00', '0000-00-00 00:00:00'),
	(2750104, 22654, 'Xbox 360 4GB with Kinect', 4, 0.00, '2013-02-21 19:30:00', '0000-00-00 00:00:00'),
	(2750107, 18649, 'GBP 200 Cash + 1950 Credits', 7, 0.00, '2013-02-21 20:00:00', '0000-00-00 00:00:00'),
	(2750110, 22933, 'Kindle Fire', 4, 0.00, '2013-02-21 20:30:00', '0000-00-00 00:00:00'),
	(2750113, 21400, 'Nikon D5100 Digital SLR Camera', 6, 0.00, '2013-02-21 21:00:00', '0000-00-00 00:00:00'),
	(2750116, 20560, 'American Originals Mixer', 6, 0.00, '2013-02-21 21:30:00', '0000-00-00 00:00:00'),
	(2750119, 23059, 'Sharp 24" LED TV with DVD ', 6, 0.00, '2013-02-21 22:00:00', '0000-00-00 00:00:00'),
	(2757742, 21469, '49 Piece Tool Set in Caddy', 4, 0.00, '2013-02-22 11:00:00', '0000-00-00 00:00:00'),
	(2757748, 20341, 'Panasonic Triple Phone Set', 4, 0.00, '2013-02-22 13:00:00', '0000-00-00 00:00:00'),
	(2757751, 23023, 'iPad Mini 32GB', 4, 0.00, '2013-02-22 14:00:00', '0000-00-00 00:00:00'),
	(2757754, 22654, 'Xbox 360 4GB with Kinect', 4, 0.00, '2013-02-22 15:00:00', '0000-00-00 00:00:00'),
	(2757757, 23302, 'Toshiba Tecra R850', 6, 0.00, '2013-02-22 16:00:00', '0000-00-00 00:00:00'),
	(2757763, 22681, 'iPhone 5 16GB', 8, 0.00, '2013-02-22 18:00:00', '0000-00-00 00:00:00'),
	(2757769, 23026, 'iPad Mini 64GB', 6, 0.00, '2013-02-22 19:00:00', '0000-00-00 00:00:00'),
	(2757775, 21400, 'Nikon D5100 Digital SLR Camera', 6, 0.00, '2013-02-22 20:00:00', '0000-00-00 00:00:00'),
	(2758378, 23311, 'iPad with Retina Display 16GB', 6, 0.00, '2013-02-25 18:00:00', '0000-00-00 00:00:00'),
	(2758381, 22585, 'Canon EOS 650D + 18-55 Lens', 6, 0.00, '2013-02-25 19:00:00', '0000-00-00 00:00:00'),
	(2758384, 22762, 'New iPod touch 32GB Silver', 4, 0.00, '2013-02-25 19:30:00', '0000-00-00 00:00:00'),
	(2758387, 22681, 'iPhone 5 16GB', 8, 0.00, '2013-02-25 20:00:00', '0000-00-00 00:00:00'),
	(2758390, 20386, 'Dyson Upright Vacuum', 4, 0.00, '2013-02-25 20:30:00', '0000-00-00 00:00:00'),
	(2758393, 22654, 'Xbox 360 4GB with Kinect', 4, 0.00, '2013-02-25 21:00:00', '0000-00-00 00:00:00'),
	(2758396, 20560, 'American Originals Mixer', 6, 0.00, '2013-02-25 21:30:00', '0000-00-00 00:00:00'),
	(2758399, 23284, 'Google Nexus 4 8GB', 6, 0.00, '2013-02-25 22:00:00', '0000-00-00 00:00:00'),
	(2758570, 19885, 'Xbox 360 250GB', 4, 0.00, '2013-02-26 13:00:00', '0000-00-00 00:00:00'),
	(2758573, 22453, 'Samsung Galaxy S III', 6, 0.00, '2013-02-26 14:00:00', '0000-00-00 00:00:00'),
	(2758576, 20362, 'Sony 16GB HandyCam', 4, 0.00, '2013-02-26 14:30:00', '0000-00-00 00:00:00'),
	(2758579, 23020, 'iPad Mini 16GB', 4, 0.00, '2013-02-26 15:00:00', '0000-00-00 00:00:00'),
	(2758582, 22681, 'iPhone 5 16GB', 8, 0.00, '2013-02-26 16:00:00', '0000-00-00 00:00:00'),
	(2758585, 22759, 'Tefal ActiFry in White', 4, 0.00, '2013-02-26 16:30:00', '0000-00-00 00:00:00'),
	(2758588, 23215, 'Sony Vaio Core i3 13" Laptop ', 6, 0.00, '2013-02-26 18:00:00', '0000-00-00 00:00:00'),
	(2758567, 19753, 'Vax Libretto Hand Vacuum', 3, 0.00, '2013-02-26 12:00:00', '0000-00-00 00:00:00'),
	(2758591, 19759, 'BT Quad with Answering Machine', 3, 0.00, '2013-02-26 18:30:00', '0000-00-00 00:00:00'),
	(2758594, 22777, 'Sony PS3 500GB Super Slim', 4, 0.00, '2013-02-26 19:00:00', '0000-00-00 00:00:00'),
	(2758597, 22420, 'Altec Lansing iPod/iPhone Dock', 4, 0.00, '2013-02-26 19:30:00', '0000-00-00 00:00:00'),
	(2758600, 23026, 'iPad Mini 64GB', 6, 0.00, '2013-02-26 20:00:00', '0000-00-00 00:00:00'),
	(2758603, 22762, 'New iPod touch 32GB Silver', 4, 0.00, '2013-02-26 20:30:00', '0000-00-00 00:00:00'),
	(2758606, 21400, 'Nikon D5100 Digital SLR Camera', 6, 0.00, '2013-02-26 21:00:00', '0000-00-00 00:00:00'),
	(2758609, 22645, 'Sharp 32" LED TV LC32LE40E', 6, 0.00, '2013-02-26 22:00:00', '0000-00-00 00:00:00'),
	(2760292, 21709, 'Emporio Armani Mens Watch', 4, 0.00, '2013-03-01 17:00:00', '0000-00-00 00:00:00'),
	(2766433, 22681, 'iPhone 5 16GB', 8, 0.00, '2013-02-27 19:00:00', '0000-00-00 00:00:00'),
	(2766439, 23314, 'iPad with Retina Display 32GB', 6, 0.00, '2013-02-27 20:00:00', '0000-00-00 00:00:00'),
	(2766442, 22654, 'Xbox 360 4GB with Kinect', 4, 0.00, '2013-02-27 20:30:00', '0000-00-00 00:00:00'),
	(2766445, 22585, 'Canon EOS 650D + 18-55 Lens', 6, 0.00, '2013-02-27 21:00:00', '0000-00-00 00:00:00'),
	(2766448, 21436, 'Conran Audio iPhone/iPod Dock', 4, 0.00, '2013-02-27 22:00:00', '0000-00-00 00:00:00'),
	(2766508, 22420, 'Altec Lansing iPod/iPhone Dock', 4, 0.00, '2013-02-28 12:00:00', '0000-00-00 00:00:00'),
	(2766511, 21910, 'Sony 8GB Bloggie Camera', 4, 0.00, '2013-02-28 13:00:00', '0000-00-00 00:00:00'),
	(2766514, 22762, 'New iPod touch 32GB Silver', 4, 0.00, '2013-02-28 13:30:00', '0000-00-00 00:00:00'),
	(2766517, 23020, 'iPad Mini 16GB', 4, 0.00, '2013-02-28 14:00:00', '0000-00-00 00:00:00'),
	(2766520, 23056, 'Sharp 22" LED TV with DVD', 6, 0.00, '2013-02-28 15:00:00', '0000-00-00 00:00:00'),
	(2766523, 22681, 'iPhone 5 16GB', 8, 0.00, '2013-02-28 16:00:00', '0000-00-00 00:00:00'),
	(2766529, 23278, 'Lenovo Yoga Convertible Laptop', 6, 0.00, '2013-02-28 18:00:00', '0000-00-00 00:00:00'),
	(2766535, 23311, 'iPad with Retina Display 16GB', 6, 0.00, '2013-02-28 19:00:00', '0000-00-00 00:00:00'),
	(2766541, 18649, 'GBP 200 Cash + 1950 Credits', 7, 0.00, '2013-02-28 20:00:00', '0000-00-00 00:00:00'),
	(2766538, 22654, 'Xbox 360 4GB with Kinect', 4, 0.00, '2013-02-28 19:30:00', '0000-00-00 00:00:00'),
	(2766544, 20560, 'American Originals Mixer', 6, 0.00, '2013-02-28 20:30:00', '0000-00-00 00:00:00'),
	(2766547, 19894, 'Sony High Definition Camcorder', 6, 0.00, '2013-02-28 21:00:00', '0000-00-00 00:00:00'),
	(2766550, 21199, 'MD20 Heart Mens Wallet (Sand)', 4, 0.00, '2013-02-28 21:30:00', '0000-00-00 00:00:00'),
	(2766553, 20341, 'Panasonic Triple Phone Set', 4, 0.00, '2013-02-28 22:00:00', '0000-00-00 00:00:00'),
	(2766532, 21976, 'reddmango 4GB mp3 Player', 4, 0.00, '2013-02-28 18:30:00', '0000-00-00 00:00:00'),
	(2776219, 20680, 'BT Twin Phone Colour Screen', 4, 0.00, '2013-03-01 12:00:00', '0000-00-00 00:00:00'),
	(2776222, 22453, 'Samsung Galaxy S III', 6, 0.00, '2013-03-01 13:00:00', '0000-00-00 00:00:00'),
	(2776225, 21565, 'MagicBox Tower DAB iPod Dock', 4, 0.00, '2013-03-01 13:30:00', '0000-00-00 00:00:00'),
	(2776228, 22762, 'New iPod touch 32GB Silver', 4, 0.00, '2013-03-01 14:00:00', '0000-00-00 00:00:00'),
	(2776231, 23026, 'iPad Mini 64GB', 6, 0.00, '2013-03-01 15:00:00', '0000-00-00 00:00:00'),
	(2776234, 22654, 'Xbox 360 4GB with Kinect', 4, 0.00, '2013-03-01 16:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `auction_data_future` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
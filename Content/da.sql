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


DELETE FROM `auction_data`;

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
	(2750092, 23026, 'iPad Mini 64GB', 6, 2.04, '2013-02-21 16:00:00', '2013-02-21 17:43:17');


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


DELETE FROM `auction_data_future`;

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
	(2757775, 21400, 'Nikon D5100 Digital SLR Camera', 6, 0.00, '2013-02-22 20:00:00', '0000-00-00 00:00:00');


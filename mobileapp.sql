-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 11:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `deleteditems`
--

CREATE TABLE `deleteditems` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `pic` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deletedmobile`
--

CREATE TABLE `deletedmobile` (
  `mobile_id` int(11) NOT NULL,
  `mobile_name` varchar(50) DEFAULT NULL,
  `mobile_category` varchar(50) DEFAULT NULL,
  `mobile_ram` varchar(50) DEFAULT NULL,
  `mobile_storage` varchar(50) DEFAULT NULL,
  `mobile_battery` varchar(50) DEFAULT NULL,
  `mobile_quantity` int(11) DEFAULT NULL,
  `mobile_color` varchar(50) DEFAULT NULL,
  `mobile_pic` text DEFAULT NULL,
  `mobile_price_af` double DEFAULT NULL,
  `mobile_total_price_af` double DEFAULT NULL,
  `mobile_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deletedmobile`
--

INSERT INTO `deletedmobile` (`mobile_id`, `mobile_name`, `mobile_category`, `mobile_ram`, `mobile_storage`, `mobile_battery`, `mobile_quantity`, `mobile_color`, `mobile_pic`, `mobile_price_af`, `mobile_total_price_af`, `mobile_date`) VALUES
(267, 'K100', 'Q Mobiles  ', '1', '0', '1800', 1, 'black', '', 960, 960, '2022-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `easyload`
--

CREATE TABLE `easyload` (
  `easyload_id` int(11) NOT NULL,
  `easyload_date` date NOT NULL,
  `easyload_quantity` int(11) NOT NULL,
  `easyload_af` int(11) NOT NULL,
  `easyload_rs` int(11) NOT NULL,
  `easyload_exchange` float NOT NULL,
  `easyload_rstoaf` float NOT NULL,
  `easyload_company` varchar(255) NOT NULL,
  `easyload_profit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyload`
--

INSERT INTO `easyload` (`easyload_id`, `easyload_date`, `easyload_quantity`, `easyload_af`, `easyload_rs`, `easyload_exchange`, `easyload_rstoaf`, `easyload_company`, `easyload_profit`) VALUES
(16, '2021-01-01', 1, 10151, 0, 0, 0, '', 10150),
(18, '2021-01-13', 1760, 1760, 0, 0, 0, '', 88),
(19, '2021-01-13', 2090, 0, 4430, 2100, 2109.52, '', 124.024),
(22, '2021-01-14', 3130, 3130, 0, 0, 0, '', 156.5),
(24, '2021-01-14', 1259, 0, 2870, 2100, 1366.67, '', 170.617),
(25, '2021-01-14', 579, 579, 0, 0, 0, '', 28.95),
(26, '2021-01-15', 270, 270, 0, 0, 0, '', 13.5),
(27, '2021-01-15', 1200, 1200, 0, 0, 0, '', 60),
(28, '2021-01-15', 1041, 0, 2290, 2100, 1090.48, '', 101.526),
(29, '2021-01-15', 580, 580, 0, 0, 0, '', 29),
(30, '2021-01-15', 50, 0, 110, 2100, 52.381, '', 4.88095),
(31, '2021-01-15', 810, 810, 0, 0, 0, '', 40.5),
(32, '2021-01-15', 682, 682, 0, 0, 0, '', 34.1),
(33, '2021-01-15', 300, 300, 0, 0, 0, '', 15),
(34, '2021-01-16', 1570, 1570, 0, 0, 0, '', 78.5),
(36, '2021-01-16', 1099, 0, 2270, 2100, 1080.95, '', 54.0476),
(39, '2021-01-17', 2190, 2190, 0, 0, 0, '', 109.5),
(43, '2021-01-17', 423, 423, 0, 0, 0, '', 21.15),
(44, '2021-01-18', 1820, 1820, 0, 0, 0, '', 91),
(45, '2021-01-18', 120, 120, 0, 0, 0, '', 6),
(46, '2021-01-18', 721, 0, 1570, 2100, 747.619, '', 62.669),
(49, '2021-01-18', 45, 0, 100, 2100, 47.619, '', 4.86905),
(50, '2021-01-19', 700, 700, 0, 0, 0, '', 35);

-- --------------------------------------------------------

--
-- Table structure for table `easyload_total`
--

CREATE TABLE `easyload_total` (
  `easyload_total_id` int(11) NOT NULL,
  `easyload_total_date` date NOT NULL,
  `easyload_grand_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyload_total`
--

INSERT INTO `easyload_total` (`easyload_total_id`, `easyload_total_date`, `easyload_grand_total`) VALUES
(1, '2021-01-01', 5370);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expenses_id` int(11) NOT NULL,
  `expenses_date` date NOT NULL,
  `expenses_des` varchar(255) NOT NULL,
  `price_af` double NOT NULL,
  `price_rs` double NOT NULL,
  `price_dollor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_categories`
--

CREATE TABLE `general_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_categories`
--

INSERT INTO `general_categories` (`category_id`, `category_name`) VALUES
(21, 'Memory Cards,میموری'),
(22, 'Car Charger,موټر چارجر'),
(23, ' shamsi DC,بطری چارجری'),
(24, 'Electronic Charger. برق چارجر'),
(25, 'Charge Cable,چارج کیبل '),
(26, 'USB'),
(27, 'Car MP3,موټر'),
(28, 'Car wireless MP3,موټر '),
(29, 'Battery charger Destop,بطری چارجر'),
(30, 'Samsung Cover,سمسنګ پوش'),
(31, 'Oppo Cover,وفوو پوش'),
(32, 'Iphone Cover,آیفون پوش'),
(33, 'Huawai Cover,هاواوی  پوش'),
(34, 'Vivo Cover,ویوو پوش'),
(35, 'Samsung Glass,سیمسنګ شیشه'),
(36, 'Oppo Glass,وفوو شیشه'),
(37, 'Iphone Glass,آیفون شیشه'),
(38, 'Huawai Glass,هاواوی شیشه'),
(39, 'Vivo Glass,ویوو شیشه'),
(40, 'Head phone,ګوشکی'),
(41, '‌Bluetooth Head phone,بلی توت ګوشکی'),
(42, 'wireless Head phone,ویرلیس ګوشکی'),
(43, 'Power Bank,پاور بانک'),
(44, 'Car kesat,موټر کیسټ'),
(45, 'Car gotka,موټر کوټکه'),
(46, 'Mobile gotma,موبایل کوتمه'),
(47, 'NOkia Cover,نوکیه پوش'),
(48, 'NOka USB,نوکه'),
(49, 'Mobile Battery,موبایل بطری'),
(50, 'Remote MP3,ریموټ MP3'),
(51, 'Sim Cards,سیم کارټونه'),
(52, 'Credit Card,کریدیټ کارټ'),
(53, 'Mobile stan,موبایل ستن'),
(54, 'WIFI,وای پای'),
(55, 'MP3'),
(56, 'Card Reader'),
(57, 'MIX Thing'),
(58, 'Battery,بطری'),
(59, 'AV Cable'),
(60, 'Mobile Plastick'),
(61, 'POSH,پوش'),
(62, 'INFINEX COVERS  پوش'),
(63, 'INFINEX GLASSES شیشه'),
(64, 'Covers;پوشونه'),
(65, 'Glasses, شیشی');

-- --------------------------------------------------------

--
-- Table structure for table `general_items`
--

CREATE TABLE `general_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `pic` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL,
  `income_date` date NOT NULL,
  `income_category` varchar(255) DEFAULT NULL,
  `income_des` varchar(255) DEFAULT NULL,
  `Iprice_af` double DEFAULT NULL,
  `Iprice_rs` double DEFAULT NULL,
  `Iprice_dollar` double DEFAULT NULL,
  `Oprice_af` double DEFAULT NULL,
  `Oprice_rs` double DEFAULT NULL,
  `Oprice_dollar` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `income_date`, `income_category`, `income_des`, `Iprice_af`, `Iprice_rs`, `Iprice_dollar`, `Oprice_af`, `Oprice_rs`, `Oprice_dollar`) VALUES
(9, '2021-01-13', NULL, 'خرڅ شوی سامان', 3230, 24250, NULL, NULL, NULL, NULL),
(10, '2021-01-01', NULL, 'خرڅ شوی سامان', 10151, 0, NULL, NULL, NULL, NULL),
(11, '2021-01-13', NULL, 'قرض یا وصول', 0, 0, 0, 29167, 79638, 120),
(12, '2021-01-13', 'خرچه', 'نن خرچه', 0, 0, 0, 110, 0, 0),
(13, '2021-01-13', 'ماشین', 'total 13-1-2021 rupi', 0, 0, 0, 260042, 234344, 0),
(14, '2021-01-13', 'شاپور', 'total shapoor rupi 12-1-2021', 103880, 0, 0, 0, 0, 0),
(15, '2021-01-13', 'شاپور', 'wakeel pa las esyload', 20000, 0, 0, 0, 0, 0),
(16, '2021-01-13', 'بابا', 'total baba dollar', 0, 0, 10875, 0, 0, 0),
(17, '2021-01-13', 'عمومی', '13-1-2021khysb jorawal', 275838, 295872, 0, 0, 0, 10155),
(18, '2021-01-14', NULL, 'خرڅ شوی سامان', 4769, 5590, NULL, NULL, NULL, NULL),
(19, '2021-01-14', 'خرچه', 'نن خرچه', 0, 0, 0, 200, 0, 0),
(20, '2021-01-14', 'ماشین', 'کور ته ګیس 6کلیوه  افغاني ', 0, 0, 0, 360, 0, 0),
(21, '2021-01-14', 'ماشین', 'کورته غوښه  سبځی مالټه کلدارې ', 0, 0, 0, 0, 3830, 0),
(22, '2021-01-14', 'عمومی', 'جلندر ماما ته اصول  کلداري ', 0, 0, 0, 0, 3740, 0),
(23, '2021-01-14', 'صرافی', 'صرافی', 171, 0, 0, 0, 360, 0),
(24, '2021-01-15', NULL, 'قرض یا وصول', 0, 0, 0, 2180, 0, 0),
(25, '2021-01-15', NULL, 'خرڅ شوی سامان', 20272, 6120, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL,
  `loan_date` date NOT NULL,
  `loan_des` varchar(255) DEFAULT NULL,
  `loan_status` varchar(50) DEFAULT NULL,
  `loan_Iprice_af` double DEFAULT NULL,
  `loan_Iprice_rs` double DEFAULT NULL,
  `loan_Iprice_dollar` double DEFAULT NULL,
  `loan_Oprice_af` double DEFAULT NULL,
  `loan_Oprice_rs` double DEFAULT NULL,
  `loan_Oprice_dollar` double DEFAULT NULL,
  `loan_category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `loan_date`, `loan_des`, `loan_status`, `loan_Iprice_af`, `loan_Iprice_rs`, `loan_Iprice_dollar`, `loan_Oprice_af`, `loan_Oprice_rs`, `loan_Oprice_dollar`, `loan_category`) VALUES
(2, '2021-01-13', 'khalid  total bakya', 'قرض', NULL, NULL, NULL, 10505, 4449, 120, 'خالد'),
(3, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 0, 27779, 0, 'عزت'),
(5, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 0, 22650, 0, 'رحمت ولی'),
(9, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 3542, 0, 0, 'جمال ،خالد شریکوال'),
(10, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 0, 1080, 0, 'عسکر'),
(11, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 0, 500, 0, 'لاری والا'),
(13, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 100, 0, 0, 'میر محمد احسان الله منشی'),
(14, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 0, 950, 0, 'کریم قومندان'),
(16, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 0, 2000, 0, 'محمد میر'),
(17, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 0, 500, 0, 'فربد ډریور کروولا وال'),
(18, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 230, 0, 0, 'پهلوان لین ټوډیوالا'),
(20, '2021-01-13', 'total baki', 'قرض', NULL, NULL, NULL, 0, 8000, 0, 'طورخم');

-- --------------------------------------------------------

--
-- Table structure for table `loan_categories`
--

CREATE TABLE `loan_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_categories`
--

INSERT INTO `loan_categories` (`cat_id`, `cat_name`) VALUES
(2, 'خالد'),
(3, 'عزت'),
(4, 'رحمت ولی'),
(8, 'جمال ،خالد شریکوال'),
(9, 'عسکر'),
(10, 'لاری والا'),
(12, 'میر محمد احسان الله منشی'),
(13, 'کریم قومندان'),
(15, 'محمد میر'),
(16, 'فربد ډریور کروولا وال'),
(17, 'پهلوان لین ټوډیوالا'),
(19, 'طورخم'),
(20, 'ذبیخ الله'),
(21, 'حکمتيار'),
(23, 'یاد ولی حاجی'),
(24, 'امان الله'),
(31, 'سوهیل'),
(38, 'اسرار '),
(68, 'نجیب پمپ والا'),
(88, 'شانخیل'),
(90, 'سید هلال '),
(91, 'غزت الله'),
(98, 'بابا'),
(101, 'رحمت څرکللدار'),
(102, 'خیل ولی '),
(108, 'پاسم خان'),
(111, 'سند قومند'),
(113, 'اخترشاه'),
(114, 'ذلفقار'),
(116, 'ماحیل رحمان الله'),
(117, 'برساده '),
(118, 'جهادولی خاجی');

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `mobile_id` int(11) NOT NULL,
  `mobile_name` varchar(50) DEFAULT NULL,
  `mobile_category` varchar(50) DEFAULT NULL,
  `mobile_ram` varchar(50) DEFAULT NULL,
  `mobile_storage` varchar(50) DEFAULT NULL,
  `mobile_battery` varchar(50) DEFAULT NULL,
  `mobile_quantity` int(11) DEFAULT NULL,
  `mobile_color` varchar(50) DEFAULT NULL,
  `mobile_pic` text DEFAULT NULL,
  `mobile_price_af` double DEFAULT NULL,
  `mobile_total_price_af` double DEFAULT NULL,
  `mobile_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`mobile_id`, `mobile_name`, `mobile_category`, `mobile_ram`, `mobile_storage`, `mobile_battery`, `mobile_quantity`, `mobile_color`, `mobile_pic`, `mobile_price_af`, `mobile_total_price_af`, `mobile_date`) VALUES
(63, 'i2-02', 'IVA Mobile ', '0', '0', '1800', 0, 'Gold,Brown Blue', 'iva i2-02.jpg', 930, 0, '2020-07-21'),
(64, 'A112', 'IVA Mobile ', '0', '0', '1800', 1, 'Grey,black', 'iva i2.png', 930, 930, '2020-07-21'),
(65, 'i2', 'IVA Mobile ', '0', '0', '1800', 0, 'Blue.Black', 'iva i2.png', 1162, 0, '2020-07-21'),
(67, 'X3', 'IVA Mobile ', '0', '0', '1800', 1, 'Black', 'iva i2.png', 1320, 1320, '2020-07-21'),
(69, 'X4', 'IVA Mobile ', '0', '0', '1800', 1, '+Glod Black', 'iva i2.png', 900, 900, '2020-07-21'),
(74, 'X17', 'Ashina Mobiles ', '0', '0', '2200', 1, 'Black+Red', 'Ashina.jpg', 1085, 1085, '2020-07-21'),
(75, 'S75', 'Ashina Mobiles ', '0', '0', '1800', 2, 'Balck', 'Ashina.jpg', 1085, 2170, '2020-07-21'),
(77, 'F100', 'Ashina Mobiles ', '0', '0', '1000', 1, 'White,Black', 'Ashina.jpg', 1085, 1085, '2020-07-21'),
(78, 'TV1', 'Ashina Mobiles ', '0', '0', '1000', 5, 'Black,white', 'Ashina.jpg', 1085, 5425, '2020-07-21'),
(79, 'E220', 'Ashina Mobiles ', '0', '0', '1800', 1, 'Red,Black', 'Ashina.jpg', 950, 950, '2020-07-21'),
(80, 'A900', 'Ashina Mobiles ', '0', '0', '1800', 1, 'Red', 'Ashina.jpg', 1240, 1240, '2020-07-21'),
(83, 'S65', 'Ashina Mobiles ', '0', '0', '1000', 1, 'White', 'Ashina.jpg', 930, 930, '2020-07-21'),
(85, 'X12', 'Ashina Mobiles ', '0', '0', '2500', 0, 'White', 'Ashina.jpg', 1162, 0, '2020-07-21'),
(91, 'N300', 'Neda', '0', '0', '1200', 1, 'Black', 'n300.jfif', 1470, 1470, '2020-07-21'),
(92, 'T111', 'Tacmor Mobiles ', '0', '0', '2000', 1, 'Black', 'Tecmor.jpg', 852, 852, '2020-07-21'),
(94, 'T682', 'Tacmor Mobiles ', '0', '0', '2600', 2, 'Grey', 'Tecmor.jpg', 852, 1704, '2020-07-21'),
(96, 'T350', 'Tacmor Mobiles ', '0', '0', '1500', 1, 'White', 'Tecmor.jpg', 852, 852, '2020-07-21'),
(98, 'T670', 'Tacmor Mobiles ', '0', '0', '1800', 1, 'Golden,Black', 'Tecmor.jpg', 852, 852, '2020-07-21'),
(100, 'T300', 'Tacmor Mobiles ', '0', '0', '2000', 1, 'Black,Green', 'Tecmor.jpg', 852, 852, '2020-07-21'),
(101, 'T225', 'Tacmor Mobiles ', '0', '0', '1500', 1, 'Black', 'Tecmor.jpg', 852, 852, '2020-07-21'),
(104, 'Q1', 'QUP Mobiles ', '0', '0', '1000', 1, 'Black', 'QU MOBILES.jpg', 1162, 1162, '2020-07-21'),
(108, 'D4', 'Q Mobiles ', '0', '0', '1800', 5, 'Blue', 'D4.jpg', 1085, 5425, '2020-07-21'),
(110, 'Eco100', 'Q', '0', '0', '1800', 2, 'Red', 'qmobile.jpg', 1162, 2324, '2020-07-21'),
(116, 'Eco2', 'Q Mobiles ', '0', '0', '1800', 1, 'Black', 'qmobile.jpg', 1162, 1162, '2020-07-21'),
(121, 'MV286', 'Fly Mobiles ', '0', '0', '1350', 1, 'Grey', 'fly.jpg', 852, 852, '2020-07-21'),
(122, 'O360', 'Orange Mobiles ', '0', '0', '', 1, 'Grey', 'orange mobiles.jpg', 852, 852, '2020-07-21'),
(129, 'T130', 'Mix All Mobiles ', '0', '0', '4800', 2, 'Black', '', 1007, 2014, '2020-07-21'),
(131, 'M800 Mmobile', 'Mix', '0', '0', '1200', 2, 'White', 'xx.jfif', 930, 1860, '2020-07-21'),
(135, 'J7 star Used', 'samsung', '2', '32', '3300', 1, 'Blue', 'j7 star.jpg', 8000, 8000, '2020-07-21'),
(141, 'Amani A3 4Sim', 'Mix ', '0', '0', '2000', 1, ' Blue', 'Amani a3.jpg', 1550, 1550, '2020-07-21'),
(152, 'M700', 'Mix', '0', '0', '1800', 1, 'Black', 'm700.jfif', 1007, 1007, '2020-07-22'),
(171, 'Nokia 1190', 'Used  Mobiles ', '0', '0', '1000', 1, 'Black', '1190.jfif', 850, 850, '2020-08-20'),
(174, 'Nokia X6 Touch', 'Used  Mobiles ', '0', '16', '1800', 1, 'Black', 'x6.jfif', 1000, 1000, '2020-08-20'),
(176, 'Iphone 7Plus', 'Used  Mobiles ', '4', '256', '3000', 1, 'Black', '7p.jfif', 4500, 4500, '2020-08-20'),
(240, 'LG A395', 'Lg mobiles ', '1', '16', '2400', 2, 'BLACK', 'A395.jfif', 3400, 6800, '2021-03-23'),
(244, 'B310', 'samsung', '0', '0', '1500', 1, 'ggj', 'B310.jpg', 800, 800, '2021-07-31'),
(266, 'K100', 'Q Mobiles  ', '1', '0', '1800', 1, 'black', '', 960, 960, '2022-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_categories`
--

CREATE TABLE `mobile_categories` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobile_categories`
--

INSERT INTO `mobile_categories` (`category_id`, `category_name`) VALUES
(15, 'samsung'),
(16, 'Used '),
(17, 'IVA'),
(18, 'Ashina'),
(19, 'Neda'),
(20, 'Q'),
(21, 'Tacmor'),
(22, 'Fly'),
(23, 'QUP'),
(24, 'Nokia'),
(25, 'Orange '),
(26, 'LG'),
(27, 'Mix All'),
(28, 'Kechaoda'),
(29, 'Rivo '),
(30, 'INFINIX '),
(31, 'Oppo'),
(32, 'Vivo '),
(33, 'Bag Line '),
(34, 'ip');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `report_af` double NOT NULL,
  `report_rs` double NOT NULL,
  `report_rate` float NOT NULL,
  `report_total` double NOT NULL,
  `report_profit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sarafi`
--

CREATE TABLE `sarafi` (
  `id` int(11) NOT NULL,
  `af` int(11) NOT NULL DEFAULT 1000,
  `af2rs` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sarafi`
--

INSERT INTO `sarafi` (`id`, `af`, `af2rs`, `date`) VALUES
(5, 1000, 2000, '2022-04-07'),
(6, 1000, 1800, '2022-04-07'),
(9, 1000, 1500, '2022-04-07'),
(10, 1000, 1800, '2022-04-07'),
(12, 1000, 1900, '2022-04-07'),
(13, 1000, 1600, '2022-04-07'),
(14, 1000, 1800, '2022-04-07'),
(15, 1000, 1200, '2022-04-07'),
(17, 1000, 2000, '2022-04-07'),
(18, 1000, 1800, '2022-04-07'),
(19, 1000, 1900, '2022-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `sold_general_items`
--

CREATE TABLE `sold_general_items` (
  `sold_id` int(11) NOT NULL,
  `sold_name` varchar(100) NOT NULL,
  `sold_category` varchar(100) NOT NULL,
  `sold_quality` varchar(50) NOT NULL,
  `sold_items_price_af` double NOT NULL,
  `sold_items_price_rs` double NOT NULL,
  `sold_quantity` int(11) NOT NULL,
  `sold_items_total_price_af` double NOT NULL,
  `sold_items_total_price_rs` double NOT NULL,
  `sold_pic` text NOT NULL,
  `sold_date` date NOT NULL,
  `sold_rate` float NOT NULL,
  `sold_basePrice` float NOT NULL,
  `sold_rstoaf` double NOT NULL,
  `sale_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sold_general_items`
--

INSERT INTO `sold_general_items` (`sold_id`, `sold_name`, `sold_category`, `sold_quality`, `sold_items_price_af`, `sold_items_price_rs`, `sold_quantity`, `sold_items_total_price_af`, `sold_items_total_price_rs`, `sold_pic`, `sold_date`, `sold_rate`, `sold_basePrice`, `sold_rstoaf`, `sale_item_id`) VALUES
(17, 'Mtn50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 2, 100, 0, 'mtn11.png', '2021-01-13', 1, 95.6, 0, 8),
(18, 'Roshan50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 1, 50, 0, 'roshan.jfif', '2021-01-13', 1, 47.5, 0, 14),
(19, 'Awcc50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 14, 700, 0, 'awcc.jfif', '2021-01-13', 1, 666.4, 0, 16),
(20, '70 C9', 'Charge Cable,چارج کیبل ', 'B', 80, 0, 1, 80, 0, 'c9 70.jfif', '2021-01-13', 1, 45, 0, 264),
(21, 's7 EDGE', 'Samsung Cover,سمسنګ پوش', 'A', 140, 0, 1, 140, 0, 'WhatsApp Image 2020-08-11 at 10.00.31 AM.jpeg22.jpeg', '2021-01-13', 1, 100, 0, 107),
(22, 'Helal C9                                                                                            ', 'NOka USB,نوکه', 'A', 30, 0, 1, 30, 0, 'c99.jfif', '2021-01-13', 1, 15, 0, 345),
(23, 'Hilal S3', 'Car Charger,موټر چارجر', 'یوه نوکهA', 110, 0, 1, 110, 0, 's3.jpg', '2021-01-13', 1, 65, 0, 37),
(25, 'Interlink Speed', 'Car Charger,موټر چارجر', 'A', 70, 0, 1, 70, 0, 'Speed.jpg', '2021-01-13', 1, 65, 0, 39),
(26, 'Helal 280', 'Head phone,ګوشکی', 'A', 80, 0, 1, 80, 0, '280.jfif', '2021-01-13', 1, 40, 0, 60),
(27, 'AHM 340', 'Bettery Charger shamsi DC,بطری چارجری', 'b', 110, 0, 1, 110, 0, 'CamScanner_12-27-2020_11.49_1[1].jpg', '2021-01-13', 1, 85, 0, 511),
(29, 'Mtn50', 'Credit Card,کریدیټ کارټ', 'A', 0, 110, 2, 0, 220, 'mtn11.png', '2021-01-13', 2100, 95.6, 104.7619047619, 8),
(30, 'C5', 'Samsung Cover,سمسنګ پوش', 'B', 0, 150, 1, 0, 150, '3.jpg', '2021-01-13', 2100, 40, 71.428571428571, 188),
(31, 'C5', 'Samsung Glass,سیمسنګ شیشه ', 'A', 0, 100, 1, 0, 100, '4.jfif', '2021-01-13', 2100, 20, 47.619047619048, 447),
(32, 'ANIK power,30Af', 'Card Reader', 'A', 0, 60, 1, 0, 60, 'card reader.jfif', '2021-01-13', 2100, 8, 28.571428571429, 297),
(34, 'Car7', 'Car wireless MP3,موټر ', 'A', 0, 650, 1, 0, 650, 'CamScanner_12-27-2020_11.49_17[1].jpg', '2021-01-13', 2100, 280, 309.52380952381, 424),
(35, 'Muhabat j1 80af', 'Bettery Charger shamsi DC,بطری چارجری', 'B', 0, 160, 1, 0, 160, 'CamScanner_12-27-2020_11.49_3[1].jpg', '2021-01-13', 2100, 58, 76.190476190476, 444),
(36, 'Helal C9                                                                                            ', 'NOka USB,نوکه', 'A', 0, 60, 1, 0, 60, 'c99.jfif', '2021-01-13', 2100, 15, 28.571428571429, 345),
(37, 'Helal  5C for Nokia Mobile', 'Mobile Battery,موبایل بطری', 'A', 0, 270, 1, 0, 270, 'CamScanner_12-27-2020_11.49_26[1].jpg', '2021-01-13', 2100, 80, 128.57142857143, 434),
(38, 'Muhabat j1 80af', 'Bettery Charger shamsi DC,بطری چارجری', 'B', 0, 150, 1, 0, 150, 'CamScanner_12-27-2020_11.49_3[1].jpg', '2021-01-13', 2100, 58, 71.428571428571, 444),
(39, 'Awcc50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 1, 50, 0, 'awcc.jfif', '2021-01-14', 1, 47.6, 0, 16),
(40, 'Roshan50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 1, 50, 0, 'roshan.jfif', '2021-01-14', 1, 47.5, 0, 14),
(41, 'Ashina i118 mini', 'Battery,بطری', '1800mah', 150, 0, 1, 150, 0, '1.jfif', '2021-01-14', 1, 85, 0, 495),
(42, 'Roshan', 'Sim Cards,سیم کارټونه', 'A', 130, 0, 1, 130, 0, 'roshan22.jfif', '2021-01-14', 1, 20, 0, 544),
(43, 'Mtn50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 2, 100, 0, 'mtn11.png', '2021-01-14', 1, 95.6, 0, 8),
(44, 'Mtn50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 1, 50, 0, 'mtn11.png', '2021-01-14', 1, 47.8, 0, 8),
(45, '1Meter', 'AV Cable', 'C', 30, 0, 1, 30, 0, 'avvvv.jfif', '2021-01-14', 1, 12, 0, 354),
(46, 'Mtn50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 6, 300, 0, 'mtn11.png', '2021-01-14', 1, 286.8, 0, 8),
(47, 'Awcc50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 1, 50, 0, 'awcc.jfif', '2021-01-14', 1, 47.6, 0, 16),
(48, 'Roshan50', 'Credit Card,کریدیټ کارټ', 'A', 50, 0, 1, 50, 0, 'roshan.jfif', '2021-01-14', 1, 47.5, 0, 14),
(49, 'Roshan', 'Sim Cards,سیم کارټونه', 'A', 0, 340, 1, 0, 340, 'roshan22.jfif', '2021-01-14', 2100, 20, 161.90476190476, 544);

-- --------------------------------------------------------

--
-- Table structure for table `sold_mobiles`
--

CREATE TABLE `sold_mobiles` (
  `sold_mobile_id` int(11) NOT NULL,
  `sold_mobile_name` varchar(50) DEFAULT NULL,
  `sold_mobile_category` varchar(50) DEFAULT NULL,
  `sold_mobile_ram` varchar(50) DEFAULT NULL,
  `sold_mobile_storage` varchar(50) DEFAULT NULL,
  `sold_mobile_battery` varchar(50) DEFAULT NULL,
  `sold_mobile_quantity` int(11) DEFAULT NULL,
  `sold_mobile_color` varchar(50) DEFAULT NULL,
  `sold_mobile_pic` text DEFAULT NULL,
  `sold_mobile_price_af` double DEFAULT NULL,
  `sold_mobile_price_rs` double DEFAULT NULL,
  `sold_mobile_total_price_af` double DEFAULT NULL,
  `sold_mobile_total_price_rs` double DEFAULT NULL,
  `sold_mobile_date` date DEFAULT NULL,
  `sold_mobile_rate` float NOT NULL,
  `sold_mobile_basePrice` double NOT NULL,
  `sold_mobile_rstoaf` double NOT NULL,
  `sale_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sold_mobiles`
--

INSERT INTO `sold_mobiles` (`sold_mobile_id`, `sold_mobile_name`, `sold_mobile_category`, `sold_mobile_ram`, `sold_mobile_storage`, `sold_mobile_battery`, `sold_mobile_quantity`, `sold_mobile_color`, `sold_mobile_pic`, `sold_mobile_price_af`, `sold_mobile_price_rs`, `sold_mobile_total_price_af`, `sold_mobile_total_price_rs`, `sold_mobile_date`, `sold_mobile_rate`, `sold_mobile_basePrice`, `sold_mobile_rstoaf`, `sale_id`) VALUES
(2, 'A1K', 'Oppo Mobiles ', '2', '32', '4000', 1, 'Red,Black', 'a1k.jpg', 0, 18000, 0, 18000, '2021-01-13', 2100, 7300, 8571.4285714286, 187),
(3, 'J2', 'IVA Mobile ', '0', '0', '1000', 1, 'Green,Black', 'iva i2.png', 0, 1500, 0, 1500, '2021-01-14', 2100, 600, 714.28571428571, 70),
(4, 'X20', 'IVA Mobile ', '0', '0', '2700', 1, 'Blue,black Red', 'X20.jpg', 0, 3100, 0, 3100, '2021-01-15', 2100, 1350, 1476.1904761905, 60),
(5, 'A5S', 'Oppo Mobiles ', '3', '32', '3000', 1, 'Black', 'A5 oppo.jpg', 7770, 0, 7770, 0, '2021-01-15', 1, 7530, 0, 207),
(6, 'A5S', 'Oppo Mobiles ', '3', '32', '3000', 1, 'Black', 'A5 oppo.jpg', 8000, 0, 8000, 0, '2021-01-15', 1, 7530, 0, 207),
(7, 'Nokia 3310', 'Used  Mobiles ', '0', '0', '1200', 1, 'White', '33100.jfif', 1250, 0, 1250, 0, '2021-01-16', 1, 1120, 0, 173),
(8, 'N222', 'Q Mobiles ', '0', '0', '1200', 1, 'Black', 'N222.jpg', 0, 2600, 0, 2600, '2021-01-16', 2100, 1162, 1238.0952380952, 109),
(9, 'K118', 'Kechaoda Mobiles ', '0', '0', '800', 1, 'Golden', '118.jfif', 0, 1900, 0, 1900, '2021-01-16', 2100, 690, 904.7619047619, 159),
(11, 'Y120', 'Neda phone Mobiles ', '0', '0', '1000', 1, 'White', 'Neda phone.jpg', 0, 1800, 0, 1800, '2021-01-16', 2100, 740, 857.14285714286, 191),
(12, 'A1K', 'Oppo Mobiles ', '2', '32', '4000', 1, 'Red,Black', 'a1k.jpg', 0, 18000, 0, 18000, '2021-01-16', 2100, 7300, 8571.4285714286, 187),
(13, 'K4', 'Ashna phone Mobiles ', '0', '0', '2700', 1, 'White,Black', 'Neda phone.jpg', 0, 2850, 0, 2850, '2021-01-16', 2100, 1210, 1357.1428571429, 203),
(14, 'X10', 'IVA Mobile ', '0', '0', '1700', 1, 'BLACK', '', 0, 2300, 0, 2300, '2021-01-17', 2100, 910, 1095.2380952381, 224),
(15, 'F180 Prime', 'Mix All Mobiles ', '0', '0', '1450', 1, 'Black+Golden', 'f180.jfif', 0, 3000, 0, 3000, '2021-01-17', 2100, 1120, 1428.5714285714, 132),
(16, '3310 4Sim', 'Nokia Mobiles ', '0', '0', '1200', 1, 'Blue', '3310.jpg', 1600, 0, 1600, 0, '2021-01-18', 1, 1120, 0, 158),
(17, 'K4', 'Ashna phone Mobiles ', '0', '0', '2700', 1, 'White,Black', 'Neda phone.jpg', 1350, 0, 1350, 0, '2021-01-19', 1, 1210, 0, 203),
(18, 'G2 LP', 'Mix All Mobiles ', '0', '0', '1800', 1, 'Black', 'g2.jpg', 1150, 0, 1150, 0, '2021-01-20', 1, 1162, 0, 149),
(19, 'SAHAR 106', 'Mix All Mobiles ', '0', '0', '1000', 1, 'BIAK', '', 0, 1500, 0, 1500, '2021-01-20', 2100, 500, 714.28571428571, 223),
(20, 'Smart 4', 'INFINIX Mobiles ', '2', '32', '4000', 1, 'BIAK', '', 8800, 0, 8800, 0, '2021-01-21', 1, 6930, 0, 226);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Zaheer', '$2y$10$wkFZSKDzKsKGZHKWUvCAb.Hnbz/T9XtwN8DtJqcWE9V4eJtYJBgjW', '2020-08-26 22:59:27'),
(2, 'Admin', '$2y$10$wkFZSKDzKsKGZHKWUvCAb.Hnbz/T9XtwN8DtJqcWE9V4eJtYJBgjW', '2022-03-24 10:38:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deleteditems`
--
ALTER TABLE `deleteditems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deletedmobile`
--
ALTER TABLE `deletedmobile`
  ADD PRIMARY KEY (`mobile_id`);

--
-- Indexes for table `easyload`
--
ALTER TABLE `easyload`
  ADD PRIMARY KEY (`easyload_id`);

--
-- Indexes for table `easyload_total`
--
ALTER TABLE `easyload_total`
  ADD PRIMARY KEY (`easyload_total_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenses_id`);

--
-- Indexes for table `general_categories`
--
ALTER TABLE `general_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `general_items`
--
ALTER TABLE `general_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `loan_categories`
--
ALTER TABLE `loan_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`mobile_id`);

--
-- Indexes for table `mobile_categories`
--
ALTER TABLE `mobile_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD UNIQUE KEY `report_date` (`report_date`);

--
-- Indexes for table `sarafi`
--
ALTER TABLE `sarafi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_general_items`
--
ALTER TABLE `sold_general_items`
  ADD PRIMARY KEY (`sold_id`);

--
-- Indexes for table `sold_mobiles`
--
ALTER TABLE `sold_mobiles`
  ADD PRIMARY KEY (`sold_mobile_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deleteditems`
--
ALTER TABLE `deleteditems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=800;

--
-- AUTO_INCREMENT for table `deletedmobile`
--
ALTER TABLE `deletedmobile`
  MODIFY `mobile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `easyload`
--
ALTER TABLE `easyload`
  MODIFY `easyload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1558;

--
-- AUTO_INCREMENT for table `easyload_total`
--
ALTER TABLE `easyload_total`
  MODIFY `easyload_total_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_categories`
--
ALTER TABLE `general_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `general_items`
--
ALTER TABLE `general_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=800;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3305;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=560;

--
-- AUTO_INCREMENT for table `loan_categories`
--
ALTER TABLE `loan_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `mobile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `mobile_categories`
--
ALTER TABLE `mobile_categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sarafi`
--
ALTER TABLE `sarafi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sold_general_items`
--
ALTER TABLE `sold_general_items`
  MODIFY `sold_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3771;

--
-- AUTO_INCREMENT for table `sold_mobiles`
--
ALTER TABLE `sold_mobiles`
  MODIFY `sold_mobile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

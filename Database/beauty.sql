-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2017 at 08:55 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `Add_to_card_id` int(20) NOT NULL auto_increment,
  `Cust_id` int(20) NOT NULL,
  `Item_id` int(20) NOT NULL,
  `Quality` int(20) NOT NULL,
  `Price` int(20) NOT NULL,
  `Total_price` int(20) NOT NULL,
  PRIMARY KEY  (`Add_to_card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`Add_to_card_id`, `Cust_id`, `Item_id`, `Quality`, `Price`, `Total_price`) VALUES
(3, 1, 18, 2, 150, 300);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AId` int(5) NOT NULL auto_increment,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact` decimal(12,0) NOT NULL,
  `Emailid` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `RegisterDate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`AId`),
  UNIQUE KEY `Emailid` (`Emailid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AId`, `Name`, `Address`, `Contact`, `Emailid`, `Password`, `RegisterDate`) VALUES
(1, 'Hiral', 'Mavani', '9558944255', 'hiral.mavani.007@gmail.com', '123456', '2017-03-25 18:46:22'),
(3, 'urvashi', 'hjgkj', '69563635', 'urvi@gmail.com', '565656', '2016-03-29 16:23:10'),
(4, 'dhaval', 'Rjk', '7878162565', 'dhaval.psakhiya@gmail.com', '123456', '2017-03-25 18:55:20'),
(6, 'admin', 'hello', '1234567890', 'hiral.sukhadaam@gmail.com', '123456', '2017-03-25 20:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `APId` int(5) NOT NULL auto_increment,
  `BId` int(5) NOT NULL,
  `CId` int(5) NOT NULL,
  `ADate` date NOT NULL,
  `ATime` time NOT NULL,
  `Description` varchar(100) NOT NULL,
  `IsApprove` tinyint(1) NOT NULL,
  `RequestDate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `ReplyDate` date NOT NULL,
  PRIMARY KEY  (`APId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`APId`, `BId`, `CId`, `ADate`, `ATime`, `Description`, `IsApprove`, `RequestDate`, `ReplyDate`) VALUES
(2, 0, 0, '2016-03-29', '18:02:00', 'tiowefirwellvn', 0, '2016-04-02 17:16:19', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `beautician`
--

CREATE TABLE `beautician` (
  `BId` int(5) NOT NULL auto_increment,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact` decimal(12,0) NOT NULL,
  `City` varchar(15) NOT NULL,
  `SaloonName` varchar(30) NOT NULL,
  `SAddress` varchar(100) NOT NULL,
  `SCity` varchar(15) NOT NULL,
  `SArea` varchar(30) NOT NULL,
  `SZipcode` int(6) NOT NULL,
  `SContact` decimal(12,0) NOT NULL,
  `Emailid` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY  (`BId`),
  UNIQUE KEY `Emailid` (`Emailid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `beautician`
--

INSERT INTO `beautician` (`BId`, `Name`, `Address`, `Contact`, `City`, `SaloonName`, `SAddress`, `SCity`, `SArea`, `SZipcode`, `SContact`, `Emailid`, `Password`) VALUES
(1, 'jai ', 'iskon ', '9865327458', 'Ahmedabad', 'jai tiles shop', 'Iskon Ahamadabad', '', 'Main road ', 2533661, '9999999999', 'nhiral.sukhadaam@gmail.com', '123456'),
(5, 'ravi', 'rajkot', '356885152', 'Rajkot', 'ravi titles and senitary syste', 'nana mava rajkot', '', 'nana mava rajnagar maiin road', 360001, '1234567890', 'hiral.mavani.007@gmail.com', '123456'),
(8, 'a', 'a', '34', '', '', '', '', '', 0, '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CId` int(5) NOT NULL auto_increment,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(15) NOT NULL,
  `Zipcode` int(6) NOT NULL,
  `Contact` decimal(12,0) NOT NULL,
  `Emailid` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `RegisterDate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`CId`),
  UNIQUE KEY `Emailid` (`Emailid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CId`, `Name`, `Address`, `City`, `Zipcode`, `Contact`, `Emailid`, `Password`, `RegisterDate`) VALUES
(3, 'Keyur', 'nana mava, rajkot', 'Rajkot', 3355646, '355666665', 'kkl@gmail.com', '225342', '2017-03-25 20:34:53'),
(4, 'Dharmi', 'dsvdjfdkfd,kjf', 'Surat', 3655566, '9558646633', 'aa@gmail.com', '365463565', '2016-03-29 17:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FId` int(5) NOT NULL auto_increment,
  `CId` int(5) NOT NULL,
  `Feedback` varchar(100) NOT NULL,
  `FeedbackDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`FId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FId`, `CId`, `Feedback`, `FeedbackDate`) VALUES
(1, 0, 'good', '0000-00-00 00:00:00'),
(3, 0, 'fsf', '0000-00-00 00:00:00'),
(4, 0, ' i8ukko', '2016-04-09 05:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `IId` int(5) NOT NULL auto_increment,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(30) NOT NULL,
  `ProName` varchar(20) NOT NULL,
  `Contact` decimal(12,0) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `InqMsg` varchar(100) NOT NULL,
  PRIMARY KEY  (`IId`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`IId`, `Name`, `Address`, `City`, `ProName`, `Contact`, `Email`, `Date`, `InqMsg`) VALUES
(2, 'hch', 'bhghjn ', 'Surat', 'hjbj', '9454895556', 'dskfkl@gmail.com', '2016-04-02 17:38:04', 'jhiho'),
(3, 'fesd', 'dsfeef', 'Ahmedabad', 'dwrf', '68565366', 'jkdfkf@gmail.com', '2016-03-29 00:00:00', 'hbgggk');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `OIId` int(5) NOT NULL auto_increment,
  `TblId` int(5) NOT NULL,
  `PId` int(5) NOT NULL,
  `quality` int(5) NOT NULL,
  `Price` int(10) NOT NULL,
  `TotalPrice` int(10) NOT NULL,
  PRIMARY KEY  (`OIId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`OIId`, `TblId`, `PId`, `quality`, `Price`, `TotalPrice`) VALUES
(1, 2, 23, 3, 200, 600);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PId` int(5) NOT NULL auto_increment,
  `BId` int(5) NOT NULL,
  `PName` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `ImageUrl` varchar(100) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `UploadDate` date NOT NULL,
  PRIMARY KEY  (`PId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PId`, `BId`, `PName`, `Description`, `ImageUrl`, `Price`, `Quantity`, `UploadDate`) VALUES
(4, 0, 'aaa', 'qwerrtttyhnbnbn', 'grid-img1.jpg', '150.00', 1, '2016-04-06'),
(14, 0, 'bbb', 'asdddg', '07042016120417.jpg', '1200.00', 15, '2016-04-06'),
(16, 0, 'aa', 'awsssdd', '07042016120445.jpg', '1500.00', 120, '2016-04-06'),
(18, 0, 'qqq', 'sxdxx', '07042016120424.jpg', '150.00', 12, '2016-04-07'),
(19, 0, 'zzz', 'asdfhjkuiyuikyu', '07042016010414.jpg', '140.00', 150, '2016-04-06'),
(22, 0, 'ssssss', 'weqrwtryrytyuyut', '07042016010444.jpg', '1000.00', 85, '2016-04-05'),
(23, 0, 'jmuh', 'kmjuhk', '08042016120406.jpg', '200.00', 5, '2016-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `servicebooking`
--

CREATE TABLE `servicebooking` (
  `SBId` int(5) NOT NULL auto_increment,
  `CId` int(5) NOT NULL,
  `SId` int(5) NOT NULL,
  `SDate` date NOT NULL,
  `STime` time NOT NULL,
  `RequestDate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `IsApprove` tinyint(1) NOT NULL,
  `Reply` text NOT NULL,
  `ReplyDate` date NOT NULL,
  PRIMARY KEY  (`SBId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `servicebooking`
--

INSERT INTO `servicebooking` (`SBId`, `CId`, `SId`, `SDate`, `STime`, `RequestDate`, `IsApprove`, `Reply`, `ReplyDate`) VALUES
(2, 0, 0, '2016-04-29', '18:05:00', '2016-04-02 17:16:35', 0, 'wteyrhjjyt', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `SId` int(5) NOT NULL auto_increment,
  `BId` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `PhotoImage` varchar(100) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  PRIMARY KEY  (`SId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`SId`, `BId`, `Name`, `Description`, `PhotoImage`, `Price`, `Duration`) VALUES
(2, 0, 'aaa', 'wdfresddcdc', 'about-img.jpg', '125.00', '2'),
(3, 0, 'make up ', 'this is for bridal make up..', 'grid-img5.jpg', '1500.00', '2'),
(12, 0, 'mjm', 'mhn', '08042016120429.jpg', '200.00', '23'),
(13, 0, 'aaa', 'asdf', '08042016120450.jpg', '1500.00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `TblId` int(5) NOT NULL auto_increment,
  `CId` int(5) NOT NULL,
  `OrderNo` varchar(10) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `TotalPrice` int(7) NOT NULL,
  `OrderDate` date NOT NULL,
  `IsApproved` tinyint(1) NOT NULL,
  `Status` varchar(50) NOT NULL default 'Pending',
  PRIMARY KEY  (`TblId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`TblId`, `CId`, `OrderNo`, `Quantity`, `TotalPrice`, `OrderDate`, `IsApproved`, `Status`) VALUES
(1, 0, '1', 2, 125, '2016-12-05', 0, 'wfegrhtyjytj'),
(2, 5, 'V5IYFU', 1, 600, '0000-00-00', 0, 'Pending');

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2022 at 05:24 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tidbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adm_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'admin', '1234', 'admin@gmail.com', '2022-03-08 19:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `area_tbl`
--

DROP TABLE IF EXISTS `area_tbl`;
CREATE TABLE IF NOT EXISTS `area_tbl` (
  `ar_id` int(222) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_tbl`
--

INSERT INTO `area_tbl` (`ar_id`, `a_name`, `date`) VALUES
(4, 'Naranpura', '2022-03-24 16:02:52'),
(3, 'Iskon', '2022-03-24 04:21:38'),
(2, 'Gota', '2022-03-23 17:46:36'),
(5, 'Subhash bridge', '2022-04-11 17:03:17'),
(6, 'Shahibaug', '2022-04-11 17:03:17'),
(7, 'Vyaswadi', '2022-04-11 17:04:30'),
(8, 'Akhbarnagar', '2022-04-11 17:04:30'),
(9, 'Bhavasar Hostel', '2022-04-11 17:05:20'),
(10, 'Jaimangal', '2022-04-11 17:05:20'),
(11, 'Vejalpur', '2022-04-11 17:06:28'),
(12, 'S.G. Highway', '2022-04-11 17:06:28'),
(13, 'Naroda', '2022-04-11 17:07:08'),
(14, 'Nikol', '2022-04-11 17:07:08'),
(15, 'Memnagar', '2022-04-11 17:08:02'),
(16, 'Navrangpura', '2022-04-11 17:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

DROP TABLE IF EXISTS `customer_tbl`;
CREATE TABLE IF NOT EXISTS `customer_tbl` (
  `u_id` int(222) NOT NULL AUTO_INCREMENT,
  `ar_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`u_id`, `ar_id`, `username`, `f_name`, `email`, `phone`, `password`, `address`, `date`) VALUES
(1, 3, 'rahul1', 'kl rahullll ssaaaa', 'rahul@gmail.com', '9098909898', '12345678', 'near naranpura ahmedabad , 380063 , gujrat', '2022-04-11 16:59:52'),
(3, 2, 'parth', 'parth patel', 'parth@gmail.com', '9898989999', '12345678', 'near Gota ahmedabad', '2022-04-12 04:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `fooditem_tbl`
--

DROP TABLE IF EXISTS `fooditem_tbl`;
CREATE TABLE IF NOT EXISTS `fooditem_tbl` (
  `fi_id` int(222) NOT NULL AUTO_INCREMENT,
  `fp_id` int(222) DEFAULT NULL,
  `title` varchar(222) NOT NULL,
  `about` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`fi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fooditem_tbl`
--

INSERT INTO `fooditem_tbl` (`fi_id`, `fp_id`, `title`, `about`, `price`, `image`) VALUES
(1, 1, 'dal rice', 'eat healthy dal-rice ', '70.00', '6227b393bb456.jpg'),
(2, 1, 'puri sabji thali', 'eat delicious puri sabji', '50.00', '6227b4862f5f8.jpg'),
(4, 2, 'mendu wada', 'testy mendu wadas', '55.00', '6227b6a6e1e46.jpg'),
(5, 2, 'dal rice', 'testy', '80.00', '623a26696267a.jpg'),
(8, 4, 'Dal Rice Combo Tiffin', 'Rice (350 Gram) + Gujrati Dal ( 350 Gm) + 1 Buter Milk (200 Ml ) + Green Salad', '169.00', '6238aa0e56993.png'),
(9, 4, 'Mini Tiffin', '2 Sabji ( Choice Any 2 - Potato / Veg Sabji /Kathol) [100 Gm Each] + Rice / Khichadi [100 Gm Each] +Gujrati Dal / Kathiyawadi Kadhi / Gujrati Kadhi [100 Gm Each] + 1 Butter Milk (200Ml) + 5 Phulka Butter Roti + Green Salad', '214.00', '6238aaa0582d0.png'),
(10, 4, 'Puri Shak Tiffin', 'Potato Subji (350 Gm), 10 Poori 2 Pcs Gulab Jamboo, 200 ML Butter Milk, 100 Gm Green Salad', '189.00', '6238ab7115fed.png'),
(14, 5, 'Gujarati Small Tiffin', '1 veg sabji, 1 kathod sabji, 5 tawa roti, salad', '90.00', '6238bc527bfa1.png'),
(15, 5, 'Punjabi Small Tiffin', 'Serves 1 , 250 gms, 2 sabji Paneer (fix) , chana masala/ mix veg (optional ) 5 rotis | | Medium spicy | | Served Gravy | | Served with Salad (onion ) | |Gentle fried', '96.00', '6238bd423daed.png'),
(16, 5, 'Punjabi Special Tiffin', 'Serves 1 | Paneer sabji, regular vegetable sabji, 5 tawa butter roti, veg. Pulao, sweet rata, sala', '132.00', '6238bdf2a91fa.png'),
(17, 6, 'Seasonal Veg Eco Tiffin', 'Serve 1 | 3 chapati or 2 tawa paratha, served with seasonal veg of the day, tadka arhar dal or kadhi pakoda, steamed rice, masala onion and green chilli pickle.', '119.00', '623c0da495260.png'),
(18, 6, 'Seasonal Veg Mini Tiffin', 'Serve 1 | 4 chapati or 3 tawa paratha served with seasonal veg of the day, masala onion and green chilli pickle', '89.00', '623c0e0880758.png'),
(19, 6, 'Shuki Bhaji n Thepla Tiffin', 'Shuki Bhaji,thepla-5 and dahi', '165.00', '623c0fccdf603.png'),
(20, 7, 'Gujarati Small Tiffin', '1 veg sabji, 1 kathod sabji, 5 tawa roti, salad.', '90.00', '623c1067a3116.png'),
(21, 7, 'Punjabi Small Tiffin', 'Serves 1 , 250 gms, 2 sabji Paneer (fix) , chana masala/ mix veg (optional ) 5 rotis | | Medium spicy | | Served Gravy | | Served with Salad (onion ) | |Gentle fried', '96.00', '623c10ad0ed98.png'),
(22, 7, 'Punjabi Special Tiffin', 'Serves 1 | Paneer sabji, regular vegetable sabji, 5 tawa butter roti, veg. Pulao, sweet rata, salad.', '132.00', '623c10fbaa02d.png'),
(24, 4, 'Chana Masala & Rice Tiffin', 'Chana Masala & Rice', '108.00', '623c119983e4b.png'),
(25, 4, 'Veg Pulao & Dahi Tiffin', 'Serves 1, 500ml || A simple, yet all-timed favorite meal of veg pulao made with lots of veggies and Indian spices; served with dahi|', '96.00', '623c11da2a5ed.png'),
(26, 5, 'Executive Tiffin', '1 Hot Sweet + 1 Farshan + 2 Gujarati Subji + Guj Dal + Rice + 4 Fulka Roti + Chutney', '179.00', '623c133b39a4d.png'),
(27, 5, 'Veg Biryani Tiffin', 'Veg Biryani + Bundi Raita + Salad + Papad', '170.00', '623c1384be2ee.png'),
(28, 6, 'Veg Pulao Tiffin', 'Veg Pulao + Curd + Salad + Papad', '170.00', '623c13e0077d0.png'),
(29, 6, 'Special Punjabi Tiffin', 'Contains 1 Stater, 1 Paneer Subji, 1 Veg Subji, Jeera Rice, Dal Fry, 4 Fulka Roti, 1 Hot Sweet', '199.00', '623c1433c7557.png'),
(31, 8, 'Kathiyawadi Delux Tiffin', '3 Rotla, 2 Kathiyawadi Sabzi, Kathiyawadi Kadhi Khichdi, Sweet, Papad, Salad', '199.00', '623c157660dc3.png'),
(32, 8, 'Punjabi Delux Tiffin', '3 Paratha, 1 Paneer Butter Masala, 1 Punjabi Sabzi, Dal Fry, Jeera Rice, Sweet, Salad, Papad', '199.00', '623c15a6622f5.png'),
(33, 8, 'Gujarati Delux Tiffin', '5 Roti, 1 Bataka Sabzi, 1 Green Sabzi, Dal Rice, Salad, Papad, Farsan, Sweet', '199.00', '623c15cfd1570.png'),
(34, 9, 'Paratha Shaak Tiffin', '1 shaak & 2 pc paratha ', '80.00', '623c165994f66.png'),
(35, 9, 'Puri Shaak Tiffin', '5 pc puri & 1 shaak', '80.00', '623c168b784c8.png'),
(36, 9, 'Regular tiffin ', '5 Roti + Sabzi + Dal + Rice', '120.00', '623c16ac211e6.png');

-- --------------------------------------------------------

--
-- Table structure for table `foodprovider_tbl`
--

DROP TABLE IF EXISTS `foodprovider_tbl`;
CREATE TABLE IF NOT EXISTS `foodprovider_tbl` (
  `fp_id` int(222) NOT NULL AUTO_INCREMENT,
  `ar_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `t_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `image` text NOT NULL,
  `address` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodprovider_tbl`
--

INSERT INTO `foodprovider_tbl` (`fp_id`, `ar_id`, `username`, `t_name`, `email`, `phone`, `password`, `image`, `address`, `date`) VALUES
(1, 2, 'ifood', 'I food services', 'ifood@gmail.com', '9090909090', '12345678', '6227b31671d99.jpg', 'setu vertica opp. shayona Green behind Vodafon Tower,Gota                         ', '2022-04-12 03:16:51'),
(2, 3, 'ganesh', 'Ganesh tifin service', 'abc@gmail.com', '9898989898', '12345678', '6227b5a1aa1aa.jpg', 'near vastrapur 380066 ,ahmedabad,gujrat', '2022-04-12 03:17:55'),
(4, 3, 'tiffin', 'Ahmedabad Tiffin Service', 'ahmedabadtiffinservice@gmail.com', '6353872836', '12345678', '62386efe2d9f1.png', '5th floor,kala house, eca corporate huse, anand nagar, prahladnagar, ahmedabad', '2022-04-09 04:11:45'),
(5, 4, 'home made tiffin service', 'Home made tiffin service', 'homemadetiffinservice@gmail.com', '6353872836', 'qwezxc123', '62386f6e6403f.png', '2,narayan park-2,behind little wings, bopal, ahmedabad', '2022-04-11 18:05:36'),
(6, 3, 'ganesh tiffin service', 'Ganesh Tiffin Service', 'ganeshtiffinservice@gmail.com', '6353872836', 'qwezxc123', '62386ff82c18c.png', 'Indraprasth-2,Ambawadi,Ahmedabad-380006,near shreyas tekra', '2022-04-09 04:10:28'),
(7, 5, 'padmavati bhojnalay', 'Padmavati Bhojnalay', 'padmavatibhojanalay@gmail.com', '6353872836', 'qwezxc123', '623870ca64da2.png', '696 badsha ni pol,near tilak ground,gomtipur,ahmedabad-380021', '2022-04-11 18:05:45'),
(8, 5, 'annpurna tiffin service', 'Annpurna Tiffin Service', 'annpurnatiffinservice@gmail.com', '6353872836', 'qwezxc123', '6238715bc8818.png', 'chamund nagar, sabarmati , ahmedabad, near velji bhai no kuvo,near motera stadium', '2022-04-11 18:05:54'),
(9, 6, 'dipti tiffin service', 'Dipti Tiffin Service', 'diptitiffinservice@gmail.com', '6353872836', 'qwezxc123', '623871b378e0e.png', 'a/604,Swati florence,bopal,south bopal,Ahmedabad-380058', '2022-04-11 18:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

DROP TABLE IF EXISTS `remark`;
CREATE TABLE IF NOT EXISTS `remark` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`r_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 'closed', 'aedwed', '2022-04-10 16:24:57'),
(2, 'closed', 'aedwed', '2022-04-10 16:25:20'),
(3, 'closed', 'aedwed', '2022-04-10 16:25:33'),
(4, 'rejected', 'done', '2022-04-10 16:33:23'),
(5, 'in process', 'as', '2022-04-10 16:49:39'),
(6, 'closed', 'qwe', '2022-04-10 16:53:26'),
(7, 'in process', 'qwertyu', '2022-04-10 17:21:56'),
(8, 'rejected', 'qwerty', '2022-04-10 17:25:37'),
(9, 'in process', 'qwertyu', '2022-04-10 17:38:36'),
(10, 'in process', 'in process', '2022-04-10 17:44:19'),
(11, 'in process', 'done', '2022-04-10 17:58:38'),
(12, 'closed', 'qwert', '2022-04-10 18:05:28'),
(13, 'closed', 'qwertyu', '2022-04-10 18:14:58'),
(14, 'rejected', 'qwer', '2022-04-10 18:24:45'),
(15, 'rejected', 'rejected', '2022-04-12 04:48:24'),
(16, 'closed', 'done', '2022-04-12 06:02:51'),
(17, 'closed', 'done', '2022-05-03 07:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

DROP TABLE IF EXISTS `users_orders`;
CREATE TABLE IF NOT EXISTS `users_orders` (
  `o_id` int(222) NOT NULL AUTO_INCREMENT,
  `u_id` int(222) NOT NULL,
  `fp_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

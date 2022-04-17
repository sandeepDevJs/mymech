-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 03:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(10) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(25) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_name`, `admin_email`, `admin_pass`, `status`) VALUES
(1, 'Faisal', 'faisaladmin@gmail.com', 'mymechanicadmin@12', '');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(200) NOT NULL,
  `car_model` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_model`) VALUES
(1, 'Audi', 'Audi 50,Audi F103,Audi A2,Audi A3,Audi s3,Audi 100 Coupé S,Audi S4,Audi RS4'),
(2, 'BMW', 'BMW E24,BMW E24,BMW M3,BMW M5,BMW X6M,BMW Concept X6 ActiveHybrid,BMW 760,BMW 750,BMW 745i E23,BMW New Class,BMW 2002tii'),
(3, 'Datsun', 'Datsun Go,Datsun Roadster,Datsun Z-car,Datsun DC-3,Datsun Truck,Datsun redi-Go,Datsun Prince Homer,Datsun 200B,Datsun 1000 DeLuxe,Datsun 510,Datsun Bluebird 910,Datsun Roadster'),
(4, 'Fiat', 'Fiat Palio Adventure Locker,Fiat 500L,Fiat 500X,Fiat 124 Spider Europa,Fiat Qubo'),
(5, 'Ford', 'Ford 2GA,Ford 300,Ford 7W,Ford Abeille,Ford Anglia,Ford Anglia,Ford Aspire,Ford Capri'),
(6, 'Mahindra', 'Mahindra XUV500,Mahindra Xylo,Mahindra Thar,Mahindra Quanto,Mahindra Verito Vibe,Mahindra Scorpio.\r\n'),
(7, 'Nissan', 'Nissan Maxima,Nissan Leaf,Nissan GT-R,Nissan Almera,Nissan Skyline,Nissan Violet/Stanza,Nissan Caravan,Nissan Teana '),
(8, 'Tata', 'Tata Ace Zip,Tata Buses,Tata Construck,Tata Magic Iris,Tata Prima,nano'),
(9, 'Toyota', 'Toyota Celica,Toyota Supra,Toyota Prius Plug-in Hybrid,Toyota RSC,Toyota Celica X,Toyota QuickDelivery,Toyota Hilux Surf,Toyota Probox,Toyota Origin,Toyota TS010'),
(10, 'Volvo', 'Volvo Amazon,Volvo C202,Volvo C3-series,Volvo Duett,Volvo PV51,Volvo PV650 Series,Volvo PV444');

-- --------------------------------------------------------

--
-- Table structure for table `car_service`
--

CREATE TABLE `car_service` (
  `id` int(11) NOT NULL,
  `service` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_service`
--

INSERT INTO `car_service` (`id`, `service`, `description`, `price`) VALUES
(1, 'Car Service', 'Service: 10,000 Kms or 12 Months,Engine Oil Change,Oil Filte', '3499'),
(2, 'Car Service (with Synthetic oil)', 'Service: 15,000 Kms or 18 Months,Full Synthetic Engine Oil C', '4299'),
(3, 'Car Dry Cleaning', 'Car seat / seat cover dry cleaning Floor Carpet dry cleaning', '995');

-- --------------------------------------------------------

--
-- Table structure for table `garages`
--

CREATE TABLE `garages` (
  `garage_id` int(11) NOT NULL,
  `garage_name` varchar(50) NOT NULL,
  `garage_email` varchar(30) NOT NULL,
  `garage_phoneno` varchar(20) NOT NULL,
  `garage_pass` varchar(20) NOT NULL,
  `garage_add` varchar(200) NOT NULL,
  `location` varchar(100) NOT NULL,
  `log_in` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garages`
--

INSERT INTO `garages` (`garage_id`, `garage_name`, `garage_email`, `garage_phoneno`, `garage_pass`, `garage_add`, `location`, `log_in`) VALUES
(1, 'qq', 'q@q.q', '1234567890', '1234567890', 'sdfedfewefefedfdf', 'CST', 'Online'),
(3, 'faisal', 'fa@fa.fa', '1234567890', '1234567890', 'Goavndi', 'CST', '');

-- --------------------------------------------------------

--
-- Table structure for table `garage_history`
--

CREATE TABLE `garage_history` (
  `g_hid` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `total` varchar(20) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_model` varchar(200) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garage_history`
--

INSERT INTO `garage_history` (`g_hid`, `garage_id`, `user_name`, `user_phone`, `quote`, `total`, `car_name`, `car_model`, `date`) VALUES
(11, 3, 'qq', '12345678', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}', '4494', 'Audi', 'Audi F103', '2020/07/10'),
(12, 3, 'qq', '12345678', 'a:1:{i:0;s:1:\"2\";}', '4299', 'Audi', 'Audi F103', '2020/07/10');

-- --------------------------------------------------------

--
-- Table structure for table `garage_signup`
--

CREATE TABLE `garage_signup` (
  `garage_id` int(11) NOT NULL,
  `garage_name` varchar(50) NOT NULL,
  `garage_email` varchar(30) NOT NULL,
  `garage_phoneno` varchar(20) NOT NULL,
  `garage_pass` varchar(20) NOT NULL,
  `garage_add` varchar(200) NOT NULL,
  `location` varchar(100) NOT NULL,
  `log_in` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garage_signup`
--

INSERT INTO `garage_signup` (`garage_id`, `garage_name`, `garage_email`, `garage_phoneno`, `garage_pass`, `garage_add`, `location`, `log_in`) VALUES
(1, 'qq', 'q@q.q', '1234567890', '1234567890', 'sdfedfewefefedfdf', 'CST', 'Online'),
(3, 'faisal', 'fa@fa.fa', '1234567890', '1234567890', 'Goavndi', 'CST', 'Online'),
(4, 'Govandi Garage', 'comeonboys731@gmail.com', '+918850914482', '12345678', 'sadguru nagar', 'CST', ''),
(5, 'G Garage', 'pri@mail.com', '1234567890', '1234567890', 'Thane west', 'Thane', '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `loc_id` int(11) NOT NULL,
  `location` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `location`) VALUES
(1, 'CST'),
(2, 'Bandra'),
(3, 'Kurla'),
(4, 'antop hill'),
(5, 'Thane'),
(6, 'Virar'),
(7, 'Ghatkopar'),
(8, 'Vidhyavihar'),
(9, 'Tilak nagar'),
(10, 'nerul'),
(11, 'Chembur'),
(12, 'matunga'),
(13, 'Dadar'),
(14, 'parel');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qoute` varchar(255) NOT NULL,
  `total` varchar(25) NOT NULL,
  `car_name` varchar(80) NOT NULL,
  `model` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `is_accepted` int(11) NOT NULL DEFAULT 0,
  `garage_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `his_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `garage_name` varchar(200) NOT NULL,
  `date` varchar(24) NOT NULL,
  `qoute` varchar(255) NOT NULL,
  `total` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`his_id`, `user_id`, `garage_name`, `date`, `qoute`, `total`) VALUES
(5, 1, 'Kurla Garage', '2020/07/10', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '7798'),
(6, 1, 'faisal', '2020/07/10', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}', '4494'),
(7, 1, 'faisal', '2020/07/10', 'a:1:{i:0;s:1:\"2\";}', '4299');

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_phoneno` varchar(15) NOT NULL,
  `user_pass` varchar(40) NOT NULL,
  `log_in` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`user_id`, `user_name`, `user_email`, `user_phoneno`, `user_pass`, `log_in`) VALUES
(1, 'qq', '2@2.g', '12345678', 'qwertyuiop', 'Online'),
(26, 'fbbbdbdg', 'comeonboys731@gmail.', '1234567890', '1234567890', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_service`
--
ALTER TABLE `car_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garages`
--
ALTER TABLE `garages`
  ADD PRIMARY KEY (`garage_id`);

--
-- Indexes for table `garage_history`
--
ALTER TABLE `garage_history`
  ADD PRIMARY KEY (`g_hid`);

--
-- Indexes for table `garage_signup`
--
ALTER TABLE `garage_signup`
  ADD PRIMARY KEY (`garage_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`his_id`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `car_service`
--
ALTER TABLE `car_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `garages`
--
ALTER TABLE `garages`
  MODIFY `garage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `garage_history`
--
ALTER TABLE `garage_history`
  MODIFY `g_hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `garage_signup`
--
ALTER TABLE `garage_signup`
  MODIFY `garage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

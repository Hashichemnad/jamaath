-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2021 at 05:08 PM
-- Server version: 10.5.12-MariaDB-0+deb11u1
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamath`
--

-- --------------------------------------------------------

--
-- Table structure for table `annualpayment`
--

CREATE TABLE `annualpayment` (
  `apid` int(11) NOT NULL,
  `member_ref` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `year` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `done` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annualpayment`
--

INSERT INTO `annualpayment` (`apid`, `member_ref`, `date`, `year`, `amount`, `done`) VALUES
(39, 1, '2021-02-24', '2020', '1500', 0),
(40, 2, '2021-02-24', '2020', '1500', 0),
(41, 3, '2021-02-24', '2020', '1000', 0),
(42, 4, '2021-02-24', '2020', '700', 0),
(47, 5, '2021-02-28', '2020', '1500', 0),
(48, 1, '2021-02-28', '2021', '1500', 0),
(49, 2, '2021-02-28', '2021', '1500', 0),
(50, 3, '2021-02-28', '2021', '1000', 0),
(51, 4, '2021-02-28', '2021', '700', 0),
(52, 5, '2021-02-28', '2021', '1500', 0),
(58, 6, '2021-03-13', '2021', '1000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `annualpaymentpaid`
--

CREATE TABLE `annualpaymentpaid` (
  `appid` int(11) NOT NULL,
  `member_ref` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `reciept_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annualpaymentpaid`
--

INSERT INTO `annualpaymentpaid` (`appid`, `member_ref`, `date`, `amount`, `reciept_no`) VALUES
(1, 1, '2021-02-25', '750', '1325'),
(2, 1, '2021-02-26', '150', '2313'),
(3, 3, '2021-02-25', '500', '3122'),
(4, 3, '2021-02-26', '200', '5135'),
(5, 4, '2021-02-26', '250', '1352'),
(6, 1, '2021-03-13', '500', '215');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `amount`) VALUES
(1, 'A', '1200'),
(2, 'B', '1000'),
(3, 'C', '700');

-- --------------------------------------------------------

--
-- Table structure for table `coconutincome`
--

CREATE TABLE `coconutincome` (
  `food_id` int(11) NOT NULL,
  `member_ref` int(11) NOT NULL,
  `reciept_no` varchar(10) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coconutincome`
--

INSERT INTO `coconutincome` (`food_id`, `member_ref`, `reciept_no`, `date`, `amount`) VALUES
(1, 1, 'kd3152', '2021-03-26', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `bill_no` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `date`, `bill_no`, `amount`, `description`) VALUES
(3, '2021-02-02', 'sd2545', '3000', 'paint'),
(4, '2021-02-02', 'd545', '300', 'brush');

-- --------------------------------------------------------

--
-- Table structure for table `foodincome`
--

CREATE TABLE `foodincome` (
  `food_id` int(11) NOT NULL,
  `member_ref` int(11) NOT NULL,
  `reciept_no` varchar(10) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodincome`
--

INSERT INTO `foodincome` (`food_id`, `member_ref`, `reciept_no`, `date`, `amount`) VALUES
(1, 5, 'cd3153', '2021-02-28', '500');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reciept_no` varchar(100) DEFAULT NULL,
  `amount` varchar(20) NOT NULL,
  `category` varchar(200) NOT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `date`, `name`, `reciept_no`, `amount`, `category`, `remarks`) VALUES
(1, '2021-02-28', 'chemnad coco', 'dc1245', '1500', 'Coconut', '10kg'),
(2, '2021-02-27', 'chhheq', 'cd1323', '1000', 'Coconut', '7kg'),
(3, '2021-02-18', 'haashi', 'c235', '2500', 'Donation', 'berdhe');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(3) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `door_no` varchar(5) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `register_no` varchar(20) DEFAULT NULL,
  `category_ref` int(11) NOT NULL,
  `isjamaath` int(1) DEFAULT NULL,
  `coconut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `father_name`, `location`, `door_no`, `mobile`, `register_no`, `category_ref`, `isjamaath`, `coconut`) VALUES
(1, 'Hassan Kutty', 'Ahammed', 'Kolathotty', '143', '9847984776', 'C1214', 1, 1, 1),
(2, 'Ismail', 'Ahammed', 'Kolathotty', '144', '7356562727', 'c1435', 1, 1, 1),
(3, 'Musthafa', 'Ahammed', 'Kolathotty', '153', '9565489564', 'c1325', 2, 1, 0),
(4, 'Saifudeen', 'Ahammed', 'Kolathotty', '146', '956151564', 'C1436', 3, 1, 0),
(5, 'Mammadu', 'kadarcha', 'america', '3215', '98485654646', 'c213', 1, 0, 0),
(6, 'aslk', 'kjnjk', 'kjnjk', '156', '98465465', 'sdvds51456', 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `submember`
--

CREATE TABLE `submember` (
  `submember_id` int(11) NOT NULL,
  `member_ref` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `relation` varchar(25) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submember`
--

INSERT INTO `submember` (`submember_id`, `member_ref`, `name`, `relation`, `contact`) VALUES
(1, 1, 'Hasir abdulla', 'Son', '9567222485'),
(2, 1, 'Hanana', 'Daughter', '8547436581'),
(3, 3, 'Mazin', 'Son', '64865166'),
(4, 6, 'ascs', 'Husband', '646584');

-- --------------------------------------------------------

--
-- Table structure for table `workexpense`
--

CREATE TABLE `workexpense` (
  `weid` int(11) NOT NULL,
  `work_ref` int(11) NOT NULL,
  `bill_no` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workexpense`
--

INSERT INTO `workexpense` (`weid`, `work_ref`, `bill_no`, `date`, `amount`, `remarks`) VALUES
(1, 2, 'dc5656', '2021-01-01', '550', 'plate'),
(2, 1, 's5665', '2021-02-01', '500', 'plate'),
(3, 1, 'cs15615', '2021-01-01', '300', 'water'),
(4, 3, 'sda35165', '2021-03-20', '500', 'asldkjk');

-- --------------------------------------------------------

--
-- Table structure for table `workpayment`
--

CREATE TABLE `workpayment` (
  `wpid` int(11) NOT NULL,
  `work_ref` int(11) NOT NULL,
  `reciept` varchar(10) NOT NULL,
  `cash` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workpayment`
--

INSERT INTO `workpayment` (`wpid`, `work_ref`, `reciept`, `cash`, `name`, `date`, `amount`, `remarks`) VALUES
(1, 1, 'ccd2312', 1, 'hashir', '2021-01-01', '750', 'beef'),
(2, 1, 'x2132', 1, 'hanan', '2021-01-01', '1500', 'rice'),
(3, 1, 'aa', 0, 'haaa', '2021-01-01', '', 'Beef 10 kg'),
(4, 2, 'c323', 1, 'hashir', '2021-02-01', '500', 'berdthe'),
(5, 3, 'sd547', 1, 'aksbhj', '2021-03-13', '1500', 'kskc');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `work_id` int(11) NOT NULL,
  `work_name` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`work_id`, `work_name`, `date`, `description`) VALUES
(1, 'Ratheeb 2020', '2024-03-02', 'will be on monday'),
(2, 'ratheeb', '2021-12-20', 'on tuesdya'),
(3, 'ratheeb2021', '2021-03-13', 'sdcsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annualpayment`
--
ALTER TABLE `annualpayment`
  ADD PRIMARY KEY (`apid`),
  ADD UNIQUE KEY `member_ref` (`member_ref`,`year`);

--
-- Indexes for table `annualpaymentpaid`
--
ALTER TABLE `annualpaymentpaid`
  ADD PRIMARY KEY (`appid`),
  ADD KEY `member_ref` (`member_ref`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coconutincome`
--
ALTER TABLE `coconutincome`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `member_ref` (`member_ref`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `foodincome`
--
ALTER TABLE `foodincome`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `member_ref` (`member_ref`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `category_ref` (`category_ref`);

--
-- Indexes for table `submember`
--
ALTER TABLE `submember`
  ADD PRIMARY KEY (`submember_id`),
  ADD KEY `member_ref` (`member_ref`);

--
-- Indexes for table `workexpense`
--
ALTER TABLE `workexpense`
  ADD PRIMARY KEY (`weid`),
  ADD KEY `work_ref` (`work_ref`);

--
-- Indexes for table `workpayment`
--
ALTER TABLE `workpayment`
  ADD PRIMARY KEY (`wpid`),
  ADD KEY `work_ref` (`work_ref`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annualpayment`
--
ALTER TABLE `annualpayment`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `annualpaymentpaid`
--
ALTER TABLE `annualpaymentpaid`
  MODIFY `appid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coconutincome`
--
ALTER TABLE `coconutincome`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foodincome`
--
ALTER TABLE `foodincome`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `submember`
--
ALTER TABLE `submember`
  MODIFY `submember_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workexpense`
--
ALTER TABLE `workexpense`
  MODIFY `weid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workpayment`
--
ALTER TABLE `workpayment`
  MODIFY `wpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annualpayment`
--
ALTER TABLE `annualpayment`
  ADD CONSTRAINT `annualpayment_ibfk_1` FOREIGN KEY (`member_ref`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `annualpaymentpaid`
--
ALTER TABLE `annualpaymentpaid`
  ADD CONSTRAINT `annualpaymentpaid_ibfk_1` FOREIGN KEY (`member_ref`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `foodincome`
--
ALTER TABLE `foodincome`
  ADD CONSTRAINT `foodincome_ibfk_1` FOREIGN KEY (`member_ref`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`category_ref`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `submember`
--
ALTER TABLE `submember`
  ADD CONSTRAINT `submember_ibfk_1` FOREIGN KEY (`member_ref`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `workexpense`
--
ALTER TABLE `workexpense`
  ADD CONSTRAINT `workexpense_ibfk_1` FOREIGN KEY (`work_ref`) REFERENCES `works` (`work_id`);

--
-- Constraints for table `workpayment`
--
ALTER TABLE `workpayment`
  ADD CONSTRAINT `workpayment_ibfk_1` FOREIGN KEY (`work_ref`) REFERENCES `works` (`work_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

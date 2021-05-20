-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 07:46 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacylogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` int(20) NOT NULL,
  `CUSTOMER_NAME` varchar(20) NOT NULL,
  `CUSTOMER_EMAIL` varchar(20) NOT NULL,
  `CUSTOMER_PHNO` decimal(12,0) NOT NULL,
  `CUSTOMER_GENDER` varchar(8) NOT NULL CHECK (`CUSTOMER_GENDER` in ('Male','Female','Others'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `CUSTOMER_NAME`, `CUSTOMER_EMAIL`, `CUSTOMER_PHNO`, `CUSTOMER_GENDER`) VALUES
(1, 'Rajesh Sharma', 'rajesh@gmail.com', '9988776655', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(10) NOT NULL,
  `EMPLOYEE_NAME` varchar(20) NOT NULL,
  `STORE_ID` int(20) NOT NULL,
  `EMPLOYEE_EMAIL` varchar(20) NOT NULL,
  `EMPLOYEE_PHNO` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `EMPLOYEE_NAME`, `STORE_ID`, `EMPLOYEE_EMAIL`, `EMPLOYEE_PHNO`) VALUES
(1, 'Ram Kumar', 1, 'ramkumar@gmail.com', '8879223561');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `STORE_ID` int(20) NOT NULL,
  `MEDICINE_ID` int(20) NOT NULL,
  `QUANTITY` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`STORE_ID`, `MEDICINE_ID`, `QUANTITY`) VALUES
(1, 1, '25'),
(1, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `USERTYPE` varchar(10) NOT NULL CHECK (`USERTYPE` in ('admin','employee','customer'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`USERNAME`, `PASSWORD`, `USERTYPE`) VALUES
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MEDICINE_ID` int(20) NOT NULL,
  `MEDICINE_NAME` varchar(20) NOT NULL,
  `MANUFACTURER` varchar(20) NOT NULL,
  `PRICE` decimal(10,0) NOT NULL,
  `DATE_OF_MANUFACTURE` date NOT NULL,
  `DATE_OF_EXPIRY` date NOT NULL,
  `DESCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`MEDICINE_ID`, `MEDICINE_NAME`, `MANUFACTURER`, `PRICE`, `DATE_OF_MANUFACTURE`, `DATE_OF_EXPIRY`, `DESCRIPTION`) VALUES
(1, 'Calpol', 'Calpol', '20', '2021-01-14', '2021-12-14', 'for medicinal use'),
(2, 'Test', 'Test', '10', '2021-01-06', '2021-02-12', 'test'),
(3, 'Test', 'Test', '10', '2021-01-06', '2021-02-12', 'test'),
(6, 'TEST', 'TEST', '20', '2020-11-12', '2021-11-12', 'TEST'),
(7, 'TEST', 'TEST', '20', '2020-11-12', '2021-11-12', 'TEST'),
(8, 'Test2', 'Test2', '10', '2020-11-12', '2021-11-10', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(10) NOT NULL,
  `STORE_ID` int(10) NOT NULL,
  `MEDICINE_ID` int(10) NOT NULL,
  `CUSTOMER_ID` int(10) NOT NULL,
  `MED_QUANTITY` decimal(10,0) NOT NULL,
  `DATE_OF_PURCHASE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `STORE_ID`, `MEDICINE_ID`, `CUSTOMER_ID`, `MED_QUANTITY`, `DATE_OF_PURCHASE`) VALUES
(1, 1, 1, 1, '10', '2021-01-14'),
(2, 1, 1, 1, '2', '2021-01-14'),
(3, 1, 1, 1, '2', '2021-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `STORE_ID` int(20) NOT NULL,
  `STORE_ADDRESS` varchar(50) DEFAULT NULL,
  `STORE_CITY` varchar(10) NOT NULL,
  `STORE_STATE` varchar(10) NOT NULL,
  `STORE_EMAIL` varchar(20) NOT NULL,
  `STORE_PHNO` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`STORE_ID`, `STORE_ADDRESS`, `STORE_CITY`, `STORE_STATE`, `STORE_EMAIL`, `STORE_PHNO`) VALUES
(1, 'Brijenclave', 'Varanasi', 'UP', 'pharmacy@gmail.com', '9988443322');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD KEY `STORE_ID` (`STORE_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`STORE_ID`,`MEDICINE_ID`),
  ADD KEY `MEDICINE_ID` (`MEDICINE_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MEDICINE_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `STORE_ID` (`STORE_ID`),
  ADD KEY `MEDICINE_ID` (`MEDICINE_ID`),
  ADD KEY `CUSTOMER_ID` (`CUSTOMER_ID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`STORE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `MEDICINE_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `STORE_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`STORE_ID`) REFERENCES `store` (`STORE_ID`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`STORE_ID`) REFERENCES `store` (`STORE_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`MEDICINE_ID`) REFERENCES `medicine` (`MEDICINE_ID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`STORE_ID`) REFERENCES `store` (`STORE_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`MEDICINE_ID`) REFERENCES `medicine` (`MEDICINE_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`CUSTOMER_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

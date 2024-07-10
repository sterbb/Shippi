-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 02:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountID` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `name`, `username`, `password`, `remarks`) VALUES
(1, 'Jan Ryan Divinagracia', 'admin', 'admin', 'Admin'),
(2, 'Jem', 'eya', '123', 'Admin'),
(5, 'goku', 'gokuuuu', '123', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `gcash` bigint(20) NOT NULL,
  `pinwallet` int(11) NOT NULL,
  `wallet` int(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `cardnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `name`, `address`, `gcash`, `pinwallet`, `wallet`, `password`, `username`, `cardnumber`) VALUES
(3, 'goku', 'namek', 123, 123, 123, '123', 'geafeafaf', 123),
(9, 'Carl', 'Gwapa', 12313, 123, 5355325, '123', 'carl', 32131),
(22, 'Jemd', 'Mansilingan', 1654, 1231, 65465465, '123', 'hello', 165456),
(25, 'jan ryan', 'mansilingan', 913456789, 123, 100000, '123', 'asdfasd', 1000),
(26, 'hello', 'ako ni', 123, 123, 123, '123', 'asdfasdf', 123),
(30, 'adsfasd', 'fasdfasdf', 123, 123, 123, '123', 'asdfdasf', 123),
(31, 'hehehe', 'hehehehehe', 123, 123, 456594399, '123', 'dummy', 123),
(32, 'asf', 'asfas', 0, 0, 0, 'fasf', 'adfasd', 0),
(33, 'asdf', 'asfasf', 0, 0, 0, 'fasfas', 'asdfasdf', 0),
(34, 'asdf', 'asdfasfasd', 1231, 123, 123, '123', 'asdfdasf', 123),
(35, 'adsfasfasdf', 'asdfasf', 123, 123, 123, '123', 'asdfasdf', 123),
(36, 'Jew', 'Taculing', 123, 123, 123, '123', 'hello', 123);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productname` text NOT NULL,
  `price` int(11) NOT NULL,
  `variation` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `price`, `variation`, `image`) VALUES
(1, 'Poco X3 Pro', 15990, '256GB/12GB RAM', '1.png'),
(2, 'Samsung Galaxy A52', 18990, '256GB/8GB RAM', '2.png'),
(3, 'OPPO Reno5 5G', 23999, '256GB/12GB RAM', '3.png'),
(4, 'OnePlus 9 Pro', 25940, '256GB/8GB RAM', '4.png'),
(8, 'Nokia 3210', 500, '256GB/12GB RAM', '6.jpg'),
(9, 'IPhone13', 12315615, '256GB/12GB RAM', '5.jpg'),
(10, 'BlackShark', 456845, '256GB/12GB RAM', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `OrderID` int(11) NOT NULL,
  `productname` text NOT NULL,
  `productprice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `customer` text NOT NULL,
  `payment_method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`OrderID`, `productname`, `productprice`, `quantity`, `amount`, `customer`, `payment_method`) VALUES
(1, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(2, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(6, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'Cash On Delivery'),
(7, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'Cash On Delivery'),
(8, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(10, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(11, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(12, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'Cash On Delivery'),
(13, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(14, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'Cash On Delivery'),
(15, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(16, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(63, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(64, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(65, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(66, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(67, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(68, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(69, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(70, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(71, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(72, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(73, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Cash On Delivery'),
(74, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Cash On Delivery'),
(75, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Cash On Delivery'),
(76, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Cash On Delivery'),
(77, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Cash On Delivery'),
(78, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Cash On Delivery'),
(79, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Cash On Delivery'),
(80, 'OnePlus 9 Pro', 25940, 1, 25940, 'dummy lng dnay ah', 'GCash'),
(81, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(82, 'OnePlus 9 Pro', 25940, 1, 25940, 'dummy lng dnay ah', 'Cash On Delivery'),
(83, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'Cash On Delivery'),
(84, 'OnePlus 9 Pro', 25940, 1, 25940, 'dummy lng dnay ah', 'Cash On Delivery'),
(85, 'Poco X3 Pro', 12990, 5, 64950, 'dummy lng dnay ah', 'Cash On Delivery'),
(86, 'Samsung Galaxy A52', 18990, 2, 37980, 'dummy lng dnay ah', 'Cash On Delivery'),
(87, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'GCash'),
(88, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'Debit Card'),
(89, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'Shippi Wallet'),
(90, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'Shippi Wallet'),
(93, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'GCash'),
(94, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Debit Card'),
(95, 'OnePlus 9 Pro', 25940, 1, 25940, 'dummy lng dnay ah', 'Debit Card'),
(96, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Shippi Wallet'),
(97, 'OnePlus 9 Pro', 25940, 1, 25940, 'dummy lng dnay ah', 'Shippi Wallet'),
(98, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Shippi Wallet'),
(99, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Shippi Wallet'),
(100, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(101, 'Samsung Galaxy A52', 18990, 1, 18990, 'dummy lng dnay ah', 'Cash On Delivery'),
(102, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Shippi Wallet'),
(103, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'Cash On Delivery'),
(104, 'Poco X3 Pro', 12990, 1, 12990, 'dummy lng dnay ah', 'GCash'),
(105, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'GCash'),
(106, 'IPHONE 13', 12345665, 1, 12345665, 'dummy lng dnay ah', 'Debit Card'),
(107, 'OPPO Reno5 5G', 23999, 1, 23999, 'dummy lng dnay ah', 'Shippi Wallet'),
(108, 'OnePlus 9 Pro', 25940, 5, 129700, 'dummy lng dnay ah', 'Shippi Wallet'),
(109, 'Nokia 3210', 500, 1, 500, 'Carl', 'Cash On Delivery'),
(110, 'OnePlus 9 Pro', 25940, 1, 25940, 'Carl', 'Shippi Wallet'),
(111, 'Poco X3 Pro', 12990, 1, 12990, 'hehehe', 'Shippi Wallet'),
(112, 'OPPO Reno5 5G', 23999, 1, 23999, 'hehehe', 'Debit Card'),
(113, 'OnePlus 9 Pro', 25940, 1, 25940, 'hehehe', 'Shippi Wallet'),
(114, 'IPHONE 13', 12345665, 1, 12345665, 'hehehe', 'Shippi Wallet'),
(115, 'Poco X3 Pro', 12990, 7, 90930, 'Carl', 'Cash On Delivery'),
(116, 'Samsung Galaxy A52', 18990, 1, 18990, 'Carl', 'Cash On Delivery'),
(117, 'Poco X3 Pro', 12990, 1, 12990, 'Carl', 'GCash'),
(118, 'Samsung Galaxy A52', 18990, 1, 18990, 'Carl', 'Debit Card'),
(119, 'Poco X3 Pro', 12990, 1, 12990, 'Carl', 'Shippi Wallet'),
(120, 'Poco X3 Pro', 12990, 7, 90930, 'Carl', 'Cash On Delivery'),
(121, 'Nokia 3210', 500, 1, 500, 'Carl', 'Cash On Delivery'),
(122, 'Samsung Galaxy A52', 18990, 1, 18990, 'Carl', 'GCash'),
(123, 'OPPO Reno5 5G', 23999, 1, 23999, 'Carl', 'Debit Card'),
(124, 'Nokia 3210', 500, 1, 500, 'Carl', 'Shippi Wallet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`OrderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

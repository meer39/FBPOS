-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 09:10 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`) VALUES
(2, 'Tanveer Arshad', 'College road, Gulistan Colony, Barkat Town, daska', '03064798395'),
(3, 'tosief', 'qatar', '218975283658'),
(4, 'Touqeer Arshad', 'Pakistan', '098767836827'),
(5, 'Walk\'in ', 'shop', '');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `discount` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `discount`) VALUES
(1, '30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `cost`, `price`, `supplier`, `qty`, `size`, `color`, `category`) VALUES
(6, 'Ef0816801719', 'Trouser', '400', '500', 'Bareeze', 8, 'Small', 'White', 'Coton'),
(7, '32193128798', 'Hoodie', '2000', '2500', 'Colortex', 13, 'Medium', 'Black', 'Coton'),
(8, '395732498', 'Pant', '1000', '1500', 'Colortex', 8, 'Large', 'Purple', 'Dress'),
(14, '38598348598', 'Dress Shirt', '1000', '1200', 'Colortex', 4, 'X Large', 'White', 'Coton');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`transaction_id`, `invoice_number`, `date`, `suplier`, `remarks`) VALUES
(3, '123123', '2019-07-09', 'Khaadi', '213'),
(4, '67698987', '2019-07-10', 'Khaadi', ''),
(5, '75928349', '2019-07-11', 'Sapphire', 'thankx');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases_item`
--

INSERT INTO `purchases_item` (`id`, `name`, `qty`, `cost`, `invoice`) VALUES
(1, 'Ef0816801719', 5, '2500', '123123'),
(2, '395732498', 1, '1500', '67698987'),
(3, '32193128798', 10, '25000', '75928349'),
(4, '395732498', 4, '6000', '75928349');

-- --------------------------------------------------------

--
-- Table structure for table `return_product`
--

CREATE TABLE `return_product` (
  `id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `rtnQty` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashier` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_product`
--

INSERT INTO `return_product` (`id`, `invoice`, `product_code`, `amount`, `rtnQty`, `date`, `cashier`) VALUES
(6, 'RS-320252', 'Ef0816801719', '700', '2', '2019-07-10 14:17:25', NULL),
(7, 'RS-320252', 'Ef0816801719', '700', '2', '2019-07-10 14:22:24', NULL),
(8, 'RS-320252', 'Ef0816801719', '700', '2', '2019-07-10 14:23:42', NULL),
(9, 'RS-320252', 'Ef0816801719', '350', '1', '2019-07-10 14:27:29', NULL),
(10, 'RS-320252', '32193128798', '1750', '1', '2019-07-10 14:29:20', NULL),
(11, 'RS-320252', 'Ef0816801719', '350', '1', '2019-07-10 14:35:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `due_date`, `name`, `balance`) VALUES
(1, 'RS-3323240', 'Argie', '02/08/2014', 'credit', '100', '02/14/2014', 'Argie Policarpio', ''),
(2, 'RS-2352203', 'Argie', '07/02/2019', 'cash', '4000', '5000', 'Tanveer', ''),
(3, 'RS-922209', 'Argie', '07/02/2019', 'credit', '2000', '7/5/2019', 'Tanveer', ''),
(4, 'RS-0096202', 'Argie', '07/02/2019', 'cash', '9900', '10000', 'Tanveer', ''),
(5, 'RS-032023', 'Argie', '07/03/2019', 'cash', '1953', '', 'T', ''),
(6, 'RS-2770232', 'Argie', '07/03/2019', 'cash', '', '5000', 'Tanveer Arshad', ''),
(7, 'RS-63024', 'Argie', '07/04/2019', 'cash', '5990', '8000', 'Tanveer Arshad', ''),
(8, 'RS-233224', 'Argie', '07/06/2019', 'cash', '120', '100', 'ali', ''),
(9, 'RS-33339502', 'Argie', '07/07/2019', 'cash', '3110', '3500', '', ''),
(10, 'RS-0923202', 'Argie', '07/07/2019', 'cash', '7940', '8000', '', ''),
(11, 'RS-28302933', 'Argie', '07/08/2019', 'cash', '470', '500', '', ''),
(12, 'RS-3256072', 'Argie', '07/08/2019', 'cash', '470', '500', '', ''),
(13, 'RS-233350', 'Argie', '07/08/2019', 'cash', '470', '4000', '', ''),
(14, 'RS-3503', 'Argie', '07/08/2019', 'cash', '470', '500', '', ''),
(15, 'RS-235', 'Argie', '07/08/2019', 'cash', '470', '500', '', ''),
(16, 'RS-235', 'Argie', '07/08/2019', 'cash', '470', '500', '', ''),
(17, 'RS-33033863', 'Argie', '07/08/2019', 'cash', '470', '500', '', ''),
(18, 'RS-33033863', 'Argie', '07/08/2019', 'cash', '470', '500', '', ''),
(19, 'RS-5023663', 'Argie', '07/08/2019', 'cash', '470', '500', '', ''),
(26, 'RS-000390', 'Argie', '07/09/2019', 'cash', '350', '500', '', ''),
(27, 'RS-32333022', 'Argie', '07/09/2019', 'cash', '350', '500', '', ''),
(28, 'RS-03002', 'Argie', '07/09/2019', 'cash', '3850', '4000', '', ''),
(29, 'RS-7307934', 'Argie', '07/09/2019', 'cash', '2450', '2500', '', ''),
(30, 'RS-39622', 'Argie', '07/09/2019', 'cash', '470', '500', '', ''),
(31, 'RS-0222326', 'Argie', '07/09/2019', 'cash', '4200', '4300', '', ''),
(32, 'RS-33402202', 'Argie', '07/09/2019', 'cash', '2450', '2500', '', ''),
(33, 'RS-03333323', 'Argie', '07/09/2019', 'cash', '12950', '13000', '', ''),
(34, 'RS-2322233', 'Argie', '07/09/2019', 'cash', '1750', '2000', '', ''),
(35, 'RS-002233', 'Argie', '07/09/2019', 'cash', '4550', '5000', 'Tanveer Arshad', ''),
(36, 'RS-70303333', 'Argie', '07/09/2019', 'credit', '1750', '7/10/2019', 'Tanveer Arshad', ''),
(37, 'RS-0502302', 'Argie', '07/09/2019', 'cash', '1750', '2000', '', ''),
(38, 'RS-322222', 'Argie', '07/10/2019', 'cash', '3850', '', 'wa', ''),
(39, 'RS-3332920', 'Argie', '07/10/2019', 'cash', '2100', '', 'walk', ''),
(40, 'RS-3203', 'Argie', '07/10/2019', 'cash', '350', '500', 'Walk\'in ', ''),
(41, 'RS-726030', 'Argie', '07/10/2019', 'cash', '3850', '4000', 'walk', ''),
(42, 'RS-2323806', 'Argie', '07/10/2019', 'cash', '350', '500', '', ''),
(43, 'RS-003220', 'Argie', '07/10/2019', 'cash', '350', '500', '', ''),
(44, 'RS-320252', 'Argie', '07/10/2019', 'cash', '1890', '9000', 'Walk\'in ', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `name`, `price`, `discount`) VALUES
(1, 'RS-3323240', '001', '10', '100', '12\" Fiesta Green', '13', '3'),
(2, 'RS-0228233', '001', '10', '120', '12\" Fiesta Green', '13', '1'),
(3, 'RS-2352203', '12345', '2', '4000', 't-shirt', '2000', '0'),
(4, 'RS-922209', '12345', '1', '2000', 't-shirt', '2000', '0'),
(5, 'RS-0096202', '12345', '5', '9900', 't-shirt', '2000', '20'),
(8, 'RS-032023', '001', '1', '-17', '12\" Fiesta Green', '13', '30'),
(9, 'RS-032023', '12345', '1', '1970', 't-shirt', '2000', '30'),
(10, 'RS-63024', '8876', '1', '5990', 'Kurta', '6000', '10'),
(15, 'RS-233224', '001', '1', '120', '12', '150', '30'),
(17, 'RS-33339502', '364817236587', '1', '470', 'Trouser', '500', '30'),
(18, 'RS-33339502', '38598348598', '1', '1170', 'Dress Shirt', '1200', '30'),
(19, 'RS-33339502', '004', '1', '1470', 'Bareeze White Trouser', '1500', '30'),
(23, 'RS-0923202', '002', '1', '1970', 't-shirt', '2000', '30'),
(24, 'RS-0923202', '003', '1', '5970', 'Kurta', '6000', '30'),
(28, 'RS-20232', '38598348598', '1', '1170', 'Dress Shirt', '1200', '30'),
(37, 'RS-28302933', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(38, 'RS-3256072', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(39, 'RS-233350', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(40, 'RS-3503', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(41, 'RS-235', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(42, 'RS-33033863', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(43, 'RS-5023663', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(45, 'RS-96303033', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(46, 'RS-384923', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(49, 'RS-222539', 'Ef0816801719', '5', '2350', 'Trouser', '500', '30'),
(50, 'RS-240057', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(51, 'RS-0932970', 'Ef0816801719', '5', '2350', 'Trouser', '500', '30'),
(52, 'RS-2382053', 'Ef0816801719', '5', '2350', 'Trouser', '500', '30'),
(53, 'RS-9093232', 'Ef0816801719', '5', '2350', 'Trouser', '500', '30'),
(54, 'RS-920380', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(56, 'RS-000390', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(58, 'RS-32333022', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(60, 'RS-32230282', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(63, 'RS-32209332', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(64, 'RS-03002', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(65, 'RS-03002', '32193128798', '2', '3500', 'Hoodie', '2500', '30'),
(66, 'RS-7307934', '32193128798', '1', '1750', 'Hoodie', '2500', '30'),
(67, 'RS-7307934', 'Ef0816801719', '2', '700', 'Trouser', '500', '30'),
(68, 'RS-39622', 'Ef0816801719', '1', '470', 'Trouser', '500', '30'),
(69, 'RS-0222326', 'Ef0816801719', '2', '700', 'Trouser', '500', '30'),
(70, 'RS-0222326', '32193128798', '2', '3500', 'Hoodie', '2500', '30'),
(71, 'RS-33402202', 'Ef0816801719', '2', '700', 'Trouser', '500', '30'),
(72, 'RS-33402202', '32193128798', '1', '1750', 'Hoodie', '2500', '30'),
(73, 'RS-03333323', '32193128798', '1', '1750', 'Hoodie', '2500', '30'),
(74, 'RS-03333323', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(75, 'RS-03333323', '395732498', '2', '2100', 'Pant', '1500', '30'),
(76, 'RS-03333323', '32193128798', '5', '8750', 'Hoodie', '2500', '30'),
(78, 'RS-2322233', '32193128798', '1', '1750', 'Hoodie', '2500', '30'),
(79, 'RS-002233', '32193128798', '2', '3500', 'Hoodie', '2500', '30'),
(80, 'RS-002233', '395732498', '1', '1050', 'Pant', '1500', '30'),
(81, 'RS-70303333', '32193128798', '1', '1750', 'Hoodie', '2500', '30'),
(82, 'RS-0502302', '32193128798', '1', '1750', 'Hoodie', '2500', '30'),
(83, 'RS-322222', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(84, 'RS-322222', '32193128798', '2', '3500', 'Hoodie', '2500', '30'),
(85, 'RS-3332920', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(86, 'RS-3332920', '32193128798', '1', '1750', 'Hoodie', '2500', '30'),
(87, 'RS-3203', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(88, 'RS-726030', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(91, 'RS-726030', '32193128798', '2', '3500', 'Hoodie', '2500', '30'),
(92, 'RS-2323806', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(93, 'RS-003220', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(94, 'RS-320252', 'Ef0816801719', '0', '0', 'Trouser', '500', '30'),
(95, 'RS-320252', '32193128798', '2', '3500', 'Hoodie', '2500', '30'),
(96, 'RS-320252', '395732498', '1', '1050', 'Pant', '1500', '30'),
(97, 'RS-320252', '38598348598', '1', '840', 'Dress Shirt', '1200', '30');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`) VALUES
(3, 'Bareeze', 'Lahore', '03064798395'),
(5, 'Khaadi', 'Gujranwala', '0345123456'),
(6, 'Sapphire', 'Gujranwala', '03456785123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Argie', 'admin'),
(2, 'febe', 'febe', 'Febe', 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_product`
--
ALTER TABLE `return_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `return_product`
--
ALTER TABLE `return_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

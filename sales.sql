-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2019 at 09:06 AM
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
(5, 'Walk\'in ', 'shop', ''),
(6, 'OMER', 'MOHLLA ISLAM', '03064798395 ');

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
(1, '0'),
(2, '2019/07/30');

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
  `qty` int(10) DEFAULT '0',
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `cost`, `price`, `supplier`, `qty`, `size`, `color`, `category`) VALUES
(6, 'Ef0816801719', 'Trouser', '400', '500', 'Bareeze', 0, 'Small', 'White', 'Coton'),
(15, '350044961046', 'Chapal', '1400', '1600', 'Sapphire', 18, '7', 'Brown', 'Footwear'),
(17, '049769790711', 'Sandal', '1000', '1500', 'Bareeze', 27, '8', 'Black', 'Foot Wear'),
(18, '649081685468', 'Jacket', '1200', '1500', 'Sapphire', 5, 'M', 'Blue', 'Upper'),
(22, '538277464192', 'Kurti', '600', '1000', 'Bareeze', 10, 'Small', 'Purple', 'female'),
(23, '850977888937', 'Scarf', '300', '400', 'Khaadi', 4, '', 'Red', 'Female'),
(24, '722626310936', 'shirt', '1000', '1500', 'Sapphire', 47, '28', 'green', 'a'),
(25, '724967165630', 'Cap', '200', '300', 'Bareeze', 9, 'small', 'Black', 'b'),
(26, '010412034342', 'Scurt', '1000', '1200', 'Ahmad', 14, 'Small', 'Blue', 'A'),
(27, '410977468204', 'SHORT SHIRT', '1000', '1999', 'Khaadi', 7, 'Large', 'Black', 'Coton'),
(28, '614272547517', 'Hat', '500', '600', 'Sapphire', 0, 'small', 'gray', 'B'),
(30, 'Pv6VBHwA', 'belt', '200', '300', 'Sapphire', 8, 'universal', 'Brown', 'All');

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
(5, '75928349', '2019-07-11', 'Sapphire', 'thankx'),
(6, '73426589732', '2019-07-11', 'Bareeze', 'thankx'),
(7, '3498579328470', '2019-07-11', 'Sapphire', 'thankx'),
(15, '37419237', '2019-07-11', 'Khaadi', 'thankx'),
(16, '558957862', '2019-07-11', 'Sapphire', ''),
(17, '23450928039', '2019-07-12', 'Bareeze', ''),
(18, '87698798', '2019-07-12', 'Ahmad', 'thankx'),
(19, '5768970', '2019-07-12', 'Ahmad', ''),
(20, '887', '2019-07-12', 'Ahmad', ''),
(21, '123123', '2019-07-12', 'Khaadi', 'thankx'),
(22, '567890', '2019-07-19', 'Sapphire', '');

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
(4, '395732498', 4, '6000', '75928349'),
(5, '538277464192', 10, '10000', '73426589732'),
(6, '049769790711', 30, '45000', '73426589732'),
(7, '649081685468', 5, '7500', '3498579328470'),
(8, '350044961046', 18, '28800', '3498579328470'),
(10, '850977888937', 5, '2000', '37419237'),
(11, '722626310936', 50, '75000', '558957862'),
(12, '724967165630', 20, '6000', '23450928039'),
(13, '010412034342', 10, '12000', '87698798'),
(14, '010412034342', 5, '6000', '5768970'),
(15, '010412034342', 5, '6000', '887'),
(16, '410977468204', 12, '23988', '123123'),
(17, 'Pv6VBHwA', 10, '3000', '567890');

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
  `user` varchar(100) DEFAULT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'sale'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_product`
--

INSERT INTO `return_product` (`id`, `invoice`, `product_code`, `amount`, `rtnQty`, `date`, `user`, `type`) VALUES
(6, 'RS-320252', 'Ef0816801719', '700', '2', '2019-07-10 14:17:25', NULL, 'sale'),
(7, 'RS-320252', 'Ef0816801719', '700', '2', '2019-07-10 14:22:24', NULL, 'sale'),
(8, 'RS-320252', 'Ef0816801719', '700', '2', '2019-07-10 14:23:42', NULL, 'sale'),
(9, 'RS-320252', 'Ef0816801719', '350', '1', '2019-07-10 14:27:29', NULL, 'sale'),
(10, 'RS-320252', '32193128798', '1750', '1', '2019-07-10 14:29:20', NULL, 'sale'),
(11, 'RS-320252', 'Ef0816801719', '350', '1', '2019-07-10 14:35:46', NULL, 'sale'),
(12, 'RS-320252', '32193128798', '1750', '1', '2019-07-11 07:21:41', NULL, 'sale'),
(13, 'RS-320252', '32193128798', '1750', '1', '2019-07-11 07:25:22', 'admin', 'sale'),
(14, 'RS-320252', '395732498', '2100', '2', '2019-07-11 07:32:07', 'admin', 'sale'),
(15, 'RS-320252', '395732498', '2100', '2', '2019-07-11 07:34:02', 'admin', 'sale'),
(16, 'RS-320252', '395732498', '1050', '1', '2019-07-11 15:28:50', 'admin', 'sale'),
(18, '3498579328470', '350044961046', '4800', '3', '2019-07-12 06:53:08', 'admin', 'purchase'),
(22, '3498579328470', '350044961046', '3200', '2', '2019-07-12 07:03:36', 'admin', 'purchase'),
(23, '3498579328470', '649081685468', '1500', '1', '2019-07-12 07:14:44', 'admin', 'purchase'),
(24, '3498579328470', '649081685468', '6000', '4', '2019-07-12 07:15:34', 'admin', 'purchase');

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
(44, 'RS-320252', 'Argie', '07/10/2019', 'cash', '-6860', '9000', 'Walk\'in ', ''),
(45, 'RS-322209', 'Argie', '07/11/2019', 'cash', '350', '500', 'Tanveer Arshad', ''),
(46, 'RS-625020', 'Argie', '07/11/2019', 'cash', '2240', '2500', '', ''),
(47, 'RS-393360', 'Argie', '07/11/2019', 'cash', '3150', '3200', 'Tanveer Arshad', ''),
(48, 'RS-0330292', 'Argie', '07/11/2019', 'cash', '1970', '2000', 'Touqeer Arshad', ''),
(49, 'RS-02020036', 'Argie', '07/11/2019', 'cash', '495', '500', '', ''),
(50, 'RS-329932', 'Admin', '07/12/2019', 'cash', '570', '600', 'Tanveer Arshad', ''),
(51, 'RS-000662', 'Admin', '07/12/2019', 'cash', '3175', '5000', '', ''),
(52, 'RS-83360343', 'Admin', '07/12/2019', 'cash', '6255', '7000', 'OMER', ''),
(53, 'RS-32300803', 'Admin', '07/12/2019', 'cash', '10220.6', '15000', 'ALI', ''),
(54, 'RS-232092', 'Admin', '07/18/2019', 'cash', '500', '500', '', ''),
(55, 'RS-30322233', 'Admin', '07/18/2019', 'credit', '500', '7/20/2019', 'Tanveer Arshad', ''),
(56, 'RS-327233', 'Admin', '07/18/2019', 'cash', '285', '300', 'Tanveer Arshad', ''),
(57, 'RS-6233', 'Admin', '07/18/2019', 'credit', '2135', '2019-07-20', 'Tanveer Arshad', '');

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
(95, 'RS-320252', '32193128798', '0', '0', 'Hoodie', '2500', '30'),
(96, 'RS-320252', '395732498', '0', '0', 'Pant', '1500', '30'),
(97, 'RS-320252', '38598348598', '1', '840', 'Dress Shirt', '1200', '30'),
(98, 'RS-322209', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(99, 'RS-2238632', 'Ef0816801719', '1', '350', 'Trouser', '500', '30'),
(101, 'RS-625020', '350044961046', '2', '2240', 'Chapal', '1600', '30'),
(102, 'RS-393360', '049769790711', '2', '2100', 'Sandal', '1500', '30'),
(103, 'RS-393360', '049769790711', '1', '1050', 'Sandal', '1500', '30'),
(106, 'RS-23220328', '722626310936', '1', '1050', 'shirt', '1500', '30'),
(108, 'RS-0330292', 'Ef0816801719', '1', '450', 'Trouser', '500', '10'),
(109, 'RS-0330292', '350044961046', '1', '1520', 'Chapal', '1600', '5'),
(110, 'RS-02020036', 'Ef0816801719', '1', '495', 'Trouser', '500', '1'),
(111, 'RS-329932', '724967165630', '2', '570', 'Cap', '300', '5'),
(112, 'RS-000662', '724967165630', '5', '1350', 'Cap', '300', '10'),
(113, 'RS-000662', '722626310936', '1', '1425', 'shirt', '1500', '5'),
(114, 'RS-000662', '850977888937', '1', '400', 'Scarf', '400', '0'),
(116, 'RS-83360343', '010412034342', '5', '5400', 'Scurt', '1200', '10'),
(117, 'RS-83360343', '724967165630', '3', '855', 'Cap', '300', '5'),
(118, 'RS-32300803', '410977468204', '5', '8795.6', 'SHORT SHIRT', '1999', '12'),
(119, 'RS-32300803', '724967165630', '1', '285', 'Cap', '300', '5'),
(120, 'RS-32300803', '010412034342', '1', '1140', 'Scurt', '1200', '5'),
(121, 'RS-3320232', 'Ef0816801719', '1', '500', 'Trouser', '500', '0'),
(122, 'RS-232092', 'Ef0816801719', '1', '500', 'Trouser', '500', '0'),
(123, 'RS-30322233', 'Ef0816801719', '1', '500', 'Trouser', '500', '0'),
(125, 'RS-327233', 'Pv6VBHwA', '1', '285', 'belt', '300', '5'),
(126, 'RS-6233', 'Pv6VBHwA', '1', '285', 'belt', '300', '5'),
(127, 'RS-6233', 'Ef0816801719', '1', '500', 'Trouser', '500', '0'),
(128, 'RS-6233', '722626310936', '1', '1350', 'shirt', '1500', '10');

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
(6, 'Sapphire', 'Gujranwala', '03456785123'),
(7, 'Ahmad', 'Lahore', '03348154679');

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
(1, 'admin', 'admin', 'Admin', 'admin'),
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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `return_product`
--
ALTER TABLE `return_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

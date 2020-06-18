-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2020 at 11:11 AM
-- Server version: 5.6.47
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noaai_OkGroupSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `order_type` varchar(15) NOT NULL,
  `num_participants` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `order_date` varchar(15) NOT NULL,
  `name_contect` varchar(30) NOT NULL,
  `phone_contect` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `note` varchar(300) NOT NULL,
  `type_dish` varchar(30) NOT NULL,
  `final_price` float NOT NULL,
  `change_details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `order_type`, `num_participants`, `city`, `order_date`, `name_contect`, `phone_contect`, `status`, `note`, `type_dish`, `final_price`, `change_details`) VALUES
(4, 'shirmenzely@gmail.com', 'כנס ', 11, 'תל אביב', '11/10/2020', 'שיר מנזלי', '0525212063', 'נשלחה הצעת מחיר', ' ', 'בופה', 2300, ''),
(5, 'shirmenzely@gmail.com', 'אירוע חברה', 11, 'תל אביב', '11/10/2020', 'שיר מנזלי', '0525212063', 'נשלחה הצעת מחיר', ' ', 'בופה', 777, ''),
(6, 'shirmenzely@gmail.com', 'כנס ', 300, 'הרצליה', '07/08/2020', 'שיר מנזלי', '0525212063', 'ללא הצעת מחיר', ' ', 'הגשה', 90001, ''),
(8, 'shir@gmail.com', 'כנס ', 700, 'הרצליה', '22/09/2020', 'נועה אייזן', '0525212063', 'מאושר', ' ', 'בופה', 333, ''),
(9, 'shir@gmail.com', 'כנס ', 200, 'תל אביב', '11/07/2020', 'נועה', '0544554121', 'ללא הצעת מחיר', ' שלום', 'בופה', 0, ''),
(10, 'shir@gmail.com', 'אירוע חברה', 500, 'יבנה', '11/02/2021', 'Ron Biton', '0544554171', 'ללא הצעת מחיר', '', 'בופה', 100000, ''),
(11, 'yoni@gmail.com', 'אירוע חברה', 444, 'קיסריה', '13/03/2021', 'יוני חיים', '0525212555', 'מאושר', ' ', 'ללא הסעדה', 50500, ''),
(12, 'elad@gmail.com', 'כנס ', 150, 'ראש העין', '11/11/2020', 'אלעד ירין', '0568303028', 'ללא הצעת מחיר', ' ', 'ללא הסעדה', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `type` varchar(30) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`type`, `cost`) VALUES
('בופה', 200),
('הגשה', 250),
('ללא הסעדה', 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `code_supplier` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `profession` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`code_supplier`, `cost`, `profession`) VALUES
(1, 2500, 'זמר'),
(2, 3400, 'להקה'),
(3, 2000, 'סטנדאפיסט'),
(4, 3000, 'נגנים');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_in_order`
--

CREATE TABLE `supplier_in_order` (
  `code_supplier` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_in_order`
--

INSERT INTO `supplier_in_order` (`code_supplier`, `id_order`) VALUES
(1, 5),
(3, 5),
(2, 6),
(3, 6),
(1, 9),
(2, 9),
(1, 10),
(2, 11),
(4, 11),
(1, 12),
(3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `company` varchar(30) NOT NULL,
  `manager` tinyint(1) NOT NULL,
  `manager_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `password`, `company`, `manager`, `manager_name`) VALUES
('elad@gmail.com', '202cb962ac59075b964b07152d234b70', 'פאוור לינק', 0, ''),
('ronbi@mta.ac.il', 'ceeccba58c8224e828f8f645a217f011', '', 0, '0'),
('ronbitonn@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ron Biton', 0, ''),
('shir@gmail.com', '202cb962ac59075b964b07152d234b70', 'O,K. GROUP', 1, 'שיר מנזלי'),
('shirmenzely@gmail.com', '202cb962ac59075b964b07152d234b70', 'שיר', 0, '0'),
('yoni@gmail.com', '202cb962ac59075b964b07152d234b70', 'פול אנד בר', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`code_supplier`);

--
-- Indexes for table `supplier_in_order`
--
ALTER TABLE `supplier_in_order`
  ADD PRIMARY KEY (`code_supplier`,`id_order`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `code_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`user`);

--
-- Constraints for table `supplier_in_order`
--
ALTER TABLE `supplier_in_order`
  ADD CONSTRAINT `supplier_in_order_ibfk_1` FOREIGN KEY (`code_supplier`) REFERENCES `supplier` (`code_supplier`),
  ADD CONSTRAINT `supplier_in_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

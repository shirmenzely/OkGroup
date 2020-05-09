-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 02:43 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noaai_okgroupsystem`
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
  `order_date` varchar(11) NOT NULL,
  `name_contect` varchar(30) NOT NULL,
  `phone_contect` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `note` varchar(200) NOT NULL,
  `type_dish` varchar(20) NOT NULL,
  `final_price` float NOT NULL,
  `change_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `order_type`, `num_participants`, `city`, `order_date`, `name_contect`, `phone_contect`, `status`, `note`, `type_dish`, `final_price`, `change_details`) VALUES
(1, 'shir@gmail.com', 'הרצאה', 100, 'תל אביב', '26/12/2020', 'שיר', '0525212063', 'מאושר', '', 'הגשה', 30000, ''),
(3, 'shir@gmail.com', 'הרצאה', 100, 'תל אביב', '17/04/2020', 'שיר', '0525212063', 'ללא הצעת מחיר', '', 'בופה', 20000, ''),
(4, 'shir@gmail.com', 'כנס ', 11, 'asDD', '01/05/2020', 'SD', '0525212063', 'ללא הצעת מחיר', ' dfdds', 'בופה', 8003, ''),
(5, 'shirmenzely@gmail.com', 'כנס ', 102, 'הרצליה', '11/12/2019', 'שיר מנזלי', '0525212063', 'מאושר', ' ', 'הגשה', 31000, ''),
(6, 'shir@gmail.com', 'הרצאה', 11, 'תל אביב', '11/12/2020', 'שיר מנזלי', '0525212063', 'נשלחה הצעת מחיר', ' ', 'בופה', 0, ''),
(7, 'shirmenzely@gmail.com', 'הרצאה', 11, 'תל אביב', '11/10/2020', 'שיר מנזלי', '0525212063', 'מאושר', ' ', 'בופה', 0, ''),
(8, 'ee@gmail.com', 'הרצאה', 11, 'אזור', '11/12/2020', 'שיר מנזלי', '0525212063', 'ללא הצעת מחיר', ' ', 'בופה', 0, ''),
(9, 'ee@gmail.com', 'אירוע חברה', 11, 'אזור', '11/10/2020', 'שיר מנזלי', '0525212063', 'מאושר', ' ', 'בופה', 22, ''),
(10, 'ee@gmail.com', 'הרצאה', 11, 'תל אביב', '11/12/2030', 'שיר מנזלי', '0525212063', 'נשלחה הצעת מחיר', ' ', 'ללא הסעדה', 0, ''),
(11, 'shirmenzely@gmail.com', 'הרצאה', 11, 'Tel Yaf', '11/10/2020', 'Shir Menzely', '0525212063', 'מאושר ', ' ', 'ללא הסעדה', 0, ''),
(12, 'shirmenzely@gmail.com', 'כנס ', 6753060, 'תל אביב', '11/10/2020', 'שיר מנזלי', '0525212063', 'ללא הצעת מחיר', ' ', 'ללא הסעדה', 0, ''),
(13, 'shirmenzely@gmail.com', 'כנס ', 6753060, 'תל אביב', '11/09/2020', 'שיר מנזלי', '0525212063', 'מאושר', ' ', 'בופה', 11, ''),
(14, 'shirmenzely@gmail.com', 'כנס ', 11, 'sss', '11/10/2020', 'רון ביטון', '0525212063', 'מאושר', ' ', 'הגשה', 0, ''),
(15, 'shirmenzely@gmail.com', 'כנס ', 6753060, 'תל אביב', '24/05/2021', 'שיר מנזלי', '0525212063', 'ללא הצעת מחיר', ' ', 'בופה', 0, ''),
(16, 'shirmenzely@gmail.com', 'אירוע חברה', 450, 'Tel Aviv Yafo', '31/02/2021', 'Shir Menzely', '0525212063', 'ללא הצעת מחיר', ' אירוע מאוד חשוב ', 'הגשה', 0, ''),
(17, 'shirmenzely@gmail.com', 'כנס ', 450, 'קיסריה', '22/04/2022', 'רון ביטון', '0525212063', 'ללא הצעת מחיר', ' אירוע  מנהלים  ', 'בופה', 0, '');

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
('ללא', 100);

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
(1, 16),
(2, 9),
(2, 10),
(2, 12),
(3, 1),
(3, 4),
(3, 6),
(3, 7),
(3, 9),
(3, 10),
(3, 11),
(3, 16),
(4, 1),
(4, 4),
(4, 5),
(4, 6),
(4, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `company` varchar(30) NOT NULL,
  `manager` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `password`, `company`, `manager`) VALUES
('ee@gmail.com', '202cb962ac59075b964b07152d234b70', 'ww', 0),
('shir@gmail.com', '202cb962ac59075b964b07152d234b70', 'ddd', 0),
('shirmenzely@gmail.com', '202cb962ac59075b964b07152d234b70', 'שיר מנזלי', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

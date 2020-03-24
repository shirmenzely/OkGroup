-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 05:41 PM
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
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `order_type` varchar(15) NOT NULL,
  `num_participants` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `order_date` date NOT NULL,
  `name_contect` varchar(30) NOT NULL,
  `phone_contect` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `note` varchar(200) NOT NULL,
  `dishes` int(11) NOT NULL,
  `type_dish` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('shir1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'eee', 0),
('shir@gmail.com', '202cb962ac59075b964b07152d234b70', 'ddd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
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
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `code_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`user`);

--
-- Constraints for table `supplier_in_order`
--
ALTER TABLE `supplier_in_order`
  ADD CONSTRAINT `supplier_in_order_ibfk_1` FOREIGN KEY (`code_supplier`) REFERENCES `supplier` (`code_supplier`),
  ADD CONSTRAINT `supplier_in_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

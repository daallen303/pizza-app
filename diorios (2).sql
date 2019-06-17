-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 07:15 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diorios`
--

-- --------------------------------------------------------

--
-- Table structure for table `calzones`
--

CREATE TABLE `calzones` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `PriceS` varchar(255) NOT NULL,
  `PriceL` varchar(255) NOT NULL,
  `Toppings` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calzones`
--

INSERT INTO `calzones` (`Id`, `Name`, `PriceS`, `PriceL`, `Toppings`, `Description`) VALUES
(1, 'zone1', '12', '14', 'Onions Peppers Sausage', 'asd'),
(2, 'zone2', '10', '20', 'Pepperoni', 's');

-- --------------------------------------------------------

--
-- Table structure for table `dressings`
--

CREATE TABLE `dressings` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dressings`
--

INSERT INTO `dressings` (`Id`, `name`) VALUES
(1, 'Ranch'),
(2, 'Vinagrette');

-- --------------------------------------------------------

--
-- Table structure for table `fillings`
--

CREATE TABLE `fillings` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fillings`
--

INSERT INTO `fillings` (`Id`, `Name`) VALUES
(1, 'Meatball'),
(2, 'Ham');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `PriceS` double NOT NULL,
  `PriceL` double NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`Id`, `Name`, `Type`, `PriceS`, `PriceL`, `Description`) VALUES
(1, 'Ham', 'Strombolli', 20.25, 23.75, 'Ham Strombolli'),
(2, 'Sausage Rolls', 'Roll', 18.25, 18.25, 'Sausage rolls'),
(3, 'Roll', 'Roll', 0.75, 0.75, 'Just a roll'),
(4, 'Sausage', 'Strombolli', 10, 13, 'Sausage stromb'),
(5, 'Salami', 'Strombolli', 10, 13, 'Sausage stromb');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `PriceS` double NOT NULL,
  `PriceM` double NOT NULL,
  `PriceL` double NOT NULL,
  `PriceSl` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Toppings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`Id`, `Name`, `PriceS`, `PriceM`, `PriceL`, `PriceSl`, `Description`, `Toppings`) VALUES
(1, 'Cheese', 12.5, 14.25, 15.5, '2.65', 'Cheese', ''),
(2, 'All The Way', 16.25, 19.75, 20.75, '2.65', '', 'Pepperoni Onions Sausage Mushroom Olives Peppers Garlic'),
(3, 'Veggie', 16.25, 19.75, 20.75, '2.65', 'Veggies', 'Mushroom Olives Onions Peppers Garlic '),
(4, 'Custom', 12.5, 16.5, 20, '2.65', 'Custom pizza', ''),
(5, 'Dan\'s special', 12.5, 16.5, 20, '2.65', 'Dan\'s favorite pizza', 'Onions Peppers Mushroom Spinach Jalapenos');

-- --------------------------------------------------------

--
-- Table structure for table `salads`
--

CREATE TABLE `salads` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` double NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salads`
--

INSERT INTO `salads` (`Id`, `Name`, `Price`, `Description`) VALUES
(1, 'Sallymay', 23.3, 'Sally\'s favorite salad'),
(2, 'Philly', 1.2, 'Just lettuce'),
(3, 'Yummy', 2.67, 'Orange '),
(4, 'Tim tam', 14.3, 'Timm '),
(5, 'SK', 23.3, 'sd'),
(6, 'Good Salad', 12, 'Salad');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `Id` int(11) NOT NULL,
  `Size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `PriceH` double NOT NULL,
  `PriceF` double NOT NULL,
  `Temp` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs`
--

INSERT INTO `subs` (`Id`, `Name`, `PriceH`, `PriceF`, `Temp`, `Description`) VALUES
(1, 'Cheese', 7.5, 9.5, 'Cold', 'yum'),
(2, 'Pastromi', 8, 9.5, 'Cold', 'Yummy pastromi'),
(3, 'Chicken', 9.5, 7, 'Hot', 'Chicky'),
(4, 'Panini', 9.5, 8.5, 'Hot', 'Yummy panini'),
(5, 'Veggie', 6, 8, 'Cold', 'No meat'),
(6, 'Tuna', 8, 10, 'Cold', 'tuna');

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE `toppings` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`Id`, `Name`) VALUES
(1, 'Pepperoni'),
(2, 'Onions'),
(3, 'Peppers'),
(4, 'Pineapple'),
(5, 'Sausage'),
(6, 'Mushroom'),
(7, 'Olives'),
(8, 'Onions'),
(9, 'Garlic'),
(10, 'Anchovies'),
(11, 'Spinach'),
(12, 'Canadian Bacon'),
(13, 'Jalapenos'),
(14, 'Extra Cheese'),
(15, 'Meetball');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calzones`
--
ALTER TABLE `calzones`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `dressings`
--
ALTER TABLE `dressings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fillings`
--
ALTER TABLE `fillings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `salads`
--
ALTER TABLE `salads`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calzones`
--
ALTER TABLE `calzones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dressings`
--
ALTER TABLE `dressings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fillings`
--
ALTER TABLE `fillings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `salads`
--
ALTER TABLE `salads`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

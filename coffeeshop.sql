-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 06:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `IDCart` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `IDItem` int(11) NOT NULL,
  `HargaItem` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`IDCart`, `IDUser`, `IDItem`, `HargaItem`) VALUES
(1, 22, 4, '100000.00'),
(10, 22, 6, '60000.00');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `IDCheckout` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `MetodeBayar` varchar(255) COLLATE utf8_bin NOT NULL,
  `MetodeKirim` varchar(255) COLLATE utf8_bin NOT NULL,
  `Waktu_Checkout` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`IDCheckout`, `IDUser`, `MetodeBayar`, `MetodeKirim`, `Waktu_Checkout`, `Status`) VALUES
(12, 22, 'BNI', 'POS', '2020-12-15 02:16:31', 'Dalam Proses');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_items`
--

CREATE TABLE `checkout_items` (
  `IDItem` int(11) NOT NULL,
  `IDCheckout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `checkout_items`
--

INSERT INTO `checkout_items` (`IDItem`, `IDCheckout`) VALUES
(4, 12),
(6, 12),
(6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `IDItem` int(11) NOT NULL,
  `Gambar` varchar(255) COLLATE utf8_bin NOT NULL,
  `Nama` varchar(255) COLLATE utf8_bin NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`IDItem`, `Gambar`, `Nama`, `Harga`, `Stok`) VALUES
(4, 'Image/mokapot.jpeg', 'Moka Pot', '100000.00', 8),
(6, 'Image/Vietnamdrip.jpeg', 'Vietnam Drip', '60000.00', 11),
(7, 'Image/espressomaker.jpeg', 'Espresso Maker', '1500000.00', 10),
(8, 'Image/Pourover.jpeg', 'Pour Over', '80000.00', 10),
(9, 'Image/Frenchpress.jpg', 'French Press', '100000.00', 20),
(10, 'Image/Manualgrinder.jpeg', 'Manual Grinder', '80000.00', 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDUser` int(11) NOT NULL,
  `NamaLengkap` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `KodePos` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDUser`, `NamaLengkap`, `Email`, `Alamat`, `KodePos`, `Password`) VALUES
(4, 'Sutejo', 'sutejo@yahoo.com', 'Jl. Podomoro RT. 33 No. 11 Kab. Malang', '57139', '$2y$10$33VxTCEeP6P1BItu5YkqiOoisFkjAhmilb4e6jRwULklnLjrLY6GC'),
(6, 'Budi', 'bapakbudi@gmail.com', 'Jl. Setia Budi No. 01 Kab Bandung', '40258', '$2y$10$5pz4akFRlt350CpseYmyGeuAORIxUu6VC.PITGU9auMck3e4u4tZu'),
(13, 'Rafif', 'rafif@gmail.com', 'Manado', '54321', '$2y$10$gyFQhwBVzGj4DKlmGxzSnOWa/Rx/OFwZ15azWvXiucXDQie8l1yQC'),
(14, 'Adit', 'adit@gmail.com', 'Banjarmasin', '57139', '$2y$10$vKIKHXhnWLsdZJq2gIrsYOuRaS18eWiQQtUc5ae/LTqZ8xzlMMT0i'),
(15, 'Dani', 'dani@yahoo.com', 'Jember', '57139', '$2y$10$wF9u9qTLdssYin5eSrSTEOwBcX00jXctiKpxbb5TjUAFbdVIgHSZq'),
(16, 'Hanif', 'hanif@ymail.com', 'Klaten', '57139', '$2y$10$UI2ajk9.rmWer/IpzzgO/.JuLQx22Ls2z9xt2rNEcWkis.pm77w3m'),
(18, 'Garfield', 'orange_cat@ymail.com', 'da', '74413', '$2y$10$0ucpiV2EAumYa1i0Jlhpp.l0OqNM4l00kmAUOf0gCI3DMfLvZA69G'),
(20, 'Hafiz', 'tapiz@gmail.com', 'Bangka', '57139', '$2y$10$Wq55VmWc7W6ld0pOZ5Z18efjet97jra9J5IX2XZKcrAvpjHPauJQi'),
(22, 'Reggi Fachri', 'rfachri.exe@gmail.com', 'Tenggarong', '75513', '$2y$10$s17hpjNgazNhF6eEAizWz.pfpw/zIVA1mAyFMLWi6ISEngeXG6cLm'),
(24, 'Budiman', 'budi@gmail.com', 'Tenggarong', '75513', '$2y$10$kBpkPTzU9CGewrJGxA4p9u8.vnAwaQYxPM.J/oQMD3LtsIQvA8uY.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`IDCart`),
  ADD KEY `Item` (`IDItem`),
  ADD KEY `User` (`IDUser`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`IDCheckout`);

--
-- Indexes for table `checkout_items`
--
ALTER TABLE `checkout_items`
  ADD KEY `IDCheckout` (`IDCheckout`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`IDItem`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `IDCart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `IDCheckout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `IDItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Item` FOREIGN KEY (`IDItem`) REFERENCES `item` (`IDItem`) ON UPDATE CASCADE,
  ADD CONSTRAINT `User` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`) ON UPDATE CASCADE;

--
-- Constraints for table `checkout_items`
--
ALTER TABLE `checkout_items`
  ADD CONSTRAINT `CheckoutItem` FOREIGN KEY (`IDCheckout`) REFERENCES `checkout` (`IDCheckout`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

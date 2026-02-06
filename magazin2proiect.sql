-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2026 at 08:30 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazin2proiect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin1', '$2y$10$4az7dNRDEQ2GKplUhs23Nea/GQ8Ngc5V/kFxZngkvmHIiPT4t7m8O', 'admin1@admin.ro'),
(2, 'catalina', '$2y$10$/XivxFheUmJLoZqx26qIdO6MZioDAJtWsP10R2yizHalTSMxiiF5i', 'catalina@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `id_member` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `product_id`, `quantity`, `id_member`) VALUES
(1, 1, 6, 1),
(2, 2, 6, 2),
(3, 3, 6, 3),
(4, 4, 6, 4),
(5, 5, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `descriere` text NOT NULL,
  `categorie` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `code`, `image`, `price`, `descriere`, `categorie`) VALUES
(1, 'Smartwatch', 'SW001', 'https://lcdn.altex.ro/media/catalog/product/s/m/smartwatch_huawei_watch_d2_black_02_f8211bdb.jpg', 499.99, 'Smartwatch cu monitorizare cardiaca si rezistenta la apa', 'Electronice'),
(2, 'Camera Foto', 'CAM002', 'https://i5.walmartimages.com/asr/f19eafa7-34df-43a7-b8c8-d2d278591a01.a2330695baba8634b2ffb3aedb0af159.jpeg', 1299.00, 'Camera DSLR profesionala cu obiectiv 18-55mm', 'Foto-Video'),
(3, 'Boxe Bluetooth', 'BOX003', 'https://cdn.badabum.ro/images/products/img_202309291624/381667/normal/sony-boxa-portabila-sony-ult-field-1-ult-power-sound-bluetooth-5-3-rezistenta-la-apa-ip67-ult-power-sound-autonomie-12-ore-negru-1355411.jpg', 199.50, 'Boxe portabile cu bass puternic si autonomie 12 ore', 'Audio'),
(4, 'Tastatura Mecanica', 'KB004', 'https://s1.cel.ro/images/descriere/2024/05/02/Tastatura-Gaming-Mecanica-Logitech-G-Pro-GX-Blue-Switch-RGB-920-0093921.jpg', 349.00, 'Tastatura mecanica RGB cu switch-uri Blue', 'Calculatoare'),
(5, 'Monitor 24inch', 'MON005', 'https://lcdn.altex.ro/media/catalog/product/m/o/monitor_dell_pro_e2425hsm_01_bd1e912e.jpg', 899.00, 'Monitor LED 24 inch Full HD cu port HDMI', 'Calculatoare'),
(6, 'Telefon Samsung', '1234', 'https://lcdn.mediagalaxy.ro/media/catalog/product/t/e/telefon_samsung_galaxy_a16_black_04_94fe2a59.jpg', 1500.00, 'Telefon Samsung Galaxy A16 cu camera triple 50MP', 'Telefoane');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(2, 'alex_shop', 'alex123', 'alex@shop.com'),
(3, 'mihai_store', 'mihai456', 'mihai@store.ro'),
(4, 'cristina_buy', 'cristina789', 'cristina@buy.com'),
(5, 'andrei_mall', 'andrei000', 'andrei@mall.ro'),
(6, 'diana_shop', 'diana111', 'diana@shop.com'),
(7, 'lupu', '$2y$10$VCUK8jic3JoIUJ4.TVG9oOMLqGSP/JULDRvT7nziVbS./RbI8vTta', ''),
(8, 'ioana', '$2y$10$HO8XN0uKRIUEXsIgaB6uZOlvLFWK1I46yZjgM3HmI/B3eB1yHxRB.', 'ioana44@gmail.com'),
(9, 'test1', '$2y$10$HAMG5QQnVRksSI9cVipjzenk.kR4DVeplohvk/.nCbaCcfbmLnvme', 'test1@test.ro'),
(10, 'mircea', '$2y$10$Kfd6jxu.xp8LKruzPWu9M.bP9mNfwT3xPoGTL12jY4fOP3dgt2lpO', 'mircea22@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

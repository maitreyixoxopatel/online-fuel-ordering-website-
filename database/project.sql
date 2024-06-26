-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2023 at 01:05 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_Id` int NOT NULL AUTO_INCREMENT,
  `User_Id` int NOT NULL,
  `Qty` int NOT NULL,
  `Product_Id` int NOT NULL,
  `Product_Price` int NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Cart_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Cat_Id` int NOT NULL AUTO_INCREMENT,
  `Cat_Name` varchar(250) NOT NULL,
  `Cat_img` varchar(250) NOT NULL,
  PRIMARY KEY (`Cat_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_Id`, `Cat_Name`, `Cat_img`) VALUES
(1, 'Gas', 'Gas.PNG'),
(2, 'Diesel', 'diesel.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Email` varchar(200) NOT NULL,
  `Subject` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Message` text NOT NULL,
  `Contect_Id` int NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Last_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Contect_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Email`, `Subject`, `Message`, `Contect_Id`, `First_Name`, `Last_Name`) VALUES
('dhruvi@gmail.com', '123', 'test mes', 1, 'dhruvi', 'shah');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Feedback` text NOT NULL,
  `Feedback_Date` date NOT NULL,
  `User_Id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `User_Id` (`User_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Feedback`, `Feedback_Date`, `User_Id`) VALUES
(2, '1212121212121212', '2023-04-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

DROP TABLE IF EXISTS `orderitem`;
CREATE TABLE IF NOT EXISTS `orderitem` (
  `OrderItem_Id` int NOT NULL AUTO_INCREMENT,
  `Quantity` int NOT NULL,
  `Order_Id` int NOT NULL,
  `Product_Id` int NOT NULL,
  `Amount` varchar(20) NOT NULL,
  PRIMARY KEY (`OrderItem_Id`),
  KEY `Order_Id` (`Order_Id`),
  KEY `Product_Id` (`Product_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`OrderItem_Id`, `Quantity`, `Order_Id`, `Product_Id`, `Amount`) VALUES
(1, 2, 12, 1, '40'),
(2, 3, 13, 1, '60'),
(3, 7, 14, 1, '350'),
(4, 10, 15, 1, '500'),
(5, 10, 16, 1, '500'),
(6, 10, 17, 1, '500');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_Id` int NOT NULL AUTO_INCREMENT,
  `Status` varchar(200) NOT NULL,
  `User_Id` int NOT NULL,
  `Product_Id` int NOT NULL,
  `Order_Date` date NOT NULL,
  PRIMARY KEY (`Order_Id`),
  KEY `User_Id` (`User_Id`),
  KEY `Product_Id` (`Product_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `Status`, `User_Id`, `Product_Id`, `Order_Date`) VALUES
(1, '1', 1, 1, '2023-04-22'),
(2, '2', 1, 1, '2023-04-22'),
(3, '0', 1, 1, '2023-04-22'),
(4, '0', 1, 1, '2023-04-22'),
(5, '0', 1, 1, '2023-04-22'),
(6, '0', 1, 1, '2023-04-22'),
(7, '0', 1, 1, '2023-04-22'),
(8, '0', 1, 1, '2023-04-22'),
(9, '0', 1, 1, '2023-04-22'),
(10, '0', 1, 1, '2023-04-22'),
(11, '0', 1, 1, '2023-04-22'),
(12, '0', 1, 1, '2023-04-22'),
(13, '1', 1, 1, '2023-04-22'),
(14, '0', 1, 1, '2023-04-22'),
(15, '0', 1, 1, '2023-04-22'),
(16, '0', 1, 1, '2023-04-22'),
(17, '0', 1, 1, '2023-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Product_Id` int NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(250) NOT NULL,
  `Product_Description` text NOT NULL,
  `Product_Price` int NOT NULL,
  `Product_Image` text NOT NULL,
  `Cat_Id` int NOT NULL,
  `Subcat_Id` int NOT NULL,
  `Quntity` int NOT NULL,
  PRIMARY KEY (`Product_Id`),
  KEY `Cat_Id` (`Cat_Id`),
  KEY `Subcat_Id` (`Subcat_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Product_Name`, `Product_Description`, `Product_Price`, `Product_Image`, `Cat_Id`, `Subcat_Id`, `Quntity`) VALUES
(1, 'Product 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 50, '5.jpg', 1, 1, 10),
(2, 'Product 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 80, '4.png', 1, 2, 10),
(3, 'Product 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 100, '1.jpg', 1, 3, 10),
(4, 'Product 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 120, '2.jpg', 1, 1, 10),
(5, 'Product 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 90, '3.jpg', 1, 2, 10),
(6, 'Product 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 150, '4.png', 1, 3, 10),
(7, 'Product 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 80, 'WhatsApp Image 2023-04-18 at 12.47.57 AM.jpeg', 2, 0, 10),
(8, 'Product 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 150, '6.jpg', 1, 3, 10),
(9, 'Product 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 150, '9.png', 1, 3, 10),
(10, 'Product 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 150, '10.jpg', 1, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Role_Id` int NOT NULL AUTO_INCREMENT,
  `Role_Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Role_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Role_Id`, `Role_Name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `Subcat_Id` int NOT NULL AUTO_INCREMENT,
  `Subcat_Name` varchar(200) NOT NULL,
  `Cat_Id` int NOT NULL,
  PRIMARY KEY (`Subcat_Id`),
  KEY `Cat_Id` (`Cat_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`Subcat_Id`, `Subcat_Name`, `Cat_Id`) VALUES
(1, 'Regular', 1),
(2, 'plus', 1),
(3, 'premium', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_Id` int NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Contact_No` int NOT NULL,
  `Address` text NOT NULL,
  `zipcode` int NOT NULL,
  `Role_Id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(20) NOT NULL,
  `otp` text NOT NULL,
  `otpused` int NOT NULL,
  PRIMARY KEY (`User_Id`),
  KEY `Role_Id` (`Role_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `User_Name`, `Email`, `Contact_No`, `Address`, `zipcode`, `Role_Id`, `Password`, `otp`, `otpused`) VALUES
(1, 'Dhruvi', 'druvishah2504@gmail.com', 34545454, 'addresss....', 0, '2', '123', '564722', 1),
(2, 'admin', 'admin@gmail.com', 34545454, 'addresss....', 0, '1', '123', '32031', 1),
(3, 'test', 'test@gmail.com', 3434343, 'qwqwq', 12345, '2', '123', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `Wishlist_Id` int NOT NULL AUTO_INCREMENT,
  `Added_Date` date NOT NULL,
  `User_Id` int NOT NULL,
  `Product_Id` int NOT NULL,
  PRIMARY KEY (`Wishlist_Id`),
  KEY `User_Id` (`User_Id`),
  KEY `Product_Id` (`Product_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

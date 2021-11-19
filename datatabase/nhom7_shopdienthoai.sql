-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 07:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom7_shopdienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'nhom07', 'nhom07@gmail.com', 'nhom07', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(6, 'Samsung'),
(7, 'Iphone'),
(8, 'Huawei'),
(9, 'Oppo'),
(16, 'Xiaomi'),
(18, 'Vivo'),
(19, 'Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `customerId`, `productName`, `price`, `quantity`, `image`) VALUES
(23, 34, 6, ' Xiaomi Redmi Note 11', '7500000', 2, '88742d8a1e.jpg'),
(24, 30, 6, 'Điện thoại Samsung Galaxy Z Fold3 5G 512GB', '43990000', 16, 'caecebb338.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(20, 'Điện thoại Android'),
(21, 'Điện thoại phổ thông'),
(22, 'Phụ kiện điện thoại'),
(24, 'Điện thoại cũ'),
(25, 'Điện thoại Iphone(IOS)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `phone`, `email`, `password`) VALUES
(6, 'Pham Xuan Nhut', 'Số 1 Lê Duẩn, Bến Nghé, Quận 1', '0932023992', 'xuannhutzz@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43'),
(7, 'Khắc Tuấn', 'Cẩm xuyên,Hà tĩnh', '0947383434', 'tuan@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(81, 45, 'IPhone 13 Pro Max 512GB', 7, 1, '42990000', 'b031439f96.jpg', 0, '2021-11-19 11:29:53'),
(82, 48, 'IPhone 13 mini 128GB', 7, 1, '21990000', 'a0fd8947b2.jpg', 0, '2021-11-19 11:29:53'),
(83, 30, 'Samsung Galaxy Z Fold3 5G 512GB', 7, 1, '43990000', 'caecebb338.jpg', 0, '2021-11-19 11:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `productQuantity`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(30, 'Samsung Galaxy Z Fold3 5G 512GB', '', 20, 6, '<p>Điện thoại Samsung Galaxy Z Fold3 5G 512GB</p>', 0, '43990000', 'caecebb338.jpg'),
(32, 'OPPO Reno6 Pro 5G', '9', 20, 9, '<p>Điện thoại OPPO Reno6 Pro 5G</p>', 0, '18490000', '1a98cfd5af.jpg'),
(34, ' Xiaomi Redmi Note 11', '14', 20, 16, '<p>&nbsp;Xiaomi Redmi Note 11</p>', 1, '7500000', '88742d8a1e.jpg'),
(35, 'iPhone 13 Pro Max 128GB', '8', 25, 7, '<p>Điện thoại iPhone 13 Pro Max 128GB</p>', 0, '33990000', '38d0cbb9cb.jpg'),
(42, 'iPhone 12 Pro Max 128GB', '7', 25, 7, '<p><span>Điện thoại iPhone 12 Pro Max 128GB</span></p>', 0, '31990000', 'f2998e6ee9.jpg'),
(43, 'Xiaomi 11T 5G 128GB', '18', 20, 16, '<p><span>Điện thoại Xiaomi 11T 5G 128GB</span></p>', 0, '10490000', 'cf047b7ec0.jpg'),
(44, 'OPPO A74', '12', 20, 9, '<p><span>Điện thoại OPPO A74</span></p>', 1, '6690000', '87b4b8a73c.jpg'),
(45, 'IPhone 13 Pro Max 512GB', '25', 25, 7, '<p><span>Điện thoại iPhone 13 Pro Max 512GB</span></p>', 0, '42990000', 'b031439f96.jpg'),
(46, 'Samsung Galaxy S21 Ultra 5G 128GB', '6', 20, 6, '<p><span>Điện thoại Samsung Galaxy S21 Ultra 5G 128GB</span></p>\r\n<div class=\"ddict_btn\" style=\"top: 71px; left: 238.328px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/16.png\" alt=\"\" /></div>', 1, '25990000', 'd67446f841.jpg'),
(47, 'OPPO Find X3 Pro 5G', '20', 20, 9, '<p><span>Điện thoại OPPO Find X3 Pro 5G</span></p>', 1, '23990000', '2829cebb91.jpg'),
(48, 'IPhone 13 mini 128GB', '14', 25, 7, '<p><span>Điện thoại iPhone 13 mini 128GB</span></p>', 1, '21990000', 'a0fd8947b2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(18, 'slide1', '6f1525cbf7.png', 1),
(19, 'slide2', 'a8961840b2.png', 1),
(20, 'slide3', '9374ffe429.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
